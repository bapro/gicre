var signo_data = $('#data_eva_cardio__').val();

var rango =$('#_patient_age_range').val();

var timerGli = null;
$('#_'+signo_data+'_signo_v_glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

var glicemia= $('#_'+signo_data+'_signo_v_glicemia').val();

 if(glicemia !="" && (0  >= glicemia  || glicemia <=69 )){
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >"+value+"</i>").slideDown();		
}

else if(glicemia !="" && (70  >= glicemia  || glicemia <=140 )){
	var value="Glicemia " + glicemia + " : paciente normal";
$('.glicemia').html("<i class='bi bi-check-lg text-success'  >"+value+"</i>").slideDown();		
}
else if ((glicemia !="") && (140 > glicemia || glicemia <= 200)) {
	var value="Glicemia " + glicemia + " : paciente pre-diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger text-danger'  >"+value+"</i>").slideDown();	
} 

else if(glicemia !="" && 200 < glicemia)
{
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >"+value+"</i>").slideDown();	
}
else{
	$('.glicemia').hide();
}

}


//-----------------frecuencia respiratoire---------------------------------------------
var timerFr = null;
$(document).on('keydown', '.signo_v_fr_cd', function(event){ 

	 var funct;
       clearTimeout(timerFr); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funct=frecuencia_respiratoria1;
		   }
		   else if (rango=='infante (7 semanas -1 año)' || rango=='lactante mayor'  || rango=='pre-escolar')
		   {
			   funct=frecuencia_respiratoria2;
		   } 
		  
		   else if (rango=='escolar' || rango=='adolescente' || rango=='adulto')
		   {
			funct=frecuencia_respiratoria3;   
		   }
		  
		  
		   else{}
       timerFr = setTimeout(funct, 1000)
});



function frecuencia_respiratoria1() {
var signo_v_fr= $('.signo_v_fr_cd').val();

if(signo_v_fr =="") 
{
$('.signo_fr_result_cv').text('');
} 
else if(40 <= signo_v_fr && signo_v_fr <= 45){
$('.signo_fr_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result_cv').html("<i class='bi bi-exclamation-triangle text-danger'  > anormal</i>");
}
}

