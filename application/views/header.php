<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/quill/quill.snow.css" rel="stylesheet">
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
<?php
$zero=encrypt_url(0);
$one=encrypt_url(1);
?>
     <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
        <a onclick="window.history.go(-1); return false;" class="btn btn-sm btn-outline-primary position-absolute btn-back ms-2"><i
                class="bi bi-arrow-left"></i></a>
        <div class="container ">
            <a class="navbar-brand" href="#">
                 <img src="<?=base_url();?>assets/img/logo.png" alt="GICRE">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 hide-all-nav">
                    <li class="nav-item ">
                        <!--<a class="nav-link active" aria-current="page" href="#">Citas por hoy</a>-->
						<a class="nav-link " href="<?php echo site_url("$controller/appointments");?>">Citas de hoy <span id="citas_hoy"></span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("$controller/patient_appointment_requests");?>">Solicitudes <span id="citas_request"></span></a>
                    </li>
                   
                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Facturación
                        </a>
                        <ul class="dropdown-menu  shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown" >
                            <li><a class="dropdown-item" href="<?php echo site_url("$controller/tariffs");?>">Tarifarios</a></li>
                             <li><a class="dropdown-item" href="<?php echo site_url("$controller/invoice_report");?>">Reporte de factura</a></li>
                            <!--<li><a class="dropdown-item" href="#">Facturas Borradas</a></li>-->
                            <li><a class="dropdown-item" href="<?php echo site_url("$controller/invoice_ars_claim_reports");?>">Crear factura para reclamar ARS</a></li>
							
							<?php if($user_perfil!="Admin"){?>
							
							<li><a class="dropdown-item" href="<?php echo site_url("$controller/exchange_rate");?>">Crear tasa de cambio</a></li>
							<?php } ?>
                        </ul>
                    </li>
			
				   <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Paciente
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<?php 
						if($this->session->userdata('CURRENT_PATIENT')){?>
						<li class="nav-item">Paciente Actual: 
						<a class="dropdown-item" style="font-size:15px" href="<?php echo site_url($this->session->userdata('CURRENT_PATIENT'));?>"><?=$this->session->userdata('current_patient_name');?></a>
						</li>
						<li><hr class="dropdown-divider"></li>
						<?php }?>
						
						 <li class="nav-item show-bucador-show">
				<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#searchPatientBtn" style="cursor:pointer" id="show-search-patient"><i class="bi bi-search"></i> Buscar Paciente</a>
				</li>
                  <li class="nav-item show-bucador-show">
				<a class="dropdown-item" href="<?php echo site_url("$controller/create_patient");?>" ><i class="bi bi-person-plus"></i> Crear Paciente</a>
				</li>
                    </ul>
                    </li>
			
				  <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hospitalización
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<li>
                        <a class="dropdown-item" href="<?php echo site_url("hospitalization/patients_record/$zero");?>">Ingreso</a>
                        </li>
                         <li><a class="dropdown-item" href="<?php echo site_url("hospitalization/patients_record/$one");?>">Egreso</a></li>
                         </ul>
                    </li>
					  <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Emergencia
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<li>
                        <a class="dropdown-item" href="<?php echo site_url("emergency/patients_record/$zero");?>">Ingreso</a>
                        </li>
                         <li><a class="dropdown-item" href="<?php echo site_url("emergency/patients_record/$one");?>">Egreso</a></li>
                         </ul>
                    </li>
					 
					<?php	if($user_perfil=='Admin'){ ?>
				
					 <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mas
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<li>
                        <a class="dropdown-item" href="<?php echo site_url("$controller/users");?>">Usuarios</a>
						 <li><a class="dropdown-item" href="<?php echo site_url("admin/medical_centers");?>">Centro Médico</a></li> 
						 <li>
                        <a class="dropdown-item" href="<?php echo site_url("report_general/");?>">Reporte de Pacientes Atendidos</a>
					
                        </li>
                        </li>
						<?php 
						if($this->session->userdata('admin_position_centro')==''){ ?>
                         <li><a class="dropdown-item" href="<?php echo site_url("admin/areas");?>">Areas</a></li>
						 <li><a class="dropdown-item" href="<?php echo site_url("admin/health_insurance");?>">Seguro Médico</a></li>
						   <li><a class="dropdown-item" href="<?php echo site_url("admin/api_connection");?>">Integración API</a></li> 
						   <li><a class="dropdown-item" href="<?php echo site_url("admin/create_default_general_report");?>">Crear Reporte General Por Defecto</a></li> 
						<?php }?>
                         
                        </ul>
                    </li>
					<?php }  ?>
					<?php	if($user_perfil !='Admin'){ ?>
				
					 <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mas
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<li>
                        <a class="dropdown-item" href="<?php echo site_url("report_general/");?>">Reportes</a>
					
                        </li>
						
                         
                        </ul>
                    </li>
					<?php }  ?>
                </ul>
				
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user text-primary"></i> <?=$user_name?> (<?=$user_perfil?>)
							<input type="hidden" value="<?=$user_perfil;?>" id="user_perfil"  />
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
						<?php
						$id_userad=$this->session->userdata('user_id');
								if($user_perfil=="Medico"){
								$page_account = "doctor_account";
								}elseif($user_perfil=="Asistente Medico"){
								$page_account = "medical_assistent";
								}else{
								$page_account = "admin_account/$id_userad";		
								}
								?>
                             <li><a class="dropdown-item" href="<?php echo site_url("$controller/$page_account");?>"><i class="bi bi-gear-fill"></i> Mi Cuenta</a></li>
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
	
<?php $this->load->view("patient/search/patient-seeker-form"); ?>
	
	
	<input id="link-to-cita" type="hidden" value="<?php echo base_url("general_controller/citas_hoy") ?>"  />
	<input id="link-to-request" type="hidden" value="<?php echo base_url("general_controller/cola_de_solicitud") ?>"  />
	<script>
	
	setInterval(function(){
	$("#citas_hoy").load("<?php echo base_url("general_controller/citas_hoy") ?>").fadeIn("slow");
	 $('#citas_request').load("<?php echo base_url('general_controller/cola_de_solicitud')?>").fadeIn("slow");
	
	},5000);
	</script>
	
