<script>



$("#seguro_medico").on('change', function (e) {
e.preventDefault();

onChangeSeguroMedico("", $(this).val(), "", 0);


});


function onChangeSeguroMedico(id_patient, seguro_medico_id, seguro_patient_plan, operation){
$("#isSeguroTitle").val(seguro_medico_id);
isSeguroTitle(seguro_medico_id);	
$("#display_seguro_data").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");	
	$.ajax({
url: "<?php echo site_url('seguroMedicoController/getSeguroData');?>",
type: 'post',
data:{idpatient:id_patient,seguro_medico:seguro_medico_id,plan:seguro_patient_plan,operation:operation},
success: function (data) {
$("#display_seguro_data").removeClass("spinner-border").html("");
$("#display_seguro_data").html(data);

},

});
	
	
}


 var keyupTimerCedula;
		$('#cedula').on('keyup', function(event){ 
		if($('input[name="id_patient"]').val()==0){
   	var keyword = $(this).val();
            clearTimeout(keyupTimerCedula);
            keyupTimerCedula = setTimeout(function () {
               check_if_cedula_exist(keyword, "cedula", "patients_appointments", "cedula_info");
            }, 6000);
		}
        });
		
		
	 var keyupTimerNombre;
		$('#nombre').on('keyup', function(event){ 
		if($('input[name="id_patient"]').val()==0){
   	var keyword = $(this).val();
            clearTimeout(keyupTimerNombre);
            keyupTimerNombre = setTimeout(function () {
               check_if_cedula_exist(keyword, "nombre", "patients_appointments", "nombres_duplicado");
            }, 6000);
		}
        });	
		
		
		
		
		

function check_if_cedula_exist(keyword, field, table, div){
if(keyword == "") {
$("#"+div).hide();
}else {
$.ajax({
type: "POST",
url: "<?=base_url('general_controller/check_if_entry_exist')?>",
data: {keyword:keyword, field:field, table:table},
success:function(data){ 
$("#"+div).html( data ); 
$("#"+div).show(); 
},

});		
	
}
}
	$(document).on('change', '#centro-fac-amb', function(e) {
e.preventDefault();	
var id= $(this).val();
$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_factura_controller/getCentroType');?>",
	data:'id_centro='+id,
	success: function(data){
	$("#get-centro-type").val(data);
	$('#crear-fac-ambulatoria').prop('disabled',false);
	$("#select-med-to-fac").prop("checked", false);
	if(data=='publico'){
	$("#show-med-when-publico").show();
	$("#hide-centro-publico").hide();
	//$('#factura-esp').val(null).trigger('change');
	$('.facturar-doc').val(null).trigger('change');
	}else{
	$("#hide-centro-publico").show();
		$("#show-med-when-publico").hide();
      }
	 loadDocOnCentroSelect(id, "medico-fac-amb"); 
	  loadFacturaAmb(id, 0);
	//$("#load-fac-div").hide();
	$("#crear-fac-ambulatoria").prop("disabled", false);
	},
	
 });
	
});	
	$(document).on('change', '#medico-fac-amb', function(e) {
e.preventDefault();
$("#check-if-centro-privado-do-not-have-doc-selected").val(1);
 loadFacturaAmb($("#centro-fac-amb").val(), $(this).val());
 });


function loadFacturaAmb(centro_medico, doctor){

	$.ajax({
url: "<?php echo site_url('patient_factura_controller/getFacturasAmb');?>",
type: 'POST',
data:{doctor:doctor, centro_medico:centro_medico, id_patient:$('#id_patient_hist').val()},
success: function (data) {

$("#loadPatientFactAmb").html(data);

},

});	
}




$(document).on('change', '#cita_centro', function(e) {
e.preventDefault();

loadDocOnCentroSelect($(this).val(), "cita-doc");


});



$(document).on('change', '#presup-centro', function(e) {
e.preventDefault();

loadDocOnCentroSelect($(this).val(), "presup-med");


});




$('.btn-hide-centro-medico').on('click', function(event) {
		event.preventDefault();
$(".centro-medico-show").hide();

});


$('.btn-show-centro-medico').on('click', function(event) {
		event.preventDefault();
	
$(".centro-medico-show").show();

});


$('.some-required-inputs').on('click', function(event) {
		event.preventDefault();
if($(".required-before-leave").val()==""){
alert("Los campos con * son obligatorios!");

}

});


