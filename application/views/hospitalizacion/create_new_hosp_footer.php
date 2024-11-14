<script>
$('.hospitalizacion1').select2({ 
placeholder: "SELECCIONAR",
tags: true

});

$('.hospitalizacion').select2({ 
placeholder: "SELECCIONAR",


});	
var titleId = $("#titleId").val();

function reloadCausaTitle(causaOrigine){

ac.attach({
  target: document.getElementById("causa-title"+causaOrigine),
  data: "<?php echo base_url(); ?>searchAutoComplete/autoComplete"
});
}	
reloadCausaTitle($("#orientation").val());	

function getDocHosp(val) {
$("#load-time").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var id_centro= $("#hosp_centro").val(); 
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	$("#hosp_doctor").prop("disabled",false);
	$("#hosp_doctor").html(data);
	$("#load-time").hide();
	},
	});
}	
	
	
	$("#hosp_esp").change(function(){
$('#hosp_doctor').val(null).trigger('change');

	});
	
	

$("#hosp_centro").change(function(){
$("#load-time").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#hosp_centro").val();

$('#hosp_esp').val(null).trigger('change');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#hosp_esp").prop("disabled",false);
	$("#hosp_esp").html(data);
	$("#load-time").hide();
	},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#erBoxHosp').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
	
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/getHospSala');?>',
	data:'id_centro='+id,
	success: function(data){
	
	$("#hosp_sala").html(data);
	
	},

	});
	
	
	
});	
	
	
$("#hosp_sala").change(function(){
	var idCentro = $("#hosp_centro").val();
	var sala = $(this).val();
	$('#hosp_servicio').val(null).trigger('change');
	$('#hosp_cama').val(null).trigger('change');
	$.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/getHospServ');?>',
	data:{id_centro:idCentro, sala: sala},
	success: function(data){
		$("#hosp_servicio").html(data);
	
	},

	});
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/getHospCama');?>',
	data:{id_centro:idCentro, sala: sala},
	success: function(data){
	$("#hosp_cama").html(data);

	},

	});
	
	
	
	});	
	
$('#send_data_hospitalizacion_update').on('submit', function(event){
event.preventDefault();

$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>action_for_patient_hosp/save_update_hosp",
method:"POST",
data:new FormData(this),
dataType: 'json',
contentType:false,
cache:false,
processData:false,
 beforeSend: function(){
 $('.save-spiner').html('guardando... ').addClass('fa fa-spinner');
 $('#save-hosp').prop("disabled",true);
            },
success:function(response){
if(response.status == 0){
	$('#erBoxHosp').html('<p class="alert alert-warning">'+response.message+'</p>');
$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
$('#save-hosp').prop("disabled",false);
}
else if(response.status == 1){
$('#erBoxHosp').html('<p class="alert alert-success">'+response.message+'</p>');
$('#save-hosp').prop("disabled",false);
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
} else{
 $('#erBoxHosp').html('<p class="alert alert-danger">'+response.message+'</p>');	
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#save-hosp').prop("disabled",false);
}
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#erBoxHosp').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

});	



$('#send_data_hospitalizacion').on('submit', function(event){
event.preventDefault();
$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>action_for_patient_hosp/add_new_hosp",
method:"POST",
data:new FormData(this),
dataType: 'json',
contentType:false,
cache:false,
processData:false,
 beforeSend: function(){
 $('.save-spiner').html('guardando... ').addClass('fa fa-spinner');
 $('#save-hosp').prop("disabled",true);
            },
success:function(response){
if(response.status == 0){
	$('#erBoxHosp').html('<p class="alert alert-warning">'+response.message+'</p>');
$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
$('#save-hosp').prop("disabled",false);
}
else if(response.status == 1){
$('#erBoxHosp').html('<p class="alert alert-success">'+response.message+'</p>');
$('#save-hosp').prop("disabled",false);
$('.save-spiner').html('').removeClass('fa fa-spinner');
window.location.href="<?php echo base_url(); ?>hospitalizacion/hospitalizacion_list/<?=$id_p_ai?>/<?=$id_useri?>"; 
} else{
 $('#erBoxHosp').html('<p class="alert alert-danger">'+response.message+'</p>');	
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#save-hosp').prop("disabled",false);
}
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#erBoxHosp').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

});	


</script>
