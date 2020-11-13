<h4 class="h4 his_med_title" style="display:<?=$how_exam_fis_title?>">Examen fisico </h4>
<div id='paginateSignosVitales'></div>
<div id="content-signo-vitales"></div>
<div id="hide-signo-vitales">
<div class="col-md-12" >

<?php

$edad=getPatientAge($date_nacer);
//FRECUENCIA RESPIRATORIA

if (strpos($edad, 'día(s)') == true ) {
//get first caracter
$edad = substr($edad, 0, 2);

if($edad ==1  || $edad ==0){
$echo_fr='recien nacido (0-6 semanas)';
}

if($edad >1 && $edad <=11){
$echo_fr='infante (7 semanas -1 año)';
}


}
else if(strpos($edad, 'mes(es)') == true) 
{
//get first caracter
$edad = substr($edad, 0, 2);

if($edad ==1 || $edad ==0){
$echo_fr='recien nacido (0-6 semanas)';

}

if($edad >1 && $edad <=11){
$echo_fr='infante (7 semanas -1 año)';

}
	
}
else {
$edad1 = substr($edad, 0, 2);

switch($edad1) {
    case ($edad1 >= 1 && $edad1 <= 2): //the range from range of 0-20
       $echo_fr= "lactante mayor";
   break;
   case ($edad1 >= 2 && $edad1 <= 6):
   
      $echo_fr=  "pre-escolar";
   break;
   case ($edad1 >= 6 && $edad1 <= 13):

      $echo_fr=  "escolar";
   break;
   case ($edad1 >= 13 && $edad1 <= 16):

      $echo_fr=  "adolescente";
   break;
   
   case ($edad1 > 16):
      $echo_fr=  "adulto";
 
}

	
	
}
if($echo_fr=="recien nacido (0-6 semanas)"){
	$fr_resp_rank='40-45';
	$fr_card_rank='120-140';
	$fr_tempo_rank='38';
	$sistol='70-100';
	$diastol='50-68';
}
else if($echo_fr=="infante (7 semanas -1 año)"){
	$fr_resp_rank='20-30';
	$fr_card_rank='100-130';
	$fr_tempo_rank='37.5-37.8';
	$sistol='84-106';
	$diastol='56-70';	
}
else if($echo_fr=="lactante mayor"){
	$fr_resp_rank='20-30';
	$fr_card_rank='100-120';
	$fr_tempo_rank='37.5-37.8';	
	$sistol='90-106';
	$diastol='58-70';	
}
else if($echo_fr=="pre-escolar"){
	$fr_resp_rank='20-30';
	$fr_card_rank='80-120';
	$fr_tempo_rank='37.5-37.8';
	$sistol='99-112';
	$diastol='64-70';	
}
else if($echo_fr=="escolar"){
	$fr_resp_rank='12-20';
	$fr_card_rank='80-100';
	$fr_tempo_rank='37-37.5';
    $sistol='104-124';
	$diastol='64-86';	
}
else if($echo_fr=="adolescente"){
	$fr_resp_rank='12-20';
	$fr_card_rank='70-80';
	$fr_tempo_rank='37';
    $sistol='118-132';
	$diastol='70-82';	
} else{
	$fr_resp_rank='12-20';
	$fr_card_rank='60-80';
	$fr_tempo_rank='36.2-37.2';
    $sistol='110-140'; 
	$diastol='70-90';	
}
?>

<hr class="title-highline-top"/>
<span class='echo_fr' style='display:none'><?=$echo_fr?></span>
<p><strong>Tablas de signos vitales por edad (Paciente <?=$echo_fr;?>)</strong></p>
<div class="col-md-3">
<table class="table table-fr table-bordered" > 

