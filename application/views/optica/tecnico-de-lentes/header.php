<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

<style>
th{text-align:center}
td{font-size:17px}
li{font-size:10px;}
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
$id_usr=$this->session->userdata['tec_lent_id'];
$name=$this->session->userdata['tec_lent_name'];
$perfil=$this->session->userdata['tec_lent_perfil'];
$id_tecnico_lentes=$this->db->select('id_tecnico_lentes')->where('id_user',$id_usr)->get('user_tecnico_lentes')->row('id_tecnico_lentes');

$query_entregado=$this->db->select('id')->where('enviado',2)->get('laboratory_lentes');
$query_propuesto=$this->db->select('id')->where('enviado',1)->get('laboratory_lentes');
$query_lentes=$this->db->select('id')->where('enviado',0)->get('laboratory_lentes');

$labo= $this->db->select('nombre_comercial')->join('user_tecnico_lentes', 'labo_lentes.id = user_tecnico_lentes.id_tecnico_lentes')->where('id_user',$id_usr)->get('labo_lentes')->row('nombre_comercial');
 
?>

<header style='border-bottom:1px solid #E6E6FA'>

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" style=" background:linear-gradient(to top, white, #E0E5E6);">

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
<div class="navbar-collapse collapse" id="navigation" >

<ul class="nav navbar-nav" style="margin-left:10%"  >
<li class="dropdown">
<li><a href="<?php echo site_url('tecLente/index');?>">Laboratorio De Lentes (<?=$query_lentes->num_rows()?>) <span id='new-entry'></span></a></li>
<li><a href="<?php echo site_url('tecLente/lentes_propuestos');?>">Lentes Propuestos A Realizar (<?=$query_propuesto->num_rows()?>)</a></li>
<li><a href="<?php echo site_url('tecLente/lentes_entregados');?>">Lentes Entregados (<?=$query_entregado->num_rows()?>)</a></li>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown" style="font-size:10px" >

  <a title="<?= $name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $perfil; ?> : <?=$name; ?> 



   <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >
<li><a href="<?php echo site_url('tecLente/account');?>"><i class='fa fa-user'></i> MI CUENTA</a></li>
<li><a ><i class="glyphicon glyphicon-sunglasses" ></i> <?=$labo?></a></li>
<li><a href="<?php echo site_url('login/tec_lentes_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
  
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

<script>
setInterval(function(){
  $('#new-entry').load("<?php echo base_url('tecLente/newEntry')?>").fadeIn("slow");
 }, 1000);
</script>

