<div id="scroll_to_ind_study"></div>
<input class="is-indications-study-has-been-duplicated" value="0" type="hidden"/>
<div class="row" >
 <div class="col-md-7">
   <h4 class="font-italic mb-4"> Indicación estudios</h4>
   <div class="col-sm-10">
     <div class="form-floating mb-3">
       <input type="text" list="estudy_list" class="form-control clr_inputs_ind_study" id="floatingIndEst" placeholder="Estudios">
       <label for="floatingIndEst"><span style="color:red">*</span> Estudios</label>
       <!--<div id="suggestion-study-est"></div>-->
	   <datalist id="estudy_list">
						<?php
				echo $this->auto_complete_input->getData('estudio', 'h_c_indicaciones_estudio', 'clinical_history');
						?>	
				</datalist>
     </div>
     <div class="form-floating mb-3">
       <input type="text" list="estudy_cuerpo_list" class="form-control clr_inputs_ind_study" id="floatingIndBody" placeholder="Parte del cuerpo">
       <label for="floatingIndBody"><span style="color:red">*</span> Parte del cuerpo</label>
      <!-- <div id="suggestion-study-body"></div>-->
	    <datalist id="estudy_cuerpo_list">
						<?php
				echo $this->auto_complete_input->getData('cuerpo', 'h_c_indicaciones_estudio', 'clinical_history');
						?>	
				</datalist>
     </div>
     
     <div class="form-floating mb-3">
       <input type="text" list="estudy_lat_list" class="form-control clr_inputs_ind_study" id="floatingIndLat" placeholder="Lateralidad">
       <label for="floatingIndLat">Lateralidad</label>
      <!-- <div id="suggestion-study-lat"></div>-->
	   <datalist id="estudy_lat_list">
						<?php
				echo $this->auto_complete_input->getData('lateralidad', 'h_c_indicaciones_estudio', 'clinical_history');
						?>	
				</datalist>
     </div>
     <div class="form-floating mb-3">
       <textarea  class="form-control clr_inputs_ind_study" id="floatingIndObs" placeholder="Observaciones" style="height:150px"></textarea>
       <label for="floatingIndObs">Observaciones</label>
     </div>
     <?php 
if($this->session->userdata('user_perfil') =="Medico"){
?>

   <div class="text-end">
 <!-- <button type="button" id="resetIndEst" style="display:none" class="btn btn-primary"><i class="bi bi-x-circle"></i> Limpiar</button>-->
     <button type="button" id="saveIndStudy" class="btn btn-outline-success"><i class="bi bi-save"></i> Guardar</button>
     <span id="alert_placeholder_study" style="position:absolute; " class="p-2" ></span>
     <br/><br/>
   </div>
     <?php }  ?>
   <input type="hidden" id="id_ind_study" value="0" />
   </div>
   
  </div>

 </div>
   
 
 <div class="row" >
 <div class="col-md-12   border-default border-top ">
   <div class="card" >
     <div class="card-body">
       <h5 class="card-title">Indicaciónes previas</h5>
     <button style="display:none" type="button" class="btn btn-danger show-eliminar-duplicado-study">Elimiar duplicato</button>
         
        
           <div style="overflow-x:auto;">
        <div id="indication_study_data"></div>
         </div>
    
       
       
     </div>
   </div>
   
 </div>
 </div>

 
 <?php //$this->load->view('clinical-history/indications/study/footer');?>