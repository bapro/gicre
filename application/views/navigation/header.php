<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="robots" content="solicitud de citas">
<meta name="googlebot" content="solicitud de citas">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admedicall</title>

<meta name="keywords" content="">
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>

<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

<style>
td,th{text-align:left}
.capchtavalue{
	color:#A9A9A9;font-style:italic;
	background: repeating-linear-gradient(
  45deg,
  #606dbc,
  #606dbc 10px,
  #465298 10px,
  #465298 20px
);}



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


<header>

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="10" style="border-bottom:1px solid #38a7bb;border-top:1px solid #38a7bb;background:#E0E5E6;" >
<div class="container">
<div class="row">

<div class="col-xs-12">

<nav class="navbar-default nav-top" style="background:none">
<div class="container-fluid">
<ul class="nav navbar-top" >

<li><a  style='color:#2A4796'><img style="width:100px" src="<?= base_url();?>assets/img/logo-online-gicre.png" alt="GICRE ONLINE"><strong>G</strong>estión <strong>I</strong>ntegral de <strong>C</strong>onsultas y <strong>R</strong>ecetas <strong>E</strong>lectrónica</a></li>

<li><a  href="<?php echo site_url("navigation/AddRequest");?>"><i class="fa fa-search" aria-hidden="true"></i> Buscar paciente</a></li>

</ul>
</div>
</nav>
</div>
</div>
</div>
</div>

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

<!-- *** NAVBAR END *** -->
</header>

<br/>







