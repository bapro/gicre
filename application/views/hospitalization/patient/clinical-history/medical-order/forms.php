<div class="col-md-12">
    <?php
	
if($orden_medica_data==0){
$show_orden_medica="style='display:none'";
$fecha_ingreso="";
$hour_ingreso="";
$id_sala = 0;
$num_drugs = "";
$num_est = "";
$num_lab = "";
$num_mg = "";
$id_doc=$this->session->userdata('user_id');
$idPatientPrint=$this->session->userdata('id_patient');
//$print='<a class="btn btn-md btn-primary show-print-orden-medica" target="_blank" style="display:none" href="'.base_url().'print_page_hospitalization/medical_order/'.$this->session->userdata('user_id').'/'.$this->session->userdata('id_patient').'/0/" target="_blank"><i class="fa fa-print"></i> Imprimir</a>';
 $newRegister=''; 
}else{
    foreach($query_orden_med->result() as $row)
    $show_orden_medica="";
     $fecha_ingreso=$row->fecha_ingreso;
	$hour_ingreso=$row->hour_ingreso;
    $id_sala = $row->id;
	$id_doc=$row->inserted_by;
	$idPatientPrint=$row->id_historial;
	$newRegister='<button class="btn btn-md btn-primary" id="new-orden-medica">Nuevo</button>';
    //$print='<button class="btn btn-md btn-primary" id="new-orden-medica">Nuevo</button> <a class="btn btn-md btn-primary" target="_blank" href="'.base_url().'print_page_hospitalization/medical_order/'.$id_doc.'/'.$id_patient.'/'.$id_sala.'/" target="_blank"><i class="fa fa-print"></i> Imprimir</a>';
    $params = array('table' => 'hosp_orden_medica', 'id'=>$id_sala);
    echo $this->user_register_info_hospitalization->get_operation_info($params);
	if($row->inserted_by==$this->session->userdata('user_id')){
	echo "<button type='button' class='btn btn-warning' id='repeat-orden-medica' >Repetir Orden Medica #$id_sala</button> <span id='confirmRepeated'></span><br/><br/>";
	}


}
    ?>

	
		
		<div class="row  mb-3">
			 <input  id="idDocPrint" type="hidden" value="<?=$id_doc?>"/>
		  <input  id="idPatientPrint" type="hidden" value="<?=$idPatientPrint?>"/>
		  <input type="hidden" id="hosOrdenMedRecId" value="0" />
		<div class="col-md-3">
		<label><span style='color:red'>*</span> Fecha y hora de inicio</label>
		<div class="d-flex flex-row mb-3">
  <div class="p-1"> <input type="date" class="form-control" id="hospOrdenMedicaFecha"  value="<?=$fecha_ingreso?>" /></div>
  <div class="p-1"> <input type="time" class="form-control" id="hospOrdenMedicaHora"  value="<?=$hour_ingreso?>" /></div>
