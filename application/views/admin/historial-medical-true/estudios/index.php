<p class="h4 his_med_title">Indicaciones estudios</p>
 <hr class="hr_ad"/>

<input type="hidden" id="operators" name="operators"/>
<input type="hidden"  id="historial_id_es" name="historial_id_es"/>
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<div class="form-group">
<label class="control-label col-md-2" >Estudios</label>
<div class="col-md-5">
<select  class="form-control select2"   id="study" >
<option value="" hidden></option>
<?php 

foreach($estudios as $rows)
{ 
echo '<option value="'.$rows->name.'">'.$rows->name.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Parte del cuerpo</label>
<div class="col-md-3">
<select  class="form-control select2"   name="cuerpo" id="cuerpo" >
<option value="" hidden></option>
<?php 

foreach($cuerpo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Lateralidad</label>
<div class="col-md-9">
<input type="text" name="lateralidad" id="lateralidad" class="reset-est" />
</div>
</div>

<div class="form-group">
<label class="control-label col-md-2" >Observaciones</label>
<div class="col-md-5">
<textarea  class="form-control reset-est"  id="observaciones" name="observaciones"  ></textarea>
</div>
</div>
 <hr class="hr_ad"/>
<div class="col-md-5" >
<div class="btn-group">
<button type="submit" id="saveIndicacionesEstudios" class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>
<button class='btn btn-default btn-xs' type='button' id='enviar-email-estudios' disabled >Enviar Estudios Al Paciente</button>	
</div>
 </div>
<br/><br/>
<p  class="h4 his_med_title"  >Indicaciones previas</p>

 <div  style="overflow-x:auto;">
 <div  id="allEstudios"></div>

</div>
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
