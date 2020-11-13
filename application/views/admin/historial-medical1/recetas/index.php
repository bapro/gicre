<div class="col-md-12 move_left" style="background:#E6E6FA"  >
<h4 class="h4 his_med_title">Indicaciones recetas</h4>
 <hr class="hr_ad"/>
</div>


<div class="col-md-3"  >
<div id="recetasForm"></div>

</div>
<div title="Ingresar" class="col-md-1" >
<div class="btn-group">

<button type="button" id="add-all" class="btn btn-primary btn-xs">
<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
</button>

 </div>
</div>

<div class="col-md-8 doubleb"  style="top:20px;height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 2px hsl(0, 0%, 50%),
    0 0 0 4px hsl(0, 0%, 60%),
    0 0 0 6px hsl(0, 0%, 70%);
    ">
	<br/>

	<button class='btn btn-default btn-xs' type='button' id='enviar-email-recetas' disabled >Enviar Recetas Al Paciente</button>	
    
  <hr/>
</span>
<div id="new_indication"></div>

</div>


<div class="col-md-12 table-responsive" id="refresh-recetas1" >
<br/><br/>
 <hr class="hr_ad"/>
<div id="allRecetas"></div>

</div>
<script>



$('#enviar-email-recetas').on('click', function(event) {
	event.preventDefault();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/enviarRecetasToPatient",
data: {idpat:<?=$historial_id?>,doc:<?=$user_id?>},
method:"POST",
success:function(data){
$('#enviar-email-recetas').prop("disabled",true);
}
});



});


if(<?=$hist?>==4){
$('#add-all').prop('disabled',true);	
}
else{
$('#add-all').prop('disabled',false);	
}

recetasForm();
function recetasForm()
{

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/recetasForm",
data: {},
method:"POST",
success:function(data){
$('#recetasForm').html(data);
}
});
}


</script>