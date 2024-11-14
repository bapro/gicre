 <?php
 $id_user_= $userData['id_user'];
?>
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
              <h2><?=$show_user_name?></h2>
              <h3><?=$show_user_perfil?></h3>
			  <input id="user_perfil_by_id" type="hidden" value="<?=$this->session->userdata('user_perfil')?>" />
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

            <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview-med">Descripción General</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" type="button" data-bs-target="#profile-edit-amed">Editar Perfil</button>
                </li>
         
                 <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-center-med">Centros Médico</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password-med">Cambiar Contraseña</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-interface-med">Interfaz</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview-med" id="profile-overview-med">
                  <h5 class="card-title p-2">Acerca de</h5>
                  <p class="fst-italic">
				  <?=$show_user_perfil?> <?=$userData['name']?> <?=$creation_info?>. La primera historia clínica fue creada el <?=$first_inserted_hist?>. 
				  </p>

                  <h5 class="card-title p-2">Detalles del Perfil</h5>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nombres</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['name']?></div>
                  </div>

                  <div class="row  mb-3">
                    <div class="col-lg-3 col-md-4 label">Cédula</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['cedula']?></div>
                  </div>

             

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Correo electrónico</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['correo']?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Teléfono</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['cell_phone']?></div>
                  </div>

                
                </div>

                <div class="tab-pane fade profile-edit-amed pt-3" id="profile-edit-amed">

                  <!-- Profile Edit Form -->
                  <form action="<?php echo site_url('users/updateUserAccount');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagen de perfil</label>
                      <div class="col-md-8 col-lg-9">
                        			<input type="file" name="user-foto" id="user-foto" class="logo-tipo form-control" onchange="preview_logo_tipo(event)"   accept=".png, .jpg, .jpeg"  >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombres <span class="text-danger">*</span> </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userName" type="text" class="form-control" id="userName" value="<?=$userData['name']?>" required>
						<div class="invalid-feedback">Por favor, introduzca los nombres.</div>
                      </div>
                    </div>

                   <div class="row  mb-3">
                    <label for="userCedula" class="col-md-4 col-lg-3 col-form-label">Cédula </label>
                    <div class="col-lg-9 col-md-8"><input name="userCedula" type="text" class="form-control" id="userCedula" value="<?=$userData['cedula']?>"></div>
                  </div>

                    <div class="row mb-3">
                      <label for="userPhone" class="col-md-4 col-lg-3 col-form-label">Teléfono </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userPhone" type="text" class="form-control" id="userPhone" value="<?=$userData['cell_phone']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Correo Electrónico <span class="text-danger">*</span> </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="id_user" type="hidden" class="form-control" id="id_user" value="<?=$userData['id_user']?>">
						  <input name="userEmail" type="email" class="form-control" id="userEmail" value="<?=$userData['correo']?>" required>
						<div class="invalid-feedback">Por favor, introduzca el correo electrónico.</div>
						<div id="emailInfo"></div>
                      </div>
                    </div>


                  

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
        <div class="tab-pane fade pt-3" id="profile-center-med"> 
                <form autocomplete="off" method="post" novalidate class="needs-validation" action="<?php echo site_url('users/saveAsDoctorUpdate');?>" >
				<input value="<?=$userData['id_user']?>" type="hidden" name="id_user_cu"/>
				  <div class="row mb-3">
						<?php if($show_user_perfil=="Asistente Medico" || $show_user_perfil=='Enfermera'){
						$disabled="";
						$multiple='multiple="multiple"';
						}
						elseif($show_user_perfil=="Farmacia Interna" || $show_user_perfil=="Auditoria Medico"){
						$multiple='';
						$disabled="";
						}
						else{
							$multiple='multiple="multiple"';
						$disabled="";
						}	?>
						<div class="col-md-8 col-lg-9">
						             <label for="centro_medico_doct" class="col-md-4 col-lg-3 col-form-label">Centros Médicos</label>
                         <select class="form-select centro_medico_doct" id="centro_medico_doct" <?=$multiple?>  name="centro_medico_doct[]" <?=$disabled?> required>
						 <option value=""></option>
						 	<?php 
                                  foreach ($centro_medico_for_doc as $rowcent)
									{
									$id_doctorc=$this->db->select('id_doctor')->where('id_doctor',$userData['id_user'])->where('centro_medico',$rowcent->id_m_c)->get('doctor_centro_medico')->row('id_doctor');
										if($userData['id_user']==$id_doctorc){
										$selected="selected";
										} else {
										$selected="";
										} 
									echo "<option value='$rowcent->id_m_c' $selected>$rowcent->name</option>";
									}	

									?>

                            </select>
							<div class="invalid-feedback">Por favor, por lo meno seleccione un centro médico.</div>
                      </div>
					  <?php if($show_user_perfil=="Asistente Medico" ){?>
					   <div class="col-md-8 col-lg-9">
					   
						             <label for="doc_centro_medico" class="col-md-4 col-lg-3 col-form-label"> Médicos Asociados</label><br/>
									 <input type="checkbox" id="selectAllDoc"> Seleccionar todos
                         <select class="form-select doc_centro_medico" id="doc_centro_medico" name="doc_centro_medico[]" multiple="multiple"  <?=$disabled?> required> 
						 	

                            </select>
							<div class="invalid-feedback">Por favor, por lo meno seleccione médico.</div>
                      </div>
					  <?php }else{
                        echo "<input id='doc_centro_medico'  value='0' type='hidden' />";
					  }
					  if($this->session->userdata('user_perfil')=="Admin"){?>
					   <div class="text-left ">
					   
					    <br/> <br/>
                      <button type="submit" id="updated_centro_medico" class="btn btn-primary" >Guardar Cambios</button>
                    </div>
					 <?php } ?>
                    </div>
				
                </form>

                </div>



    <div class="tab-pane fade pt-3" id="profile-change-password-med">
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
                  <!-- End Change Password Form -->

                </div>




 <div class="tab-pane fade pt-3 profile-overview-med" id="profile-interface-med">
                <h5 class="card-title p-2">Interfaz con Seguro Médico</h5>
				 <?php if($show_user_perfil=='Asistente Medico') {?>
				 
				  <div class="row mb-3">
                      <label for="centro_medico_web" class="col-md-4 col-lg-3 col-form-label">Centro Médico</label>
                      <div class="col-md-8 col-lg-9">
                         <select class="form-select" id="centro_medico_web" name="centro_medico_web">
						 <option value=""></option>
								<?php 
								echo $result_centro_medicos;
								?>
                            </select>
                      </div>
                    </div>
				 <?php }  ?>
				 
				 
                 <div class="row mb-3">
                      <label for="seguroWeb" class="col-md-4 col-lg-3 col-form-label">Seguro Médico</label>
                      <div class="col-md-8 col-lg-9">
                         <select class="form-select" id="seguroWeb" name="seguroWeb">
								<?php 
								echo $result_seguro_medicos;
								?>
                            </select>
                      </div>
                    </div>
                  
                    <div class="row mb-3">
                      <label for="passSegWeb" class="col-md-4 col-lg-3 col-form-label">Contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="passSegWeb" type="text" class="form-control" id="passSegWeb">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" id="btnSavePasSeg">Guardar</button>
					   <div id="saveWebResult"></div>
                    </div>
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
	<input type="hidden" id="base_url" value="<?=base_url()?>"  />
  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
<?php $this->load->view('admin/users/footer');?>
<script>

$("#selectAllDoc").click(function(){
if($("#selectAllDoc").is(':checked') ){
$("#doc_centro_medico > option").prop("selected","selected");
$("#doc_centro_medico").trigger("change");
}else{
$("#doc_centro_medico > option").removeAttr("selected");
$("#doc_centro_medico").trigger("change");
}
});

$("#centro_medico_doct").on('change', function () {
load_center_medico($(this).val());

});




load_center_medico($('#centro_medico_doct').val());
function load_center_medico(id){
	$.ajax({
type: "POST",
url: "<?=base_url('users/get_medico_from_center')?>",
data: {id_centro:id,id_user:$("#id_user").val()},
success:function(data){ 
$("#doc_centro_medico").html(data); 
},  
});
	
}

	
</script>

	

	 
</body>

</html>