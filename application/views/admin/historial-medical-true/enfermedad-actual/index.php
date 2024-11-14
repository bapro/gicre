<!--<span id="refresh-enf-act">

<h4 class="h4 his_med_title">
Historia de la enfermedad actual (<b><?=$count_enf?> regitros (s)</b>)


</h4>
<br/>
<?php if ($count_enf > 0)
{


 foreach($enfermedad as $row)
{

//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
?>
<div class="pagination">
<a title="Creado por :<?=$row->inserted_by?> , fecha : <?=$inserted_time?>" data-toggle="modal" data-target="#ver_enf_act" href="<?php echo base_url("admin_medico/show_enfermedad/$row->id_enf/$user_id")?>">
#<?=$row->id_enf;?>
</a></div>
<?php
}
?>

<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>
<div  id="flashe" class="col-md-12 form-horizontal">
<hr class="hr_ad"/>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Motivo de consulta</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="enf_motivo" ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Signopsis</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="enf_signopsis" ></textarea>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-2" > Laboratorios (Resultados relevantes)</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="enf_laboratorios" ></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" > Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="enf_estudios" ></textarea>
</div>
</div>
</div>
</span>-->
<div id="EnfermedadForm" ></div>
<div class="modal fade" id="ver_enf_act"  role="dialog" >
<div class="modal-dialog  modal-inc-width1" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
EnfermedadForm();
function EnfermedadForm()
{
var user_id = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
var centro_medico  = "<?=$centro_medico?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/EnfermedadForm",
data: {user_id:user_id,historial_id:historial_id,centro_medico:centro_medico},
method:"POST",
success:function(data){
$('#EnfermedadForm').html(data);
}
});
}
</script>