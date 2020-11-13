<?php


 $get_number_only = preg_replace('/\D/', '', $edad);

 
 $count_number= strlen($get_number_only);

if(($count_number==3) && (strpos($edad, 'día') == false) && (strpos($edad, 'mes') == false)){
 $echo_fr=  "adulto";
}
else{



$edad1 = substr($edad, 0, 2);

if (strpos($edad, 'día') == true ) {
//get first caracter


if($edad1 ==1  || $edad1 ==0){
$echo_fr='recien nacido (0-6 semanas)';
}

if($edad1 >1 && $edad1 <=11){
$echo_fr='infante (7 semanas -1 año)';
}


}
else if(strpos($edad, 'mes') == true) 
{
//get first caracter


if($edad1 ==1 || $edad1 ==0){
$echo_fr='recien nacido (0-6 semanas)';

}

if($edad1 >1 && $edad1 <=11){
$echo_fr='infante (7 semanas -1 año)';

}
	
}
else {


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
foreach($signo_by_id as $row)
?>

<p><strong>Tablas de signos vitales por edad (Paciente <?=$echo_fr;?>)</strong></p>
<hr class="title-highline-top"/>
<div class="col-md-3">
<table class="table table-fr table-bordered" > 

<tr>
<td colspan='4' align='center' style='background:#a9dfbf;text-align:center'><label>TENSION ARTERIAL</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Sistolica (<?=$sistol?>)</td>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Diastolica (<?=$diastol?>)</td>
</tr>
<tr>
<td colspan='2' style='border-color:#a9dfbf;'>
<?=$row->ta?>

<?php  if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->ta =="") {
	
}
else if (70 <= $row->ta && $row->ta <= 100){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}

 else if ($echo_fr=='infante (7 semanas -1 año)'){
	
if($row->ta =="") {
	
}
else if (84 <= $row->ta && $row->ta <= 106){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}


 else if ($echo_fr=='lactante mayor'){
	
if($row->ta =="") {
	
}
else if (90 <= $row->ta && $row->ta <= 106){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}


 else if ($echo_fr=='pre-escolar'){
	
if($row->ta =="") {
	
}
else if (99 <= $row->ta && $row->ta <= 112){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='escolar'){
	
if($row->ta =="") {
	
}
else if (104 <= $row->ta && $row->ta <= 124){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='adolescente'){
	
if($row->ta =="") {
	
}
else if (118 <= $row->ta && $row->ta <= 132){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='adulto'){
	
if($row->ta =="") {
	
}
else if (110 <= $row->ta && $row->ta <= 140){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}
?>
</td>
<td  colspan='2' style='border-color:#a9dfbf' >
<?=$row->hg?>

<?php  if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->hg =="") {
	
}
else if (50 <= $row->hg && $row->hg <= 68){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}


else if ($echo_fr=='infante (7 semanas -1 año)'){
	
if($row->hg =="") {
	
}
else if (56 <= $row->hg && $row->hg <= 70){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}


 else if ($echo_fr=='lactante mayor'){
	
if($row->hg =="") {
	
}
else if (58 <= $row->hg && $row->hg <= 70){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}


 else if ($echo_fr=='pre-escolar'){
	
if($row->hg =="") {
	
}
else if (64 <= $row->hg && $row->hg <= 70){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='escolar'){
	
if($row->hg =="") {
	
}
else if (64 <= $row->hg && $row->hg <= 86){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='adolescente'){
	
if($row->hg =="") {
	
}
else if (70 <= $row->hg && $row->hg <= 82){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}



 else if ($echo_fr=='adulto'){
	
if($row->hg =="") {
	
}
else if (70 <= $row->hg && $row->hg <= 90){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}	
}
?>
</td>
</tr>
</table>

<p class='glicemia'></p>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >

<tr>
<td colspan='2' style='background:#e3acb7;text-align:center'><label>FRECUENCIA RESPIRATORIA</label></td>
</tr>
<tr>

<td colspan='2' style='border-color:#e3acb7;text-align:center'>Rango (<?=$fr_resp_rank?>)</td>
</tr>

<tr>
<td  style='border-color:#e3acb7;text-align:center'>
<?=$row->fr?>

<?php  if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->fr =="") {
	
}
else if (40 <= $row->fr && $row->fr <= 45){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}


else if($echo_fr=='infante (7 semanas -1 año)' || $echo_fr=='lactante mayor' || $echo_fr=='pre-escolar'){
if($row->fr =="") {
	
}
else if (20 <= $row->fr && $row->fr <= 30){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}



else if($echo_fr=='escolar' || $echo_fr=='adolescente' || $echo_fr=='adulto'){
if($row->fr =="") {
	
}
else if (12 <= $row->fr && $row->fr <= 20){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}


?>
</td>

</tr>
</table>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >
<tr>
<td colspan='2' style='background:#ac98f8;text-align:center'><label>FRECUENCIA CARDIACA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#ac98f8;text-align:center'>Rango (<?=$fr_card_rank?>)</td>

</tr>
<tr>
<td style='border-color:#ac98f8;text-align:center'>
<?=$row->fc?>

<?php  if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->fc =="") {
	
}
else if (120 <= $row->fc && $row->fc <= 140){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}



else if($echo_fr=='infante (7 semanas -1 año)'){
if($row->fc =="") {
	
}
else if (100 <= $row->fc && $row->fc <= 130){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}


else if($echo_fr=='lactante mayor'){
if($row->fc =="") {
	
}
else if (100 <= $row->fc && $row->fc <= 120){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}




else if($echo_fr=='pre-escolar'){
if($row->fc =="") {
	
}
else if (80 <= $row->fc && $row->fc <= 120){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}




else if($echo_fr=='escolar' ){
if($row->fc =="") {
	
}
else if (80 <= $row->fc && $row->fc <= 100){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}




else if($echo_fr=='adolescente'){
if($row->fc =="") {
	
}
else if (70 <= $row->fc && $row->fc <= 80){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}





else if($echo_fr=='adulto'){
if($row->fc =="") {
	
}
else if (60 <= $row->fc && $row->fc <= 80){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}
?>
</td>
</tr>
</table>
</div>

<div class="col-md-3">
<table class="table table-bordered" >

<tr>
<td colspan='2' style='background:#bb8fce;text-align:center'><label>FFRECUENCIA TEMPERATURA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#bb8fce;text-align:center'>Rango (<?=$fr_tempo_rank?>)</td>
</tr>

<tr>
<td style='border-color:#ac98f8;text-align:center'>
<?=$row->tempo?>

<?php  if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->tempo =="") {
	
}
else if ($row->tempo == 38){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}



else if($echo_fr=='infante (7 semanas -1 año)' || $echo_fr=='lactante mayor' || $echo_fr=='pre-escolar'){
if($row->tempo =="") {
	
}
else if (37.5 <= $row->tempo && $row->tempo <= 37.8){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}


else if($echo_fr=='escolar'){
if($row->tempo =="") {
	
}
else if (37 <= $row->tempo && $row->tempo <= 37.5){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}



else if($echo_fr=='adolescente'){
if($row->tempo =="") {
	
}
else if ($row->tempo == 37){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}



else if($echo_fr=='adulto'){
if($row->tempo =="") {
	
}
else if (36.2 <= $row->tempo && $row->tempo <= 37.2){
		echo "<i style='color:green;' class='fa fa-check'> normal</i>";
	}
	else{
		echo "<i style='color:red;' class='fa fa-warning'> anormal</i>";
	}
}
?>
</td>
</tr>
</table>
</div>
