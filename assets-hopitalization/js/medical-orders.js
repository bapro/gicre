var base_url_rep_hist= $("#base_url").val();
$(document).on('click', '#createNewOrdenMedica', function(event){ 
event.preventDefault();
   // immediatePropStopped( event );
  //event.stopImmediatePropagation();
  //immediatePropStopped( event );
 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 

var fecha = $("#hospOrdenMedicaFecha").val();
var hour = $("#hospOrdenMedicaHora").val();

 var ordenMedInsertedId   = $("#hospOrdenMedInsertedId").val();
$('#createNewOrdenMedica').prop("disabled", true);	
 $.ajax({
type: "POST",
url: base_url_rep_hist+"hosp_orden_medica/create_orden_medica",
data: { fecha:fecha, hour:hour, id:ordenMedInsertedId},
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
           loadPagination("hosp_orden_medica");
            $("#hospOrdenMedKeepOn").slideDown();
             $("#hospOrdenMedInsertedId").val(response.message);
             showalert("Guardado", "alert-success", "alert_placeholder_orden_medica"); 
           }
$('#createNewOrdenMedica').prop("disabled", false);	
},
 
});

});



$(document).on('click', '.loadOrdMedMg', function(){ 
    loadOrdenMedMedGen();
});

 
	$(document).on('click', '.loadOrdMedlab', function(){ 

   allLaboratorios();
}); 



 function allLaboratorios(){

    $.ajax({
		type:'POST',
		url:base_url+ 'hosp_orden_medica_lab/patient_laboratories',
		data: {id_register:$("#hospOrdenMedInsertedId").val()},
		success:function(data) {
            $("#load-ordenmedica-labs").html(data);
		 },

	});
 }


		
		


	
$(document).on('click', '.paginate-orden-medica-li', function() {

			var display_content = "#medical-order-forms";
			var controller = "hosp_orden_medica";
			var pageNum = this.id;
			
			$("#paginate-orden-medica-li li.active").removeClass("active");
			$(this).addClass("active");
			
			paginateLiForm(display_content, controller, pageNum);
            

		});


	
		$(document).on('click', '#new-orden-medica', function(event){
   event.preventDefault();
	
	$("#hospOrdenMedInsertedId").val(0);
var li = "paginate-orden-medica-li";
var controller = "hosp_orden_medica";
 var div ="medical-order-forms";
 resetForm(li,controller,div);
  $(window).scrollTop(0)
});

$(document).on('click', '#hospOrdenMediSaveMed', function(event){ 
        event.preventDefault();
		 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
            var ordenMedicaMed = $("#hospOrdenMedicaMed").val();
			 var ordenMedMedPres = $("#hospOrdenMedMedPres").val();
			 var dosis = $("#hospOrdenMedDosis").val();
			  var ordenMedFre = $("#hospOrdenMedFre").val();
            var ordenMedVia = $("#hospOrdenMedVia").val();
            var ordenMedNota = $("#hospOrdenMedNota").val();
			 var ordenMedicaCantidad = $("#hospOrdenMedicaCant").val();
            var id_register   = $("#hospOrdenMedInsertedId").val();
			 var idReceta   = $("#hosOrdenMedRecId").val();
			 $('#hospOrdenMediSaveMed').prop("disabled", true);
	
            $.ajax({
type: "POST",
url: base_url_rep_hist+"hosp_orden_medica_drugs/save_orden_medica_recetas",
data: {
    ordenMedicaMed:ordenMedicaMed, ordenMedMedPres:ordenMedMedPres,ordenMedNota:ordenMedNota,dosis:dosis,idReceta:idReceta,
    ordenMedFre:ordenMedFre, ordenMedVia:ordenMedVia, id_register:id_register,ordenMedicaCantidad:ordenMedicaCantidad
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
			  // alert(response.status);
            $('.cl-ord-med-drug').val("");
           loadOrdenMedDrug();
           $(".show-print-orden-medica").slideDown();
		   loadKardexFromOrenMedica();
           }
$('#hospOrdenMediSaveMed').prop("disabled", false);	
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#load-hosp-ordenmedica-drugs').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
  
});
        });
       

$(document).on('click', '.loadOrdMedDrug', function(){ 
loadOrdenMedDrug();
});


   function loadOrdenMedDrug(){
    var ordenMedInsertedId   = $("#hospOrdenMedInsertedId").val();
$.ajax({
type: "POST",
url: base_url+"hosp_orden_medica_drugs/drugs",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-hosp-ordenmedica-drugs").html(data);

},

});

}

