
   <section class="py-3 profile">
  <?php foreach($query->result() as $row) ?>
  <div class="row">
   <div class="col-xl-4">
     <div class="card">
  <div class="card-body pt-4 d-flex flex-column align-items-center text-center">
<?=$patient_photo?>
              <h3><?=$get_patient_info_by_id['nombre']?></h3>
             
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
  <div class="card-body pt-3 profile-overview">
 <h4 class="card-title">Datos del Solicitante</h4>
 
   <div class="row  mb-3">
                    <div class="col-lg-3 col-md-4 label">Cédula</div>
                    <div class="col-lg-9 col-md-8"><?=$get_patient_info_by_id['cedula']?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Fecha Propuesta</div>
                    <div class="col-lg-9 col-md-8"><?=$row->fecha_propuesta?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Correo electrónico</div>
                    <div class="col-lg-9 col-md-8"><?=$get_patient_info_by_id['email']?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Teléfono</div>
                    <div class="col-lg-9 col-md-8"><?=$get_patient_info_by_id['tel_cel']?> / <?=$get_patient_info_by_id['tel_resi']?></div>
                  </div>
				  
				   <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Seguro Médico</div>
                    <div class="col-lg-9 col-md-8"><?=$get_patient_seguro_info_by_id['title']?></div>
                  </div>
				    <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Centro Médico</div>
                    <div class="col-lg-9 col-md-8"><?=$get_centro_info_by_id['name']?></div>
                  </div>
				  
				   <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Especialidad</div>
                    <div class="col-lg-9 col-md-8"><?=$doctor_area?></div>
                  </div>
				  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Doctor</div>
                    <div class="col-lg-9 col-md-8"><?=$get_doctor_info_by_id['name']?></div>
                  </div>
				  
				  <div class="row mb-3 text-danger">
                    <div class="col-lg-3 col-md-4 label">Causa</div>
                    <div class="col-lg-9 col-md-8"><?=$row->causa?></div>
                  </div>
				   </div>
  </div>
  <hr/>
  
    <div class="card">
  <div class="card-body pt-3 profile-overview">
   <h4 class="card-title">Confirmar Solicitud</h4>
   <form  class="form-horizontal" method="post"  action="<?php echo site_url("patient_cita_controller/confirmar_solicitud");?>" > 
   <div class="row mb-3">
   <input name="id_apoint" type="hidden" class="form-control"  value="<?=$id_apoint?>">
 <input name="solicitante" type="hidden" class="form-control"  value="<?=$get_patient_info_by_id['nombre']?>">
  <input name="direction" type="hidden" class="form-control"  value="1">
                    <div class="col-lg-3 col-md-4 label">Fecha Propuesta</div>
                    <div class="col-lg-9 col-md-8"><input name="fechaPropuesta" type="date" class="form-control" id="fechaPropuesta" value="<?=$row->fecha_propuesta?>"></div>
                  </div>
				  
				  <div class="row mb-3 text-danger">
                    <div class="col-lg-3 col-md-4 label">Nota</div>
                    <div class="col-lg-9 col-md-8"><textarea name="notaDelDoctor" class="form-control" id="notaDelDoctor" style="height: 100px"></textarea></div>
                  </div>
				   <div class="text-center">
                      <button type="submit" class="btn btn-primary">Confirmar Cita</button>
                    </div>
					</form>
   </div>
   </div>
  
  </div>
  
   </div>
   
    </section>