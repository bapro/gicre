  <!DOCTYPE html>
  <html1 lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Historial Clinica</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oxygen:wght@300&display=swap" rel="stylesheet">


      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
      <!-- Vendor CSS Files -->
      <link href="<?= base_url(); ?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <link href="<?= base_url(); ?>assets_new/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/vendor/simple-datatables/style.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/vendor/bootstrap-select-1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets_new/img/webfont-medical-icons-master/packages/webfont-medical-icons/css/wfmi-style.css" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="<?= base_url(); ?>assets_new/css/style.css" rel="stylesheet">
      <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
      <!--javascript files--->
      <script src="<?= base_url(); ?>assets_new/js/jquery-3.2.1.min.js"></script>
      <script src="<?= base_url(); ?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="<?= base_url(); ?>assets_new/vendor/simple-datatables/simple-datatables.js"></script>
      <!-- Template Main JS File -->
      <script src="<?= base_url(); ?>assets_new/js/main.js"></script>
      <script src="<?= base_url(); ?>assets/js/jquery.number.js"></script>
      <!--<script src="<?= base_url(); ?>asset_new/js/sweetalert2.min.js"  ></script>-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

      <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
      <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
      <!-- Datatable CSS -->


      <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    </head>

    <body>

      <main>
        <div class="" style="background:white">
          <header class="p-3 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
              <span class="d-none d-lg-block">ProfamiliaHC</span>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 link-dark">FACTURAS</a></li>
              <!--<li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>-->
            </ul>

            <div class="col-md-3 text-end">
              <button type="button" class="btn btn-outline-primary me-2">Loguear</button>
              <!--<button type="button" class="btn btn-primary">Sign-up</button>-->
            </div>
          </header>
        </div>


        <div class="container">
          <div class="card">
            <div class="card-header">Pacientes</div>
            <div class="card-body">
              <h2 class="card-title">Listado de pacientes</h2>
              <div style="overflow-x:auto;">
                <table id="billings" class="table table-striped  " style="width:100%">
                  <thead>
                    <tr>
                      <th>Tipo</th>
                      <th>Turno</th>
                      <th>Nombres</th>
                      <th>Nec_pro</th>
                      <th>Cedula</th>
                      <th>ARS</th>
                      <th>Centro</th>
                      <th>Doctor</th>
                      <th>Status</th>
                      <th><span class="material-symbols-outlined">
                          visibility
                        </span></th>
                      <th>Historial Medica</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="float-end">

              </div>

            </div>
          </div>


        </div>

      </main><!-- End #main -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Template Main JS File -->

      <script>
        $(document).ready(function() {

          $('#billings').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>factura/factura_list",
              type: 'GET',
              'data': function(data) {


              }
            },
            // 	"aLengthMenu": [
            //     [25, 50, 100, 200, -1],
            //     [25, 50, 100, 200, "All"]
            // ],
          });
        });
      </script>
    </body>

    </html>