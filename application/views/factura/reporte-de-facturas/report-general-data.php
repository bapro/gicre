	<style>
@media print {
#break-after {
page-break-after: always;

}
}
table{font-size:12px; padding:2px;border-collapse:collapse;}
th{padding:0.5rem;border:1px solid #979797;}
.me-bcg{background:#325B7E;color:white;}
td{padding:0.5rem;border:1px solid #BDBDBE;}
td[colspan]{background:whitesmoke;}
.currency:before{
content:"<?=$moneda;?>";
color:green;
font-weight:bold;

}
th, td {
font-family: 'Noto Sans', sans-serif;
}

.center-all {
text-align: center;
font-family: 'Noto Sans', sans-serif;
}



		</style>
		<?php 
		if($location==0){?>
		<div class="center-all">
		<span><strong>REPORTE GENERAL DE FACTURAS (<?=$moneda;?>)</strong></span>
		<br/>
		<span><?=$get_centro_name?><span>
		<br/>
		<span style="font-size:10px"><?=$date_range?><span>
		<br/>
		</div>
		<?php }?>
	<div class="table-responsive">
			
		<table   id="tbl_exportgneralreport_to_xls"    >
		
			<tr>
				<th class="me-bcg">#</th>
				<th class="me-bcg">FECHA Y HORA</th>
				<th class="me-bcg">NOMBRES</th>
				<th class="me-bcg">SERVICIO</th>
				<th class="me-bcg">ARS</th>
				<th class="me-bcg">ARS PAGARA</th>
				<th class="me-bcg">EFECTIVO</th>
				<th class="me-bcg">TRANSFERENCIA</th>
				<th class="me-bcg">CHEQUE</th>
				<th class="me-bcg">TARJETA DE CREDITO</th>
				<th class="me-bcg">TOTAL PACIENTE PAGARA</th>
				<th class="me-bcg">CENTRO/MEDICO</th>
				<th class="me-bcg">CREADO POR</th>
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
					

					$centroData=$this->db->select('type, name')->where('id_m_c',$a['center_id'])->get('medical_centers')->row_array();
					$type=$centroData['type'];
					$factura2=$this->db->select('numfac,numfac2,numauto,autopor,area,medico, updated_by')->where('idfacc',$a['id2'])->get('factura2')->row_array();
					if($type=="privado"){
					$procedimiento=$this->db->select('procedimiento')->where('id_tarif',$a['service'])->get('tarifarios_test')->row('procedimiento');
					$numfac=$factura2['numfac'];
					} else{
					$procedimiento=$this->db->select('sub_groupo')->where('id_c_taf',$a['service'])->get('centros_tarifarios_test')->row('sub_groupo');	 
					$numfac=$factura2['numfac2'];
					}


					$paciente=$this->db->select('nombre,photo,ced1, ced2, ced3, id_p_a,plan')->where('id_p_a',$a['pat_id'])
					->get('patients_appointments')->row_array();				

					$seguro=$this->db->select('title')->where('id_sm',$a['seguro'])->get('seguro_medico')->row('title');

                     //if($doctor){					
                   // $medico_name=$this->db->select('name')->where('id_user',$factura2['medico'])->get('users')->row('name');
					 //}else{
						 if($factura2['medico'] > 1){
							 $medico_name1=$this->db->select('name')->where('id_user',$factura2['medico'])->get('users')->row('name');
						 }else{
							$medico_name1=''; 
						 }
					$medico_name= $centroData['name']. ' / '.$medico_name1;
						 
					 //}
					$created_by=$this->db->select('name')->where('id_user',$factura2['updated_by'])->get('users')->row('name');
						if($a['seguro']==11){
						$color="#d8d8ff";
						$plan='';	
						}else{
						$color="white";	
						$plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
						$plan = " (<em>$plan</em>)";
						}
                        $patient_seguro = $seguro.$plan;
						$if_fac= encrypt_url($a['id2']);
						$typ= encrypt_url($type);
						if($location==0){
						$factura = $a['id2'];
						}else{
						$factura ='<a target="_blank" title="Ver factura" href="'.base_url().''.$this->USER_CONTROLLER.'/factura_by_id/'.$if_fac.'/'.$typ.'/" >'. $a['id2'].'</a>';
						}
					
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
						<td>'.$medico_name.'</td>
						<td>'.$created_by.'</td>
					</tr>', $factura, date("d-m-Y", strtotime($a['factura_fecha'])), $paciente['nombre'], $procedimiento, $patient_seguro, number_format($a['totalpaseg'],2), "","","","", "" );
					
					
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
							<td class="currency"></td>
							<td class="currency"></td>
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
					<td>TOTAL GENERAL</td>
					<td class="currency" style="color:red">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency">%s</td>
					<td class="currency" style="color:blue">%s</td>
					<td class="currency"></td>
					<td class="currency"></td>
				</tr>', number_format($total->totalpaseg,2),  number_format($effectivo,2), number_format($transferencia,2), number_format($cheque,2), number_format($tarjeta,2), number_format($total->totpapat,2) );
			
			?>
			
	     <tr class="not-me-tr">
		<th colspan="2" style="text-align:center">BALANCE GENERAL</th>
		</tr>
		<tr class="not-me-tr">
		<th>CUENTA POR COBRAR ARS</th><td style="color:red"><?=number_format($total->totalpaseg,2)?></td>
		</tr>
		<tr class="not-me-tr">
	    <td colspan="2"></td>
		</tr>
		<tr class="not-me-tr">
		<th>EFECTIVO</th><td class="currency"><?=number_format($effectivo,2)?></td>
		</tr>
		<tr class="not-me-tr">
		<th>TRANSFERENCIA</th><td class="currency"><?=number_format($transferencia,2)?></td>
		</tr>
		<tr class="not-me-tr">
		<th>CHEQUES</th><td class="currency"><?=number_format($cheque,2)?></td>
		</tr>
		<tr class="not-me-tr">
		<th>TARJETA DE CREDITO</th><td class="currency"><?=number_format($tarjeta,2)?></td>
		</tr>
		<tr class="not-me-tr">
		<th>TOTAL</th><td style="color:blue" class="currency"><?=number_format($effectivo + $transferencia + $tarjeta + $cheque,2)?></td>
		</tr>
		<tr class="not-me-tr">
	    <td colspan="2"></td>
		</tr>
		<tr class="not-me-tr">
		<th>TOTAL GENERAL</th><th class="currency"><?=number_format($effectivo + $transferencia + $tarjeta + $cheque + $total->totalpaseg,2)?></th>
		</tr>
		</table>
		</div>
		<?php 
		if($location==1){?>
		<br/>
		<div class="float-end">
		  <form  target="_blank" METHOD="GET" ACTION="<?php echo site_url("print_page/general_invoice_report"); ?>">
		  <input name="desde" type="hidden" value="<?=$desde?>" /> 
		  <input name="hasta" type="hidden" value="<?=$hasta?>" />
		  <input name="moneda" type="hidden" value="<?=$moneda?>" />
		  <input name="doctor" type="hidden" value="<?=$doctor?>" />
		  <input name="centro" type="hidden" value="<?=$centro?>" />
			<button  type="submit" class="btn btn-primary btn-md" ><i class="bi bi-printer"></i> Imprimir Reporte</button>
		<button class="btn btn-primary btn-md" type="button" onclick="ExportGeneralReportToExcel('xlsx')"><i class="bi bi-file-spreadsheet"></i> Exportar Reporte a Excel</button>
           </form>
		   
				</div>
		<?php 
		}
		?>
		
	
