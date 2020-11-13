<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/historial.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script>

$(".hide_sa").on('click', function () {
	 $(".historial_save").hide();
	 $(".hide-m-a").hide();
 })
 $('#configs').on('hidden.bs.modal', function () {
       $(".historial_save").show();
	   $(".hide-m-a").show();
    });
	
//------------------------------------------------------------------------	
	jQuery(function($) {
    var locations = {
        'Sistema neurológico': ['1'],
        'Sistema cardiovascular': ['2'],
        'Sistema urogenital': ['3'],
        'Sistema músculo esquelético': ['4'],
        'Sistema nervioso': ['5'],
        'Sistema linfatico': ['6'],
        'Sistema respiratorio': ['7'],
        'Sistema genitourinario': ['8'],
		'Cuello': ['9'],
        'Tórax': ['10'],
        'Mamas': ['11'],
        'Axilas': ['12'],
        'Abdomen': ['13'],
        'Tacto rectal': ['14'],
        'Genital masculino': ['15'],
        'Genital femenino': ['16'],
		'Tacto vaginal': ['17'],
        'Extremidades inf/sup': ['18'],
		'Sistema digestivo': ['19'],
		'Columna dorsal': ['20'],
		'Sistema endocrino': ['21'],
		'Relativo a': ['22'],
		'Tórax: Corazón y pulmones': ['23'],
		'Inspeccion Vulvar': ['24'],
		'Droga': ['25'],
    }
    
    var $locations = $('#location');
    $('#label_hist').change(function () {
        var label_hist = $(this).val(), lcns = locations[label_hist] || [];
        
        var html = $.map(lcns, function(lcn){
            return '<option value="' + lcn + '">' + lcn + '</option>'
        }).join('');
        $locations.html(html)
    });
});

//---------------------------------------------------------------



	$(".select-medic").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});
$(".hab_t_drug").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});

$("#view_medic").hide();

