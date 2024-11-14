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
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oxygen:wght@300&display=swap" rel="stylesheet">


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
<link href="<?= base_url();?>assets_new/img/webfont-medical-icons-master/packages/webfont-medical-icons/css/wfmi-style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>assets_new/css/style.css" rel="stylesheet">
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

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html1" class="logo d-flex align-items-center">
      
        <span class="bi bi-journal-medical"> Historia Clinica</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--<div class="alert alert-success" role="alert">
          Los mensages se montran aqui.
        </div>-->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      <li  title="Resumen de la ultima historia clinica">
      <a href="#" class="nav-link nav-icon"  data-bs-toggle="modal" data-bs-target="#largeModalResumenHist"><span class="material-symbols-outlined">summarize</span></a>
    </li>
    

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
                <h6 class="px-3">Valodon</h6>
                <!--<p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>-->
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <div>
                <h6  class="px-3">Aspirina</h6>
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
              
                <div>
                  <h6 class="px-3">Guayaba</h6>
                
                </div>
             
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              
                <div>
                  <h6 class="px-3">Chinola</h6>
                
                </div>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
             
                <div>
                  <h6 class="px-3">Pepina</h6>
                  <!--<p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>-->
                </div>
              
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
			  <br/>
			  <span>28 años <i class="bi bi-gender-male"></i></span>
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
        <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
   <span class="bi bi-three-dots-vertical"></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li>
        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalReporteGnrl">
             <span>Reporte General</span>
        </a>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>

    <li>
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalOrdenMedica">
           
            <span>Orden Medica</span>
        </a>
    </li>
   

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->
        <li>
          <a class="p-3 ms-3">
            <button type="button" class="btn btn-lg btn-success"><i class="bi bi-save2"></i> </button>
          </a>
        </li>
          
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <aside id="sidebar" class="sidebar">

<ul class="nav flex-column nav-pills sidebar-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<li class="nav-item">
<a class="nav-link active collapsed" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
<i class="material-symbols-outlined">rate_review </i> <span> Antecedentes Generales</span>
</a>
</li>



  <li class="nav-item">
  <a class="nav-link collapsed" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" href="#" role="tab" aria-controls="v-pills-profile" aria-selected="false">
  <i class="material-symbols-outlined">
  sick
  </i>
  <span>Enfermedad Actual</span></a>
  </li>
    
  <li class="nav-item">
  <a class="nav-link collapsed" id="v-pills-condiag-tab" data-bs-toggle="pill" data-bs-target="#v-pills-condiag" href="#" role="tab" aria-controls="v-pills-condiag" aria-selected="false">
      <i class="material-symbols-outlined">
  summarize
  </i>
      <span>Conclusión Diagnóstico</span></a>
  </li>
    
 <li class="nav-item">
  <a class="nav-link collapsed" id="v-pills-sigVital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sigVital" href="#" role="tab" aria-controls="v-pills-sigVital" aria-selected="false">
<i class="material-symbols-outlined">monitor_heart</i><span> Signos Vitales</span></a>
  </li>

    
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#indications-nav" data-bs-toggle="collapse" href="#">
        <i class='fas fa-prescription'></i><span>Indicaciones</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="indications-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a class="nav-link collapsed" id="v-pills-recetas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-recetas" href="#" role="tab" aria-controls="v-pills-recetas" aria-selected="false">
            <i class="bi bi-circle"></i><span>Recetas</span>
          </a>
        </li>
        <li>
          <a class="nav-link collapsed" id="v-pills-estudios-tab" data-bs-toggle="pill" data-bs-target="#v-pills-estudios" href="#" role="tab" aria-controls="v-pills-estudios" aria-selected="false">
            <i class="bi bi-circle"></i><span>Estudios</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Laboratorios</span>
          </a>
        </li>
      </ul>
	  
    </li>
	 
    

    
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="bi bi-folder"></i>
        <span>Documentos</span>
      </a>
    </li> 
</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">


<div class="tab-content" id="v-pills-tabContent">
   <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="background:none;border:none">

       <div class="card-body" style="background:none;border:none">
         <h5 class="card-title">Antecedentes Generales</h5>
           <div class="accordion accordion-flush" id="accordionFlushExample" style="background:none;border:none">


           <div class="accordion-item" style="background:none">
                        <h2 class="accordion-header" id="flush-antGnl">

                          
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseantGnl" aria-expanded="false" aria-controls="flush-collapseantGnl">
                            Antecedentes Personales, Familiares y Patologicos
                          </button>
                        </h2>
                        <div id="flush-collapseantGnl" class="accordion-collapse collapse" aria-labelledby="flush-antGnl" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            <div class="col-sm-12">
                       
              <!-- Default Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">1- Personales y Familiares</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="antAlegReactMed-tab" data-bs-toggle="tab" data-bs-target="#antAlegReactMed" type="button" role="tab" aria-controls="antAlegReactMed" aria-selected="false"> 2- Alergicos Y Reacción A Medicamentos</button>
                </li>
				 <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pediatry-tab" data-bs-toggle="tab" data-bs-target="#pediatry" type="button" role="tab" aria-controls="pediatry" aria-selected="false"> 3- Pediatrico</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="otrosAnt-tab" data-bs-toggle="tab" data-bs-target="#otrosAnt" type="button" role="tab" aria-controls="otrosAnt" aria-selected="false"> 4- Otros Antecedentes</button>
                </li>
				 
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
   <div class="table-responsive">
       <table class="table table-striped" >
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
                    <td style="text-align:center"><input type="checkbox"  name="car_pe" class="check-all form-check-input check_pers"></td>
                    <td style="text-align:center"><input type="checkbox" id="padre_checkbox" name="car_p" class="check-all form-check-input check_padre"></td>
                    <td style="text-align:center"><input type="checkbox" id="madre_checkbox" name="car_m" class="check-all form-check-input check_madre" ></td>
                    <td style="text-align:center"><input type="checkbox" name="car_h" class="check-all form-check-input check_hnos"></td>
                    <td><input type="text"  id="car_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Hipertension</td>
                    <td><input type="checkbox"  name="hip_nin"  class="emp_checkbox form-check-input niguno_checked2"> <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="hip_pe" class="check-all form-check-input check_pers2"></td>
                    <td style="text-align:center"><input type="checkbox" name="hip_p" class="check-all form-check-input check_padre2"></td>
                    <td style="text-align:center"><input type="checkbox" name="hip_m" class="check-all form-check-input check_madre2" ></td>
                    <td style="text-align:center"><input type="checkbox" name="hip_h" class="check-all form-check-input check_hnos2"></td>
                    <td><input type="text" id="hip_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Enf. Cerebrovascular</td>
                    <td><input type="checkbox" name="ec_nin"  class="emp_checkbox form-check-input niguno_checked3"> <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="ec_pe" class="check-all form-check-input check_pers3"></td>
                    <td style="text-align:center"><input type="checkbox" name="ec_p" class="check-all form-check-input check_padre3"></td>
                    <td style="text-align:center"><input type="checkbox" name="ec_m" class="check-all form-check-input check_madre3"></td>
                    <td style="text-align:center"><input type="checkbox" name="ec_h" class="check-all form-check-input check_hnos3"></td>
                    <td><input type="text" id="ec_text" class="text-marquo  form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Epilepsia</td>
                    <td><input type="checkbox" name="ep_nin"  class="emp_checkbox form-check-input niguno_checked4" > <span class="marco-nin">Ninguno</span></td>
                    <td  style="text-align:center"><input type="checkbox" name="ep_pe" class="check-all form-check-input check_pers4"></td>
                    <td style="text-align:center"><input type="checkbox" name="ep_p" class="check-all form-check-input check_padre4"></td>
                    <td style="text-align:center"><input type="checkbox" name="ep_m" class="check-all form-check-input check_madre4 "></td>
                    <td style="text-align:center"><input type="checkbox" name="ep_h" class="check-all form-check-input check_hnos4"></td>
                    <td><input type="text" id="ep_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Asma Bronquial</td>
                    <td><input type="checkbox" name="as_nin"  class="emp_checkbox form-check-input niguno_checked5" > <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="as_pe" class="check-all form-check-input check_pers5"></td>
                    <td style="text-align:center"><input type="checkbox" name="as_p" class="check-all form-check-input check_padre5"></td>
                    <td style="text-align:center"><input type="checkbox" name="as_m" class="check-all form-check-input check_madre5"></td>
                    <td style="text-align:center"><input type="checkbox" name="as_h" class="check-all form-check-input check_hnos5"></td>
                    <td><input type="text" id="as_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    
                    <tr>
                    <td>Enf. Repiratoria (Esp.)</td>
                    <td><input type="checkbox" name="enre_nin"  class="emp_checkbox form-check-input niguno_checked05" > <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="enre_pe" class="check-all form-check-input check_pers05"></td>
                    <td style="text-align:center"><input type="checkbox" name="enre_p" class="check-all form-check-input check_padre05"></td>
                    <td style="text-align:center"><input type="checkbox" name="enre_m" class="check-all form-check-input check_madre05"></td>
                    <td style="text-align:center"><input type="checkbox" name="enre_h" class="check-all form-check-input check_hnos05"></td>
                    <td><input type="text" id="enre_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Diabetes</td>
                    <td><input type="checkbox" name="dia_nin"  class="emp_checkbox form-check-input niguno_checked7" > <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="dia_pe" class="check-all form-check-input check_pers7"></td>
                    <td style="text-align:center"><input type="checkbox" name="dia_p" class="check-all form-check-input check_padre7"></td>
                    <td style="text-align:center"><input type="checkbox" name="dia_m" class="check-all form-check-input check_madre7"></td>
                    <td style="text-align:center"><input type="checkbox" name="dia_h" class="check-all form-check-input check_hnos7"></td>
                    <td><input type="text" id="dia_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    
                    
                    <tr>
                    <td>Tuberculosis</td>
                    <td><input type="checkbox" name="tub_nin"  class="emp_checkbox form-check-input niguno_checked6" > <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="tub_pe" class="check-all form-check-input check_pers6"></td>
                    <td  style="text-align:center"><input type="checkbox" name="tub_p" class="check-all form-check-input check_padre6"></td>
                    <td style="text-align:center"><input type="checkbox" name="tub_m" class="check-all form-check-input check_madre6"></td>
                    <td style="text-align:center"><input type="checkbox" name="tub_h" class="check-all form-check-input check_hnos6"></td>
                    <td><input type="text" id="tub_text" class="text-marquo form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Tiroides</td>
                    <td><input type="checkbox" name="tir_nin"  class="emp_checkbox form-check-input niguno_checked8" > <span class="marco-nin">Ninguno</span></td>
                    <td style="text-align:center"><input type="checkbox" name="tir_pe" class="check-all form-check-input check_pers8"></td>
                    <td style="text-align:center"><input type="checkbox" name="tir_p" class="check-all form-check-input check_padre8"></td>
                    <td style="text-align:center"><input type="checkbox" name="tir_m" class="check-all form-check-input check_madre8"></td>
                    <td style="text-align:center"><input type="checkbox" name="tir_h" class="check-all form-check-input check_hnos8"></td>
                    <td><input type="text" id="tir_text" class="text-marquo form-control"></td>
                    </tr>
                    </tbody>
                    </table>
                    <div class="accordion accordion-flush" id="masAntGnrl">
	  
                      <div class="accordion-item">
                                       <h2 class="accordion-header" id="flush-masAntGnrl">
                                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwoFis" aria-expanded="false" aria-controls="flush-collapseTwoFis">
                                          <i class="bi bi-arrow-down"></i> <strong><em>ver mas antecedentes</em></strong> 
                               
                                         </button>
                                       </h2>
                                       <div id="flush-collapseTwoFis" class="accordion-collapse collapse" aria-labelledby="flush-masAntGnrl" data-bs-parent="#masAntGnrl">
                                         <table class="table table-striped" >
                                         
                                          <tbody>
                                       <tr>
                                       <td>Hepatitis (Tipo)&nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo"></td>
                                       <td><input type="checkbox" name="hep_nin"  class="emp_checkbox form-check-input niguno_checked9" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="hep_pe" class="check-all form-check-input check_pers9"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hep_p" class="check-all form-check-input check_padre9"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hep_m" class="check-all form-check-input check_madre9"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hep_h" class="check-all form-check-input check_hnos9"></td>
                                       <td><input type="text" id="hep_text" class="text-marquo form-control"></td>
                                       </tr>
                                       <tr>
                                       <td>Enfermedades Renales</td>
                                       <td><input type="checkbox" name="enfr_nin"  class="emp_checkbox form-check-input niguno_checked10" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="enfr_pe" class="check-all form-check-input check_pers10"></td>
                                       <td style="text-align:center"><input type="checkbox" name="enfr_p" class="check-all form-check-input check_padre10"></td>
                                       <td style="text-align:center"><input type="checkbox" name="enfr_m" class="check-all form-check-input check_madre10"></td>
                                       <td style="text-align:center"><input type="checkbox" name="enfr_h" class="check-all form-check-input check_hnos10"></td>
                                       <td><input type="text" id="enfr_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Falcemia</td>
                                       <td><input type="checkbox" name="falc_nin"  class="emp_checkbox form-check-input niguno_checked11" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="falc_pe" class="check-all form-check-input check_pers11"></td>
                                       <td style="text-align:center"><input type="checkbox" name="falc_p" class="check-all form-check-input check_padre11"></td>
                                       <td style="text-align:center"><input type="checkbox" name="falc_m" class="check-all form-check-input check_madre11"></td>
                                       <td style="text-align:center"><input type="checkbox" name="falc_h" class="check-all form-check-input check_hnos11"></td>
                                       <td><input type="text" id="falc_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Neoplasias</td>
                                       <td><input type="checkbox" name="neop_nin"  class="emp_checkbox form-check-input niguno_checked12" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="neop_pe" class="check-all form-check-input check_pers12"></td>
                                       <td style="text-align:center"><input type="checkbox" name="neop_p" class="check-all form-check-input check_padre12"></td>
                                       <td style="text-align:center"><input type="checkbox" name="neop_m" class="check-all form-check-input check_madre12"></td>
                                       <td style="text-align:center"><input type="checkbox" name="neop_h" class="check-all form-check-input check_hnos12"></td>
                                       <td><input type="text" id="neop_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>ENf. Siquiatricas</td>
                                       <td><input type="checkbox" name="psi_nin"  class="emp_checkbox form-check-input niguno_checked13" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="psi_pe" class="check-all form-check-input check_pers13"></td>
                                       <td style="text-align:center"><input type="checkbox" name="psi_p" class="check-all form-check-input check_padre13"></td>
                                       <td style="text-align:center"><input type="checkbox" name="psi_m" class="check-all form-check-input check_madre13"></td>
                                       <td style="text-align:center"><input type="checkbox" name="psi_h" class="check-all form-check-input check_hnos13"></td>
                                       <td><input type="text" id="psi_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Obesidad</td>
                                       <td><input type="checkbox" name="obs_nin"  class="emp_checkbox form-check-input niguno_checked14" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="obs_pe" class="check-all form-check-input check_pers14"></td>
                                       <td style="text-align:center"><input type="checkbox" name="obs_p" class="check-all form-check-input check_padre14"></td>
                                       <td style="text-align:center"><input type="checkbox" name="obs_m" class="check-all form-check-input check_madre14"></td>
                                       <td style="text-align:center"><input type="checkbox" name="obs_h" class="check-all form-check-input check_hnos14"></td>
                                       <td><input type="text" id="obs_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Ulcera Peptica</td>
                                       <td><input type="checkbox" name="ulp_nin"  class="emp_checkbox form-check-input niguno_checked15" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="ulp_pe" class="check-all form-check-input check_pers15"></td>
                                       <td style="text-align:center"><input type="checkbox" name="ulp_p" class="check-all form-check-input check_padre15"></td>
                                       <td style="text-align:center"><input type="checkbox" name="ulp_m" class="check-all form-check-input check_madre15"></td>
                                       <td style="text-align:center"><input type="checkbox" name="ulp_h" class="check-all form-check-input check_hnos15"></td>
                                       <td><input type="text" id="ulp_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Artritis, Gota</td>
                                       <td><input type="checkbox" name="art_nin"  class="emp_checkbox form-check-input niguno_checked16" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="art_pe" class="check-all form-check-input check_pers16"></td>
                                       <td  style="text-align:center"><input type="checkbox" name="art_p" class="check-all form-check-input check_padre16"></td>
                                       <td  style="text-align:center"><input type="checkbox" name="art_m" class="check-all form-check-input check_madre16"></td>
                                       <td  style="text-align:center"><input type="checkbox" name="art_h" class="check-all form-check-input check_hnos16"></td>
                                       <td><input type="text" id="art_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Enf. Hematológicas (Esp.)</td>
                                       <td><input type="checkbox" name="hem_nin"  class="emp_checkbox form-check-input niguno_checked016" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="hem_pe" class="check-all form-check-input check_pers016"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hem_p" class="check-all form-check-input check_padre016"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hem_m" class="check-all form-check-input check_madre016"></td>
                                       <td style="text-align:center"><input type="checkbox" name="hem_h" class="check-all form-check-input check_hnos016"></td>
                                       <td><input type="text" id="hem_text" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       
                                       
                                       
                                       <tr>
                                       <td>Zika</td>
                                       <td><input type="checkbox" name="zika_nin"  class="emp_checkbox form-check-input niguno_checked17" > <span class="marco-nin">Ninguno</span></td>
                                       <td style="text-align:center"><input type="checkbox" name="zika_pe" class="check-all form-check-input check_pers17"></td>
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
                            </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="antAlegReactMed" role="tabpanel" aria-labelledby="antAlegReactMed-tab">
                     <div class="row">
                     
                      <div class="col-md-6">
                        <div class="form-floating mb-1">
                          <input type="email" class="form-control" id="floatingAlAl" placeholder="Niguno">
                          <label for="floatingAlAl">Alimentos Alergicos</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="inputState" class="form-label">Continua siendo alergico?</label>
                        <br/>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Agregar Otro Alimento</button>
                      <br/><br/>
                      </div>
         
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-floating mb-1">
                            <input type="email" class="form-control" id="floatingAlAl" placeholder="Niguno">
                            <label for="floatingAlAl">Medicamentos Alergicos</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="inputState" class="form-label">Continua siendo alergico?</label>
                          <br/>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                          <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i>  Agregar Otro Medicamento</button>
                          <br/><br/>
                        </div>
                       
                        </div>
                              
                            
                              
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingOtAl" placeholder="Niguno">
                                <label for="floatingOtAl">Otros Alergicos</label>
                              </div>
      
                              
                            </div>
							
							

