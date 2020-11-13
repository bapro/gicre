<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/css-login-form.css">
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
    <title>INICIAR SESION</title>
	
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
    
      <div class="login-box" style='opacity:0.8'> 
	   
	  <form class="login-form"  method= "post" action="<?php echo site_url('login/validate');?>">
	   <div class="logo">
      <h1 > <img class="img-responsive" style='width:290px' src="<?= base_url();?>assets/img/logolast.png" alt=""/></h1>
	  <h5 style='text-align:center'>Gestion Integral de Consultas y Recetas Electronicas</h5>
      </div>
          <h3 class="login-head"> <i class="fa fa-lg fa-fw fa-user"></i> INICIAR SESION</h3>
		  <?=$this->session->flashdata('msg_pass_ac');?>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" name="username" type="text" placeholder="USUARIO" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" name="password" type='password' title='Haga un clic para agregar contraseña' onblur="this.setAttribute('readonly');" onfocus="this.removeAttribute('readonly');" id='inputpassword' autocomplete='off' placeholder="Contraseña" readonly>
          </div>
           <div class="form-group">
            <div class="utility">

              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidó Contraseña</a>
			  <a style="color:red" href="<?php echo site_url('navigation/create_doctor_account');?>">Crear su cuenta de médico</a> 
			  </p>
            </div>
          </div>
		  
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGUEAR</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i style='font-size:12px' class="fa fa-lg fa-fw fa-lock"></i> Olvidó Contraseña</h3>
          <div id="checkEr"></div>
		  <div class="form-group">
            <label class="control-label">Ingrese el correo electronico que esta enregistrado en GICRE </label>
            <input class="form-control" type="email" id="correo" placeholder="correo electronico">
          </div>
          <div class="form-group btn-container">
           <!-- <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>-->
		 <button id='Go' type='button' class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Chequear</button>
         
		  </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar a Loguear</a></p>
            </div>
        </form>
		 </div>
		   <div class="codigo-box" id="codigo-box"  style='display:none'>
        <form class="login-form" method= "post"   >
          <h3 class="login-head">Ingrese el codigo de seguridad que recibiste por correo</h3>
		<div class="form-group">
            <label class="control-label">Codigo de seguridad </label>
	       <input class="form-control" id='codigo' type="password" placeholder="codigo de seguridad ">
		   <input type="checkbox" onclick="viewPassword()">Ver 
          </div>
          
          <div class="form-group btn-container">
            <button type="button"  id='Go2' class="btn btn-primary btn-block">CHEQUEAR</button>
          </div>
		  
		  
        </form>
		
      </div>
	     <div class="codigo-box" id='count-box' style='display:none'>
        <form class="login-form" method= "post" id="form_user"   >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Cambiar Contraseña</h3>
		 <div id="errorBoxW" style='color:red'></div>
         <input type="hidden" id="id_user"/>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control remove-red password" name="pass1" id="pass1" type="password" autocomplete="off" placeholder="Contraseña"  title="1- Uso de caracteres especiales como, [@, $].
2- Uso de letras mayúsculas [A - Z] y minúsculas [a - z].
3- Uso de números [0 - 9].
Asi tu tiene una contraseña fuerte.">
		 <div id="result"></div>
		  </div>
		  
		 <div class="form-group">
            <label class="control-label">Confirmar Contraseña</label>
            <input class="form-control remove-red password" type="password" name="pass2" id="pass2" autocomplete="off" placeholder="Confirmar Contraseña" >
         </div>
          <div class="form-group btn-container">
            <button type="submit"  id='send' class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGUEAR</button>
          </div>
		  
		  
        </form>
		
      </div>
    </div>
     
	 
    </section>
	 <div id='check-resultw'></div>
	  </body>
    <!-- Essential javascripts for application to work-->
    <script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	  <script src="<?=base_url();?>assets/js/passwordscheck.js"></script> 
    <script type="text/javascript">
     // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
	  
	  //---------------------------------------------------------------------
	  
$('#Go').on('click', function(event){
event.preventDefault();
var correo = $("#correo").val();
if(correo==""){
$("#correo").css("border-color","red");
} else{

$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin_medico/check_correo')?>",
data: {correo:correo},
 
success:function(msg){ 
if(!(msg)){
alert('ese Correo electronica no esta enregistrodo  !');
}else{
$("#Go").prop("disabled",true);
	$('.login-box').hide();
	$('#codigo-box').toggle('flipped');
	
}
}, 
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#checkEr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}
})


	  //---------------------------------------------------------------------
	  
$('#Go2').on('click', function(event){
event.preventDefault();
var codigo = $("#codigo").val();
if(codigo==""){
$("#codigo").css("border-color","red");
} else{

$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin_medico/check_codigo')?>",
data: {codigo_securidad:codigo},
 
success:function(msg){ 
if(!(msg)){
alert('este codigo no es correcto !');
}else{
$("#Go").prop("disabled",true);
	$('.login-box').hide();
	$('#codigo-box').hide();
	$('#count-box').toggle('flipped');
	$('#id_user').val(msg);
}
}  
});
}
})



$('#send').click(function() {
var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
if($("#pass1").val() == "" ){
$("#pass1").focus();
$('#pass1').css('border-color', 'red'); 
$("#errorBoxW").html("Ingrese la nueva contraseña !");
return false;
} if($('#pass2').val() == ""){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Confirmar la nueva contraseña !");
return false;
}  if(pass1 != pass2){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Las contraseñas no coinciden");
return false;
}
});

$('.remove-red').keyup(function() {
$(this).css('border-color', ''); 	
})




$('#form_user').on('submit', function(event){
event.preventDefault();
var id_user = $("#id_user").val();
var pass1 = $("#pass1").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/changeUserAccount')?>",
data: {id_user:id_user,pass1:pass1},
 success:function(data){ 
location.reload();
}  
});
})


function viewPassword() {
    var x = document.getElementById("codigo");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

if (location.href.indexOf('reload')==-1)
{
   location.href=location.href+'?reload';
}
</script>
</html>