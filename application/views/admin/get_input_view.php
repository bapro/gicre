<?php 
foreach($GET_NAMEF as $get_input)
{
?>
<div class="form-group">

<label class="control-label col-sm-3" ><?=$get_input->inputf;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]" class="form-control" value="<?=$get_input->input_name;?>" disabled>
</div>
</div>
<?php
}
?>