 <style>
 #image_file {
  opacity: 0;
  width: 0.1px;
  height: 0.1px;
  position: absolute;
}


.wrapper{

  background: #fff;
  border-radius: 5px;
  padding: 30px;
  box-shadow: 7px 7px 12px rgba(0,0,0,0.05);
}
.wrapper header{
  color: #38a7bb;
  font-size: 27px;
  font-weight: 600;
  text-align: center;
}
.wrapper form{
	 cursor: pointer;
   height: 167px;
  display: flex;
  margin: 30px 0;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border-radius: 5px;
  border: 2px dashed #38a7bb;
}
#uploadDocumento :where(i, p){
  color: #38a7bb;
}
#uploadDocumento i{
  font-size: 50px;
}
#uploadDocumento p{
  margin-top: 15px;
  font-size: 16px;
}

ul.hide-next-data-patient > li > a {font-size:16px}

 #hideda input[type="text"] {
background:#EEECEC
}
#hidedb input[type="text"] {
background:#EEECEC
}

#hidedc input[type="text"] {
background:#EEECEC
}
td,th{text-align:left}


 </style>

<?php
	function getPatientAge($birthday) {

    $age = '';
    $diff = date_diff(date_create(), date_create($birthday));
    $years = $diff->format("%y");
    $months = $diff->format("%m");
    $days = $diff->format("%d");

    if ($years) {
        $age = ($years < 2) ? '1 año' : "$years años";
    } else {
        $age = '';
        if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
        if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
    }
    return trim($age);
}


$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient as $row)
if($is_admin=="yes")
{
$controller="admin";
$atend="";

}
else{
$controller="medico";
$sql ="SELECT p_id FROM h_c_diagno_def_link where p_id='$row->id_p_a' && user_id='$id_user'";
$atendido = $this->db->query($sql);
if($atendido->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
} else {$atend="";}

}
$data['controller']=$controller;

$is_hist_med=$this->db->select('historial_id')->where('historial_id',$row->id_p_a)->get('h_c_sinopsis')->row('historial_id');
$centroType=$this->db->select('type')->where('id_m_c',$id_cm)
->get('medical_centers')->row('type');

if($area ==87){
	 $display_optometra="style='display:none'";
	 $refraccion='';
  } else{
	$display_optometra=""; 
	$refraccion="style='display:none'";
 } 


$sql_con ="SELECT id_refraccion FROM  laboratory_lentes WHERE patient=$row->id_p_a  &&  id_doc=$id_user ";
$atendido_con = $this->db->query($sql_con);
if($atendido_con->num_rows() > 0){
$number="<i style='font-size:11px;color:red'>$atendido_con->num_rows</i>";
$inforef="&#013 refraccion creada";	
$checked2="<i style='color:green;;font-size:22px' class='fa fa-check' aria-hidden='true' ></i>";
}else{
$inforef="";
$checked2="";
$number='';	
}

$id_p_a_h = encrypt_url($row->id_p_a);
 $id_user_h = encrypt_url($id_user);
  $id_cm_h = encrypt_url($id_cm);
    $area_h = encrypt_url($area);
	$from_view = encrypt_url(1);
	
$query_patient_files=$this->db->select('id_p_a')->where('id_p_a',$row->id_p_a)->get('patients_folders');	

?>

 <div class="col-md-12"> 
<div id="patientdata"></div>
</div>
<div class="col-md-12" id="hide_patientf"> 
<span id="suc"><?php echo $this->session->flashdata('save_patient_success'); ?></span>
 <div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" >
<div id="load-foto"></div>
<?php