<div class="tab-pane fade" id="pediatry" role="tabpanel" aria-labelledby="pediatry-tab">
            <h4 class="card-title"> Pediatrico</h4>
            <div class="row">
			<div class="col-lg-6">
			    <form class="row g-3">
                <div class="col-md-12">
                  <label >Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Normal
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Complicado
                    </label>
                  </div>
                  
                </div>
				 <div class="col-md-12">
				  <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Describa" ></textarea>
                <label for="floatingAbdominal">Describa</label>
              </div>
				 </div>
				    <div class="form-floating mb-3">
		<select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected>Seleccione</option>
		  <option value="1">Predetermino</option>
		  <option value="2">Determino</option>
		  <option value="3">Post termino</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Edad gestacional al momento del nacimiento</label>
	  </div>
	   <div class="col-md-12">
	   <label >Alimentos</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Lactancia Materna
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Leche de formulas
                    </label>
                  </div>
                  <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Otros" ></textarea>
                <label for="floatingAbdominal">Otros</label>
              </div>
                </div>
				
				  <div class="col-md-12">
                  <label >Traumatico/somatico, psicologico</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Si
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     No
                    </label>
                  </div>
                  <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Otros" ></textarea>
                <label for="floatingAbdominal">Detalle</label>
              </div>
                </div>
				  <div class="col-md-12">
                  <label >Transfusionales</label> 
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Si
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     No
                    </label>
                  </div>
                  <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Otros" ></textarea>
                <label for="floatingAbdominal">Detalle</label>
              </div>
                </div>
				</form>
			</div>
			
			<div class="col-lg-6">
			   <form class="row g-3">
                <div class="col-md-12">
                  <label >Tipo de nacimiento</label><br/>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Parto
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Cesarea
                    </label>
                  </div>
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Desconocido
                    </label>
                  </div>
				  
                </div>
				<div class="col-md-12">
				  <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Describa" ></textarea>
                <label for="floatingAbdominal">Describa</label>
              </div>
				 </div>
				 <div class="col-md-4">
				  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Desconocido
                    </label>
                  </div>
				 <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Peso al Nacer" />
                <label for="floatingAbdominal">Peso al nacer</label>
              </div>
				 </div>
				 <div class="col-md-4">
				  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Desconocido
                    </label>
                  </div>
				 <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Talla al nacer" />
                <label for="floatingAbdominal">Talla al nacer</label>
              </div>
				 </div>
				 
				       <div class="row">
					   <label >Patologias</label>
					    <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Alergia
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Amigdalitis
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Asma
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Cirugias
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Dengue
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Diarrea
                    </label>
                  </div>
				      <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Zika
                    </label>
                  </div>
				      <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Chicungunya
                    </label>
                  </div>
				    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Falcemia
                    </label>
                  </div>
				 </div>
				 
				    <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Hepatitis
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                       Infeccion vias urinarias
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Neumoria
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Ototis
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Paperas
                    </label>
                  </div>
				     <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Parasitosis
                    </label>
                  </div>
				      <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Sarampion
                    </label>
                  </div>
				      <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Varicela
                    </label>
                  </div>
				    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Otros
                    </label>
                  </div>
				 </div>
				  </div>
				 
				 
				 
				 
				</form>
			</div>
			<div class="col-lg-12">
			<h6 class="h6">VACUNACION</h6>
			 <div class="table-responsive">
<table class="table  table-striped table-bordered" >
<?php foreach($date_nacer as $dn)?>
  
  <tr>
<th></th>
<th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$dn->date_nacer?></span></th>
<th class="col-xs-2">
<input  id="insert_d"  type="hidden" value="<?=$dn->date_nacer?>"  > 
</th>
<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th>
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th>1era. Dosis</th>
<th>2da. Dosis</th>
<th>3era. Dosis</th>
<th> 1er.Refuerzo</th>
<th>2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG</th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date no_ap_sh1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1" style="display:none;background:red">
<input type="text"  class="form-control bcgno"  id="no_ap11"  readonly >
<span id="frem1"  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"  style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg1">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg1"  />
<span style="display:none;color:red"  class="atras1"><i>Dias de atraso : <input type="text" id="resf1" class="resf1" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2 no_ap_sh2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap22"  readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg2">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg2"  />
<span style="display:none;color:red;" class="atras2"><i>Dias de atraso : <input type="text" class="resf2" id="resf2" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3 no_ap_sh3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap33"  readonly >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel3">
<input  id="mirror_d3"  type="hidden"  > 
<span style="display:none;color:red" class="atras3"><i>Dias de atraso : <input type="text" id="resf3" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4 no_ap_sh4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap4" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap44"  readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl4">
<input  id="mirror_d4"  type="hidden"  > 
<span style="display:none;color:red" class="atras4">
<i>Dias de atraso : <input type="text" id="resf4" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap5" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap55"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel5">
<input  id="mirror_d5"  type="hidden"  > 
<span style="display:none;color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf5" style="pointer-events:none;border:none;width:50px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6 no_ap_sh6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap6" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap66"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl6">
<input  id="mirror_d6"  type="hidden"  > 
<span style="display:none;color:red" class="atras6"><i>Dias de atraso : <input type="text" id="resf6" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap7" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap77"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr7">
<input  id="mirror_d7"  type="hidden"  > 
<span style="display:none;color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf7" style="pointer-events:none;border:none;width:70px;background:none"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap8" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap88"  readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll8">
<input  id="mirror_d8"  type="hidden"  > 
<span style="display:none;color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf8" style="pointer-events:none;border:none;width:80px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap9" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap99"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr9">
<input  id="mirror_d9"  type="hidden"  > 
<span style="display:none;color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf9" style="pointer-events:none;border:none;width:90px;background:none"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap10" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1010"  readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel10">
<input  id="mirror_d10"  type="hidden"  > 
<span style="display:none;color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf10" style="pointer-events:none;border:none;width:100px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11 no_ap_sh11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1111"  readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl11">
<input  id="mirror_d11"  type="hidden"  > 
<span style="display:none;color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf11" style="pointer-events:none;border:none;width:110px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap122" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1212"  readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr12">
<input  id="mirror_d12"  type="hidden"  > 
<span style="display:none;color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf12" style="pointer-events:none;border:none;width:120px"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap133" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1313"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel13">
<input  id="mirror_d13"  type="hidden"  > 
<span style="display:none;color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf13" style="pointer-events:none;border:none;width:130px;background:none"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap144" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1414"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl14">
<input  id="mirror_d14"  type="hidden"  > 
<span style="display:none;color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf14" style="pointer-events:none;border:none;width:140px"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap155" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1515"  readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll15">
<input  id="mirror_d15"  type="hidden"  > 
<span style="display:none;color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf15" style="pointer-events:none;border:none;width:150px"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap166" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1616"  readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg16">
<input  id="mirror_d16"  type="hidden"  > 
<span style="display:none;color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf16" style="pointer-events:none;border:none;width:160px"></i></span>
</td>
<td> </td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>DTP</th>
<td></td>
 <td> </td>
 <td></td>
 <td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1717"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll17">
<input  id="mirror_d17"  type="hidden"  > 
<span style="display:none;color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf17" style="pointer-events:none;border:none;width:170px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap188" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1818"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr18">
<input  id="mirror_d18"  type="hidden"  > 
<span style="display:none;color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf18" style="pointer-events:none;border:none;width:180px"></i></span>
</td>
</tr>
</table>
 </div>
			</div>
			</div>
			</div>
                <div class="tab-pane fade" id="otrosAnt" role="tabpanel" aria-labelledby="otrosAnt-tab">
                 <div class="row">
                            <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingQuirurgicos" placeholder="Niguno">
                                <label for="floatingQuirurgicos">Quirurgicos</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingAbdominal" placeholder="Niguno">
                                <label for="floatingAbdominal">Abdominal</label>
                              </div>
                              
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingTransfusionSanguinea " placeholder="Niguno">
                                <label for="floatingTransfusionSanguinea">Transfusion sanguinea </label>
                              </div>
      
                              
                            </div>
                         <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
                              <option selected>No</option>
                              <option value="1">Histerectomia</option>
                              <option value="2">De Ovarios</option>
                              <option value="3">Cesarea</option>
                              
                            </select>
                            <label for="floatingGineObs" class="form-label">Gineco-obstetricos</label>
                          </div>
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingToracica" placeholder="Niguno">
                                <label for="floatingToracica">Toracica</label>
                              </div>
                              
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingOtrosAnt" placeholder="Niguno">
                                <label for="floatingOtrosAnt">Otros</label>
                              </div>
      
                              
                            </div>
                            <div class="col-lg-2">
                            <legend class="col-form-label">Hepatis B</legend>
                              <div class="col-lg-2">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" >
                                  <label class="btn btn-outline-primary" for="btnradio1">No</label>
                                
                                  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                  <label class="btn btn-outline-primary" for="btnradio2">Si</label>
                                
                                </div>
                                
                              </div>
                            
                            </div>
                            <div class="col-lg-2">
                           <legend class="col-form-label">HPV</legend>
                              <div class="col-lg-2">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                  <input type="radio" class="btn-check" name="btnradio1" id="btnradio11" autocomplete="off" >
                                  <label class="btn btn-outline-primary" for="btnradio11">No</label>
                                
                                  <input type="radio" class="btn-check" name="btnradio1" id="btnradio21" autocomplete="off">
                                  <label class="btn btn-outline-primary" for="btnradio21">Si</label>
                                
                                </div>
                                
                              </div>
                           
                            </div>
                            <div class="col-lg-2">
                              <legend class="col-form-label">Toxoide Tetanico</legend>
                                 <div class="col-lg-2">
                                   <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                     <input type="radio" class="btn-check" name="btnradio11" id="btnradio111" autocomplete="off" >
                                     <label class="btn btn-outline-primary" for="btnradio111">No</label>
                                   
                                     <input type="radio" class="btn-check" name="btnradio11" id="btnradio211" autocomplete="off">
                                     <label class="btn btn-outline-primary" for="btnradio211">Si</label>
                                   
                                   </div>
                                   
                                 </div>
                              
                               </div>
                               <div class="col-lg-2">
                                <legend class="col-form-label">Grupo Sanguineo</legend>
                                <select id="inputState" class="form-select">
                                  <option selected>Seleccione</option>
                                  <option>A</option>
                                  <option>B</option>
                                  <option>AB</option>
                                  <option>O</option>
                                </select> 
                                 </div>
                               
                              <div class="col-lg-2">
                                <legend class="col-form-label">RH</legend>
                                   <div class="col-lg-2">
                                     <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                       <input type="radio" class="btn-check" name="btnradio111" id="btnradio1111" autocomplete="off" >
                                       <label class="btn btn-outline-primary" for="btnradio1111">+</label>
                                     
                                       <input type="radio" class="btn-check" name="btnradio111" id="btnradio2111" autocomplete="off">
                                       <label class="btn btn-outline-primary" for="btnradio2111">-</label>
                                     
                                     </div>
                                     
                                   </div>
                                
                                 </div>
                                 <div class="col-lg-2">
                                  <legend class="col-form-label">Tipificación</legend>
                                   <input type="text" class="form-control" id="floatingTipificacion" >
                                    
                                   </div>
                          </div>
                </div>
              </div><!-- End Default Tabs -->

          
                            </div>
                          </div>
                        </div>
                      </div>
             <div class="accordion-item" style="background:none">
               <h2 class="accordion-header" id="flush-sosAbMal">
                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSosAbMal" aria-expanded="false" aria-controls="flush-collapseSosAbMal">
                   Sospecha De Abuso O Maltrato
                 </button>
               </h2>
               <div id="flush-collapseSosAbMal" class="accordion-collapse collapse" aria-labelledby="flush-sosAbMal" data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                   <div class="col-sm-10">
                     <div class="form-floating mb-3">
                       <input type="email" class="form-control" id="floatingAlAl" placeholder="Niguno">
                       <label for="floatingAlAl">Maltrato Físico</label>
                     </div>
                     <div class="form-floating mb-3">
                       <input type="text" class="form-control" id="floatingMedAl" placeholder="Niguno">
                       <label for="floatingMedAl">Abuso Sexual</label>
                     </div>
                     
                     <div class="form-floating mb-3">
                       <input type="text" class="form-control" id="floatingOtAl" placeholder="Niguno">
                       <label for="floatingOtAl">Negligencia</label>
                     </div>

                     <div class="form-floating mb-3">
                       <input type="text" class="form-control" id="floatingOtAl" placeholder="Niguno">
                       <label for="floatingOtAl">Maltrato Emocional</label>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           
             <div class="accordion-item" style="background:none">
               <h2 class="accordion-header" id="flush-VioIntraFam">
                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseVioIntraFam" aria-expanded="false" aria-controls="flush-collapseVioIntraFam">
                   Violencia Intrafamilia
                 </button>
               </h2>
               <div id="flush-collapseVioIntraFam" class="accordion-collapse collapse" aria-labelledby="flush-VioIntraFam" data-bs-parent="#accordionFlushExample">
                 <div class="accordion-body">
                    
                   <div class="col-sm-12">
                     <div class="col-12">
                       <label for="inputNanme4" class="form-label">Se ha sentido alguna vez afectada/lastimada emosional o psicologicamente por alguna persona importante para usted ?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                           <option selected>No</option>
                           <option value="1">Pareja</option>
                           <option value="2">Ex-Pareja</option>
                           <option value="3">Otra Familia/Conocida</option>
                         </select>
                         <label for="floatingSelect">Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="floatingSelect2" class="form-label">Alguna vez alguien le ha hecho daño físico ?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="floatingSelect2" aria-label="Floating label select example">
                           <option selected>No</option>
                           <option value="1">Pareja</option>
                           <option value="2">Ex-Pareja</option>
                           <option value="3">Otra Familia/Conocida</option>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="floatingSelect3" class="form-label">En algun momento has sido tocada, manoseada o forzada a tener contacto o relacion sexual ?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="floatingSelect3" aria-label="Floating label select example">
                           <option selected>No</option>
                           <option value="1">Pareja</option>
                           <option value="2">Ex-Pareja</option>
                           <option value="3">Otra Familia/Conocida</option>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="floatingSelect4" class="form-label">Cuando era niña, fue tocada de una manera inpropriada por alguien ?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="floatingSelect4" aria-label="Floating label select example">
                           <option selected>No</option>
                           <option value="1">Pareja</option>
                           <option value="2">Ex-Pareja</option>
                           <option value="3">Otra Familia/Conocida</option>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
         
             