<tr>
<td colspan='4' align='center' style='background:#a9dfbf;text-align:center'><label style="font-size:12px">TENSION ARTERIAL</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Sistolica (<?=$sistol?>)</td>
<td colspan='2' style='border-color:#a9dfbf;text-align:center;font-size:12px'>Diastolica (<?=$diastol?>)</td>
</tr>
<tr>
<td style='border-color:#a9dfbf;' class='fr-ta-result'>
</td>
<td style='border-color:#a9dfbf;'>
<i style='color:green;display:none' class="fa fa-check check-ta"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-ta"> anormal</i>
</td>
<td style='border-color:#a9dfbf' class='fr-tad-result'>
</td>
<td style='border-color:#a9dfbf'>
<i style='color:green;display:none' class="fa fa-check check-tad"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-tad"> anormal</i>
</td>
</tr>
</table>

<p class='glicemia'></p>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >

<tr>
<td colspan='2' style='background:#e3acb7;text-align:center'><label style="font-size:12px">FRECUENCIA RESPIRATORIA</label></td>
</tr>
<tr>

<td colspan='2' style='border-color:#e3acb7;text-align:center;font-size:12px'>Rango (<?=$fr_resp_rank?>)</td>
</tr>

<tr>
<td class='fr-resp-result' style='border-color:#e3acb7;text-align:center'></td>
<td  style='border-color:#e3acb7;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-f-r"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-f-r"> anormal</i></td>
</tr>
</table>
</div>
<div class="col-md-3">
<table class="table table-fr table-bordered" >
<tr>
<td colspan='2' style='background:#ac98f8;text-align:center'><label style="font-size:12px">FRECUENCIA CARDIACA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#ac98f8;text-align:center;font-size:12px'>Rango (<?=$fr_card_rank?>)</td>

</tr>
<tr>
<td class='fr-card-result' style='border-color:#ac98f8;text-align:center'></td>
<td  style='border-color:#ac98f8;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-f-c"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-f-c"> anormal</i></td>
</tr>
</table>
</div>

<div class="col-md-3">
<table class="table table-bordered" >

<tr>
<td colspan='2' style='background:#bb8fce;text-align:center'><label style="font-size:12px">FFRECUENCIA TEMPERATURA</label></td>
</tr>
<tr>
<td colspan='2' style='border-color:#bb8fce;text-align:center;font-size:12px'>Rango (<?=$fr_tempo_rank?>)</td>
</tr>

<tr>
<td class='fr-tempo-result' style='border-color:#bb8fce;text-align:center'></td>
<td  style='border-color:#bb8fce ;width:100px'  ><i style='color:green;display:none;' class="fa fa-check check-tempo"> normal</i><i style='color:red;display:none;' class="fa fa-warning alert-tempo"> anormal</i></td>
</tr>
</table>
</div>


</div>


<div class="col-md-12 table-responsive" >

<table class="table"  cellspacing="0" style="border-top: 1px groove #38a7bb;width:100%">
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td ><br/>
<label  class="col-sm-2 control-label"> Peso</label>
<div class="col-sm-5">
<font style="color:red;font-size:8px"></font>
<div class="input-group">
<input class="form-control peso-in"  id="<?=$idg?>peso"  type="text">
   <span class="input-group-addon">lb</span>
</div>
</div>
<div class="col-sm-5">
<font style="color:red;font-size:8px"></font>
<div class="input-group">
	<input class="form-control kg-in" id="<?=$idg?>kg"  type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>
<td title="Tension Arterial" style=""><br/>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (mm)</span>

<input class="form-control" id="<?=$idg?>ta"  type="text"> 
</div>
</div>

<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (hg)</span>

<input class="form-control " id="<?=$idg?>hg"  type="text">
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<label class="radio-inline">
   <input type="radio" id="<?=$idg?>radio_signo" name="<?=$idg?>radio_signo" value="SANO" checked /> Sano	
 </label>
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-5">

<div class="input-group">
<input class="form-control talla-in" title="talla en metro" id="<?=$idg?>talla-ef" type="text">
   <span class="input-group-addon">m</span>
</div>

</div>

</td>
<td style="width:5px;">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">

<input class="form-control" id="<?=$idg?>fr"  type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">

<div class="input-group" title="Temperatura">
<input class="form-control " id="<?=$idg?>tempo"  type="text">
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<label class="radio-inline">
<input type="radio" id="<?=$idg?>radio_signo" name="<?=$idg?>radio_signo" value="AGUDAMENTE ENFERMA"/> Agudamente Enferma	
 </label> 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-5">
	<div class="input-group">
		<input class="form-control formatnum imc-in" id="<?=$idg?>imc"  type="text" readonly>
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label"> Fc</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$idg?>fc"  type="text">