if($row->photo=="padron"){
$readonlyag="readonly";
} 
else if($row->photo==""){
$readonlyag="";
	
}
else{
	$readonlyag="";

}
?>
<br/>
<li class="active addb" ><a href="#Datos_personales"  data-toggle="tab" >DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li <?=$display_optometra?>><a class="addb" href="#patient_files" data-toggle="tab">ARCHIVOS (<?=$query_patient_files->num_rows();?>)</a></li>
<li <?=$display_optometra?>><a class="addb" href="#Contactos_de_emergencia" data-toggle="tab">CONTACTOS DE EMERGENCIA</a></li>
<li><a class="addb" href="#En_case_de_menores_de_edad" data-toggle="tab">RELACIONES FAMILIARES</a></li>
<?php if($centroType=="Salud ocupacional"){?>
<li><a  data-target="#verEmpData" href="<?php echo site_url("creation/getClockResultPatient/$row->id_p_a/$id_user/$id_cm")?>" data-toggle="modal">FICHA DE EMPLEADO</a></li>
<li><a  data-target="#verMedSo" href="<?php echo site_url("salud_ocupacional_med/getMedicamentoSalOcup/$row->id_p_a/$id_user/$id_cm")?>" data-toggle="modal">DRUG</a></li>
<?php } 
else{ ?>
<li><a>
<form method="POST" ACTION="<?php echo site_url("search/familyRelationship"); ?>">
<input name="send-pat-id" id="idpatient" value="<?=$row->id_p_a?>" type="hidden"/>
<input type="hidden" name="send-user-id" value="<?=$id_user?>"/>
<button type="submit">FICHA FAMILIAR</button>
</form>
</a></li>
<?php }?>
<li>
<a class="remb create-cita-del-paciente" href="#Datos_citas" data-toggle="tab"> DATOS CITAS <span style="color:black">(<?=$number_cita?>)</span> <br/><?=$nueva_cita?></a>
</li>

<li <?=$display_optometra?>><a class="remb showFactAmb" href="#FACTURAR" data-toggle="tab">FACTURA AMBULATORIA <span style="color:red;font-size:13px"><br/>Si desea facturar sin realizar citas use esta opción</span></a></li>

<!--<li <?=$display_optometra?>><a  class="remb" data-toggle="tab" href="#emergencia">VI- EMERGENCIA (<?=$number_patient_admitas?>)</a></li>-->
<li <?=$display_optometra?> ><a  class="remb" data-toggle="tab" href="#hospitalizacion">HOSTIPITALIZACION </a></li>
<?php if($is_hist_med !="") {
 if($perfil=="Admin") {
	  $areaid_ad = encrypt_url(0);
	  $hist = encrypt_url(1);
	 ?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$id_user_h/$areaid_ad/$id_cm_h/$hist/$id_user_h/$from_view"); ?>">HISTORIAL MEDICA</a></li>
<?php } else if($perfil=="Medico"){
	$hist = encrypt_url(1);
?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$id_user_h/$area_h/$id_cm_h/$hist/$id_user_h/$from_view"); ?>">HISTORIAL MEDICA</a></li>
<?php	
}else if($perfil=="Asistente Medico"){
$areaid= $this->db->select('area')->where('id_user',$doc)->get('users')->row('area');
 $doc_h = encrypt_url($doc);
  $areaid_h = encrypt_url($areaid);
  $hist = encrypt_url(4);
?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$doc_h/$areaid_h/$id_cm_h/$hist/$id_user_h/$from_view"); ?>">HISTORIAL MEDICA </a></li>
<?php
} }?>
<li <?=$display_optometra?>><a href="<?php echo base_url("$controller/orden_medica/$id_user_h/$id_p_a_h")?>">ORDEN MEDICA </a></li>

<li>
<a class="remb loadPsP" href="#presupuesto" data-toggle="tab">CREAR PRESUPUESTO </a>
</li>

<li <?=$refraccion?> title="<?=$inforef?>"><a data-toggle="modal" data-target="#of-ref-mdl" href="<?php echo site_url("admin_medico/oftalRef/$row->id_p_a/$id_user/$id_cm"); ?>">REFRACCION <?=$number?> <?=$checked2?></a>
</li>

</ul>
<br/>
</div>

<?php
$crt=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updt=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

 $insert_date = date("d-m-Y H:i:s", strtotime($row->insert_date));
 $update_date = date("d-m-Y H:i:s", strtotime($row->update_date));
 
