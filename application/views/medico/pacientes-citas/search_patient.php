<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
</style>
<div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <br/>
 <div class="form-group sumges">
 <div class="col-lg-4">
 <label class="control-label">Buscar paciente por cedula</label>
   <div class="form-inline">
   <input id="patient_cedula1" style="width:65px" type="text" class="form-control patient-cedula" placeholder="000" data-mask="000">
  <input id="patient_cedula2" style="width:165px" type="text" class="form-control patient-cedula" placeholder="0000000" data-mask="0000000" disabled>
   <input id="patient_cedula3"  style="width:45px" type="text" class="form-control patient-cedula" placeholder="0" data-mask="0" disabled>
  <!--<button id="button_cedula" class="btn btn-primary btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>-->
  <input id="user"   type="hidden" value="">
    </div>
    </div>
  <div class="col-lg-3">
   <label class="control-label">buscar paciente por NEC</label>
    <div class="input-group">
	  
	<input autocomplete="off" id="searchnec" type="text" class="form-control"  />
	
    </div>
  </div>
 <div class="col-lg-5">
 <label class="control-label">Buscar paciente por nombres y apellidos</label>
  
<div class="form-inline">

   <input type="text" id="patient_nombres" placeholder="Nombres" style="width:170px" class="form-control patientname" required>
   <input autocomplete="off" id="patient_apellido" placeholder="Apellido" style="width:170px" type="text" class="form-control patientname" required>
   <button class="btn btn-primary btn-sm" type="submit" id="button_patient_name"><i class="fa fa-search" aria-hidden="true"></i></button>
 </div>
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


