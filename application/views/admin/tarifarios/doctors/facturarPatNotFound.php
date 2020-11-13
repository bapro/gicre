<div class="container">
<h4>Crear Nuevas Facturas Por Doctor(a) <?=$doctor['name']?></h4>
<hr id="hr_ad"/>
<form method="post"   class="form-horizontal" id="import_form" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,procedimiento,monto</div>

<input type="file" name="file" class="file required"  id="file" required  accept=".xls, .xlsx" onchange="disableSend();"/>
<input type='hidden' name='categoria' value="<?=$doctor['area']?>"/>

<input type='hidden' name='doctor_dropdown' value="<?=$id_doctor?>"/>
<input type='hidden' name='creaded_by' value="<?=$user_name?>"/>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-4">
<input class="form-control  required" name="codigo_medico" id="codigo_medico" />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Seguro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 " name="seguro" id="seguro" >
<option value=""></option>
<?php 
//$sql ="SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$id_doctor";
//$query= $this->db->query($sql);
foreach ($query->result() as $mes){
$seguro=$this->db->select('title')->where('id_sm',$mes->seguro_medico)->get('seguro_medico')->row('title'); 
?>
<option value="<?=$mes->seguro_medico?>" ><?=$seguro?></option>
<?php
}
?>
</select>

</div>
</div>



<!--	
<div class="form-group hide-plan-seguro"  style='display:none'>
<label  class="control-label col-sm-3">Plan</label>

<div class="col-sm-4">
<select class="form-control select2" name="plan" id='show_plan'>
<option value=""></option>
<?php
$sqlpl ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
	
echo "<option value='$rowpi->id'>$rowpi->name</option>";	
}

?>

</select>

</div>
</div>
-->
<div class="form-group hide-centro-seguro"  id="show_plan_seg">
<label  class="control-label col-sm-3" id='plan-o-seguro'></label>
<div class="col-sm-4">
<select class="form-control select2" name="plan" id='show_plan'>

</select>
</div>
</div>
</div>




<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1"  />


</div>
</div>
</form>
<br/><br/><br/><br/><br/>
<hr id="hr_ad"/>
<script>


   var x = $("#import_form").position(); //gets the position of the div element...
   window.scrollTo(x.left, x.top); 



$('#seguro').on('change', function(event){
event.preventDefault();
if ($(this).val()==11){
$('#plan-o-seguro').text('Centro');	

}else{
$('#plan-o-seguro').text('Plan');	

}
$('#show_plan').prop("prop",true);
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/show_plan_seg')?>",
data: {id:$(this).val(),id_doctor:<?=$id_doctor?>,id_centro:<?=$id_centro?>},
 success:function(data){
	 $('#show_plan').html(data);
	$('#show_plan').prop("prop",false); 
},
 
});




/*if ($(this).val()==11){
$('.hide-centro-seguro').show();	
$('.hide-plan-seguro').hide();
}else{
$('.hide-centro-seguro').hide();	
$('.hide-plan-seguro').show();	
}*/
});

$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});

$('#import_form').on('submit', function(event){
event.preventDefault();
var show_plan=$('#show_plan').val();
//alert(show_plan);
	if($("#codigo_medico").val()=="" || $("#seguro").val()=="" || $("#file").val()==""){
alert("Los campos son obligatorios");
}
else{



$.ajax({
url:"<?php echo base_url(); ?>admin_medico/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los tarifarios importados con éxito');
location.reload(true);
}
});
};
});


</script>