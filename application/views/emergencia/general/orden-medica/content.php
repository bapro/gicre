<?php 
$this->load->view('admin/emergencia/general/orden-medica/medicamentos/index');
 $this->load->view('admin/emergencia/general/orden-medica/estudios/index');
$this->load->view('admin/emergencia/general/orden-medica/laboratorios/index');
?>
<div class="col-md-12">
 <hr class="hr_ad"/>
<p class="h4 his_med_title">IV- MEDIDAS GENERALES</p>
<div class="col-md-3  form-horizontal">
<div class="form-group">
<label class="control-label" >Medidas Generales</label>
<select  class="form-control select2"   id="medidas_gen" >
<option>Medidas Generales</option>
<option>Dieta</option>
</select>
</div>
<div class="form-group">
<label class="control-label" >Descripcion</label>
<textarea  class="form-control reset-est" id="descripcion_mg" rows='6' ></textarea>
</div>
<div class="form-group">
<label class="control-label" >Intervalo De Realizacion</label>
<input type="text" id="intervalo_de_real" class="form-control reset-est"  />
</div>

</div>
<div class="col-md-1" >
<div class="btn-group">
<button type="button" id="saveMedGenOrd" class="btn btn-primary btn-xs btn-dis-or-med" >
<i class="fa fa-angle-double-right" aria-hidden="true"></i>
</button>

</div>

 </div>
 <div class="col-md-8"  style="top:20px;height:300px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
 <div  style="overflow-x:auto;">
 <div id="OrdenMedSala"></div>

</div>
</div>
<div class="col-md-12">

<a id="imprimirOrMed"  style='display:' class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/emergencia_orden_medica/$user_id/$id_historial/$centro_id/$enviado_a")?>"  ><i class="fa fa-print"></i> Imprimir</a>
<hr id='hr_ad'/>
</div>
</div>
<script>
$('#imprimirOrMed').click(function(){
	
$.ajax({
success:function(data){
paginationNumberOrdenMedica();
loadContentOrdMed();
},
 
});

});



$('#saveMedGenOrd').click(function(e){
e.preventDefault();

$("#saveMedGenOrd").prop('disabled',true);

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/saveMedGenOrd",
data: {medidas_gen:$("#medidas_gen").val(),descripcion_mg:$("#descripcion_mg").val(),sala:$("#copy-sala").val(),
intervalo_de_real:$("#intervalo_de_real").val(),user_id:<?=$user_id?>,historial_id:<?=$id_historial?>,printing:2,centro:<?=$centro_id?>,sala:0},
method:"POST",
success:function(data){
$("#saveMedGenOrd").prop('disabled',false);
$(".reset-est").val("");
OrdenMedSala();
$("#imprimirOrMed").show();
},
 
});

});

function OrdenMedSala()
{
$("#OrdenMedSala").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var area  = "";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/ordenMedSala",
data: {historial_id:<?=$id_historial?>,area:area,user_id:<?=$user_id?>,printing:2},
method:"POST",
success:function(data){
$('#OrdenMedSala').html(data);
},
 
});
}
</script>