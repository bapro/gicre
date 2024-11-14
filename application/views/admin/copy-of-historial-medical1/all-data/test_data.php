<?php 
$this->padron_database = $this->load->database('padron',TRUE);
$name=($this->session->userdata['admin_name']);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HISTORIAL CLINICA</title>

    <!-- Bootstrap core CSS -->
    	   <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script>
moment.locale('es');
</script>
    <!-- Custom styles for this template -->
    <style>
@media (min-width: 992px){
.modal-lg
{ width: auto;	
}
}
.modal-lg
{
    width: 1200px;
    height: 900px; /* control height here */
}   
    </style>

  </head>

  <body>
<?php
foreach($patient as $row)
$infomore=$this->db->select('inserted_by,update_time,created_time,update_time,update_by')->
 where('id_patient',$row->id_p_a )
->get('rendez_vous')->row_array();
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($infomore['created_time'])));	
$update_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($infomore['update_time'])));	
?>

  <nav class="navbar navbar-default navbar-fixed-top" style="background:white">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          			 <?php 
		$this->padron_database = $this->load->database('padron',TRUE);
		foreach($HISTORIAL_MEDICAL as $row)
		if($row->photo=="padron"){
		 $photo=$this->padron_database->select('IMAGEN')
		->where('MUN_CED',$row->ced1)
		->where('SEQ_CED',$row->ced2)
		->where('VER_CED',$row->ced3)
		->get('fotos')->row('IMAGEN');
		?>
		<a data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin/zoom_image/$row->ced1/$row->ced2/$row->ced3")?>">

		<?php echo'<img width="80"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';?>
		</a>
		<?php
		} else if($row->photo==""){
			
		}
		else{
			?>
		<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin/zoom_image_ad/$row->id_p_a")?>">
		<img width="80"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
		</a>
		
		<?php

		}
		?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
					<?php foreach($HISTORIAL_MEDICAL as $historial_medical)
			$dato_citas=$this->db->select('nec,fecha_propuesta')->where('id_patient',$historial_medical->id_p_a )
			->get('rendez_vous')->row_array();
			
			  	$seguro_medico_name=$this->db->select('title')->where('id_sm',$historial_medical->seguro_medico)
          ->get('seguro_medico')->row('title');
			?>
          <ul class="nav navbar-nav">
         <li><a style="color:#209BD8;text-transform:uppercase"><?=$historial_medical->nombre;?></a></li>
			  <li><a style="color:#209BD8"><?=$historial_medical->nacionalidad;?></a></li>
			  <li><a style="color:#209BD8"> <?=$historial_medical->edad;?></a></li>
            <li class="dropdown">
              <a href="#" style="color:#209BD8" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mas <span class="caret"></span></a>
              <ul class="dropdown-menu not-me">
            <li><a style="color:#209BD8"><b>CEDULA :</b> <?=$historial_medical->cedula;?></a ></li>
			 <li><a style="color:#209BD8"><b>FECHA : </b><?=$dato_citas['fecha_propuesta'];?></a></li>
			 <li><a style="color:#209BD8"><b>FRECUENCIA :</b> <?=$historial_medical->frecuencia;?></a></li>
            <li><a style="color:#209BD8"><b>ARS :</b> <?=$seguro_medico_name;?></a></li>
			<HR/>
			<li><a href="<?=site_url("admin/Appointments")?>">Citas</a></li>
			<li><a href="<?=site_url("admin/Appointments")?>">Alergicos</a></li>
           </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a ><button  class=" btn-lg btn-success "  id="save_ant_gen"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
  <div class="row">

        <div class="col-sm-3 col-md-2 sidebar" style="background:white;">
		<br/> 
          <ul  class="nav nav-sidebar ">
		 
			<li><a class="this-is-a-title"><i>I- ANTECEDENTES</i></a></li>
			<li class="active addb" ><a href="#Datos_personales"  data-toggle="tab" >1- General</a></li>
			<li><a href="#SSR"  data-toggle="tab" >2- SSR</a></li>
			<li><a href="#Obstetrico"  data-toggle="tab" >3- Obstetrico</a></li>
			<li><a href="#Pediatrico"  data-toggle="tab" >4- Pediatrico</a></li>
			<hr />
			<li><a  href="#Enfermedad_Actual" data-toggle="tab">II- ENFERMEDAD ACTURAL</a></li>
			<hr />
			<li><a class="this-is-a-title"><i>III- EXAMEN</i></a></li>
			<li><a href="#Rehabilitacion"  data-toggle="tab" >1- Rehabilitacion</a></li>
			<li><a href="#examen-fisico"  data-toggle="tab" >2- Fisico</a></li>
			<li><a href="#oftalmologia"  data-toggle="tab" >3- Oftalmologia</a></li>
			<li><a href="#Del_Sistema"  data-toggle="tab" >4- Del Sistema</a></li>
				<hr />
				<li><a  href="#conclusion"  data-toggle="tab" >IV- CONCLUSION DIAGNOSTIC</a></li>
				<hr />
				<li><a  href="#control_prenatal"  data-toggle="tab" >V- CONTROL PRENATAL </a></li>
				<hr />
				<li><a class="this-is-a-title"><i>VI- INDICACIONES</i></a></li>
				<li><a href="#recetas"  data-toggle="tab" >1- Recetas </a></li>
				<li><a href="#estudios"  data-toggle="tab" >2- Estudios</a></li>
				<li><a href="#laboratorios"  data-toggle="tab" >3- Laboratorios </a></li>
				
				
			</ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <br/><br/>    <div id="result"></div><div id="loadf"></div>
