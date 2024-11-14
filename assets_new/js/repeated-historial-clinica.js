var base_url_rep_hist=$("#base_url").val();
 
var quillDtGr;
function loadQuillReporteGeneral(id){
	
		   quillDtGr = new Quill($("#quill-editor-default-text-gr-"+id).get(0), 
		optionsQuillEditor,
		);
		return quillDtGr;
	
		}	

function loadReporteName(id){
$("#loadReporteName").addClass('fa fa-spinner');
		$.ajax({
type:'POST',
 url: base_url_rep_hist+"modal_report_general/loadReporteName",
data: {id:id},
success:function(data) {
	$("#loadReporteName").removeClass('fa fa-spinner');
$('#loadReporteName').html(data);
}
});
	
		}


$(document).on('click', '#saveDesSurgery', function(event){ 
 event.preventDefault();
 if($("#centro_med_q_id").val()==""){
	alert("Elige un centro médico");
}else{
 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
$('#saveDesSurgery').prop("disabled", true);
var id = $('#id_desc_quir').val();

var desc_qui_in_by=$('#desc_qui_in_by').val();
var desc_qui_up_by=$('#desc_qui_up_by').val();
var desc_qui_in_time=$('#desc_qui_in_time').val(); 
var desc_qui_up_time=$('#desc_qui_up_time').val();
var diag_pre_qui=$("#diag_pre_qui").val();
var pro_post=$("#pro_post").val();
var diag_post_qui=$("#diag_post_qui").val();
var anestesia=$("#anestesia").val();
var incision=$("#incision").val();
var cirugia_programada=$("#cirugia_programada").val();
var cirugia_realizada=$("#cirugia_realizada").val();
var hallasgo=$("#hallasgo").val();
var desc_proced=$("#desc_proced").val();
var perdida_sanguinea=$("#perdida_sanguinea").val();
var compresa=$("#compresa").val();
var gasas=$("#gasas").val();
var drenes=$("#drenes").val();
 var transfusion = $('input:radio[name=transfusion]:checked').val();
var unids_transfusion=$("#unids_transfusion").val();
var condicion_paciente=$("#condicion_paciente1").val();
var traslado=$("#traslado1").val();
var hora_ini=$(".hora_ini_desq").val();
var hora_fin=$(".hora_fin_desq").val();
var tiempo_quirurgico=$(".tiempo_quirurgico_desc").val();
var cirujano=$("#cirujano1").val();
var ajudante=$("#ajudante1").val();
var ajudante_enf=$("#ajudante_enf1").val();
var muestras_patologia=$("#muestras_patologia1").val();
var histopatologico=$("#histopatologico").val();
var centro_med_q_save =$("#centro_med_q_id").val();
var id_patient=$("#id_patient_hist").val();

var am_pm_hora_init=$(".am_pm_hora_init").val();
var am_pm_hora_fini=$(".am_pm_hora_fini").val();
  $.ajax({
 type: "POST",
 url: base_url_rep_hist+'description_surgery/save',
 data: {
desc_qui_in_by:desc_qui_in_by,
			desc_qui_up_by:desc_qui_up_by,
			desc_qui_in_time:desc_qui_in_time, 
			desc_qui_up_time:desc_qui_up_time,
			diag_pre_qui:diag_pre_qui,
			pro_post:pro_post,
			diag_post_qui:diag_post_qui,
			anestesia:anestesia,
			incision:incision,
			cirugia_programada:cirugia_programada,
			cirugia_realizada:cirugia_realizada,
			hallasgo:hallasgo,
			desc_proced:desc_proced,
			perdida_sanguinea:perdida_sanguinea,
			compresa:compresa,
			gasas:gasas,
			drenes:drenes,
			transfusion:transfusion,
			unids_transfusion:unids_transfusion,
			condicion_paciente:condicion_paciente,
			traslado:traslado,
			hora_ini:hora_ini,
			hora_fin:hora_fin,
			tiempo_quirurgico:tiempo_quirurgico,
			cirujano:cirujano,
			ajudante:ajudante,
			ajudante_enf:ajudante_enf,
			muestras_patologia:muestras_patologia,
			histopatologico:histopatologico,
			centro_med_q_save :centro_med_q_save,
			id_desc_quir:id,
			am_pm_hora_init:am_pm_hora_init,
			am_pm_hora_fini:am_pm_hora_fini
 },
 dataType: 'json',
 cache: false,
 success:function(response){
	 if(response.status == 2){
Swal.fire({
icon: 'warning',
html: response.message,
});
$("#desc_proced").focus();
	 }
 else if (response.status == 1) {
                        $('#show-print-description_surgery').html(response.message);
                        if (id == 0) {
                            loadPagination("description_surgery", id_patient);
							//calHour();
                        }
                    } else {
                        showalert(response.message, "alert-danger", "alert_placeholder_description_surgery");
                    }
                    $('#saveDesSurgery').prop("disabled", false);
 },
 
 error:function(jqXHR, textStatus, errorThrown) {
 alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 
                 $('#save-quirurgica-desc').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
 
 
 
$(document).on('click', '#resetDesSurgery', function(event){ 
        event.preventDefault();
		 $(window).scrollTop(0);
            var li = "pagination-description_surgery-li";
            var controller = "description_surgery";
            var div = "description_surgery-form";
            resetForm(li, controller, div);
            $("#pagination-description_surgery-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })
 
 
 
 
 	$(document).on('click', '.pagination-description_surgery-li', function() {
            
		var display_content = "#description_surgery-form";
			var controller = "description_surgery";
			var pageNum = this.id;
			$("#pagination-description_surgery-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});	
 





 $(document).on('click', '#attach-current-history', function(event){ 
 event.preventDefault();
    $.ajax({
 type: "POST",
 url: base_url_rep_hist+"modal_report_general/attachHistToGeneralReport",
 data: {id_patient:$("#id_patient_hist").val()},
 success:function(data){
$('#attach-current-history').prop('disabled', true);
$('#current-history-content').html(data);
},
});
});

	
	
 
 
$(document).on('click', '#saveEditRepGen', function(event){ 
 event.stopImmediatePropagation();

if($("#id_centro_genera_rp").val()==""){
alert("Elige un centro médico");	
}else{
  $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
 var reportGeneralName   = $("#reportGeneralName").val().replace(/[^\w\s\d]/gi,'');
 
  var days_amount_rest = $("#days_amount_rest").val();
 //var reporte_general_detail = $("#reporte_general_detail").val();
 var id_enf=$("#last_enf_id").val();
var id_con=$("#last_cond_id").val();
var id=$("#id_report_general").val();

var reporte_general_detail =  quillDtGr.root.innerHTML;
var change_date=$("#change_date_report_general").val();
 var id_centro  = $("#id_centro_genera_rp").val();
 $('#saveEditRepGen').prop("disabled", true);	
  $.ajax({
 type: "POST",
 url: base_url_rep_hist+"modal_report_general/save_reporte_general",
 data: {
reportGeneralName:$.trim(reportGeneralName), days_amount_rest:days_amount_rest,id_centro:id_centro,
 reporte_general_detail:reporte_general_detail,id:id,id_enf:id_enf,id_con:id_con,change_date:change_date
 },
 dataType: 'json',
 cache: false,
 success:function(response){


  if (response.status == 1) {
    $('#saveEditRepGen').prop("disabled", false);
                showalert(response.message, "alert-danger", "alert_placeholder_rep_gnl"); 
            } else {
                if(id==0){
					 $('#id_report_general').val(response.lst_id_rp);
                    $('#show-print-rep-gn').html(response.message);
					$('#attach-current-history').prop("disabled", false);
                    loadPagination('modal_report_general',$("#id_patient_hist").val());
					 $('#saveEditRepGen').prop("disabled", true);
			  $('.clear-rp-gn').val('');
                  var display_content = "#report-general-form";
			var controller = "modal_report_general";
			$("#paginate-report-general-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, $("#id_report_general").val());  
                }else{
				 $('#saveEditRepGen').prop("disabled", false);	
				}

               
            }
	
 },
 
 error:function(jqXHR, textStatus, errorThrown) {
 alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 
                 $('#load-reporteGeneral').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
 
 
 $(document).on('click', '#resetFormRepGen', function(event){
  
	 event.preventDefault();
	
var li = "paginate-report-general-li";
var controller = "modal_report_general";
 var div ="report-general-form";
 resetForm(li,controller,div);
 
});



function immediatePropStopped2( event ) {
 event.isImmediatePropagationStopped();
  
}
$(document).on('click', '#deleteThisRepGen', function(event){ 
  immediatePropStopped2( event );
  event.stopImmediatePropagation();
  immediatePropStopped2( event );
 if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
 url: base_url_rep_hist+"modal_report_general/delete_this_report",
data: {id : $("#id_report_general").val()},
success:function(response) {
	loadPagination('modal_report_general',$("#id_patient_hist").val());
$('#hideBtnPgR').hide();
$('#saveEditRepGen').hide();
$('#deleteThisRepGen').hide();
$('#hide-form-gr').hide();
$('#user-info-created').addClass('alert alert-info').text('Registro fue eliminado.');
}
});
}
}) 






$(document).on('click', '.loadOrdMedMg', function(){ 
    loadOrdenMedMedGen();
});



$(document).on('click', '.delete-ord-med-lab', function(event){ 
    immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:base_url_rep_hist+ 'h_c_indication_lab/delete_lab_by_id',
data: {id : del_id, table:"orden_medcia_lab"},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
allLaboratorios("load-ordenmedica-labs", $("#ordenMedInsertedId").val(),$("#id_patient_hist").val(),  $("#id_centro_to_save").val());

}
});
}
})

	$(document).on('click', '.loadOrdMedlab', function(){ 

   allLaboratorios("load-ordenmedica-labs", $("#ordenMedInsertedId").val(),$("#id_patient_hist").val(),  $("#id_centro_to_save").val());
}); 

		
		var keyupTimerRepG;
		$(document).on('keypress', '#reportGeneralName', function(event){
    	var keyword = $(this).val();
		
            clearTimeout(keyupTimerRepG);
            keyupTimerRepG = setTimeout(function () {
               autoCompleteInput(keyword, "hc_reporte_general_name", "name", "reportGeneralName", "suggestion-reporte-general-list");
            }, 300);
        });


		
		
		
		
		
		
		
		

$(document).on('click', '#createNewOrdenMedica', function(event){ 
event.preventDefault();
   // immediatePropStopped( event );
  //event.stopImmediatePropagation();
  //immediatePropStopped( event );
  if($("#ordenMedCentroMedId").val()==""){
	alert("Elige un centro médico");
}else{
 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
  var id_centro   = $("#ordenMedCentroMedId").val();
 var sala = $("#ordenMedicaSala").val();
var fecha = $("#ordenMedicaFecha").val();
var diagnos   = $("#ordenMedicaDiagIng").val();
 var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
$('#createNewOrdenMedica').prop("disabled", true);	
 $.ajax({
type: "POST",
url: base_url_rep_hist+"modal_orden_medica/create_orden_medica",
data: {
    id_centro:id_centro, sala:sala, fecha:fecha, diagnos:diagnos, id:ordenMedInsertedId
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
              // showalert(response.message, "alert-danger", "alert_placeholder_orden_medica"); 
		Swal.fire({
		icon: 'warning',
		html: response.message,
		});
           } else {
            reloadOrdMegPa();
            $("#ordenMedKeepOn").slideDown();
             $("#ordenMedInsertedId").val(response.message);
             showalert("Guardado", "alert-success", "alert_placeholder_orden_medica"); 
           }
$('#createNewOrdenMedica').prop("disabled", false);	
},
 
});
}
});

	
$(document).on('click', '.paginate-orden-medica-li', function() {

			var display_content = "#medical-order-forms";
			var controller = "modal_orden_medica";
			var pageNum = this.id;
			$("#paginate-orden-medica-li li.active").removeClass("active");
			$(this).addClass("active");
			
             
			paginateLiForm(display_content, controller, pageNum);
            

		});


	
		$(document).on('click', '#new-orden-medica', function(event){
   event.preventDefault();
	 $(window).scrollTop(0);
	 // set id to 0 to enable new save
	$("#ordenMedInsertedId").val(0);
var li = "paginate-orden-medica-li";
var controller = "modal_orden_medica";
 var div ="medical-order-forms";
 resetForm(li,controller,div);
});

$(document).on('click', '#ordenMediSaveMed', function(event){ 
        event.preventDefault();
		if($("#ordenMedCentroMedId").val()==""){
	alert("Elige un centro médico");
}else{
		 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
            var ordenMedicaMed = $("#ordenMedicaMed").val();
            var ordenMedMedPres = $("#ordenMedMedPres").val();
            var ordenMedFre = $("#ordenMedFre").val();
            var ordenMedVia = $("#ordenMedVia").val();
            var ordenMedNota = $("#ordenMedNota").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedRecId   = $("#ordenMedRecId").val();
			var id_patient = $("#id_patient_hist").val();
           var id_centro = $("#ordenMedCentroMedId").val();
            $('#ordenMediSaveMed').prop("disabled", true);	
            $.ajax({
type: "POST",
url: base_url_rep_hist+"h_c_orden_medica_drug/save_orden_medica_recetas",
data: {
    ordenMedicaMed:ordenMedicaMed, ordenMedMedPres:ordenMedMedPres,ordenMedNota:ordenMedNota,id_patient:id_patient,
    ordenMedFre:ordenMedFre, ordenMedVia:ordenMedVia, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedRecId,id_centro:id_centro
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               //showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_med"); 
			   Swal.fire({
icon: 'warning',
html: response.message,
});
           } else {
             $('.cl-ord-med-drug').val("");
			
           loadOrdenMedDrug();
           $(".show-print-orden-medica").slideDown();
           }
$('#ordenMediSaveMed').prop("disabled", false);	
},

  
});
}
        });
       

$(document).on('click', '.loadOrdMedDrug', function(){ 
    loadOrdenMedDrug();
});


   function loadOrdenMedDrug(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url: base_url_rep_hist+"h_c_orden_medica_drug/drugs",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-drugs").html(data);

},

});

}




$(document).on('click', '.orden-med-update-drug', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url: base_url_rep_hist+"h_c_orden_medica_drug/fetch_single_drug",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#ordenMedicaMed').val(data.medica);  
                     $('#ordenMedMedPres').val(data.presentacion); 
                     $('#ordenMedFre').val(data.frecuencia);
                     $('#ordenMedVia').val(data.via);
					 $('#ordenMedNota').val(data.nota);
					$('#ordenMedRecId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });


 $(document).on('click', '.delete-ord-med-drug', function(event){ 
    immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:base_url_rep_hist+'h_c_orden_medica_drug/delete_drug',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});


}
});
}
}) 

$(document).on('click', '#saveOrdenMedEst', function(event){ 
event.preventDefault();
 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
            var ordenMedicaEstEst = $("#ordenMedicaEstEst").val();
            var ordenMedicaEstBodyPart = $("#ordenMedicaEstBodyPart").val();
            var ordenMedicaEstLat = $("#ordenMedicaEstLat").val();
            var ordenMedicaEstNota = $("#ordenMedicaEstNota").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedEstId   = $("#ordenMedEstId").val();
			var id_patient = $("#id_patient_hist").val();
           var id_centro = $("#ordenMedCentroMedId").val();
            $('#saveOrdenMedEst').prop("disabled", true);	

     $.ajax({
type: "POST",
url: base_url_rep_hist+"h_c_orden_medica_estudy/save_orden_medica_sutdy",
data: {
ordenMedicaEstEst:ordenMedicaEstEst, ordenMedicaEstBodyPart:ordenMedicaEstBodyPart,ordenMedicaEstLat:ordenMedicaEstLat,
ordenMedicaEstNota:ordenMedicaEstNota, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedEstId, id_patient:id_patient,id_centro:id_centro 
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_est"); 
           } else {
            $('.cl-ord-med-study').val("");
            $(".show-print-orden-medica").slideDown();
           loadOrdenMedStudy();
           }
$('#saveOrdenMedEst').prop("disabled", false);	
},

error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#load-ordenmedica-studies').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
  
});
        });
     
	 
	$(document).on('click', '.loadOrdMedEst', function(){ 
    loadOrdenMedStudy();
}); 
	 
	 

    function loadOrdenMedStudy(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url: base_url_rep_hist+"h_c_orden_medica_estudy/studies",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-studies").html(data);

},

});

}


