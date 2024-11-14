 <?php
 $recetas1 = encrypt_url('recetas');
  $user_id1 = encrypt_url($user_id);
   $historial_id1 = encrypt_url($historial_id);
 ?>
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
    <ul class="nav navbar-nav  show-btn-print-current" style='display:none'>
	<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;"></i><span class="caret"></span>&nbsp;</span>
		<ul class="dropdown-menu">
		<li>
		<a>FORMATO VERTICAL</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/1/printing/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/0/printing/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/1/printing/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/0/printing/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		</ul>
		</li>
		</ul>
  <hr/>



<div id="new_indication"></div>

</div>
<div class="col-md-12">
 <hr class="hr_ad"/>
<div class="col-md-5">
<div class="form-group">
<label class="control-label">Mostrar Recetas Por Centro Médico </label>
<select  class="form-control select2 indicacionPorCentro"    >
 <option value="<?=$centro_medico?>"><?=$centro_title?></option>
 <?php 

 foreach($centro_data as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>
</select>
</div>
</div>
</div>
<div class="col-md-12 table-responsive" id="refresh-recetas1" >

<p  class="h4 his_med_title"  >Indicaciones previas </p>

<div  id="allRecetas"></div>
<input type="hidden" id="selected_centro_rec" value="<?=$centro_medico?>" />
</div>
<script>

$('.indicacionPorCentro').on('change', function(e) {
	e.preventDefault();
	 $("#allRecetas").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	 $('html, body').animate({
  scrollTop: $("#allRecetas").offset().top
});
      allRecetas($(this).val());
	  
	  $("#selected_centro_rec").val($(this).val());

});

let  countrec = 0;

$('#show-recetas-data').on('click', function(e) {
	e.preventDefault();
	   countrec ++;
	    if(countrec==1){
	 $("#allRecetas").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	 	  recetasForm();
      allRecetas(<?=$centro_medico?>);

	   }
});



$('#enviar-email-recetas').on('click', function(event) {
	event.preventDefault();
$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/enviarRecetasToPatient",
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


function recetasForm()
{
$('#recetasForm').html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/recetasForm",
data: {},
method:"POST",
success:function(data){
$('#recetasForm').html(data);
},

});
}

$('.currentImpRecetasForPat').on('click', function(event) {
event.preventDefault();
let val_rec = $(this).attr('id');
let position = $(this).prop('class').split(' ').slice(-1);
let thisrow =$(".new-rows-recetas input[type=checkbox]");
let table ='recetas';
launchPrint(val_rec,position,thisrow,table);

});



</script>