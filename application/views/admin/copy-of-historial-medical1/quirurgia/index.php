<style>

.form-aling-left .control-label{
    text-align: right;
	text-transform:uppercase;font-size:11px;
}
</style>
<?php $docName=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Descripcion Quirurgica</h3>
</div>
<div class="modal-body" id="background_">
 <div class="container">
 <div class="row">
  <div id="paginationNumberQ"></div>
<hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" id="nuevo-formq">NUEVO REGISTRO</button>
<hr class="prenatal-separator"/>
<div id="contentq"></div>

<div id="hide-form-quirurgia">
<form class="form-horizontal form-aling-left" id="save-quirurgica" method="post">
<h3>CREAR NUEVO REGISTRO</h3>

<div class="col-md-6">
<div class="form-group">
<label class="control-label col-sm-3" >Elegir Centro Medico</label>
<div class="col-sm-9">
<select class="form-control select2" name="centro_med_q" >
<option value="<?=$centro_medico?>"><?=$centro?></option>
<?php 
foreach($centro_medico_data as $row) 
{ echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Diagnostico Pre-Quirurgico:</label>
<div class="col-sm-9">
 <button type="button" id="btnDpRq" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechDpRq"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="diag_pre_qui" id="diag_pre_qui"  ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Diagnostico Post-Quirurgico:</label>
<div class="col-sm-9">
 <button type="button" id="btnDpoRq" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechDpoRq"></span>
  <textarea rows='6'  class="form-control clear-cirugia-toracia" name="diag_post_qui"  id="diag_post_qui"  ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Anestesia:</label>
<div class="col-sm-9">
 <button type="button" id="btnAnes" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechAnes"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="anestesia" id="anestesia"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Tipo de incision</label>
<div class="col-sm-9">
 <button type="button" id="btnTipoIn" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechTipoIn"></span>
<input  class="form-control clear-cirugia-toracia" name="incision" id="incision"  >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Programada</label>
<div class="col-sm-9">
 <button type="button" id="btnCirProg" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechCirProg"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="cirugia_programada" id="cirugia_programada"   ></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Realizada </label>
<div class="col-sm-9">
 <button type="button" id="btnCirReal" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechCirReal"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="cirugia_realizada" id="cirugia_realizada"></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Hallazgo</label>
<div class="col-sm-9">
 <button type="button" id="btnHall" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechHall"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="hallasgo"  id="hallasgo"  ></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Pronostico Post Quirurgico</label>
<div class="col-sm-9">
 <button type="button" id="btnPronPoQ" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechPronPoQ"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="pro_post" id="pro_post"   ></textarea>
</div>
</div>
</div>
<div class="col-md-6">

<div style="overflow-x:auto;">
<table class="table" style="width:100%">
<tr>
<td style="text-align:right;text-transform:uppercase;font-size:11px"><label class="control-label">Perdida Sanguinea</label></td>
<td>
<div class="input-group">
<input  class="form-control clear-cirugia-toracia" name="perdida_sanguinea"   />
<span class="input-group-addon">CC</span>
</div>

</td>

<td  style="text-align:right;text-transform:uppercase;font-size:11px"><label  class="control-label">No de Compresas</label></td>
<td>
<input  class="form-control clear-cirugia-toracia" name="compresa">
</td>

<td  style="text-align:right;text-transform:uppercase;font-size:11px"><label  class="control-label">No. de Gasas</label></td>
<td>
<input  class="form-control clear-cirugia-toracia" name="gasas">
</td>
</tr>
</table>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Drenes</label>
<div class="col-sm-9">
 <button type="button" id="btnDrenes" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechDrenes"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="drenes"  id="drenes"  ></textarea>
</div>
</div>




<div class="form-group">
<label class="control-label col-sm-3" >Transfusion</label>
<div class="col-sm-3">
<input  class="form-control clear-cirugia-toracia" name="transfusion"   />

</div>
<label class="control-label col-sm-3" >Unids Transfundidas</label>
<div class="col-sm-3">
<input  class="form-control clear-cirugia-toracia" name="unids_transfusion"   />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Condicion del paciente</label>
<div class="col-sm-9">
<select class="form-control select2" name="condicion_paciente" >
<option ></option>
<option >buena</option>
<option >estable</option>
<option >grave</option>
<option >fallecido</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Traslado a</label>
<div class="col-sm-9">
<select class="form-control select2" name="traslado" >
<option ></option>
<option >sala</option>
<option >recuperacion</option>
<option >UCI</option>
<option >a su domicilio</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Hora de Inicio</label>
<div class="col-sm-3">
<div class="input-group">
<input  class="form-control clear-cirugia-toracia hour" name="hora_ini" id="hora_ini"   />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
<label class="control-label col-sm-3" >Hora Finalizacion</label>
<div class="col-sm-3">
 <div class="input-group">
<input  class="form-control clear-cirugia-toracia hour" name="hora_fin"  id="hora_fin"  />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Tiempo Quirurgico</label>
<div class="col-sm-3">
 <div class="input-group">
<input  class="form-control clear-cirugia-toracia" id="tiempo_quirurgico" name="tiempo_quirurgico" style="pointer-events:none" placeholder="00:00" />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cirujano</label>
<div class="col-sm-9">
 <button type="button" id="btnCiruj" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechCiruj"></span>
<input  class="form-control clear-cirugia-toracia" name="cirujano" id="cirujano" value="<?=$docName?>" />
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s)</label>
<div class="col-sm-9">
 <button type="button" id="btnAyud" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechAyud"></span>
