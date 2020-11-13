<!--<div id="my_camera"></div>
<input type="button" value="Take Snapshot" onClick="take_snapshot()">
 <input type="button" value="Save Snapshot" onClick="saveSnap()">
<div id="results" ></div>-->
<style>
input.form-control-p-e {
  pointer-events: none;
}
</style>
<div id="show_patient_by_cedula"></div>
<div id="hide_form_cita">
<img class="img-responsive" style="" src="<?= base_url();?>assets/img/user.png">

<form  class="form-horizontal"  method="post"  action="<?php echo site_url('admin/save_patients_appointments');?>" > 
<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i>  nueva cita </button>
<?php foreach($patient_cedula as $row)
		 if($row->sexo=="F"){
	$sexo="Feminino";
} else{
	$sexo="Masculino";
}
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$date_nacer = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->fecha_nac)));	
 
		?>
<div class="tab-content"  style="margin-left:14%;margin-top:-15%" >

<div class="tab-pane active" id="Datos_personales"> 
<div class="form-group">
<label class="control-label col-sm-3"> Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control form-control-p-e"  name="nombre" value="<?=$row->nombres?>"   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Apellido </label>
<div class="col-sm-6">

<input type="text" class="form-control form-control-p-e" name="apellido" value="<?=$row->apellido1?>" >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input  type="text" class="form-control form-control-p-e"  name="alias" value="<?=$row->apellido2?>"   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<input  type="text" class="form-control form-control-p-e" name="sexo" value="<?=$sexo?>"  >
</div>
</div>
<div class='form-group'>
<label class='control-label col-sm-3'>Fecha nacimento</label>
<div class="col-sm-7" >
<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<p id="incorect_age1" style="display:none;background:white;color:red;font-size:15px"><i>Si esta nacido en este año, seleccionne : Nacimiento en este año </i></p>
<div class="input-group date form_datetime col-md-8"  data-date-format="dd MM yyyy"  data-link-field="dtp_input1">
<input type="text" class="form-control form-control-p-e" id="date_nacer" name="date_nacer" value="<?=$date_nacer?>"  >
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="fecha_filter" id="mirror_field"   />

</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-2'>
<input  type='text' class="form-control form-control-p-e" id="age" name="age"  >
 </div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input  type="text" class="form-control form-control-p-e"  name="cedula" value="<?=$row->Cedula?>" placeholder="000-0000000-0" data-mask="000-0000000-0"   ></div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Teléfono celular </label>
<div class="col-sm-6">						
<input  type="text" id="form_phonecel" class="form-control bfh-phone" name="tel_cel" value="<?=$row->Telefono?>"  >
</div>
</div>

<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-4">
<input  type="text" class="form-control" name="calle" value="<?=$row->Calle?>"  >
</div>
		
</div>
</div>
 


</div>

 </div>
 </form>
 </div>
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
