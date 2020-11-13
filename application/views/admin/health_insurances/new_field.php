 <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<style>
td,th{text-align:left}

</style>
<div id="background_">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title">Nuevo Campo</h4>

</div>

	<form method="post" class="form-horizontal"  action="<?php echo site_url('admin/SaveField');?>">
<div style="background:white">

<div class="form-group" >
<br/>
<span id="erBox" style="color:red"></span>
<label class="control-label col-sm-3">Nombre :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="title" id="title">
<br/>
</div>

</div>

</div>
<div class="form-group" >
<span id="erBox2" style="color:red"></span>
<label class="control-label col-sm-3">Descripcion :</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="descripcion" id="descripcion">
</div>
</div>


<div style="background:white">
<div class="form-group" >

<label class="control-label col-sm-3">Activo :</label>
<div class="col-sm-1">
 <input name="activo" type="checkbox"  style="margin-left:15px" >		
</div>
		
</div>
</div>

<div id="background_">

<div class="form-group"  >
<br/>
<label class="control-label col-sm-3">Seguro medico:</label>
<div class="col-sm-8">
	<?php 
 foreach ($seguro_medico as $row ) {
   echo "<p style='margin-left:15px'><input name='activo_seguro[]' type='checkbox'  value='$row->id_sm' /> $row->title</p>";
	 }
	 	
	 ?>
</div>
</div>
</div>
<div style="background:white">
<br/>
<div class="form-group" >
<div class="col-sm-12 col-md-offset-3" style='text-align:left'>
<button type="submit"  class="btn btn-primary btn-xs send_cit" > Enviar</button>
</div>

</div>

</div>
	</form>

<script>	
	$('.send_cit').click(function(e) {  
if($("#title").val() == "" ){
$("#title").focus();
$("#erBox").html("Como sel llama el campo ?.");
return false;
} 
if($('#descripcion').val() == ""){
$("#descripcion").focus();
$("#erBox2").html("Di algo sobre el campo !");
return false;
}



});
</script>