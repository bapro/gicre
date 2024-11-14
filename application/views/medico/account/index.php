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
			   <h3><?=$doctor_especialidad?></h3>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Cuenta</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>
           <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" type="button" data-bs-target="#profile-agenda-doc">Agenda</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-doctor-plan">Plan</button>
                </li>
             <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-healthcare">Seguros</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar Contraseña</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-interface">Interfaz</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title p-2">Acerca de</h5>
                  <p class="small fst-italic">
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
                    <div class="col-lg-3 col-md-4 label">Exequatur</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['exequatur']?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Correo Electrónico</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['correo']?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Teléfono</div>
                    <div class="col-lg-9 col-md-8"><?=$userData['cell_phone']?></div>
                  </div>
                 <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">WhatsApp Link</div>
					 <div class="col-lg-9 col-md-8">
					 <?php if($userData['whatsapp_link']){ ?>
					 <a target="_blank" href="https://wa.me/+1<?=$userData['whatsapp_link']?>"><i class="bi bi-whatsapp text-success"></i> Chatear</a>
					 <?php } else { echo '<em>no hay numero de WhatsApp</em>'; } ?>
					 </div>
                  </div>
                 <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Firma</div>
                    <div class="col-lg-9 col-md-8">
					<?php 
					$firma_doc="$id_user_-1.png";

					$signature = "assets/update/$firma_doc";

					if (file_exists($signature)) {?>
					<img  class="img-fluid" style="border:1px solid #38a7bb;width:30%" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
					
					<?php
					} else {
					?>
					<div class="text-danger">No hay firma</div>
					<?php
					}
					?>
             </div>
                  </div>
				  
				  
				  
				   <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Sello</div>
                    <div class="col-lg-9 col-md-8">
						<?php 
						$sello_doc=$this->db->select('sello')->where('doc',$id_user_)->where('dist',0)->get('doctor_sello')->row('sello');

						if ($sello_doc) {?>
					
						<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
						<?php
						} else {?>

						<div class="text-danger">No hay sello</div>
						<?php
						}
						?>
                </div>
                  </div>



	   <div class="row  mb-3">
                    <div class="col-lg-3 col-md-4 label">Logo Tipo</div>
                    <div class="col-lg-9 col-md-8">
						<?php 
					     $logo_tipo=$this->db->select('sello')->where('doc',$id_user_)->where('dist',1)->get('doctor_sello')->row('sello');
					if ($logo_tipo) {?>
					
					<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $logo_tipo; ?>"  />
					<?php
					} else {?>

					<div class="text-danger">No hay logo tipo</div>
					
					<?php
					}
					?>
                </div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

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
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Area <span class="text-danger">*</span> </label>
                      <div class="col-md-6 col-lg-7">
                         <select class="form-select" id="especialidad" name="especialidad" required>
						 <option value=""></option>
									<?php 
									$queryaR= $this->db->query("SELECT id_ar, title_area FROM areas ORDER BY title_area DESC ");
									$AREAS = $queryaR->result();
                                  foreach ($AREAS as $area){
										if($id_ar_doc == $area->id_ar) {
											echo "<option value=".$area->id_ar." selected>".$area->title_area."</option>";
											} else {
											echo "<option value=".$area->id_ar.">".$area->title_area."</option>";
											}
											}
                                    	?>

                            </select>
						<div class="invalid-feedback">Por favor, seleccione la area del doctor.</div>
                      </div>
                    </div>
                   <div class="row  mb-3">
                   <label for="userCedula" class="col-md-4 col-lg-3 col-form-label">Cédula</label>
                    <div class="col-lg-3 col-md-4"><input name="userCedula" type="text" class="form-control" id="userCedula" value="<?=$userData['cedula']?>"></div>
                  </div>


                    <div class="row mb-3">
                      <label for="exequatur" class="col-md-4 col-lg-3 col-form-label">Exequatur </label>
                      <div class="col-md-1 col-lg-2">
                        <input name="exequatur" type="text" class="form-control" id="exequatur" value="<?=$userData['exequatur']?>">
						<div class="invalid-feedback">Por favor, introduzca el exequatur.</div>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="userPhone" class="col-md-4 col-lg-3 col-form-label">Teléfono <span class="text-danger">*</span> </label>
                      <div class="col-md-3 col-lg-4">
                        <input name="userPhone" type="text" class="form-control" id="userPhone" value="<?=$userData['cell_phone']?>"  required>
						<div class="invalid-feedback">Por favor, introduzca el numero de celular.</div>
                      </div>
                    </div>
                     <div class="row mb-3">
                      <label for="whatsapp_link" class="col-md-4 col-lg-3 col-form-label">WhatsApp Link </label>
                      <div class="col-md-8 col-lg-9">
				      <div class="input-group">
				    <span class="input-group-text" id="basic-addon1">https://wa.me/+1</span>
				    <input name="whatsapp_link" type="text" class="form-control" id="whatsapp_link" value="<?=$userData['whatsapp_link']?>" placeholder="0000000000" maxlength="10" >
				</div>
			   </div>
                    </div> 
                    <div class="row mb-3">
                      <label for="userEmail" class="col-md-4 col-lg-3 col-form-label">Correo Electrónico <span class="text-danger">*</span> </label>
                      <div class="col-md-4 col-lg-5">
                        <input name="id_user" type="hidden" class="form-control" id="id_user" value="<?=$userData['id_user']?>">
						  <input name="userEmail" type="email" class="form-control" id="userEmail" value="<?=$userData['correo']?>" required>
						<div class="invalid-feedback">Por favor, introduzca el correo electrónico.</div>
						<div id="emailInfo"></div>
                      </div>
                    </div>

                  
    <div class="row mb-3">
	    <label class="col-md-4 col-lg-3 col-form-label">Firma</label>
                   <div class="col-lg-9 col-md-8">
					<?php 
					$firma_doc="$id_user_-1.png";

					$signature = "assets/update/$firma_doc";

					if (file_exists($signature)) {?>
					<img  class="img-fluid" style="border:1px solid #38a7bb;width:30%" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
					<a  href="<?php echo site_url("printings/signature/$id_user_/1");?>"><i>Cambiar Mi Firma</i></a>
					<?php
					} else {
					?>
					<a style="color:red" href="<?php echo site_url("printings/signature/$id_user_/1");?>"><i>Crear Mi Firma</i></a>
					<?php
					}
					?>
             </div>
                  </div>
				  
				  
				  
				   <div class="row mb-3">
				   <label class="col-md-4 col-lg-3 col-form-label">Sello</label>
                    <div class="col-lg-9 col-md-8">
						<?php 
						$sello_doc=$this->db->select('sello')->where('doc',$id_user_)->where('dist',0)->get('doctor_sello')->row('sello');

						if ($sello_doc) {?>
						<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='0'><i> Quita El Sello</i></a><br/>
						<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
						<?php
						} else {?>

						<input type="file" name="selloimage" id="file_m_enf" class="file_m_enf form-control" onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg"  >
						<img id="output_image" style="width:150px;" class='rezise-load-image' />
						<input type="hidden" name="if-selloimage" id="if-selloimage" value="0" />
						<?php
						}
						?>
                </div>
                  </div>



	   <div class="row  mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Logo Tipo</label>
                    <div class="col-lg-9 col-md-8">
						<?php 
					     $logo_tipo=$this->db->select('sello')->where('doc',$id_user_)->where('dist',1)->get('doctor_sello')->row('sello');
					if ($logo_tipo) {?>
					<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='1'><i> Quita El Logo Tipo</i></a><br/>
					<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $logo_tipo; ?>"  />
					<?php
					} else {?>

					<input type="file" name="logo-tipo" id="logo-tipo" class="logo-tipo form-control" onchange="preview_logo_tipo(event)"   accept=".png, .jpg, .jpeg"  >
					<img id="output_logo_tipo" style="width:150px;"  class='rezise-load-image' />
					<input type="hidden" name="if-logo-tipo-empty" id="if-logo-tipo-empty" value="0" />
					
					<?php
					}
					?>
                </div>
                  </div>
                     <div class="row mb-3">
                      <label for="exequatur" class="col-md-4 col-lg-3 col-form-label">Permitir al doctor de ver historia clínica de solamente sus pacientes </label>
                       <div class="col-md-3 col-lg-4">
						<div class="btn-group">
						<input type="radio" class="btn-check" name="see-all-patient-recored" id="see-all-patient-recored-1" autocomplete="off" value='0' checked />
						<label class="btn btn-outline-primary" for="see-all-patient-recored-1">No</label>
						<input type="radio" class="btn-check" name="see-all-patient-recored" id="see-all-patient-recored-2" autocomplete="off"  value="1"/>
						<label class="btn btn-outline-primary" for="see-all-patient-recored-2">Si</label>
						
						</div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>



