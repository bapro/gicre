<?php
$this->padron_database = $this->load->database('padron',TRUE);
if(!empty($display_billings ))  
{ 


	 $paciente_name=$this->db->select('nombre')->where('id_p_a',$patient)
	 ->get('patients_appointments')->row('nombre');


	 
	 $sqlncf ="SELECT *
	 FROM 
	 invoice_ars_claims 
	 
	 WHERE
	paciente = '$patient' 
	 AND
	 medico='$medico'
	  GROUP BY ncf_id
	 ";
$querysqlncf = $this->db->query($sqlncf);

 if($querysqlncf->num_rows() > 0){
	 foreach ($querysqlncf->result() as $n) {
		 
		 $sql ="SELECT *
	 FROM 
	 invoice_ars_claims 
	  WHERE
	paciente = '$patient' 
	 AND
	 medico='$medico'
	 AND
	 ncf_id=$n->ncf_id
	 ";
$query = $this->db->query($sql); 
	 $nfc=$this->db->select('value,id_ncf')->where('id_ncf',$n->ncf_id)
 ->get('ncf')->row_array();	
 $ncf_id=$nfc['id_ncf']; 
 $update_date= date("d-m-Y H:i",strtotime($n->updated_date));
  $crpm=$this->db->select('name')->where('id_user',$n->updated_by)->get('users')->row('name');

	 ?>
<div class="alert alert-info">Hay <strong><u>NCF : <?=$nfc['value']?></u></strong> con <strong><?=$query->num_rows()?> factura(s)</strong> creada(s) segun las entradas de la busqueda (Creado por : <?=$crpm?> | <?=$update_date?>)<a  target="_blank" href="<?php echo base_url("admin_medico/invoice_ars_p_v_/$patient/$medico/$ncf_id/$is_admin")?>" style="cursor:pointer" title="Imprimir" class="btn btn-sm" >Ver</a></div>  
	 <?php 
	 }
		 } 
		 
   
		 
		 $sql2 ="SELECT * FROM factura WHERE pat_id= '$patient' AND medico2='$medico' AND idfac NOT IN (SELECT id_fac2 from invoice_ars_claims)";
    $query2 = $this->db->query($sql2);
	
	
         ?>
<div  style="overflow-x:auto;border-top:1px solid  #38a7bb" >
<?php
$emty="";
 if($query2->num_rows()==0){
	echo '<div class="alert alert-info">Ya todas son creadas</div>';
     $emty="style='display:none'";
	}
	else {
		$emty='';
		
		?>
<div class="alert alert-info">Lista de <strong><?=$query2->num_rows()?></strong> facturas que aún no se han creado para <strong><?=$paciente_name?></strong></div>
<?php }?>
<table class="table table-striped  paginated" id="factura" <?=$emty?>>
	 <thead>
	<tr style="background:#C9F7FF">
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>Cedula</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamdo</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td><strong>Paciente Pagara</strong></td>
	<td></td>
	<th><input type="checkbox" id="copy-all" /></th>
	</tr>
	</thead>
	 <tbody id="copy-all-rows">
	<?php
     foreach ($query2->result() as $fac) {
		 
		 	$fac2=$this->db->select('num_af,numauto,codigoprestado,rnc')->where('idfacc',$fac->id2)
	 ->get('factura2')->row_array();  
		 
	$paciente=$this->db->select('nombre,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$fac->pat_id)
	 ->get('patients_appointments')->row_array();
	$fecha1 = date("d-m-Y",strtotime($fac->filter));
     
	?>
	<tr>
	<td><?=$fecha1;?></td>
		<td>
<?php

if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>
</td>
	<td class="fecha1"  style="display:none"><?=$fac->filter;?></td>
	<td class="paciente" style="display:none"><?=$fac->pat_id;?></td>
	<td ><?=$paciente['nombre'];?></td>
	<td ><?=$paciente['cedula'];?></td>
	<td class="num_af"><?=$fac2['num_af'];?></td>
	<td class="numauto"><?=$fac2['numauto'];?></td>

	<td class="tsubtotal"><?=$fac->subtotal;?></td>
	<td class="totpagseg"><?=$fac->totalpaseg;?></td>
	<td class="totpagpa"><?=$fac->totpapat;?></td>
	<td class="medico" style="display:none"><?=$fac->medico2;?></td>
	<td class="servicio" style="display:none"><?=$fac->service;?></td>
	<td class="codigoprestado" style="display:none"><?=$fac2['codigoprestado'];?></td>
	<td class="rnc" ><?=$fac2['rnc'];?></td>
	<td class="seguro_medico" style="display:none"><?=$fac->seguro;?></td>
	<td class="idfacc" style="display:none"><?=$fac->idfac;?></td>
	<td><input type="checkbox"  class="copy-one"  /></td>
	</tr>  

	<?php
	}

	?>
	 </tbody>
	</table>
<div id="id_val"></div>
</div>
<?php

}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:2%">No hay datos </i> '; 
}	
?>

<script>


$('#show-past').click(function () {
	$('#show-past').text($('#show-past').text() == 'Ocultar' ? 'Ver' : 'Ocultar'); 
    $(".hide-me").slideToggle("slow");
  	
	})
	
	
	
	//-----------------------------------------------------------------------------------------
jQuery('#copy-all').on('click', function(e) {

if($(this).is(':checked',true)) {

}
else{
$(".copy-one").prop('checked', false);
}
})


$('#factura').on('click','.copy-one',function(e){
if($(this).is(':checked',true)) {
$(this).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
$(this).closest('tr').clone().appendTo('#second-table>tbody');
$(".disabled-all :input").prop("disabled", false);
$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
}
//search_result();
})


	jQuery('#copy-all').on('click', function(e) {
	if($(this).is(':checked',true)) {
	$("#copy-all-rows").fadeOut(800, function(){ 
	$(this).remove();
	});
	$("#copy-all-rows").clone().appendTo('#second-table');
	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	//search_result();
	}
	})
	
	
	
		$('#second-table').on('click','.copy-one',function(e){
		 e.preventDefault();
        //$(this).parents('tr').remove();
		
		$(this).closest('tr').fadeOut(800, function(){ 
		$(this).remove();
		});
		var id =$(this).val();
		//search_result();
		$(this).closest('tr').clone().appendTo('#factura>tbody');
})
</script>