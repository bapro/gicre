<script>
 $("#guardarSinAlta").on('click', function(e){
	let gender_female = $("#gender_female").html();
	if(gender_female==1){
	 saveFormsNotDischargePatientFemale();
	}else{
		saveFormsNotDischargePatientMale();
	}


 })
 
 
 function saveFormsNotDischargePatientMale(){
alert('M');
//SAVE ANT GENERAL

 let todo_check = [];
 $("input[name='todo']:checked").each(function(){
            todo_check.push(this.value);
 });
 
 let car_nin_check = [];
 $("input[name='car_nin']:checked").each(function(){
            car_nin_check.push(this.value);
 });
let madre_check = [];
 $("input[name='car_m']:checked").each(function(){
            madre_check.push(this.value);
 });
		
let padre_check = [];
 $("input[name='car_p']:checked").each(function(){
            padre_check.push(this.value);
 });
 
let car_h_check = [];
 $("input[name='car_h']:checked").each(function(){
            car_h_check.push(this.value);
 });
 
 let car_pe_check = [];
 $("input[name='car_pe']:checked").each(function(){
            car_pe_check.push(this.value);
 });
 
 let car_text = $("#car_text").val();
 //===============================Hipertension==================
  let nin_check2 = [];
 $("input[name='hip_nin']:checked").each(function(){
            nin_check2.push(this.value);
 });
let madre_check2 = [];
 $("input[name='hip_m']:checked").each(function(){
            madre_check2.push(this.value);
 });
		
let padre_check2 = [];
 $("input[name='hip_p']:checked").each(function(){
            padre_check2.push(this.value);
 });
 
let h_check2 = [];
 $("input[name='hip_h']:checked").each(function(){
            h_check2.push(this.value);
 });
 
 let pe_check2 = [];
 $("input[name='hip_pe']:checked").each(function(){
            pe_check2.push(this.value);
 });
 
 let hip_text = $("#hip_text").val();
 
  //===============================Enf. Cerebrovascular==================
  
    let nin_check3 = [];
 $("input[name='ec_nin']:checked").each(function(){
            nin_check3.push(this.value);
 });
let madre_check3 = [];
 $("input[name='ec_m']:checked").each(function(){
            madre_check3.push(this.value);
 });
		
let padre_check3 = [];
 $("input[name='ec_p']:checked").each(function(){
            padre_check3.push(this.value);
 });
 
let h_check3 = [];
 $("input[name='ec_h']:checked").each(function(){
            h_check3.push(this.value);
 });
 
 let pe_check3 = [];
 $("input[name='ec_pe']:checked").each(function(){
            pe_check3.push(this.value);
 });
 
 let ec_text = $("#ec_text").val();
 
 
//============Epilepsie=============================
let nin_check4 = [];
$("input[name='ep_nin']:checked").each(function(){
nin_check4.push(this.value);
});
let madre_check4 = [];
$("input[name='ep_m']:checked").each(function(){
madre_check4.push(this.value);
});

let padre_check4 = [];
$("input[name='ep_p']:checked").each(function(){
padre_check4.push(this.value);
});

let h_check4 = [];
$("input[name='ep_h']:checked").each(function(){
h_check4.push(this.value);
});

let pe_check4 = [];
$("input[name='ep_pe']:checked").each(function(){
pe_check4.push(this.value);
});

let ep_text = $("#ep_text").val();
 //===============================Asma Bronquial==================
  
let nin_check5 = [];
$("input[name='as_nin']:checked").each(function(){
nin_check5.push(this.value);
});
let madre_check5 = [];
$("input[name='as_m']:checked").each(function(){
madre_check5.push(this.value);
});

let padre_check5 = [];
$("input[name='as_p']:checked").each(function(){
padre_check5.push(this.value);
});

let h_check5 = [];
$("input[name='as_h']:checked").each(function(){
h_check5.push(this.value);
});

let pe_check5 = [];
$("input[name='as_pe']:checked").each(function(){
pe_check5.push(this.value);
});

let as_text = $("#as_text").val();




 //===============================Enf. Repiratoria==================
  
let nin_check05 = []; 
$("input[name='enre_nin']:checked").each(function(){
nin_check05.push(this.value);
});
let madre_check05 = [];
$("input[name='enre_m']:checked").each(function(){
madre_check05.push(this.value);
});

let padre_check05 = [];
$("input[name='enre_p']:checked").each(function(){
padre_check05.push(this.value);
});

let h_check05 = [];
$("input[name='enre_h']:checked").each(function(){
h_check05.push(this.value);
});

let pe_check05 = [];
$("input[name='enre_pe']:checked").each(function(){
pe_check05.push(this.value);
});

let enre_text = $("#enre_text").val();



 //===============================Tuberculosis==================
  
let nin_check6 = [];
$("input[name='tub_nin']:checked").each(function(){
nin_check6.push(this.value);
});
let madre_check6 = [];
$("input[name='tub_m']:checked").each(function(){
madre_check6.push(this.value);
});

let padre_check6 = [];
$("input[name='tub_p']:checked").each(function(){
padre_check6.push(this.value);
});

let h_check6 = [];
$("input[name='tub_h']:checked").each(function(){
h_check6.push(this.value);
});

let pe_check6 = [];
$("input[name='tub_pe']:checked").each(function(){
pe_check6.push(this.value);
});

let tub_text = $("#tub_text").val();

 //===============================Diabetes==================
  
let nin_check7 = [];
$("input[name='dia_nin']:checked").each(function(){
nin_check7.push(this.value);
});
let madre_check7 = [];
$("input[name='dia_m']:checked").each(function(){
madre_check7.push(this.value);
});

let padre_check7 = [];
$("input[name='dia_p']:checked").each(function(){
padre_check7.push(this.value);
});

let h_check7 = [];
$("input[name='dia_h']:checked").each(function(){
h_check7.push(this.value);
});

let pe_check7 = [];
$("input[name='dia_pe']:checked").each(function(){
pe_check7.push(this.value);
});

let dia_text = $("#dia_text").val();
 //===============================Tiroides==================
  
let nin_check8 = [];
$("input[name='tir_nin']:checked").each(function(){
nin_check8.push(this.value);
});
let madre_check8 = [];
$("input[name='tir_m']:checked").each(function(){
madre_check8.push(this.value);
});

let padre_check8 = [];
$("input[name='tir_p']:checked").each(function(){
padre_check8.push(this.value);
});

let h_check8 = [];
$("input[name='tir_h']:checked").each(function(){
h_check8.push(this.value);
});

let pe_check8 = [];
$("input[name='tir_pe']:checked").each(function(){
pe_check8.push(this.value);
});

let tir_text = $("#tir_text").val();
 //===============================Hepatitis==================
  let hep_tipo = $("#hep_tipo").val();
let nin_check9 = [];
$("input[name='hep_nin']:checked").each(function(){
nin_check9.push(this.value);
});
let madre_check9 = [];
$("input[name='hep_m']:checked").each(function(){
madre_check9.push(this.value);
});

let padre_check9 = [];
$("input[name='hep_p']:checked").each(function(){
padre_check9.push(this.value);
});

let h_check9 = [];
$("input[name='hep_h']:checked").each(function(){
h_check9.push(this.value);
});

let pe_check9 = [];
$("input[name='hep_pe']:checked").each(function(){
pe_check9.push(this.value);
});

let hep_text = $("#hep_text").val();
 //===============================Enfermedades Renales==================
let nin_check10 = [];
$("input[name='enfr_nin']:checked").each(function(){
nin_check10.push(this.value);
});
let madre_check10 = [];
$("input[name='enfr_m']:checked").each(function(){
madre_check10.push(this.value);
});

let padre_check10 = [];
$("input[name='enfr_p']:checked").each(function(){
padre_check10.push(this.value);
});

let h_check10 = [];
$("input[name='enfr_h']:checked").each(function(){
h_check10.push(this.value);
});

let pe_check10 = [];
$("input[name='enfr_pe']:checked").each(function(){
pe_check10.push(this.value);
});

let enfr_text = $("#enfr_text").val();
 //===============================Falcemia==================
let nin_check11 = [];
$("input[name='falc_nin']:checked").each(function(){
nin_check11.push(this.value);
});
let madre_check11 = [];
$("input[name='falc_m']:checked").each(function(){
madre_check11.push(this.value);
});

let padre_check11 = [];
$("input[name='falc_p']:checked").each(function(){
padre_check11.push(this.value);
});

let h_check11 = [];
$("input[name='falc_h']:checked").each(function(){
h_check11.push(this.value);
});

let pe_check11 = [];
$("input[name='falc_pe']:checked").each(function(){
pe_check11.push(this.value);
});
let falc_text = $("#falc_text").val();
 //===============================Neoplasias==================
let neop_check12 = [];
$("input[name='neop_nin']:checked").each(function(){
neop_check12.push(this.value);
});
let madre_check12 = [];
$("input[name='neop_m']:checked").each(function(){
madre_check12.push(this.value);
});

let padre_check12 = [];
$("input[name='neop_p']:checked").each(function(){
padre_check12.push(this.value);
});

let h_check12 = [];
$("input[name='neop_h']:checked").each(function(){
h_check12.push(this.value);
});

let pe_check12 = [];
$("input[name='neop_pe']:checked").each(function(){
pe_check12.push(this.value);
});

let neop_text = $("#neop_text").val();
 //===============================ENf. Psiquiatricas==================
let psi_check13 = [];
$("input[name='psi_nin']:checked").each(function(){
psi_check13.push(this.value);
});
let madre_check13 = [];
$("input[name='psi_m']:checked").each(function(){
madre_check13.push(this.value);
});

let padre_check13 = [];
$("input[name='psi_p']:checked").each(function(){
padre_check13.push(this.value);
});

let h_check13 = [];
$("input[name='psi_h']:checked").each(function(){
h_check13.push(this.value);
});

let pe_check13 = [];
$("input[name='psi_pe']:checked").each(function(){
pe_check13.push(this.value);
});

let psi_text = $("#psi_text").val();
 //===============================Obesidad==================
let obs_check14 = [];
$("input[name='obs_nin']:checked").each(function(){
obs_check14.push(this.value);
});
let madre_check14 = [];
$("input[name='obs_m']:checked").each(function(){
madre_check14.push(this.value);
});

let padre_check14 = [];
$("input[name='obs_p']:checked").each(function(){
padre_check14.push(this.value);
});

let h_check14 = [];
$("input[name='obs_h']:checked").each(function(){
h_check14.push(this.value);
});

let pe_check14 = [];
$("input[name='obs_pe']:checked").each(function(){
pe_check14.push(this.value);
});

let obs_text = $("#obs_text").val();
 //===============================Ulcera Peptica==================
let ulp_check15 = [];
$("input[name='ulp_nin']:checked").each(function(){
ulp_check15.push(this.value);
});
let madre_check15 = [];
$("input[name='ulp_m']:checked").each(function(){
madre_check15.push(this.value);
});

let padre_check15 = [];
$("input[name='ulp_p']:checked").each(function(){
padre_check15.push(this.value);
});

let h_check15 = [];
$("input[name='ulp_h']:checked").each(function(){
h_check15.push(this.value);
});

let pe_check15 = [];
$("input[name='ulp_pe']:checked").each(function(){
pe_check15.push(this.value);
});

let ulp_text = $("#ulp_text").val();
 //===============================Artritis, Gota==================
let art_check16 = [];
$("input[name='art_nin']:checked").each(function(){
art_check16.push(this.value);
});
let madre_check16 = [];
$("input[name='art_m']:checked").each(function(){
madre_check16.push(this.value);
});

let padre_check16 = [];
$("input[name='art_p']:checked").each(function(){
padre_check16.push(this.value);
});

let h_check16 = [];
$("input[name='art_h']:checked").each(function(){
h_check16.push(this.value);
});

let pe_check16 = [];
$("input[name='art_pe']:checked").each(function(){
pe_check16.push(this.value);
});

let art_text = $("#art_text").val();


//===============================Enf. Hematológicas (Esp.)==================
let art_check016 = []; 
$("input[name='hem_nin']:checked").each(function(){
art_check016.push(this.value);
});
let madre_check016 = [];
$("input[name='hem_m']:checked").each(function(){
madre_check016.push(this.value);
});

let padre_check016 = [];
$("input[name='hem_p']:checked").each(function(){
padre_check016.push(this.value);
});

let h_check016 = [];
$("input[name='hem_h']:checked").each(function(){
h_check016.push(this.value);
});

let pe_check016 = [];
$("input[name='hem_pe']:checked").each(function(){
pe_check016.push(this.value);
});

let hem_text = $("#hem_text").val();


 //===============================Zika==================
let zika_check17 = [];
$("input[name='zika_nin']:checked").each(function(){
zika_check17.push(this.value);
});
let madre_check17 = [];
$("input[name='zika_m']:checked").each(function(){
madre_check17.push(this.value);
});

let padre_check17 = [];
$("input[name='zika_p']:checked").each(function(){
padre_check17.push(this.value);
});

let h_check17 = [];
$("input[name='zika_h']:checked").each(function(){
h_check17.push(this.value);
});

let pe_check17 = [];
$("input[name='zika_pe']:checked").each(function(){
pe_check17.push(this.value);
});

let zika_text = $("#zika_text").val();
let otros = $("#otros").val();
//=============================Desarollos==========================================
//let textgrueso = $("#text-grueso").val();
//let textfino = $("#text-fino").val();
//let textlenguage = $("#text-lenguage").val();
//let textsocial = $("#text-social").val();
let textmaltrato_g = $("#text-maltrato").val();
let textabuso_g = $("#text-abuso").val();
let textneg_g = $("#text-neg").val(); 
let maltratoemo_g = $("#maltrato-emo").val();
//====================Antecedentes alergicos y reaccion a medicamentos=========================================
let alimentos_al = $("#alimentos_al").val();
let medicamentos_al = $("#medicamentos_al").val();
let otros_al = $("#otros_al").val();
//=============================Otros antecedantes========================================
  let quirurgicos = $("#quirurgicos").val();
let gineco = $("#gineco").val();
let abdominal = $("#abdominal").val();
let toracica = $("#toracica").val();
let transfusion = $("#transfusion").val();
let otros1_g = $("#otros1").val();

//let otros2 = $("#otros2").val();
let grouposang = $("#grouposang").val();
let hepatis = $('input:radio[name=hepatis]:checked').val();
let hpv = $('input:radio[name=hpv]:checked').val();
let toxoide = $('input:radio[name=toxoide]:checked').val();
let tipificacion = $("#tipificacion").val();
let rhoa = $('input:radio[name=rhoa]:checked').val();
//=============Violencia======================================
let violencia1 = $("#violencia1").val();
let violencia2 = $("#violencia2").val();
let violencia3 = $("#violencia3").val();
let violencia4 = $("#violencia4").val();
//=============Habitos toxicos======================================
let hab_c_caf = $("#hab_c_caf").val();
let hab_f_caf = $("#hab_f_caf").val();
let hab_c_pip = $("#hab_c_pip").val();
let hab_f_pip = $("#hab_f_pip").val();
let hab_c_ciga = $("#hab_c_ciga").val();
let hab_f_ciga = $("#hab_f_ciga").val();
let hab_c_al = $("#hab_c_al").val();
let hab_f_al = $("#hab_f_al").val();
let hab_c_tab = $("#hab_c_tab").val();
let hab_f_tab = $("#hab_f_tab").val();
let hookah = $("#hookah").val();
let hab_f_hookah = $("#hab_f_hookah").val();
let hab_t_drug = $("#hab_t_drug").val();
let hab_c_drug = $("#hab_c_drug").val();
let hab_f_drug = $("#hab_f_drug").val();

//--------------------examen sistema--------------------------
let sisneuro  = $("#sisneuro").val();
let neurologico  = $("#neurologico").val();
let siscardio  = $("#siscardio").val();
let cardiova  = $("#cardiova").val();
let sist_uro  = $("#sist_uro").val();
let urogenital  = $("#urogenital").val();
let sis_mu_e  = $("#sis_mu_e").val();
let musculoes  = $("#musculoes").val();
let sist_resp  = $("#sist_resp").val();
let nervioso = $("#nervioso").val();
let linfatico = $("#linfatico").val();
let digestivo = $("#digestivo").val();
let respiratorio = $("#respiratorio").val();
let genitourinario = $("#genitourinario").val();
let sist_diges = $("#sist_diges").val();
let sist_endo = $("#sist_endo").val();
let endocrino = $("#endocrino").val();
let sist_rela = $("#sist_rela").val();
let otros_ex_sis = $("#otros_ex_sis").val();
let dorsales = $("#dorsales").val();
//--------------------------EXAM NEURO------------------------------------

let exam_gen_neuro=$("#exam_gen_neuro").val();

let olfatorio = $('input:radio[name=olfatorio]:checked').val();
let optico= $('input:radio[name=optico]:checked').val();
let motor_ocr_com = $('input:radio[name=motor_ocr_com]:checked').val();
 
 let patetica = $('input:radio[name=patetica]:checked').val();
 
 
 let trigemino = $('input:radio[name=trigemino]:checked').val();


let motor_ocu_ext = $('input:radio[name=motor_ocu_ext]:checked').val();;
 
 let facial = $('input:radio[name=facial]:checked').val();
 
 let estatoacustico = $('input:radio[name=estatoacustico]:checked').val();
 
 let glosofaringeo = $('input:radio[name=glosofaringeo]:checked').val();
 
 let neumogastrico = $('input:radio[name=neumogastrico]:checked').val();
 
 let espinal = $('input:radio[name=espinal]:checked').val();
 
 let hipo_mayor = $('input:radio[name=hipo_mayor]:checked').val();
 
 let sistema_motor = $('input:radio[name=sistema_motor]:checked').val();

 let marcha=$("#marcha").val();
 
  let espontanea= [];
 $("input[name='espontanea']:checked").each(function(){
            espontanea.push(this.value);
 });
 
  let a_la_orden_verbal= [];
 $("input[name='a_la_orden_verbal']:checked").each(function(){
            a_la_orden_verbal.push(this.value);
 });

 let a_estimulo_doloroso= [];
 $("input[name='a_estimulo_doloroso']:checked").each(function(){
            a_estimulo_doloroso.push(this.value);
 });
 
 
  let no_ay_respuesta= [];
 $("input[name='no_ay_respuesta']:checked").each(function(){
            no_ay_respuesta.push(this.value);
 });
 
  let orientada= [];
 $("input[name='orientada']:checked").each(function(){
            orientada.push(this.value);
 });
 
 
   let confusa= [];
 $("input[name='confusa']:checked").each(function(){
            confusa.push(this.value);
 });
 
  
let inapropriada= [];
 $("input[name='inapropriada']:checked").each(function(){
            inapropriada.push(this.value);
 });
 
 
 let incomprensible= [];
 $("input[name='incomprensible']:checked").each(function(){
            incomprensible.push(this.value);
 });
 
 
  let a_la_orden_verbal_6= [];
 $("input[name='a_la_orden_verbal_6']:checked").each(function(){
            a_la_orden_verbal_6.push(this.value);
 });
 
 
   let localizar_dolor= [];
 $("input[name='localizar_dolor']:checked").each(function(){
            localizar_dolor.push(this.value);
 });
 
    let retiro_ante_el_dolor= [];
 $("input[name='retiro_ante_el_dolor']:checked").each(function(){
            retiro_ante_el_dolor.push(this.value);
 });
 
 
     let flexion_normal= [];
 $("input[name='flexion_normal']:checked").each(function(){
            flexion_normal.push(this.value);
 });
 
 
     let extension= [];
 $("input[name='extension']:checked").each(function(){
            extension.push(this.value);
 });
 
 
      let no_hay_respuesta= [];
 $("input[name='no_hay_respuesta']:checked").each(function(){
            no_hay_respuesta.push(this.value);
 });
 

let bicipital=$("#bicipital").val();
let tricipital=$("#tricipital").val();
let aquileo_y_clonus=$("#aquileo_y_clonus").val();
let patelar_y_clonus=$("#patelar_y_clonus").val();
let dedo_dedo=$("#dedo_dedo").val(); 
let dedo_nariz=$("#dedo_nariz").val();
let talon_rod=$("#talon_rod").val();
let romberg=$("#romberg").val(); 
let sensibilidad1=$("#sensibilidad1").val();  
let sensibilidad2=$("#sensibilidad2").val();  
let fondo_de_ojo=$("#fondo_de_ojo").val();	

let is_neuro_empty1= $('#exam-neuro-fields').html();
let is_neuro_empty2= $('#exam-neuro-checkbox').html();
let id_hosp=<?=$id_hosp?>;
let user_id=<?=$user_id?>;
let d_centro=<?=$centro_id?>;
let id_patient=<?=$patient_id?>;


$.ajax({
url:"<?php echo base_url(); ?>save_no_discharge/saveHospitalizacionPatientMale",
data: {id_patient:id_patient,id_user:user_id,id_hosp:id_hosp,id_centro:d_centro,is_neuro_empty1:is_neuro_empty1, is_neuro_empty2:is_neuro_empty2,
//------ANT GENERAL
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
textmaltrato_g:textmaltrato_g,textabuso_g:textabuso_g,textneg_g:textneg_g,maltratoemo_g:maltratoemo_g,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,

//examen sistema--------------------------
sisneuro:sisneuro,neurologico:neurologico,siscardio:siscardio,cardiova:cardiova,
sist_uro:sist_uro,urogenital:urogenital,sis_mu_e:sis_mu_e,musculoes:musculoes,
sist_resp:sist_resp,nervioso:nervioso,linfatico:linfatico,digestivo:digestivo,
respiratorio:respiratorio,genitourinario:genitourinario,sist_diges:sist_diges,
sist_endo:sist_endo,endocrino:endocrino,sist_rela:sist_rela,otros_ex_sis:otros_ex_sis,
dorsales:dorsales,
//-----EXAM NEURO
marcha:marcha,sistema_motor:sistema_motor,hipo_mayor:hipo_mayor,espinal:espinal,neumogastrico:neumogastrico,glosofaringeo:glosofaringeo,estatoacustico:estatoacustico,
facial:facial,motor_ocu_ext:motor_ocu_ext,trigemino:trigemino,patetica:patetica,motor_ocr_com:motor_ocr_com,olfatorio:olfatorio,optico:optico,exam_gen_neuro:exam_gen_neuro,
a_estimulo_doloroso:a_estimulo_doloroso,no_ay_respuesta:no_ay_respuesta,orientada:orientada,confusa:confusa,inapropriada:inapropriada,incomprensible:incomprensible,a_la_orden_verbal:a_la_orden_verbal,
a_la_orden_verbal_6:a_la_orden_verbal_6,localizar_dolor:localizar_dolor,retiro_ante_el_dolor:retiro_ante_el_dolor,flexion_normal:flexion_normal,espontanea:espontanea,
extension:extension,no_hay_respuesta:no_hay_respuesta,bicipital:bicipital,tricipital:tricipital,aquileo_y_clonus:aquileo_y_clonus,patelar_y_clonus:patelar_y_clonus,
dedo_dedo:dedo_dedo,dedo_nariz:dedo_nariz,talon_rod:talon_rod,romberg:romberg,sensibilidad1:sensibilidad1,sensibilidad2:sensibilidad2,fondo_de_ojo:fondo_de_ojo,


},
method:"POST",

success:function(data){

location.reload(); 


},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.required-menu').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
 
 }
 
 
 
 
 function saveFormsNotDischargePatientFemale(){

//SAVE ANT GENERAL

 let todo_check = [];
 $("input[name='todo']:checked").each(function(){
            todo_check.push(this.value);
 });
 
 let car_nin_check = [];
 $("input[name='car_nin']:checked").each(function(){
            car_nin_check.push(this.value);
 });
let madre_check = [];
 $("input[name='car_m']:checked").each(function(){
            madre_check.push(this.value);
 });
		
let padre_check = [];
 $("input[name='car_p']:checked").each(function(){
            padre_check.push(this.value);
 });
 
let car_h_check = [];
 $("input[name='car_h']:checked").each(function(){
            car_h_check.push(this.value);
 });
 
 let car_pe_check = [];
 $("input[name='car_pe']:checked").each(function(){
            car_pe_check.push(this.value);
 });
 
 let car_text = $("#car_text").val();
 //===============================Hipertension==================
  let nin_check2 = [];
 $("input[name='hip_nin']:checked").each(function(){
            nin_check2.push(this.value);
 });
let madre_check2 = [];
 $("input[name='hip_m']:checked").each(function(){
            madre_check2.push(this.value);
 });
		
let padre_check2 = [];
 $("input[name='hip_p']:checked").each(function(){
            padre_check2.push(this.value);
 });
 
let h_check2 = [];
 $("input[name='hip_h']:checked").each(function(){
            h_check2.push(this.value);
 });
 
 let pe_check2 = [];
 $("input[name='hip_pe']:checked").each(function(){
            pe_check2.push(this.value);
 });
 
 let hip_text = $("#hip_text").val();
 
  //===============================Enf. Cerebrovascular==================
  
    let nin_check3 = [];
 $("input[name='ec_nin']:checked").each(function(){
            nin_check3.push(this.value);
 });
let madre_check3 = [];
 $("input[name='ec_m']:checked").each(function(){
            madre_check3.push(this.value);
 });
		
let padre_check3 = [];
 $("input[name='ec_p']:checked").each(function(){
            padre_check3.push(this.value);
 });
 
let h_check3 = [];
 $("input[name='ec_h']:checked").each(function(){
            h_check3.push(this.value);
 });
 
 let pe_check3 = [];
 $("input[name='ec_pe']:checked").each(function(){
            pe_check3.push(this.value);
 });
 
 let ec_text = $("#ec_text").val();
 
 
//============Epilepsie=============================
let nin_check4 = [];
$("input[name='ep_nin']:checked").each(function(){
nin_check4.push(this.value);
});
let madre_check4 = [];
$("input[name='ep_m']:checked").each(function(){
madre_check4.push(this.value);
});

let padre_check4 = [];
$("input[name='ep_p']:checked").each(function(){
padre_check4.push(this.value);
});

let h_check4 = [];
$("input[name='ep_h']:checked").each(function(){
h_check4.push(this.value);
});

let pe_check4 = [];
$("input[name='ep_pe']:checked").each(function(){
pe_check4.push(this.value);
});

let ep_text = $("#ep_text").val();
 //===============================Asma Bronquial==================
  
let nin_check5 = [];
$("input[name='as_nin']:checked").each(function(){
nin_check5.push(this.value);
});
let madre_check5 = [];
$("input[name='as_m']:checked").each(function(){
madre_check5.push(this.value);
});

let padre_check5 = [];
$("input[name='as_p']:checked").each(function(){
padre_check5.push(this.value);
});

let h_check5 = [];
$("input[name='as_h']:checked").each(function(){
h_check5.push(this.value);
});

let pe_check5 = [];
$("input[name='as_pe']:checked").each(function(){
pe_check5.push(this.value);
});

let as_text = $("#as_text").val();




 //===============================Enf. Repiratoria==================
  
let nin_check05 = []; 
$("input[name='enre_nin']:checked").each(function(){
nin_check05.push(this.value);
});
let madre_check05 = [];
$("input[name='enre_m']:checked").each(function(){
madre_check05.push(this.value);
});

let padre_check05 = [];
$("input[name='enre_p']:checked").each(function(){
padre_check05.push(this.value);
});

let h_check05 = [];
$("input[name='enre_h']:checked").each(function(){
h_check05.push(this.value);
});

let pe_check05 = [];
$("input[name='enre_pe']:checked").each(function(){
pe_check05.push(this.value);
});

let enre_text = $("#enre_text").val();



 //===============================Tuberculosis==================
  
let nin_check6 = [];
$("input[name='tub_nin']:checked").each(function(){
nin_check6.push(this.value);
});
let madre_check6 = [];
$("input[name='tub_m']:checked").each(function(){
madre_check6.push(this.value);
});

let padre_check6 = [];
$("input[name='tub_p']:checked").each(function(){
padre_check6.push(this.value);
});

let h_check6 = [];
$("input[name='tub_h']:checked").each(function(){
h_check6.push(this.value);
});

let pe_check6 = [];
$("input[name='tub_pe']:checked").each(function(){
pe_check6.push(this.value);
});

let tub_text = $("#tub_text").val();

 //===============================Diabetes==================
  
let nin_check7 = [];
$("input[name='dia_nin']:checked").each(function(){
nin_check7.push(this.value);
});
let madre_check7 = [];
$("input[name='dia_m']:checked").each(function(){
madre_check7.push(this.value);
});

let padre_check7 = [];
$("input[name='dia_p']:checked").each(function(){
padre_check7.push(this.value);
});

let h_check7 = [];
$("input[name='dia_h']:checked").each(function(){
h_check7.push(this.value);
});

let pe_check7 = [];
$("input[name='dia_pe']:checked").each(function(){
pe_check7.push(this.value);
});

let dia_text = $("#dia_text").val();
 //===============================Tiroides==================
  
let nin_check8 = [];
$("input[name='tir_nin']:checked").each(function(){
nin_check8.push(this.value);
});
let madre_check8 = [];
$("input[name='tir_m']:checked").each(function(){
madre_check8.push(this.value);
});

let padre_check8 = [];
$("input[name='tir_p']:checked").each(function(){
padre_check8.push(this.value);
});

let h_check8 = [];
$("input[name='tir_h']:checked").each(function(){
h_check8.push(this.value);
});

let pe_check8 = [];
$("input[name='tir_pe']:checked").each(function(){
pe_check8.push(this.value);
});

let tir_text = $("#tir_text").val();
 //===============================Hepatitis==================
  let hep_tipo = $("#hep_tipo").val();
let nin_check9 = [];
$("input[name='hep_nin']:checked").each(function(){
nin_check9.push(this.value);
});
let madre_check9 = [];
$("input[name='hep_m']:checked").each(function(){
madre_check9.push(this.value);
});

let padre_check9 = [];
$("input[name='hep_p']:checked").each(function(){
padre_check9.push(this.value);
});

let h_check9 = [];
$("input[name='hep_h']:checked").each(function(){
h_check9.push(this.value);
});

let pe_check9 = [];
$("input[name='hep_pe']:checked").each(function(){
pe_check9.push(this.value);
});

let hep_text = $("#hep_text").val();
 //===============================Enfermedades Renales==================
let nin_check10 = [];
$("input[name='enfr_nin']:checked").each(function(){
nin_check10.push(this.value);
});
let madre_check10 = [];
$("input[name='enfr_m']:checked").each(function(){
madre_check10.push(this.value);
});

let padre_check10 = [];
$("input[name='enfr_p']:checked").each(function(){
padre_check10.push(this.value);
});

let h_check10 = [];
$("input[name='enfr_h']:checked").each(function(){
h_check10.push(this.value);
});

let pe_check10 = [];
$("input[name='enfr_pe']:checked").each(function(){
pe_check10.push(this.value);
});

let enfr_text = $("#enfr_text").val();
 //===============================Falcemia==================
let nin_check11 = [];
$("input[name='falc_nin']:checked").each(function(){
nin_check11.push(this.value);
});
let madre_check11 = [];
$("input[name='falc_m']:checked").each(function(){
madre_check11.push(this.value);
});

let padre_check11 = [];
$("input[name='falc_p']:checked").each(function(){
padre_check11.push(this.value);
});

let h_check11 = [];
$("input[name='falc_h']:checked").each(function(){
h_check11.push(this.value);
});

let pe_check11 = [];
$("input[name='falc_pe']:checked").each(function(){
pe_check11.push(this.value);
});
let falc_text = $("#falc_text").val();
 //===============================Neoplasias==================
let neop_check12 = [];
$("input[name='neop_nin']:checked").each(function(){
neop_check12.push(this.value);
});
let madre_check12 = [];
$("input[name='neop_m']:checked").each(function(){
madre_check12.push(this.value);
});

let padre_check12 = [];
$("input[name='neop_p']:checked").each(function(){
padre_check12.push(this.value);
});

let h_check12 = [];
$("input[name='neop_h']:checked").each(function(){
h_check12.push(this.value);
});

let pe_check12 = [];
$("input[name='neop_pe']:checked").each(function(){
pe_check12.push(this.value);
});

let neop_text = $("#neop_text").val();
 //===============================ENf. Psiquiatricas==================
let psi_check13 = [];
$("input[name='psi_nin']:checked").each(function(){
psi_check13.push(this.value);
});
let madre_check13 = [];
$("input[name='psi_m']:checked").each(function(){
madre_check13.push(this.value);
});

let padre_check13 = [];
$("input[name='psi_p']:checked").each(function(){
padre_check13.push(this.value);
});

let h_check13 = [];
$("input[name='psi_h']:checked").each(function(){
h_check13.push(this.value);
});

let pe_check13 = [];
$("input[name='psi_pe']:checked").each(function(){
pe_check13.push(this.value);
});

let psi_text = $("#psi_text").val();
 //===============================Obesidad==================
let obs_check14 = [];
$("input[name='obs_nin']:checked").each(function(){
obs_check14.push(this.value);
});
let madre_check14 = [];
$("input[name='obs_m']:checked").each(function(){
madre_check14.push(this.value);
});

let padre_check14 = [];
$("input[name='obs_p']:checked").each(function(){
padre_check14.push(this.value);
});

let h_check14 = [];
$("input[name='obs_h']:checked").each(function(){
h_check14.push(this.value);
});

let pe_check14 = [];
$("input[name='obs_pe']:checked").each(function(){
pe_check14.push(this.value);
});

let obs_text = $("#obs_text").val();
 //===============================Ulcera Peptica==================
let ulp_check15 = [];
$("input[name='ulp_nin']:checked").each(function(){
ulp_check15.push(this.value);
});
let madre_check15 = [];
$("input[name='ulp_m']:checked").each(function(){
madre_check15.push(this.value);
});

let padre_check15 = [];
$("input[name='ulp_p']:checked").each(function(){
padre_check15.push(this.value);
});

let h_check15 = [];
$("input[name='ulp_h']:checked").each(function(){
h_check15.push(this.value);
});

let pe_check15 = [];
$("input[name='ulp_pe']:checked").each(function(){
pe_check15.push(this.value);
});

let ulp_text = $("#ulp_text").val();
 //===============================Artritis, Gota==================
let art_check16 = [];
$("input[name='art_nin']:checked").each(function(){
art_check16.push(this.value);
});
let madre_check16 = [];
$("input[name='art_m']:checked").each(function(){
madre_check16.push(this.value);
});

let padre_check16 = [];
$("input[name='art_p']:checked").each(function(){
padre_check16.push(this.value);
});

let h_check16 = [];
$("input[name='art_h']:checked").each(function(){
h_check16.push(this.value);
});

let pe_check16 = [];
$("input[name='art_pe']:checked").each(function(){
pe_check16.push(this.value);
});

let art_text = $("#art_text").val();


//===============================Enf. Hematológicas (Esp.)==================
let art_check016 = []; 
$("input[name='hem_nin']:checked").each(function(){
art_check016.push(this.value);
});
let madre_check016 = [];
$("input[name='hem_m']:checked").each(function(){
madre_check016.push(this.value);
});

let padre_check016 = [];
$("input[name='hem_p']:checked").each(function(){
padre_check016.push(this.value);
});

let h_check016 = [];
$("input[name='hem_h']:checked").each(function(){
h_check016.push(this.value);
});

let pe_check016 = [];
$("input[name='hem_pe']:checked").each(function(){
pe_check016.push(this.value);
});

let hem_text = $("#hem_text").val();


 //===============================Zika==================
let zika_check17 = [];
$("input[name='zika_nin']:checked").each(function(){
zika_check17.push(this.value);
});
let madre_check17 = [];
$("input[name='zika_m']:checked").each(function(){
madre_check17.push(this.value);
});

let padre_check17 = [];
$("input[name='zika_p']:checked").each(function(){
padre_check17.push(this.value);
});

let h_check17 = [];
$("input[name='zika_h']:checked").each(function(){
h_check17.push(this.value);
});

let pe_check17 = [];
$("input[name='zika_pe']:checked").each(function(){
pe_check17.push(this.value);
});

let zika_text = $("#zika_text").val();
let otros = $("#otros").val();
//=============================Desarollos==========================================
//let textgrueso = $("#text-grueso").val();
//let textfino = $("#text-fino").val();
//let textlenguage = $("#text-lenguage").val();
//let textsocial = $("#text-social").val();
let textmaltrato_g = $("#text-maltrato").val();
let textabuso_g = $("#text-abuso").val();
let textneg_g = $("#text-neg").val(); 
let maltratoemo_g = $("#maltrato-emo").val();
//====================Antecedentes alergicos y reaccion a medicamentos=========================================
let alimentos_al = $("#alimentos_al").val();
let medicamentos_al = $("#medicamentos_al").val();
let otros_al = $("#otros_al").val();
//=============================Otros antecedantes========================================
  let quirurgicos = $("#quirurgicos").val();
let gineco = $("#gineco").val();
let abdominal = $("#abdominal").val();
let toracica = $("#toracica").val();
let transfusion = $("#transfusion").val();
let otros1_g = $("#otros1").val();

//let otros2 = $("#otros2").val();
let grouposang = $("#grouposang").val();
let hepatis = $('input:radio[name=hepatis]:checked').val();
let hpv = $('input:radio[name=hpv]:checked').val();
let toxoide = $('input:radio[name=toxoide]:checked').val();
let tipificacion = $("#tipificacion").val();
let rhoa = $('input:radio[name=rhoa]:checked').val();
//=============Violencia======================================
let violencia1 = $("#violencia1").val();
let violencia2 = $("#violencia2").val();
let violencia3 = $("#violencia3").val();
let violencia4 = $("#violencia4").val();
//=============Habitos toxicos======================================
let hab_c_caf = $("#hab_c_caf").val();
let hab_f_caf = $("#hab_f_caf").val();
let hab_c_pip = $("#hab_c_pip").val();
let hab_f_pip = $("#hab_f_pip").val();
let hab_c_ciga = $("#hab_c_ciga").val();
let hab_f_ciga = $("#hab_f_ciga").val();
let hab_c_al = $("#hab_c_al").val();
let hab_f_al = $("#hab_f_al").val();
let hab_c_tab = $("#hab_c_tab").val();
let hab_f_tab = $("#hab_f_tab").val();
let hookah = $("#hookah").val();
let hab_f_hookah = $("#hab_f_hookah").val();
let hab_t_drug = $("#hab_t_drug").val();
let hab_c_drug = $("#hab_c_drug").val();
let hab_f_drug = $("#hab_f_drug").val();

//--------------------examen sistema--------------------------
let sisneuro  = $("#sisneuro").val();
let neurologico  = $("#neurologico").val();
let siscardio  = $("#siscardio").val();
let cardiova  = $("#cardiova").val();
let sist_uro  = $("#sist_uro").val();
let urogenital  = $("#urogenital").val();
let sis_mu_e  = $("#sis_mu_e").val();
let musculoes  = $("#musculoes").val();
let sist_resp  = $("#sist_resp").val();
let nervioso = $("#nervioso").val();
let linfatico = $("#linfatico").val();
let digestivo = $("#digestivo").val();
let respiratorio = $("#respiratorio").val();
let genitourinario = $("#genitourinario").val();
let sist_diges = $("#sist_diges").val();
let sist_endo = $("#sist_endo").val();
let endocrino = $("#endocrino").val();
let sist_rela = $("#sist_rela").val();
let otros_ex_sis = $("#otros_ex_sis").val();
let dorsales = $("#dorsales").val();
//--------------------------EXAM NEURO------------------------------------

let exam_gen_neuro=$("#exam_gen_neuro").val();

let olfatorio = $('input:radio[name=olfatorio]:checked').val();
let optico= $('input:radio[name=optico]:checked').val();
let motor_ocr_com = $('input:radio[name=motor_ocr_com]:checked').val();
 
 let patetica = $('input:radio[name=patetica]:checked').val();
 
 
 let trigemino = $('input:radio[name=trigemino]:checked').val();


let motor_ocu_ext = $('input:radio[name=motor_ocu_ext]:checked').val();;
 
 let facial = $('input:radio[name=facial]:checked').val();
 
 let estatoacustico = $('input:radio[name=estatoacustico]:checked').val();
 
 let glosofaringeo = $('input:radio[name=glosofaringeo]:checked').val();
 
 let neumogastrico = $('input:radio[name=neumogastrico]:checked').val();
 
 let espinal = $('input:radio[name=espinal]:checked').val();
 
 let hipo_mayor = $('input:radio[name=hipo_mayor]:checked').val();
 
 let sistema_motor = $('input:radio[name=sistema_motor]:checked').val();

 let marcha=$("#marcha").val();
 
  let espontanea= [];
 $("input[name='espontanea']:checked").each(function(){
            espontanea.push(this.value);
 });
 
  let a_la_orden_verbal= [];
 $("input[name='a_la_orden_verbal']:checked").each(function(){
            a_la_orden_verbal.push(this.value);
 });

 let a_estimulo_doloroso= [];
 $("input[name='a_estimulo_doloroso']:checked").each(function(){
            a_estimulo_doloroso.push(this.value);
 });
 
 
  let no_ay_respuesta= [];
 $("input[name='no_ay_respuesta']:checked").each(function(){
            no_ay_respuesta.push(this.value);
 });
 
  let orientada= [];
 $("input[name='orientada']:checked").each(function(){
            orientada.push(this.value);
 });
 
 
   let confusa= [];
 $("input[name='confusa']:checked").each(function(){
            confusa.push(this.value);
 });
 
  
let inapropriada= [];
 $("input[name='inapropriada']:checked").each(function(){
            inapropriada.push(this.value);
 });
 
 
 let incomprensible= [];
 $("input[name='incomprensible']:checked").each(function(){
            incomprensible.push(this.value);
 });
 
 
  let a_la_orden_verbal_6= [];
 $("input[name='a_la_orden_verbal_6']:checked").each(function(){
            a_la_orden_verbal_6.push(this.value);
 });
 
 
   let localizar_dolor= [];
 $("input[name='localizar_dolor']:checked").each(function(){
            localizar_dolor.push(this.value);
 });
 
    let retiro_ante_el_dolor= [];
 $("input[name='retiro_ante_el_dolor']:checked").each(function(){
            retiro_ante_el_dolor.push(this.value);
 });
 
 
     let flexion_normal= [];
 $("input[name='flexion_normal']:checked").each(function(){
            flexion_normal.push(this.value);
 });
 
 
     let extension= [];
 $("input[name='extension']:checked").each(function(){
            extension.push(this.value);
 });
 
 
      let no_hay_respuesta= [];
 $("input[name='no_hay_respuesta']:checked").each(function(){
            no_hay_respuesta.push(this.value);
 });
 

let bicipital=$("#bicipital").val();
let tricipital=$("#tricipital").val();
let aquileo_y_clonus=$("#aquileo_y_clonus").val();
let patelar_y_clonus=$("#patelar_y_clonus").val();
let dedo_dedo=$("#dedo_dedo").val(); 
let dedo_nariz=$("#dedo_nariz").val();
let talon_rod=$("#talon_rod").val();
let romberg=$("#romberg").val(); 
let sensibilidad1=$("#sensibilidad1").val();  
let sensibilidad2=$("#sensibilidad2").val();  
let fondo_de_ojo=$("#fondo_de_ojo").val();	

let is_neuro_empty1= $('#exam-neuro-fields').html();
let is_neuro_empty2= $('#exam-neuro-checkbox').html();
let id_hosp=<?=$id_hosp?>;
let user_id=<?=$user_id?>;
let d_centro=<?=$centro_id?>;
let id_patient=<?=$patient_id?>;


//AnT SSR---------------------------------------------------------------
let optradio = $('input:radio[name=optradio]:checked').val();
let edad = $("#edad").val();

let numero = $("#numero").val();
let sexual = $('input:radio[name=sexual]:checked').val();
let pareja = $("#pareja").val();
let califica_text = $("#califica_text").val();
let menarquia = $("#menarquia").val();
let planif_text = $("#planif_text").val();
let fecha_ul_m = $("#fecha_ul_m").val();
let fechaOvulacion = $("#fecha-ovulacion").text();
let semanaFertil = $("#semana-fertil").text();
let amenoreaText = $("#amenorea-text").text();
let amenoreaTiempo = $("#amenorea-tiempo").text();
let fecha_ul_m_info = $("#fecha_ul_m_info").text();
let amenorea_text = $("#amenorea-text").text();
let cliclo_text = $("#cliclo_text").val();
let dura_sang = $("#dura_sang").val();
let ant_pap_re_text = $("#ant_pap_re_text").val();
let realiza_auto_text = $("#realiza_auto_text").val();
let planif = $('input:radio[name=planif]:checked').val();
let embara = $('input:radio[name=embara]:checked').val();
let menaop = $('input:radio[name=menaop]:checked').val();
let cliclo = $('input:radio[name=cliclo]:checked').val();
let dismeno = $('input:radio[name=dismeno]:checked').val();
let ant_pap_re = $('input:radio[name=ant_pap_re]:checked').val();
let realiza_auto = $('input:radio[name=realiza_auto]:checked').val();
let fecha_ul_mama = $('input:radio[name=fecha_ul_mama]:checked').val();
let cant_sang = $('input:radio[name=cant_sang]:checked').val();
let nuligesta = $('input:radio[name=nuligesta]:checked').val();
let complica = $('input:radio[name=complica]:checked').val();
let complica_dur = $('input:radio[name=complica_dur]:checked').val();
let infec_tran = $('input:radio[name=infec_tran]:checked').val();
let califica = $('input:radio[name=califica]:checked').val();
let utilizo = $('input:radio[name=utilizo]:checked').val();
let sexual2 = $('input:radio[name=sexual2]:checked').val();
let fecha_ul_pap = $('input:radio[name=fecha_ul_pap]:checked').val();
let totalGest = $("#totalGest").val();
let e = $("#e").val();
let p = $("#p").val();
let a = $("#a").val();
let c = $("#c").val();
let complica_text = $("#complica_text").val();
let otro_infeccion1 = $("#otro_infeccion1").val();
let complica_dur_text = $("#complica_dur_text").val();
let sifilisc = [];
$("input[name='sifilis']:checked").each(function(){
sifilisc.push(this.value);
});

let gonorreac = [];
$("input[name='gonorrea']:checked").each(function(){
gonorreac.push(this.value);
});


let clamidiac = [];
$("input[name='clamidia']:checked").each(function(){
clamidiac.push(this.value);
});


/*----------------------------obstetrico-----------------------------------------	*/

let dia1  = $('input:radio[name=dia1]:checked').val();

let tbc1 = $('input:radio[name=tbc1]:checked').val();
let hip1 = $('input:radio[name=hip1]:checked').val();
let pelv = $('input:radio[name=pelv]:checked').val();
let inf = $('input:radio[name=inf]:checked').val();
let otros1 = $('input:radio[name=otros1]:checked').val();
let otros1_text = $("#otros1_text").val();

let otros2_text = $("#otros2_text").val();
let gem  = $('input:radio[name=gem]:checked').val();
let otros2 = $('input:radio[name=otros2]:checked').val();
let dia2   = $('input:radio[name=dia2]:checked').val();
let tbc2 = $('input:radio[name=tbc2]:checked').val();
let hip2 = $('input:radio[name=hip2]:checked').val();

let fiebre1 = [];
$("input[name='fiebre']:checked").each(function(){
fiebre1.push(this.value);
});
let artra1 = [];
$("input[name='artra']:checked").each(function(){
artra1.push(this.value);
});
let mia1 = [];
$("input[name='mia']:checked").each(function(){
mia1.push(this.value);
});
let exa1 = [];
$("input[name='exa']:checked").each(function(){
exa1.push(this.value);
});
let con1 = [];
$("input[name='con']:checked").each(function(){
con1.push(this.value);
});

let nig11 = [];
$("input[name='nig1']:checked").each(function(){
nig11.push(this.value);
});

let nig22 = [];
$("input[name='nig2']:checked").each(function(){
nig22.push(this.value);
});

let nig33 = [];
$("input[name='nig3']:checked").each(function(){
nig33.push(this.value);
});

let partos = $("#partos").val();
let arbotos = $("#arbotos").val();
let vaginales = $("#vaginales").val();
let viven = $("#viven").val();
let gestas = $("#gestas").val();
let cesareas = $("#cesareas").val();
let muertos1 = $("#muertos1").val();
let nacidov1 = $("#nacidov1").val();
let nacidom1 = $("#nacidom1").val();
let despues1s = $("#despues1s").val();
let otrosc = $("#otrosc").val();
let fin = $("#fin").val();
let rn = $("#rn").val();
let fecha1 = $("#fecha1").val();
let fecha2 = $("#fecha2").val();
let fecha3 = $("#fecha3").val();
let fecha4 = $("#fecha4").val();
let sono1 = $("#sono1").val();
let sono2 = $("#sono2").val();
let sono3 = $("#sono3").val();
let sono4 = $("#sono4").val();
let sonodia1 = $("#sonodia1").val();
let sonodia2 = $("#sonodia2").val();
let sonodia3 = $("#sonodia3").val();
let sonodia4 = $("#sonodia4").val();
let fpp1 = $("#fpp1").val();
let fpp2 = $("#fpp2").val();
let fpp3 = $("#fpp3").val();
let fpp4 = $("#fpp4").val();
let rest1 = $("#rest1").val();
let rest2 = $("#rest2").val();
let rest3 = $("#rest3").val();
let rest4 = $("#rest4").val();
let diarest1 = $("#dia-rest1").val();
let diarest2 = $("#dia-rest2").val();
let diarest3 = $("#dia-rest3").val();
let diarest4 = $("#dia-rest4").val();
let peso1 = $("#peso_obs").val();
let talla1 = $("#talla_obs").val(); 
let fum_cal_ges = $("#fum_cal_ges_obs").val();
let fpp_cal_ges = $("#fpp_cal_ges_obs").val();
let sem_act_a = $("#sem_act_a_obs").val();
let prev_act = $('input:radio[name=prev_act]:checked').val();  
let prev_act_mes = $("#prev_act_mes").val();
 let r2 = $("#2r").val();
 let sencibil = $('input:radio[name=sencibil]:checked').val(); 
let rh = $('input:radio[name=rh]:checked').val();  
let rh_option = $("#rh_option").val();   
let odont = $('input:radio[name=odont]:checked').val();   
let pelvis = $('input:radio[name=pelvis]:checked').val();    
let papani = $('input:radio[name=papani]:checked').val();
let colp = $('input:radio[name=colp]:checked').val(); 
let cevix = $('input:radio[name=cevix]:checked').val();
let vdrl11 = [];
$("input[name='vdrl1']:checked").each(function(){
vdrl11.push(this.value);
});	

let vdrl22 = [];
$("input[name='vdrl2']:checked").each(function(){
vdrl22.push(this.value);
});
let diasmes = $("#diasmes").val();
 
let pu_fecha1 = $("#pu_fecha1").val();
let pu_fecha2 = $("#pu_fecha2").val();
let pu_fecha3 = $("#pu_fecha3").val();
let pu_t1 = $("#pu_t1").val();
let pu_t2 = $("#pu_t2").val();
let pu_t3 = $("#pu_t3").val();
let pu_pul1 = $("#pu_pul1").val();
let pu_pul11 = $("#pu_pul11").val();
let pu_pul2 = $("#pu_pul2").val();
let pu_pul22 = $("#pu_pul22").val();
let pu_pul3 = $("#pu_pul3").val();
let pu_pul33 = $("#pu_pul33").val();
let pu_ten1 = $("#pu_ten1").val();
let pu_ten11 = $("#pu_ten11").val();
let pu_ten2 = $("#pu_ten2").val();
let pu_ten22 = $("#pu_ten22").val();  
let pu_ten3 = $("#pu_ten3").val();
let pu_ten33 = $("#pu_ten33").val(); 
let pu_inv1 = $("#pu_inv1").val();
let pu_inv2 = $("#pu_inv2").val();
let pu_inv3 = $("#pu_inv3").val();
let loquios1 = $("#loquios1").val();  
let loquios2 = $("#loquios2").val();
let loquios3 = $("#loquios3").val(); 


$.ajax({
url:"<?php echo base_url(); ?>save_no_discharge/saveHospitalizacionPatientFemale",
data: {id_patient:id_patient,id_user:user_id,id_hosp:id_hosp,id_centro:d_centro,is_neuro_empty1:is_neuro_empty1, is_neuro_empty2:is_neuro_empty2,
//------ANT GENERAL
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
textmaltrato_g:textmaltrato_g,textabuso_g:textabuso_g,textneg_g:textneg_g,maltratoemo_g:maltratoemo_g,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hookah:hookah,hab_f_hookah:hab_f_hookah,

//examen sistema--------------------------
sisneuro:sisneuro,neurologico:neurologico,siscardio:siscardio,cardiova:cardiova,
sist_uro:sist_uro,urogenital:urogenital,sis_mu_e:sis_mu_e,musculoes:musculoes,
sist_resp:sist_resp,nervioso:nervioso,linfatico:linfatico,digestivo:digestivo,
respiratorio:respiratorio,genitourinario:genitourinario,sist_diges:sist_diges,
sist_endo:sist_endo,endocrino:endocrino,sist_rela:sist_rela,otros_ex_sis:otros_ex_sis,
dorsales:dorsales,
//-----EXAM NEURO
marcha:marcha,sistema_motor:sistema_motor,hipo_mayor:hipo_mayor,espinal:espinal,neumogastrico:neumogastrico,glosofaringeo:glosofaringeo,estatoacustico:estatoacustico,
facial:facial,motor_ocu_ext:motor_ocu_ext,trigemino:trigemino,patetica:patetica,motor_ocr_com:motor_ocr_com,olfatorio:olfatorio,optico:optico,exam_gen_neuro:exam_gen_neuro,
a_estimulo_doloroso:a_estimulo_doloroso,no_ay_respuesta:no_ay_respuesta,orientada:orientada,confusa:confusa,inapropriada:inapropriada,incomprensible:incomprensible,a_la_orden_verbal:a_la_orden_verbal,
a_la_orden_verbal_6:a_la_orden_verbal_6,localizar_dolor:localizar_dolor,retiro_ante_el_dolor:retiro_ante_el_dolor,flexion_normal:flexion_normal,espontanea:espontanea,
extension:extension,no_hay_respuesta:no_hay_respuesta,bicipital:bicipital,tricipital:tricipital,aquileo_y_clonus:aquileo_y_clonus,patelar_y_clonus:patelar_y_clonus,
dedo_dedo:dedo_dedo,dedo_nariz:dedo_nariz,talon_rod:talon_rod,romberg:romberg,sensibilidad1:sensibilidad1,sensibilidad2:sensibilidad2,fondo_de_ojo:fondo_de_ojo,
//--SSR---------
fechaOvulacion:fechaOvulacion, semanaFertil:semanaFertil, amenoreaText:amenoreaText, amenoreaTiempo:amenoreaTiempo,
optradio:optradio,edad:edad,numero:numero,sexual:sexual,pareja:pareja,
califica:califica,califica_text:califica_text,utilizo:utilizo,sexual2:sexual2,
planif:planif,planif_text:planif_text,embara:embara,menarquia:menarquia,
fecha_ul_m:fecha_ul_m,menaop:menaop,cliclo:cliclo,cliclo_text:cliclo_text,
dura_sang:dura_sang,dismeno:dismeno,fecha_ul_pap:fecha_ul_pap,ant_pap_re:ant_pap_re,
ant_pap_re_text:ant_pap_re_text,realiza_auto:realiza_auto,realiza_auto_text:realiza_auto_text,
fecha_ul_mama:fecha_ul_mama,p:p,a:a,c:c,e:e,totalGest:totalGest,
otro_infeccion1:otro_infeccion1,cant_sang:cant_sang,nuligesta:nuligesta,complica:complica,
complica_text:complica_text,complica_dur:complica_dur,complica_dur_text:complica_dur_text,
sifilisc:sifilisc,gonorreac:gonorreac,clamidiac:clamidiac,infec_tran:infec_tran,
//--OBSTETRICO
dia1:dia1,tbc1:tbc1,hip1:hip1,pelv:pelv,inf:inf,otros1:otros1,otros1_text:otros1_text,
dia2:dia2,tbc2:tbc2,hip2:hip2,gem:gem,otros2:otros2,otros2_text:otros2_text,fiebre1:fiebre1,artra1:artra1,mia1:mia1,exa1:exa1,con1:con1,
nig11:nig11,nig22:nig22,nig33:nig33,partos:partos,arbotos:arbotos,vaginales:vaginales,viven:viven,gestas:gestas,cesareas:cesareas,
muertos1:muertos1,nacidov1:nacidov1,nacidom1:nacidom1,despues1s:despues1s,otrosc:otrosc,fin:fin,rn:rn,fecha1:fecha1,fecha2:fecha2,fecha3:fecha3,
fecha4:fecha4,sono1:sono1,sono2:sono2,sono3:sono3,sono4:sono4,fpp1:fpp1,fpp2:fpp2,fpp3:fpp3,fpp4:fpp4,rest1:rest1,rest2:rest2,rest3:rest3,rest4:rest4,
sonodia1:sonodia1,sonodia2:sonodia2,sonodia3:sonodia3,sonodia4:sonodia4,diarest1:diarest1,diarest2:diarest2,diarest3:diarest3,diarest4:diarest4,
peso1:peso1,talla1:talla1,fum_cal_ges:fum_cal_ges,fpp_cal_ges:fpp_cal_ges,sem_act_a:sem_act_a,prev_act:prev_act,prev_act_mes:prev_act_mes,r2:r2,
rh:rh,sencibil:sencibil,rh_option:rh_option,odont:odont,pelvis:pelvis,papani:papani,colp:colp,cevix:cevix,vdrl11:vdrl11,vdrl22:vdrl22,diasmes:diasmes,
pu_fecha1:pu_fecha1,pu_fecha2:pu_fecha2,pu_fecha3:pu_fecha3,pu_t1:pu_t1,pu_t2:pu_t2,pu_t3:pu_t3,pu_pul1:pu_pul1,pu_pul11:pu_pul11,pu_pul2:pu_pul2,
pu_pul22:pu_pul22,pu_pul3:pu_pul3,pu_pul33:pu_pul33,pu_ten1:pu_ten1,pu_ten11:pu_ten11,pu_ten2:pu_ten2,pu_ten22:pu_ten22,pu_ten3:pu_ten3,pu_ten33:pu_ten33,
pu_inv1:pu_inv1,pu_inv2:pu_inv2,pu_inv3:pu_inv3,loquios1:loquios1,loquios2:loquios2,loquios3:loquios3,
},
method:"POST",

success:function(data){
location.reload(); 

},


 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.required-menu').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
 
 }
 
 
 
 
 
 
 
 </script>