$('#hide-ant-save').click(function () {
$("#loadfse").fadeIn('slow').delay(10).fadeOut('slow').html('<span class="load"> <img width="180px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
 //$("#send-edit-ssr").show(); 
 $(".save_ant_ssr_hide").show();
 $(".disable-all :input").prop("disabled", false);
})

//----------------Tipificacion infomation--------------------------
 //mas_o_menos     tipificacion


$("#grouposang").on('change', function (e) {

//$("#loadf").fadeIn().fadeOut().html('<span class="load"> <img  width="180px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var grouposang = $(this).val();
$("#tip_g").val(grouposang);

});

//=======================tipification===========================
jQuery("input[name='tipificacion']").on('click', function(e) {
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});


//=======infeccion transmision sexual
function show1(){
$("#display_ifts").show('slow');
//$("#display_ifts").css("visibility", "visible");
}
function show2(){
$("#display_ifts").hide('slow');
//$("#display_ifts").css("visibility", "hidden");
}
//-----------------------------------------
function show3(){
$("#complica_dur_text").show('slow');
//$("#complica_dur_text").css("visibility", "visible");
}
function show4(){
$("#complica_dur_text").hide('slow');
//$("#complica_dur_text").css("visibility", "hidden");
}
//------------------------------------------------
function show5(){
$("#complica_text").show('slow');
//$("#complica_text").css("visibility", "visible");
}
function show6(){
$("#complica_text").hide('slow');
//$("#complica_text").css("visibility", "hidden");
}

//-----------------------------------------------------
function show7(){
$("#realiza_auto_text").show('slow');
//$("#realiza_auto_text").css("visibility", "visible");
}
function show8(){
$("#realiza_auto_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show9(){
$("#otros_t_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}



//--------------obstetrico----------------------
$('#modif_obs').click(function () {
$("#loadfse").fadeIn('slow').delay(10).fadeOut('slow').html('<span class="load"> <img width="180px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
 $(".save_ant_obs_hide").show();
 $(".deactivate_obs :input").prop("disabled", false);
})



//Control prenatal
$('#save_cont_pren').on('click', function(event) {
 $(".success-send-cont-pre").fadeIn(600).html('<span class="load"><img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
 var fecha   = $("#fecha").val();
 var semana  = $("#semana").val();
 var peso = $("#peso").val();
 
  var tension1   = $("#tension1").val();
 var tension11  = $("#tension11").val();
 
 var alt1 = $("#alt1").val();
 var alt11 = $("#alt11").val();
 var alt111 = $("#alt111").val();
 
  var fetal1   = $("#fetal1").val();
 var fetal11  = $("#fetal11").val();
 
 var edema1   = $("#edema1").val();
 var edema11  = $("#edema11").val();

 var otros   = $("#otros").val();
 var evolucion  = $("#evolucion").val();

var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();

//-----------------------------control prenatal2 --------------------------

 var fecha2   = $("#fecha2").val();
 var semana2  = $("#semana2").val();
 var peso2 = $("#peso2").val();
 
  var tension2   = $("#tension2").val();
 var tension22  = $("#tension22").val();
 
 var alt2 = $("#alt2").val();
 var alt22 = $("#alt22").val();
 var alt222 = $("#alt222").val();
 
  var fetal2   = $("#fetal2").val();
 var fetal22  = $("#fetal22").val();
 
 var edema2   = $("#edema2").val();
 var edema22  = $("#edema22").val();
 var otros2   = $("#otros2").val();
 var evolucion2  = $("#evolucion2").val();

 //---------------------------control prenatal3------------------------------
  var fecha3   = $("#fecha3").val();
 var semana3  = $("#semana3").val();
 var peso3 = $("#peso3").val();
 
  var tension3   = $("#tension3").val();
 var tension33  = $("#tension33").val();
 
 var alt3 = $("#alt3").val();
 var alt33 = $("#alt33").val();
 var alt333 = $("#alt333").val();
 
  var fetal3   = $("#fetal3").val();
 var fetal33  = $("#fetal33").val();
 
 var edema3   = $("#edema3").val();
 var edema33  = $("#edema33").val();
  var otros3   = $("#otros3").val();
 var evolucion3  = $("#evolucion3").val();
 
 //----------------------control prenatal4-----------------------------------
  var fecha4   = $("#fecha4").val();
 var semana4  = $("#semana4").val();
 var peso4 = $("#peso4").val();
 
  var tension4   = $("#tension4").val();
 var tension44  = $("#tension44").val();
 
 var alt4 = $("#alt4").val();
 var alt44 = $("#alt44").val();
 var alt444 = $("#alt444").val();
 
  var fetal4   = $("#fetal4").val();
 var fetal44  = $("#fetal44").val();
 
 var edema4   = $("#edema4").val();
 var edema44  = $("#edema44").val();
  var otros4   = $("#otros4").val();
 var evolucion4  = $("#evolucion4").val();
 
 //-------------------------contro prenatal5--------------------------------
 
  var fecha5   = $("#fecha5").val();
 var semana5  = $("#semana5").val();
 var peso5 = $("#peso5").val();
 
  var tension5   = $("#tension5").val();
 var tension55  = $("#tension55").val();
 
 var alt5 = $("#alt5").val();
 var alt55 = $("#alt55").val();
 var alt555 = $("#alt555").val();
 
  var fetal5   = $("#fetal5").val();
 var fetal55  = $("#fetal55").val();
 
 var edema5   = $("#edema5").val();
 var edema55  = $("#edema55").val();
  var otros5   = $("#otros5").val();
 var evolucion5  = $("#evolucion5").val();
 
 //-----------------------------contro prenatal6-----------------------------
 
  var fecha6   = $("#fecha6").val();
 var semana6  = $("#semana6").val();
 var peso6 = $("#peso6").val();
 
  var tension6   = $("#tension6").val();
 var tension66  = $("#tension66").val();
 
 var alt6 = $("#alt6").val();
 var alt66 = $("#alt66").val();
 var alt666 = $("#alt666").val();
 
  var fetal6   = $("#fetal6").val();
 var fetal66  = $("#fetal66").val();
 
 var edema6   = $("#edema6").val();
 var edema66  = $("#edema66").val();
  var otros6   = $("#otros6").val();
 var evolucion6  = $("#evolucion6").val();
 
 //--------------------contro prenatal7-------------------------------------
 
 var fecha7   = $("#fecha7").val();
 var semana7  = $("#semana7").val();
 var peso7 = $("#peso7").val();
 
  var tension7   = $("#tension7").val();
 var tension77  = $("#tension77").val();
 
 var alt7 = $("#alt7").val();
 var alt77 = $("#alt77").val();
 var alt777 = $("#alt777").val();
 
  var fetal7   = $("#fetal7").val();
 var fetal77  = $("#fetal77").val();
 
 var edema7   = $("#edema7").val();
 var edema77  = $("#edema77").val();
  var otros7   = $("#otros7").val();
 var evolucion7  = $("#evolucion7").val();
 
 //----------------------contro prenatal8------------------------------
  var fecha8   = $("#fecha8").val();
 var semana8  = $("#semana8").val();
 var peso8 = $("#peso8").val();
 
  var tension8   = $("#tension8").val();
 var tension88  = $("#tension88").val();
 
 var alt8 = $("#alt8").val();
 var alt88 = $("#alt88").val();
 var alt888 = $("#alt888").val();
 
  var fetal8   = $("#fetal8").val();
 var fetal88  = $("#fetal88").val();
 
 var edema8   = $("#edema8").val();
 var edema88  = $("#edema88").val();
  var otros8   = $("#otros8").val();
 var evolucion8  = $("#evolucion8").val();
 
 //------------------------------control prenal9---------------------------
 
  var fecha9   = $("#fecha9").val();
 var semana9  = $("#semana9").val();
 var peso9 = $("#peso9").val();
 
  var tension9   = $("#tension9").val();
 var tension99  = $("#tension99").val();
 
 var alt9 = $("#alt9").val();
 var alt99 = $("#alt99").val();
 var alt999 = $("#alt999").val();
 
  var fetal9   = $("#fetal9").val();
 var fetal99  = $("#fetal99").val();
 
 var edema9   = $("#edema9").val();
 var edema99  = $("#edema99").val();
  var otros9   = $("#otros9").val();
 var evolucion9  = $("#evolucion9").val();
 

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveConPrenatales')?>",
data:{ fecha:fecha, semana:semana,peso:peso,
tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
otros:otros,evolucion:evolucion,
//2
 fecha2:fecha2, semana2:semana2,peso2:peso2,
tension2:tension2,tension22:tension22,alt2:alt2,alt22:alt22,alt222:alt222,
fetal2:fetal2,fetal22:fetal22, edema2:edema2,edema22:edema22,
otros2:otros2,evolucion2:evolucion2,
//3
 fecha3:fecha3, semana3:semana3,peso3:peso3,
tension3:tension3,tension33:tension33,alt3:alt3,alt33:alt33,alt333:alt333,
fetal3:fetal3,fetal33:fetal33, edema3:edema3,edema33:edema33,
otros3:otros3,evolucion3:evolucion3,
//4
 fecha4:fecha4, semana4:semana4,peso4:peso4,
tension4:tension4,tension44:tension44,alt4:alt4,alt44:alt44,alt444:alt444,
fetal4:fetal4,fetal44:fetal44, edema4:edema4,edema44:edema44,
otros4:otros4,evolucion4:evolucion4,
//5
 fecha5:fecha5, semana5:semana5,peso5:peso5,
tension5:tension5,tension55:tension55,alt5:alt5,alt55:alt55,alt555:alt555,
fetal5:fetal5,fetal55:fetal55, edema5:edema5,edema55:edema55,
otros5:otros5,evolucion5:evolucion5,
//6
 fecha6:fecha6, semana6:semana6,peso6:peso6,
tension6:tension6,tension66:tension66,alt6:alt6,alt66:alt66,alt666:alt666,
fetal6:fetal6,fetal66:fetal66, edema6:edema6,edema66:edema66,
otros6:otros6,evolucion6:evolucion6,
//7
 fecha7:fecha7, semana7:semana7,peso7:peso7,
tension7:tension7,tension77:tension77,alt7:alt7,alt77:alt77,alt777:alt777,
fetal7:fetal7,fetal77:fetal77, edema7:edema7,edema77:edema77,
otros7:otros7,evolucion7:evolucion7,
//8
 fecha8:fecha8, semana8:semana8,peso8:peso8,
tension8:tension8,tension88:tension88,alt8:alt8,alt88:alt88,alt888:alt888,
fetal8:fetal8,fetal88:fetal88, edema8:edema8,edema88:edema88,
otros8:otros8,evolucion8:evolucion8,
//9
 fecha9:fecha9, semana9:semana9,peso9:peso9,
tension9:tension9,tension99:tension99,alt9:alt9,alt99:alt99,alt999:alt999,
fetal9:fetal9,fetal99:fetal99, edema9:edema9,edema99:edema99,
otros9:otros9,evolucion9:evolucion9,
inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#success-send-cont-pre').hide();
$("#hide_cont_pren").hide();
$("#show_cont_pren").html(data);



}  
});

return false;
});


//============Ant general======================================
$('#save_ant_gen').on('click', function(event) {
event.preventDefault();
var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
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
var textmaltrato = $("#text-maltrato").val();
var textabuso = $("#text-abuso").val();
var textneg = $("#text-neg").val(); 
var maltratoemo = $("#maltrato-emo").val();
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
var otros1 = $("#otros1").val();
var selectmedic = $("#selectmedic").val();
//var otros2 = $("#otros2").val();
var grouposang = $("#grouposang").val();
var hepatis = $('input:radio[name=hepatis]:checked').val();
var hpv = $('input:radio[name=hpv]:checked').val();
var toxoide = $('input:radio[name=toxoide]:checked').val();
var tipificacion = $('input:radio[name=tipificacion]:checked').val();
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

var hab_t_drug = $("#hab_t_drug").val();
var hab_c_drug = $("#hab_c_drug").val();
var hab_f_drug = $("#hab_f_drug").val();
    

 $.ajax({
type: "POST",
url: "<?=base_url('admin/saveAntecedentes')?>",
data: {todo_check:todo_check,car_nin_check:car_nin_check,madre_check:madre_check,padre_check:padre_check,car_h_check:car_h_check,car_pe_check:car_pe_check,car_text:car_text,
/*hipertencion*/nin_check2:nin_check2,madre_check2:madre_check2,padre_check2:padre_check2,h_check2:h_check2,pe_check2:pe_check2,hip_text:hip_text,
/*Enf. Cerebrovascular*/nin_check3:nin_check3,madre_check3:madre_check3,padre_check3:padre_check3,h_check3:h_check3,pe_check3:pe_check3,ec_text:ec_text,
/*Epilepsie*/nin_check4:nin_check4,madre_check4:madre_check4,padre_check4:padre_check4,h_check4:h_check4,pe_check4:pe_check4,ep_text:ep_text,
/*Asma Bronquial*/nin_check5:nin_check5,madre_check5:madre_check5,padre_check5:padre_check5,h_check5:h_check5,pe_check5:pe_check5,as_text:as_text,
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
/*Zika*/zika_check17:zika_check17,madre_check17:madre_check17,padre_check17:padre_check17,h_check17:h_check17,pe_check17:pe_check17,zika_text:zika_text,otros:otros,
textmaltrato:textmaltrato,textabuso:textabuso,textneg:textneg,maltratoemo:maltratoemo,
/*Antecedentes alergicos*/alimentos_al:alimentos_al,medicamentos_al:medicamentos_al,otros_al:otros_al,/*violencia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/selectmedic:selectmedic,quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1:otros1,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,
/*Habitos toxicos */hab_c_caf:hab_c_caf,hab_f_caf:hab_f_caf,hab_c_pip:hab_c_pip,hab_f_pip:hab_f_pip,hab_c_ciga:hab_c_ciga,hab_f_ciga:hab_f_ciga,hab_c_al:hab_c_al,hab_f_al:hab_f_al,hab_c_tab:hab_c_tab,hab_f_tab:hab_f_tab,hab_t_drug:hab_t_drug,hab_c_drug:hab_c_drug,hab_f_drug:hab_f_drug,
hist_id:hist_id,inserted_by:inserted_by},

cache: true,

success:function(data){
$('#msgs').html('Operación hecho con éxito.').fadeIn('slow').delay(5000).fadeOut('slow');
//$("#home :input").prop("disabled", true);
//$("#show_edit_ant_general").show();
setTimeout(function() {
window.location.href = "<?php echo base_url('admin/historial_medical/'.$id_historial)?>";
}, 4000);

}  
});
return false;
});

//-------------------------------------------------------------------------------


</script>