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

$controller="medico";
$sql ="SELECT p_id FROM h_c_diagno_def_link where p_id='$row->id_p_a' && user_id='$id_user'";
$atendido = $this->db->query($sql);
if($atendido->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
} else {$atend="";}




$is_hist_med=$this->db->select('historial_id')->where('historial_id',$row->id_p_a)->get('h_c_enfermedad')->row('historial_id');
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
<div id="load-foto">
<!--<?php
 if($row->photo==""){

?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{

	?>
<img  style="display:inline-block; width:100%; height:auto;" id="zoomimg"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>-->
</div>
<hr class="rem-hr" id="hr_ad"/>
<li class="active addb" ><a href="#Datos_personales"  data-toggle="tab" ><i class="fa fa-arrow-right" aria-hidden="true"></i> DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li <?=$display_optometra?>><a class="addb" href="#Contactos_de_emergencia" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> CONTACTOS DE EMERGENCIA</a></li>
<li><a class="addb" href="#En_case_de_menores_de_edad" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> RELACIONES FAMILIARES</a></li>

<li><a class="remb" href="#Datos_citas" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> DATOS CITAS <span style="color:black">(<?=$number_cita?>)</span> <br/><?=$nueva_cita?></a></li>

<li><a  data-target="#verEmpData" href="<?php echo site_url("creation/getClockResultPatient/$id/$id_user/$id_cm")?>" data-toggle="modal"><i class="fa fa-arrow-right" aria-hidden="true"></i> FICHA DE EMPLEADO</a></li>

<li <?=$display_optometra?>><a class="remb" href="#FACTURAR" data-toggle="tab"><i class="fa fa-arrow-right" aria-hidden="true"></i> FACTURA AMBULATORIA <span style="color:red;font-size:13px"><br/>Si desea facturar sin realizar citas use esta opción</span></a></li>

<?php if($is_hist_med !="") {
 if($perfil=="Medico"){
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
<li <?=$display_optometra?>><a href="<?php echo site_url("$controller/historial_medical/$id_p_a_h/$doc_h/$areaid_h/$id_cm_h/$hist/$id_user_h/$from_view"); ?>">HISTORIAL MEDICA </a></li>
<?php
} }?>
<li <?=$display_optometra?>><a href="<?php echo base_url("$controller/orden_medica/$id_user/$row->id_p_a")?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> ORDEN MEDICA </a></li>
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
 
if($number_cita == 1){
	 $frecuencia_text="1.ª vez";
  } else{
	$frecuencia_text="$number_cita veces"; 
 } 
 
 
?>


<form enctype="multipart/form-data" id="savePatEmp" class="form-horizontal" method="post"   > 
<div id="insertionResult"></div>
<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span style="font-size:12px;float:right;font-weight:normal;color:green">Creado por <?=$crt?>, <?=$insert_date?> || Cambiado por <?=$updt?>, <?=$update_date?></span>  
<h4 class="h4">
<span style="text-transform:uppercase"><?=$row->nombre?></span>  || Cedula : <?=$row->cedula?>  || <?=$row->nec1?> 

<span class="hide-all-but">
 <a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?> " ></i> Editar </a>
<button type="submit"  style="float:right;display:none" class="btn btn-success btn-sm save-patient enable-send" ><i class="fa fa-floppy-o" aria-hidden="true" title="Guardar  <?=$row->nombre?>" ></i> Guardar</button>
</span>
</h4>

<hr id="hr_ad"/>
<input type="hidden" name="updated_by" value="<?=$id_user?>">
<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?> ">
<div class="tab-content" id="all_dis"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<div id="showd" style="display:none"> 
<div class="form-group">

<label class="control-label col-sm-3"> Nombres</label>
<div class="col-sm-9">
<input type="text" class="form-control " id="nombre" name="nombre" value="<?=$row->nombre?>" readonly>
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
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->cedula?>" readonly  ></div>
</div>


<div class='form-group'>
<label class='control-label col-sm-3'><span style="color:red;font-size:17px">*</span> Fecha nacimento</label>
<div class="col-sm-4" >
<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date" id="dateOfBirth1">
<input type="text" class="form-control " id="date_nacer" name="date_nacer" value="<?=$row->date_nacer?>" />
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
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">

<div class="radio">

<?php
if($number_cita == 1){
	$checked="checked";
}
else{
	$checked="";
}
?>
<label>
<input type="radio" name="frecuencia" value="Primera vez" <?=$checked?> readonly>
Primera vez
</label>
</div>
<div class="radio">
<?php
if($number_cita > 1){
	$checked1="checked";
}
else{
	$checked1="";
}
?>
<label>
<input type="radio" name="frecuencia" value="Subsecuente" <?=$checked1?> readonly>
Subsecuente
</label>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span style="color:red;font-size:17px">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input  type="text" id="form_phonecel" class="form-control bfh-phone" name="tel_cel" value="<?php echo $row->tel_cel?>"   >
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
<label class="control-label col-sm-3" > Sexo</label>
<div class="col-sm-3">
<input class="form-control " name="sexo" id="sexo" value="<?=$row->sexo?>" readonly>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span>  Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2" name="estado_civil" id="estado_civil">
<option ><?php echo $row->estado_civil; ?></option>
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
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span>  Nacionalidad</label>
<div class="col-sm-6 na">

<select class="form-control select2"  id="nacionalidad" name="nacionalidad" >
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
		<option value="<?=$co->short_name?>"><?=$co->short_name?></option>
		<?php
	}
}
?>
 </select>
 

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5 seg">

