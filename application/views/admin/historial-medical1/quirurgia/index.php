<style>

.form-aling-left .control-label{
    text-align: right;
	text-transform:uppercase;font-size:11px;
}
</style>
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
<hr/>
<div class="col-md-6">

<div class="form-group">
<label class="control-label col-sm-3">Diagnostico Pre-Quirurgico:</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="diag_pre_qui"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Diagnostico Post-Quirurgico:</label>
<div class="col-sm-9">
  <textarea  class="form-control clear-cirugia-toracia" name="diag_post_qui"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Anestesia:</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="anestesia"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Tipo de incision</label>
<div class="col-sm-9">
<input  class="form-control clear-cirugia-toracia" name="incision"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Programada</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="cirugia_programada"   ></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Realizada </label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="cirugia_realizada" ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Hallazgo</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="hallasgo"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Descripcion Del Procedimiento</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="desc_proced"   ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Pronostico Post Quirurgico</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="pro_post"   ></textarea>
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
<textarea  class="form-control clear-cirugia-toracia" name="drenes"   ></textarea>
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
<input  class="form-control clear-cirugia-toracia" name="cirujano"   />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s)</label>
<div class="col-sm-9">
<input  class="form-control clear-cirugia-toracia" name="ajudante"   />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s) Enfemeria</label>
<div class="col-sm-9">
<input  class="form-control clear-cirugia-toracia" name="ajudante_enf"   />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Muesta(s) Envida(s) a Patologia</label>
<div class="col-sm-9">
<input  class="form-control clear-cirugia-toracia" name="muestras_patologia"   />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Reporte Histopatologico</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="histopatologico"   ></textarea>
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
url:"<?php echo base_url(); ?>admin_medico/showQuirurcaTabulation",
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
url:'<?php echo base_url();?>admin_medico/saveQuirurgico',
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
