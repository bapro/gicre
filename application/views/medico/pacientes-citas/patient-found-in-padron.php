<?php

$this->padron_database = $this->load->database('padron',TRUE);
 
if($is_admin=="yes"){
$controller="admin";
} else {$controller="medico";}

$area_id= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
if($area_id ==87){
	 $display_optometra="style='display:none'";
  } else{
	$display_optometra=""; 
 } 

 ?>

<body onload="display_age()">	   
<div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" style="font-size:13px">
<li class="active" ><a href="#Datos_personales"  data-toggle="tab" class="disabled_button">I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a href="#Contactos_de_emergencia" data-toggle="tab" class="disabled_button">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a href="#Datos_citas" class="abled_button show-btn-cita" data-toggle="tab">III- DATOS CITAS <i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li <?=$display_optometra?>><a href="#FACTURAR" class="abled_button show-btn-fac-amb" data-toggle="tab">IV- FACTURA AMBULATORIA  <span style="color:red;font-size:13px"><br/>Si desea facturar sin realizar citas use esta opción</span><i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
</ul>

<hr class="rem-hr" id="hr_ad"/>
<?php 
$Cambiar="Cambiar";$Subir="Subir";$padron=1;$no_padron=0;
foreach($photo as $ph)

echo '<img width="230"  src="data:image/jpeg;base64,'. base64_encode($ph->IMAGEN) .'" />';
 if(!isset($ph->IMAGEN)){echo "<p style='text-align:center'>No hay foto por este paciente en el padron</p>";}
 ?>
 <br/><br/>

</div>
<?php 
foreach($patient as $row)
$nacer = date("d-m-Y", strtotime($row->FECHA_NAC)); 

?>
<div class="col-md-9 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<h4 class="h4">
 Paciente : <?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>
 | Cedula : <?=$row->MUN_CED;?>-<?=$row->SEQ_CED;?>-<?=$row->VER_CED;?>
</h4>
<span class="missingc" style="display:none;color:red">La pestaña <b>DATOS CITAS</b> tiene campos obligatorios.</span>
<span class="missingdp" style="display:none;color:red">La pestaña <b>DATOS PERSONALES</b> tiene campos obligatorios.</span>
<?=$this->session->flashdata('error_messages');?>
<?php echo validation_errors(); ?>

<hr class="rem-hr" id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
 
 <form  class="form-horizontal " id="sendcita" enctype="multipart/form-data" method="post"  action="<?php echo site_url("$controller/save_new_patient_from_padron");?>" > 
<input  type="hidden" name="creadted_by"   value="<?=$name?>"  >
<input  type="hidden" name="id_user" id="id_user"  value="<?=$id_user?>"  >
 <input  type="hidden" name="ced1"   value="<?=$row->MUN_CED?>"  >
<input  type="hidden" name="ced2"   value="<?=$row->SEQ_CED?>"  >
<input  type="hidden" name="ced3"   value="<?=$row->VER_CED?>"  >
<!--<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm enable-send send_cit"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<br/>-->
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="form-group">
<label class="control-label col-sm-3"> Nombre</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>"  readonly >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">
<?php if(isset($ph->IMAGEN)){echo "$Cambiar";} else {echo "$Subir";}?>
 <?php if(isset($ph->IMAGEN)){echo '<input type="hidden" class="photo_location" name="photo_location" value="'.$padron.'"/>';} else {echo '<input type="hidden" name="photo_location" class="photo_location" value="'.$no_padron.'"/>';}?>
 la foto</label>
<div class="col-sm-6">
<input type="file" class="file" name="picture"  id="picture" onchange="get_detail();">
<span id="divFiles" style="color:red" ></span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?>" readonly   ></div>
</div>


<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-4" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<input type="text" class="form-control"  id="date_nacer" name="date_nacer" value="<?=$nacer?>" readonly required>
<?php $FECHA_NACi = date("Y-m-d", strtotime($row->FECHA_NAC)); ?>
<input type="hidden" name="date_nacer_format" id="mirror_field" value="<?=$FECHA_NACi?>"  />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control" id="age" name="age"  readonly >
<div id="load-time-age" style="font-size:15px;color:blue"><em><i>calculando la edad...</i></em></div>
</div>
</div>
<?php if($area_id=='87'){
?>
<input  type="hidden"  name="seguro_medico" value="0"  >
<input  type="hidden"  name="plan" value="0"  >
<input  type="hidden"  name="inputname" value="0"  >
<input  type="hidden"  name="inputf" value="0"  >
<?php
}else{
?> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2"   name="seguro_medico" id="seguro_medico" >
<option></option>
<?php 

foreach($seguro_medico as $rowseg)
{ 
echo '<option value="'.$rowseg->id_sm.'">'.$rowseg->title.'</option>';
}
?>
</select>
<div id="load-time-seguro"></div>
</div>
</div>
<div id="seguro_input"></div>
<?php } ?>
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
<input type="text" class="form-control bfh-phone"  id="form_phonecel" name="tel_cel" value="<?php echo set_value('tel_cel'); ?>"  >
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
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="email" id="emailtest" name="email" class="form-control"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<?php 

if($row->SEXO=="F"){
	$sexo="Feminino";
}
else{
	$sexo="Masculino";
}
?>
<input type="text" class="form-control" id="sexo" name="sexo" value="<?=$sexo?>" readonly >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Nacionalidad</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="Dominican Republic" readonly >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<?php 

if($row->EST_CIVIL=="S"){
	$estado_civil="Soltero";
}
else if ($row->EST_CIVIL=="C"){
	$estado_civil="Casado";
}

