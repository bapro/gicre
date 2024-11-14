var id_pat_general = $("#id_patient_hist").val();
var id_centro = $("#id_centro_to_save").val();
var base_url_ind =$("#base_url").val();


function checkOneIndication(checked, table, id_colm){
	
	if ($(checked).is(':checked')) {
  var id= $(checked).val();
  var print= 1;
 
  } 
  
   else {
 var id= $(checked).not(":checked").val();
 var print= 0;
}

	  $.ajax({
	 type:'POST',
	 url: base_url_ind+"h_c_indication/checkOneIndication",

	 data: {id:id, print:print, table:table, id_colm:id_colm},
	 success:function(data) {
	
   }
	 });
	
	
}



function showPrintBtnIfChecked(tableId, btnPrint){
  var countCheckedCheckboxes = $('#'+tableId+' td input[type="checkbox"]').filter(':checked').length;
        if(countCheckedCheckboxes >0){
    $("."+btnPrint).prop("disabled", false);	
    }else{
        $("."+btnPrint).prop("disabled", true);	
    }
	}




function checkAllIndications(check, table, tableId, date, id_patient){
$('#'+ tableId+' td input[type="checkbox"]').not(check).prop('checked', check.checked);
 var print;
	if ($(check).is(':checked')) {
		print=1;
	}else{
	print=0;	
	}

	  $.ajax({
	 type:'POST',
	 url: base_url_ind+"h_c_indication/checkAllIndications",
	 
	 data: {date:date, id_patient:id_patient, print:print, table:table},
	 success:function(data) {
		 
   }
	 });
	 }



var  countLoadMed = 0;
$('#v-pills-recetas-tab').on('click', function(e) {
   e.preventDefault();
   countLoadMed ++;
   if(countLoadMed==1){
	  
   indication_med_down($("#id_patient_hist").val(), id_centro);
   
   }
});

$(document).on('click', '.display-indication-by-date', function(event){ 
	event.preventDefault();
	var id = event.target.id; 
	arr = id.split("_"); //split to get the number
  var date = arr[0];
  var id_opertor = arr[1];
  var id_centro= arr[2];
loadOnClickIndicationDrugDate(date, 1, id_opertor, id_centro);


});



function loadOnClickIndicationDrugDate(date, action, id_opertor, id_centro){
	if(action==0){
		$('.display-indication-by-date').first().addClass('active');
		} else {
			$('.display-indication-by-date').first().removeClass('active');
		}
		$.ajax({
		type:'POST',
		url: base_url_ind+"h_c_indication/showIndicationsByDateClick",
		
		data: {date:date, table:$('.get-indication-table').val(), id_patient:$("#id_patient_hist").val(), id_opertor:id_opertor, id_centro:id_centro, folder:"receipt"},
		success:function(data) {
			
	    $("#"+$('.get-indication-table').val()+"-show-patient-indications-by-date").html(data);
		
      },

	});
	
	}



$(document).on('click', '.display-indication-lab-by-date', function(event){ 
	event.preventDefault();
	var id = event.target.id; 
	arr = id.split("_"); //split to get the number
  var date = arr[0];
  var id_opertor = arr[1];
  var id_centro= arr[2];
loadOnClickIndicationLabDate(date, 1, id_opertor, id_centro);


});




function loadOnClickIndicationLabDate(date, action, id_opertor, id_centro){
	
		if(action==0){
		$('.display-indication-lab-by-date').first().addClass('active');
		} else {
			$('.display-indication-lab-by-date').first().removeClass('active');
		}
		$.ajax({
		type:'POST',
		url: base_url_ind+"h_c_indication/showIndicationsByDateClick",
		
		data: {date:date, table:'h_c_indications_labs', id_patient:$("#id_patient_hist").val(), id_opertor:id_opertor, id_centro:id_centro, folder:"laboratory"},
		success:function(data) {
			
	    $("#h_c_indications_labs-show-patient-indications-by-date").html(data);
		
      },

	});
	
	}