<form class="form-horizontal " method="post" action="<?php echo site_url('admin/save_update_patient');?>"  > 

<input type="hidden" id="inserted_by" value="<?=$name?>">
<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="col-md-12 move_left marque-lo-negativo" id="hide_ant">

<?php
foreach($row_ant as $row)
{
?>
 <div   style="overflow-x:auto;">
<table class="table deac1" style="width:80%">
<tr>
<th style="width:70%">Marque lo negativo</th>
<th style="width:100%"><span class="rows_selected" id="select_count"></span></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>
<a style="cursor:pointer;color:green" id="save_edit_datam"   type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
<a style="cursor:pointer" id="edit_datam" class="btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
</th>
</tr>
<tr>
<th class="col-xs-7"></th>
<th class="col-xs-5"><!--<input type="checkbox" name="todo"  id="select_all" checked disabled>&nbsp;Todo--></th>
<th class="col-xs-1">Madre</th>
<th class="col-xs-1">Padre</th>
<th class="col-xs-1">Hnos</th>
<th class="col-xs-1">Pers.</th>
<th></th>
</tr>
<tr>

<td>
<label>Cardiopatia</label>
</td>
<td >
 <?php
if ($row->car_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox" id="chooseAll_1" name="car_nin" class="emp_checkbox1 niguno_checked1" <?=$selected?>> <label class="control-label" > Ninguno</label>

</td>
<td>
 <?php
if ($row->car_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox" id="madre_checkbox" name="car_m" class="check-all check_madre" <?=$selected?> >
</td>
<td>
 <?php
if ($row->car_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox" id="padre_checkbox" name="car_p" class="check-all check_padre" <?=$selected?>>
</td>
<td>
 <?php
if ($row->car_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox" name="car_h" class="check-all check_hnos" <?=$selected?>>
</td>
<td>
 <?php
if ($row->car_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="car_pe" class="check-all check_pers" <?=$selected?>>
</td>

<td><input type="text"  id="car_text" class="text-marquo" value="<?=$row->car_text?>" ></td>
</tr>

<tr>
<td><label>Hipertension</label></td>
<td>
 <?php
if ($row->hip_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 
<input type="checkbox" id="chooseAll_1" name="hip_nin"  class="emp_checkbox1 niguno_checked2" <?=$selected?>>   <label class="control-label" > Ninguno</label>
</td>
<td>
 <?php
if ($row->hip_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="hip_m" class="check-all check_madre2" <?=$selected?>>
</td>
<td>
 <?php
if ($row->hip_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="hip_p" class="check-all check_padre2" <?=$selected?>>
</td>
<td>
 <?php
if ($row->hip_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="hip_h" class="check-all check_hnos2" <?=$selected?>>
</td>
<td>
 <?php
if ($row->hip_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="hip_pe" class="check-all check_pers2" <?=$selected?>>
</td>
<td><input type="text" id="hip_text" class="text-marquo"  value="<?=$row->hip_text?>"></td>

</tr>

<tr>
<td><label>Enf. Cerebrovascular</label></td>
<td>
 <?php
if ($row->ec_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="ec_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked3" <?=$selected?>> <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->ec_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_m" class="check-all check_madre3">
</td>
<td>
 <?php
if ($row->ec_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_p" class="check-all check_padre3">
</td>
<td>
 <?php
if ($row->ec_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_h" class="check-all check_hnos3">
</td>
<td>
 <?php
if ($row->ec_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_pe" class="check-all check_pers3">
</td>
<td>
<input type="text" value="<?=$row->ec_text?>" id="ec_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>Epilepsia</label></td>
<td>
 <?php
if ($row->ep_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" id="chooseAll_1" name="ep_nin" class="emp_checkbox1 niguno_checked4" <?=$selected?>> <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->ep_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_m" class="check-all check_madre4 " >
</td>
<td>
 <?php
if ($row->ep_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_p" class="check-all check_padre4">
</td>
<td>
 <?php
if ($row->ep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_h" class="check-all check_hnos4">
</td>
<td>
 <?php
if ($row->ep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_pe" class="check-all check_pers4">
</td>
<td>
<input type="text"  value="<?=$row->ep_text?>" id="ep_text" class="text-marquo" >
</td>
</tr>

<tr>
<td><label>Asma Bronquial</label></td>
<td>
 <?php
if ($row->as_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked5" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->as_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_m" class="check-all check_madre5">
</td>
<td>
 <?php
if ($row->as_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_p" class="check-all check_padre5">
</td>
<td>
 <?php
if ($row->as_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_h" class="check-all check_hnos5">
</td>
<td>
 <?php
if ($row->as_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_pe" class="check-all check_pers5">
</td>
<td>
<input type="text" value="<?=$row->as_text?>" id="as_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>Tuberculosis</label></td>
<td>
 <?php
if ($row->tub_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked6" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->tub_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_m" class="check-all check_madre6">
</td>
<td>
 <?php
if ($row->tub_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_p" class="check-all check_padre6">
</td>
<td>
 <?php
if ($row->tub_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_h" class="check-all check_hnos6">
</td>
<td>
 <?php
if ($row->tub_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_pe" class="check-all check_pers6">
</td>
<td>
<input type="text" value="<?=$row->tub_text?>" id="tub_text" class="text-marquo">
</td>
</tr>
<tr>
<td><label>Diabetes</label></td>
<td>
 <?php
if ($row->dia_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked7" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->dia_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_m" class="check-all check_madre7">
</td>
<td>
 <?php
if ($row->dia_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_p" class="check-all check_padre7">
</td>
<td>
 <?php
if ($row->dia_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_h" class="check-all check_hnos7">
</td>
<td>
 <?php
if ($row->dia_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_pe" class="check-all check_pers7">
</td>
<td>
<input type="text" value="<?=$row->dia_text?>" id="dia_text" class="text-marquo">
</td>
</tr>
<tr>
<td><label>Tiroides</label></td>
<td>
 <?php
if ($row->tir_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked8" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->tir_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_m" class="check-all check_madre8">
</td>
<td>
 <?php
if ($row->tir_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_p" class="check-all check_padre8">
</td>
<td>
 <?php
if ($row->tir_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_h" class="check-all check_hnos8">
</td>
<td>
 <?php
if ($row->tir_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_pe" class="check-all check_pers8">
</td>
<td>
<input type="text" value="<?=$row->tir_text?>" id="tir_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>Hepatitis</label> &nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo" value="<?=$row->hep_tipo?>" ></td>
<td>
 <?php
if ($row->hep_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked9" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->hep_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_m" class="check-all check_madre9">
</td>
<td>
 <?php
if ($row->hep_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_p" class="check-all check_padre9">
</td>
<td>
 <?php
if ($row->hep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_h" class="check-all check_hnos9">
</td>
<td>
 <?php
if ($row->hep_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_pe" class="check-all check_pers9">
</td>
<td>
<input type="text" value="<?=$row->hep_text?>" id="hep_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>Enfermedades Renales</label></td>
<td>
 <?php
if ($row->enfr_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked10" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->enfr_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_m" class="check-all check_madre10">
</td>
<td>
 <?php
if ($row->enfr_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_p" class="check-all check_padre10">
</td>
<td>
 <?php
if ($row->enfr_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_h" class="check-all check_hnos10">
</td>
<td>
 <?php
if ($row->enfr_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_pe" class="check-all check_pers10">
</td>
<td>
<input type="text" value="<?=$row->enfr_text?>"  id="enfr_text" class="text-marquo">
</td>
</tr>
<tr>
<td><label>Falcemia</label></td>
<td>
 <?php
if ($row->falc_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked11" >  <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->falc_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_m" class="check-all check_madre11">
</td>
<td>
 <?php
if ($row->falc_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_p" class="check-all check_padre11">
</td>
<td>
 <?php
if ($row->falc_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_h" class="check-all check_hnos11">
</td>
<td>
 <?php
if ($row->falc_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_pe" class="check-all check_pers11">
</td>
<td>
<input type="text" value="<?=$row->falc_text?>"  id="falc_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>Neoplasias</label></td>
<td>
 <?php
if ($row->neop_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked12" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->neop_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_m" class="check-all check_madre12">
</td>
<td>
 <?php
if ($row->neop_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_p" class="check-all check_padre12">
</td>
<td>
 <?php
if ($row->neop_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_h" class="check-all check_hnos12">
</td>
<td>
 <?php
if ($row->neop_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_pe" class="check-all check_pers12">
</td>
<td>
<input type="text" value="<?=$row->neop_text?>" id="neop_text" class="text-marquo">
</td>
</tr>

<tr>
<td><label>ENf. Psiquiatricas</label></td>
<td>
 <?php
if ($row->psi_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked13" >  <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->psi_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_m" class="check-all check_madre13">
</td>
<td>
 <?php
if ($row->psi_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_p" class="check-all check_padre13">
</td>
<td>
 <?php
if ($row->psi_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_h" class="check-all check_hnos13">
</td>
<td>
 <?php
if ($row->psi_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_pe" class="check-all check_pers13">
</td>
<td>
<input type="text" id="psi_text" class="text-marquo" value="<?=$row->psi_text?>">
</td>
</tr>

<tr>
<td><label>Obesidad</label></td>
<td>
 <?php
if ($row->obs_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked14" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->obs_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_m" class="check-all check_madre14">
</td>
<td>
 <?php
if ($row->obs_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_p" class="check-all check_padre14">
</td>
<td>
 <?php
if ($row->obs_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_h" class="check-all check_hnos14">
</td>
<td>
 <?php
if ($row->obs_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_pe" class="check-all check_pers14">
</td>
<td>
<input type="text" id="obs_text" class="text-marquo" value="<?=$row->obs_text?>">
</td>
</tr>

<tr>
<td><label>Ulcera Peptica</label></td>
<td>
 <?php
if ($row->ulp_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked15" ><label>Ninguno</label>
</td>
<td>
 <?php
if ($row->ulp_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_m" class="check-all check_madre15">
</td>
<td>
 <?php
if ($row->ulp_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_p" class="check-all check_padre15">
</td>
<td>
 <?php
if ($row->ulp_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_h" class="check-all check_hnos15">
</td>
<td>
 <?php
if ($row->ulp_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_pe" class="check-all check_pers15">
</td>
<td>
<input type="text" id="ulp_text" class="text-marquo" value="<?=$row->ulp_text?>">
</td>
</tr>

<tr>
<td><label>Artritis, Gota</label></td>
<td>
 <?php
if ($row->art_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked16" >  <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->art_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_m" class="check-all check_madre16">
</td>
<td>
 <?php
if ($row->art_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_p" class="check-all check_padre16">
</td>
<td>
 <?php
if ($row->art_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_h" class="check-all check_hnos16">
</td>
<td>
 <?php
if ($row->art_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_pe" class="check-all check_pers16">
</td>
<td>
<input type="text" id="art_text" class="text-marquo" value="<?=$row->art_text?>">
</td>
</tr>
<tr>
<td><label>Zika</label></td>
<td>
 <?php
if ($row->zika_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_nin" id="chooseAll_1" class="emp_checkbox1 niguno_checked17" > <label>Ninguno</label>
</td>
<td>
 <?php
if ($row->zika_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_m" class="check-all check_madre17">
</td>
<td>
 <?php
if ($row->zika_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_p" class="check-all check_padre17">
</td>
<td>
 <?php
if ($row->zika_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_h" class="check-all check_hnos17">
</td>
<td>
 <?php
if ($row->zika_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_pe" class="check-all check_pers17">
</td>
<td>
<input  id="zika_text" class="text-marquo" type="text" value="<?=$row->zika_text?>">
</td>
</tr>
<!--<tr>
<th></th><th style="width:100%"><span class="rows_selected2" id="select_count2" style="font-size:12px;">0 Seleccionada </span></th><th></th><th></th><th></th><th></th><th></th>
</tr>-->
<tr>
<td colspan="5"><label>Otros</label> <textarea cols="40" id="otros" ><?=$row->otros?></textarea></td>
</tr>
</table>

</div>
<?php
}
?>
</div>		  

<div class="col-md-12" >
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_sospecha_mal" style="cursor:pointer;background:#E6E6FA;">Sospecha de Abuso o Maltrato</p>
<div id="sospecha_mal" style="display:none">
<table class="table" style="width:80%">
<tr>
<td><label>Maltrato fisico</label></td><td>Si <input type="radio" name="mf" class="chkYes5"></td><td>No <input type="radio" name="mf" checked class="chkNo5"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-maltrato" id="text-maltrato" disabled></textarea></td></tr>
<tr>
<td><label>Abuso sexual</label></td><td>Si <input type="radio" name="abs" class="chkYes6"></td><td>No <input type="radio" name="abs" checked class="chkNo6"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-abuso" id="text-abuso" disabled></textarea></td></tr>
<tr>
<td><label>Negligencia</label></td><td>Si <input type="radio" name="neg" class="chkYes7"></td><td>No <input type="radio" name="neg" checked class="chkNo7"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-neg" id="text-neg" disabled></textarea></td></tr>
<tr>
<td><label>Maltrato emocional</label></td><td>Si <input type="radio" name="mem" class="chkYes8"></td><td>No <input type="radio" name="mem" checked class="chkNo8"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control maltrato-emo" id="maltrato-emo" disabled></textarea></td></tr>
</table>
</div>
</div>
<!--column 12 end -->

<div class="col-md-12">
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_otros_ant" style="cursor:pointer;background:#E6E6FA;">Otros antecedentes</p>
<div  style="display:none" id="show_otros_ant" >
<div  class="col-md-6">
 <table class="table" >

<tr>
<td class="col-xs-6"><label>Quirurgicos</label><span class="ninguno1"><input type="checkbox" class='checkin_qui' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="quirurgicos" disabled></textarea>
</td>
<td><label>Gineco-obstetricos</label><span class="ninguno1"><input type="checkbox" class='checkin_gine' checked> <label>Niguno</label></span>
<select class="form-control select2" id="gineco" disabled>
<option value="" hidden></option>
<?php 

foreach($GinecOb as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</td>
</tr>
<tr>
<td><label>Abdominal</label><span class="ninguno1"><input type="checkbox" class='checkin_abd' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="abdominal" disabled></textarea></td>
<td><label>Toracica</label><span class="ninguno1"><input type="checkbox" class='checkin_tora' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="toracica" disabled></textarea></td>
</tr>
<tr>
<td><label>Transfusion sanguinea</label><span class="ninguno1"><input type="checkbox" class='checkin_trans' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="transfusion" disabled></textarea></td>
<td><label>Otros</label><span class="ninguno1"><input type="checkbox" class='checkin_otros' checked> <label>Niguno</label></span>
<textarea class="form-control" id="otros1" cols="20" disabled></textarea></td>
</tr>

<tr>
<td><label>Medicamentos Habituales</label><span class="ninguno1"><label>No</label>&nbsp;<input type="radio" id="radiomedi" name="radiomedi" checked>&nbsp; <label>Si</label>&nbsp;<input type="radio" id="radiomedi" name="radiomedi" class="chM"></span>
	<select class="form-control select2"  multiple="multiple" id="selectmedic" disabled >
	<option value="ningun" hidden></option>
	<?php 
     
	foreach($medicamentos as $row)
	{ 
	?>
	
	<option value="<?=$row->name?>"><?=$row->name?></option>
	<?php
	}
	?>
	</select>
	</td>
</tr>
</table>

</div>
<div class="col-md-6">
<input type="checkbox" class='checkin-right-otro' checked> <label style="font-size:12px">Deactivo</label>
<table class="table right-otro" >
<tr>
<td><label>Hepatis B:</label></td> <td>No &nbsp;<input type="radio" id="hepatis" name="hepatis" value="No" checked>&nbsp; &nbsp; Si&nbsp;<input type="radio" id="hepatis" name="hepatis" value="Si"></td>
</tr>
<tr>
<td><label>HPV :</label></td> <td>&nbsp;No&nbsp;<input type="radio"  id="hpv" name="hpv" value="No" checked>&nbsp; &nbsp; Si&nbsp;<input type="radio"  id="hpv" name="hpv" value="Si"></td>
</tr>
<tr>
<td><label>Toxoide Tetanico </label></td> <td> &nbsp;No&nbsp;<input type="radio"  id="toxoide" name="toxoide" value="No" checked>&nbsp; &nbsp;Si&nbsp;<input type="radio"  id="toxoide" name="toxoide" value="Si"></td>
</tr>
<tr>
<!--<td><label>Otros</label><textarea class="form-control" cols="20" id="otros2"></textarea></td>-->
</tr>
<tr>
<td>

<label style="font-weight:bold">Grupo Sanguineo </label>
</td>
<td>

<select class="form-control" id="grouposang">
<option value="" hidden></option>
<option>A</option>
<option>B</option>
<option>AB</option>
<option>0</option>
</select>

<span style="color:red;" ><i>Alerto: Si no tiene el tipo de sangre del paciente debe de indicar una tipificacion</i></span>
</td>
</tr>
<tr>
<td><label>Rh</label></td>
<td>Positivo <input type="radio" id="tipificacion" name="tipificacion" value="" checked hidden>
<input type="radio" id="tipificacion" name="tipificacion" value="Positivo" class="ck"></td>
<td> Negativo <input type="radio" id="tipificacion" name="tipificacion" value="Negativo"></td>
</tr>
<tr>
<td><label>Tipificacion</label></td><td style="width:190px"><input type="text" id="tip_g" style="width:40px"/> <span id="mas" style="display:none;font-weight:bold">+</span><span id="menos" style="display:none;font-weight:bold">-</span></td>
</tr>
</table>
</div>
</div>
</div>

<div class="col-md-12" >
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_viol" style="cursor:pointer;background:#E6E6FA">Violencia Intafamiliar </p>

<div id="violenciaform"  style="display:none;width:80%">
<form  id="formRecetas" class="form-horizontal"  method="post"  >
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Se ha sentido alguna vez afectada/lastimada emosional o psicologicamente por alguna persona importante para usted ?</label>
<div class="col-md-4"><span class="ninguno1"><input type="checkbox" class='checkin_v1' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia1" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Alguna vez alguien le ha hecho dano fisico ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v2' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia2" disabled >
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">En algun momento has sido tocada, manoseada o forzada a tener contacto o relacion sexual ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v3' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia3" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Cuando era nina, fue tocada de una manera inpropriada por alguien ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v4' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia4" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectTwo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>

</div>

</div>
</form>


</div>
<hr class="hr_ad"/>
</div>




<div class="col-md-12">

<p class="h4 his_med_title" id="click_habitost" style="cursor:pointer;background:#E6E6FA">Habitos Toxicos </p>

<div id="habitost"  style="display:none">
 <div class="table-responsive">
 <table class="table" >

<tr style="font-weight:bold">
<th></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</td><td></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</th>
</tr>
<tr>
<th><input type="checkbox" id="checkin_cafe"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cafe</th>
<th><input type="text" id="hab_c_caf"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_caf" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<!--Pipa-->
<th><input type="checkbox" id="checkin_pipa"/> </th>
<th><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Pipa</th>
<th><input type="text" id="hab_c_pip"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  style="width:149px" id="hab_f_pip" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>
<tr>
<!--Cigarillo-->
<th><input type="checkbox" id="checkin_ciga"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cigarillo</th>
<th ><input type="text" id="hab_c_ciga"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  id="hab_f_ciga" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<!--Alcohol-->
<th><input type="checkbox" id="checkin_al"/> </th>
<th><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Alcohol</th>
<th><input type="text" id="hab_c_al" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_al"  style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>

</tr>
<tr>
<!--Tabaco-->
<th><input type="checkbox" id="checkin_tab"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Tabaco</th>
<th><input type="text" id="hab_c_tab" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  id="hab_f_tab" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>

</table>

<table class="table" >

<tr>
<th style="width:100px"></th><th></th><th style="width:550px">Tipo</th><th>Cantidad</th><th>Frecuencia</th>
</tr>
<tr>
<th><input type="checkbox" id="checkin_drug"/> <img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/drugs.jpg" width="60" alt=""/></th>
<th class="th_habitos" > Droga</th>
<td>
<select class="form-control  select2 hab_t_drug" id="hab_t_drug" multiple="multiple" disabled>
<?php 

foreach($drug as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</td>
<td><input type="text" id="hab_c_drug" class="form-control input_habitos" disabled /></td>
<td class="th_habitos">
<select class="form-control"  id="hab_f_drug" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</td>
</tr>
</table>
</div>
</div>
</div>
</form>
</div><!--datos personal end-->
 <div class="tab-pane" id="SSR">
<?php $this->load->view('admin/historial-medical1/ante_ssr/index');?>
 </div>
<div class="tab-pane" id="Obstetrico">
<?php $this->load->view('admin/historial-medical1/obstetrico/index');?>
</div>

<div class="tab-pane " id="Pediatrico" >
<?php $this->load->view('admin/historial-medical1/pediatrico/index');?>
</div><!--div datos citas ends-->

<div class="tab-pane" id="Enfermedad_Actual" >
<?php $this->load->view('admin/historial-medical1/enfermedad-actual/index');?>
</div>

<div class="tab-pane" id="Rehabilitacion" >
<?php $this->load->view('admin/historial-medical1/rehabilitation/index');?>
</div>

<div class="tab-pane" id="examen-fisico" >
<?php $this->load->view('admin/historial-medical1/examen-fisico/index');?>
</div>
<div class="tab-pane" id="oftalmologia" >
<?php $this->load->view('admin/historial-medical1/oftalmologia/index');?>
</div>
<div class="tab-pane" id="Del_Sistema" >
<?php $this->load->view('admin/historial-medical1/examen-sistema/index');?>
</div>

<div class="tab-pane" id="conclusion" >
<?php $this->load->view('admin/historial-medical1/conclusion/index');?>
</div>

<div class="tab-pane" id="control_prenatal" >
<?php $this->load->view('admin/historial-medical1/control-prenatal/index');?>
</div>

<div class="tab-pane" id="recetas" >
<?php $this->load->view('admin/historial-medical1/recetas/index');?>
</div>


<div class="tab-pane" id="estudios" >
<?php $this->load->view('admin/historial-medical1/estudios/index');?>
</div>
<div class="tab-pane" id="laboratorios" >
<?php $this->load->view('admin/historial-medical1/laboratorios/index');?>
</div>






 </div>
 
<!--div datos citas ends-->

 </div>

<div class="modal fade" id="zoomimage"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<div class="modal fade" id="zoomimagead"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>
</div>
      </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
  </body>
  
</html>
