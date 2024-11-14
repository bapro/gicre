
<script>
$('#save_ant_gen').on('click', function(event) {
event.preventDefault();
/*enfermedad actual*/
var enf_motivo = $("#enf_motivo").val().trim();
var enf_signopsis = $("#enf_signopsis").val().trim();	
var enf_laboratorios = $("#enf_laboratorios").val();
var enf_estudios = $("#enf_estudios").val();
var ant_fam = $("#ant_fam").val();
var ant_prenatales = $("#ant_prenatales").val();
var factories_ambiente = $("#factories_ambiente").val();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var user_id  = <?=$user_id?>;
var centro_medico  = <?=$centro_medico?>;
	
//save conclusion diagnostic
  var plan = $("#plan").val().trim();
 var cied= $("input[name='cied']:checked").val();
var otros_diagnos = $("#otros_diagnos").val().trim();
//antecedente generales
var todo_check = [];
 $("input[name='todo']:checked").each(function(){
            todo_check.push(this.value);
 });
 
 var car_nin_check = [];
 $("input[name='car_nin']:checked").each(function(){
            car_nin_check.push(this.value);
 });
var madre_check = [];
 $("input[name='car_m']:checked").each(function(){
            madre_check.push(this.value);
 });
		
var padre_check = [];
 $("input[name='car_p']:checked").each(function(){
            padre_check.push(this.value);
 });
 
var car_h_check = [];
 $("input[name='car_h']:checked").each(function(){
            car_h_check.push(this.value);
 });
 
 var car_pe_check = [];
 $("input[name='car_pe']:checked").each(function(){
            car_pe_check.push(this.value);
 });
 
 var car_text = $("#car_text").val();
 //===============================Hipertension==================
  var nin_check2 = [];
 $("input[name='hip_nin']:checked").each(function(){
            nin_check2.push(this.value);
 });
var madre_check2 = [];
 $("input[name='hip_m']:checked").each(function(){
            madre_check2.push(this.value);
 });
		
var padre_check2 = [];
 $("input[name='hip_p']:checked").each(function(){
            padre_check2.push(this.value);
 });
 
var h_check2 = [];
 $("input[name='hip_h']:checked").each(function(){
            h_check2.push(this.value);
 });
 
 var pe_check2 = [];
 $("input[name='hip_pe']:checked").each(function(){
            pe_check2.push(this.value);
 });
 
 var hip_text = $("#hip_text").val();
 
  //===============================Enf. Cerebrovascular==================
  
    var nin_check3 = [];
 $("input[name='ec_nin']:checked").each(function(){
            nin_check3.push(this.value);
 });
var madre_check3 = [];
 $("input[name='ec_m']:checked").each(function(){
            madre_check3.push(this.value);
 });
		
var padre_check3 = [];
 $("input[name='ec_p']:checked").each(function(){
            padre_check3.push(this.value);
 });
 
var h_check3 = [];
 $("input[name='ec_h']:checked").each(function(){
            h_check3.push(this.value);
 });
 
 var pe_check3 = [];
 $("input[name='ec_pe']:checked").each(function(){
            pe_check3.push(this.value);
 });
 
 var ec_text = $("#ec_text").val();
 
 
//============Epilepsie=============================
var nin_check4 = [];
$("input[name='ep_nin']:checked").each(function(){
nin_check4.push(this.value);
});
var madre_check4 = [];
$("input[name='ep_m']:checked").each(function(){
madre_check4.push(this.value);
});

var padre_check4 = [];
$("input[name='ep_p']:checked").each(function(){
padre_check4.push(this.value);
});

var h_check4 = [];
$("input[name='ep_h']:checked").each(function(){
h_check4.push(this.value);
});

var pe_check4 = [];
$("input[name='ep_pe']:checked").each(function(){
pe_check4.push(this.value);
});

var ep_text = $("#ep_text").val();
 //===============================Asma Bronquial==================
  
var nin_check5 = [];
$("input[name='as_nin']:checked").each(function(){
nin_check5.push(this.value);
});
var madre_check5 = [];
$("input[name='as_m']:checked").each(function(){
madre_check5.push(this.value);
});

var padre_check5 = [];
$("input[name='as_p']:checked").each(function(){
padre_check5.push(this.value);
});

var h_check5 = [];
$("input[name='as_h']:checked").each(function(){
h_check5.push(this.value);
});

var pe_check5 = [];
$("input[name='as_pe']:checked").each(function(){
pe_check5.push(this.value);
});

var as_text = $("#as_text").val();




 //===============================Enf. Repiratoria==================
  
var nin_check05 = []; 
$("input[name='enre_nin']:checked").each(function(){
nin_check05.push(this.value);
});
var madre_check05 = [];
$("input[name='enre_m']:checked").each(function(){
madre_check05.push(this.value);
});

var padre_check05 = [];
$("input[name='enre_p']:checked").each(function(){
padre_check05.push(this.value);
});

var h_check05 = [];
$("input[name='enre_h']:checked").each(function(){
h_check05.push(this.value);
});

var pe_check05 = [];
$("input[name='enre_pe']:checked").each(function(){
pe_check05.push(this.value);
});

var enre_text = $("#enre_text").val();



 //===============================Tuberculosis==================
  
var nin_check6 = [];
$("input[name='tub_nin']:checked").each(function(){
nin_check6.push(this.value);
});
var madre_check6 = [];
$("input[name='tub_m']:checked").each(function(){
madre_check6.push(this.value);
});

var padre_check6 = [];
$("input[name='tub_p']:checked").each(function(){
padre_check6.push(this.value);
});

var h_check6 = [];
$("input[name='tub_h']:checked").each(function(){
h_check6.push(this.value);
});

var pe_check6 = [];
$("input[name='tub_pe']:checked").each(function(){
pe_check6.push(this.value);
});

var tub_text = $("#tub_text").val();

 //===============================Diabetes==================
  
var nin_check7 = [];
$("input[name='dia_nin']:checked").each(function(){
nin_check7.push(this.value);
});
var madre_check7 = [];
$("input[name='dia_m']:checked").each(function(){
madre_check7.push(this.value);
});

var padre_check7 = [];
$("input[name='dia_p']:checked").each(function(){
padre_check7.push(this.value);
});

var h_check7 = [];
$("input[name='dia_h']:checked").each(function(){
h_check7.push(this.value);
});

var pe_check7 = [];
$("input[name='dia_pe']:checked").each(function(){
pe_check7.push(this.value);
});

var dia_text = $("#dia_text").val();
 //===============================Tiroides==================
  
var nin_check8 = [];
$("input[name='tir_nin']:checked").each(function(){
nin_check8.push(this.value);
});
var madre_check8 = [];
$("input[name='tir_m']:checked").each(function(){
madre_check8.push(this.value);
});

var padre_check8 = [];
$("input[name='tir_p']:checked").each(function(){
padre_check8.push(this.value);
});

var h_check8 = [];
$("input[name='tir_h']:checked").each(function(){
h_check8.push(this.value);
});

var pe_check8 = [];
$("input[name='tir_pe']:checked").each(function(){
pe_check8.push(this.value);
});

var tir_text = $("#tir_text").val();
 //===============================Hepatitis==================
  var hep_tipo = $("#hep_tipo").val();
var nin_check9 = [];
$("input[name='hep_nin']:checked").each(function(){
nin_check9.push(this.value);
});
var madre_check9 = [];
$("input[name='hep_m']:checked").each(function(){
madre_check9.push(this.value);
});

var padre_check9 = [];
$("input[name='hep_p']:checked").each(function(){
padre_check9.push(this.value);
});

var h_check9 = [];
$("input[name='hep_h']:checked").each(function(){
h_check9.push(this.value);
});

var pe_check9 = [];
$("input[name='hep_pe']:checked").each(function(){
pe_check9.push(this.value);
});

var hep_text = $("#hep_text").val();
 //===============================Enfermedades Renales==================
var nin_check10 = [];
$("input[name='enfr_nin']:checked").each(function(){
nin_check10.push(this.value);
});
var madre_check10 = [];
$("input[name='enfr_m']:checked").each(function(){
madre_check10.push(this.value);
});

var padre_check10 = [];
$("input[name='enfr_p']:checked").each(function(){
padre_check10.push(this.value);
});

var h_check10 = [];
$("input[name='enfr_h']:checked").each(function(){
h_check10.push(this.value);
});

var pe_check10 = [];
$("input[name='enfr_pe']:checked").each(function(){
pe_check10.push(this.value);
});

var enfr_text = $("#enfr_text").val();
 //===============================Falcemia==================
var nin_check11 = [];
$("input[name='falc_nin']:checked").each(function(){
nin_check11.push(this.value);
});
var madre_check11 = [];
$("input[name='falc_m']:checked").each(function(){
madre_check11.push(this.value);
});

var padre_check11 = [];
$("input[name='falc_p']:checked").each(function(){
padre_check11.push(this.value);
});

var h_check11 = [];
$("input[name='falc_h']:checked").each(function(){
h_check11.push(this.value);
});

var pe_check11 = [];
$("input[name='falc_pe']:checked").each(function(){
pe_check11.push(this.value);
});
var falc_text = $("#falc_text").val();
 //===============================Neoplasias==================
var neop_check12 = [];
$("input[name='neop_nin']:checked").each(function(){
neop_check12.push(this.value);
});
var madre_check12 = [];
$("input[name='neop_m']:checked").each(function(){
madre_check12.push(this.value);
});

var padre_check12 = [];
$("input[name='neop_p']:checked").each(function(){
padre_check12.push(this.value);
});

var h_check12 = [];
$("input[name='neop_h']:checked").each(function(){
h_check12.push(this.value);
});

var pe_check12 = [];
$("input[name='neop_pe']:checked").each(function(){
pe_check12.push(this.value);
});

var neop_text = $("#neop_text").val();
 //===============================ENf. Psiquiatricas==================
var psi_check13 = [];
$("input[name='psi_nin']:checked").each(function(){
psi_check13.push(this.value);
});
var madre_check13 = [];
$("input[name='psi_m']:checked").each(function(){
madre_check13.push(this.value);
});

var padre_check13 = [];
$("input[name='psi_p']:checked").each(function(){
padre_check13.push(this.value);
});

var h_check13 = [];
$("input[name='psi_h']:checked").each(function(){
h_check13.push(this.value);
});

var pe_check13 = [];
$("input[name='psi_pe']:checked").each(function(){
pe_check13.push(this.value);
});

var psi_text = $("#psi_text").val();
 //===============================Obesidad==================
var obs_check14 = [];
$("input[name='obs_nin']:checked").each(function(){
obs_check14.push(this.value);
});
var madre_check14 = [];
$("input[name='obs_m']:checked").each(function(){
madre_check14.push(this.value);
});

var padre_check14 = [];
$("input[name='obs_p']:checked").each(function(){
padre_check14.push(this.value);
});

var h_check14 = [];
$("input[name='obs_h']:checked").each(function(){
h_check14.push(this.value);
});

var pe_check14 = [];
$("input[name='obs_pe']:checked").each(function(){
pe_check14.push(this.value);
});

var obs_text = $("#obs_text").val();
 //===============================Ulcera Peptica==================
var ulp_check15 = [];
$("input[name='ulp_nin']:checked").each(function(){
ulp_check15.push(this.value);
});
var madre_check15 = [];
$("input[name='ulp_m']:checked").each(function(){
madre_check15.push(this.value);
});

var padre_check15 = [];
$("input[name='ulp_p']:checked").each(function(){
padre_check15.push(this.value);
});

var h_check15 = [];
$("input[name='ulp_h']:checked").each(function(){
h_check15.push(this.value);
});

var pe_check15 = [];
$("input[name='ulp_pe']:checked").each(function(){
pe_check15.push(this.value);
});

var ulp_text = $("#ulp_text").val();
 //===============================Artritis, Gota==================
var art_check16 = [];
$("input[name='art_nin']:checked").each(function(){
art_check16.push(this.value);
});
var madre_check16 = [];
$("input[name='art_m']:checked").each(function(){
madre_check16.push(this.value);
});

var padre_check16 = [];
$("input[name='art_p']:checked").each(function(){
padre_check16.push(this.value);
});

var h_check16 = [];
$("input[name='art_h']:checked").each(function(){
h_check16.push(this.value);
});

var pe_check16 = [];
$("input[name='art_pe']:checked").each(function(){
pe_check16.push(this.value);
});

var art_text = $("#art_text").val();


//===============================Enf. Hematológicas (Esp.)==================
var art_check016 = []; 
$("input[name='hem_nin']:checked").each(function(){
art_check016.push(this.value);
});
var madre_check016 = [];
$("input[name='hem_m']:checked").each(function(){
madre_check016.push(this.value);
});

var padre_check016 = [];
$("input[name='hem_p']:checked").each(function(){
padre_check016.push(this.value);
});

var h_check016 = [];
$("input[name='hem_h']:checked").each(function(){
h_check016.push(this.value);
});

var pe_check016 = [];
$("input[name='hem_pe']:checked").each(function(){
pe_check016.push(this.value);
});

var hem_text = $("#hem_text").val();


 //===============================Zika==================
var zika_check17 = [];
$("input[name='zika_nin']:checked").each(function(){
zika_check17.push(this.value);
});
var madre_check17 = [];
$("input[name='zika_m']:checked").each(function(){
madre_check17.push(this.value);
});

var padre_check17 = [];
$("input[name='zika_p']:checked").each(function(){
padre_check17.push(this.value);
});

var h_check17 = [];
$("input[name='zika_h']:checked").each(function(){
h_check17.push(this.value);
});

var pe_check17 = [];
$("input[name='zika_pe']:checked").each(function(){
pe_check17.push(this.value);
});

var zika_text = $("#zika_text").val();
var otros = $("#otros").val();
//=============================Desarollos==========================================
//var textgrueso = $("#text-grueso").val();
//var textfino = $("#text-fino").val();
//var textlenguage = $("#text-lenguage").val();
//var textsocial = $("#text-social").val();
var textmaltrato_g = $("#text-maltrato").val();
var textabuso_g = $("#text-abuso").val();
var textneg_g = $("#text-neg").val(); 
var maltratoemo_g = $("#maltrato-emo").val();
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

//var otros2 = $("#otros2").val();
var grouposang = $("#grouposang").val();
var hepatis = $('input:radio[name=hepatis]:checked').val();
var hpv = $('input:radio[name=hpv]:checked').val();
var toxoide = $('input:radio[name=toxoide]:checked').val();
var tipificacion = $("#tipificacion").val();
var rhoa = $('input:radio[name=rhoa]:checked').val();
//=============Violencia======================================
var violencia1 = $("#violencia1").val();
var violencia2 = $("#violencia2").val();
var violencia3 = $("#violencia3").val();
var violencia4 = $("#violencia4").val();
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
 //----------counseling data ------------------------


 var anti_radio= $("input[name='anti_radio']:checked").val();

 var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 });
 
  var diu = [];
 $("input[name='diu']:checked").each(function(){
            diu.push(this.value);
 })
  var implante = [];
 $("input[name='implante']:checked").each(function(){
            implante.push(this.value);
 })
  var siu = [];
 $("input[name='siu']:checked").each(function(){
            siu.push(this.value);
 })
  var condones = [];
 $("input[name='condones']:checked").each(function(){
            condones.push(this.value);
 })
  var anti_emergencia = [];
 $("input[name='anti_emergencia']:checked").each(function(){
            anti_emergencia.push(this.value);
 })
  var aqv = [];
 $("input[name='aqv']:checked").each(function(){
            aqv.push(this.value);
 })
  var inyectable1 = [];
 $("input[name='inyectable1']:checked").each(function(){
            inyectable1.push(this.value);
 })
  var inyectable3 = [];
 $("input[name='inyectable3']:checked").each(function(){
            inyectable3.push(this.value);
 })
  var solo_pro = [];
 $("input[name='solo_pro']:checked").each(function(){
            solo_pro.push(this.value);
 })
 
 
  var contraception_otro = $("#contraception_otro").val();
 
  var deseo_uso = $("#deseo_uso").val();
 var deseo_cambio1 = $("#deseo_cambio1").val();
 var deseo_cambio2 = $("#deseo_cambio2").val();
