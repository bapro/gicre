<?php

$estudios = $this->model_admin->estudios();
$cuerpo = $this->model_admin->cuerpo();
?>
<div class="col-md-12">
<p class="h4 his_med_title">II- Indicaciones estudios</p>
<div class="col-md-3">
<form method="post" class="form-horizontal" id="submitOrdMedEst">
<input type="hidden" id="historial_ides" value="<?=$id_historial?>">
<input type="hidden" id="operatores" value="<?=$user_id?>">
<div class="form-group">
<label class="control-label" >Estudios</label>
<select  class="form-control select2"   id="study_ord_med" >
<option value="" hidden></option>
<?php 

foreach($estudios as $rows)
{ 
echo '<option value="'.$rows->name.'">'.$rows->name.'</option>';
}
?>
</select>

</div>

<div class="form-group">
<label class="control-label" >Parte del cuerpo</label>

<select  class="form-control select2"   id="cuerpo_ord_med"  >
<option value="" hidden></option>
<?php 

foreach($cuerpo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>

</div>

<div class="form-group">
<label class="control-label" >Lateralidad</label>
<input type="text" id="lateralidad_ord_med"  class="form-control reset-est" />
</div>

<div class="form-group">
<label class="control-label" >Observaciones</label>
<textarea  class="form-control reset-est" id="observaciones_ord_med" rows='6' ></textarea>
</div>

<br/>
</div>
<div class="col-md-1" >
<div class="btn-group">
<button type="button" id="saveEstOrdMed" class="btn btn-primary btn-xs btn-dis-or-med" disabled>
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
</button>

</div>
 </div>
 </form>
<div class="col-md-8"  style="top:20px;height:400px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
 <div  style="overflow-x:auto;">
 <div id="allEstudiosOrdMed"></div>

</div>
</div>
</div>
<script>
$('#saveEstOrdMed').click(function(e){
e.preventDefault();	

if($("#study_ord_med").val()=="" || $("#cuerpo_ord_med").val()==""  )
{ 
alert("Los campos con '*' son obligatorios !");
} else {
$("#saveEstOrdMed").prop('disabled',true);
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/saveOrdenMedicaEst",
data: {study_ord_med:$("#study_ord_med").val(),cuerpo_ord_med:$("#cuerpo_ord_med").val(),cobert:0,id_em:0,cantidad:0,
lateralidad_ord_med:$("#lateralidad_ord_med").val(),observaciones_ord_med:$("#observaciones_ord_med").val(),
historial_ides:<?=$id_historial?>,operatores:<?=$user_id?>,sala:$("#copy-sala").val(),centro:0,printing:1,descuento:0},
method:"POST",
success:function(data){
$("#saveEstOrdMed").prop('disabled',false);
$(".reset-est").val("");
allEstudiosOrdMed();
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#allEstudiosOrdMed').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}
});



function allEstudiosOrdMed()
{
$("#allEstudiosOrdMed").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var user_id  = <?=$user_id?>;
var historial_id = <?=$id_historial?>;
var area  = "";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allEstudiosOrdMed",
data: {historial_id:historial_id,area:area,user_id:user_id,printing:1},
method:"POST",
success:function(data){
$('#allEstudiosOrdMed').html(data);
},

});
}
</script>
