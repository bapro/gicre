<h4 class="h4 his_med_title" style="display:<?=$how_exam_fis_title?>">Examen fisico </h4>
<div id="examFisRslt"></div>
<div id='paginateExFis'></div>
<div id="contentExFis"></div>
<div id="hideExFis">

<hr class="title-highline-top"/>

<div id='tableSigVitExF'></div>

<div class="col-md-12 table-responsive" >
<form id="clear-exam-fis">
<table class="table"  cellspacing="0" style="border-top: 1px groove #38a7bb;width:100%">
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td ><br/><br/>
<label  class="col-sm-2 control-label"> Peso</label>
<div class="col-sm-5">
<font style="color:red;font-size:8px"></font>
<div class="input-group">
<input class="form-control peso-in"  id="<?=$signo_id?>peso"  type="text">
   <span class="input-group-addon">lb</span>
</div>
</div>
<div class="col-sm-5">
<font style="color:red;font-size:8px"></font>
<div class="input-group">
	<input class="form-control kg-in" id="<?=$signo_id?>kg"  type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>

<td title="Tension Arterial">
<div class="col-sm-6">
T. A.(mm) <input id="<?=$signo_id?>ta" class="form-control">
T. A. (hg) <input  id="<?=$signo_id?>hg"  class="form-control">
</div>
</td>


<td style="width:1px" >
<br/>
<br/>
<label class="radio-inline">
   <input type="radio" id="<?=$signo_id?>radio_signo" name="<?=$signo_id?>radio_signo" value="SANO" checked /> Sano	
 </label>
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-5">

<div class="input-group">
<input class="form-control talla-in" title="talla en metro" id="<?=$signo_id?>talla-ef" type="text">
   <span class="input-group-addon">m</span>
</div>

</div>

</td>
<td style="width:5px;">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-4" title="Frecuencia respiratoria">
<div class="input-group">

<input class="form-control" id="<?=$signo_id?>fr"  type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">

<div class="input-group" title="Temperatura">
<input class="form-control " id="<?=$signo_id?>tempo"  type="text">
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<label class="radio-inline">
<input type="radio" id="<?=$signo_id?>radio_signo" name="<?=$signo_id?>radio_signo" value="AGUDAMENTE ENFERMA"/> Agudamente Enferma	
 </label> 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-5">
	<div class="input-group">
		<input class="form-control formatnum imc-in" id="<?=$signo_id?>imc"  type="text" readonly>
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label"> Fc</label>
<div class="col-sm-4">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$signo_id?>fc"  type="text">

</div>
</div>
<label  class="col-sm-3 control-label">Pulso</label>
<div class="col-sm-5">
<div class="input-group">
<input class="form-control " id="<?=$signo_id?>pulso"  type="text">
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<label class="radio-inline">
<input type="radio" id="<?=$signo_id?>radio_signo" name="<?=$signo_id?>radio_signo"  value="CRONICAMENTE ENFERMA"/> Cronicamente Enferma	
 </label>

</td>
</tr>


<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-3 control-label">Glicemia</label> 
<div class="col-sm-4">
	<div class="input-group">
<input class="form-control" id="<?=$signo_id?>glicemia"  type="text">
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label"> Sat O2(%)</label>
<div class="col-sm-4">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$signo_id?>satoe"  type="text">

</div>
</div>
<label  class="col-sm-3 control-label">FCF</label>
<div class="col-sm-4">
<div class="input-group">
<input class="form-control " id="<?=$signo_id?>fcf"  type="text">

</div>
</div>
</td>
<td style="width:1px" >
</td>
</tr>

	   
</table>
 <div class="form-horizontal">

  <div class="form-group"  style='display:<?=$nota_nombre?>' >
      <label class="control-label" ><span style='color:red'>*</span> Nombre de la nota:</label>
	  	<input type="text" class="form-control <?=$signo_id?>searchNombreNota" id="<?=$signo_id?>searchNombreNota" />
     
		<div class="<?=$signo_id?>suggesstion-box"></div>
		
    </div>
<div class="form-group">
<label class="control-label" ><span style='color:red'>*</span> <?=$nota_signo_vitales?></label>
<textarea title='obligatorio' rows="6" cols="15" class="form-control active-me" id="<?=$signo_id?>hallazgo"   ></textarea>
</div>

</div>
</div>
</form>
</div>

