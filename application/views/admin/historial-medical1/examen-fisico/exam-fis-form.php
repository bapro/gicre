<style>

.box-tooltip2 {
    color: black;
   background:white;
   border-radius:20px;
   padding:6px;
  border: 1px solid red;
   z-index:100000
}

.pagination2 {
    display: inline-block;
}
</style>
<span id="top_exam"></span>

<?php
$area=$this->db->select('area')->where('id_user',$user_id)->get('users')->row('area');
if($area==51){
	$displayot='';
	$displayother='style="display:none"';
}else{
	$displayot='style="display:none"';
	$displayother='';	
}
?>
 <div  class="col-md-12" <?=$displayot?> >
<?php
$sql ="SELECT * FROM h_c_examen_fis_otorrino where historial_id=$historial_id ORDER BY 	idot ASC";
$atendido = $this->db->query($sql);
$i=1;
?>
<h4  class="h4 his_med_title">Examen Fisico Otorrino <i><?=$atendido->num_rows()?> registros</i></h4>

<?php 
if($atendido->num_rows() > 0){

 foreach($atendido->result() as $row)
{
$user_c32t=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c33t=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="pagination">

<a title="Creado por :<?=$user_c32t?> (<?=$inserted_time?>) &#013 Modificado por <?=$user_c33t?> (<?=$updated_time?>) " data-toggle="modal" data-target="#ver_ex_ot" href="<?php echo base_url("admin_medico/show_exam_ot_by_id/$row->idot/$historial_id/$user_id/$row->id_sig")?>">
<?php echo $i; $i++;  ?>
</a></div>
<?php
}

}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>
<hr class="prenatal-separator"/>
<table  class="table"  cellspacing="0" style="width:100%;">
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Oido Izquerdo</label>
<div class="col-md-9">
<textarea class="form-control" id="oido1"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Oido Derecho</label>
<div class="col-md-9">
<textarea class="form-control" id="oido2"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Nariz</label>
<div class="col-md-9">
<textarea class="form-control" id="nariz"  ></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Boca</label>
<div class="col-md-9">
<textarea class="form-control" id="boca"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Cuello</label>
<div class="col-md-9">
<select class="form-control select2" id="otorrino-cuello1" style="width:100%">
<option value="">Ningúno</option>

</select>
<textarea class="form-control" id="otorrino-cuello2"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Observaciones</label>
<div class="col-md-9">
<textarea class="form-control" id="observaciones-ot"  ></textarea>
</div>

</div>
</td>
</tr>



</table>


</div>







