	<!-- *** welcome message modal box *** -->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="robots" content="solicitud de citas">
<meta name="googlebot" content="solicitud de citas">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admedicall</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Theme stylesheet, if possible do not edit this stylesheet -->
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

<style>

.hero-image{
background-image: url('<?= base_url();?>assets/img/image-cita-online.png');
width: 100%;
  height: 500px;
 background-repeat: no-repeat;
  background-size: contain;
  background-position: center;
 
}
</style>
</head>

<body>

<div class="container"  >
<br/>
<div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
<table style='width:100%;'>
<tr>
<td style='width:10%'>
<img style="width:150px" src="<?= base_url();?>assets/img/logo-online-gicre.png" alt="GICRE ONLINE">
</td>
<td style='text-align:left'>
<div   class="alert alert-info">
 <h4>Buscar tu nombre antes de solicitar tu cita.</h4>
 </div>
</td>
</tr>
</table>
<hr id="hr_ad"/>
 <div class="form-group sumges">
 <div class="col-md-6">
 <div class="input-group">
    <span class="input-group-addon">Cedula</span>
 <input id="patient_cedula12" style="width:65px" type="text" class="form-control patient-cedula" placeholder="000" data-mask="000">

  <input id="patient_cedula22" style="width:100px" type="text" class="form-control patient-cedula" placeholder="0000000" data-mask="0000000" disabled>
 
  <input id="patient_cedula32"  style="width:45px" type="text" class="form-control patient-cedula" placeholder="0" data-mask="0" disabled>
  
</div>
 <br/>

    </div>
<!--<div class="col-md-2">
<div class="input-group">
    <span class="input-group-addon">NEC-</span>
  <input type="text" style="width:85px" id="num-record"  class="form-control" >
</div>
 <br/>
</div>-->
 <div class="col-md-6">

 <form class="form-inline" method='GET' action="<?php echo site_url("navigation/patient_paginate");?>">
   <input type="text"  name="patient_nombres"  placeholder="Nombres" style="width:130px" class="form-control patientname" required>
   <input  name="patapellido"   placeholder="Apellido1" style="width:130px" type="text" class="form-control patientname" required>

   <input  name="patapellido2"   placeholder="Apellido2" style="width:130px" type="text" class="form-control patientname" >

   <button  class="btn btn-primary btn-sm" type="submit" id="button_pat" ><i class="fa fa-search" aria-hidden="true"></i></button>
 </form>

  </div>
<br>
 </div>
 <br/><br/>
 </div>

<div id='patientdata'></div>
<div class="col-md-12">
<h3 class='h3 text-center' style='color:#2A4796'>Instrucciones para hacer citas médica online</h3>
<div class="hero-image">

</div>
</div>
</div>

	</body>
 <br/><br/>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


<script>

$("#patient_cedula32").keyup(function(){
var patient_cedula3=$(this).val();
var patient_cedula1=$("#patient_cedula12").val();
var patient_cedula2=$("#patient_cedula22").val();
if(patient_cedula3==""){}else{
window.location ="<?php echo base_url(); ?>navigation/search_ced?patient_cedula1="+patient_cedula1+"&patient_cedula2="+patient_cedula2+"&patient_cedula3="+patient_cedula3; 	
}
});




$('#find-pat-n').on('click', function() {
var str=  $("#search-nbr").val();

$("#patientdata").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
$( "#patientdata" ).hide();

}else {
window.location ="<?php echo base_url(); ?>navigation/search_result_name?str="+str; 	

}
});




var timer = null;
$("#num-record").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(searchNecEntry, 1000)
});
function searchNecEntry (){
var nec=$("#num-record").val();

$("#patientdata").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(nec == "") {
$( "#patientdata" ).hide();

}else {
window.location ="<?php echo base_url(); ?>navigation/nec_entry?nec="+nec; 	

}
};



</script>
	</html>