<div class="accordion-item" style="background:none">
 <h2 class="accordion-header" id="flush-HabTox">
   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseHabTox" aria-expanded="false" aria-controls="flush-collapseHabTox">
     Habitos Toxicos
   </button>
 </h2>
 <div id="flush-collapseHabTox" class="accordion-collapse collapse" aria-labelledby="flush-HabTox" data-bs-parent="#accordionFlushExample">
   <div class="accordion-body">
      
     <div class="col-sm-12">
      <div class="table-responsive">
       <table class="table">
         
           <tr style="font-weight:700">
               <th>
                   <td>Habito</td>
                   <td>Cantidad</td>
                   <td>Frecuencia</td>
                   <td></td>
                   <td>Habito</td>
                   <td>Cantidad</td>
                   <td>Frecuencia</th>
           </tr>
           <tr>
               <th class="id"><span class="material-symbols-outlined">
local_cafe
</span></th>
               <td class="th_habitos">Cafe</td>
               <th><input class="form-control input_habitos"  id="hab_c_caf" style="width:120px" value=""></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_caf"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
               <th><img src="<?=base_url();?>assets_new/img/pipe.jpg" width="30" ></th>
               <td class="th_habitos">Pipa</td>
               <th><input class="form-control input_habitos"  id="hab_c_pip" style="width:120px" value=""></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_pip"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
           </tr>
           <tr>
               <th class="id"><span class="material-symbols-outlined">
smoking_rooms
</span></th>
               <td class="th_habitos">Cigarillo</td>
               <th><input class="form-control input_habitos"  id="hab_c_ciga" value="" style="width:120px"></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_ciga"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
               <th><span class="material-symbols-outlined">
liquor
</span></th>
               <td class="th_habitos">Alcohol</td>
               <th><input class="form-control input_habitos"  id="hab_c_al" value="" style="width:120px"></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_al"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
           </tr>
           <tr>
               <th class="id"><span class="material-symbols-outlined">
vape_free
</span></th>
               <td class="th_habitos">Tabaco</td>
               <th><input class="form-control input_habitos"  id="hab_c_tab" value="" style="width:120px"></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_tab"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
               <th class="id"><img src="<?=base_url();?>assets_new/img/7772283.jpg" width="30" ></th>
               <td class="th_habitos">Hookah</td>
               <th><input class="form-control input_hookah"  id="hookahe" value="" style="width:120px"></th>
               <th class="th_habitos"><select class="form-control" id="hab_f_hookahe"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></th>
           </tr>
       </table>
       <table class="table">
           <tr>
               <th style="width:100px"></th>
               <th></th>
               <th style="width:550px">Tipo</th>
               <th>Cantidad</th>
               <th>Frecuencia</th>
           </tr>
           <tr>
               <th></th>
               <td class="th_habitos"><img src="<?=base_url();?>assets_new/img/drug.jpg" width="30" style="padding:1px" > Droga</td>
               <td><select class="form-control select2" id="hab_t_drug"  multiple><option value='Escopolamina o burundanga' >Escopolamina o burundanga</option><option value='Metanfetamina' >Metanfetamina</option><option value='Sales de baño' >Sales de baño</option><option value='Krokodil' >Krokodil</option><option value='Esteroide' >Esteroide</option><option value='Cocaína' >Cocaína</option><option value='LSD' >LSD</option><option value='Cannabis o marihuana' >Cannabis o marihuana</option><option value='Heroína' >Heroína</option><option value='Èxtasis o MDMA' >Èxtasis o MDMA</option><option value='PCP' >PCP</option><option value='Crack' >Crack</option><option value='Pasta base' >Pasta base</option><option value='Neopren' >Neopren</option></select></td>
               <td><input class="form-control input_habitos"  id="hab_c_drug" style="width:120px" value="0"></td>
               <td class="th_habitos"><select class="form-control" id="hab_f_drug"  style="width:149px"><option selected></option><option>Diariamente</option><option>Ocasionalmente</option><option>A veces</option></select></td>
           </tr>
       </table>
   </div>

     </div>
   </div>
 </div>
</div>

           </div><!-- End Accordion without outline borders -->

       </div>



   </div>

   <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
       <h4 class="card-title">Enfermedad Actual</h4>
       <div class="col-sm-10">
	   
	   
	    <div class="form-floating mb-3">
           <input type="text" class="form-control" id="floatingSinopsis" placeholder="Motivo de consulta" />
           <label for="floatingSinopsis">Motivo de consulta</label>
         </div>
	   
	   
	   
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingSinopsis" placeholder="Sinopsis" style="height: 100px"></textarea>
           <label for="floatingSinopsis">Sinopsis</label>
         </div>
         
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingfloatingLabResRel" placeholder="Laboratorios (Resultados relevantes)" style="height: 100px"></textarea>
           <label for="floatingLabResRel">Laboratorios (Resultados relevantes)</label>
         </div>
		    <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingfloatingLabResRel" placeholder="Estudios (Resultados relevantes)" style="height: 100px"></textarea>
           <label for="floatingLabResRel">Estudios (Resultados relevantes)</label>
         </div>
         <div class="mb-3">

           <label for="formFileDisabled" class="form-label">Estudio Imagen</label>
         
           <input class="form-control" type="file" id="formFileDisabled" >
         
         </div>
         
       </div>
   
     </div>
   <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-condiag" role="tabpanel" aria-labelledby="v-pills-condiag-tab">
       <h4 class="card-title">Conclusión Diagnostico</h4>
       <div class="col-sm-10">
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingDiagPrDef" placeholder="Niguno" style="height: 100px"></textarea>
           <label for="floatingDiagPrDef"> Diagnostico(s) Presuntivo o Definitivo (CIE10):</label>
         </div>
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingPlan" placeholder="Niguno" style="height: 100px"></textarea>
           <label for="floatingPlan">Plan</label>
         </div>
         
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingProcedimiento" placeholder="Niguno" style="height: 100px"></textarea>
           <label for="floatingProcedimiento">Procedimiento</label>
         </div>
         <div class="form-floating mb-3">
           <textarea class="form-control" id="floatingEvPaSu" placeholder="Niguno" style="height: 100px"></textarea>
           <label for="floatingEvPaSu">Evolucion (Paciente subsecuente):</label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
           <label class="form-check-label" for="inlineRadio1">Mejoría</label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
           <label class="form-check-label" for="inlineRadio2">Empeorando</label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
           <label class="form-check-label" for="inlineRadio3">No Mejoría</label>
         </div>
       </div>
     </div>
   <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-sigVital" role="tabpanel" aria-labelledby="v-pills-sigVital-tab">

<h4 class="card-title">Tabla De Signos Vitales Por Edad</h4>
       <div class="row">
           <div class="col-lg-4">
<div class="card" >
<div class="card-header" style="background: #e3acb7; text-align: center;color:black">
FRECUENCIA RESPIRATORIA
</div>
<div class="card-body">

<table class="table table-striped" style="text-align:center">
<tr>
<td>Rango (12-20)</td>
</tr>
<tr>
<td ><div class="alert alert-success" role="alert">
13 normal <i class="bi bi-check2-all"></i>
</div></td>
</tr>
</table>
<div class="input-group ">
<span class="input-group-text">FR</span>
<input type="text" class="form-control" >

</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="card" >
<div class="card-header" style="background: #ac98f8; text-align: center;color:black;">
FRECUENCIA CARDIACA
</div>
<div class="card-body">

<table class="table table-striped" style="text-align:center">
<tr>
<td>Rango (60-80)</td>
</tr>
<tr>
<td><div class="alert alert-danger" role="alert">
50 anormal <i class="bi bi-exclamation-triangle"></i>
</div></td>
</tr>
</table>
<div class="input-group ">
<span class="input-group-text">FC</span>
<input type="text" class="form-control" >

</div>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="card" >
<div class="card-header" style="background:  #bb8fce;color:black;text-align:center">
FFRECUENCIA TEMPERATURA
</div>
<div class="card-body">

<table class="table table-striped"style="text-align:center">
<tr>
<td>Rango (36.2-37.2)</td>
</tr>
<tr>
<td>36 normal</td>
</tr>
</table>
<div class="input-group ">
<span class="input-group-text">Temp. </span>
<input type="text" class="form-control" >

</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-5">
<div class="card" >
<div class="card-header" style="background:  #a9dfbf;color:black;text-align:center">
TENSION ARTERIAL
</div>
<div class="card-body">

<table class="table table-striped">
<tr>
<td>Sistolica (110-140)</td><td>Diastolica (70-90)</td>
</tr>
<tr>
<td>4 anormal</td><td>70 normal</td>
</tr>
</table>
<div class="input-group">
<span class="input-group-text">T. A.(mm)</span>
<input type="text" class="form-control" >
<span class="input-group-text">T. A. (hg)</span>
<input type="text" class="form-control" >

</div>
</div>
</div>
</div>
<div class="col-lg-7">
 <div class="input-group mb-2" >
<span class="input-group-text">TALLA:</span>
<input type="text" class="form-control" style="text-align:right">
<span class="input-group-text">metro</span>
<input type="text" class="form-control" style="text-align:right">
<span class="input-group-text">inc</span>
<input type="text" class="form-control" style="text-align:right">
<span class="input-group-text">IMC</span>
</div>
<div class="input-group mb-2">
<span class="input-group-text">Pulso</span>
<input type="text" class="form-control" >

</div>
<div class="input-group mb-2">
<span class="input-group-text">Glicemia</span>
<input type="text" class="form-control" >

</div>
<p>ASPECTO GENERAL</p>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1">Sano</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
<label class="form-check-label" for="inlineRadio2">Agudamente Enferma</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
<label class="form-check-label" for="inlineRadio3">Cronicamente Enferma</label>
</div>
</div>
</div>


</div>


   <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-physic" role="tabpanel" aria-labelledby="v-pills-physic-tab">

     <div class="card-body">
       <h5 class="card-title">Examenes</h5>

       <!-- Accordion without outline borders -->
       <div class="accordion accordion-flush" id="accordionFlushExamFi">
         <div class="accordion-item">
           <h2 class="accordion-header" id="flush-headingFisOne">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFisOne" aria-expanded="false" aria-controls="flush-collapseFisOne">
             Examen Fisico
             </button>
           </h2>
           <div id="flush-collapseFisOne" class="accordion-collapse collapse" aria-labelledby="flush-headingFisOne" data-bs-parent="#accordionFlushExamFi">
             <div class="accordion-body">
   
   <div class="row">
      <div class="col-lg-5">
         
   <div class="col-md-12">
   <label for="inputEmail4" class="form-label">Neurológico</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   <div class="form-floating mb-3">
   
   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
   <label for="floatingAbdominal">Detalle</label>
   </div>
   </div>
   <div class="col-md-12">
   <label for="inputEmail4" class="form-label">Cuello</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   <div class="form-floating mb-3">
   
   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
   <label for="floatingAbdominal">Detalle</label>
   </div>
   </div>
   <div class="col-md-12">
   <label for="inputAddress" class="form-label">Abdomen Inspección: Forma</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   </div>
   <div class="col-md-12">
   <label for="inputAddress" class="form-label">Auscultación</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   </div>
   <div class="col-md-12">
   <label for="inputAddress" class="form-label">Percusión</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   </div>
   <div class="col-md-12">
   <label for="inputAddress" class="form-label">Palpación</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   </div>
   <div class="col-md-12">
   <label for="inputEmail4" class="form-label">Extremidades Superiores</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   <div class="form-floating mb-3">
   
   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
   <label for="floatingAbdominal">Detalle</label>
   </div>
   </div>
   
   
      </div>
       <div class="col-lg-7">
          
    
       <!--<h5 class="card-title">Multi Columns Form</h5>
   
        Multi Columns Form -->
       <div class="row">
        
         <div class="col-md-6">
           <label for="inputEmail5" class="form-label">Cuad. Inf. Externo</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
           <label for="inputPassword5" class="form-label">Cuad. Sup. Externo</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
   
   
           <div class="col-md-6">
             <strong>Mama Izquierda :</strong>
           <label for="inputEmail5" class="form-label">Cuad. Sup. Externo</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
            <strong> Mama Derecha :</strong>
           <label for="inputPassword5" class="form-label">Cuad. Sup. Externo</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
   
   
          <div class="col-md-6">
           <label for="inputEmail5" class="form-label">Cuad. Inf. Externo</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
           <label for="inputPassword5" class="form-label">Cuad. Inf. Externo</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
   
   
   
          <div class="col-md-6">
           <label for="inputEmail5" class="form-label">Region Retroareolar</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
           <label for="inputPassword5" class="form-label">Region Retroareolar</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
   
   
          <div class="col-md-6">
           <label for="inputEmail5" class="form-label">Region Areola-Pezon</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
           <label for="inputPassword5" class="form-label">Region Areola-Pezon</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
   
          <div class="col-md-6">
           <label for="inputEmail5" class="form-label">Region Axilar</label>
           <input type="email" class="form-control" id="inputEmail5">
         </div>
         <div class="col-md-6">
           <label for="inputPassword5" class="form-label">Region Axilar</label>
           <input type="password" class="form-control" id="inputPassword5">
         </div>
     <div class="col-md-12">
   <label for="inputEmail4" class="form-label">Torax: Corazón y pulmones</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   <div class="form-floating mb-3">
   
   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
   <label for="floatingAbdominal">Detalle</label>
   </div>
   </div>
    <div class="col-md-12">
     <br/>
   <label for="inputEmail4" class="form-label">Extremidades Inferiores</label>
   <select class="form-select" >
   <option selected></option>
   <option value="1">Histerectomia</option>
   <option value="2">De Ovarios</option>
   <option value="3">Cesarea</option>
   
   </select>
   <div class="form-floating mb-3">
   
   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
   <label for="floatingAbdominal">Detalle</label>
   </div>
   </div>
     </div>
      
   
       </div>
       </div>
   
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header" id="flush-headingTwoFis">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwoFis" aria-expanded="false" aria-controls="flush-collapseTwoFis">
               Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
   
             </button>
           </h2>
           <div id="flush-collapseTwoFis" class="accordion-collapse collapse" aria-labelledby="flush-headingTwoFis" data-bs-parent="#accordionFlushExamFi">
             <div class="accordion-body">
               <div class="row">
                 <div class="col-lg-6">

                 <label class="col-form-label  col-sm-3">Especuloscopia</label>
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                     <label class="form-check-label" for="inlineRadio1">Si</label>
                   </div>
                   <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                     <label class="form-check-label" for="inlineRadio2">No</label>
                   </div>
                  
                   </div>

                   <div class="col-lg-6">
                     <label class="col-form-label  col-sm-3">Tacto Bimanual</label>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                       <label class="form-check-label" for="inlineRadio1">Si</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                       <label class="form-check-label" for="inlineRadio2">No</label>
                     </div>
                   </div>
                 </fieldset>
               </div>
               <div class="row">
                 <div class="col-lg-6">
                   <div class="col-md-12">
                     <label for="inputEmail4" class="form-label">Cervix</label>
                     <select class="form-select" >
                     <option selected></option>
                     <option value="1">Histerectomia</option>
                     <option value="2">De Ovarios</option>
                     <option value="3">Cesarea</option>
                     
                     </select>
                     <div class="form-floating mb-3">
                     
                     <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                     <label for="floatingAbdominal">Detalle</label>
                     </div>
                     </div>
                     <div class="col-md-12">
                     <label for="inputEmail4" class="form-label">Utero</label>
                    
                     <div class="form-floating mb-3">
                     
                     <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                     <label for="floatingAbdominal">Detalle</label>
                     </div>
                     </div>
                     
                     <div class="col-md-12">
                       <label for="inputEmail4" class="form-label">Anexo Derecho</label>
                      
                       <div class="form-floating mb-3">
                       
                       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                       <label for="floatingAbdominal">Detalle</label>
                       </div>
                       </div>
                       <div class="col-md-12">
                         <label for="inputEmail4" class="form-label">Anexo Izquierdo</label>
                        
                         <div class="form-floating mb-3">
                         
                         <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                         <label for="floatingAbdominal">Detalle</label>
                         </div>
                         </div>
                         <div class="col-md-12">
                           <label for="inputEmail4" class="form-label">Inspeccion Vulvar</label>
                           <select class="form-select" >
                           <option selected></option>
                           <option value="1">Histerectomia</option>
                           <option value="2">De Ovarios</option>
                           <option value="3">Cesarea</option>
                           
                           </select>
                           <div class="form-floating mb-3">
                           
                           <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                           <label for="floatingAbdominal">Detalle</label>
                           </div>
                           </div>
                    
                 </div>
                 <div class="col-lg-6">
                   <div class="col-md-12">
                     <label for="inputEmail4" class="form-label">Tacto rectal</label>
                     <select class="form-select" >
                     <option selected></option>
                     <option value="1">Histerectomia</option>
                     <option value="2">De Ovarios</option>
                     <option value="3">Cesarea</option>
                     
                     </select>
                     <div class="form-floating mb-3">
                     
                     <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                     <label for="floatingAbdominal">Detalle</label>
                     </div>
                     </div>

                     <div class="col-md-12">
                       <label for="inputEmail4" class="form-label">Genital masculino</label>
                       <select class="form-select" >
                       <option selected></option>
                       <option value="1">Histerectomia</option>
                       <option value="2">De Ovarios</option>
                       <option value="3">Cesarea</option>
                       
                       </select>
                       <div class="form-floating mb-3">
                       
                       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                       <label for="floatingAbdominal">Detalle</label>
                       </div>
                       </div>

                       <div class="col-md-12">
                         <label for="inputEmail4" class="form-label">Genital femenino</label>
                         <select class="form-select" >
                         <option selected></option>
                         <option value="1">Histerectomia</option>
                         <option value="2">De Ovarios</option>
                         <option value="3">Cesarea</option>
                         
                         </select>
                         <div class="form-floating mb-3">
                         
                         <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                         <label for="floatingAbdominal">Detalle</label>
                         </div>
                         </div>

                         <div class="col-md-12">
                           <label for="inputEmail4" class="form-label">Tacto vaginal</label>
                           <select class="form-select" >
                           <option selected></option>
                           <option value="1">Histerectomia</option>
                           <option value="2">De Ovarios</option>
                           <option value="3">Cesarea</option>
                           
                           </select>
                           <div class="form-floating mb-3">
                           
                           <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                           <label for="floatingAbdominal">Detalle</label>
                           </div>
                           </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       
       </div><!-- End Accordion without outline borders -->
   
     </div>
   
   

