<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Imprecion";
$obj_pdf->SetTitle($title);	
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, "Imprecion de recetas");
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<div class='row'>
<h4 class="h4">RECETAS</h4>
<div class="col-md-12 move_left" id="hide_ant">

<div class="col-md-8 move_left" >
<?php
foreach($row_ant as $row)
{
?>
<table class="table deac1" style="width:100%">
<tr>
<th style="width:70%">Marque lo negativo</th>
<th style="width:100%"><span class="rows_selected" id="select_count"></span></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>
</th>
</tr>
<tr>
<th class="col-xs-7"></th>
<th class="col-xs-5"></th>
<th class="col-xs-1">Madre</th>
<th class="col-xs-1">Padre</th>
<th class="col-xs-1">Hnos</th>
<th class="col-xs-1">Pers.</th>
<th></th>
</tr>
<tr>

<td>
Cardiopatia
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
 <input type="checkbox" <?=$selected?>> <label class="control-label" > Ninguno</label>

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

<td><?=$row->car_text?></td>
</tr>

<tr>
<td>Hipertension</td>
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
 
<input type="checkbox" id="chooseAll_1" name="hip_nin"  class="emp_checkbox niguno_checked2" <?=$selected?>>   <label class="control-label" > Ninguno</label>
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
<td>Enf. Cerebrovascular</td>
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
<input type="checkbox" name="ec_nin" id="chooseAll_1" class="emp_checkbox niguno_checked3" <?=$selected?>> <label>Ninguno</label>
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
<td>Epilepsia</td>
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
<input type="checkbox" id="chooseAll_1" name="ep_nin" class="emp_checkbox niguno_checked4" <?=$selected?>> <label>Ninguno</label>
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
<td>Asma Bronquial</td>
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
<input type="checkbox" <?=$selected?> name="as_nin" id="chooseAll_1" class="emp_checkbox niguno_checked5" > <label>Ninguno</label>
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
<td>Tuberculosis</td>
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
<input type="checkbox" <?=$selected?> name="tub_nin" id="chooseAll_1" class="emp_checkbox niguno_checked6" > <label>Ninguno</label>
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
<?=$row->tub_text?>
</td>
</tr>
<tr>
<td>Diabetes</td>
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
<input type="checkbox" <?=$selected?> name="dia_nin" id="chooseAll_1" class="emp_checkbox niguno_checked7" > <label>Ninguno</label>
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
<td>Tiroides</td>
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
<input type="checkbox" <?=$selected?> name="tir_nin" id="chooseAll_1" class="emp_checkbox niguno_checked8" > <label>Ninguno</label>
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
<td>Hepatitis &nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo" value="<?=$row->hep_tipo?>" ></td>
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
<input type="checkbox" <?=$selected?> name="hep_nin" id="chooseAll_1" class="emp_checkbox niguno_checked9" > <label>Ninguno</label>
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
<td>Enfermedades Renales</td>
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
<input type="checkbox" <?=$selected?> name="enfr_nin" id="chooseAll_1" class="emp_checkbox niguno_checked10" > <label>Ninguno</label>
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
<td>Falcemia</td>
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
<input type="checkbox" <?=$selected?> name="falc_nin" id="chooseAll_1" class="emp_checkbox niguno_checked11" >  <label>Ninguno</label>
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
<td>Neoplasias</td>
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
<input type="checkbox" <?=$selected?> name="neop_nin" id="chooseAll_1" class="emp_checkbox niguno_checked12" > <label>Ninguno</label>
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
<td>ENf. Psiquiatricas</td>
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
<input type="checkbox" <?=$selected?> name="psi_nin" id="chooseAll_1" class="emp_checkbox niguno_checked13" >  <label>Ninguno</label>
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
<td>Obesidad</td>
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
<input type="checkbox" <?=$selected?> name="obs_nin" id="chooseAll_1" class="emp_checkbox niguno_checked14" > <label>Ninguno</label>
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
<td>Ulcera Peptica</td>
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
<input type="checkbox" <?=$selected?> name="ulp_nin" id="chooseAll_1" class="emp_checkbox niguno_checked15" ><label>Ninguno</label>
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
<td>Artritis, Gota</td>
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
<input type="checkbox" <?=$selected?> name="art_nin" id="chooseAll_1" class="emp_checkbox niguno_checked16" >  <label>Ninguno</label>
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
<td>Zika</td>
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
<input type="checkbox" <?=$selected?> name="zika_nin" id="chooseAll_1" class="emp_checkbox niguno_checked17" > <label>Ninguno</label>
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
<td colspan="5">Otros <textarea cols="40" id="otros" ><?=$row->otros?></textarea></td>
</tr>
</table>

<?php
}
?>
</div>
</div>
<hr/>
<div id="bas1" class="row">

<?php foreach($HISTORIAL_MEDICAL as $row)
{?>
<div id="left">
Paciente : <span style="text-transform:uppercase;"><?=$row->nombre?></span>, 


Edad: <?=$row->edad?> años,
<?php
$centro_medico=$this->db->select('name')->where('id_m_c',$row->centro_medico)
->get('medical_centers')->row('name');
$seguro_medico_name=$this->db->select('title')->where('id_sm',$row->seguro_medico)
->get('seguro_medico')->row('title');
?>
<?=$centro_medico?> ARS: <?=$seguro_medico_name?>


</div>  
<?php
}
?> 

</div>
</div>
</body>

</html>
<?php
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>