const base_url=$("#base_url").val();
  $(".disabled-all-inputs :input").not(".not-disabled-button").prop("disabled", true);   

 $("#onclick-btn-edit").on("click", function (e) {
        $("#onclick-btn-save").show();
		$("#onclick-btn-edit").hide();
		 $(".disabled-all-inputs :input").prop("disabled", false); 
    })



	$("#patient_files-tab").on('click', function (e) {
	e.preventDefault();
	listFolders();

	});	
    
/*$(document).on('keydown', '#causa-title1', function(e) {
        reloadCausaTitle(1);
		
    })
function reloadCausaTitle(causaOrigine){

ac.attach({
  target: document.getElementById("causa-title"+causaOrigine),
  data: "<?php echo base_url(); ?>searchAutoComplete/autoComplete"
});
}*/

$(document).on('change', '#cita-fecha', function(e) {
	
var dayNumber = new Date($(this).val()).getUTCDay();
  var fecha_propuesta = $(this).val();
  alert(fecha_propuesta);
 var centro_medico = $("#cita_centro").val();
  var doctor = $("#cita-doc").val();
  if(dayNumber==0){
	  dayNumber=7;
  }else{
	dayNumber=dayNumber;  
  }
  searchDocSchedule(dayNumber,fecha_propuesta,centro_medico, doctor);
   
});

$(document).on('change', '#cita-doc', function(e) {
$("#cita-fecha").val("");
 $("#clear-cita-info").html(""); 
})

function searchDocSchedule(dayNumber,fecha_propuesta,centro_medico, doctor){
	
	$.ajax({
type: "POST",
url: "<?=base_url('searchDocScheldureAppController/daySelected')?>",
data: {dayNumber:dayNumber,fecha_propuesta:fecha_propuesta,centro_medico:centro_medico, doctor:doctor},
cache: true,
beforeSend: function() {
						$("#horario-info").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
success:function(data){ 
$("#horario-info").removeClass("spinner-border");
$( "#horario-info").html(data); 
$("#dayNumber").val(dayNumber);
$("#hide-am-pm").hide();

},
error: function(jqXHR, textStatus, errorThrown) {
alert('operación fallida!');

$('#horario-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
  
});
  
	
}

 $(document).on("click", "#confirm-keep-creating", function (e) {
	 e.preventDefault();
     $('#hide-patient-duplicated').html("");
    })




 $("#nombre").on("keyup", function (e) {
        $("#nombre").val(capitalizeTheFirstLetterOfEachWord($("#nombre").val()));
    })

 function capitalizeTheFirstLetterOfEachWord(e) {
        for (var a = e.toLowerCase().split(" "), t = 0; t < a.length; t++) a[t] = a[t].charAt(0).toUpperCase() + a[t].substring(1);
        return a.join(" ");
    }


//$(document).on('click', '#paginate-refraction-li li', function() {
	$('.form-select').not('.clr_inputs_ind_med').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});

 
var current_date = "<?=date('Y-m-d')?>";
$(document).on('change', '#date_nacer', function(e) {
	if($('#date_nacer').val() <= current_date){
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('general_controller/calcul_age');?>",
            data: {
                date_nacer: $("#date_nacer").val()
            },
            success: function(data) {
                $("#age").val(data);
            }
        })
}else{
$('#date_nacer').val("");
$('#age').val("");	
}
});
document.getElementById('form_phoneres').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.getElementById('form_phonecel').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});



//--THIS FUNCTION IS USED IN THE HOSPITALIZATION FORM TO KNOW IF WE SHOULD DISPLAY 
//THE FORM Autorizacion de ingreso AND Autorizado por DEPENDING OF THE VALUE OF isSeguroTitleDisplay
// THAT ALLOW IF SEGURO MEDICO IS PRIVATE OR PUBLICO

function isSeguroTitle(seg){
	if(seg == 11){
		$("#isSeguroTitleDisplay").hide();
		$("#hosp_auto").val(0);
		$("#hosp_auto_por").val(0);
	}else{
	$("#isSeguroTitleDisplay").show();	
	}
}


//----LOAD TABLE FUNCTION------------------------
function loadPatientTable(divName, controllerName){
	$("#loadPatient"+divName).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
	 $.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>"+controllerName+"/loadPatientTable",
	data:{id_patient:$('#id_patient_hist').val()},
	success: function(data){
	$("#loadPatient"+divName).removeClass("spinner-border").html("");
	$("#loadPatient"+divName).html(data);

	},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#loadPatient"+divName).html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
}


			
//------CANCEL CITA ACTION

			$(document).on('click', '#cancel-cita', function(e) {
			e.preventDefault();
			//loadCreateCitaForm(0);
			$('.form-select3').val(null).trigger('change');
			$('.clear-cita-form').val("");
			});
						
