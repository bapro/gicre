<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admedicall</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">

 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
   
    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">


    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>assets/img/apple-touch-icon-152x152.png" />

    <!-- owl carousel css -->
<script>  
function validateForm() {
    var x = document.forms["myForm"]["nombre"].value;
	var a = document.forms["myForm"]["apellido"].value;
	var b = document.forms["myForm"]["email"].value;
    var c = document.forms["myForm"]["telefono"].value;
	var e = document.forms["myForm"]["ubicacion"].value;
	var f = document.forms["myForm"]["servicio"].value;
	
	 var atpos = b.indexOf("@");
    var dotpos = b.lastIndexOf(".");
    if (x == "" ) {
        alert("Nombre de pila debe ser llenado");
        return false;
    }
	  if (a == "" ) {
        alert("Apellido debe ser llenado");
        return false;
    }
	
	 if (e == "" ) {
        alert("Ubicación de trabajo debe ser llenado");
        return false;
    }
	
	 if (f == "" ) {
        alert("Servicio prestado debe ser llenado");
        return false;
    }
	
	   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length) {
        alert("La dirección de email no es válida");
        return false;
    }
	
     if (c == "" ) {
        alert("Teléfono debe ser llenado");
        return false;
    }
	
	
} 


 
</script>  

</head>

<body>
<?php
        $this->load->view('header');
?>

<br/>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
        
<div class="lignegreen"></div>

 <div id="content">
            <div class="container">
         <div class="row">
                    <div class="col-md-3">
                               <h2 class="text-uppercase">Nueva cuenta</h2>
                    </div>
				  </div>
          
                <div class="row">
                    <div class="col-md-12">
					
                        <div class="box">
						
                            <p>¿Todavía no es nuestro cliente ?</p>
                            <p>llene este formulario para convertise en uno de nuetros clientes y su cuenta le sera enviada al correo puesto en dicho formulario.</p>
                            <p class="text-muted">Si tiene alguna pregunta, no dude en <a href="<?php echo site_url('welcome#contacto');?>">Contáctenos</a>, Nuestro centro de servicio al cliente está trabajando para usted 24/7.</p>

                            <hr>
							 <script type="text/javascript"> 
                             $(document).ready( function() {
                             $('#deletesuccess').delay(15000).fadeOut();
                             });
                             </script>
							<?php echo $this->session->flashdata('success_msg'); ?>
                            <form name="myForm" id="myForm" method="post"  onsubmit="return validateForm()" action="<?php echo site_url('navigation/registration_sent');?>" > 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Nombre</label>
											<input type="text" class="form-control" id="nombre" name="nombre"   required="" value="<?php echo !empty($user['nombre'])?$user['nombre']:''; ?>">
									<?php echo form_error('nombre','<span class="help-block">','</span>'); ?>
                                      
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Apellido</label>
											<input type="text" class="form-control" id="apellido" name="apellido"  required="" value="<?php echo !empty($user['apellido'])?$user['apellido']:''; ?>">
									<?php echo form_error('apellido','<span class="help-block">','</span>'); ?>
                                      
                                        </div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                          <?php
									if(!empty($user['gender']) && $user['gender'] == 'Female'){
										$fcheck = 'checked="checked"';
										$mcheck = '';
									}else{
										$mcheck = 'checked="checked"';
										$fcheck = '';
									}
									?>
									<div class="radio">
										<label>
										<input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
										Male
										</label>
									</div>
									<div class="radio">
										<label>
										  <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
										  Female
										</label>
									</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Ubicación de trabajo</label>
											</br>
                                        	<input type="text" class="form-control" id="ubicacion" name="ubicacion"  required="" value="<?php echo !empty($user['ubicacion'])?$user['ubicacion']:''; ?>">
									<?php echo form_error('ubicacion','<span class="help-block">','</span>'); ?>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Servicio prestado</label>
											 	<input type="text" class="form-control" id="servicio" name="servicio"  required="" value="<?php echo !empty($user['servicio'])?$user['servicio']:''; ?>">
									<?php echo form_error('servicio','<span class="help-block">','</span>'); ?>
                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
											</br>
                                     <input type="email" class="form-control inputEmail" name="email"  data-error="That email address is invalid" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
									<?php echo form_error('email','<span class="help-block">','</span>'); ?>
								
                                       
										</div>
                                    </div>
									
									
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Teléfono</label>
											 <input type="text" class="form-control inputEmail" name="telefono" id="telefono"  required="" value="<?php echo !empty($user['telefono'])?$user['telefono']:''; ?>">
									<?php echo form_error('telefono','<span class="help-block">','</span>'); ?>
								
                                       
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Envia Mensaye</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                    </div>
                    

            </div>
            <!-- /.container -->
        </div>
		
		<?php
        $this->load->view('footer');
		?>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="<?=base_url();?>assets/js/jquery.cookie.js"></script>
    <script src="<?=base_url();?>assets/js/waypoints.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.parallax-1.1.3.js"></script>
    <script src="<?=base_url();?>assets/js/front.js"></script>

    <script type="text/javascript" src="sl/js/menu/flaunt.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/responsiveslides.min.js"></script>

    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>

<script>

document.getElementById('telefono').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
</script>

</body>

</html>