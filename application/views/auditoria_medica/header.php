<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.0/css/bootstrap-select.min.css" />-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
 
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
		
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
th{text-align:center}
td{font-size:17px}

label{color:black}
	img.img-responsive{max-width : 18%;
heigth: auto;
display: block;}

a.active   
{
    outline: 0;
}
.req{color:red}
</style>
    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
 
<?php

$id_usr=($this->session->userdata['auditoria_id']);
$name=($this->session->userdata['auditoria_name']);
$perfil=($this->session->userdata['auditoria_perfil']);
$user_ars=$this->db->select('user_ars')->where('id_user',$id_usr)->get('users')->row('user_ars');
$seguro=$this->db->select('title')->where('id_sm',$user_ars)->get('seguro_medico')->row('title');

?>

<header>
<!--
<div class="b4" id="top">
<div class="container">
<div class="row">

<div class="col-xs-12">
<div class="social" >
<a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
<a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
<a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
<a href="#" class="external youtube" data-animate-hover="pulse"><i class="fa fa-youtube"></i></a>
<a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
</div>

<form class="login1" role="search" style="float:right" >
<div class="input-group add-on">
<input class="form-control" placeholder="Buscar" name="srch-term" id="srch-term" type="text">
<div class="input-group-btn">
<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
</div>
</div>
</form> 

  <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>


</div>
</div>
</div>
</div>-->

<!-- *** TOP END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

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
<div class="navbar-collapse collapse" id="navigation">

<ul class="nav navbar-nav navbar-right" >




<li class="dropdown" style="font-size:13px" >

  <a title="<?= $name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $name; ?> : <?= $perfil; ?> : <?=$seguro; ?> 



   <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >

<li><a href="<?php echo site_url('login/auditoria_medica_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
  
	
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


<body>
 <hr id="hr_ad"/>
<div class="container" >
<div class="row">
<div class="col-md-12 hide-me">
<a class="btn btn-primary btn-xs" title="<- atras" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 </div>

</div>
 <hr id="hr_ad" class="hide-me"/>
<a name="anchor"> </a>


