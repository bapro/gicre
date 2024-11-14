<script>

(function($) {
  $.fn.donetypingjuicio = function(callback) {
    var _this = $(this);
    var x_timer;
    _this.keyup(function() {
      clearTimeout(x_timer);
      x_timer = setTimeout(clear_timer, 1000);
    });

    function clear_timer() {
      clearTimeout(x_timer);
      callback.call(_this);
    }
  }
})(jQuery);

$('#juicio_clinico').donetypingjuicio(function(callback) {
if($('#juicio_clinico').val() !=""){
$('#save1').prop('disabled',true);	
}else{
$('#save1').prop('disabled',false);		
}
});
//--------------------------SAVE DATA------------------------------------------------------------------

$('#save1').on('click', function(event) {
var action =this.id;
//alert(action);
saveFormHist(action);
})



$('#save2').on('click', function(event) {
var action =this.id;
//alert(action);
saveFormHist(action);
})

function saveFormHist(action){
var patient_id=<?=$patient_id?>;
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
//========================================================================
    
//save examen fisico
 
 //------Signos vitales--------------------------
var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla-ef").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var glicemia = $("#glicemia").val();
var fcf = $("#fcf").val();
var satoe = $("#satoe").val();
var radio_signo= $("input[name='radio_signo']:checked").val();
var hallazgo=$("#hallazgo").val();
var worksig=$("#worksig").val();
//------------CONCLUSION DIAGNOSTIC------------------
var cied = [];          
$('.inserted-cied').each(function(){
cied.push($(this).val());
;
});
var otros_diagnos = $("#otros_diagnos").val();
var juicio_clinico = $("#juicio_clinico").val();
var estado_alta = $("#estado_alta").val();
var destino = $("#destino").val();
var equipo_medico = $("#equipo_medico").val();

if(action=='save1' && hallazgo==""){
$(".required-menu").slideDown();
$("#menu-name-req").html("Examen Fisico." + " <br/> " + " hallazgo es obligatorio");
$(".tab-exam-fis").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-exam-fis').fadeTo('slow', 0.1).fadeTo('slow', 1.0);

return false;
};	
}

else if(action=='save2' && hallazgo=="" && worksig==0)
{
$(".required-menu").slideDown();
$("#menu-name-req").html("Examen Fisico." + " <br/> " + " hallazgo es obligatorio");
$(".tab-exam-fis").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-exam-fis').fadeTo('slow', 0.1).fadeTo('slow', 1.0);

return false;
};	
}


else if(action=='save2' && otros_diagnos=="" && !$("input[name='cied']:checked").val())
{
$(".required-menu").slideDown();
$("#menu-name-req").html("Alta medica." + " <br/> " + " Marque una en la lista del CE10 o crear otro");
$(".tab-pro").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-pro').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};	
}


else if(action=='save2' &&  juicio_clinico=="" && estado_alta=="" && equipo_medico=="")
{
$(".required-menu").slideDown();
$("#menu-name-req").html("Alta medica." + " <br/> " + " Todos los campos son obligatorios");
$(".tab-pro").addClass( "text-danger" );
for(i=0;i<6;i++) {
$('.tab-pro').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
return false;
};	
}


else{

 $.ajax({
  url: "<?=base_url('emergency/saveEmergencyPatient')?>",
   type: 'post',
   data: {user_id:<?=$user_id?>,hist_id:<?=$patient_id?>,centro:<?=$centro_id?>,
	todo_check:todo_check,car_nin_check:car_nin_check,madre_check:madre_check,padre_check:padre_check,car_h_check:car_h_check,car_pe_check:car_pe_check,car_text:car_text,
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
textmaltrato_g:textmaltrato_g,textabuso_g:textabuso_g,textneg_g:textneg_g,maltratoemo_g:maltratoemo_g,action:action,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,id_emergency:<?=$id_emergency?>,
//signos vitales
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,satoe:satoe,tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemia:glicemia,fcf:fcf,hallazgo:hallazgo.trim(),
//conclusion diagnostic
cied:cied,otros_diagnos:otros_diagnos.trim(),juicio_clinico:juicio_clinico.trim(),estado_alta:estado_alta.trim(),destino:destino,equipo_medico:equipo_medico.trim()
},
success: function(data){
if(action=='save1'){
location.reload(true);  
}else{
window.location.href="<?php echo base_url(); ?>emergency/list_of_seen_emergency?id="+patient_id;

}
}, 
});

}
	
}




	//----toggle intrafamilial
	$('#click_viol').click(function () {
	$('#click_viol').text($('#click_viol').text() == 'Ocultar Violencia Intafamiliar' ? 'Violencia Intafamiliar' : 'Ocultar Violencia Intafamiliar'); 
    $("#violenciaform").slideToggle("slow");
    $("#edit_datav").slideToggle("slow");	
	})
	
	
	
