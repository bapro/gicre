
 
<div id="enfermedad_show"></div>
  
<div  id="enfermedad_hide" style="margin-left:210px">


<h4 class="h4 his_med_title">Historia de la enfermedad actual</h4>
<br/>
<div class="col-xs-12 move_left"  >

<div class="col-xs-3"  >

<?php if ($count_enf > 0)
{
	
	?>
	<div class="input-group " >
<span class="input-group-addon"><span  class="success-send-enf"><b><?=$count_enf?></b> </span>regitros (s)</span> 

<select class="form-control" id="id_enf_s">
<option hidden>Navegador</option>
<?php 

 foreach($enfermedad as $row)
{
	setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y - %I:%M%p", strtotime($row->inserted_time)));	
	
?>
<option  title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_enf;?>'>Registro # <?=$row->id_enf;?></option>

<?php
}
?>

</select>
<?php
}

?>
</div>
</div>
<div class="col-xs-5" style="display:none" id="resetef">
<div class="btn-group">
<button class="btn btn-primary btn-xs" type="button" id="show_on_c"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>
</form>
<button type="button" title="Imprimir" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/'.$historial_id)?>"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</div>
<br/>
<br/>
<hr style="border-top: 2px groove #38a7bb;"/>
<div id="show_form_on_select"></div>
<div id="hide_form_on_select">
<div  id="flashe" class="col-md-12 form-horizontal">
<div class="form-group">
<label class="control-label col-md-2" >Motivo de consulta</label>
<div class="col-md-6">
<textarea class="form-control" id="enf_motivo" ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Signopsis</label>
<div class="col-md-6">
<textarea class="form-control" id="enf_signopsis" ></textarea>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-2" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-6">
<textarea class="form-control" id="enf_laboratorios" ></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" >Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-6">
<textarea class="form-control" id="enf_estudios" ></textarea>
</div>
</div>
</div>
</div>
</div>

</div>
<script>



//navegador
$("#id_enf_s").on('change', function (e) {
e.preventDefault();
$("#flashe").fadeIn(400).html('<span class="load"><img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_enfermedad');?>',
type: 'post',
data:'id_enf_s='+$("#id_enf_s").val(),
success: function (data) {
	$(".save_enf_act").hide();
	$("#flashe").hide();
	$("#show_form_on_select").html(data);
	$("#show_form_on_select").show();
	 $("#hide_form_on_select").hide();
	 $("#resetef").show();
	 
}

});
});

//hide show
$("#show_on_c").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/enfermedadshow');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#enfermedadshoww").html(data);
	$("#enfermedadshoww").show();
	$(".save_enf_act").slideDown();
}

});
});
</script>