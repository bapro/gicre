<style>
 table { border-collapse: collapse; with:100%;font-size: 13px} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }
</style>
<hr/>
<?php foreach($row_ant as $row)?>

<h3>ANTECEDENTED PERSONALES, FAMILIARES Y PATOLOGICOS</h3>

 <table border="1" style="width:100%;">
<tr style="background:#DFD7FC">
<th class="col-xs-7"></th>
<th class="col-xs-5"><!--<input type="checkbox" name="todo"  id="select_all" checked disabled>&nbsp;Todo--></th>
<th class="col-xs-1">Pers.</th>
<th class="col-xs-1">Padre</th>
<th class="col-xs-1">Madre</th>
<th class="col-xs-1">Hnos</th>
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
	$selected="checked='checked'";
	}
 ?>
 <input type="checkbox"  name="car_nin" class="emp_checkbox1 _checked1" <?=$selected?>> <label class="marco-nin" > Ninguno</label>

</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->car_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="car_pe" class="check-all check_pers" <?=$selected?>>
</td>

<td>
 <?php
if ($row->car_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
 <input type="checkbox" id="padre_checkbox" name="car_p" class="check-all check_padre" <?=$selected?>>
</td>

<td>
 <?php
if ($row->car_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
 <input type="checkbox" id="madre_checkbox" name="car_m" class="check-all check_madre" <?=$selected?> >
</td>

<td>
 <?php
if ($row->car_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
 <input type="checkbox" name="car_h" class="check-all check_hnos" <?=$selected?>>
</td>


<td><?=$row->car_text?></td>
</tr>
<!-- -----------------------------------------------------------------------------------  !-->
<tr>
<td><label>Hipertension</label></td>
<td>
 <?php
if ($row->hip_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
 
<input type="checkbox"  name="hip_nin"  class="emp_checkbox1 _checked2" <?=$selected?>>   <label class="marco-nin" > Ninguno</label>
</td>


<td   style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hip_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="hip_pe" class="check-all check_pers2" <?=$selected?>>
</td>


<td>
 <?php
if ($row->hip_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="hip_p" class="check-all check_padre2" <?=$selected?>>
</td>
<td>
 <?php
if ($row->hip_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="hip_m" class="check-all check_madre2" <?=$selected?>>
</td>

<td>
 <?php
if ($row->hip_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="hip_h" class="check-all check_hnos2" <?=$selected?>>
</td>

<td><?=$row->hip_text?></td>

</tr>
<!-- -----------------------------------------------------------------------------------  !-->
<tr>
<td><label>Enf. Cerebrovascular</label></td>
<td>
 <?php
if ($row->ec_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="ec_nin"  class="emp_checkbox1 _checked3" <?=$selected?>> <label class="marco-nin">Ninguno</label>
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->ec_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_pe" class="check-all check_pers3">
</td>

<td>
 <?php
if ($row->ec_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_p" class="check-all check_padre3">
</td>
<td>
 <?php
if ($row->ec_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_m" class="check-all check_madre3">
</td>

<td>
 <?php
if ($row->ec_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ec_h" class="check-all check_hnos3">
</td>

<td>
<?=$row->ec_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>
<tr>
<td><label>Epilepsia</label></td>
<td>
 <?php
if ($row->ep_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox"  name="ep_nin" class="emp_checkbox1 _checked4" <?=$selected?>> <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->ep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_pe" class="check-all check_pers4">
</td>
<td>
 <?php
if ($row->ep_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_p" class="check-all check_padre4">
</td>
<td>
 <?php
if ($row->ep_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_m" class="check-all check_madre4 " >
</td>

<td>
 <?php
if ($row->ep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ep_h" class="check-all check_hnos4">
</td>

<td>
<?=$row->ep_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>
<tr>
<td><label>Asma Bronquial</label></td>
<td>
 <?php
if ($row->as_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_nin"  class="emp_checkbox1 _checked5" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->as_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_pe" class="check-all check_pers5">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->as_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_p" class="check-all check_padre5">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->as_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_m" class="check-all check_madre5">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->as_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="as_h" class="check-all check_hnos5">
</td>

<td>
<?=$row->as_text?>
</td>
</tr>

<!------------------------------------------------------------------------------------>
<tr>
<td><label>Enf. Repiratoria (Esp.)</label></td>
<td>
 <?php
if ($row->enre_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enre_nin"  class="emp_checkbox1 _checked05" > <label class="marco-nin">Ninguno</label>
</td>
<td style="border:2px solid yellow;text-align:center">
 <?php
if ($row->enre_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enre_pe" class="check-all check_pers05">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->enre_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enre_p" class="check-all check_padre05">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->enre_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enre_m" class="check-all check_madre05">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->enre_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enre_h" class="check-all check_hnos05">
</td>

<td>
<?=$row->enre_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>
<tr>
<td><label>Diabetes</label></td>
<td>
 <?php
if ($row->dia_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_nin"  class="emp_checkbox1 _checked7" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->dia_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_pe" class="check-all check_pers7">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->dia_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_p" class="check-all check_padre7">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->dia_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_m" class="check-all check_madre7">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->dia_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="dia_h" class="check-all check_hnos7">
</td>

<td>
<?=$row->dia_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>

<tr>
<td><label>Tuberculosis</label></td>
<td>
 <?php
if ($row->tub_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_nin"  class="emp_checkbox1 _checked6" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->tub_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_pe" class="check-all check_pers6">
</td>
<td>
 <?php
if ($row->tub_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_p" class="check-all check_padre6">
</td>
<td>
 <?php
if ($row->tub_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_m" class="check-all check_madre6">
</td>

<td>
 <?php
if ($row->tub_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tub_h" class="check-all check_hnos6">
</td>

<td>
<?=$row->tub_text?>
</td>
</tr>



<!------------------------------------------------------------------------------------>
<tr>
<td><label>Tiroides</label></td>
<td>
 <?php
if ($row->tir_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_nin"  class="emp_checkbox1 _checked8" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->tir_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_pe" class="check-all check_pers8">
</td>
<td>
 <?php
if ($row->tir_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_p" class="check-all check_padre8">
</td>
<td>
 <?php
if ($row->tir_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_m" class="check-all check_madre8">
</td>

<td>
 <?php
if ($row->tir_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="tir_h" class="check-all check_hnos8">
</td>

<td>
<?=$row->tir_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>
<tr>
<td><label>Hepatitis</label> &nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo" value="<?=$row->hep_tipo?>" ></td>
<td>
 <?php
if ($row->hep_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_nin"  class="emp_checkbox1 _checked9" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hep_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_pe" class="check-all check_pers9">
</td>
<td>
 <?php
if ($row->hep_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_p" class="check-all check_padre9">
</td>
<td>
 <?php
if ($row->hep_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_m" class="check-all check_madre9">
</td>

<td>
 <?php
if ($row->hep_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hep_h" class="check-all check_hnos9">
</td>

<td>
<?=$row->hep_text?>
</td>
</tr>
<!------------------------------------------------------------------------------------>
<tr>
<td><label>Enfermedades Renales</label></td>
<td>
 <?php
if ($row->enfr_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_nin"  class="emp_checkbox1 _checked10" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->enfr_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_pe" class="check-all check_pers10">
</td>
<td>
 <?php
if ($row->enfr_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_p" class="check-all check_padre10">
</td>
<td>
 <?php
if ($row->enfr_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_m" class="check-all check_madre10">
</td>

<td>
 <?php
if ($row->enfr_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="enfr_h" class="check-all check_hnos10">
</td>

<td>
<?=$row->enfr_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>Falcemia</label></td>
<td>
 <?php
if ($row->falc_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_nin"  class="emp_checkbox1 _checked11" >  <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->falc_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_pe" class="check-all check_pers11">
</td>
<td>
 <?php
if ($row->falc_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_p" class="check-all check_padre11">
</td>
<td>
 <?php
if ($row->falc_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_m" class="check-all check_madre11">
</td>

<td>
 <?php
if ($row->falc_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="falc_h" class="check-all check_hnos11">
</td>

<td>
<?=$row->falc_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>Neoplasias</label></td>
<td>
 <?php
if ($row->neop_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_nin"  class="emp_checkbox1 _checked12" > <label class="marco-nin"> Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->neop_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_pe" class="check-all check_pers12">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->neop_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_p" class="check-all check_padre12">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->neop_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_m" class="check-all check_madre12">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->neop_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="neop_h" class="check-all check_hnos12">
</td>

<td>
<?=$row->neop_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>ENf. Siquiatricas</label></td>
<td>
 <?php
if ($row->psi_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_nin"  class="emp_checkbox1 _checked13" >  <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->psi_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_pe" class="check-all check_pers13">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->psi_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_p" class="check-all check_padre13">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->psi_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_m" class="check-all check_madre13">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->psi_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="psi_h" class="check-all check_hnos13">
</td>

<td>
<?=$row->psi_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>Obesidad</label></td>
<td>
 <?php
if ($row->obs_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_nin"  class="emp_checkbox1 _checked14" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->obs_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_pe" class="check-all check_pers14">
</td>
<td>
 <?php
if ($row->obs_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_p" class="check-all check_padre14">
</td>
<td>
 <?php
if ($row->obs_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_m" class="check-all check_madre14">
</td>

<td>
 <?php
if ($row->obs_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="obs_h" class="check-all check_hnos14">
</td>

<td>
<?=$row->obs_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>Ulcera Peptica</label></td>
<td>
 <?php
if ($row->ulp_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_nin"  class="emp_checkbox1 _checked15" ><label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->ulp_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_pe" class="check-all check_pers15">
</td>
<td>
 <?php
if ($row->ulp_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_p" class="check-all check_padre15">
</td>
<td>
 <?php
if ($row->ulp_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_m" class="check-all check_madre15">
</td>

<td>
 <?php
if ($row->ulp_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="ulp_h" class="check-all check_hnos15">
</td>

<td>
<?=$row->ulp_text?>
</td>
</tr>
<!--------------------------------------------------------------------------------->
<tr>
<td><label>Artritis, Gota</label></td>
<td>
 <?php
if ($row->art_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_nin"  class="emp_checkbox1 _checked16" >  <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->art_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_pe" class="check-all check_pers16">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->art_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_p" class="check-all check_padre16">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->art_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_m" class="check-all check_madre16">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->art_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="art_h" class="check-all check_hnos16">
</td>

<td>
<?=$row->art_text?>
</td>
</tr>

<!--------------------------------------------------------------------------------->

<tr>
<td><label>Enf. Hematológicas (Esp.)</label></td>
<td>
 <?php
if ($row->hem_nin ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hem_nin"  class="emp_checkbox1 _checked016" >  <label class="marco-nin">Ninguno</label>
</td>
<td style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hem_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hem_pe" class="check-all check_pers016">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hem_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hem_p" class="check-all check_padre016">
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hem_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hem_m" class="check-all check_madre016">
</td>

<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->hem_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="hem_h" class="check-all check_hnos016">
</td>

<td>
<?=$row->hem_text?>
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
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_nin"  class="emp_checkbox1 _checked17" > <label class="marco-nin">Ninguno</label>
</td>
<td  style="border:2px solid yellow;text-align:center">
 <?php
if ($row->zika_pe ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_pe" class="check-all check_pers17">
</td>
<td>
 <?php
if ($row->zika_p ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_p" class="check-all check_padre17">
</td>
<td>
 <?php
if ($row->zika_m ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_m" class="check-all check_madre17">
</td>

<td>
 <?php
if ($row->zika_h ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" <?=$selected?> name="zika_h" class="check-all check_hnos17">
</td>

<td>
<?=$row->zika_text?>
</td>
</tr>
<!--<tr>
<th></th><th style="width:100%"><span class="rows_selected2" id="select_count2" style="font-size:12px;">0 Seleccionada </span></th><th></th><th></th><th></th><th></th><th></th>
</tr>-->
<tr>
<td colspan="7"><label>Otros</label> <?=$row->otros?></td>
</tr>
</table>

<br/><br/>

<?php 
foreach($desa as $rowdes)

?>
<h3>SOSPECHA DE ABUSO O MALTRATO</h3>

<table class="table" style="width:100%">

<tr style="background:rgb(235,235,235)">
<td><strong>Maltrato fisico</strong></td>

<td>
<?php
if($rowdes->maltratof !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mf' class='chkYes5' $checked disabled></label>";
?>
</td>
<td>
<?php
if($rowdes->maltratof !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label>No <input type='radio' name='mf' class='chkNo5' $checked disabled></label>";
?>

</td>
</tr>
<tr><td><?=$rowdes->maltratof?></td></tr>
<tr >
<td><strong>Abuso sexual</strong></td>

<td>
<?php
if($rowdes->abusos !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='abss' class='chkYes6' $checked disabled></label>";
?>
</td>
<td>
<?php
if($rowdes->abusos !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label>No <input type='radio' name='abss' class='chkNo6' $checked disabled></label>";
?>

</td>
</tr>
<tr><td colspan="3"><?=$rowdes->abusos?></td></tr>
<tr >
<td><strong>Negligencia</strong></td>
<td>
<?php
if($rowdes->negligencia !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='negs' class='chkYes7' $checked disabled></label>";
?>
</td>
<td>
<?php
if($rowdes->negligencia !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label>No <input type='radio' name='negs' class='chkNo7' $checked disabled></label>";
?>

</td>
</tr>
<tr><td colspan="3"><?=$rowdes->negligencia?></td></tr>
<tr >
<td><strong>Maltrato emocional</strong></td>

<td>
<?php
if($rowdes->maltrato !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mems' class='chkYes8' $checked disabled></label>";
?>
</td>
<td>
<?php
if($rowdes->maltrato !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label>No <input type='radio' name='mems' class='chkNo8' $checked disabled></label>";
?>

</td>
</tr>
<tr>

<td colspan="5"><?=$rowdes->maltrato?></td>
</tr>
</table>
<br/>
<?php 
foreach($desa as $rowdes)

?>
<h3>ANTECEDENTES ALELERGICOS Y REACCION A MEDICAMENTOS</h3>

<table class="table" style="width:100%" >

<tr >
<td><strong>Alimentos Alergicos</strong></td>
<td>
<?php
if($rowdes->alimentos !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label> <input type='checkbox'  $checked ></label>";
?>

</td>

</tr>
<tr><td>
<?=$rowdes->alimentos?></td>
</tr>


<tr >
<td><strong>Medicamentos Alergicos</strong></td>

<td>
<?php
if($rowdes->medicamentos !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label> <input type='checkbox'  $checked ></label>";
?>

</td>

</tr>
<tr><td><?=$rowdes->medicamentos?></td></tr>



<tr >
<td><strong>Otros Alergicos</strong></td>

<td>
<?php
if($rowdes->otros !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<label> <input type='checkbox'  $checked ></label>";
?>

</td>

</tr>
<tr><td><?=$rowdes->otros?></td><td></td></tr>

</table>

<br/>

<h3>OTROS ANTECEDENTES</h3>


 <table class="table" style="width:100%">
 <?php
foreach($AntOtros as $row)

?>


<tr>
<td class="col-xs-6"><strong>Quirurgicos</strong>

<?php if($row->quirurgicos !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>
<input type="checkbox" style='text-align:right' <?=$checked?> > <label></label>

<br/>
<?=$row->quirurgicos?>
<td><strong>Gineco-obstetricos</strong>
<?php if($row->gineco !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>

<input type="checkbox"  <?=$checked?> > <label></label>
<?php echo $row->gineco;?>

</td>
</tr>
<tr>
<td><strong>Abdominal</strong>

<?php if($row->abdominal !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>
<input type="checkbox"  <?=$checked?> > <label></label>
<br/>
<?=$row->abdominal?></td>
<td><strong>Toracica</strong>

<?php if($row->toracica !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>
<input type="checkbox" <?=$checked?> > <label></label>
<br/>
<?=$row->toracica?></td>
</tr>
<tr>
<td><strong>Transfusion sanguinea</strong>
<span class="ninguno1">
<?php if($row->transfusion !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>
<input type="checkbox"  <?=$checked?> > <label></label>
</span>
<?=$row->transfusion?></td>
<td><strong>Otros</strong>

<?php if($row->otros1 !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>
<input type="checkbox"  <?=$checked?> > <label></label>
<br/>
<?=$row->otros1?></td>
</tr>

</table>
<br/>
<table class="table" style="width: 100%" >
<tr >
<td>


<strong>Medicamentos Habituales</strong>
<?php

$id_p=$this->db->select('medicine')
->where('id_patient',$id_historial)
->get('h_c_patient_medicine');


if($id_p->num_rows()== 0){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;No&nbsp;<input type='radio'  value='No' $checked></label>";
if($id_p->num_rows() > 0){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;Si&nbsp;<input type='radio'  $checked></label>";


?>
<br/>

<?php 
$sql="select medicine from h_c_patient_medicine where id_patient=$id_historial";
$query = $this->db->query($sql);
 foreach ($query->result() as $n){
echo "$n->medicine <br/>";
 }
?>


	</td>
</tr>
</table>
<br/>
<table class="table right-otro" style="width: 100%"  >

<tr >
<td><strong>Hepatis B:</strong></td> 
<td>
<?php
if($row->hepatis =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;No&nbsp;<input type='radio' id='hepatis' name='hepatis' value='No' $checked></label>";
if($row->hepatis =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;Si&nbsp;<input type='radio' id='hepatis' name='hepatis' value='Si' $checked></label>";


?>

</td>
</tr>
<tr >
<td><strong>HPV :</strong></td>
<td>
<?php
if($row->hpv =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;No&nbsp;<input type='radio' id='hpv' name='hpv' value='No' $checked></label>";

if($row->hpv =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;Si&nbsp;<input type='radio' id='hpv' name='hpv' value='Si'  $checked></label>";
?>
</td>
</tr>
<tr >
<td><strong>Toxoide Tetanico </strong></td>
<td>
<?php
if($row->toxoide =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;No&nbsp;<input type='radio' id='toxoide' name='toxoide' value='No' $checked></label>";

if($row->toxoide =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>&nbsp;Si&nbsp;<input type='radio' id='toxoide' name='toxoide' value='Si'  $checked></label>";
?>
</td>

</tr>
<tr >
<td>

<strong style="font-weight:bold">Grupo Sanguineo </strong>


</td>
<td>
<?=$row->grouposang?>
</td>
</tr>
<tr >
<td><strong>Rh</strong></td>
<td style="font-size: 12px">
<?php
if($row->rh =="Positivo"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label>Positivo &nbsp;<input type='radio' $checked></label>";

if($row->rh =="Negativo"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<label> &nbsp;Negativo &nbsp;<input type='radio'  id='rh' name='rh' value='Yes' $checked></label>";



?>

</td>
</tr>
<tr>
<td><strong>Tipificacion</strong></td>
<td style="width:190px"><?=$row->grouposang?>

<?php
if($row->rh =="Positivo"){
echo "<span  style='font-weight:bold;'>+</span>";
} else if($row->rh =="Negativo"){
echo "<span  style='font-weight:bold;'>-</span>";
	}
	else {echo "<span  style='font-weight:bold;'></span>";}
?>


</td>
</tr>
</table>

<br/>

<h3>SOSPECHA DE ABUSO O MALTRATO</h3>

<table class="table" style="width:100%">
<tr >
<td><strong>Se ha sentido alguna vez afectada/lastimada emosional o psicologicamente por alguna persona importante para usted ?</strong></td>
<td>
<?php if($row->violencia1 !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>

<input type="checkbox"  <?=$checked?> > <label></label>
</td>

</tr>
<tr>
<td>
<?=$row->violencia1?>
</td>
</tr>

<tr >
<td><strong>Alguna vez alguien le ha hecho dano fisico ?</strong></td>
<td>
<?php if($row->violencia2 !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>

<input type="checkbox"  <?=$checked?> > <label></label>
</td>

</tr>
<tr>
<td>
<?=$row->violencia2?>
</td>
</tr>

<tr >
<td><strong>En algun momento has sido tocada, manoseada o forzada a tener contacto o relacion sexual ?</strong></td>
<td>
<?php if($row->violencia3 !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>

<input type="checkbox"  <?=$checked?> > <label></label>
</td>

</tr>
<tr>
<td>
<?=$row->violencia3?>
</td>
</tr>

<tr >
<td><strong>Cuando era nina, fue tocada de una manera inpropriada por alguien ?</strong></td>
<td>
<?php if($row->violencia4 !=""){
$checked="";

} else{
$checked="checked='checked'";
} ?>

<input type="checkbox"  <?=$checked?> > <label></label>
</td>

</tr>
<tr>
<td>
<?=$row->violencia4?>
</td>
<td></td>
</tr>
</table>
<br/><br/><br/>
<h3>HABITOS TOXICOS</h3>

 <table style="width:100%;font-size: 13px;" >
 <?php 
	 foreach($HABITOS as $row)

	?>
		
<tr style="background:rgb(192,192,192);">
<td><strong>Habito</strong></td><td><strong>Cantidad</strong></td><td><strong>Frecuencia</strong></td><td><strong>Habito</strong></td><td><strong>Cantidad</strong></td><td><strong>Frecuencia</strong></td>
</tr>

<tr>

<td><img src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="15" alt=""/> <strong> Cafe</strong> </td>
<td><?=$row->cafe_cant?></td>
<td>
<?=$row->cafe_frec ?>
</td>

<td><img src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="15" alt=""/> <strong> Pipa</strong> </td>
<td><?=$row->pipa_cant?></td>
<td>
<?=$row->pipa_frec ?>

</td>
</tr>

<tr>
<td><img src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="15" alt=""/> <strong>Cigarillo</strong> </td>
<td><?=$row->ciga_can?></td>
<td>
<?=$row->ciga_frec ?>

</td>

<td><img src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="15" alt=""/> <strong> Alcohol</strong> </td>
<td><?=$row->alc_can?></td>
<td>
<?=$row->alc_frec ?>

</td>
</tr>
<tr>

<td>
<img src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="15" alt=""/>
 <strong>Tabaco</strong>
 </td>
<td><?=$row->tab_can?></td>
<td >
<?=$row->tab_frec ?>

</td>
</tr>


<tr>

<td>
<img src="<?= base_url();?>assets/img/historial_medical/hookah.jpg" width="15" alt=""/>
 <strong>Hookah</strong>
 </td>
<td><?=$row->hookah?></td>
<td >
<?=$row->hab_f_hookah ?>
</td>
<td>
	<img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/drugs.jpg" width="40" alt=""/> <strong>Droga</strong>
</td>

<td>
	<?php 
$sql ="SELECT name FROM h_c_droga where id_patient=$id_historial";
$query = $this->db->query($sql);

foreach($query->result() as $dr){
	
$droga=$this->db->select('name')
->where('id',$dr->name)
->get('historial_dropdown')->row('name');	
	
	
echo "$droga<br/>";
}
?>
</td>

<td>
<?=$row->hab_f_drug?>
</td>
</tr>

</table>
</html>