$(document).on('click', '#cancel-hosp', function(e) {
			e.preventDefault();
			//loadCreateCitaForm(0);
			$('.form-select2').val(null).trigger('change');
			$('.clear-hosp-form').val("");
			});

//-------LOAD ALL FORMS-------------------------------------------------

	function loadCreateForm(id_cita, divFormName, controllerName){
					$(".show-spin-on-click").addClass("spinner-border");
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>"+controllerName+"/showForm",
					data: {
						id_cita: id_cita,id_patient:$('#id_patient_hist').val()
						
					},
					beforeSend: function() {
						//$("#load-create-"+divFormName+"-form").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$(".show-spin-on-click").removeClass("spinner-border");
						$("#load-create-"+divFormName+"-form").html(data);
					},
					 error: function(jqXHR, textStatus, errorThrown) {
          alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#load-create-"+divFormName+"-form").html('<p>statuscode: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
			});
			}



			//----CALL ALL THE CITA FUNCTIONS ON CLICK EVENT			
			//var loadPatCitaBtn = 0;
						$("#datos_citas-tab").on('click', function (e) {
						e.preventDefault();
                  //loadPatCitaBtn ++;
				  //if (loadPatCitaBtn == 1) {
					  loadCreateForm(0, "cita", "patient_cita_controller");
						loadPatientTable("Citas", "patient_cita_controller");

				  //}
						});
						
						
					//----CALL ALL THE HOSPITALIZATION FUNCTIONS ON CLICK EVENT			
			var loadPathospBtn = 0;
						$("#hospitalizacion-tab").on('click', function (e) {
						e.preventDefault();
                  loadPathospBtn ++;
				  if (loadPathospBtn == 1) {
						loadCreateForm(0, "hospitalization", "patient_hospitalization_controller");
						loadPatientTable("Hospitalization", "patient_hospitalization_controller");

				  }
						});	




	//----CALL ALL THE HOSPITALIZATION FUNCTIONS ON CLICK EVENT			
			var loadPatEmergencyBtn = 0;
						$("#emergency-tab").on('click', function (e) {
						e.preventDefault();
                  loadPatEmergencyBtn ++;
				  if (loadPatEmergencyBtn == 1) {
						loadCreateForm(0, "emergency", "patient_emergency_controller");
						loadPatientTable("Emergency", "patient_emergency_controller");

				  }
						});




						
						//--CALL FACTURA FORMS-------------------------------------------------
						
												
					var loadFacturaBtn = 0;
						$("#factura-ambulatoria-tab").on('click', function (e) {
						e.preventDefault();
						
                  loadFacturaBtn ++;
				  if (loadFacturaBtn == 1) {
						loadCreateForm(0, "factura", "patient_factura_controller");
						

				  }
						});
						
						//----CALL ALL THE PRESUPUESTO FUNCTION ON CLICK EVENT	
						$("#presupuesto-tab").on('click', function (e) {
						e.preventDefault();
                  	loadCreateForm(0, "presupueto", "patient_presupueto_controller");
						});
						
						
					var loadGeneralReporBtn = 0;
						$("#generalReport-tab").on('click', function (e) {
						e.preventDefault();
                  loadGeneralReporBtn ++;
				  if (loadGeneralReporBtn == 1) {
						loadPagination('modal_report_general', $('#id_patient_hist').val());
						//loadQuillReporteGeneral(0);
						loadReporteName(0);
						listFoldersRg();
						

				  }
						});
						
						
						var loadRefraction = 0;
						$("#refraction-tab").on('click', function (e) {
						e.preventDefault();
                  loadRefraction ++;
				  if (loadRefraction == 1) {
						loadPagination('refraction', $('#id_patient_hist').val());
						

				  }
						});
						
						
						
						
					var loadOrdenMedicaBtn = 0;
						$("#ordenMedica-tab").on('click', function (e) {
						e.preventDefault();
                  loadOrdenMedicaBtn ++;
				  if (loadOrdenMedicaBtn == 1) {
						loadPagination('modal_orden_medica', $('#id_patient_hist').val());
						

				  }
						});	
						
						
						
						
						var loadGeneralIndications = 0;
						$("#indications-tab").on('click', function (e) {
						e.preventDefault();
                  loadGeneralIndications ++;
				  if (loadGeneralIndications == 1) {
					   indication_med_down($('#id_patient_hist').val(), $('#id_centro_to_save').val());
					 
				  }
						});
						
					
		
						
							var loadFollowup = 0;
						$("#followup-tab").on('click', function (e) {
						e.preventDefault();
                  loadFollowup ++;
				  if (loadFollowup == 1) {
						 		$.ajax({
					type: "POST",
					url: base_url+"modal_follow_up/content",
					data: {
						origine: "follow", id_patient:$('#id_patient_hist').val()
					},
					beforeSend: function() {
						$("#load-follow-up").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$("#load-follow-up").removeClass("spinner-border");
						$("#load-follow-up").html(data);
							

					},
			});
						

				  }
						});
						
						
						
						
						var loadResumenHist = 0;
						$("#resumeHist-tab").on('click', function (e) {
						e.preventDefault();
                  loadResumenHist ++;
				  if (loadResumenHist == 1) {
						 		$.ajax({
					type: "POST",
					url: base_url+"modal_follow_up/content",
					data: {
						origine: "resumen", id_patient:$('#id_patient_hist').val()
					},
					beforeSend: function() {
						$("#load-resumen-hist").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$("#load-resumen-hist").removeClass("spinner-border");
						$("#load-resumen-hist").html(data);
							

					},
			});
						

				  }
						});	
						
						
						
						var loadDescSurg = 0;
					$(document).on('click', '#surgeryDesc-tab', function(e) {
						e.preventDefault();
                  loadDescSurg ++;
				  if (loadDescSurg == 1) {
					 
					loadPagination("description_surgery", $('#id_patient_hist').val());
					listFoldersDescQ();	

				  }
						});
						
					

	
						var loadEvaC = 0;
					$(document).on('click', '#eva_cardio-tab', function(e) {
						e.preventDefault();
                  loadEvaC ++;
				  if (loadEvaC == 1) {
				
					loadPagination("eva_cardiovascular", $('#id_patient_hist').val());
						

				  }
						});
					
		