var motivo_uso = $("#motivo_uso").val();
 var deseo_cambio1 = $("#deseo_cambio1").val();
 var deseo_cambio2 = $("#deseo_cambio2").val();
 var motivo_uso = $("#motivo_uso").val();
 var deseo_retiro = $("#deseo_retiro").val();
  var aclara_dudas = $("#aclara_dudas").val();
  var momento_uso = $("#momento_uso").val();

  var vio_basada = [];
 $("input[name='vio_basada']:checked").each(function(){
            vio_basada.push(this.value);
 })
  var pre_prueba_vih = [];
 $("input[name='pre_prueba_vih']:checked").each(function(){
            pre_prueba_vih.push(this.value);
 })
  var prost_prueba_vih_mas = [];
 $("input[name='prost_prueba_vih_mas']:checked").each(function(){
            prost_prueba_vih_mas.push(this.value);
 })
  var prost_prueba_vih_menos = [];
 $("input[name='prost_prueba_vih_menos']:checked").each(function(){
            prost_prueba_vih_menos.push(this.value);
 })
  var con_ad_arv = [];
 $("input[name='con_ad_arv']:checked").each(function(){
            con_ad_arv.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var ap_ps_vih = [];
 $("input[name='ap_ps_vih']:checked").each(function(){
            ap_ps_vih.push(this.value);
 })
  var infertilidad = [];
 $("input[name='infertilidad']:checked").each(function(){
            infertilidad.push(this.value);
 })
  var cancer_mama = [];
 $("input[name='cancer_mama']:checked").each(function(){
            cancer_mama.push(this.value);
 })
  var prueba_pre_post = [];
 $("input[name='prueba_pre_post']:checked").each(function(){
            prueba_pre_post.push(this.value);
 })
  var reduce_riesgo = [];
 $("input[name='reduce_riesgo']:checked").each(function(){
            reduce_riesgo.push(this.value);
 })
  var post_aborto = [];
 $("input[name='post_aborto']:checked").each(function(){
            post_aborto.push(this.value);
 })
  var zika = [];
 $("input[name='zika']:checked").each(function(){
            zika.push(this.value);
 })
  var pre_post_prueba_its = [];
 $("input[name='pre_post_prueba_its']:checked").each(function(){
            pre_post_prueba_its.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var sexualidad = [];
 $("input[name='sexualidad']:checked").each(function(){
            sexualidad.push(this.value);
 })
  var pre_natal = [];
 $("input[name='pre_natal']:checked").each(function(){
            pre_natal.push(this.value);
 })
  var reduce_riesgo_its = [];
 $("input[name='reduce_riesgo_its']:checked").each(function(){
            reduce_riesgo_its.push(this.value);
 })
  var otro_conselling = $("#otro_conselling").val();
  var tipo_servicio = $("#tipo_servicio").val();
  var entrega_materiel= $("#entrega_materiel").val();
 

  var ref_anti = $("#ref_anti").val();

  var ref_gineco = [];
 $("input[name='ref_gineco']:checked").each(function(){
            ref_gineco.push(this.value);
 })
  var ref_obs = [];
 $("input[name='ref_obs']:checked").each(function(){
            ref_obs.push(this.value);
 })
  var ref_uro = [];
 $("input[name='ref_uro']:checked").each(function(){
            ref_uro.push(this.value);
 })
  var ref_infet = [];
 $("input[name='ref_infet']:checked").each(function(){
            ref_infet.push(this.value);
 })
  var ref_pedia = [];
 $("input[name='ref_pedia']:checked").each(function(){
            ref_pedia.push(this.value);
 })
  var ref_pws = [];
 $("input[name='ref_pws']:checked").each(function(){
            ref_pws.push(this.value);
 })
  var ref_otro_serv = [];
 $("input[name='ref_otro_serv']:checked").each(function(){
            ref_otro_serv.push(this.value);
 })
  var ref_apoyo_emo = [];
 $("input[name='ref_apoyo_emo']:checked").each(function(){
            ref_apoyo_emo.push(this.value);
 })
  var ref_endo = [];
 $("input[name='ref_endo']:checked").each(function(){
            ref_endo.push(this.value);
 })
  var ref_servicio = [];
 $("input[name='ref_servicio']:checked").each(function(){
            ref_servicio.push(this.value);
 })
 
 var ref_otro1 = $("#ref_otro1").val();
 
 var ref_serv_legal = [];
 $("input[name='ref_serv_legal']:checked").each(function(){
            ref_serv_legal.push(this.value);
 })


 var ref_onco = [];
 $("input[name='ref_onco']:checked").each(function(){
            ref_onco.push(this.value);
 })


var ref_obs_mat = [];
 $("input[name='ref_obs_mat']:checked").each(function(){
            ref_obs_mat.push(this.value);
 })

 var ref_otro2 = $("#ref_otro2").val();

 var comment_counselling = $("#comment_counselling").val(); 
 $.ajax({
type: "POST",
url: "<?=base_url('save_counseling/saveFields')?>",
data: {todo_check:todo_check,car_nin_check:car_nin_check,madre_check:madre_check,padre_check:padre_check,car_h_check:car_h_check,car_pe_check:car_pe_check,car_text:car_text,
/*hipertencion*/nin_check2:nin_check2,madre_check2:madre_check2,padre_check2:padre_check2,h_check2:h_check2,pe_check2:pe_check2,hip_text:hip_text,
/*Enf. Cerebrovascular*/nin_check3:nin_check3,madre_check3:madre_check3,padre_check3:padre_check3,h_check3:h_check3,pe_check3:pe_check3,ec_text:ec_text,
/*Epilepsie*/nin_check4:nin_check4,madre_check4:madre_check4,padre_check4:padre_check4,h_check4:h_check4,pe_check4:pe_check4,ep_text:ep_text,
/*Asma Bronquial*/nin_check5:nin_check5,madre_check5:madre_check5,padre_check5:padre_check5,h_check5:h_check5,pe_check5:pe_check5,as_text:as_text,
/*Enf. Repiratoria (Esp.)*/nin_check05:nin_check05, madre_check05:madre_check05, padre_check05:padre_check05, h_check05:h_check05, pe_check05:pe_check05,enre_text:enre_text,
/*Tuberculosis*/nin_check6:nin_check6,madre_check6:madre_check6,padre_check6:padre_check6,h_check6:h_check6,pe_check6:pe_check6,tub_text:tub_text,
/*Diabetes*/nin_check7:nin_check7,madre_check7:madre_check7,padre_check7:padre_check7,h_check7:h_check7,pe_check7:pe_check7,dia_text:dia_text,
/*Tiroides*/nin_check8:nin_check8,madre_check8:madre_check8,padre_check8:padre_check8,h_check8:h_check8,pe_check8:pe_check8,tir_text:tir_text,
/*Hepatitis*/hep_tipo:hep_tipo,nin_check9:nin_check9,madre_check9:madre_check9,padre_check9:padre_check9,h_check9:h_check9,pe_check9:pe_check9,hep_text:hep_text,			
/*Enfermedades Renales*/nin_check10:nin_check10,madre_check10:madre_check10,padre_check10:padre_check10,h_check10:h_check10,pe_check10:pe_check10,enfr_text:enfr_text,			
/*Falcemia*/nin_check11:nin_check11,madre_check11:madre_check11,padre_check11:padre_check11,h_check11:h_check11,pe_check11:pe_check11,falc_text:falc_text,			
/*Neoplasias*/neop_check12:neop_check12,madre_check12:madre_check12,padre_check12:padre_check12,h_check12:h_check12,pe_check12:pe_check12,neop_text:neop_text,			
/*ENf. Psiquiatricas*/psi_check13:psi_check13,madre_check13:madre_check13,padre_check13:padre_check13,h_check13:h_check13,pe_check13:pe_check13,psi_text:psi_text,			
/*Obesidad*/obs_check14:obs_check14,madre_check14:madre_check14,padre_check14:padre_check14,h_check14:h_check14,pe_check14:pe_check14,obs_text:obs_text,			
/*Ulcera Peptica*/ulp_check15:ulp_check15,madre_check15:madre_check15,padre_check15:padre_check15,h_check15:h_check15,pe_check15:pe_check15,ulp_text:ulp_text,			
/*Artritis, Gota*/art_check16:art_check16,madre_check16:madre_check16,padre_check16:padre_check16,h_check16:h_check16,pe_check16:pe_check16,art_text:art_text,			
/*Enf. Hematológicas (Esp.)*/art_check016:art_check016, madre_check016:madre_check016, padre_check016:padre_check016, h_check016:h_check016, pe_check016:pe_check016, hem_text:hem_text,
/*Zika*/zika_check17:zika_check17,madre_check17:madre_check17,padre_check17:padre_check17,h_check17:h_check17,pe_check17:pe_check17,zika_text:zika_text,otros:otros,
textmaltrato_g:textmaltrato_g,textabuso_g:textabuso_g,textneg_g:textneg_g,maltratoemo_g:maltratoemo_g,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,
/*enfermedad actual*/
enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios, 
plan:plan,cied:cied,otros_diagnos:otros_diagnos,
/*counseling*/
anti_radio:anti_radio, aoc:aoc, diu:diu, implante:implante, siu:siu, condones:condones, anti_emergencia:anti_emergencia,
aqv:aqv, inyectable1:inyectable1, inyectable3:inyectable3, solo_pro:solo_pro, contraception_otro:contraception_otro,
 deseo_uso:deseo_uso, deseo_cambio1:deseo_cambio1, deseo_cambio2:deseo_cambio2, motivo_uso:motivo_uso,deseo_retiro:deseo_retiro,
 aclara_dudas:aclara_dudas, momento_uso:momento_uso, vio_basada:vio_basada, pre_prueba_vih:pre_prueba_vih, prost_prueba_vih_mas:prost_prueba_vih_mas,
 prost_prueba_vih_menos:prost_prueba_vih_menos, con_ad_arv:con_ad_arv, ap_ps_vih:ap_ps_vih, infertilidad:infertilidad, 
 cancer_mama:cancer_mama, prueba_pre_post:prueba_pre_post, reduce_riesgo:reduce_riesgo, post_aborto:post_aborto, zika:zika,
 pre_post_prueba_its:pre_post_prueba_its, sexualidad:sexualidad, pre_natal:pre_natal,  reduce_riesgo_its:reduce_riesgo_its,
 otro_conselling:otro_conselling, tipo_servicio:tipo_servicio, entrega_materiel:entrega_materiel, ref_anti:ref_anti, 
 ref_gineco:ref_gineco, ref_obs:ref_obs, ref_uro:ref_uro, ref_infet:ref_infet, ref_pedia:ref_pedia, ref_pws:ref_pws,
 ref_otro_serv:ref_otro_serv, ref_apoyo_emo:ref_apoyo_emo, ref_endo:ref_endo, ref_servicio:ref_servicio, ref_otro1:ref_otro1,
 ref_serv_legal:ref_serv_legal, ref_onco:ref_onco, ref_obs_mat:ref_obs_mat, ref_otro2:ref_otro2, comment_counselling:comment_counselling,
hist_id:hist_id,inserted_by:inserted_by,user_id:user_id,centro_medico:centro_medico},
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