</div>
<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-physicUro" role="tabpanel" aria-labelledby="v-pills-physicUro-tab">
 <div class="row">
   <h4 class="card-title"> Urología</h4>

  <div class="col-lg-6">
  <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Pene</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Testiculos</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Epididimos</label>
       </div>
	   	<div class="form-check form-check-inline">
	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
	<label class="form-check-label" for="inlineCheckbox1">Tacto Realizado</label>
	</div>

	    <div class="form-floating mb-3">
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Tacto Rectal y Prostático </label>
       </div>
</div>

  <div class="col-lg-6">
  <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Genitourinario Mujer</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Vejiga</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Riñones</label>
       </div>
	   <br/>
	   <div class="form-floating mb-3">
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Otros</label>
       </div>
</div>

</div>
</div>
<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-system" role="tabpanel" aria-labelledby="v-pills-system-tab">
 <div class="row">
   <h4 class="card-title"> Examen Del Sistema</h4>

   <div class="col-lg-8">
     <div class="col-md-12">
       <label for="inputEmail4" class="form-label">Sistema neurológico</label>
       <select class="form-select" >
       <option selected></option>
       <option value="1">Histerectomia</option>
       <option value="2">De Ovarios</option>
       <option value="3">Cesarea</option>
       
       </select>
       <div class="form-floating mb-3">
       
       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
       <label for="floatingAbdominal">Detalle</label>
       </div>
       </div>
       <div class="col-md-12">
         <label for="inputEmail4" class="form-label">Sistema cardiovascular</label>
         <select class="form-select" >
         <option selected></option>
         <option value="1">Histerectomia</option>
         <option value="2">De Ovarios</option>
         <option value="3">Cesarea</option>
         
         </select>
         <div class="form-floating mb-3">
         
         <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
         <label for="floatingAbdominal">Detalle</label>
         </div>
         </div>
       
         <div class="col-md-12">
           <label for="inputEmail4" class="form-label">Sistema urogenital</label>
           <select class="form-select" >
           <option selected></option>
           <option value="1">Histerectomia</option>
           <option value="2">De Ovarios</option>
           <option value="3">Cesarea</option>
           
           </select>
           <div class="form-floating mb-3">
           
           <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
           <label for="floatingAbdominal">Detalle</label>
           </div>
           </div>
           <div class="col-md-12">
             <label for="inputEmail4" class="form-label">Sistema Músculo Esquelético</label>
             <select class="form-select" >
             <option selected></option>
             <option value="1">Histerectomia</option>
             <option value="2">De Ovarios</option>
             <option value="3">Cesarea</option>
             
             </select>
             <div class="form-floating mb-3">
             
             <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
             <label for="floatingAbdominal">Detalle</label>
             </div>
             </div>
           <div class="col-md-12">
             <label for="inputEmail4" class="form-label">Sistema Nervioso</label>
         
             <div class="form-floating mb-3">
             
             <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
             <label for="floatingAbdominal">Detalle</label>
             </div>
             </div>
             <div class="col-md-12">
               <label for="inputEmail4" class="form-label">Sistema Linfático</label>
           
               <div class="form-floating mb-3">
               
               <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
               <label for="floatingAbdominal">Detalle</label>
               </div>
               </div>
               <div class="col-md-12">
                 <label for="inputEmail4" class="form-label">Sistema Respiratorio</label>
                 <select class="form-select" >
                 <option selected></option>
                 <option value="1">Histerectomia</option>
                 <option value="2">De Ovarios</option>
                 <option value="3">Cesarea</option>
                 
                 </select>
                 <div class="form-floating mb-3">
                 
                 <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                 <label for="floatingAbdominal">Detalle</label>
                 </div>
                 </div>

                 <div class="col-md-12">
                   <label for="inputEmail4" class="form-label">Sistema Genitourinario</label>
               
                   <div class="form-floating mb-3">
                   
                   <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                   <label for="floatingAbdominal">Detalle</label>
                   </div>
                   </div>

                   <div class="col-md-12">
                     <label for="inputEmail4" class="form-label">Sistema Digestivo</label>
                     <select class="form-select" >
                     <option selected></option>
                     <option value="1">Histerectomia</option>
                     <option value="2">De Ovarios</option>
                     <option value="3">Cesarea</option>
                     
                     </select>
                     <div class="form-floating mb-3">
                     
                     <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                     <label for="floatingAbdominal">Detalle</label>
                     </div>
                     </div>

                     <div class="col-md-12">
                       <label for="inputEmail4" class="form-label">Sistema Endocrino</label>
                       <select class="form-select" >
                       <option selected></option>
                       <option value="1">Histerectomia</option>
                       <option value="2">De Ovarios</option>
                       <option value="3">Cesarea</option>
                       
                       </select>
                       <div class="form-floating mb-3">
                       
                       <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                       <label for="floatingAbdominal">Detalle</label>
                       </div>
                       </div>

                       <div class="col-md-12">
                         <label for="inputEmail4" class="form-label">Relativo a</label>
                         <select class="form-select" >
                         <option selected></option>
                         <option value="1">Histerectomia</option>
                         <option value="2">De Ovarios</option>
                         <option value="3">Cesarea</option>
                         
                         </select>
                         <div class="form-floating mb-3">
                         
                         <textarea class="form-control" id="floatingAbdominal" style="height: 100px"></textarea>
                         <label for="floatingAbdominal">Detalle</label>
                         </div>
                         </div>

                         <div class="col-md-12">
                           <label for="inputEmail4" class="form-label">Columna Dorsal</label>
                           <select class="form-select" >
                           <option selected></option>
                           <option value="1">Histerectomia</option>
                           <option value="2">De Ovarios</option>
                           <option value="3">Cesarea</option>
                           
                           </select>
                           <div class="form-floating mb-3">
                           
                           <textarea class="form-control " id="floatingAbdominal" style="height: 100px"></textarea>
                           <label for="floatingAbdominal">Detalle</label>
                           </div>
                           </div>
   </div>
   
 </div>
</div>

  <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-urology" role="tabpanel" aria-labelledby="v-pills-urology-tab">

     <div class="card-body">
       <h5 class="card-title">Antecedentes Generales</h5>

     
           <h6 class="h6" >Patológicos </h6>
		   <br/>
    <div class="row">
  <div class="col-lg-12">
              <form class="row">
			 <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Sin Hallazgo 
                    </label>
                  </div>
				  <br/><br/>
                      <div class="col-md-8">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Esclerosis Múltiple 
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Impotencia
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Anemia Falciforme
                    </label>
                  </div>
				 </div>
				 
				         <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Varicoceles 
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Fimosis
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Hidroceles
                    </label>
                  </div>
				  
				 
                </div>
				 <div class="col-md-12">
				 
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="floatingITS" style="height:100px"></textarea>
                    <label for="floatingITS">ITS</label>
                  </div>
				  </div>
				  
				  <div class="col-md-12">
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="floatingITS" style="height:100px"></textarea>
                    <label for="floatingITS">Tumorales</label>
                  </div>
				  </div>
				  
				  
				  <div class="col-md-12">
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="floatingITS" style="height:100px"></textarea>
                    <label for="floatingITS">Otros</label>
                  </div>
				  </div>
				</form>
				
				</div>
       </div>
	   <h6 class="h6" >Familiares </h6>
	   <br/>
       <div class="row">
                 <div class="col-lg-12">

                    <form class="row">
			   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Sin Hallazgo 
                    </label>
                  </div>
				 <br/><br/>
                      <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Cáncer Próstata 
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Polisquistosis Renal
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Urolitiasis
                    </label>
                  </div>
				  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Cistinuria
                    </label>
                  </div>
				  <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Ninguno" id="floatingITS" />
                    <label for="floatingITS">Otros</label>
                  </div>
				 </div>
				 
				   
				 
				</form>
                  
                   </div>

            
               </div>
            
         
   
     </div>
   
   

</div>

  <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-colposcopia" role="tabpanel" aria-labelledby="v-pills-colposcopia-tab">
		    <h4 class="card-title">Colposcopia</h4>
			  
          <div class="row">
              <div class="col-lg-6">
              <form class="row g-3">
               <p class="text-muted">Datos Personales</p>
                <div class="col-md-7">
                  <label >Estas Embarazada ?</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Si
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     No
                    </label>
                  </div>
                  
                </div>
               
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Como califica su vida sexua" id="Edad Primera Relacion Coital" />
                    <label for="floatingTextarea">Edad Primera Relacion Coital</label>
                  </div>
                </div>
               
                <div class="col-md-6" title="Como califica su vida sexual?">
                <div class="form-floating">
                    <input type="date" class="form-control" placeholder="Como califica su vida sexua" id="Fecha Ultimo PAP" />
                    <label for="floatingTextarea">Fecha Ultimo PAP</label>
                  </div>
                </div>
                
                <div class="col-md-12">
                
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Motivo Referimiento" id="floatingTextarea" ></textarea>
                    <label for="floatingTextarea">Motivo Referimiento</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-12 col-form-label" >Colcoscopia (Acetico 5%)</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Satisfactoria
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     No Satisfactoria
                    </label>
                  </div>
                   <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Localizada en el ectocérvix, totalmente visible
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Con un componente endoservical totalmente visible
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Con un componente endoservical NO totalmente visible
                      </label>
                    </div>
                  
                </div>

               
              </form>
            </div>
            <div class="col-lg-6">
			
              <form class="row g-3">
			  <span class="text-muted">Hallazgos</span>
                <div class="col-md-12">
                <label class="col-sm-12" >Ciclos menstruales</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                  <label class="form-check-label" for="exampleRadios1">
                    Normal
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Cambios Menores 
                  </label>
                </div>
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Cambios Mayores 
                  </label>
                </div>
                 
                </div>
            

                <div class="col-md-12">
                  <label class="col-sm-12 col-form-label">Locacion Del Cuadrante</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Superior Izquierdo (12 a 3)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Inferior Izquierdo (3 a 6)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Inferior Derecho (6 a 9)
                    </label>
                  </div>
				   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Superior Derecho (9 a 12)
                    </label>
                  </div>
				 
                </div>

               <div class="col-md-12">
                  <label class="col-sm-12 col-form-label">Epitelio Acetoblanco</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Tenue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Denso
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Que aparece rapido y desaparece lento. Blanco Ostraceo
                    </label>
                  </div>
				   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Cambio acetoblanco debil que aparece TARDE y desaparece pronto
                    </label>
                  </div>
				   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     Imagen de blanco sobre blanco (border interno)
                    </label>
                  </div>
                </div>

                <div class="col-md-8">
                  <label>Mosaico</label><br/>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      Fino
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                     Grueso
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                     Mosaico ancho con rosetas de diferente tamaño
                    </label>
                  </div>
                  
                </div>

                <div class="col-md-12">
                  <label class="col-sm-12" >Extensión</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                    <label class="form-check-label" for="exampleRadios1">
                      < 25% 
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      25 a 50%
                    </label>
                  </div>
                  
                   <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      50 a 75%
                    </label>
                  </div>
				  
				    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                     > 75%
                    </label>
                  </div>
                  </div>

                  <div class="col-md-12">
                    <label class="col-sm-12 col-form-label" >Mosaico</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Fino
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                       Grueso
                      </label>
                    </div>
                    
                  </div>

                  <div class="col-md-12">
                    <label class="col-sm-12 col-form-label" >Vasos Atipicos</label>
					<table class="table table-borderless">
					<tr>
					<td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Stops
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Orquilla
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Busco Cambio
                      </label>
                    </div>
					</td>
					<td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Sacacorchos
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Vasos de distintos calibres
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Dilataciones
                      </label>
                    </div>
                    </td>
					</tr>
					</table>
                  </div>
                 <div class="col-md-12">
                    <label class="col-sm-12 col-form-label" >Sugestiva de carcinoma</label>
					<table class="table table-borderless">
					<tr>
					<td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Ulceración
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Borders
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Situación
                      </label>
                    </div>
					  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Periférica
                      </label>
                    </div>
					</td>
					<td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Elevación
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Regular
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Central
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Irregular
                      </label>
                    </div>
					 <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Sobreelevado
                      </label>
                    </div>
                    </td>
					</tr>
					</table>
                  </div>

                       <div class="col-md-12">
                    <label class="col-sm-12 col-form-label" >LUGOL (Test Shiller)</label>
					
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                         IODO Positivo
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        IODO Parcialmente negativo (posibilidad debil, parcialement moteado)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       IODO negativo (amarillo mostaza sobre epitelio acetoblanco)
                      </label>
                    </div>
					  
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-12" >Se toma biopsa</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Si
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                        No
                      </label>
                    </div>
                    
                    </div>

     <div class="col-md-12">
                    <label class="col-sm-12 col-form-label" >Localización</label>
					
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                         Anterior-Central-Periferico
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Posterior-Central-Periferico
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                       Izquierda-Central-Periferico
                      </label>
                    </div>
					   <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Derecha-Central-Periferico
                      </label>
                    </div>
                  </div>
				    <div class="col-md-12">
                    <label class="col-sm-12" >Se realizo legrado endocervical</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                      <label class="form-check-label" for="exampleRadios1">
                        Si
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                        No
                      </label>
                    </div>
                    
                    </div>
         </form>

            </div>
        </div>
		   </div>
		   
		 
		   
		    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-ipps" role="tabpanel" aria-labelledby="v-pills-ipps-tab">
            <h4 class="card-title">IPSS</h4>
            <div class="row">
			 <div class="col-lg-12">
			  <div style="overflow-x:auto;">