//----Sospecha de Abuso o Maltrato
	$('#click_sospecha_mal').click(function () {
	$('#click_sospecha_mal').text($('#click_sospecha_mal').text() == 'Ocultar Sospecha de Abuso o Maltrato' ? 'Sospecha de Abuso o Maltrato' : 'Ocultar Sospecha de Abuso o Maltrato'); 
    $("#sospecha_mal").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant gnrl
	$('#click_antg').click(function () {
	$('#click_antg').text($('#click_antg').text() == 'Ocultar Antecedentes personales, familiares y patologicos' ? 'Antecedentes personales, familiares y patologicos' : 'Ocultar Antecedentes personales, familiares y patologicos'); 
    $("#show_gnrl").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant otros_gnrl
	$('#click_otros_ant').click(function () {
	$('#click_otros_ant').text($('#click_otros_ant').text() == 'Ocultar Otros antecedentes' ? 'Otros antecedentes' : 'Ocultar Otros antecedentes'); 
    $("#show_otros_ant").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
		//----ant habitos
	$('#click_habitost').click(function () {
	$('#click_habitost').text($('#click_habitost').text() == 'Ocultar Habitos Toxicos' ? 'Habitos Toxicos' : 'Ocultar Habitos Toxicos'); 
    $("#habitost").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	
	
		//----ant habitos
	$('#click_ant_al_rec_med').click(function () {
	$('#click_ant_al_rec_med').text($('#click_ant_al_rec_med').text() == 'Antecedentes alergicos y reaccion a medicamentos' ? 'Antecedentes alergicos y reaccion a medicamentos' : 'Antecedentes alergicos y reaccion a medicamentos'); 
    $("#ant_al_rec_med").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	$('#alergicos').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	
	$('#medicaha').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	
	//-------------------------------------------------------------------------------------------------------------
	


jQuery("input[name='mf']").on('click', function(e) {
		if($('.chkYes5').is(':checked')) {
		
			  $('.text-maltrato').prop('disabled', false);
		}
		else{
			$('.text-maltrato').prop('disabled', true);
			$('.text-maltrato').val('');
			
		}
});





jQuery("input[name='abss']").on('click', function(e) {
		if($('.chkYes6').is(':checked')) {
		
			  $('.text-abuso').prop('disabled', false);
		}
		else{
			$('.text-abuso').prop('disabled', true);
			$('.text-abuso').val('');
			
		}
});


jQuery("input[name='negs']").on('click', function(e) {
		if($('.chkYes7').is(':checked')) {
		
			  $('.text-neg').prop('disabled', false);
		}
		else{
			$('.text-neg').prop('disabled', true);
			$('.text-neg').val('');
			
		}
});


jQuery("input[name='mems']").on('click', function(e) {
if($('.chkYes8').is(':checked')) {

$('.maltrato-emo').prop('disabled', false);
}
else{
$('.maltrato-emo').prop('disabled', true);
$('.maltrato-emo').val('');

}
});

//--------------------------------------------------------------------------------------------------------------


//Alimentos

$('.checkin_ala').change(function() {
    if ($('.checkin_ala:checked').length) {
        $('#alimentos_al').prop('disabled', true);
		$('#alimentos_al').val('');
	} else {
        $('#alimentos_al').prop('disabled', false);
	}
});

//medicamentos

$('.checkin_meda').change(function() {
    if ($('.checkin_meda:checked').length) {
        $('#medicamentos_al').prop('disabled', true);
		  $('#medicamentos_al').val('');
	 } else {
        $('#medicamentos_al').prop('disabled', false);
	}
});


//otros
$('.checkin_otrosa').change(function() {
	if ($('.checkin_otrosa:checked').length) {
        $('#otros_al').prop('disabled', true);
		$('#otros_al').val('');
		
     } else {
        $('#otros_al').prop('disabled', false);
	 }
});




//Quirurgicos
$('.checkin_qui').change(function() {
    if ($('.checkin_qui:checked').length) {
        $('#quirurgicos').prop('disabled', true);
		$('#quirurgicos').val('');
	 } else {
        $('#quirurgicos').prop('disabled', false);
	 }
});


//Abdominal
$('.checkin_abd').change(function() {
    if ($('.checkin_abd:checked').length) {
        $('#abdominal').prop('disabled', true);
		$('#abdominal').val('');
	 } else {
        $('#abdominal').prop('disabled', false);
	}
});

//Transfusión
$('.checkin_trans').change(function() {
    if ($('.checkin_trans:checked').length) {
        $('#transfusion').prop('disabled', true);
		$('#transfusion').val('');
    } else {
        $('#transfusion').prop('disabled', false);
		
    }
});


//gine obstetrico

$('.checkin_gine').change(function() {
    if ($('.checkin_gine:checked').length) {
        $('#gineco').prop('disabled', true);
		 $('#gineco').val('');
    } else {
        $('#gineco').prop('disabled', false);
		
    }
});

$('.checkin_tora').change(function() {
    if ($('.checkin_tora:checked').length) {
        $('#toracica').prop('disabled', true);
		 $('#toracica').val('');
		
    } else {
        $('#toracica').prop('disabled', false);
		
    }
});





$('.checkin_otros').change(function() {
	 if ($('.checkin_otros:checked').length) {
          $("#otros1").val('');
        $('#otros1').prop('disabled', true);
		 $('#otros1').val('');
		
   } else {
        $('#otros1').prop('disabled', false);
		 
		
    }
});


jQuery("input[name='radiomedi']").on('click', function(e) {
if($('.chM').is(':checked')) {

$('.selectmedic').prop('disabled', false);

}
else{
$('.selectmedic').prop('disabled', true);
$(".selectmedic").val(null).trigger("change");
}
});


$(".right-otro :input").prop("disabled", true);

$('.checkin-right-otro').change(function() {
    if ($('.checkin-right-otro:checked').length) {
        $('.right-otro :input').prop('disabled', true);
		
    } else {
        $('.right-otro :input').prop('disabled', false);
		
    }
});





//violencia infantil
$('.checkin_v1').change(function() {
    if ($('.checkin_v1:checked').length) {
        $('#violencia1').prop('disabled', true);
		  $('#violencia1').val('');
		
    } else {
        $('#violencia1').prop('disabled', false);
		
    }
});

$('.checkin_v2').change(function() {
    if ($('.checkin_v2:checked').length) {
        $('#violencia2').prop('disabled', true);
		  $('#violencia2').val('');
		
    } else {
        $('#violencia2').prop('disabled', false);
		
    }
});

$('.checkin_v3').change(function() {
    if ($('.checkin_v3:checked').length) {
        $('#violencia3').prop('disabled', true);
		 $('#violencia3').val('');
		
    } else {
        $('#violencia3').prop('disabled', false);
		
    }
});

$('.checkin_v4').change(function() {
    if ($('.checkin_v4:checked').length) {
        $('#violencia4').prop('disabled', true);
		 $('#violencia4').val('');
		
    } else {
        $('#violencia4').prop('disabled', false);
		
    }
});
//--------------EMPTY HISTORIAL--------------------
$('#checkin_cafe').change(function() {
    if ($('#checkin_cafe:checked').length) {
        $('#hab_c_caf').prop('disabled', false);
		 $('#hab_f_caf').prop('disabled', false);
    } else {
        $('#hab_c_caf').prop('disabled', true);
		$('#hab_f_caf').prop('disabled', true);
    }
});


//handle habitos toxicos pipa

     
$('#checkin_pipa').change(function() {
    if ($('#checkin_pipa:checked').length) {
        $('#hab_c_pip').prop('disabled', false);
		 $('#hab_f_pip').prop('disabled', false);
    } else {
        $('#hab_c_pip').prop('disabled', true);
		$('#hab_f_pip').prop('disabled', true);
    }
});

//handle habitos toxicos ciga

     
$('#checkin_ciga').change(function() {
    if ($('#checkin_ciga:checked').length) {
        $('#hab_c_ciga').prop('disabled', false);
		 $('#hab_f_ciga').prop('disabled', false);
    } else {
        $('#hab_c_ciga').prop('disabled', true);
		$('#hab_f_ciga').prop('disabled', true);
    }
});

//handle habitos toxicos alcohol

     
$('#checkin_al').change(function() {
    if ($('#checkin_al:checked').length) {
        $('#hab_c_al').prop('disabled', false);
		 $('#hab_f_al').prop('disabled', false);
    } else {
        $('#hab_c_al').prop('disabled', true);
		$('#hab_f_al').prop('disabled', true);
    }
});


//handle habitos toxicos tabaco

     
$('#checkin_tab').change(function() {
    if ($('#checkin_tab:checked').length) {
        $('#hab_c_tab').prop('disabled', false);
		 $('#hab_f_tab').prop('disabled', false);
    } else {
        $('#hab_c_tab').prop('disabled', true);
		$('#hab_f_tab').prop('disabled', true);
    }
});



     
$('#checkin_drug').change(function() {
    if ($('#checkin_drug:checked').length) {
        $('#hab_f_drug').prop('disabled', false);
		 $('#hab_c_drug').prop('disabled', false);
		 $('.hab_t_drug').prop('disabled', false);
    } else {
        $('#hab_f_drug').prop('disabled', true);
		$('#hab_c_drug').prop('disabled', true);
		$('.hab_t_drug').prop('disabled', true);
    }
});





$('#checkin_hookah').change(function() {
    if ($('#checkin_hookah:checked').length) {
        $('#hookah').prop('disabled', false);
		 $('#hab_f_hookah').prop('disabled', false);
	 } else {
        $('#hookah').prop('disabled', true);
		$('#hab_f_hookah').prop('disabled', true);
	
    }
});


$(".select2").select2({
	allowClear: true,
  tags: true
});

	 $select = $("#hab_t_drug").off("change");
    // and if country then bind it
     $select.on("change", function(e) {           
         $('#hab_t_drug option[value="ninguno"]').remove();
	 });
//-------------------------------------------------------------------------------------------------------------------------

</script>