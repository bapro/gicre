 <?php

$name=($this->session->userdata['medico_name']);
$last_name=($this->session->userdata['medico_last_name']);
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
  <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<style>
td{text-align:left;font-size:15px}
th{text-align:left;font-size:15px;color:black}
a.active   
{
    text-decoration: none;
     color:#B22222;
	 outline: 0;
	 font-weight:bold;
	 font-size:13px
	
}
a{ font-size:12px}
   .historial_save
{
   position:fixed;
   right:20px;
   top:155px;
   z-index:5000;
  
}


</style>
<script>
$(function(){
    $("#branch").chained("#farmacia");
});

function clickSingleA(a)
{
	$("#loadf").fadeIn('slow').delay(10).fadeOut('slow').html('<span class="load"> <img width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
     items = document.querySelectorAll('.left_hit.active');

    if(items.length) 
    {
        items[0].className = 'left_hit';
    }

    a.className = 'left_hit active';
}
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
  <a class="left_hit_" href="<?php echo site_url('medico/create_cita');?>">Nueva cita</a> <a class="left_hit" style="margin-left:20px" href="<?php echo site_url('medico/ver_confirmada_solicitud');?>">Cola de Citas</a>
 </div>
 <span class="prevent_dis">
 <div class="col-md-6 alert alert-warning textareaalert" style="display:none" >
 </div>
 </span>
  <div class="col-md-6 alert alert-success" id="successAnt" style="display:none" >
  <i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos
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
<li>
<a href="#" id="homeclick" class="left_hit dropdown-toggle active"  onclick="clickSingleA(this)"> ANTECEDENTES
</a>
</li>
<li><a href="#" id="enfermedadshow" class="left_hit" onclick="clickSingleA(this)"> ENFERMEDAD ACTUAL</a></li>
<li><a href="#" id="examenf"  class="left_hit" onclick="clickSingleA(this)">EXAMEN FISICO</a></li>
<li><a href="#" id="signos"  class="left_hit" onclick="clickSingleA(this)"> SIGNOS VITALES</a></li>
<li><a href="#" id="examensis" class="left_hit"  onclick="clickSingleA(this)"> EXAMEN DEL SISTEMA</a></li>
<li><a href="#" id="conclucion" class="left_hit" onclick="clickSingleA(this)"> CONCLUCION DIAGNOSTICA</a></li>
<li><a href="#" id="recetas" onclick="clickSingleA(this)" class="left_hit"> RECETAS</a></li>
<li><a href="#" id="estudios" onclick="clickSingleA(this)" class="left_hit">ESTUDIOS</a></li>
 <li><a href="#" id="laboratorios" onclick="clickSingleA(this)" class="left_hit"> LABORATORIOS</a></li>
</ul>
<p style="margin-left:13px">
 <img class="img-responsive" src="<?= base_url();?>assets/img/aaaadd.png" width="110" alt=""/>

</p>


</div>
<div class="col-md-10 tab-content" style="margin-left:16%" >
<!-- Tab panes -->
<div id="loadf"></div>

<div id="home"> 
 
<ul>
<form  id="formAntecedentes" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 
<button class="btn-sm btn-success historial_save" id="submit"  type="submit" disabled ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

<div class="col-xs-12 move_left" id="hide_ant">
<p id="EmptyField" >¿ Porque no ingresas nada ?</p>
 <p class="h4 his_med_title">Antecedentes personales, familiares y patologicos</p><br/>
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
<input type="checkbox" class='checkininfancia'  > 
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Adolescencia</label>
<div class="col-md-9">
<textarea class="form-control" id="adolescencia"  disabled></textarea>
</div>
<div class="col-md-2 hidechecke2">
<input type="checkbox" class='checkin_adol'>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Adultez</label>
<div class="col-md-9">
<textarea class="form-control" id="adultez"   disabled></textarea>
</div>
<div class="col-md-2 hidechecke3">
<input type="checkbox" class='checkin_adultez'>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Antecedentes familiares</label>
<div class="col-md-9">
<textarea  class="form-control"   id="familiares"   disabled ></textarea>
</div>
<div class="col-md-2 hidechecke4">
<input type="checkbox" class='checkin_fami'> 
</div>
</div>
 <div class="form-group">
 <div class="col-md-10">
 <input type="checkbox" name="cancer_mama" id="cancer_mama" class="out_funtion" value="1"  > <label class="control-label" id="ant_fam_can_mama" > Antecedentes familiares de CANCER DE MAMA</label>
</div>
 </div>
 
  <div class="form-group">
 <div class="col-md-10">
 <input type="checkbox" name="cancer_ovario" id="cancer_ovario" class="" value="1" > <label class="control-label" id="ant_fam_can_ovario" > Antecedentes familiares de CANCER DE OVARIO</label>
</div>
 </div>
 </div>
 <?php
}

 ?>
 <br/>
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
<textarea class="form-control" id="alimentos_al" disabled></textarea>
</div>
<div class="col-md-2 hidechecke5">
<input type="checkbox" class='checkin_ala' > <label class="act_ala">Activo</label><label style="display:none" class="dea_ala">Deactivo</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Medicamentos Alergicos</label>
<div class="col-md-9">
<textarea class="form-control" id="medicamentos_al" disabled></textarea>
</div>
<div class="col-md-2 hidechecke6">
<input type="checkbox" class='checkin_meda' > <label class="act_meda">Activo</label><label style="display:none" class="dea_meda">Deactivo</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" for="lastname">Otros Alergicos</label>
<div class="col-md-9">
<textarea class="form-control" id="otros_al" disabled></textarea>
</div>
<div class="col-md-2 hidechecke7">
<input type="checkbox" class='checkin_otrosa' > <label class="act_otrosa">Activo</label><label style="display:none" class="dea_otrosa">Deactivo</label>
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
<textarea class="form-control" id="medicamentos_hab" disabled></textarea>
</div>
<div class="col-md-2 hidechecke8">
<input type="checkbox" class='checkin_medh' > <label class="act_medh">Activo</label><label style="display:none" class="dea_medh">Deactivo</label>
</div>
</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-md-1" >Quirurgicos</label>
<div class="col-md-9">
<textarea class="form-control" id="quirurgicos"  disabled></textarea>
</div>
<div class="col-md-2 hidechecke9">
<input type="checkbox" class='checkin_qui' > <label class="act_qui">Activo</label><label style="display:none" class="dea_qui">Deactivo</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Transfusión sanguínea</label>
<div class="col-md-9">
<textarea class="form-control" id="transfusion"  disabled ></textarea>
</div>
<div class="col-md-2 hidechecke10">
<input type="checkbox" class='checkin_trans' > <label class="act_trans">Activo</label><label style="display:none" class="dea_trans">Deactivo</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-1" >Traumatismo</label>
<div class="col-md-9">
<textarea class="form-control" id="traumatismo"  disabled ></textarea>
</div>
<div class="col-md-2 hidechecke11">
<input type="checkbox" class='checkin_trau' > <label class="act_trau">Activo</label><label style="display:none" class="dea_trau">Deactivo</label>
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
</form>

