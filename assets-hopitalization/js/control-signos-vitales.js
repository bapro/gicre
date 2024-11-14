$(document).on('click', ".delete-control-signo-vitale", function(event){
event.preventDefault();
if (confirm("Lo quieres borrar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:base_url+"hosp_control_signos_vitales/deleteControSigVital",
data: {id : del_id},
success:function(data) {
$('#total-signos-vital').text(data);
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
 
}
});
}
});

$(document).on('click',".edit-control-signo-vitale",function(event){
event.preventDefault();
var del_id = $(this).attr('id');
//$("#contSigVitalForm").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
   $('#contSigVitalForm').css("opacity",".3");
$.ajax({
type:'POST',
url:base_url+"hosp_control_signos_vitales/contSigVitalForm",
data: {id : del_id},
success:function(data) {
$("#contSigVitalForm").html(data);
 $('#contSigVitalForm').css("opacity","");
 $('#isCsVempty').val(11);
}
})
});





//--CONTROL SIGNOS VITALES--------
	$(document).on('change', "#form-sig-vita", function(event) {
		var txtinputcs= $("input.clear-cs").filter(function(){ return $(this).val(); }).length;
$('#isCsVempty').val(txtinputcs);
		});
		
		

	$('#csv-add-btn').on('click', function(event) {
event.preventDefault();
if($('#isCsVempty').val()==1 || $('#isCsVempty').val()==0  || $('#mirror_field_cont_sig').val()==''){
	  Swal.fire({
        title: 'No ha entrado suficiente datos para grabar.',
        icon: 'error',
      })
}else{
$(".saveResult").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: base_url+"hosp_control_signos_vitales/saveControlSignosVitales",
data:{csv_sat:$('#csv_sat').val(),csv_ta1:$('#csv_ta1').val(),csv_ta2:$('#csv_ta2').val(),csv_fc:$('#csv_fc').val(),csv_fr:$('#csv_fr').val(),csv_glicemia:$('#csv_glicemia').val(),
csv_pulso:$('#csv_pulso').val(),csv_temperatura:$('#csv_temperatura').val(),csv_diuresis:$('#csv_diuresis').val(),csv_dep:$('#csv_dep').val(),time:$('#mirror_field_cont_sig').val(),id:$('#id_sig_vit').val()},
success:function(data){ 
 result=$(".saveResult").html(data);
 if(result !=0){
 $(".saveResult").html('Hecho.').css('color','green').delay( 1000 ).hide(0);
 $(".saveResult1").html('');
 $(".check-input-csv").val('');
  $('#isCsVempty').val(1);
 contSigVital();
} else{
$(".saveResult").html('Error.').css('color','red').delay( 1000 ).hide(0);		
}
} 
});
	}
});




var storeCheckedArrayCsv = new Array();
$(document).on('click', '#copy-all-csv', function(event) {

if (this.checked) {
$(".copy-one-csv").prop('checked', true);
 $("#csc-table").find('td.id_csv').each(function(){
storeCheckedArrayCsv.push($(this).text());
 $("#saveCheckBoxIdCsv").val(storeCheckedArrayCsv);
});

}
else{
$(".copy-one-csv").prop('checked', false);
 $("#saveCheckBoxIdCsv").val("");
 storeCheckedArrayCsv=[];
}
checkIfPrintKardexCsv();
})



$(document).on('click','.copy-one-csv',function(event){
	$("#copy-all-csv").prop('checked', false);
        var s = $(this).val();
        	if($(this).is(':checked',true)) {
            storeCheckedArrayCsv.push(s);
		 } else {
            var index = storeCheckedArrayCsv.indexOf(s);
            if (index > -1) {
                storeCheckedArrayCsv.splice(index, 1);
            }
        }
        $("#saveCheckBoxIdCsv").val(storeCheckedArrayCsv);
		
		checkIfPrintKardexCsv();
    })
function checkIfPrintKardexCsv(){
	
if( $("#saveCheckBoxIdCsv").val() !=""){
 $(".show-kardex-print-csv").show();
}else{
 $(".show-kardex-print-csv").hide();
}	
}

$(document).on('click','#btnPrintCsv',function(event){

var id_print = [];
	 $('.copy-one-csv').each(function(){  
                if($(this).is(":checked"))  
                {  
                     id_print.push($(this).val());  
                }  
           });		

$.ajax({
type: "POST",
url:base_url+"hosp_control_signos_vitales/savePrintCsv",
data:{id_print:id_print},
 success:function(data){ 
window.open(base_url +'print_page_hospitalization/contro_signos_vitales', '_blank', 'noopener, noreferrer');

},

});

});