if($number_cita <=1){
	 $frecuencia_text="1.ª vez";
  } else{
	$frecuencia_text="$number_cita veces"; 
 } 
 
 if($row->nombre =="" || $row->date_nacer =="" || $row->tel_cel ==""    || $row->sexo ==""  || $row->estado_civil ==""  || $row->provincia ==""|| $row->municipio =="" || $row->nacionalidad ==""|| $row->seguro_medico==""){
$cantCreateCita="<p class='alert alert-warning' >Los campos con <span style='color:red'>*</span> son obligatorios!</p>";
$disBtnM=1;
}else{
$cantCreateCita="";
$disBtnM=0;
}
?>
<input type="hidden" value="<?=$disBtnM?>" id="disBtnM" />
<form enctype="multipart/form-data" id="savePatEmp" class="form-horizontal" method="post"   > 
<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span style="font-size:12px;float:right;font-weight:normal;color:green">Creado por <?=$crt?>, <?=$insert_date?> || Cambiado por <?=$updt?>, <?=$update_date?></span>  
<br/>
<h4 class="h4">
<span style="text-transform:uppercase"><?=$row->nombre?></span>  || Cedula : <?=$row->cedula?>  || NEC <?=$row->id_p_a?> 

<span class="hide-all-but">
 <a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?> " ></i> Editar </a>
<button type="submit"  style="float:right;display:none" class="btn btn-success btn-sm save-patient enable-send" ><i class="fa fa-floppy-o" aria-hidden="true" title="Guardar  <?=$row->nombre?>" ></i> Guardar</button>
</span>
</h4>
<div id="insertionResult" style="text-align:center"><?php echo $cantCreateCita ;?></div>
<input type="hidden" name="updated_by" id="id_user" value="<?=$id_user?>">
<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?> ">
<div class="tab-content" id="all_dis"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div id="showd" style="display:none"> 
<div class="form-group">

<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Nombres</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->nombre?>"  placeholder="Nombres Apellidos" <?=$readonlyag?>>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Apodo</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="apodo" value="<?=$row->apodo?>"  placeholder="Apodo" >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Cambiar la foto</label>
<div class="col-sm-6">
<input type="file" class="file" name="picture"  id="picture" onchange="get_detail();">
<input type="hidden"  name="photo_location"  class="photo_location" value="0">
<span id="divFiles" style="color:red" ></span>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->cedula?>" placeholder="00000000000" data-mask="00000000000"   ></div>
</div>


<div class='form-group'>
<label class='control-label col-sm-3'><span style="color:red;font-size:17px">*</span> Fecha nacimento</label>
<div class="col-sm-4" >
<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date" id="dateOfBirth1">
<input type="text" class="form-control" id="date_nacer" name="date_nacer" value="<?=$row->date_nacer?>" <?=$readonlyag?>/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
<input type="hidden" name="date_nacer_format" id="mirror_field"   />

</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-4'>
<input  type='text' class='form-control' id="age" name="age" value="<?=getPatientAge($row->date_nacer)?>" readonly >
 </div>
</div>


<div class="form-group">
<?php
if($number_cita <= 1){
	$veces="1.ª vez";
}
else{
	$veces="$number_cita veces";
}
?>
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-3">
<input  type="text" class="form-control"   value="<?=$veces?>" readonly />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input  type="text" id="form_phonecel" class="form-control bfh-phone" name="tel_cel" value="<?=$row->tel_cel?>"   >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input  type="text" id="form_phoneres" class="form-control" name="tel_resi" value="<?=$row->tel_resi?>"   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="emailtest" name="email" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control select2" name="sexo" id="sexo" >
<option hidden><?=$row->sexo?></option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2 " name="estado_civil" id="estado_civil">
<option hidden><?=$row->estado_civil?></option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>No aplicado</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Nacionalidad</label>
<div class="col-sm-6 na">
<?php 
if($row->photo=="padron"){
?>
<input  type="text" class="form-control" name="nacionalidad" value="Dominican Republic" readonly >
<?php
}else{

 ?>
<select class="form-control select2"  id="nacionalidad" name="nacionalidad">
<?php
foreach($countries as $co){
	
	if($row->nacionalidad == $co->short_name) {
	?>
	<option value="<?=$co->short_name?>" selected><?=$co->short_name?></option>
	<?php
	} else if ($row->nacionalidad==""){
		?>
	<option></option>
	<option value="<?=$co->short_name?>"><?=$co->short_name?></option>
		<?php
	} else {?>
	<option></option>
		<option value="<?=$co->short_name?>"><?=$co->short_name?></option>
		<?php
	}
}
?>
 </select>
 
 <?php
}

 ?>
