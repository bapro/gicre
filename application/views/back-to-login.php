<!DOCTYPE html1>
<html1 lang="en">

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
</style>
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html1-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <main style="
    background-image: url('<?= base_url();?>assets_new/img/logo/logo-gicre-cliente2.jpg');
    height: 100vh; background-repeat: no-repeat;
  background-size: cover;
  background-position: center;">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <!--<img src="<?= base_url();?>assets/img/profamilia.jpg"  alt="">-->
                  <span class="d-none d-lg-block">GICRE</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
       <div class="modal fade" id="newAppointmentModal" tabindex="-1"
                                        aria-labelledby="newAppointmentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newAppointmentModalLabel">Ingrese a su cuenta
                    <p class="text-center small">Ingrese su nombre de usuario y contraseña para iniciar sesión</p>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <form class="row g-3 needs-validation" method='post' novalidate action="<?php echo site_url('login/validate');?>">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Uusuario</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Por favor, introduzca su nombre de usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div>
                    </div>

                    <!--<div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Loguear</button>
                    </div>
                    <!--<div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>-->
                  </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                </div>
              </div>

             

            </div>
          </div>
        </div>

      </section>

    </div>
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