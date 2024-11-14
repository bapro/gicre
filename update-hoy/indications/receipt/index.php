<div id="scroll_to_ind_drug"></div>
 <div class="row">
<input class="is-indications-has-been-duplicated" value="0" type="hidden"/>
       <div class="col-md-8">
         <h4 class="font-italic mb-4"> Indicación recetas</h4>
         <div class="col-sm-10">
           <div class="form-floating mb-3">
		 
             <input list="med_list" type="text" class="form-control medicamentos-input clr_inputs_ind_med" id="indicationMed" placeholder="Medicamento">
             <label for="indicationMed"> <span style="color:red">*</span> Medicamento</label>
			  <!-- <div id="suggestion-drugs-list"></div>-->
			    <datalist id="med_list">
						<?php
				echo $this->auto_complete_input->getData('name', 'medicaments', 'clinical_history');
						?>
						</datalist>
           </div>
           <div class="form-floating mb-3">
             <input type="text" list="meddo_list" class="form-control clr_inputs_ind_med" id="floatingDosis" placeholder="Dosis">
             <label for="floatingDosis">Dosis</label>
			  <!-- <div id="suggestion-dosis-list"></div>-->
			   <datalist id="meddo_list">
						<?php
				echo $this->auto_complete_input->getData('dosis', 'h_c_indicaciones_medicales', 'clinical_history');
						?>	
				</datalist>
           </div>
           
           <div class="form-floating mb-3">
             <input type="text" list="medpre_list" class="form-control clr_inputs_ind_med" id="floatingPres" placeholder="Presentación">
             <label for="floatingPres"><span style="color:red">*</span> Presentación</label>
			  <!-- <div id="suggestion-presentation-list"></div>-->
			  <datalist id="medpre_list">
						<?php
				echo $this->auto_complete_input->getData('presentacion', 'h_c_indicaciones_medicales', 'clinical_history');
						?>	
				</datalist>
           </div>
           <div class="form-floating mb-3">
		
             <div class="form-floating">
			  <input type="text" list="medfr_list" class="form-control clr_inputs_ind_med" id="floatingFrequency" placeholder="Frecuencia">
              
               <label for="floatingFrequency"><span style="color:red">*</span> Frecuencia</label>
			  <!-- <div id="suggestion-frecuencia-list"></div>-->
			  <datalist id="medfr_list">
						<?php
				echo $this->auto_complete_input->getData('frecuencia', 'h_c_indicaciones_medicales', 'clinical_history');
						?>	
				</datalist>
             </div>
           </div>
           <div class="row">
            
           <div class="col">
		   
		   
		     <div class="form-floating">
			  <input type="text" list="medvia_list" class="form-control clr_inputs_ind_med" id="floatingVia" placeholder="Frecuencia">
              
               <label for="floatingVia"><span style="color:red">*</span> Vía</label>
			  <!-- <div id="suggestion-frecuencia-list"></div>-->
			  <datalist id="medvia_list">
						<?php
				echo $this->auto_complete_input->getData('via', 'h_c_indicaciones_medicales', 'clinical_history');
						?>	
				</datalist>
				
				  <select class="form-select clr_inputs_ind_med " id="viaOft" style="display:none">
                 <option value="">Seleccionar</option>
                 <option>Ojo izquiedo</option>
                 <option>Ojo derecho</option>
                 <option>Ambos ojos</option>
               </select>
             </div>
		   
		  
		   
		   
             
           </div>
           
           <div class="col">
             <div class="form-floating">
               <input type="number" class="form-control clr_inputs_ind_med" id="floatingCantidad"  placeholder="Cantidad">
               <label for="floatingCantidad">Cantidad de día(s)</label>
             </div>
             <div class="form-check">
               <input class="form-check-input uso-continuo" type="checkbox" id="usoCont" name="usoCont">
               <label class="form-check-label" for="usoCont">
                 Uso Continuo
               </label>
             </div>
           </div>
         </div>
<?php 
if($this->session->userdata('user_perfil') =="Medico"){
?>
<div class="text-end">
         <input type="hidden" id="id_ind_drug" value="0" />
         <button type="button" id="resetIndDrug" style="display:none" class="btn btn-primary"><i class="bi bi-x-circle"></i> Limpiar</button>
           <button type="button" id="saveIndMed" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-right"></i> Agregar</button>
		   <span id="alert_placeholder_med" style="position:absolute; " class="p-2" ></span>
           <br/><br/>
         </div>
           <?php }  ?>
         </div>
         
        </div>

      <!-- <div class="col-md-7 border bg-light p-5 border border-bottom-0">
      
           <div class="row">
           <div style="overflow-x:auto;">
           <div id="indication_med_left"></div>
           </div>
         
           </div>
         </div>-->
		 </div>
          <div class="row">
       
          <div class="col-md-12   border-default border-top ">
	   
	  <div class="card" >
           <div class="card-body">
             <h5 class="card-title">Indicaciónes previas</h5>
			 <button style="display:none" type="button" class="btn btn-danger show-eliminar-duplicado">Elimiar duplicato</button>
              
            <div class="row">
			 <div style="overflow-x:auto;">
                 <div id="indication_med_down"></div>
                 </div>
               </div>
            
             
           </div>
         </div>
         
       </div>
	   </div>


