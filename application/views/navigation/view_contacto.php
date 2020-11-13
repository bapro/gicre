<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universal - All In 1 Template</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">


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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
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
    var x = document.forms["myForm"]["name"].value;
	var a = document.forms["myForm"]["apellido"].value;
	var b = document.forms["myForm"]["email"].value;
    var c = document.forms["myForm"]["tel"].value;
	var d = document.forms["myForm"]["message"].value;
	
	 var atpos = b.indexOf("@");
    var dotpos = b.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    if (x == "" ) {
        alert("Name must be filled out");
        return false;
    }
	  if (a == "" ) {
        alert("Apellido must be filled out");
        return false;
    }
	
	
	 if (c == "" ) {
        alert("Phone must be filled out");
        return false;
    }
	 if (d == "" ) {
        alert("Mensaye must be filled out");
        return false;
    }
}   
</script>  

</head>

<body>


    <div id="all">
        <header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div class="b4" id="top">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <div class="social" >
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
								<a href="#" class="external youtube" data-animate-hover="pulse"><i class="fa fa-youtube"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>
                             
                            <form class="login1" role="search" style="float:right" >
                           <div class="input-group add-on">
                          <input class="form-control" placeholder="Buscar" name="srch-term" id="srch-term" type="text">
                          <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                          </div>
                          </form> 
                            <div class="login" >
                                <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Login</span></a>
                              <!--  <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>-->
                            </div>
						 <!--  <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>-->
                          

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="index.html">
								
							<span style="position:absolute;z-index:3000px;top:3px"><img src="<?=base_url();?>assets/img/aaaadd.png" width="70" alt="Universal logo" class="hidden-xs hidden-sm" ></span>
                                <img src="img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right" style="margin-top:-20px">
                                <li>
                                    <a  href="<?php echo site_url('welcome');?>">Inicio </a>
                                  
                                </li>
                                <li class="dropdown use-yamm yamm-fw">
                                   <!-- <a href="<?php echo site_url('navigation/description');?>"  id="top1" >descripción</a>-->
								   <a  href="#top1" id="t" >descripción</a>
                                 
                                </li>
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="#modulos" id="t1">modulos </a>
                                   
                                </li>
                                <!-- ========== FULL WIDTH MEGAMENU ================== -->
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="#top3" id="t2">clientes </a>
                                    
                                </li>
                                <!-- ========== FULL WIDTH MEGAMENU END ================== -->
								<!-- <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">solicitud de cita </a>
                                   
                                </li>-->

                                <li class="active">
                                    <a>contacto </a>
                                   
                                </li>
								
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>


        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Inicio de sesión</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="Nombre de usuario">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="Contraseña">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Enviar</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Todavía no estas registrado ?</p>
                        <p class="text-center text-muted"><a href="<?php echo site_url('navigation/registration');?>"><strong>Regístrate ahora</strong></a><!--! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!--></p>

                    </div>
                </div>
            </div>
        </div>
        
