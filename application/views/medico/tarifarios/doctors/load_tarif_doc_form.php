<div class="row" id="background_">
<br/>
<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$user_name?>" id="creaded_by" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>


<div class="col-sm-8 alert alert-info">EL ARCHIVO EXCEL DEBE TENER LOS SIGUIENTES COLUMNAS :<br/> (Ejemplo)

<table class="table table-striped table-bordered"  >
<tr>
<th>codigo</th><th>simon</th><th>procedimiento</th><th>monto</th>
</tr>
<tr>
<td>334</td><td>3455</td><td>EXTRACION</td><td>234.566.00</td>
</tr>
</table>


<input type="file" name="file" class="file required" required id="file"  accept=".xls, .xlsx" onchange="disableSend();"/>


</div>
</div>
<span  id="ruleovertarifmedico">
<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-4">
<input class="form-control  required" name="codigo_medico" id="codigo_medico" />

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Seleccione el Seguro Medico</label>
<div class="col-sm-4">
<select class="form-control select2 " name="seguro" id="seguro" >
<option value="" ></option>
<?php 

foreach($all_seguro as $row)
{ 
?>
<option value="<?=$row->id_sm?>" ><?=$row->title?></option>
<?php
}
?>
</select>
<div id="check_if_doc_has_tarifarios_for_this_seguro"></div>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select2" name="plan" id="plan">
<option>Basico</option>
<option>Complementario</option>
<option>Platinium</option>
<option>Subsidiado</option>
</select>
</div>
</div>
</span>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info dis1" disabled />
<span id="load1"></span>
</div>
</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script>
$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});




$('#doctor_dropdown').on('change', function(event){
	$("#seguro").prop("disabled",false);
})

$('#seguro').on('change', function(event){
$("#check_if_doc_has_tarifarios_for_this_seguro").fadeIn(400).html('<span class="load"><img style="width:70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
   var id_seguro=$(this).val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('medico/check_if_doc_has_tarifarios_for_this_seguro');?>',
	data:{id_seguro:id_seguro},
	success: function(data){
	$("#check_if_doc_has_tarifarios_for_this_seguro").html(data);
	
	},
	});	
})






function getDoc(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").html(data);
	
	},
	});
}

function load_data()
{
$.ajax({
url:"<?php echo base_url(); ?>medico/fetch_excel_import",
method:"POST",
success:function(data){
$('#customer_data').html(data);
}
})
}

function load_tarif_doc_form()
{
	var user_name="<?=$user_name?>";
$.ajax({
url:"<?php echo base_url(); ?>medico/load_tarif_doc_form",
data: {user_name:user_name},
method:"POST",
success:function(data){
$('#load_tarif_doc_form').html(data);
}
})
}

$('#import_form').on('submit', function(event){
event.preventDefault();

	if($("#codigo_medico").val()==""){
alert("El codigo es obligatorio");
}
else{

$(".hide-total-tarif-centro").hide();

$.ajax({
url:"<?php echo base_url(); ?>medico/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
$("#codigo_medico").val("");
$(".select2").val("").trigger("change");
alert('Los tarifarios importados con éxito');
$("#import").prop("disabled",true)
}
});
};
});
</script>