<?php
$name=($this->session->userdata['admin_name']);
?>
<style>
label{text-transform:lowercase}

</style>

<div id="show_obs_data"></div>
<div id="hide_obs">
<form  id="" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?>"> 
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 
  <input type="hidden" id="operationobs" value="updateobs" > 
<p class=" h4 his_med_title"  >Antecedentes Obstetricos</p>
<div class="col-xs-12" style="border-bottom:2px groove #38a7bb;padding:20px" >
<div class="col-xs-5" >
<div class="input-group" >
 <span  class="input-group-addon"><span style="color:green;font-size:20px"><b><?=$count_obs?></b></span> registro (s)</span> 
 <select class="form-control" id="id_obs" >
<option value="" hidden>Navegador</option>
<?php 

 foreach($obs_nav as $row)

 {
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
?>
<option value="<?=$row->idobs;?>"># (<?=$row->idobs;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php 
 }
 ?>

</select>

 <span class="input-group-addon" id="hide_new">
 
 <div class="btn-group">
<button type="button" style="background:green;color:white" id="obstetricohide"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>

<button style="background:green;color:white" type="button" title="Imprimir" class="dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu" >
<li><a target="_blank"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</span>
</div>

</div>
<div class="col-xs-7" >

<?php
 foreach($obs as $row)
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insed_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
$upda_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));	
echo "<span style='color:black;position:absolute'>Registro # <b style='font-size:25px;'>$row->idobs</b> | Insertado por : $row->inserted_by | Fecha de inserción : $insed_time<br/>
<span id='hide_update2' >Cambiado por : $row->updated_by | fecha de cambio : $upda_time </span>
</span><br/><br/><br/>";

?>
</div>

</div>

<div class="col-md-12 deactivate_obs backg" >
<div class="col-md-12"  >
<?php
foreach($obs as $row)


