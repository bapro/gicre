<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>


 <title>ADMEDICALL</title>
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
$controller='medico';
$user_perfil='Medico';
$user_name='Medico';
?>
     <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
        <a onclick="window.history.go(-1); return false;" class="btn btn-sm btn-outline-primary position-absolute btn-back ms-2"><i
                class="bi bi-arrow-left"></i></a>
        <div class="container ">
            <a class="navbar-brand" href="#">
                 <img src="<?=base_url();?>assets/img/logo.png" alt="Admedicall">
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
							<li><a class="dropdown-item" href="<?php echo site_url("$controller/exchange_rate");?>">Crear tasa de cambio</a></li>
                        </ul>
                    </li>
					<?php
					if($user_perfil=="Admin"){
					?>
					   <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mas
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ccc</a></li>
                           
                        </ul>
                    </li>
					<?php
					}
					?>
				
				
				   <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Paciente
                        </a>
                        <ul class="dropdown-menu shadow-lg p-3 mb-5 bg-body-tertiary rounded" aria-labelledby="navbarDropdown">
						<?php 
						if($this->session->userdata('CURRENT_PATIENT')){?>
						<li class="nav-item">Paciente Actual: 
						<a class="dropdown-item" style="font-size:17px" href="<?php echo site_url($this->session->userdata('CURRENT_PATIENT'));?>"><?=$this->session->userdata('current_patient_name');?></a>
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
				
				
				
				 </li>
                </ul>
				
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user text-primary"></i> <?=$user_name?> (<?=$user_perfil?>)
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="<?php echo site_url("$controller/my_account");?>"><i class="bi bi-gear-fill"></i> Mi Cuenta</a></li>
							  <li><a class="dropdown-item" href="<?php echo site_url("$controller/laboratory");?>"><i class="fa fa-flask"></i> Laboratorios</a></li>
							
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
	
	<input id="link-to-cita" type="hidden" value="<?php echo base_url("general_controller/citas_hoy") ?>"  />
	<input id="link-to-request" type="hidden" value="<?php echo base_url("general_controller/cola_de_solicitud") ?>"  />
	<script>
	
	setInterval(function(){
	$("#citas_hoy").load("<?php echo base_url("general_controller/citas_hoy") ?>").fadeIn("slow");
	 $('#citas_request').load("<?php echo base_url('general_controller/cola_de_solicitud')?>").fadeIn("slow");
	
	},5000);
	</script>
	

<section class="py-3">
<table class="table table-sm table-striped mb-0" id="table-tarifario">
  <thead>
    <tr class="bg-th">
      <th scope="col" style="width:180px;display:block">
        Area
      </th>
      <th scope="col">
        Servicios

      </th>
     
    </tr>
  </thead>

  <tbody>
    <tr id="addr1" class="align-middle calculation">
     <td >
        <select style='width:100%'  class="form-select" onChange="center_area_on_change(this);">
          <option></option>
         <option>Country 1</option>
            <option>Country 2</option>
            <option>Country 3</option>
            <option>Country 4</option>

        </select>
      </td>
      <td style="width:280px;display:block">
        <select style='width:100%' class="form-select" onChange="getTarifDataSeguroPrivado(this);">

         <option></option>
          <option>Town 1</option>
          <option>Town 2</option>
          <option>Town 3</option>
          <option>Town 4</option>
          <option>Town 5</option>
        </select>
      </td>
     
    </tr>
  </tbody>

</table>
</section>
<?php $this->load->view('footer'); ?>

<script src="<?= base_url(); ?>assets_new/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
function center_area_on_change(dropDown) {
	


	};


	function getTarifDataSeguroPrivado(dropDown) {


				addRow();
			

	}


	var numRows = 2,
		ti = 5;

	function addRow() {
  $('.form-select').select2('destroy');
  var tableBody = $('table').find("tbody");
  var trLast = tableBody.find("tr:last");
  var trNew = trLast.clone();

  const lastSelectedCountryIndex = trLast.find('.form-select').eq(0).find('option:selected').index();
 
trNew.find('.form-select').eq(0).find('option').eq(lastSelectedCountryIndex).prop('selected', true);

  trLast.after(trNew);
  $('.form-select').select2();
}

$('.form-select').select2();

</script>
</body>

</html>