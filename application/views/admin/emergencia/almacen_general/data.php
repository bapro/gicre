<?php
if($querymed->result() !=NULL){
foreach ($querymed->result() as $row)

?>
<h3>Listado de los medicamentos (<?=$querymed->num_rows()?>)</h3>
<input id='filter-med' class="form-control" placeholder='BUSCAR MEDICAMENTO' />
<div style='overflow-x:auto;'>
<table  class="table table-striped"  id='paginate-filter'>
<thead>
<tr style="background:#5957F7;color:white">
<th>Nombre</th>
<th>Sustenacia</th>
<th>Tipo</th>
<th>Lab.</th>
<th>Presen.</th>
<th>Fecha Exp.</th>
<th>Fecha Venc.</th>
<th>Cantidad Comp.</th>
<th>Precio Comp.</th>
<th>Margen Ben.</th>
<th>Precio Venta</th>
<th></th>
</tr>
</thead>
<tr>
<tbody id='me'>
<td><input id='medicamento' style='width:207px' class="form-control"/></td>
<td><input id='sutenacia'  style='width:120px' class="form-control"/></td>
<td><input id='tipo'  style='width:120px' class="form-control"/></td>
<td><input id='laboratorio' style='width:120px' class="form-control"/></td>
<td><input id='presentacion'  style='width:120px' class="form-control"/></td>
<td><input id='fecha_exp'  style='width:120px' class="form-control date"/></td>
<td><input id='fecha_venc'   style='width:120px' class="form-control date"/></td>
<td><input id='cantidad_comp'  style='width:80px' class="form-control"/></td>
<td><input id='precio_compro' style='width:80px' class="form-control"/></td>
<td><input id='margen' style='width:80px' class="form-control"/></td>
<td><input id='precio_venta'  style='width:80px' class="form-control"/></td>
<td><button type='button' title='Guardar' id='save-med' style='color:blue'><i class="fa fa-save"></i></button><em id='guardando' style='font-size:9px;'></em></td>

</tr>
</tbody>
<tbody>

<?php

foreach ($querymed->result() as $row){

$insert=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$update=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');


?>
<tr>
<td ><?=$row->name;?></td>
<td  style='display:<?=$decision?>'><?=$row->sustenacia;?></td>
<td style='display:<?=$decision?>' ><?=$row->tipo;?></td>
<td><?=$row->laboratorio;?></td>
<td ><?=$row->presentacion;?></td>
<td ><?=$row->fecha_exp;?></td>
<td ><?=$row->fecha_ven;?></td>
<td ><?=$row->cantidad_comp;?></td>
<td >RD<?=$row->precio_comp;?></td>
<td ><?=$row->margen_ben;?></td>
<td >RD<?=$row->precio_venta;?></td>
<td>
<a data-toggle="modal" data-target="#edit_estudios" href="<?php echo base_url("emergency/edit_medicamento/$row->id/$iduser")?>" style="cursor:pointer;color:blue" title="Editar" class="btn-sm" ><i class="fa fa-edit"></i></a>
<a  id="<?=$row->id; ?>" style="cursor:pointer;color:red" title="Borrar" class="btn-sm delete" ><i class="fa fa-trash"></i></a>
		
</td>

</tr>
<?php
}
?>

</tbody>
</table>
</div>
<?php } else{
?>
<div id='hidemed'> 
<h3>Subir medicamentos</h3>
<form method="post"   class="form-horizontal" id="import_form_med" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los parametros establecidos exigido por el sistema</div>
<input  type="file" name="file" class="file required" id='filemed' required  accept=".xls, .xlsx"  />
<input  type='hidden' name='creaded_by' value="<?=$iduser?>"/>
<input  type='hidden' name='centro' value="<?=$centro?>"/>
<label class="radio-inline" title='Elige GICRE si el paciente esta creado ya'>
<input type="radio"  name="elegir" value="medicamentos" checked> Medicamentos
</label>

</div>
</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit"  id="importg" value="Import" class="btn btn-info"  />
</div>
</div>
</form>
</div>
<?php } ?>
<hr/>
<!----------------------------------------------------------------------------------------------------------------------------->
<?php if($querymt->result() !=NULL){?>
<h3>Listado de los materiales gastables (<?=$querymt->num_rows()?>)</h3>
<input id='filter-med2' class="form-control" placeholder='BUSCAR MEDICAMENTO' />
<div style='overflow-x:auto;'>
<table  class="table table-striped"  id='paginate-filter2'>
<thead>
<tr style="background:#5957F7;color:white">
<th>Nombre</th>
<th>Lab.</th>
<th>Presen.</th>
<th>Fecha Exp.</th>
<th>Fecha Venc.</th>
<th>Cantidad Comp.</th>
<th>Precio Comp.</th>
<th>Margen Ben.</th>
<th>Precio Venta.</th>
<th></th>
</tr>
</thead>
<tr>
<tbody>
<td><input id='medicamento2' style='width:207px' class="form-control"/></td>
<td><input id='laboratorio2' style='width:120px' class="form-control"/></td>
<td><input id='presentacion2'  style='width:120px' class="form-control"/></td>
<td><input id='fecha_exp2'  style='width:120px' class="form-control date"/></td>
<td><input id='fecha_venc2'   style='width:120px' class="form-control date"/></td>
<td><input id='cantidad_comp2'  style='width:80px' class="form-control"/></td>
<td><input id='precio_compro2' style='width:80px' class="form-control"/></td>
<td><input id='margen2' style='width:80px' class="form-control"/></td>
<td><input id='precio_venta2'  style='width:80px' class="form-control"/></td>
<td><button type='button' title='Guardar' id='save-med2' style='color:blue'><i class="fa fa-save"></i></button><em id='guardando2' style='font-size:9px;'></em></td>

</tr>
</tbody>
<tbody>

<?php

foreach ($querymt->result() as $row){

$insert=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$update=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');


?>
<tr>
<td ><?=$row->name;?></td>
<td><?=$row->laboratorio;?></td>
<td ><?=$row->presentacion;?></td>
<td ><?=$row->fecha_exp;?></td>
<td ><?=$row->fecha_ven;?></td>
<td ><?=$row->cantidad_comp;?></td>
<td >RD<?=$row->precio_comp;?></td>
<td ><?=$row->margen_ben;?></td>
<td >RD<?=$row->precio_venta;?></td>
<td>
<a data-toggle="modal" data-target="#edit_estudios" href="<?php echo base_url("emergency/edit_medicamento/$row->id/$iduser")?>" style="cursor:pointer;color:blue" title="Editar" class="btn-sm" ><i class="fa fa-edit"></i></a>
<a  id="<?=$row->id; ?>" style="cursor:pointer;color:red" title="Borrar" class="btn-sm delete2" ><i class="fa fa-trash"></i></a>
		
</td>

</tr>
<?php
}
?>

</tbody>
</table>
<?php
}else{
?>
<div id='hidemg'>
<h3>Subir material gastable</h3>
<form method="post"   class="form-horizontal" id="import_form_mat_g" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-5">
<div class="alert alert-info">El archivo excel debe tener los parametros establecidos exigido por el sistema</div>
<input  type="file" name="file" class="file required" id='fileg' required  accept=".xls, .xlsx"  />
<input  type='hidden' name='creaded_by' value="<?=$iduser?>"/>
<input  type='hidden' name='centro' value="<?=$centro?>"/>
<label class="radio-inline" title='Elige GICRE si el paciente esta creado ya'>
<input type="radio"  name="elegir" value="material-gastable" checked> Material Gastable
</label>

</div>
</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<input  type="submit"  id="importg" value="Import" class="btn btn-info"  />
</div>
</div>
</form>
</div>
<?php } ?>
<!------------------------------------------------------------------------------------------------------------------------------>
</div>
<script>


