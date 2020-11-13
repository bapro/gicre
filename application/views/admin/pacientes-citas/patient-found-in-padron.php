<?php

$this->padron_database = $this->load->database('padron',TRUE);
$name=($this->session->userdata['admin_name']);

?>
<body onload="display_age()">	   
<div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" style="font-size:13px">
<li class="active" ><a href="#Datos_personales"  data-toggle="tab" class="disabled_button">I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a href="#Contactos_de_emergencia" data-toggle="tab" class="disabled_button">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a href="#En_case_de_menores_de_edad" class="disabled_button" data-toggle="tab">III- RELACIONES FAMILIARES</a></li>
<li><a href="#Datos_citas" id="abled_button" data-toggle="tab">IV- DOTOS CITAS <i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>

</ul>

<hr class="rem-hr" id="hr_ad"/>
<?php foreach($photo as $ph)
echo '<img width="230"  src="data:image/jpeg;base64,'. base64_encode($ph->IMAGEN) .'" />';?> 
 <br/><br/>

</div>
<?php 
foreach($patient as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$nacer = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->FECHA_NAC)));	
$nacer = date("d-m-Y H:i:s", strtotime($row->FECHA_NAC));	 
	
?>
<div class="col-md-9 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h3 class="h3">Crear Nueva Cita</h3>
<h4 class="h4">
 Paciente : <?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>
 | Cedula : <?=$row->MUN_CED;?>-<?=$row->SEQ_CED;?>-<?=$row->VER_CED;?>
</h4>
<span class="missingc" style="display:none;color:red">La pestaña <b>DATOS CITAS</b> tiene campos obligatorios.</span>
<span class="missingdp" style="display:none;color:red">La pestaña <b>DATOS PERSONALES</b> tiene campos obligatorios.</span>


<hr class="rem-hr" id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
 
 <form  class="form-horizontal " id="sendcita"  method="post"  action="<?php echo site_url('admin/save_patients_appointments_padron');?>" > 
<input  type="hidden" name="creadted_by"   value="<?=$name?>"  >
<input  type="hidden" name="ced1"   value="<?=$row->MUN_CED?>"  >
<input  type="hidden" name="ced2"   value="<?=$row->SEQ_CED?>"  >
<input  type="hidden" name="ced3"   value="<?=$row->VER_CED?>"  >
<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="form-group">
<label class="control-label col-sm-3"> Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>"  readonly >
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

<input type="hidden" name="date_nacer_format" id="mirror_field" value="<?=$row->FECHA_NAC?>"  />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control" id="age" name="age"  readonly >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2"   name="seguro_medico" id="seguro_medico" >

<?php 

foreach($seguro_medico as $rowseg)
{ 
echo '<option value="'.$rowseg->id_sm.'">'.$rowseg->title.'</option>';
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
<input type="text" class="form-control bfh-phone"  id="form_phonecel" name="tel_cel" value="<?=$row->TELEFONO?>" >
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
<label class="control-label col-sm-3" ><span class="req">*</span> Nacionalidad</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="Republica Dominicana" readonly >
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
<div class="form-group nat">
<label class="control-label col-sm-3" ><span class="req">*</span> Lugar de Nacimiento</label>
<div class="col-sm-6 na">
<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?=$row->LUGAR_NAC?>" readonly >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">
<?php $provincia=$this->padron_database->select('DESCRIPCION')->where('COD_PROVINCIA',$row->COD_CIUDAD)->get('provincia')->row('DESCRIPCION');?>
<input type="text" class="form-control"  name="provincia" value="<?=$provincia?>" readonly >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">
<?php $municipio=$this->padron_database->select('DESCRIPCION')->where('COD_MUNICIPIO',$row->COD_MUNICIPIO)->get('municipio')->row('DESCRIPCION');?>
<input type="text" class="form-control"  name="municipio" value="<?=$municipio?>" readonly >

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
<div class="tab-pane" id="En_case_de_menores_de_edad">
<div id='tienetutor' style='color:#B69200'></div>
  <?php $this->load->view('admin/pacientes-citas/create-patient-tutor');  ?>
</div>
<div class="tab-pane" id="Datos_citas">
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control select2 required"  name="causa" id="causa" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $rowcaus)
{ 
echo '<option value="'.$rowcaus->id.'">'.$rowcaus->title.'</option>';
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
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onchange="selectDoctor(this.options[this.selectedIndex].value)" >
 <option value="">Selecionne</option>
 <?php 

 foreach($especialidades as $rowesp)
 { 
 echo '<option value="'.$rowesp->id_ar.'">'.$rowesp->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">

<select class="form-control select2  required"  style="width:100%"  name="doctor" id="doctor_dropdown"  >

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

	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script> 
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
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
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getMuncipio');?>',
	data:'id_mun='+val,
	success: function(data){
		$("#municipio_dropdown").html(data);
		  
	}
	});
}

$("#sendc").hide();


$(".disabled_button").click(function(){
$("#sendc").fadeOut();

});


$("#abled_button").click(function(){
$("#sendc").fadeIn();

});
</script>

</html>