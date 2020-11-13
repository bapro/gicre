<style>

.control-label.rgth-crd{
    text-align: right;
	font-size:13px;
}
</style>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">EVALUACION CARDIOVASCULAR</h3>
</div>
<div class="modal-body" id="background_">
 <div class="container">
 <div class="row">
  <div id="paginationNumberCardV"></div>

<hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" id="nuevo-formcv">NUEVO REGISTRO</button>
<hr class="prenatal-separator"/>
<div id="contentcv"></div>

<div id="hide-form-cardiov">
<div class="col-md-12">
<form method="post" class="form-horizontal" id="submit-vas">
<table class='table form-aling-left'>
<tr>
<td style='width:30%'>
<strong>1- TIPO DE CIRUGIA</strong>
<select class="form-control select2c" id="tipo_cirugia" name='tipo_cirugia' >
<option value="">Ningúno</option>
<option>ELECTIVAS</option>
<option>EMERGENCIA</option>
</select>
</td>
<td>
<strong>2- CIRUGIAS ANTERIOR</strong>
<textarea class="form-control" id="cirugia_ant" name='cirugia_ant' ></textarea>
</td>
</tr>
<tr>
<td>
<strong>3- RIESGO QUIRURGICO</strong><br/>
a) Alto <textarea class="form-control" id="riesgo_qui_alto" name='riesgo_qui_alto' ></textarea></td>
<td><br/>b) Medio <textarea class="form-control" id="riesgo_qui_medio" name='riesgo_qui_medio' ></textarea></td>
<td><br/>c) Bajo <textarea class="form-control" id="riesgo_qui_bajo" name='riesgo_qui_bajo' ></textarea></td>
</tr>
</table>
<strong>4- ANTECEDENTE CARDIOVASCULARES</strong>
<table class='table' style='width:60%'>
<tr>
<td>
a) Hta 
</td>
<td>
si <input type='radio' class='ant_card_radio1' name='ant_card_radio1' value='1' /> no <input type='radio' name='ant_card_radio1' class='ant_card_radio1' value='0' checked />
</td>
<td><span id='text_ant_card1' style='visibility:hidden' ><input   class="form-control"  name='text_ant_card1'  ></span></td>
</tr>
<tr>
<td>
b) Cardiopastica Isquemica
</td>
<td>
si <input type='radio' class='ant_card_radio2' name='ant_card_radio2' value='1' /> no <input type='radio' name='ant_card_radio2' class='ant_card_radio2' value='0' checked />
</td>
<td><span id='text_ant_card2' style='visibility:hidden'><input   class="form-control"  id='text_ant_card2' name='text_ant_card2'  ></span></td>
</tr>
<tr>
<td>
c) Insuficienca Cardiaca Congenita
</td>
<td>
si <input type='radio' class='ant_card_radio3' name='ant_card_radio3' value='1' /> no <input type='radio' name='ant_card_radio3' class='ant_card_radio3' value='0' checked />
</td>
<td><span id='text_ant_card3' style='visibility:hidden'><input  class="form-control"  name='text_ant_card3' ></span></td>
</tr>
<tr>
<td>
d) Arritmia Documentada
</td>
<td>
si <input type='radio' class='ant_card_radio4' name='ant_card_radio4' value='1' /> no <input type='radio' name='ant_card_radio4' class='ant_card_radio4' value='0' checked />
</td>
<td><span id='text_ant_card4' style='visibility:hidden'><input  class="form-control"  name='text_ant_card4' ></span></td>
</tr>
<tr>
<td>
e) Enfermedad Valvulr
</td>
<td>
si <input type='radio' class='ant_card_radio5' name='ant_card_radio5' value='1' /> no <input type='radio' name='ant_card_radio5' class='ant_card_radio5' value='0' checked />
</td>
<td><span id='text_ant_card5' style='visibility:hidden'><input class="form-control"  name='text_ant_card5' ></span></td>
</tr>
<tr>
<td>
f) Otros 
</td>
<td>
si <input type='radio' class='ant_card_radio6' name='ant_card_radio6' value='1' /> no <input type='radio' name='ant_card_radio6' class='ant_card_radio6' value='0' checked />
</td>
<td><span id='text_ant_card6' style='visibility:hidden'><input class="form-control" name='text_ant_card6' ></span></td>
</tr>
</table>


