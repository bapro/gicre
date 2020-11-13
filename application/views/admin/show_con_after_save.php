<?php

$name=($this->session->userdata['admin_name']);
$last_name=($this->session->userdata['admin_last_name']);
  ?>


<ul>
<form  id="formCon" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>"> 
<button class="btn-sm btn-success historial_save"  type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 
 
 <p id="successAnt" ><i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos</p>


 <br/>
 <div class="col-xs-12 move_left">
<p class="h4 his_med_title">Navegador</p>
<div class="col-xs-5" id="hide_empty_select"  >

<?php if ($count_conc > 0)
{
	
	?>
<select class="form-control" id="id_con" >
<option value="">Seleccionar total (<?=$count_conc?>) </option>
<?php 

 foreach($concluciones as $row)
{  
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	
 
?>
<option value='<?=$row->id_cdia;?>'>Medico : <?=$row->inserted_by; ?> <br/><br/> Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>

<div class="col-xs-5" style="display:none" id="resetcon">
<button style="background:gray;color:white" type="button"><span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo registro</button>
</div>
<br/><br/>
<p class="h4 his_med_title">conclucion diagnostica</p>
 <div id="show_form_after_selectcon"></div>
<div id="hide_form_after_selectcon">
<div class="form-group">
<label class="control-label col-md-2" >Plan</label>
<div class="col-md-8">
<textarea class="form-control" id="plan"  ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-8">
<select  class="form-control chosen-diags" data-placeholder="Comienza a escribir." multiple name="diagno_def[]" id="diagno_def" required>

<?php 

foreach($diag_pres as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Procedimiento (CIE-9):  </label>
<div class="col-md-8">
<select  class="form-control chosen-pros" data-placeholder="Comienza a escribir." multiple name="procedimiento[]" id="procedimiento" required>

<?php 

foreach($diag_pro as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2">Evolucion (Paciente subsecuente):   </label>
<div class="col-md-7">
<textarea class="form-control" id="evolucion"  ></textarea>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Mejoria"> <label>Mejoria</label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Empeorando"> <label>Empeorando </label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="No mejoria" checked> <label>No mejoria  </label>

</div>
</div>
</div>
</div>
</form>
</ul>

<script>
$(".chosen-diags").chosen({
no_results_text: "Oops, nada encontrado por : "
})

$(".chosen-pros").chosen({
no_results_text: "Oops, nada encontrado por : "
})
//-----------------------------------
$(function() {
	$('#formCon').on('submit', function(event) {
  var plan   = $("#plan").val();
 var diagno_def  = $("#diagno_def").val();
 var procedimiento = $("#procedimiento").val();
 var evolucion = $("#evolucion").val();
var conclusion_radio = $('input[type="radio"]:checked').val();
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveConcluciones')?>",
data:{ plan:plan,diagno_def:diagno_def,procedimiento:procedimiento,evolucion:evolucion,conclusion_radio:conclusion_radio,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow');
$("#show_allc").html(data);
$("#hide_allc").hide();

}  
});

return false;
});
});


//navegador
$("#id_con").on('change', function (e) {
e.preventDefault();
$("#flashcon").fadeIn(400).html('<span class="load">Cargando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_con_by_id');?>',
type: 'post',
data:'on_select_show='+$("#id_con").val(),
success: function (data) {
	$(".historial_save").prop("disabled", true);
	$("#flashcon").hide();
	$("#show_form_after_selectcon").html(data);
	$("#show_form_after_selectcon").show();
	$("#hide_form_after_selectcon").hide();
	 $("#resetcon").show();
	 }

});
});

//refresh

$("#resetcon").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/Conclucion');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#home").hide();
	$("#conclucionshow").html(data);
	$("#conclucionshow").show();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	}

});
});
</script>