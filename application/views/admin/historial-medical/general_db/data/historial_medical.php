   <?php

$name=($this->session->userdata['admin_name']);

?>

 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main not-stuck">
<span id="loadf"></span>
<span id="loadfse"></span>
<h4 class="alert alert-success msgs" style="display:none;display:none;
border:1px solid green;
position: fixed; /* or absolute */
top: 50%;
left: 40%;
z-index:900000" ></h4>
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>
<div id="show_marque"> </div>
<div id="hide-home"> 
<div id="home" > 
 <p class="h4 his_med_title" >Antecedentes personales, familiares y patologicos</p>
 <br/>
<form  id="formAntecedentes" class="form-horizontal"  method="post"  > 
<input type="hidden" id="modify_by" value="<?=$name?> "> 
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 

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
<div class="col-md-12 view-all" style="">
<hr class="title-highline-top"/>
<p class="h4 his_med_title" id="click_sospecha_mal" style="cursor:pointer;background:#E6E6FA;">Sospecha de Abuso o Maltrato</p>
<?php 
foreach($desa as $row)
{
?>

<table class="table" style="width:60%;display:none;background:#E6E6FA" id="sospecha_mal">
<tr>
<td><label>Maltrato fisico</label></td>
<td>
<?php
if($row->maltratof !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mf' class='chkYes5' $checked></label>";
?>
</td>
<td>
<?php
if($row->maltratof !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='mf' class='chkNo5' $checked></label>";
?>

</td>
</tr>
<tr>
<td colspan="3">
<?php
echo "<textarea class='form-control text-maltrato' id='text-maltrato' disabled>$row->maltratof</textarea>";

?>
</td></tr>
<tr>
<td><label>Abuso sexual</label></td>
<td>
<?php
if($row->abusos !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='abs' class='chkYes6' $checked></label>";
?>
</td>
<td>
<?php
if($row->abusos !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='abs' class='chkNo6' $checked></label>";
?>

</td>
</tr>
<tr><td colspan="3">
<?php
echo "<textarea class='form-control text-abuso' id='text-abuso' disabled>$row->abusos</textarea>";

?>
</td></tr>
<tr>
<td><label>Negligencia</label></td>
<td>
<?php
if($row->negligencia !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='neg' class='chkYes7' $checked></label>";
?>
</td>
<td>
<?php
if($row->negligencia !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='neg' class='chkNo7' $checked></label>";
?>

</td>
</tr>
<tr><td colspan="3">
<?php
echo "<textarea class='form-control text-neg' id='text-neg' disabled>$row->negligencia</textarea>";

?>
</td></tr>
<tr>
<td><label>Maltrato emocional</label></td>
<td>
<?php
if($row->maltrato !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mem' class='chkYes8' $checked></label>";
?>
</td>
<td>
<?php
if($row->maltrato !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='mem' class='chkNo8' $checked></label>";
?>

</td>
</tr>
<tr><td colspan="3">
<?php
echo "<textarea class='form-control text-emo' id='text-emo' disabled>$row->maltrato</textarea>";

?>
</td></tr>
</table>
<?php 

}
?>
</div>
<br/>
<div class="col-md-12 move_left view-all" id="hide_ant">
 <hr class="title-highline-top"/>
<table>
<tr>
<td>
<p class="h4 his_med_title">Antecedentes alergicos y reaccion a medicamentos</p>

</td>
<th>
<a style="cursor:pointer;color:green"  class=" btn-sm" id="save_edit_datad"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar</a>

<a style="cursor:pointer;" id="edit_datad" class="btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
</th>
</tr>
</table>
<span class="deac2">
<div class="form-group">
<label class="control-label col-md-2" >Alimentos Alergicos</label>
<div class="col-md-8">
<input type="text" class="form-control" value="<?=$row->alimentos?>" id="alimentos_al" disabled />
</div>
<div class="col-md-2 hidechecke5">
<!--<?php if($row->alimentos !=""){
$checked="";
} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_ala' <?=$checked?>> <label>Niguno</label>-->
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Medicamentos Alergicos</label>
<div class="col-md-8">
<input type="text" class="form-control" id="medicamentos_al" value="<?=$row->medicamentos?>" disabled>
</div>
<div class="col-md-2 hidechecke6">
<!--
<?php if($row->medicamentos !=""){
$checked="";
} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_meda' <?=$checked?>> <label>Niguno</label>
-->
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" for="lastname">Otros Alergicos</label>
<div class="col-md-8">
<input type="text" class="form-control" id="otros_al" value="<?=$row->otros?>" disabled>
</div>
<div class="col-md-2 hidechecke7">
<!--<input type="checkbox" class='checkin_otrosa' checked> <label>Niguno</label>-->
</div>
</div>  
</span> 
</br/>
<div  class="col-md-12 " style="border-top: 2px groove #38a7bb;">
<div  class="col-md-7 deac3">
 <div   style="overflow-x:auto;">
<table class="table">
<tr>
<td><p class="h4 his_med_title">Otros antecedentes</p> </td>
<th>
<a style="cursor:pointer;color:green" id="save_edit_datao"   type="submit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
<a style="cursor:pointer" id="edit_datao" class="btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
</th>
</tr>
<?php
foreach($AntOtros as $row)

?>
<tr>
<td class="col-xs-6"><label>Quirurgicos</label>
<span class="ninguno1">
<?php if($row->quirurgicos !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_qui' <?=$checked?>> <label>Niguno</label>
</span>
<textarea class="form-control" cols="20" id="quirurgicos" disabled><?=$row->quirurgicos?></textarea>
</td>
<td><label>Gineco-obstetricos</label>
<span class="ninguno1">
<?php if($row->gineco !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_gine' <?=$checked?>> <label>Niguno</label>
</span>
<select class="form-control" id="gineco" disabled>
<option value="" hidden></option>
<?php
foreach($GinecOb as $esp){
	
	if($row->gineco == $esp->name) {
		echo "<option  selected>".$esp->name."</option>";
	} else {
		echo "<option >".$esp->name."</option>";
	}
}
?>
</select>
</td>
</tr>
<tr>
<td><label>Abdominal</label>
<span class="ninguno1">
<?php if($row->abdominal !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_abd' <?=$checked?>> <label>Niguno</label>
</span>
<textarea class="form-control" cols="20" id="abdominal" disabled><?=$row->abdominal?></textarea></td>
<td><label>Toracica</label>
<span class="ninguno1">
<?php if($row->toracica !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_tora' <?=$checked?>> <label>Niguno</label>
</span>
<textarea class="form-control" cols="20" id="toracica" disabled><?=$row->toracica?></textarea></td>
</tr>
<tr>
<td><label>Transfusion sanguinea</label>
<span class="ninguno1">
<?php if($row->transfusion !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_trans' <?=$checked?>> <label>Niguno</label>
</span>
<textarea class="form-control" cols="20" id="transfusion" disabled><?=$row->transfusion?></textarea></td>
<td><label>Otros</label>
<span class="ninguno1">
<?php if($row->otros1 !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_otros' <?=$checked?>> <label>Niguno</label>
</span>
<textarea class="form-control" id="otros1" cols="20" disabled><?=$row->otros1?></textarea></td>
</tr>

</table>

</div>
</div>
<div class="col-md-5">
<br/><br/><br/>
<table class="table right-otro" style="width:100%">
<tr>
<td><label>Hepatis B:</label></td> 
<td>
<?php
if($row->hepatis =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' id='hepatis' name='hepatis' value='Si' $checked></label>";
?>
</td>
<td>
<?php
if($row->hepatis =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' id='hepatis' name='hepatis' value='No' $checked></label>";
?>

</td>
</tr>
<tr>
<td><label>HPV :</label></td>
<td>
<?php
if($row->hpv =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' id='hpv' name='hpv' value='Si'  $checked></label>";
?>
</td>
<td>
<?php
if($row->hpv =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' id='hpv' name='hpv' value='No' $checked></label>";
?>

</td>
</tr>
<tr>
<td><label>Toxoide Tetanico </label></td>
<td>
<?php
if($row->toxoide =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' id='toxoide' name='toxoide' value='Si'  $checked></label>";
?>
</td>
<td>
<?php
if($row->toxoide =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' id='toxoide' name='toxoide' value='No' $checked></label>";
?>

</td>
</tr>
<tr>
<!--<td><label>Otros</label><textarea class="form-control" cols="20" id="otros2"></textarea></td>-->
</tr>
<tr>
<td>

<label style="font-weight:bold">Groupo sanguineo y Rh</label>
</td>
<td>
<select class="form-control" id="grouposang">
<option hidden><?=$row->grouposang?></option>
<option>A</option>
<option>B</option>
<option>AB</option>
<option>0</option>
</select>
</td>
</tr>
<tr>
<td><label>Tipificacion :</label>&nbsp;

<td>
<?php
if($row->tipificacion =="Positivo"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Positivo <input type='radio' id='tipificacion' name='tipificacion' value='Positivo'  $checked></label>";
?>
</td>
<td>
<?php
if($row->tipificacion =="Negativo"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Negativo <input type='radio' id='tipificacion' name='tipificacion' value='Negativo' $checked></label>";
?>

</td>
</tr>
</table>
</div>
</div>
<br/>
<br/>
<div  class="col-md-12 deac4">
<hr class="title-highline-top"/>

<table>
<tr>
<td><p class="h4 his_med_title" id="click_viol" style="cursor:pointer">Violencia Intafamiliar</p></td>
<th>
<a style="cursor:pointer;color:green"  class=" btn-sm" id="save_edit_datav"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar</a>
<a style="cursor:pointer;display:none" id="edit_datav" class="btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
</th>
</tr>
</table>
<br/>
<span id="violenciaform"  style="display:none">
<form   class="form-horizontal" >
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Se ha sentido alguna vez afectada/lastimada emosional o psicologicamente por alguna persona importante para usted ?</label>
<div class="col-md-4">
<!--<span class="ninguno1">
<?php if($row->violencia1 !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_v1' <?=$checked?>> <label>Niguno</label>
</span>-->
<select class="form-control" id="violencia1" >
<option value="" hidden></option>
<?php
foreach($selectOne as $vio){
	
	if($row->violencia1 == $vio->name) {
		echo "<option  selected>".$vio->name."</option>";
	} else {
		echo "<option >".$vio->name."</option>";
	}
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Alguna vez alguien le ha hecho dano fisico ?</label>
<div class="col-md-4">
<!--<span class="ninguno1">
<?php if($row->violencia2 !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_v2' <?=$checked?>> <label>Niguno</label>
</span>-->
<select class="form-control" id="violencia2" >
<option value="" hidden></option>
<?php
foreach($selectOne as $vio){
	
	if($row->violencia2 == $vio->name) {
		echo "<option  selected>".$vio->name."</option>";
	} else {
		echo "<option >".$vio->name."</option>";
	}
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">En algun momento has sido tocada, manoseada o forzada a tener contacto o relacion sexual ?</label>
<div class="col-md-4">
<!--<span class="ninguno1">
<?php if($row->violencia3 !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_v2' <?=$checked?>> <label>Niguno</label>
</span>-->
<select class="form-control" id="violencia3" >
<option value="" hidden></option>
<?php
foreach($selectOne as $vio){
	
	if($row->violencia3 == $vio->name) {
		echo "<option  selected>".$vio->name."</option>";
	} else {
		echo "<option >".$vio->name."</option>";
	}
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Cuando era nina, fue tocada de una manera inpropriada por alguien ?</label>
<div class="col-md-4">
<!--<span class="ninguno1">
<?php if($row->violencia4 !=""){
$checked="";

} else{
$checked="checked";
} ?>
<input type="checkbox" class='checkin_v4' <?=$checked?>> <label>Niguno</label>
</span>-->
<select class="form-control" id="violencia4" >
<option value="" hidden></option>
<?php
foreach($selectTwo as $vio4){
	
	if($row->violencia4 == $vio4->name) {
		echo "<option  selected>".$vio4->name."</option>";
	} else {
		echo "<option >".$vio4->name."</option>";
	}
}
?>
</select>
</div>

</div>
</form>
</span>
<hr class="title-highline-top"/>
</div>
<div  class="col-md-12">
<table>
<tr>
<td><p class="h4 his_med_title ">
Habitos Toxicos
</p></td>
<th>
<a style="cursor:pointer;color:green"  class=" btn-sm" id="save_edit_datah"  ><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar</a>
<a style="cursor:pointer;" id="edit_datah" class="btn-sm showh" ><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
</th>
</tr>
</table>
<div   style="overflow-x:auto;">
 <?php 
	 foreach($HABITOS as $row)
	 {
	?>
<table class="table habitos-t" style="border:1px solid;background:white;border-color: rgb(206,206,206)">
<tr style="font-weight:bold">
<th></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</th>
</tr>

<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cafe</th>
<th><input type="text"  id="hab_c_caf" value="<?=$row->cafe_cant?>" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_caf"  style="width:149px" disabled>
<option selected><?=$row->cafe_frec ?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</th>

<th><img src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Pipa</th>
<th><input type="text" id="hab_c_pip" value="<?=$row->pipa_cant?>"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_pip" style="width:149px" disabled>
<option selected><?=$row->pipa_frec?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</th>
</tr>

<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cigarillo</th>
<th><input type="text" id="hab_c_ciga" value="<?=$row->ciga_can?>" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_ciga"  style="width:149px" disabled>
<option selected><?=$row->ciga_frec?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</th>
<th><img src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Alcohol</th>
<th><input type="text" id="hab_c_al" value="<?=$row->alc_can?>"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_al"  style="width:149px" disabled>
<option selected><?=$row->alc_frec ?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</th>
</tr>
<tr>
<th class="id"><img src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Tabaco</th>
<th><input type="text" id="hab_c_tab" value="<?=$row->tab_can?>"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_tab" style="width:149px" disabled>
<option selected><?=$row->tab_frec?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</th>
</tr>

</table>
<!--Droga-->
<table class="table habitos-t" style="border:1px solid;background:white;border-color: rgb(206,206,206)">

<tr>
<th style="width:100px"></th><th>Habito</th><th style="width:550px">Tipo</th><th>Cantidad</th><th>Frecuencia</th>
</tr>
<tr>
<th><!--<input type="checkbox" id="checkin_drug"/>--> <img src="<?= base_url();?>assets/img/historial_medical/drugs.jpg" width="60" alt=""/></th>
<th class="th_habitos" > Droga</th>
<td>
<select class="form-control  hab_t_drug" id="hab_t_drug" multiple="multiple" disabled>

<?php 
foreach($drug as $d)
{ 

$id_p=$this->db->select('name')
->where('id_patient',$id_historial)
->where('name',$d->id)
->get('droga')->row('name');

if($id_p==$d->id){
	$selected="selected";
} else {
   $selected="";
}
echo "<option value='$d->id' $selected>$d->name</option>";
}
?>
</select>
</td>
<td><input type="text" id="hab_c_drug" value="<?=$row->hab_c_drug?>" class="form-control input_habitos" disabled /></td>
<td class="th_habitos">
<select class="form-control"  id="hab_f_drug" style="width:149px" disabled>
<option selected><?=$row->hab_f_drug?></option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
<option value=""></option>
</select>
</td>
</tr>
</table>
<?php
}
?>
</div>
</div>
<br/><br/><br/><br/>

</form>

</div>
</div>
</div>
<div  id="ssrshow"></div>
<div  id="pediatricoshow"></div>
<div  id="prenatalshow"></div>
<div  id="desarrolloshow"></div>
<div  id="obstetricoshow"></div>
<div  id="enfermedadshoww"></div>
<div id="signoshow"></div>
<div id="rehabilitationshow"></div>
<div id="oftalmologiashow"></div>
<div id="examenshow"></div>
<div id="examensisshow"></div>
<div id="recetasshow"></div>
<div id="estudiosshow"></div>
<div id="laboratoriosshow"></div>
 <div id="conclucionshow"></div>
  <div id="controlprenatalshow"></div>
</div>
<div class="modal fade" id="configs" tabindex="-1" role="dialog">
<div class="modal-dialog" >
<div class="modal-content" >
<div class="modal-body">
<?php $this->load->view('admin/config_hist');?>
</div>
 </div>
</div>
</div>
<!--pop up medicamentos habituales-->
<div class="modal fade" id="medicaha" tabindex="-1" role="dialog">
<div class="modal-dialog" >
<div class="modal-content" >
<div class="modal-body">
</div>
 </div>
</div>
</div>