<strong>5- CONDICION COMORBIDA</strong>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Tabaquismo</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_ta" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Obesidad</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_ob" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Anemia</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_an" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Hepatopatia Cronica</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_hep" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Discracia Sanguinea</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_disc" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Diabetes Mellitus</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_diab" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Disfuncion Renal</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_disf" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Enfermedad Vascular</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_enfvas" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Periferica</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_peri" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Enfermedad Cronica</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_enfcr" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ACV</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_acv" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Asma Bronquial</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_asbr" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Otras</label>
<div class="col-md-9">
<textarea  class="form-control" name="cond_com_otras" ></textarea>
</div>
</div>
</td>
</tr>
</table>
<strong>6- CAPACIDAD FUNCIONAL </strong>
<table class='table'>
<tr>
<td>

<div class="form-group">
<label class="control-label rgth-crd col-md-3" > a) Limitada</label>
<div class="col-md-9">
(>4mt)
<textarea  class="form-control" name="cap_fun_lim" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > b) Buena</label>
<div class="col-md-9">
(>4mt)
<textarea  class="form-control" name="cap_fun_bue" ></textarea>
</div>
</div>


</td>
</tr>
</table>

<strong>7- SINTOMAS CARDIOVASCULAR</strong>
<table class='table' style='width:80%'>
<tr>
<td>
Dolor Toracico <input type='checkbox' name='sin_car_dol_tor'/>
</td>
<td>
Disnea <input type='checkbox' name='sin_car_dis'/>&nbsp;&nbsp;
TOS <input type='checkbox' name='sin_car_tos'/>
</td>
</tr>
<tr>
<td>
Palpitaciones <input type='checkbox' name='sin_car_palp'/>&nbsp;&nbsp;
Ortopnea <input type='checkbox' name='sin_car_ort'/>
</td>
<td>
Edema <input name='sin_car_edem' type='checkbox'/>&nbsp;&nbsp;
</td>
<td>
Otro <input type='checkbox' id='sin_car_otro'/> <input name='sin_car_otro_txt' id='sin_car_otro_txt' style='visibility:hidden;position:absolute'  />
</td>
</tr>
</table>

<strong>8- EXAMEN FISICO</strong>
<?php 
$data['edad'] ='33 años';

$this->load->view('admin/historial-medical1/cardiovascular/signo_empty',$data);?>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BD</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_bd" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BI</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_bi" ></textarea>
</div>
</div>
</td>

</tr>

<tr>
<!--
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > FC</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_fc" ></textarea>
</div>
</div>
</td>-->

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >IVY</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_ivy" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Torax</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_torax" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Corazon</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_coraz" ></textarea>
</div>
</div>
</td>

</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Pulmones</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_pulm" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Abdomen</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_abdom" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Miembros</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_miemb" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > RHY</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_rhy" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Edema</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_edema" ></textarea>
</div>
</div>
</td>
<!--
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Pulsos Perifericos</label>
<div class="col-md-9">
<textarea  class="form-control" name="exam_fis_pul_per" ></textarea>
</div>
</div>
</td>-->
</tr>
</table>

<strong>9- LABORATORIO</strong>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HCTO</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_hcto" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HB</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_hb" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > GB</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_gb" ></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Plaquetas</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_plaq" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Creatinina</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_creat" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Glicemia</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_glice" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGO</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_tgo" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGP</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_tgo_tgp" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TS/TC</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_tgo_ts_tc" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TP</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_tp" ></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TPT</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_tpt" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Orina</label>
<div class="col-md-9">
<textarea  class="form-control" name="lab_orina" ></textarea>
</div>
</div>
</td>
</tr>
</table>

