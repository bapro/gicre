<p class="h4 his_med_title">Indicaciones estudios</p><hr class="hr_ad"><input id="operators"name="operators"type="hidden"> <input id="historial_id_es"name="historial_id_es"type="hidden"><h4 class="h4"id="errorBox"style="margin-left:60px;color:red"></h4><div class="form-group"><label class="col-md-2 control-label">Estudios</label><div class="col-md-5"><select class="form-control select2"id="study"><option hidden value=""></option><?php foreach($estudios as $rows){echo '<option value="'.$rows->name.'">'.$rows->name.'</option>';} ?></select></div></div><div class="form-group"><label class="col-md-2 control-label">Parte del cuerpo</label><div class="col-md-3"><select class="form-control select2"id="cuerpo"name="cuerpo"><option hidden value=""></option><?php foreach($cuerpo as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select></div></div><div class="form-group"><label class="col-md-2 control-label">Lateralidad</label><div class="col-md-9"><input id="lateralidad"name="lateralidad"class="reset-est"></div></div><div class="form-group"><label class="col-md-2 control-label">Observaciones</label><div class="col-md-5"><textarea class="form-control reset-est"id="observaciones"name="observaciones"></textarea></div></div><hr class="hr_ad"><div class="col-md-5"><div class="btn-group"><button class="btn btn-xs btn-primary"id="saveIndicacionesEstudios"type="submit"><i aria-hidden="true"class="fa fa-floppy-o"></i> indicar</button> <button class="btn btn-xs btn-default"id="enviar-email-estudios"type="button"disabled>Enviar Estudios Al Paciente</button></div></div><br><br><p class="h4 his_med_title">Indicaciones previas</p><div style="overflow-x:auto"><div id="allEstudios"></div></div>
<script>

let  countest = 0;

$('#show-estudios-data').on('click', function(e) {
	e.preventDefault();
	   countest ++;
	    if(countest==1){
	 $("#allEstudios").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
     	allEstudios();
	   }
});




if(<?=$hist?>==4){
$('#saveIndicacionesEstudios').prop('disabled',true);	
}
else{
$('#saveIndicacionesEstudios').prop('disabled',false);	
}



$('#enviar-email-estudios').on('click', function(event) {
	event.preventDefault();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/enviarEstudiosToPatient",
data: {idpat:<?=$historial_id?>,doc:<?=$user_id?>},
method:"POST",
success:function(data){
$('#enviar-email-estudios').prop("disabled",true);
}
});



});
</script>
