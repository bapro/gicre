
<script>


$(".hab_t_drug").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});
//=========================WHEN ANTECEDENTE GENERAL IS NOT EMPTY==========================================
$(".hide-ant-save").hide();	
$("#save_edit_datam").hide();
$("#save_edit_datad").hide();
$("#save_edit_datadsam").hide();
$("#save_edit_datasa").hide();
$("#save_edit_otrosant").hide();
$("#save_edit_datav").hide();
$("#save_edit_datah").hide();	
$("#send_data").hide();
$(".view-all :input").prop("disabled", true);
$(".emp_checkbox1").prop("disabled", true);
$("#otros").prop("disabled", true);

$('#edit_datam').on('click', function() {
//$("#edit_datam").fadeOut(1000).html('<span class="load"> <img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
$("#edit_datam").hide();
$(".emp_checkbox1").prop("disabled", false);
$(".check-all").prop("disabled", false);
$("#otros").prop("disabled", false);
$("#save_edit_datam").slideDown();
$("#save_edit_datam").prop("disabled", false);
$("#select_all").prop("disabled", false);

})

//--------------Desarollo---------------------

$('#edit_datad').on('click', function() {
$("#edit_datad").hide();
$("#save_edit_datad").slideDown();
$("#save_edit_datad").prop("disabled", false);
$("#ant_al_rec_med .me").prop("disabled", false);

})
//--------------otros ant---------------------
$('#edit_dataotrosant').on('click', function() {
$("#edit_dataotrosant").hide();
$("#save_edit_otrosant").slideDown();
 //$('#show_otros_ant :input').prop('disabled', false);
$('#show_otros_ant').find('input:checkbox').prop("disabled", false); 
$('#show_otros_ant').find('input:radio').prop("disabled", false); 
$('#show_otros_ant').find('#grouposang').prop("disabled", false);
$('#show_otros_ant').find('#tipificacion').prop("disabled", false);
$('#show_otros_ant').find('input').prop("disabled", false);
})





$('#edit_datadsam').on('click', function() {
$("#edit_datadsam").hide();
$("#save_edit_datadsam").slideDown();
$("#save_edit_datadsam").prop("disabled", false);
//$("#sospecha_mal input").prop("disabled", false);
//$("#sospecha_mal textarea").prop("disabled", false);
$('#sospecha_mal').find('input:radio').prop("disabled", false); 
})




//--------------Violencia infantil---------------------

$('#edit_datav').on('click', function() {
//$("#edit_datav").fadeOut(1000).html('<span class="load"> <img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
$("#edit_datav").hide();
$("#save_edit_datav").slideDown();
$("#save_edit_datav").prop("disabled", false);
//$("#violenciaform :input").prop("disabled", false);
$('#violenciaform').find('input:checkbox').prop("disabled", false); 
})



//--------------Habitos toxicos---------------------
$('#edit_datah').on('click', function() {
$("#edit_datah").hide();
//$("#edit_datah").fadeOut(1000).html('<span class="load"> <img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
$("#save_edit_datah").slideDown();
$("#save_edit_datah").prop("disabled", false);
$("#habitost :input").prop("disabled", false);
})

//======================MODIFICATION============================================

//=============Habitos toxicos======================================
$('#save_edit_datah').on('click', function(event) {
event.preventDefault();
var modify_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();

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
var hab_t_drug = $("#hab_t_drug").val();
var hab_c_drug = $("#hab_c_drug").val();
var hab_f_drug = $("#hab_f_drug").val();

var hookah = $("#hookahe").val();
var hab_f_hookah = $("#hab_f_hookahe").val();
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateHabitosT')?>",
data: {hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hookah:hookah,hab_f_hookah:hab_f_hookah,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,hist_id:hist_id,modify_by:modify_by},
cache: true,

success:function(data){
$('#msght').html('Cambiado con éxito !').fadeIn('slow').delay(1000).fadeOut('slow');
$("#habitost :input").prop("disabled", true);
$("#save_edit_datah").hide();
$("#edit_datah").show();
}  
});
return false;
});
//=======Antecedentes alergicos

