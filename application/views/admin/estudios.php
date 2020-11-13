  <?php

$name=($this->session->userdata['admin_name']);
 ?>

<ul>
<div class="col-xs-12 move_left"  >
<p class="h4 his_med_title">Indicaciones estudios</p>

<form  id="formEstudios" class="form-horizontal"  method="post"  >
<input type="hidden" value="<?=$name?>" id="operators" name="operators"/>
<input type="hidden" value="<?=$historial_id?>" id="historial_id_es" name="historial_id_es"/>

<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<div class="form-group">
<label class="control-label col-md-2" >Estudios</label>
<div class="col-md-5">
<select  class="form-control"  name="estudios" id="estudios" required>
<option value="" hidden></option>
<?php 

foreach($estudios as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Parte del cuerpo</label>
<div class="col-md-3">
<select  class="form-control"   name="cuerpo" id="cuerpo" >
<option value="" hidden></option>
<?php 

foreach($cuerpo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Lateralidad</label>
<div class="col-md-9">
<input type="number" name="lateralidad" id="lateralidad" />
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Observaciones</label>
<div class="col-md-5">
<textarea  class="form-control"  id="observaciones" name="observaciones"  ></textarea>
</div>
</div>

<div class="col-md-5" >
<div class="btn-group">
<button type="submit" id="saveIndicacionesMedicales" class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>

<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/print_estudios/'.$historial_id)?>"> Exportar indicaciones</a></li>

</ul>

</div>
 </div>

</form>
<br/><br/>
<p class="h4 his_med_title">Indicaciones previas</p>
<p id="successE" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>

 <div  style="overflow-x:auto;">
 <div id="new_indication_estudios"></div>
 <div id="tabes">
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;"><i><?=$num_count_es?> datos</i></span>
	<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Estudio</th>
		 <th style="width:5px">Parte del cuerpo</th>
		  <th style="width:1px"><strong>Lateralidad</strong></th>
        <th style="width:5px">Observaciones</th>
		 <th style="width:1px">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPreviasEstudios as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->estudio;?></td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
</div>
</ul>
</div>

<script>
// save data of indicaciones medicales
$(function() {

$('#formEstudios').on('submit', function(event) {
var estudios = $("#estudios").val();
var cuerpo = $("#cuerpo").val();
var lateralidad = $("#lateralidad").val();
var observaciones = $("#observaciones").val();
var operators = $("#operators").val();
var historial_id_es = $("#historial_id_es").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicacionesEstudios')?>",
data: {estudios:estudios,cuerpo:cuerpo,lateralidad:lateralidad,observaciones:observaciones,operators:operators,historial_id_es:historial_id_es},

cache: true,
success:function(data){ 
$('#formEstudios')[0].reset();
$("#errorBoxE").hide();
$('#successE').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#new_indication_estudios").html(data);
$("#tabes").hide(); 
}  
});

return false;
});
});
</script>