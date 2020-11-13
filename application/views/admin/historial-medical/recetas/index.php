<?php

$name=($this->session->userdata['admin_name']);
?>
<div class="col-md-12 move_left" style="background:#E6E6FA"  >
<h4 class="h4 his_med_title">Indicaciones recetas</h4>
 <hr class="title-highline-top"/>
</div>


<input type="hidden" value="<?=$name?>" id="operator" name="operator"/>

<div class="col-md-3"  >
<div class="form-group">
<label class="control-label" >Medicamento</label>

<select  class="form-control"   id="medicamento1" >
<option  hidden></option>
<?php 

foreach($medicamentos as $row)
{ 
?>
<option value="<?=$row->name?>"><?=$row->name?></option>
<?php
}
?>
</select>


</div>
<div class="form-group">
<label class="control-label" >Presentacion</label>

<select  class="form-control"  name="presentacion" id="presentacion" >
<option value="" hidden></option>
<?php 

foreach($presentacion as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>

</div>
<div class="form-group">
<label class="control-label" >Frecuencia</label>

<select  class="form-control"   name="frecuencia" id="frecuencia" >
<option value="" hidden></option>
<?php 

foreach($frecuencia as $row)
{ 
echo '<option value="'.$row->frecuency.'">'.$row->frecuency.'</option>';
}
?>
</select>

</div>
<div class="form-group">
<label class="control-label" >Via</label>

  <select  class="form-control"   name="via" id="via" >
<option value="" hidden></option>
<?php 

foreach($via as $row)
{ 
echo '<option value="'.$row->via.'">'.$row->via.'</option>';
}
?>
</select>

</div>
<div class="form-group">
<label class="control-label" >Cantidad (dias)</label>

<input type="number" class="form-control" name="cantidad" id="cantidad" min="1"/>

</div>
<div class="form-group">
<label class="control-label" >Farmacia</label>

<select  class="form-control"  name="farmacia" id="farmacia" onChange="getSuc(this.value);">
<option value="" hidden></option>
<?php 

foreach($farmacia as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->noma.'</option>';
}
?>
</select>

</div>

<div class="form-group">
<label class="control-label" >Sucursal</label>
<select class="form-control"  name="branch" id="branch" disabled>

</select>

</div>
</div>
<div title="Ingresar" class="col-md-1" >
<div class="btn-group">

<button type="button" id="add-all" class="btn btn-primary btn-xs">
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
</button>

 </div>
</div>

<div class="col-md-5 doubleb"  style="top:20px;height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 5px hsl(0, 0%, 50%),
    0 0 0 10px hsl(0, 0%, 60%),
    0 0 0 15px hsl(0, 0%, 70%),
    0 0 0 20px hsl(0, 0%, 80%);
    ">
	
<div id="new_indication"></div>

</div>
<div class="col-md-3">

</div>

<div class="col-md-12" >
 <hr class="title-highline-top"/>
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;"><i>Total recetas <?=$num_count?> </i></span>
	<thead>
    <tr style="background:#428bca;">
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Medicamento</th>
		 <th style="width:5px;color:white">Presentacion</th>
		 <th style="width:1px;color:white">Frecuencia</th>
		  <th style="width:1px;color:white"><strong>Via</strong></th>
        <th style="width:5px;color:white">Cantidad (dias)</th>
		 <th style="width:1px;color:white">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPrevias as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->medica;?></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?></td>
		<td><?=$row->cantidad;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>

</div>
<script>
// save data of indicaciones medicales
$(document).ready(function(){

$('#add-all').on('click', function(event) {
	event.preventDefault();
var operator = $("#operator").val();
var historial_id = $("#historial_id").val();
var medicamento1 = $("#medicamento1").val();
var presentacion = $("#presentacion").val();
var frecuencia = $("#frecuencia").val();
var cantidad = $("#cantidad").val();
var via = $("#via").val();
var farmacia = $("#farmacia").val();
var branch = $("#branch").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicaciones')?>",
data: {medicamento1:medicamento1,presentacion:presentacion,operator:operator,frecuencia:frecuencia,cantidad:cantidad,via:via,farmacia:farmacia,branch:branch,historial_id:historial_id},


cache: true,
success:function(data){ 
//alert(data);
$('#formRecetas')[0].reset();
$("#branch").val("");
$("#new_indication").html(data);
}  
});

return false;
});



});



function getSuc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/getSuc');?>',
	data:'id_esp='+val,
	success: function(data){
		//alert(data);
	$("#branch").prop('disabled', false);
		$("#branch").html(data);
	}
	});
}

</script>