<input  class="form-control clear-cirugia-toracia" name="ajudante" id="ajudante"   />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s) Enfemeria</label>
<div class="col-sm-9">
 <button type="button" id="btnAyudEnf" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechAyudEnf"></span> 
<input  class="form-control clear-cirugia-toracia" name="ajudante_enf" id="ajudante_enf"  />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Muesta(s) Envida(s) a Patologia</label>
<div class="col-sm-9">
 <button type="button" id="btnMuEnPa" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechMuEnPa"></span>
<input  class="form-control clear-cirugia-toracia" name="muestras_patologia" id="muestras_patologia"  />
</div>
</div> 
 

<div class="form-group">
<label class="control-label col-sm-3" >Reporte Histopatologico</label>
<div class="col-sm-9">
 <button type="button" id="btnRepHist" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechRepHist"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="histopatologico" id="histopatologico"  ></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Descripcion Del Procedimiento</label>
<div class="col-sm-9">
 <button type="button" id="btnDesPro" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechDesPro"></span>
<textarea rows='6'  class="form-control clear-cirugia-toracia" name="desc_proced" id="desc_proced"    ></textarea>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<hr class="prenatal-separator"/>
<button type="submit" id="save-quirurgica-btn"  class="btn btn-md  btn-success"><i class="fa fa-check after-actionq" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
<a id="imprimir-cirugiq" style="display:none"  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/q")?>"  ><i class="fa fa-print"></i> Imprimir</a>
</div>

</div>
<input type="hidden" value="<?=$id_historial?>" name="id_patient"   />
<input type="hidden" value="<?=$user_id?>" name="id_user"   />
<input type="hidden" value="0" name="operator"   />
</form>
</div>
</div>
</div>
</div>
<script>

var btnDpRq = document.getElementById('btnDpRq');
btnDpRq.onclick = function() {
var output = document.getElementById("diag_pre_qui");
// get action element reference
var action = document.getElementById("actionSpeechDpRq");
runSpeechRecognition(output,action);
}


var btnDpoRq = document.getElementById('btnDpoRq');
btnDpoRq.onclick = function() {
var output = document.getElementById("diag_post_qui");
// get action element reference
var action = document.getElementById("actionSpeechDpoRq");
runSpeechRecognition(output,action);
}


var btnAnes = document.getElementById('btnAnes');
btnAnes.onclick = function() {
var output = document.getElementById("anestesia");
// get action element reference
var action = document.getElementById("actionSpeechAnes");
runSpeechRecognition(output,action);
}

var btnTipoIn = document.getElementById('btnTipoIn');
btnTipoIn.onclick = function() {
var output = document.getElementById("incision");
// get action element reference
var action = document.getElementById("actionSpeechTipoIn");
runSpeechRecognition(output,action);
}
   


var btnCirProg = document.getElementById('btnCirProg');
btnCirProg.onclick = function() {
var output = document.getElementById("cirugia_programada");
// get action element reference
var action = document.getElementById("actionSpeechCirProg");
runSpeechRecognition(output,action);
}



var btnCirReal = document.getElementById('btnCirReal');
btnCirReal.onclick = function() {
var output = document.getElementById("cirugia_realizada");
// get action element reference
var action = document.getElementById("actionSpeechCirReal");
runSpeechRecognition(output,action);
}

