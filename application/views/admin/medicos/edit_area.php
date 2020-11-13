<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>

</button>

<h4 class="modal-title">Editar area  </h4>

</div>
<form method="post" id="form-area" class="form-horizontal" action="<?php echo site_url('admin/edit_area');?>">
<input type="hidden" class="form-control" name="ida" value="<?=$id?>" >
<div class="form-group" >
<label class="control-label col-sm-2">Area :</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="especialidad" name="especialidad" value="<?=$title_area?>" >
</div>
</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>

</div>
<br/>
</div>

</form>
<script>
$('#form-area').click(function(e) {
var especialidad = $("#especialidad").val();
 if(especialidad ==""){
$("#especialidad").focus();
$('#especialidad').css('border-color', 'red'); 
return false;
}

});
</script>