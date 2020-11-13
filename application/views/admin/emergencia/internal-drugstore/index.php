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
	   <span class="input-group-addon">#</span>
<input autocomplete="off" id="searchnec" type="text" class="form-control" style="width:90px" />

</div>
	
	
  </div>
 <div class="col-lg-6">
 <label class="control-label">Buscar por nombres y apellidos</label>

<div class="form-inline">

   <input type="text" id="patient_nombres" placeholder="Nombres" style="width:130px" class="form-control patientname" required>
   <input   id="patient_apellido" placeholder="Apellido1" style="width:130px" type="text" class="form-control patientname" required>
   
   <input   id="patient_apellido2" placeholder="Apellido2" style="width:130px" type="text" class="form-control patientname" required>
   
   <button  class="btn btn-primary btn-sm" type="submit" id="button_patient_name"><i class="fa fa-search" aria-hidden="true"></i></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>

$(".patient-cedula").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.patient-cedula').prop('disabled', false).focus();
    }
});
function searchBynec (str){

var search=2;
$("#display-patient-data").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

/*$.get( "<?php echo base_url();?>emergency/searchPatientRecord?id="+str+"&search="+search, function( data ){
$( "#display-patient-data" ).html( data ); 			   
});*/

 $.ajax({
type: "GET",
url: "<?=base_url('emergency/searchPatientRecord')?>",
data: {id:str,search:search},
success:function(data){
$("#display-patient-data").html(data);
},

});




};




var textInput = document.getElementById('searchnec');

// Init a timeout variable to be used below
var timeout = null;

// Listen for keystroke events
textInput.onkeyup = function (e) {

    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout);

    // Make a new timeout set to go off in 800ms
    timeout = setTimeout(function () {
       // console.log('Input Value:', textInput.value);
	   if(textInput.value !=""){
	   searchBynec (textInput.value);
	   }
    }, 500);
};





$("#patient_cedula3").keyup(function(){
var patient_cedula3=$(this).val();
var patient_cedula2=$("#patient_cedula2").val();
var search=1;
$("#display-patient-data").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(patient_cedula3 == "") {
$("#display-patient-data").hide();

}else {
 $.ajax({
type: "GET",
url: "<?=base_url('emergency/searchPatientRecord')?>",
data: {patient_cedula2:patient_cedula2,search:search},
success:function(data){
$("#display-patient-data").html(data);
},

});


}
});



$("#button_patient_name").click(function(){
var patient_apellido=$("#patient_apellido").val(); 
var patient_apellido2=$("#patient_apellido2").val();  
var patient_nombres=$("#patient_nombres").val();
var search=3;
$("#display-patient-data").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(patient_nombres == "" && patient_apellido == "") {
$("#display-patient-data").hide();

}else {
 $.ajax({
type: "GET",
url: "<?=base_url('emergency/searchPatientRecord')?>",
data: {patient_nombres:patient_nombres,patient_apellido2:patient_apellido2,patient_apellido:patient_apellido,search:search},
success:function(data){
$("#display-patient-data").html(data);
},

});


}
});








$('#edit_almacen').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

 
</script>