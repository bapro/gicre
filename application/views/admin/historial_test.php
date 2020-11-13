 <?php

$name=($this->session->userdata['admin_name']);
$last_name=($this->session->userdata['admin_last_name']);
  ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

 <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<script type="text/javascript" src="<?= base_url();?>assets/css/slick.css"></script>
<script type="text/javascript" src="<?= base_url();?>assets/css/slick-theme.css"></script>
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<style>
td{text-align:left;font-size:15px}
th{text-align:left;font-size:15px;color:black}
</style>
<script>
$(function(){
    $("#branch").chained("#farmacia");
});

</script>
    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>assets/img/apple-touch-icon-152x152.png" />

    <!-- owl carousel css -->

</head>
 
 	<form  id="formAntecedentes" class="form-horizontal secondoption"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 

<div class="container-fluid">

<div class="navbar navbar-fixed-top navbar-default"  id="historial_medical_header">

<div class="row" id="datos" style="border-bottom:1px solid rgb(205,205,205 );background:#428bca;color:white">
<div class="col-xs-10">
<p id="dp">Datos personales</p>
</div>
<div class="col-xs-2">
<button title="Ocultar" style="background:white;color:black" type="button" id="bt" class="btn btn-primary btn-xs reveal">Ocultar</button>
</div>
</div>

  <?php foreach($HISTORIAL_MEDICAL as $historial_medical)
	 
	 {
	 ?>
	 <div id="Ocultar">
	 <div class="row row-no-padding" >
  <div class="col-xs-3 ">
  <p class="nec"><span id="bold_h">NEC : </span> <?=$historial_medical->id_p_a;?></p>  
  </div>
  <div class="col-xs-3 ">
  <p><span id="bold_h">CEDULA :</span> <?=$historial_medical->cedula;?></p>
  </div>
  <div class="col-xs-3 ">
 <p> <span id="bold_h">NOMBRES : </span><?=$historial_medical->nombre;?> <?=$historial_medical->apellido;?></p>
  </div>
  <div class="col-xs-3 ">
  <p><span id="bold_h">FECHA :</span> <?=$historial_medical->fecha_propuesta;?></p>
  </div>
  </div>
  <div class="row row-no-padding">
  <div class="col-xs-3 ">
  <p class="nec"><span id="bold_h">EDAD : </span> <?=$historial_medical->edad;?></p>
  </div>
  <div class="col-xs-3 ">
  <p><span id="bold_h">SEXO :</span> <?=$historial_medical->sexo;?></p>
  </div>
  <div class="col-xs-3 ">
  <p><span id="bold_h">TIPO : </span><?=$historial_medical->frecuencia;?></p>
  </div>
  <div class="col-xs-3 ">
  <p><span id="bold_h">ARS :</span> <?=$historial_medical->seguro_medico;?></p>
  </div>
  </div>
  </div>
  	 <?php
	 }
	 ?>
	<div class="row downl"> 
 <div class="col-md-3" >
 
 <a class="left_hit_" href="<?php echo site_url('admin/create_cita');?>">Nueva cita</a> <a class="left_hit" style="margin-left:20px" href="<?php echo site_url('admin/ver_confirmada_solicitud');?>">Cola de Citas</a>

 </div>
 <div class="col-md-6 " >
<p id="successAnt" ><i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos</p>
</div>
 <div class="col-md-3" >
 
 <button class="btn btn-primary btn-xs"  style="background:green"><i class="fa fa-floppy-o" aria-hidden="true"></i>
 Guardar Formulario
 </button>
 <br/><br/>

 </div>
 <div>
 </div>
</div>
</div>

</div>
<section  id="historial_medical_sec" >
<div class="row" >

<div class="col-md-2 affix" style="border-right:1px solid;border-color: rgb(206,206,206);height:100%;" > <!-- required for floating -->
<!-- Nav tabs -->

<ul  class="nav nav-pills nav-stacked">

<li class="active"><a href="#home" data-toggle="tab" class="left_hit" > ANTECEDENTES </a></li>
<li><a href="#enfermedad" data-toggle="tab" class="left_hit"> ENFERMEDAD ACTUAL</a></li>
<li><a href="#examenf" data-toggle="tab" class="left_hit"> EXAMEN FISICO</a></li>
<li><a href="#examensi" data-toggle="tab" class="left_hit"> EXAMEN DEL SISTEMA</a></li>
<li><a href="#conclucion" data-toggle="tab" class="left_hit"> CONCLUCION DIAGNOSTICA</a></li>
<li><a href="#recetas" data-toggle="tab" class="left_hit"> RECETAS</a></li>
<li><a href="#estudios" data-toggle="tab" class="left_hit">ESTUDIOS</a></li>
 <li><a href="#laboratorios" data-toggle="tab" class="left_hit"> LABORATORIOS</a></li>
</ul>
<p style="margin-left:13px">
 <img class="img-responsive" src="<?= base_url();?>assets/img/aaaadd.png" width="110" alt=""/>

</p>


