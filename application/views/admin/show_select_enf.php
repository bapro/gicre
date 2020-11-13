<?php
if($count_enff >0){
?>
<div class="col-xs-5"  >
<select class="form-control" id="id_enfd" >
<option>Selectionnar_ss <?=$count_enff?> datos</option>
<?php 

 foreach($ENF as $row)
{ 
?>
<option value='<?=$row->id_enf;?>'>Medico : <?=$row->inserted_by; ?> Fecha : <?=$row->inserted_time; ?></option>

<?php
}
?>

</select>
</div>
<?php
}
else
{}
?>
<div class="col-xs-2" style="display:none" id="reset1d">
<button type="button">Reiniciar</button>
</div>
<br/>
	

<div id="hide_enfermedad3">
<p class="h4 his_med_title">Historia de la enfermedad actual</p>

<div class="form-group">
<label class="control-label col-md-1" >Signopsis_ss</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_signopsis" ></textarea>
</div>
<!--
<div class="col-md-2">
<input type="checkbox"> <label>Ninguno</label>
</div>-->
</div>
<p class="h4 his_med_title">Estudios traidos por el paciente</p>
<div class="form-group">
<label class="control-label col-md-1" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_laboratorios" ></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-1" >Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_estudios" ></textarea>
</div>
</div>
</div>

<div id="naveg_enf_result3"></div>

<script>

//navegador
$("#id_enfd").on('change', function (e) {
e.preventDefault();
$.ajax({
url: '<?php echo site_url('admin/show_enfermedad');?>',
type: 'post',
data:'id_enf='+$("#id_enfd").val(),
success: function (data) {
	$("#naveg_enf_result3").html(data);
	 $("#hide_enfermedad3").hide();
	 $("#reset1d").show();
	  $("#naveg_enf_result3").show();
}

});
});

//hide show

$("#reset1d").on('click', function (e) {
$('#formAntecedentes')[0].reset();
	 $("#naveg_enf_result3").hide();
	  $("#hide_enfermedad3").show();
	 $("#reset1d").hide();

});


</script>