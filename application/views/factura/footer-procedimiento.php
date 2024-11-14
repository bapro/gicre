<script>

	
//paginationProcedFacData($("#doctor_id").val());
function paginationProcedFacData(id_doc){

$('#load-procedimientos-tarif').html('Agregando...');
$.ajax({
url:"<?php echo base_url(); ?>factura/paginationProcedFacData__",
//data: {user_id:<?=$user_id?>,patient:<?=$patient?>,id_doc:id_doc},
data: {patient:<?=$patient?>,id_doc:id_doc,user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$('#paginationProcedFacData').html(data);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginationProcedFacData').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}



//loadLastProced($("#doctor_id").val());
function loadLastProced(idDoc){
	
$("#loadContentOrdMed").show();
$("#loadContentOrdMed").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');

$.ajax({
url:"<?php echo base_url(); ?>factura/paginationProcedFacDataDefault",
//data: {user_id:<?=$user_id?>,patient:<?=$patient?>,id_doc:idDoc},
data: {patient:<?=$patient?>,id_doc:idDoc,user_id:<?=$user_id?>},
method:"GET",
success:function(data){
$('#loadContentOrdMed').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#loadContentOrdMed').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});


}



function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };







  $('#tarif-proced').select2({ 
  placeholder: "SELECCIONAR",
    tags: true
 
});

  $('#centro_medico_fac').select2({ 
  placeholder: "SELECCIONAR",

});

  $('#doctor_id').select2({ 
  placeholder: "SELECCIONAR",

});

$("#tarif-proced").on("change",function() {
	$.ajax({
url:"<?php echo base_url(); ?>factura/getProcedMonto",
data: {id:$(this).val()},
method:"POST",
success:function(data){
$("#precio").val(data);
savePresupuesto();
},

});
});


var timer = null;
$("#precio").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(savePresupuesto, 1000)
});


function savePresupuesto(){

var centro=$("#centro_medico_fac").val();
var proced = $("#tarif-proced").val();
var precio = $("#precio").val();
var conc= $("#conclusion_diag").val();
 var autoNomber= $("#autoNomber").val();  
if(centro !='' && proced !='' && precio !='' && conc !=''){
	$('#saveBtnNew').prop("disabled",true);
$.ajax({
type:'POST',
url: "<?=base_url('factura/saveNewTarifMedico')?>",
data:{proced:proced,precio:precio,patient:<?=$patient?>,user_id:<?=$user_id?>,id_doc:$("#doc_id").val(),conc:conc,centro:centro,autoNomber:autoNomber},
cache: true,
success:function(data){
loadLastProced($("#doc_id").val());
paginationProcedFacData($("#doc_id").val());
$('#tarif-proced').val(null).trigger('change');
$("#precio").val("");
},

});
}
}



$("#conclusion_diag").on("keyup",function() {
	if($('#conclusion_diag').val()==''){
		$('#tarif-proced').prop("disabled",true);
	}else{
		$('#tarif-proced').prop("disabled",false);
	}
});

 


</script>