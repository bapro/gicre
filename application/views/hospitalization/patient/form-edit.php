		<?php 
		foreach($query->result() as $rowId)
			?>
	
		<?=$patHeader?>
		<form  class="row g-3">
		<div id="update-erBoxHosp"></div>
		<input type="hidden" id="hosp_patient_id" value="<?=$rowId->id?>">
		<div class="col-md-6">
		<label class="form-label">Centro médico <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" name="update-hosp-centro" id="update-hosp-centro" >
		<?php 
      echo $result_centro_medicos;
		?>
		</select>	
		</div>
		<!--<div class="col-md-6">
		<label class="form-label">Especialidad <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" name="hosp-esp" id="hosp-esp" >

		</select>
		</div>-->
		<div class="col-md-6">
		<label class="form-label">Doctor <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" name="update-hosp_doctor" id="update-hosp_doctor" >
			<?php
			echo $result_doc_by_centers;

			?>
		</select>
		</div>
		<div class="col-md-6">
		<label class="form-label">Causa <span
		class="text-danger">*</span></label>
		<input type="text" class="form-control clear-hosp-form" placeholder="" name="update-hosp_causa" id="update-hosp_causa" value="<?=$rowId->causa?>">
		</div>
		<div class="col-md-6">
		<label class="form-label">Via de ingreso <span
		class="text-danger">*</span></label>
		<input type="text" class="form-control clear-hosp-form" placeholder="" name="update-hosp_ingreso" id="update-hosp_ingreso" value="<?=$rowId->via?>">
		</div>
		<div class="col-md-6">
		<label class="form-label">Sala <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" name="update-hosp_sala" id="update-hosp_sala" >
		<?php 


foreach($querySala->result() as $rowSala){
	
	if($rowId->sala == $rowSala->sala) {
	echo '<option value="'.$rowSala->sala.'" selected>'.$rowSala->sala.'</option>';
	} else {
		echo '<option value="'.$rowSala->sala.'">'.$rowSala->sala.'</option>';
	}
}


?>
		</select>
		</div>
		<div class="col-md-6">
		<label class="form-label">Area <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" id="update-hosp_servicio" name="update-hosp_servicio" >
		<?php 
foreach($queryServ->result() as $rowServ){
	
	if($rowId->servicio == $rowServ->servicio) {
	echo '<option value="'.$rowServ->servicio.'" selected>'.$rowServ->servicio.'</option>';
	} else {
		echo '<option value="'.$rowServ->servicio.'">'.$rowServ->servicio.'</option>';
	}
}

?>
		</select>
		</div>
		<div class="col-md-6">
		<label class="form-label">Cama <span
		class="text-danger">*</span></label>
		<select class="form-select form-select2" id="update-hosp_cama" name="update-hosp_cama">
		<?php 
foreach($queryCama->result() as $rowCama){
	
	if($rowId->cama == $rowCama->id) {
	echo '<option value="'.$rowCama->id.'" selected>'.$rowCama->num_cama.'</option>';
	} else {
		echo '<option value="'.$rowCama->id.'">'.$rowCama->num_cama.'</option>';
	}
}
?>
		</select>
		</div>
		<div class="col-md-6">
		<label class="form-label">Autorización de ingreso <span
		class="text-danger">*</span></label>
		<input type="text" class="form-control clear-hosp-form" placeholder="" id="update-hosp_auto" name="update-hosp_auto" value="<?=$rowId->hosp_auto?>">
		</div>
		<div class="col-md-6">
		<label class="form-label">Autorizado por <span
		class="text-danger">*</span></label>
		<input type="text" class="form-control clear-hosp-form" placeholder="" name="update-hosp_auto_por" id="update-hosp_auto_por" value="<?=$rowId->hosp_auto_por?>">
		</div>
		
		<div class="pt-3">
		<button class="btn btn-primary" type="button" id="update-hosptalization-formtalization-form"><i class="fa fa-save"></i>
		GUARDAR <div class="save-spiner"></div></button>
		
		</div>
		</form>

		<script>
			  		$('.form-select2').select2({
 dropdownParent: $('#editPatientHosp'),
theme: 'bootstrap-5',
width: '100%'
});
		
		</script>
