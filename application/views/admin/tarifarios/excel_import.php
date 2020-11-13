
<style>
td,th{text-align:left}
</style>





<div class="container">
<div id="result"></div>


<div class="col-md-12" id="background_">



<h1 align="center"><u style="color:#38a7bb">IMPORTACION DE TARIFARIOS </u></h1>

<div class="col-md-12 form-horizontal" id="abled-after-search">
<!--<div class="form-group">
<label class="control-label col-sm-3" >Desea importar un tarifario por un Medico o un centro medico ?</label>
<div class="col-sm-5">
<button id="click_doct"  class="btn btn-primary btn-sm ">Medico</button> <button id="click_centro "class="btn btn-primary btn-sm ">Centro Medico</button>
</div>
</div>
--> 
<div id="excel_doc" style="display:none">
<br/>
<div id="load_tarif_doc_form"></div>
</div>




<div id="excel_centro" >
<form method="post" class="form-horizontal" id="import_form_centro" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$name?>" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,categoria, procedimiento,monto</div>

<input type="file" name="file" class="file" required id="filec"  accept=".xls, .xlsx" onchange="disableSendCentro();" />

</div>
</div>
<span style="display:none" id="ruleovertarifcentro">
<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-4">
<input class="form-control  required" name="codigo_centro" id="codigo_centro"  />

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione el Centro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 required" name="centro_id"  id="id_c">
<option value=""></option>
<?php 

foreach($all_medical_centers as $row)
{ 
?>
<option value="<?=$row->id_m_c?>" ><?=$row->name?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Seleccione el Seguro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 required" name="id_sm"  id="id_sm">
<option value=""></option>
<?php 

foreach($all_seguro as $row)
{ 
?>
<option value="<?=$row->id_sm?>" ><?=$row->title?></option>
<?php
}
?>
</select>
<div id="check_if_centro_medico_has_tarifarios_already"></div>
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import2" value="Import" class="btn btn-info" disabled />
</div>
</div>
</span>
</form>
</div>
</div>
</div>

<div class="col-md-12"  >

<div class="table-responsive" id="ta_centro">
</div>
</div>
<div class="col-md-12"  >

<div class="table-responsive" id="customer_data">
</div>

</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
  
<script>

$(document).ready(function() {
$('#import2').click(function(e) {
var codigo_centro = $("#codigo_centro").val();
var id_sm = $("#id_sm").val();
var id_c = $("#id_c").val();
var filec = $("#filec").val();
 if(codigo_centro=="" || id_c =="" || filec=="" || id_sm==""){
alert("Todos los campos son obligatorios!");
return false;
}

});



});








function disableSendCentro(){
if($('#filec').val()==""){
$("#ruleovertarifcentro").hide();
}
else{
$("#ruleovertarifcentro").show();
}	
}





	function disableSend(){
if($('#file').val()==""){
$("#ruleovertarifmedico").hide("");
}
else{
$("#ruleovertarifmedico").show();
}	
}



$('#click_doct').click(function() {
$('#excel_centro').hide();
$('#excel_doc').slideToggle("slow");
});


$('#click_centro').click(function() {
$('#excel_doc').hide();
$('#excel_centro').slideToggle("slow");
});
//==================================================================================


$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});

$('.seguro-tarif').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});





$(document).ready(function(){

load_tarif_doc_form();

function load_tarif_doc_form()
{

$.ajax({
url:"<?php echo base_url(); ?>admin/load_tarif_doc_form",

method:"POST",
success:function(data){
$('#load_tarif_doc_form').html(data);
}
})
}
	
load_data();

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



});




$('#import_form_centro').on('submit', function(event){
event.preventDefault();

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/import_exel_centro",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los tarifarios importados con éxito');
$("#hide_last_centro").hide();
$('#filec').val('');
$('#codigo_centro').val('');
$("#ruleovertarifcentro").hide();
$(".select2").val("").trigger("change");
$("#ta_centro").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
})

});



$('#id_sm').on('change', function(event){
	var id_sm=$(this).val();
	var id_c=$("#id_c").val();
	$("#check_if_centro_medico_has_tarifarios_already").fadeIn(400).html('<span class="load"><img style="width:70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/check_if_centro_medico_has_tarifarios_already');?>',
	data:{id_c:id_c,id_sm:id_sm},
	success: function(data){
	$("#check_if_centro_medico_has_tarifarios_already").html(data);
	
	},
	});	
})

</script>
