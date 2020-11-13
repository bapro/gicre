<!DOCTYPE html>
<html lang="en">
<head>
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
<style>
.new-log .img{
margin: 0 auto;

}

.img{
    width: 100%;
    height: auto;
}
.hide-me{display:none}
</style>

</head>

<body>
<!-- *** welcome message modal box *** -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<div class='alert alert-danger'>Para su securidad le avisa que 
 <strong><?=$last_time?></strong> alguien ha logueado con tu cuenta ya.<br/>
<!--
$getloc = json_decode(file_get_contents("http://ipinfo.io/$ip_address"))

ubicación: Pais : <?=$getloc-> country?> | Ciudad : <?=$getloc->city?> | región : <?=$getloc->region?> 
<?=$ip_address?>-->
<br/>Fue usted ? <a href="<?php echo site_url('admin/was_me');?>" class="btn btn-primary btn-sm"  >Si</a> <a id="btnNo" class="btn btn-danger btn-sm"  >No</a>
</div>
 </div>
<div class="modal-body"  >
<div class='form-inline' id='user_in_danger' style='display:none'>
<div class="form-group ">

<label class="control-label col-sm-8" >Entra el codigo de securidad que recibisteis por correo electronico despues su registracion<span> <span>*</span></label>
<div class="col-sm-4">
<input class="form-control"   id="codigo_securidad" type="text" >
<button type="button" class="btn  btn-sm btn-default" id="Go">OK</button>
</div>


</div>
</div>
<div  id='change_password' style='display:none'>
<form method="post"  class="form-horizontal" action="<?php echo site_url('admin/NewPasswordSolved');?>" >
<input type="hidden" name="id_user" value="<?=$iduser?>"/>
<div class='alert alert-success'>El codigo de securidad es correcto, cambia tu contraseña para bloquear el otro usuario que esta usando tu cuenta. Despues estara direccionado para loguear de nuevo.</div>
<div class="form-group">

<label for="area" class="control-label col-sm-3">Nueva Contraseña</label>
<div class="col-sm-8">
<input type="password" class="form-control on_input_passw" name="pass1" id="pass1" type="text" autocomplete="off" title="Uso de caracteres especiales como, [@, $].
Uso de letras mayúsculas [A - Z] y minúsculas [a - z].
Uso de números [0 - 9].
Asi tu tiene una contraseña fuerte.">
<div id="result"></div>
<div id="duplicate" style='color:red;display:none'><i style='font-size:15px' class="fa fa-frown-o" aria-hidden="true"></i> No puede usar la misma contraseña!</div>
</div>
</div>
<div class="form-group">
<label for="area" class="control-label col-sm-3">Confirma Contraseña</label>
<div class="col-sm-8">
<input type="password" class="form-control" name="pass2" id="pass2"  type="text">
<span style="color:red" id="errorBoxW"></span>
</div>
</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<!--<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>-->
<input id="send" class="btn btn-primary btn-xs" type="submit"  value="Enviar" /> 

</div>
<br/>
</div>

</form>
</div>
</div>

</div>
</div>
</div>

<!-- *** LOGIN MODAL END *** -->

<div class="new-log">
<img class="img" style='width:30%;margin-left:30%' src="<?= base_url();?>assets/img/gicle.jpg" alt=""/>

</div>
</div>
<?php
$this->load->view('footer');
?>
<!-- /#copyright -->

<!-- *** COPYRIGHT END *** -->




<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>assets/js/passwordscheck.js"></script> 
<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
//----------------------------------------------------------------------------------
$('#btnNo').on('click', function(event){
	$('#user_in_danger').slideDown();
})


//----------------------------------------------------

$('#Go').on('click', function(event){
event.preventDefault();
var codigo_securidad = $("#codigo_securidad").val();
if(codigo_securidad==""){
$("#codigo_securidad").css("border-color","red");
} else{

	$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin/user_in_danger')?>",
data: {codigo_securidad:codigo_securidad},
 
success:function(msg){ 
if(msg==0){
alert('Codigo de securidad incorrecta !');
}else{
$("#Go").prop("disabled",true);

$('#change_password').slideDown();$('#user_in_danger').slideUp();
}
}  
});
}
})




//----------------------------------------------------------------------------------------

$(document).ready(function() {
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
$('#result').show();
$('#duplicate').slideUp();
var input = $(this);
var password = $(this).val();
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
});

//---------------------------------------------------------------------------
var timer = null;
$('.on_input_passw').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_password_exist, 1000)
});



function check_if_password_exist() {
	var password= $(".on_input_passw").val();
$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin/check_if_password_exist')?>",
data: {password:password},
 
success:function(msg){ 
if(msg==1){
$('#duplicate').slideDown();
$('#result').hide();
//alert('No puede usar la misma contraseña!');
$(".on_input_passw").val("");
$("#send").prop("disabled",true);
}
}  
});
}
</script>

</body>

</html>