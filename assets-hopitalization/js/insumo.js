
//--INSUMO------------
 $( '#emer-nursing1' ).select2( {
			theme: 'bootstrap-5',
			width: '100%',
			tags:true
			} );

var table_insumo=$('#table_insumo').val();
var table_insumo_link=$('#table_insumo_link').val();
 var id_hospit=$('#id_hospit').val();
  var id_patIns=$('#id_patient_hist').val();
   var id_centIns=$('#id_centro_to_save').val();
 

 
 $(document).on('click', '#guardar-insumo', function(event) {
		 event.preventDefault();
	$('#guardar-insumo').hide();
	$("#save-value").val(1);
	$.ajax({
url:base_url+"emergency/saveInsumoSaved",
data: {table_insumo:table_insumo,table_insumo_link:table_insumo_link},
method:"POST",
success:function(data){
loadInsumo($('#table_insumo').val(),$('#table_insumo_link').val(), $('#id_patient_hist').val(), $('#id_centro_to_save').val());
loadInsumoSaved($('#table_insumo').val(),$('#table_insumo_link').val(), $('#id_patient_hist').val(), $('#id_centro_to_save').val());
},
});
});
 
 
 
	$(document).on('click', '#pass-insumo-right', function(event) {
		 event.preventDefault();
if($('#emer-nursing1').val() !="" && $('#cantidad_insumo').val() !="" ){
$('#pass-insumo-right').prop('disabled',true);
$("#save-value").val(0);
	
$.ajax({

url:base_url+"emergency/saveInsumo",
data: {insumo:$('#emer-nursing1').val(),
cantidad_insumo:$('#cantidad_insumo').val(),
table_insumo:$('#table_insumo').val(),
id_hospit:$('#id_hospit').val(), id_patient:$('#id_patient_hist').val(),
 centro:$('#id_centro_to_save').val()
 },
method:"POST",
success:function(data){
$("#emer-nursing1.select2").val('').trigger('change');
$("#guardar-insumo").show();
loadInsumo($('#table_insumo').val(),$('#table_insumo_link').val(),$('#id_patient_hist').val(), $('#id_centro_to_save').val());
$('#pass-insumo-right').prop('disabled',false);	
$('#cantidad_insumo').val("");
$('#emer-nursing1').val("").trigger('change');
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos-Saved').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}else{
	Swal.fire({
        title: 'Insumo y cantidad son requeridos',
        icon: 'error',
      })
}
});




function loadInsumo(table_insumo,table_insumo_link, id_patIns, id_centIns,showinsumoedit='none'){

$.ajax({
url:base_url+"emergency/loadInsumo",
data: {saved:0,
showinsumoedit:showinsumoedit,
table_insumo:table_insumo,
table_insumo_link:table_insumo_link,
 id_patient:id_patIns,
 id_centro: id_centIns
 },
method:"POST",
success:function(data){
$("#load-Insumos").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
}
	
	

function loadInsumoSaved(table_insumo,table_insumo_link, id_patIns, id_centIns,showinsumoedit=''){
$.ajax({
url:base_url+"emergency/loadInsumo",
data: {saved:1,showinsumoedit:showinsumoedit,table_insumo:table_insumo,table_insumo_link:table_insumo_link, id_patient:id_patIns, id_centro: id_centIns},
method:"POST",
success:function(data){
$("#load-Insumos-Saved").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-Insumos-Saved').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}


var storeCheckedInsumoArray = new Array();

$(document).on('click', '#copy-all-insumo', function(event) {

if (this.checked) {
$(".copy-one-insumo").prop('checked', true);
 $("#tab-insumo").find('div.id_insumo').each(function(){
storeCheckedInsumoArray.push($(this).text());
 $("#saveCheckBoxIdInsumo").val(storeCheckedInsumoArray);
});

}
else{
$(".copy-one-insumo").prop('checked', false);
 $("#saveCheckBoxIdInsumo").val("");
 storeCheckedInsumoArray=[];
}
checkIfPrintInsumo();
})



$(document).on('click','.copy-one-insumo',function(event){
	$("#copy-all-insumo").prop('checked', false);
        var s = $(this).val();
        	if($(this).is(':checked',true)) {
            storeCheckedInsumoArray.push(s);
		 } else {
            var index = storeCheckedInsumoArray.indexOf(s);
            if (index > -1) {
                storeCheckedInsumoArray.splice(index, 1);
            }
        }
        $("#saveCheckBoxIdInsumo").val(storeCheckedInsumoArray);
		
		checkIfPrintInsumo();
    })
function checkIfPrintInsumo(){
	
if( $("#saveCheckBoxIdInsumo").val() !=""){
 $("#btnPrintInumsoMed").show();
}else{
 $("#btnPrintInumsoMed").hide();
}	
}



$(document).on('click','#btnPrintInumsoMed',function(event){

var id_print = [];
	 $('.copy-one-insumo').each(function(){  
                if($(this).is(":checked"))  
                {  
                     id_print.push($(this).val());  
                }  
           });		
var page_print = $(".insumo-print-page").val();
$.ajax({
type: "POST",
url:base_url+"emergency/savePrintInsumo",
data:{id_print:id_print, tablePrint:"hosp_insumo_print"},
 success:function(data){ 
window.open(base_url + page_print+'/printInsumo', '_blank', 'noopener, noreferrer');

},

});

});