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



  var orden_medica_data=$("#orden_medica_data").val();

$(document).on('click', '#createNewOrdenMedica', function(event){ 

    immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );

  var id_centro   = $("#ordenMedCentroMedId").val();
 var sala = $("#ordenMedicaSala").val();
var fecha = $("#ordenMedicaFecha").val();
var diagnos   = $("#ordenMedicaDiagIng").val();
 var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
$('#createNewOrdenMedica').prop("disabled", true);	
 $.ajax({
type: "POST",
url: "<?=base_url('modal_orden_medica/create_orden_medica')?>",
data: {
    id_centro:id_centro, sala:sala, fecha:fecha, diagnos:diagnos, id:ordenMedInsertedId
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_orden_medica"); 
           } else {
            reloadOrdMegPa();
            $("#ordenMedKeepOn").slideDown();
             $("#ordenMedInsertedId").val(response.message);
             showalert("Guardado", "alert-success", "alert_placeholder_orden_medica"); 
           }
$('#createNewOrdenMedica').prop("disabled", false);	
},

});




});


var keyupTimerCentroMed;
    $("#ordenMedCentroMed").keypress(function () {
		var keyword = $(this).val();
      
            clearTimeout(keyupTimerRepG);
            keyupTimerRepG = setTimeout(function () {
                const fields = {
                    name:'name',
                    id:'id_m_c'
                }
               autoCompleteSelectWithId(keyword, "medical_centers", fields, "ordenMedCentroMed", "ordenMedCentroMedId", "suggestion-medical-centers");
            }, 300);
        });


        var keyupTimerOrdMed;
    $("#ordenMedicaMed").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMed);
            keyupTimerOrdMed = setTimeout(function () {
               autoCompleteInput(keyword, "medicaments", "name", "ordenMedicaMed", "suggestion-drugs-list-ord");
            }, 300);
        });

        var keyupTimerOrdMedPr;
        $("#ordenMedMedPres").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOrdMedPr);
            keyupTimerOrdMedPr = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_medicales", "presentacion", "ordenMedMedPres", "suggestion-pres-list-ord");
            }, 300);
        });



        $('#ordenMediSaveMed').on('click', function(){ 
            var ordenMedicaMed = $("#ordenMedicaMed").val();
            var ordenMedMedPres = $("#ordenMedMedPres").val();
            var ordenMedFre = $("#ordenMedFre").val();
            var ordenMedVia = $("#ordenMedVia").val();
            var ordenMedNota = $("#ordenMedNota").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedRecId   = $("#ordenMedRecId").val();
            $('#ordenMediSaveMed').prop("disabled", true);	
            $.ajax({
type: "POST",
url: "<?=base_url('h_c_orden_medica_drug/save_orden_medica_recetas')?>",
data: {
    ordenMedicaMed:ordenMedicaMed, ordenMedMedPres:ordenMedMedPres,ordenMedNota:ordenMedNota,
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
           $(".show-print-orden-medica").slideDown();
           }
$('#ordenMediSaveMed').prop("disabled", false);	
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
       

   function loadOrdenMedDrug(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>h_c_orden_medica_drug/drugs",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-drugs").html(data);

},

});

}




$(document).on('click', '.orden-med-update-drug', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url:"<?php echo base_url(); ?>h_c_orden_medica_drug/fetch_single_drug",  
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
url:'<?=base_url('h_c_orden_medica_drug/delete_drug')?>',
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


//----------------------------------------------------------------------

var keyupTimerOdMedEst;
    $("#ordenMedicaEstEst").keypress(function () {
        
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedEst);
            keyupTimerOdMedEst = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "estudio", "ordenMedicaEstEst", "suggestion-study-est-om");
            }, 300);
        });
 
        var keyupTimerOdMedBody;
  $("#ordenMedicaEstBodyPart").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimerOdMedBody);
            keyupTimerOdMedBody = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "cuerpo", "ordenMedicaEstBodyPart", "suggestion-study-body-om");
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
url: "<?=base_url('h_c_orden_medica_estudy/save_orden_medica_sutdy')?>",
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
           }
$('#saveOrdenMedEst').prop("disabled", false);	
},

  
});
        });
     

    function loadOrdenMedStudy(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>h_c_orden_medica_estudy/studies",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-studies").html(data);

},

});

}


$(document).on('click', '.orden-med-update-study', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url:"<?php echo base_url(); ?>h_c_orden_medica_estudy/fetch_single_study",  
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
url:'<?=base_url('h_c_orden_medica_estudy/delete_study')?>',
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

var keyupTimerOrMedLab;
    $("#searchLabOrdMedByName").keyup(function () {
		var keyword = $(this).val();
        clearTimeout(keyupTimerOrMedLab);
        var ordenMedId   = $("#ordenMedInsertedId").val();
        keyupTimerOrMedLab = setTimeout(function () {
               autoCompleteInput(keyword, "laboratories", '*', "searchLabOrdMedByName", "suggestion-lab-ordenmed-list");
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
        



        $('#saveOrdenMedMg').on('click',  function(){ 
            var ordenMedicaMedGen = $("#ordenMedicaMedGen").val();
            var ordenMedicaMedGenDesc = $("#ordenMedicaMedGenDesc").val();
            var ordenMedicaMedGenLat = $("#ordenMedicaMedGenLat").val();
            var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
            var ordenMedMgId   = $("#ordenMedMgId").val();
            $('#saveOrdenMedMg').prop("disabled", true);	

     $.ajax({
type: "POST",
url: "<?=base_url('h_c_orden_medica_medidas_generales/save_orden_medica_mg')?>",
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
           loadOrdenMedMedGen();
           }
$('#saveOrdenMedMg').prop("disabled", false);	
},

  
});
        });

      

        function loadOrdenMedMedGen(){
    var ordenMedInsertedId   = $("#ordenMedInsertedId").val();
    
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>h_c_orden_medica_medidas_generales/medidas_generales",
data: {ordenMedInsertedId:ordenMedInsertedId},
success: function(data){
$("#load-ordenmedica-mg").html(data);

},

});

}



$(document).on('click', '.orden-med-update-mg', function(){  
           var id = $(this).attr("id");  
         
           $.ajax({  
                url:"<?php echo base_url(); ?>h_c_orden_medica_medidas_generales/fetch_single_mg",  
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
url:'<?=base_url('h_c_orden_medica_medidas_generales/delete_mg')?>',
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
    allLaboratorios("load-ordenmedica-labs", $("#ordenMedInsertedId").val());
   
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
url:'<?=base_url('H_c_indication_lab/delete_lab_by_id')?>',
data: {id : del_id, table:"orden_medcia_lab"},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
allLaboratorios("load-ordenmedica-labs", $("#ordenMedInsertedId").val());

}
});
}
})






$(document).on('click', '.loadOrdMedMg', function(){ 
    loadOrdenMedMedGen();
});


   



});





 </script>

<?php $this->load->view('clinical-history/reset-form_alert-success');?>
