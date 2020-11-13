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


	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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


</head>

<body>
 <!-- *** welcome message modal box *** -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
                     <!--    <button type="submit" href="dsfsf.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                   <h4 style="text-align:center;color:green">Bienvedio <?= $user['apellido']; ?> <?= $user['nombre']; ?></h4>
                    </div>
      
                 
      </div>
      
    </div>
  </div>

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

                            <a class="navbar-brand home">
								
							<span style="position:absolute;z-index:3000px;top:3px"><img src="<?=base_url();?>assets/img/aaaadd.png" width="70" alt="Universal logo" class="hidden-xs hidden-sm" ></span>
                                <img src="<?= base_url();?>assets/img/adms.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span>
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
                                <li >
                                    <a href="<?php echo site_url('account_demand/display_demand');?>"> Nuestras peticiones </a>
                                  
                                </li>
                                <li>
                                  <a  href="#top1" id="t" >descripción</a>
                                 
                                </li>
                                <li>
                                    <a href="#modulos" id="t1">modulos </a>
                                   
                                </li>
                                <!-- ========== FULL WIDTH MEGAMENU ================== -->
                                <li>
                                    <a href="#top3" id="t2">clientes </a>
                                    
                                </li>
                                <li >
                            <a href="<?php echo site_url('users/logout');?>" title="Cerrar sesión" style="color:green">
							<i class="fa fa-user" aria-hidden="true" style="color:green;"></i>
                               <span style="color:green;"> <b> <?= $user['apellido']; ?> <?= $user['nombre']; ?></b> </span> <i class="fa fa-sign-out"></i> 
							   </a>
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


        
<div class="lignegreen"></div>
        <!-- *** LOGIN MODAL END *** -->
		
<div class="slider1">
  <ul class="rslides" id="slider1" style="float:center;z-index:10">
        <li><img src="<?= base_url();?>assets/img/slide_home/slide-r-1.png" alt=""/></li>
		
  </ul>
</div>


		
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
                               Nuestras peticiones
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


<script type="text/javascript">
 $(window).on('load',function(){
	 
        $('#myModal').modal('show');
    });
setTimeout(function() {$('#myModal').modal('hide');}, 2000);

</script>

<script>
$(function () {
  $("#slider1").responsiveSlides({
	auto: true,
	pager: true,
	speed: 500,
	namespace: "centered-btns",
	fade:100
  });
});
var $root = $('html, body');
$('#t').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

////////////////////////
$('#t1').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
//////////////////////////
$('#t2').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

///////////////////////
$('#t3').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#td').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#tm').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#td').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
$('#tc').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});

$('#tcc').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 800, function () {
        window.location.hash = href;
    });
    return false;
});
</script>
</body>

</html>