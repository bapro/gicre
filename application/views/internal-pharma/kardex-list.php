<div class="container">
<div style="float:right;" >
<table  style="display:none;width:100%" id="btnPrintDisP-<?=$is_print?>">
<tr>
<td colspan='8'></td>
<td><button type="button" id="printDispatchedDrugs-<?=$is_print?>"  class="btn btn-sm btn-primary printDispatchedDrugs"  ><i class="fa fa-print"></i></button></td>
</tr>
</table>
</div>
<?php

if($is_print==1){
echo "<h3>Recepción de Petición Imprimidos</h3>";	
}

?>
<div style='overflow-x:auto;'>

<table  class="table table-striped" style="width:100%"  id='petitions-list-<?=$is_print?>'>

	<thead>
    <tr style="background:#428bca;">
	<th style="color:white"><strong># KARDEX</strong></th>
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white"><strong>Cantidad</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Usuario</th> 
		<th style="color:white">Fecha</th> 
		<th style="color:white">Tipo</th> 
		<th style="color:white">Despachar</th> 
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query2->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->updated_time));
	if(is_numeric($row->medica)){		
		$medica=$this->hospitalization_emgergency->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name'); 
		 }else{
			$medica=$row->medica; 
		 }
	$id_hosp=$this->hospitalization_emgergency->select('id_hosp')->where('id',$row->id_register)->get($orden_medica_table)->row('id_hosp');

	if($row->new_cant){
	$cant=$row->new_cant;	
	}else{
	$cant=$row->cantidad;	
	}
	
	if($row->drug_is_dispatched==1 && $row->is_print==0){
		$checkMed="checked";
		$bgc1="class='table-success addBgC'";
	}else{
		$checkMed="";
		$bgc1="";
	}
	
	if($row->is_print==1){
	$is_dispatched='<i class="bi bi-check-circle-fill text-success"></i>';	
	}else{
		$is_dispatched="";
	}
	 ?>
	<tr id="<?=$row->id; ?>" <?=$bgc1?>>
	<td><?=$row->id;?></td>
	<td><?=$medica;?></td>
    <td>
	<?=$cant;?>
	</td>
     <td><?=$row->dosis;?></td>
	<td><?=$row->via?></td>
	<td>
	<?=$op?>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Medicamentos</td>
		<td>
		<input type="checkbox"  class="copy-one <?=$table_recetas?>" value="<?=$row->id;?>" <?=$checkMed?> />  <?=$is_dispatched?> 
		 </td>
       </tr>

	 <?php
	 }
	 foreach($query3->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->updated_time));
	if(is_numeric($row->insumo)){
$med=$this->db->select('sub_groupo')->where('id_c_taf',$row->insumo)->get('centros_tarifarios_test')->row('sub_groupo');
}else{
$med=$row->insumo;	
}

	
	if($row->drug_is_dispatched==1 && $row->is_print==0){
		$checkPetition="checked";
		$bgc2="class='table-success addBgC'";
	}elseif($row->drug_is_dispatched==1 && $row->is_print==1){
	$bgc2="class='table-success addBgC'";
     $checkPetition="";	
	}else{
		$checkPetition="";
		$bgc2="";
	}
	
	if($row->is_print==1){
	$is_dispatched='<i class="bi bi-check-circle-fill text-success"></i>';	
	}else{
		$is_dispatched="";
	}
	
	 ?>
	<tr id="<?=$row->id; ?>" <?=$bgc2?>>
	<td><?=$row->id;?></td>
	<td><?=$med;?> </td>
    <td>
	<?=$row->cantidad;?>
	</td>
     <td>---</td>
	<td>---</td>
	<td>
<?=$op?>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Insumos</td>
		<td>
		<input type="checkbox"  class="copy-one <?=$table_petition?>" value="<?=$row->id;?>" <?=$checkPetition?> /> <?=$is_dispatched?> 
		 </td>
       </tr>

	 <?php
	 }
	
	 ?>
    </tbody>
</table>
<input value="<?=$id_centro?>"  type="hidden" class="id_centro" />
<input value="<?=$id_hosp?>" type="hidden"  class="id_hosp" />
<input value="<?=$id_patient?>" type="hidden"  class="id_patient" />
<hr/>

<?php
$this->session->set_userdata('is_patient_dispatched',$id_patient);

?>

<div id="reload_reception_petition"></div>
</div>
</div>
<script>
$(document).ready(function() {
    $("#petitions-list-<?=$is_print?>").DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ ],

    } );

  checkIfChecked(<?=$is_print?>);
function checkIfChecked(is_print){
  var countCheckedCheckboxes = $('#petitions-list-'+is_print+' td input[type="checkbox"]').filter(':checked').length;	
   if(countCheckedCheckboxes > 0 ){
    $("#btnPrintDisP-"+is_print).show();	
    }else{
      $("#btnPrintDisP-"+is_print).hide();	
    }
}


   $('.copy-one').on('change', function(){ 
    
    var table = $(this).attr('class').split(' ')[1];
	 if ($(this).is(':checked')) {
     var drug_id= $(this).val();
	 var print= 1;
	 $(this).closest('tr').addClass('table-success'); 
	 } 
  else {
	   $(this).closest('tr').removeClass('table-success'); 
	var drug_id= $(this).not(":checked").val();
	var print= 0;
 }
  checkIfChecked(<?=$is_print?>);
	  
	 	$.ajax({
		type:'POST',
		url:'<?=base_url('internal_pharmacy/dispatchThisDrug')?>',
		data: {drug_id:drug_id, print:print, table:table},
		success:function(data) {
      }
		});
     
 })
 
 



 
});
 
</script>