<div class="tab-pane fade pt-3 profile-overview" id="profile-agenda-doc">
           <!-- doctor-plan Form -->
				    <div class="row mb-3">
                       <div class="col-md-8 col-lg-9">
                         <select class="form-select" id="centro_medico_plan" name="centro_medico_plan">
						 <option value="">Centro Médico</option>
									<?php 
                                  foreach ($rows_result as $rowcent)
									{
									echo "<option value='$rowcent->id_m_c'>$rowcent->name</option>";
									}	

									?>

                            </select>
                      </div>
                    </div>
		       <div class="row mb-3 m-2">
			<h5 class="card-title p-2">Centro Médico con Agenda</h5>
       
					<div id="load-center-for-agenda" style=" overflow-x: auto;"></div>
            </div>
				   <div id="load-agenda"> </div>
                </div>








                <div class="tab-pane fade pt-3" id="profile-doctor-plan">

                  <!-- doctor-plan Form -->
                   <div class="row mb-3">
                      <!--<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>-->

				
				<?php

				if($userData['cuenta_gratis']==1){
				$checked1='checked';
				$disagr='disabled';	
				$ifpayc='Cuenta no ha pagado';
				}else{
				$checked1='';	
				$ifpayc='';
				}

				if($userData['cuenta_gratis']==0){
				$checked='checked';
				$disagr='';	
				}else{
				$checked='';	

				}


				if($userData['payment_plan'] >0 && $userData['cuenta_gratis']==1){
				$product=$this->db->select('plan,precio')->where('id',$userData['payment_plan'])->get('medico_precio_plan')->row_array();
				$plan=$product['plan'];$precio=$product['precio'];
				$ifpay="Plan: $plan $$precio USD";	
				$ifpayc='';
				$checked='checked';
				}else{
				$ifpay='Cuenta gratis';	


				}
				?>
				
			
				<div class="alert alert-info"  id='send-email'><?=$ifpay?> <?=$ifpayc?> <br/> <?=$account_info?></div>

                   
                  <!-- End doctor-plan Form -->
                  </div>
                </div>

   <div class="tab-pane fade pt-3 profile-overview" id="profile-healthcare">
	
                  <!-- doctor-plan Form -->
                   <div class="row mb-3" >
				   <?php 
				   $seguro_medicos = $this->model_admin->view_doctor_seguro($id_user_);
				   $queryS= $this->db->query("SELECT id_sm, title FROM seguro_medico ORDER BY title DESC ");
									$SEGUROS = $queryS->result();
									$totalSeg= $queryS->num_rows();
				   ?>
				   <form action="<?php echo site_url('users/updateDocSeguroMed');?>" method="post" >
				   <h5 class="card-title p-2">Seguros Médico (<?=count($seguro_medicos)?>)</h5>
				   <input name="id_user_seg" type="hidden" class="form-control" value="<?=$userData['id_user']?>">
				   <div class="row mb-3" style="display:none">
			  <select class="form-select" id="seguro_medicos_" name="seguro_medicos_[]" required multiple="multiple" >
						<?php 
									
                                  foreach ($SEGUROS as $seguro)
									{
                                  echo "<option value='$seguro->id_sm' selected>$seguro->title</option>";
									}	

									?>

                            </select>
						</div>
				   
					<ul class="list-group list-group-flush">
					<?php 
					echo $seguro_medico_doc;
					?>
					</ul>
					<?php if(count($seguro_medicos) != $totalSeg) { ?>
					  <button type="submit" class="btn btn-primary" >Agregar <?=$totalSeg - count($seguro_medicos)?> Seguros Faltados </button>
					<?php } ?>
					</form>
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
                  <!-- End Change Password Form -->

                </div>




 <div class="tab-pane fade pt-3 profile-overview" id="profile-interface">
                <h5 class="card-title p-2">Interfaz con Seguro Médico</h5>
				 <input type="hidden" id="centro_medico_web"  value="0">
							 <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Seguro Médico</label>
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
loadCentroAgenda();

