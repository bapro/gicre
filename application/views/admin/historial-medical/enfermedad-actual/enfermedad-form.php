<br/>
<h4 class="h4 his_med_title">
Historia de la enfermedad actual (<b><?=$count_enf?> regitros (s)</b>)
</h4>
<br/>
<?php if ($count_enf > 0)
{


 foreach($enfermedad as $row)
{

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');	
?>
<div class="pagination">
<a title="<?=$centro?> Creado por :<?=$row->inserted_by?> , fecha : <?=$inserted_time?> &#013 Cambiado por :<?=$row->updated_by?>, fecha :<?=$updated_time?>" data-toggle="modal" data-target="#ver_enf_act" href="<?php echo base_url("admin_medico/show_enfermedad/$row->id_enf/$user_id/$row->centro_medico")?>">
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
<div class="col-md-4">

<select class="form-control select2 causa"  name="enf_motivo" id="enf_motivo" >
<option><?=$enf_motivo?></option>
<?php 

foreach($causa as $ca)
{ 
echo '<option value="'.$ca->title.'">'.$ca->title.'</option>';
}
?>

</select>

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
<script>
$(".select2").select2({
	
  tags: true
});
</script>