<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
</style>
<div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <div class="alert alert-info">
  <strong>Buscar el paciente primero ante de empezar a crear nueva cita.</strong>
</div>
 <div class="form-group sumges">
 <div class="col-lg-4">
 <label class="control-label">Buscar por cedula</label>
   <div class="form-inline">
   <input id="patient_cedula1" style="width:65px" type="text" class="form-control patient-cedula" placeholder="000" data-mask="000">
  <input id="patient_cedula2" style="width:165px" type="text" class="form-control patient-cedula" placeholder="0000000" data-mask="0000000" disabled>
   <input id="patient_cedula3"  style="width:45px" type="text" class="form-control patient-cedula" placeholder="0" data-mask="0" disabled>
  <!--<button id="button_cedula" class="btn btn-primary btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>-->
  <input id="user"   type="hidden" value="">
    </div>
    </div>
  <div class="col-lg-2">
   <label class="control-label">Buscar  por NEC</label>
 <div class="input-group">
	   <span class="input-group-addon">NEC-</span>
<input autocomplete="off" id="searchnec" type="text" class="form-control" style="width:90px" data-mask="000000"/>

</div>


  </div>
 <div class="col-lg-6">
 <form class="form-inline" method='get' action="<?php echo site_url("$controllerUser/patient_paginate");?>">
  <label class="control-label">Buscar por nombres</label>
 <label class="radio-inline">
      <input type="radio" class="id_radio1" name="base_de_datos" value="padron" checked> Padron
 </label>
     <label class="radio-inline" title='Elige GICRE si el paciente esta creado ya'>
      <input type="radio" class="id_radio1" name="base_de_datos" value="GICRE" > GICRE <i class="fa fa-info" title='Elige GICRE si el paciente esta creado ya'></i>
    </label>
	<br/>
   <input type="text"  name="patient_nombres" id="patient_nombres" placeholder="Nombres" style="width:130px" class="form-control patientname" required>
   <input  name="patient_apellido"  id="patient_apellido" placeholder="Apellido1" style="width:130px" type="text" class="form-control patientname" required>

   <input  name="patient_apellido2"  id="patient_apellido2" placeholder="Apellido2" style="width:130px" type="text" class="form-control patientname" >

   <button  class="btn btn-primary btn-sm" type="submit" id="button_patient_name" ><i class="fa fa-search" aria-hidden="true"></i></button>
 </form>
  </div>
<br>
 </div>
 <br/><br/>
 </div>
<div class="col-md-12">
<div class="button_name" style="margin-left:45%"></div>
<span id="no_patient_name_found"><?php echo $this->session->flashdata('no_patient_name_found'); ?></span>
<hr id="hr_ad"/>
<div id="patientdata"> </div>
</div>

  <input class="id_user"   type="hidden" value="<?=$id_user?>">

  <script>

  </script>