$('#save_edit_datad').on('click', function(event) {
event.preventDefault();
var medicamentos_al = $("#medicamentos_al").val();
var alimentos_al = $("#alimentos_al").val();
var otros_al = $("#otros_al").val();
var modify_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateAntAl')?>",
data: {otros_al:otros_al,medicamentos_al:medicamentos_al,alimentos_al:alimentos_al,hist_id:hist_id,modify_by:modify_by},
cache: true,
success:function(data){
$('.msgs22').html('Datos editados con éxito.').fadeIn('slow').delay(5000).fadeOut('slow');
$("#save_edit_datad").hide();
$("#edit_datad").show();
$("#ant_al_rec_med :input").prop("disabled", true);
}  
});
return false;
 
})
//=====================Otros ante===========================
$('#save_edit_otrosant').on('click', function(event) {
event.preventDefault();
var modify_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
//-----otros ant-----------------
var quirurgicos = $("#quirurgicos").val();
var gineco = $("#gineco").val();
var abdominal = $("#abdominal").val();
var toracica = $("#toracica").val();
var transfusion = $("#transfusion").val();
var otros1 = $("#otros1").val();
var selectmedic = $("#selectmedic").val();

var grouposang = $("#grouposang").val();
var hepatis = $('input:radio[name=hepatis]:checked').val();
var hpv = $('input:radio[name=hpv]:checked').val();
var toxoide = $('input:radio[name=toxoide]:checked').val();
var tipificacion = $("#tipificacion").val();
var rh = $('input:radio[name=rhch]:checked').val();


 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateAnteOtros')?>",
data: {hist_id:hist_id,modify_by:modify_by,quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1:otros1,
hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rh:rh,selectmedic:selectmedic},
cache: true,
success:function(data){
$('.msgs2').html('Datos editados con éxito.').fadeIn('slow').delay(2000).fadeOut('slow');
$("#save_edit_otrosant").hide();
$("#edit_dataotrosant").show();
 $('#show_otros_ant :input').prop('disabled', true);
}  
});
return false;
})
//=====================Violencia intra familial=============
$('#save_edit_datav').on('click', function(event) {
event.preventDefault();
var modify_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var violencia1 = $("#violencia1").val();
var violencia2 = $("#violencia2").val();
var violencia3 = $("#violencia3").val();
var violencia4 = $("#violencia4").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateViolencia')?>",
data: {violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,hist_id:hist_id,modify_by:modify_by},
cache: true,
success:function(data){
$('.msgs3').html('Datos editados con éxito.').fadeIn('slow').delay(2000).fadeOut('slow');
$(".habitos-t :input").prop("disabled", true);
$("#save_edit_datav").hide();
$("#edit_datav").show();
$("#violenciaform :input").prop("disabled", true);
}  
});
return false;
})
//--------------------------------------------------------




//----------------Marque lo positivo------------------------------------
$('#save_edit_datam').on('click', function(event) {
event.preventDefault();

var modify_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();

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
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateMarquePos')?>",
data: {car_nin_check:car_nin_check,madre_check:madre_check,padre_check:padre_check,car_h_check:car_h_check,car_pe_check:car_pe_check,car_text:car_text,
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
/*Zika*/zika_check17:zika_check17,madre_check17:madre_check17,padre_check17:padre_check17,h_check17:h_check17,pe_check17:pe_check17,zika_text:zika_text,
otros:otros,hist_id:hist_id,modify_by:modify_by},
cache: true,
success:function(data){
alert('Datos editados con éxito !');
//$('#result').html('Datos editados con éxito.').fadeIn('slow').delay(3000).fadeOut('slow');
$(".marque-lo-negativo :input").prop("disabled", true);
$("#save_edit_datam").hide();
$("#edit_datam").show();
/*setTimeout(function() {
window.location.href = "<?php echo base_url('admin/historial_medical/'.$id_historial)?>";
}, 4000);*/
}  
});
return false;
})










$('#save_edit_datadsam').on('click', function(event) {
event.preventDefault();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();

var text_maltrato = $("#text-maltrato").val();
var text_abuso = $("#text-abuso").val();
var text_neg = $("#text-neg").val();
var maltrato_emo = $("#maltrato-emo").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateDesarollo')?>",
data: {hist_id:hist_id,inserted_by:inserted_by,text_maltrato:text_maltrato,text_abuso:text_abuso,text_neg:text_neg,maltrato_emo:maltrato_emo},
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
success:function(data){
$('.msgs').html('Datos editados con éxito.').fadeIn('slow').delay(2000).fadeOut('slow');
$("#sospecha_mal input").prop("disabled", true);
$("#sospecha_mal textarea").prop("disabled", true);
$("#save_edit_datadsam").hide();
$("#edit_datadsam").show();
}  
});
return false;
});















//==========================================
</script>