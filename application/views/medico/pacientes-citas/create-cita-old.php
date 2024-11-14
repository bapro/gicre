<?php if($centro_type !='Salud ocupacional'){?>
<div class="col-md-12"> 
<div id="patientHint"></div>
</div>
<div class="col-md-12" id="hide_patientf"> 

<div class="col-md-12 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h1 class="h1 hide_crear_nueva_cita">Crear Nueva Cita</h1>
<?=$this->session->flashdata('error_messages');?>
<?php echo validation_errors(); ?>

<hr id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
<?php 
if($is_admin=="yes"){
	$controller="admin";

} else {
	$controller="medico";
	
}
 ?>
 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url("$controller/create_cita_");?>" > 
<input  type="hidden" name="controllername"   value="<?=$controller?>"  >

 <input  type="hidden" name="creadted_by"   value="<?=$name?>"  >
<input  type="hidden" name="id_user" id="id_user"  value="<?=$id_user?>"  >
<div class="tab-content"  style="margin-left:6%" >
<div  id="Datos_personales" class="cita-border"> 
<h4 class="cita-title">I- DATOS PERSONALES</h4>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control required" value="<?php echo set_value('nombre'); ?>" placeholder="Nomres Apellidos" id="nombre" name="nombre"   >
</div>
<div class="col-sm-12 table-responsive" id="nombre_info"></div>
</div>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Apodo</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control" value="<?php echo set_value('apodo'); ?>" placeholder="Apodo" name="apodo"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Subir la foto del paciente</label>
<div class="col-sm-6">
<input type="file" class="file" name="picture"  id="picture" onchange="get_detail();">
<span id="divFiles" style="color:red" ></span>
<input type="hidden"  name="photo_location"  class="photo_location" value="0">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula/Pasaporte</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula"  placeholder="00000000000" data-mask="00000000000"   >
</div>
<div id="cedula_info"></div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-3" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>

<div class="input-group date" id="dateOfBirth">
<input type="text" class="form-control required" id="date_nacer" name="date_nacer" value="<?php echo set_value('date_nacer'); ?>" />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden" name="date_nacer_format" id="mirror_field"  value="2010-01-01" />


</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control " id="age" name="age"  readonly >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-3 seg">

<select class="form-control select2 required"  style="width:100%"   name="seguro_medico" id="seguro_medico"  >
<option></option>
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
<div id="load-time-seguro"></div>
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
<div class="col-sm-3">						
<input type="text" class="form-control bfh-phone required"  id="form_phonecel" name="tel_cel" value="<?php echo set_value('tel_cel'); ?>"  >
</div>
<div id="phone_info"></div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="form_phoneres" name="tel_resi"   >

</div>
</div>
<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" id="emailtest" name="email" class="form-control"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="sexo" id="sexo"  >
<option><?php echo set_value('sexo'); ?></option>
<option >Masculino</option>
<option >Feminina</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="estado_civil" id="estado_civil">
<option><?php echo set_value('estado_civil'); ?></option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>No aplicado</option>
</select>
</div>
</div>
<div class="form-group nat">
<label class="control-label col-sm-3" ><span class="req">*</span> Nacianalidad</label>
<div class="col-sm-4 na">
<select  class="form-control  select2 required"  style="width:100%" id="nacionalidad"  name="nacionalidad"  >
<option><?php echo set_value('nacionalidad'); ?></option>
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
<div class="col-sm-4 pro">

<select class="form-control select2 "  style="width:100%"  name="provincia" id="provincia"  onChange="getMun(this.value);" >
<option></option>
<?php
foreach($provinces as $listElement){
?>
<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
<?php
}
?>
</select>
<div id="load-time-provincia"></div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">
<select class="form-control select2 "  name="municipio" id="municipio_dropdown"  disabled>

</select>

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Barrio </label>
<div class="col-sm-4">
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
<div class="col-sm-3">
<input type="text" class="form-control"  name="contacto_em_tel1" >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-3">
<input type="text" class="form-control"  name="contacto_em_tel2"   >

 </div>
</div>
 </div>
<ul class="nav nav-tabs">
    <li class="active"><a class="show-btn-cita" data-toggle="tab" href="#home">CREAR CITA</a></li>
    <li title="Si desea facturar sin realizar citas use esta opción"><a data-toggle="tab" class="show-btn-fac-amb" href="#menu1">CREAR FACTURA AMBULATORIA</a></li>
  <li ><a style="color:red;" class="show-btn-emergencia" data-toggle="tab" href="#emergencia">EMERGENCIA</a></li>
  <li ><a style="color:red;" class="show-btn-hospitalizacion" data-toggle="tab" href="#hospitalizacion">HOSPITALIZACION</a></li>
  </ul>
  <br/>
<div  id="home" class="active cita-border tab-pane fade in">
<h4>III- DATOS CITAS</h4>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<input class="form-control  required"   name="causa" id="causa-title0"  />


</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 "  style="width:100%" name="centro_medico" id="centro_medico" >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time"></div>
 </div>
 </div>
<?php 
if($perfil=="Medico"){

 	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	echo"<input name='especialidad' type='hidden' value='$area'/>";
	echo"<input name='doctor' id='doctor_dropdown' type='hidden' value='$id_user'/>";
 } else { ?>

<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-4 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad" disabled >
 
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
	<?php
	}
	?>
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-3" >
<div class="input-group date" id="fechaPro">
<input type="text" class="form-control required" id="fecha_propuesta1" name="fecha_propuesta" disabled />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden"  id="weekday" name="fecha_filter"   />

</div>
<div class="col-sm-7 col-md-offset-3" >
<p id='horario-info'></p>
</div>
</div>

 </div>
 <div  class="tab-pane fade in cita-border"  id="menu1">
<h4>IV- DATOS FACTURA</h4>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 required"  style="width:100%" name="factura-centro" id="factura-centro" >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time"></div>
 </div>
 </div>
<?php 
if($perfil=="Medico"){

 	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	echo"<input name='factura-esp' type='hidden' value='$area'/>";
	echo"<input name='facturar-doc'  type='hidden' value='$id_user'/>";
 } else { ?>

<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-4 esp">
<select class="form-control select2 required"  style="width:100%" id="factura-esp" name="factura-esp"  onChange="getDocFac(this.value);" disabled >
 
</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control select2 required"  style="width:100%"  name="facturar-doc" id="facturar-doc" disabled >
</select>

</div>
<div id="load-fac-div"></div>
</div>
<?php
	}
	?>

 </div>
 
 
 <div  id="emergencia" class="cita-border tab-pane fade in">
<h4>III- DATOS DE LA ADMISION</h4>

<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 required"  style="width:100%" name="emergencia-centro" id="emergencia-centro" >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time"></div>
 </div>
 </div>


<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<input class="form-control  required"   name="em_name" id="causa-title2"  />


</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-3">Paciente Referido Por</label>
<div class="col-sm-4 centrom">
<select class="form-control emergencia required" name="paciente_referido" id="paciente_referido" >
 <option value="" ></option>
 <?php
foreach($queryrp->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
 </select>
 <div id="load-time"></div>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Medio De Llegado</label>
<div class="col-sm-4">
<select class="form-control emergencia required"  id="medio_llegado" name="medio_llegado"  >
 <option value=""></option>
  <?php
foreach($queryml->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Enviado A</label>
<div class="col-sm-4">
<select class="form-control select2 required"   name="enviado_a" id="enviado_a"  >
<option value=""></option>
<option value='1'>Triaje</option>
<option value='2'>Emergencia General</option>
<option value='3'>Emergencia Pediatría</option>
<option value='4'>Quirofano</option>
<option value='5'>Emergencia Obstétrica Y Ginecología</option>
<option value='6'>Reanimación</option>
</select>

</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-3">Estado De Paciente</label>
<div class="col-sm-4">
<select class="form-control emergencia required"  name="estado_paciente" id="estado_paciente"  >
<option value=""></option>
 <?php
foreach($queryep->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
</select>
</div>
</div>

 </div>
 
 
  <div  id="hospitalizacion" class="cita-border tab-pane fade in">
<h4>IV- DATOS DE LA HOSPITALIZACION</h4>

<div id="loadHospForm"></div>


 </div>
 
 <a href="#"  id="" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

<input type="hidden" value="<?=$controller?>" name="controller"/>
 <input type="hidden" name="orientation" value="0" id="orientation"/>
 <div class="form-group">
<div class="col-sm-3" >
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
 </form>
  </span>
 </div><!--row background_ end -->
 </div>
 </div><!--container-->
<?php } ?>
</div>
	
 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>

	<!-- *** FOOTER END *** -->

	<!-- *** COPYRIGHT ***
	_________________________________________________________ -->


	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script>
<!--<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
 <script src="<?=base_url();?>assets/js/autocomplete.js"></script> 
<script>

function loadHospForm(){
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('searchAutoComplete/loadHospForm');?>',
	data:{required:$("#isSeguroTitle").val(),id_user:<?=$id_user?>,titleId:3 },
	success: function(data){
	
	$("#loadHospForm").html(data);
	
	},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$( "#loadHospForm").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
}

loadHospForm();

moment.locale('es');
var timerc = null;
$("#cedula").keyup(function(){
       clearTimeout(timerc); 
       timerc = setTimeout(usuario_ced, 2000)
});

function usuario_ced(){
var cedula =$("#cedula").val()
if(cedula == "") {
$("#cedula_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_cedula_exist?cedula="+cedula, function( data ){
$( "#cedula_info" ).html( data ); 
$( "#cedula_info" ).show(); 		   
});
}
}



$("#nombre").keyup(function(){
var nombre= $(this).val();
if(nombre == "") {
$("#nombre_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_patient_exist?nombre="+nombre, function( data ){
$( "#nombre_info" ).html( data ); 
$( "#nombre_info" ).show(); 		   
});
}
});
	



var timer = null;
$("#form_phonecel").keyup(function(){
	var tel_cel= $(this).val();
       clearTimeout(timer); 
       timer = setTimeout(usuario_terco(tel_cel), 2000)
});

function usuario_terco(tel_cel){
var nombre= $("#nombre").val();
var date_nacer= $("#date_nacer").val();
if(tel_cel == "") {
$("#phone_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/usuario_terco?tel_cel="+tel_cel+"&nombre="+nombre+"&date_nacer="+date_nacer, function( data ){
$( "#phone_info" ).html( data ); 
$( "#phone_info" ).show(); 		   
});
}
};

</script>
</body>
	</html>