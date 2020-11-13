<h4 class="h4">I- IMPORTACION DE TARIFARIOS</h4>
<div class="col-md-12" id="background_">
<br/>
<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<div class="col-md-12" id="abled-after-search">

<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-3">
<input type="file" name="file" class="file" required id="file"  accept=".xls, .xlsx" />

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione la Categoria</label>
<div class="col-sm-4">
<select class="form-control select2 required" name="categoria" id="categoria" onChange="getDoc(this.value);" >
<option value="" hidden></option>
<?php 

foreach($especialidades as $row)
{ 
?>
<option value="<?=$row->id_ar?>" ><?=$row->title_area?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Seleccione el Seguro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 required" name="seguro"  >
<?php 

foreach($all_seguro as $row)
{ 
?>
<option value="<?=$row->id_sm?>" ><?=$row->title?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info" />
</div>
</div>
</div>

<br/>

</form>
<div id="finish" style="display:none">
 <br/> <br/>
<h3 align="center"><u style="color:#38a7bb">Termina la creacion de los tarifarios</u></h3>
<p align="center"><u>Seleccione los doctores apartenecidos a los tarifarios</u></p>
<form method="post" class="form-horizontal" id="save_doct" >
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-4">
<select class="form-control select2" multiple   name="doctor_dropdown" id="doctor_dropdown"  >

</select>
</div>
</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit"  value="Guardar" class="btn btn-info" />
</div>
</div>
</form>
</div>

</div>