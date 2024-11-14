   <?php
   $this->clinical_history = $this->load->database('clinical_history',TRUE);
   $list_cie10 = '';
	if ($conclusion_data == 0) {
		$diagnosticos ="";
		$inserted_by ="";
		$otros_diagnos ="";
		$con_dia_plan ="";
		$con_dia_procedimiento ="";
		$page='';
		$id_con_diag = 0;
		$show_other_diag='style="display:none"';
	} else {
		
		$show_other_diag='';
		foreach ($show_con_by_id as $row)
			$query = $this->clinical_history->query("SELECT id_linkd, user_id, diagno_def, insert_date FROM h_c_diagno_def_link WHERE con_id_link=$row->id");
			$result = $query->result();
$i=1;			

foreach($result as $rowcie10) {
	$descriptionCie10=$this->clinical_history->select('description, code')->where('idd',$rowcie10->diagno_def)->get('cied')->row_array();
	 $list_cie10 .=  "<li class='list-group-item d-flex justify-content-between align-items-start'>
    <div class='ms-2 me-auto'>
      <div class='fw-bold'>".$descriptionCie10['code']."</div>
      
	  ". $descriptionCie10['description']."
	  
	  
    </div>";

	
	if($rowcie10->user_id == $this->session->userdata('user_id') && substr($rowcie10->insert_date , 0, 10)==date("Y-m-d") ){
    $list_cie10 .= "<span class='badge bg-danger rounded-pill delete-this-patient-con-diag fs-6' style='cursor:pointer' id=".$rowcie10->id_linkd."><i class='bi bi-trash3-fill'></i></span>";
	}
  
  "</li>";
	
	
}
       $inserted_by =$row->inserted_by;
		$con_dia_plan = $row->plan;
		$con_dia_procedimiento = $row->procedimiento;
		
		$otros_diagnos = $row->otros_diagnos;
		$id_con_diag = $row->id;
		$params2 = array('table' => 'h_c_conclusion_diagno', 'id' => $id_con_diag);
		echo $this->user_register_info->get_operation_info($params2);
		
	}
	
	
	
	
	
	?>
   <div class="col-sm-12">
   <hr>
   <div id="show-er"></div>
   <span class='fw-bold'>LISTADO DE DIAGNOSTICOS CIE10</span>
    <input value="<?=$page?>" class="patient-id-condiag" type="hidden" />
   <div class="list-of-patient-cie10s">
   <ol class="list-group list-group-flush list-group-numbered">
  <?=$list_cie10;?>
</ol>
  </div>
<hr>
<span class="float-end text-danger info-when-ce10-not-found"></span>
   	<div class="input-group mb-3">
	
   		<input type="text" class="form-control search-cie10" id="search-cie10" placeholder="Buscar CIE10" >
		<span class="input-group-text show-con-ot" style="display:none"><button class="btn btn-primary btn-sm btn-add-cie10"  type="button"><i class="fa fa-plus"></i> Agregar CIE10</button></span>
   	</div>
	
	
   	<div id="cie10-results"></div>
   
	
<div class="input-group mb-3">
		<div class="form-floating mb-3">
	
   		<textarea class="form-control floatingDiagPrDef" id="floatingDiagPrDef-<?= $id_con_diag ?>" placeholder="Diagn贸stico(s) Presuntivo o Definitivo (CIE10)" style="height: 150px" readonly></textarea>
		
	
   		<label for="floatingDiagPrDef"><span class="fa fa-asterisk" style="color:red"></span> Diagn贸stico(s) presuntivo o definitivo (CIE10)</label>
   	</div>
	
   		<span class="input-group-text mt-0"><button class="btn btn-danger btn-sm clear-ce10 "  type="button"><i class="bi bi-x"></i> Limpiar</button></span>
   	</div>
	
	
	
		<div id="list-of-cie10"></div>
   	<div class="form-floating mb-3 show-otro-diag-on-click" <?=$show_other_diag?>>
   		<textarea class="form-control floatingDiagOtros" id="floatingDiagOtros-<?= $id_con_diag ?>" placeholder="Otro Diagnostico" style="height: 300px"><?= $otros_diagnos; ?></textarea>
   		<label for="floatingDiagOtros">Otro diagnóstico</label>
   	</div>

   	<div class="form-floating mb-3">
	 <button type="button" id="btnSpeechConDiagPlan" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
 <span class="fa fa-asterisk text-danger" ></span> Plan
 &nbsp; <span id="actionSpeechConDiagPlan"></span>
   	<div id="quill-editor-condiag_plan_<?=$id_con_diag?>" class="border  rounded-2 quill-text" style="height:300px"><?=$con_dia_plan; ?></div>
   	</div>
 
   	<div class="form-floating mb-3">
	 <button type="button" id="btnSpeechConDiagProced" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  Procedimientos
  &nbsp; <span id="actionSpeechConDiagProced"></span>
	 	<div id="quill-editor-condiag_proced_<?=$id_con_diag?>" class="border  rounded-2 quill-text" style="height:300px"><?=$con_dia_procedimiento; ?></div>
   	</div>

   </div>
		<input type="hidden" value="<?= $id_con_diag ?>" id="id_con_diag">
   <?php 
  echo  $this->user_register_info->showActionBtnHistClinical($conclusion_data, $inserted_by, 'saveEditConDiag','alert_placeholder_cond', 'resetFormConDiag' );
   ?>
  