</div>
</div>
<?php if($row->seguro_medico==0){?>
<input  type="hidden"  name="seguro_medico" value="0"  >

<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2"  id="seguro_medico" name="seguro_medico">
<option value=""></option>
<?php
foreach($seguro_medico as $seg){

		echo "<option value=".$seg->id_sm.">".$seg->title."</option>";
	}

?>
 </select>
 <div id="load-time-seguro"></div>
 </div>
</div>
<div class="seguro_input"></div>
<div id="seguro_input"></div>

<?php }else{?>
<div class="form-group">

<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2"  id="seguro_medico" name="seguro_medico">
<?php
foreach($seguro_medico as $seg){
	
	if($row->seguro_medico == $seg->id_sm) {
		echo "<option value=".$seg->id_sm." selected>".$seg->title."</option>";
	} else {
		echo "<option value=".$seg->id_sm.">".$seg->title."</option>";
	}
}
?>
 </select>

<div id="load-time-seguro"></div>
</div>

</div>

<div class="seguro_input"></div>
<div id="seguro_input"></div>
<?php } ?>
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Provincia</label>
<div class="col-sm-7 pro">

<select class="form-control select2 "  id="provincia" name="provincia" onChange="getMun(this.value);">
<?php
foreach($provinces as $pro){
	
	if($row->provincia == $pro->id) {
		echo "<option value=".$pro->id." selected>".$pro->title."</option>";
	} else {
		echo "<option></option>";
		echo "<option value=".$pro->id.">".$pro->title."</option>";
	}
}
?>
 </select>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Municipio</label>
<div class="col-sm-7">

<select class="form-control select2 " name="municipio" id="municipio_dropdown"  >

<?php
foreach($municipios as $mun){
	
	if($row->municipio == $mun->id_town) {
		echo "<option value=".$mun->id_town." class=".$mun->province_id_town." selected>".$mun->title_town."</option>";
	} else {
		echo "<option></option>";
		echo "<option value=".$mun->id_town." class=".$mun->province_id_town.">".$mun->title_town."</option>";
	}
}
?>
 </select>

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Barrio </label>
<div class="col-sm-7">
<input  type="text" class="form-control" name="barrio" value="<?=$row->barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-7">
<input  type="text" class="form-control" name="calle" value="<?=$row->calle?>"  >
</div>
		
</div>

</div>
<!-------------show----------------------->
<div id="hideda" >
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Nombres</label>
<div class="col-sm-9">
<input type="text" class="form-control"  value="<?=$row->nombre?>" disabled  >

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"> Apodo</label>
<div class="col-sm-4">
<input type="text" class="form-control"  value="<?=$row->apodo?>" disabled  >

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control"  value="<?=$row->cedula?>"   ></div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Fecha nacimiento </label>
<div class="col-sm-3" >
<input disabled type="text" class="form-control" value="<?=$row->date_nacer?>">

</div>

</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-4'>
<input  type='text' class='form-control'  value="<?=getPatientAge($row->date_nacer)?>" readonly >
 </div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control"   value="<?=$frecuencia_text?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input disabled type="text" class="form-control bfh-phone" value="<?=$row->tel_cel?>"   >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->tel_resi?>"   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Sexo</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->sexo?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Estado Civil</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->estado_civil?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Nacionalidad</label>
<div class="col-sm-6">
<?php 
if($row->photo=="padron"){
?>
<input  type="text" class="form-control"  value="Republica Dominicana" readonly >
<?php
}else{

 ?>
<input disabled type="text" class="form-control" value="<?=$row->nacionalidad?>">
<?php
}

 ?>
</div>
</div>
<span  <?=$display_optometra?>>
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Seguro médico</label>
<div class="col-sm-5">
<?php 
$seguroName=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
 ?>
<input disabled type="text" class="form-control" value="<?=$seguroName?>">

<input id="seguro_medico" type="hidden" class="form-control" value="<?=$row->seguro_medico?>">