else {
	$estado_civil="Casado";
}

$sql ="SELECT name FROM estado_civil";
$query = $this->db->query($sql);


?>

<select class="form-control select2" name="estado_civil" id="estado_civil">
<?php 
foreach($query->result() as $est)
{
if($est->name == $estado_civil){
?>
<option selected><?=$est->name?></option>
<?php 
}
else {
?>
<option ><?=$est->name?></option>
<?php
}
}
?>
</select>
</div>
</div>

<!--<div class="form-group nat">
<label class="control-label col-sm-3" ><span class="req">*</span> Lugar de Nacimiento</label>
<div class="col-sm-6 na">
<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?=$row->LUGAR_NAC?>" readonly >
</div>
</div>-->

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Provincia</label>
<div class="col-sm-5 pro">
<select class="form-control select2"  style="width:100%"  name="provincia" id="provincia"  onChange="getMuncipio(this.value);" >
<option value="" hidden></option>
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
<label class="control-label col-sm-3"><span class="req">*</span> Municipio</label>
<div class="col-sm-4">
<select class="form-control select2 required"  name="municipio" id="municipio_dropdown"  disabled>

</select>

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Barrio </label>
<div class="col-sm-5">
<?php $barrio=$this->padron_database->select('DESCRIPCION')->where('COD_MUNICIPIO',$row->COD_MUNICIPIO)->get('barrio')->row('DESCRIPCION');?>
<input type="text" class="form-control"  name="barrio" value="<?=$barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="calle" value="<?=$row->CALLE?>"  >
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
<div class="tab-pane" id="Datos_citas">
<div class="form-group">
<h4 class="h4">
Crear Una Cita
</h4>
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control select2 required"  name="causa" id="causa" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $rowcaus)
{ 
echo '<option value="'.$rowcaus->title.'">'.$rowcaus->title.'</option>';
}
?>

</select>

</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" >
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $rowmedi)
 { 
 echo '<option value="'.$rowmedi->id_m_c.'">'.$rowmedi->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>

<?php 
if($perfil=="Medico"){
echo"<input  type='hidden' id='doctor_dropdown' name='doctor'   value='$id_user' >";
	echo"<input  type='hidden' name='especialidad'   value='$area_id' >";
} else{
 ?>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onChange="getDoc(this.value);" disabled>
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
<?php }  ?>
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-4" >
<div class="input-group date" id="fechaPro">
<input type="text" class="form-control required" id="fecha_propuesta1" name="fecha_propuesta" disabled />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden"  id="weekday" name="weekday"  />
<div id="load-time"></div>
</div>
<div class="col-sm-7 col-md-offset-3" >
<p id='horario-info'></p>
</div>

</div>
<div class="form-group">
<div class="col-sm-7 col-md-offset-3" >
<button type="submit"   class="btn btn-primary btn-sm enable-send send_cit"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
</div>


<div class="tab-pane" id="FACTURAR">
<h4 class="h4">
Crear Factura Ambulatoria
</h4>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-6 centrom">
<select class="form-control select2 required" name="factura-centro"  style="width:100%"  id="factura-centro" >
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $rowmedi)
 { 
 echo '<option value="'.$rowmedi->id_m_c.'">'.$rowmedi->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
 <?php 
if($perfil=="Medico"){
	$area_id= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
echo"<input  type='hidden'  name='facturar-doc'   value='$id_user' >";
	echo"<input  type='hidden' name='factura-esp'   value='$area_id' >";
} else{
 ?>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control select2 required"  style="width:100%" name="factura-esp" id="factura-esp"  onChange="getDocFac(this.value);" disabled>
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
<select class="form-control select2 required"  style="width:100%"  name="facturar-doc" id="facturar-doc" disabled >
</select>

</div>
<div id="load-fac-div"></div>
</div>
<?php } ?>
<div class="form-group">
<div class="col-sm-7 col-md-offset-3" >
<button type="submit"   class="btn btn-primary btn-sm enable-send send_cit"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
</div>

 </div>
<input type="hidden" name="<?=$controller?>" name="controller"/>
 <input type="hidden" name="orientation" id="orientation"/>
 </form>
  </span>
 </div><!--row background_ end -->
 </div><!--container-->
 </div>
 <br/> <br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>

	<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
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


//--------------------
function selectDoctor(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").prop('disabled', false);
		$("#doctor_dropdown").html(data);
	}
	});
}
//-----------------------------------
function getMuncipio(val) {
 $("#load-time-provincia").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getMuncipio');?>',
	data:'id_mun='+val,
	success: function(data){
		$("#municipio_dropdown").prop('disabled', false);
		$("#municipio_dropdown").html(data);
		$("#load-time-provincia").hide();
		  
	}
	});
}


$("#sendc").hide();


$(".disabled_button").click(function(){
$("#sendc").hide();

});

	
$(".abled_button").click(function(){
		
	if($("#seguro_medico").val() == "" ){
   alert('Cual es el seguro medico del paciente ?'); 
   $("#seguro_medico").focus();
   return false;
  }
  
  if($('.num-seg.required').val() == ""){
 alert("NO AFILIADO es obligatorio !");
	return false;
}
  

  	if($("#form_phonecel").val() == "" ){
   alert('Cual es el teléfono del paciente ?'); 
   $("#seguro_medico").focus();
   return false;
  }
  
 
	if($("#provincia").val() == "" || $("#municipio_dropdown").val() == ""){
	alert("Campos : Provincia y Municipio son obligatorios !");
	 $("#provincia").focus();
	return false;
	}
	
	

});



</script>

</html>