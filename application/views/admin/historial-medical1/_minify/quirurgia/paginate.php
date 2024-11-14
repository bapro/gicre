<style>

.form-aling-left .control-label{
    text-align: right;
	text-transform:uppercase;font-size:11px;
}
</style>

<?php
foreach ($cirugia_paginate->result() as $rowp) {
$inserted_time = date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$rowp->id_user)
 ->get('users')->row('name');
?>
<form class="form-horizontal form-aling-left" id="save-quirurgica-update" method="post">
 <h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?></h5>
<div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-sm-3" >FECHA:</label>
      <div class="col-sm-9">          
      		<input class="form-control" id="fecha_quiri" name="fecha_quiri" value='<?=$inserted_time?>' >
      </div>
	
    </div>
<div class="form-group">
<label class="control-label col-sm-3">Diagnostico Pre-Quirurgico:</label>
<div class="col-sm-9">
  <textarea  class="form-control clear-cirugia-toracia" name="diag_pre_qui"   ><?=$rowp->diag_pre_qui?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Diagnostico Post-Quirurgico:</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="diag_post_qui"   ><?=$rowp->diag_post_qui?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Anestesia:</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="anestesia"   ><?=$rowp->anestesia?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Tipo de incision</label>
<div class="col-sm-9">
<input  class="form-control clear-cirugia-toracia" name="incision" value="<?=$rowp->incision?>"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Programada</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="cirugia_programada"   ><?=$rowp->cirugia_programada?></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Cirugia Realizada </label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="cirugia_realizada" ><?=$rowp->cirugia_realizada?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Hallazgo</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="hallasgo" ><?=$rowp->hallasgo?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Descripcion Del Procedimiento</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="desc_proced"   ><?=$rowp->desc_proced?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Pronostico Post Quirurgico</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="pro_post"   ><?=$rowp->pro_post?></textarea>
</div>
</div>
</div>
<div class="col-md-6">
<table class="table" style="width100%">
<tr>
<td style="text-align:right;text-transform:uppercase;font-size:11px"><label class="control-label">Perdida Sanguinea</label></td>
<td>
<div class="input-group">
<input  class="form-control clear-cirugia-toracia" name="perdida_sanguinea" value="<?=$rowp->perdida_sanguinea?>"  />
<span class="input-group-addon">CC</span>
</div>

</td>

<td style="text-align:right;text-transform:uppercase;font-size:11px"><label class="control-label">No de Compresas</label></td>
<td>
<input  class="form-control clear-cirugia-toracia" name="compresa" value="<?=$rowp->compresa?>">
</td>

<td style="text-align:right;text-transform:uppercase;font-size:11px"><label class="control-label">No. de Gasas</label></td>
<td>
<input  class="form-control clear-cirugia-toracia" name="gasas" value="<?=$rowp->gasas?>">
</td>
</tr>
</table>

<div class="form-group">
<label class="control-label col-sm-3">Drenes</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="drenes"   ><?=$rowp->drenes?></textarea>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Transfusion</label>
<div class="col-sm-3">
<input  class="form-control clear-cirugia-toracia" name="transfusion" value="<?=$rowp->transfusion?>"   />

</div>
<label class="control-label col-sm-3" >Unids Transfundidas</label>
<div class="col-sm-3">
<input  class="form-control clear-cirugia-toracia" name="unids_transfusion" value="<?=$rowp->unids_transfusion?>"  />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Condicion del paciente</label>
<div class="col-sm-9">
<select class="form-control select2" name="condicion_paciente" >
<option ><?=$rowp->condicion_paciente?></option>
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
<option ><?=$rowp->traslado?></option>
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
<input value="<?=$rowp->hora_ini?>"  class="form-control clear-cirugia-toracia hour" name="hora_ini" id="hora_ini"   />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
<label class="control-label col-sm-3" >Hora Finalizacion</label>
<div class="col-sm-3">
 <div class="input-group">
<input value="<?=$rowp->hora_fin?>"  class="form-control clear-cirugia-toracia hour" name="hora_fin"  id="hora_fin" oninput="calHour()"  />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Tiempo Quirurgico</label>
<div class="col-sm-3">
 <div class="input-group">
<input value="<?=$rowp->tiempo_quirurgico?>"  class="form-control clear-cirugia-toracia" id="tiempo_quirurgico" name="tiempo_quirurgico" style="pointer-events:none" placeholder="00:00" />
<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cirujano</label>
<div class="col-sm-9">
<input value="<?=$rowp->cirujano?>"  class="form-control clear-cirugia-toracia" name="cirujano"   />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s)</label>
<div class="col-sm-9">
<input value="<?=$rowp->ajudante?>"  class="form-control clear-cirugia-toracia" name="ajudante"   />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Ayudante(s) Enfemeria</label>
<div class="col-sm-9">
<input value="<?=$rowp->ajudante_enf?>"  class="form-control clear-cirugia-toracia" name="ajudante_enf"   />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Muesta(s) Envida(s) a Patologia</label>
<div class="col-sm-9">
<input value="<?=$rowp->muestras_patologia?>"  class="form-control clear-cirugia-toracia" name="muestras_patologia"   />
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Reporte Histopatologico</label>
<div class="col-sm-9">
<textarea  class="form-control clear-cirugia-toracia" name="histopatologico"   ><?=$rowp->histopatologico?> </textarea>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<hr class="prenatal-separator"/>
<button type="submit"  class="btn btn-lg btn-success"><i class="fa fa-check after-actionqe" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
<a  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/$rowp->id/$id_patient/$rowp->id_user/$centro_medico/q")?>"  ><i class="fa fa-print"></i> Imprimir</a>
</div>
</div>
<input type="hidden" value="<?=$id_patient?>" name="id_patient"   />
<input type="hidden" value="<?=$user_id?>" name="id_user"   />
<input type="hidden" value="<?=$rowp->id?>" name="operator"   />
</form>
<?php
}

?>

<script>

$(".select2").select2({
tags: true
});

$(".load-cirugia").not('.registro-li').hide();

$('#save-quirurgica-update').submit(function(e){
e.preventDefault();
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveQuirurgico',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
$('#afte').html(data);
  $('.after-actionqe').fadeIn('slow', function(){
    $('.after-actionqe').delay(3000).fadeOut();
    });
}

});

});
</script>