$(document).on('change', 'input[type=radio][name=cita-factura-option]', function(e) {
	e.preventDefault();
  if($(this).val()=='select-med'){
	$("#cita-select-medico-fact").prop("disabled",false);
	 $("#cita-select-centro-fact").prop("disabled",true);
	 $('#cita-select-centro-fact').val(0).trigger("change");
	 
	
}else{
	$("#cita-select-medico-fact").prop("disabled",true);
	 $("#cita-select-centro-fact").prop("disabled",false);
$('#cita-select-medico-fact').val(0).trigger("change");	 
	
}
});	



		
		
	//---REDIRECT TO CREATE FACTURA CITA	
		

	
$(document).on('click', '#crear-fac-ambulatoria', function(e) {
	e.preventDefault();
if($("#centro-fac-amb").val()==""){
Swal.fire({
icon: 'warning',
html: "Elige un centro médico.",
});
return false;
}
	
var centro= $("#centro-fac-amb").val();
var doc ;
var id_apoint="fac";

var id_patient = $('#id_patient_hist').val();

var user_perfil = $("#USER_PERFIL").val();
var seguro_type = $('input:radio[name=seguro-radio]:checked').val();
if ($("#medico-fac-amb").val() == null || $("#medico-fac-amb").val() == "") {
   doc= 1 ;
}else{
	doc =$("#medico-fac-amb").val();
}

if($("#get-centro-type").val()=='privado' && user_perfil !="Medico"){

if($("#check-if-centro-privado-do-not-have-doc-selected").val()==""){

Swal.fire({
icon: 'warning',
html: "Seleccionne el médico.",
});
}else{
window.location ="<?php echo base_url(); ?>"+$('#USER_CONTROLLER').val()+"/create_invoice_ambulatory?centro="+centro+"&id_apoint="+id_apoint+"&doc="+doc+"&seg="+seguro_type+"&id_patient="+id_patient; 	
}
}
else{

window.location ="<?php echo base_url(); ?>"+$('#USER_CONTROLLER').val()+"/create_invoice_ambulatory?centro="+centro+"&id_apoint="+id_apoint+"&doc="+doc+"&seg="+seguro_type+"&id_patient="+id_patient; 
}

});

		
		
		
	
		
		
		

</script>