<div class="container">
<div id="error"></div>
<h4>SUBIR LISTADO DE EMPLEADOS</h4>
<hr id="hr_ad"/>
<form method="post"   class="form-horizontal" id="import_form" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener las columnas definidas en el archivo descargado. </div>
<?php $employees_model= "employees_model" ;?>
<a style='color:red' href="<?=base_url()?>doctor_back_end/download_excel_file_model/<?=$employees_model?>"><i class="fa fa-download" style="font-size:23px;"></i> Descarga este archivo, modificalo con los nuevos empleados.</a><br/><br/>
<input type="file" name="file" class="file required"  id="file" required  accept=".xls, .xlsx, .csv" />
<input type='hidden' name='creaded_by' value="<?=$user_name?>"/>

<input type='hidden' name='centro' value="<?=$centro?>"/>
</div>
</div>



<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1"  />


</div>
</div>
</form>
<br/><br/><br/><br/><br/>
<hr id="hr_ad"/>

<script>


   var x = $("#import_form").position(); //gets the position of the div element...
   window.scrollTo(x.left, x.top); 



$('#import_form').on('submit', function(event){
event.preventDefault();
	if($("#file").val()==""){
alert("Sube el archivo excel que tiene el listado de los empleados.");
}
else{
$('#import').val('espera mienstras importando...').prop("disabled",true);
$.ajax({
url:"<?php echo base_url(); ?>utilitaire/import_employees",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
location.reload(true);
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
};
});


</script>