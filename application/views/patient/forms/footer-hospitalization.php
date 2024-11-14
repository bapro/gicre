<input type="hidden" value="<?=encrypt_url(0)?>" id="redirect_after_egreso"  />
<script>
$(document).ready( function(){
$(document).on('change', '.onchange-hosp-centro', function(e) {
e.preventDefault();
loadDocOnCentroSelect($(this).val(), "save-hosp_doctor");
loadDocOnCentroSelect($(this).val(), "update-hosp_doctor");
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('patient_hospitalization_controller/getHospSala');?>',
	data:'id_centro='+$(this).val(),
	success: function(data){
	
	$(".onchage-hosp_sala").html(data);
	
	},

	});
	


});




$(document).on('change', '.onchage-hosp_sala', function(e) {
e.preventDefault();

	var idCentro = $(".onchange-hosp-centro").val();
	var id_mapa = $(this).val();
	//$('#hosp_servicio').val(null).trigger('change');
	//$('#hosp_cama').val(null).trigger('change');
	$.ajax({
	type: "POST",
	url: '<?php echo site_url('patient_hospitalization_controller/getHospServ');?>',
	data:{id_centro:idCentro, id_mapa: id_mapa},
	success: function(data){
		$(".onchange-hosp_servicio").html(data);
	
	},

	});
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('patient_hospitalization_controller/getHospCama');?>',
	data:{id_centro:idCentro, id_mapa: id_mapa},
	success: function(data){
	$(".onchange-hosp_cama").html(data);

	},

	});
	
	
	
	});	
$(document).on('click', '#update-hosptalization-formtalization-form', function(event) {
event.preventDefault();
saveHospitalization($('#hosp_patient_id').val(), 'update');
});
$(document).on('click', '#save-hosptalization-formtalization-form', function(event) {
event.preventDefault();
saveHospitalization(0, 'save');

});

function saveHospitalization(id, action){
	console.log($('#id_patient_hist').val());
$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>patient_hospitalization_controller/add_new_hosp",
data: {
	hosp_centro: $('#'+action+'-hosp-centro').val(), hosp_doctor:$('#'+action+'-hosp_doctor').val(), hosp_causa:$('#'+action+'-hosp_causa').val(),
	hosp_ingreso:$('#'+action+'-hosp_ingreso').val(), hosp_sala:$('#'+action+'-hosp_sala').val(), hosp_servicio:$('#'+action+'-hosp_servicio').val(),
	hosp_cama:$('#'+action+'-hosp_cama').val(), hosp_auto:$('#'+action+'-hosp_auto').val(), hosp_auto_por:$('#'+action+'-hosp_auto_por').val(),id:id,
    inserted_by:$('#'+action+'-hosp_inserted_by').val(), updated_by:$('#'+action+'-hosp_updated_by').val(), inserted_time:$('#'+action+'-hosp_inserted_time').val(), updated_time:$('#'+action+'-hosp_updated_time').val()	
},
method:"POST",
dataType: 'json',
 beforeSend: function(){
 $('.save-spiner').html('guardando... ').addClass('fa fa-spinner');
 $('#'+action+'-hosptalization-form').prop("disabled",true);

            },
success:function(response){
 if(response.status == 3){
Swal.fire({
icon: 'warning',
html: response.message,
});

$('#'+action+'-hosptalization-form').prop("disabled",true);
$('.save-spiner').html('').removeClass('fa fa-spinner');
}
else if(response.status == 0){
	$('.show-spin-on-click').html('<p class="alert alert-warning">'+response.message+'</p>').show().delay(1000).fadeOut(500);
$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
$('#'+action+'-hosptalization-form').prop("disabled",false);
}
else if(response.status == 1){

$('#'+action+'-hosptalization-form').prop("disabled",false);
$('.save-spiner').html('').removeClass('fa fa-spinner');
loadPatientTable("Emergency", "patient_emergency_controller");

Swal.fire({
	allowOutsideClick: false,
icon: 'success',
html: response.message,
}).then((result) => {
  if (result.isConfirmed) {
	window.location.href = base_url+"hospitalization/patients_record/" + $("#redirect_after_egreso").val();
  }
})


} else{
$('.show-spin-on-click').html('<p class="alert alert-danger">'+response.message+'</p>').show().delay(1000).fadeOut(500);	
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#'+action+'-hosptalization-form').prop("disabled",false);
}
},

});	
}


$(document).on('show.bs.modal', '#editPatientHosp', function(event) {
  
	 var button = $(event.relatedTarget);
         	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_hospitalization_controller/edit_hospitalization",
					data: {
					id_hosp:button.data('id')
					},
					beforeSend: function() {
					$("#show-edit-form-hosp").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						
					$("#show-edit-form-hosp").html(data).removeClass("spinner-border");
			         },
			});
	
			
		}) 

   $(document).on('click', '.update-this-hospitalization', function(){  
           var id = $(this).attr("id");  
  loadCreateForm(id, "hospitalization", "patient_hospitalization_controller");
		

      });


  //------EMERGENCIA-----------------

$(document).on('click', '#save-emergcy-form', function(event) {
event.preventDefault();
saveUpEmergency($("#id_em").val(), 'save');

});


function saveUpEmergency(id, action){
	console.log($('#id_patient_hist').val());
$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>patient_emergency_controller/add_new_emergency",
data: {
emerg_centro: $('#'+action+'-emerg-centro').val(),emerg_causa:$('#'+action+'-emerg_causa').val(),
emerg_ingreso:$('#'+action+'-emerg_ingreso').val(),emerg_refered_by:$('#'+action+'-refered_by').val(), id:id,
em_inserted_by:$('#em_inserted_by').val(), em_updated_by:$('#em_updated_by').val(),
 em_inserted_time:$('#em_inserted_time').val(), em_updated_time:$('#em_updated_time').val()	 
},
method:"POST",
dataType: 'json',
 beforeSend: function(){
 $('.save-spiner').html('guardando... ').addClass('fa fa-spinner');
 $('#'+action+'-emergency-form').prop("disabled",true);

            },
success:function(response){
 if(response.status == 3){
Swal.fire({
icon: 'warning',
html: response.message,
});

$('#'+action+'-emergency-form').prop("disabled",true);
$('.save-spiner').html('').removeClass('fa fa-spinner');
}
else if(response.status == 0){
	$('.show-spin-on-click').html('<p class="alert alert-warning">'+response.message+'</p>').show().delay(1000).fadeOut(500);
$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
$('#'+action+'-emergency-form').prop("disabled",false);
}
else if(response.status == 1){

$('#'+action+'-emergency-form').prop("disabled",false);
$('.save-spiner').html('').removeClass('fa fa-spinner');
loadPatientTable("Emergency", "patient_emergency_controller");

Swal.fire({
	allowOutsideClick: false,
icon: 'success',
html: response.message,
}).then((result) => {
  if (result.isConfirmed) {
	window.location.href = base_url+"emergency/patients_record/"+ $("#redirect_after_egreso").val();
  }
})


} else{
$('.show-spin-on-click').html('<p class="alert alert-danger">'+response.message+'</p>').show().delay(1000).fadeOut(500);	
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#'+action+'-emergency-form').prop("disabled",false);
}
},

});	
}

 $(document).on('click', '.update-this-emergency', function(){  
           var id = $(this).attr("id");  
  loadCreateForm(id, "emergency", "patient_emergency_controller");
		

      });



 });

</script>