<table class='table table-striped'>
<tr>
<td></td>
<td>Ninguna</td>
<td>Menos de 1 vez de cada 5</td>
<td>Menos de la midad de las veces</td>
<td>Aproximadamente la mitad de las veces</td>
<td>Más de la mitad de las veces</td>
<td>Casi siempre</td>
</tr>
<tr id='click1'>
<td id='not1'>
1. Durante más o menos los últimos 30 días
cuántas veces a tenido la sensación de no vaciar
completamente la vejiga al terminar de orinar?
</td>
<td>0 <input  type='radio' name='tr1-0' class='trCheck' value="0"  /></td>
<td>1 <input  type='radio' name='tr1-0' class='trCheck' value="1"  /></td>
<td>2 <input  type='radio' name='tr1-0' class='trCheck' value="2" /></td>
<td>3 <input  type='radio' name='tr1-0' class='trCheck' value="3"  /></td>
<td>4 <input  type='radio' name='tr1-0' class='trCheck' value="4" /></td>
<td>5 <input  type='radio' name='tr1-0' class='trCheck' value="5"  /></td>

</tr>
<tr>
<td>
2- Durante más o menos los últimos 30 días,
 cuántas veces ha tenido que volver a orinar en las dos horas
 siguientes despues de haber orinado?
</td>
<td>0 <input  type='radio' name='tr2-1' class='trCheck' value="0"/></td>
<td>1 <input  type='radio' name='tr2-1' class='trCheck' value="1" /></td>
<td>2 <input  type='radio' name='tr2-1' class='trCheck' value="2" /></td>
<td>3 <input  type='radio' name='tr2-1' class='trCheck' value="3" /></td>
<td>4 <input  type='radio' name='tr2-1' class='trCheck' value="4" /></td>
<td>5 <input  type='radio' name='tr2-1' class='trCheck' value="5" /></td>

</tr>
<tr>
<td>
3- Durante más o menos los últimos 30 días,
cuántas veces ha notado que, al orinar, paraba y comenzaba
de nuevo varias veces?
</td>
<td>0 <input  type='radio' name='tr3-2' class='trCheck' value='0' /></td>
<td>1 <input  type='radio' name='tr3-2' class='trCheck' value='1'/></td>
<td>2 <input  type='radio' name='tr3-2' class='trCheck' value='2' /></td>
<td>3 <input  type='radio' name='tr3-2' class='trCheck' value='3'/></td>
<td>4 <input  type='radio' name='tr3-2' class='trCheck' value='4'/></td>
<td>5 <input  type='radio' name='tr3-2' class='trCheck' value='5'/></td>

</tr>
<tr>
<td>4- Durante más o menos los últimos 30 días,
cuántas veces ha tenido dificultad para aguantarse la ganas de orinar?
</td>
<td>0 <input  type='radio' name='tr4-3' class='trCheck' value='0' /></td>
<td>1 <input  type='radio' name='tr4-3' class='trCheck' value='1'/></td>
<td>2 <input  type='radio' name='tr4-3' class='trCheck' value='2'/></td>
<td>3 <input  type='radio' name='tr4-3' class='trCheck' value='3' /></td>
<td>4 <input  type='radio' name='tr4-3' class='trCheck' value='4'/></td>
<td>5 <input  type='radio' name='tr4-3' class='trCheck' value='5' /></td>

</tr>
<tr>
<td>5- Durante más o menos los últimos 30 días,
cuántas veces ha observado que el chorro de orina es poco fuerte?
</td>
<td>0 <input  type='radio' name='tr5-4' class='trCheck' value='0'/></td>
<td>1 <input  type='radio' name='tr5-4' class='trCheck' value='1' /></td>
<td>2 <input  type='radio' name='tr5-4' class='trCheck' value='2' /></td>
<td>3 <input  type='radio' name='tr5-4' class='trCheck' value='3' /></td>
<td>4 <input  type='radio' name='tr5-4' class='trCheck' value='4' /></td>
<td>5 <input  type='radio' name='tr5-4' class='trCheck' value='5' /></td>

</tr>
<tr>
<td>
6- Durante más o menos los últimos 30 días,
cuántas veces ha tenido que apretar o hacer fuerza para comenzar 
a orinar?
</td>
<td>0 <input  type='radio' name='tr6-5' class='trCheck'  value='0'/></td>
<td>1 <input  type='radio' name='tr6-5' class='trCheck'  value='1'/></td>
<td>2 <input  type='radio' name='tr6-5' class='trCheck' value='2' /></td>
<td>3 <input  type='radio' name='tr6-5' class='trCheck' value='3' /></td>
<td>4 <input  type='radio' name='tr6-5' class='trCheck' value='4' /></td>
<td>5 <input  type='radio' name='tr6-5' class='trCheck' value='5' /></td>
</tr>
<tr>
<td>
7- Durante más o menos los últimos 30 días,
cuántas veces suele tener que levantarse para orinar desde que se va a la cama 
por la noche haste que se levanta por la mañana.

</td>
<td>0 <input  type='radio' name='tr7-6' class='trCheck' value='0' /></td>
<td>1 <input  type='radio' name='tr7-6' class='trCheck' value='1' /></td>
<td>2 <input  type='radio' name='tr7-6' class='trCheck' value='2' /></td>
<td>3 <input  type='radio' name='tr7-6' class='trCheck' value='3' /></td>
<td>4 <input  type='radio' name='tr7-6' class='trCheck' value='4' /></td>
<td>5 <input  type='radio' name='tr7-6' class='trCheck' value='5' /></td>
</tr>
<tr>
<td style='text-align:right'>
<h5>PUNTUACION IPS TOTAL</h5>
</td>
<td colspan='7'>
<p id='ipss-result'></p>
<input id='ipss-color' type='hidden'/>
</td>
</tr>
</table>
</div>
<table class='table'>
<tr>
<td>
8- Como se sentira si tuviera que pasar el resto de la vida con los sintomás
prostaticos tal y como los siente ahora?

</td>
<td>0 <input  type='radio' name='tr8' class='trCheck8' value='0' /></td>
<td>1 <input  type='radio' name='tr8' class='trCheck8' value='1' /></td>
<td>2 <input  type='radio' name='tr8' class='trCheck8' value='2' /></td>
<td>3 <input  type='radio' name='tr8' class='trCheck8' value='3' /></td>
<td>4 <input  type='radio' name='tr8' class='trCheck8' value='4' /></td>
<td>5 <input  type='radio' name='tr8' class='trCheck8' value='5' /></td>
<td>6 <input  type='radio' name='tr8' class='trCheck8' value='6' /></td>
</tr>
<tr>
<td colspan="8">
  <button type="button" id="save-ipps" class="btn btn-md btn-success"><i class="fa fa-check after-ipps" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
<a id="imprimir-ipps" style="display:none"  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/new_ipss/$id_historial/$user_id/$centro_medico/ipps")?>"  ><i class="fa fa-print"></i> Imprimir</a>
  
</td>
</tr>
</table>  
            </div>
			</div>
			</div>
		   
		   
		   
		   
		   
		   
		    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-surgical" role="tabpanel" aria-labelledby="v-pills-surgical-tab">
            <h4 class="card-title">Quirúrgica</h4>
            <div class="row">
			 <div class="col-lg-6">
                  
            <div class="col-md-12">
           
          <div class="form-floating mb-3">
		<select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Histerectomia</option>
		  <option value="2">De Ovarios</option>
		  <option value="3">Cesarea</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Elegir Centro Médico</label>
	  </div>
            </div>
            <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Diagnostico Pre-Quirúrgico" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Diagnostico Pre-Quirúrgico</label>
              </div>
          </div>
            <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Diagnostico Post-Quirúrgico" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Diagnostico Post-Quirúrgico</label>
              </div>
          
            </div>
            <div class="col-md-12">
            <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Anestasia" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Anestasia</label>
              </div>
			
            </div>
            <div class="col-md-12">
			<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Tipo de Incisión" />
                <label for="floatingAbdominal">Tipo de Incisión</label>
              </div>
           
            </div>
            <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Hallazgo" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Hallazgo</label>
              </div>
           
            </div>
          
              <div class="col-md-12">
			   <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Pronostico Post-Quirúrgico" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Pronostico Post-Quirúrgico</label>
              </div>
           
            </div>
            
               </div>
                <div class="col-lg-6">
                   <div class="row">
		<div class="col-md-12">

		<div class="row  mb-3">
		<div class="col-sm">
		Perdida Sanguinea
		<div class="input-group ">
		<input type="text" class="form-control" style="width:30px" >
		<span class="input-group-text">CC</span>
		</div>
		</div>
		<div class="col-sm">
		No. de Compresas
		<input type="text" class="form-control" >
		</div>
		<div class="col-sm">
		No. de Gasas
		<input type="text" class="form-control">
		</div>
		</div>
	</div>
        <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Drenes" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Drenes</label>
              </div>
          </div>
            
			<div class="col-md-12">

		<div class="row  mb-3">
		
		<div class="col-sm">
		Transfusión
		<input type="text" class="form-control" >
		</div>
		<div class="col-sm">
		Unidad Transfudida
		<input type="text" class="form-control">
		</div>
		</div>
	</div>
			
		 <div class="col-md-12">
           
          <div class="form-floating mb-3">
		<select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Histerectomia</option>
		  <option value="2">De Ovarios</option>
		  <option value="3">Cesarea</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Condición del Paciente</label>
	  </div>
            </div>	
				 <div class="col-md-12">
           
          <div class="form-floating mb-3">
		<select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Histerectomia</option>
		  <option value="2">De Ovarios</option>
		  <option value="3">Cesarea</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Traslado a</label>
	  </div>
            </div>	
				<div class="row  mb-3">
		<div class="col-sm">
		Hora de incio
		<div class="input-group ">
		<input type="text" class="form-control" style="width:30px" >
		<span class="input-group-text"><i class="bi bi-clock"></i></span>
		</div>
		</div>
		<div class="col-sm">
		Hora Finalización
		<div class="input-group ">
		<input type="text" class="form-control" style="width:30px" >
		<span class="input-group-text"><i class="bi bi-clock"></i></span>
		</div>
		</div>
		<div class="col-sm">
		Tiempo Quirúrgico
		<div class="input-group ">
		<input type="text" class="form-control" style="width:30px" >
		<span class="input-group-text"><i class="bi bi-clock"></i></span>
		</div>
		</div>
		</div>
		  <div class="col-md-12">
			<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Ayundante(s)" />
                <label for="floatingAbdominal">Ayundante(s)</label>
              </div>
           
            </div>
			  <div class="col-md-12">
			<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Ayundante(s) Enfermeria" />
                <label for="floatingAbdominal">Ayundante(s) Enfermeria</label>
              </div>
           
            </div>
			  <div class="col-md-12">
			<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Muestra Envida a Patologia" />
                <label for="floatingAbdominal">Muestra Envida a Patologia</label>
              </div>
           
            </div>
			
			  <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Gastable Utilizado en Sutura" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Gastable Utilizado en Sutura</label>
              </div>
          </div>
		  
		    <div class="col-md-12">
			 <div class="form-floating mb-3">
              <textarea class="form-control" id="floatingAbdominal" placeholder="Descripción del Procedimiento" style="height: 100px"></textarea>
                <label for="floatingAbdominal">Descripción del Procedimiento</label>
              </div>
          </div>
                </div>
                </div>
			</div>
			</div>
<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-rehab" role="tabpanel" aria-labelledby="v-pills-rehab-tab">
 <div class="row">
   <h4 class="card-title"> Rehabilitación</h4>
   <div class="accordion" id="accordionPanelsStayOpenExample">
     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingOne">
         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
           I- Marcha
         </button>
       </h2>
       <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
         <div class="accordion-body">
           
           <div class="col-md-12">
             <label for="inputRehab1" class="form-label">Iniciacion de la marcha (inmediatamente despues de decir que ande) </label>
             <div class="form-floating mb-3">
                   <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                     <option></option>
                     <option>Algunas valcilaciones o multiples para empezar</option>
                     <option>No vacila</option>
                     
                   </select>
                   <label for="floatingRehab1" class="form-label">Seleccionar</label>
                 </div>
             
             </div>
         </div>
       </div>
     </div>
     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
           II- Longitud Y Altura Del Paso 
         </button>
       </h2>
       <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
         <div class="accordion-body">
           <div class="col-md-12">
             <label for="inputRehab1" class="form-label">1. Movimiento del pie derecho </label>
             <div class="form-floating mb-3">
                   <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                     <option></option>
                     <option>No sobrepasa el pie izquierdo con el paso</option>
<option>Sobrepasa el pie izquierdo</option>
<option>El pie derecho no se separa completamento del suelo con el paso</option>
<option>El pie derecho se separa completamento del suelo con el paso</option>
                     
                   </select>
                   <label for="floatingRehab1" class="form-label">Seleccionar</label>
                 </div>
             
             </div>
         
             <div class="col-md-12">
               <label for="inputRehab1" class="form-label">2. Movimiento del pie izquierdo </label>
               <div class="form-floating mb-3">
                     <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                       <option></option>
                       <option>No sobrepasa el pie derecho con el paso</option>
<option>Sobrepasa el pie derecho</option>
<option>El pie izquierdo no se separa completamento del suelo con el paso</option>
<option>El pie izquierdo se separa completamento del suelo con el paso</option>
</select>
                     <label for="floatingRehab1" class="form-label">Seleccionar</label>
                   </div>
               
               </div>
               <div class="col-md-12">
                 <label for="inputRehab1" class="form-label">3. Simetria del pase  </label>
                 <div class="form-floating mb-3">
                       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                         <option></option>
                         <option>La longitud de los pasos con los pies derecho e izquierdo no se igual</option>
                         <option>La longitud parece igual</option>
                         
                       </select>
                       <label for="floatingRehab1" class="form-label">Seleccionar</label>
                     </div>
                 
                 </div>
                 <div class="col-md-12">
                   <label for="inputRehab1" class="form-label">4. Fluidez del paso  </label>
                   <div class="form-floating mb-3">
                         <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                           <option></option>
                           <option value="" hidden>Seleccionar</option>
                           <option>Paradas entre los pasos</option>
                           <option>Los pasos parecen continuos</option>     
                         </select>
                         <label for="floatingRehab1" class="form-label">Seleccionar</label>
                       </div>
                   
                   </div>
                   <div class="col-md-12">
                     <label for="inputRehab1" class="form-label">5. Trayectoria (Observar trazado que realiza UN pie por 3 metros)  </label>
                     <div class="form-floating mb-3">
                           <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                             <option></option>
                             <option>Desviacion grave de la trayectoria</option>
                             <option>Leve/Moderada desviacion o uso de ayudas para mantener trayectoria</option>
                             <option>Sin deviacion o ayudas</option>
                           </select>
                           <label for="floatingRehab1" class="form-label">Seleccionar</label>
                         </div>
                     
                     </div>
                     <div class="col-md-12">
                       <label for="inputRehab1" class="form-label">6. Tronco </label>
                       <div class="form-floating mb-3">
                             <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                               <option></option>
                               <optgroup label="Balanceo marcado o uso de ayudas">
                                 <option>Desviacion grave de la trayectoria</option>
                                 <option>No balancea pero flexiona rodilla/espalda o separa brazos al caminar</option>
                                 <option>No se balancea, no flexiona, ni otras ayudas</option>
                                 </optgroup>
                             </select>
                             <label for="floatingRehab1" class="form-label">Seleccionar</label>
                           </div>
                       
                       </div>

                       <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">7. Postura al caminar </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <optgroup label="Balanceo marcado o uso de ayudas">
                                   <option>Desviacion grave de la trayectoria</option>
                                   <option>Talones separdos</option>
                                   <option>Talones casi juntos al caminar</option>
                                   </optgroup>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
         </div>
       </div>
     </div>
     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingThree">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
           III- Equilibrio
         </button>
       </h2>
       <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
         <div class="accordion-body">
         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">1. Equilibrio Sentado </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option value="" hidden>Seleccionar</option>
                                     <option>Se inclina o se desliza en la silla</option>
                                     <option>Se mantiene seguro</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">2. Levantarse </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Imposible sin ayuda</option>
                                  <option>Capaz pero necesita mas de un intento</option>
                                   <option>Capaz de levantarse de un solo intento</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">3. Intentos para levantarse </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Incapaz sin ayuda</option>
                                 <option>Capaz pero necesita mas de un intento</option>
                                 <option>Capaz de levantarse de un solo intento</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">4. Equilibrio en bipedestacion inmediata (Primeros 5 segundos) </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Inestable (tambalea, mueve los pies), marcado balanceo de tronco</option>
                                   <option>Estable pero usa andador/baston/se aferra a algo para mantenerse</option>
                                   <option>Estable sin andador, baston u otros soportes</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">6. Empuyar </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Inestable</option>
                                 <option>Estable c/apoyo amplio (Separacion talones mayor de 10cm) o usa baston/otro soporte</option>
                                 <option>Apoyo estrecho sin soporte</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">7. Ojos cerrados  </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Px en bipedestacion, tronco erecto y pies tan juntos como posible. El examinador empuya suavemente en el esternon del Px con la palma de la mano, 3 veces</option>
                                 <option>Empieza a caerse</option>
                                 <option>Se tambalea, se agarra, pero se mantiene</option>
                                 <option>Estable</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">8. Vuelta de 360 grados  </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Inestable</option>
                                 <option>Estable</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
                         <div class="col-md-12">
                         <label for="inputRehab1" class="form-label">9. Sentarse </label>
                         <div class="form-floating mb-3">
                               <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
                                 <option></option>
                                 <option>Pasos discontinuos</option>
                               <option>Pasos continuos</option>
                               <option>Inestable (Se tambalea, se agarra)</option>
                               <option>Estable</option>
                               </select>
                               <label for="floatingRehab1" class="form-label">Seleccionar</label>
                             </div>
                         
                         </div>
               
         </div>
       </div>
     </div>

     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingThree">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
           IV- Evaluación Balance Sistema
         </button>
       </h2>
       <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
         <div class="accordion-body">
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">1. Riesgo de caida</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>Presenta buena estabilidad</option>
       <option>Presenta leve riesgo de caida</option>
       <option>Presenta leve riesgo de caida</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>


       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">2. Movimiento del pie izquierdo</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>No sobrepasa el pie derecho con el paso</option>