<div class="lignegreen"></div>

       
		  <div id="map" class="with-border">

            </div>
		 <section id="contacto">
		  <div id="content">
            <div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="heading">
                                <h2>Estamos aquí para ayudarte</h2>
                            </div>

                            <p class="lead">¿Estás interesado en algo? ¿Tiene algún tipo de problema con nuestros productos? <br/> Sientase libre de escribirnos..</p>
                           

                            <div class="heading">
                                <h3>formulario de contacto</h3>
                            </div>
							 <form name="myForm" id="myForm" method="post"  onsubmit="return validateForm()" action="<?php echo site_url('navigation/contacto_send');?>" > 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Nombre de pila</label>
											
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name');?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Apellido</label>
										
                                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo set_value('apellido');?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
											</br>
                                        
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Teléfono</label>
											
                                            <input type="text" class="form-control" id="tel" name="tel" value="<?php echo set_value('tel');?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
										
                                            <textarea  class="form-control" id="message" name="message" value="<?php echo set_value('message');?>"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Envia Mensaye</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
							
                        </div>

                        <div class="col-md-4">


                            <h3 class="text-uppercase">Direción</h3>
                          <p style="color:#39403B"><strong>Administradora de Agenda de Servicios Medicos y Call Center</strong>
                          <br>Direción: C/10 #18 Res. Santo Domingo, Santo Domingo Oeste, R.D.
                        
                        <br><br>
                        <strong>Republicana Dominicana</strong>
                         </p>

                            <h3 class="text-uppercase">Call center</h3>

                            <p><strong>Tel.: 809-445-7330</strong>
                            </p>



                            <h3 class="text-uppercase">Soporte electrónico</h3>

                            <p class="text-muted">Por favor, no dude en escribirnos un correo electrónico o utilizar nuestro sistema de billetes electrónicos..</p>
                            <ul>
                                <li><strong>Email: admedicall@gmail.com </strong>
                                </li>
                                <li><strong>admedicall@admedicall.com.do</strong></li>
                            </ul>


                        </div>

                    </div>


                </section>

            </div>
            <!-- /#contact.container -->
        </div>
		</section>
	<div class="bas_footer"></div>	
  <footer id="footer">
            <div class="container">
			<div class="col-md-12">
                <div class="col-md-6">

                    <h4><u>Contacto</u></h4>

                    <p style="color:#39403B"><strong>Administradora de Agenda de Servicios Medicos y Call Center</strong>
                        <br>Tel.: 809-445-7330<br>
                        <br>Email: admedicall@gmail.com | admedicall@admedicall.com.do<br>
                        <br>Direción: C/10 #18 Res. Santo Domingo, Santo Domingo Oeste, R.D.
                        
                        <br><br>
                        <strong>Republicana Dominicana</strong>
                    </p>

                    <a href="#contacto" id="tcc" class="btn btn-small btn-template-main">Contactenos</a>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
              


                <div class="col-md-4">

                    <h4><u>Navegación</u></h4>

                    <div class="photostream">
                        <div>
                            <a href="index.php">
                                Inicio
                            </a>
							<hr class="hidden-md hidden-lg hidden-sm"> 
                        </div>
                        <div>
                            <a href="#top1" id="td">
                               Descripción
                            </a>
							 <hr class="hidden-md hidden-lg hidden-sm">
                        </div>
                        <div>
                            <a href="#modulos" id="tm" >
                               Modulos
                            </a>
							 <hr class="hidden-md hidden-lg hidden-sm">
                        </div>
                        <div>
                            <a href="#top3" id="td" >
                               Clientes
                            </a>
							 <hr class="hidden-md hidden-lg hidden-sm">
                        </div>
                        <div>
                            <a href="#contacto" id="tc" >
                                Contacto
                            </a>
							 <hr class="hidden-md hidden-lg hidden-sm">
                        </div>
                        
                    </div>

                </div>
				 <div class="col-md-2">
                   
                    <h4><u>Siguenos</u></h4>

					<a href="#"><div class="social-roll-f"><img src="<?=base_url();?>assets/img/media/youtube.png" alt="Youtube"></div></a><br/>
                      <a href="#"><div class="social-roll-f"><img src="<?=base_url();?>assets/img/media/facebook.png" alt="Facebook"></div></a><br/>
					  <a href="#"><div class="social-roll-f"><img src="<?=base_url();?>assets/img/media/Twitter.png" alt="Twitter"></div></a><br/>
					  <a href="#"><div class="social-roll-f"><img src="<?=base_url();?>assets/img/media/instagram.png" alt="Instagram"></div></a><br/>
					 <a href="#"><div class="social-roll-f"><img src="<?=base_url();?>assets/img/media/Google+.png" alt="Google+"></div></a><br/>
				

                </div>
				</div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->
<div class="bas_footer"></div>
        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p style="text-align:center">

Deléitate asimismo en Jehová, Y él te concederá las peticiones de tu corazón. Salmos 37:4.<br>

Copyright © 2012 Admedicall.com Todos los derechos reservados.
</p>
                   <!-- <p class="pull-right">Template by <a href="https://bootstrapious.com">Bootstrapious</a> & <a href="https://remoteplease.com">Remote Please</a>
                          Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  
                    </p>-->

                </div>
            </div>
        </div>
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
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <script src="<?=base_url();?>assets/js/gmaps.js"></script>
    <script src="<?=base_url();?>assets/js/gmaps.init.js"></script>

</body>

</html>