var btnHall = document.getElementById('btnHall');
btnHall.onclick = function() {
var output = document.getElementById("hallasgo");
// get action element reference
var action = document.getElementById("actionSpeechHall");
runSpeechRecognition(output,action);
}
   
var btnDesPro = document.getElementById('btnDesPro');
btnDesPro.onclick = function() {
var output = document.getElementById("desc_proced");
// get action element reference
var action = document.getElementById("actionSpeechDesPro");
runSpeechRecognition(output,action);
}
  

var btnPronPoQ = document.getElementById('btnPronPoQ');
btnPronPoQ.onclick = function() {
var output = document.getElementById("pro_post");
// get action element reference
var action = document.getElementById("actionSpeechPronPoQ");
runSpeechRecognition(output,action);
}
  

var btnDrenes = document.getElementById('btnDrenes');
btnDrenes.onclick = function() {
var output = document.getElementById("drenes");
// get action element reference
var action = document.getElementById("actionSpeechDrenes");
runSpeechRecognition(output,action);
}


var btnRepHist = document.getElementById('btnRepHist');
btnRepHist.onclick = function() {
var output = document.getElementById("histopatologico");
// get action element reference
var action = document.getElementById("actionSpeechRepHist");
runSpeechRecognition(output,action);
}

var btnCiruj = document.getElementById('btnCiruj');
btnCiruj.onclick = function() {
var output = document.getElementById("cirujano");
// get action element reference
var action = document.getElementById("actionSpeechCiruj");
runSpeechRecognition(output,action);
}
  

var btnMuEnPa = document.getElementById('btnMuEnPa');
btnMuEnPa.onclick = function() {
var output = document.getElementById("muestras_patologia");
// get action element reference
var action = document.getElementById("actionSpeechMuEnPa");
runSpeechRecognition(output,action);
}

  var btnAyud = document.getElementById('btnAyud');
btnAyud.onclick = function() {
var output = document.getElementById("ajudante");
// get action element reference
var action = document.getElementById("actionSpeechAyud");
runSpeechRecognition(output,action);
}    


  var btnAyudEnf = document.getElementById('btnAyudEnf');
btnAyudEnf.onclick = function() {
var output = document.getElementById("ajudante_enf");
// get action element reference
var action = document.getElementById("actionSpeechAyudEnf");
runSpeechRecognition(output,action);
} 
  



 $('.select2').select2({
  tags: true
});

$('.hour').mask('00:00', {placeholder: '00:00'});

function toSeconds(time_str) {
    // Extract hours, minutes and seconds
    var parts = time_str.split(':');
    // compute  and return total seconds
    return parts[0] * 3600 + // an hour has 3600 seconds
    parts[1] * 60; // a minute has 60 seconds
    //+
   // parts[2]; // seconds
}
var timer = null;



function calHour(){
var a = document.getElementById('hora_ini').value;
var b = document.getElementById('hora_fin').value;

var difference = Math.abs(toSeconds(a) - toSeconds(b));

// format time differnece
var result = [
    Math.floor(difference / 3600), // an hour has 3600 seconds
    Math.floor((difference % 3600) / 60) // a minute has 60 seconds
    //difference % 60
];
// 0 padding and concatation
result = result.map(function(v) {
    return v < 10 ? '0' + v : v;
}).join(':');
if(a=="" || b=="" || result=="NaN:NaN" ){
document.getElementById('tiempo_quirurgico').value="";
}else{
document.getElementById('tiempo_quirurgico').value=result;
}
}


var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('#hora_fin');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
  calHour()
}

 $('#hora_ini').on('keydown', function () {
  $('#hora_fin').val("");
  $('#tiempo_quirurgico').val("");
});





function paginationNumberQ(){
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/showQuirurcaTabulation",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:"<?=$centro_medico?>"},
method:"POST",
success:function(data){
$('#paginationNumberQ').html(data);
}
});
}

paginationNumberQ();

$('#save-quirurgica').submit(function(e){
e.preventDefault();
$('#save-quirurgica-btn').prop("disabled",true);
$('#save-quirurgica-btn').text("guardando...");
$.ajax({
url:'<?php echo base_url();?>historialHeader/saveQuirurgico',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
	paginationNumberQ();
  $('.after-actionq').fadeIn('slow', function(){
    $('.after-actionq').delay(3000).fadeOut();
    });
	$('#save-quirurgica-btn').text("GUARDAR");
$('#imprimir-cirugiq').show();

}

});

});

</script>
