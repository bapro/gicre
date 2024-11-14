<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="<?= base_url();?>assets_new/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/bootstrap-select-1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <!-- Template Main CSS File  <link href="<?= base_url();?>assets_new/css/style.css" rel="stylesheet"> -->
 <link href="<?= base_url();?>assets2/css/style.css?rnd=3" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/logo.png" type="image/x-icon" />
   <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

 <title>GICRE</title>
	<style>
	body{padding-bottom: 90px;}
.fs-7 { font-size: .5rem!important; }
.btn-back{left:0; top: 22px;}
@media screen and (max-width: 768px) {
    .btn-back{left:auto; right:50%}
  }
  
  
  
	</style>

</head>

<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
        <a onclick="window.history.go(-1); return false;" class="btn btn-sm btn-outline-primary position-absolute btn-back ms-2"><i
                class="bi bi-arrow-left"></i></a>
        <div class="container ">
		<?php if($CENTRO_INFO > 0)  {?>
            <a class="navbar-brand" href="#">
                 <img src="<?=base_url();?>assets/img/logo.png" alt="GICRE"> <?=$CENTRO_INFO['name']?>
            </a>
		<?php } else{
			echo '<span class="text-danger">Este usuario no esta asociado a un centro médico</span>';
			
		}
		?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user text-primary"></i> <?=$this->session->userdata('user_name')?> (<?=$this->session->userdata('user_perfil')?>)
							
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown2">
						
                             <li><a class="dropdown-item" href="<?php echo site_url("internal_pharmacy/perfil");?>"><i class="bi bi-gear-fill"></i> Mi Cuenta</a></li>
							   <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('login/logout');?>"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
							
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
		 <div id="pation-nombres-data" class="position-absolute top-100 start-50 "></div>
        <div class="position-absolute bottom-0 w-100">
            <div class="d-flex">
                <div class="flex-fill bg-primary pt-1"></div>
                <div class="flex-fill bg-warning pt-1"></div>
                <div class="flex-fill bg-success pt-1"></div>
                <div class="flex-fill bg-danger pt-1"></div>
            </div>
        </div>
    </nav>
	<span id="citas_request"></span><span id="citas_hoy"></span>
	<input id="link-to-cita" type="hidden" value="<?php echo base_url("general_controller/citas_hoy") ?>"  />
	<input id="link-to-request" type="hidden" value="<?php echo base_url("general_controller/cola_de_solicitud") ?>"  />

	

	
