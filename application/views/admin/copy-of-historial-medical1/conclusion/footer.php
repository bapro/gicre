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
	(".delete-cied").show();
	(".otros-diagnos1").show();
}
)



//---------------------save conclusion diagnostic
$('#save_con_diag_hide').on('click', function(event) {
event.preventDefault();
var id_cdia  = $("#id_cdia").val();
var updated_by  = $("#updated_by").val();
 var plan   = $("#plan1").val();
var otros_diagnos1 = $("#otros_diagnos1").val();
 var proced = $("#proced2").val();
var count_patient_c="<?=$count_patient_c;?>";
var cied1 = [];
$.each($("input[name='cied']:checked"), function(){            
cied1.push($(this).val());
;
});
 var evolucion = $("#evolucion1").val();
var conclusion_radio = $('input:radio[name=conclusion_radio1]:checked').val();
 var centro_idd = "<?=$centro_medico?>";
 var user_idd = "<?=$user_id?>";
var pat_idd= "<?=$historial_id?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpConcluciones')?>",
data: {pat_id:pat_idd,user_id:user_idd,centro_medico:centro_idd,id_cdia:id_cdia,updated_by:updated_by,plan:plan,proced:proced,evolucion:evolucion,conclusion_radio:conclusion_radio,cied1:cied1,otros_diagnos:otros_diagnos1},

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
	//if(count_patient_c==1){$(".delete-cied").hide();}else{$(".delete-cied").show();}
}
});
return false;

});

//-----------------------------------------------------------------------------------------------------------



</script>