<option>Sobrepasa el pie derecho</option>
<option>El pie izquierdo no se separa completamento del suelo con el paso</option>
<option>El pie izquierdo se separa completamento del suelo con el paso</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>

       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">3. Evalucion Monopodal</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>No presenta dificultad al equilibrio</option>
       <option>No presenta leve dificultad al equilibrio</option>
       <option>No presenta alta dificultad al equilibrio</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
         </div>
       </div>
     </div>
     
     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingThree">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
           V- Criterios
         </button>
       </h2>
       <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
         <div class="accordion-body">
         <div class="col-md-12">
       <label for="inputRehab1" class="form-label">1. Intensidad del dolor</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>Puedo soportar el dolor sin necesidad de tomar calmantes</option>
<option>El dolor es fuerte pero me manejo sin tomar calmantes</option>
<option>Los calmantes me alivian completamente el dolor</option>
<option>Los calmantes me alivian un poco el dolor</option>
<option>Los calmantes apenas me alivian el dolor</option>
<option>Los calmantes ne me alivian el dolor y no los tomo</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">2. Cuidados personales </label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>Me las puedo arreglar solo sin que me aumente el dolor</option>
<option>Me las puedo arreglar solo pero esto me aumenta el dolor</option>
<option>Los cuidados personales me producen dolor y tengo que hacerlo despacio y con cuida</option>
<option>Necesito alguna ayudapero consigo hacer la mayoria de las cosas yo solo</option>
<option>Necesito ayuda para hacer la mayoria de las cosas</option>
<option>No puedo vestirme, me cuesta lavarme y suelo quedarme en la cama</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">3. Levantar peso </label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>Puedo levantar objetos pesados sin que me aumente el dolor</option>
<option>Puedo levantar objetos pesado pero me aumenta el dolor</option>
<option>El dolor me impide levatar objetos pesados del suelo, pero puedo hacerlo si estan en u sitio comodo (ej. en una mesa)</option>
<option>El dolor me impide levatar objetos pesados del suelo, pero si peudo levantar objetos ligeros o medianos si estan en un sitio comodo</option>
<option>Solo puedo levantar objetos muy ligeros</option>
<option>No puedo levantar ni acarrear ningun objeto</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">4. Caminar</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>El dolor no me impide caminar cualquier distancia</option>
<option>El dolor me impide caminar mas de un kilometro</option>
<option>El dolor me impide mas de 500 metros</option>
<option>El dolor me impide mas de 250 metros</option>
<option>Solo puedo caminar con baston o muletas</option>
<option>Permanezco en la cama casi todo el tiempo y tengo que ir a rastras al bano</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">3. Evalucion Monopodal</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>No presenta dificultad al equilibrio</option>
       <option>No presenta leve dificultad al equilibrio</option>
       <option>No presenta alta dificultad al equilibrio</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">5. Estar sentado</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>Puedo estar de pie tanto tiempo como quiera sin que me aumente el doctor</option>
<option>Solo puedo estar sentado en mi silla favorita todo el tiempo que quiera</option>
<option>El dolor me impide estar sentado mas de una hora</option>
<option>El dolor me impide estar sentado mas de media hora</option>
<option>El dolor me impide estar sentado mas de 10 minutos</option>
<option>>El dolor me impide estar sentado</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">3. Evalucion Monopodal</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>No presenta dificultad al equilibrio</option>
       <option>No presenta leve dificultad al equilibrio</option>
       <option>No presenta alta dificultad al equilibrio</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
       <div class="col-md-12">
       <label for="inputRehab1" class="form-label">6. Dormir</label>
       <div class="form-floating mb-3">
       <select class="form-select" id="floatingRehab1" aria-label="Floating label select example">
       <option></option>
       <option>El dolor no me impide dormir bien</option>
<option>Solo puedo dormir si tomo pastillas</option>
<option>Incluso tomando pastillas duermo menos de 6 horas</option>
<option>Incluso tomando pastillas duermo menos de 4 horas</option>
<option>Incluso tomando pastillas duermo menos de 2 horas</option>
<option>El dolor me impide totalmente dormir</option>
       </select>
       <label for="floatingRehab1" class="form-label">Seleccionar</label>
       </div>

       </div>
         </div>
       </div>
     </div>
   </div>
   </div>
 </div>
 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-ssr" role="tabpanel" aria-labelledby="v-pills-ssr-tab">
   <h4 class="card-title">Antecedentes De Salud Sexual Y Reproductiva</h4>
   <div class="row">
     <div class="col-lg-6">
     <form class="row g-3">
       <div class="col-md-12">
         <div class="form-floating">
           <input type="text" class="form-control" id="floatingName" placeholder="Edad de inicio de la vida sexual activa">
           <label for="floatingName">Edad de inicio de la vida sexual activa</label>
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-floating">
           <input type="email" class="form-control" id="floatingEmail" placeholder="Numero de parejas sexuales ">
           <label for="floatingEmail">Numero de parejas sexuales </label>
         </div>
       </div>
       <div class="col-md-6">
         <label >Tiene vida sexuale actual ?</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>
         
       </div>
      
       <div class="col-md-6">
         <div class="form-floating mb-3">
           <select class="form-select" id="floatingSelect" aria-label="State">
             <option >Seleccionar</option>
             <option value="1">Masculino</option>
             <option value="2">Femenina</option>
           </select>
           <label for="floatingSelect">Sexo de la pareja actual:</label>
         </div>
       </div>
      
       <div class="col-md-6" title="Como califica su vida sexual?">
         <div class="form-floating mb-3">
           <select class="form-select" id="floatingSelect" aria-label="State">
             <option >Seleccionar</option>
             <option value="1">Bueno </option>
             <option value="2">Regular </option>
             <option value="2">Mala </option>
           </select>
           <label for="floatingSelect">Como califica su vida sexual?</label>
         </div>
       </div>
       
       <div class="col-md-12">
       
         <div class="form-floating">
           <textarea class="form-control" placeholder="Como califica su vida sexua" id="floatingTextarea" ></textarea>
           <label for="floatingTextarea">Decir mas de tu vida sexual</label>
         </div>
       </div>
       <div class="col-md-12">
         <label class="col-sm-12 col-form-label" >Utilizo preservativo en su ultima relación sexual?</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>
         
       </div>

       <div class="col-md-12">
         <label class="col-sm-12 col-form-label" >Ha tenido relaciones sexuales con persona de su mismo sexo ?</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>
         
       </div>

       <div class="col-md-12">
         <label class="col-sm-12 col-form-label" >Utilizo algun método de planificación fam.?</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>
         
       </div>
       <div class="col-md-6">
         <label class="col-sm-12 col-form-label" >Quiero embarazarse ?</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>

       </div>

       <div class="col-md-4">
         <label class="col-sm-12 col-form-label" >Menarquia </label>
         <div class="form-floating">
           <input type="text" class="form-control" id="floatingName" placeholder="años">
           <label for="floatingName">años</label>
         </div>

       </div>

       <div class="col-md-6">
         <label class="col-sm-12 col-form-label" >Fecha de Ultima Menstruación ? </label>
         <div class="form-floating">
           <input type="date" class="form-control" id="floatingName" placeholder="seleccione fecha">
           <label for="floatingName">seleccione fecha</label>
         </div>
       <div> 
       </div>
       </div>
       <div class="col-md-6">
         <label class="col-sm-12 col-form-label" >Menopausica</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
            No
           </label>
         </div>

       </div>
       <div class="col-md-12">
         <label class="col-sm-12" >Complicaciones durante embarazos</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             No
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
             Si
           </label>
         </div>
         
           <div class="form-floating">
             <input type="text" class="form-control" id="floatingName" placeholder="Detalle">
             <label for="floatingName">Detalle</label>
           </div>
         </div>

         <div class="col-md-12">
           <label class="col-sm-12" > Infección de transmisión sexual</label>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               No
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
             <label class="form-check-label" for="exampleRadios2">
               Si
             </label>
           </div>
           
             <div class="form-floating">
               <input type="text" class="form-control" id="floatingName" placeholder="Detalle">
               <label for="floatingName">Detalle</label>
             </div>
           </div>
     </form>
   </div>
   <div class="col-lg-6">
     <form class="row g-3">
       <div class="col-md-12">
       <label class="col-sm-12" >Ciclos menstruales</label>
       <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
         <label class="form-check-label" for="exampleRadios1">
           Regulares
         </label>
       </div>
       <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
         <label class="form-check-label" for="exampleRadios2">
           Irregulares
         </label>
       </div>
       
         <div class="form-floating">
           <input type="text" class="form-control" id="floatingName" placeholder="Detalle">
           <label for="floatingName">Detalle</label>
         </div>
       </div>
       <div class="col-md-11">
    <div class="form-floating">
           <input type="text" class="form-control" id="floatingName" placeholder="años">
           <label for="floatingName">Cual es la duración de sangrado menstrual en días:</label>
         </div>

       </div>

       <div class="col-md-12">
         <label class="col-sm-12 col-form-label">Cantidad de sangrado menstrual</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Normal
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
             Escaso
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
             Abudante
           </label>
         </div>
       </div>

       <div class="col-md-4">
         <label class="col-sm-12 col-form-label">Dismenorrea</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             No
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Si
           </label>
         </div>
       </div>

       <div class="col-md-8">
         <label>Fecha de ultima PAP</label><br/>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Nunca
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Menos de un año
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Entre uno a tres años
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             Mas de tres años
           </label>
         </div>
       </div>

       <div class="col-md-12">
         <label class="col-sm-12" >Antecedentes de PAP Resultados Alterados o Anormales</label>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
           <label class="form-check-label" for="exampleRadios1">
             No
           </label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
           <label class="form-check-label" for="exampleRadios2">
             Si
           </label>
         </div>
         
           <div class="form-floating">
             <input type="text" class="form-control" id="floatingName" placeholder="Detalle">
             <label for="floatingName">Detalle</label>
           </div>
         </div>

         <div class="col-md-12">
           <label class="col-sm-12 col-form-label" >Se realiza autoexamen mamario</label>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Si
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
             <label class="form-check-label" for="exampleRadios2">
              No
             </label>
           </div>
           
         </div>

         <div class="col-md-12">
           <label class="col-sm-12 col-form-label" >Fecha de la ultima mamagrafia</label>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Nunca
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Menos de un año
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Entre uno a tres años
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Mas de tres años
             </label>
           </div>
           
         </div>
         <div class="col-md-12">
           <table>
             <tr>
               <td>
                 <div class="input-group ">
                   <span class="input-group-text">P</span>
                   <input type="text" class="form-control" >
                 </div>

               </td>
               <td>
                 <div class="input-group ">
                   <span class="input-group-text">A</span>
                   <input type="text" class="form-control" >
                 </div>

               </td>
               <td>
                 <div class="input-group ">
                   <span class="input-group-text">C</span>
                   <input type="text" class="form-control" >
                 </div>

               </td>
               <td>
                 <div class="input-group ">
                   <span class="input-group-text">E</span>
                   <input type="text" class="form-control" >
                 </div>

               </td>
             </tr>
        
           </table>
           <div class="input-group ">
           <span class="input-group-text">Total de GESTACIONES</span>
           <input type="text" class="form-control" >
         </div>
         </div>

         <div class="col-md-8">
           <label class="col-sm-12 col-form-label">En caso de nuligesta, ha sido por:</label>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               No ha iniciado vida sexual activa
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               Propia elección
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               No ha propido embarazarse
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               No ha propido conservar los embarazos
             </label>
           </div>
         </div>
         <div class="col-md-12">
           <label class="col-sm-12" >Complicaciones Partos/Cesarea</label>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
             <label class="form-check-label" for="exampleRadios1">
               No
             </label>
           </div>
           <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
             <label class="form-check-label" for="exampleRadios2">
               Si
             </label>
           </div>
           
             <div class="form-floating">
               <input type="text" class="form-control" id="floatingName" placeholder="Detalle">
               <label for="floatingName">Detalle</label>
             </div>
           </div>


</form>

   </div>
</div>
 </div>
 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-controlPrena" role="tabpanel" aria-labelledby="v-pills-controlPrena-tab">
            
            <h4 class="card-title">Control Prenatal</h4>
            <div class="table-responsive-xxl">
            <table class="table table-borderless">
              <theader>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="text-align:center" >Tensión Alterial</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
               
                </tr>
              </theader>
              <tbody>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
                <tr>
                  <td >
                    <div class="form-floating">
                      <input type="date" style="width:190px"   class="form-control" id="floatingAlAl" placeholder="Fecha de la consulta">
                      <label for="floatingAlAl">Fecha de la consulta</label>
                    </div> 
                    
                  
                  </td>
                  <td>
                    
                    <div class="form-floating">
                      <input type="text" style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Semana de amenorrea">
                      <label for="floatingAlAl">Semana de amenorrea</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Peso (lb)">
                      <label for="floatingAlAl">Peso (lb)</label>
                    </div>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="max (mm)">
                            <label for="floatingAlAl">max (mm)</label>
                          </div>
                        
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="min (hg)">
                            <label for="floatingAlAl">min (hg)</label>
                          </div>
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>
                    
                    <table>
                      <tr>
                       <td>
                        <div class="form-floating">
                          <input type="text" style="width:120px"   class="form-control" id="floatingAlAl" placeholder="Alt. Ulterina">
                          <label for="floatingAlAl">Alt. Ulterina</label>
                        </div>
                      
                      </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:150px"   class="form-control" id="floatingAlAl" placeholder="Pubis.FondoCef">
                            <label for="floatingAlAl">Pubis.FondoCef</label>
                          </div>
                        </td>
                        <td>-</td>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="Pelv.Tr">
                            <label for="floatingAlAl">Pelv.Tr</label>
                          </div>
                        </td>
                      </tr>
                      </table>

                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:80px"   class="form-control" id="floatingAlAl" placeholder="lat./min.">
                            <label for="floatingAlAl">lat./min.</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Mov.Fetal">
                            <label for="floatingAlAl">Mov.Fetal</label>
                          </div> 
                          </td>
                      </tr>
                      </table>
                  </td>
                  <td >
                    <table>
                      <tr>
                        <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Edema">
                            <label for="floatingAlAl">Edema</label>
                          </div> 
                        </td>
                        <td>-</td>
                         <td>
                          <div class="form-floating">
                            <input type="text" style="width:100px"   class="form-control" id="floatingAlAl" placeholder="Varices">
                            <label for="floatingAlAl">Varices</label>
                          </div> 
                        </td>
                      </tr>
                      </table>
                  </td>
                  <td>

                    <div class="form-floating">
                      <textarea style="width:180px"   class="form-control" id="floatingAlAl" placeholder="Otros"></textarea>
                      <label for="floatingAlAl">Otros</label>
                    </div>
                  
                  </td>
                  <td>
                    <div class="form-floating">
                      <textarea style="width:240px"   class="form-control" id="floatingAlAl" placeholder="Evolución"></textarea>
                      <label for="floatingAlAl">Evolución</label>
                    </div>
                  
                  </td>
                </tr>
               
              </tbody>
              <tfooter>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="text-align:center" >Tensión Alterial</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
               
                </tr>
              </tfooter>
            </table>
          </div>
         
         </div>
