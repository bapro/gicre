                                                    
													 <form  id="save-patient-cita" method="post" >
													 
												   <div class="row">
												   <div id="erBoxCita"></div>
												   
                                       
												    <div class="col-md-6">
                                                            <label class="form-label">Causa <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" value="<?=$cita_causa?>" class="form-control clear-cita-form required-before-create" name="cita-causa" id="causa-title1">
															<input type="hidden" value="<?=$id_cita?>" class="form-control" name="cita-id" id="cita-id">
															
																		   <input name="cita_created_by"  type="hidden" value="<?=$cita_created_by;?>" />
																	<input name="cita_updated_by"  type="hidden" value="<?=$cita_updated_by;?>" />
																	<input name="cita_created_time"  type="hidden" value="<?=$cita_created_time?>" />
																  <input name="cita_updated_time"  type="hidden" value="<?=$cita_updated_time?>" />
																  <input name="id_patient"  type="hidden" value="<?=$id_patient?>" />
																  <input id="oldDayNumber"  type="hidden" value="<?=$dayNumber?>" />
															
															
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="form-label">Centro medico <span
                                                                    class="text-danger">*</span></label>
																	
                                                            <select class="form-select form-select3 required-before-create" name="cita_centro" id="cita_centro" >
															 <?php 
															 echo $result_centro_medicos_cita;
																?>
															</select>
                                                        </div>
                                                       
                                                        <div class="col-md-6 mb-2">
                                                            <label class="form-label">Doctor <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select form-select3" id="cita-doc" name='cita-doc'>
                                                                <?php  echo $result_doc_by_centers;?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <label class="form-label">Fecha Propuesta <span
                                                                    class="text-danger">*</span></label>
                                                             <input type="date" class="form-control  clear-cita-form" value="<?=$cita_fecha?>" name="cita-fecha" id="cita-fecha">
                                                               <input name="dayNumber" id="dayNumber" type="hidden"/> 
                                                        </div>
														
                                                    </div>
													<?php 
													if($this->session->userdata('user_perfil') !="Admin"){
													?>
													<div class="d-flex">
                                                    <div class="flex-fill pt-2">
                                                        <button class="btn btn-primary btn-save-cita btn-sm" type="submit"><i class="fa fa-save"></i>
                                                            GUARDAR <div class="save-spiner"></div> </button>
														
                                                    </div>
													<div id="horario-info"></div>
													 <div class="flex-fill pt-2" id="clear-cita-info">
													 <?=$creation_cita_info;?>
													
													<div id="horario-error"></div>
													</div>
													</div>
													<?php 
													}
													?>
													</form>
													<input class="if-form-has-data" type="hidden" />
												<script>
												$('.form-select3').select2({
												theme: 'bootstrap-5',
												width: '100%'
												});



												$('#save-patient-cita').on('submit', function(event){
												event.preventDefault();
	                                         
												$.ajax({
												url:"<?php echo base_url(); ?>patient_cita_controller/saveNewCita",
												method:"POST",
												data:new FormData(this),
												dataType: 'json',
												contentType:false,
												cache:false,
												processData:false,
												beforeSend: function(){
												$('.save-spiner').html('guardando... ').addClass('fa fa-spinner').css("font-size", "9px");
												$('#save-cita-btn').prop("disabled",true);
												},
												success:function(response){
												if(response.status == 0){
												 Swal.fire({
													icon: 'warning',
													html: response.message,
													});
												$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
												$('#save-cita-btn').prop("disabled",false);
												}
												else if(response.status == 1){
												//$('#erBoxCita').html('<p class="alert alert-success">'+response.message+'</p>');
												$('#save-cita-btn').prop("disabled",false);
												$('.save-spiner').html('').removeClass('fa fa-spinner'); 
												$('.form-select3').val(null).trigger('change');
									           $('.clear-cita-form').val("");
											   $('#horario-info').html("");
												
													Swal.fire({
													icon: 'success',
													html: response.message,
													});
												loadPatientTable("Citas", "patient_cita_controller");
												$(".if-form-has-data").val(0);
												}else if(response.status == 3){
                                                Swal.fire({
													icon: 'warning',
													html: response.message,
													});
												$('.save-spiner').html('').removeClass('fa fa-spinner'); 
												$('#save-cita-btn').prop("disabled",false);
												}else{
												 Swal.fire({
													icon: 'warning',
													html: response.message,
													});
												$('.save-spiner').html('').removeClass('fa fa-spinner'); 
												$('#save-cita-btn').prop("disabled",false);
												}
												},
												error: function(jqXHR, textStatus, errorThrown) {
												alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
												$('#erBoxCita').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
												console.log('jqXHR:');
												console.log(jqXHR);
												console.log('textStatus:');
												console.log(textStatus);
												console.log('errorThrown:');
												console.log(errorThrown);
												}, 
												});

												});
												$(function(){
												var dtToday = new Date();

												var month = dtToday.getMonth() + 1;
												var day = dtToday.getDate();
												var year = dtToday.getFullYear();
												if(month < 10)
												month = '0' + month.toString();
												if(day < 10)
												day = '0' + day.toString();

												var maxDate = year + '-' + month + '-' + day;
												$('#cita-fecha').attr('min', maxDate);	
												// or instead:
												// var maxDate = dtToday.toISOString().substr(0, 10);
												});	



												$('#save-patient-cita').on('change keyup keydown', 'input, textarea, select', function (e) {
												var txtinput2= $("input.required-before-create").filter(function(){ return $(this).val(); }).length;
												var select2 = $("select.required-before-create").filter(function(){ return $(this).val(); }).length;
												if(txtinput2 ==0 && select2==0){
												$(".if-form-has-data").val(0);
												}else{
												$(".if-form-has-data").val(1);
												}

												});
									
									
										
								
												
												</script>