function frecuencia_respiratoria2() {
	var signo_v_fr= $('.signo_v_fr_cd').val();
	
if(signo_v_fr =="") 
{
$('.signo_fr_result_cv').text('');
}	
	
else if(20 <= signo_v_fr && signo_v_fr <= 30){
$('.signo_fr_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuencia_respiratoria3() {
	var signo_v_fr= $('.signo_v_fr_cd').val();
	
if(signo_v_fr =="") 
{
$('.signo_fr_result_cv').text('');
}	
	
else if(12 <= signo_v_fr && signo_v_fr <= 20){
$('.signo_fr_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



//-----------------frecuencia cardiaca---------------------------------------------
var timerFc = null;
$(document).on('keydown', '.signo_v_fc_cv', function(event){ 

	  var funfc;
       clearTimeout(timerFc); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funfc=f_c_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funfc=f_c_inf;
		   }

      else if (rango=='lactante mayor')
		   {
			   funfc=f_c_lm;
		   }		   
		   else if (rango=='pre-escolar')
		   {
			funfc=f_c_pes;   
		   } 
		    else if (rango=='escolar')
		   {
			funfc=f_c_es;   
		   }
		   else if (rango=='adolescente')
		   {
			funfc=f_c_ado;   
		   }
		   
		  else if (rango=='adulto')
		   {
			funfc=f_c_adult;   
		   }
		  
		  else{}
       timerFc = setTimeout(funfc, 1000)
});

function f_c_adult() {
	var signo_v_fc= $('.signo_v_fc_cv').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(60 <= signo_v_fc && signo_v_fc <= 80){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_r_n() {
var signo_v_fc= $('.signo_v_fc_cv').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(120 <= signo_v_fc && signo_v_fc <= 140){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function f_c_inf() {
var signo_v_fc= $('#_'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 130){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function f_c_lm() {
var signo_v_fc= $('.signo_v_fc_cv').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 120){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_pes() {
var signo_v_fc= $('#_'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 120){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_es() {
var signo_v_fc= $('.signo_v_fc_cv').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 100){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}

function f_c_ado() {
var signo_v_fc= $('.signo_v_fc_cv').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result_cv').text('');
}	
	
else if(70 <= signo_v_fc && signo_v_fc <= 80){
$('.signo_fc_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}





//----frecuencia temperatura-------------------

var timerTp = null;
$(document).on('keydown', '.signo_v_temp_cv', function(event){ 

	  var funtp;
       clearTimeout(timerTp); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funtp=tempo_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)' || rango=='lactante mayor' || rango=='pre-escolar')
		   {
			   funtp=tempo_inf_lm_pes;
		   }

      else if (rango=='escolar')
		   {
			   funtp=tempo_esc;
		   }		   
		   else if (rango=='adolescente')
		   {
			funtp=tempo_adol;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funtp=tempo_adulto;   
		   }
		  
		  else{}
       timerTp = setTimeout(funtp, 1000)
});

function tempo_adol() {
	var signo_v_temp= $('.signo_v_temp_cv').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result_cv').text('');
}	
	
else if(signo_v_temp == 37){
$('.signo_temp_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_adulto() {
	var signo_v_temp= $('.signo_v_temp_cv').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result_cv').text('');
}	
	
else if(36.2 <= signo_v_temp && signo_v_temp <= 37.2){
$('.signo_temp_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_esc() {
	var signo_v_temp= $('.signo_v_temp_cv').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result_cv').text('');
}	
	
else if(37 <= signo_v_temp && signo_v_temp <= 37.5){
$('.signo_temp_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_inf_lm_pes() {
	var signo_v_temp= $('.signo_v_temp_cv').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result_cv').text('');
}	
	
else if(37.5 <= signo_v_temp && signo_v_temp <= 37.8){
$('.signo_temp_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_r_n() {
	var signo_v_temp= $('.signo_v_temp_cv').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result_cv').text('');
}	
	
else if(signo_v_temp == 38){
$('.signo_temp_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial sistolica-------------------------------------------
var timerTa = null;
$(document).on('keydown', '.signo_v_ta_mm_cv', function(event){ 

	  var funta;
       clearTimeout(timerTa); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funta=ta_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funta=ta_inf;
		   }

       else if (rango=='lactante mayor')
		   {
			   funta=ta_lm;
		   }

        else if (rango=='pre-escolar')
		   {
			funta=ta_pres;   
		   } 

       else if (rango=='escolar')
		   {
			funta=ta_es;  
			
		   } 
		   
		   else if (rango=='adolescente')
		   {
			funta=ta_adol;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funta=ta_adulto;   
		   }
		  
		  else{}
       timerTa = setTimeout(funta, 1000)
});



function ta_es() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(104 <= signo_v_ta_mm && signo_v_ta_mm <= 124){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}



function ta_pres() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(99 <= signo_v_ta_mm && signo_v_ta_mm <= 112){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function ta_lm() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(90 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_inf() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(84 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_r_n() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(70 <= signo_v_ta_mm && signo_v_ta_mm <= 100){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_adol() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(118 <= signo_v_ta_mm && signo_v_ta_mm <= 132){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function ta_adulto() {
	var signo_v_ta_mm= $('.signo_v_ta_mm_cv').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result_cv').text('');
}	
	
else if(110 <= signo_v_ta_mm && signo_v_ta_mm <= 140){
$('.tens_art_sis_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial diastolica-------------------------------------------
var timerTad = null;
$(document).on('keydown', '.signo_v_ta_hg_cv', function(event){ 
	  var funtad;
       clearTimeout(timerTad); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funtad=ta_r_nd;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funtad=ta_infd;
		   }

       else if (rango=='lactante mayor')
		   {
			   funtad=ta_lmd;
		   }

        else if (rango=='pre-escolar')
		   {
			funtad=ta_presd;   
		   } 

       else if (rango=='escolar')
		   {
			funtad=ta_esd;   
		   } 
		   
		   else if (rango=='adolescente')
		   {
			funta=ta_adold;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funtad=ta_adultod;  
			
		   }
		  
		  else{}
       timerTad = setTimeout(funtad, 1000)
});


function ta_adultod() {
	var signo_v_ta_hg= $('.signo_v_ta_hg_cv').val();

if(signo_v_ta_hg =="") 
{
$('.tens_art_dias_result_cv').text('');
}	
	
else if(70 <= signo_v_ta_hg && signo_v_ta_hg <= 90){
$('.tens_art_dias_result_cv').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_dias_result_cv').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


// calcul peso----------
$(document).on('keyup', '.signo_v_peso_lb_cv', function(event){ 
    var peso = $(this).val();
    var talla = $('.signo_v_talla_cv').val();
    if (peso == '') {
        $('.signo_v_talla_cv').prop('disabled', true);
        $('.signo_v_talla_cv').val('');
        $('.signo_v_talla_imc_cv').prop('disabled', true);
        $('.signo_v_talla_imc_cv').val('');
    } else {
        $('.signo_v_talla_cv').prop('disabled', false);
    }
    var ma = peso * 0.45;
    $('.signo_v_peso_kg_cv').val(ma);
    $('.signo_v_peso_kg_cv').number(true, 2);

    calculIMC();
});

$(document).on('keyup', '.signo_v_talla_cv', function() {

	$('.signo_v_talla_m_cv').val($(this).val() * 39.37).number( true, 2);
	calculIMC();
	});



function calculIMC(){
	
 var peso =$('.signo_v_peso_lb_cv').val();
 var talla = $('.signo_v_talla_cv').val();
var cal1 = talla * talla;

var imc_result = peso / cal1;
$('.signo_v_talla_imc_cv').val(imc_result).number( true, 2 );	
}


//----------------------------------------------------------------------------------------------------------------


	$(document).on('click', '.pagination-eva_cardiovascular-li', function() {
         
		var display_content = "#eva_cardiovascular-form";
			var controller = "eva_cardiovascular";
			var pageNum = this.id;
			
			$("#pagination-eva_cardiovascular-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});	



$(document).on('click', '#resetFormEvaCardio', function(event){ 
        event.preventDefault();
		 $(window).scrollTop(0);
            var li = "pagination-eva_cardiovascular-li";
            var controller = "eva_cardiovascular";
            var div = "eva_cardiovascular-form";
            resetForm(li, controller, div);
            $("#pagination-eva_cardiovascular-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })

$(document).on('click', '#saveEditExamRstCrdv', function(event){ 
 event.preventDefault();
 $('#saveEditExamRstCrdv').prop("disabled", true);
saveEditExamRstCrdv($("#data_eva_cardio__").val());
});


 function keepSaving(response) {
 
 if (response.status == 2) {
            showalert(response.message, "alert-danger", "alert_placeholder_eva_cardio");
      $('#doNotSaveEvaCard').val(0);
          } else if (response.status == 1) {
		 saveAntPerFamCard($("#data_eva_cardio__").val());
	saveSignoVitales($("#data_eva_cardio__").val()) ;
	saveExamenFisico($("#data_eva_cardio__").val());
	saveHabTox($("#data_eva_cardio__").val());
	saveEditExamRstCrdv($("#data_eva_cardio__").val());
            $('#show-print-eva-cardio').html(response.print_btn);
			loadPagination("eva_cardiovascular", $("#id_patient_hist").val());
            showalert(response.message, "alert-success", "alert_placeholder_eva_cardio");
			    
          } else {
            showalert(response.message, "alert-danger", "alert_placeholder_eva_cardio");
			    $('#doNotSaveEvaCard').val(0);
          }
          $('#saveEditEvaCardioData').prop("disabled", false);
		  
		  }



function saveEditExamRstCrdv(idexrst) {
		
	    var rx_torax_radio = $('input:radio[name=' + idexrst + '_rx_torax_radio]:checked').val();
		   var ekg_radio_radio = $('input:radio[name=' + idexrst + '_ekg_radio_radio]:checked').val();
		      var otros_hallazgo_radio = $('input:radio[name=' + idexrst + '_otros_hallazgo_radio]:checked').val();
	   var rx_torax_txt = $("#" + idexrst + "_rx_torax_txt").val();
            var ekg_radio_txt = $("#" + idexrst + "_ekg_radio_txt").val();
            var otros_hallazgo_txt = $("#" + idexrst + "_otros_hallazgo_txt").val();
            var especifique = $("#" + idexrst + "_especifique").val();
            var evcconclusion = $("#" + idexrst + "_evcconclusion").val();
            var asa = $("#" + idexrst + "_asa").val();
          
      $.ajax({
        type: "POST", 
        url: $('#base_url').val()+"eva_cardiovascular/saveEditExamRstCrdv",
        data: {
          rx_torax_radio: rx_torax_radio,
                    ekg_radio_radio: ekg_radio_radio,
                    otros_hallazgo_radio: otros_hallazgo_radio,
                    rx_torax_txt: rx_torax_txt,
                    ekg_radio_txt: ekg_radio_txt,
                    otros_hallazgo_txt: otros_hallazgo_txt,
                    especifique: especifique,
                    evcconclusion: evcconclusion,
                    asa: asa,
                   id: idexrst
        },
      success: function(data) {
           showalert(data, "alert-success", "alert_placeholder_exam_rstcv");
           $('#saveEditExamRstCrdv').prop("disabled", false);
           },

      })
    }

$(document).on('click', '#_saveEditToxHab', function(event){ 
 event.preventDefault();
 $('#_saveEditToxHab').prop("disabled", true);
saveHabTox($("#data_eva_cardio__").val());
});
function saveHabTox(id_hab_tx){
	
      var hab_c_caf = $("#_" + id_hab_tx +"hab_c_caf").val();
	
	  var hab_f_caf = $("#_" + id_hab_tx + "hab_f_caf").val();
	  
      var hab_c_al = $("#_" + id_hab_tx + "hab_c_al").val();
      var hab_f_al = $("#_" + id_hab_tx + "hab_f_al").val();
      var hab_c_tab = $("#_" + id_hab_tx + "hab_c_tab").val();
      var hab_f_tab = $("#_" + id_hab_tx + "hab_f_tab").val();
      var hookah = $("#_" + id_hab_tx + "hookah").val();
      var hab_f_hookah = $("#_" + id_hab_tx + "hab_f_hookah").val();
      var hab_t_drug = $(".eva_card_droga_content").val();
      var hab_c_drug = $("#_" + id_hab_tx + "hab_c_drug").val();
      var hab_f_drug = $("#_" + id_hab_tx + "hab_f_drug").val();
      var desc_caf = $("#_" + id_hab_tx + "desc_caf").val();
      var desc_hooka = $("#_" + id_hab_tx + "desc_hooka").val();
      var desc_alco = $("#_" + id_hab_tx + "desc_alco").val();
      var desc_tab = $("#_" + id_hab_tx + "desc_tab").val();
      var desc_drug = $("#_" + id_hab_tx + "desc_drug").val();


      $.ajax({
        type: "POST",
         url: $('#base_url').val()+"eva_cardiovascular/saveHabToxico",
        data: {

          hab_c_caf: hab_c_caf,
          hab_f_caf: hab_f_caf,
          hab_c_al: hab_c_al,
          hab_f_al: hab_f_al,
          hab_c_tab: hab_c_tab,
          hab_f_tab: hab_f_tab,
          hab_t_drug: hab_t_drug,
          hab_c_drug: hab_c_drug,
          hab_f_drug: hab_f_drug,
          hookah: hookah,
          hab_f_hookah: hab_f_hookah,
          cafe_cant_desc: desc_caf,
           desc_alco: desc_alco,
          desc_tab: desc_tab,
          desc_drug: desc_drug,
          desc_hooka: desc_hooka,
           id:id_hab_tx
		 
        },
		   success: function(data) {
			  
           showalert(data, "alert-success", "_successEdithabT");
           $('#_saveEditToxHab').prop("disabled", false);
           },

      })
	
	
}


$(document).on('change', '.eva_card_droga', function(){ 

      $('.eva_card_droga_content').val($('.eva_card_droga_content').val() + $(this).val() + ', ');


    });






  function saveAntPerFamCard(edit_or_save_ant_general) {
	 
	  //ANTECEDENTE PERSONALES Y FAMILIAREA
      var check_all = [];
      $('input[name=_' + edit_or_save_ant_general + '_todo]:checked').each(function() {
        check_all.push(this.value);
      });

        var nin_check5 = [];
      $('input[name=_' + edit_or_save_ant_general + '_as_nin]:checked').each(function() {
        nin_check5.push(this.value);
      });
	  
	  
	   var pe_check5 = [];
      $('input[name=_' + edit_or_save_ant_general + '_as_pe]:checked').each(function() {
        pe_check5.push(this.value);
      });
	  
	    var padre_check5 = [];
      $('input[name=_' + edit_or_save_ant_general + '_as_p]:checked').each(function() {
        padre_check5.push(this.value);
      });
	  
	    var madre_check5 = [];
      $('input[name=_' + edit_or_save_ant_general + '_as_m]:checked').each(function() {
        madre_check5.push(this.value);
      });
	  
	   var h_check5 = [];
      $('input[name=_' + edit_or_save_ant_general + '_as_h]:checked').each(function() {
        h_check5.push(this.value);
      });
	  
	  var as_text = $('#_' + edit_or_save_ant_general + '_as_text').val();
	  
	   var nin_check6 = [];
      $('input[name=_' + edit_or_save_ant_general + '_tub_nin]:checked').each(function() {
        nin_check6.push(this.value);
      });
	  
	   var pe_check6 = [];
      $('input[name=_' + edit_or_save_ant_general + '_tub_pe]:checked').each(function() {
        pe_check6.push(this.value);
      });
	  
	   var padre_check6 = [];
      $('input[name=_' + edit_or_save_ant_general + '_tub_p]:checked').each(function() {
        padre_check6.push(this.value);
      });
	  
	   var madre_check6 = [];
      $('input[name=_' + edit_or_save_ant_general + '_tub_m]:checked').each(function() {
        madre_check6.push(this.value);
      });
	  
	    var h_check6 = [];
      $('input[name=_' + edit_or_save_ant_general + '_tub_h]:checked').each(function() {
        h_check6.push(this.value);
      });
	  
	  var tub_text = $('#_' + edit_or_save_ant_general + '_tub_text').val();
	  
	  
	  
	    var neum_nin = [];
      $('input[name=_' + edit_or_save_ant_general + '_neum_nin]:checked').each(function() {
        neum_nin.push(this.value);
      });
	     var neum_pe = [];
      $('input[name=_' + edit_or_save_ant_general + '_neum_pe]:checked').each(function() {
        neum_pe.push(this.value);
      });
	  
	   var neum_p = [];
      $('input[name=_' + edit_or_save_ant_general + '_neum_p]:checked').each(function() {
        neum_p.push(this.value);
      });
	   var neum_m = [];
      $('input[name=_' + edit_or_save_ant_general + '_neum_m]:checked').each(function() {
        neum_m.push(this.value);
      });
	   var neum_h = [];
      $('input[name=_' + edit_or_save_ant_general + '_neum_h]:checked').each(function() {
        neum_h.push(this.value);
      });
	   var num_text = $('#' + edit_or_save_ant_general + '_neum_text').val();
	   
	   var epoc_nin = [];
      $('input[name=_' + edit_or_save_ant_general + '_epoc_nin]:checked').each(function() {
        epoc_nin.push(this.value);
      });
	  
	    var epoc_pe = [];
      $('input[name=_' + edit_or_save_ant_general + '_epoc_pe]:checked').each(function() {
        epoc_pe.push(this.value);
      });
	     var epoc_p = [];
      $('input[name=_' + edit_or_save_ant_general + '_epoc_p]:checked').each(function() {
        epoc_p.push(this.value);
      });
	     var epoc_m = [];
      $('input[name=_' + edit_or_save_ant_general + '_epoc_m]:checked').each(function() {
        epoc_m.push(this.value);
      }); 
	     var epoc_h = [];
      $('input[name=_' + edit_or_save_ant_general + '_epoc_h]:checked').each(function() {
        epoc_h.push(this.value);
      });  
	   var epoc_text	= $('#_' + edit_or_save_ant_general + '_epoc_text').val();
     var hta_nin = [];
      $('input[name=_' + edit_or_save_ant_general + '_hta_nin]:checked').each(function() {
        hta_nin.push(this.value);
      });
	       var hta_pe = [];
      $('input[name=_' + edit_or_save_ant_general + '_hta_pe]:checked').each(function() {
        hta_pe.push(this.value);
      });
	     var hta_p = [];
      $('input[name=_' + edit_or_save_ant_general + '_hta_p]:checked').each(function() {
        hta_p.push(this.value);
      });
	   var hta_m= [];
      $('input[name=_' + edit_or_save_ant_general + '_hta_m]:checked').each(function() {
        hta_m.push(this.value);
      });
	  
	     var hta_h= [];
      $('input[name=_' + edit_or_save_ant_general + '_hta_h]:checked').each(function() {
        hta_h.push(this.value);
      });
	  
	  var hta_text= $('#_' + edit_or_save_ant_general + '_hta_text').val();
	       var iam_nin = [];
      $('input[name=_' + edit_or_save_ant_general + '_iam_nin]:checked').each(function() {
        iam_nin.push(this.value);
      });
	      var iam_pe	 = [];
      $('input[name=_' + edit_or_save_ant_general + '_iam_pe]:checked').each(function() {
        iam_pe.push(this.value);
      });
	   var iam_p = [];
      $('input[name=_' + edit_or_save_ant_general + '_iam_p]:checked').each(function() {
        iam_p.push(this.value);
      });
	  var iam_m = [];
      $('input[name=_' + edit_or_save_ant_general + '_iam_m]:checked').each(function() {
        iam_m.push(this.value);
      });
	   var iam_h	= [];
      $('input[name=_' + edit_or_save_ant_general + '_iam_h]:checked').each(function() {
        iam_h.push(this.value);
      });
	   var iam_text = $('#_' + edit_or_save_ant_general + '_iam_text').val();
	    var  insuf_card_nin= [];
      $('input[name=_' + edit_or_save_ant_general + '_insuf_card_nin]:checked').each(function() {
        insuf_card_nin.push(this.value);
      });
	   var  insuf_card_pe= [];
      $('input[name=_' + edit_or_save_ant_general + '_insuf_card_pe]:checked').each(function() {
        insuf_card_pe.push(this.value);
      })
	  
	   var  insuf_card_p= [];
      $('input[name=_' + edit_or_save_ant_general + '_insuf_card_p]:checked').each(function() {
        insuf_card_p.push(this.value);
      });
	  
	    var insuf_card_m= [];
      $('input[name=_' + edit_or_save_ant_general + '_insuf_card_m]:checked').each(function() {
        insuf_card_m.push(this.value);
      });
	 var  insuf_card_h= [];
      $('input[name=_' + edit_or_save_ant_general + '_insuf_card_h]:checked').each(function() {
        insuf_card_h.push(this.value);
      });
	   var insuf_card_text = $('#_' + edit_or_save_ant_general + '_insuf_card_text').val();
	     var angina_pecho_card_nin= [];
      $('input[name=_' + edit_or_save_ant_general + '_angina_pecho_card_nin]:checked').each(function() {
        angina_pecho_card_nin.push(this.value);
      });
	  var angina_pecho_card_pe= [];
      $('input[name=_' + edit_or_save_ant_general + '_angina_pecho_card_pe]:checked').each(function() {
        angina_pecho_card_pe.push(this.value);
      });
	  var angina_pecho_card_p= [];
      $('input[name=_' + edit_or_save_ant_general + '_angina_pecho_card_p]:checked').each(function() {
        angina_pecho_card_p.push(this.value);
      });
	 var  angina_pecho_card_m= [];
      $('input[name=_' + edit_or_save_ant_general + '_angina_pecho_card_m]:checked').each(function() {
        angina_pecho_card_m.push(this.value);
      });
	  var angina_pecho_card_h= [];
      $('input[name=_' + edit_or_save_ant_general + '_angina_pecho_card_h]:checked').each(function() {
        angina_pecho_card_h.push(this.value);
      });
	   var angina_pecho_card_text = $('#_' + edit_or_save_ant_general + '_angina_pecho_card_text').val();
	    var nin_check10 = [];
      $('input[name=_' + edit_or_save_ant_general + '_enfr_nin]:checked').each(function() {
        nin_check10.push(this.value);
      });
      var madre_check10 = [];
      $('input[name=_' + edit_or_save_ant_general + '_enfr_m]:checked').each(function() {
        madre_check10.push(this.value);
      });

      var padre_check10 = [];
      $('input[name=_' + edit_or_save_ant_general + '_enfr_p]:checked').each(function() {
        padre_check10.push(this.value);
      });

      var h_check10 = [];
      $('input[name=_' + edit_or_save_ant_general + '_enfr_h]:checked').each(function() {
        h_check10.push(this.value);
      });

      var pe_check10 = [];
      $('input[name=_' + edit_or_save_ant_general + '_enfr_pe]:checked').each(function() {
        pe_check10.push(this.value);
      });

      var enfr_text = $('#_' + edit_or_save_ant_general + '_enfr_text').val();
	    var hep_tipo = $('#_' + edit_or_save_ant_general + '_hep_tipo').val();
		 var nin_check9 = [];
      $('input[name=_' + edit_or_save_ant_general + '_hep_nin]:checked').each(function() {
        nin_check9.push(this.value);
      });
      var madre_check9 = [];
      $('input[name=_' + edit_or_save_ant_general + '_hep_m]:checked').each(function() {
        madre_check9.push(this.value);
      });

      var padre_check9 = [];
      $('input[name=_' + edit_or_save_ant_general + '_hep_p]:checked').each(function() {
        padre_check9.push(this.value);
      });

      var h_check9 = [];
      $('input[name=_' + edit_or_save_ant_general + '_hep_h]:checked').each(function() {
        h_check9.push(this.value);
      });

      var pe_check9 = [];
      $('input[name=_' + edit_or_save_ant_general + '_hep_pe]:checked').each(function() {
        pe_check9.push(this.value);
      });

      var hep_text = $('#_' + edit_or_save_ant_general + '_hep_text').val();
	    var nin_check7 = [];
      $('input[name=_' + edit_or_save_ant_general + '_dia_nin]:checked').each(function() {
        nin_check7.push(this.value);
      });
      var madre_check7 = [];
      $('input[name=_' + edit_or_save_ant_general + '_dia_m]:checked').each(function() {
        madre_check7.push(this.value);
      });

      var padre_check7 = [];
      $('input[name=_' + edit_or_save_ant_general + '_dia_p]:checked').each(function() {
        padre_check7.push(this.value);
      });

      var h_check7 = [];
      $('input[name=_' + edit_or_save_ant_general + '_dia_h]:checked').each(function() {
        h_check7.push(this.value);
      });

      var pe_check7 = [];
      $('input[name=_' + edit_or_save_ant_general + '_dia_pe]:checked').each(function() {
        pe_check7.push(this.value);
      });

      var dia_text = $('#_' + edit_or_save_ant_general + '_dia_text').val();
	  
	  var ant_al_radio = $('input:radio[name=' + edit_or_save_ant_general + '_ant_al_radio]:checked').val();
	   var ant_med = $('#_' + edit_or_save_ant_general + '_ant_med').val();
	   var ant_especifique=$('#_' + edit_or_save_ant_general + '_ant_especifique').val();
	  var ant_pan_tera =$('#_' + edit_or_save_ant_general + '_ant_pan_tera').val();
	  var ant_diagnosticos = $('#_' + edit_or_save_ant_general + '_ant_diagnosticos').val();
	  var ant_quirurgico= $('#_' + edit_or_save_ant_general + '_ant_quirurgico').val();
	
      $.ajax({
        type: "POST",
		url:$('#base_url').val()+"eva_cardiovascular/saveAntPerFam",
        data: {
          neum_nin:neum_nin,
			neum_pe:neum_pe,
			neum_p:neum_p,
			neum_m:neum_m,
			neum_h:neum_h,
			num_text:num_text,
			ant_pan_tera:ant_pan_tera,
			ant_diagnosticos:ant_diagnosticos,
			ant_quirurgico:ant_quirurgico,
			ant_med:ant_med,
		ant_especifique:ant_especifique,
		ant_al_radio:ant_al_radio,
		nin_check5:nin_check5,
       pe_check5 : pe_check5,

		padre_check5 : padre_check5,

		madre_check5 : madre_check5,

		h_check5 : h_check5,

		as_text : as_text,

		nin_check6 : nin_check6,

		pe_check6 : pe_check6,

		padre_check6 : padre_check6,

		madre_check6 : madre_check6,

		h_check6 : h_check6,

		tub_text : tub_text,

		nin_check6 :nin_check6,
		pe_check6 : pe_check6,

		padre_check6 :padre_check6,
		madre_check6 : madre_check6,
		h_check6 : h_check6,
		tub_text : tub_text,
		epoc_nin : epoc_nin,

		epoc_pe :epoc_pe,
		epoc_p : epoc_p,
		epoc_m : epoc_m, 
		epoc_h :epoc_h,  
		epoc_text	:epoc_text,
		hta_nin :hta_nin,
		hta_pe :hta_pe,
		hta_p : hta_p,
		hta_m: hta_m,

		hta_h: hta_h,

		hta_text: hta_text,
		iam_nin :iam_nin,
		iam_pe: iam_pe,
		iam_p :iam_p,
		iam_m :iam_m,
		iam_h	:iam_h,
		iam_text : iam_text,
		insuf_card_nin: insuf_card_nin,
		insuf_card_pe: insuf_card_pe,

		insuf_card_p:insuf_card_p,

		insuf_card_m: insuf_card_m,
		insuf_card_h: insuf_card_h,
		insuf_card_text : insuf_card_text,
		angina_pecho_card_nin:angina_pecho_card_nin,
		angina_pecho_card_pe: angina_pecho_card_pe,
		angina_pecho_card_p:angina_pecho_card_p,
		angina_pecho_card_m: angina_pecho_card_m,
		angina_pecho_card_h: angina_pecho_card_h,
		angina_pecho_card_text : angina_pecho_card_text,
		nin_check10 :nin_check10,
		madre_check10 : madre_check10,

		padre_check10 : padre_check10,

		h_check10 : h_check10,

		pe_check10 : pe_check10,

		enfr_text : enfr_text,
		hep_tipo : hep_tipo,
		nin_check9 : nin_check9,
		madre_check9 : madre_check9,

		padre_check9 :padre_check9,

		h_check9 :h_check9,

		pe_check9 :pe_check9,

		hep_text :hep_text,
		nin_check7 : nin_check7,
		madre_check7 :madre_check7,

		padre_check7 : padre_check7,

		h_check7 :h_check7,

		pe_check7 :pe_check7,

		dia_text : dia_text,
		id:edit_or_save_ant_general,
		  
        },
		 success: function(data) {
           showalert(data, "alert-success", "_successAntPerFam");
           $('#_saveEditAntGnrl').prop("disabled", false);
           },

      })


    }

//---------------------------------------------------------------------------
$(document).on('click', '#_saveEditExamFis', function(event){ 
 event.preventDefault();
 $('#_saveEditExamFis').prop("disabled", true);
saveExamenFisico($("#data_eva_cardio__").val());
});
 function saveExamenFisico(ex_fis_data) {
		
		var neuro_s = '';
		var neuro_text = $("#_" + ex_fis_data + "_neuro_textex").val();
		var cuello = '';
		var cuello_text = $("#_" + ex_fis_data + "_cuello_textex").val();
		var cabeza = '';
		var cabeza_text = $("#_" + ex_fis_data + "_cabeza_textex").val();
		var abd_insp = '';
		var abd_inspext = $("#_" + ex_fis_data + "_abd_inspext").val();
		var ext_sup_text = $("#_" + ex_fis_data + "_ext_sup_textex").val();
		var ext_sup = '';
		var ext_inf = '';
		var ext_inft = $("#_" + ex_fis_data + "_ext_inftex").val();
  
		var torax = '';
		var torax_text = $("#_" + ex_fis_data + "_torax_textex").val();
	


		
		   var neuro_normal = [];
     $('input[name=_' + ex_fis_data + '_neuro_normal]:checked').each(function() {
 
            neuro_normal.push(this.value);
 });

 
    var cabeza_normal = [];
     $('input[name=_' + ex_fis_data + '_cabeza_normal]:checked').each(function() {
 
            cabeza_normal.push(this.value);
 });
 
 
    var cuello_normal = [];
     $('input[name=_' + ex_fis_data + '_cuello_normal]:checked').each(function() {
 
            cuello_normal.push(this.value);
 });
 
 
    var abd_inspex_normal = [];
     $('input[name=_' + ex_fis_data + '_abd_inspex_normal]:checked').each(function() {
 
            abd_inspex_normal.push(this.value);
 });
 
 
    var ext_sup_normal = [];
     $('input[name=_' + ex_fis_data + '_ext_sup_normal]:checked').each(function() {
 
            ext_sup_normal.push(this.value);
 });
 
 
    var ext_infex_normal = [];
     $('input[name=_' + ex_fis_data + '_ext_infex_normal]:checked').each(function() {
 
            ext_infex_normal.push(this.value);
 });
 
 
    var toraxex_normal = [];
     $('input[name=_' + ex_fis_data + '_toraxex_normal]:checked').each(function() {
 
            toraxex_normal.push(this.value);
 });
		
		
		

      $.ajax({
        type: "POST", 
		url:$('#base_url').val()+"eva_cardiovascular/examenFisico",
        data: {
          neuro_s: neuro_s,
          neuro_text: neuro_text,
          cabeza: cabeza,
          cabeza_text: cabeza_text,
          cuello: cuello,
          cuello_text: cuello_text,
          abd_insp: abd_insp,
          abd_inspext: abd_inspext,
          ext_sup: ext_sup,
          ext_sup_text: ext_sup_text,
          ext_inf: ext_inf,
          ext_inft: ext_inft,
          torax: torax,
          torax_text: torax_text,
        
		 id: ex_fis_data,
		neuro_normal:neuro_normal,
		cabeza_normal:cabeza_normal,
		cuello_normal:cuello_normal,
		abd_inspex_normal:abd_inspex_normal,
		ext_sup_normal:ext_sup_normal,
		ext_infex_normal:ext_infex_normal,
		toraxex_normal:toraxex_normal,
		 },
      success: function(data) {
		  showalert(data, "alert-success", "_successEdiExamFis");
           $('#_saveEditExamFis').prop("disabled", false);
           },

      })
    }

 $(document).on('click', '#_saveEditSigVit', function(event){ 
 saveSignoVitales($("#data_eva_cardio__").val()) ;
 });

 function saveSignoVitales(signo_data) {
      //--SIGNOS VITALES
	
      var signo_v_fr = $('#_' + signo_data + '_signo_v_fr').val();
	 
      var signo_v_fc = $('#_' + signo_data + '_signo_v_fc').val();
      var signo_v_temp = $('#_' + signo_data + '_signo_v_temp').val();
      var signo_v_ta_mm = $('#_' + signo_data + '_signo_v_ta_mm').val();
      var signo_v_ta_hg = $('#_' + signo_data + '_signo_v_ta_hg').val();
      var signo_v_peso_lb = $('#_' + signo_data + '_signo_v_peso_lb').val();
      var signo_v_peso_kg = $('#_' + signo_data + '_signo_v_peso_kg').val();
      var signo_v_talla = $('#_' + signo_data + '_signo_v_talla').val();
      var signo_v_talla_m = $('#_' + signo_data + '_signo_v_talla_m').val();
      var signo_v_talla_imc = $('#_' + signo_data + '_signo_v_talla_imc').val();
      var signo_v_pulso = $('#_' + signo_data + '_signo_v_pulso').val();
      var signo_v_glicemia = $('#_' + signo_data + '_signo_v_glicemia').val();
      var signo_v_per_cef = $('#_' + signo_data + '_signo_v_per_cef').val();
      var signo_v_sat_ox = $('#_' + signo_data + '_signo_v_sat_ox').val();

	  var signo_fr_result = $('#_' + signo_data + '_signo_fr_result').html();
      var signo_fc_result = $('#_' + signo_data + '_signo_fc_result').html();
      var signo_temp_result = $('#_' + signo_data + '_signo_temp_result').html();
      var tens_art_sis_result = $('#_' + signo_data + '_tens_art_sis_result').html();
      var tens_art_dias_result = $('#_' + signo_data + '_tens_art_dias_result').html();
      var glicemia_rslt = $("._" + signo_data + "_glicemia").html();
	 
      $.ajax({
        type: "POST",
		 url: $('#base_url').val()+"eva_cardiovascular/saveSignosVitales",
        data: {

          signo_v_fr: signo_v_fr,
          signo_v_fc: signo_v_fc,
          signo_v_temp: signo_v_temp,
          signo_v_ta_mm: signo_v_ta_mm,
          signo_v_ta_hg: signo_v_ta_hg,
          signo_v_peso_lb: signo_v_peso_lb,
          signo_v_peso_kg: signo_v_peso_kg,
          signo_v_talla: signo_v_talla,
          signo_v_talla_m: signo_v_talla_m,
          signo_v_per_cef: signo_v_per_cef,
          signo_v_talla_imc: signo_v_talla_imc,
          signo_v_pulso: signo_v_pulso,
          signo_v_glicemia: signo_v_glicemia,
          /*signo vitales resultados */
          signo_fr_result: signo_fr_result,
          signo_fc_result: signo_fc_result,
          signo_temp_result: signo_temp_result,
          tens_art_sis_result: tens_art_sis_result,
          tens_art_dias_result: tens_art_dias_result,
          glicemia_rslt: glicemia_rslt,
		  signo_v_sat_ox:signo_v_sat_ox,
          id: signo_data,
		
        },
		 success: function(data) {
                         showalert(data, "alert-success", "_successEditSigVit");
                       $('#_saveEditSigVit').prop("disabled", false);
                    },
   })

    }


$(document).on('click', '#_saveEditAntGnrl', function(event){ 
 event.preventDefault();
 $('#_saveEditAntGnrl').prop("disabled", true);
saveAntPerFamCard($("#data_eva_cardio__").val());
});
     
$(document).on('click', '#saveEditEvaCardioData', function(event){ 
      event.preventDefault();
$('#saveEditEvaCardioData').prop("disabled", true);
      var card_eva_pre_quir = $("#card_eva_pre_quir").val();
   var card_eva_sin_act = $("#card_eva_sin_act").val();

      var card_eva_med_act = $("#card_eva_med_act").val();
      var card_eva_riesgos_ma = $("#card_eva_riesgos_ma").val();
      var card_eva_rad_to = $("#card_eva_rad_to").val();
      var card_eva_riesgos_me_txt = $("#card_eva_riesgos_me_txt").val();
      var card_eva_riesgos_ma_txt = $("#card_eva_riesgos_ma_txt").val();
      var card_eva_riesgos_int_txt = $("#card_eva_riesgos_int_txt").val();
      var card_eva_otro = $("#card_eva_otro").val();
      var card_eva_diag_obs_rec = $("#card_eva_diag_obs_rec").val();
      var card_eva_electrocar = $("#card_eva_electrocar").val();
      var card_eva_lab = $("#card_eva_lab").val();

      var card_eva_riesgos_me = [];

      $('input[name=card_eva_riesgos_me]:checked').each(function() {
        card_eva_riesgos_me.push(this.value);
      });
      var card_eva_riesgos_ma = [];
      $('input[name=card_eva_riesgos_ma]:checked').each(function() {
        card_eva_riesgos_ma.push(this.value);
      });
      var card_eva_riesgos_int = [];
      $('input[name=card_eva_riesgos_int]:checked').each(function() {
        card_eva_riesgos_int.push(this.value);
      });

     // $('#saveEditEvaCardio').prop("disabled", true);
      $.ajax({
        type: "POST",
		url:$('#base_url').val()+"eva_cardiovascular/save_cardio_vas",
        data: {
          card_eva_pre_quir: card_eva_pre_quir,
          card_eva_sin_act: card_eva_sin_act,
          card_eva_med_act: card_eva_med_act,
          card_eva_riesgos_me: card_eva_riesgos_me,
          card_eva_riesgos_ma: card_eva_riesgos_ma,
          card_eva_riesgos_int: card_eva_riesgos_int,
          card_eva_rad_to: card_eva_rad_to,
          card_eva_riesgos_me_txt: card_eva_riesgos_me_txt,
          card_eva_riesgos_ma_txt: card_eva_riesgos_ma_txt,
          card_eva_riesgos_int_txt: card_eva_riesgos_int_txt,
          card_eva_otro: card_eva_otro,
          card_eva_diag_obs_rec: card_eva_diag_obs_rec,
          card_eva_electrocar: card_eva_electrocar,
          card_eva_lab: card_eva_lab,
          eva_card_up_time: $('#eva_card_up_time').val(),
          eva_card_in_time: $('#eva_card_in_time').val(),
          eva_card_in_by: $('#eva_card_in_by').val(),
          eva_card_up_by: $('#eva_card_up_by').val(),
		  id_centro_evaCard:$('#id_centro_evaCard').val(),
		  id:$("#id_eva_cardiovacular").val(),
		  id_patient:$("#id_patient_hist").val()
        },
        dataType: 'json',
        cache: false,
        success: function(response) {
		 keepSaving(response);
         
        },

      });
	 
	/* setTimeout(function(){ 
  if($('#doNotSaveEvaCard').val()==1){
	  alert($('#doNotSaveEvaCard').val());
	saveAntPerFamCard($("#data_eva_cardio__").val());
	saveSignoVitales($("#data_eva_cardio__").val()) ;
	saveExamenFisico($("#data_eva_cardio__").val());
	saveHabTox($("#data_eva_cardio__").val());
	saveEditExamRstCrdv($("#data_eva_cardio__").val());
	
  }
}, 1000);*/
	 
	 
	 
	 


    });
	
	
	
	
	
	
	var modalCardioV= 0;
	
		$( "#cardiovasEval" ).on('show.bs.modal', function(event) {
			modalCardioV++;
			if (modalCardioV == 1) {
				
			loadPagination('eva_cardiovascular');
			}
		})
		
		
		 $(document).ready(function(){$(document).on('click', '._select_all', function(event){$(this).is(":checked",!0)?($("._emp_checkbox").prop("checked",!0),$("._check_madre").prop("disabled",!0),$("._check_padre").prop("disabled",!0),$("._check_hnos").prop("disabled",!0),$("._check_pers").prop("disabled",!0),$("._check_madre2").prop("checked",!1),$("._check_padre2").prop("checked",!1),$("._check_hnos2").prop("checked",!1),$("._check_pers2").prop("checked",!1),$("._check_madre2").prop("disabled",!0),$("._check_padre2").prop("disabled",!0),$("._check_hnos2").prop("disabled",!0),$("._check_pers2").prop("disabled",!0),$("._check_madre3").prop("disabled",!0),$("._check_padre3").prop("disabled",!0),$("._check_hnos3").prop("disabled",!0),$("._check_pers3").prop("disabled",!0),$("._check_madre4").prop("checked",!1),$("._check_padre4").prop("checked",!1),$("._check_hnos4").prop("checked",!1),$("._check_pers4").prop("checked",!1),$("._check_madre4").prop("disabled",!0),$("._check_padre4").prop("disabled",!0),$("._check_hnos4").prop("disabled",!0),$("._check_pers4").prop("disabled",!0),$("._check_madre5").prop("checked",!1),$("._check_padre5").prop("checked",!1),$("._check_hnos5").prop("checked",!1),$("._check_pers5").prop("checked",!1),$("._check_madre5").prop("disabled",!0),$("._check_padre5").prop("disabled",!0),$("._check_hnos5").prop("disabled",!0),$("._check_pers5").prop("disabled",!0),$("._check_madre6").prop("checked",!1),$("._check_padre6").prop("checked",!1),$("._check_hnos6").prop("checked",!1),$("._check_pers6").prop("checked",!1),$("._check_madre6").prop("disabled",!0),$("._check_padre6").prop("disabled",!0),$("._check_hnos6").prop("disabled",!0),$("._check_pers6").prop("disabled",!0),$("._check_madre7").prop("checked",!1),$("._check_padre7").prop("checked",!1),$("._check_hnos7").prop("checked",!1),$("._check_pers7").prop("checked",!1),$("._check_madre7").prop("disabled",!0),$("._check_padre7").prop("disabled",!0),$("._check_hnos7").prop("disabled",!0),$("._check_pers7").prop("disabled",!0),$("._check_madre8").prop("disabled",!0),$("._check_padre8").prop("disabled",!0),$("._check_hnos8").prop("disabled",!0),$("._check_pers8").prop("disabled",!0),$("._check_madre8").prop("checked",!1),$("._check_padre8").prop("checked",!1),$("._check_hnos8").prop("checked",!1),$("._check_pers8").prop("checked",!1),$("._check_madre9").prop("checked",!1),$("._check_padre9").prop("checked",!1),$("._check_hnos9").prop("checked",!1),$("._check_pers9").prop("checked",!1),$("._check_madre9").prop("disabled",!0),$("._check_padre9").prop("disabled",!0),$("._check_hnos9").prop("disabled",!0),$("._check_pers9").prop("disabled",!0),$("._check_madre10").prop("checked",!1),$("._check_padre10").prop("checked",!1),$("._check_hnos10").prop("checked",!1),$("._check_pers10").prop("checked",!1),$("._check_madre10").prop("disabled",!0),$("._check_padre10").prop("disabled",!0),$("._check_hnos10").prop("disabled",!0),$("._check_pers10").prop("disabled",!0),$("._check_madre11").prop("checked",!1),$("._check_padre11").prop("checked",!1),$("._check_hnos11").prop("checked",!1),$("._check_pers11").prop("checked",!1),$("._check_madre11").prop("disabled",!0),$("._check_padre11").prop("disabled",!0),$("._check_hnos11").prop("disabled",!0),$("._check_pers11").prop("disabled",!0),$("._check_madre12").prop("disabled",!0),$("._check_padre12").prop("disabled",!0),$("._check_hnos12").prop("disabled",!0),$("._check_pers12").prop("disabled",!0),$("._check_madre12").prop("checked",!1),$("._check_padre12").prop("checked",!1),$("._check_hnos12").prop("checked",!1),$("._check_pers12").prop("checked",!1),$("._check_madre13").prop("checked",!1),$("._check_padre13").prop("checked",!1),$("._check_hnos13").prop("checked",!1),$("._check_pers13").prop("checked",!1),$("._check_madre13").prop("disabled",!0),$("._check_padre13").prop("disabled",!0),$("._check_hnos13").prop("disabled",!0),$("._check_pers13").prop("disabled",!0),$("._check_madre14").prop("checked",!1),$("._check_padre14").prop("checked",!1),$("._check_hnos14").prop("checked",!1),$("._check_pers14").prop("checked",!1),$("._check_madre14").prop("disabled",!0),$("._check_padre14").prop("disabled",!0),$("._check_hnos14").prop("disabled",!0),$("._check_pers14").prop("disabled",!0),$("._check_madre15").prop("checked",!1),$("._check_padre15").prop("checked",!1),$("._check_hnos15").prop("checked",!1),$("._check_pers15").prop("checked",!1),$("._check_madre15").prop("disabled",!0),$("._check_padre15").prop("disabled",!0),$("._check_hnos15").prop("disabled",!0),$("._check_pers15").prop("disabled",!0),$("._check_madre16").prop("checked",!1),$("._check_padre16").prop("checked",!1),$("._check_hnos16").prop("checked",!1),$("._check_pers16").prop("checked",!1),$("._check_madre16").prop("disabled",!0),$("._check_padre16").prop("disabled",!0),$("._check_hnos16").prop("disabled",!0),$("._check_pers16").prop("disabled",!0),$("._check_madre17").prop("checked",!1),$("._check_padre17").prop("checked",!1),$("._check_hnos17").prop("checked",!1),$("._check_pers17").prop("checked",!1),$("._check_madre17").prop("disabled",!0),$("._check_padre17").prop("disabled",!0),$("._check_hnos17").prop("disabled",!0),$("._check_pers17").prop("disabled",!0)):($("._emp_checkbox").prop("checked",!1),$("._check_madre").prop("disabled",!1),$("._check_padre").prop("disabled",!1),$("._check_hnos").prop("disabled",!1),$("._check_pers").prop("disabled",!1),$("._check_madre2").prop("disabled",!1),$("._check_padre2").prop("disabled",!1),$("._check_hnos2").prop("disabled",!1),$("._check_pers2").prop("disabled",!1),$("._check_madre3").prop("disabled",!1),$("._check_padre3").prop("disabled",!1),$("._check_hnos3").prop("disabled",!1),$("._check_pers3").prop("disabled",!1),$("._check_madre4").prop("disabled",!1),$("._check_padre4").prop("disabled",!1),$("._check_hnos4").prop("disabled",!1),$("._check_pers4").prop("disabled",!1),$("._check_madre5").prop("disabled",!1),$("._check_padre5").prop("disabled",!1),$("._check_hnos5").prop("disabled",!1),$("._check_pers5").prop("disabled",!1),$("._check_madre6").prop("disabled",!1),$("._check_padre6").prop("disabled",!1),$("._check_hnos6").prop("disabled",!1),$("._check_pers6").prop("disabled",!1),$("._check_madre7").prop("disabled",!1),$("._check_padre7").prop("disabled",!1),$("._check_hnos7").prop("disabled",!1),$("._check_pers7").prop("disabled",!1),$("._check_madre8").prop("disabled",!1),$("._check_padre8").prop("disabled",!1),$("._check_hnos8").prop("disabled",!1),$("._check_pers8").prop("disabled",!1),$("._check_madre9").prop("disabled",!1),$("._check_padre9").prop("disabled",!1),$("._check_hnos9").prop("disabled",!1),$("._check_pers9").prop("disabled",!1),$("._check_madre10").prop("disabled",!1),$("._check_padre10").prop("disabled",!1),$("._check_hnos10").prop("disabled",!1),$("._check_pers10").prop("disabled",!1),$("._check_madre11").prop("disabled",!1),$("._check_padre11").prop("disabled",!1),$("._check_hnos11").prop("disabled",!1),$("._check_pers11").prop("disabled",!1),$("._check_madre12").prop("disabled",!1),$("._check_padre12").prop("disabled",!1),$("._check_hnos12").prop("disabled",!1),$("._check_pers12").prop("disabled",!1),$("._check_madre13").prop("disabled",!1),$("._check_padre13").prop("disabled",!1),$("._check_hnos13").prop("disabled",!1),$("._check_pers13").prop("disabled",!1),$("._check_madre14").prop("disabled",!1),$("._check_padre14").prop("disabled",!1),$("._check_hnos14").prop("disabled",!1),$("._check_pers14").prop("disabled",!1),$("._check_madre15").prop("disabled",!1),$("._check_padre15").prop("disabled",!1),$("._check_hnos15").prop("disabled",!1),$("._check_pers15").prop("disabled",!1),$("._check_madre16").prop("disabled",!1),$("._check_padre16").prop("disabled",!1),$("._check_hnos16").prop("disabled",!1),$("._check_pers16").prop("disabled",!1),$("._check_madre17").prop("disabled",!1),$("._check_padre17").prop("disabled",!1),$("._check_hnos17").prop("disabled",!1),$("._check_pers17").prop("disabled",!1))}),$(document).on('click', '._select_all', function(event){$(this).is(":checked",!0)?($("._emp_checkbox").prop("checked",!0),$(".text-marquo").prop("disabled",!0)):($("._emp_checkbox").prop("checked",!1),$(".text-marquo").prop("disabled",!1),$("#otros").prop("disabled",!1)),$("#select_count 2").html($("input._emp_checkbox:checked").length+" Seleccionada (s)")}),jQuery("._emp_checkbox").on("click",function(e){$(this).is(":checked",!0)?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),$("._niguno_checked1").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre").prop("disabled",!0),$("._check_padre").prop("disabled",!0),$("._check_hnos").prop("disabled",!0),$("._check_pers").prop("disabled",!0),$("._check_madre").prop("checked",!1),$("._check_padre").prop("checked",!1),$("._check_hnos").prop("checked",!1),$("._check_pers").prop("checked",!1),$("#car_text").prop("disabled",!0),$("#car_text").val("")):($("._check_madre").prop("disabled",!1),$("._check_padre").prop("disabled",!1),$("._check_hnos").prop("disabled",!1),$("._check_pers").prop("disabled",!1),$("#car_text").prop("disabled",!1))}),$("._niguno_checked2").on("click",function(e){$(this).is(":checked",!0)?($("._check_madre2").prop("disabled",!0),$("._check_padre2").prop("disabled",!0),$("._check_hnos2").prop("disabled",!0),$("._check_pers2").prop("disabled",!0),$("._check_madre2").prop("checked",!1),$("._check_padre2").prop("checked",!1),$("._check_hnos2").prop("checked",!1),$("._check_pers2").prop("checked",!1),$("#hip_text").prop("disabled",!0),$("#hip_text").val("")):($("._check_madre2").prop("disabled",!1),$("._check_padre2").prop("disabled",!1),$("._check_hnos2").prop("disabled",!1),$("._check_pers2").prop("disabled",!1),$("#hip_text").prop("disabled",!1),$(".unchecked_all").prop("checked",!1))}),$("._niguno_checked3").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre3").prop("disabled",!0),$("._check_padre3").prop("disabled",!0),$("._check_hnos3").prop("disabled",!0),$("._check_pers3").prop("disabled",!0),$("._check_madre3").prop("checked",!1),$("._check_padre3").prop("checked",!1),$("._check_hnos3").prop("checked",!1),$("._check_pers3").prop("checked",!1),$("#ec_text").prop("disabled",!0),$("#ec_text").val("")):($("._check_madre3").prop("disabled",!1),$("._check_padre3").prop("disabled",!1),$("._check_hnos3").prop("disabled",!1),$("._check_pers3").prop("disabled",!1),$("#ec_text").prop("disabled",!1))}),$("._niguno_checked4").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre4").prop("disabled",!0),$("._check_padre4").prop("disabled",!0),$("._check_hnos4").prop("disabled",!0),$("._check_pers4").prop("disabled",!0),$("._check_madre4").prop("checked",!1),$("._check_padre4").prop("checked",!1),$("._check_hnos4").prop("checked",!1),$("._check_pers4").prop("checked",!1),$("#ep_text").prop("disabled",!0),$("#ep_text").val("")):($("._check_madre4").prop("disabled",!1),$("._check_padre4").prop("disabled",!1),$("._check_hnos4").prop("disabled",!1),$("._check_pers4").prop("disabled",!1),$("#ep_text").prop("disabled",!1))}),$("._niguno_checked5").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre5").prop("disabled",!0),$("._check_padre5").prop("disabled",!0),$("._check_hnos5").prop("disabled",!0),$("._check_pers5").prop("disabled",!0),$("._check_madre5").prop("checked",!1),$("._check_padre5").prop("checked",!1),$("._check_hnos5").prop("checked",!1),$("._check_pers5").prop("checked",!1),$("#as_text").prop("disabled",!0),$("#as_text").val("")):($("._check_madre5").prop("disabled",!1),$("._check_padre5").prop("disabled",!1),$("._check_hnos5").prop("disabled",!1),$("._check_pers5").prop("disabled",!1),$("#as_text").prop("disabled",!1))}),$("._niguno_checked05").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre05").prop("disabled",!0),$("._check_padre05").prop("disabled",!0),$("._check_hnos05").prop("disabled",!0),$("._check_pers05").prop("disabled",!0),$("._check_madre05").prop("checked",!1),$("._check_padre05").prop("checked",!1),$("._check_hnos05").prop("checked",!1),$("._check_pers05").prop("checked",!1),$("#enre_text").prop("disabled",!0),$("#enre_text").val("")):($("._check_madre05").prop("disabled",!1),$("._check_padre05").prop("disabled",!1),$("._check_hnos05").prop("disabled",!1),$("._check_pers05").prop("disabled",!1),$("#enre_text").prop("disabled",!1))}),$("._niguno_checked6").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre6").prop("disabled",!0),$("._check_padre6").prop("disabled",!0),$("._check_hnos6").prop("disabled",!0),$("._check_pers6").prop("disabled",!0),$("._check_madre6").prop("checked",!1),$("._check_padre6").prop("checked",!1),$("._check_hnos6").prop("checked",!1),$("._check_pers6").prop("checked",!1),$("#tub_text").prop("disabled",!0),$("#tub_text").val("")):($("._check_madre6").prop("disabled",!1),$("._check_padre6").prop("disabled",!1),$("._check_hnos6").prop("disabled",!1),$("._check_pers6").prop("disabled",!1),$("#tub_text").prop("disabled",!1))}),$("._niguno_checked7").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre7").prop("disabled",!0),$("._check_padre7").prop("disabled",!0),$("._check_hnos7").prop("disabled",!0),$("._check_pers7").prop("disabled",!0),$("._check_madre7").prop("checked",!1),$("._check_padre7").prop("checked",!1),$("._check_hnos7").prop("checked",!1),$("._check_pers7").prop("checked",!1),$("#dia_text").prop("disabled",!0),$("#dia_text").val("")):($("._check_madre7").prop("disabled",!1),$("._check_padre7").prop("disabled",!1),$("._check_hnos7").prop("disabled",!1),$("._check_pers7").prop("disabled",!1),$("#dia_text").prop("disabled",!1))}),$("._niguno_checked8").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre8").prop("disabled",!0),$("._check_padre8").prop("disabled",!0),$("._check_hnos8").prop("disabled",!0),$("._check_pers8").prop("disabled",!0),$("._check_madre8").prop("checked",!1),$("._check_padre8").prop("checked",!1),$("._check_hnos8").prop("checked",!1),$("._check_pers8").prop("checked",!1),$("#tir_text").prop("disabled",!0),$("#tir_text").val("")):($("._check_madre8").prop("disabled",!1),$("._check_padre8").prop("disabled",!1),$("._check_hnos8").prop("disabled",!1),$("._check_pers8").prop("disabled",!1),$("#tir_text").prop("disabled",!1))}),$("._niguno_checked9").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre9").prop("disabled",!0),$("._check_padre9").prop("disabled",!0),$("._check_hnos9").prop("disabled",!0),$("._check_pers9").prop("disabled",!0),$("._check_madre9").prop("checked",!1),$("._check_padre9").prop("checked",!1),$("._check_hnos9").prop("checked",!1),$("._check_pers9").prop("checked",!1),$("#hep_tipo").prop("disabled",!0),$("#hep_text").prop("disabled",!0),$("#hep_text").val("")):($("._check_madre9").prop("disabled",!1),$("._check_padre9").prop("disabled",!1),$("._check_hnos9").prop("disabled",!1),$("._check_pers9").prop("disabled",!1),$("#hep_tipo").prop("disabled",!1),$("#hep_text").prop("disabled",!1))}),$("._niguno_checked10").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre10").prop("disabled",!0),$("._check_padre10").prop("disabled",!0),$("._check_hnos10").prop("disabled",!0),$("._check_pers10").prop("disabled",!0),$("._check_madre10").prop("checked",!1),$("._check_padre10").prop("checked",!1),$("._check_hnos10").prop("checked",!1),$("._check_pers10").prop("checked",!1),$("#enfr_text").prop("disabled",!0),$("#enfr_text").val("")):($("._check_madre10").prop("disabled",!1),$("._check_padre10").prop("disabled",!1),$("._check_hnos10").prop("disabled",!1),$("._check_pers10").prop("disabled",!1),$("#enfr_text").prop("disabled",!1))}),$("._niguno_checked11").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre11").prop("disabled",!0),$("._check_padre11").prop("disabled",!0),$("._check_hnos11").prop("disabled",!0),$("._check_pers10").prop("disabled",!0),$("._check_madre11").prop("checked",!1),$("._check_padre11").prop("checked",!1),$("._check_hnos11").prop("checked",!1),$("._check_pers11").prop("checked",!1),$("#falc_text").prop("disabled",!0),$("#falc_text").val("")):($("._check_madre11").prop("disabled",!1),$("._check_padre11").prop("disabled",!1),$("._check_hnos11").prop("disabled",!1),$("._check_pers11").prop("disabled",!1),$("#falc_text").prop("disabled",!1))}),$("._niguno_checked12").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre12").prop("disabled",!0),$("._check_padre12").prop("disabled",!0),$("._check_hnos12").prop("disabled",!0),$("._check_pers12").prop("disabled",!0),$("._check_madre12").prop("checked",!1),$("._check_padre12").prop("checked",!1),$("._check_hnos12").prop("checked",!1),$("._check_pers12").prop("checked",!1),$("#neop_text").prop("disabled",!0),$("#neop_text").val("")):($("._check_madre12").prop("disabled",!1),$("._check_padre12").prop("disabled",!1),$("._check_hnos12").prop("disabled",!1),$("._check_pers12").prop("disabled",!1),$("#neop_text").prop("disabled",!1))}),$("._niguno_checked13").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre13").prop("disabled",!0),$("._check_padre13").prop("disabled",!0),$("._check_hnos13").prop("disabled",!0),$("._check_pers13").prop("disabled",!0),$("._check_madre13").prop("checked",!1),$("._check_padre13").prop("checked",!1),$("._check_hnos13").prop("checked",!1),$("._check_pers13").prop("checked",!1),$("#psi_text").prop("disabled",!0),$("#psi_text").val("")):($("._check_madre13").prop("disabled",!1),$("._check_padre13").prop("disabled",!1),$("._check_hnos13").prop("disabled",!1),$("._check_pers13").prop("disabled",!1),$("#psi_text").prop("disabled",!1))}),$("._niguno_checked14").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre14").prop("disabled",!0),$("._check_padre14").prop("disabled",!0),$("._check_hnos14").prop("disabled",!0),$("._check_pers14").prop("disabled",!0),$("._check_madre14").prop("checked",!1),$("._check_padre14").prop("checked",!1),$("._check_hnos14").prop("checked",!1),$("._check_pers14").prop("checked",!1),$("#obs_text").prop("disabled",!0),$("#obs_text").val("")):($("._check_madre14").prop("disabled",!1),$("._check_padre14").prop("disabled",!1),$("._check_hnos14").prop("disabled",!1),$("._check_pers14").prop("disabled",!1),$("#obs_text").prop("disabled",!1))}),$("._niguno_checked15").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre15").prop("disabled",!0),$("._check_padre15").prop("disabled",!0),$("._check_hnos15").prop("disabled",!0),$("._check_pers15").prop("disabled",!0),$("._check_madre15").prop("checked",!1),$("._check_padre15").prop("checked",!1),$("._check_hnos15").prop("checked",!1),$("._check_pers15").prop("checked",!1),$("#ulp_text").prop("disabled",!0),$("#ulp_text").val("")):($("._check_madre15").prop("disabled",!1),$("._check_padre15").prop("disabled",!1),$("._check_hnos15").prop("disabled",!1),$("._check_pers15").prop("disabled",!1),$("#ulp_text").prop("disabled",!1))}),$("._niguno_checked16").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre16").prop("disabled",!0),$("._check_padre16").prop("disabled",!0),$("._check_hnos16").prop("disabled",!0),$("._check_pers16").prop("disabled",!0),$("._check_madre16").prop("checked",!1),$("._check_padre16").prop("checked",!1),$("._check_hnos16").prop("checked",!1),$("._check_pers16").prop("checked",!1),$("#art_text").prop("disabled",!0),$("#art_text").val("")):($("._check_madre16").prop("disabled",!1),$("._check_padre16").prop("disabled",!1),$("._check_hnos16").prop("disabled",!1),$("._check_pers16").prop("disabled",!1),$("#art_text").prop("disabled",!1))}),$("._niguno_checked016").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre016").prop("disabled",!0),$("._check_padre016").prop("disabled",!0),$("._check_hnos016").prop("disabled",!0),$("._check_pers016").prop("disabled",!0),$("._check_madre016").prop("checked",!1),$("._check_padre016").prop("checked",!1),$("._check_hnos016").prop("checked",!1),$("._check_pers016").prop("checked",!1),$("#hem_text").prop("disabled",!0),$("#hem_text").val("")):($("._check_madre016").prop("disabled",!1),$("._check_padre016").prop("disabled",!1),$("._check_hnos016").prop("disabled",!1),$("._check_pers016").prop("disabled",!1),$("#hem_text").prop("disabled",!1))}),$("._niguno_checked17").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($("._check_madre17").prop("disabled",!0),$("._check_padre17").prop("disabled",!0),$("._check_hnos17").prop("disabled",!0),$("._check_pers17").prop("disabled",!0),$("._check_madre17").prop("checked",!1),$("._check_padre17").prop("checked",!1),$("._check_hnos17").prop("checked",!1),$("._check_pers17").prop("checked",!1),$("#zika_text").prop("disabled",!0),$("#zika_text").val("")):($("._check_madre17").prop("disabled",!1),$("._check_padre17").prop("disabled",!1),$("._check_hnos17").prop("disabled",!1),$("._check_pers17").prop("disabled",!1),$("#zika_text").prop("disabled",!1))}),$("#bt").click(function(){id=$(this).attr("title"),"Ocultar"==(txt=$(this).text())?($(this).text("Mostrar"),$("section").css("margin-top","100px")):($(this).text("Ocultar"),$("section").css("margin-top","180px")),$("#"+id).toggle("slide")})}),$("#bt").submit(function(e){e.preventDefault()}),$(document).ready(function(){$("#saveIndicacionesMedicales").click(function(e){return $("#medicamento").val(),$("#frecuencia").val(),$("#cantidad").val(),$("#via").val(),$("#farmacia").val(),""==$("#medicamento").val()?($("#medicamento").focus(),$("#medicamento").css("border-color","red"),$("#errorBox").html("Selecciona el medicamento"),!1):""==$("#frecuencia").val()?($("#frecuencia").focus(),$("#frecuencia").css("border-color","red"),$("#errorBox").html("Selecciona la frecuencia"),!1):""==$("#cantidad").val()?($("#cantidad").focus(),$("#cantidad").css("border-color","red"),$("#errorBox").html("Selecciona la cantidad"),!1):""==$("#via").val()?($("#via").focus(),$("#via").css("border-color","red"),$("#errorBox").html("Selecciona el campo : via"),!1):""==$("#farmacia").val()?($("#farmacia").focus(),$("#farmacia").css("border-color","red"),$("#errorBox").html("Selecciona la farmacia"),!1):void 0})}),$(document).ready(function(){$("#medicamento").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#frecuencia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#cantidad").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#via").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#farmacia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(".checkininfancia").change(function(){$(".checkininfancia:not(:checked)").length?($("#infancia").prop("disabled",!0),$(".act_inf").hide(),$(".dea_inf").show()):($("#infancia").prop("disabled",!1),$(".act_inf").show(),$(".dea_inf").hide())}),$(".checkin_adol").change(function(){$(".checkin_adol:checked").length?($("#adolescencia").prop("disabled",!1),$(".act_adol").hide(),$(".dea_adol").show()):($("#adolescencia").prop("disabled",!0),$(".act_adol").show(),$(".dea_adol").hide())}),$(".checkin_adultez").change(function(){$(".checkin_adultez:checked").length?($("#adultez").prop("disabled",!1),$(".act_adul").hide(),$(".dea_adul").show()):($("#adultez").prop("disabled",!0),$(".act_adul").show(),$(".dea_adul").hide())}),$(".checkin_fami").change(function(){$(".checkin_fami:checked").length?($("#familiares").prop("disabled",!1),$(".act_fam").hide(),$(".dea_fam").show()):($("#familiares").prop("disabled",!0),$(".act_fam").show(),$(".dea_fam").hide())}),$(".checkin_medh").change(function(){$(".checkin_medh:checked").length?($("#medicamentos_hab").prop("disabled",!1),$(".act_medh").hide(),$(".dea_medh").show()):($("#medicamentos_hab").prop("disabled",!0),$(".act_medh").show(),$(".dea_medh").hide())}),$(".checkin_trau").change(function(){$(".checkin_trau:checked").length?($("#traumatismo").prop("disabled",!1),$(".act_trau").hide(),$(".dea_trau").show()):($("#traumatismo").prop("disabled",!0),$(".act_trau").show(),$(".dea_trau").hide())}),$("._check_neuro").change(function(){$("._check_neuro:checked").length?$("#neurologico").prop("disabled",!0):$("#neurologico").prop("disabled",!1)}),$("._check_abdo").change(function(){$("._check_abdo:checked").length?$("#abdomen").prop("disabled",!0):$("#abdomen").prop("disabled",!1)}),$("._check_cabe").change(function(){$("._check_cabe:checked").length?$("#cabeza").prop("disabled",!0):$("#cabeza").prop("disabled",!1)}),$("._check_pelvi").change(function(){$("._check_pelvi:checked").length?$("#pelvica").prop("disabled",!0):$("#pelvica").prop("disabled",!1)}),$("._check_evali").change(function(){$("._check_evali:checked").length?$("#evaluacion_mama").prop("disabled",!0):$("#evaluacion_mama").prop("disabled",!1)}),$("._check_insp").change(function(){$("._check_insp:checked").length?$("#inspeccion_genital").prop("disabled",!0):$("#inspeccion_genital").prop("disabled",!1)}),$("._check_torax").change(function(){$("._check_torax:checked").length?$("#torax").prop("disabled",!0):$("#torax").prop("disabled",!1)}),$("._check_columna").change(function(){$("._check_columna:checked").length?$("#columna_dorsal").prop("disabled",!0):$("#columna_dorsal").prop("disabled",!1)}),$("._check_corazon").change(function(){$("._check_corazon:checked").length?$("#corazon").prop("disabled",!0):$("#corazon").prop("disabled",!1)}),$("._check_ext").change(function(){$("._check_ext:checked").length?$("#extremidades").prop("disabled",!0):$("#extremidades").prop("disabled",!1)}),$("._check_pulm").change(function(){$("._check_pulm:checked").length?$("#pulmones").prop("disabled",!0):$("#pulmones").prop("disabled",!1)}),$("._check_otros").change(function(){$("._check_otros:checked").length?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),jQuery("input[name='grueso']").on("click",function(e){if($(".chkNo").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-1").slideDown(),i=0;i<100;i++)$(".triangle-1").fadeTo("slow",.1).fadeTo("slow",1);$(".text-grueso").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-1").stop(!0),$(".triangle-1").slideUp(),$(".text-grueso").prop("disabled",!0)}),jQuery("input[name='fino']").on("click",function(e){if($(".chkNo2").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-2").slideDown(),i=0;i<100;i++)$(".triangle-2").fadeTo("slow",.1).fadeTo("slow",1);$(".text-fino").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-2").stop(!0),$(".triangle-2").slideUp(),$(".text-fino").prop("disabled",!0)}),jQuery("input[name='lenguage']").on("click",function(e){if($(".chkNo3").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-3").slideDown(),i=0;i<100;i++)$(".triangle-3").fadeTo("slow",.1).fadeTo("slow",1);$(".text-lenguage").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-3").stop(!0),$(".triangle-3").slideUp(),$(".text-lenguage").prop("disabled",!0)}),jQuery("input[name='social']").on("click",function(e){if($(".chkNo4").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-4").slideDown(),i=0;i<100;i++)$(".triangle-4").fadeTo("slow",.1).fadeTo("slow",1);$(".text-social").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-4").stop(!0),$(".triangle-4").slideUp(),$(".text-social").prop("disabled",!0)});
 