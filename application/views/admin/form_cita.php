<!--<div id="my_camera"></div>
<input type="button" value="Take Snapshot" onClick="take_snapshot()">
 <input type="button" value="Save Snapshot" onClick="saveSnap()">
<div id="results" ></div>-->
<div id="show_patient_by_cedula"></div>
<div id="hide_form_cita">
<form  class="form-horizontal " id="ff"  method="post"  action="<?php echo site_url('admin/save_patients_appointments');?>" > 

<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 

<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombre</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control" id="nombre" name="nombre"   >


</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Apellido </label>
<div class="col-sm-6">

<input type="text" class="form-control" id="apellido" name="apellido"  >

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3"><span class="req">*</span> Cedula</label>
<div class="col-sm-3">                                                       
<input type="text" class="form-control"  name="cedula" placeholder="000-0000000-0" data-mask="000-0000000-0"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="alias"   >

</div>
</div>

<div id="hideyear" style="">
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-7" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date form_datetime col-md-8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" onchange="display_age()" id="date_nacer" name="date_nacer" Placeholder="Seleccionar fecha" readonly required>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="fecha_filter" id="mirror_field"   />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control" id="age" name="age"  readonly >
</div>
</div> 
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">

<label class="radio-inline">
<input type="radio" name="frecuencia" value="Primera vez" checked>
Primera vez
</label>
<label class="radio-inline">
<input type="radio" name="frecuencia" value="Subsecuente" >
Subsecuente
</label>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input type="text" class="form-control bfh-phone"  id="form_phonecel" name="tel_cel"  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="form_phoneres" name="tel_resi"   >

</div>
</div>
<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3"><span class="req">*</span>Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" id="emailtest" name="email" class="form-control"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control" name="sexo" id="sexo"  >
<option value="">Selecionne</option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control" name="estado_civil" id="estado_civil">
<option value="">Selecionne</option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>Menor</option>
</select>
</div>
</div>
<div class="form-group nat">
<label class="control-label col-sm-3" ><span class="req">*</span> Nacianalidad</label>
<div class="col-sm-6 na">
<select style="border-radius:20px" class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" id="nacionalidad"  name="nacionalidad"  >
<option value="">Selecionne</option>
<?php 

foreach($countries as $row)
{ 
echo '<option value="'.$row->short_name.'">'.$row->short_name.'</option>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true"   name="seguro_medico" id="seguro_medico" >
<option value="">Selecionne</option>
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
<div id="seguro_input"></div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">

<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true"  name="provincia" id="provincia"  onchange="selectProvincia(this.options[this.selectedIndex].value)">
<option value="">Selecionne la provincia</option>
<?php
foreach($provinces as $listElement){
?>
<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">
<select class="form-control"  name="municipio" id="municipio_dropdown"  >

</select>
<span id="municipio_loader"></span>
</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"><span class="req">*</span> Barrio </label>
<div class="col-sm-5">
<input type="text" class="form-control"  name="barrio"   >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"><span class="req">*</span> Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="calle"   >
</div>
		
</div>
<a href="#"  id="backToTop" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div>
 
<div class="tab-pane" id="Contactos_de_emergencia">

<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_nombre">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_alias">
</div>
</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-sm-3" >Celular</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_cel">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_tel1" >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_tel2"   >

 </div>
</div>
 </div>
<div class="tab-pane" id="En_case_de_menores_de_edad">

<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Responsable legal</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="responsable_legal"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Cedula ó Pasaporte</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="cedula_o_pass_menos_edad"   >
</div>
</div>
</div>
<div class="tab-pane" id="Datos_citas">
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" name="causa" id="causa" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->title.'</option>';
}
?>

</select>

</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="centro_medico" id="centro_medico" >
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="especialidad" name="especialidad"  onchange="selectDoctor(this.options[this.selectedIndex].value)" >
 <option value="">Selecionne</option>
 <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control"  name="doctor" id="doctor_dropdown"  >

</select>
<span id="doctor_loader"></span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control"  name="fecha_propuesta"  readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" value="" readonly />
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