</div>
</div>
<?php 
if($GET_NAMEF !=NULL){
foreach($GET_NAMEF as $get_input)
{
?>
<div class="form-group">

<label class="control-label col-sm-3" ><?=$get_input->inputf;?></label>
<div class="col-sm-3">
<input  type="text"  class="form-control" value="<?=$get_input->input_name;?>" disabled>
<input  type="hidden"  class="form-control" value="<?=$get_input->inputf;?>" disabled>
</div>
<div class="webServiceResult"></div>
</div>
<?php
}
}
if($seguroName=="PRIVADO"){
 $plan_id=0; $plan='';	
} else {
	if($row->plan){
 $plan=$this->db->select('name')->where('id',$row->plan)->get('seguro_plan')->row('name');
 $plan_id=$row->plan;
	}else{
	 $plan_id=1; $plan='Basico';		
	}
?>
<div class="form-group">
<label class="control-label col-sm-3" > Tipo de afiliado</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->afiliado?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Plan</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$plan?>">
</div>
</div>
<?php
 }
?>
</span>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span>Provincia</label>
<div class="col-sm-7">
<?php 

$provincia=$this->db->select('title')->where('id',$row->provincia )
 ->get('provinces')->row('title');

 ?>
<input disabled type="text" class="form-control" value="<?=$provincia?>">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Municipio</label>
<div class="col-sm-7">
<?php

$municipio=$this->db->select('title_town')->where('id_town',$row->municipio )
 ->get('townships')->row('title_town');

 ?>
<input disabled type="text" class="form-control" value="<?=$municipio?>">

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Barrio </label>
<div class="col-sm-7">
<input disabled type="text" class="form-control"  value="<?=$row->barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-7">
<?php
if($row->photo=="padron"){
$calle=$this->padron_database->select('CALLE')->where('MUN_CED',$row->ced1)->where('SEQ_CED',$row->ced2)->where('VER_CED',$row->ced3)->get('padron')->row('CALLE');
}else{
$calle=$row->calle;
 }
 ?>
<input disabled type="text" class="form-control"  value="<?=$row->calle?>"  >
</div>
		
</div>
</div><!--show patient end-->
<a href="#anchor" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div><!--datos personal end-->

 <div class="tab-pane" id="Contactos_de_emergencia">
 <div  id="showecont" style="display:none">

<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_nombre" value="<?=$row->contacto_em_nombre?>">
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Parentesco</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_cel" value="<?=$row->contacto_em_cel?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_tel1" value="<?=$row->contacto_em_tel1?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input  type="text" class="form-control" name="contacto_em_tel2" value="<?=$row->contacto_em_tel2?>">

 </div>
</div>
 </div>
 <!--show contacto-->
 <div id="hidedb" >
 <div class="form-group">
<label  class="control-label col-sm-3">Nombres</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_nombre?>">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Parentesco</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->contacto_em_cel?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel1?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel2?>">

 </div>
</div>
</div>
 </div>
<div class="tab-pane" id="En_case_de_menores_de_edad">

<?php $this->load->view('admin/pacientes-citas/create-patient-tutor',$data); 
	
?>

</div>
</form>
 <div id="patient_files" class="tab-pane">
<div class="col-sm-12 wrapper">

<div id="img_error"></div>
 <header>Subir Archivo</header>
<input type="hidden" id="url_load" value="<?php echo base_url(); ?>patient/listFolders" />
<input type="hidden"  id="url_count_files" value="<?php echo base_url(); ?>patient/url_count_files" />
<?php echo  form_open_multipart("patient/uploadDocumento", ['id'=>'uploadDocumento', 'class'=>'form-horizontal']); ?>
<input type="hidden" name="table_name"  id="table_name" value="patients_folders" />
 <input name="id_p_a" id="id_p_a" type="hidden" value="<?=$row->id_p_a?>" />
 <input name="insertedBy"  type="hidden" value="<?=$id_user?>" />
 <input type="hidden" id="folder_name" name="folder_name" value="assets/img/patients-folder/" />
<?php echo form_input(['name'=>'image_file','id'=>'image_file','accept'=>'image/*,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.zip,.rar,.7zip', 'type'=>'file', 'class'=>'form-control']);
echo ' <i style="font-size:104px" class="fa fa-cloud-upload"></i>';
echo "<p>Elegir Archivo Para Subir (<= 4 MB)</p>";
 echo form_close();?>
