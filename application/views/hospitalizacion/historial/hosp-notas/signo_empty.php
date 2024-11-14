<?php

$edad=getPatientAge($edad);
//FRECUENCIA RESPIRATORIA

if (strpos($edad, 'día(s)') == true ) {
//get first caracter
$edad = substr($edad, 0, 2);

if($edad ==1  || $edad ==0){
$echo_fr='recien nacido (0-6 semanas)';
}

if($edad >1 && $edad <=11){
$echo_fr='infante (7 semanas -1 año)';
}


}
else if(strpos($edad, 'mes(es)') == true) 
{
//get first caracter
$edad = substr($edad, 0, 2);

if($edad ==1 || $edad ==0){
$echo_fr='recien nacido (0-6 semanas)';

}

if($edad >1 && $edad <=11){
$echo_fr='infante (7 semanas -1 año)';

}
	
}
else {
$edad1 = substr($edad, 0, 2);

switch($edad1) {
    case ($edad1 >= 1 && $edad1 <= 2): //the range from range of 0-20
       $echo_fr= "lactante mayor";
   break;
   case ($edad1 >= 2 && $edad1 <= 6):
   
      $echo_fr=  "pre-escolar";
   break;
   case ($edad1 >= 6 && $edad1 <= 13):

      $echo_fr=  "escolar";
   break;
   case ($edad1 >= 13 && $edad1 <= 16):

      $echo_fr=  "adolescente";
   break;
   
   case ($edad1 > 16):
      $echo_fr=  "adulto";
 
}

	
	
}
if($echo_fr=="recien nacido (0-6 semanas)"){
	$fr_resp_rank='40-45';
	$fr_card_rank='120-140';
	$fr_tempo_rank='38';
	$sistol='70-100';
	$diastol='50-68';
}
else if($echo_fr=="infante (7 semanas -1 año)"){
	$fr_resp_rank='20-30';
	$fr_card_rank='100-130';
	$fr_tempo_rank='37.5-37.8';
	$sistol='84-106';
	$diastol='56-70';	
}
else if($echo_fr=="lactante mayor"){
	$fr_resp_rank='20-30';
	$fr_card_rank='100-120';
	$fr_tempo_rank='37.5-37.8';	
	$sistol='90-106';
	$diastol='58-70';	
}
else if($echo_fr=="pre-escolar"){
	$fr_resp_rank='20-30';
	$fr_card_rank='80-120';
	$fr_tempo_rank='37.5-37.8';
	$sistol='99-112';
	$diastol='64-70';	
}
else if($echo_fr=="escolar"){
	$fr_resp_rank='12-20';
	$fr_card_rank='80-100';
	$fr_tempo_rank='37-37.5';
    $sistol='104-124';
	$diastol='64-86';	
}
else if($echo_fr=="adolescente"){
	$fr_resp_rank='12-20';
	$fr_card_rank='70-80';
	$fr_tempo_rank='37';
    $sistol='118-132';
	$diastol='70-82';	
} else{
	$fr_resp_rank='12-20';
	$fr_card_rank='60-80';
	$fr_tempo_rank='36.2-37.2';
    $sistol='110-140'; 
	$diastol='70-90';	
}
?>

<span class='echo_fr' style='display:none'><?=$echo_fr?></span>
<p><strong>Tablas de signos vitales por edad (Paciente <?=$echo_fr;?>)</strong></p>
<hr class="title-highline-top"/>
<div class="col-md-3">
<table class="table table-fr table-bordered" > 

<tr>
<td colspan='4' align='center' style='background:#a9dfbf;text-align:center'><label style="font-size:12px">TENSION ARTERIAL</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Sistolica (<?=$sistol?>)</td>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Diastolica (<?=$diastol?>)</td>
</tr>
<tr>
<td style='border-color:#a9dfbf;' class='fr-ta-result'>
</td>
<td style='border-color:#a9dfbf;'>
<i style='color:green;display:none' class="fa fa-check check-ta"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-ta"> anormal</i>
</td>
<td style='border-color:#a9dfbf' class='fr-tad-result'>
</td>
<td style='border-color:#a9dfbf'>
<i style='color:green;display:none' class="fa fa-check check-tad"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-tad"> anormal</i>
</td>
</tr>
</table>

<p class='glicemia'></p>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >

<tr>
<td colspan='2' style='background:#e3acb7;text-align:center'><label style="font-size:12px">FRECUENCIA RESPIRATORIA</label></td>
</tr>
<tr>

<td colspan='2' style='border-color:#e3acb7;text-align:center;font-size:12px'>Rango (<?=$fr_resp_rank?>)</td>
</tr>

<tr>
<td class='fr-resp-result' style='border-color:#e3acb7;text-align:center'></td>
<td  style='border-color:#e3acb7;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-f-r"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-f-r"> anormal</i></td>
</tr>
</table>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >
<tr>
<td colspan='2' style='background:#ac98f8;text-align:center'><label style="font-size:12px">FRECUENCIA CARDIACA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#ac98f8;text-align:center;font-size:12px'>Rango (<?=$fr_card_rank?>)</td>

</tr>
<tr>
<td class='fr-card-result' style='border-color:#ac98f8;text-align:center'></td>
<td  style='border-color:#ac98f8;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-f-c"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-f-c"> anormal</i></td>
</tr>
</table>
</div>

<div class="col-md-3">
<table class="table table-bordered" >

<tr>
<td colspan='2' style='background:#bb8fce;text-align:center'><label style="font-size:12px">FFRECUENCIA TEMPERATURA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#bb8fce;text-align:center;font-size:12px'>Rango (<?=$fr_tempo_rank?>)</td>
</tr>

<tr>
<td class='fr-tempo-result' style='border-color:#bb8fce;text-align:center'></td>
<td  style='border-color:#bb8fce ;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-tempo"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-tempo"> anormal</i></td>
</tr>
</table>
</div>

