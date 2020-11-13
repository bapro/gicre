 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>

<table id='table1' class='table table-striped proced-med' >
<thead>
  <tr class='tr'>
  <th>#</th>
<th>Fecha</th>
<th>Nombre</th>
<th>Cant.</th>
<th>Precio</th>
<th>SubTot.</th>
<th style='display:<?=$displayd?>'>Cobertura</th>
<th style='display:<?=$displayd?>'>Diferencia</th>
<th>Descuento</th>
<th>Tot. Pagar Paciente</th>
<th></th>
</tr>
</thead>

<?php
$total_sub0=0;
$total_cob0=0;
$sum_tot_pag_pat0=0;
$tot_diff0=0;
$tot_discount0=0;
if($query->result()!=NULL){

$i = 1;

foreach($query->result() as $row)
{

$med=$this->db->select('name,precio_venta')->where('id',$row->medica)->get('emergency_medicaments')->row_array();


if($row->cobertura ==0.8 && $id_seguro !=11){
$monto=$med['precio_venta'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8 && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=$row->cobertura;
} else{
$monto=$med['precio_venta'];	
$subtot=$monto * $row->cantidad;
$cobet=0;	
}


$total_sub0 += $subtot;
$total_cob0 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff0 +=$diff;
$tot_discount0 +=$row->descuento;
$sum_tot_pag_pat0 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i; $i++?></td>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->insert_date));?></td>
<td class='td'><?php echo $med['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=$med['precio_venta']?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$displayd?>'><?=number_format($cobet,2)?></td>
<td  style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>

<td >
<?=$row->descuento?>
</td>

<td class='td'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<a  data-toggle="modal" class="btn btn-sm btn-default " data-target="#edit_fac_med"  href="<?php echo base_url("emergency/editEmFac2/$row->id_i_m/1/$id_seguro")?>" ><span class="glyphicon glyphicon-pencil"></span></a>
</td>
<td>
<a  title='delete' class="btn btn-sm btn-default cancelar-fac-med" id='<?=$row->id_i_m?>' style="float: none;color:red" ><span class="glyphicon glyphicon-trash"></span></a>
</td>
</tr>

<?php
}
?>
<tr class='tr'>
<th colspan='5'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub0,2)?></th>
<th style='display:<?=$displayd?>'>RD$<?=number_format($total_cob0,2)?></th>
<th class='td'  style='display:<?=$displayd?>'>RD$<?=number_format($tot_diff0,2)?></th>
<th class='td'>RD$<?=number_format($tot_discount0,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat0,2)?></th>
</tr>
<?php
}
?>
</table>
<div class="modal fade" id="edit_fac_med"  role="dialog" >
<div class="modal-dialog" style="width: 80%;" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
 $(".proced-med tr").on("click",function() {
   $(this).addClass('selected').siblings().removeClass('selected');    
     
});

$('#edit_fac_med').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
facturaBodyMed();

}); 


$(".cancelar-fac-med").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/canceled_em_fac')?>',
data: {id : del_id,table:'orden_medica_recetas'},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
facturaBodyMed();
 
}
});
}
})



tranfertGpTmed();
function tranfertGpTmed(){
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertGpTmed')?>',
data: {sum_tot_pag_pat0:<?=$sum_tot_pag_pat0?>},
success:function(data) {
 $("#grand-patient-tot-med").val(data);
}
}),

$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertCob0')?>',
data: {total_cob0:<?=$total_cob0?>},
success:function(data) {
	 $("#total_cob0").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDiff0')?>',
data: {tot_diff0:<?=$tot_diff0?>},
success:function(data) {
	 $("#tot_diff0").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDesc0')?>',
data: {tot_discount0:<?=$tot_discount0?>},
success:function(data) {
	 $("#tot_discount0").val(data);
}
})
}
</script>
