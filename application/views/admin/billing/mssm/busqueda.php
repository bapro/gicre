 <div class="col-lg-12 searchb">
 <br/>
<div class="col-lg-4">
<div class="input-group">
<span  class="input-group-btn">
<label class="control-label col-sm-2 remored">Categoria</label>

</span>

<select id="categoria" class="form-control select2" onChange="getCatName(this.value);">
<option value="" hidden></option>
<?php 

foreach($search as $row)
{ 
?>
<option value="<?=$row->categoria?>" title="Si no encuentra la categoria que quiere crear una nueva !"><?=$row->categoria?></option>
<?php
}
?>
</select>

</div>
</div>
<div class="col-lg-6" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<label class="control-label col-sm-3"> Servicio</label>
</span>
<select  class="form-control select2"  id="id_service_mssn1" disabled >

</select>

</div>
</div>

<div class="col-lg-2" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<button id="nuevob" onClick="history.go(0)" style="display:none" class="btn btn-default" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo</button>
</span>
</div>
</div>
<br/><br/>
</div>