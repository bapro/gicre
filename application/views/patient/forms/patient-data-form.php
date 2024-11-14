<?php
foreach($patient as $row)
$data['nombre'] = $row->nombre;
$data['apodo'] = $row->apodo;
$data['cedula'] = $row->cedula;

$data['date_nacer'] = date("Y-m-d", strtotime($row->date_nacer));
$data['tel_cel'] = $row->tel_cel;
$data['edad'] = $row->edad;
$patient_age = $this->model_general->calculatePatientAge($row->date_nacer);
$data['edad'] =$patient_age['age_complete'];
$this->session->set_userdata('sessionPatientAgeCv', $patient_age['age_complete']);
$data['tel_resi'] = $row->tel_resi;
$data['email'] = $row->email;
$data['sexo'] = $row->sexo;
$data['estado_civil'] = $row->estado_civil;
$data['nacionalidad'] = $row->nacionalidad ;
$data['provincia'] = $row->provincia;
$data['municipio'] = $row->municipio;
$data['barrio'] = $row->barrio;
$data['calle'] = $row->calle;
$data['seguro_medico_id']=$row->seguro_medico;
$this->session->set_userdata('ID_SEGURO_MEDICO', $row->seguro_medico);
$this->session->set_userdata('ID_PATIENT', $row->id_p_a);
$data['contacto_em_nombre']= $row->contacto_em_nombre;
$data['id_p_a']= $row->id_p_a;
$data['contacto_em_alias']= $row->contacto_em_alias ;
$data['contacto_em_cel']= $row->contacto_em_cel;
$data['contacto_em_tel1']= $row->contacto_em_tel1;
$data['contacto_em_tel2']= $row->contacto_em_tel2;
$data['where_patient_from']=$row->photo;
$crt=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updt=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$seguro_name=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$this->session->set_userdata('SEGURO_MEDICO_NAME', $seguro_name);
$enabled_patient_hosp=$this->db->select('fecha_alta')->where('id_patient',$row->id_p_a)->get('hospitalization_data')->row('fecha_alta');


 $insert_date = date("d-m-Y H:i:s", strtotime($row->insert_date));
 $update_date = date("d-m-Y H:i:s", strtotime($row->update_date));
$this->padron_database = $this->load->database('padron',TRUE);
$padron_provincia= $this->padron_database->select('Descripcion')->join('padron', 'provincia.ID = padron.IdProvincia')->where('Cedula',$row->cedula)->limit(1)->get('provincia')->row('Descripcion');
$data['padron_provincia']=$padron_provincia;


$general_report ='<button type="buton" class="nav-link text-start "  id="generalReport-tab" data-bs-toggle="pill" data-bs-target="#generalReport"  role="tab" aria-controls="generalReport" aria-selected="false" title="Reporte General"> <i class="bi bi-card-text"></i> Reporte General</button>';
$orden_medica ='<button type="buton" class="nav-link text-start"  id="ordenMedica-tab" data-bs-toggle="pill" data-bs-target="#ordenMedica"  role="tab" aria-controls="ordenMedica" aria-selected="false" title="Orden Médica">  <i class="bi bi-h-circle"></i> Orden Médica</button>';
$desc_qui ='<button class="nav-link text-start" id="surgeryDesc-tab" data-bs-toggle="pill" data-bs-target="#surgeryDesc"  role="tab" aria-controls="surgeryDesc" aria-selected="false" title="Descripción Quirúrgica"><i class="bi bi-file-medical"></i> Descripción Quirúrgica</button>';						
$refraction ='<button type="buton" class="nav-link text-start"  id="refraction-tab" data-bs-toggle="pill" data-bs-target="#refraction"  role="tab" aria-controls="refraction" aria-selected="false" title="Refracción"> <i class="bi bi-eye"></i>  Refracción</button>';
$isEnfermedad = $this->clinical_history->select('historial_id')->where('inserted_by',$this->session->userdata('user_id'))->get('h_c_enfermedad_actual')->row('historial_id');


