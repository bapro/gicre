<?php

$name=($this->session->userdata['admin_name']);
$last_name=($this->session->userdata['admin_last_name']);
  ?>

<form  id="formExamS" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>"> 
<button  style="margin-top:-7%;margin-left:68%" class="btn-sm btn-success historial_save"  type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

<p style="border-bottom: 2px groove #38a7bb;" class="h4 his_med_title">Examen por sistema</p>
<p><i><b><span class="success-send" style="font-size:25px"><?=$count_examsis?></span></b> registros.</i></p>
<div class="col-xs-3" id="hide_empty_select"  >

<?php if ($count_examsis > 0)
{
?>

<select class="form-control" id="id_exs" >
<option value="" hidden>Seleccionar registro</option>
<?php 

 foreach($examensis as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	
   
?>
<option title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_exs;?>'>Seleccionar registro # <?=$row->id_exs;?> </option>

<?php
}
?>

</select>
<?php
}

?>

</div>

<div class="col-xs-5" style="display:none" id="reset3">
<button  class="btn btn-primary btn-xs" type="button"><span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
</div>
<br/><br/>

<p id="flash2"></p>
<div id="show_form_after_select2"></div>
<div id="hide_form_after_select2">
 <div  style="overflow-x:auto;">
<table  class="table" cellspacing="0">

<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema nervioso</label>
<div class="col-md-7">
<textarea class="form-control" id="nervioso"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema linfatico</label>
<div class="col-md-7">
<textarea class="form-control" id="linfatico"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>

<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema respiratorio</label>
<div class="col-md-7">
<textarea class="form-control" id="respiratorio"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_resp"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema genitourinario</label>
<div class="col-md-7">
<textarea class="form-control" id="genitourinario"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_genit"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema digestivo</label>
<div class="col-md-7">
<textarea class="form-control" id="digestivo"></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dig"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3">Sistema endocrino</label>
<div class="col-md-7">
<textarea class="form-control" id="endocrino"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_endo"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Otros</label>
<div class="col-md-7">
<textarea class="form-control" id="otros_ex_sis" ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_otros"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="dorsales"    ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dor"> 
</div>
</div>
</td>
</tr>
<tr>
</table>
</div>
</div>

</form>


<script>

//insertion one

$(function() {
$('#formExamS').on('submit', function(event) {
	$(".success-send").fadeIn(400).html('<span class="load"><img src="<?= base_url();?>assets/img/loading.gif" /></span>');

 var nervioso  = $("#nervioso").val();
 var linfatico  = $("#linfatico").val();
 var respiratorio = $("#respiratorio").val();
 var genitourinario = $("#genitourinario").val();
 var digestivo = $("#digestivo").val();
 var endocrino = $("#endocrino").val();
 var otros_ex_sis = $("#otros_ex_sis").val();
 var dorsales = $("#dorsales").val();
 var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveSExamSis')?>",
data:{nervioso:nervioso, linfatico:linfatico, respiratorio:respiratorio, genitourinario:genitourinario, digestivo:digestivo,endocrino:endocrino,otros_ex_sis:otros_ex_sis,dorsales:dorsales,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$(".success-send").hide();
$("#show_all2").html(data);
$("#hide_all2").hide();

}  
});

return false;
});
});



$("#id_exs").on('change', function (e) {
e.preventDefault();
$("#flash2").fadeIn(400).html('<span class="load">Mostrando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_examsis_by_id');?>',
type: 'post',
data:'on_select_show='+$("#id_exs").val(),
success: function (data) {
	$(".historial_save").prop("disabled", true);
	$("#flash2").hide();
	$("#show_form_after_select2").html(data);
	$("#show_form_after_select2").show();
	$("#hide_form_after_select2").hide();
	 $("#reset3").show();
	 }
});
});

	 //refresh
$("#reset3").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/examensis');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#examensisshow").html(data);
	$("#examensisshow").show();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});