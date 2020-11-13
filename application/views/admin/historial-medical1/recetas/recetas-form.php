<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Medicamento</label>

<select  class="form-control  select2"   id="medicamento1" >
<option></option>
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
<label class="control-label" >Dosis</label>

<input type="text" class="form-control" id="medicamento-dosis">

</div>

<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Presentacion</label>

<select  class="form-control select2"  name="presentacion" id="presentacion" >
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
<label class="control-label" ><span style="color:red">*</span> Frecuencia</label>

<select  class="form-control select2"   name="frecuencia" id="frecuencia" >
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
<label class="control-label" ><span style="color:red">*</span> Via</label>

  <select  class="form-control select2"   name="via" id="via" >
<option value="" hidden></option>
<?php 

foreach($via as $row)
{ 
echo '<option value="'.$row->via.'">'.$row->via.'</option>';
}
?>
</select>

<span style="display:none" class="show-oyo">
  <select  class="form-control select2"   name="oyo" id="oyo" >
  <option value="" hidden></option>
<option>Ojo izquiedo</option>
<option>Ojo derecho</option>
<option>Ambos ojos </option>

</select>

</div>
<div class="form-group">
<label class="control-label" >Cantidad (dias)</label>

<input type="number" style='width:120px' class="form-control reset-res" name="cantidad" id="cantidad" min="1"/>
<label class="control-label" >Uso continuo</label> <input type="checkbox" class="uso-continuo" />
</div>

<script>
$(".select2").select2({
	
  tags: true
});



//---------------------------------------------------------------------------------------
$("#via").change(function() {
  var via = $(this).val();
if(via=="OFTALMICA")
{
	$(".show-oyo").show();
}else
{
	$(".show-oyo").hide();
}
});



$('.uso-continuo').change(function() {
    if ($('.uso-continuo:checked').length) {
        $('#cantidad').prop('disabled', true);
		  $('#cantidad').val('');
		
    } else {
        $('#cantidad').prop('disabled', false);
		
    }
});
</script>