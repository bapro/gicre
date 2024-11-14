<script>
$('#save_exam_sis_hide').on('click', function(event) {
event.preventDefault();
var id_exs  = $("#id_exs").val();
var updated_by  = $("#updated_by").val();

var sisneuro  = $("#sisneuros").val();
var neurologico  = $("#neurologicos").val();
var siscardio  = $("#siscardios").val();
var cardiova  = $("#cardiovas").val();
var sist_uro  = $("#sist_uros").val();
var urogenital  = $("#urogenitals").val();
var sis_mu_e  = $("#sis_mu_es").val();
var musculoes  = $("#musculoess").val();
var sist_resp  = $("#sist_resps").val();
var nervioso = $("#nerviosos").val();
var linfatico = $("#linfaticos").val();
var digestivo = $("#digestivos").val();
var respiratorio = $("#respiratorios").val();
var genitourinario = $("#genitourinarios").val();
var sist_diges = $("#sist_digess").val();
var sist_endo = $("#sist_endos").val();
var endocrino = $("#endocrinos").val();
var sist_rela = $("#sist_relas").val();
var otros_ex_sis = $("#otros_ex_siss").val();
var dorsales = $("#dorsaless").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpExamSis')?>",
data: {id_exs:id_exs,updated_by:updated_by,
sisneuro:sisneuro,neurologico:neurologico,siscardio:siscardio,cardiova:cardiova,
sist_uro:sist_uro,urogenital:urogenital,sis_mu_e:sis_mu_e,musculoes:musculoes,
sist_resp:sist_resp,nervioso:nervioso,linfatico:linfatico,digestivo:digestivo,
respiratorio:respiratorio,genitourinario:genitourinario,sist_diges:sist_diges,
sist_endo:sist_endo,endocrino:endocrino,sist_rela:sist_rela,otros_ex_sis:otros_ex_sis,
dorsales:dorsales},
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_exam_sis').slideDown();
	$(".save_exam_sis_hide").hide();
$(".disable-all textarea").prop("disabled", true);
$(".disable-all  select").prop("disabled", true);
}  
});
return false;
});




//---------------------------
$(".select-examsis").select2({
  tags: true
});

//------------------------------------------------------

$(".disable-all textarea").prop("disabled", true);
$(".disable-all  select").prop("disabled", true);



$(".show_modif_exam_sis").on('click', function (e) {
	$('.show_modif_exam_sis').hide();
	$(".save_exam_sis_hide").slideDown();
	$(".disable-all textarea").prop("disabled", false);
	$(".disable-all select").prop("disabled", false);
	
}
)


</script>