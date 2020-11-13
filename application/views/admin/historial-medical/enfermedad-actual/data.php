<?php
foreach($show_enf as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
//$updated_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));	

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>


<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<div class="col-md-12 col-md-offset-2" >
<h3 class="modal-title text-left"  >Enfermedad Actual # <?=$row->id_enf?>  <span style='color:green'>(<?=$centro_name?>)</span></h3><br/>
<h5 class="modal-title text-left"  >Creado por :<?=$row->inserted_by?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$row->updated_by?> | fecha :<?=$updated_time?></span> </h5>
 <br/>
<button type="button" class="show_modif_enf_act btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<button type="button" id="save_enf_act_hide" class="save_enf_act_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank" href="<?php echo base_url("printings/print_enf_act/$row->id_enf")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
</div>
 <br/>
</div>

<div class="modal-body" >
<form  class="form-horizontal disable-all" >
<input type="hidden" id="id_enf" value="<?=$row->id_enf?>">
<input type="hidden" id="updated_by" value="<?=$user?>">
<div class="form-group">
<label class="control-label col-md-3" >Motivo de consulta</label>
<div class="col-md-6">
<select class="form-control select2"  id="enf_motivo1" >
<option hidden><?=$row->enf_motivo; ?></option>
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
<label class="control-label col-md-3" >Signopsis</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_signopsis1" disabled><?=$row->signopsis; ?></textarea>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-3" >Laboratorios (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_laboratorios1" disabled><?=$row->laboratorios; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Estudios/Imagenes (Resultados relevantes)</label>
<div class="col-md-9">
<textarea class="form-control" id="enf_estudios1" disabled><?=$row->estudios; ?></textarea>
</div>
</div>
</form>
</div>

