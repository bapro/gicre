	<!-- *** welcome message modal box *** -->

	<body >
<div class="col-md-12"> 
<div id="patientHint"></div>
</div>
<div class="col-md-12" id="hide_patientf"> 
<button type="button"  class="show-cita-form green-btn">Crear Nueva Cita</button>
<br/><br/>

<div class="col-md-12 " id="show_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;display:none" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h1 class="h1 show_crear_nueva_cita">Crear Nueva Cita</h1>
<hr id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
 <?php if($is_admin=="yes") {?>
 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('admin/save_patients_appointments');?>" > 
 <?php } else {?>
<form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('medico/save_patients_appointments');?>" > 
 <?php } ?>

 <input  type="hidden" name="creadted_by"   value="<?=$name?>"  >

<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div  id="Datos_personales" class="cita-border"> 
<h4 class="cita-title">I- DATOS PERSONALES</h4>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control required" placeholder="Nomres Apellidos" id="nombre" name="nombre"   >
<span class="required-text"></span>
</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3"> Subir la foto del paciente</label>
<div class="col-sm-6">
<input type="file" class="file" name="picture"  id="picture" onchange="get_detail();">
<span id="divFiles" style="color:red" ></span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula/Pasaporte</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="cedula" name="cedula"  placeholder="000000000000" data-mask="000000000000"   >
</div>
<div id="cedula_info"></div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-7" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date form_datetime col-md-8 "  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control required" data-name="display_age"  onchange="display_age()" id="date_nacer" name="date_nacer" value="01 Enereo 2010" readonly>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="date_nacer_format" id="mirror_field"  value="2010-01-01" />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control required" id="age" name="age"  readonly >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> dSeguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2 required"  style="width:100%"   name="seguro_medico" id="seguro_medico" >
<option value="" hidden></option>
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
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input type="text" class="form-control bfh-phone required"  id="form_phonecel" name="tel_cel"  >
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
<select class="form-control select2 required" name="sexo" id="sexo"  >
<option value="" hidden></option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="estado_civil" id="estado_civil">
<option value="" hidden></option>
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
<select  class="form-control  select2 required"  style="width:100%" id="nacionalidad"  name="nacionalidad"  >
<option value="" hidden></option>
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
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">

<select class="form-control select2 required"  style="width:100%"  name="provincia" id="provincia"  onChange="getMun(this.value);" >
<option value="" hidden></option>
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
<select class="form-control select2 required"  name="municipio" id="municipio_dropdown"  disabled>

</select>

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Barrio </label>
<div class="col-sm-5">
<input type="text" class="form-control"  name="barrio"   >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="calle"   >
</div>
		
</div>

</div>
 
<div  id="Contactos_de_emergencia" class="cita-border">
<br/>
<h4>II- CONTACTOS DE EMERGENCIA</h4>
<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_nombre">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Parentesco</label>
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
<div  id="En_case_de_menores_de_edad" class="cita-border">
<br/>
<h4>III- RELACIONES FAMILIARES</h4>
<div id='tienetutor' style='color:#B69200'></div>
  <?php $this->load->view('admin/pacientes-citas/create-patient-tutor'); ?>
</div>
<div  id="Datos_citas" class="cita-border">
<br/>
<h4>IV- DATOS CITAS</h4>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control select2 required"  style="width:100%" name="causa" id="causa" >
<option value="" hidden></option>
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
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" >
 <option value="" hidden></option>
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
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onChange="getDoc(this.value);" >
 <option value="" hidden></option>
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
<select class="form-control select2 required"  style="width:100%"  name="doctor" id="doctor_dropdown" disabled >
</select>

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-7" >
<div class="input-group date form_pro col-md-8 "  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" name="fecha_propuesta" readonly>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>--><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" />

</div>

</div>
</div>
 </div>
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>

 <a href="#"  id="" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<br/><br/><br/><br/>
 </form>
  </span>
 </div><!--row background_ end -->
 </div>
 </div><!--container-->


	</body>
 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>

	<!-- *** FOOTER END *** -->

	<!-- *** COPYRIGHT ***
	_________________________________________________________ -->


	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script> 
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>

<script>
$(window).on( "load", function() {display_age()})


$("#cedula").keyup(function(){
var cedula= $(this).val();
if(cedula == "") {
$("#cedula_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_cedula_exist?cedula="+cedula, function( data ){
$( "#cedula_info" ).html( data ); 
$( "#cedula_info" ).show(); 		   
});
}
});





	//----toggle intrafamilial
	$('.show-cita-form').click(function () {
	$('.show-cita-form').text($('.show-cita-form').text() == 'Ocultar Formulario' ? 'Crear Nueva Cita' : 'Ocultar Formulario'); 
    $("#show_form").slideToggle("slow");	
	})




</script>
	</html>