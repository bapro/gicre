 <?php
 foreach($editUser as $row)?>


 <section class="py-3 profile">
        <div class="container">
		  <div class="pagetitle">
      <h1>Mi Cuenta</h1>
     
    </div>
		  <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center text-center">
<span class="bi bi-person-circle fs-1"></span>
              <h2><?=$row->name?></h2>
              <h3><?=$row->perfil?></h3>
			  <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>-->
            </div>
          </div>

        </div>
              <div class="col-xl-8">
       <input name="id_user" type="hidden" class="form-control" id="id_user" value="<?=$row->id_user?>">
            <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Cuenta</button>
                </li>

            
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar Contraseña</button>
                </li>

               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title p-2">Acerca de</h5>
                  <p class="small fst-italic">
				  <?=$row->perfil?> <?=$row->name?> <?=$creation_info?>
				  </p>

                  <h5 class="card-title p-2">Detalles del Perfil</h5>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nombres</div>
                    <div class="col-lg-9 col-md-8"><?=$row->name?></div>
                  </div>

                  <div class="row  mb-3">
                    <div class="col-lg-3 col-md-4 label">Cédula</div>
                    <div class="col-lg-9 col-md-8"><?=$row->cedula?></div>
                  </div>


                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Correo Electrónico</div>
                    <div class="col-lg-9 col-md-8"><?=$row->correo?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Teléfono</div>
                    <div class="col-lg-9 col-md-8"><?=$row->cell_phone?></div>
                  </div>

				  
	
                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
				   <div class="row mb-3">
				 
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                       <a  href='#' id='generarCont'>Generar Contraseña</a>
					      <button  class="btn btn-default btn-sm" type="button" id="verPassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
					  
                      </div>
                    </div>
				
                 <div class="row mb-3">
				 
                      <label for="newpassword1" class="col-md-4 col-lg-3 col-form-label">Nueva Contraseña <span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input  id="newpassword1" type="password" class="form-control new-pass" id="newPassword">
                      </div> 
                    </div>

                    <div class="row mb-3">
                      <label for="newpassword2" class="col-md-4 col-lg-3 col-form-label">Re-ingrese Nueva Contraseña <span class="text-danger">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input  id="newpassword2" type="password" class="form-control new-pass" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" id="savePassw">Cambiar Contraseña</button>
					   <div  id="passwordResult"></div>
                    </div>
					<input id="userPhone" type="hidden" />
                  <!-- End Change Password Form -->

                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>
	 </div>
	  </div>
        </div>
    </section>
	
	
	<div id="result-error"></div>

  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
<?php $this->load->view('admin/users/footer');?>
<script>

	
</script>

	

	 
</body>

</html>