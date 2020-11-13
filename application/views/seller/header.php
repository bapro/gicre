<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
  <script src="<?=base_url();?>assets/js/passwordscheck.js"></script> 
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


</head>
<!-- *** welcome message modal box *** -->
 

<style>

td,th{text-align:left}

</style>


<header>


<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" style=" background:linear-gradient(to top, white, #E0E5E6">

<div class="container" >
<div class="navbar-header">

<a class="navbar-brand home" href="<?php echo site_url("vendedor");?>">

<span style="position:absolute;z-index:3000px;top:-2px"><img src="<?=base_url();?>assets/img/gicle1.png" style="width:120px" alt="logo" class="hidden-xs hidden-sm" ></span>
<img style="width:90px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span>
</a>
<div class="navbar-buttons">
<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
</div>
</div>

<div class="navbar-collapse collapse" id="navigation">
<ul class="nav navbar-nav" style="margin-left:10%"  >

<li><a href="<?php echo site_url("vendedor");?>">página de inicio</a></li>

</ul>
<ul class="nav navbar-nav navbar-right"  >
<li class="dropdown"  >
  <a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $this->session->userdata['vendedor_name']; ?> <?= $this->session->userdata['vendedor_perfil']; ?>
 <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >
<li><a data-toggle="modal" href="<?php echo site_url("vendedor/changePassw/$id_user");?>"  data-target="#changecount"  ><i class="fa fa-eye"></i> Mi Cuenta</a></li>
<li><a href="<?php echo site_url('login/vendedor_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
 </ul>

</li>

</ul>

</div>

</div>


</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>


 <hr id="hr_ad"/>

<div class="modal fade" id="changecount" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>


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