</div>
		  
		</div>
		
        <input  id="hospOrdenMedInsertedId" type="hidden" value="<?=$id_sala?>"/>
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
		<div  id="hospOrdenMedKeepOn" <?=$show_orden_medica?>>
        
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
                    <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedicaMed" placeholder="Medicamento" />
                <label for="hospOrdenMedicaMed"><span style="color:red">*</span> Medicamento</label>
                <div id="hosp-suggestion-drugs-list-ord"></div>
                    </div>
					<div class="form-floating mb-3">
                    <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedicaCant"  />
                <label for="hospOrdenMedicaCant"><span style="color:red">*</span> Cantidad</label>
                <div id="hosp-suggestion-drugs-list-ord"></div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedMedPres" placeholder="Presentación">
                      <label for="hospOrdenMedMedPres"><span style="color:red">*</span> Presentación</label>
                      <div id="hosp-suggestion-pres-list-ord"></div>
                    </div>
                    
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedDosis" placeholder="Presentación">
                      <label for="hospOrdenMedDosis"> Dosis</label>
                      <div id="hosp-suggestion-dosis-list-ord"></div>
                    </div>
                    <div class="form-floating mb-3">
					
                     
					 <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedFre" placeholder="Frecuencia">
                      <label for="hospOrdenMedFre"><span style="color:red">*</span> Frecuencia</label>
                      <div id="hosp-suggestion-fre-list-ord"></div>
                    </div>
                      <div class="form-floating  mb-3">
					  
					   <input type="text" class="form-control cl-ord-med-drug" id="hospOrdenMedVia" placeholder="Vía">
                        <label for="hospOrdenMedVia"><span style="color:red">*</span> Vía</label>
                         <div id="hosp-suggestion-via-list-ord"></div>
                        
                      </div>
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control cl-ord-med-drug" id="hospOrdenMedNota" placeholder="Nota" style="height: 100px"></textarea>
                      <label for="hospOrdenMedNota">Nota</label>
                    </div>
                     
                <?php 
		if($this->session->userdata('user_perfil') !="Admin"){
		?>
                  <div class="text-end">
                    <input id="hospOrdenMedRecId" value="0" type="hidden"/>
                    
                    <button type="button" id="hospOrdenMediSaveMed" class="btn btn-sm btn-success"><i class="bi bi-arrow-right"></i> Agregar</button>
                    <br/><br/>
                    <div id="alert_placeholder_hosp_orden_medica_med"></div>
                  </div>
		<?php } ?>
                  </div>
			
                  <div class="col-md-7 border">
                  <div style="overflow-x:auto;">
                    <div id="load-hosp-ordenmedica-drugs"></div>
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
                   <textarea  class="form-control" id="hospOrdenMedicaEstEst" placeholder="Estudio" style="height:100px"/></textarea>
		      <label for="ordenMedicaEstEst" class="form-label"><span style="color:red">*</span> Estudio</label>
              <div id="hosp-suggestion-study-est-om"></div>
                    </div>
                    
                   <div class="form-floating mb-3">
                     
                   <input type="text" class="form-control cl-ord-med-study" id="hospOrdenMedicaEstBodyPart" placeholder="Parte del cuerpo" />
                        <label for="ordenMedicaEstBodyPart"><span style="color:red">*</span> Parte del cuerpo</label>
                        <div id="hosp-suggestion-study-body-om"></div>
                    </div>
					<div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-study" id="hospOrdenMedicaEstLat" placeholder="Lateral">
                      <label for="ordenMedicaEstLat">Lateral</label>
                      <div id="hosp-suggestion-study-lat-om"></div>
                    </div>
                     
                      
                    <div class="form-floating mb-3">
                       <textarea class="form-control cl-ord-med-study" id="hospOrdenMedicaEstNota" placeholder="Observación" style="height: 100px"></textarea>
                      <label for="ordenMedicaEstNota">Observación</label>
                    </div>
                     
                       <?php 
		if($this->session->userdata('user_perfil') !="Admin"){
		?>
                  <div class="text-end">
                  <input id="hospOrdenMedEstId" value="0" type="hidden"/>
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
                    
					 <div class="form-floating mb-3">
                      <input  list="med_list_ord" class="form-control" id="searchLabOrdMedByName" placeholder="Buscar laboratorio por nombre">
                      <label for="searchLabOrdMedByName">Buscar laboratorio por nombre</label>
                       <datalist id="med_list_ord">
						<?php
						  $ID_CENTRO =$this->session->userdata('id_centro');
				$queryLAB= $this->db->query("SELECT sub_groupo  FROM centros_tarifarios_test WHERE groupo LIKE 'LABORATORIO' AND centro_id=$ID_CENTRO  GROUP BY sub_groupo");
        $query_resultLAB = $queryLAB->result();
			
		foreach($query_resultLAB as $row) {
		echo'<option value="' . $row->sub_groupo .'" >' . $row->sub_groupo . '</option>';
		}
						?>
						</datalist>
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
                      
                     <textarea class="form-control cl-ord-med-mg" id="hospOrdenMedicaMedGen" placeholder="Medidas Generales" style="height: 200px"></textarea>
                         <div id="hosp-suggestion-om-mg"></div>
						 <label for="hospOrdenMedicaMedGen"> Medidas Generales</label>
                          
                      </div>
					<div class="form-floating mb-3">
                      <input type="text" class="form-control cl-ord-med-mg" id="hospOrdenMedicaMedGenLat" placeholder="Intervalo de realización">
                      <label for="hospOrdenMedicaMedGenLat">Intervalo de realización</label>
                      <div id="hosp-suggestion-om-mg-int"></div>
                    </div>
                     
                      
                   <div class="form-floating mb-3">
                     
                     <textarea class="form-control cl-ord-med-mg" id="hospOrdenMedicaMedGenDesc" placeholder="Descripción" style="height: 300px"></textarea>
                          <label for="hospOrdenMedicaMedGenDesc"> Descripción</label>
                          
                      </div>
                  
						<?php 
						if($this->session->userdata('user_perfil') !="Admin"){
						?>
                
                  <div class="text-end">
                  <input id="hospOrdenMedMgId" value="0" type="hidden"/>
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
    <?php
  echo"
$newRegister <button type='button' id='printMedicalOrder'  class='btn btn-md btn-primary show-print-orden-medica' ><i class='fa fa-print'></i> Imprimir</button>
";?>
	</div>
     </div>
    </div>
	 </div>
        </div>
	</div>

    <?php 
	//$this->load->view('clinical-history/medical-order/footer');
	?>