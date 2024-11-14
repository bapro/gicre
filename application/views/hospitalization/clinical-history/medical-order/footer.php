<script>
    $(document).ready(function(){
		 $(".spinner-border").hide();
        function immediatePropStopped( event ) {
  var msg = "";
  if ( event.isImmediatePropagationStopped() ) {
    msg = "called";
  } else {
    msg = "not called";
  }
  
}



        var keyupTimerOrdMed;
    $("#ordenMedicaMed").keyup(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMed);
            keyupTimerOrdMed = setTimeout(function () {
               autoCompleteInput(keyword, "emergency_medicaments", "name", "ordenMedicaMed",  "suggestion-drugs-list-ord");
            }, 300);
        });



var keyupTimerOdMedEst;
    $("#ordenMedicaEstEst").keypress(function () {
      
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedEst);
            keyupTimerOdMedEst = setTimeout(function () {
               autoCompleteInput(keyword, "centros_tarifarios", "sub_groupo", "ordenMedicaEstEst", "suggestion-study-est-om");
            }, 300);
        });




var keyupTimerOrMedLab;
    $("#searchLabOrdMedByName").keypress(function () {
		var keyword = $(this).val();
        clearTimeout(keyupTimerOrMedLab);
        var ordenMedId   = $("#ordenMedInsertedId").val();
        keyupTimerOrMedLab = setTimeout(function () {
               autoCompleteInput(keyword, "search_lab", 'sub_groupo', "searchLabOrdMedByName", "suggestion-lab-ordenmed-list");
            }, 300);
        });






        var keyupTimerOrdMedPr;
        $("#ordenMedMedPres").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMedPr);
            keyupTimerOrdMedPr = setTimeout(function () {
               autoCompleteInput(keyword, "emergency_medicaments", "presentacion", "ordenMedMedPres", "suggestion-pres-list-ord");
            }, 300);
        });







//----------------------------------------------------------------------


 
        var keyupTimerOdMedBody;
  $("#ordenMedicaEstBodyPart").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedBody);
            keyupTimerOdMedBody = setTimeout(function () {
               autoCompleteInput(keyword, "type_body_parts", "name", "ordenMedicaEstBodyPart", "suggestion-study-body-om");
            }, 300);
        });
		
		var keyupTimerOdMedLat;
	 $("#ordenMedicaEstLat").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedLat);
            keyupTimerOdMedLat = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "lateralidad", "ordenMedicaEstLat", "suggestion-study-lat-om");
            }, 300);
        });	


//-----------------------MEDIDAS GENERALES---------

var keyupTimerOrMedMedGen; 
    $("#ordenMedicaMedGen").keyup(function () {
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





        $('#ordenMediSaveMed').on('click', function(){ 
		
            var ordenMedicaMed = $("#ordenMedicaMed").val();
            var ordenMedMedPres = $("#ordenMedMedPres").val();
            var ordenMedFre = $("#ordenMedFre").val();
            var ordenMedVia = $("#ordenMedVia").val();
			var ordenMedicaCantidad = $("#ordenMedicaCantidad").val();
            var ordenMedNota = $("#ordenMedNota").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedRecId   = $("#ordenMedRecId").val();
            $('#ordenMediSaveMed').prop("disabled", true);	
            $.ajax({
type: "POST",
url: "<?=base_url('hosp_orden_medica_drugs/save_orden_medica_recetas')?>",
data: {
    ordenMedicaMed:ordenMedicaMed, ordenMedMedPres:ordenMedMedPres,ordenMedNota:ordenMedNota,ordenMedicaCantidad:ordenMedicaCantidad,
    ordenMedFre:ordenMedFre, ordenMedVia:ordenMedVia, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedRecId
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_med"); 
           } else {
             $('.cl-ord-med-drug').val("");
            loadOrdenMedDrug();
			loadKardexFromOrenMedica();	
			$('#ordenMedRecId').val(0);
           $(".show-print-orden-medica").slideDown();
           }
$('#ordenMediSaveMed').prop("disabled", false);	
},


});
        });
       





$(document).on('click', '.orden-med-update-drug', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url:"<?php echo base_url(); ?>hosp_orden_medica_drugs/fetch_single_drug",  
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




//---------OPERATION TO CANCEL DRUG----------------

 $(document).on('click', '.delete-ord-med-drug', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'drug');
	});	



 $(document).on('click', '.anular-cancel-drug', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'drug');
}) 




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
loadKardexFromOrenMedica();	
}
}); 

//---END OPERATION TO CANCEL DRUG

//---------OPERATION TO CANCEL STUDY----------------



 $(document).on('click', '.delete-ord-med-study', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'study');
	});	



 $(document).on('click', '.anular-cancel-study', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'study');
}) 


 $(document).on('click', '.save-cancel-study', function(event){ 
var reasonToCancelTable=$(this).closest("tr").find(".reasonToCancelTableStudy").val();

if (reasonToCancelTable !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-study").hide();
	 $('.hide-cancel-td-study').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_orden_medica_estudios_hosp';
 var field='canceled'; 
 var value = 1;
 
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value);

}
}); 

