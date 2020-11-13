<?php

$name=($this->session->userdata['admin_name']);
$last_name=($this->session->userdata['admin_last_name']);
  ?>

<ul>
<form  id="formExamf" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>"> 
<button class="btn-sm btn-success historial_save"  type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 
 <p id="successAnt" ><i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos</p>


 <br/>
 <div class="col-xs-12 move_left">
<p class="h4 his_med_title">Navegador</p>
<div id="show_data_select" ></div>
<div class="col-xs-5" id="hide_empty_select"  >

<?php if ($count_exam > 0)
{
	
	?>
<select class="form-control" id="id_enf" >
<option value="">Seleccionar <?=$count_exam?> datos</option>
<?php 

 foreach($examen as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	
  
?>
<option value='<?=$row->id_ex;?>'>(<?=$row->id_ex;?>) Medico : <?=$row->inserted_by; ?> / Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-5" style="display:none" id="reset1">
<button style="background:gray;color:white" type="button"><span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo registro</button>
</div>
<br/><br/>
<p class="h4 his_med_title">Examenes</p>
<p id="flash"></p>
<br/>
<div id="show_form_after_select"></div>
<div id="hide_form_after_select">

<div class="form-group">
<label class="control-label col-md-2" >Neurologico</label>
<div class="col-md-7">
<textarea class="form-control" id="neurologico"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_neuro"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Abdomen</label>
<div class="col-md-7">
<textarea class="form-control" id="abdomen"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_abdo"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Cabeza y cuello</label>
<div class="col-md-7">
<textarea class="form-control" id="cabeza"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_cabe"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2">Zona pelvica</label>
<div class="col-md-7">
<textarea class="form-control" id="pelvica"   ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_pelvi"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Evaluacion clinica de mamas</label>
<div class="col-md-7">
<textarea class="form-control" id="evaluacion_mama" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_evali"> <label>Ningúno</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" >Inspeccion genital</label>
<div class="col-md-7">
<textarea class="form-control" id="inspeccion_genital"   ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_insp"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Examen de torax</label>
<div class="col-md-7">
<textarea class="form-control" id="torax"  ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_torax"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="columna_dorsal"></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_columna"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Corazon</label>
<div class="col-md-7">
<textarea class="form-control" id="corazon"></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_corazon"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Extremidades</label>
<div class="col-md-7">
<textarea class="form-control" id="extremidades" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_ext"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Pulmones</label>
<div class="col-md-7">
<textarea class="form-control" id="pulmones" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_pulm"> <label>Ningúno</label>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" for="firstname">Otros</label>
<div class="col-md-7">
<textarea class="form-control" id="otros" ></textarea>
</div>
<div class="col-md-3">
<input type="checkbox" class="check_otros"> <label>Ningúno</label>
</div>
</div>
</div>
</form>
</ul>
</div>

<script>

//insertion one

$(function() {
	$('#formExamf').on('submit', function(event) {
var neurologico  = $("#neurologico").val();
 var abdomen = $("#abdomen").val();
 var cabeza = $("#cabeza").val();
 var pelvica = $("#pelvica").val();
 var evaluacion_mama = $("#evaluacion_mama").val();
 var inspeccion_genital = $("#inspeccion_genital").val();
 var torax = $("#torax").val();
 var columna_dorsal  = $("#columna_dorsal").val();
 var corazon = $("#corazon").val();
 var extremidades = $("#extremidades").val();
 var pulmones = $("#pulmones").val();
 var otros = $("#otros").val();
 var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveExamenFi')?>",
data:{neurologico:neurologico,abdomen:abdomen, cabeza:cabeza, pelvica:pelvica,evaluacion_mama:evaluacion_mama, inspeccion_genital:inspeccion_genital, torax:torax,columna_dorsal:columna_dorsal,corazon:corazon, extremidades:extremidades, pulmones:pulmones,otros:otros,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow');
$("#show_all").html(data);
$("#hide_all").hide();

}  
});

return false;
});
});



//navegador
$("#id_enf").on('change', function (e) {
e.preventDefault();
$("#flash").fadeIn(400).html('<span class="load">Mostrando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_exam_by_id');?>',
type: 'post',
data:'on_select_show='+$("#id_enf").val(),
success: function (data) {
	$(".historial_save").prop("disabled", true);
	$("#flash").hide();
	$("#show_form_after_select").html(data);
	$("#show_form_after_select").show();
	$("#hide_form_after_select").hide();
	 $("#reset1").show();
	 
	}
});
});


//refresh
$("#reset1").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/examenf');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#examenshow").html(data);
	$("#examenshow").show();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});