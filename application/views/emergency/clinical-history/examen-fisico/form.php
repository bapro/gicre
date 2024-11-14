 <?php 
if($ex_fis_data==0){
	  $motivo_emergencia= '';
  $hallazgo = '';
  $noteDesc = '';
  $idExf=0;
  $showBtnExF="";
  $isOut="";
  $userExf=$this->session->userdata('user_id');
}else{
 foreach($query_ex_fis as $row)
  $hallazgo = $row->hallazgo;
  $motivo_emergencia= $row->motivo_emergencia;
  $idExf = $row->idSearch;
  $params2 = array('table' => 'emerg_exam_fisico', 'id' => $row->idSearch);
   echo $this->user_register_info_hospitalization->get_operation_info($params2);
     $userExf=$row->inserted_by;
	 
}

 ?>



    <div class="row"  id="exam-HospExf-form">
           <div class="card-body">
				
				<?php 
				
				//$sist_dorsales_al = $dorsales != '' || $dorsalestext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : '';
				?>
<div class="accordion " id="accordionHospExf">
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingTwelveHospExf">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelveHospExf" aria-expanded="false" aria-controls="collapseTwelveHospExf">
                                Signos Vitales
                            </button>
                        </h2>
                        <div id="collapseTwelveHospExf" class="accordion-collapse collapse" aria-labelledby="headingTwelveHospExf" data-bs-parent="#accordionHospExf">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                     <?php $this->load->view('emergency/clinical-history/vital-signals/form');?>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 </div>
					
					 <div class="py-3">
 	 <div class="input-group mb-3">
      <span class="input-group-text">Motivo de la Emergencia</span>
      <textarea class="form-control required-input-form-exf data_exam_fis_mot" id="<?=$idExf?>_motivo_emergencia"  style="height: 200px;"><?=$motivo_emergencia?></textarea>
    </div>
    <div class="input-group">
      <span class="input-group-text">Enfermedad Actual <span class="text-danger fs-4">*</span></span>
      <textarea class="form-control required-input-form-exf data_exam_enf_act" id="<?=$idExf?>_hallazgo_exf"  style="height: 200px;"><?= $hallazgo ?></textarea>
    </div>

  </div>
                    
				
                </div>
				
					<div class="float-end text-end">
				 <?php  if($idExf > 0){?>
				<button type="button" class="btn btn-primary" id="resetFormFormExF">Nuevo</button>
				<?php 
				if($isOut){
				  echo'<a class="btn btn-md btn-primary m-1" href="'.base_url().'print_page_emergency/examen_fisico/'.$idExf.'/" target="_blank"><i class="fa fa-print"></i></a>';?>
				<?php } } ?>
				  	  <input type="hidden"   value="<?=$idExf?>"  id="id_exf" >
					<?php 
					if($this->session->userdata('user_id')==$userExf){
						
						
						?>
					<button type="button" class="btn btn-success" id="btnSaveExamenFisico" <?=$this->session->userdata('show_edit_btn')?>>Guardar </button>
					<?php 
						
					}?>
				
				<span id="alert_placeholder_exf" style="position:absolute; " class="p-2" ></span>
				
			 </div>

				<input type="hidden" id="ex_vitales_up_time" value="<?= date("Y-m-d H:i:s") ?>" />
				<input type="hidden" id="ex_vitales_in_time" value="<?= date("Y-m-d H:i:s") ?>" />
				<input type="hidden" id="ex_vitales_in_by" value="<?= $this->session->userdata('user_id') ?>" />
				<input type="hidden" id="ex_vitales_up_by" value="<?= $this->session->userdata('user_id') ?>" />
			
	 </div>
	 
	 <script>
	 
	 </script>

         