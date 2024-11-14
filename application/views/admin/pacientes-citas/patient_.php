 <style>
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
/*
#zoomimg:hover {
  -ms-transform: scale(1.6); 
  -webkit-transform: scale(1.6);
  transform: scale(1.6);
transition: transform 1s linear;  
  z-index:10000
}*/
.paginationh{
	float:left;
	width:100%;
}

.reduce-height{border:none;background:none}
ul.paginationh {
    list-style: none;
	float:left;
	margin:0;
    padding: 0;
}
li.paninate-li{
	list-style: none;
	float: left;
	margin-right: 16px;
	padding:5px;
	border:solid 2px #0063DC;
	background:#DCDCDC;
	color:#0063DC;
}
li.paninate-li:hover{
	color:#FF0084;
	cursor: pointer;
}
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
	
	
?>

 <div class="col-md-12"> 
<div id="patientdata"></div>
</div>
<div class="col-md-12" id="hide_patientf"> 
<span id="suc"><?php echo $this->session->flashdata('save_patient_success'); ?></span>
 <div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" style="font-size:13px">
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
<hr class="rem-hr" id="hr_ad"/>
<li class="active addb" ><a href="#Datos_personales"  data-toggle="tab" ><i class="fa fa-arrow-right" aria-hidden="true"></i> DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li <?=$display_optometra?>><a class="addb" href="#Contactos_de_emergencia" data-toggle="tab">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a class="addb" href="#En_case_de_menores_de_edad" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> RELACIONES FAMILIARES</a></li>
<?php if($centroType=="Salud ocupacional"){?>
<li><a  data-target="#verEmpData" href="<?php echo site_url("creation/getClockResultPatient/$row->id_p_a/$id_user/$id_cm")?>" data-toggle="modal"><i class="fa fa-arrow-right" aria-hidden="true"></i> FICHA DE EMPLEADO</a></li><?php } 
else{ ?>
<li><a>
<form method="POST" ACTION="<?php echo site_url("search/familyRelationship"); ?>">
<input name="send-pat-id" value="<?=$row->id_p_a?>" type="hidden"/>
<input type="hidden" name="send-user-id" value="<?=$id_user?>"/>
<button type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i> FICHA FAMILIAR</button>
</form>
</a></li>
<?php }?>
<li>
<a class="remb create-cita-del-paciente" href="#Datos_citas" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> DATOS CITAS <span style="color:black">(<?=$number_cita?>)</span> <br/><?=$nueva_cita?></a>
</li>

<li <?=$display_optometra?>><a class="remb showFactAmb" href="#FACTURAR" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> FACTURA AMBULATORIA <span style="color:red;font-size:13px"><br/>Si desea facturar sin realizar citas use esta opción</span></a></li>

<!--<li <?=$display_optometra?>><a  class="remb" data-toggle="tab" href="#emergencia">VI- EMERGENCIA (<?=$number_patient_admitas?>)</a></li>
<!--<li <?=$display_optometra?> ><a  class="remb" data-toggle="tab" href="#hospitalizacion">VII- HOSTIPITALIZACION </a></li>-->
<?php if($is_hist_med !="") {
 if($perfil=="Admin") {
	  $areaid_ad = encrypt_url(0);
	  $hist = encrypt_url(1);
	 ?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$id_user_h/$areaid_ad/$id_cm_h/$hist/$id_user_h/$from_view"); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> HISTORIAL MEDICA</a></li>
<?php } else if($perfil=="Medico"){
	$hist = encrypt_url(1);
?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$id_user_h/$area_h/$id_cm_h/$hist/$id_user_h/$from_view"); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> HISTORIAL MEDICA</a></li>
<?php	
}else if($perfil=="Asistente Medico"){
$areaid= $this->db->select('area')->where('id_user',$doc)->get('users')->row('area');
 $doc_h = encrypt_url($doc);
  $areaid_h = encrypt_url($areaid);
  $hist = encrypt_url(4);
?>
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$doc_h/$areaid_h/$id_cm_h/$hist/$id_user_h/$from_view"); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> HISTORIAL MEDICA </a></li>
<?php
} }?>
<li <?=$display_optometra?>><a href="<?php echo base_url("$controller/orden_medica/$id_user_h/$id_p_a_h")?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> ORDEN MEDICA </a></li>

<li>
<a class="remb loadPsP" href="#presupuesto" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i>CREAR PRESUPUESTO </a>
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
<input type="hidden" name="updated_by" value="<?=$id_user?>">
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

</form>





  <div  id="hospitalizacion" class="tab-pane" style="overflow-x:auto;">
  <a data-toggle="modal"   data-target="#hospitol" style="float:right" href="<?php echo site_url("hospitalizacion/create_new_hospital/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Crear Hospitalización"  ></i> Crear Hospitalización </a>

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

</div>
 </div><!--container-->
 </div>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>


loadPatienImg();
function loadPatienImg(){
var id=<?=$idpatient?>;
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



</script>
   </body>
</html>