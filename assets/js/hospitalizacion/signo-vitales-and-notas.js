$(document).ready(function() {
	
	
// pagination data notas

		var signo_id  = $("#signo_id").val(); 
	 var searchNotaNombre  = $("#searchNotaNombre").val();
	$("#"+signo_id+"searchNombreNotaEd").keyup(function(){
		
		//$("#search-box").css("background","#FFF url(loaderIcon.gif) no-repeat 165px");
		$.ajax({
		type: "POST",
			url: searchNotaNombre,
		data:{keyword:$(this).val(), signo_id:signo_id},
		success: function(data){
			setTimeout(function() {
				$("#suggesstion-box-").show();
				$("#suggesstion-box-").html(data);
				$("#search-box").css("background","#FFF");}
				, 1000);
		},

		});
	});


var user_id  = $("#user_id").val();   
var id_patient  = $("#id_patient").val();
 var searchNombreNotaUrl  = $("#searchNombreNotaUrl").val();
  var cancelThisNota  = $("#cancelThisNota").val();
  var saveNotaUrl  = $("#saveNotaUrl").val(); 
var loadSignoUlr  = $("#loadSignoUlr").val();
var isFormExActive  = $("#isFormExActive").val(); 
var searchNombreNotaEdValue  = $("#searchNombreNotaEdValue").val(); 

var id_sig_v  = $("#id_notas_edit_").val(); 

var paginateSignosVitalesUrl  = $("#paginateSignosVitalesUrl").val(); 


//-----------paginate-------------------------
function paginateSignosVitalesN(){
$.ajax({
url:paginateSignosVitalesUrl,
data: {user_id: user_id, id_historial:id_patient},
method:"POST",
success:function(data){

$('#paginateSignosVitalesN').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginateSignosVitalesN').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}

if(id_sig_v ==""){
paginateSignosVitalesN();
}


function loadSignoForm(){
	
}

$('#crear-nuevo-signo-n').on('click', function(event) {
	$(".hide-signo-vitales-n").show();
	var id="";
	$("#signo_id").val(0);
	$(".disable-all :input").prop("disabled", false);
	$(".disable-all :input").val("");
	$("#content-signo-vitales-n").hide();
	$("#"+signo_id+"result-nota-operation").html("");
	
	paginateSignosVitalesN();
	loadSigno(id);

});

$('#cancel-this-nota').on('click', function(event) {
event.preventDefault();
if (confirm("Quires eliminar nota <?=$inserted_time?>")) {
 $.ajax({
type: "POST",
url: cancelThisNota,
data: {id:id_sig_v},
success:function(data){
	paginateSignosVitalesN();
$('#cancel-this-nota').html('Eliminado').prop('disabled',true);
},
});
}
})

$('#updateNota').after('<div id="is-saved" style="display:none">0</div>');
$('#updateNota').on('click', function (e) {
	event.preventDefault();
	
	if($('#is-saved').html()==0 ){
		$('#is-saved').html(1);
	$('#updateNota').html('Guardar');
	$(".disable-all :input").prop("disabled", false);
	}else{
		saveNotaDatos(id_sig_v);
	}
	
})
$('#save_exam_fisp').on('click', function (e) {
var id="";
saveNotaDatos(id);	
})	


	
function saveNotaDatos(id_sig_v){
var updated_by = $("#updated_by").val();
var peso = $("#"+signo_id+"pesoex").val();
var kg = $("#"+signo_id+"kgex").val();
var talla = $("#"+signo_id+"tallaex").val();
var imc = $("#"+signo_id+"imcex").val();
var ta = $("#"+signo_id+"taex").val();
var fr = $("#"+signo_id+"frex").val();
var fc = $("#"+signo_id+"fcex").val();
var hg = $("#"+signo_id+"hgex").val();
var tempo = $("#"+signo_id+"tempoex").val();
var pulso = $("#"+signo_id+"pulsoex").val();
var glicemiae = $("#"+signo_id+"glicemiae").val();

var radio_signo = $("input[name="+signo_id+"radio_signoex]:checked").val();

var fcf = $("#"+signo_id+"fcfe").val();
var satoe = $("#"+signo_id+"satoee").val();
var hallazgo = $("#"+signo_id+"hallazgoe").val();
var nombre_nota= $("#"+signo_id+"searchNombreNotaEd").val();
var update_time = $("#"+signo_id+"update_time").val();

 $.ajax({
type: "POST",
dataType:'json',
url: saveNotaUrl,
data: {updated_by:user_id,id_sig:id_sig_v, patient_id:id_patient, fcf:fcf, satoe:satoe, hallazgo:hallazgo,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,who:signo_id,nombre_nota:nombre_nota,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemiae:glicemiae,update_time:update_time
}, 
success:function(response){
	
	if(response.status==0){
	$("#"+signo_id+"result-nota-operation").html(response.alert);
	$(".disable-all :input").prop("disabled", false);
	}else if(response.status==1){
	$("#is-saved").html(0);
	$("#"+signo_id+"result-nota-operation").html(response.alert);
	
	
	 if(id_sig_v==""){
	paginateSignosVitalesN();
	$(".disable-all :input").val("");
	}else{
	loadSigno(id_sig_v);
	$('#updateNota').html('Editar');
	$(".save_exam_fis_hide").hide();
	$(".disable-all :input").prop("disabled", true);

	}
	}else if(response.status==-1){
	$("#"+signo_id+"result-nota-operation").html(response.alert);	
	}
  
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#showerror").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});


}







//--------------------------------------------------------------
$("#"+signo_id+"pesoex").keyup(function() {
  var peso = $(this).val();
  var talla =$("#"+signo_id+"tallaex").val();
if(peso==""){
$("#"+signo_id+"tallaex").prop("disabled", true);
$("#"+signo_id+"tallaex").val("");
}
else{
$("#"+signo_id+"tallaex").prop("disabled", false);
};
var ma = peso * 0.45;
$("#"+signo_id+"kgex").val(ma);

});

//------------------------

$("#"+signo_id+"tallaex").keyup(function() {
  var talla = $(this).val();
   var kg =$("#"+signo_id+"kgex").val();
 var talla_result= talla * talla;

var imc_result = kg / talla_result;
$("#"+signo_id+"imcex").val(imc_result);
});


$("#"+signo_id+"imcex").number( true, 2 );
//----------------------------------
$("#top_exam").on('click', function (e) {
e.preventDefault();
})
//---------------------------
$("."+signo_id+"select-examsisex").select2({
  tags: true
});	



//$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();





check_if_glicemia_normal();


var timerGlie = null;
$("#"+signo_id+"glicemiae").keydown(function(){
       clearTimeout(timerGlie); 
       timerGlie = setTimeout(check_if_glicemia_normal, 1000)
});



/*function check_if_glicemia_normale() {
	var glicemiae= $("#"+signo_id+"glicemiae").val();
if (70 >= glicemiae || glicemiae <= 100) {
  $("."+signo_id+"glicemiae").hide();
} else{
	$("."+signo_id+"glicemiae").slideDown();
}
}*/



function check_if_glicemia_normal() {

var glicemia= $("#"+signo_id+"glicemiae").val();

 if(glicemia !="" && (0  >= glicemia  || glicemia <=69 )){
	var value=glicemia + " : paciente diabetes";
$("."+signo_id+"glicemiae").css('color','red').text(value).slideDown();		
}

else if(glicemia !="" && (70  >= glicemia  || glicemia <=140 )){
	var value=glicemia + " : paciente normal";
$("."+signo_id+"glicemiae").css('color','green').text(value).slideDown();		
}
else if ((glicemia !="") && (140 > glicemia || glicemia <= 200)) {
	var value=glicemia + " : paciente pre-diabetes";
$("."+signo_id+"glicemiae").css('color','red').text(value).slideDown();	
} 

else if(glicemia !="" && 200 < glicemia)
{
	var value=glicemia + " : paciente diabetes";
$("."+signo_id+"glicemiae").css('color','red').text(value).slideDown();	
}
else{
	$("."+signo_id+"glicemiae").hide();
}
}




//-----------------frecuencia respiratoire---------------------------------------------

var timerFr = null;
$("#"+signo_id+"frex").keydown(function(){
	  var rango=$('.echo_fr').html();
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
var fr= $("#"+signo_id+"frex").val();

if(fr =="") 
{
$(".fr-resp-result").text('');$(".alert-f-r").hide();$(".check-f-r").hide();
} 
else if(40 <= fr && fr <= 45){
$(".alert-f-r").hide();$(".check-f-r").slideDown();
$(".fr-resp-result").css('color','green').text(fr).slideDown();
	}
 else{
$(".alert-f-r").slideDown();$(".check-f-r").hide();

$(".fr-resp-result").css('color','red').text(fr).slideDown();
}
}



function frecuencia_respiratoria2() {
var fr= $("#"+signo_id+"frex").val();
	
if(fr =="") 
{
$(".fr-resp-result").text('');$(".alert-f-r").hide();$(".check-f-r").hide();
}	
	
else if(20 <= fr && fr <= 30){
$(".alert-f-r").hide();$(".check-f-r").slideDown();
$(".fr-resp-result").css('color','green').text(fr).slideDown();
	}
 else{
$(".alert-f-r").slideDown();$(".check-f-r").hide();

$(".fr-resp-result").css('color','red').text(fr).slideDown();
}
}


function frecuencia_respiratoria3() {
var fr= $("#"+signo_id+"frex").val();
	
if(fr =="") 
{
$(".fr-resp-result").text('');$(".alert-f-r").hide();$(".check-f-r").hide();
}	
	
else if(12 <= fr && fr <= 20){
$(".alert-f-r").hide();$(".check-f-r").slideDown();
$(".fr-resp-result").css('color','green').text(fr).slideDown();
	}
 else{
$(".alert-f-r").slideDown();$(".check-f-r").hide();

$(".fr-resp-result").css('color','red').text(fr).slideDown();
}
}






//-----------------frecuencia cardiaca---------------------------------------------
var timerFc = null;
$("#"+signo_id+"fcex").keydown(function(){
	  var rangofc=$('.echo_fr').html();
	  var funfc;
       clearTimeout(timerFc); 
	   if(rangofc=='recien nacido (0-6 semanas)'){
		   funfc=f_c_r_n;
		   }
		   else if (rangofc=='infante (7 semanas -1 año)')
		   {
			   funfc=f_c_inf;
		   }

      else if (rangofc=='lactante mayor')
		   {
			   funfc=f_c_lm;
		   }		   
		   else if (rangofc=='pre-escolar')
		   {
			funfc=f_c_pes;   
		   } 
		    else if (rangofc=='escolar')
		   {
			funfc=f_c_es;   
		   }
		   else if (rangofc=='adolescente')
		   {
			funfc=f_c_ado;   
		   }
		   
		  else if (rangofc=='adulto')
		   {
			funfc=f_c_adult;   
		   }
		  
		  else{}
       timerFc = setTimeout(funfc, 1000)
});





function f_c_r_n() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(120 <= fc && fc <= 140){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}



function f_c_inf() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(100 <= fc && fc <= 130){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}



function f_c_lm() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(100 <= fc && fc <= 120){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}



function f_c_pes() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(80 <= fc && fc <= 120){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}

function f_c_es() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(80 <= fc && fc <= 100){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}


function f_c_ado() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(70 <= fc && fc <= 80){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}



function f_c_adult() {
	var fc= $("#"+signo_id+"fcex").val();
	
if(fc =="") 
{
$(".fr-card-result").text('');$(".alert-f-c").hide();$(".check-f-c").hide();
}	
	
else if(60 <= fc && fc <= 80){
$(".alert-f-c").hide();$(".check-f-c").slideDown();
$(".fr-card-result").css('color','green').text(fc).slideDown();
}
 else{
$(".alert-f-c").slideDown();$(".check-f-c").hide();
$(".fr-card-result").css('color','red').text(fc).slideDown();
}
}





//-----------------temporatura---------------------------------------------
var timerTp = null;
$("#"+signo_id+"tempoex").keydown(function(){
	  var rangotp=$('.echo_fr').html();
	  var funtp;
       clearTimeout(timerTp); 
	   if(rangotp=='recien nacido (0-6 semanas)'){
		   funtp=tempo_r_n;
		   }
		   else if (rangotp=='infante (7 semanas -1 año)' || rangotp=='lactante mayor' || rangotp=='pre-escolar')
		   {
			   funtp=tempo_inf_lm_pes;
		   }

      else if (rangotp=='escolar')
		   {
			   funtp=tempo_esc;
		   }		   
		   else if (rangotp=='adolescente')
		   {
			funtp=tempo_adol;   
		   } 
		   
		   
		     else if (rangotp=='adulto')
		   {
			funtp=tempo_adulto;   
		   }
		  
		  else{}
       timerTp = setTimeout(funtp, 1000)
});


function tempo_r_n() {
	var tempo= $("#"+signo_id+"tempoex").val();
	
if(tempo =="") 
{
$(".fr-tempo-result").text('');$(".alert-tempo").hide();$(".check-tempo").hide();
}	
	
else if(tempo == 38){
$(".alert-tempo").hide();$(".check-tempo").slideDown();
$(".fr-tempo-result").css('color','green').text(tempo).slideDown();
}
 else{
$(".alert-tempo").slideDown();$(".check-tempo").hide();
$(".fr-tempo-result").css('color','red').text(tempo).slideDown();

}
}



function tempo_inf_lm_pes() {
	var tempo= $("#"+signo_id+"tempoex").val();
	
if(tempo =="") 
{
$(".fr-tempo-result").text('');$(".alert-tempo").hide();$(".check-tempo").hide();
}	
	
else if(37.5 <= tempo && tempo <= 37.8){
$(".alert-tempo").hide();$(".check-tempo").slideDown();
$(".fr-tempo-result").css('color','green').text(tempo).slideDown();
}
 else{
$(".alert-tempo").slideDown();$(".check-tempo").hide();
$(".fr-tempo-result").css('color','red').text(tempo).slideDown();

}
}






function tempo_esc() {
	var tempo= $("#"+signo_id+"tempoex").val();
	
if(tempo =="") 
{
$(".fr-tempo-result").text('');$(".alert-tempo").hide();$(".check-tempo").hide();
}	
	
else if(37 <= tempo && tempo <= 37.5){
$(".alert-tempo").hide();$(".check-tempo").slideDown();
$(".fr-tempo-result").css('color','green').text(tempo).slideDown();
}
 else{
$(".alert-tempo").slideDown();$(".check-tempo").hide();
$(".fr-tempo-result").css('color','red').text(tempo).slideDown();

}
}




function tempo_adol() {
	var tempo= $("#"+signo_id+"tempoex").val();
	
if(tempo =="") 
{
$(".fr-tempo-result").text('');$(".alert-tempo").hide();$(".check-tempo").hide();
}	
	
else if(tempo == 37){
$(".alert-tempo").hide();$(".check-tempo").slideDown();
$(".fr-tempo-result").css('color','green').text(tempo).slideDown();
}
 else{
$(".alert-tempo").slideDown();$(".check-tempo").hide();
$(".fr-tempo-result").css('color','red').text(tempo).slideDown();

}
}


function tempo_adulto() {
	var tempo= $("#"+signo_id+"tempoex").val();
	
if(tempo =="") 
{
$(".fr-tempo-result").text('');$(".alert-tempo").hide();$(".check-tempo").hide();
}	
	
else if(36.2 <= tempo && tempo <= 37.2){
$(".alert-tempo").hide();$(".check-tempo").slideDown();
$(".fr-tempo-result").css('color','green').text(tempo).slideDown();
}
 else{
$(".alert-tempo").slideDown();$(".check-tempo").hide();
$(".fr-tempo-result").css('color','red').text(tempo).slideDown();

}
}



//------Tansion arterial sistolica-------------------------------------------
var timerTa = null;
$("#"+signo_id+"taex").keydown(function(){
	  var rangota=$('.echo_fr').html();
	  var funta;
       clearTimeout(timerTa); 
	   if(rangota=='recien nacido (0-6 semanas)'){
		   funta=ta_r_n;
		   }
		   else if (rangota=='infante (7 semanas -1 año)')
		   {
			   funta=ta_inf;
		   }

       else if (rangota=='lactante mayor')
		   {
			   funta=ta_lm;
		   }

        else if (rangota=='pre-escolar')
		   {
			funta=ta_pres;   
		   } 

       else if (rangota=='escolar')
		   {
			funta=ta_es;   
		   } 
		   
		   else if (rangota=='adolescente')
		   {
			funta=ta_adol;   
		   } 
		   
		   
		     else if (rangota=='adulto')
		   {
			funta=ta_adulto;   
		   }
		  
		  else{}
       timerTa = setTimeout(funta, 1000)
});




function ta_r_n() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(70 <= ta && ta <= 100){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}




function ta_inf() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(84 <= ta && ta <= 106){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}



function ta_lm() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(98 <= ta && ta <= 106){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}




function ta_pres() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(99 <= ta && ta <= 112){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}




function ta_es() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(104 <= ta && ta <= 124){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}




function ta_adol() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(118 <= ta && ta <= 132){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}





function ta_adulto() {
	var ta= $("#"+signo_id+"taex").val();
	
if(ta =="") 
{
$(".fr-ta-result").text('');$(".alert-ta").hide();$(".check-ta").hide();
}	
	
else if(110 <= ta && ta <= 140){
$(".alert-ta").hide();$(".check-ta").slideDown();
$(".fr-ta-result").css('color','green').text(ta).slideDown();
}
 else{
$(".alert-ta").slideDown();$(".check-ta").hide();
$(".fr-ta-result").css('color','red').text(ta).slideDown();

}
}






//------Tansion arterial diastolica-------------------------------------------
var timerTad = null;
$("#"+signo_id+"hgex").keydown(function(){
	  var rangotad=$('.echo_fr').html();
	  var funtad;
       clearTimeout(timerTad); 
	   if(rangotad=='recien nacido (0-6 semanas)'){
		   funtad=ta_r_nd;
		   }
		   else if (rangotad=='infante (7 semanas -1 año)')
		   {
			   funtad=ta_infd;
		   }

       else if (rangotad=='lactante mayor')
		   {
			   funtad=ta_lmd;
		   }

        else if (rangotad=='pre-escolar')
		   {
			funtad=ta_presd;   
		   } 

       else if (rangotad=='escolar')
		   {
			funtad=ta_esd;   
		   } 
		   
		   else if (rangotad=='adolescente')
		   {
			funta=ta_adold;   
		   } 
		   
		   
		     else if (rangotad=='adulto')
		   {
			funtad=ta_adultod;   
		   }
		  
		  else{}
       timerTad = setTimeout(funtad, 1000)
});





function ta_r_nd() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(50 <= hg && hg <= 68){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}







function ta_infd() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(56 <= hg && hg <= 70){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}




function ta_lmd() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(58 <= hg && hg <= 70){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}





function ta_presd() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(64 <= hg && hg <= 70){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}





function ta_esd() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(64 <= hg && hg <= 86){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}





function ta_adold() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(70 <= hg && hg <= 82){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}





function ta_adultod() {
	var hg= $("#"+signo_id+"hgex").val();

if(hg =="") 
{
$(".fr-tad-result").text('');$(".alert-tad").hide();$(".check-tad").hide();
}	
	
else if(70 <= hg && hg <= 90){
$(".alert-tad").hide();$(".check-tad").slideDown();
$(".fr-tad-result").css('color','green').text(hg).slideDown();
}
 else{
$(".alert-tad").slideDown();$(".check-tad").hide();
$(".fr-tad-result").css('color','red').text(hg).slideDown();

}
}









loadSigno(id_sig_v);
function loadSigno(id)
{

$.ajax({
url: loadSignoUlr,
data: {id_exam_fis:id ,historial_id:id_patient,table:"hosp_signo_vitales",if_data_notas:0},
method:"POST",
success:function(data){
$('#reload-table-signo').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#reload-table-signo').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}			
});