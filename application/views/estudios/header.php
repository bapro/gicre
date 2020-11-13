<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
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
$id_usr=$this->session->userdata['estudios_id'];
$name=$this->session->userdata['estudios_name'];
$perfil=$this->session->userdata['estudios_perfil'];

$id_estudio=$this->db->select('id_estudio')->where('id_user',$id_usr)->get('user_estudios')->row('id_estudio');
$estudios=$this->db->select('nombre_comercial')->where('id',$id_estudio)->get('estudios')->row('nombre_comercial');
?>

<br/>
<header>

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

<ul class="nav navbar-nav navbar-right">


<li class="dropdown">
<!--<li><a href="<?php echo site_url('estudios/index');?>">Buscar Recetas</a></li>-->
<li><a href="<?php echo site_url('estudios/despachadas');?>"> Estudios Despachadas</a></li>
</li>

<li class="dropdown" style="font-size:10px" >

  <a title="<?= $name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $name; ?>  : <?=$estudios; ?> 



   <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >

<li><a href="<?php echo site_url('login/estudios_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar Session</a></li>
  
	
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
    <div class="col-xs-6 col-md-4">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar receta por codigo" id="search-codigo" style='border-radius:7px'/>
	   <div class="input-group-btn">
	   	
          <button class="btn btn-primary" type="button" id='btn-s-cd' style='border-radius:7px'>
            <span class="glyphicon glyphicon-search"><span id='recetas-se'></span></span>
          </button>
        </div>
      </div>
    </div>
  </div>


</div>
 <hr id="hr_ad" class="hide-me"/>


<script>
$('#btn-s-cd').on('click', function(event) {
var code=$("#search-codigo").val();
searchCode(code);
})

function searchCode(code){

$("#recetas-se").fadeIn().html('<span style="font-size:8px;color:white" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(code == "") {
$( "#recetas-se" ).hide();

}else {
window.location ="<?php echo base_url(); ?>estudios/search_code1?code="+code; 	

}
};


</script>
