
<script>
$('#save_ant_gen').on('click', function(event) {
event.preventDefault();

 var uro_sin_ha_1 = [];
 $("input[name='uro_sin_ha_1']:checked").each(function(){
            uro_sin_ha_1.push(this.value);
 })

var uro_ant_escl = [];
 $("input[name='uro_ant_escl']:checked").each(function(){
            uro_ant_escl.push(this.value);
 })


var uro_ant_imp = [];
 $("input[name='uro_ant_imp']:checked").each(function(){
            uro_ant_imp.push(this.value);
 })

var uro_ant_ane_fal = [];
 $("input[name='uro_ant_ane_fal']:checked").each(function(){
            uro_ant_ane_fal.push(this.value);
 })

var uro_ant_vari = [];
 $("input[name='uro_ant_vari']:checked").each(function(){
            uro_ant_vari.push(this.value);
 })

var uro_ant_fimosis = [];
 $("input[name='uro_ant_fimosis']:checked").each(function(){
            uro_ant_fimosis.push(this.value);
 })
 
 var uro_ant_hid = [];
 $("input[name='uro_ant_hid']:checked").each(function(){
            uro_ant_hid.push(this.value);
 })
 
 var uro_ant_its = $("#uro_ant_its").val();
var uro_ant_tumorales = $("#uro_ant_tumorales").val();
var uro_ant_otros = $("#uro_ant_otros").val();

 var uro_sin_ha_2 = [];
 $("input[name='uro_sin_ha_2']:checked").each(function(){
            uro_sin_ha_2.push(this.value);
 })

 var uro_ant_cancer_prostata = [];
 $("input[name='uro_ant_cancer_prostata']:checked").each(function(){
            uro_ant_cancer_prostata.push(this.value);
 })


 var uro_ant_poli_renal = [];
 $("input[name='uro_ant_poli_renal']:checked").each(function(){
            uro_ant_poli_renal.push(this.value);
 })

 var uro_ant_uroli = [];
 $("input[name='uro_ant_uroli']:checked").each(function(){
            uro_ant_uroli.push(this.value);
 })

 var uro_ant_cist = [];
 $("input[name='uro_ant_cist']:checked").each(function(){
            uro_ant_cist.push(this.value);
 })
 
var uro_ant_otros2 = $("#uro_ant_otros2").val();



//====================Antecedentes alergicos y reaccion a medicamentos=========================================
var alimentos_al = $("#alimentos_al").val();
var medicamentos_al = $("#medicamentos_al").val();
var otros_al = $("#otros_al").val();
//=============================Otros antecedantes========================================
  var quirurgicos = $("#quirurgicos").val();
var gineco = $("#gineco").val();
var abdominal = $("#abdominal").val();
var toracica = $("#toracica").val();
var transfusion = $("#transfusion").val();
var otros1_g = $("#otros1").val();

var grouposang = $("#grouposang").val();
var hepatis = $('input:radio[name=hepatis]:checked').val();
var hpv = $('input:radio[name=hpv]:checked').val();
var toxoide = $('input:radio[name=toxoide]:checked').val();
var tipificacion = $("#tipificacion").val();
var rhoa = $('input:radio[name=rhoa]:checked').val();
//=============Habitos toxicos======================================
var hab_c_caf = $("#hab_c_caf").val();
var hab_f_caf = $("#hab_f_caf").val();
var hab_c_pip = $("#hab_c_pip").val();
var hab_f_pip = $("#hab_f_pip").val();
var hab_c_ciga = $("#hab_c_ciga").val();
var hab_f_ciga = $("#hab_f_ciga").val();
var hab_c_al = $("#hab_c_al").val();
var hab_f_al = $("#hab_f_al").val();
var hab_c_tab = $("#hab_c_tab").val();
var hab_f_tab = $("#hab_f_tab").val();
var hookah = $("#hookah").val();
var hab_f_hookah = $("#hab_f_hookah").val();
var hab_t_drug = $("#hab_t_drug").val();
var hab_c_drug = $("#hab_c_drug").val();
var hab_f_drug = $("#hab_f_drug").val();
var cafe_cant_desc= $("#cafe_cant_desc").val();
var pipa_cant_desc= $("#pipa_cant_desc").val();
var ciga_can_desc= $("#ciga_can_desc").val();
var alc_can_desc= $("#alc_can_desc").val();
var tab_can_desc= $("#tab_can_desc").val();
var hookah_desc= $("#hookah_desc").val();
var hab_c_drug_desc= $("#hab_c_drug_desc").val();

/*enfermedad actual*/
var enf_motivo = $("#enf_motivo").val();

var enf_signopsis = $("#enf_signopsis").val().trim();	
var enf_laboratorios = $("#enf_laboratorios").val().trim();
var enf_estudios = $("#enf_estudios").val().trim();
var ant_fam = $("#ant_fam").val();
var ant_prenatales = $("#ant_prenatales").val();
var factories_ambiente = $("#factories_ambiente").val();
//save conclusion diagnostic
  var plan = $("#plan").val().trim();
 var cied= $("input[name='cied']:checked").val();
var otros_diagnos = $("#otros_diagnos").val().trim();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var user_id  = <?=$user_id?>;
var centro_medico  = <?=$centro_medico?>;
 //------Signos vitales--------------------------
var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla-ef").val();
var pulgada = $("#pulgada-exf").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var glicemia = $("#glicemia").val();
var radio_signo= $("input[name='radio_signo']:checked").val();
//---------examen fisico-------------------
var uro_pene = $("#uro_pene").val();
var uro_testicule = $("#uro_testicule").val();
var uro_epididimos = $("#uro_epididimos").val();
 var uro_tacto_rectal_done = [];
 $("input[name='uro_tacto_rectal_done']:checked").each(function(){
            uro_tacto_rectal_done.push(this.value);
 })

var uro_tato_rec_pros = $("#uro_tato_rec_pros").val();
var uro_geni_mujer = $("#uro_geni_mujer").val();
var uro_vejiga = $("#uro_vejiga").val();
var uro_loins = $("#uro_loins").val();
var uro_otros = $("#uro_otros").val();
 $.ajax({
type: "POST",
url: "<?=base_url('save_urology/saveFields')?>",
data: {
enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,uro_geni_mujer:uro_geni_mujer, 
plan:plan,cied:cied,otros_diagnos:otros_diagnos,uro_pene:uro_pene,uro_testicule:uro_testicule,uro_tato_rec_pros:uro_tato_rec_pros,uro_vejiga:uro_vejiga,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta,pulgada:pulgada, fr:fr, fc:fc, hg:hg,uro_tacto_rectal_done:uro_tacto_rectal_done,uro_loins:uro_loins,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemia:glicemia,uro_epididimos:uro_epididimos,uro_otros:uro_otros,uro_ant_cist:uro_ant_cist,
/*antecedentes*/uro_sin_ha_1:uro_sin_ha_1,uro_ant_escl:uro_ant_escl,uro_ant_imp:uro_ant_imp,uro_ant_ane_fal:uro_ant_ane_fal,uro_ant_vari:uro_ant_vari,uro_ant_otros2:uro_ant_otros2,
uro_ant_fimosis:uro_ant_fimosis, uro_ant_hid:uro_ant_hid,uro_ant_its:uro_ant_its,uro_ant_tumorales:uro_ant_tumorales,uro_ant_otros:uro_ant_otros,
uro_sin_ha_2:uro_sin_ha_2,uro_ant_cancer_prostata:uro_ant_cancer_prostata,uro_ant_poli_renal:uro_ant_poli_renal,uro_ant_uroli:uro_ant_uroli,/*end*/
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,
hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,cafe_cant_desc:cafe_cant_desc, pipa_cant_desc:pipa_cant_desc, ciga_can_desc:ciga_can_desc,
alc_can_desc:alc_can_desc, tab_can_desc:tab_can_desc, hookah_desc:hookah_desc, hab_c_drug_desc:hab_c_drug_desc,
hist_id:hist_id,inserted_by:inserted_by,user_id:user_id,centro_medico:centro_medico
	},
dataType: 'json',
cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  

success:function(response){
pressBtnHist(response);	
	
}  
});


});





</script>