<div class="col-md-12" >
<h4 class="h4 his_med_title" <?=$displayother?>>Examen fisico <b style='font-size:13px'><?=$examenFisicoCount?> registro(s)</b></h4>
<?php 
$i = 1;
if ($examenFisicoCount > 0)
{
//<i class='fa fa-warning' style='color:red;'></i>

 foreach($examenFisico as $row)
{

$user_c20=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c21=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	


 $get_number_only = preg_replace('/\D/', '', $edad);

 
 $count_number= strlen($get_number_only);

if(($count_number==3) && (strpos($edad, 'día') == false) && (strpos($edad, 'mes') == false)){
 $echo_fr=  "adulto";
}
else{
$edad1 = substr($edad, 0, 2);


 if ((strpos($edad, 'día') == true) && (strpos($edad, 'mes') == false) ) {
//get first caracter
$echo_fr='recien nacido (0-6 semanas)';


}



 else if((strpos($edad, 'mes') == true)&&(strpos($edad, 'día') == true)){
        
        
    if($edad1 ==1) {
    $echo_fr='recien nacido (0-6 semanas)';
    
    }
    
    if($edad1 >1 && $edad1 <=11){
    $echo_fr='infante (7 semanas -1 año)';

    }
    }

else if(strpos($edad, 'mes') == true) 
{
//get first caracter
$edad = substr($edad, 0, 2);

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
	
//tension arterial

//--sistol--
if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (70 <= $row->ta && $row->ta <= 100){
		$sis_anorm="";$alert="";
	}
	else{
		$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}

 else if ($echo_fr=='infante (7 semanas -1 año)'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (84 <= $row->ta && $row->ta <= 106){
	$sis_anorm="";$alert="";
	}
	else{
	$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}


 else if ($echo_fr=='lactante mayor'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (90 <= $row->ta && $row->ta <= 106){
	$sis_anorm="";$alert="";
	}
	else{
	$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}


 else if ($echo_fr=='pre-escolar'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (99 <= $row->ta && $row->ta <= 112){
	$sis_anorm="";$alert="";
	}
	else{
		$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='escolar'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (104 <= $row->ta && $row->ta <= 124){
	$sis_anorm="";$alert="";
	}
	else{
		$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='adolescente'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (118 <= $row->ta && $row->ta <= 132){
	$sis_anorm="";$alert="";
	}
	else{
		$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='adulto'){
	
if($row->ta =="") {
$sis_anorm="";$alert="";	
}
else if (110 <= $row->ta && $row->ta <= 140){
	$sis_anorm="";$alert="";
	}
	else{
		$sis_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (sistol) : $row->ta (anormal) </li>";
     $alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}
	
//---------------------------------------------------diastol--


if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (50 <= $row->hg && $row->hg <= 68){
		$dia_anorm="";$alert="";
	}
	else{
	$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}


else if ($echo_fr=='infante (7 semanas -1 año)'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (56 <= $row->hg && $row->hg <= 70){
	$dia_anorm="";$alert="";
	}
	else{
$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}


 else if ($echo_fr=='lactante mayor'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (58 <= $row->hg && $row->hg <= 70){
	$dia_anorm="";$alert="";
	}
	else{
$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}


 else if ($echo_fr=='pre-escolar'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (64 <= $row->hg && $row->hg <= 70){
	$dia_anorm="";$alert="";
	}
	else{
	$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='escolar'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (64 <= $row->hg && $row->hg <= 86){
	$dia_anorm="";$alert="";
	}
	else{
$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='adolescente'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (70 <= $row->hg && $row->hg <= 82){
	$dia_anorm="";$alert="";
	}
	else{
$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}



 else if ($echo_fr=='adulto'){
	
if($row->hg =="") {
$dia_anorm="";$alert="";	
}
else if (70 <= $row->hg && $row->hg <= 90){
	$dia_anorm="";$alert="";
	}
	else{
	$dia_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Tens. A (diastol) : $row->hg (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}	
}	
	
//check frecuencia respiratorio


if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->fr =="") {
$fr_anorm="";$alert="";	
}
else if (40 <= $row->fr && $row->fr <= 45){
	$fr_anorm="";$alert="";
	}
	else{
$fr_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia respiratorio : $row->fr (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}


else if($echo_fr=='infante (7 semanas -1 año)' || $echo_fr=='lactante mayor' || $echo_fr=='pre-escolar'){
if($row->fr =="") {
$fr_anorm="";$alert="";	
}
else if (20 <= $row->fr && $row->fr <= 30){
	$fr_anorm="";$alert="";
	}
	else{
$fr_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia respiratorio : $row->fr (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}



else if($echo_fr=='escolar' || $echo_fr=='adolescente' || $echo_fr=='adulto'){
if($row->fr =="") {
	$fr_anorm="";$alert="";	
}
else if (12 <= $row->fr && $row->fr <= 20){
		$fr_anorm="";$alert="";
	}
	else{
	$fr_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia respiratorio : $row->fr (anormal) </li>";
$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}





	
//check frecuencia cardiaca	

if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (120 <= $row->fc && $row->fc <= 140){
	$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}



else if($echo_fr=='infante (7 semanas -1 año)'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (100 <= $row->fc && $row->fc <= 130){
	$fc_anorm="";$alert="";
	}
	else{
		$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}


else if($echo_fr=='lactante mayor'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (100 <= $row->fc && $row->fc <= 120){
		$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}




else if($echo_fr=='pre-escolar'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (80 <= $row->fc && $row->fc <= 120){
		$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}




else if($echo_fr=='escolar' ){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (80 <= $row->fc && $row->fc <= 100){
	$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}




else if($echo_fr=='adolescente'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (70 <= $row->fc && $row->fc <= 80){
	$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}





else if($echo_fr=='adulto'){
if($row->fc =="") {
$fc_anorm="";$alert="";	
}
else if (60 <= $row->fc && $row->fc <= 80){
	$fc_anorm="";$alert="";
	}
	else{
	$fc_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia cardiaca : $row->fc (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}	
	
//check frecuencia temperatura

if($echo_fr=='recien nacido (0-6 semanas)'){
if($row->tempo =="") {
$ft_anorm="";$alert="";	
}
else if ($row->tempo == 38){
	$ft_anorm="";$alert="";
	}
	else{
		$ft_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia temperatura : $row->tempo (anormal) </li>";
		$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}



else if($echo_fr=='infante (7 semanas -1 año)' || $echo_fr=='lactante mayor' || $echo_fr=='pre-escolar'){
if($row->tempo =="") {
$ft_anorm="";$alert="";	
}
else if (37.5 <= $row->tempo && $row->tempo <= 37.8){
		$ft_anorm="";$alert="";
	}
	else{
	$ft_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia temperatura : $row->tempo (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}


else if($echo_fr=='escolar'){
if($row->tempo =="") {
$ft_anorm="";$alert="";	
}
else if (37 <= $row->tempo && $row->tempo <= 37.5){
	$ft_anorm="";$alert="";
	}
	else{
		$ft_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia temperatura : $row->tempo (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}



else if($echo_fr=='adolescente'){
if($row->tempo =="") {
$ft_anorm="";$alert="";	
}
else if ($row->tempo == 37){
		$ft_anorm="";$alert="";
	}
	else{
		$ft_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia temperatura : $row->tempo (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}



else if($echo_fr=='adulto'){
if($row->tempo =="") {
$ft_anorm="";$alert="";	
}
else if (36.2 <= $row->tempo && $row->tempo <= 37.2){
	$ft_anorm="";$alert="";
	}
	else{
		$ft_anorm="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecuencia temperatura : $row->tempo (anormal) </li>";
	$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
}


if($row->glicemia ==0) {
$alert="";	
$glicemia="";
}
else if (70 <= $row->glicemia && $row->glicemia <= 100){

		$glicemia="";
		$alert="";

	}
	else{
		$glicemia="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> glicemia : $row->glicemia</li>";
		$alert="<i class='fa fa-warning'  style='color:red;'></i>";
	}
?>

<div class="pagination" <?=$displayother?>>
<a  data-toggle="modal" data-target="#ver_exafisico" href="<?php echo base_url("admin_medico/showExamenById/$row->id_sig/$historial_id/$user_id")?>">
<?php echo $i; $i++;  ?> <?php echo $alert ?>  
</a>

<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro</h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c20?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c21?>, <?=$updated_time?></li>
<?=$dia_anorm?>
<?=$sis_anorm?>
<?=$fr_anorm?>
<?=$fc_anorm?>
<?=$ft_anorm?>
<?=$glicemia?>
</ul>
</div>
</div>
<?php
}

	


}
?>
</div>



<?php $this->load->view('admin/historial-medical1/examen-fisico/signo_empty');?>
<!--col m12 end-->
<div class="col-md-12" <?=$displayother?>>
<hr class="title-highline-top"/>
<div class="col-md-6">
<h5>Examen de .......</h5>
</div>
<div class="col-md-6">
<h5>Examen de Ambas Mamas</h5>
</div>
<br/><br/>
</div>
<div class="col-md-12" <?=$displayother?>>
<div class="row" style="border-top:1px solid;border-color:rgb(206,206,206)" >
<br/>
<div class="col-md-6"  >

<div class="form-group">
<label class="control-label col-md-4" >Neurologico </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="neuro_s" >
<option value="">Ningúno</option>
<?php 

foreach($neuro as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="neuro_text"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" >Cabeza </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="cabeza" >
<option value="">Ningúno</option>
<?php 

foreach($cabeza as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cabeza_text"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" >Cuello </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="cuello" >
<option value="">Ningúno</option>
<?php 

foreach($cuello as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cuello_text"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" > Abdomen Inspección:</label>
<div class="col-md-8">
<label>Forma</label>
<select class="form-control select2" id="abd_insp" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($forma as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Auscultación</label>
<select class="form-control select2" id="ausc" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Percusión</label>
<select class="form-control select2" id="perc" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Palpación</label>
<select class="form-control select2" id="palpa" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<br/><br/><br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4" >Extremidades Superiores </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="ext_sup" >
<option value="">Ningúno</option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_sup_text"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
</div>
<!----------------------------------------->
<div class="col-md-6" >
<div class="row"  >

<div class="col-md-6"  style="border-right:1px solid;border-color:rgb(206,206,206)">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
</span> <label> Cuad. Inf. Externo</label>

<input  type="text" id="cuad_inf_ext1" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Izquierda : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select2" id="mama_izq1" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($mama as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>


</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  type="text" class="form-control" id="cuad_sup_ext1" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext11" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input id="region_retro1" class="form-control"  type="text"/>
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon1" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select2" id="region_ax1"  style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($axilar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>

</div>


</div>

<div class="col-md-6">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
 </span> <label> Cuad. Sup. Externo</label>

<input  type="text" id="cuad_inf_ext2" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Derecha : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select2" id="mama_izq2"  style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($mama as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>


</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  type="text" class="form-control" id="cuad_sup_ext2" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext22" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input  type="text" class="form-control" id="region_retro2" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon2"  />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select2" id="region_ax2"  style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($axilar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>

</div> 
</div>
</div>
<br/>

<div class="form-group">
<label class="control-label col-md-3" >Torax: Corazón y pulmones:</label>
<div class="form-group col-md-7">
<select  class="form-control select2" id="torax" >
<option value="">Ningúno</option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="torax_text"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-3" >Extremidades Inferiores</label>
<div class="form-group col-md-7">
<select  class="form-control select2" id="ext_inf" >
<option value="">Ningúno</option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_inft"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>-->
</div>
</div>

</div>
</div>

<div class="col-md-12" <?=$displayother?>>
<hr class="title-highline-top"/>
<table>
<th>Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual</th>
</table>
</div>
<div class="col-md-12" <?=$displayother?>>
<div class="form-group">
<label class="control-label col-md-4" >Especuloscopia </label>
<div class="form-group col-md-8">
<input  type="radio" name="especuloscopia" value="" checked hidden>
Si <input  type="radio" name="especuloscopia" value="Si"> &nbsp; No&nbsp;<input type="radio" name="especuloscopia" value="No">&nbsp;&nbsp;&nbsp;&nbsp;
<label style="font-size:14px" class="control-label"> Tacto Bimanual</label> Si <input type="radio" name="tacto_bima"  value="Si"> &nbsp; No <input type="radio" name="tacto_bima"  value="No"> 
<input  type="radio" name="tacto_bima" value="" checked hidden>
</div>

</div>
</div>
<div class="col-md-12" <?=$displayother?>>
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Cervix<!-- <span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="cervix_checkbox" >--></label>
<div class="form-group col-md-8">
<select  class="form-control select2"  id="cervix" >
<option value="">Ningúno</option>
<?php 

foreach($cervix as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cervix_text"></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Utero </label>
<div class="form-group col-md-8">

<textarea class="form-control" cols="20" id="utero_text"></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Anexos 
<span style="font-size:13px">
&nbsp; Derecho
 </span>
<span style="font-size:13px">
&nbsp;Izquerdo
 </span>
</label>
<div class="form-group col-md-8">
<br/>
<input class="form-control" type="text" id="anexo_derecho_text" />
<input class="form-control" type="text" id="anexo_iz_text" />
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Inspeccion Vulvar <span style="font-size:13px"><br/>
<!--&nbsp;Sin Hallazgos</span> <input type="checkbox" id="inspection_vulval_checkbox" >--></label>
<div class="form-group col-md-8">
<select  class="form-control select2"  id="inspection_vulval" >
<option value="">Ningúno</option>
<?php 

foreach($inspeccion_vulvar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="inspection_vulval_text"></textarea>
</div>

</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Tacto rectal </label>

<div class="form-group col-md-8">
<select  class="form-control select2" id="rectal" >
<option value="">Ningúno</option>
<?php 

foreach($rectal as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="rectal_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital masculino </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="genitalm" >
<option value="">Ningúno</option>
<?php 

foreach($genitalm as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalm_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital femenino </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="genitalf" >
<option value="">Ningúno</option>
<?php 

foreach($genitalf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalf_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Tacto vaginal </label>
<div class="form-group col-md-8">
<select  class="form-control select2" id="vagina" >
<option value="">Ningúno</option>
<?php 

foreach($vagina as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="vagina_text"></textarea>
</div>
</div>
</div>
</div>
<div class="col-md-12 col-md-offset-2" <?=$displayother?>>

<a  href="#top_exam" title="Ve arriba" style="cursor:pointer"><i class="fa fa-arrow-up" aria-hidden="true" style="font-size:24px"></i></a>
</div>