$(document).on('click', '.orden-med-update-study', function(event){  
event.preventDefault();
           var id = $(this).attr("id");  
          $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input');
           $.ajax({  
                url: base_url_rep_hist+"h_c_orden_medica_estudy/fetch_single_study",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#ordenMedicaEstEst').val(data.estudio);  
                     $('#ordenMedicaEstBodyPart').val(data.cuerpo); 
                     $('#ordenMedicaEstLat').val(data.lateralidad);
                     $('#ordenMedicaEstNota').val(data.observacion);
					$('#ordenMedEstId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });

      $(document).on('click', '.delete-ord-med-study', function(event){ 
        immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:base_url_rep_hist+ 'h_c_orden_medica_estudy/delete_study',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});


}
});
}
}) 





$(document).on('click', '#saveOrdenMedMg', function(event){  
event.preventDefault();
$('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input');
            var ordenMedicaMedGen = $("#ordenMedicaMedGen").val();
            var ordenMedicaMedGenDesc = $("#ordenMedicaMedGenDesc").val();
            var ordenMedicaMedGenLat = $("#ordenMedicaMedGenLat").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedMgId   = $("#ordenMedMgId").val();
			var id_patient = $("#id_patient_hist").val();
           var id_centro = $("#ordenMedCentroMedId").val();
            $('#saveOrdenMedMg').prop("disabled", true);	

     $.ajax({
type: "POST",
url: base_url_rep_hist+ "h_c_orden_medica_medidas_generales/save_orden_medica_mg",
data: {
    ordenMedicaMedGen:ordenMedicaMedGen, ordenMedicaMedGenDesc:ordenMedicaMedGenDesc,id_patient:id_patient,
    ordenMedicaMedGenLat:ordenMedicaMedGenLat, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedMgId,id_centro:id_centro
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_mg"); 
           } else {
            $('.cl-ord-med-mg').val("");
            $(".show-print-orden-medica").slideDown();
           loadOrdenMedMedGen();
           }
$('#saveOrdenMedMg').prop("disabled", false);	
},
 error:function(jqXHR, textStatus, errorThrown) {
 alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 
                 $('#result-error').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                 console.log('jqXHR:');
                 console.log(jqXHR);
                 console.log('textStatus:');
                 console.log(textStatus);
                 console.log('errorThrown:');
                 console.log(errorThrown);
             }, 
  
});
        });

      

        function loadOrdenMedMedGen(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url: base_url_rep_hist+"h_c_orden_medica_medidas_generales/medidas_generales",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-mg").html(data);

},

});

}