$('#save-med').click(function(e){
$(this).prop("disabled",true);
$("#guardando").text('guardando...');
$.ajax({
url:"<?php echo base_url(); ?>emergency/saveNewMed",
method:"POST",
data:{medicamento:$('#medicamento').val(),sutenacia:$('#sutenacia').val(),tipo:$('#tipo').val(),laboratorio:$('#laboratorio').val(),presentacion:$('#presentacion').val(),created_by:<?=$iduser?>,centro:<?=$centro?>,
fecha_exp:$('#fecha_exp').val(),fecha_venc:$('#fecha_venc').val(),cantidad_comp:$('#cantidad_comp').val(),precio_compro:$('#precio_compro').val(),margen:$('#margen').val(),precio_venta:$('#precio_venta').val()},
success:function(data){
reload_data();
$(this).prop("disabled",false);
$("#guardando").text("");
},

});
});


 $("#filter-med").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#paginate-filter tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
  

   $(".delete").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/DeleteMedicamento')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
reload_data();
});

 
}
});
}
}) 


$('#import_form_med').on('submit', function(event){
event.preventDefault();
if($("#filemed").val()==""){
alert("Los campos son obligatorios");
}
else{
$('#hidemed').hide();
$.ajax({
url:"<?php echo base_url(); ?>emergency/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
reload_data();
},

});
};
});







//---------------MATERIAL GASTABLE--------------------------------------------
  $(".delete2").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/DeleteMedicamento')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
reload_data();
});

 
}
});
}
})


   $("#filter-med2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#paginate-filter2 tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
  
 $('#save-med2').click(function(e){
$(this).prop("disabled",true);
$("#guardando2").text('guardando...');
$.ajax({
url:"<?php echo base_url(); ?>emergency/saveNewMed",
method:"POST",
data:{medicamento:$('#medicamento2').val(),sutenacia:"",tipo:"",laboratorio:$('#laboratorio2').val(),presentacion:$('#presentacion2').val(),created_by:<?=$iduser?>,centro:<?=$centro?>,
fecha_exp:$('#fecha_exp2').val(),fecha_venc:$('#fecha_venc2').val(),cantidad_comp:$('#cantidad_comp2').val(),precio_compro:$('#precio_compro2').val(),margen:$('#margen2').val(),precio_venta:$('#precio_venta2').val()},
success:function(data){
reload_data();
$(this).prop("disabled",false);
$("#guardando2").text("");
},

});
});


$('#import_form_mat_g').on('submit', function(event){
event.preventDefault();
if($("#fileg").val()==""){
alert("Los campos son obligatorios");
}
else{
$('#hidemg').hide();
$.ajax({
url:"<?php echo base_url(); ?>emergency/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
reload_data();
},

});
};
});


</script>