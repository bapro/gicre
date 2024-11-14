
<?php foreach ($val->result() as $row)

if($op==1){
	$disabled='';
	$display='none';
	$bodega='';
     $cant='';
	 $orientar_bodega=0;	
}else{
	$disabled='disabled';
	$display='';
$valb=$this->db->select('*')->where('idalm',$row->id)->get('emergency_bodega')->row_array();
$bodega=$valb['name'];
$cant=$valb['cant'];
 $orientar_bodega=$valb['idalm'];	
if($orientar_bodega > 0) {
$orientar_bodega=$orientar_bodega;	
}else{
$orientar_bodega=0;	
}
}

?>

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">EDITAR</h3>
 </div>
<div class="modal-body" style=" " >
<form  method="post"  class="form-horizontal">
<div class="form-group">
<label  class="control-label col-sm-4" for="nombre"> nombre</label>
<div class="col-sm-5">
<input  type="text" class="form-control required" <?=$disabled?> id="ednombre" name="nombre" value="<?=$row->nombre?>"   >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-4" for="tipo"> Tipo</label>
<div class="col-sm-3">
	<select class="form-control select2 required" <?=$disabled?>  id="edtipo"  >
	<option><?=$row->tipo?></option>
	<option>1dfgdfgdfgdfgdfgdgfdg</option>
	<option>2</option>
	</select>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-4" for="cantitad"> Cantidad</label>
<div class="col-sm-3">
<input  type="text" class="form-control required" <?=$disabled?> id="edcantitad" name="cantitad"  value="<?=$row->cantitad?>"   >
<input  type="hidden"  id="cantitad2"  value="<?=$row->cantitad?>"   >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-4" for="costo"> Costo</label>
<div class="col-sm-3">
<div class="input-group">
<span class="input-group-addon">RD</span>
<input  type="text" class="form-control required" <?=$disabled?> id="edcosto" name="costo"  value="<?=$row->costo?>"   >
</div>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-4" for="precio"> Precio</label>
<div class="col-sm-3">
<div class="input-group">
<span class="input-group-addon">RD</span>
<input  type="text" class="form-control required" <?=$disabled?> id="edprecio" name="precio"  value="<?=$row->precio?>"   >
</div>

</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-4" for="fecha_ven"> Fecha de Vencimiento</label>
<div class="col-sm-3">
<input  type="text" class="form-control required date" <?=$disabled?>     placeholder="ff-mm-AAAA" maxlength="10" id="edfecha_ven" name="fecha_ven"  value="<?=$row->fecha_ven?>"   >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-4" for="fecha_elab"> Fecha de Elaboracion</label>
<div class="col-sm-3">
<input  type="text" class="form-control required date" <?=$disabled?>     placeholder="ff-mm-AAAA" maxlength="10" id="edfecha_elab" name="fecha_elab"  value="<?=$row->fecha_elab?>"   >
</div>
</div>
<div class="form-group" style='display:<?=$display?>'>

<div id='listarBodega'></div>
<hr/>
<label  class="control-label col-sm-4" for="bodega"> Bodega</label>
<div class="col-sm-6">
	<select class="form-control select2 required"   id="bodega"  >
<?php
$sqll ="SELECT * FROM emergency_bodega_name GROUP BY name";
$queryl = $this->db->query($sqll);
foreach ($queryl->result() as $rowl){
echo '<option value="'.$rowl->name.'">'.$rowl->name.'</option>';
}
 ?>

	</select>
</div>
</div>
<div class="form-group cant-bodega" style='display:<?=$display?>'>
<label  class="control-label col-sm-4" for="cantitad"> Cantidad Restante</label>
<div class="col-sm-3">
<input  type="number" class="form-control required" id="cantitad-bodega"  value='0'    >
<span id='text'></span>
</div>
</div>
<input  type="hidden" value="<?=$iduser?>"  name="updated"   >
<input  type="hidden" value="<?=$row->id?>"  name="id"   >
<input  type="hidden" value="1"  name="update"   >
  <div class="col-md-5 col-md-offset-1">
    <input type="button" id='change-alm' value="GUARDAR" class="btn btn-primary btn-sm" />
	
  </div>
  <BR/><BR/>
</form>
</div>
 <script>
  $(".date").datepicker({
dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  });
function listarBodega()
{
$.ajax({
type: "POST",
url: "<?=base_url('emergency/listarBodega')?>",
data: {idalm:<?=$row->id?>},

success:function(data){ 
$('#listarBodega').html(data);

}  
});	
}
listarBodega();


 $('#cantitad-bodega').on('keyup', function(event) {
event.preventDefault();
var cantitad=parseInt($("#edcantitad").val());
var cantitadBodega=parseInt($("#cantitad-bodega").val());
if(cantitadBodega > cantitad){
$("#change-alm").prop("disabled",true);
$("#text").html('No sobrepasa ' + cantitad).css('color','red');
}else{
$("#text").html('');
$("#change-alm").prop("disabled",false);	
}
 });
 
 
 $(".select2").select2({
  tags: true
});

$('#bodega').change(function () {
 $(".cant-bodega").slideDown(); 
});




$('#change-alm').on('click', function(event) {
event.preventDefault();
$('#change-alm').prop('disabled',true);
var nombre=$("#ednombre").val();
var cantitad=$("#edcantitad").val();
var costo=$("#edcosto").val();
var precio=$("#edprecio").val();
var fecha_ven=$("#edfecha_ven").val();
var fecha_elab=$("#edfecha_elab").val();
var tipo=$("#edtipo").val();
if(nombre=="" || cantitad=="" || costo=="" || precio=="" || fecha_ven=="" || fecha_elab==""  ){
alert('Todos los campos son obligatorios');	
}
else{
if(<?=$op?>==1){
$.ajax({
type: "POST",
url: "<?=base_url('emergency/saveAlmanacenGnrl')?>",
data: {nombre:nombre,cantitad:cantitad,costo:costo,precio:precio,fecha_ven:fecha_ven,fecha_elab:fecha_elab,tipo:tipo,updated:<?=$iduser?>,id:<?=$row->id?>,update:1},

success:function(data){ 
$('#change-alm').prop('disabled',false);
 $('#edit_almacen').modal('hide');
newInsert();
}  
});
}else{

$.ajax({
type: "POST",
url: "<?=base_url('emergency/bodegaCantidad')?>",
data: {cantitad:$("#cantitad2").val(),cantitad_bodega:$("#cantitad-bodega").val(),bodega:$("#bodega").val(),updated:<?=$iduser?>,id:<?=$row->id?>,orientar_bodega:<?=$orientar_bodega?>,centro:<?=$centro?>},

success:function(data){ 
$('#change-alm').prop('disabled',false);
 $('#edcantitad').val(cantitad - $("#cantitad-bodega").val());
 $("#cantitad-bodega").val(0);
listarBodega();
newInsert();
}  
});	
}
}
});


 </script>