$(document).on('change', '#searchLabOrdMedByName', function(event){ 
	event.preventDefault();
if($("#searchLabOrdMedByName").val() !=""){
    $.ajax({  
                url: base_url+"hosp_orden_medica_lab/save_indication_lab",  
                method:"POST",  
                data:{lab:$("#searchLabOrdMedByName").val(),id_register:$("#hospOrdenMedInsertedId").val()},  
                 success:function(data)  
                {  
				 allLaboratorios(); 
                  $("#searchLabOrdMedByName").val("");    
                },
 				
           })
}		   
});

		function autoCompleteInput(keyword, table, field_name_in_table, input_name, div_result){

if(keyword==""){
	$("#"+div_result).hide();
	$("#suggestion-grup-lab-list-selected").hide();
}else{
	$.ajax({
type: "POST",
url:base_url+"auto_complete_input/autoCompleteInput",
data:{keyword:keyword, table:table, field_name_in_table:field_name_in_table, input_name:input_name, div_result:div_result},

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},

});
}	
}

$(document).on('click', '.orden-med-update-drug', function(){  
           var id = $(this).attr("id");  
         alert(id);
           $.ajax({  
                url: base_url+"hosp_orden_medica_drugs/fetch_single_drug",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#hospOrdenMedicaMed').val(data.medica).trigger("change");  
                     $('#hospOrdenMedMedPres').val(data.presentacion); 
					  $('#hospOrdenMedicaCant').val(data.cantidad); 
					  $('#hospOrdenMedDosis').val(data.dosis); 
                     $('#hospOrdenMedFre').val(data.frecuencia);
                     $('#hospOrdenMedVia').val(data.via);
					 $('#hospOrdenMedNota').val(data.nota);
					$('#hosOrdenMedRecId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });

 $(document).on('click', '.anular-cancel-drug', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'drug');
}) 

 $(document).on('click', '.delete-ord-med-drug', function(event){ 
onclickElimiarBtnTableRegister($(this), 'drug');
	});

$(document).on('click', '#saveOrdenMedEst', function(event){ 
event.preventDefault();
 $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 
            var ordenMedicaEstEst = $("#hospOrdenMedicaEstEst").val();
            var ordenMedicaEstBodyPart = $("#hospOrdenMedicaEstBodyPart").val();
            var ordenMedicaEstLat = $("#hospOrdenMedicaEstLat").val();
            var ordenMedicaEstNota = $("#hospOrdenMedicaEstNota").val();
            var ordenMedEstId   = $("#hospOrdenMedEstId").val();
			 var id_register   = $("#hospOrdenMedInsertedId").val();
		 $('#saveOrdenMedEst').prop("disabled", true);	

     $.ajax({
type: "POST",
url: base_url+"hosp_orden_medica_estudy/save_orden_medica_sutdy",
data: {
ordenMedicaEstEst:ordenMedicaEstEst, ordenMedicaEstBodyPart:ordenMedicaEstBodyPart,id_register:id_register,
ordenMedicaEstLat:ordenMedicaEstLat,ordenMedicaEstNota:ordenMedicaEstNota,id:ordenMedEstId, 
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               //showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_est"); 
			   Swal.fire({
		icon: 'warning',
		html: response.message,
		});
           } else {
            $('.cl-ord-med-study').val("");
            $(".show-print-orden-medica").slideDown();
           loadOrdenMedStudy();
           }
$('#saveOrdenMedEst').prop("disabled", false);	
},

 
  
});
        });
     
	 
	$(document).on('click', '.loadOrdMedEst', function(){ 
    loadOrdenMedStudy();
}); 
	 
	 

    function loadOrdenMedStudy(){
    
$.ajax({
type: "POST",
url: base_url+"hosp_orden_medica_estudy/studies",
data: {ordenMedInsertedId :$("#hospOrdenMedInsertedId").val()},
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
                url: base_url+"hosp_orden_medica_estudy/fetch_single_study",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#hospOrdenMedicaEstEst').val(data.estudio);  
                     $('#hospOrdenMedicaEstBodyPart').val(data.cuerpo); 
                     $('#hospOrdenMedicaEstLat').val(data.lateralidad);
                     $('#hospOrdenMedicaEstNota').val(data.observacion);
					$('#hospOrdenMedEstId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });

 





$(document).on('click', '#saveOrdenMedMg', function(event){  
event.preventDefault();
$('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input');
            var ordenMedicaMedGen = $("#hospOrdenMedicaMedGen").val();
            var ordenMedicaMedGenDesc = $("#hospOrdenMedicaMedGenDesc").val();
            var ordenMedicaMedGenLat = $("#hospOrdenMedicaMedGenLat").val();
             var ordenMedMgId   = $("#hospOrdenMedMgId").val();
			var id_patient = $("#id_patient_hist").val();
           var id_centro = $("#hospOrdenMedCentroMedId").val();
            $('#saveOrdenMedMg').prop("disabled", true);

     $.ajax({
type: "POST",
url: base_url+ "hosp_orden_medica_general_measure/save_orden_medica_mg",
data: {
    ordenMedicaMedGen:ordenMedicaMedGen, ordenMedicaMedGenDesc:ordenMedicaMedGenDesc,
    ordenMedicaMedGenLat:ordenMedicaMedGenLat, id:ordenMedMgId,id_register:$("#hospOrdenMedInsertedId").val()
},
dataType: 'json',
cache: false,
success:function(response){
 if (response.status == 1) {
                 Swal.fire({
		icon: 'warning',
		html: response.message,
		});
           } else {
            $('.cl-ord-med-mg').val("");
            $(".show-print-orden-medica").slideDown();
           loadOrdenMedMedGen();
           }
$('#saveOrdenMedMg').prop("disabled", false);	
},

  
});
        });

      

        function loadOrdenMedMedGen(){
   
$.ajax({
type: "POST",
url: base_url+"hosp_orden_medica_general_measure/medidas_generales",
data: {id_register:$("#hospOrdenMedInsertedId").val()},
success: function(data){
$("#load-ordenmedica-mg").html(data);

},

});

}



$(document).on('click', '.orden-med-update-mg', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url: base_url+"hosp_orden_medica_general_measure/fetch_single_mg",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#hospOrdenMedicaMedGen').val(data.medidas_gen);  
                     $('#hospOrdenMedicaMedGenLat').val(data.intervalo_de_real); 
                     $('#hospOrdenMedicaMedGenDesc').val(data.descripcion_mg);
                     $('#hospOrdenMedMgId').val(id);  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });



 $(document).on('click', '.delete-ord-med-mg', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'medg');
	});	
	


 $(document).on('click', '.anular-cancel-medg', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'medg');
}) 


 $(document).on('click', '.save-cancel-medg', function(event){ 
var reasonToCancelTable=$(this).closest("tr").find(".reasonToCancelTableMedg").val();

if (reasonToCancelTable !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-medg").hide();
	 $('.hide-cancel-td-medg').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_ord_med_gen';
 var field='canceled'; 
 var value = 1;
 
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value);
loadOrdenMedMedGen();
}
}); 

  
 $(document).on('click', '.anular-cancel-study', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'study');
}) 

 $(document).on('click', '.anular-cancel-lab', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'lab');
}) 

