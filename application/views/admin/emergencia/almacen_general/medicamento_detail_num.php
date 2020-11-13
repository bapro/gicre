<style>
td,th{font-size:12px}
</style>
<?php  if($query->result() !=NULL)
{
foreach ($query->result() as $row)
$val=$this->db->select('nombre,id,tipo')->where('id',$row->idal)->get('emergency_almanacen_gnrl')->row_array();	
$id=$val['id'];
$tipo=$val['tipo'];

$sqls ="SELECT * FROM emergency_bodega  WHERE center=$centro GROUP BY name";
$querys = $this->db->query($sqls);

?>
<h3><?=$centroName?></h3>
<?php if($querys->num_rows() !=0){?>
<select class="form-control select2"  id="search-bodega">
<option value='0'>Seleccionar Bodega</option>
<?php

foreach ($querys->result() as $rows){
$valc=$this->db->select('*')->where('id',$rows->idalm)->get('emergency_almanacen_gnrl')->row_array();
echo '<option value="'.$rows->name.'">'.$rows->name.' </option>';
}
?>
</select>
<?php
} else{
echo '<em style="color:red">No hay bodega.</em>';	
}?>
<hr/>

<select class="form-control select2"  id="search">
<option>Buscar Medicamento</option>
<?php
$sqls ="SELECT idnum,idal FROM emergency_almanacen_num  WHERE centro=$centro group by idal";
$querys = $this->db->query($sqls);
foreach ($querys->result() as $rows){
$valc=$this->db->select('*')->where('id',$rows->idal)->get('emergency_almanacen_gnrl')->row_array();	
echo '<option value="'.$valc['id'].'">'.$valc['nombre'].' ('.$valc['tipo'].') ('.$valc['cantitad'].')</option>';
}
 ?>

</select>
<hr/>
<h3 style='display:<?=$display1?>'><?=$val['nombre'];?></h3>
<h3 style='display:<?=$display2?>'>Listado de los medicamentos</h3>
<?php 
$cantm =0;

$sqlm ="SELECT sum(cantidad) as cant  FROM  emergency_medicaments where name='$id' && tipo='$tipo' group by tipo,name ";

$querym = $this->db->query($sqlm);

foreach ($querym->result() as $rowm){
	
		 $cantm = $rowm->cant;
	
		 }
		
?>

 <div style="overflow-x:auto">
<table id="example" class="table" >
<thead>
<tr style="background:#5957F7;color:white">
<th>Nombre</th>
<th>Tipo</th>
<th>Cant.Comprada</th>
<th>Costo</th>
<th>Precio</th>
<th>Bodega</th>
<th>Fecha de Venc.</th>
<th>Fecha de Elab.</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
$cantExis=0;
foreach ($query->result() as $row){

$val=$this->db->select('*')->where('id',$row->idal)->get('emergency_almanacen_gnrl')->row_array();	
$insert=$this->db->select('name')->where('id_user',$val['insertb'])->get('users')->row('name');
$update=$this->db->select('name')->where('id_user',$val['updateb'])->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($val['datec']));
$updated_time = date("d-m-Y H:i:s", strtotime($val['dateup']));
$idv=$val['id'];

	 $cantExis += $val['cantitad'];
if($val['cantitad']==0){
$bgr="#F78383";	
}
else
{
$bgr="";	
}

$id=$val['id'];
if($is_bodega==1){
$spb ="SELECT name, cant FROM emergency_bodega  WHERE name='$idb' && center=$centro";
}else{
$spb ="SELECT name, sum(cant) as cant FROM emergency_bodega  WHERE idalm=$id";
}
$querybd = $this->db->query($spb);
foreach ($querybd->result() as $rrr)

if($is_bodega==1){
$bodegaName ="$rrr->name :";
$cantbd=$row->cant;
}else{
$bodegaName ="";
$cantbd=$rrr->cant;
}

?>
<tr style="background:<?=$bgr?>">
<td ><?=$val['nombre'];?></td>
<td ><?=$val['tipo'];?></td>
<td ><?=$val['cantitad'];;?></td>
<td>RD <?=$val['costo'];?></td>
<td >RD <?=$val['precio'];?></td>
<td ><?=$bodegaName?><?=$cantbd;?></td>
<td ><?=$val['fecha_ven'];?></td>
<td ><?=$val['fecha_elab'];?></td>
<td>
<a class="btn btn-xs" data-toggle="modal" title='Editar' data-target="#edit_almacen" href="<?php echo base_url("emergency/edit_almacen/$id/$iduser/$centro/1")?>">
<i class="fa fa-edit"></i>
</a>
<a class="btn btn-xs" style='font-size:8px' data-toggle="modal" data-target="#edit_almacen" href="<?php echo base_url("emergency/edit_almacen/$id/$iduser/$centro/0")?>">
Transferir
</a>
<i title="Creado por <?=$insert?> a <?=$inserted_time?> &#013 Modificado por <?=$update?> a <?=$updated_time?>" class="fa fa-info-circle" aria-hidden="true"></i>

</td>

</tr>
<?php
}
?>
<tr>
<th colspan='2'>Total</th><th><?=$cantExis?></th><td colspan="6"></td>
</tr>
<tr style="background:#5CDC62">
<th colspan='2'>Cant. Existencial</th><th><?=$cantExis - $cantm?></th>
</tr>
</tbody>
</table>
</div>

<?php
} else{
	echo '<div class="alert alert-warning" role="alert">
  No hay medicamento por este centro crearlo.
</div>';
}
?>
<script>
 $('.select2').select2({ 
  placeholder: "",
    tags: true,
	allowClear: true

});


$('#search-bodega').change(function () {
event.preventDefault();

$("#search-result").fadeIn().html('<span > <img   src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "GET",
url: "<?=base_url('emergency/searchBodega')?>",
data: {idbod:$(this).val(),iduser:<?=$iduser?>,centro:<?=$centro?>},

success:function(data){ 

$("#search-result").html(data); 
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#search-result").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

});








$('#search').change(function () {
	event.preventDefault();
var str=  $("#search").val();
var centro=  $("#search-centro").val();
var iduser=<?=$iduser?>;
if(str == "") {
}else {
$("#search-result").fadeIn().html('<span > <img   src="<?= base_url();?>assets/img/loading.gif" /></span>');
	
	
$.get( "<?php echo base_url();?>emergency/searchMedicamento?value="+str, function( data ){
$("#nombre").val(data); 
	   
});

$.get( "<?php echo base_url();?>emergency/searchMedicamentoTipo?value="+str, function( data ){
$("#tipoval").val(data); 
	   
});

$.get( "<?php echo base_url();?>emergency/searchMedicamentoId?value="+str, function( data ){
$("#medica-id").val(data); 
	   
});

$.get( "<?php echo base_url();?>emergency/searchMedicamentoDetail?value="+str+"&iduser="+iduser+"&centro="+centro, function( data ){
$("#search-result").html(data); 		   
});







}
});
</script>