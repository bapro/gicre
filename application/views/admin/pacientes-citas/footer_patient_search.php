<script>

jQuery("input[name='database']").on('click', function(e) {
		if($('.chkNo').is(':checked')) {
			 $("#patient_apellido").show(1000);
			 }
			 else{
			$("#patient_apellido").hide(1000);
			 }
		});
//--------------------------------------------------
$(document).on("input", ".patient-nec", function() {
    this.value = this.value.replace(/\D/g,'');
});
//------------------display inputs---------------

//-----get cedula patiente------------------
$("#patient_cedula3").keyup(function(){
$("#hide_patientf").hide();
var patient_cedula3=$(this).val();
var patient_cedula1=$("#patient_cedula1").val();
var patient_cedula2=$("#patient_cedula2").val();
var id_user=$(".id_user").val();
$("#patientdata").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(patient_cedula3 == "") {
$("#patientdata").hide();
$("#hide_patientf").show();
$(".show-cita-form").show();
}else {
$.get( "<?php echo base_url();?>admin_medico/get_patient_cedula?patient_cedula1="+patient_cedula1+"&patient_cedula2="+patient_cedula2+"&patient_cedula3="+patient_cedula3+"&id_user="+id_user, function( data ){
$( "#patientdata" ).html( data );
$(".show-cita-form").hide();
 $("#show_form").hide();
});
}
});



//------------------load nec button after click-----------------
$("#load_nec").on('change', function () {
 $(".button_name").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

});

//-------------------search patient name--------------------

$(".patientname").on('input', function () {
	var patient_nombres=$("#patient_nombres").val();
    var patient_apellido=$("#patient_apellido").val();
	if(patient_nombres == "" || patient_apellido  == "") {

	$("#button_patient_name").prop("disabled",true);
	} else {
	$("#button_patient_name").prop("disabled",false);
	}

});

$("#button_patient_namedfd").on('click', function() {
	$("#patientdata").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	var patient_nombres=$("#patient_nombres").val();
    var patient_apellido=$("#patient_apellido").val();
	var patient_apellido2=$("#patient_apellido2").val();
	var id_user=$(".id_user").val();
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/PatientName');?>',
	data:{patient_nombres:patient_nombres,patient_apellido:patient_apellido,patient_apellido2:patient_apellido2,id_user:id_user},
	success: function(data){
	$("#patientdata").html(data);
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
});
//--------------------------------------------------------------------
 setTimeout(function() {
$('#no_patient_name_found').fadeOut('slow');
}, 5000);
$(".select-examsis").select2({
  tags: true
});


//==============NEC search on keyup==================

var timer = null;
$("#searchnec").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(searchBynec, 1000)
});
function searchBynec (){
var str=  $("#searchnec").val();
var id_user=$(".id_user").val();
$("#patientdata").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
$( "#patientdata" ).hide();
 $(".show-cita-form").show();
}else {
$.get( "<?php echo base_url();?>admin_medico/ajaxsearchnec?id="+str+"&id_user="+id_user, function( data ){
$( "#patientdata" ).html( data );
 $(".show-cita-form").hide();
 $("#show_form").hide();
});
}
};


//==============Cedula facturacion search on keyup==================


$("#searchcedulafac").keyup(function(){
$("#patientHint").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var cedula=  $(this).val();
if(cedula == "") {
$("#patientHint").hide();
}else {
$.get( "<?php echo base_url();?>admin/ajaxsearchcedulafac?cedula="+cedula, function( data ){
$( "#patientHint" ).html( data );
$( "#hide_patientf" ).hide();
});
}
});

//=================================================================
$(".patient-cedula").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.patient-cedula').prop('disabled', false).focus();
    }
});



function getMun(val) {
$("#load-time-provincia").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getMuncipio');?>',
	data:'id_mun='+val,
	success: function(data){
	$("#municipio_dropdown").prop("disabled",false);
	$("#municipio_dropdown").html(data);
	$("#load-time-provincia").hide();
	},
	});
}

    function reloadPage(){

        location.reload(true);

    }


$("#clock").keyup(function(){
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>searchAutoComplete/filterClockData",
data:{keyword:$(this).val(),origin:1, centro:$("#centro-ocup").val()},
beforeSend: function(){
$("#clock").css("background","#DCDCDC");
},
success: function(data){
$("#employee-result").show();
$("#employee-result").html(data);
$("#clock").css("background","");
},
});
});


function selectThisClock1(val) {
var id_user=$(".id_user").val();
$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('zona_franca/addEmployeeToPatient')?>",
data :{val:val,id_user:id_user},
success:function(response){

window.location.href="<?php echo base_url(); ?>zona_franca/employee_data?id_patient="+response.patient_id+"&centro="+response.centro+"&id="+response.id+"&id_user="+id_user;
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#employee-result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

}



</script>
