												<div class="row align-items-center bg-light py-3">
													<div class="col-3 col-md-2">
													<?php
													if($patient_data['photo']){
													$img= '<img  class="img-fluid mb-3" src="'.base_url().'/assets/img/patients-pictures/'.$patient_data['photo'].'"  />';
													echo $img;
													}
													?>
													</div>
													<div class="col-9 col-md-10">
                                                            <h4 class="border-bottom"><?=$patient_data['nombre'];?></h4>
                                                            <p class="fw-bold">Seguro medico: <?=$patient_seguro?></p>
                                                        </div>
                                                    </div>
													<form  method="post">
                                                    <div class="row g-2 mt-3">
													<div id="erBoxHosp"></div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Centro medico <span
                                                                    class="text-danger">*</span></label>
															<select class="form-select form-select2" name="hosp-centro" id="hosp-centro" >
															<?php 
																 echo $result_centro_medicos;
																?>
															</select>	
                                                        </div>
                                                        <!--<div class="col-md-6">
                                                            <label class="form-label">Especialidad <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" name="hosp-esp" id="hosp-esp" >
                                                                
                                                            </select>
                                                        </div>-->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Doctor <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" name="hosp_doctor" id="hosp_doctor" >
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Causa <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="" name="hosp_causa" id="hosp_causa">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Via de ingreso <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="" name="hosp_ingreso" id="hosp_ingreso">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Sala <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" name="hosp_sala" id="hosp_sala" >
                                                             </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Servicio <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" id="hosp_servicio" name="hosp_servicio" >
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Cama <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" id="hosp_cama" name="hosp_cama">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Autorizacion de ingreso <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="" id="hosp_auto" name="hosp_auto">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Autorizado por <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="" name="hosp_auto_por" id="hosp_auto_por">
                                                        </div>
                                                    </div>
                                                    <div class="pt-3">
                                                        <button class="btn btn-primary" type="button" id="save-hosptalization-formtalization-form"><i class="fa fa-save"></i>
                                                            GUARDAR <div class="save-spiner"></div></button>
                                                    </div>
													</form>
													<script>
													$('.form-select2').select2({
													dropdownParent: $('#hospitalizacionModal'),
													theme: 'bootstrap-5',
													width: '100%'
													});
													
		
													</script>