?>
<input type="hidden" id="getidobs" value="<?=$row->idobs?>" > 
<div class="form-group">
<div class="col-md-3"  >
<table class="table" >
<h5> Personales</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td><label>Diabetes </label></td>
<td>
<?php
if($row->dia1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia1' name='dia1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->dia1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia1' name='dia1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>TBC Pulmonar </label></td>
<td>
<?php
if($row->tbc1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc1' name='tbc1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->tbc1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc1' name='tbc1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Hipertencion </label></td>
<td>
<?php
if($row->hip1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip1' name='hip1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->hip1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip1' name='hip1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label> Pelvico-Urinaria </label></td>
<td>
<?php
if($row->pelv =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelv' name='pelv' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->pelv =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelv' name='pelv' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Infertibilidad </label></td>
<td>
<?php
if($row->inf =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='inf' name='inf' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->inf =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='inf' name='inf' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Otros </label></td>
<td>
<?php
if($row->otros1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros1' name='otros1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->otros1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros1' name='otros1' value='si' $checked> ";
?>
</td>
</tr>
<tr >
<td colspan="3"><input type="text" id="otros1_text" value="<?=$row->otros1_text?>" /></td>
</tr>
</table>
</div>
<div class="col-md-4" style="border-right:1px solid rgb(210,210,210)" >
<table class="table" >
<h5> Familiares</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td><label>Diabetes</label></td>
<td>
<?php
if($row->dia2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia2' name='dia2' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->dia2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia2' name='dia2' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>TBC Pulmonar</label></td>
<td>
<?php
if($row->tbc2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc2' name='tbc2' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->tbc2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc2' name='tbc2' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Hipertencion</label></td>
<td>
<?php
if($row->hip2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip2' name='hip2' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->hip2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip2' name='hip2' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Gemlares</label></td>
<td>
<?php
if($row->gem =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='gem' name='gem' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->gem =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='gem' name='gem' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<label>Otros</label></td>
<td>
<?php
if($row->otros2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros2' name='otros2' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->otros2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros2' name='otros2' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td colspan="3"><input type="text" id="otros2_text" value="<?=$row->otros2_text?>"/></td>
</tr>
</table>
</div>
<div class="col-md-5">

<table class="table" >
<tr>
<th>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</th>
</tr>
<tr>
<td><label> Fiebre </label></td>
<td>
 <?php
if ($row->fiebre ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="fiebre" <?=$selected?>>
</td>
</tr>
<tr>
<td><label> Artralgia </label></td>
<td>
 <?php
if ($row->artra ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="artra" <?=$selected?>>
</td>
</tr>
<tr>
<td><label>Mialgia </label> </td>
<td>
 <?php
if ($row->mia ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="mia" <?=$selected?>>
</td>
</tr>
<tr>
<td><label>Exantema cutaneo </label></td>
<td>
 <?php
if ($row->exa ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="exa" <?=$selected?>>
</td>
</tr>
<tr>
<td> <label>Conjuctivitis no purulenta/hiperemica </label> </td>
<td>
 <?php
if ($row->con ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="con" <?=$selected?>>
</td>


</tr>

</table>
</div>
</div>
</div>
<div class="col-md-12"  >
<?php
foreach($obs2 as $row2)


?>
<hr class="title-highline-top"/>
<div class="form-group" >
 <h4 class=" h4 his_med_title"> Obstetricos</h4>
 <div class="col-md-2">

 <table class="table"  >

<tr>
<td>Ninguno o mas de 3 partos</td>
<td>
 <?php
if ($row2->nig1 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig1" <?=$selected?>>
</td>
</tr>
<tr>
<td>Algun RN menor de 2500g</td>
<td>
 <?php
if ($row2->nig2 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig2" <?=$selected?>>
</td>
</tr>
<tr>
<td>Embarazo multiple</td>
<td>
 <?php
if ($row2->nig3 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig3" <?=$selected?>>
</td>
</tr>
</table>

</div>
 <div class="col-md-10">
 <div class="col-lg-3">
    <div class="input-group">
     <span class="input-group-addon"><label>Partos</label></span>
      <input type="text" class="form-control sumg" id="partos" value="<?=$row2->partos?>">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>Arbotos</label></span>
      <input type="text" class="form-control sumg" id="arbotos" value="<?=$row2->arbotos?>">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>Vaginales</label></span>
      <input type="text" class="form-control sumg" id="vaginales" value="<?=$row2->vaginales?>">
    </div>
  </div>
   <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"><label>viven</label></span>
      <input type="text" class="form-control sumg" id="viven" value="<?=$row2->viven?>" >
    </div>
	</div>
  
   <br/></br>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>gestas</label></span>
      <input type="text" class="form-control sumg" id="gestas" value="<?=$row2->gestas?>">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>Cesareas</label></span>
      <input type="text" class="form-control sumg" id="cesareas" value="<?=$row2->cesareas?>">
    </div>
  </div>
  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"><label>Muertos 1era sem.</label></span>
      <input type="text" class="form-control sumg" id="muertos1" value="<?=$row2->muertos1?>" >
    </div>
	</div>
  

 <br/></br>

  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>Nacidos vivos</label></span>
      <input type="text" class="form-control sumg" id="nacidov1" value="<?=$row2->nacidov1?>">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>Nacidos muertos</label></span>
      <input type="text" class="form-control sumg" id="nacidom1" value="<?=$row2->nacidom1?>">
    </div>
  </div>

  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"><label>Despues 1era sem.</label></span>
      <input type="text" class="form-control sumg" id="despues1s" value="<?=$row2->despues1s?>">
    </div>
	</div>
	 <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>otros</label></span>
      <input type="text" class="form-control sumg" id="otrosc" value="<?=$row2->otrosc?>">
    </div>
  </div>
   
 </div>
 <br/><br/>
   <div class="col-md-6">
     <div class="form-group">
   <table class="table"  >

<tr>
<td><label>Fin Ant. Embarazo</label>
<input style="text-transform:lowercase" type="text" class="form-control" id="fin" value="<?=$row2->fin?>"></td>
<td><label>RN con major peso</label>
<div class="input-group">
<input type="text" class="form-control" id="rn" value="<?=$row2->rn?>"><span class="input-group-addon" >lb</span>
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<hr class="title-highline-top"/>
	<h4 class=" h4 his_med_title">Embarazo Actual</h4>
<div class="col-lg-9" style="border-right:1px solid rgb(210,210,210)">
<?php
foreach($obs3 as $row3)

?>
<table class="table"  style="width:100%;">
<tr><th>Calcul Gestacionario Segun Sonografia</th><th></th><th></th></tr>
<tr>

<td>
<label>1era Fecha Sonografia</label>
<div class="input-group date dfecha1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha1" value="<?=$row3->fecha1?>" readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha1_link"  type="hidden"  >

</td>

<td><label>1 era sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono1" value="<?=$row3->sono1?>"><span class="input-group-addon">Sem.</span></div></td>
<td title="Mas o menos 2 semanas"><label>FPP (+ o - 2 sem.)</label><input type="text" class="form-control fpp " id="fpp1" value="<?=$row3->fpp1?>" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest1" value="<?=$row3->rest1?>" readonly ></td>
</tr>
<tr>

<td><label><label>2da Fecha sonografia</label>
<div class="input-group date dfecha2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha2" value="<?=$row3->fecha2?>"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha2_link"  type="hidden"  >
</td>
<td><label>2 da sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono2" value="<?=$row3->sono2?>"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp2" value="<?=$row3->fpp2?>" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest2" value="<?=$row3->rest2?>" readonly></td>
</tr>
<tr>
<td><label><label>3era Fecha sonografia</label>
<div class="input-group date dfecha3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha3" value="<?=$row3->fecha3?>"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha3_link"  type="hidden"  >
</td>

<td><label>3 da sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono3" value="<?=$row3->sono3?>"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp3" value="<?=$row3->fpp3?>" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest3" value="<?=$row3->rest3?>" readonly></td>
</tr>
<tr>
<td><label><label>Fecha sonografia</label>
<div class="input-group date dfecha4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha4" value="<?=$row3->fecha4?>"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha4_link"  type="hidden"  >
</td>

<td><label>4 da sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono4" value="<?=$row3->sono4?>"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp4" value="<?=$row3->fpp4?>" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest4" value="<?=$row3->rest4?>" readonly></td>
</tr>
</table>
</div>
<div class="col-lg-3">
<table class="table"  >
<tr><th>Peso</th><th></th></tr>
<tr>
<th><label>Peso</label></td><td><label>Talla cm</label></th>
</tr>
<tr>
<td><div class="input-group">
<input type="text" class="form-control" style="text-transform:lowercase" id="peso1" value="<?=$row3->peso1?>">  <span class="input-group-addon">lb</span> 
 </div>
 </td>
<td><input type="text" class="form-control" id="talla1" value="<?=$row3->talla1?>"></td>
</tr>
</table>

<table class="table"  >
<tr><th>Calcul Gestacionario Segun FUM</th></tr>
<tr>
<td>
<label>FUM</label>
<input  type="text" class="form-control" name="sonog" id="fum_cal_ges" value="<?=$row3->fum_cal_ges?>"><button id="calfum">Cal</button>
</td>
</tr>
<tr>
<td><label>FPP(+ o - 2 sem.)</label> <input type="text" class="form-control" value="<?=$row3->fpp_cal_ges?>" id="fpp_cal_ges"></td>
</tr>
<tr>
<td><label>Sem. Act. Aprox</label> <input type="text" class="form-control" id="sem_act_a" value="<?=$row3->sem_act_a?>"></td>
</tr>
</table>

</div>
</div>

<div class="col-lg-12">
<hr class="title-highline-top"/>
<div class="col-lg-6">
<table class="table" >

<h5>Antitetanica</h5>
<tr>
<td><label>Previa</label></td><td><label>Actual</label></td><td></td><td></td>
</tr>
<tr><input type="radio" name="prev_act" id="prev_act" value="" hidden checked>
<td><label> No </label>
<?php
if($row3->prev_act =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='prev_act' name='prev_act' value='no' $checked> ";
?> 
</td>
<td><label> Si</label> 
<?php
if($row3->prev_act =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='prev_act' name='prev_act' value='si' $checked> ";
?> 

</td>

<td><div class="input-group">
 <span class="input-group-addon">1</span> 
 <input type="text" class="form-control"  id="prev_act_mes" placeholder="Mes" style="text-transform:lowercase" value="<?=$row3->prev_act_mes?>"> 
 </div>
</td>
<td><div class="input-group">
 <span class="input-group-addon">2/R</span> <input type="text" class="form-control" id="2r" placeholder="Gesta" value="<?=$row3->rr?>" style="text-transform:lowercase"> 
 </div>
</td>
</tr>
</table>
</div>
<div class="col-lg-6">
<table class="table"  >
<h5>Groupo</h5>
<tr>
<td><label>Sencibil</label></td>

<td><label>Si </label> 
<?php
if($row3->sencibil =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sencibil' name='sencibil' value='si' $checked> ";
?> 
</td>
<td> <label>No </label>
<?php
if($row3->sencibil =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sencibil' name='sencibil' value='no' $checked> ";
?> 
 </td>
</tr>
<tr>
<td><label>Rh</label></td>
<td>+ 
<?php
if($row3->rh =="+"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='rh' name='rh' value='+' $checked> ";
?>
 - 
<?php
if($row3->rh =="-"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='rh' name='rh' value='-' $checked> ";
?>
</td>
<td><div class="input-group">
 <select class="form-control" id="rh_option">
<option><?=$row3->rh_option?></option>
<option>A</option>
<option>AB</option>
<option>0</option>
</select> 
</div></td>
</tr>
</table>
</div>
<!--
<div class="col-lg-3">
<table class="table"  >
<tr>
<th>Hospitalizacion</th><td>No <input type="radio"  name="sg"></td><td>Si</td><td> <input type="radio"  name="sg"></td>
</tr>
<tr>
<th>Traslado</th><td>No <input type="radio"  name="sg"></td><td>Si</td><td> <input type="radio"  name="sg"></td>
</tr>
<tr>
<th cols="1">Lugar</th><td><input type="text"  name="sg"></td><td></td><td></td><td></td>
</tr>
</table>
</div>
-->
</div>
 <div class="col-md-12">
 <hr class="title-highline-top"/>
 <!--
 <div class="col-lg-2">
<table class="table"  >
<h5>Dudas</h5>
<tr>
<td>No</td><td><input type="radio"  name="sg"></td>
</tr>
<tr>
<td>Si</td><td><input type="radio"  name="sg"></td>
</tr>

</table>
</div>
 <div class="col-lg-4">
<table class="table"  >
<h5>Fumas</h5>
<tr>
<td>No <input type="radio" ></td><td>Cant.</td><td></td>
</tr>
<tr>
<td>Si <input type="radio" ></td><td><input type="text" ></td><td>Cigarillos</td>
</tr>
</table>
  </div>-->
 <div class="col-lg-4">
<table class="table"  >
<h5>Ox. Odont.</h5>

<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->odont =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='odont' name='odont' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->odont =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='odont' name='odont' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
  <div class="col-lg-4">
<table class="table"  >
<h5>Ex. Pelvis.</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->pelvis =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelvis' name='pelvis' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->pelvis =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelvis' name='pelvis' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table"  >
<h5>Papanicola</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->papani =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='papani' name='papani' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->papani =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='papani' name='papani' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
</div> 
 <div class="col-md-12">
  <hr class="title-highline-top"/>
<div class="col-lg-4">
<table class="table"  >
<h5>COLPOSCOPIA</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->colp =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='colp' name='colp' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->colp =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='colp' name='colp' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
  <div class="col-lg-4">
<table class="table"  >
<h5>CEVIX</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->cevix =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cevix' name='cevix' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->cevix =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cevix' name='cevix' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table"  >
<h5>VDRL</h5>

<tr>
<td>
<?php
if($row3->vdrl1 ==1){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='checkbox' id='vdrl1' name='vdrl1'  $checked> +";
?>
</td>
<td><label>Dia/Mes</label></td>
</tr>
<tr>
<td>
<?php
if($row3->vdrl2 ==1){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='checkbox' id='vdrl2' name='vdrl2'  $checked> -";
?>
</td>
<td>
<input class="form-control" type="text" id="diasmes" value="<?=$row3->diasmes?>">
</td>
</tr>
</table>
  </div>
  
</div> 
<div class="col-md-12">
 <hr class="title-highline-top"/>
<div class="col-md-9">
<table class="table">
 <h5 class=" h4 his_med_title"> PUERPERIO</h5>
<?php
foreach($obs4 as $row4)

?>
<td><label>Horas o dias post parto o aborto</label></td>
<td><input class="form-control" type="text" id="pu_fecha1" value="<?=$row4->pu_fecha1?>"></td>
<td><input class="form-control" type="text" id="pu_fecha2" value="<?=$row4->pu_fecha2?>"></td>
<td><input class="form-control" type="text" id="pu_fecha3" value="<?=$row4->pu_fecha3?>"></td>
</tr>
<tr>
<td><label>Temperatura</label></td>
<td><input class="form-control" type="text" id="pu_t1" value="<?=$row4->pu_t1?>"></td>
<td><input class="form-control" type="text" id="pu_t2" value="<?=$row4->pu_t2?>"></td>
<td><input class="form-control" type="text" id="pu_t3" value="<?=$row4->pu_t3?>"></td>
</tr>
<tr>
<td><label>Pulso (lat/min)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul1" value="<?=$row4->pu_pul1?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul11" value="<?=$row4->pu_pul11?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul2" value="<?=$row4->pu_pul2?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul22" value="<?=$row4->pu_pul22?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul3" value="<?=$row4->pu_pul3?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul33" value="<?=$row4->pu_pul33?>">
</div>
</td>
</tr>
<tr>
<td><label>Tension arterial (max/min mm.hg)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten1" value="<?=$row4->pu_ten1?>">
<span class="input-group-addon">/</span>
<input class="form-control" type="text" id="pu_ten11" value="<?=$row4->pu_ten11?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten2" value="<?=$row4->pu_ten2?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten22" value="<?=$row4->pu_ten22?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten3" value="<?=$row4->pu_ten3?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten33" value="<?=$row4->pu_ten33?>">
</div>
</td>
</tr>
<tr>
<td><label>Invol. Uterina</label></td>
<td><input class="form-control" type="text" id="pu_inv1" value="<?=$row4->pu_inv2?>"></td>
<td><input class="form-control" type="text" id="pu_inv2" value="<?=$row4->pu_inv2?>"></td>
<td><input class="form-control" type="text" id="pu_inv3" value="<?=$row4->pu_inv3?>"></td>
</tr>
<tr>
<td><label>Caracteristicas de Loquios</label> </td>
<td>
<select class="form-control loquios" id="loquios1">
<option hidden><?=$row4->loquios1?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select>
</td>
<td><select class="form-control loquios" id="loquios2">
<option hidden><?=$row4->loquios2?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
<td><select class="form-control loquios" id="loquios3">
<option hidden><?=$row4->loquios3?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
</tr>
</table>
</div>
<div class="col-md-3">
<p class="alert alert-warning alert1"  style="display:none">Alerta : Sospecha endometritis</p>
<p class="alert alert-warning alert2"  style="display:none">Alerta : Sospecha de restos ovulares</p>
</div>
</div>
</div>
</form> 
</div>