<input  type="text"  name="seguro_medico" class="form-control" value="PRIVADO" readonly>
 </div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Provincia</label>
<div class="col-sm-7 pro">

<select class="form-control select2"  id="provincia" name="provincia" onChange="getMun(this.value);">
<?php
foreach($provinces as $pro){
	
	if($row->provincia == $pro->id) {
		echo "<option value=".$pro->id." selected>".$pro->title."</option>";
	} else {
		echo "<option value=".$pro->id.">".$pro->title."</option>";
	}
}
?>
 </select>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red;font-size:17px">*</span> Municipio</label>
<div class="col-sm-7">

<select class="form-control select2" name="municipio" id="municipio_dropdown"  >

<?php
foreach($municipios as $mun){
	
	if($row->municipio == $mun->id_town) {
		echo "<option value=".$mun->id_town." class=".$mun->province_id_town." selected>".$mun->title_town."</option>";
	} else {
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
<label class="control-label col-sm-3"> Nombres</label>
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
<label  class="control-label col-sm-3" >Fecha nacimiento </label>
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
<label class="control-label col-sm-3">Teléfono celular </label>
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
<label class="control-label col-sm-3" > Sexo</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->sexo?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->estado_civil?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Nacionalidad</label>
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

<?php
$plan_id=0; $plan='';	

?>


<div class="form-group">
<label class="control-label col-sm-3" style="color:">Provincia</label>
<div class="col-sm-7">
<?php 

$provincia=$this->db->select('title')->where('id',$row->provincia )
 ->get('provinces')->row('title');

 ?>
<input disabled type="text" class="form-control" value="<?=$provincia?>">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" style="color:">Municipio</label>
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

<?php 
$data['controller']='medico';

$this->load->view('admin/pacientes-citas/create-patient-tutor',$data); 
	
?>

</div>
</form>

<!--<div class="tab-pane" id="ficha-de-empleado">
<?php $this->load->view('ficha-empleado/get-clock-result', $data);  ?>

</div>-->
<div class="tab-pane" id="Datos_citas" style="overflow-x:auto;">
<?php 
 if(!empty($rendez_vous ))  
{
?>
<a data-toggle="modal"   data-target="#NewC" style="float:right" href="<?php echo site_url("admin_medico/create_cita_again/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>

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
<!--<td><?=$row_rd->nec?></td>-->
<td><?=$centro['name']?></td>
<td><?=$doctor;?></td>
<td><?=$area['title_area']?></td>
<td><?=$row_rd->causa?></td>
<td><?=$row_rd->fecha_propuesta?></td>
<td>
<a style="cursor:pointer" title="Editar cita : <?=$row_rd->nec?> " data-toggle="modal"   data-target="#EditC" href="<?php echo site_url("admin_medico/UpdateCita/$row_rd->id_apoint/$id_user")?>" ><i class="fa fa-pencil" aria-hidden="true" ></i> </a>
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
<a data-toggle="modal"   data-target="#NewC" style="float:right" href="<?php echo site_url("admin_medico/create_cita_again/$row->id_p_a/$id_user")?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>

<?php
} 

?>
</div><!--div datos citas ends-->
<div class="tab-pane" id="FACTURAR">
<div class="form-group">
<label class="control-label col-sm-3" >Centro Medico</label>
<div class="col-sm-6">
<select class="form-control select2" id="factura-centro"> 
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>

 </select>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2" id="factura-esp" disabled> 

 </select>
 <div id="load-time"></div>
</div>
 </div>
 
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">

<select class="form-control select2 facturar-doc"  id="facturar-doc"  disabled>

</select>


</div>


</div>


<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tipo De Factura</label>
<div class="col-sm-6">

<label class="checkbox-inline">
<input type="radio" name='seguro-radio' value="11" checked> Privado

</label>
<br/><br/>
  <button type='button' id='crear-fac-ambulatoria' class="btn btn-primary btn-sm"  disabled><i class="fa fa-plus" aria-hidden="true" title="Crear Emergencia"  ></i> Crear</button>
</div>
 <div id="load-fac-div"> </div>
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



<div class="modal fade" id="of-ref-mdl"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="verEmpData"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
</div>
 </div><!--container-->
 </div>

   </body>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script>

 $('#of-ref-mdl').on('hidden.bs.modal', function () {
//$(this).removeData('bs.modal');
 location.reload();
});



$('#EditEm').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});



