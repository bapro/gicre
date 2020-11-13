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
$("#seguro_medico").on('change', function (e) {
e.preventDefault();
$.ajax({
url: '<?php echo site_url('admin_medico/seguro_name');?>',
type: 'post',
data:'seguro_medico='+$(this).val(),
success: function (data) {
$(".seguro_input").hide();
$("#seguro_input").html(data);
			 
}

});
});


//-----get cedula patiente------------------
$("#patient_cedula3").keyup(function(){
$("#hide_patientf").hide();
var patient_cedula3=$(this).val();
var patient_cedula1=$("#patient_cedula1").val();
var patient_cedula2=$("#patient_cedula2").val();
$("#patientdata").fadeIn(1000).html('<span class="load"  > <img style="width:50px;" src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(patient_cedula3 == "") {
$("#patientdata").hide();
$("#hide_patientf").show();
}else {
$.get( "<?php echo base_url();?>admin_medico/get_patient_cedula?patient_cedula1="+patient_cedula1+"&patient_cedula2="+patient_cedula2+"&patient_cedula3="+patient_cedula3, function( data ){
$( "#patientdata" ).html( data ); 
		   
});
}
});



//------------------load nec button after click-----------------
$("#load_nec").on('change', function () {
 $(".button_name").fadeIn(400).html('<span class="load"  > <img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

});

//-------------------search patient name--------------------
$(".patientname").on('keyup', function (e) {
    e.preventDefault();
	$("#hide_patientf").hide();
	 $("#patientdata").fadeIn(1000).html('<span class="load"  > <img style="width:50px;" src="<?= base_url();?>assets/img/loading.gif" /></span>');

	var patient_nombres=$("#patient_nombres").val();
    var patient_apellido=$("#patient_apellido").val();
	
	
	if(patient_nombres == "") {
$("#patientdata").hide();
$("#hide_patientf").show();
}else {
$.get( "<?php echo base_url();?>admin/PatientName?patient_nombres="+patient_nombres +"&patient_apellido="+patient_apellido, function( data ){
$( "#patientdata" ).html( data ); 
		   
});
}
	

});

//--------------------------------------------------------------------
 setTimeout(function() {
$('#no_patient_name_found').fadeOut('slow');
}, 5000);
$(".select-examsis").select2({
  tags: true
});


//==============NEC search on keyup==================


$("#searchnec").keyup(function(){
var str=  $("#searchnec").val();
if(str == "") {
//$( "#hide_patientf" ).slideDown();
}else {
$.get( "<?php echo base_url();?>admin/ajaxsearchnec?id="+str, function( data ){
$( "#patientHint" ).html( data ); 
$( "#hide_patientf" ).hide();			   
});
}
});
//==============================


//==============NEC facturacion search on keyup==================


/*$("#searchnecfac").keyup(function(){
$("#patientHint").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var str=  $(this).val();
if(str == "") {
$("#patientHint").hide();
}else {
$.get( "<?php echo base_url();?>admin/ajaxsearchnecfac?id="+str, function( data ){
$( "#patientHint" ).html( data ); 
$( "#hide_patientf" ).hide();			   
});
}
});*/
//==================================================



//==============Cedula facturacion search on keyup==================


$("#searchcedulafac").keyup(function(){
$("#patientHint").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
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





//------------------display inputs---------------
function getDoc(val) {

 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").prop("disabled",false);
	$("#doctor_dropdown").html(data);
	
	},
	});
}




function getMun(val) {

 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getMuncipio');?>',
	data:'id_mun='+val,
	success: function(data){
	$("#municipio_dropdown").prop("disabled",false);
	$("#municipio_dropdown").html(data);
	
	},
	});
}

</script>