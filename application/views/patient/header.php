<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
 <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<style>

</style>

   <script>

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
    setTimeout(function(){
        $("#myModalConnectionBack").modal('hide');
    }, 2000);
	

}

function showPopForOfflineConnection(){
	
$('#myModalConnection').modal({
backdrop: 'static',
keyboard: false
})
$(".spinning-me").fadeIn().html('<span style="font-size:15px;color:#B3AF76" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load text-danger"></span>');

}

</script>
<style>
td {text-align:left}
.img-circle {
     border:inherit 8px #000000;
  -moz-border-radius-topleft: 75px;
  -moz-border-radius-topright:75px;
  -moz-border-radius-bottomleft:75px;
  -moz-border-radius-bottomright:75px;
  -webkit-border-top-left-radius:75px;
  -webkit-border-top-right-radius:75px;
  -webkit-border-bottom-left-radius:75px;
  -webkit-border-bottom-right-radius:75px;
  border-top-left-radius:75px;
  border-top-right-radius:75px;
  border-bottom-left-radius:75px;
  border-bottom-right-radius:75px;
}
</style>

</head>
<!-- *** welcome message modal box *** -->
 
<?php
 if(empty($this->session->userdata['patient_id'])){
     redirect ( base_url("patient/login") );
 }


$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient_admedicall as $row)
if($row->photo=="padron"){
$photo_p=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
 if($photo_p){
$what=1;
$imgpat='<img height="35" width="35" class="img-circle"  src="data:image/jpeg;base64,'. base64_encode($photo_p) .'"  />';	

}else{
$what=2;
$imgpat='<img   height="35" width="35" class="img-circle"  src="'.base_url().'/assets/img/user.png"  />';	

}
} elseif($row->photo==""){
	$what=3;
$imgpat= '<img   height="35" width="35" class="img-circle"  src="'.base_url().'/assets/img/user.png"  />';
}
else{
$what=4;
$imgpat= "<img   height='35' width='35' class='img-circle' src='".base_url()."/assets/img/patients-pictures/$row->photo'  />";

}
?>
<body>
<header>


<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" style=" background:linear-gradient(to top, white, #E0E5E6">

<div class="container" >
<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:-2px"><img src="<?=base_url();?>assets/img/gicle1.png" style="width:160px" alt="logo" class="hidden-xs hidden-sm" ></span>
<img style="width:110px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span>
</a>
<div class="navbar-buttons">
<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
</div>
</div>
<!--/.navbar-header -->
<br/>
<div class="navbar-collapse collapse" id="navigation" style="font-size:10px;">

<ul class="nav navbar-nav" style="margin-left:10%"  >
<li><a href="<?php echo site_url('patient/folders');?>"><i class="fa fa-file" aria-hidden="true"></i> Mis Documentos</a></li>
<li><a href="<?php echo site_url("navigation/patient_found/$nec");?>"><span id='cola_de_solicitud'></span><i class="fa fa-calendar" aria-hidden="true"></i> Solicitar Cita</a></li>
<li><a href="<?php echo site_url('patient/');?>"  ><i class="fa fa-history" aria-hidden="true"></i> Historial Clinica</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="dropdown"  >

  <a title="<?= $this->session->userdata['patient_name']; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
 <?= $imgpat;?> <?= $this->session->userdata['patient_name']; ?> 
 <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >
 <li><a href="<?php echo site_url("patient/myAccount/$nec");?>" ><i class="fa fa-eye"></i> Mi Cuenta</a></li>
<li><a href="<?php echo site_url('login/patient_logout');?>" ><i class="fa fa-sign-out"></i>  cerrar sesión</a></li>
 </ul>

</li>
<li id='new_message' >
</li>



</ul>

</div>

</div>


</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>




<div class="container" >
<a name="anchor"> </a>



<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<h4>Parece que su conexión a Internet está fuera de línea.</h4>
</div>
<div class="alert alert-warning text-center"><i> Intentando reconectar </i><span class="spinning-me" ></span></i></div>
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


