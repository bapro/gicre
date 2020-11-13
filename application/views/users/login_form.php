<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
</head>

<div class="container">
 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
                     <!--    <button type="submit" href="dsfsf.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                        <h4 class="modal-title" id="Login">Inicio de sesión</h4>
                    </div>
        <div class="modal-body">
		 <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
<form name="myLogin" id="myLogin" method="post" action="<?php echo site_url('users/login');?>" > 
                    
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="username" placeholder="Nombre de usuario">
								<?php echo form_error('email','<span class="help-block">','</span>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
								<?php echo form_error('password','<span class="help-block">','</span>'); ?>
                            </div>

                            <p class="text-center">
							<input type="submit" name="loginSubmit" class="btn btn-template-main" value="Enviar"/>
                               <!-- <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Enviar</button>-->
                            </p>

                         </form>
  <p class="text-center text-muted">Todavía no estas registrado ?</p>
 <p class="text-center text-muted"><a href="<?php echo site_url('navigation/registration');?>"><strong>Regístrate ahora</strong></a><!--! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!--></p>
       
        </div>
                 
      </div>
      
    </div>
  </div>
  
</div>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
	//prevent modal from closing on click
	$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})
	
</script>

















<!--
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/CodeIgniter-3.1.5-from-0/user_Authentication/user_login_process");
}
?>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_Authentication/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>
-->