<div class="modal fade" id="triaje"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
var idExF="";
loadSignoEf(idExF);
function loadSignoEf(id)
{

$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/loadSigno",
data: {id_exam_fis:id ,historial_id:<?=$patient_id?>,table:"hosp_signo_vitales",if_data_notas:2},
method:"POST",
success:function(data){
$('#tableSigVitExF').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#tableSigVitExF').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}








$('#<?=$signo_id?>hallazgo').keyup(function(event) { 
if($('#<?=$signo_id?>hallazgo').val() !=""){
$('.tab-exam-fis').hide();
}else{
 $('.tab-exam-fis').show();
}


 if($('#copiar-estudios').prop("checked") == true){
        $('#observaciones').val($('#enf_signopsis').val()); 
            }
            else if($('#copiar-estudios').prop("checked") == false){
            $('#observaciones').val(''); 
            }




    });

//-----------paginate-------------------------
function paginateExFis(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/paginateExFis",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>},
method:"POST",
success:function(data){
$('#paginateExFis').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#paginateExFis').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}

paginateExFis();
//-------------------------------------------




$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
$('#ver_exafisico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');

});


//------------------------------------------------------------------------------------
$("#<?=$signo_id?>peso").keyup(function() {
  var peso = $(this).val();
  var talla =$("#<?=$signo_id?>talla-ef").val();
if(peso==""){
$("#<?=$signo_id?>talla-ef").prop("disabled", true);
$("#<?=$signo_id?>talla-ef").val("");
$("#<?=$signo_id?>imc").prop("disabled", true);
$("#<?=$signo_id?>imc").val("");
}
else{
$("#<?=$signo_id?>talla-ef").prop("disabled", false);
};
var ma = peso * 0.45;
$("#<?=$signo_id?>kg").val(ma);

});

//------------------------

$("#<?=$signo_id?>talla-ef").keyup(function() {
  var talla = $(this).val();
  var peso =$("#<?=$signo_id?>kg").val();

//calcul imc
//$('.number').number( myNumber, 2 )
var cal1 = talla * talla;
var imc_result = peso / cal1;
$("#<?=$signo_id?>imc").val(imc_result);
});

$('#<?=$signo_id?>imc').number( true, 2 );




var timerGli = null;
$('#<?=$signo_id?>glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

var glicemia= $('#<?=$signo_id?>glicemia').val();

 if(glicemia !="" && (0  >= glicemia  || glicemia <=69 )){
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').css('color','red').text(value).slideDown();		
}

else if(glicemia !="" && (70  >= glicemia  || glicemia <=140 )){
	var value="Glicemia " + glicemia + " : paciente normal";
$('.glicemia').css('color','green').text(value).slideDown();		
}
else if ((glicemia !="") && (140 > glicemia || glicemia <= 200)) {
	var value="Glicemia " + glicemia + " : paciente pre-diabetes";
$('.glicemia').css('color','red').text(value).slideDown();	
} 

else if(glicemia !="" && 200 < glicemia)
{
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').css('color','red').text(value).slideDown();	
}
else{
	$('.glicemia').hide();
}
}

//-----------------frecuencia respiratoire---------------------------------------------

var timerFr = null;
$('#<?=$signo_id?>fr').keydown(function(){
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
var fr= $('#<?=$signo_id?>fr').val();

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
	var fr= $('#<?=$signo_id?>fr').val();
	
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
	var fr= $('#<?=$signo_id?>fr').val();
	
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
$('#<?=$signo_id?>fc').keydown(function(){
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
	var fc= $('#<?=$signo_id?>fc').val();
	
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
$('#<?=$signo_id?>tempo').keydown(function(){
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
	var tempo= $('#<?=$signo_id?>tempo').val();
	
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
	var tempo= $('#<?=$signo_id?>tempo').val();
	
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
	var tempo= $('#<?=$signo_id?>tempo').val();
	
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
	var tempo= $('#<?=$signo_id?>tempo').val();
	
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
	var tempo= $('#<?=$signo_id?>tempo').val();
	
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
$('#<?=$signo_id?>ta').keydown(function(){
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
	var ta= $('#<?=$signo_id?>ta').val();
	
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
$('#<?=$signo_id?>hg').keydown(function(){
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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
	var hg= $('#<?=$signo_id?>hg').val();

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
</script>