</div>
</div>
<label  class="col-sm-3 control-label">Pulso</label>
<div class="col-sm-3">
<div class="input-group">
<input class="form-control " id="<?=$idg?>pulso"  type="text">
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<label class="radio-inline">
<input type="radio" id="<?=$idg?>radio_signo" name="<?=$idg?>radio_signo"  value="CRONICAMENTE ENFERMA"/> Cronicamente Enferma	
 </label>

</td>
</tr>


<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-3 control-label">Glicemia</label> 
<div class="col-sm-4">
	<div class="input-group">
<input class="form-control" id="<?=$idg?>glicemia"  type="text">
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label"> Sat O2(%)</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$idg?>satoe"  type="text">

</div>
</div>
<label  class="col-sm-3 control-label">FCF</label>
<div class="col-sm-4">
<div class="input-group">
<input class="form-control " id="<?=$idg?>fcf"  type="text">

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
	  	<input type="text" class="form-control <?=$idg?>searchNombreNota" id="<?=$idg?>searchNombreNota" />
     
		<div class="<?=$idg?>suggesstion-box"></div>
		
    </div>
<div class="form-group">
<label class="control-label" ><span style='color:red'>*</span> <?=$nota_signo_vitales?></label>
<textarea title='obligatorio' rows="6" cols="15" class="form-control active-me" id="<?=$idg?>hallazgo"   ></textarea>
</div>

</div>
</div>
</div>

<div class="modal fade" id="triaje"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>


//-----------paginate-------------------------
function paginateSignosVitales(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/paginateSignosVitales",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>},
method:"POST",
success:function(data){
$('#paginateSignosVitales').html(data);
},

});
}

paginateSignosVitales();
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
$("#<?=$idg?>peso").keyup(function() {
  var peso = $(this).val();
  var talla =$("#<?=$idg?>talla-ef").val();
if(peso==""){
$("#<?=$idg?>talla-ef").prop("disabled", true);
$("#<?=$idg?>talla-ef").val("");
$("#<?=$idg?>imc").prop("disabled", true);
$("#<?=$idg?>imc").val("");
}
else{
$("#<?=$idg?>talla-ef").prop("disabled", false);
};
var ma = peso * 0.45;
$("#<?=$idg?>kg").val(ma);

});

//------------------------

$("#<?=$idg?>talla-ef").keyup(function() {
  var talla = $(this).val();
  var peso =$("#<?=$idg?>kg").val();

//calcul imc
//$('.number').number( myNumber, 2 )
var cal1 = talla * talla;
var imc_result = peso / cal1;
$("#<?=$idg?>imc").val(imc_result);
});

$('#<?=$idg?>imc').number( true, 2 );




var timerGli = null;
$('#<?=$idg?>glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

var glicemia= $('#<?=$idg?>glicemia').val();

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
$('#<?=$idg?>fr').keydown(function(){
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
var fr= $('#<?=$idg?>fr').val();

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
	var fr= $('#<?=$idg?>fr').val();
	
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
	var fr= $('#<?=$idg?>fr').val();
	
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
$('#<?=$idg?>fc').keydown(function(){
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
	var fc= $('#<?=$idg?>fc').val();
	
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
$('#<?=$idg?>tempo').keydown(function(){
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
	var tempo= $('#<?=$idg?>tempo').val();
	
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
	var tempo= $('#<?=$idg?>tempo').val();
	
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
	var tempo= $('#<?=$idg?>tempo').val();
	
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
	var tempo= $('#<?=$idg?>tempo').val();
	
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
	var tempo= $('#<?=$idg?>tempo').val();
	
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
$('#<?=$idg?>ta').keydown(function(){
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
	var ta= $('#<?=$idg?>ta').val();
	
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
$('#<?=$idg?>hg').keydown(function(){
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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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
	var hg= $('#<?=$idg?>hg').val();

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