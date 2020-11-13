
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



<body>
<!-- *** welcome message modal box *** -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Cambiar Mi Contraseña </h4>
<span style="color:red" id="errorBoxW"></span>
</div>

<div class="modal-body" id="background_" >
<form method="post" id="form_user" class="form-horizontal" action="<?php echo site_url('admin/NewPassword');?>" >
<input type="hidden" name="id_user" value="<?=$id_admin?>"/>
<div class="form-group">
<label for="area" class="control-label col-sm-3">Nueva Contraseña</label>
<div class="col-sm-8">
<input type="password" class="form-control" name="pass1" id="pass1" type="text" autocomplete="off" title="Uso de caracteres especiales como, [@, $].
Uso de letras mayúsculas [A - Z] y minúsculas [a - z].
Uso de números [0 - 9].
Asi tu tiene una contraseña fuerte.">
<div id="result"></div>
</div>
</div>
<div class="form-group">
<label for="area" class="control-label col-sm-3">Confirma Contraseña</label>
<div class="col-sm-8">
<input type="password" class="form-control" name="pass2" id="pass2"  type="text">
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
});



</script>

</body>

