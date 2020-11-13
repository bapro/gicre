<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>

</button>

<h4 class="modal-title">Editar laboratorio  </h4>

</div>
<form method="post" id="form-lab" class="form-horizontal" action="<?php echo site_url('admin/edit_lab');?>">
<input type="hidden" class="form-control" name="ida" value="<?=$id?>" >
<div class="form-group" >
<label class="control-label col-sm-2">Nombre :</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="labname" name="labname" value="<?=$labname?>" >
</div>
</div>

<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<button  class="btn btn-primary btn-xs"> Enviar</button>

</div>
<br/>
</div>

</form>
<script>
$('#form-lab').click(function(e) {
var labname = $("#labname").val();
 if(labname ==""){
$("#labname").focus();
$('#labname').css('border-color', 'red'); 
return false;
}

});
</script>