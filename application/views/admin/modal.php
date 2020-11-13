<?php $name=$this->session->userdata['admin_id'];?>
  <style>
 #p1{color:red}
 #blanck{color:red}
  #blanckd{color:red}
  #ps{color:red}
 #blancks{color:red}
}
	</style>
	
	
	<div class="modal fade" id="myModalCausa" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Editar Especialidad #<input type="text" name="idtitle" id="idtitle" style="border:none;background:none" ></h4>
 </div>

<div class="modal-body" style=" " >
<form method="post" class="form-horizontal" action="<?php echo site_url('admin/edit_causa');?>">

<div class="form-group" >
<label class="control-label col-sm-2">Causa :</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="causa" id="causa" >
</div>
</div>
<div class="form-group" style="display:none">
<label class="control-label col-sm-2">id :</label>
<div class="col-sm-7">
<input type="text" class="form-control" name="ida" id="ida" >
</div>
</div>
<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>

</div>
<br/>
</div>

</form>

</div>
</div>
</div>
</div>

  <!--create disease-->
  
<div class="modal fade" id="NewDisease" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Nueva Causa </h4>

</div>

<div class="modal-body" style=" " >
<form method="post"  class="form-horizontal"  action="<?php echo site_url('admin/save_disease');?>" >

<div class="form-group">
<label for="disease" class="control-label col-sm-2">Causa :</label>
<div class="col-sm-7">
<input type="text" class="form-control" id="disease" name="disease" placeholder="ingrese el nombre del disease" >
<span id="blanckd"></span><br/>
<span id="p1"></span>

</div>

</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<!--<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>-->
<input id="save_disease" class="btn btn-primary btn-xs save-disease" type="submit"  value="Enviar" /> 

</div>
<br/>
</div>

</form>


</div>
</div>
</div>
</div>

  <!--create area-->
  
<div class="modal fade" id="NuevaArea" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Nueva Area </h4>

</div>

<div class="modal-body" style=" " >
<form method="post"  class="form-horizontal" action="<?php echo site_url('admin/save_area');?>" >

<div class="form-group">
<label for="area" class="control-label col-sm-2">Area :</label>
<div class="col-sm-7">
<input type="text" class="form-control" id="area" name="title_area" placeholder="ingrese el nombre del área" >
<span id="blanck"></span><br/>
<span id="p1"></span>

</div>

</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<!--<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>-->
<input id="save_area" class="btn btn-primary btn-xs" type="submit"  value="Enviar" /> 

</div>
<br/>
</div>

</form>


</div>
</div>
</div>
</div>
<!---------------------------------------edit seguro medico------------------------------------------------->


 <div class="modal fade" id="NuevaSeguroMedico"  tabindex="-1" role="dialog" >
 
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header"  id="background_" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title">Nuevo seguro medico </h4>
<div id="erBox" style="color:red"></div>
</div>

<div class="modal-body" >
<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('admin/save_s_m');?>">
<input type="hidden" class="form-control" value="<?=$name?>" name="user_name"  >
<div class="form-group" style="background:white" >

<label class="control-label col-sm-3">Nombre :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="title" id="title_ns" >

</div>

</div>

<div class="form-group" id="background_" >

<label class="control-label col-sm-3">Cargar Logo :</label>
<div class="col-sm-8">
<input type="file" class="file" name="picture"  id="picture" onchange="get_detail();">
<span id="divFiles" style="color:red" ></span>
</div>

</div>

<div class="form-group"  >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">RNC :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="rnc" id="rnc">

</div>

</div>

<div class="form-group"  id="background_" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Telefonos :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="tel" id="tel" >

</div>

</div>

<div class="form-group" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Correo :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="email"  id="email">

</div>

</div>

<div class="form-group" id="background_" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Direccion :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="direccion" id="direccion">

</div>

</div>

<div class="form-group" id="background_" >
<div id="erBox4" style="color:red"></div>
<label class="control-label col-sm-3">Campos:</label>
<div class="col-sm-6">

	<?php 

		foreach ($ALL_FIELDS as $row ) {

 
		echo "<p><input name='field_id[]' type='checkbox'   value='$row->id' /> $row->name</<p> ";



		}
	 	
	 ?>
	

</div>
</div>

<div class="form-group">
<br/>
<div class="col-sm-12 col-md-offset-3">
<button type="submit"  id="send" class="btn btn-primary btn-xs save-new-seguro" disabled> Guardar</button>

</div>
<br/><br/>
</div>


</form>


</div>
</div>
</div>
</div>
<script>
$('.save-disease').click(function(e) {
if($("#disease").val() == "" ){
alert("Campo requerido !");
return false;
}
});

</script>