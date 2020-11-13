<style>td{font-size:12px}</style>
<br/>
<hr/>
<br/><br/>
<?php foreach($pediaid as $row)?>


<table style="width:100%" >
<tr>
<td colspan="2"><strong>Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</strong></td>
</tr>
<tr>
<td style="text-align:left;">
<table class="r-b">
<tr>
<td>
<?php
if($row->evo =="normal"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='evo1' name='evo1' value='normal' $checked> Normal ";
?>
</td>

<td>


<?php
if($row->evo =="complicado"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='evo1' name='evo1' value='complicado' $checked> Complicado";
?>
</td>
</tr>
</table>
</td>
<td>
<?=$row->evol_text?>
</td>
</tr>


</table>

<br/>

<table style="width:100%" >
<tr>
<td style="width:20px"><strong>Medicamento Habituales</strong></td>
<?php 
$sql ="SELECT medicine FROM h_c_patient_medicine
 where id_patient =$row->hist_id and part='pedia'";
$query = $this->db->query($sql);
foreach($query->result() as $dr){
?><td style="width:10px"><?=$dr->medicine;?><td/>
<?php
}

?>
</tr>
<tr>

</tr>


</table>


<br/>

<table style="width:100%" >

<tr>
<td><strong> Tipo de nacimiento </strong></td>
<td>
<table class="r-b">
<tr>
<td >
<?php

if($row->tnaci =="parto"){
	$checked="checked='checked'";;
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?><br/>
Parto
</td>
<td style="font-size:10px">

<?php

if($row->tnaci =="cesarea"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?><br/>
Cesarea
</td>

<td style="font-size:10px">
<?php

if($row->tnaci =="desconocido"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> ";
?><br/>
Desconocido
</td>
</tr>

</table>

</td>
<td   style="text-align:right"><strong>Descripcion</strong> </td>

<td>
 <?=$row->describa?>
</td>
</tr>




</table>

<br/>

<table style="width:100%" >
<tr>
<td style="text-align:right"><strong>Edad gestacional al momento del nacimiento</strong></td>
<td><?=$row->edad_gest?></td>
</tr>

<tr>
<td  style="text-align:right;width:20%"><strong>Peso al nacer </strong></td>
<td>
<?php
if($row->peso==""){
echo "desconocido";
} else {echo $row->peso;}
?>

</td>
</tr>

<tr>
<td  style="text-align:right"><strong>Talla al nacer</strong></td>
<td>
<?php
if($row->talla=="")
{
echo "desconocido";
} 
else 
{
	echo $row->talla;
}
?>

</td>
</tr>
</table>

<br/>



<table style="width:100%" >
<!--<tr><th>No patologicos</th><th></th><th></th>
</tr>-->
<tr>
<td style="width:20%;text-align:right"><strong>Alimentos</strong></td>

<td>
<table class="r-b">
<tr>
<td>
<?php 
if($row->lactamat ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> Lactancia Materna 
</td>

<td>";
if($row->leche ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> Leche de formulas";
?>
</td>

</table>
</td>

</tr>

<tr>
<td style="text-align:right"><strong> Otros </strong></td>
<td><?=$row->otrosinfo?></td>
</tr>
</table>
<br/>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Traumatico/somatico, psicolog</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->traum_text !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio' $checked> No";
?>
</td>
<td>
<?php
if($row->traum_text ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->traum_text?></td>

</tr>
</table>

<br/>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Transfusionales</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->trans_text !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
</td>
<td>
<?php
if($row->trans_text ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->trans_text?></td>

</tr>
</table>
<br/>

<table style="width:100%">
<tr>
<td colspan="3"><strong> Motor Grueso adecuado para su edad</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->motor1 ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
</td>
<td>
<?php
if($row->motor1 !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->motor1?></td>

</tr>
</table>


<br/>


<table style="width:100%">
<tr>
<td colspan="3"><strong> Motor fino adecuado para su edad</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->motor2 ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
</td>
<td>
<?php
if($row->motor2 !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->motor2?></td>

</tr>
</table>

<br/>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Lenguaje adecuado para su edad</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->lenguaje ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
</td>
<td>
<?php
if($row->lenguaje !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->lenguaje?></td>

</tr>
</table>


<br/>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Social adecuado para su edad</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->social ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
</td>
<td>
<?php
if($row->social !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> Si";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->social?></td>

</tr>
</table>

<br/>


<table style="width:100%">
<tr><td colspan="2"><strong>Patologias</strong></td></tr>
<tr>
<td>
<?php 
if($row->ale ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Alergia</label> 
</td>
<td>
<?php 
if($row->hep ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox' $checked> ";
?>
<label>Hepatitis</label> 
</td>
</tr>
<tr>
<td>
<?php 
if($row->amig ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
 <label>Amigdalitis</label> </label>
</td>
<td>
<?php 
if($row->infv ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> ";
?>
<label>Infeccion vias urinarias</label> 
 </td>
</tr>
<tr>
<td>
<?php 
if($row->asm ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'  $checked> ";
?>
 <label>Asma</label> 
 </td>
<td>
<?php 
if($row->neum ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> ";
?>

 <label>Neumoria</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->cirug ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'  $checked> ";
?>

 <label> Cirugias</label>
 </td>
<td>
<?php 
if($row->otot ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>

 <label>Ototis</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->deng ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Dengue</label> 
</td>
<td>
<?php 
if($row->pape ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Paperas</label>
</td>
</tr>
<tr>
<td>
<?php 
if($row->diar ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Diarrea</label> 
 </td>
<td>
<?php 
if($row->paras ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Parasitosis</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->zika ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
 <label> Zika </label>
 </td>
<td>
<?php 
if($row->saram ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'  $checked> ";
?>
<label>Sarampion</label>
</td>
</tr>
<tr>
<td>
<?php 
if($row->chicun ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> ";
?>
<label> Chicungunya</label> 
 </td>
<td>
<?php 
if($row->varicela ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'   $checked> ";
?>
<label>Varicela</label> 
 </td>
</tr>
<tr>
<td>
<?php 
if($row->falc ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'    $checked> ";
?>
<label> Falcemia</label> 
 </td>
<td>
<?php 
if($row->otros_t_text ==""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='checkbox'  $checked> ";
?>
 <label>Otros</label>
(<?=$row->otros_t_text?>)
 </td>
</tr>
</table>

<br/>
<h4>Sospecha de Abuso o Maltrato</h4>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Maltrato fisico</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->maltratof !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Si";
?>
</td>
<td>
<?php
if($row->maltratof !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->maltratof?></td>

</tr>
</table>
<br/>

<table style="width:100%">
<tr>
<td colspan="3"><strong> Abuso sexual</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->abusos !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Si";
?>
</td>
<td>
<?php
if($row->abusos !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->abusos?></td>

</tr>
</table>

<table style="width:100%">
<tr>
<td colspan="3"><strong> Negligencia</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->negligencia !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Si";
?>
</td>
<td>
<?php
if($row->negligencia !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->negligencia?></td>

</tr>
</table>
<table style="width:100%">
<tr>
<td colspan="3"><strong> Maltrato emocional</strong> </td>
</tr>
<tr>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->maltrato !=""){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Si";
?>
</td>
<td>
<?php
if($row->maltrato !=""){
	$checked="";
} else{
	$checked="checked='checked'";
	}
echo "<input type='radio'  $checked> No";
?>
 </td>
 </tr>
</tr>

 </table>
 </td>
  <td><strong>Desc.</strong> </td> 
  <td>  <?=$row->maltrato?></td>

</tr>
</table>
<br/>

<br/>

<h4>VACUNACION<h4>


  <table  style="background:#E6E6FA;width:100%">
   <?php foreach($vacuna as $row2)?>
  <tr><th></th><th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$row2->insert_d?></span></th>
  <th class="col-xs-2">
 <input  id="insert_d"  type="hidden" value="<?=$row2->insert_d?>"  > 
</th>

<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th>
</th>
<th>DOSIS UNICA</th>
<th >1era. Dosis</th>
<th>2da. Dosis</th>
<th >3era. Dosis</th>
<th >1er.Refuerzo</th>
<th >2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG</th>
<td>
<?=$row2->insert_d?>
<br/>
<?php  if($row2->resf1==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->bcg1<br/><b  style='color:red'>Dias de atraso : $row2->resf1</b>";
	}
	?>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<?=$row2->insert_d?>
</br>
<?php  if($row2->resf2==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->hepb1<br/><b style='color:red'>Dias de atraso :$row2->resf2</b> ";
	}
	?>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<?=$row2->insert_d?>
</br>
<?php  if($row2->resf3==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->yel3<br/><b style='color:red'>Dias de atraso :$row2->resf3</b> ";
	}
	?>
</td>
<td>
<?=$row2->bl11?>
</br>
<?php  if($row2->resf4==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->bl4<br/><b style='color:red'>Dias de atraso :$row2->resf4</b> ";
	}
	?>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap51" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel51" value="<?=$row2->yel5?>"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel5?>">
<input  id="mirror_d5"  type="hidden"  > 
<span style="color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf51" style="background:none;pointer-events:none;border:none;width:50px" value="<?=$row2->resf5?>"></i></span>
</td>
<td>
<?=$row2->bl11?>
</br>
<?php  if($row2->resf6==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->bl6<br/><b style='color:red'>Dias de atraso :$row2->resf6</b> ";
	}
	?>

</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap71" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr71" value="<?=$row2->gr7?>"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr7?>">
<input  id="mirror_d7"  type="hidden"  > 
<span style="color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf71" style="pointer-events:none;border:none;width:70px;background:none" value="<?=$row2->resf7?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap81" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll81" value="<?=$row2->bll8?>" readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll8?>">
<input  id="mirror_d8"  type="hidden"  > 
<span style="color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf81" style="pointer-events:none;border:none;width:80px" value="<?=$row2->resf8?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap91" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr91" value="<?=$row2->grr9?>"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr9?>">
<input  id="mirror_d9"  type="hidden"  > 
<span style="color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf91" style="pointer-events:none;border:none;width:90px;background:none" value="<?=$row2->resf9?>"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap101" style="display:none;">
<input type="text"  class="form-control bcgno"   id="yel101" value="<?=$row2->yel10?>" readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel10?>">
<input  id="mirror_d10"  type="hidden"  > 
<span style="color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf101" style="pointer-events:none;border:none;width:100px" value="<?=$row2->resf10?>"></i></span>
</td>
<td>
<?=$row2->bl11?>
</br>
<?php  if($row2->resf11==0){
	
}
else{
echo "<hr/><b>Fecha aplicada</b><br/>$row2->bl4<br/><b style='color:red'>Dias de atraso :$row2->resf11</b> ";
	}
	?>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap122 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1221" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr121" value="<?=$row2->gr12?>" readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr12?>">
<input  id="mirror_d12"  type="hidden"  > 
<span style="color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf121" style="pointer-events:none;border:none;width:120px" value="<?=$row2->resf12?>"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap133 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1331" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel131" value="<?=$row2->yel13?>"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel13?>">
<input  id="mirror_d13"  type="hidden"  > 
<span style="color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf131" style="pointer-events:none;border:none;width:130px;background:none" value="<?=$row2->resf13?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap144 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1441" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl141" value="<?=$row2->bl14?>"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl14?>">
<input  id="mirror_d14"  type="hidden"  > 
<span style="color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf141" style="pointer-events:none;border:none;width:140px" value="<?=$row2->resf14?>"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap155 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1551" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll151" value="<?=$row2->bll15?>" readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" value="<?=$row2->bll15?>">
<input  id="mirror_d15"  type="hidden"  > 
<span style="color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf151" style="pointer-events:none;border:none;width:150px" value="<?=$row2->resf15?>"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap166 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1661" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bcg161" value="<?=$row2->srp16?>" readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$row2->srp16?>">
<input  id="mirror_d16"  type="hidden"  > 
<span style="color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf161" style="pointer-events:none;border:none;width:160px" value="<?=$row2->resf16?>"></i></span>
</td>
<td> </td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>DTP</th>
<td></td>
 <td> </td>
 <td></td>
 <td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap177 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll171" value="<?=$row2->bll17?>"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll17?>">
<input  id="mirror_d17"  type="hidden"  > 
<span style="color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf171" style="pointer-events:none;border:none;width:170px" value="<?=$row2->resf17?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap188 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1881" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr181" value="<?=$row2->grr18?>"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr18?>">
<input  id="mirror_d18"  type="hidden"  > 
<span style="color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf181" style="pointer-events:none;border:none;width:180px" value="<?=$row2->resf18?>"></i></span>
</td>
</tr>
</table>