<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-obs" role="tabpanel" aria-labelledby="v-pills-obs-tab">
   <h4 class="card-title">Obstétrico</h4>
   <div class="row">
     <div class="col-lg-4">
       <table class="table table-striped" >
         <tr>
           <th> Personales</th><th></th><th></th>
         </tr>
         <tr>
         <th></th><th>No</th><th>Si</th>
         </tr>
         <tr>
         <td> <label> Diabetes </label></td>
         <input type="radio" name="dia1"  value="" hidden checked>
         <td><input type="radio" name="dia1" class="dia1  alert-chekbox1 form-check-input" value="no"   ></td>
         <td><input type="radio" name="dia1" class="dia1 alert-chekbox1 form-check-input" value="si" ></td>
         </tr>
         <tr>
         <td> <label> TBC Pulmonar </label></td>
         <input type="radio" name="tbc1"  value="" hidden checked>
         <td><input type="radio" name="tbc1" id="tbc1" class='alert-chekbox2 form-check-input' value="no"  ></td>
         <td><input type="radio" name="tbc1" id="tbc1" class='alert-chekbox2 form-check-input' value="si"></td>
         </tr>
         <tr>
         <td> <label> Hipertensión </label></td>
         <input type="radio" name="hip1"  value="" hidden checked>
         <td><input type="radio" name="hip1" id="hip1" class='alert-chekbox3 form-check-input' value="no"  ></td>
         <td><input type="radio" name="hip1" id="hip1" value="si" class='alert-chekbox3 form-check-input'></td>
         </tr>
         <tr>
         <td> <label>  Pelvico-Urinaria </label></td>
         <input type="radio" name="pelv"  value="" hidden checked>
         <td><input type="radio" name="pelv" id="pelv" value="no" class='alert-chekbox4 form-check-input' ></td>
         <td><input type="radio" name="pelv" id="pelv" value="si" class='alert-chekbox4 form-check-input'></td>
         </tr>
         <tr>
         <td> <label> Infertilidad </label></td>
         <input type="radio" name="inf"  value="" hidden checked>
         <td><input type="radio" name="infert" id="inf" value="no" class='alert-chekbox5 form-check-input' ></td>
         <td><input type="radio" name="infert" id="inf" value="si" class='alert-chekbox5 form-check-input'></td>
         </tr>
         <tr>
         <td><label>Otros </label></td>
         <input type="radio" name="otros1"  value="" hidden checked>
         <td><input type="radio" name="otros1" id="otros1" value="no" class='alert-chekbox6 form-check-input' ></td>
         <td><input type="radio" name="otros1" id="otros1" value="si" class='alert-chekbox6 form-check-input'></td>
         </tr>
         <tr >
         <td colspan="3">
           <div class="form-floating">
             <input type="text" class="form-control" id="otros1_text" placeholder="Detalle">
             <label for="otros1_text">Detalle </label>
           </div>
           
         </td>
         </tr>
         </table>
     
       </div>

       <div class="col-lg-4">
         <table class="table table-striped" >
           <tr>
             <th> Familiares</th><th></th><th></th>
           </tr>
           <tr>
           <th></th><th>No</th><th>Si</th>
           </tr>
           <tr>
           <td> <label> Diabetes</label></td>
           <input type="radio" name="dia2"  value="" hidden checked>
           <td><input type="radio" name="dia2" id="dia2" value="no" class='alert-chekbox7 form-check-input' ></td>
           <td><input type="radio" name="dia2" id="dia2" value="si" class='alert-chekbox7 form-check-input'></td>
           </tr>
           <tr>
           <td> <label> TBC Pulmonar</label></td>
           <input type="radio" name="tbc2"  value="" hidden checked>
           <td><input type="radio" name="tbc2" id="tbc2" value="no" class='alert-chekbox8 form-check-input' ></td>
           <td><input type="radio" name="tbc2" id="tbc2" value="si" class='alert-chekbox8 form-check-input'></td>
           </tr>
           <tr>
           <td> <label> Hipertensión</label></td>
           <input type="radio" name="hip2"  value="" hidden checked>
           <td><input type="radio" name="hip2" id="hip2" value="no" class='alert-chekbox9 form-check-input' ></td>
           <td><input type="radio" name="hip2" id="hip2" value="si" class='alert-chekbox9 form-check-input'></td>
           </tr>
           <tr>
           <td> <label> Gemelares</label></td>
           <input type="radio" name="gem"  value="" hidden checked>
           <td><input type="radio" name="gem" id="gem" value="no" class='alert-chekbox10 form-check-input' ></td>
           <td><input type="radio" name="gem" id="gem" value="si" class='alert-chekbox10 form-check-input'></td>
           </tr>
           <tr>
           <td>
           <label>Otros</label></td>
           <input type="radio" name="otros2"  value="" hidden checked>
           <td><input type="radio" name="otros2" id="otros2" value="no" class='alert-chekbox11' ></td>
           <td><input type="radio" name="otros2" id="otros2" value="si" class='alert-chekbox11'></td>
           </tr>
           <tr>
           <td colspan="3">

             <div class="form-floating">
               <input type="text" class="form-control" id="otros2_text" placeholder="Detalle">
               <label for="otros2_text">Detalle </label>
             </div>
            
           </td>
           </tr>
           </table>
         
           </div>

           <div class="col-lg-4">
             <table class="table table-striped" >
               <tr>
               <th>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</th>
               <th></th>
               </tr>
               <tr>
               <td> <label> Fiebre </label></td>
               <td><input class="form-check-input thischeckbox" type="checkbox" name="fiebre" ></td>
               </tr>
               <tr>
               <td> <label> Artralgia </label></td>
               <td><input class="form-check-input thischeckbox" type="checkbox" name="artra"></td>
               </tr>
               <tr>
               <td> <label>Mialgia </label> </td>
               <td><input class="form-check-input thischeckbox" type="checkbox" name="mia"></td>
               </tr>
               <tr>
               <td> <label>Exantema cutaneo </label></td>
               <td><input class="form-check-input thischeckbox" type="checkbox" name="exa"></td>
               </tr>
               <tr>
               <td>  <label>Conjuctivitis no purulenta/hiperemica </label> </td>
               <td><input class="form-check-input thischeckbox" type="checkbox" name="con"></td>
               
               
               </tr>
               
               </table>
             
               </div>
               <div class="col-lg-12">
                 <div style="overflow-x:auto;">
                 <table class="table"  >

                   <tr>
                   <td> Ninguno o mas de 3 partos</td>
                   <td><input class="thischeckbox" type="checkbox" name="nig1"></td>
                   <td>  
                      <div class="input-group mb-2">
                     <span class="input-group-text">Partos</span>
                     <input type="text" class="form-control sumg" id="partos" >
                     </div>
                   </td>

                   <td>  
                     <div class="input-group mb-2">
                    <span class="input-group-text">Aborto</span>
                    <input type="text" class="form-control sumg" id="arbotos" >
                    </div>
                  </td>
                  <td>  
                   <div class="input-group mb-2">
                  <span class="input-group-text">Vaginales</span>
                  <input type="text" class="form-control sumg" id="vaginales" >
                  </div>
                </td>

                <td>  
                 <div class="input-group mb-2">
                <span class="input-group-text">Viven</span>
                <input type="text" class="form-control sumg" id="viven" >
                </div>
              </td>
                   </tr>
                   <tr>
                   <td> Algun RN menor de 2500g</td>
                   <td><input class="thischeckbox" type="checkbox" name="nig2"></td>
                   <td>  
                     <div class="input-group mb-2">
                    <span class="input-group-text">Gestas</span>
                    <input type="text" class="form-control sumg" id="gestas" >
                    </div>
                  </td>
                  <td>  
                   <div class="input-group mb-2">
                  <span class="input-group-text">Cesareas</span>
                  <input type="text" class="form-control sumg" id="cesareas" >
                  </div>
                </td>
                <td>  
                 <div class="input-group mb-2">
                <span class="input-group-text">Muertos 1era sem.</span>
                <input type="text" class="form-control sumg" id="muertos1" >
                </div>
              </td>
                   </tr>
                   <tr>
                   <td> Embarazo multiple</td>
                   <td><input class="thischeckbox" type="checkbox" name="nig3"></td>

                   <td>  
                     <div class="input-group mb-2">
                    <span class="input-group-text">Nacidos vivos</span>
                    <input type="text" class="form-control sumg" id="nacidov1" >
                    </div>
                  </td>
                  <td>  
                   <div class="input-group mb-2">
                  <span class="input-group-text">Nacidos muertos</span>
                  <input type="text" class="form-control sumg" id="nacidom1" >
                  </div>
                </td>

                <td>  
                 <div class="input-group mb-2">
                <span class="input-group-text">Despues 1era sem.</span>
                <input type="text" class="form-control sumg" id="despues1s" >
                </div>
              </td>

              <td>  
               <div class="input-group mb-2">
              <span class="input-group-text">otros</span>
              <input type="text" class="form-control sumg" id="otrosc" >
              </div>
            </td>
               </tr>
               <tr>
                 <td colspan="3">
                   <div class="form-floating">
                     <input type="text" class="form-control" id="fin" placeholder="Fin Ant. Embarazo">
                     <label for="fin">Fin Ant. Embarazo </label>
                   </div> 
                 </td>
                 <td>
                   <div class="input-group mb-2">
                     <div class="form-floating">
                       <input type="text" class="form-control" id="fin" placeholder="RN con major peso">
                       <label for="fin">RN con major peso </label>
                     </div> 
                     <span class="input-group-text">lb</span>
                     </div>

                 </td>
               </tr>
                   </table>
                   </div>
               </div>
              
       </div>
       </div>












   <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-recetas" role="tabpanel" aria-labelledby="v-pills-recetas-tab">

   <div class="row">
       <div class="col-md-5">
         <h4 class="font-italic mb-4"> Indicación Recetas</h4>
         <div class="col-sm-10">
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingMed" placeholder="Niguno">
             <label for="floatingMed"> Medicamento</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingDosis" placeholder="Niguno">
             <label for="floatingDosis">Dosis</label>
           </div>
           
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="floatingPres" placeholder="Niguno">
             <label for="floatingPres">Presentación</label>
           </div>
           <div class="form-floating mb-3">
             <div class="form-floating">
               <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                 <option value="">Seleccionar</option>
                 <option value="1">cada media hora</option>
                 <option value="2">cada 1 hora</option>
                 <option value="3">cada 2 horas</option>
                 <option value="3">cada 4 horas</option>
                 <option value="3">cada 6 horas</option>
                 <option value="3">cada 8 horas</option>
                 <option value="3">cada 12 horas</option>
                 <option value="3">cada 14 horas</option>
                 <option value="3">cada 16 horas</option>
                 <option value="3">cada 18 horas</option>
                 <option value="3">cada 24 horas</option>
               </select>
               <label for="floatingSelect">Frecuencia</label>
             </div>
           </div>
           <div class="row">
            
           <div class="col">
             <div class="form-floating">
               <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                 <option value="">Seleccionar</option>
                 <option value="1">Oral</option>
                 <option value="2">Rectal</option>
                 <option value="3">Subcutanea</option>
               </select>
               <label for="floatingSelect">Vía</label>
             </div>
             
           </div>
           
           <div class="col">
             <div class="form-floating">
               <input type="text" class="form-control" id="floatingCantidad" placeholder="Niguno">
               <label for="floatingCantidad">Cantidad</label>
             </div>
             <div class="form-check">
               <input class="form-check-input" type="checkbox" id="gridCheck">
               <label class="form-check-label" for="gridCheck">
                 Uso Continuo
               </label>
             </div>
           </div>
         </div>
         <div class="text-end">
           <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-right"></i> Agregar</button>
           <br/><br/>
         </div>
         
         </div>
         
        </div>

       <div class="col-md-7">
      
           <div class="row">
           <div style="overflow-x:auto;">
           <table class="table">
             <thead>
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Medicamento</th>
                 <th scope="col">Presentación</th>
                 <th scope="col">Frecuencia</th>
                 <th scope="col">Vía</th>
                 <th scope="col">Cantidad</th>
                
               </tr>
             </thead>
             <tbody>
               <tr>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 
               </tr>
              
             </tbody>
           </table>
           </div>
           <div class="text-end">
             <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-save"></i> Guardar</button>
             <br/><br/>
           </div>
           </div>
         </div>
         
       </div>
       
       <div class="col-md-12   border-default border-top ">
         <div class="card" >
           <div class="card-body">
             <h5 class="card-title">Indicaciónes Previas</h5>
             <em class="card-subtitle mb-2 text-muted">Total Recetas 0</em>
             
               <div class="row">
               <div style="overflow-x:auto;">
                 <table class="table">
                   <thead>
                     <tr>
                       <th scope="col">Fecha</th>
                       <th scope="col">Medicamento</th>
                       <th scope="col">Presentación</th>
                       <th scope="col">Frecuencia</th>
                       <th scope="col">Vía</th>
                       <th scope="col">Cantidad</th>
                       <th scope="col" colspan="2">Acción</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th>
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                         <i class="bi bi-pencil-fill btn btn-primary"></i>
                       <i class="bi bi-x-square btn btn-danger"></i>
                       </div>
                     </th>
                     </tr>
                    
                   </tbody>
                 </table>
                 </div>
               </div>
            
             
           </div>
         </div>
         
       </div>
  
   </div>


<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-estudios" role="tabpanel" aria-labelledby="v-pills-estudios-tab">

<div class="row">
 <div class="col-md-7">
   <h4 class="font-italic mb-4"> Indicación Estudios</h4>
   <div class="col-sm-10">
     <div class="form-floating mb-3">
       <input type="text" class="form-control" id="floatingMed" placeholder="Niguno">
       <label for="floatingMed"> Estudios</label>
     </div>
     <div class="form-floating mb-3">
       <input type="text" class="form-control" id="floatingDosis" placeholder="Niguno">
       <label for="floatingDosis">Parte del cuerpo</label>
     </div>
     
     <div class="form-floating mb-3">
       <input type="text" class="form-control" id="floatingPres" placeholder="Niguno">
       <label for="floatingPres">Lateralidad</label>
     </div>
     <div class="form-floating mb-3">
       <input type="text" class="form-control" id="floatingFr" placeholder="Niguno">
       <label for="floatingFr">Observaciones</label>
     </div>
     
   <div class="text-end">
     <button type="button" class="btn btn-success"><i class="bi bi-save"></i> Guardar</button>
     <br/><br/>
   </div>
   
   </div>
   
  </div>


   
 </div>
 
 <div class="col-md-12   border-default border-top ">
   <div class="card" >
     <div class="card-body">
       <h5 class="card-title">Indicaciónes Previas</h5>
       <em class="card-subtitle mb-2 text-muted">Total Estudio 0</em>
       
         <div class="row">
           <div style="overflow-x:auto;">
           <table class="table">
             <thead>
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Estudios</th>
                 <th scope="col">Parte del cuerpo</th>
                 <th scope="col">Frecuencia</th>
                 <th scope="col">Vía</th>
                 <th scope="col">Lateralidad</th>
                 <th scope="col">Nota</th>
                 <th scope="col" colspan="2">Acción</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th>
                   <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                   <i class="bi bi-pencil-fill btn btn-primary"></i>
                 <i class="bi bi-x-square btn btn-danger"></i>
                 </div>
               </th>
               </tr>
              
             </tbody>
           </table>
         </div>
       </div>
       
       
     </div>
   </div>
   
 </div>

</div>