<strong>10- RESULTADOS CARDIODIAGNOSTICO</strong> 
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >a) Electrocardiograma</label>
<div class="col-md-8">
<textarea  class="form-control" name="res_car_elec" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >b) Radiografia De Torox</label>
<div class="col-md-9">
<textarea  class="form-control" name="res_car_rad_tor" ></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >c) Ecocardiograma</label>
<div class="col-md-8">
<textarea  class="form-control" name="res_car_eco" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >d) Holters</label>
<div class="col-md-9">
<textarea  class="form-control" name="res_car_hol" ></textarea>
</div>
</div>
</td>

</tr>


<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >e) Esperimotria</label>
<div class="col-md-8">
<textarea  class="form-control" name="res_car_esperim" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >f) Mapa</label>
<div class="col-md-9">
<textarea  class="form-control" name="res_car_mapa" ></textarea>
</div>
</div>
</td>

</tr>
</table>
<strong>11- CONCLUSION DIAGNOSTICA</strong>


<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Patologia Cardiovasculares Detectadas</label>
<div class="col-md-9">
<textarea  class="form-control" name="con_diag_pat_car_del" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Otros Patologias</label>
<div class="col-md-9">
<textarea  class="form-control" name="con_diag_otros_pat" ></textarea>
</div>
</div>
</td>

</tr>
</table>
<strong>12- RIESGO CARDIOVASCULAR (PREDICTORES CLINICOS)</strong>

<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Menor</label>
<div class="col-md-9">
<textarea  class="form-control" name="riesgo_car_menor" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Intermedio</label>
<div class="col-md-9">
<textarea  class="form-control" name="riesgo_car_intermedio" ></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Mayor</label>
<div class="col-md-9">
<textarea  class="form-control" name="riesgo_car_mayor" ></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Recomendaciones</label>
<div class="col-md-9">
<textarea  class="form-control" name="riesgo_car_recomend" ></textarea>
<input type='hidden' name='inserted_by' value='<?=$user_id?>'/>
<input type='hidden' name='patient' value='<?=$id_historial?>'/>
</div>
</div>
</td>

</tr>
<tr>
<td>
  <button type="submit" id="save-eva-car" class="btn btn-lg btn-success"><i class="fa fa-check after-eva-car" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
<a id="imprimir-eva-car" style="display:none"  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/new_card/$id_historial/$user_id/$centro_medico/card")?>"  ><i class="fa fa-print"></i> Imprimir</a>
</td>
</tr>
</table>
</form >

</div>
</div>
</div>
</div>
</div>
<script>

function paginationNumberCardV(){
var centro_medico=<?=$centro_medico?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/showCardioVas",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:centro_medico},
method:"POST",
success:function(data){
$('#paginationNumberCardV').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginationNumberCardV').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}

paginationNumberCardV();



$('#submit-vas').submit(function(e){
e.preventDefault();	
$("#save-eva-car").prop('disabled',true);
$("#save-eva-car").text('guardando...');
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveEvCard',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
	$(".after-eva-car").show();
 setTimeout(function(){
     $(".after-eva-car").hide();
    }, 2000);
$("#imprimir-eva-car").show();
paginationNumberCardV();
$("#save-eva-car").text('GUARDAR');
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginationNumberCardV').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});

});
//--------------------------------------------------------------------------------------------------------------
	$("#sin_car_otro").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$("#sin_car_otro_txt").css({"visibility":"visible"});	   
		}  
		else {  
			$("#sin_car_otro_txt").css({"visibility":"hidden"}); 
			$("#sin_car_otro_txt").val(''); 
   	}
	});

$('.ant_card_radio1').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card1').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card1').css({"visibility":"hidden"}); 
   
  }
});

$('.ant_card_radio2').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card2').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card2').css({"visibility":"hidden"}); 
   
  }
});


$('.ant_card_radio3').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card3').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card3').css({"visibility":"hidden"}); 
   
  }
});


$('.ant_card_radio4').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card4').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card4').css({"visibility":"hidden"}); 
   
  }
});


$('.ant_card_radio5').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card5').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card5').css({"visibility":"hidden"}); 
   
  }
});


$('.ant_card_radio6').change(function(){
  if($(this).val()==1) {
	$('#text_ant_card6').css({"visibility":"visible"}); 
  } else {
 $('#text_ant_card6').css({"visibility":"hidden"}); 
   
  }
});
</script>
