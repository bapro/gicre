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


?>


    <section class="py-3" >
        <div class="container">
            <div class="card mb-5">
                <div class="card-body py-1">
                    <div class="row">
                        <div class="col-md-3 bg-th rounded-start py-1 ">
                            <div class="text-center pt-1 "  >
							<?php
							
						    $array_values_for_photo = array(
							'id_p_a' =>$row->id_p_a,
							'cedula' =>$row->cedula,
							'image_class' => "img-fluid",
							'style'=>"with:80%"
							
							);
							echo $this->search_patient_photo->search_patient($array_values_for_photo);
							?>
                               
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
							
				      
							
						 </ul>
							</div>
                        <div class="col-md-9 py-2 border-start" id="show-alert-if-inputs-data_">
				<div style="position:fixed;top:50%;left:50%;z-index:900000" class="show-spin-on-click">
        
                 </div>
						<form action="<?php echo site_url("patient_controller/create_cita"); ?>" novalidate class="needs-validation" enctype="multipart/form-data" id="sendcita" method="post">
						 <input name="id_patient"  type="hidden" value="<?=$row->id_p_a?>" />
						   <input name="created_by"  type="hidden" value="<?=$row->inserted_by;?>" />
				        <input name="updated_by"  type="hidden" value="<?=$this->session->userdata('user_id');?>" />
				        <input name="created_time"  type="hidden" value="<?=$row->insert_date?>" />
				      <input name="updated_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
						 <div class="text-success"><small>Creado por <?=$crt?>,  <?=$insert_date?> 
                                            || Cambiado por <?=$updt?>, <?=$update_date?></small></div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 fw-bold pe-2"><?=$row->nombre?> || Cédula/Pasaporte  :
                                            <?=$row->cedula?>
                                            || #<?=$row->id_p_a?>
                                            </div>
                                        <button type="button" class="btn btn-sm btn-primary not-disabled-button" id="onclick-btn-edit"><i class="bi bi-pencil"></i> Editar</button>
										 <button type="submit" style="display:none" class="btn btn-sm btn-primary not-disabled-button disabled-btn-duplicate-cedula" id="onclick-btn-save"><i class="bi bi-save"></i> Guardar</button>
                                    </div>
                            <div class="tab-content" id="pills-tabContent">
								<HR/>
                                <div class="tab-pane fade show active  disabled-all-inputs" id="datos_personales" role="tabpanel"
                                    aria-labelledby="datos_personales-tab">
                                    <h2 class="title-header" style="font-weight: 600;">Datos personales</h2>
                                    <div class="row g-3">
									
                                        <?php $this->load->view('patient/forms/datos-personales-form', $data);?>
                                         
                                    </div>
                                </div>
								
								 <div class="tab-pane fade  disabled-all-inputs" id="contactos_de_emergencia" role="tabpanel"
                                    aria-labelledby="contactos_de_emergencia-tab">
                                  	 <h2 class="title-header" style="font-weight: 600;">Datos opcionales</h2>
                                      <?php $this->load->view('patient/forms/datos-opcionales-form');?>
                                  
                                </div>
                                </form>
								
						<div class="tab-pane fade" id="patient_files" role="tabpanel"  aria-labelledby="patient_files-tab">
						<h2 class="title-header" style="font-weight: 600;">Archivos</h2>
						<?php $this->load->view('patient/documentos');?>
                                    
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

                               
                            
                              

									<div class="tab-pane fade" id="hospitalizacion" role="tabpanel"
									aria-labelledby="hospitalizacion-tab">
									  <h2 class="title-header" style="font-weight: 600;">Hospitalización </h2>
									<div id="load-create-hospitalization-form"></div>



									<div class="row mt-2">
									<hr/>
									<div id="loadPatientHospitalization"></div>

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
<input type="hidden" value="<?=$row->id_p_a?>" id="id_patient_hist" />
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
     <script src="<?=base_url();?>assets_new/js/upload-fotos.js?rnd=<?= time() ?>"></script> 
	  <script src="<?= base_url(); ?>assets_new/js/upload-surgery-documents.js?rnd=<?= time() ?>"></script>
	   <script src="<?= base_url();?>assets_new/js/indications.js?rnd=<?= time() ?>" ></script>
	    <script src="<?= base_url();?>assets_new/js/repeated-historial-clinica.js?rnd=<?= time() ?>" ></script>
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

   
	
	
	
	var id_patient=$('#id_patient_hist').val();
	var seguro_patient_plan=$('#seguro_patient_plan').val();
	var seguro_medico_id=$('#seguro_medico_id').val();
	
$('.d-grid').on('click', function() {
if ($(this).hasClass('hide-edit-btn-on-click')){
$(".onclick-btn-editar").hide();
	}else{
		$(".onclick-btn-editar").show();
	}
	
});	



//$(window).on( "load", function() {
//alert(1);
onChangeSeguroMedico(id_patient, seguro_medico_id, seguro_patient_plan, 1);
//});



		
		

		
});
</script>
</body>

</html>