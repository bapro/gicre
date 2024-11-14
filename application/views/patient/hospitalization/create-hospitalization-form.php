											<?php
											$hosp_inserted_by=$this->session->userdata('user_id');
											$hosp_updated_by=$this->session->userdata('user_id');
											$hosp_inserted_time=date("Y-m-d H:i:s");
											$hosp_updated_time=date("Y-m-d H:i:s");?>
										<input type="hidden" id="save-hosp_inserted_by"  value="<?=$hosp_inserted_by?>"  />
										<input type="hidden" id="save-hosp_updated_by"  value="<?=$hosp_updated_by?>"  />
										<input type="hidden" id="save-hosp_inserted_time"  value="<?=$hosp_inserted_time?>"  />
										<input type="hidden" id="save-hosp_updated_time"  value="<?=$hosp_updated_time?>"  />
											
											<form  method="post">
                                                    <div class="row">
													<div id="save-erBoxHosp"></div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Centro medico <span
                                                                    class="text-danger">*</span></label>
															<select class="form-select form-select2 onchange-hosp-centro" name="save-hosp-centro" id="save-hosp-centro" >
															<?php 
																 echo $result_centro_medicos;
																?>
															</select>	
                                                        </div>
                                                        <!--<div class="col-md-6">
                                                            <label class="form-label">Especialidad <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2" name="save-hosp-esp" id="save-hosp-esp" >
                                                                
                                                            </select>
                                                        </div>-->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Doctor <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2 onchange-doct-hosp" name="save-hosp_doctor" id="save-hosp_doctor" >
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-9 mb-3">
                                                            <label class="form-label">Causa <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control clear-hosp-form" placeholder="" name="save-hosp_causa" id="save-hosp_causa">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Via de ingreso <span
                                                                    class="text-danger">*</span></label>
																	<select class="form-select clear-hosp-form" name="save-hosp_ingreso" id="save-hosp_ingreso">
																	<option value="">Seleccionar</option>
																	<option>Electivo</option>
																	<option>Emergencia</option>
																	</select>
                                                       </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Sala <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2 onchage-hosp_sala" name="save-hosp_sala" id="save-hosp_sala" >
                                                             </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Area <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2 onchange-hosp_servicio" id="save-hosp_servicio" name="save-hosp_servicio" >
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Cama <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select2 onchange-hosp_cama" id="save-hosp_cama" name="save-hosp_cama">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
														<?php if($this->session->userdata('ID_SEGURO_MEDICO')!=11){?>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Autorizacion de ingreso <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control clear-hosp-form" placeholder="" id="save-hosp_auto" name="save-hosp_auto">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Autorizado por <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control clear-hosp-form" placeholder="" name="save-hosp_auto_por" id="save-hosp_auto_por">
                                                        </div>
														<?php } ?>
                                                    </div>
													<?php if($this->session->userdata('user_perfil') =="Asistente Medico" || $this->session->userdata('user_perfil') =="Enfermera" ){?>
                                                    <div class="pt-3">
                                                        <button class="btn btn-primary" type="button" id="save-hosptalization-formtalization-form"><i class="fa fa-save"></i>
                                                            GUARDAR <div class="save-spiner"></div></button>
															<button class="btn  btn-outline-secondary" type="button" id="cancel-hosp">
                                                            RESETEAR </button>
															
                                                    </div>
													<?php } ?>
													</form>
													<script>
													$('.form-select2').select2({
													theme: 'bootstrap-5',
													width: '100%'
													});
													
		
													</script>