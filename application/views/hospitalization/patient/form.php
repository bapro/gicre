<form  method="post" novalidate class="needs-validation" action="<?php echo site_url('hopitalization/patients_admitted_saved');?>">

<div class="row">
<div id="erBoxCita"></div>



<input name="hosp_pat_created_by"  type="hidden" value="<?=$hosp_pat_created_by;?>" />
<input name="hosp_pat_updated_by"  type="hidden" value="<?=$hosp_pat_updated_by;?>" />
<input name="hosp_pat_created_time"  type="hidden" value="<?=$hosp_pat_created_time?>" />
<input name="hosp_pat_updated_time"  type="hidden" value="<?=$hosp_pat_updated_time?>" />

<div class="col-md-6 mb-2">
<label class="form-label">Centro medico <span
class="text-danger">*</span></label>

<select class="form-select form-select3" name="hosp_pat_centro" id="hosp_pat_centro" required>
<?php 
echo $result_centro_medicos;
?>
</select>
<div class="invalid-feedback">Por favor, introduzca el centro medico</div>
</div>

<div class="col-md-6 mb-2">
<label class="form-label">Doctor <span
class="text-danger">*</span></label>
<select class="form-select form-select3" id="hosp_pat_doctor" name='hosp_pat_doctor' required>
<?php  echo $result_doc_by_centers;?>
</select>
<div class="invalid-feedback">Por favor, introduzca el medico</div>
</div>
<div class="col-md-6 mb-2">
<label class="form-label">Causa <span
class="text-danger">*</span></label>
<input type="text" class="form-control" required name="hosp_pat_causa">
<div class="invalid-feedback">Por favor, introduzca la causa</div>
</div>
<div class="col-md-6 mb-2">
<label class="form-label">Via de ingreso <span
class="text-danger">*</span></label>
<input type="text" class="form-control" name="hosp_pat_via" required>
<div class="invalid-feedback">Por favor, introduzca la via de ingreso</div>
</div>

<div class="col-md-3 mb-2">
<label class="form-label">Sala <span
class="text-danger">*</span></label>
<select class="form-select form-select3" id="hosp_pat_sala" name='hosp_pat_sala' required>
<?php  echo $result_doc_by_centers;?>
</select>
<div class="invalid-feedback">Por favor, introduzca la sala</div>
</div>
<div class="col-md-3 mb-2">
<label class="form-label">Cama <span
class="text-danger">*</span></label>
<select class="form-select form-select3" id="hosp_pat_cama" name='hosp_pat_cama' required>
<?php  echo $result_doc_by_centers;?>
</select>
<div class="invalid-feedback">Por favor, introduzca la cama</div>
</div>
<div class="col-md-6 mb-2">
<label class="form-label">Servicio <span
class="text-danger">*</span></label>
<select class="form-select form-select3" id="hosp_pat_servicio" name='hosp_pat_servicio' required>
<?php  echo $result_doc_by_centers;?>
</select>
<div class="invalid-feedback">Por favor, introduzca el servicio</div>
</div>

<div class="col-md-6 mb-2">
<label class="form-label">Autorización de ingreso<span
class="text-danger">*</span></label>
<input type="text" class="form-control" id="hosp_pat_auto" name='hosp_pat_auto' required>
<div class="invalid-feedback">Por favor, introduzca la autorización de ingreso</div>
</div>

<div class="col-md-6 mb-2">
<label class="form-label">Autorizado por<span
class="text-danger">*</span></label>
<input type="text" class="form-control" id="hosp_pat_auto_por" name='hosp_pat_auto_por' required>
<div class="invalid-feedback">Por favor, introduzca por quien fue autorizado</div>
</div>
</div>
<?php 
if($this->session->userdata('user_perfil') !="Admin"){
?>
<div class="d-flex">
<div class="flex-fill pt-2">
<button class="btn btn-primary btn-save-cita btn-sm" type="submit"><i class="fa fa-save"></i>
GUARDAR <div class="save-spiner"></div> </button>

</div>
<div id="horario-info"></div>
<div class="flex-fill pt-2" id="clear-cita-info">
<?=$creation_hosp_pat_info;?>

<div id="horario-error"></div>
</div>
</div>
<?php 
}
?>
</form>

<script>

</script>