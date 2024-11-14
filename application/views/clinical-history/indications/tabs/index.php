	<div class="col-sm-8 mt-3">
		<input id="id_centro_to_save_lab_name" type="hidden" />
       	<label  class="form-label" for="id_centro_to_save"><span class="text-danger">*</span> Centro Médico</label>
				<select class="form-select form-select3"  id="id_centro_to_save" aria-label="Centro médico" >
				<?php 
				echo $result_centro_medicos;
				?>
				</select>
				
	 
		</div>
               <!-- Default Tabs -->
			      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
               <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-left" type="button" role="tab" aria-controls="homeIndMed" aria-selected="true">Recetas</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="indEst-tab" data-bs-toggle="tab" data-bs-target="#indEst-left" type="button" role="tab" aria-controls="indEst" aria-selected="false">Estudios</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="indLab-tab"  data-bs-toggle="tab" data-bs-target="#indLab-left" type="button" role="tab" aria-controls="indLab" aria-selected="false">Laboratorios</button>
                </li>
              </ul>
              <div class="tab-content pt-2" >
                <div class="tab-pane fade show active" id="home-left" role="tabpanel" aria-labelledby="home-tab">
                 <?php $this->load->view('clinical-history/indications/receipt/index'); ?>
                </div>
                <div class="tab-pane fade" id="indEst-left" role="tabpanel" aria-labelledby="indEst-tab">
                  <?php $this->load->view('clinical-history/indications/study/index'); ?>
                </div>
                <div class="tab-pane fade" id="indLab-left" role="tabpanel" aria-labelledby="indLab-tab">
                 <?php $this->load->view('clinical-history/indications/laboratory/index');?>
                </div>
              </div><!-- End Default Tabs -->
			  

         