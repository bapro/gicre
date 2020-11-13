<script>

$(".select-con").select2({
  tags: true
});




$(".show_modif_con_diag").on('click', function (e) {
	$('.show_modif_con_diag').hide();
	$(".save_con_diag_hide").slideDown();
	$(".disable-all textarea").prop("disabled", false);
	$(".disable-all select").prop("disabled", false);
	$(".disable-all input").prop("disabled", false);
	$(".on_input_cied_d").show();
	
}
)



//---------------------save conclusion diagnostic
$('#save_con_diag_hide').on('click', function(event) {
event.preventDefault();
var id_cdia  = $("#id_cdia").val();
var updated_by  = $("#updated_by").val();
 var plan   = $("#plan1").val();
 var proced = $("#proced2").val();

 /* var diagno_def = [];
$("input[name='cied']:checked").each(function(){
diagno_def.push(this.value);
});*/
 //var diagno_def  = $("#diagno_def1").val();
 var evolucion = $("#evolucion1").val();
var conclusion_radio = $('input:radio[name=conclusion_radio1]:checked').val();
 var historial_id = $("#historial_id1").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpConcluciones')?>",
data: {historial_id:historial_id,id_cdia:id_cdia,updated_by:updated_by,plan:plan,proced:proced,evolucion:evolucion,conclusion_radio:conclusion_radio},

success:function(data){
alert("Cambiado ha sido hecho !");

$('.save_con_diag_hide').hide();
$('.show_modif_con_diag').slideDown();
	$(".disable-all textarea").prop("disabled", true);
	$(".disable-all select").prop("disabled", true);
	$(".disable-all input").prop("disabled", true);
	$(".on_input_cied_d").hide();
	$(".on_input_cied_d").val("");
	patientCie10();
	$(".cied_result_d").hide();
}
});
return false;

});

//-----------------------------------------------------------------------------------------------------------



</script>