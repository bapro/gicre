<style>
#form_user2 .short{
font-weight:bold;
color:#FF0000;
font-size:larger;
}
#form_user2 .weak{
font-weight:bold;
color:orange;
font-size:larger;
}
#form_user2 .good{
font-weight:bold;
color:#2D98F3;
font-size:larger;
}
#form_user2 .strong{
font-weight:bold;
color: limegreen;
font-size:larger;
}
#gray{background:gray}

</style>

<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url("$controller/SaveUser");?>">
<h3 style="text-align:center;color:red"  id="errorBox2"></h3>

<!-- left column -->
<div class="row">

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2"  >Perfil</label>
<div class="col-sm-5">

<input class="form-control savethisperfil required" name="perfil"  value="<?=$perfil?>" style="pointer-events:none" type="text" >
</div>
</div>



<div class="form-group ">
<label class="control-label col-sm-2">Exequatur</label>
<div class="col-sm-2">
<select class="form-control select2 required"  name="exequatur"  id="exequatur">
<option value="" hidden></option>
  <?php 

 foreach($execuatur as $row)
 { 
 echo '<option>'.$row->code.'</option>';
 }
 ?>
 </select>
 </div>
 </div>
<div class="form-group" id="show_this_nombre">
<label class="control-label col-sm-2" >Nombres</label>
<div class="col-sm-7">
<span   id="nombre"   ></span>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-2" >Cedula</label>
<div class="col-sm-2">
<input type="text" class="form-control required"   name="cedula"   >
</div>
</div>
<div class="form-group ">
<label class="control-label col-sm-2">Especialidad</label>
<div class="col-sm-4">
<select class="form-control select2 required"  name="especialidad"  id="especialidad">
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
<label class="control-label col-sm-2" >Correo electronico</label>
<div class="col-sm-4">
<input type="email" class="form-control required email-clear" id="email2"  name="email"  style="text-transform:lowercase" >
<div id="emailInfo2"></div>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2">Seguro médico</label>
<div class="col-sm-4">
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2">Plan de pago</label>
<div class="col-sm-4">
<table>
<?php 
$sql="SELECT * FROM medico_precio_plan ORDER BY precio ASC";
$query=$this->db->query($sql);
foreach($query->result() as $row)
{
	if($row->plan=='Mensual'){
	$checked='checked';	
	}else{
	$checked='';	
	}
?>
<tr>
<td style='text-align:left;font-size:14px'><input type="radio" name="plan-pago" <?=$checked?>> <label><?=$row->plan?></label></td style='font-size:14px'><td><label>$<?=$row->precio?>USD</label></td>
</tr>
<?php } ?>
</table>
</div>
</div>


 </div>

<div class="row">
<button type="button" class="btn btn-default" id="Reset">Reiniciar</button>
<button type="submit" id="senduserdoc"  class="btn btn-primary">Crear registro</button>
<br/><br/>
 </div>
</form>
