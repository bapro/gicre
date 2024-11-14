<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"><?=$title?> </h4>
<span style="color:red" id="errorBoxW"></span>
</div>

<div class="modal-body" id="background_" >
<form  method="post" action="<?php echo site_url('admin_medico/NewPassword');?>"  autocomplete="off">
<fieldset>
<input type="hidden" name="id_user" value="<?=$id_admin?>"/>
<input type="hidden" name="id_current_user" value="<?=$id_current_user?>"/>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock text-danger" aria-hidden="true"></i></span>
<input type="password" placeholder="Nueva Contraseña" name="pass1" id="pass1" type="text" class="form-control" title="Uso de caracteres especiales como, [@, $].
Uso de letras mayúsculas [A - Z] y minúsculas [a - z].
Uso de números [0 - 9].
Asi tu tiene una contraseña fuerte." >
</div>
</div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock text-danger" aria-hidden="true"></i></span>
<input type="password" placeholder="Confirmar Nueva Contraseña" name="pass2" id="pass2" class="form-control">
</div>                        
</div>                        
<div class="row">
<div class="col">
<input class="btn btn-lg btn-dark btn-block" type="submit" id="send" value="<?=$button?>">
</div>

</div>                        
</fieldset>
</form>
</div>
  <script src="<?=base_url();?>assets/js/passwordscheck.js"></script> 
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