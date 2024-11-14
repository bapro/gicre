var storeCheckedArray = new Array();
$(document).on('click', '#copy-all', function(event) {


if (this.checked) {
$(".copy-one").prop('checked', true);
 $("#new-kardex-table").find('td.id_kardex').each(function(){
storeCheckedArray.push($(this).text());
 $("#saveCheckBoxId").val(storeCheckedArray);
});

}
else{
$(".copy-one").prop('checked', false);
 $("#saveCheckBoxId").val("");
 storeCheckedArray=[];
}
checkIfPrintKardex();
})



$(document).on('click','.copy-one',function(event){
	$("#copy-all").prop('checked', false);
        var s = $(this).val();
        	if($(this).is(':checked',true)) {
            storeCheckedArray.push(s);
		 } else {
            var index = storeCheckedArray.indexOf(s);
            if (index > -1) {
                storeCheckedArray.splice(index, 1);
            }
        }
        $("#saveCheckBoxId").val(storeCheckedArray);
		
		checkIfPrintKardex();
    })
function checkIfPrintKardex(){
	
if( $("#saveCheckBoxId").val() !=""){
 $(".show-kardex-print").show();
}else{
 $(".show-kardex-print").hide();
}	
}


$(document).on('click','#v-pills-kardex-tab',function(event){
	
	event.preventDefault();
	loadKardexFromOrenMedica();	
kardex_list();
	devolucionMedicamentos(0,2);
	});
	
	
	

$(document).on('click','#btnPrintKardexMed',function(event){

var id_print = [];
	 $('.copy-one').each(function(){  
                if($(this).is(":checked"))  
                {  
                     id_print.push($(this).val());  
                }  
           });		

$.ajax({
type: "POST",
url:base_url+"hosp_kardex/savePrintKardex",
data:{id_print:id_print},
 success:function(data){ 
window.open(base_url +'print_page_hospitalization/printKardex', '_blank', 'noopener, noreferrer');

},

});

});



if($("#user_perfil").val()=="Enfermera"){

setInterval(function(){
	$("#kardex-undone").load(base_url+"hosp_kardex/kardex_undone_notification");
},5000);

}




function loadKardexFromOrenMedica(){	
	
$.ajax({
type:'POST',
url:base_url+"hosp_kardex/listadoMedKardex",
data: {},
success:function(data) {
$('#loadKardexFromOrenMedica').html(data);
},
 
});	
}



	$(document).on('click', '.copy-a-kadez-record', function(event) {
event.preventDefault();
//$('.kardex-orden-medica').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
		$(".copy-a-kadez-record").prop("disabled", true);
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	$("#kardex-add-med").prop("disabled", false);
	});
	
	var id_i_m =$(this).closest('tr').find('td.id_i_m').text();
	var id_med_al =$(this).closest('tr').find('td.id_med_al').text();
	var medica =$(this).closest('tr').find('td.medica-kardex').text();
	var frecuencia =$(this).closest('tr').find('td.frecuencia').text();
	var cantidad =$(this).closest('tr').find('td.cantidad').text();
	var via =$(this).closest('tr').find('td.via').text();
	var dosis =$(this).closest('tr').find('td.dosis').text();
	var fecha =$(this).closest('tr').find('td.medfecha').text();
	$("#kardex-id_i_m").val(id_i_m);
	$("#kardex-num").html('# '+id_i_m);
	$("#liquido-ev").val(medica);
	$("#kardex-cantidad").val(cantidad);
	$("#kardex-frecuencia").val(frecuencia);
	$("#kardex-via").val(via);
	$("#kardex-dosis").val(dosis);
	$("#id_med_al").val(id_med_al);
	$(".disabled-btn-kardex").prop('disabled',false);
	$("#devolucion-btn").prop('disabled',false);
	//devolucionMedicamentos(id_i_m);
	}
})

	$(document).on('click', '#cancel-selected-kardex', function(event) {
event.preventDefault();
$(".kardex-remove").val('');
loadKardexFromOrenMedica();	
})





