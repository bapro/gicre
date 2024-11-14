 
								   <div class="ms-3 ps-1 text-danger"><small>Si desea facturar sin realizar citas use esta opción</small></div>
                                    <div class="row py-3">
                                        <div class="col-md-9 mb-2">
                                            <label class="form-label">Centro medico <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select form-select-fac form-sm" id="centro-fac-amb">
											<option value=""></option>
												<?php 
												echo $result_centro_medicos;
												?>
                                            </select>
											<input id='get-centro-type' type='hidden'/>
                                        </div>
											<?php 
											$id_user=$this->session->userdata('user_id');
											if($this->session->userdata('user_perfil')=="Medico"){
											echo"<input id='medico-fac-amb'  type='hidden' value='$id_user'/>";
											} else { ?>
											 <div  style="display:none" id="show-med-when-publico">
											<div class="col-sm-7 mb-3">
											<label class="checkbox-inline">
											<input type="checkbox" id='select-med-to-fac' value="hide-centro-publico" >
											Seleccione un médico
											</label>
											</div>
											</div>
											 <span id='hide-centro-publico'>
											<div class="col-md-7 mb-3" >
											<label class="form-label">Médico <span class="text-danger">*</span></label>
											<select class="form-select form-select-fac" id="medico-fac-amb">
                                             
											</select>
											<input id="check-if-centro-privado-do-not-have-doc-selected" value="" type="hidden"/>
											</div>
                                            </span>
											<?php
											}
											?>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">Tipo De Factura <span
                                                    class="text-danger">*</span></label>
                                            <div class="pt-0 pt-md-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="seguro-radio" id="seguro-radio1"
                                                        value="<?=$this->session->userdata('ID_SEGURO_MEDICO')?>" checked>
                                                    <label class="form-check-label" for="seguro-radio1"> <?=$this->session->userdata('SEGURO_MEDICO_NAME')?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="seguro-radio" id="seguro-radio2"
                                                        value="11">
                                                    <label class="form-check-label" for="seguro-radio2">Privado</label>
                                                </div>
                                            </div>
                                        </div>
								   <div class="py-3">
                                        <button class="btn btn-primary" type="button" id="crear-fac-ambulatoria"><i class="fa fa-arrow-right"></i>
                                            FACTURAR</button>
                                    </div>
									<hr/>
									
									<div id="loadPatientFactAmb"></div>
                                     </div>
									<script>
									$('.form-select-fac').select2({
									theme: 'bootstrap-5',
									width: '100%'
									});
									if($('#select-med-to-fac').is(':checked') ){
									$("#hide-centro-publico").show();
									//getEspecialidad($("#factura-centro").val());
									}
									else{
									$("#hide-centro-publico").hide();
									}
									
									$('#select-med-to-fac').click(function(){
									var inputValue = $(this).attr("value");
									$("#" + inputValue).toggle();
									});
									</script>
