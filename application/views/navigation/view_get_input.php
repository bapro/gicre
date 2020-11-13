<?php 
foreach($GET_INPUT as $get_input)
{
?>

<div class="form-group">
<label class="control-label col-sm-4"><?=$get_input->name;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]" class="form-control" placeholder="Entrar <?=$get_input->name;?>" required>
<input  type="hidden" name="inputf[]" class="form-control" value="<?=$get_input->name;?>" >

</div>
</div>
<?php
}
?>