</div>

</ul>

 
</div>
<div  id="enfermedadshoww"></div>
<div id="examenshow"></div>
<div id="signoshow"></div>
<div id="examensisshow"></div>
<div id="recetasshow"></div>
<div id="estudiosshow"></div>
<div id="laboratoriosshow"></div>
 <div id="conclucionshow"></div>

</div>
</section>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/historial.js"></script>

<script>

//insert habitos toxicos

$(function() {
$('#formAntecedentes').on('submit', function(event) {
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var infancia = $("#infancia").val();
var adolescencia = $("#adolescencia").val();
var adultez = $("#adultez").val();
var familiares = $("#familiares").val();
var cancer_ma = [];
 $("input[name='cancer_mama']:checked").each(function(){
            cancer_ma.push(this.value);
 });
		
var cancer_ov = [];
 $("input[name='cancer_ovario']:checked").each(function(){
            cancer_ov.push(this.value);
 });
 var alimentos_al = $("#alimentos_al").val();
var medicamentos_al = $("#medicamentos_al").val();
var medicamentos_hab = $("#medicamentos_hab").val();
var quirurgicos = $("#quirurgicos").val();
var transfusion = $("#transfusion").val();
var traumatismo = $("#traumatismo").val();
var otros_al = $("#otros_al").val();
//----------------------------------------
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

 //if(infancia !="" ||  adolescencia!="" || adultez!="" || familiares!="" || alimentos_al!="" || medicamentos_al!="" || medicamentos_hab!="" || quirurgicos!="" || transfusion!="" || traumatismo!="" || otros_al!=""){
$.ajax({
type: "POST",
url: "<?=base_url('admin/saveAntecedentes')?>",
data: {infancia:infancia, adolescencia:adolescencia, adultez:adultez, familiares:familiares, cancer_mama:cancer_ma, cancer_ovario:cancer_ov,
alimentos_al:alimentos_al, medicamentos_al:medicamentos_al,otros_al:otros_al,
medicamentos_hab:medicamentos_hab, quirurgicos:quirurgicos,transfusion:transfusion,traumatismo:traumatismo,
hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,
inserted_by:inserted_by,hist_id:hist_id},

cache: true,
success:function(data){
$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow'); 
$('#infancia').prop('disabled', true);
$('#adolescencia').prop('disabled', true);
$('#adultez').prop('disabled', true);
$('#familiares').prop('disabled', true);
$('#cancer_mama').prop('disabled', true);
$('#cancer_ovario').prop('disabled', true);
$("#alimentos_al").prop('disabled', true);
$("#medicamentos_al").prop('disabled', true);
$("#medicamentos_hab").prop('disabled', true);
 $("#quirurgicos").prop('disabled', true);
$("#transfusion").prop('disabled', true);
$("#traumatismo").prop('disabled', true);
$("#otros_al").prop('disabled', true);
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
$("input:checkbox").hide();
$(".hidechecke1").hide();
$(".hidechecke2").hide();
$(".hidechecke3").hide();
$(".hidechecke4").hide();
$(".hidechecke5").hide();
$(".hidechecke6").hide();
$(".hidechecke7").hide();
$(".hidechecke8").hide();
$(".hidechecke9").hide();
$(".hidechecke10").hide();
$(".hidechecke11").hide();
}  
});
//}
//else
//{
//$('#EmptyField').fadeIn('slow').delay(3000).fadeOut('slow'); 	
//}
return false;
});
});


