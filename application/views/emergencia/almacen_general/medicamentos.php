<style>
td,th{font-size:12px}
</style>
<div id='dsfsd'></div>
<?php  if($query->result() !=NULL)
{

?>

<hr/>

 <div  class='reload_data'></div>

<?php
} else{
?>
<div class="alert alert-warning" role="alert">
  No hay medicamento por este centro subelo.
</div>
<div id="hidemgm" >
<form method="post"   class="form-horizontal" id="import_form" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los parametros establecidos exigido por el sistema</div>
<input  type="file" name="file" class="file required"  id="file" required  accept=".xls, .xlsx"  />
<input  type='hidden' name='creaded_by' value="<?=$iduser?>"/>
<input  type='hidden' name='centro' value="<?=$centro?>"/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Seleccionar</label>
 <label class="radio-inline">
      <input type="radio" class="id_radio1" name="elegir" value="medicamentos" checked> Medicamentos
 </label>
     <label class="radio-inline" title='Elige GICRE si el paciente esta creado ya'>
      <input type="radio" class="id_radio1" name="elegir" value="material-gastable" > Material Gastable
    </label>
	</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1"  />
</div>
</div>
</form>
</div>
<hr/>
<div id="load_data"></div>
<?php
}
?>

<script>



function reload_data()
{
$(".reload_data").fadeIn().html('<span class="load"> <img src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
url:"<?php echo base_url(); ?>emergency/ifFindMed",
data: {centro:<?=$centro?>,iduser:<?=$iduser?>},
method:"GET",
success:function(data){
$('.reload_data').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#dsfsd").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
})
}

reload_data();


function load_data()
{
$.ajax({
url:"<?php echo base_url(); ?>emergency/searchMedicamentoCentro",
data: {centro:<?=$centro?>,iduser:<?=$iduser?>},
method:"GET",
success:function(data){
$('#load_data').html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#dsfsd").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
})
}




$('#import_form').on('submit', function(event){
event.preventDefault();
if($("#file").val()==""){
alert("Los campos son obligatorios");
}
else{
$('#hidemgm').hide();
$.ajax({
url:"<?php echo base_url(); ?>emergency/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
load_data();
},

});
};
});
</script>