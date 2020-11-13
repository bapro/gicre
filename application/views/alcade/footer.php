

<div class="footersoto">
  <p>Frank Soto Alcalde</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script>

$(".listar").on('click', function (e) {
$("#cargando-list").text('Cargando el listado...');
});
//=================================================================
$('#listar-coordinador').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
$(".patient-cedula").keyup(function () {
if (this.value.length == this.maxLength) {
      $(this).next('.patient-cedula').val('').prop('disabled', false).focus();
    }
});

$('.search-again').click(function () {
$(".patient-cedula").val('');

});



$("#patient_cedula3").keyup(function(){
var patient_cedula3=$(this).val();
loadMemberCedula(patient_cedula3);
});




//-----get cedula patiente------------------
function loadMemberCedula(patient_cedula3){
//$("#patient_cedula3").keyup(function(){
//var patient_cedula3=$(this).val();
var patient_cedula1=$("#patient_cedula1").val();
var patient_cedula2=$("#patient_cedula2").val();
//alert(patient_cedula1);alert(patient_cedula2);alert(patient_cedula3);
var memberoption = $('input:radio[name=optradio]:checked').val();

if(patient_cedula3 == "") {
$("#patientdata").hide();

}else {
	$("#patientdata").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/get_patient_cedula')?>",
data: {patient_cedula1:patient_cedula1,patient_cedula2:patient_cedula2,patient_cedula3:patient_cedula3,memberoption:memberoption
},
success:function(data){
$( "#patientdata" ).html( data ); 

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#patientdata").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	
	
	
}
//})
}
var cedula3=$("#patient_cedula3").val();
loadMemberCedula(cedula3);


$(".patientname").on('input', function () {
	var patient_nombres=$("#patient_nombres").val();
    var patient_apellido=$("#patient_apellido").val();
	if(patient_nombres == "" || patient_apellido  == "") {	
	
	$("#button_patient_name").prop("disabled",true);
	} else {
	$("#button_patient_name").prop("disabled",false);	
	}
	
});




$("#button_patient_name").on('click', function (e) {
e.preventDefault();

$("#patientdata").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var patient_nombres=$("#patient_nombres").val();
var patient_apellido=$("#patient_apellido").val();
var patient_apellido2=$("#patient_apellido2").val();
var memberoption = $('input:radio[name=optradio]:checked').val();
if(patient_nombres == "" || patient_apellido  == "") {

}else {
$.ajax({
type: "GET",
url: "<?=base_url('alcalde/PatientName')?>",
data: {patient_nombres:patient_nombres,patient_apellido:patient_apellido,patient_apellido2:patient_apellido2,memberoption:memberoption
},
success:function(data){
$( "#patientdata" ).html( data ); 

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#patientdata").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	
}


});


</script>