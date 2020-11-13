<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$user_name?>" id="creaded_by" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,procedimiento,monto</div>

<input type="file" name="file" class="file required" required id="file"  accept=".xls, .xlsx" onchange="disableSend();"/>

</div>
</div>
<!--<span style="display:none" id="ruleovertarifmedico">-->
<span  id="ruleovertarifmedico">
<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-4">
<input class="form-control  required" name="codigo_medico" id="codigo_medico" />

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione La Especialidad</label>
<div class="col-sm-4">
<select class="form-control select2 required" name="categoria" id="categoria" onChange="getDoc(this.value);" >
<option value="" hidden></option>
<?php 

foreach($especialidades as $row)
{ 
?>
<option value="<?=$row->id_ar?>" ><?=$row->title_area?></option>
<?php
}
?>
</select>
</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-3">Seleccione El Medico</label>
<div class="col-sm-4">
<!--onChange="getDocSeg(this.value): deactivate seguro affected to doc;-->
<!--<select class="form-control select2"    name="doctor_dropdown" id="doctor_dropdown" onChange="getDocSeg(this.value);" >-->
<select class="form-control select2"    name="doctor_dropdown" id="doctor_dropdown"  >
</select>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Seleccione el Seguro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 " name="seguro" id="seguro" disabled>
<!--<option value="" ></option>
<?php 

foreach($all_seguro as $row)
{ 
?>
<option value="<?=$row->id_sm?>" ><?=$row->title?></option>
<?php
}
?>-->
</select>

</div>
</div>
<div id="check_if_doc_has_tarifarios_for_this_seguro"></div>
<!--<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select2" name="plan" id="plan">
<option>Basico</option>
<option>Complementario</option>
<option>Platinium</option>
<option>Subsidiado</option>
</select>
</div>
</div>-->
</span>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1" disabled />
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




$('#doctor_dropdown').on('change', function(event){
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getDocSeguro');?>',
	data:{id_doctor:$(this).val()},
	success: function(data){
		$("#seguro").prop("disabled",false);
	$("#seguro").html(data);
	
	},
	});	
	
	
})

$('#seguro').on('change', function(event){
	 var updated_by="<?=$user_name?>";
	var id_seguro=$(this).val();
	var id_doctor=$("#doctor_dropdown").val();
	if(id_seguro==11){
	$("#import").prop("disabled",false);
$("#check_if_doc_has_tarifarios_for_this_seguro").hide();	
	}else{
	$("#check_if_doc_has_tarifarios_for_this_seguro").fadeIn(400).html('<span class="load"><img style="width:70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/check_if_doc_has_tarifarios_for_this_seguro');?>',
	data:{id_doctor:id_doctor,id_seguro:id_seguro,updated_by:updated_by},
	success: function(data){
		$("#import").prop("disabled",false);
		$("#check_if_doc_has_tarifarios_for_this_seguro").show();	
	$("#check_if_doc_has_tarifarios_for_this_seguro").html(data);
	
	},
	});
}	
})





function getDoc(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").html(data);
	
	},
	});
}




function getDocSeg(id_doc) {
	$("#seguro").prop("disabled",true);
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/getDocSeg');?>',
	data:{id_doc:id_doc},
	success: function(data){
	$("#seguro").html(data);
	$("#seguro").prop("disabled",false);
	
	},
	});
}







function load_data()
{
$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_excel_import",
method:"POST",
success:function(data){
$('#customer_data').html(data);
}
})
}

function load_tarif_doc_form()
{
	var user_name="<?=$user_name?>";
$.ajax({
url:"<?php echo base_url(); ?>admin/load_tarif_doc_form",
data: {user_name:user_name},
method:"POST",
success:function(data){
$('#load_tarif_doc_form').html(data);
}
})
}

$('#import_form').on('submit', function(event){
event.preventDefault();

	if($("#codigo_medico").val()==""){
alert("El codigo es obligatorio");
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
load_tarif_doc_form();
load_data();

alert('Los tarifarios importados con éxito');
}
});
};
});
</script>