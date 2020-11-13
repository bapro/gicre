	<!-- *** welcome message modal box *** -->
<style>


</style>
	<body >
<div class="container" >

<h1>Crear Nueva Cita</h1>
<div class="col-md-12 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<?=$this->session->flashdata('error_messages');?>
<?php echo validation_errors(); ?>

<div id="show_patient_by_cedula"></div>
 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url("medico/create_cita_");?>" > 
<input  type="hidden" value="0"  name="seguro_medico"    >
<input  type="hidden" value="0"  name="plan"    >
<input  type="hidden" value="0"   name="orientation"   >
<input  type="hidden" value="medico"   name="controllername"   >
<input  type="hidden" name="creadted_by"   value="<?=$id_user?>"  >
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
<input  type="text" class="form-control" id="cedula" name="cedula"  placeholder="000000000000" data-mask="000000000000"   >
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

<div  id="home" class="active cita-border tab-pane fade in">
<h4>III- DATOS CITAS</h4>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-4 cau">
<select class="form-control select2 "  style="width:100%" name="causa" id="causa" >
<option value="" hidden></option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->title.'">'.$row->title.'</option>';
}
?>

</select>

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
	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	echo"<input name='especialidad' type='hidden' value='$area'/>";
	echo"<input name='doctor' id='doctor_dropdown' type='hidden' value='$id_user'/>";
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
<div class="form-group">
<div class="col-sm-3" >
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
 </div>

<br/><br/><br/><br/>

 </form>

 </div><!--row background_ end -->
 </div>
</div>

</div>

 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>



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

<script>


moment.locale('es');
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