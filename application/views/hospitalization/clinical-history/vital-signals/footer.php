<script>
var signo_data = <?=$signo_data?>;
var rango =$('#patient_age_range').val();

var timerGli = null;
$('#'+signo_data+'_signo_v_glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

var glicemia= $('#'+signo_data+'_signo_v_glicemia').val();

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
$('#'+signo_data+'_signo_v_fr').keydown(function(){
	
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
var signo_v_fr= $('#'+signo_data+'_signo_v_fr').val();

if(signo_v_fr =="") 
{
$('#'+signo_data+'_signo_fr_result').text('');
} 
else if(40 <= signo_v_fr && signo_v_fr <= 45){
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger'  > anormal</i>");
}
}

function frecuencia_respiratoria2() {
	var signo_v_fr= $('#'+signo_data+'_signo_v_fr').val();
	
if(signo_v_fr =="") 
{
$('#'+signo_data+'_signo_fr_result').text('');
}	
	
else if(20 <= signo_v_fr && signo_v_fr <= 30){
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuencia_respiratoria3() {
	var signo_v_fr= $('#'+signo_data+'_signo_v_fr').val();
	
if(signo_v_fr =="") 
{
$('#'+signo_data+'_signo_fr_result').text('');
}	
	
else if(12 <= signo_v_fr && signo_v_fr <= 20){
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('#'+signo_data+'_signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



//-----------------frecuencia cardiaca---------------------------------------------
var timerFc = null;
$('#'+signo_data+'_signo_v_fc').keydown(function(){
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
	var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(60 <= signo_v_fc && signo_v_fc <= 80){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_r_n() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(120 <= signo_v_fc && signo_v_fc <= 140){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function f_c_inf() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 130){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function f_c_lm() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 120){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_pes() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 120){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function f_c_es() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 100){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}

function f_c_ado() {
var signo_v_fc= $('#'+signo_data+'_signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('#'+signo_data+'_signo_fc_result').text('');
}	
	
else if(70 <= signo_v_fc && signo_v_fc <= 80){
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}





//----frecuencia temperatura-------------------

var timerTp = null;
$('#'+signo_data+'_signo_v_temp').keydown(function(){
	
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
	var signo_v_temp= $('#'+signo_data+'_signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('#'+signo_data+'_signo_temp_result').text('');
}	
	
else if(signo_v_temp == 37){
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_adulto() {
	var signo_v_temp= $('#'+signo_data+'_signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('#'+signo_data+'_signo_temp_result').text('');
}	
	
else if(36.2 <= signo_v_temp && signo_v_temp <= 37.2){
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_esc() {
	var signo_v_temp= $('#'+signo_data+'_signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('#'+signo_data+'_signo_temp_result').text('');
}	
	
else if(37 <= signo_v_temp && signo_v_temp <= 37.5){
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_inf_lm_pes() {
	var signo_v_temp= $('#'+signo_data+'_signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('#'+signo_data+'_signo_temp_result').text('');
}	
	
else if(37.5 <= signo_v_temp && signo_v_temp <= 37.8){
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function tempo_r_n() {
	var signo_v_temp= $('#'+signo_data+'_signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('#'+signo_data+'_signo_temp_result').text('');
}	
	
else if(signo_v_temp == 38){
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial sistolica-------------------------------------------
var timerTa = null;
$('#'+signo_data+'_signo_v_ta_mm').keydown(function(){
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
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(104 <= signo_v_ta_mm && signo_v_ta_mm <= 124){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}



function ta_pres() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(99 <= signo_v_ta_mm && signo_v_ta_mm <= 112){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function ta_lm() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(90 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_inf() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(84 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_r_n() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(70 <= signo_v_ta_mm && signo_v_ta_mm <= 100){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_adol() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(118 <= signo_v_ta_mm && signo_v_ta_mm <= 132){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function ta_adulto() {
	var signo_v_ta_mm= $('#'+signo_data+'_signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('#'+signo_data+'_tens_art_sis_result').text('');
}	
	
else if(110 <= signo_v_ta_mm && signo_v_ta_mm <= 140){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial diastolica-------------------------------------------
var timerTad = null;
$('#'+signo_data+'_signo_v_ta_hg').keydown(function(){
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
	var signo_v_ta_hg= $('#'+signo_data+'_signo_v_ta_hg').val();

if(signo_v_ta_hg =="") 
{
$('#'+signo_data+'_tens_art_dias_result').text('');
}	
	
else if(70 <= signo_v_ta_hg && signo_v_ta_hg <= 90){
$('#'+signo_data+'_tens_art_dias_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('#'+signo_data+'_tens_art_dias_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


// calcul peso----------

$('#'+signo_data+'_signo_v_peso_lb').keyup(function () {
    var peso = $(this).val();
    var talla = $('#'+signo_data+'_signo_v_talla').val();
    if (peso == '') {
        $('#'+signo_data+'_signo_v_talla').prop('disabled', true);
        $('#'+signo_data+'_signo_v_talla').val('');
        $('#'+signo_data+'_signo_v_talla_imc').prop('disabled', true);
        $('#'+signo_data+'_signo_v_talla_imc').val('');
    } else {
        $('#'+signo_data+'_signo_v_talla').prop('disabled', false);
    }
    var ma = peso * 0.45;
    $('#'+signo_data+'_signo_v_peso_kg').val(ma);
    $('#'+signo_data+'_signo_v_peso_kg').number(true, 2);

    calculIMC();
});



$('#'+signo_data+'_signo_v_talla').keyup(function() {
	$('#'+signo_data+'_signo_v_talla_m').val($(this).val() * 39.37).number( true, 2);
	calculIMC();
	});



function calculIMC(){
	alert($('#'+signo_data+'_signo_v_talla').val());
 var peso =$('#'+signo_data+'_signo_v_peso_kg').val();
 var talla = $('#'+signo_data+'_signo_v_talla').val();
var cal1 = talla * talla;
var imc_result = peso / cal1;
$('#'+signo_data+'_signo_v_talla_imc').val(imc_result).number( true, 2 );	
}








</script>