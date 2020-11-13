<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Cambiar  Plazo </h3>
<h5 class="modal-title" style="color:blue"><?=$user_info?> </h5>
</div>

<div class="modal-body" id="background_" >
<form method="post" id="form_user" class="form-horizontal" action="<?php echo site_url('admin/cambiarPlazo');?>" >
<input type="hidden" name="id_user" value="<?=$id?>"/>
<div class="form-group">
<label for="area" class="control-label col-sm-3">Miembro Desde</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="plazo" name="plazo" value="<?=$plazo?>"  />

</div>
</div>


<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<!--<button id="edit_area" class="btn btn-primary btn-xs"> Enviar</button>-->
<input id="send" class="btn btn-primary btn-xs" type="submit"  value="Guardar" /> 

</div>
<br/>
</div>

</form>
</div>

<script>
$('#plazo').mask('00-00-0000', {placeholder: '00-00-0000'});

$('#send').click(function() {
var plazo = $("#plazo").val();
if($("#plazo").val() == "" ){
$("#plazo").focus();
$('#plazo').css('border-color', 'red'); 
return false;
} 
});
</script>
