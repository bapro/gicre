<?php
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$id_seguro)
->get('seguro_medico')->row_array();

$categoria=$this->db->select('area')->where('id_user',$id_doctor)
->get('users')->row('area');

if($seguro['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguro['logo'].'"  />';	
}

$codigo_contrato=$this->db->select('codigo,id,updated_by,updated_time,inserted_by,inserted_time')->where('id_seguro',$id_seguro)->where('id_doctor',$id_doctor)
->get('codigo_contrato')->row_array();


?>
<div id="error"></div>
<h4 style="color:green" >
Seguro Medico : <a data-toggle="modal" data-target="#EditSeguroMedico" target="_blank"  href="<?php echo base_url('admin/EditSeguroMedico/'.$id_seguro)?>" ><?=$seguro['title']?></a>
<?php echo $seguro_logo; ?>
 </h4>
 <br/>
<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,procedimiento,monto</div>

<input type="file" name="file" class="file required" required id="file"  accept=".xls, .xlsx" onchange="disableSend();"/>
<input type='hidden' name='categoria' value="<?=$categoria?>"/>
<input type='hidden' name='seguro' value="<?=$id_seguro?>"/>
<input type='hidden' name='doctor_dropdown' value="<?=$id_doctor?>"/>
<input type='hidden' name='creaded_by' value="<?=$user_name?>"/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-4">
<input class="form-control  required" name="codigo_medico" id="codigo_medico" />

</div>
</div>
	<?php if($seguro['id_sm'] !=11){
	
		
		?>
	<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>

<div class="col-sm-4">
<?php
if($idPlan==0){
	?>
<select class="form-control select2" name="plan" id='loadPlan'>


</select>
<?php

} else{
$plan=$this->db->select('name')->where('id',$idPlan)->get('seguro_plan')->row('name'); 

 ?>
 <input  type='text' style='pointer-events: none;' class='form-control' value='<?=$plan?>'/>
<input name='plan' type='hidden' class='form-control' value='<?=$idPlan?>'/>
   <?php
   }
   ?>

</div>
</div>
<?php } else{
	
	?>

	<div class="form-group">
<label  class="control-label col-sm-3">Centro</label>

<div class="col-sm-4">

<select class="form-control select2" name="plan" id='centro'>


</select>


</div>
</div>


<?php }?>	
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1"  />
<span id="load1"></span>

</div>
</div>
</form>

<script>
$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});


 if(<?=$seguro['id_sm']?> !=11){
loadPlan();
 }else{
	loadCentro(); 
 }



function loadPlan(){
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/loadPlanTarifarios')?>",
data: {id_doctor:<?=$id_doctor?>,id_seguro:<?=$id_seguro?>},
 success:function(data){
	 $('#loadPlan').html(data);
},
 
});
}


function loadCentro(){

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/loadCentroTarifariosPrivado')?>",
data: {id_doctor:<?=$id_doctor?>,id_seguro:<?=$id_seguro?>},
 success:function(data){
	 $('#centro').html(data);
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}



$('#import_form').on('submit', function(event){
event.preventDefault();

if($("#codigo_medico").val()=="" || $("#file").val()==''){
alert("Todos los campos son obligatorios");
}
else{

$(".hide-total-tarif-centro").hide();

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los tarifarios importados con éxito');
load_doc_seguro();
constant_load_seguro();
$("#import_form").hide();
$("#codigo_medico").val("");
 $("#file").val();
 if(<?=$seguro['id_sm']?> !=11){
loadPlan();
 }else{
	loadCentro(); 
 }
},

});
};
});
</script>