<!--<div id="my_camera"></div>
<input type="button" value="Take Snapshot" onClick="take_snapshot()">
 <input type="button" value="Save Snapshot" onClick="saveSnap()">
<div id="results" ></div>-->
<style>
#hide_form_cita{display:none}
#no_cedulad_found{display:none}
.hide-next-data-patient{display:none}
input.form-control-p-e {
  pointer-events: none;
}
.hide_crear_nueva_cita{display:none}
.rem-hr{display:none}

</style>
<?php
foreach($CEDULA_INFO as $cedula_info)

{
 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$date_nacer = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($cedula_info->fecha_nac)));	
  
	?>
	<div id="show_form_cedula">
<form  class="form-horizontal"  method="post"  > 
</br>
<a href="<?php echo base_url("admin/CreateCita/$cedula_info->Cedula")?>"  style="float:right" class="btn btn-primary btn-lg" >Crear Nueva Cita </a>
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="form-group ">
<label class="control-label col-sm-3"> Nombre</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control form-control-p-e"  value="<?php echo $cedula_info->nombres; ?>"  >


</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Apellido</label>
<div class="col-sm-6">

<input type="text" class="form-control form-control-p-e" value="<?php echo $cedula_info->apellido1; ?>"  >

</div>
</div>



<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-3">                                                       
<input type="text" class="form-control form-control-p-e"  value="<?php echo $cedula_info->Cedula; ?>"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input type="text" class="form-control form-control-p-e"   value="<?php echo $cedula_info->apellido2; ?>"  >

</div>
</div>

<div id="hideyear" style="">
<div class="form-group">
<label  class="control-label col-sm-3" > Fecha nacimiento </label>
<div class="col-sm-4" >
<input type="text" class="form-control form-control-p-e"  value="<?php echo $date_nacer; ?>" >


</div>

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3"> Teléfono </label>
<div class="col-sm-4">						
<input type="text" class="form-control form-control-p-e bfh-phone"   value="<?php echo $cedula_info->Telefono; ?>"  >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<?php
if($cedula_info->sexo=="F"){
	$sexo="Feminino";
} else{
	$sexo="Masculino";
}
?>
<input type="text" class="form-control form-control-p-e"  value="<?php echo $sexo ?>"  >

</div>
</div>


<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control form-control-p-e" value="<?php echo $cedula_info->Calle; ?>"  >

</div>
		
</div>

</div>

 </div>
 </form>
 </div>
<?php

}
	?>
<script>



/*
<!-- Configure a few settings and attach camera -->
Webcam.set({
  width: 320,
  height: 240,
  image_format: 'jpeg',
  jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

<!-- Code to handle taking the snapshot and displaying it locally -->
function take_snapshot() {
 
 // take snapshot and get image data
 Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
  '<img src="'+data_uri+'"/>';
  } );
}

function saveSnap(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("imageprev").src;

 Webcam.upload( base64image, 'upload.php', function(code, text) {
  console.log('Save successfully');
  //console.log(text);
 });

}*/
</script>
