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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">  

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

.navbar-default.nav-top ul {
  display: inline-block;
  float: right;
}
</style>
    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
 
<?php

$query_user= $this->db->get('users');
$name=$this->session->userdata['admin_name'];
$id_usr=$this->session->userdata['admin_id'];
?>


<header>

<div id="top" style="background:linear-gradient(to top, white, #E0E5E6);border-top:3px solid #38a7bb;border-bottom:none">
<div class="container">
<div class="row">

<div class="col-xs-12">
<nav class="navbar-default nav-top" style="background:none">
  <div class="container-fluid">
    <ul class="nav navbar-top" >
      <li><a href="#" style="color:red"><i class="fa fa-bar-chart" style=""></i> Gráfico</a>

      </li>
     
    </ul>
  </div>
</nav>
</div>
</div>
</div>
</div>

<!-- *** TOP END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" style="border-bottom:1px solid #38a7bb;border-top:1px solid #38a7bb" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" style=" background:linear-gradient(to top, white, #E0E5E6">

<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:-2px"><img  src="<?=base_url();?>assets/img/gicle1.png" style="width:160px" alt="logo" class="hidden-xs hidden-sm" ></span>
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
<div class="navbar-collapse collapse" id="navigation" style="font-size:10px;" >

<ul class="nav navbar-nav" style="margin-left:130px" >

 <?php
 $this->load->view('admin/view_acciones');

 
 ?>


</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="dropdown" >

  <a title="<?= $name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $name; ?> : Admin

 <span class="caret"></span>
  </a>

 <ul class="dropdown-menu" >

 <li><a href="<?php echo site_url('admin/users');?>"> <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?=$query_user->num_rows();?> Usuarios | <span id='connected_users'></span> conectado(s)</a></li>
  <li><a  href="<?php echo base_url('admin/chatBox')?>" ><i class='fa fa-comments' style='font-size:20px'></i> Chatear</a></li>
  <li><a href="<?php echo site_url('login/admin_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
  
	
	</ul>

</li>
<li  id='new_message' ></li>
</ul>
</div>


</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>


<body>

<div class="container" >
<div class="row">
<div class="col-md-12 hide-me">
<br/>
<a class="btn btn-primary btn-xs" title="<- atras" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
<br/> <br/> 
 <div id="new-update"></div>
 
 </div>

</div>

<a name="anchor"> </a>



<script>
 setInterval(function(){
  $('#connected_users').load("<?php echo base_url('admin/current_user_login')?>").fadeIn("slow");
 }, 1000);
setInterval(function(){
  $('#new_message').load("<?php echo base_url('admin/newMessageReceived')?>").fadeIn("slow");
 }, 1000);
 
 
 setInterval(function(){
  $('#new-update').load("<?php echo base_url('admin_medico/show_update/'.$id_usr)?>").fadeIn("slow");
 }, 1000);
</script>