<div class="progress">
    <div class="progress-bar"></div>
</div>
<div id="listFolders"></div>
</div>
</div>

<div class="tab-pane " id="Datos_citas" style="overflow-x:auto;">
<?php 
 if(!empty($rendez_vous ))  
{
?>
<a data-toggle="modal"   data-target="#NewC" style="float:right" href="<?php echo site_url("cita/create_cita_again/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>

<i><?=$number_cita?> citas</i>

<table class="table table-striped" style="font-size:14px" id="example" >
 <thead>
 <tr style="background:#38a7bb;color:white">
 <!--<th>NEC</th>-->
  <th>Centro medico</th>
 <th>Doctor</th>
 <th>Area</th>
<th>Causa</th>
<th>Fecha</th>
 <th>Acciones</th>
 </tr>
 </thead>
  <tbody>
<?php
foreach($rendez_vous as $row_rd)
{
$is_billed_already=$this->db->select('id_rdv,idfacc')->where('id_rdv',$row_rd->id_apoint)->get('factura2')->row_array();
$idfacc=$is_billed_already['idfacc'];

//---------centro medico-------------------
$centro=$this->db->select('name,type')->where('id_m_c',$row_rd->centro )
->get(' medical_centers')->row_array();
$centro_type=$centro['type'];
if($centro_type=="privado"){$ident="medico";}else{$ident="centro";}
//---------centro medico-------------------
$area=$this->db->select('title_area')->where('id_ar',$row_rd->area )
->get(' areas')->row_array();
//------------doctor--------------------
$doctor=$this->db->select('name')->where('id_user',$row_rd->doctor )
   ->get('users')->row('name');
   
    $insert_date = date("d-m-Y H:i:s", strtotime($row_rd->created_time));
 $update_date = date("d-m-Y H:i:s", strtotime($row_rd->update_time));
 
 $crt1=$this->db->select('name')->where('id_user',$row_rd->inserted_by)->get('users')->row('name');
$updt2=$this->db->select('name')->where('id_user',$row_rd->update_by)->get('users')->row('name');
?>

<tr>
<td><?=$centro['name']?></td>
<td><?=$doctor;?></td>
<td><?=$area['title_area']?></td>
<td><?=$row_rd->causa?></td>
<td><?=$row_rd->fecha_propuesta?><br/><?=$row_rd->hora_de_cita?></td>
<td>
<a style="cursor:pointer" title="Editar cita" data-toggle="modal"   data-target="#EditC" href="<?php echo site_url("cita/UpdateCita/$row_rd->id_apoint/$id_user")?>" ><i class="fa fa-pencil" aria-hidden="true" ></i> </a>
<i class="fa fa-info"  title="Creado por <?=$crt1?> &#013 Fecha <?=$insert_date?>  &#013  Cambiado por <?=$updt2?> &#013  Fecha <?=$update_date?>"></i>

</td>

</tr>
<?php
}
?>
 </tbody>
</table>

<?php
} 
else {
?>
<a data-toggle="modal"   data-target="#NewC" style="float:right" href="<?php echo site_url("cita/create_cita_again/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>

<?php
} 

?>
</div><!--div datos citas ends-->


<div class="tab-pane" id="presupuesto">
<div id="loadPresupuesto"></div>

</div>


<div class="tab-pane" id="FACTURAR">
<div id='factAmb'></div>

 </div>

