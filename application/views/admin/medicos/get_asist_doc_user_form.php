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
<div id="showere"></div>
<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url("$controller/SaveUserAsM");?>">
<h3 style="text-align:center;color:red"  id="errorBox2"></h3>
<div class="form-group" >
<label class="control-label col-sm-2" >Perfil</label>
<div class="col-sm-5">

<input class="form-control savethisperfil required"  name="perfil" value="<?=$perfil?>" style="pointer-events:none" type="text" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" >Nombres Apellidos</label>
<div class="col-sm-4">
<input  type='text' class='form-control required'  name='nombre'   >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-2" >Cedula</label>
<div class="col-sm-5">
<input type="text" class="form-control required"   name="cedula"   >
</div>
</div>
<div class="form-group ">
<label class="control-label col-sm-2">Centro médico</label>
<div class="col-sm-10">
<!--<input type="checkbox" id="checkbox2"> Seleccionar todo-->
<select class="form-control select2 required loadDoc" id="e2" multiple="multiple"  name="centro_medico[]">
<?php 

foreach($medical_centers as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>
</div>
</div>

<div class="form-group ">
<label class="control-label col-sm-2">Médico</label>
<div class="col-sm-10">
<!--<input type="checkbox" id="checkbox2"> Seleccionar todo-->
<select class="form-control select2 required" id="e3" multiple="multiple"  name="medico[]">

</select>
</div>
</div>







 <div class="form-group">
<label class="control-label col-sm-2" >Correo electronico</label>
<div class="col-sm-10">
<input type="email" class="form-control required email-clear" id="email3" style="text-transform:lowercase" name="email"   >
<div id="emailInfo3"></div>
</div>
</div>

<button type="button" class="btn btn-default" id="Reset">Reiniciar</button>
<button type="submit" id="senduserdoc"  class="btn btn-primary">Crear registro</button>
<br/><br/>

</form>