//----------------------------show enfermedad
$("#enfermedadshow").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/enfermedadshow');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#enfermedadshoww").html(data);
	$("#enfermedadshoww").show();
	$("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});


//-----------------------------show examen
$("#examenf").on('click', function (e) {

e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/examenf');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#examenshow").html(data);
	$("#examenshow").show();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});

//----------------------show signos
$("#signos").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/signos');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#signoshow").html(data);
	$("#signoshow").show();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#examensisshow").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});
//-------- show examen sistema

$("#examensis").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/examensis');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#examensisshow").html(data);
	$("#examensisshow").show();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});


//-------- show sistemas

$("#recetas").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/recetas');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#recetasshow").html(data);
	$("#recetasshow").show();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	
}

});
});


//-------- show estudios

$("#estudios").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/Estudios');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#estudiosshow").html(data);
	$("#estudiosshow").show(); 
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	
}

});
});

//-------- show laboratorios

$("#laboratorios").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/Laboratorios');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#home").hide();
	$("#laboratoriosshow").html(data);
	$("#laboratoriosshow").show();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#conclucionshow").hide();
	}

});
});

$("#conclucion").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('medico/Conclucion');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#home").hide();
	$("#conclucionshow").html(data);
	$("#conclucionshow").show();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	}

});
});


$("#homeclick").on('click', function (e) {
$("#home").show();
	$("#conclucionshow").hide();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	
});




</script>