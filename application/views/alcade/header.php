<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>FRANK SOTO ALCALDE Y ANA MARIA DIPUTADA</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

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

.error{color:red}
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}

td,th{text-align:left}


.footersoto {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #1B67A4;
  color: white;
  text-align: center;
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
 



<header>



<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" style="border-bottom:1px solid #38a7bb;border-top:1px solid #38a7bb;" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" >
<div class="container" >
<div class="navbar-header">
<!--
<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:5%"><img  src="<?=base_url();?>assets/img/gicle1.png" style="width:130px" alt="logo" class="hidden-xs hidden-sm" ></span>
<span style="position:absolute;z-index:3000px;top:5%"><img style="width:110px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span></span>
</a>-->
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




</ul>

</div>

</div>
</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>
<div class='container'>
 <h1 style="color:#800080">FRANK SOTO ALCALDE Y ANA MARIA DIPUTADA</h1>