</div>
</main><!-- End #main -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div class="modal fade" id="largeModalResumenHist" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Resumen De La Ultima Historia Clinica</h4>
         
            <button type="button" class="btn btn-primary p-2">   <i class="bi bi-printer"></i></button>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
        
  <div class="card-body">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">

            <img src="<?= base_url();?>assets_new/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h4>Kevin Anderson</h4>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">

    <div style="overflow-x:auto;">
      <table class="table  table-striped">
        <thead>
          <tr>
           
            <th scope="col">NEC</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">EDAD</th>
            <th scope="col">NACIONALIDAD</th>
            <th scope="col">CEDULA</th>
            <th scope="col">TEL.</th>
            <th scope="col">SEGURO MEDICO</th>
            
            
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>6685</td>
            <td>YUDERKY MARGARITA PUENTE REYES </td>
            <td>28 anos</td>
            <td>Dominican Republic</td>
            <td>000-7877667-3</td>
            <td>5673-456-6666</td>
            <td>SENASA</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<hr/>
     <!-- Default Tabs -->
     <h4 class="card-title">Enfermedad Actual</h4>
     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
     <h4 class="card-title">Conclusion Diagnostico</h4>
     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
     <h4 class="card-title">Signos Vitales</h4>
     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
   

  </div>

          </div>
        
        </div>
      </div>
    </div><!-- End Large Modal-->


    <div class="modal fade" id="largeModalReporteGnrl" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reporte General</h4>
         
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
        
  <div class="card-body">
    
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">

            <img src="<?= base_url();?>assets_new/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h4>Kevin Anderson</h4>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">

    <div style="overflow-x:auto;">
      <table class="table  table-striped">
        <thead>
          <tr>
           
            <th scope="col">NEC</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">EDAD</th>
            <th scope="col">NACIONALIDAD</th>
            <th scope="col">CEDULA</th>
            <th scope="col">TEL.</th>
            <th scope="col">SEGURO MEDICO</th>
            
            
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>6685</td>
            <td>YUDERKY MARGARITA PUENTE REYES </td>
            <td>28 anos</td>
            <td>Dominican Republic</td>
            <td>000-7877667-3</td>
            <td>5673-456-6666</td>
            <td>SENASA</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<hr/>
    <div class="text-left">
      <nav aria-label="Page navigation example">
        <em class="card-subtitle mb-2 text-muted">Registros 3</em>
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#"><i class="bi bi-skip-backward-fill"></i></a></li>
          <li class="page-item"><a class="page-link" href="#">01-04-2021</a></li>
          <li class="page-item"><a class="page-link" href="#">23-06-2021</a></li>
          <li class="page-item"><a class="page-link" href="#">09-09-2021</a></li>
          <li class="page-item"><a class="page-link" href="#"><i class="bi bi-skip-forward-fill"></i></a></li>
        </ul>
      </nav> 
       
  </div>
  
    <form>
      <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text">Reporte</span>
        
          <select class="form-select" >
            <option selected>Seleccione</option>
            <option >Licencia Medica</option>
            <option value="1">Otros</option>
          </select>
          <span class="input-group-text"><a href="#" data-bs-toggle="tooltip" data-bs-title="Ajuntar La Historial Actual "><i class="bi bi-plus-lg"></i> Historial Actual </a>
          </span>
        </div>
      </div>
      <div class="mb-3">
    <div class="input-group">
      <span class="input-group-text">Detalle</span>
      <textarea class="form-control" aria-label="With textarea" style="height: 200px;"></textarea>
    </div>
  </div> 
      <div class="text-end">
       
        <button type="submit" class="btn btn-success">Guardar</button>
      
      </div>
  
    </form>

  </div>

          </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
        </div>
      </div>
    </div>
	
	 <div class="modal fade" id="largeModalOrdenMedica" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Orden Medica</h4>
         
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
        
  <div class="card-body">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">

            <img src="<?= base_url();?>assets_new/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h4>Kevin Anderson</h4>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">

    <div style="overflow-x:auto;">
      <table class="table  table-striped">
        <thead>
          <tr>
           
            <th scope="col">NEC</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">EDAD</th>
            <th scope="col">NACIONALIDAD</th>
            <th scope="col">CEDULA</th>
            <th scope="col">TEL.</th>
            <th scope="col">SEGURO MEDICO</th>
            
            
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>6685</td>
            <td>YUDERKY MARGARITA PUENTE REYES </td>
            <td>28 anos</td>
            <td>Dominican Republic</td>
            <td>000-7877667-3</td>
            <td>5673-456-6666</td>
            <td>SENASA</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<hr/>
    <div class="row">
  	<div class="col-md-12">

		<div class="row  mb-3">
		
		<div class="col-sm-8">
		    <div class="form-floating mb-3">
		<select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Histerectomia</option>
		  <option value="2">De Ovarios</option>
		  <option value="3">Cesarea</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Centro Medico</label>
	  </div>
		</div>
		<div class="col-sm">
		<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Sala" />
                <label for="floatingAbdominal">Sala</label>
              </div>
		
		</div>
		</div>
		
		<div class="row  mb-3">
		
		<div class="col-sm">
		    <div class="form-floating mb-3">
		<div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingAbdominal" placeholder="Fecha de Inicio" />
                <label for="floatingAbdominal">Fecha de Inicio</label>
              </div>
	  </div>
		</div>
		<div class="col-sm-8">
		<div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingAbdominal" placeholder="Diagnostico de Ingreso" />
                <label for="floatingAbdominal">Diagnostico de Ingreso</label>
              </div>
		
		</div>
		</div>
		
		   <div class="row  border ">
                <div class="col-md-6 border border-start-0   border border-top-0  border border-bottom-0 " >
				<br/>
                  <h4 class="font-italic mb-4"> I- Indicaciones Medicamentos</h4>
                  <div class="col-sm-10">
                    <div class="form-floating mb-3">
					 <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="">Seleccionar</option>
                          <option value="1">cada media hora</option>
                          <option value="2">cada 1 hora</option>
                          <option value="3">cada 2 horas</option>
                          <option value="3">cada 4 horas</option>
                          <option value="3">cada 6 horas</option>
                          <option value="3">cada 8 horas</option>
                          <option value="3">cada 12 horas</option>
                          <option value="3">cada 14 horas</option>
                          <option value="3">cada 16 horas</option>
                          <option value="3">cada 18 horas</option>
                          <option value="3">cada 24 horas</option>
                        </select>
                        <label for="floatingSelect">Medicamento</label>
                    
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingDosis" placeholder="Presentación">
                      <label for="floatingDosis">Presentación</label>
                    </div>
                    
                   
                    <div class="form-floating mb-3">
                     
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="">Seleccionar</option>
                          <option value="1">cada media hora</option>
                          <option value="2">cada 1 hora</option>
                          <option value="3">cada 2 horas</option>
                          <option value="3">cada 4 horas</option>
                          <option value="3">cada 6 horas</option>
                          <option value="3">cada 8 horas</option>
                          <option value="3">cada 12 horas</option>
                          <option value="3">cada 14 horas</option>
                          <option value="3">cada 16 horas</option>
                          <option value="3">cada 18 horas</option>
                          <option value="3">cada 24 horas</option>
                        </select>
                        <label for="floatingSelect">Frecuencia</label>
                     
                    </div>
                      <div class="form-floating  mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="">Seleccionar</option>
                          <option value="1">Oral</option>
                          <option value="2">Rectal</option>
                          <option value="3">Subcutanea</option>
                        </select>
                        <label for="floatingSelect">Vía</label>
                      </div>
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control" id="floatingAbdominal" placeholder="Nota" style="height: 100px"></textarea>
                      <label for="floatingDosis">Nota</label>
                    </div>
                     
                
                  <div class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                  </div>
                  
                  </div>
                  
                 </div>
        
                <div class="col-md-6" >
               
                    <div class="row" >
				
                    </div>
                  </div>
                  
                
		</div>
		
		
		
		
		
		  <div class="row  border ">
                <div class="col-md-6 border border-start-0   border border-top-0  border border-bottom-0 " >
				<br/>
                  <h4 class="font-italic mb-4"> II- Indicaciónes Estudios</h4>
                  <div class="col-sm-10">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Histerectomia</option>
		  <option value="2">De Ovarios</option>
		  <option value="3">Cesarea</option>
		  
		</select>
		<label for="floatingGineObs" class="form-label">Estudios</label>
                    </div>
                    
                    
                   
                    <div class="form-floating mb-3">
                     
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="">Seleccionar</option>
                          <option value="1">cada media hora</option>
                          <option value="2">cada 1 hora</option>
                          <option value="3">cada 2 horas</option>
                          <option value="3">cada 4 horas</option>
                          <option value="3">cada 6 horas</option>
                          <option value="3">cada 8 horas</option>
                          <option value="3">cada 12 horas</option>
                          <option value="3">cada 14 horas</option>
                          <option value="3">cada 16 horas</option>
                          <option value="3">cada 18 horas</option>
                          <option value="3">cada 24 horas</option>
                        </select>
                        <label for="floatingSelect">Parte del Cuerpo</label>
                     
                    </div>
					<div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingDosis" placeholder="Lateral">
                      <label for="floatingDosis">Lateral</label>
                    </div>
                     
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control" id="floatingAbdominal" placeholder="Observaciones" style="height: 100px"></textarea>
                      <label for="floatingDosis">Observaciones</label>
                    </div>
                     
                
                  <div class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                  </div>
                  
                  </div>
                  
                 </div>
        
                <div class="col-md-6 " >
               
                    <div class="row" >
				
                    </div>
                  </div>
                  
                
		</div>
		
		
		
		  <div class="row  border ">
                <div class="col-md-6 border border-start-0   border border-top-0  border border-bottom-0 " >
				<br/>
                  <h4 class="font-italic mb-4"> III- Medidas Generales</h4>
                  <div class="col-sm-10">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingGineObs" aria-label="Floating label select example">
		  <option selected></option>
		  <option value="1">Medidas Generales</option>
		  <option value="2">Dietas</option>
		</select>
		<label for="floatingGineObs" class="form-label">Medidas Generales</label>
                    </div>
                    
                      <div class="form-floating mb-3">
                       <textarea class="form-control" id="floatingAbdominal" placeholder="Descripción" style="height: 100px"></textarea>
                      <label for="floatingDosis">Descripción</label>
                    </div>  
              
					<div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingDosis" placeholder="Intervalo de Realización">
                      <label for="floatingDosis">Intervalo de Realización</label>
                    </div>
                     
                  
                
                  <div class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                  </div>
                  
                  </div>
                  
                 </div>
        
                <div class="col-md-6 " >
               
                    <div class="row" >
				
                    </div>
                  </div>
                  
                
		</div>
	</div>
</div>
  </div>

          </div>
        
        </div>
      </div>
    </div><!-- End Large Modal-->
  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>assets_new/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/chart.js/chart.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/php-email-form/validate.js"></script>
 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script src="<?=base_url();?>assets_new/js/jquery-drawpad.js"></script>

<script>
$(document).ready(function() {
	

var current_diagrama = $("#show-current-diagrama").val();

  //var urlBackground2 = '<?=base_url();?>assets/img/cirujano-vascular/diagrama-1619019581.png';


  var urlBackground2 = '<?=base_url();?>assets_new/img/venas-piernas/'+current_diagrama;
  var imageBackground2 = new Image();
  imageBackground2.src = urlBackground2;
  //imageBackground2.crossorigin = "anonymous";
  imageBackground2.setAttribute('crossorigin', 'anonymous');
		
$("#saveDiagrama").drawpad({
	colors: [
	"#000000",//black

	"#2ecc71",//green

	"#3498db",//blue

	"#e74c3c",//red

	"#f1c40f",//yellow

	"#e67e22",//orange
	],

	});	
	
	 var contextCanvas2 = $("#saveDiagrama canvas").get(0).getContext('2d');
  imageBackground2.onload = function(){
    contextCanvas2.drawImage(imageBackground2, 0, 0);
  }

 $('#resetme2').on('click', function(event) {
	 contextCanvas2.clearRect(0, 0, 750, 423);
	  contextCanvas2.drawImage(imageBackground2, 0, 0);
	 });

$('#updateCirujanoVas').on('click', function(event) {
event.preventDefault();
 let id_cirujano_vas=$("#id_cirujano_vas").val();
  let updated_by=$("#updated_by").val();
  
 let cir_vas_dol= [];
 $("input[name='_cir_vas_dol']:checked").each(function(){
            cir_vas_dol.push(this.value);
 });
 
  let cir_vas_edema= [];
 $("input[name='_cir_vas_edema']:checked").each(function(){
            cir_vas_edema.push(this.value);
 });
  let cir_vas_pesadez= [];
 $("input[name='_cir_vas_pesadez']:checked").each(function(){
            cir_vas_pesadez.push(this.value);
 });
  let cir_vas_cansancio= [];
 $("input[name='_cir_vas_cansancio']:checked").each(function(){
            cir_vas_cansancio.push(this.value);
 });
  let cir_vas_quemazo= [];
 $("input[name='_cir_vas_quemazo']:checked").each(function(){
            cir_vas_quemazo.push(this.value);
 });
  let cir_vas_calambred= [];
 $("input[name='_cir_vas_calambred']:checked").each(function(){
            cir_vas_calambred.push(this.value);
 });
  let cir_vas_purito= [];
 $("input[name='_cir_vas_purito']:checked").each(function(){
            cir_vas_purito.push(this.value);
 });
  let cir_vas_hiper= [];
 $("input[name='_cir_vas_hiper']:checked").each(function(){
            cir_vas_hiper.push(this.value);
 });
  let cir_vas_ulceras= [];
 $("input[name='_cir_vas_ulceras']:checked").each(function(){
            cir_vas_ulceras.push(this.value);
 });
  let cir_vas_pares= [];
 $("input[name='_cir_vas_pares']:checked").each(function(){
            cir_vas_pares.push(this.value);
 });
  let cir_vas_claud= [];
 $("input[name='_cir_vas_claud']:checked").each(function(){
            cir_vas_claud.push(this.value);
 });
  let cir_vas_necrosis= [];
 $("input[name='_cir_vas_necrosis']:checked").each(function(){
            cir_vas_necrosis.push(this.value);
 });

let cir_vas_otros=$("#_cir_vas_otros").val();
let cir_vas_cirugias=$("#_cir_vas_cirugias").val();
let cir_vas_alergias=$("#_cir_vas_alergias").val();
let cir_vas_enf_sis=$("#_cir_vas_enf_sis").val();
let cir_vas_habitos=$("#_cir_vas_habitos").val();
let	cir_vas_exam_fis_dir=$("#_cir_vas_exam_fis_dir").val();
let cir_vas_historial =$("#_cir_vas_historial").val();

 var base64Image = $("#saveDiagrama canvas").get(0).toDataURL();
$('#diagrama_saveDiagrama').val(base64Image);
let diagrama_saveDiagrama =$("#diagrama_saveDiagrama").val();	
if(cir_vas_historial=="")
{
alert('El campo HISTORIAL es requerido!');	
}
 else{

$.ajax({
type: "POST",
url: "<?=base_url('SaveHistorial/saveCirujanoVascular')?>",
data: {cir_vas_dol:cir_vas_dol,cir_vas_edema:cir_vas_edema,cir_vas_pesadez:cir_vas_pesadez,	
cir_vas_cansancio:cir_vas_cansancio,cir_vas_quemazo:cir_vas_quemazo,cir_vas_calambred:cir_vas_calambred,
cir_vas_purito:cir_vas_purito,cir_vas_hiper:cir_vas_hiper,cir_vas_ulceras:cir_vas_ulceras,
cir_vas_pares:cir_vas_pares,cir_vas_claud:cir_vas_claud,cir_vas_necrosis:cir_vas_necrosis,
cir_vas_historial:cir_vas_historial,diagrama_cirugia_vascular:diagrama_saveDiagrama,
cir_vas_otros:cir_vas_otros,cir_vas_cirugias:cir_vas_cirugias,cir_vas_alergias:cir_vas_alergias,
cir_vas_enf_sis:cir_vas_enf_sis,cir_vas_habitos:cir_vas_habitos,cir_vas_exam_fis_dir:cir_vas_exam_fis_dir,
updated_by:updated_by,id_cirujano_vas:id_cirujano_vas},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#resultdd').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
success:function(data){
 alert('Cambio hecho!');	
},
 
});

}	
	
});











});
</body>

</html>