function reloadOrdMegPa(){
$.ajax({
type: "POST",
url: base_url+"modal_orden_medica/pagination",

success: function(data){
$("#pagination-modal_orden_medica").html(data);

},

});

}




  $(document).on('click', '#getDrugFromStore', function(event){ 
if ($(this).is(":checked")) {
$.ajax({
url:base_url+"emergency/loadAllMedicamentos",
data: {},
method:"POST",
success:function(data){
$("#medicamentos_list").html(data);

},

});
}else{
loadAllMedicamentByDefault();	
}
});

 $(document).on('click', '.delete-ord-med-study', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'study');
	});	


 $(document).on('click', '.delete-ord-med-lab', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'lab');
	});	


 $(document).on('click', '.save-cancel-drug', function(event){ 
var reasonToCancelTableDrug=$(this).closest("tr").find(".reasonToCancelTableDrug").val();

if (reasonToCancelTableDrug !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-drug").hide();
	 $('.hide-cancel-td-drug').show();
var el = this;
var del_id = $(this).attr('id');
 var tableName='hosp_orden_medica_recetas';
 var field='canceled'; 
 var value = 1;
saveReasonToCancelTable(el, del_id, reasonToCancelTableDrug, tableName, field, value);
loadOrdenMedDrug();
//loadKardexFromOrenMedica();	
}
}); 



 $(document).on('click', '.save-cancel-lab', function(event){ 
var reasonToCancelTable=$(this).closest("tr").find(".reasonToCancelTableLab").val();

if (reasonToCancelTable !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-lab").hide();
	 $('.hide-cancel-td-lab').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_orden_medcia_lab';

  var field='canceled'; 
 var value = 1;
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName,field, value);
  allLaboratorios();
}
});




 $(document).on('click', '.save-cancel-study', function(event){ 
var reasonToCancelTable=$(this).closest("tr").find(".reasonToCancelTableStudy").val();

if (reasonToCancelTable !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-study").hide();
	 $('.hide-cancel-td-study').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_orden_medica_estudios';
 var field='canceled'; 
 var value = 1;
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName,field, value);
loadOrdenMedStudy();
}
}); 

function saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value){	

$.ajax({
type:'POST',
url:base_url_rep_hist+"hosp_cancel_table/table",
data: {id : del_id,reasonToCancelTable:reasonToCancelTable,tableName:tableName, field:field, value:value},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(el).remove();
});
},

});	
}


	function autoCompleteInputMed(keyword, field_name_in_table, input_name, div_result){

if(keyword==""){
	$("#"+div_result).hide();
}else{
	$.ajax({
type: "POST",
url:base_url+"patient_hospitalization_controller/autoCompleteInputHospMed",
data:{keyword:keyword, div_result:div_result,input_name:input_name,field_name_in_table:field_name_in_table },

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},

});
}	
}

        var keyupTimeHosprOrdMed;
		$(document).on('keyup', '#hospOrdenMedicaMed', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimeHosprOrdMed);
            keyupTimeHosprOrdMed = setTimeout(function () {
               autoCompleteInputMed(keyword, 'sub_groupo', 'hospOrdenMedicaMed', 'hosp-suggestion-drugs-list-ord');
            }, 300);
        });


var keyupTimeHosprOrdMedEst;
$(document).on('keyup', '#hospOrdenMedicaEstEst', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimeHosprOrdMedEst);
            keyupTimeHosprOrdMedEst = setTimeout(function () {
               autoCompleteInputMed(keyword, 'sub_groupo', 'hospOrdenMedicaEstEst', 'hosp-suggestion-study-est-om');
            }, 300);
        });







        var keyupTimeHosprOrdMedPr;
		$(document).on('keyup', '#ordenMedMedPres', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimeHosprOrdMedPr);
            keyupTimeHosprOrdMedPr = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "presentacion", "ordenMedMedPres", "suggestion-pres-list-ord");
            }, 300);
        });


   var keyupTimeHosprOrdMedFr;
		$(document).on('keyup', '#ordenMedFre', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimeHosprOrdMedFr);
            keyupTimeHosprOrdMedFr = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "frecuencia", "ordenMedFre", "suggestion-fre-list-ord");
            }, 300);
        });
		
		
		
		 var keyupTimeHosprOrdMedVia;
		$(document).on('keyup', '#ordenMedVia', function(event){ 
      var keyword = $(this).val();
            clearTimeout(keyupTimeHosprOrdMedVia);
            keyupTimeHosprOrdMedVia = setTimeout(function () {
               autoCompleteInput(keyword, "orden_medica_recetas", "via", "ordenMedVia", "suggestion-via-list-ord");
            }, 300);
        });
		
		
		
		$(document).on('click','#printMedicalOrder',function(event){
	event.preventDefault();
	var idDocPrint = $("#idDocPrint").val();
var idPatientPrint = $("#idPatientPrint").val();
 var idOrden   = $("#hospOrdenMedInsertedId").val();
	
	var display_content = "#medical-order-forms";
			var controller = "hosp_orden_medica";
			var pageNum = this.id;
			
			$("#paginate-orden-medica-li li.active").removeClass("active");
			$(this).addClass("active");
			
			paginateLiForm(display_content, controller, idOrden);
	
		 
window.open(base_url +'print_page_hospitalization/medical_order/'+ idDocPrint + "/" +idPatientPrint + "/" +idOrden, '_blank', 'noopener, noreferrer');


});

 $(document).on('click','#repeat-orden-medica',function(event){
	event.preventDefault();
	
	$.ajax({
	type: "POST",
	url:base_url+"hosp_orden_medica/repetirOrdenMedica",
	data:{idsala:$("#hospOrdenMedInsertedId").val()},

	success: function(data){
		Swal.fire({
		icon: 'success',
		html: data,
		});
    
	loadPagination("hosp_orden_medica");
     $('#repeat-orden-medica').prop("disabled", true);
	},

	});
	});