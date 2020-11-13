<?php
$sql ="SELECT id_c_taf, sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $centro_id AND seguro_id=$id_seguro GROUP BY sub_groupo ORDER BY sub_groupo ASC";

$query = $this->db->query($sql);
if($query->result() !=NULL){
$titleEstudio='';
$disabledEstudio='';
}else{
$titleEstudio="No hay estudios en el tarifio por $seguro_name";
$disabledEstudio='disabled';
}
$cuerpo = $this->model_admin->cuerpo();

?>
<div class="col-md-12">
<p class="h4 his_med_title">II- Indicaciones estudios <em style='font-size:10px'><?=$titleEstudio?></em></p>
<div class="col-md-3">
<form method="post" class="form-horizontal" id="submitOrdMedEst">
<input type="hidden" id="historial_ides" value="<?=$id_historial?>">
<input type="hidden" id="operatores" value="<?=$user_id?>">

<div class="form-group">
<label class="control-label" >Estudios <em style='font-size:11px'>(<?=$query->num_rows();?> registros)</em></label>
<select  class="form-control select2"   id="study_ord_med" >
<option value="" hidden></option>
<?php

foreach ($query->result() as $row)
{
echo '<option value="'.$row->id_c_taf.'">'.$row->sub_groupo.'</option>';
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

<button <?=$disabledEstudio?> type="button" id="saveEstOrdMed" title="<?=$titleEstudio?>" class="btn btn-primary btn-xs btn-dis-or-med" >
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
url:"<?php echo base_url(); ?>hospitalizacion/saveOrdenMedicaEst",
data: {study_ord_med:$("#study_ord_med").val(),cuerpo_ord_med:$("#cuerpo_ord_med").val(),cobert:0.8,id_hosp:<?=$id_hosp?>,
lateralidad_ord_med:$("#lateralidad_ord_med").val(),observaciones_ord_med:$("#observaciones_ord_med").val(),descuento:0,
historial_ides:<?=$id_historial?>,operatores:<?=$user_id?>,sala:0,centro:<?=$centro_id?>,printing:2,cantidad:1},
method:"POST",
success:function(data){
$("#saveEstOrdMed").prop('disabled',false);
$(".reset-est").val("");
allEstudiosOrdMed();
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
url:"<?php echo base_url(); ?>hospitalizacion/allEstudiosOrdMed",
data: {historial_id:historial_id,area:area,user_id:user_id,printing:2},
method:"POST",
success:function(data){
$('#allEstudiosOrdMed').html(data);
},

});
}
</script>