$(document).on('click', '#kardex-add-med', function(event) {
event.preventDefault();
if($("#kardex-hora").val()==""){
 Swal.fire({
icon: 'warning',
html: 'Cual es la fecha y hora realizada?',
});
}else if($("#kardex-turno").val()==""){
 Swal.fire({
icon: 'warning',
text: 'Cual es el turno?',
});	
}else{
$.ajax({
url:base_url+"hosp_kardex/addNewKardex",
data: {new_cant:$("#kardex-cantidad").val(),id:$("#kardex-id_i_m").val(),
turno:$("#kardex-turno").val(),fecha:$("#kardex-hora").val(),dosis:$("#kardex-dosis").val()
},
method:"POST",
success:function(data){
$("#kardex-add-med").prop("disabled", true);
$('.kardex-remove').val('');
$('.check-input-csv').val('');
$('#kardex-new-med').html(data);
	$(".disabled-btn-kardex").prop('disabled',true);
	$(".copy-a-kadez-record").prop("disabled", false);
kardex_list();	
},
	
});
}
});




function kardex_list(){	
	
$.ajax({
type:'POST',
url:base_url+"hosp_kardex/kardex_list",
data: {},
success:function(data) {
$('#kardex-list').html(data);
},
 
});	
}
 $(document).on('click', '.cancelar-kardex', function(event){ 	
onclickElimiarBtnTableRegister($(this), 'kardex');

	});	
	
 $(document).on('click', '.anular-cancel-kardex', function(event){ 	
onclickNotElimiarBtnTableRegister($(this), 'kardex');
}) 


 $(document).on('click', '.save-cancel-kardex', function(event){ 

 var reasonToCancelRegisterTableKardex=$(this).closest("tr").find(".reasonToCancelRegisterTableKardex").val();

if (reasonToCancelRegisterTableKardex !="")
{ 
$(this).closest("tr").find(".show-text-area-reason-cancel-kardex").hide();
	 $('.hide-cancel-td-kardex').show();
var el = this;
var del_id = $(this).attr('id');

 var tableName='hosp_orden_medica_recetas';
 var field = 'kardex';
  var value = 0;
saveReasonToCancelTable(el, del_id, reasonToCancelRegisterTableKardex, tableName, field, value);
loadKardexFromOrenMedica();	
}
}) 


$(document).on('click', '.return-kardex', function(event){ 	
  //hide edit button
  $(this).closest("tr").find(".editSpanKardex").hide();

        //show edit input
        $(this).closest("tr").find(".editInputKardex").show();
		 $(this).closest("tr").find(".cancel-kardex").show();

    });	
	
$(document).on('click', '.cancel-kardex', function(event){ 		

         //hide edit button
        $(this).closest("tr").find(".return-kardex").show();

          $(this).closest("tr").find(".editSpanKardex").show();

        //show edit input
        $(this).closest("tr").find(".editInputKardex").hide();
		 $(this).closest("tr").find(".cancel-kardex").hide();

    });
	
	

	
	function devolucionMedicamentos(id,where){
	
$.ajax({
url:base_url+"hosp_kardex/devolucionMedicamentos",
data: {id:id,where:where},
method:"POST",
success:function(data){
$('.devolucion-list-pat').html(data);

},

});

}
	
	
	
	
	
	
	
	
	$(document).on('click', '.saveReturnKardex', function(event){ 
var ID = $(this).closest("tr").attr('id');
var cant = parseFloat($(this).closest("tr").find(".edit-cant-k").val());
 var cantInit=parseFloat($(this).closest("tr").find(".editSpanKardex").text());

 if(cant > cantInit){
	  Swal.fire({
icon: 'warning',
html: "No puede devolucionar mas que la cantidad inicial: "+ cantInit,
});
	return false; 
 }
   if(cant !=""){
  $(this).closest("tr").find(".editBtnKardex").show();
$(this).hide();
 $(this).closest("tr").find(".return-kardex").show();

   $(this).closest("tr").find(".editInputKardex").hide();
   	  $(this).closest("tr").find(".editSpanKardex").show();
$(this).closest("tr").find(".cancel-kardex").hide();
//---------------------------------------------------------------------------------
//--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".editSpanKardex").text(cantInit - cant);

//------------------------------------------------------------------------------------
$.ajax({
url:base_url+"hosp_kardex/devolucionAlmacenMed",
data: {id_i_m: ID, dev: cant, cantInit: cantInit},
method:"POST",
success:function(data){

devolucionMedicamentos(0,2);
},

});
   }
});