$('.show-eliminar-duplicado').on('click', function(event) { 
event.preventDefault();
if (confirm("Quiere eliminar las indicaciones duplicadas ?"))
{ 
var selected_id = $('.display-indication-by-date').first().attr('id');
arr_selected = selected_id.split("_"); //split to get the number
  var id_centro= arr_selected[2];

$.ajax({
type:'POST',
url: base_url_ind+"h_c_indication/eliminate_duplicated_indications",
data: {id_patient:$("#id_patient_hist").val(),table:"h_c_indicaciones_medicales"},
success:function(response) {
	$(".show-eliminar-duplicado").hide();
indication_med_down($("#id_patient_hist").val(), id_centro);
}
});
}
})





$('.show-eliminar-duplicado-lab').on('click', function(event) { 
event.preventDefault();
if (confirm("Quiere eliminar las indicaciones duplicadas ?"))
{ 
var selected_id = $('.display-indication-lab-by-date').first().attr('id');
arr_selected = selected_id.split("_"); //split to get the number
  var id_centro= arr_selected[2];

$.ajax({
type:'POST',
url: base_url_ind+"h_c_indication/eliminate_duplicated_indications",
data: {id_patient:$("#id_patient_hist").val(), table:"h_c_indications_labs"},
success:function(response) {
	$(".show-eliminar-duplicado-lab").hide();
allLaboratorios($("#id_patient_hist").val(), id_centro);
}
});
}
})





function indication_study_data(id_patient, id_centro){
   $('#indication_study_data').addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
 $.ajax({
type: "POST",
 url: base_url_ind+"h_c_indication_study/indication_study_data",
data: {id:1, id_patient:id_patient,id_centro:id_centro},
success:function(data){

 $('#indication_study_data').removeClass('spinner-border').html(data);
           	
},
 
})

}

$(document).on('click', '.display-indication-study-by-date', function(event){ 
	event.preventDefault();
	var id = event.target.id; 
	arr = id.split("_"); //split to get the number
  var date = arr[0];
  var id_opertor = arr[1];
  var id_centro= arr[2];
loadOnClickIndicationStudyDate(date, 1, id_opertor, id_centro);


});

function loadOnClickIndicationStudyDate(date, action, id_opertor, id_centro){
	
		if(action==0){
		$('.display-indication-study-by-date').first().addClass('active');
		} else {
			$('.display-indication-study-by-date').first().removeClass('active');
		}
		$.ajax({
		type:'POST',
		url: base_url_ind+"h_c_indication/showIndicationsByDateClick",
		
		data: {date:date, table:'h_c_indicaciones_estudio', id_patient:$("#id_patient_hist").val(), id_opertor:id_opertor, id_centro:id_centro, folder:"study"},
		success:function(data) {
			
	    $("#h_c_indicaciones_estudio-show-patient-indications-by-date").html(data);
		
      },

	});
	
	}






$('.show-eliminar-duplicado-study').on('click', function(event) { 
event.preventDefault();
if (confirm("Quiere eliminar las indicaciones duplicadas ?"))
{ 
var selected_id = $('.display-indication-study-by-date').first().attr('id');
arr_selected = selected_id.split("_"); //split to get the number
  var id_centro= arr_selected[2];

$.ajax({
type:'POST',
url: base_url_ind+"h_c_indication/eliminate_duplicated_indications",
data: {id_patient:$("#id_patient_hist").val(),table:"h_c_indicaciones_estudio"},
success:function(response) {
	$(".show-eliminar-duplicado-study").hide();
indication_study_data($("#id_patient_hist").val(), id_centro);
}
});
}
})









$(document).on('click', '.openCanvasCrearLab', function(event){ 
	event.preventDefault();
	
	$.ajax({
				type:'POST',
				url: base_url_ind+"medico/labList",
				data: {},
				success:function(data) {
				$('#listado-lab').html(data);
				}
				});
			
	});

