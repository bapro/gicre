<style>
.search-result {
  background-image: url('<?= base_url();?>assets/img/medica.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>

<div class="container"> 
 <h1>FARMACIA INTERNA</h1>
<div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <div class="alert alert-info">
  <strong>Buscar paciente </strong>
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
   <label class="control-label">Buscar  por record</label>
 <div class="input-group">
	   <span class="input-group-addon">NEC-</span>
<input autocomplete="off" id="searchnec" type="text" class="form-control" style="width:90px" data-mask="000000"/>

</div>
	
	
  </div>
 <div class="col-lg-6">
 <label class="control-label">Buscar por nombres y apellidos</label>

<div class="form-inline">

   <input type="text" id="patient_nombres" placeholder="Nombres" style="width:130px" class="form-control patientname" required>
   <input   id="patient_apellido" placeholder="Apellido1" style="width:130px" type="text" class="form-control patientname" required>
   
   <input   id="patient_apellido2" placeholder="Apellido2" style="width:130px" type="text" class="form-control patientname" required>
   
   <button  class="btn btn-primary btn-sm" type="submit" id="button_patient_name" disabled><i class="fa fa-search" aria-hidden="true"></i></button>
 </div>
  </div>
<br>
 </div>
 <br/><br/>
 </div>
<br/>
</div>
<div class="col-md-12">
<div id="display-patient-data"></div>

</div>

</div>
 <?php 


$this->load->view('footer');


?>


<div class="modal fade" id="edit_almacen"  role="dialog" >
<div class="modal-dialog lg" >
<div class="modal-content" >

</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>

var timer = null;
$("#searchnec").keydown(function(){
       clearTimeout(timer); 
	   var str= $("#searchnec").val();
       timer = setTimeout(searchBynec(str), 1000)
});

function searchBynec (str){


$("#display-patient-data").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.get( "<?php echo base_url();?>emergency/searchPatientRecord?id="+str, function( data ){
$( "#display-patient-data" ).html( data ); 
			   
});

};


$('#edit_almacen').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

 
</script>