$(document).on('click', '.orden-med-update-mg', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url: base_url_rep_hist+"h_c_orden_medica_medidas_generales/fetch_single_mg",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#ordenMedicaMedGen').val(data.medidas_gen);  
                     $('#ordenMedicaMedGenLat').val(data.intervalo_de_real); 
                     $('#ordenMedicaMedGenDesc').val(data.descripcion_mg);
                     $('#ordenMedMgId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });


      $(document).on('click', '.delete-ord-med-mg', function(event){ 
        immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:base_url_rep_hist+'h_c_orden_medica_medidas_generales/delete_mg',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
loadOrdenMedMedGen();

}
});
}
}) 




function reloadOrdMegPa(){

$.ajax({
type: "POST",
url: base_url_rep_hist+"modal_orden_medica/pagination",

success: function(data){
$("#pagination-modal_orden_medica").html(data);

},

});

}


			$(document).on('click', '.paginate-report-general-li', function() {
            
		var display_content = "#report-general-form";
			var controller = "modal_report_general";
			var pageNum = this.id;
			$("#paginate-report-general-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);



		});		
		
		
			
		


        var keyupTimerOrdMed;
		$(document).on('keyup', '#ordenMedicaMed', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMed);
            keyupTimerOrdMed = setTimeout(function () {
               autoCompleteInput(keyword, "medicaments", "name", "ordenMedicaMed", "suggestion-drugs-list-ord");
            }, 300);
        });

        var keyupTimerOrdMedPr;
		$(document).on('keyup', '#ordenMedMedPres', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMedPr);
            keyupTimerOrdMedPr = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "presentacion", "ordenMedMedPres", "suggestion-pres-list-ord");
            }, 300);
        });


   var keyupTimerOrdMedFr;
		$(document).on('keyup', '#ordenMedFre', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMedFr);
            keyupTimerOrdMedFr = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "frecuencia", "ordenMedFre", "suggestion-fre-list-ord");
            }, 300);
        });
		
		
		
		 var keyupTimerOrdMedVia;
		$(document).on('keyup', '#ordenMedVia', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMedVia);
            keyupTimerOrdMedVia = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "via", "ordenMedVia", "suggestion-via-list-ord");
            }, 300);
        });

		
		

