
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EMERGENCIA GENERAL</title>

<!-- Bootstrap core CSS -->
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<style>
@media (min-width: 992px){
.modal-lg
{ width: auto;	
}
}
.modal-lg
{
width: 1200px;
height: 900px; /* control height here */
}   


</style>
<script>
var interval;
// Add event listener offline to detect network loss.
window.addEventListener("offline", function(e) {
    showPopForOfflineConnection();
});

// Add event listener online to detect network recovery.
window.addEventListener("online", function(e) {
    hidePopAfterOnlineInternetConnection();
});

function hidePopAfterOnlineInternetConnection(){
	$('#myModalConnection').modal('hide');
	$('#myModalConnectionBack').modal({
	backdrop: 'static',
	keyboard: false
	})

    // Set a timeout to hide the element again
  var second = $('#time').text();
if(second <= 0){
window.location.href="<?php echo base_url(); ?>/login/admin_logout";
} else{
	clearInterval(interval);
  setTimeout(function(){
        $("#myModalConnectionBack").modal('hide');
    }, 2000);
 
}
	
		
}

function showPopForOfflineConnection(){
	
$('#myModalConnection').modal({
backdrop: 'static',
keyboard: false
})
TimeDecrement();
}


function TimeDecrement(){
var counter = 60;
interval = setInterval(function() {
    counter--;
    // Display 'counter' wherever you want to display it.
    if (counter <= 0) {
     		clearInterval(interval);
      	$('#timer').html("Vuelve a Loguearse cuanda la conexión se restablesca.");  
        return;
    }else{
    	$('#time').text(counter);
		
      console.log("Timer --> " + counter);
    }
}, 1000);
}

</script>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top im-bg">
<div style="margin-left:3%">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<?php 
if($user_id =="" || $id_emergency =="" || $created_date !=date('Y-m-d') || $worked==1){
$hide_btn="none";

}else{
$hide_btn="";	

}

if($worked==2){
$hide_btn1="none";	
$hide_btn2="";	
}else{
$hide_btn1="";	
$hide_btn2="none";
}



if($areaid==0){
$controller="admin";
$page="appointments";
}
else {
$controller="medico";
$page="";
}

$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient as $row)
if($row->photo=="padron"){
$photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
?>

<a title="Haga un clic para agrandar." data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin_medico/zoom_image/$row->ced1/$row->ced2/$row->ced3")?>">

<?php  echo'<img width="75"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';?>
</a>
<?php
$sexo="";
} else if($row->photo==""){
	$sex = substr($row->sexo, 0, 3);
$sexo="<li><a style='color:#209BD8;' title='$row->sexo'>$sex.</a></li>";
echo '<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$sexo="";
?>
<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin_medico/zoom_image_ad/$patient_id")?>">
<img width="75"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
</a>

<?php

}
?>
</div>
<div id="navbar" class="navbar-collapse collapse">
<?php 
$dato_citas=$this->db->select('nec,fecha_propuesta')->where('id_patient',$row->id_p_a )
->get('rendez_vous')->row_array();
$seguro_medico_name=$this->db->select('title')->where('id_sm',$row->seguro_medico)
->get('seguro_medico')->row('title');
$centro=$this->db->select('name')->where('id_m_c',$centro_id)
->get('medical_centers')->row('name');
?>
<ul class="nav navbar-nav" style="background:white;opacity:0.9;">
<li><a style="color:#209BD8;text-transform:uppercase"><?=$row->nombre;?></a></li>
<?=$sexo?>
<li><a style="color:#209BD8" > <?=getPatientAge($row->date_nacer)?></a></li>
<li class="dropdown">
<a href="#" style="color:#209BD8" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mas <span class="caret"></span></a>
<ul class="dropdown-menu not-me">
<li><a style="color:#209BD8"><?=$row->nacionalidad;?></a></li>
<li><a style="color:#209BD8"><b>CEDULA :</b> <?=$row->cedula;?></a ></li>
<li style><a style="color:#209BD8"><b>ARS :</b> <?=$seguro_medico_name;?></a></li>
</ul>

<li><a style="color:#209BD8;"><?=$centro?></a></li>
<li><a style="color:#B22222;" href="javascript:void(0);" title='Volver' onclick="javascript:history.go(-1);"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>

</li>

</ul>

<ul class="nav navbar-nav navbar-right"  style="margin-right:3%;display:<?=$hide_btn?>">
<li style="display:<?=$hide_btn1?>"><a>  <button id="save1" class="btn btn-md btn-success" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button></a></li>
<li style="display:"><a><button id="save2"  class="btn btn-md btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i> Guardar / Alta Med. </button></a></li>

</ul>
</div>
<span class="alert alert-danger required-menu" style="margin-left:35%;margin-top:-4%;position:absolute;display:none;opacity:0.9">! Tiene campos requeridos en menú <strong id="menu-name-req"></strong> !</span>
</div>
</nav>
<?php
function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}

?>
<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<h4>Parece que su conexión a Internet está fuera de línea.</h4>
</div>
<div class="alert alert-warning text-center">
<i>
<span id="timer">
    <span id="time">60</span> segundos      
  </span>
 </i>
 </div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="myModalConnectionBack" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-success text-center">
<h4>Esta connectado.</h4>
</div>
</div>
</div>
</div>
</div>