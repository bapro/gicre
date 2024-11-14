<?php
 
	
	$symbol='£';
?>
<!doctype html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>HTML table based upon PHP array data</title>
		<style>
			table{ border:1px solid gray;font-family:calibri,verdana,arial;float:none;margin:auto; }
			th{background:gray;color:white;padding:0.5rem;}
			td{padding:0.5rem;border:1px dotted gray;}
			td[colspan]{background:whitesmoke;}
			.currency:before{
				content:'<?=$moneda;?>';
				color:green;
				font-weight:bold;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<th># FACTURA</th>
				<th>FECHA-HORA</th>
				<th>NOMBRES</th>
				<th>SERVICIO</th>
				<th >ARS</th>
				<th>ARS PAGARA</th>
				<th >EFECTIVO</th>
				<th >TRANSFERENCIA</th>
				<th >CHEEQUE</th>
				<th >TARJETA DE CREDITO</th>
				<th>TOTAL PACIENTE PAGARA</th>
			</tr>
			<?php
			
				$trans=array();
				$fecha_facs=array();
				
				$total=new stdClass;
				$total->totalpaseg=0;
			
				$total->totpapat=0;
				$effectivo=0;
                 $transferencia=0;
				 $cheque=0;
				 $tarjeta=0;
				foreach( $data as $index => $a ){
					/*
						Transaction number & fecha_fac variables
						- empty unless not in array
					*/
					$tn='';
					$dt='';
					
					/* check if current transaction is already in the array - if not add it and create a new subtotal object */
					if( !in_array( $a['id2'], $trans ) ) {
						/* assign `$dt` variable to newly discovered transaction and add to array */
						$tn = $trans[] = $a['id2'];
						
						$subtotal=new stdClass;
						$subtotal->totalpaseg=0;
						
						$subtotal->totpapat=0;
					}
					/* Check if the fecha_fac is in it's array - if not, add it */
					if( !in_array( $a['fecha_fac'], $fecha_facs ) ) {
						/* assign `$dt` var to newly discovered fecha_fac and add to array */
						$dt = $fecha_facs[] = $a['fecha_fac'];
					}
					
					/* upfecha_fac subtotals */
					$subtotal->totalpaseg += floatval( $a['totalpaseg'] );
					 
					$subtotal->totpapat += floatval( $a['totpapat'] );
					

					$type=$this->db->select('type')->where('id_m_c',$a['center_id'])->get('medical_centers')->row('type');
					$factura2=$this->db->select('numfac,numfac2,numauto,autopor,area')->where('idfacc',$a['id2'])->get('factura2')->row_array();
					if($type=="privado"){
					$procedimiento=$this->db->select('procedimiento')->where('id_tarif',$a['service'])->get('tarifarios')->row('procedimiento');
					$numfac=$factura2['numfac'];
					} else{
					$procedimiento=$this->db->select('sub_groupo')->where('id_c_taf',$a['service'])->get('centros_tarifarios')->row('sub_groupo');	 
					$numfac=$factura2['numfac2'];
					}


					$paciente=$this->db->select('nombre,photo,ced1, ced2, ced3, id_p_a,plan')->where('id_p_a',$a['pat_id'])
					->get('patients_appointments')->row_array();				

					$seguro=$this->db->select('title')->where('id_sm',$a['seguro'])->get('seguro_medico')->row('title');				

						if($a['seguro']==11){
						$color="#d8d8ff";
						$plan='';	
						}else{
						$color="white";	
						$plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
						$plan = " (<em>$plan</em>)";
						}
                        $patient_seguro = $seguro.$plan;
					
					/* output the table row with data including vars defined above */
					printf('
					<tr>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
					</tr>', $a['id2'], date("d-m-Y H:i:s", strtotime($a['factura_fecha'])), $paciente['nombre'], $procedimiento, $patient_seguro, $a['totalpaseg'], "","","","", "" );
					
					
					/* Show the sub-total for current transaction number */
					if( ( $index < $num_rows - 1 && $trans[ count( $trans )-1 ] != $data[ $index + 1 ]['id2'] ) or $index==$num_rows -1 ){
						printf('
						<tr>
							<td colspan=4 align="center">SUB-TOTAL</td>
							<td></td>
							<td class="currency">%s</td>
							<td class="currency">%s</td>
							<td class="currency">%s</td>
							<td class="currency">%s</td>
							<td class="currency">%s</td>
							<td class="currency">%s</td>
						</tr>', number_format($subtotal->totalpaseg,2),   number_format($a['effectivo'],2),  number_format($a['transferencia'],2), number_format($a['cheque'],2),number_format($a['tarjeta'],2), number_format($subtotal->totpapat,2) );
						
						$total->totalpaseg += floatval( $subtotal->totalpaseg );
						$effectivo += floatval( $a['effectivo'] );
						$transferencia+= floatval( $a['transferencia'] );
						$cheque+= floatval( $a['cheque'] );
						$tarjeta+= floatval( $a['tarjeta'] );
						
						$total->totpapat += floatval( $subtotal->totpapat );
					}
				}
				
				/* Show the final totals */
				printf('
				<tr><td colspan=7>&nbsp;</td></tr>
				<tr>
					<td colspan=4>&nbsp;</td>
					<td>TOTAL</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
				</tr>', number_format($total->totalpaseg,2),  number_format($effectivo,2), number_format($transferencia,2), number_format($cheque,2), number_format($tarjeta,2), number_format($total->totpapat,2) );
			
			?>
		</table>
	</body>
</html>