?>


    <section class="py-3" >
        <div class="container">
            <div class="card mb-5">
			
                <div class="card-body py-1">
                    <div class="row">
				
                        <div class="col-md-3 bg-th rounded-start py-1 ">
                            <div class="text-center pt-1 " id="load-foto" >
					<?php $array_values_for_photo = array(
					'id_p_a' =>$row->id_p_a,
					'cedula' =>$row->cedula,
					'image_class' => "img-fluid",
					'style'=>"with:80%"

					);
					echo $this->search_patient_photo->search_patient($array_values_for_photo);?>
                             
							</div>
							
                            <ul class="nav nav-pills mb-3 d-block " id="pills-tab" role="tablist">
                                <li class="nav-item d-grid" role="presentation">
                                    <button class="nav-link text-start active " id="datos_personales-tab"
                                        data-bs-toggle="pill" data-bs-target="#datos_personales" type="button"
                                        role="tab" aria-controls="datos_personales" aria-selected="true"><i class="bi bi-file-person"></i> Datos Personales</button>
                                </li>
								  <li class="nav-item d-grid" role="presentation">
                                    <button class="nav-link text-start " id="contactos_de_emergencia-tab"
                                        data-bs-toggle="pill" data-bs-target="#contactos_de_emergencia" type="button"
                                        role="tab" aria-controls="contactos_de_emergencia" aria-selected="false">
                                            <i class="bi bi-file-person"></i> Datos Opcionales</button>
                                </li>
                                <li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start " id="patient_files-tab" data-bs-toggle="pill"
                                        data-bs-target="#patient_files" type="button" role="tab"
                                        aria-controls="patient_files" aria-selected="false"><i class="bi bi-archive"></i> Archivos</button>
                                </li>
                              
                                <!--<li class="nav-item d-grid" role="presentation">
                                    <button class="nav-link text-start" id="relaciones_familiares-tab"
                                        data-bs-toggle="pill" data-bs-target="#relaciones_familiares" type="button"
                                        role="tab" aria-controls="relaciones_familiares" aria-selected="false">
                                          <i class="bi bi-file-person"></i>	Relaciones familiares</button>
                                </li>-->
                                <li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start " id="ficha-de-empleado-tab" data-bs-toggle="pill"
                                        data-bs-target="#ficha-de-empleado" type="button" role="tab"
                                        aria-controls="ficha-de-empleado" aria-selected="false">
										<i class="bi bi-card-heading"></i> Ficha Familiar</button>
                                </li>
                                <li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start some-required-inputs " id="datos_citas-tab" data-bs-toggle="pill"
                                        data-bs-target="#datos_citas" type="button" role="tab"
                                        aria-controls="datos_citas" aria-selected="false"><i class="bi bi-alarm"></i> Gestión de Citas</button>
                                </li>
                                <li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start some-required-inputs " id="factura-ambulatoria-tab"
                                        data-bs-toggle="pill" data-bs-target="#factura-ambulatoria" type="button"
                                        role="tab" aria-controls="factura-ambulatoria" aria-selected="false">
                         <i class="bi bi-receipt"></i> Factura Ambulatoria
                                    </button>
                                </li>
									<li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
						<button class="nav-link text-start some-required-inputs " id="presupuesto-tab" data-bs-toggle="pill"
						data-bs-target="#presupuesto" type="button" role="tab"
						aria-controls="presupuesto" aria-selected="false">
						<i class="bi bi-cash-coin"></i>	 Crear Presupuesto
						</button>
						</li>
						<li  class="nav-item d-grid hide-edit-btn-on-click" href="#"><button  class="nav-link text-start " id="indications-tab" data-bs-toggle="pill" data-bs-target="#indications"  role="tab" aria-controls="indications" aria-selected="false"  title="Indicaciones"><i class="fas fa-prescription"></i> Indicaciones</button></li>
						
						<li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start " id="emergency-tab" data-bs-toggle="pill"
                                        data-bs-target="#emergency" type="button" role="tab"
                                        aria-controls="emergency" aria-selected="false">
										<i class="bi bi-hospital"></i> Emergencia
                                    </button>
                                </li>
									<li class="nav-item d-grid hide-edit-btn-on-click" role="presentation">
                                    <button class="nav-link text-start " id="hospitalizacion-tab" data-bs-toggle="pill"
                                        data-bs-target="#hospitalizacion" type="button" role="tab"
                                        aria-controls="hospitalizacion" aria-selected="false">
										<i class="bi bi-hospital"></i> Hospitalización
                                    </button>
                                </li>
							
				         <?php
						
						 $id_apoint_=decrypt_url($id_apoint);
				       if($isEnfermedad){
						   if($id_apoint_){
						$defaultDoctor=$this->db->select('id_apoint,centro,area,doctor')->where('id_apoint',$id_apoint_)->get('rendez_vous')->row_array();
						   }else{
							$defaultDoctor=$this->db->select('id_apoint,centro,area,doctor')->where('doctor',$this->session->userdata('user_id'))->where('id_patient',$row->id_p_a)->get('rendez_vous')->row_array();   
						   }
						if($defaultDoctor){
						$areaTitle=$this->db->select('title_area')->where('id_ar',$defaultDoctor['area'])->get('areas')->row('title_area');
						
						//$areaTitle='GINECOLOGIA Y OBSTETRICIA';
						if(strpos($areaTitle, "GINECO") !== false){
						$go_to = 'ginecology';
						}
						elseif($areaTitle=="Obstetra-Ginecologo, Medicina Materno Fetal"){
						$go_to = 'ginecology';   
						}elseif($areaTitle=='UROLOGIA'){
						$go_to = 'urology';  
						}elseif(strpos($areaTitle, "PEDIATRI") !== false){
						$go_to = 'pediatry';  
						}elseif($areaTitle=='OFTALMOLOGIA'){
						$go_to = 'ophthalmology';  
						}
						elseif(strpos($areaTitle, "CIRUJANO VASCULAR") !== false){
						$go_to = 'vascular_surgery';  
						}

						else{
						$go_to = 'patient_history';  
						}
                       if($this->session->userdata('user_perfil')=='Medico'){
						 $doctor=$this->session->userdata('user_id');  
					   }else{
						  $doctor=$defaultDoctor['doctor']; 
					   }
					$id_apoint=$defaultDoctor['id_apoint'];
					$centro=$defaultDoctor['centro'];
					$area=$defaultDoctor['area'];
                    
					$go_to_hist ='<a  class="nav-link text-start"  href="'.site_url()."clinical_history/$go_to/".encrypt_url($id_apoint).'/'.encrypt_url($row->id_p_a).'/'.encrypt_url($centro).'/'.encrypt_url($doctor).'/'.encrypt_url($area).'" title="Historia Clínica"><i class="bi bi-hospital"></i> Historia Clínica</a>';
						$resumen_hist ='<button class="nav-link text-start" id="resumeHist-tab" data-bs-toggle="pill" data-bs-target="#resumeHist"  role="tab" aria-controls="resumeHist" aria-selected="false" title="Resumen de la historial clínica"><i class="bi bi-card-list"></i> Resumen</button>';
						
						$follow_up ='<button class="nav-link text-start"  id="followup-tab" data-bs-toggle="pill" data-bs-target="#followup" type="button" role="tab" aria-controls="followup" aria-selected="false"  title="Dar seguimiento"><i class="bi bi-fast-forward-circle"></i> Seguimiento</button>';
						?>
						
						
						<li  class="nav-item d-grid hide-edit-btn-on-click" href="#"><?=$go_to_hist?></li>
						
						<?php if(strpos($doctor_especialidad, "CARDIO") === false){?>
						 <li  class="nav-item d-grid hide-edit-btn-on-click" href="#"><?=$follow_up?> </li>
						<?php }
						}
						}
				if($doctor_especialidad=='OFTALMOLOGIA'){?>
				<li  class="nav-item d-grid hide-edit-btn-on-click " href="#"><?=$refraction?></li>
				<?php 
				}
				if(strpos($doctor_especialidad, "CARDIO") !== false){?>
				
				<li  class="nav-item d-grid hide-edit-btn-on-click " href="#"><button type="buton" class="nav-link text-start"  id="eva_cardio-tab" data-bs-toggle="pill" data-bs-target="#eva_cardio"  role="tab" aria-controls="eva_cardio" aria-selected="false" title="Evaluación Cardiovascular">  <i class="bi bi-heart-pulse"></i> Evaluación Cardiovascular</button></li> 
                <?php }?>

            <li  class="nav-item d-grid hide-edit-btn-on-click" href="#"><?=$general_report?></li>
				 <?php if($this->session->userdata('user_perfil') !="Asistente Medico"){
				?>
						
						<li  class="nav-item d-grid hide-edit-btn-on-click" href="#"><?=$orden_medica?></li>
							 <?php if(strpos($doctor_especialidad, "CARDIO") === false){?>
							<li class="dropdown do-not-scrollup">
						
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-plus"></i>Mas opciones</a>
                       
						<ul class="dropdown-menu">
						
						<li  class="nav-item d-grid hide-edit-btn-on-click " href="#"><?=$desc_qui?></li>
						
						</ul>
					
					 </li>
				<?php } } ?>
						 </ul>
							</div>
                        <div class="col-md-9 py-2 border-start" id="show-alert-if-inputs-data_">
				<div style="position:fixed;top:50%;left:50%;z-index:900000" class="show-spin-on-click" id="insertionResult">
        
                 </div>
						
						
						 <div class="text-success"><small>Creado por <?=$crt?>,  <?=$insert_date?> 
                                            || Cambiado por <?=$updt?>, <?=$update_date?></small></div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 fw-bold pe-2"><?=$row->nombre?> || Cédula/Pasaporte  :
                                            <?=$row->cedula?>
                                            || #<?=$row->id_p_a?>
                                            </div>
                                      
										
                                    </div>
                            <div class="tab-content" id="pills-tabContent">
								<HR/>
							
                                <div class="tab-pane fade show active  disabled-all-inputs" id="datos_personales" role="tabpanel"
                                    aria-labelledby="datos_personales-tab">
										<form  id="savePatDatosPersonal" method="post">
								
								 <input name="id_patient"  type="hidden" value="<?=$row->id_p_a?>" />
						   <input name="created_by"  type="hidden" value="<?=$row->inserted_by;?>" />
				        <input name="updated_by"  type="hidden" value="<?=$this->session->userdata('user_id');?>" />
				        <input name="created_time"  type="hidden" value="<?=$row->insert_date?>" />
				      <input name="updated_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
								  <button type="button" style="margin-top:-17px;"  class="btn btn-sm btn-primary not-disabled-button float-end" id="onclick-btn-edit"><i class="bi bi-pencil"></i> Editar</button>
								 <button type="submit" style="display:none; margin-top:-17px;" class="btn btn-sm btn-primary not-disabled-button disabled-btn-duplicate-cedula float-end" id="onclick-btn-save"><i class="bi bi-save"></i> Guardar</button>

                                    <h2 class="title-header" style="font-weight: 600;">Datos personales</h2>
                                    <div class="row g-3">
									
                                        <?php $this->load->view('patient/forms/datos-personales-form', $data);?>
                                         
                                    </div>
									</form> 
                                </div>
								
								
							
								
								 <div class="tab-pane fade  disabled-all-inputs" id="contactos_de_emergencia" role="tabpanel"
                                    aria-labelledby="contactos_de_emergencia-tab">
											<form  id="savePatDatosOptional" method="post">
								
								 <input name="id_patient"  type="hidden" value="<?=$row->id_p_a?>" />
						   <input name="created_by"  type="hidden" value="<?=$row->inserted_by;?>" />
				        <input name="updated_by"  type="hidden" value="<?=$this->session->userdata('user_id');?>" />
				        <input name="created_time"  type="hidden" value="<?=$row->insert_date?>" />
				      <input name="updated_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
								
							 <button type="button" style="margin-top:-17px;"  class="btn btn-sm btn-primary not-disabled-button float-end" id="onclick-btn-edit-option"><i class="bi bi-pencil"></i> Editar</button>
							 <button type="submit" style="display:none; margin-top:-17px;" class="btn btn-sm btn-primary not-disabled-button disabled-btn-duplicate-cedula float-end" id="onclick-btn-save-option"><i class="bi bi-save"></i> Guardar</button>

                                  	 <h2 class="title-header" style="font-weight: 600;">Datos opcionales</h2>
                                      <?php $this->load->view('patient/forms/datos-opcionales-form', $data);?>
                                   </form>
                                </div>
                               
								
						<div class="tab-pane fade" id="patient_files" role="tabpanel"  aria-labelledby="patient_files-tab">
						<h2 class="title-header" style="font-weight: 600;">Archivos</h2>
						<?php
						
						$data['div_id']=1;
						$this->load->view('patient/documentos', $data);
						?>
                                    
                                </div>

                               
                                 
                                <div class="tab-pane fade" id="relaciones_familiares" role="tabpanel"
                                    aria-labelledby="relaciones_familiares-tab">
                                    
                                    <div class="row g-3 align-items-center mt-3">
                                        <div class="col-auto">
                                            <label for="inputText" class="col-form-label">Entra el NEC del tutor</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="text" id="inputText" class="form-control">
                                        </div>
                                    </div>
                                    <small class="text-info"><i>La información del tutor se mostrará aquí...</i></small>
                                </div>

                                <!-- div class="tab-pane fade" id="ficha-de-empleado" role="tabpanel"
                                    aria-labelledby="ficha-de-empleado-tab">...5</!-div -->
                        
                                <div class="tab-pane fade" id="datos_citas" role="tabpanel"
                                    aria-labelledby="datos_citas-tab">
									  <h2 class="title-header" style="font-weight: 600;">Gestión de citas</h2>
									    <div class="row g-3">
                                    <div id="load-create-cita-form"></div>
										 </div>		
									<hr/>
									<div id="loadPatientCitas"></div>
									
									
                                </div>
                            
                                <div class="tab-pane fade" id="factura-ambulatoria" role="tabpanel" aria-labelledby="factura-ambulatoria-tab">
								 <h2 class="title-header" style="font-weight: 600;">Factura ambulatoria </h2>
                                 <div id="load-create-factura-form"></div>
                                </div>

									<div class="tab-pane fade" id="hospitalizacion" role="tabpanel"
									aria-labelledby="hospitalizacion-tab">
									  <h2 class="title-header" style="font-weight: 600;">Hospitalización </h2>
									<div id="load-create-hospitalization-form"></div>



									<div class="row mt-2">
									<hr/>
									<div id="loadPatientHospitalization"></div>

									</div>
									</div>


	                       <div class="tab-pane fade" id="emergency" role="tabpanel"
									aria-labelledby="emergency-tab">
									  <h2 class="title-header text-danger" style="font-weight: 600;">Emergencia </h2>
									<div id="load-create-emergency-form"></div>



									<div class="row mt-2">
									<hr/>
									<div id="loadPatientEmergency"></div>

									</div>
									</div>





                                <div class="tab-pane fade" id="presupuesto" role="tabpanel"
                                    aria-labelledby="presupuesto-tab">
									 <h2 class="title-header" style="font-weight: 600;">Crear presupuesto</h2>
                                   <div id="load-create-presupueto-form"></div>
								   
								
                                </div>
                              

								<div class="tab-pane fade" id="resumeHist" role="tabpanel"
								aria-labelledby="resumeHist-tab">
								<h2 class="title-header" style="font-weight: 600;">Resumen de la última historia clínica</h2>
								<div class="row mt-2">
								<hr/>
								<div id="load-resumen-hist"></div>
								</div>

                                 
								</div>
								
								
								
								
									<div class="tab-pane fade" id="surgeryDesc" role="tabpanel"
								aria-labelledby="surgeryDesc-tab">
								<h2 class="title-header" style="font-weight: 600;">Descripción Quirúrgica</h2>
								<div class="row mt-2">
								<div id="pagination-description_surgery"></div>
								<?php
								$data['desc_surgery_data']=0;
								//$data['result_centro_medicos']=$result_centro_medicos;
								$data['idC']=$idC;
								?>
								<div id="description_surgery-form">
								<?php $this->load->view('clinical-history/description-surgery/form', $data); ?>
								</div>
								</div>
                                <?php $this->load->view('clinical-history/description-surgery/patient-images/form'); ?>

								</div>
								
								
								
								
								
									<div class="tab-pane fade" id="indications" role="tabpanel"
								aria-labelledby="indications-tab">
								 <h2 class="title-header" style="font-weight: 600;">Indicaciones</h2>
								<div class="row mt-2">
									
								<?php $this->load->view('clinical-history/indications/tabs/index'); ?>
								</div>


								</div>
								
									<div class="tab-pane fade" id="generalReport" role="tabpanel"
								aria-labelledby="generalReport-tab">
								 <h2 class="title-header" style="font-weight: 600;">Reporte General</h2>
								<div class="row mt-2">
								<div id="pagination-modal_report_general"></div>
								<?php
								$data['general_repo_data']=0;
									$lastIdGr= $this->clinical_history->select('id')->where('historial_id', $row->id_p_a)->where('inserted_by', $id_user)->order_by('id','desc')->limit(1)->get('h_c_enfermedad_actual')->row('id');	
                                    $data['lastIdGr']=$lastIdGr;
								?>
								<div id="report-general-form">
								<?php
								$this->load->view('clinical-history/general-report/form', $data);
								?>
								</div>
								<?php $this->load->view('clinical-history/general-report/folder/form');?>
								</div>


								</div>
										<div class="tab-pane fade" id="refraction" role="tabpanel"
								aria-labelledby="refraction-tab">
								 <h2 class="title-header" style="font-weight: 600;">Refracción</h2>
								<div class="row mt-2">
								<div id="pagination-refraction"></div>
								<?php
								$data['data_refraccion']=0;
									
								?>
								<div id="refraction-form">
								<?php
								$this->load->view('clinical-history/ophtalmology/refraction/form', $data);
								?>
								</div>
								</div>


								</div>
								
								<div class="tab-pane fade" id="eva_cardio" role="tabpanel"
								aria-labelledby="eva_cardio-tab">
								 <h2 class="title-header" style="font-weight: 600;">Evaluación Cardiovascular</h2>
								<div class="row mt-2">
								<div id="pagination-eva_cardiovascular"></div>
								<?php
								$data['data_eva_cardio']=0;
									
								?>
								<div id="eva_cardiovascular-form">
								<?php
								$this->load->view('clinical-history/cardiovascular-evaluation/form', $data);
								?>
								</div>
								</div>


								</div>
								
								
								<div class="tab-pane fade" id="ordenMedica" role="tabpanel"
								aria-labelledby="ordenMedica-tab">
								 <h2 class="title-header" style="font-weight: 600;">Orden Médica</h2>
								<div class="row mt-2">
								<div id="pagination-modal_orden_medica"></div>
								<?php
								$data['orden_medica_data']=0;
								?>
								<div id="medical-order-forms">
								<?php
								$this->load->view('clinical-history/medical-order/forms', $data);
								?>
								</div>
								</div>


								</div>
								
								
									<div class="tab-pane fade" id="followup" role="tabpanel"
								aria-labelledby="followup-tab">
								 <h2 class="title-header" style="font-weight: 600;">Seguimiento</h2>
								<div class="row mt-2">
								<hr/>
								<div id="load-follow-up"></div>
								
								</div>


								</div>
								
								
                        </div>
						<div id="sdfsdfdsfsd"></div>
                    </div>
                </div>
            </div>
        </div>
	
    </section>
		
	
 <?php $this->load->view('footer');?>
 <script>var id_enf_act  =0;</script>
