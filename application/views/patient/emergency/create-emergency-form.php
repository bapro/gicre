										<?php
										if($id_emgerg==0){
											$emger_causa='';
											$emger_ref='';
											$emger_via='';
											$emerg_doc='';
											$id_em=0;
											$em_inserted_by=$this->session->userdata('user_id');
											$em_updated_by=$this->session->userdata('user_id');
											$em_inserted_time=date("Y-m-d H:i:s");
											$em_updated_time=date("Y-m-d H:i:s");
										}else{
											$emerg_doc=$result_emgergency['doc'];
											$emger_causa=$result_emgergency['causa'];
											$emger_ref=$result_emgergency['refered_by'];
											$emger_via=$result_emgergency['via'];
											$id_em=$result_emgergency['id'];
											
											$em_inserted_by=$result_emgergency['inserted'];
											$em_updated_by=$this->session->userdata('user_id');
											$em_inserted_time=$result_emgergency['timeinserted'];
											$em_updated_time=date("Y-m-d H:i:s");
											
											$createdBy=$this->db->select('name')->where('id_user',$result_emgergency['inserted'])->get('users')->row('name');
											$updateddBy=$this->db->select('name')->where('id_user',$result_emgergency['updated'])->get('users')->row('name');
											$dateChange=date("d-m-Y H:i:s", strtotime($result_emgergency['timeupdated']));
											$timeinserted=date("d-m-Y H:i:s", strtotime($result_emgergency['timeinserted']));
											$updateInfo=" | cambiado por $updateddBy, $dateChange";

											echo "<div class='col-md-12 alert alert-info'>Este paciente has sido hospitalizado desde $timeinserted por $createdBy $updateInfo</div>";
											}
										  $emger_vias = array("Seleccionar", "Ambulancia", "Caminando", "Motocicleta", "9-1-1", "Otros");
										?>
                                       <input type="hidden" id="id_em"  value="<?=$id_em?>"  />
									    <input type="hidden" id="em_inserted_by"  value="<?=$em_inserted_by?>"  />
										 <input type="hidden" id="em_updated_by"  value="<?=$em_updated_by?>"  />
										  <input type="hidden" id="em_inserted_time"  value="<?=$em_inserted_time?>"  />
										   <input type="hidden" id="em_updated_time"  value="<?=$em_updated_time?>"  />
										<form  method="post">
                                                    <div class="row">
													<div id="save-erBoxHosp2"></div>
                                                        <div class="col-md-9 mb-3">
                                                            <label class="form-label">Centro medico <span
                                                                    class="text-danger">*</span></label>
															<select class="form-select form-select2 onchange-emerg-centro" name="save-emerg-centro" id="save-emerg-centro" >
															<?php 
																 echo $result_centro_medicos;
																?>
															</select>	
                                                        </div>
                                                       
                                                        <div class="col-md-9 mb-3">
                                                            <label class="form-label">Causa <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control clear-emerg-form" value="<?=$emger_causa?>" name="save-emerg_causa" id="save-emerg_causa">
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Via de ingreso <span
                                                                    class="text-danger">*</span></label>
																	<select class="form-select clear-emerg-form" name="save-emerg_ingreso" id="save-emerg_ingreso">
																<?php
																	foreach ($emger_vias as $emger_via_) {
																	if ($emger_via == $emger_via_) {
																	$selected = "selected";
																	} else {
																	$selected = "";
																	}
																	echo "<option $selected>$emger_via_</option>";
																	}

																	?>
																	
																	
																	
																	
																	</select>
                                                       </div>
                                                      
                                                       <div class="col-md-9 mb-3">
                                                            <label class="form-label">Referido por <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control clear-hosp-form" value="<?=$emger_ref?>" name="save-refered_by" id="save-refered_by">
                                                        </div>
													
                                                    
													<?php if($this->session->userdata('user_perfil') =="Asistente Medico" || $this->session->userdata('user_perfil') =="Enfermera" ){?>
                                                    <div class="pt-3 float-end">
                                                        <button class="btn btn-primary" type="button" id="save-emergcy-form"><i class="fa fa-save"></i>
                                                            GUARDAR <div class="save-spiner"></div></button>
															
															
                                                    </div>
													<?php } ?>
													</div>
													</form>
													
													<script>
													$('.form-select2').select2({
													theme: 'bootstrap-5',
													width: '100%'
													});
													
		
													</script>