<?php foreach($obs as $row)

?>

<div id="sides" >
<div id="left">
<table style="width:80%">
<tr style="border:none">
<td><strong>Personales</strong></td>
</tr>
<tr>
<td></td><td><strong>No</strong></td><td><strong>Si</strong></td>
</tr>
<tr>
<td>
<?php
if($row->dia1 =="no" || $row->dia1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">Diabetes </strong>
</td>
<td>
<?php
if($row->dia1 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->dia1 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->tbc1 =="no" || $row->tbc1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">TBC Pulmonar </strong>
</td>
<td>
<?php
if($row->tbc1 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->tbc1 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->hip1 =="no" || $row->hip1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">Hipertencion </strong>
</td>
<td>
<?php
if($row->hip1 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->hip1 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->pelv =="no" || $row->pelv ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">Pelvico-Urinaria </strong>
</td>
<td>
<?php
if($row->pelv =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
<td>
<?php
if($row->pelv =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->infert =="no" || $row->infert ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">Infertibilidad </strong>
</td>
<td>
<?php
if($row->infert =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->infert =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
</tr>
<tr>
<td><strong>Otros </strong></td>
<td>
<?php
if($row->otros1 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
<td>
<?php
if($row->otros1 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr >
<td colspan="3"><?=$row->otros1_text?></td>
</tr>
</table>
</div>
<div id="right">
<table style="width:80%">
<tr style="border:none">
<td><strong>Familiares</strong></td>
</tr>
<tr>
<td></td><td><strong>No</strong></td><td><strong>Si</strong></td>
</tr>
<tr>
<td>
<?php
if($row->dia2 =="no" || $row->dia2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>

<strong style="<?=$color?>">Diabetes </strong>

</td>
<td>
<?php
if($row->dia2 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->dia2 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->tbc2 =="no" || $row->tbc2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">TBC Pulmonar </strong>

</td>
<td>
<?php
if($row->tbc2 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->tbc2 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->hip2 =="no" || $row->hip2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>">Hipertencion </strong>
</td>
<td>
<?php
if($row->hip2 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td>
<?php
if($row->hip2 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->gem =="no" || $row->gem ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<strong style="<?=$color?>"> Gemlares </strong>
</td>
<td>
<?php
if($row->gem =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
<td>
<?php
if($row->gem =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>

<tr>
<td><strong>Otros </strong></td>
<td>
<?php
if($row->otros2 =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
<td>
<?php
if($row->otros2 =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr >
<td colspan="3"><?=$row->otros2_text?></td>
</tr>
</table>
</div>
<br/>
</div>

<table style="width:70%" >
<tr>
<td colspan="2"><strong>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</strong></td>
</tr>
<tr>
<td style="text-align:right"><label> Fiebre </label></td>
<td>
 <?php
if ($row->fiebre ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="fiebre1" <?=$selected?>>
</td>
</tr>
<tr>
<td style="text-align:right"><label> Artralgia </label></td>
<td>
 <?php
if ($row->artra ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="artra1" <?=$selected?>>
</td>
</tr>
<tr>
<td style="text-align:right"><label>Mialgia </label> </td>
<td>
 <?php
if ($row->mia ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="mia1" <?=$selected?>>
</td>
</tr>
<tr>
<td style="text-align:right"><label>Exantema cutaneo </label></td>
<td>
 <?php
if ($row->exa ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="exa1" <?=$selected?>>
</td>
</tr>
<tr>
<td  style="text-align:right"> Conjuctivitis no purulenta/hiperemica  </td>
<td>
 <?php
if ($row->con ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="con1" <?=$selected?>>
</td>


</tr>

</table>
<br/>
<h3>Obstetricos</h3>
<?php
foreach($obs2 as $row2)


?>

<table style="width:100%">
<tr>
<td style="text-align:right"><strong>Ninguno o mas de 3 partos</strong>  
 <?php
if ($row2->nig1 ==0){
	$selected="";
	}
	else
	{
$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="nig11" <?=$selected?>>
</td>
<td><strong>Partos</strong> : <?=$row2->partos?></td><td><strong>Arbotos</strong> : <?=$row2->arbotos?></td><td><strong>Vaginales</strong> : <?=$row2->vaginales?></td><td><strong>Viven</strong> : <?=$row2->viven?></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Algun RN menor de 2500g</strong>  
 <?php
if ($row2->nig2 ==0){
	$selected="";
	}
	else
	{
$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="nig11" <?=$selected?>>
</td>
<td><strong>Gestas</strong> : <?=$row2->gestas?></td><td><strong>Cesareas</strong> : <?=$row2->cesareas?></td><td><strong>Vaginales</strong> : <?=$row2->vaginales?></td><td><strong>Muertos 1era sem.</strong> : <?=$row2->muertos1?></td>
</tr>



<tr>
<td  style="text-align:right"><strong>Embarazo multiple</strong>  
 <?php
if ($row2->nig2 ==0){
	$selected="";
	}
	else
	{
$selected="checked='checked'";
	}
 ?>
<input type="checkbox" name="nig11" <?=$selected?>>
</td>
<td><strong>Fin Ant. Embarazo</strong> : <?=$row2->fin?></td><td colspan="3"><strong>RN con major peso</strong> : <?=$row2->rn?></td>
</tr>
</table>
<br/>
<br/>
<h3>Embarazo Actual</h3>
<?php
foreach($obs3 as $row3)
?>

<table style="width:100%">
<tr><td colspan="4"><strong>Calcul Gestacionario Segun Sonografia</strong></td></tr>
<tr>
<td><strong>1era Fecha Sonografia</strong>  
<?=$row3->fecha1?>

</td>
<td><strong>1 era sonografia</strong> : <?=$row3->sono1?></td>
<td><strong>FPP (+ o - 2 sem.)</strong> : <?=$row3->fpp1?></td>
<td><strong>Sem rest</strong> : <?=$row3->rest1?></td>
</tr>



<tr>
<td><strong>2era Fecha Sonografia</strong>  
<?=$row3->fecha2?>

</td>
<td><strong>2 era sonografia</strong> : <?=$row3->sono2?></td>
<td><strong>FPP (+ o - 2 sem.)</strong> : <?=$row3->fpp2?></td>
<td><strong>Sem rest</strong> : <?=$row3->rest2?></td>
</tr>



<tr>
<td><strong>3era Fecha Sonografia</strong>  
<?=$row3->fecha3?>

</td>
<td><strong>3 era sonografia</strong> : <?=$row3->sono3?></td>
<td><strong>FPP (+ o - 2 sem.)</strong> : <?=$row3->fpp3?></td>
<td><strong>Sem rest</strong> : <?=$row3->rest3?></td>
</tr>


<tr>
<td><strong>4era Fecha Sonografia</strong>  
<?=$row3->fecha4?>

</td>
<td><strong>4 era sonografia</strong> : <?=$row3->sono4?></td>
<td><strong>FPP (+ o - 2 sem.)</strong> : <?=$row3->fpp4?></td>
<td><strong>Sem rest</strong> : <?=$row3->rest4?></td>
</tr>
</table>


<br/>
<div id="sides">
<div id="left">
<table>
<tr><td><strong>Calcul Gestacionario Segun FUM</strong></td></tr>
<tr>
<td>
<strong>FUM</strong> <?=$row3->fum_cal_ges?>
</td>
</tr>
<tr>
<td><strong>FPP(+ o - 2 sem.)</strong> <?=$row3->fpp_cal_ges?></td>
</tr>
<tr>
<td><strong>Sem. Act. Aprox</strong> <?=$row3->sem_act_a?></td>
</tr>
</table>
</div>
<div id="right">
<table  >
<tr>
<td><strong>Peso</strong></td><td><?=$row3->peso1?></td><td><strong>Talla cm</strong></td><td><?=$row3->talla1?></td>
</tr>

</table>
</div>
</div>


<div id="sides">

<div id="left">

<h5>Antitetanica</h5>
<table style="width:80%" >

<tr>
<td>Previa</td><td colspan="3">Actual</td>
</tr>
<tr>
<td>No 
<?php
if($row3->prev_act =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?> 
</td>
<td>Si
<?php
if($row3->prev_act =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?> 

</td>

<td>1 <?=$row3->prev_act_mes?></td>
<td>2/R <?=$row3->rr?></td>
</tr>
</table>
</div>
<div id="right">
<h5>Groupo</h5>
<table style="width:80%" >

<tr>
<td>Sencibil</td>

<td>Si  
<?php
if($row3->sencibil =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?> 
</td>
<td> No 
<?php
if($row3->sencibil =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?> 
 </td>
</tr>
<tr>
<td>Rh</td>
<td>+ 
<?php
if($row3->rh =="+"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
 - 
<?php
if($row3->rh =="-"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
<td><?=$row3->rh_option?> </td>
</tr>
</table>
</div>

</div>










<div id="left-3">
<h5>Ox. Odont.</h5>
<table  style="width:90%">


<tr>
<td colspan="2">Normal</td>
</tr>
<tr>
<td>No</td>
<td>
<?php
if($row3->odont =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>Si</td>
<td>
<?php
if($row3->odont =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
</table>
  </div>
<div id="left-3">
<h5>Ex. Pelvis.</h5>
<table  style="width:90%">

<tr>
<td colspan="2">Normal</td>
</tr>
<tr>
<td>No</td>
<td>
<?php
if($row3->pelvis =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>Si</td>
<td>
<?php
if($row3->pelvis =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div id="left-3">
 <h5>Papanicola</h5>
<table  style="width:90%">

<tr>
<td colspan="2">Normal</td>
</tr>
<tr>
<td>No</td>
<td>
<?php
if($row3->papani =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>Si</td>
<td>
<?php
if($row3->papani =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> ";
?>
</td>
</tr>
</table>
  </div>
 
 
 
 
 
<div id="left-3">
<h5>COLPOSCOPIA</h5>
<table  style="width:90%">

<tr>
<td colspan="2">Normal</td>
</tr>
<tr>
<td>No</td>
<td>
<?php
if($row3->colp =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>Si</td>
<td>
<?php
if($row3->colp =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
</table>
  </div>
  <div id="left-3">
  <h5>CEVIX</h5>
<table  style="width:90%">

<tr>
<td colspan="2">Normal</td>
</tr>
<tr>
<td>No</td>
<td>
<?php
if($row3->cevix =="no"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
<tr>
<td>Si</td>
<td>
<?php
if($row3->cevix =="si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div id="left-3">
 <h5>VDRL</h5>
<table  style="width:90%">
<tr>
<td>
<?php
if($row3->vdrl1 ==1){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='checkbox'   $checked> +";
?>
</td>
<td>Dia/Mes</td>
</tr>
<tr>
<td>
<?php
if($row3->vdrl2 ==1){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='checkbox' $checked> -";
?>
</td>
<td>
<?=$row3->diasmes?>
</td>
</tr>
</table>
  </div>
<?php  if($obs4 !=NULL){
  ?>
   <h5> PUERPERIO</h5>
  
  <table style="width:100%">

<?php

foreach($obs4 as $row4)

?>
<td style="text-align:right"><strong>Horas o dias post parto o aborto</strong></td>
<td><?=$row4->pu_fecha1?></td>
<td><?=$row4->pu_fecha2?></td>
<td><?=$row4->pu_fecha3?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Temperatura</strong></td>
<td><?=$row4->pu_t1?></td>
<td><?=$row4->pu_t2?></td>
<td><?=$row4->pu_t3?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Pulso (lat/min)</strong></td>
<td>
<?=$row4->pu_pul1?> / <?=$row4->pu_pul11?>

</td>
<td>
<?=$row4->pu_pul2?> / <?=$row4->pu_pul22?>

</td>
<td>
<?=$row4->pu_pul3?> / <?=$row4->pu_pul33?>

</td>
</tr>
<tr>
<td style="text-align:right"><strong>Tension arterial (max/min mm.hg)</strong></td>
<td>
<?=$row4->pu_ten1?> / <?=$row4->pu_ten11?>

</td>
<td>
<?=$row4->pu_ten2?> / <?=$row4->pu_ten22?>

</td>
<td>
<?=$row4->pu_ten3?> / <?=$row4->pu_ten33?>
</div>
</td>
</tr>
<tr>
<td style="text-align:right"><strong>Invol. Uterina</strong></td>
<td><?=$row4->pu_inv2?></td>
<td><?=$row4->pu_inv2?></td>
<td><?=$row4->pu_inv3?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Caracteristicas de Loquios</strong> </td>
<td>
<?=$row4->loquios1?></td>
<td><?=$row4->loquios2?></td>
<td><?=$row4->loquios3?></td>
</tr>
</table>
<?php } ?>