<input type="hidden" value="<?=$row->id_p_a?>" id="id_patient_hist" />
<input type="hidden" value="0" id="photo-changed" />
	<input type="hidden" id="base_url" value="<?=base_url()?>"  />
<input type="hidden" value="<?=$row->plan?>" id="seguro_patient_plan" />
<input type="hidden" value="<?=$row->seguro_medico?>" id="seguro_medico_id" />
<input type="hidden" value="<?=$this->session->userdata('USER_CONTROLLER')?>" id="USER_CONTROLLER" />
<input type="hidden" value="<?=$this->session->userdata('user_perfil')?>" id="USER_PERFIL" />
  <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/quill/quill.min.js?rnd=<?= time() ?>"></script>
  <script src="<?= base_url();?>assets_new/js/create-quill.js?rnd=<?= time() ?>" ></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
     <script src="<?=base_url();?>assets_new/js/upload-fotos.js?rnd=<?= time() ?>"></script> 
	  <script src="<?= base_url(); ?>assets_new/js/upload-surgery-documents.js?rnd=<?= time() ?>"></script>
	      <script src="<?= base_url(); ?>assets_new/js/upload-general-report.js?rnd=<?= time() ?>"></script>
	   <script src="<?= base_url();?>assets_new/js/indications.js?rnd=<?= time() ?>" ></script>
	    <script src="<?= base_url();?>assets_new/js/repeated-historial-clinica.js?rnd=<?= time() ?>" ></script>
		  <script src="<?=base_url();?>assets_new/js/jquery.number.js"></script>
		 <script src="<?= base_url();?>assets_new/js/evaluation-cardiovascular.js?rnd=<?= time() ?>" ></script>
		  
  <?php 
