		  <div class="modal fade" id="searchPatientBtn" tabindex="-1">
       <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header card-header">
            <h4 class="header">Buscar Paciente</h4>
         
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
		
		   <div class="card">
               <!-- <div class="card-header">
                    Buscar el paciente primero ante de empezar a crear nueva cita.
                </div>-->
                <div class="card-body">
                    <div class="row g-2">
					 
                        <div class="col-md-3">
                            <label class="form-label">Buscar por cédula</label>
                            <div class="row g-1">
                                <div class="col-12">
                                    <input type="text" id="patient-cedula" class="form-control patient-cedula-entry" placeholder="000-0000000-0" data-mask="00000000000">
									 <span id="missing-cedula" ></span>
									 <input type="hidden" id="url-to-search-patient" value="<?php echo base_url(); ?>patient_search/search_patient_by_cedula">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Buscar por NEC</label>
                            <div class="input-group">
                                <span class="input-group-text " id="basic-addon1">NEC-</span>
                                <input type="text"  id="patient-nec" class="form-control patient-nec-entry">
								<input type="hidden" id="url-to-search-nec" value="<?php echo base_url(); ?>general_controller/search_patient_by_nec">
                            </div>
                        </div>
                        <div class="col-md-7">
						  <form method='get' class="form-inline" id="show-link-back" action="<?php echo site_url("$controller/search_patient_by_nombres");?>" >
                            <label class="form-label me-2">Buscar por nombres</label>
                            <!--<div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="selectSearchType" id="selectSearchType1"
                                    value="padron" checked>
                                <label class="form-check-label" for="selectSearchType1">Padron</label>
                            </div>
                            <div class="form-check form-check-inline" >
                                <input class="form-check-input" type="radio" name="selectSearchType" id="selectSearchType2" value="gicre" />
                                <label class="form-check-label" for="selectSearchType2" >
								GICRE 
								<span class="badge bg-primary">Elegir si el paciente no es nuevo</span>
								</label>
                            </div>-->
                            <div class="input-group mb-3">
							
                                <input type="text" class="form-control" placeholder="Nombres" autocomplete="off" name="patient-nombres" id="patient-nombres">
								
                                <input type="text" class="form-control" placeholder="Apellidon1" name="patient-apellidos" id="patient-apellidos">
                                <input type="text" class="form-control" placeholder="Apellidon2" id="patient-apellidos2" name="patient-apellidos2" >
                                <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
										
                            </div>
							<!--<div id="search-resut-nombres-padron"></div>-->
							</form>
                        </div>
						
                    </div>
                </div>
            </div>
  

          </div>
        
        </div>
      </div>
    </div>	