//---------OPERATION TO CANCEL LAB----------------

 $(document).on('click', '.delete-ord-med-lab', function(event){ 
	 onclickElimiarBtnTableRegister($(this), 'lab');
	});	
	


 $(document).on('click', '.anular-cancel-lab', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'lab');
}) 

	
	
 $(document).on('click', '.save-cancel-lab', function(event){ 
var reasonToCancelTable=$(this).closest("tr").find(".reasonToCancelTableLab").val();

if (reasonToCancelTable !="")
{ 
  $(this).closest("tr").find(".show-text-area-reason-cancel-lab").hide();
	 $('.hide-cancel-td-lab').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_orden_medcia_lab_hosp';
 var field='canceled'; 
 var value = 1;
 
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value);

}
}); 	
	
//---------OPERATION TO CANCEL MEDIDA GENERALES----------------	

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

 var tableName='hosp_ord_med_gen_hosp';
 var field='canceled'; 
 var value = 1;
 
saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value);

}
}); 	
	
	
	
	
$('#saveOrdenMedEst').on('click', function(){ 
            var ordenMedicaEstEst = $("#ordenMedicaEstEst").val();
            var ordenMedicaEstBodyPart = $("#ordenMedicaEstBodyPart").val();
            var ordenMedicaEstLat = $("#ordenMedicaEstLat").val();
            var ordenMedicaEstNota = $("#ordenMedicaEstNota").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedEstId   = $("#ordenMedEstId").val();
            $('#saveOrdenMedEst').prop("disabled", true);	

     $.ajax({
type: "POST",
url: "<?=base_url('hosp_orden_medica_estudy/save_orden_medica_sutdy')?>",
data: {
    ordenMedicaEstEst:ordenMedicaEstEst, ordenMedicaEstBodyPart:ordenMedicaEstBodyPart,ordenMedicaEstLat:ordenMedicaEstLat,
     ordenMedicaEstNota:ordenMedicaEstNota, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedEstId
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
		   $('#ordenMedEstId').val(0); 
           }
$('#saveOrdenMedEst').prop("disabled", false);	
},
error: function(jqXHR, textStatus, errorThrown) {
          alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
  $("#showerror").html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
  
});
        });
     

    function loadOrdenMedStudy(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>hosp_orden_medica_estudy/studies",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-studies").html(data);

},

});

}


$(document).on('click', '.orden-med-update-study', function(){  
           var id = $(this).attr("id");  
         //alert(id);
           $.ajax({  
                url:"<?php echo base_url(); ?>hosp_orden_medica_estudy/fetch_single_study",  
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
                    
                      
                }, 
		
           })  
      });
 


        $('#saveOrdenMedMg').on('click',  function(){ 
            var ordenMedicaMedGen = $("#ordenMedicaMedGen").val();
            var ordenMedicaMedGenDesc = $("#ordenMedicaMedGenDesc").val();
            var ordenMedicaMedGenLat = $("#ordenMedicaMedGenLat").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedMgId   = $("#ordenMedMgId").val();
            $('#saveOrdenMedMg').prop("disabled", true);	

     $.ajax({
type: "POST",
url: "<?=base_url('hosp_orden_medica_general_measure/save_orden_medica_mg')?>",
data: {
    ordenMedicaMedGen:ordenMedicaMedGen, ordenMedicaMedGenDesc:ordenMedicaMedGenDesc,
    ordenMedicaMedGenLat:ordenMedicaMedGenLat, ordenMedInsertedId:ordenMedInsertedId, id:ordenMedMgId
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_orden_medica_mg"); 
           } else {
            $('.cl-ord-med-mg').val("");
            $(".show-print-orden-medica").slideDown();
			$('#ordenMedMgId').val(0);  
           loadOrdenMedMedGen();
           }
$('#saveOrdenMedMg').prop("disabled", false);	
}

  
});
        });

      

        function loadOrdenMedMedGen(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>hosp_orden_medica_general_measure/medidas_generales",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-mg").html(data);

},

});

}



$(document).on('click', '.orden-med-update-mg', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url:"<?php echo base_url(); ?>hosp_orden_medica_general_measure/fetch_single_mg",  
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







function reloadOrdMegPa(){

$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_orden_medica/pagination",

success: function(data){
$("#pagination-modal_orden_medica").html(data);

},

});

}



// if(orden_medica_data==1){
//     reloadOrdMegPa();  
// }

$(document).on('click', '.loadOrdMedDrug', function(){ 
   
    loadOrdenMedDrug();
});

$(document).on('click', '.loadOrdMedEst', function(){ 
    loadOrdenMedStudy();
});



$(document).on('click', '.loadOrdMedlab', function(){ 
    allLaboratorios();
   
});









$(document).on('click', '.loadOrdMedMg', function(){ 
    loadOrdenMedMedGen();
});


   
function autoCompleteInput(keyword, table, field_name_in_table, input_name, div_result){

if(keyword==""){
	$("#"+div_result).hide();
	$("#suggestion-grup-lab-list-selected").hide();
}else{
	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>auto_complete_input_hosp/autoCompleteInput",
data:{keyword:keyword, table:table, field_name_in_table:field_name_in_table, input_name:input_name, div_result:div_result},

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},
 
});
}	
}


});





 </script>



