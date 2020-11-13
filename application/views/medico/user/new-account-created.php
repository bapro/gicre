<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />



</head>


<div class="container" style='border:1px solid #DCDCDC' >
	<p class='alert alert-success' style='text-align:center'>Usted tiene un plan <strong><?=$product['plan']?> del costo $<?=$product['precio']?> USD </strong></p>
	<div class="col-xs-4" style='text-align:center' >
     <a href="<?php echo site_url("medico");?>">Devolver a GICRE</a>
	 
	</div>
	<div class="col-xs-8" style='border-left:1px solid #DCDCDC'>
	<h4>Crear Contraseña</h4>
	<div id='errorBoxW' style='color:red'></div>
	<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url("paypal/createDocPass");?>">
<input type="hidden" name="id_user" value="<?=$id_doc?>"/>
<div class="form-group ">
<label class="control-label col-sm-2">Usuario</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" value='<?=$correo?>'  class="form-control" style="pointer-events:none">
 <input type="hidden" value='<?=$correo?>'  name="username" >
</div>

 </div>
 </div>
<div class="form-group ">
<label class="control-label col-sm-2">Contraseña</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock text-danger" aria-hidden="true"></i></span>
<input type="password" placeholder="Contraseña" name="pass1" id="pass1"   class="form-control" >
</div>

 </div>
 </div>
<div class="form-group" >
<label class="control-label col-sm-2" >Repetir Contraseña</label>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock text-danger" aria-hidden="true"></i></span>
<input type="password" placeholder="Repetir Contraseña" name="pass2" id="pass2"  class="form-control" >
</div>
</div>
</div>
 
 <div class='col-xs-3 col-xs-offset-2'>
<button type="submit" id='send' class="btn btn-primary">Crear/Loguear</button>
<br/><br/>
 </div>

</form>	
		 
    </div>
</div>
</div>
<br/>	

<?php $this->load->view('footer');?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <!-- <script src="<?=base_url();?>assets/js/passwordscheck.js"></script> -->
<script>

$('#send').click(function() {
var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
if($("#pass1").val() == "" ){
$("#pass1").focus();
$('#pass1').css('border-color', 'red'); 
$("#errorBoxW").html("Ingrese la nueva contraseña");
return false;
} if($('#pass2').val() == ""){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Confirmar la nueva contraseña");
return false;
}  if(pass1 != pass2){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Las contraseñas no coinciden");
return false;
}
});

$('#pass1').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );
}   
});

$('#pass2').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );
}   
});





</script>