<div  id="emergencia" class="tab-pane" style="overflow-x:auto;">
<a data-toggle="modal"   data-target="#NewEm" style="float:right" href="<?php echo site_url("emergency/create_new_emergency/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Crear Emergencia"  ></i> Crear Emergencia </a>
<br/>
<?php 
 if(!empty($patient_admitas ))  
{
?>
<h4>III- DATOS DE LA ADMISION (<?=$number_patient_admitas?>)</h4>
<table  class="table table-striped"  >
<thead>
<tr style="background:#5957F7;color:white;font-size:13px">
<th><strong>Causa</strong></th>
<th><strong>Referido Por</strong></th>
<th><strong>Medio De Llegado</strong></th>
<th><strong>Enviado A</strong></th>
<th><strong>Estado Del Paciente</strong></th>
<th colspan='3'>Operator/Fecha/Horario</th>
<th>Cambiar</th>
</tr>
</thead>
<tbody>
<?php foreach($patient_admitas as $ver)
{

$referido_por=$this->db->select('em_name')->where('id_em_c',$ver->paciente_referido_por )
->get('emergency_adm_data')->row('em_name');

$medio_llegado=$this->db->select('em_name')->where('id_em_c',$ver->medio_de_llegado )
->get('emergency_adm_data')->row('em_name');

	if($ver->enviado_a==1){
		$enviado="Triaje";
	} elseif($ver->enviado_a==2){
		$enviado="Emergencia General";
	}
	elseif($ver->enviado_a==3){
		$enviado="Emergencia Pediatría";
	}
	elseif($ver->enviado_a==4){
	$enviado="Quirofano";	
	}
	elseif($ver->enviado_a==5){
	$enviado="Emergencia Obstétrica Y Ginecología";	
	}
	elseif($ver->enviado_a==6){
	$enviado="Reanimación";	
	}

$estado_de_paciente=$this->db->select('em_name')->where('id_em_c',$ver->estado_de_paciente )
->get('emergency_adm_data')->row('em_name');

$causa=$this->db->select('em_name')->where('id_em_c',$ver->causa )
->get('emergency_adm_data')->row('em_name');

$created_by=$this->db->select('name')->where('id_user',$ver->inserted_by )
->get('users')->row('name');

$updated_by=$this->db->select('name')->where('id_user',$ver->update_by )
->get('users')->row('name');
$created_date=date("d-m-Y", strtotime($ver->created_date));
$updated_date=date("d-m-Y", strtotime($ver->update_date));

?>
<tr>
<td><?=$causa?></td>
<td><?=$referido_por?></td>
<td><?=$medio_llegado?></td>
<td><?=$enviado?></td>
<td><?=$estado_de_paciente ?></td>
<td  colspan='3'>
<table>
<tr>
<td style="font-size:12px;color:blue">
<em>  
CREADO POR <?=$created_by?>, <?=$created_date?> : <?=$ver->create_time?>
</em>
</td>
</tr>
<?php if($ver->create_time !=$ver->update_time){?>
<tr>
<td style="font-size:12px;color:red">
<em> 
CAMBIADO POR <?=$updated_by?>, <?=$updated_date?> : <?=$ver->update_time?>
</em>
</td>
</tr>
<?php } ?>
</table>
</td>
<td><a style="cursor:pointer" title="Editar Emergencia" data-toggle="modal"   data-target="#EditEm" href="<?php echo site_url("emergency/updateEmergency/$ver->id_ep/$id_user")?>" ><i class="fa fa-pencil" aria-hidden="true" ></i> </a>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>

<?php
} 

?>
 </div>
  <div  id="hospitalizacion" class="tab-pane" style="overflow-x:auto;">
  <a data-toggle="modal"   data-target="#hospitol" style="float:right" href="<?php echo site_url("hospitalizacion/create_new_hospital/$row->id_p_a/$id_user/0/0")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Crear Hospitalización"  ></i> Crear Hospitalización </a>

  </div>
 </div>
 
</div>


<div class="modal fade" id="hospitol"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>







<div class="modal fade" id="EditC"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<div class="modal fade" id="NewC"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="NewEm"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>
<div class="modal fade" id="EditEm"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>


<div class="modal fade" id="of-ref-mdl"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>
<div class="modal fade" id="verEmpData"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="verMedSo"  role="dialog"   >
<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" >

</div>
</div>
</div>

</div>
 </div><!--container-->
 </div>
 <br/><br/><br/>
<?php $this->load->view('admin/footer'); ?>
 	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script> 
	<!--<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script src="<?=base_url();?>assets/js/upload-foto.js?rnd=333"></script> 
 <!--<script src="<?=base_url();?>assets/js/upload-image.js"></script> -->
<script>

$( document ).ready(function() {

 $('#of-ref-mdl').on('hidden.bs.modal', function () {
//$(this).removeData('bs.modal');
 location.reload();
});

 $('#verMedSo').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
 //location.reload();
});

$('#EditEm').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

	


display_tutor();

function display_tutor()
{
$(".display_tutor").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var id_nino  = <?=$row->id_p_a?>;
var controller  = "<?=$controller?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/display_tutor",
method:"POST",
data: {id_nino:id_nino,controller:controller,id_cm:<?=$id_cm?>,doc:<?=$doc?>},
success:function(data){
$('.display_tutor').html(data);
}
});
}