$this->load->view('patient/forms/footer');
 $this->load->view('patient/forms/footer-hospitalization');
	$this->load->view('linked-selected-functions');
	 $this->load->view('clinical-history/reset-form_alert-success');
	 
	  ?>  
  

	  
<script>

$(document).ready( function(){
	$('ul li').not('.do-not-scrollup').on('click', function(e) {
		
		// $(window).scrollTop("#sdfsdfdsfsd");
		 $('html, body').animate({
        scrollTop: $("#pills-tabContent").offset().top
    }, 0);
		
		
	});

   
     $("#onclick-btn-edit-option").on("click", function (e) {
        $("#onclick-btn-save-option").show();
		$("#onclick-btn-edit-option").hide();
		 $(".disabled-all-inputs :input").prop("disabled", false); 
    })
   
   $('#savePatDatosPersonal').on('submit', function (e) {
	e.preventDefault();

var myform = document.getElementById("savePatDatosPersonal");
var fd = new FormData(myform);
var url= "<?=base_url('patient_controller/updatePatientDataPersonal')?>"; 
savePatientData(fd, url, "");
});
   

  $('#formFile').on('change', function (e) {
	  $("#photo-changed").val(1);
	  });

   $('#savePatDatosOptional').on('submit', function (e) {
	e.preventDefault();

var myform = document.getElementById("savePatDatosOptional");
var fd = new FormData(myform);
var url= "<?=base_url('patient_controller/updatePatientDataOptional')?>"; 
savePatientData(fd, url, "-option");
});
   

function loadPatienImg(){
$('#load-foto').html('<em>cargando la photo...</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_controller/loadPatientPhoto');?>",
	data:{id_p_a:$('#id_patient_hist').val(), cedula:$('#cedula').val()},
	success: function(data){
   $("#load-foto").html(data);

	},
	
	});
}


function savePatientData(fd, url, origine){

	$.ajax({
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data:fd, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$('#insertionResult').show();
if(response.status == 1){
$('#insertionResult').html('<p class="alert alert-warning">'+response.message+'</p>');
} else{
	$('#insertionResult').html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	 $(".disabled-all-inputs :input").not(".not-disabled-button").prop("disabled", true); 
$("#onclick-btn-save" +origine).hide();
$("#onclick-btn-edit" +origine).show();	
if($("#photo-changed").val()==1){
	loadPatienImg();
	}
$("#photo-changed").val(0);
 $("#formFile").val("");	
}

},

});



	

	
}


	
$('.d-grid').on('click', function() {
if ($(this).hasClass('hide-edit-btn-on-click')){
$(".onclick-btn-editar").hide();
	}else{
		$(".onclick-btn-editar").show();
	}
	
});	



//$(window).on( "load", function() {
//alert(1);
onChangeSeguroMedico($('#id_patient_hist').val(), $('#seguro_medico_id').val(), $('#seguro_patient_plan').val(), 1);
//});



		
		

		
});
</script>
</body>

</html>