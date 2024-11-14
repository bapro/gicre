<!DOCTYPE html1>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Historial Clinica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons 
  <link href="<?= base_url();?>assets_new/img/favicon.png" rel="icon">
  <link href="<?= base_url();?>assets_new/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>assets_new/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>assets_new/css/style.css" rel="stylesheet">

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

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html1" class="logo d-flex align-items-center">
      
        <span class="bi bi-clock-history"> Historia Clinica</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

    

        <li class="nav-item dropdown " >

          <a title="Medicamentos Habituales" class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class='fas fa-pills'></i>
            <span class="badge bg-danger badge-number" >2</span>
           </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Medicamentos Habituales: 2
              <!--<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
            </li>
            <!--<li>
              <hr class="dropdown-divider">
            </li>-->

            <li class="notification-item">
              <div>
                <h4 class="px-3">Valodon</h4>
                <!--<p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>-->
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <div>
                <h4  class="px-3">Aspirina</h4>
                <!--<p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>-->
              </div>
            </li>



          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">
                   
          <a title="Alergicos" class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class='fas fa-allergies'></i> 
            <span class="badge bg-danger badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Tiene alergico en 3 cosas:
             <!-- <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <div>
                  <h4 class="px-3">Guayaba</h4>
                
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <div>
                  <h4 class="px-3">Chinola</h4>
                
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <div>
                  <h4 class="px-3">Pepina</h4>
                  <!--<p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>-->
                </div>
              </a>
            </li>
           

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url();?>assets_new/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">YUDERKY MARGARITA</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>YUDERKY MARGARITA PUENTE REYES </h6>
              <span>Datos Basicos Del Paciente</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-flag"></i>
                <span>Dominican Republic</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-person-badge"></i>
                <span>001-098898-0</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html1">
                <i class="bi bi-telephone"></i>
                <span>809-45678900</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html1">
                <i class="bi bi-sort-numeric-up"></i>
                <span>NEC: 6786</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-building"></i>
                <span>SENASA</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a  class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
          <i class="bi bi-grid"></i>
          <span>Antecedentes Generales</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="v-pills-actual-disease-tab" data-bs-toggle="pill" data-bs-target="#v-pills-actual-disease" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">
          <span class="material-symbols-rounded">
            coronavirus
            </span>
          <span>Enfermedad Actual</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html1">
          <i class="bi bi-person"></i>
          <span>Conclusión Diagnóstico</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html1">
          <i class="fa fa-child" aria-hidden="true"></i>
          <span>Pediatrico</span>
        </a>
      </li> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-file" aria-hidden="true"></i><span>Examenes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html1">
              <i class="bi bi-circle"></i><span>Físico</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html1">
              <i class="bi bi-circle"></i><span>Sistema</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Femenina</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html1">
          <i class="bi bi-gender-female"></i>
          <span>SSR</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html1">
          <i class="bi bi-gender-female"></i>
          <span>Obstétrico</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html1">
          <span class="material-symbols-outlined">
            pregnant_woman
            </span>
          <span>Control Prenatal</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#indications-nav" data-bs-toggle="collapse" href="#">
          <i class='fas fa-prescription'></i><span>Indicaciones</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="indications-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html1">
              <i class="bi bi-circle"></i><span>Recetas</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html1">
              <i class="bi bi-circle"></i><span>Estudios</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html1">
              <i class="bi bi-circle"></i><span>Laboratorios</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <hr class="divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html1">
          <i class="bi bi-folder"></i>
          <span>Documentos</span>
        </a>
      </li> 
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Antecedentes Personales, Familiares y Patologicos</h1>
     
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <table class="table table-striped" style="width:80%">
              <thead>
              <tr>
              <th class="col-xs-7">Marque los hallazgos</th>
              <!--<th class="col-xs-5"><input type="checkbox" name="todo"  id="select_all" checked>&nbsp;Todo</th>-->
              <th class="col-xs-5"><span class="rows_selected" id="select_count">0</span></th>
              <th class="col-xs-1">Pers.</th>
              <th class="col-xs-1">Padre</th>
              <th class="col-xs-1">Madre</th>
              <th class="col-xs-1">Hnos</th>
              <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>
              
              <td>
              Cardiopatia
              </td>
              <td ><input type="checkbox"  name="car_nin" class="emp_checkbox form-check-input niguno_checked1"> <span class="marco-nin">Ninguno</label></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox"  name="car_pe" class="check-all form-check-input check_pers"></td>
              <td style="text-align:center"><input type="checkbox" id="padre_checkbox" name="car_p" class="check-all form-check-input check_padre"></td>
              <td style="text-align:center"><input type="checkbox" id="madre_checkbox" name="car_m" class="check-all form-check-input check_madre" ></td>
              <td style="text-align:center"><input type="checkbox" name="car_h" class="check-all form-check-input check_hnos"></td>
              <td><input type="text"  id="car_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Hipertension</td>
              <td><input type="checkbox"  name="hip_nin"  class="emp_checkbox form-check-input niguno_checked2"> <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hip_pe" class="check-all form-check-input check_pers2"></td>
              <td style="text-align:center"><input type="checkbox" name="hip_p" class="check-all form-check-input check_padre2"></td>
              <td style="text-align:center"><input type="checkbox" name="hip_m" class="check-all form-check-input check_madre2" ></td>
              <td style="text-align:center"><input type="checkbox" name="hip_h" class="check-all form-check-input check_hnos2"></td>
              <td><input type="text" id="hip_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Enf. Cerebrovascular</td>
              <td><input type="checkbox" name="ec_nin"  class="emp_checkbox form-check-input niguno_checked3"> <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="ec_pe" class="check-all form-check-input check_pers3"></td>
              <td style="text-align:center"><input type="checkbox" name="ec_p" class="check-all form-check-input check_padre3"></td>
              <td style="text-align:center"><input type="checkbox" name="ec_m" class="check-all form-check-input check_madre3"></td>
              <td style="text-align:center"><input type="checkbox" name="ec_h" class="check-all form-check-input check_hnos3"></td>
              <td><input type="text" id="ec_text" class="text-marquo  form-control"></td>
              </tr>
              
              <tr>
              <td>Epilepsia</td>
              <td><input type="checkbox" name="ep_nin"  class="emp_checkbox form-check-input niguno_checked4" > <span class="marco-nin">Ninguno</span></td>
              <td  style="border:2px solid yellow;text-align:center"><input type="checkbox" name="ep_pe" class="check-all form-check-input check_pers4"></td>
              <td style="text-align:center"><input type="checkbox" name="ep_p" class="check-all form-check-input check_padre4"></td>
              <td style="text-align:center"><input type="checkbox" name="ep_m" class="check-all form-check-input check_madre4 "></td>
              <td style="text-align:center"><input type="checkbox" name="ep_h" class="check-all form-check-input check_hnos4"></td>
              <td><input type="text" id="ep_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Asma Bronquial</td>
              <td><input type="checkbox" name="as_nin"  class="emp_checkbox form-check-input niguno_checked5" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="as_pe" class="check-all form-check-input check_pers5"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="as_p" class="check-all form-check-input check_padre5"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="as_m" class="check-all form-check-input check_madre5"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="as_h" class="check-all form-check-input check_hnos5"></td>
              <td><input type="text" id="as_text" class="text-marquo form-control"></td>
              </tr>
              
              
              <tr>
              <td>Enf. Repiratoria (Esp.)</td>
              <td><input type="checkbox" name="enre_nin"  class="emp_checkbox form-check-input niguno_checked05" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="enre_pe" class="check-all form-check-input check_pers05"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="enre_p" class="check-all form-check-input check_padre05"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="enre_m" class="check-all form-check-input check_madre05"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="enre_h" class="check-all form-check-input check_hnos05"></td>
              <td><input type="text" id="enre_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Diabetes</td>
              <td><input type="checkbox" name="dia_nin"  class="emp_checkbox form-check-input niguno_checked7" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="dia_pe" class="check-all form-check-input check_pers7"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="dia_p" class="check-all form-check-input check_padre7"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="dia_m" class="check-all form-check-input check_madre7"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="dia_h" class="check-all form-check-input check_hnos7"></td>
              <td><input type="text" id="dia_text" class="text-marquo form-control"></td>
              </tr>
              
              
              
              <tr>
              <td>Tuberculosis</td>
              <td><input type="checkbox" name="tub_nin"  class="emp_checkbox form-check-input niguno_checked6" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="tub_pe" class="check-all form-check-input check_pers6"></td>
              <td  style="text-align:center"><input type="checkbox" name="tub_p" class="check-all form-check-input check_padre6"></td>
              <td style="text-align:center"><input type="checkbox" name="tub_m" class="check-all form-check-input check_madre6"></td>
              <td style="text-align:center"><input type="checkbox" name="tub_h" class="check-all form-check-input check_hnos6"></td>
              <td><input type="text" id="tub_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Tiroides</td>
              <td><input type="checkbox" name="tir_nin"  class="emp_checkbox form-check-input niguno_checked8" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="tir_pe" class="check-all form-check-input check_pers8"></td>
              <td style="text-align:center"><input type="checkbox" name="tir_p" class="check-all form-check-input check_padre8"></td>
              <td style="text-align:center"><input type="checkbox" name="tir_m" class="check-all form-check-input check_madre8"></td>
              <td style="text-align:center"><input type="checkbox" name="tir_h" class="check-all form-check-input check_hnos8"></td>
              <td><input type="text" id="tir_text" class="text-marquo form-control"></td>
              </tr>
              <tr>
              <td>Hepatitis (Tipo)&nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo"></td>
              <td><input type="checkbox" name="hep_nin"  class="emp_checkbox form-check-input niguno_checked9" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hep_pe" class="check-all form-check-input check_pers9"></td>
              <td style="text-align:center"><input type="checkbox" name="hep_p" class="check-all form-check-input check_padre9"></td>
              <td style="text-align:center"><input type="checkbox" name="hep_m" class="check-all form-check-input check_madre9"></td>
              <td style="text-align:center"><input type="checkbox" name="hep_h" class="check-all form-check-input check_hnos9"></td>
              <td><input type="text" id="hep_text" class="text-marquo form-control"></td>
              </tr>
              <tr>
              <td>Enfermedades Renales</td>
              <td><input type="checkbox" name="enfr_nin"  class="emp_checkbox form-check-input niguno_checked10" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="enfr_pe" class="check-all form-check-input check_pers10"></td>
              <td style="text-align:center"><input type="checkbox" name="enfr_p" class="check-all form-check-input check_padre10"></td>
              <td style="text-align:center"><input type="checkbox" name="enfr_m" class="check-all form-check-input check_madre10"></td>
              <td style="text-align:center"><input type="checkbox" name="enfr_h" class="check-all form-check-input check_hnos10"></td>
              <td><input type="text" id="enfr_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Falcemia</td>
              <td><input type="checkbox" name="falc_nin"  class="emp_checkbox form-check-input niguno_checked11" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="falc_pe" class="check-all form-check-input check_pers11"></td>
              <td style="text-align:center"><input type="checkbox" name="falc_p" class="check-all form-check-input check_padre11"></td>
              <td style="text-align:center"><input type="checkbox" name="falc_m" class="check-all form-check-input check_madre11"></td>
              <td style="text-align:center"><input type="checkbox" name="falc_h" class="check-all form-check-input check_hnos11"></td>
              <td><input type="text" id="falc_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Neoplasias</td>
              <td><input type="checkbox" name="neop_nin"  class="emp_checkbox form-check-input niguno_checked12" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="neop_pe" class="check-all form-check-input check_pers12"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="neop_p" class="check-all form-check-input check_padre12"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="neop_m" class="check-all form-check-input check_madre12"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="neop_h" class="check-all form-check-input check_hnos12"></td>
              <td><input type="text" id="neop_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>ENf. Siquiatricas</td>
              <td><input type="checkbox" name="psi_nin"  class="emp_checkbox form-check-input niguno_checked13" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="psi_pe" class="check-all form-check-input check_pers13"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="psi_p" class="check-all form-check-input check_padre13"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="psi_m" class="check-all form-check-input check_madre13"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="psi_h" class="check-all form-check-input check_hnos13"></td>
              <td><input type="text" id="psi_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Obesidad</td>
              <td><input type="checkbox" name="obs_nin"  class="emp_checkbox form-check-input niguno_checked14" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="obs_pe" class="check-all form-check-input check_pers14"></td>
              <td style="text-align:center"><input type="checkbox" name="obs_p" class="check-all form-check-input check_padre14"></td>
              <td style="text-align:center"><input type="checkbox" name="obs_m" class="check-all form-check-input check_madre14"></td>
              <td style="text-align:center"><input type="checkbox" name="obs_h" class="check-all form-check-input check_hnos14"></td>
              <td><input type="text" id="obs_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Ulcera Peptica</td>
              <td><input type="checkbox" name="ulp_nin"  class="emp_checkbox form-check-input niguno_checked15" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="ulp_pe" class="check-all form-check-input check_pers15"></td>
              <td style="text-align:center"><input type="checkbox" name="ulp_p" class="check-all form-check-input check_padre15"></td>
              <td style="text-align:center"><input type="checkbox" name="ulp_m" class="check-all form-check-input check_madre15"></td>
              <td style="text-align:center"><input type="checkbox" name="ulp_h" class="check-all form-check-input check_hnos15"></td>
              <td><input type="text" id="ulp_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Artritis, Gota</td>
              <td><input type="checkbox" name="art_nin"  class="emp_checkbox form-check-input niguno_checked16" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="art_pe" class="check-all form-check-input check_pers16"></td>
              <td  style="border:2px solid yellow;text-align:center"><input type="checkbox" name="art_p" class="check-all form-check-input check_padre16"></td>
              <td  style="border:2px solid yellow;text-align:center"><input type="checkbox" name="art_m" class="check-all form-check-input check_madre16"></td>
              <td  style="border:2px solid yellow;text-align:center"><input type="checkbox" name="art_h" class="check-all form-check-input check_hnos16"></td>
              <td><input type="text" id="art_text" class="text-marquo form-control"></td>
              </tr>
              
              <tr>
              <td>Enf. Hematológicas (Esp.)</td>
              <td><input type="checkbox" name="hem_nin"  class="emp_checkbox form-check-input niguno_checked016" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hem_pe" class="check-all form-check-input check_pers016"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hem_p" class="check-all form-check-input check_padre016"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hem_m" class="check-all form-check-input check_madre016"></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="hem_h" class="check-all form-check-input check_hnos016"></td>
              <td><input type="text" id="hem_text" class="text-marquo form-control"></td>
              </tr>
              
              
              
              
              <tr>
              <td>Zika</td>
              <td><input type="checkbox" name="zika_nin"  class="emp_checkbox form-check-input niguno_checked17" > <span class="marco-nin">Ninguno</span></td>
              <td style="border:2px solid yellow;text-align:center"><input type="checkbox" name="zika_pe" class="check-all form-check-input check_pers17"></td>
              <td style="text-align:center"><input type="checkbox" name="zika_p" class="check-all form-check-input check_padre17"></td>
              <td style="text-align:center"><input type="checkbox" name="zika_m" class="check-all form-check-input check_madre17"></td>
              <td style="text-align:center"><input type="checkbox" name="zika_h" class="check-all form-check-input check_hnos17"></td>
              <td><input type="text" id="zika_text" class="text-marquo form-control"></td>
              </tr>
              <!--<tr>
              <th></th><th style="width:100%"><span class="rows_selected2" id="select_count2" style="font-size:12px;">0 Seleccionada </span></th><th></th><th></th><th></th><th></th><th></th>
              </tr>-->
              <tr style="background:none">
              <td colspan="5">Otros<br/> <textarea cols="40" id="otros" class="form-control text-marquo"></textarea></td>
              </tr>
              </tbody>
              </table>
              </div>
              </div>		  
              
              
          <div class="tab-pane fade" id="v-pills-actual-disease" role="tabpanel" aria-labelledby="v-pills-actual-disease-tab">
           fdgdgdg dgf
          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
          </div>
        </div>

        <div class="row" style="background:none">

          <div class="card" style="background:none">
            <div class="card-body">
              <!--<h5 class="card-title">Accordion without outline borders</h5>

               Accordion without outline borders -->
              <div class="accordion accordion-flush" id="accordionFlushExample" style="background:none">
                <div class="accordion-item" style="background:none">
                  <h2 class="accordion-header" id="flush-sosAbMal">
                    <button class="card-title accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSosAbMal" aria-expanded="false" aria-controls="flush-collapseSosAbMal">
                      Sospecha De Abuso O Maltrato
                    </button>
                  </h2>
                  <div id="flush-collapseSosAbMal" class="accordion-collapse collapse" aria-labelledby="flush-sosAbMal" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="col-sm-10">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" id="floatingAlAl" placeholder="Niguno">
                          <label for="floatingAlAl">Alimentos Alergicos</label>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingMedAl" placeholder="Niguno">
                          <label for="floatingMedAl">Medicamentos Alergicos</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingOtAl" placeholder="Niguno">
                          <label for="floatingOtAl">Otros Alergicos</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item" style="background:none">
                  <h2 class="accordion-header" id="flush-antAlRxMed">
                    <button class="card-title accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseAntAlRxMed" aria-expanded="false" aria-controls="flush-collapseAntAlRxMed">
                      Antecedentes Alergicos Y Reaccion A Medicamentos
                    </button>
                  </h2>
                  <div id="flush-collapseAntAlRxMed" class="accordion-collapse collapse" aria-labelledby="flush-antAlRxMed" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                  </div>
                </div>
                <div class="accordion-item" style="background:none">
                  <h2 class="accordion-header" id="flush-otrosAnt">
                    <button class="card-title accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOtrosAnt" aria-expanded="false" aria-controls="flush-collapseOtrosAnt">
                      Otros Antecedentes
                    </button>
                  </h2>
                  <div id="flush-collapseOtrosAnt" class="accordion-collapse collapse" aria-labelledby="flush-otrosAnt" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                  </div>
                </div>
                
              </div><!-- End Accordion without outline borders -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>assets_new/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/chart.js/chart.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>assets_new/js/main.js"></script>

</body>

</html>