
<?php
foreach($result as $row)

?>
<div class="form-group">
<label class="control-label col-sm-2" >Codigo / Simon</label>
<div class="col-sm-2" >
<input type="text" class="form-control" value="<?=$row->codigo?> / <?=$row->simon?>"/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" >Monto </label>
<div class="col-sm-2" >
<div class="input-group">
<span class="input-group-addon">$RD</span>
<input type="text" class="form-control" value="<?=$row->monto?>"/>
</div>
</div>
</div>