</div>
<div class="col-md-10 tab-content" style="margin-left:16%" >
<!-- Tab panes -->

<div class="tab-pane active" id="home"> 
 
<ul>


<div id="show_ant"></div>
<div class="col-xs-12 move_left" id="hide_ant">
 <p class="h4 his_med_title">Antecedentes personales, familiares y patologicos</p>
 <?php if ($num_cont_ant > 0 )
{
	 foreach($AntePeFaPa as $rowant)
	 {
	?>

<div class="form-group">
<label class="control-label col-md-1" >Infancia</label>
<div class="col-md-9">
<textarea class="form-control" disabled><?=$rowant->infancia?></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-1" >Adolescencia</label>
<div class="col-md-9">
<textarea class="form-control"   disabled><?=$rowant->adolescencia?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-1" >Adultez</label>
<div class="col-md-9">
<textarea class="form-control"  disabled><?=$rowant->adultez?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-1" for="lastname">Antecedentes familiares</label>
<div class="col-md-9">
<textarea  class="form-control"    disabled><?=$rowant->familias?></textarea>
</div>

</div>
 <div class="form-group">
 <div class="col-md-10">
 <?php
if ($rowant->cancer_mama ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox"  <?=$selected?> disabled> <label class="control-label" id="ant_fam_can_mama" > Antecedentes familiares de CANCER DE MAMA</label>
</div>
 </div>
 
  <div class="form-group">
 <div class="col-md-10">
  <?php
if ($rowant->cancer_ovario ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
 <input type="checkbox" <?=$selected?> disabled > <label class="control-label" id="ant_fam_can_ovario" > Antecedentes familiares de CANCER DE OVARIO</label>
</div>
 </div>

 <?php
}
}
 else {
	 
//Todavia no informaciones se han entregadas
 ?>
 <div id="deactivate_antecedante">
 <div class="form-group">
<label class="control-label col-md-1" >Infancia</label>
<div class="col-md-9">
<textarea class="form-control" id="infancia" disabled></textarea>
</div>
<div class="col-md-2 hidechecke1">
<input type="checkbox" class='checkininfancia'  > <label class="act_inf">Activo</label><label style="display:none" class="dea_inf">Deactivo</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Adolescencia</label>
<div class="col-md-9">
<textarea class="form-control" id="adolescencia"  disabled></textarea>
</div>
<div class="col-md-2 hidechecke2">
<input type="checkbox" class='checkin_adol'> <label class="act_adol">Activo</label><label style="display:none" class="dea_adol">Deactivo</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Adultez</label>
<div class="col-md-9">
<textarea class="form-control" id="adultez"   disabled></textarea>
</div>
<div class="col-md-2 hidechecke3">
<input type="checkbox" class='checkin_adultez'> <label class="act_adul">Activo</label><label style="display:none" class="dea_adul">Deactivo</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Antecedentes familiares</label>
<div class="col-md-9">
<textarea  class="form-control"   id="familiares"   disabled ></textarea>
</div>
<div class="col-md-2 hidechecke4">
<input type="checkbox" class='checkin_fami'> <label class="act_fam">Activo</label><label style="display:none" class="dea_fam">Deactivo</label>
</div>
</div>
 <div class="form-group">
 <div class="col-md-10">
 <input type="checkbox" name="cancer_mama" id="cancer_mama" value="1"  > <label class="control-label" id="ant_fam_can_mama" > Antecedentes familiares de CANCER DE MAMA</label>
</div>
 </div>
 
  <div class="form-group">
 <div class="col-md-10">
 <input type="checkbox" name="cancer_ovario" id="cancer_ovario" value="1" > <label class="control-label" id="ant_fam_can_ovario" > Antecedentes familiares de CANCER DE OVARIO</label>
</div>
 </div>
 </div>
 <?php
}

 ?>
 <br/>
<!--Second Ant-->

<p class="h4 his_med_title">Antecedentes alergicos y reaccion a medicamentos</p>

 <?php if ($CountAntAlReMed > 0 )
{
	 foreach($AntAlReMed as $rowarm)
	 {
	?>

<div class="form-group">
<label class="control-label col-md-1" >Alimentos Alergicos</label>
<div class="col-md-9">
<textarea class="form-control"  disabled><?=$rowarm->alimentos_al?></textarea>
</div>

</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-md-1" >Medicamentos Alergicos</label>
<div class="col-md-9">
<textarea class="form-control"  disabled><?=$rowarm->medicamentos_al?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-1" for="lastname">Otros Alergicos</label>
<div class="col-md-9">
<textarea class="form-control"   disabled ><?=$rowarm->otros_al?></textarea>
</div>

</div>
 <?php
}
}
 else {
	 ?>
	<div class="form-group">
<label class="control-label col-md-1" >Alimentos Alergicos</label>
<div class="col-md-9">
<textarea class="form-control" id="alimentos_al" ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Medicamentos Alergicos</label>
<div class="col-md-9">
<textarea class="form-control" id="medicamentos_al" ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" for="lastname">Otros Alergicos</label>
<div class="col-md-9">
<textarea class="form-control" id="otros_al" ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div> 
 <?php
 }
 ?>

</br/>
<p class="h4 his_med_title">Otros antecedentes</p>
 <?php if ($CountAntOtros > 0 )
{
	 foreach($AntOtros as $rowo)
	 {
	?>

<div class="form-group">
<label class="control-label col-md-1" for="firstname">Medicamentos Habituales</label>
<div class="col-md-9">
<textarea class="form-control"  disabled ><?=$rowo->medicamentos_hab?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Quirurgicos</label>
<div class="col-md-9">
<textarea class="form-control"  disabled><?=$rowo->quirurgicos?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-1" >Transfusión sanguínea</label>
<div class="col-md-9">
<textarea class="form-control"  disabled><?=$rowo->transfusion?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Traumatismo</label>
<div class="col-md-9">
<textarea class="form-control" disabled><?=$rowo->traumatismo?></textarea>
</div>

</div>
 <?php
}
}
 else {
	 ?>
<div class="form-group">
<label class="control-label col-md-1" for="firstname">Medicamentos Habituales</label>
<div class="col-md-9">
<textarea class="form-control" id="medicamentos_hab"    ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-md-1" >Quirurgicos</label>
<div class="col-md-9">
<textarea class="form-control" id="quirurgicos"  ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Transfusión sanguínea</label>
<div class="col-md-9">
<textarea class="form-control" id="transfusion"   ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Traumatismo</label>
<div class="col-md-9">
<textarea class="form-control" id="traumatismo"   ></textarea>
</div>
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>
</div>
 <?php
 }
?> 
 <br/>

<p class="h4 his_med_title">Habitos Toxicos</p>
 <?php if ($CountHabitos > 0 )
{
	 foreach($HABITOS as $rowha)
	 {
	?>
<div   style="overflow-x:auto;">
<table class="table" style="border:1px solid;background:white;border-color: rgb(206,206,206)">
<tr>
<th></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</th>
</tr>

<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cafe</th>
<th><input type="text"  value="<?=$rowha->cafe_cant?>" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  style="width:149px" disabled>
<option><?=$rowha->cafe_frec ?></option>
</select>
</th>

<th><img src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="30" alt=""/> </th>
<th >Pipa</th>
<th><input type="text" value="<?=$rowha->pipa_cant?>"  class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  style="width:149px" disabled>
<option><?=$rowha->pipa_frec?></option>

</select>
</th>
</tr>

<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cigarillo</th>
<th class="nombre"><input type="text" value="<?=$rowha->ciga_can?>" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  style="width:149px" disabled>
<option><?=$rowha->ciga_frec?></option>
</select>
</th>
<th><img src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="30" alt=""/> </th>
<th >Alcohol</th>
<th><input type="text" value="<?=$rowha->alc_can?>"  class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"   style="width:149px" disabled>
<option><?=$rowha->alc_frec ?></option>
</select>
</th>
</tr>
<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Tabaco</th>
<th><input type="text" value="<?=$rowha->tab_can?>"  class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" style="width:149px" disabled>
<option><?=$rowha->tab_frec?></option>

</select>
</th>
</tr>

</table>


</div>

 <?php
}
}
 else {
	 ?>
	 
	 <div   style="overflow-x:auto;">
<table class="table" style="border:1px solid;background:white;border-color: rgb(206,206,206)">
<tr>
<th></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</td><td></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</th>
</tr>

<tr>
<th><input type="checkbox" id="checkin_cafe"/> </th>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cafe</th>
<th><input type="text" id="hab_c_caf" value="" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_caf" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<th><input type="checkbox" id="checkin_pipa"/> </th>
<th><img src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="30" alt=""/> </th>
<th >Pipa</th>
<th><input type="text" id="hab_c_pip" value="" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" name="sexo" style="width:149px" id="hab_f_pip" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>


<tr>
<th><input type="checkbox" id="checkin_ciga"/> </th>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cigarillo</th>
<th class="nombre"><input type="text" id="hab_c_ciga" value="" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  id="hab_f_ciga" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<th><input type="checkbox" id="checkin_al"/> </th>
<th><img src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="30" alt=""/> </th>
<th >Alcohol</th>
<th><input type="text" id="hab_c_al" value="" class="control-label input_habitos" disabled /></th>
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
<th><input type="checkbox" id="checkin_tab"/> </th>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Tabaco</th>
<th><input type="text" id="hab_c_tab" class="control-label input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" name="sexo" id="hab_f_tab" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>

</table>


</div>
	 
	 <?php
 }
 ?>
</br/>
</form>

</ul>


</div>

<div class="tab-pane" id="enfermedad">
<ul>
<div class="col-xs-12 move_left"  >
<p class="h4 his_med_title">Navegador</p>
<div id="show_nav_enf"></div>
<div id="hide_all_enf">
<div class="col-xs-5"  >

<?php if ($count_enf > 0)
{
	
	?>
<select class="form-control" id="id_enf" name="id_enf">
<option value="">Seleccionar <?=$count_enf?> datos</option>
<?php 

 foreach($enfermedad as $row)
{ 
?>
<option value='<?=$row->id_enf;?>'>Medico : <?=$row->inserted_by; ?> <br/><br/> Fecha : <?=$row->inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-2" style="display:none" id="reset1">
<button type="button">Reiniciar</button>
</div>
<br/>
<div id="naveg_enf_result"></div>

<div id="hide_enfermedad">
<p class="h4 his_med_title">Historia de la enfermedad actual</p>

<div class="form-group">
<label class="control-label col-md-1" >Signopsis</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_signopsis" ></textarea>
</div>
<!--
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>-->
</div>
<p class="h4 his_med_title">Estudios traidos por el paciente</p>
<div class="form-group">
<label class="control-label col-md-1" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_laboratorios" ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_estudios" ></textarea>
</div>
</div>
</div>
</div>
</div>
</ul>
</div>

<div class="tab-pane" id="examenf">
<div class="col-xs-12 move_lefts"  >
<p class="h4 his_med_title">Navegador</p>
<div class="col-xs-12" >sdfsdfsdsdf</div>
<p class="h4 his_med_title">Signos vitales</p>
 <div  style="overflow-x:auto;">
<table class="table" style="background:white"  cellspacing="0">
  <tr>
  <th></th><th></th><th>Aspecto General</th>
  </tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="control-label">
Peso
</label>
 <input type="text" id="peso" class="control-label"/></td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label  class="col-sm-1 control-label">Ta</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="ta"  type="text">
                           
                        </div>
                    </div>
					<!--<label for="new_credit" class="col-sm-2 control-label">/</label>-->
                    <div class="col-sm-6 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="hg"  type="text">
                            <span class="input-group-addon">mm/Hg</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type="checkbox" name="sano" value="1"/> SANO	 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label for="new_discount" class="control-label">
Talla
</label>
 <input type="text" id="talla" class="control-label"/>

</td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label for="new_discount" class="col-sm-1 control-label">Fr</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fr"  type="text">
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Tempo.</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="tempo"  type="text">
                            <span class="input-group-addon"> &#8451 </span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type="checkbox" name="agudamente" value="1"/> AGUDAMENTE ENFERMA 	 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="control-label">
IMC
</label> 
 <input type="text" id="imc" class="control-label"/></td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fc"  type="text">
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulso"  type="text">
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type="checkbox" name="cronicamente"  value="1"/> CRONICAMENTE ENFERMA		 		
</td>
</tr>

	   
</table>
</div>
<p class="h4 his_med_title">Navegador</p>
<div id="show_exam"></div>
<div id="hide_all_exam">
<div class="col-xs-5"  >

<?php if ($count_exam > 0)
{
	
	?>
<select class="form-control" id="id_enf" name="id_enf">
<option value="">Seleccionar <?=$count_exam?> datos</option>
<?php 

 foreach($examen as $row)
{ 
?>
<option value='<?=$row->id_ex;?>'>Medico : <?=$row->inserted_by; ?> <br/><br/> Fecha : <?=$row->inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-2" style="display:none" id="reset1">
<button type="button">Reiniciar</button>
</div>
<br/><br/>
<p class="h4 his_med_title">Examenes</p>
 <div  style="overflow-x:auto;">
<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">

<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Neurologico</label>
<div class="col-md-7">
<textarea class="form-control" id="neurologico"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_neuro"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Abdomen</label>
<div class="col-md-7">
<textarea class="form-control" id="abdomen"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_abdo"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Cabeza y cuello</label>
<div class="col-md-7">
<textarea class="form-control" id="cabeza"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_cabe"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2">Zona pelvica</label>
<div class="col-md-7">
<textarea class="form-control" id="pelvica"   ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_pelvi"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Evaluacion clinica de mamas</label>
<div class="col-md-7">
<textarea class="form-control" id="evaluacion_mama" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_evali"> <label>Sin hallazgos</label>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Inspeccion genital</label>
<div class="col-md-7">
<textarea class="form-control" id="inspeccion_genital"   ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_insp"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Examen de torax</label>
<div class="col-md-7">
<textarea class="form-control" id="torax"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_torax"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="columna_dorsal"></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_columna"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Corazon</label>
<div class="col-md-7">
<textarea class="form-control" id="corazon"></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_corazon"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Extremidades</label>
<div class="col-md-7">
<textarea class="form-control" id="extremidades" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_ext"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Pulmones</label>
<div class="col-md-7">
<textarea class="form-control" id="pulmones" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_pulm"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" for="firstname">Otros</label>
<div class="col-md-7">
<textarea class="form-control" id="otros" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_otros"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
	   
</table>
</div>
</div>
 </div>
 </div>
<div class="tab-pane" id="examensi">
<div class="col-xs-12 move_lefts"  >
<p class="h4 his_med_title">Navegador</p>
<div class="col-xs-12" >sdfsdfsdsdf</div>
<p class="h4 his_med_title">Examen por sistema</p>
 <div  style="overflow-x:auto;">
<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">

<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Sistema nervioso</label>
<div class="col-md-7">
<textarea class="form-control" id="nervioso"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_nerv"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Sistema linfatico</label>
<div class="col-md-7">
<textarea class="form-control" id="linfatico"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_linf"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Sistema respiratorio</label>
<div class="col-md-7">
<textarea class="form-control" id="respiratorio"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_resp"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Sistema genitourinario</label>
<div class="col-md-7">
<textarea class="form-control" id="genitourinario"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_genit"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Sistema digestivo</label>
<div class="col-md-7">
<textarea class="form-control" id="digestivo"></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_dig"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2">Sistema endocrino</label>
<div class="col-md-7">
<textarea class="form-control" id="endocrino"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_endo"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Otros</label>
<div class="col-md-7">
<textarea class="form-control" id="otros_ex_sis" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_otros"> <label>Sin hallazgos</label>
</div>
</div>
</td>
<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="dorsales"    ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_dor"> <label>Sin hallazgos</label>
</div>
</div>
</td>
</tr>
<tr>
</table>
</div>
</div>
 </div>
 
 <div class="tab-pane" id="conclucion"> 
<div class="col-xs-12 move_lefts"  >
<p class="h4 his_med_title">Navegador</p>
<div class="col-xs-12" >sdfsdfsdsdf</div>
<p class="h4 his_med_title">conclucion diagnostica</p>
 <div  style="overflow-x:auto;">
<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">

<tr>

<td class="ida" style="width:1px;font-weight:bold">

<div class="form-group">
<label class="control-label col-md-2" >Plan</label>
<div class="col-md-8">
<textarea class="form-control" id="plan"  ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-8">
   <input class="form-control" id="diagno_def"  type="text">
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Otro(s) Diagnostico(s) Presuntivo:  </label>
<div class="col-md-8">
   <input class="form-control" id="diagno_pres"  type="text">
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Procedimiento (CIE-9):  </label>
<div class="col-md-8">
   <input class="form-control" id="procedimiento"  type="text">
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Otros procedimientos:   </label>
<div class="col-md-8">
   <input class="form-control" id="otros_proced"  type="text">
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2">Evolucion (Paciente subsecuente):   </label>
<div class="col-md-7">
<textarea class="form-control" id="evolucion"  ></textarea>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Mejoria"> <label>Mejoria</label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Empeorando"> <label>Empeorando </label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="No mejoria" checked> <label>No mejoria  </label>

</div>
</td>

</tr>
</table>
</div>

</div>
 </div>
 
  <div class="tab-pane" id="recetas"> 
  <div class="col-xs-12 move_lefts"  >
  
<p class="h4 his_med_title">Indicaciones medicas</p>
<div  style="overflow-x:auto;">
<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">
<form method="post" id="formIndicaciones">
<input type="hidden" value="<?=$name?> <?=$last_name?>" id="operator" name="operator"/>
<input type="hidden" value="<?=$id_historial?>" id="historial_id" name="historial_id"/>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<div class="form-group">
<label class="control-label col-md-2">Medicamento</label>
<div class="col-md-6">
<select  class="form-control"  name="medicamento" id="medicamento" >
<option value="" hidden></option>
<?php 

foreach($medicamentos as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" for="firstname">Frecuencia: </label>
<div class="col-md-2">
<select  class="form-control"   name="frecuencia" id="frecuencia" >
<option value="" hidden></option>
<?php 

foreach($frecuencia as $row)
{ 
echo '<option value="'.$row->frecuency.'">'.$row->frecuency.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Cantidad (dias):  </label>
<div class="col-md-8">
<input type="number" name="cantidad" id="cantidad" />
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Via:  </label>
<div class="col-md-3">
  <select  class="form-control"   name="via" id="via" >
<option value="" hidden></option>
<?php 

foreach($via as $row)
{ 
echo '<option value="'.$row->via.'">'.$row->via.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" for="firstname">Farmacia:   </label>
<div class="col-md-3">
<select  class="form-control"  name="farmacia" id="farmacia" >
<option value="" hidden></option>
<?php 

foreach($farmacia as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->drug_store_name.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" for="firstname">Sucursal:   </label>
<div class="col-md-5">
<select  class="form-control"    name="branch" id="branch" >
<?php 

foreach($branches as $row)
{ 
echo '<option value="'.$row->id.'" class="'.$row->drug_store_id.'">'.$row->branch_name.'</option>';
}
?>
</select>
</div>

</div>
<div class="col-md-5 col-sm-offset-2" >
<div class="btn-group">
<button type="submit" id="saveIndicacionesMedicales" class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>
</form>
<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a href=""> Exportar indicaciones</a></li>
</ul>

</div>
 </div>
</td>

</tr>
</table>
</div>
<p class="h4 his_med_title">Indicaciones previas</p>
<p id="success" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>

  
 <div  style="overflow-x:auto;">
 <div id="new_indication"></div>
 <div id="tabind">
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;"><i><?=$num_count?> datos</i></span>
	<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Medicamento</th>
		 <th style="width:1px">Frecuencia</th>
		  <th style="width:1px"><strong>Via</strong></th>
        <th style="width:5px">Cantidad (dias)</th>
		 <th style="width:1px">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPrevias as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->medicamento;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?></td>
		<td><?=$row->cantidad;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
</div>
</div>
 </div>

  <div class="tab-pane" id="estudios"> 
  <div class="col-xs-12 move_lefts" >
  
<p class="h4 his_med_title">Indicaciones de estudios</p>
<div  style="overflow-x:auto;">
<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">
<form method="post" id="formEstudios">
<input type="hidden" value="<?=$name?> <?=$last_name?>" id="operators" name="operators"/>
<input type="hidden" value="<?=$id_historial?>" id="historial_id_es" name="historial_id_es"/>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBoxE"></h4>
<div class="form-group">
<label class="control-label col-md-2">Estudios</label>
<div class="col-md-4">
<select  class="form-control"  name="estudios" id="estudios" required>
<option value="" hidden></option>
<?php 

foreach($estudios as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" for="firstname">Parte del cuerpo: </label>
<div class="col-md-2">
<select  class="form-control"   name="cuerpo" id="cuerpo" >
<option value="" hidden></option>
<?php 

foreach($cuerpo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Lateralidad:  </label>
<div class="col-md-8">
<input type="number" name="lateralidad" id="lateralidad" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" >Observaciones:  </label>
<div class="col-md-8">
<textarea  class="form-control"  id="observaciones" name="observaciones"  ></textarea>
</div>
</div>

<div class="col-md-5 col-sm-offset-2" >
<div class="btn-group">
<button type="submit" id="saveIndicacionesEstudios" class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>
</form>
<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a href=""> Exportar indicaciones</a></li>
</ul>

</div>
 </div>
</td>

</tr>
</table>
</div>
<p class="h4 his_med_title">Indicaciones previas</p>
<p id="successE" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>

  
 <div  style="overflow-x:auto;">
 <div id="new_indication_estudios"></div>
 <div id="tabes">
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;"><i><?=$num_count_es?> datos</i></span>
	<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Estudio</th>
		 <th style="width:5px">Parte del cuerpo</th>
		  <th style="width:1px"><strong>Lateralidad</strong></th>
        <th style="width:5px">Observaciones</th>
		 <th style="width:1px">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPreviasEstudios as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->estudio;?></td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
</div>
</div>
 </div>
 
   <div class="tab-pane" id="laboratorios"> 
  <div class="col-xs-12 move_lefts" >
  
<p class="h4 his_med_title">Indicaciones medicas</p>

<table  class="table table-striped table-bordered" style="background:white"  cellspacing="0">
<form method="post" id="formLabo">
<input type="hidden" value="<?=$name?> <?=$last_name?>" id="operatorl" name="operatorl"/>
<input type="hidden" value="<?=$id_historial?>" id="historial_id_l" name="historial_id_l"/>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBoxE"></h4>
<div class="form-group">
<label class="control-label col-md-2">Laboratorios</label>
<div class="col-md-4">
<select  class="form-control chosen-select" data-placeholder="Comienza a escribir un laboratorio." multiple name="laborat[]" id="laborat" required>

<?php 

foreach($laboratories as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>


<div class="col-md-5 col-sm-offset-2" >
<div class="btn-group">
<button type="submit"  class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>
</form>
<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a href=""> Exportar indicaciones</a></li>
</ul>

</div>
 </div>
</td>

</tr>
</table>

<p class="h4 his_med_title">Indicaciones previas</p>
<p id="successL" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>

 <div  style="overflow-x:auto;">
 <div id="new_indication_lab"></div>
 <div id="tablab">
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;" id="update_count"><i><?=$num_count_lab?> datos</i></span>
	<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Laboratorio</th>
		 <th style="width:5px">Operador</th>
		 <th style="width:5px">Eliminar</th> 
	 </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesLab as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_time;?></td>
		<td><?=$row->laboratory;?></td>
		<td><?=$row->operator;?></td>
		 <td> <a title="Eliminar laboratorio <?=$row->laboratory;?>" class="st deletelab" id="<?=$row->id_lab; ?>"  style="background:rgb(223,0,0);cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		   
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
</div>
</div>
 </div>
 </div> 

</div>
</div>
</section>

	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/slick.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/js/historial.js"></script>

<script>
// save data of indicaciones medicales
$(function() {

$('#formIndicaciones').on('submit', function(event) {
var medicamento = $("#medicamento").val();
var frecuencia = $("#frecuencia").val();
var cantidad = $("#cantidad").val();
var via = $("#via").val();
var farmacia = $("#farmacia").val();
var branch = $("#branch").val();
var operator = $("#operator").val();
var historial_id = $("#historial_id").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicaciones')?>",
data: {medicamento:medicamento,frecuencia:frecuencia,cantidad:cantidad,via:via,farmacia:farmacia,branch:branch,operator:operator,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#formIndicaciones')[0].reset();
$("#errorBox").hide();
$('#success').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#new_indication").html(data);
$("#tabind").hide(); 
}  
});

return false;
});
});




//isertion of indications estudios

$(function() {

$('#formEstudios').on('submit', function(event) {
var estudios = $("#estudios").val();
var cuerpo = $("#cuerpo").val();
var lateralidad = $("#lateralidad").val();
var observaciones = $("#observaciones").val();
var operators = $("#operators").val();
var historial_id_es = $("#historial_id_es").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicacionesEstudios')?>",
data: {estudios:estudios,cuerpo:cuerpo,lateralidad:lateralidad,observaciones:observaciones,operators:operators,historial_id_es:historial_id_es},

cache: true,
success:function(data){ 
$('#formEstudios')[0].reset();
$("#errorBoxE").hide();
$('#successE').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#new_indication_estudios").html(data);
$("#tabes").hide(); 
}  
});

return false;
});
});	



//isertion of indications laboratories

$(function() {

$('#formLabo').on('submit', function(event) {
var laborat = $("#laborat").val();
var operatorl = $("#operatorl").val();
var historial_id_l = $("#historial_id_l").val();

  
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicacionesLab')?>",
data: {laboratorios:laborat,operatorl:operatorl,historial_id_l:historial_id_l},

cache: true,
success:function(data){
$('.chosen-select').val('').trigger('chosen:updated');	
//$("#errorBoxl").hide();
$('#successL').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#new_indication_lab").html(data);
$("#tablab").hide();

}  
});

return false;
});
});

//delete laboratorio


 $(".deletelab").click(function(){
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		var el = this;
   var del_id = $(this).attr('id');
   $.ajax({
            type:'POST',
            url:'<?=base_url('admin/DeleteHistLab')?>',
            data: {id : del_id},
            success:function(response) {
				$("#update_count").load(location.href + " #update_count>*", "");
                 // Removing row from HTML Table
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });
                  
            }
    });
 }
 })



//insert habitos toxicos

$(function() {
$('#formAntecedentes').on('submit', function(event) {
var enfentry = 'enfentry';
var examentry = 'examentry';
var hab_c_caf = $("#hab_c_caf").val();
var hab_c_caf = $("#hab_c_caf").val();
var hab_f_caf = $("#hab_f_caf").val();
var hab_c_pip = $("#hab_c_pip").val();
var hab_f_pip = $("#hab_f_pip").val();
var hab_c_ciga = $("#hab_c_ciga").val();
var hab_f_ciga = $("#hab_f_ciga").val();
var hab_c_al = $("#hab_c_al").val();
var hab_f_al = $("#hab_f_al").val();
var hab_c_tab = $("#hab_c_tab").val();
var hab_f_tab = $("#hab_f_tab").val();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();

//-----------------ANTECEDENTES------------------------------------
var infancia = $("#infancia").val();
var adolescencia = $("#adolescencia").val();
var adultez = $("#adultez").val();
var familiares = $("#familiares").val();
//var cancer_mama = $("#cancer_mama").val();
//var cancer_ovario = $("#cancer_ovario").val();
var alimentos_al = $("#alimentos_al").val();
var medicamentos_al = $("#medicamentos_al").val();
var medicamentos_hab = $("#medicamentos_hab").val();
var quirurgicos = $("#quirurgicos").val();
var transfusion = $("#transfusion").val();
var traumatismo = $("#traumatismo").val();
var otros_al = $("#otros_al").val();

var cancer_ma = [];
 // Initializing array with Checkbox checked values
  $("input[name='cancer_mama']:checked").each(function(){
            cancer_ma.push(this.value);
 });
		
var cancer_ov = [];
 // Initializing array with Checkbox checked values
 $("input[name='cancer_ovario']:checked").each(function(){
            cancer_ov.push(this.value);
 });
 
//---------------------ENFERMEDAD--------------------------------------

var enf_signopsis = $("#enf_signopsis").val();
var enf_laboratorios = $("#enf_laboratorios").val();
var enf_estudios = $("#enf_estudios").val();

//------------EXAMEN FISICO---------------------------------------------
var peso = $("#peso").val();
var talla = $("#talla").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var sano_check = [];
 // Initializing array with Checkbox checked values
 $("input[name='sano']:checked").each(function(){
            sano_check.push(this.value);
 });
 
 var agudamente_check = [];
 // Initializing array with Checkbox checked values
 $("input[name='agudamente']:checked").each(function(){
            agudamente_check.push(this.value);
 });
 
 var cronicamente_check = [];
 // Initializing array with Checkbox checked values
 $("input[name='cronicamente']:checked").each(function(){
            cronicamente_check.push(this.value);
 });
 //----------------------------------------------------------------
var neurologico  = $("#neurologico").val();
 var abdomen = $("#abdomen").val();
 var cabeza = $("#cabeza").val();
 var pelvica = $("#pelvica").val();
 var evaluacion_mama = $("#evaluacion_mama").val();
 var inspeccion_genital = $("#inspeccion_genital").val();
 var torax = $("#torax").val();
 var columna_dorsal  = $("#columna_dorsal").val();
 var corazon = $("#corazon").val();
 var extremidades = $("#extremidades").val();
 var pulmones = $("#pulmones").val();
 var otros = $("#otros").val();
 //---------------------------------------------------------------
 
 var nervioso  = $("#nervioso").val();
 var linfatico  = $("#linfatico").val();
 var respiratorio = $("#respiratorio").val();
 var genitourinario = $("#genitourinario").val();
 var digestivo = $("#digestivo").val();
 var endocrino = $("#endocrino").val();
 var otros_ex_sis = $("#otros_ex_sis").val();
 var dorsales = $("#dorsales").val();
 //---------------------------------------------------------------------
 
  var plan   = $("#plan").val();
 var diagno_def  = $("#diagno_def").val();
 var diagno_pres = $("#diagno_pres").val();
 var procedimiento = $("#procedimiento").val();
 var otros_proced = $("#otros_proced").val();
 var evolucion = $("#evolucion").val();
 //var conclusion_radio = $("#conclusion_radio").serialize();
var conclusion_radio = $('input[type="radio"]:checked').val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/saveHistorialMedical')?>",
data: {hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,inserted_by:inserted_by,hist_id:hist_id,
       infancia:infancia, adolescencia:adolescencia, adultez:adultez, familiares:familiares, cancer_mama:cancer_ma, cancer_ovario:cancer_ov,
	   alimentos_al:alimentos_al, medicamentos_al:medicamentos_al, otros_al:otros_al,
	   medicamentos_hab:medicamentos_hab, quirurgicos:quirurgicos, transfusion:transfusion, traumatismo:traumatismo,
	   enf_signopsis:enf_signopsis, enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,
	   peso:peso, talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg, tempo:tempo, pulso:pulso,sano_check:sano_check,agudamente_check:agudamente_check, cronicamente_check:cronicamente_check,
	   neurologico:neurologico,abdomen:abdomen, cabeza:cabeza, pelvica:pelvica, evaluacion_mama:evaluacion_mama, inspeccion_genital:inspeccion_genital, torax:torax,columna_dorsal:columna_dorsal, corazon:corazon, extremidades:extremidades, pulmones:pulmones, otros:otros,
	   nervioso:nervioso, linfatico:linfatico, respiratorio:respiratorio, genitourinario:genitourinario, digestivo:digestivo,endocrino:endocrino,otros_ex_sis:otros_ex_sis,dorsales:dorsales,
	   plan:plan, diagno_def:diagno_def,diagno_pres:diagno_pres,procedimiento:procedimiento,otros_proced:otros_proced,evolucion:evolucion,conclusion_radio:conclusion_radio},

cache: true,
success:function(data){ 
$('#infancia').prop('disabled', true);
$('#adolescencia').prop('disabled', true);
$('#adultez').prop('disabled', true);
$('#familiares').prop('disabled', true);
$('#cancer_mama').prop('disabled', true);
$('#cancer_ovario').prop('disabled', true);
$('#hab_c_pip').prop('disabled', true);
$('#hab_f_pip').prop('disabled', true);
$('#hab_c_ciga').prop('disabled', true);
$('#hab_f_ciga').prop('disabled', true);
$('#hab_c_al').prop('disabled', true);
$('#hab_f_al').prop('disabled', true);
$('#hab_c_tab').prop('disabled', true);
$('#hab_f_tab').prop('disabled', true);
$('#hab_c_caf').prop('disabled', true);
$('#hab_f_caf').prop('disabled', true);
/*$(".hidechecke1").hide();
$(".hidechecke2").hide();
$(".hidechecke3").hide();
$(".hidechecke4").hide();*/
//$('#formAntecedentes')[0].reset();

$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow'); 


if(signopsis=="" || laboratorios=="" || estudios==""){
	//$("#show_exam").html(data);	
	$("#hide_all_exam").hide();
	
}
else{
	
$("#show_nav_enf").html(data);
$("#hide_all_enf").hide(); 

} 
}  
});

return false;
});
});

//navegador
$("#id_enf").on('change', function (e) {
e.preventDefault();
$.ajax({
url: '<?php echo site_url('admin/show_enfermedad');?>',
type: 'post',
data:'id_enf='+$("#id_enf").val(),
success: function (data) {
	$("#naveg_enf_result").html(data);
	$("#naveg_enf_result").show();
	 $("#hide_enfermedad").hide();
	 $("#reset1").show();
}

});
});

//hide show

$("#reset1").on('click', function (e) {
$('#formAntecedentes')[0].reset();
	 $("#naveg_enf_result").hide();
	  $("#hide_enfermedad").show();
	 $("#reset1").hide();

});

//show enfermedad navigation after save new enfermedad
/*
$('.secondoption').on('submit', function(event) {
$.ajax({
url: '<?php echo site_url('admin/show_select_enf');?>',
type: 'post',
data:'historial_id='+$("#historial_id").val(),
success: function (data) {
	$("#show_nav_enf").html(data);
	 $("#hide_all_enf").hide();
	
}

});
	
});	*/
</script>