<?php
if($isSeguroTitle==11){
	$display='style="display:none"';
	$req=";display:none";
}else{
	$display='';	
	$req='';
}?>

<div class="form-group">
	<input type="hidden" name="id_seguro" id="isSeguroTitle" value="<?=$isSeguroTitle?>" >
<label class="control-label col-sm-4"><span style="color:red">*</span> Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control hospitalizacion required"  style="width:100%" name="hosp_centro" id="hosp_centro"  >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time"></div>
 </div>
 </div>
<?php 
 	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
if($perfil=="Medico"){
echo"<input name='hosp_esp' type='hidden' value='$area'/>";
	echo"<input name='hosp_doctor' type='hidden' value='$id_user'/>";
 } else { 

 ?>

<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Especialidad</label>
<div class="col-sm-5 esp">
<select class="form-control hospitalizacion required"  style="width:100%" id="hosp_esp" name="hosp_esp"  onChange="getDocHosp(this.value);" disabled >
 
</select>

</div>
 </div>
  <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Doctor</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  style="width:100%"  name="hosp_doctor" id="hosp_doctor" disabled>
</select>

</div>
</div>
	<?php
	}
	?>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Causa</label>
<div class="col-sm-8">
<input class="form-control  required "   name="hosp_causa" id="causa-title<?=$titleId?>"  />
<input class="form-control"  id="titleId" type="hidden" value="<?=$titleId?>" />

</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Via de ingreso</label>
<div class="col-sm-6 centrom">
<input class="form-control  required" name="hosp_ingreso" id="hosp-ingreso" >

 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Sala</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  id="hosp_sala" name="hosp_sala"  >

</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Servicio</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"   name="hosp_servicio" id="hosp_servicio"  >

</select>

</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Cama</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  name="hosp_cama" id="hosp_cama"  >

</select>
</div>
<div id="cama-dispo-info"></div>
</div>
<div id="isSeguroTitleDisplay">
 <div class="form-group" <?=$display?>>
<label class="control-label col-sm-4"><span style="color:red<?=$req?>">*</span> Autorizacion de ingreso</label>
<div class="col-sm-6">

<input class="form-control  required"  name="hosp_auto" id="hosp_auto"  >

</div>
</div>

 <div class="form-group" <?=$display?>>
<label class="control-label col-sm-4"><span style="color:red<?=$req?>">*</span> Autorizado por</label>
<div class="col-sm-6">
<input class="form-control  required"  name="hosp_auto_por" id="hosp_auto_por"  >

</div>
</div>
</div>
<script type="text/javascript">




</script>