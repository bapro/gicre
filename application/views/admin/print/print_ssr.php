<style>td{font-size:11px}</style>
<?php 

foreach($ssr as $row)

if($row->amenorea_tiempo >=5)
{
$amenorea_tiempo="<li id='hide-ol-f-u-p' style='color:red'><i class='fa fa-warning' style='color:red;'></i> $row->amenorea_text</li>";
} 
else {
$amenorea_tiempo="";
}




if($row->fecha_ul_pap !='Menos de un ano'  && $row->fecha_ul_pap !='')
{
$fecha_ul_p2="<li id='hide-ol-f-u-p' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima PAP :$row->fecha_ul_pap</li>";
} 
else {
$fecha_ul_p2="";
}


if($row->fecha_ul_mama !='Menos de un ano'  && $row->fecha_ul_mama !='')
{
$fecha_mama3="<li id='hide-first-ol' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima mamagrafia :$row->fecha_ul_mama</li>";
} 
else {
$fecha_mama3="";
}


if($row->ant_pap_re_text !='' )
{
$ant_pap_re_text4="<li id='hide-ol-a-p-r-t' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Antecedentes de PAP Resultados Alterados o Anormales <br/> ($row->ant_pap_re_text)</li>";
} 
else {
$ant_pap_re_text4="";
}



if($row->planif_text !='')
{
$planif_text1="<li style='color:red' id='hide-ol-plan-text'><i class='fa fa-warning' style='color:red;'></i> Metodo de planificacion fam : $row->planif_text</li>";
} 
else {
$planif_text1="";
}

if($row->infeccion1 ==1)
{
$sifilis5=" Sifilis";
} 
else {
$sifilis5="";
}


if($row->infeccion2 ==1)
{
$gonorrea6=" ,Gonorrea";
} 
else {
$gonorrea6="";
}


if($row->infeccion3 ==1)
{
$clamidia7=" ,Clamidia";
} 
else {
$clamidia7="";
}

if($row->otro_infeccion1 !='')
{
$otro_infeccion18=", $row->otro_infeccion1";
} 
else {
$otro_infeccion18="";
}


if($row->infeccion1 ==1 || $row->infeccion1 ==2 || $row->infeccion1 ==3 || $row->otro_infeccion1 !=''){
$sexual_disease="<li style='color:red' class='hide-ol-sexual-d'><i class='fa fa-warning' style='color:red;'></i> Infeccion de transmision sexual : $sifilis5 $gonorrea6 $clamidia7 $otro_infeccion18</li>";	
} else{
$sexual_disease='';
}
?>
<table style="width:100%;font-size:13px;" cellspacing="0">

<?php 

foreach($ssr as $row3)
?>
<tr class="tr-bg">
<td style="text-align:right"><strong>Resumen de altertas</td>
<td colspan='3'>
<ol>
<?=$planif_text1?>
<?=$fecha_ul_p2?>
<?=$fecha_mama3?>
<?=$ant_pap_re_text4?>
<?=$sexual_disease?>
<?=$amenorea_tiempo?>

</ol>
</td>
</tr>
<tr class="tr-bg">
<td style="text-align:right"><strong>Ha tenido relaciones sexuales ?</strong></td>
<td>

