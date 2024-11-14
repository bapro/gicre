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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>INICIAR SESION</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    <section class="login-content">
   <div id="send-result-err"> </div>
      <div class="login-box" style='opacity:0.8;display:'> 
	  <form class="login-form"  method= "post" action="<?php echo site_url('saludOcupacional/validate');?>">
	  <div class="logo">
      <h1 > <img class="img-responsive" style='width:290px' src="<?= base_url();?>assets/img/logolast.png" alt=""/></h1>
	
      </div>
          <h3 class="login-head"> <i class="fa fa-lg fa-fw fa-user"></i> INICIAR SESION</h3>
		  <?=$this->session->flashdata('msg_pass_ac');?>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" name="username" type="text" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" name="password" type='password'  onblur="this.setAttribute('readonly');" onfocus="this.removeAttribute('readonly');" id='inputpassword' autocomplete='off' placeholder="Contraseña" readonly>
             
		</div>
           <div class="form-group">
            <div class="utility">

              <p class="semibold-text mb-2">
			 <a href="#" data-toggle="flip">Olvidó Contraseña / Cambiar Contraseña</a>
			   </p>
            </div>
          </div>
		  
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGUEAR</button>
	
          </div>
		  
        </form>
		

        <form id="new-pass-form" class="forget-form" method="post">
          <h3 class="login-head"><i style='font-size:12px' class="fa fa-lg fa-fw fa-lock"></i> Olvidó Contraseña</h3>
          <div id="checkEr"></div>
		  <div class="form-group">
            <label class="control-label">Ingrese el correo electrónico enregistrado en GICRE </label>
            <input class="form-control" type="email" id="correo" name="correo" placeholder="correo electronico">
          </div>
          <div class="form-group btn-container">
           <!-- <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>-->
		 <button id='Go' type='submit' class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Chequear</button>
         
		  </div>
          <div class="form-group mt-3">
		  <div id="send-result"></div>
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar a Loguear</a></p>
			
            </div>
        </form>
		
	</div>
	<div class="codigo-box" id="codigo-box"  style='display:none'>
	<form class="login-form" method= "post"   >
	<h3 class="login-head" id="correoOk"></h3>
	<div class="form-group">
	<label class="control-label">Codigo de seguridad </label>
	<div class="input-group">
	<input class="form-control"  id="codigo" type="password" placeholder="codigo de seguridad">
	<span class="input-group-addon">
	<i onclick="viewPassword()" class="fa fa-eye" style="cursor:pointer" aria-hidden="true"></i>
	</span>
	</div>  

	</div>

	<div class="form-group btn-container">
	<button type="button"  id='Go2' class="btn btn-primary btn-block">CHEQUEAR</button>
	</div>


	</form>

	</div>
	<div class="codigo-box" id='count-box' style='display:none'>
	<form class="login-form" method= "post" id="form_user"   >
	<h3 class="login-head">Cambiar Contraseña</h3>
	<input type="hidden" id="id_user" name="id_user"  />
	<div class="form-group">
	<label class="control-label">Contraseña</label>
	
 <div class="input-group">
    	<input class="form-control  pass-checked" name="pass1" id="pass1" type="password" autocomplete="off" placeholder="Contraseña"  title="
	 Uso de caracteres especiales como, [@, $], de letras mayúsculas [A - Z] y minúsculas [a - z], de números [0 - 9] para  tener una contraseña fuerte.">
    <span class="input-group-addon">
     <i id="verPasswordLog" class="fa fa-eye verPasswordLog" style="cursor:pointer" aria-hidden="true"></i>
    </span>
</div>
<div id="StrengthDisp"></div>

	</div>

	<div class="form-group">
	<label class="control-label">Confirmar Contraseña</label>
	<input class="form-control  pass-checked" type="password" name="pass2" id="pass2" autocomplete="off" placeholder="Confirmar Contraseña" >
	</div>
	<div class="form-group btn-container">
	<button type="submit"  id='sendPassw' class="btn btn-primary btn-block" disabled><i class="fa fa-sign-in fa-lg fa-fw"></i>CAMBIAR</button>
	<div id="newPassResult" class="text-center"></div>
	</div>


	</form>

	</div>

    </section>

	 <div id='check-resultw'></div>

    <!-- Essential javascripts for application to work-->
     <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	  <script src="<?=base_url();?>assets/js/passwordscheck2.js"></script> 
    <script type="text/javascript">
     // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
	  
	  //---------------------------------------------------------------------
	  
$('#new-pass-form').on('submit', function(event){
event.preventDefault();
var correo = $("#correo").val();
if(correo==""){
$("#correo").css("border-color","red");
} else{
$("#Go").prop("disabled",true);
$.ajax({
url: "<?=base_url('sendEmailToUsers/check_correo')?>",
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false, 
 
 success: function(response)   // A function to be called if request succeeds
{
$('#send-result').show();
if(response.status == 1){
	$('#correoOk').html('<p class="alert alert-success ">'+response.message+'</p>');
	$('.login-box').hide();
    $('#codigo-box').toggle('flipped');
}else if(response.status == 2){
	$('#send-result').html('<p class="alert alert-warning ">'+response.message+'</p>').delay( 2000 ).hide(0);
}	else{
	$('#send-result').html('<p class="alert alert-warning ">'+response.message+'</p>').delay( 2000 ).hide(0);
}
$("#Go").prop("disabled",false);
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#send-result-err').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
$('#Go2').prop("disabled",true);
$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin_medico/check_codigo')?>",
data: {codigo_securidad:codigo},
 
success:function(msg){ 
if(!(msg)){
alert('este codigo no es correcto !');
$('#Go2').prop("disabled",false);
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






$('#form_user').on('submit', function(event){
event.preventDefault();

$.ajax({
url: "<?=base_url('users/newPassword')?>",
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false, 
success: function(response)   // A function to be called if request succeeds
{
$('#newPassResult').show();
if(response.status == 0){
	$('#newPassResult').html('<p class="alert alert-warning ">'+response.message+'</p>').delay( 2000 ).hide(0);
}else if(response.status == 2){
	$('#newPassResult').html('<p class="alert alert-warning ">'+response.message+'</p>').delay( 2000 ).hide(0);
}	else{
	$('#newPassResult').hide();
	console.log(response.message);
	location.reload();
}
},


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


 $('#verPasswordLog').click(function() {
   $(this).toggleClass('fa fa-eye fa fa-eye-slash ');
	$('.pass-checked').prop('type', $('.pass-checked').prop('type') === 'password' ? 'text' : 'password');
  });


</script>
	  </body>
</html>