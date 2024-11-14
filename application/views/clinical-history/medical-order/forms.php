<div class="col-md-12">
    <?php
	
if($orden_medica_data==0){
$show_orden_medica="style='display:none'";
$id_centro=$this->session->userdata('centro_medico');
$sala="";
$fecha_ingreso="";
$diagno_ing="";
$id_sala = 0;
$num_drugs = "";
$num_est = "";
$num_lab = "";
$num_mg = "";
$print='<a class="btn btn-md btn-primary show-print-orden-medica" target="_blank" style="display:none" href="'.base_url().'print_page/medical_order/'.$this->session->userdata('user_id').'/'.$this->session->userdata('id_patient').'/0/" target="_blank"><i class="fa fa-print"></i> Imprimir</a>';
 
}else{
    foreach($query_orden_med->result() as $row)
    $show_orden_medica="";
    $id_centro=$row->centro;
   
    $sala=$row->name;
    $fecha_ingreso=$row->fecha_ingreso;
    $diagno_ing=$row->diagno_ing;
    $id_sala = $row->id;
    $print='<button class="btn btn-md btn-primary" id="new-orden-medica">Nuevo</button> <a class="btn btn-md btn-primary" target="_blank" href="'.base_url().'print_page/medical_order/'.$id_user.'/'.$id_patient.'/'.$id_sala.'/" target="_blank"><i class="fa fa-print"></i> Imprimir</a>';
 
  
    $params = array('table' => 'orden_medica_sala', 'id'=>$id_sala);
    echo $this->user_register_info->get_operation_info($params);
	if($row->inserted_by==$this->session->userdata('user_id')){
	echo "<button type='button' class='btn btn-warning' id='repeat-orden-medica' >Repetir Orden Medica #$id_sala</button> <span id='confirmRepeated'></span><br/><br/>";
	}
	[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($id_centro);
			$result_centro_medicos='<option value="' . $id_centro.'" >' . $get_centro_info_by_id['name'] . '</option>';

}
    ?>

		<div class="row  mb-3">
		
		<div class="col-sm-8">
          <div class="mb-3">
      			<label class="form-label" for="ordenMedCentroMedId"><span class="text-danger">*</span> Centro médico</label>
				<select class="form-select form-select3"  id="ordenMedCentroMedId" aria-label="Centro médico" >
				<?php 
				echo $result_centro_medicos;
				?>
				</select>
				
	  </div>
		</div>
		<div class="col-sm">
		<div class="mb-3">
		  <label class="form-label"  for="ordenMedicaSala"><span style='color:red'>*</span> Sala</label>
              <input type="text" class="form-control" id="ordenMedicaSala" placeholder="Sala" value="<?=$sala?>" />
              
              </div>
		
		</div>
		</div>
		
		<div class="row  mb-3">
		
		<div class="col-sm">
		    <div class="form-floating mb-3">
		<div class="form-floating mb-3">
              <input type="date" class="form-control" id="ordenMedicaFecha" placeholder="Fecha de Inicio" value="<?=$fecha_ingreso?>" />
                <label for="ordenMedicaFecha"><span style='color:red'>*</span> Fecha de Inicio</label>
              </div>
	  </div>
		</div>
		<div class="col-sm-8">
		<div class="form-floating mb-3">
              <input type="text" class="form-control" id="ordenMedicaDiagIng" placeholder="Diagnostico de Ingreso" value="<?=$diagno_ing?>"  />
                <label for="ordenMedicaDiagIng">Diagnostico de Ingreso</label>
              </div>
		
		</div>
        <input  id="ordenMedInsertedId" type="hidden" value="<?=$id_sala?>"/>
		<?php 
		if($this->session->userdata('user_perfil') =="Medico"){
		?>
        <button type="button" class="btn btn-success" id="createNewOrdenMedica">Guardar</button>
		<?php 
		}
		?>
       <div id="alert_placeholder_orden_medica" class="text-center"></div>
		</div>
        <!---------------------FORMS--->
		<div  id="ordenMedKeepOn" <?=$show_orden_medica?>>
        
        <div class="row">
   <div class="accordion" id="accordionPanelsStayOpenExample">
   <div class="accordion-item"> 
       <h2 class="accordion-header" id="panelsStayOpen-headingOrdMedOne">
         <button class="accordion-button loadOrdMedDrug" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOrdMedOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOrdMedOne">
           I- Indicaciones Medicamentos <span class="medical-orden-total-drugs"><?=$num_drugs?></span>
         </button>
       </h2>
       <div id="panelsStayOpen-collapseOrdMedOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOrdMedOne">
         <div class="accordion-body">
           
           <div class="row">
			
			
			 <div class="col-md-5">
                    
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control cl-ord-med-drug" id="ordenMedicaMed" placeholder="Medicamento" />
                <label for="ordenMedicaMed"><span style="color:red">*</span> Medicamento</label>
                <div id="suggestion-drugs-list-ord"></div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-drug" id="ordenMedMedPres" placeholder="Presentación">
                      <label for="ordenMedMedPres"><span style="color:red">*</span> Presentación</label>
                      <div id="suggestion-pres-list-ord"></div>
                    </div>
                    
                   
                    <div class="form-floating mb-3">
					
                     
					 <input type="text" class="form-control cl-ord-med-drug" id="ordenMedFre" placeholder="Frecuencia">
                      <label for="ordenMedFre"><span style="color:red">*</span> Frecuencia</label>
                      <div id="suggestion-fre-list-ord"></div>
                    </div>
                      <div class="form-floating  mb-3">
					  
					   <input type="text" class="form-control cl-ord-med-drug" id="ordenMedVia" placeholder="Vía">
                        <label for="ordenMedVia"><span style="color:red">*</span> Vía</label>
                         <div id="suggestion-via-list-ord"></div>
                        
                      </div>
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control cl-ord-med-drug" id="ordenMedNota" placeholder="Nota" style="height: 100px"></textarea>
                      <label for="ordenMedNota">Nota</label>
                    </div>
                     
                <?php 
		if($this->session->userdata('user_perfil') !="Admin"){
		?>
                  <div class="text-end">
                    <input id="ordenMedRecId" value="0" type="hidden"/>
                    
                    <button type="button" id="ordenMediSaveMed" class="btn btn-sm btn-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                    <div id="alert_placeholder_orden_medica_med"></div>
                  </div>
		<?php } ?>
                  </div>
			
                  <div class="col-md-7 border">
                  <div style="overflow-x:auto;">
                    <div id="load-ordenmedica-drugs"></div>
                    </div>
                    </div>
			
             
             </div>
         </div>
       </div>
     </div> <!-- end medicamentos -->
     <div class="accordion-item"> 
       <h2 class="accordion-header" id="panelsStayOpen-headingOrdMedTwo">
         <button class="accordion-button collapsed loadOrdMedEst" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOrdMedTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseOrdMedTwo">
           II- Indicaciónes Estudios <span class="medical-orden-total-studies"><?=$num_est?></span>
         </button>
       </h2>
       <div id="panelsStayOpen-collapseOrdMedTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOrdMedTwo">
         <div class="accordion-body">
           
           <div class="row">
			
			
			 <div class="col-md-5">
                    
                   <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="ordenMedicaEstEst" placeholder="Estudio" />
		      <label for="ordenMedicaEstEst" class="form-label"><span style="color:red">*</span> Estudio</label>
              <div id="suggestion-study-est-om"></div>
                    </div>
                    
                   <div class="form-floating mb-3">
                     
                   <input type="text" class="form-control cl-ord-med-study" id="ordenMedicaEstBodyPart" placeholder="Parte del cuerpo" />
                        <label for="ordenMedicaEstBodyPart"><span style="color:red">*</span> Parte del cuerpo</label>
                        <div id="suggestion-study-body-om"></div>
                    </div>
					<div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-study" id="ordenMedicaEstLat" placeholder="Lateral">
                      <label for="ordenMedicaEstLat">Lateral</label>
                      <div id="suggestion-study-lat-om"></div>
                    </div>
                     
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control cl-ord-med-study" id="ordenMedicaEstNota" placeholder="Observación" style="height: 100px"></textarea>
                      <label for="ordenMedicaEstNota">Observación</label>
                    </div>
                     
                       <?php 
		if($this->session->userdata('user_perfil') !="Admin"){
		?>
                  <div class="text-end">
                  <input id="ordenMedEstId" value="0" type="hidden"/>
                    <button type="button" id="saveOrdenMedEst" class="btn btn-sm btn-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                    <div id="alert_placeholder_orden_medica_est"></div>
                    <br/><br/>
                  </div>
		<?php } ?>
                  </div>
			
                  <div class="col-md-7 border">
                  <div style="overflow-x:auto;">
                    <div id="load-ordenmedica-studies"></div>
                    </div>
                    </div>
			
			
             
             </div>
         </div>
       </div>
     </div>
     <div class="accordion-item"> 
       <h2 class="accordion-header" id="panelsStayOpen-headingOrdMedThree">
         <button class="accordion-button collapsed loadOrdMedlab" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOrdMedThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseOrdMedThree">
           III- Indicaciones laboratorios <span class="medical-orden-total-labs"><?=$num_lab?></span>
         </button>
       </h2>
       <div id="panelsStayOpen-collapseOrdMedThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOrdMedThree">
         <div class="accordion-body">
           
           <div class="row">
			
			
			 <div class="col-md-6">
                    
					
					
					     <div class="input-group mb-3">
				   <div class="form-floating flex-grow-1">
		  
        <input type="text" class="form-control" id="searchLabOrdMedByName" placeholder="Buscar laboratorio por nombre">
         <label for="searchLabOrdMedByName"> Buscar laboratorio por nombre</label>
		 <div id="suggestion-lab-ordenmed-list"></div>
		  </div>
		    <span class="input-group-text"><span style="cursor:pointer"  class="bi bi-x-lg   clearInputs"  onclick="clearInputField('searchLabByName');"> </span></span>
		 </div>
				       
             </div>
			
                  <div class="col-md-6 border">
                    <div id="load-ordenmedica-labs"></div>
                    </div>
			
			
             
             </div>
         </div>
       </div>
     </div>

     <div class="accordion-item">
       <h2 class="accordion-header" id="panelsStayOpen-headingOrdMedFour">
         <button class="accordion-button collapsed loadOrdMedMg" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOrdMedFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseOrdMedFour">
           IV- Medidades generales  <span class="medical-orden-total-mg"><?=$num_mg?></span>
         </button>
       </h2>
       <div id="panelsStayOpen-collapseOrdMedFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOrdMedFour">
         <div class="accordion-body">
           
           <div class="row">
			
			
			 <div class="col-md-6">
                    
                  <div class="form-floating mb-3">
                      
                     <textarea class="form-control cl-ord-med-mg" id="ordenMedicaMedGen" placeholder="Medidas Generales" style="height: 200px"></textarea>
                         <div id="suggestion-om-mg"></div>
						 <label for="ordenMedicaMedGen"> Medidas Generales</label>
                          
                      </div>
					<div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-mg" id="ordenMedicaMedGenLat" placeholder="Intervalo de realización">
                      <label for="ordenMedicaMedGenLat">Intervalo de realización</label>
                      <div id="suggestion-om-mg-int"></div>
                    </div>
                     
                      
                   <div class="form-floating mb-3">
                     
                     <textarea class="form-control cl-ord-med-mg" id="ordenMedicaMedGenDesc" placeholder="Descripción" style="height: 300px"></textarea>
                          <label for="ordenMedicaMedGenDesc"> Descripción</label>
                          
                      </div>
                  
						<?php 
						if($this->session->userdata('user_perfil') !="Admin"){
						?>
                
                  <div class="text-end">
                  <input id="ordenMedMgId" value="0" type="hidden"/>
                    <button type="button" id="saveOrdenMedMg" class="btn btn-sm btn-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                    <div id="alert_placeholder_orden_medica_mg"></div>
                    <br/><br/>
                  </div>
						<?php }  ?>
                  </div>
			
                  <div class="col-md-6 border">
                  <div style="overflow-x:auto;">
                    <div id="load-ordenmedica-mg"></div>
                    </div>
                    </div>
			
			
             
             </div>
         </div>
       </div>
     </div>
     <br/>
     <div class="row">
          <div class="col-md-12 text-center"> 
    <?=$print?>
	</div>
     </div>
    </div>
	 </div>
        </div>
	</div>

    <?php 
	//$this->load->view('clinical-history/medical-order/footer');
	?>