//----------------------------------------------------------------------

var keyupTimerOdMedEst;
  
          $(document).on('keyup', '#ordenMedicaEstEst', function(event){ 
  event.preventDefault();
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedEst);
            keyupTimerOdMedEst = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "estudio", "ordenMedicaEstEst", "suggestion-study-est-om");
            }, 300);
        });
 
        var keyupTimerOdMedBody;
		  $(document).on('keyup', '#ordenMedicaEstBodyPart', function(event){ 
  event.preventDefault();
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedBody);
            keyupTimerOdMedBody = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "cuerpo", "ordenMedicaEstBodyPart", "suggestion-study-body-om");
            }, 300);
        });
		
		var keyupTimerOdMedLat;
		  $(document).on('keyup', '#ordenMedicaEstLat', function(event){ 
  event.preventDefault();
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedLat);
            keyupTimerOdMedLat = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "lateralidad", "ordenMedicaEstLat", "suggestion-study-lat-om");
            }, 300);
        });	




var keyupTimerOrMedLab;
  $(document).on('keyup', '#searchLabOrdMedByName', function(event){ 
  event.preventDefault();
   	var keyword = $(this).val();
        clearTimeout(keyupTimerOrMedLab);
        var ordenMedId   = $("#ordenMedInsertedId").val();
        keyupTimerOrMedLab = setTimeout(function () {
               autoCompleteInput(keyword, "laboratories", '*', "searchLabOrdMedByName", "suggestion-lab-ordenmed-list");
            }, 300);
        });