$(window).on( "load", function() {
var idpatient=<?=$row->id_p_a?>; 
var seguro_medico = $("#seguro_medico").val();
$.ajax({
url: "<?php echo site_url('admin_medico/seguro_name');?>",
type: 'post',
data:{idpatient:idpatient,seguro_medico:seguro_medico,plan:<?=$plan_id?>,operation:1},
success: function (data) {
$(".seguro_input").html(data);
}

});
});




$('.click-editar').on('click', function() {
$(".click-editar").hide();
$(".save-patient").slideDown(1000);
$("#all_dis").find('input').prop('disabled', false);
$("#showd").show(1000);
$("#hideda").hide(1000);
$("#showecont").show(1000);
$("#hidedb").hide(1000);
$("#showdc").show(1000);
$("#hidedc").hide(1000);

});
$('.remb').on('click', function() {
	if($("#disBtnM").val()==1){
alert("Los campos con * son obligatorios!");
return false;
}
$(".hide-all-but").hide();
});
$('.addb').on('click', function() {
$(".hide-all-but").show();
});
 

setTimeout(function() {
$('#suc').fadeOut('slow');
}, 5000);



//==============NEC search on keyup==================


$("#searchnec").keyup(function(){
var str=  $("#searchnec").val();
if(str == "") {
//$( "#hide_patientf" ).slideDown();
}else {
$.get( "<?php echo base_url();?>admin_medico/ajaxsearchnec?id="+str, function( data ){
$( "#patientHint" ).html( data ); 
$( "#hide_patientf" ).hide();			   
});
}
});
//==============================
$('#fadeout').fadeIn('slow').delay(4000).fadeOut('slow');


    $('#EditC').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
	
    /*$('#NewC').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });*/
	
	
	
	$('#dateOfBirth1').datetimepicker({
    format: 'DD-MM-YYYY',
	locale:'es'
}).on('dp.change', function(e) {
    $('#mirror_field').val(e.date.format('YYYY-MM-DD'));
	display_age();
});

$('#savePatEmp').on('submit', function (e) {
	e.preventDefault();
$.ajax({
url: "<?=base_url('creation/savePatientEmp')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$('#insertionResult').show();
if(response.status == 1){
$('#insertionResult').html('<p class="alert alert-warning">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
} else{
	$('#insertionResult').html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	$("#disBtnM").val(0);
	loadPatienImg();
	
}

},
 
});
});
loadPatienImg();
function loadPatienImg(){
var id=<?=$row->id_p_a?>;
$('#load-foto').html('<em>cargando la photo</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('creation/loadPatientPhoto');?>",
	data:{id_p_a:id},
	success: function(data){
   $("#load-foto").html(data);

	},
	
	});
}
//var  countProced = 0;	
$('.loadPsP').on('click', function(e) {
e.preventDefault();
//countProced ++;
//if(countProced==1){
procedimientoTarif();
//}
});



function procedimientoTarif(){
$('#load-procedimientos-tarif').html('Agregando...');
$.ajax({
url:"<?php echo base_url(); ?>factura/procedimientoTarif",
data: {user_id:<?=$id_user?>,id_historial:<?=$row->id_p_a?>,seguro:<?=$row->seguro_medico?>},
method:"POST",
success:function(data){
$('#loadPresupuesto').html(data);

},

});
}


$('.showFactAmb').on('click', function(e) {
e.preventDefault();
factAmb();
});


function factAmb(){
$('#factAmb').html('cargando...');
$.ajax({
url:"<?php echo base_url(); ?>factura/factAmb",
data: {user_id:<?=$id_user?>,id_p_a:<?=$row->id_p_a?>,seguro:<?=$row->seguro_medico?>,perfil:"<?=$perfil?>",seguroName:"<?=$seguroName?>",controller:"<?=$controller?>"},
method:"POST",
success:function(data){
$('#factAmb').html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#factAmb').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
}

});
</script>
  </body>
</html>