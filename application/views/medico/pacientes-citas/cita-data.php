<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control  required"  style="width:100%" name="causa" id="causa" required>
<option value="" hidden></option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->title.'</option>';
}
?>

</select>

</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" required>
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onchange="selectDoctor(this.options[this.selectedIndex].value)" required>
 <option value="" hidden></option>
 <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control select2 required"  style="width:100%"  name="doctor" id="doctor_dropdown"  required>

</select>
<span id="doctor_loader"></span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control"  name="fecha_propuesta"  readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" value="" readonly />
</div>
</div>