function autoCompleteInputSearchLabGrupo(keyword, div, input){

if(keyword==""){
	$("#"+div).hide();

}else{
	$.ajax({
type: "POST",
url: base_url_ind+"medico_laboratory/autoCompleteInput",
data:{keyword:keyword, input:input, div:div},

success: function(data){
$("#"+div).show();
$("#"+div).html(data);

},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#show-all-labs-for-grouped").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}	
}
function autoCompleteInput(keyword, table, field_name_in_table, input_name, div_result){

if(keyword==""){
	$("#"+div_result).hide();
	$("#suggestion-grup-lab-list-selected").hide();
}else{
	$.ajax({
type: "POST",
url: base_url_ind+"auto_complete_input/autoCompleteInput",
data:{keyword:keyword, table:table, field_name_in_table:field_name_in_table, input_name:input_name, div_result:div_result},

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},

});
}	
}



function indication_med_down(id_patient, id_centro){
 $.ajax({
type: "POST",
 url: base_url_ind+"h_c_indication_drug/indication_med_table",
data: {id:'id_i_m', id_patient:id_patient, id_centro:id_centro, table:"h_c_indicaciones_medicales"},
success:function(data){
 $('#indication_med_down').removeClass('spinner-border').html(data);
          	
},


  
});	
	
}

 function allLaboratorios(id_patient, id_centro){

    $.ajax({
		type:'POST',
		 url: base_url_ind+"h_c_indication_lab/patient_laboratories",
		data: {id:'id_lab', id_patient:id_patient, id_centro:id_centro},
		success:function(data) {
		
            $("#patient-labs-content").html(data);
			
		 },
 
	});
 }


	 $(document).on('change', '#floatingVia', function(){"OFTALMICA"==$(this).val()?$("#viaOft").show():$("#viaOft").hide()}),$(".uso-continuo").change(function(){$(".uso-continuo:checked").length?($("#floatingCantidad").prop("disabled",!0),$("#floatingCantidad").val("")):$("#floatingCantidad").prop("disabled",!1)})

  $(document).on('click', '#saveIndMed', function(event) {

event.preventDefault();

if($("#id_centro_to_save").val()==""){
	alert("Elige un centro médico");
}else{
$('#main input, #main textarea, #main select').removeClass('changed-input');
$('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data  select').removeClass('changed-input');

var id   = $("#id_ind_drug").val();
var indicationMed   = $("#indicationMed").val();
 var floatingVia = $("#floatingVia").val();
var floatingDosis = $("#floatingDosis").val();
var floatingPres   = $("#floatingPres").val();
 var floatingFrequency   = $("#floatingFrequency").val();
 var floatingCantidad   = $("#floatingCantidad").val();
 var id_centro  = $("#id_centro_to_save").val();
 var viaOft   = $("#viaOft").val();
 
   var usoCont = [];
      $('input[name=usoCont]:checked').each(function() {
        usoCont.push(this.value);
      });
 
$('#saveIndMed').prop("disabled", true);	
 $.ajax({
type: "POST",
 url: base_url_ind+"h_c_indication_drug/saveMedicamento",
data: {
indicationMed:indicationMed, floatingVia:floatingVia,floatingDosis:floatingDosis,viaOft:viaOft,id:id,usoCont:usoCont,
floatingCantidad:floatingCantidad, floatingPres:floatingPres, floatingFrequency:floatingFrequency,id_centro:id_centro
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_med"); 
           } else {
              $('.clr_inputs_ind_med').val('');
			  $("#id_ind_drug").val(0);
			  //indication_med_left();
			    indication_med_down($("#id_patient_hist").val(), id_centro);
           }
$('#saveIndMed').prop("disabled", false);	
},


  
});
}
});





/*

var keyupTimer1;
  $(document).on('keyup', '#indicationMed', function(event) {
  	var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               autoCompleteInput(keyword, "medicaments", "name", "indicationMed", "suggestion-drugs-list");
            }, 300);
        });
 
   $(document).on('keyup', '#floatingDosis', function(event) {
	   event.preventDefault();
	var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_medicales", "dosis", "floatingDosis", "suggestion-dosis-list");
            }, 300);
        });
		
		  $(document).on('keyup', '#floatingFrequency', function(event) {
		var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_medicales", "frecuencia", "floatingFrequency", "suggestion-frecuencia-list");
            }, 300);
        });
		
		

		 $(document).on('keyup', '#floatingPres', function(event) {
		var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_medicales", "presentacion", "floatingPres", "suggestion-presentation-list");
            }, 300);
        });	*/

 $(document).on('click', '#saveIndStudy', function(event) {
event.preventDefault();
if($("#id_centro_to_save").val()==""){
	alert("Elige un centro médico");
}else{
$('#main input, #main textarea, #main select').removeClass('changed-input');
$('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input');
var id   = $("#id_ind_study").val();
var floatingIndEst   = $("#floatingIndEst").val();
 var floatingIndBody = $("#floatingIndBody").val();
var floatingIndLat = $("#floatingIndLat").val();
var floatingIndObs   = $("#floatingIndObs").val();
 var id_centro  = $("#id_centro_to_save").val();
$('#saveIndStudy').prop("disabled", true);	
 $.ajax({
type: "POST",
 url: base_url_ind+"h_c_indication_study/saveStudy",
data: {
 floatingIndEst:floatingIndEst, floatingIndBody:floatingIndBody,id_centro:id_centro,
 floatingIndLat:floatingIndLat,floatingIndObs:floatingIndObs, id:id
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_study"); 
           } else {
              $('.clr_inputs_ind_study').val('');
			  indication_study_data(response.getIdPatient, response.getIdCentro);
           }
$('#saveIndStudy').prop("disabled", false);	
},


});
 }
});

