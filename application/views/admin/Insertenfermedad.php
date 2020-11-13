<?php

$name=($this->session->userdata['admin_name']);
 ?>

<form  id="formEnfermedad" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>"> 
<button class="btn-sm btn-success historial_save"  type="submit" >
<i class="fa fa-floppy-o" aria-hidden="true"></i> 
Guardar
</button>
<p id="successAnt" ><i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos</p>


<br/>

<div class="tab-pane">
<ul>
<div class="col-xs-12 move_left"  >
<p class="h4 his_med_title">Navegador</p>

<div class="col-xs-5"  >

<?php if ($count_enff > 0)
{
	
	?>
<select class="form-control" id="on_select_show_insert">
<option value="">Seleccionar total (<?=$count_enff?>)</option>
<?php 

 foreach($enfermedad as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	

?>
<option value='<?=$row->id_enf;?>'>(<?=$row->id_enf;?>) Medico : <?=$row->inserted_by; ?> / Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-5" style="display:none" id="resetInsert">
<button style="background:gray;color:white" type="button"><span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo registro</button>
</div>
<br/>
<br/>
<span id="flashee"></span>
<p class="h4 his_med_title">Historia de la enfermedad actual</p>
<div id="hide_form_on_select_insert">
<div class="form-group">
<label class="control-label col-md-2" >Signopsis</label>
<div class="col-md-8">
<textarea class="form-control" id="enf_signopsis" ></textarea>
</div>

</div>

<p class="h4 his_med_title">Estudios traidos por el paciente</p>
<div class="form-group">
<label class="control-label col-md-2" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-8">
<textarea class="form-control" id="enf_laboratorios" ></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" >Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-8">
<textarea class="form-control" id="enf_estudios" ></textarea>
</div>
</div>
</div>
<div id="show_form_on_select_insert"></div>
</div>
</ul>
</div>
</form>
<script>
$(function() {
$('#formEnfermedad').on('submit', function(event) {
var enf_signopsis = $("#enf_signopsis").val();
var enf_laboratorios = $("#enf_laboratorios").val();
var enf_estudios = $("#enf_estudios").val();
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveEnfermedad')?>",
data: {enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#enfermedad_add").html(data);
$("#enfermedad_select").hide(); 

}  
});

return false;
});
});


//navegador
$("#on_select_show_insert").on('change', function (e) {
e.preventDefault();
$("#flashee").fadeIn(400).html('<span class="load">Mostrando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_enfermedad');?>',
type: 'post',
data:'on_select_show='+$("#on_select_show_insert").val(),
success: function (data) {
	$(".historial_save").prop("disabled", true);
	$("#flashee").hide();
	$("#show_form_on_select_insert").html(data);
	$("#show_form_on_select_insert").show();
	$("#hide_form_on_select_insert").hide();
	$("#resetInsert").show();

	 }
	 });
});

//hide show
$("#resetInsert").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/enfermedadshow');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#enfermedadshoww").html(data);
	$("#enfermedadshoww").show();
	$("#examenshow").hide();
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