<?php
if($row->optradio =="Si"){
  $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='optradio1' name='optradio1' value='Si' $checked> Si";

if($row->optradio =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='optradio1' name='optradio1' value='No' $checked> No";
?>
</td>

<td style="text-align:right"><strong>Edad de inicio de la vida sexual activa :</strong></td>
<td>
<?=$row->edad?>
</td>
</tr>



<tr class="tr-bg">
<td style="text-align:right"><strong>Numero de parejas sexuales</strong></td>
<td>
<?=$row->numero?>
</td>

<td style="text-align:right"><strong>Tiene vida sexuale actual ?</strong></td>
<td>
<?php
if($row->sexual =="Si"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual1' name='sexual1' value='Si' $checked> Si";


if($row->sexual =="No"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual1' name='sexual1' value='No' $checked> No";
?>
</td>
</tr>

<tr class="tr-bg">
<td style="text-align:right"><strong>Sexo de la pareja actual</strong></td>
<td>
<?=$row->pareja?>
</td>

<td style="text-align:right"><strong>Como califica su vida sexual ?</strong></td>
<td>
<table class="r-b">
<tr>
<td>
<?php
if($row->califica =="Bueno"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Bueno
</td>
</tr>
<tr>
<td>
";

if($row->califica =="Regular"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Regular</td></tr>
";
?>
</table>
<br/>
<?=$row->califica_text?>
</td>
</tr>




<tr class="tr-bg">
<td style="text-align:right"><strong>Utilizo preservativo en su ultima relacion sexual ?</strong></td>
<td>
<?php
if($row->utilizo =="Si"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='utilizo1' name='utilizo1' value='Si' $checked> Si";

if($row->utilizo =="No"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='utilizo1' name='utilizo1' value='No' $checked> No";
?>
</td>

<td style="text-align:right"><strong>Ha tenido relaciones sexuales con persona de su mismo sexo ?</strong></td>
<td>
<?php
if($row->sexual2 =="Si"){
 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual21' name='sexual21' value='Si' $checked> Si";

if($row->sexual2 =="No"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual21' name='sexual21' value='No' $checked> No";
?>
</td>
</tr>


<tr class="tr-bg">
<td style="text-align:right"><strong>Utilizo algun metodo de planificacion fam ?</strong></td>
<td>
<?php
if($row->planif =="Si"){
	 $checked="checked='checked'";
	 $elcual="<td style='text-align:right'><strong>Cual ?</strong></td><td>$row->planif_text</td>";
} else{
	$checked="";
	 $elcual="<td style='text-align:right'></td><td></td>";
	}
echo "<input type='radio' id='planif1' name='planif1' value='Si' $checked> Si";

if($row->planif =="No"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='planif1' name='planif1' value='No' $checked> No";
?>
</td>

<?php
echo $elcual;
?>

</tr>


<tr class="tr-bg">
<td style="text-align:right"><strong>Quiero embarazarse ?</strong></td>
<td>
<?php
if($row->embara =="Si"){
	 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='embara1' name='embara1' value='Si' $checked> Si";

if($row->embara =="No"){
 $checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='embara1' name='embara1' value='No' $checked> No";
?>
</td>

<td style="text-align:right"><strong>Menarquia ?</strong></td>
<td>
<?=$row->menarquia?> año
</td>

</tr>




<tr class="tr-bg">
<td style="text-align:right"><strong>Fecha de ultima menstruacion (FUM) </strong></td>
<td>
<?=$row->fecha_ul_m?>
</td>

<td style="text-align:right"><strong>Menaopausica</strong></td>
<td>
<?php
if($row->menaop =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='menaop1' name='menaop1' value='Si' $checked> Si";

if($row->menaop =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='menaop1' name='menaop1' value='No' $checked> No";
?>
</td>

</tr>

<tr class="tr-bg">
<td>
<?php 
$campo1 = substr($row->fecha_ovulacion, 0, 18);
$text1 = substr($row->fecha_ovulacion, 18);
?>
<strong><?=$campo1?></strong>  <?=$text1?>
</td>
<td>
<?php 
$campo2 = substr($row->semana_fertil, 0, 13);
$text2 = substr($row->semana_fertil, 13);
?>
<strong><?=$campo2?></strong>  <?=$text2?>

</td>
<td>
<?php 
$campo3 = substr($row->amenorea_text, 0, 15);
$text3 = substr($row->amenorea_text, 15);
?>
<strong><?=$campo3?></strong>  <?=$text3?>

</td>
</tr>



<tr class="tr-bg">
<td style="text-align:right"><strong>Ciclos menstruales</strong></td>
<td>
<table  class="r-b">
<tr>
<?php
if($row->cliclo =="Regulares"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<td><input type='radio'  $checked> Regulares</td>";
echo "</tr><tr>";

if($row->cliclo =="Irregulares"){
$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<td><input type='radio'  $checked> Irregulares</td>";
?>
</tr>
</table>
</td>

<td style="text-align:right"><strong>Desc</strong></td>
<td>
<?=$row->cliclo_text?>
</td>

</tr>


<tr class="tr-bg">
<td style="text-align:right"><strong>Duracion de sangrado menstrual ?</strong></td>
<td>
<?=$row->dura_sang?> día(s)
</td>

<td style="text-align:right"><strong>Cantidad de sangrado menstrual ?</strong></td>
<td>
<table  class="r-b">
<tr><td>
<?php
if($row->cant_sang =="Normal"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
	?>
<input type='radio' <?=$checked?>> Normal
</td></tr>
<tr><td>
<?php
if($row->cant_sang =="Escaso"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
?>
<input type='radio'  <?=$checked?>> Escaso
</td>
</tr>
<tr>
<td>
<?php
if($row->cant_sang =="Abudante"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
	?>
<input type='radio' <?=$checked?>> Abudante
</td>
</tr>
</table>
</td>

</tr>

<tr class="tr-bg">
<td style="text-align:right"><strong>Dismenorrea</strong></td>
<td>
<?php
if($row->dismeno =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='dismeno1' name='dismeno1' value='No' $checked> No";


if($row->dismeno =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='dismeno1' name='dismeno1' value='Si' $checked> Si";
?>
</td>

<td style="text-align:right"><strong>Fecha de ultima PAP</strong></td>
<td>
<table  class="r-b">
<tr>
<td>
<?php
if($row->fecha_ul_pap =="Nunca"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Nunca
</td>
</tr>
<tr><td>
";

if($row->fecha_ul_pap =="Menos de un ano"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Menos de un ano
<td></tr><tr><td>
";

if($row->fecha_ul_pap =="Entre uno a tres anos"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Entre 1 a 3 anos
</td></tr><tr><td>
";


if($row->fecha_ul_pap =="Mas de tres anos"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Mas de tres anos
";
?>
</td>
</tr>
</table>
</td>

</tr>

<tr class="tr-bg">
<td style="text-align:right"><strong>Antecedentes de PAP Resultados Alterados o Anormales</strong></td>
<td>
<?php
if($row->ant_pap_re =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='No' $checked> No";

if($row->ant_pap_re =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='Si' $checked> Si";
?>
</td>

<td style="text-align:right"><strong>Desc:</strong></td>
<td>
<?=$row->ant_pap_re_text?>
</td>

</tr>



<tr class="tr-bg">
<td style="text-align:right"><strong>Se realiza autoexamen mamario ?</strong></td>
<td>
<?php
if($row->realiza_auto =="Si"){
	$checked="checked='checked'";
	$desc="$row->realiza_auto_text";
} else{
	$checked="";
	$desc="";
	}
echo "<input type='radio' id='realiza_auto1' name='realiza_auto1' value='Si' $checked> Si";

if($row->realiza_auto =="No"){
	$checked="checked='checked'";
	$desc="";
} else{
	$checked="";
	$desc="$row->realiza_auto_text";
	}
echo "<input type='radio' id='realiza_auto1' name='realiza_auto1' value='No' $checked> No";
?>
</td>

<td style="text-align:right"><strong>Desc:</strong></td>
<td>
<?=$desc?>
</td>

</tr>





<tr class="tr-bg">
<td style="text-align:right"><strong>Fecha de la ultima mamagrafia</strong></td>
<td colspan="3">
<table  class="r-b">
<tr>
<td>
<?php
if($row->fecha_ul_mama =="Nunca"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Nunca
</td>
</tr>
<tr><td>
";

if($row->fecha_ul_mama =="Menos de un ano"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Menos de un ano
</td>
</tr>
<tr><td>
";

if($row->fecha_ul_mama =="Entre un y tres anos"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio'  $checked> Entre un y tres anos
</td>
</tr>
<tr><td>
";

if($row->fecha_ul_mama =="Mas de tres anos"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' $checked> Mas de tres anos
</td>
</tr>
";
?>
</table>
</td>

</tr>

<tr class="tr-bg">
<td style="text-align:right" colspan="2">
<strong>P</strong> = <?=$row->p?> <strong>A</strong> = <?=$row->a?>  <strong>C</strong> = <?=$row->c?>  <strong>E</strong> = <?=$row->e?>
</td>
<td style="text-align:right"><strong>Total de GESTACIONES</strong> </td>
<td> <?=$row->totalGest?></td>
</tr>




<tr class="tr-bg">
<td style="text-align:right">
<strong>En case de nuligesta, ha sido por </strong>
</td>
<td colspan="3">
<table  class="r-b">
<tr>
<td>
<?php
if($row->nuligesta =="No ha iniciado vida sexual activa"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
?>
<input type='radio'  <?=$checked?>> No ha iniciado vida sexual activa
</td>
</tr>
<tr>
<td>
<?php
if($row->nuligesta =="Propia eleccion"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
	?>
<input type='radio' <?=$checked?>> Propia eleccion 
</td>
</tr>
<tr>
<td>
<?php
if($row->nuligesta =="No ha propido embarazarse"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
	?>
<input type='radio' <?=$checked?>> No ha propido embarazarse
</td>
</tr>
<tr>
<td>
<?php
if($row->nuligesta =="No ha propido conservar los embarazos"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
?><input type='radio' <?=$checked?>> No ha propido conservar los embarazos
</td>
</tr>
</table>
</td>

</tr>


<tr class="tr-bg">
<td style="text-align:right"><strong>Complicaciones Partos/Cesarea ?</strong></td>
<td>
<?php
if($row->complica =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica1' name='complica1' value='No' $checked> No";

if($row->complica =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica1' name='complica1' value='Si' $checked> Si";
?>
</td>

<td style="text-align:right"><strong>Desc:</strong></td>
<td>
<?=$row->complica_text?>
</td>

</tr>


<tr class="tr-bg">
<td style="text-align:right"><strong>Complicaciones durante embarazos</strong></td>
<td>

<?php
if($row->complica_dur =="No"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica_dur1' name='complica_dur1' value='No' $checked> No";

if($row->complica_dur =="Si"){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica_dur1' name='complica_dur1' value='Si' $checked> Si";
?>

</td>

<td style="text-align:right"><strong>Desc:</strong></td>
<td>
<?=$row->complica_dur_text?>
</td>

</tr>







<tr class="tr-bg">
<td style="text-align:right"><strong>Infeccion de transmision sexual</strong></td>
<td colspan="2">
<table  class="r-b">
<tr><td>
<?php
if($row->infeccion1 ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
	?>
<input type='checkbox'   <?=$checked?>> Sifilis
</td></tr>
<tr><td>
<?php
if($row->infeccion2 ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}
?>

<input type='checkbox'  <?=$checked?>> Gonorrea 
</td></tr>
<tr><td>
<?php
if($row->infeccion3 ==0){
	$checked="";
} else{
	$checked="checked='checked'";
	}

?>
<input type='checkbox' <?=$checked?>> Clamidia
</td></tr>
</table>
</td>

<td>
<strong>Otro</strong><br/>
<?=$row->otro_infeccion1?>
</td>

</tr>
</table>