//-----------------------MEDIDAS GENERALES---------

var keyupTimerOrMedMedGen; 
 $(document).on('keyup', '#ordenMedicaMedGen', function(event){ 
		var keyword = $(this).val();
        clearTimeout(keyupTimerOrMedMedGen);
         keyupTimerOrMedMedGen = setTimeout(function () {
               autoCompleteInput(keyword, "ord_med_med_gen", 'medidas_gen', "ordenMedicaMedGen", "suggestion-om-mg");
            }, 300);
        });


        var keyupTimerOrMedlat; 
    $("#ordenMedicaMedGenLat").keyup(function () {
		var keyword = $(this).val();
        clearTimeout(keyupTimerOrMedlat);
        keyupTimerOrMedlat = setTimeout(function () {
               autoCompleteInput(keyword, "ord_med_med_gen", 'intervalo_de_real', "ordenMedicaMedGenLat", "suggestion-om-mg-int");
            }, 300);
        });
        

		
		
$(document).on('click', '#saveRefractionBtn', function(e){ 		
e.preventDefault();
if($("#id_centro_refr").val()==""){
	alert("Elige un centro médico");
}else{
 $('#saveRefractionBtn').prop("disabled", true);
 
  var vision_sencilla = [];
      $('input[name=vision-sencilla]:checked').each(function() {
        vision_sencilla.push(this.value);
      });
	   var flat_top = [];
      $('input[name=flat-top]:checked').each(function() {
        flat_top.push(this.value);
      });
	   var invisibles = [];
      $('input[name=invisibles]:checked').each(function() {
        invisibles.push(this.value);
      });
	   var progresivos = [];
      $('input[name=progresivos]:checked').each(function() {
        progresivos.push(this.value);
      });
	   
	   var antirreflejos = [];
      $('input[name=antirreflejos]:checked').each(function() {
        antirreflejos.push(this.value);
      });
	   var policarbonatos = [];
      $('input[name=policarbonatos]:checked').each(function() {
        policarbonatos.push(this.value);
      });
	   var transitions = [];
      $('input[name=transitions]:checked').each(function() {
        transitions.push(this.value);
      });
 var foto_croma=[];
  $('input[name=foto_croma]:checked').each(function() {
        foto_croma.push(this.value);
      });
 
 
$.ajax({
url:base_url_rep_hist+"refraction/saveUpOfatalRef",
method:"POST",
data: {
vision_sencilla:vision_sencilla,flat_top:flat_top,id_patient:$("#id_patient_hist").val(),
invisibles:invisibles, progresivos:progresivos, antirreflejos:antirreflejos,policarbonatos:policarbonatos,
transitions:transitions, foto_croma:foto_croma, od_espera_r:$('input:radio[name=od_espera_r]:checked').val(),od_espera:$("#od_espera").val(),
od_cilindro:$("#od_cilindro").val(), od_cilindro_r:$('input:radio[name=od_cilindro_r]:checked').val(), eje_od:$("#eje_od").val(),add_od:$("#add_od").val(),
espera_os:$("#espera_os").val(), os_espera_r:$('input:radio[name=os_espera_r]:checked').val(), cilindro_os:$("#cilindro_os").val(),os_cilindro_r:$('input:radio[name=os_cilindro_r]:checked').val(),id_refraction:$("#id_refraction").val(),
eje_os:$("#eje_os").val(),add_os:$("#add_os").val(), d_prf:$("#d-prf").val(), altura_mm:$("#altura-mm").val(), efr_nota:$("#efr_nota").val(),id_centro:$("#id_centro_refr").val()
},
 dataType: 'json',
	 success: function(response) {
          if (response.status == 1) {
            $('#show-print-refraction').html(response.message);
            if ($("#id_refraction").val() == 0) {
              loadPagination("refraction", $("#id_patient_hist").val());
            }
          } else {
            showalert(response.message, "alert-danger", "alert_placeholder_refraction");
          }
          $('#saveRefractionBtn').prop("disabled", false);
        },
error:function(jqXHR, textStatus, errorThrown) {
 alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 
                 $('#result-error').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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


		
			$(document).on('click', '.paginate-refraction-li', function() {
            
		var display_content = "#refraction-form";
			var controller = "refraction";
			var pageNum = this.id;
			$("#paginate-refraction-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});	
		
		$(document).on('click', '#resetRefra', function() {
		
      event.preventDefault();
      var li = "paginate-refraction-li";
      var controller = "refraction";
      var div = "refraction-form";
      resetForm(li, controller, div);
      $("#paginate-refraction-li li.active").removeClass("active");
      paginateLiForm(div, controller, 0);
    })
	

	
	
	$(document).on('click', '#repeat-orden-medica', function(event){ 
      event.preventDefault();
	 
	$.ajax({
 url:base_url_rep_hist+"modal_orden_medica/repetirOrdenMedica",
data: {idsala:$('#ordenMedInsertedId').val()},
method:"POST",
success:function(data){
reloadOrdMegPa();
showalert(data, "alert-success", "confirmRepeated");
$('#repeat-orden-medica').prop('disabled', true);
}
});
	});
	
	
	
		
	$(document).on('click', '#repeatRepGen', function(event){ 
 event.stopImmediatePropagation();

  $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 

var id=$("#id_report_general").val();

 $('#repeatRepGen').prop("disabled", true);	
  $.ajax({
 type: "POST",
 url: base_url_rep_hist+"modal_report_general/repeatReportGeneral",
 data: {id:id},
 dataType: 'json',
 cache: false,
 success:function(response){

  if (response.status == 0) {
	  //error
    $('#repeatRepGen').prop("disabled", false);
                showalert(response.message, "alert-danger", "alert_placeholder_rep_gnl"); 
            } else {
    loadPagination('modal_report_general',$("#id_patient_hist").val());
	
	window.setTimeout(  
    function() {  
         var display_content = "#report-general-form";
			var controller = "modal_report_general";
			var pageNum = response.status;
			//$("#paginate-report-general-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);
    },  
    1000
);
	
	

			
     }
	
 },
 

   
 });

 });