
<?php 
foreach($GET_NAMEF as $get_input)
{
?>
<div class="form-group">

<label class="control-label col-sm-3" ><?=$get_input->inputf;?></label>
<div class="col-sm-3">
<input  type="text"  class="form-control" value="<?=$get_input->input_name;?>" >
<input  type="hidden"  class="form-control" value="<?=$get_input->inputf;?>" >
</div>
</div>

<?php
}

if($seguro_medico !="PRIVADO")
{
?>
<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="afiliado" id="afiliado">
<option>Titular</option>
<option>Depediente</option>
</select>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="plan" id="plan">
<option>Basico</option>
<option>Complementario</option>
<option>Subsidiado</option>
</select>
</div>
</div>
<?php
}
?>

<script>
$(".select-examsis").select2({
  tags: true
});
</script>