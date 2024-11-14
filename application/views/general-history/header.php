<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Historial Clínica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons 
  <link href="<?= base_url();?>assets_new/img/favicon.png" rel="icon">
  <link href="<?= base_url();?>assets_new/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oxygen:wght@300&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="<?= base_url();?>assets_new/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/bootstrap-select-1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?= base_url();?>assets_new/img/webfont-medical-icons-master/packages/webfont-medical-icons/css/wfmi-style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>assets_new/css/style.css" rel="stylesheet">
  
   <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  



  <style>

.tab-pane.fade {
  transition: all 0.2s;
  transform: translateX(3rem);
}
 
.tab-pane.fade.show {
  transform: translateX(0rem);
}

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 100,
  'GRAD' -25,
  'opsz' 40
}
</style>
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html1-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- End Logo -->
  <div class="d-flex align-items-center justify-content-between">
	 <a href="#"  onclick='window.history.back()'  class="btn btn-sm btn-outline-primary  btn-back"><i class="bi bi-arrow-left"></i></a>
      <a class="logo d-flex ms-4">
      
        <span>  <img  src="<?= base_url();?>assets_new/img/gicre.jpg"  alt="GICRE" ></span><span style='font-size:18px;text-align:left'>DOC(A) <?=$doctor_name?></span>
      </a>
    </div>
    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
	
<li class="nav-item dropdown li3"   style="display:none">

    <a  class="nav-link nav-icon " href="#"  data-bs-toggle="dropdown">
             <img src="<?= base_url(); ?>assets_new/img/mammogram.png" style="width:26px;background:#FBBDAA" alt="Profile" class="rounded-circle">
            <span class="badge bg-danger badge-number" ><i class="bi bi-exclamation-circle-fill"></i></span>
           </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
		  
		   <li>
              <a class="dropdown-item" href="#">
			  
                <div class="fecha-ultima-pap-value"> </div>
				<div class="fecha-ultima-mama-value"></div>
              </a>
            </li>
		  
            
          </ul><!-- End Notification Dropdown Items -->

        </li>

    <li class="nav-item dropdown " >

          <a title="Alergicos" class="nav-link nav-icon " href="#" id="click-show-alergy" data-bs-toggle="dropdown">
             <i class='fas fa-allergies'></i> 
            <span class="badge bg-warning text-black badge-number number_alergy" ><?=$total_alery?></span>
           </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications ">
            <li class="dropdown-header">
              Alergicos: <span class="number_alergy"><?=$total_alery?></span>
              <!--<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
            </li>
              <hr class="dropdown-divider" />
           
            <div  id="alergy-list" class="alergy-list"></div>


          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
    
        <li class="nav-item dropdown">
                   
          <a title="Medicamentos habituales" class="nav-link nav-icon" href="#" id="click-show-habit-drugs" data-bs-toggle="dropdown">
            <i class='fas fa-pills'></i> 
            <span class="badge bg-danger badge-number number_usual_drug"><?=$total_usual_drug?></span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Medicamentos habituales: <span class="number_usual_drug"><?=$total_usual_drug?></span>
             <!-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
            </li>
              <hr class="dropdown-divider">
			  <div  id="drug-usual-list" class="alergy-list"></div>
            </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
		  <?=$img_patient?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$get_patient_info_by_id['nombre']?></span>
          </a><!-- End Profile Iamge Icon -->
<?php $patient_sexo = ($get_patient_info_by_id['sexo']=='M') ? '<i class="bi bi-gender-male"></i>' : '<i class="bi bi-gender-female"></i>'; ?>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
			<?=$patient_photo_large?>
              <h6><?=$get_patient_info_by_id['nombre']?></h6>
              <!--<span>Datos Basicos Del Paciente</span>-->
			 
			  <span>Edad: <?=$patient_age?> <?=$patient_sexo?></span>
            </li>
            
             <li>
              <hr class="dropdown-divider opacity-50">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-flag"></i>
                <span><?=$get_patient_info_by_id['nacionalidad']?></span>
              </a>
            </li>
           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-person-badge"></i>
                <span><?=$get_patient_info_by_id['cedula']?></span>
              </a>
            </li>
           
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-telephone"></i>
                <span><?=$get_patient_info_by_id['tel_cel']?></span>
              </a>
            </li>
           
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html1">
                <i class="bi bi-sort-numeric-up"></i>
                <span><?=$get_patient_info_by_id['id_p_a']?></span>
              </a>
            </li>
          

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-building"></i>
                <span><?=$get_patient_seguro_info_by_id['title']?></span>
              </a>
            </li>

 <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-geo-alt"></i>
                <span><?=$patient_adress?></span>
              </a>
            </li>





          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

   
	
        <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
   <span class="bi bi-three-dots-vertical"></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li>
        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalReporteGnrl">
            <span class="material-symbols-outlined">summarize</span>&nbsp; Reporte General
        </a>
    </li>
 <?php
	if($area_title !='ophthalmology') {
	?>

    <li>
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalOrdenMedica">
           
            <i class="bi bi-h-circle"></i> <span>Orden Medica</span>
        </a>
    </li>
	<?php
	}
	if($area_title=='ginecology') {
	?>

 <li>
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalColposcopy">
           
            <span><img src="<?= base_url(); ?>assets_new/img/colposcopy.png" width="20"> Colposcopia</span>
        </a>
    </li>
	
	 <li>
	
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalVulvoscopy">
           
            <span><img src="<?= base_url(); ?>assets_new/img/icons8-vagina-50.png" width="20"> Vulvoscopia</span>
        </a>
    </li>
	
	<?php
	} elseif($area_title=='ophthalmology') {
	?>
	 <li>
	
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalRefraction">
             <i class="bi bi-eye"></i>  <span>Refracción</span>
        </a>
    </li>
	<?php
	} 
	
	if($area_title !='ophthalmology') {
	
	?>
	 <li>
	  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalSurgeryDescription1">
             <span class="material-symbols-outlined">medical_services  </span>  <span>&nbsp;&nbsp;Descripción quirúrgica</span>
        </a>
    </li>
	
	
	<?php
	}
	
	?>
</ul><!-- End Profile Dropdown Items -->
</li>
        <li>
          <a class="p-3 ms-3">
		  <?php if(!$isPatientHist) {?>
            <button type="button"  class="btn btn-lg btn-success" id="btnSaveHist" > <i class="bi bi-save2 save-success"> </i></button>
		  <?php } ?>
			<input id="keepOnSavingOption" type="hidden" value="0" />
          </a>
        </li>
   
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <input type="hidden" value="<?= base_url()?>" id="base_url"  />
  <input type="hidden" value="<?=$this->session->userdata('btnSaveHist');?>" id="btnToSaveHistorial"  />