$("#factura-centro").change(function(){
$("#load-fac-div").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $(this).val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
	$('#factura-esp').prop("disabled",false);
	$('#factura-esp').val(null).trigger('change');
 	// $('#facturar-doc').val(null).trigger('change');
	$("#factura-esp").html(data);
	$("#load-fac-div").hide();
	},

	}); 

});


$("#factura-esp").change(function(){
$("#load-fac-div").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//$('#facturar-doc').val(null).trigger('change');
var id_centro= $("#factura-centro").val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getDocEsp');?>',
	data:{id_esp:$(this).val(),id_centro:id_centro},
	success: function(data){
   $("#facturar-doc").html(data);
	$("#load-fac-div").hide();
		$("#facturar-doc").prop("disabled",false);
 $('#facturar-doc').val(null).trigger('change');
 $('#crear-fac-ambulatoria').prop('disabled',false); 
	},
	});
});


   $('#crear-fac-ambulatoria').on('click', function() {
	   var doc =$("#facturar-doc").val();
	   if(doc !=""){
var id=<?=$row->id_p_a?>;
var centro= $("#factura-centro").val();
var seguro_type = $('input:radio[name=seguro-radio]:checked').val();
window.location ="<?php echo base_url(); ?><?=$controller?>/fact?centro="+centro+"&id="+id+"&doc="+doc+"&seg="+seguro_type; 
   }
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
$(".hide-all-but").hide();
});
$('.addb').on('click', function() {
$(".hide-all-but").show();
});
 

setTimeout(function() {
$('#suc').fadeOut('slow');
}, 5000);



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

if(response.status == 1){
$('#insertionResult').html('<p class="alert alert-warning">'+response.message+'</p>');

} else{
	$('#insertionResult').html('<p class="alert alert-success">'+response.message+'</p>');
	loadPatienImg();
	
}

},
 
});
});
loadPatienImg();
function loadPatienImg(){
var id=<?=$row->id_p_a?>;
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
</html>