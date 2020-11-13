<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="robots" content="admedicall">
<meta name="googlebot" content="admedicall">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>ADMEDICALL</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">


<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<!-- Theme stylesheet, if possible do not edit this stylesheet -->
<link href="<?php echo base_url('assets/css/style.default.css');?>" rel="stylesheet" >
	 
<!-- Custom stylesheet - for your changes 
//<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">-->
<link href="<?php echo base_url('assets/css/custom.css');?>" rel="stylesheet" >

<link href="<?php echo base_url('assets/css/themes.css');?>" rel="stylesheet" >

<!-- Responsivity for older IE -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


</head>
 
 
 
 
 
 
 
 
 <header>

            <!-- *** TOP ***
_________________________________________________________ -->
        <div id="top">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-xs-12">
                            <div class="social" style="margin-top:12px">
                                <a href="https://www.facebook.com/admedicall.agendas" class="external facebook" data-animate-hover="pulse" target="_blank"><i class="fa fa-facebook"></i></a>
								 <a href="https://www.youtube.com/channel/UCpbc6Fs_F7GdWYZ689EwBZQ" class="youtube" data-animate-hover="pulse" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="https://www.youtube.com/channel/UCpbc6Fs_F7GdWYZ689EwBZQ" class="external twitter" data-animate-hover="pulse" target="_blank"><i class="fa fa-twitter"></i></a>
								 <a href="https://plus.google.com/108872676854313618688" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus" target="_blank"></i></a>
                               
								<!--<a href="#" class="external instagram" data-animate-hover="pulse"><i class="fa fa-instagram"></i></a>-->
                               
							
                            </div>
							
							<form class="navbar-form" role="search" style="float:right;margin-top:5px" >
							<div class="input-group " style="float:right;">
                             
                              
                               <input style="border-radius:10px" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term" type="text">
                               <div class="input-group-btn ">
                              <button  id="bttn"  class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                              
						</div>
						</form>
                    </div>
                </div>
            </div>
			</div>
             <br/>
            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

           <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="<?php echo site_url('welcome');?>">
							<span style="position:absolute;z-index:3000px;top:1px"><img src="<?=base_url();?>assets/img/aaaadd.png" width="70" alt="Universal logo" class="hidden-xs hidden-sm" ></span>
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

                            <ul class="nav navbar-nav navbar-right" >
							
                                <li >
                                    <a href="<?php echo site_url('welcome');?>" style="text-decoration:none;">Inicio </a>
                                  
                                </li>
                                <li>
                               <a   style="text-decoration:none" href="<?php echo site_url('welcome');?>#top1" id="t"  >descripción</a>
                                   
                                </li>
								 <li>
                                   <a href="<?php echo site_url('welcome');?>#modulos" id="t1">modulos </a>
                                    
                                </li>
                                <li>
                                 <a href="<?php echo site_url('welcome');?>#top3" id="t2">clientes </a>
                                  
                                </li>
                              <li>
                                 <a href="<?php echo site_url('welcome');?>#contacto" id="t3">contacto </a>
                                    
                                </li>
								 <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">mas <b class="caret"></b></a>
                                 <ul class="dropdown-menu" style="color:black">
                                 <li><a href="<?php echo site_url('navigation/AddRequest');?>"><img src="<?= base_url();?>assets/img/citaxxx.png">  CITA </a></li>
                                 <li><a href="#"><img src="<?= base_url();?>assets/img/amx.png">  ASISTENTE</a></li>
                                 <li><a href="#"><img src="<?= base_url();?>assets/img/mdx.png">  MEDICOS</a></li>
								 <li><a href="#"><img src="<?= base_url();?>assets/img/notx.png">  NOTICIAS</a></li>
                                 </ul>
                                  </li> 
								
								 <li class="" >
                                <a href="<?php echo site_url('login');?>"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Login</span></a>
                              <!--  <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>-->
                               </li>
					
                            </ul>

                        </div>
                        <!--/.nav-collapse -->

                       
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>
    
            <!-- *** NAVBAR END *** -->

        </header>
		<br/>