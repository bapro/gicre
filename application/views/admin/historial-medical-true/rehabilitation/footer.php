<script>

$('#save_rehab_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var id_rehab  = $("#id_rehab").val();

var marcha_inicio   = $("#marcha_inicio1").val();
 var long_mov_der  = $("#long_mov_der1").val();
 var  long_mov_izq  = $("#long_mov_izq1").val();
 var long_simetria = $("#long_simetria1").val();
var long_fluidez   = $("#long_fluidez1").val();
 var long_traject   = $("#long_traject1").val();
 var  long_tronco  = $("#long_tronco1").val();
 var long_postura = $("#long_postura1").val();
 var equi_sentado   = $("#equi_sentado1").val();
 var equi_levantarse  = $("#equi_levantarse1").val();
 var  equi_intentos  = $("#equi_intentos1").val();
 var equi_biped1 = $("#equi_biped11").val();
var equi_biped2   = $("#equi_biped21").val();
 var equi_emp  = $("#equi_emp1").val();
 var equi_ojos  = $("#equi_ojos1").val();
 var equi_vuelta = $("#equi_vuelta1").val();
 var equi_sentarse   = $("#equi_sentarse1").val();
 var eval_balsys  = $("#eval_balsys1").val();
 var  eval_movim   = $("#eval_movim1").val();
 var eval_monop = $("#eval_monop1").val();
var criteria_intens   = $("#criteria_intens1").val();
 var criteria_cuidado1  = $("#criteria_cuidado11").val();
 var levantar_peso  = $("#levantar_peso1").val();
 var criteria_caminar = $("#criteria_caminar1").val();
 var criteria_estar_sent   = $("#criteria_estar_sent1").val();
 var criteria_dormir  = $("#criteria_dormir1").val();
 var criteria_sexual  = $("#criteria_sexual1").val();
 var criteria_vida = $("#criteria_vida1").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveUpRehabilidad')?>",
data: {id_rehab:id_rehab,updated_by:updated_by,marcha_inicio:marcha_inicio,long_mov_der:long_mov_der,long_mov_izq:long_mov_izq,long_simetria:long_simetria,
long_fluidez:long_fluidez,long_traject:long_traject,long_tronco:long_tronco,long_postura:long_postura,
equi_sentado:equi_sentado,equi_levantarse:equi_levantarse,equi_intentos:equi_intentos,equi_biped1:equi_biped1,
equi_biped2:equi_biped2,equi_emp:equi_emp,equi_ojos:equi_ojos,equi_vuelta:equi_vuelta,equi_sentarse:equi_sentarse,
eval_balsys:eval_balsys,eval_movim:eval_movim,eval_monop:eval_monop,criteria_intens:criteria_intens,criteria_cuidado1:criteria_cuidado1,
levantar_peso:levantar_peso,criteria_caminar:criteria_caminar,criteria_estar_sent:criteria_estar_sent,criteria_dormir:criteria_dormir,
criteria_sexual:criteria_sexual,criteria_vida:criteria_vida},

cache: true,
  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_rehab').slideDown();
	$(".save_rehab_hide").hide();
$(".disable-all select").prop("disabled", true);
}  
});
return false;
});




//-----------------------------------------------------------


//$(".hide-ant-save").show();

$(".show_modif_rehab").on('click', function (e) {
	$('.show_modif_rehab').hide();
	$(".save_rehab_hide").slideDown();
	$(".disable-all select").prop("disabled", false);
	
}
)









</script>