<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/custom.css?rnd=132" rel="stylesheet">
		    <link href="<?=base_url();?>assets/css/autocomplete.css?rnd=133" rel="stylesheet">
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
	
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
.navbar-default ul.navbar-top li {
  float: left;
  font-size: 11px;
}
.navbar-brand {
  margin: -40px;
}
.nav.navbar-top{
	color:red
}


#outer {
  position: fixed;
  left: 50%;        // % of window
}
#inner {
  position: relative;
  left: -50%;         // % of outer (which auto-matches inner width)
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

var second = $('#time').text();
if(second <= 0){
window.location.href="<?php echo base_url(); ?>/login/admin_logout";
} else{
	clearInterval(interval);
//alert("¡La conexión está de vuelta!");
 //tempAlert("¡La conexión está de vuelta!",5000);
 $("#outer").show().delay(4000).fadeOut();
$('#inner').css({"border": "1px solid green","padding": "5px","background": "#D0FA58", "color": "green", "font-size": "200%"}).text("¡La conexión está de vuelta!");
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



function tempAlert(msg,duration)
{
     var el = document.createElement("div");
     el.setAttribute("style","position:absolute;top:6%;left:45%;background-color:#4EB53C;padding:24px;color:white;opacity:0.9");
     el.innerHTML = msg;
     setTimeout(function(){
      el.parentNode.removeChild(el);
     },duration);
     document.body.appendChild(el);
}

//var d = document.getElementById('d');

</script>


</head>
<!-- *** welcome message modal box *** -->
 
<?php

$name=$this->session->userdata['admin_name'];
 if(empty($this->session->userdata['admin_name'])){
redirect('https://www.admedicall.com');	
 }
$id_usr=$this->session->userdata['admin_id'];
$admin_position_centro=$this->session->userdata['admin_position_centro'];
if($admin_position_centro){
	$user_peril = "Administrativo";
	$hide_payment="style='display:none'";
	$hide_top_header="display:none";
	$sqlUs ="SELECT id_user FROM user_centro_administrativo WHERE id_centro =$admin_position_centro";
$queryUs= $this->db->query($sqlUs);
 $nb_users =$queryUs->num_rows();
	
	
}else{
$hide_top_header="";
	$hide_payment="";
	$user_peril = "Admin";
	$query_user= $this->db->get('users');
	$nb_users=$query_user->num_rows();
}
?>


<header>

<div id="top" style="background:linear-gradient(to top, white, #E0E5E6);border-top:3px solid #38a7bb;border-bottom:none;<?=$hide_top_header?>" >
<div class="container">
<div class="row">

<div class="col-xs-12">

<nav class="navbar-default nav-top" style="background:none">
<div class="container-fluid">
<ul class="nav navbar-top" >
<li><a href="<?php echo site_url('admin/searchChart');?>" style="color:red"><i class="fa fa-bar-chart" style=""></i> Gráfico</a></li>
<li><a  href="<?php echo base_url('admin/chatBox')?>" ><i class='fa fa-comments'></i> Chatear</a></li>
 <li  id='new_message' ></li>
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

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" style="border-bottom:1px solid #E6E6FA;border-top:1px solid #E6E6FA;" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" >
<div class="container" >
<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:5%"><img  src="<?=base_url();?>assets/img/gicle1.png" style="width:130px" alt="logo" class="hidden-xs hidden-sm" ></span>
<span style="position:absolute;z-index:3000px;top:5%"><img style="width:110px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span></span>
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
<span id="outer">
<span id="inner">

</span>
</span>
<ul class="nav navbar-nav" style="margin-left:10%"  >

 <?php
 $this->load->view('admin/view_acciones');

 
 ?>


</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="dropdown" >

  <a title="<?= $name; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $name; ?> : <?=$user_peril?>

 <span class="caret"></span>
  </a>

 <ul class="dropdown-menu" >

 <li><a href="<?php echo site_url('admin/users');?>"> <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?=$nb_users;?> Usuarios | <span id='connected_users'></span> conectado(s)</a></li>
  <li <?=$hide_payment?>><a href="<?php echo site_url('admin/payment_received');?>" ><i class="fa fa-money" style="color:red"></i> Pagos</a></li>
 <li><a href="<?php echo site_url('login/admin_logout');?>" ><i class="fa fa-sign-out"></i>  Cerrar sesión</a></li>
  
	
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
 
 

</script>

<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<p>Parece que su conexión a Internet está fuera de línea.</p>
</div>
<div class="alert alert-warning text-center">
<i> <span id="timer">
    <span id="time">60</span> segundos      
  </span></i>
</div>
</div>
</div>
</div>
</div>

