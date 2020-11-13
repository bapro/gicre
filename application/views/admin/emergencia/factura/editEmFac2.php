 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>
<div class="modal-header"  id="background_">

<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3><?=$title?></h3>
 </div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">


<h4></h4>
<table class="table table-striped table-bordered table-condensed">
<thead>
<tr>
<th>Fecha</th>
<th>Nombre</th>
<th>Cantidad</th>
<th>precio Unitario</th>
<th>sub-total</th>
<th style='display:<?=$displayd?>'>Cobertura</th>
<th style='display:<?=$displayd?>'>Diferencia</th>
<th>descuento</th>
<th>Total Pagar Paciente</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<?php
foreach($query->result() as $row)
$val=$this->db->select('name,precio_venta')->where('id',$row->name)->get('emergency_medicaments')->row_array();

if($row->cobertura ==0.8 && $id_seguro !=11){
$monto=$val['precio_venta'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8 && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet= $row->cobertura;
}else{
$monto=$val['precio_venta'];	
$subtot=$monto * $row->cantidad;
$cobet=0;
}

$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;

?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $val['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td' id='precio-proced-edit'><?=$monto?> </td>
<td class='td' ><?=number_format($subtot,2)?></td>
<td style='display:<?=$displayd?>'><input id='cobert-proced-edit' class="form-control float" type="text" value='<?=$cobet?>'  /> </td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>
<td ><input id='descuento-proced-edit' class="form-control float" type="text" value='<?=$row->descuento?>'  /></td>
<td class='td'><?=number_format($totpagpat,2)?></td>
<td><button type='button' id='edit-proced-data' class='btn btn-primary'>Guardar <i class="fa fa-save"></i></button></td>
</tr>
</tbody>
</table>
</div>
</div>
<div id="show-error1"></div>

</div>

<script>
$("#edit-proced-data").on("click",function() {
var cobserver=<?=$row->cobertura?>;
var cobclient=$('#cobert-proced-edit').val();
var percent=<?=$subtot?> * 0.8;
var cobfinal;
if(cobserver==0.8 && cobclient==percent){
cobfinal=0.8;	
}else{
cobfinal=cobclient;	
}
var table="<?=$table?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/updateOrdMedFac');?>',
data:{id:<?=$id_edit?>,operator:<?=$row->id_user?>,cobert:parseFloat(cobfinal),table:table,
descuento:parseFloat($('#descuento-proced-edit').val()),precio:$('#precio-proced-edit').text()
},
success: function(data){
if(table=='orden_medica_recetas'){
$('#edit_fac_med').modal('hide');
}
else{
$('#edit_fac_matg').modal('hide');
}


},


});
	
});
</script>