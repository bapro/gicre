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
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/1/printing/h_c_indicaciones_medicales")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/0/printing/h_c_indicaciones_medicales")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/1/printing/h_c_indicaciones_medicales")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/0/printing/h_c_indicaciones_medicales")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		</ul>
		</li>
		</ul>
  <hr/>



<div id="new_indication"></div>

</div>


<div class="col-md-12 table-responsive" id="refresh-recetas1" >

 <hr class="hr_ad"/>
<p  class="h4 his_med_title"  >Indicaciones previas </p>
<select  class="form-control select2 indicacionPorCentro"    >

</select>
<div  id="allRecetas"></div>

</div>
<script>
let  countrec = 0;

$('#show-recetas-data').on('click', function(e) {
	e.preventDefault();
	   countrec ++;
	    if(countrec==1){
	 $("#allRecetas").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
      allRecetas();
	   }
});



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


$('.currentImpRecetasForPat').click(function(){
let val_rec = $(this).attr('id');
let position = $(this).prop('class').split(' ').slice(-1);
let thisrow =$(".new-rows-recetas input[type=checkbox]");
let table ='recetas';
launchPrint(val_rec,position,thisrow,table);

});



</script>