var  countLoadEst = 0;
 $('#indEst-tab').on('click', function(e) {
   e.preventDefault();
   countLoadEst ++;
   if(countLoadEst==1){
    indication_study_data($("#id_patient_hist").val(), id_centro);
   }
 });



/*
var keyupTimer22;
$(document).on('keyup', '#floatingIndEst', function(event) {
	event.preventDefault();
   	var keyword = $(this).val();
            clearTimeout(keyupTimer22);
            keyupTimer22 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "estudio", "floatingIndEst", "suggestion-study-est");
            }, 300);
        });
 
 var keyupTimer222;
 $(document).on('keyup', '#floatingIndBody', function(event) {
		var keyword = $(this).val();
            clearTimeout(keyupTimer222);
            keyupTimer222 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "cuerpo", "floatingIndBody", "suggestion-study-body");
            }, 300);
        });
		
		 var keyupTimer2222;
		  $(document).on('keyup', '#floatingIndLat', function(event) {
		var keyword = $(this).val();
            clearTimeout(keyupTimer2222);
            keyupTimer2222 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "lateralidad", "floatingIndLat", "suggestion-study-lat");
            }, 300);
        });	
		*/
		
		var keyupTimer2;
		  $(document).on('keyup', '#laboratoriosAgrupados', function(event) {
   	var keyword = $(this).val();
            clearTimeout(keyupTimer2);
           
            keyupTimer2 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_groupo_lab", 'groupo', "laboratoriosAgrupados", "suggestion-grup-lab-list");
            }, 300);
        });
 

        var keyupTimer3;
		 $(document).on('keyup', '#searchLabByName', function(event) {
 	var keyword = $(this).val();
        clearTimeout(keyupTimer3);
        
            keyupTimer3 = setTimeout(function () {
				   
               autoCompleteInput(keyword, "laboratories", '*', "searchLabByName", "suggestion-lab-list");
            }, 300);
        });
       // allLaboratorios("patient-labs-content", $("#ordenMedInsertedId").val());
var  countLoadLab= 0;
 $('#indLab-tab').on('click', function(e) {
   e.preventDefault();
   
   countLoadLab ++;
   if(countLoadLab==1){
  //allLaboratorios("patient-labs-content", $("#ordenMedInsertedId").val(), $("#id_patient_hist").val(), id_centro)
   allLaboratorios($("#id_patient_hist").val(), id_centro);
   }
 });
 

 
 	function clearInputField(input) {
	$('#'+input).val("");	
  //document.getElementById(input).value = "";

  $('.clear-lab-list').html("");
  $('#suggestion-grup-lab-list').html("");
  $('#suggestion-lab-ordenmed-list').html("");
  
}
 $('#id_centro_to_save_lab_name').val($('#id_centro_to_save').val());

$(document).on('change', '#id_centro_to_save', function(event) {
  $('#id_centro_to_save_lab_name').val($(this).val());
 });