$("#centro_medico_plan").on('change', function(event) {
	$('.select-centro').removeClass('active'); 
showDoctorPlan($(this).val());

});



$(document).on('click','.select-centro', function(event) {
var idcentro = $(this).attr('id');
$(this).addClass('active').siblings().removeClass('active');   
$("#load-agenda").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
showDoctorPlan(idcentro);
});	


function showDoctorPlan(idcentro){
$.ajax({
type: "POST",
url: "<?=base_url('agenda_controller/getDocAgendaCentro')?>",
data: {iddoc:$("#id_user").val(),idcentro:idcentro},
cache: true,
success:function(data){ 
$("#load-agenda").html(data); 

}  
});	
}




function preview_logo_tipo(event) 
{
 var reader = new FileReader();
  var size=$('#logo-tipo')[0].files[0].size;
 var output = document.getElementById('output_logo_tipo');
 if(size < 3000000){
 reader.onload = function()
 {
 
  output.src = reader.result;
  $('#output_logo_tipo').show();
  $('#if-logo-tipo-empty').val(1);  
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#logo-tipo').val('');
 $('#output_logo_tipo').hide();
 $('#if-logo-tipo-empty').val(0); 
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}


function preview_sello(event) 
{
 var reader = new FileReader();
  var size=$('#file_m_enf')[0].files[0].size;
 var output =document.getElementById('output_image');
 if(size < 3000000){
 reader.onload = function()
 {
 
  output.src = reader.result;
  $('#output_image').show();
  $('#if-selloimage').val(1);  
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#file_m_enf').val('');
  $('#if-selloimage').val(0);
 $('#output_image').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}

$(".remove-logo-tipo-o-sello").click(function(){
if (confirm("Lo quire quitar ?"))
{ 
var answerid = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('users/removeSello')?>',
data: {id : $("#id_user").val(),answerid:answerid},
success:function(response) {

location.reload();
 
}
});
}
})




	


function loadCentroAgenda(){
	
$.ajax({
type: "POST",
url: "<?=base_url('agenda_controller/loadCentroAgenda')?>",
data: {medico_id:$("#id_user").val()},
cache: true,
success:function(data){ 
	$('.select-centro:last').addClass('active'); 
$("#load-center-for-agenda").html(data); 

}  
});	
}

	
</script>

	

	 
</body>

</html>