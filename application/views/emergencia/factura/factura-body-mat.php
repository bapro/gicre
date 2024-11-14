 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>
<table id='table1' class='table table-striped matg-matg' >
 <tr class='tr' style="background:#428bca">
<thead>
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
<th></th>
</thead>
</tr>

<?php
$total_sub3=0;
$total_cob3=0;
$sum_tot_pag_pat3=0;
$tot_diff3=0;
$tot_discount3=0;
if($query->result()!=NULL){

$i = 1;

foreach($query->result() as $row)
{

$med=$this->db->select('name,precio_venta')->where('id',$row->insumo)->get('emergency_medicaments')->row_array();


if($row->cobertura ==0.8  && $id_seguro !=11){
$monto=$med['precio_venta'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8  && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=$row->cobertura;
}else{
	$monto=$med['precio_venta'];	
$subtot=$monto * $row->cantidad;
$cobet=0;
}


$total_sub3 += $subtot;
$total_cob3 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff3 +=$diff;
$tot_discount3 +=$row->descuento;
$sum_tot_pag_pat3 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i; $i++?></td>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $med['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=$monto?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$displayd?>'><?=number_format($cobet,2)?></td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>

<td ><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<a  data-toggle="modal" class="btn btn-sm btn-default " data-target="#edit_fac_matg"  href="<?php echo base_url("emergency/editEmFac2/$row->id/2/$id_seguro")?>" ><span class="glyphicon glyphicon-pencil"></span></a>
</td>
<td>
<a  title='delete' class="btn btn-sm btn-default cancelar-fac-matg" id='<?=$row->id?>' style="float: none;color:red" ><span class="glyphicon glyphicon-trash"></span></a>
</td>
</tr>

<?php
}
?>
<tr class='tr'>
<th colspan='5'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub3,2)?></th>
<th style='display:<?=$displayd?>'>RD$<?=number_format($total_cob3,2)?></th>
<th style='display:<?=$displayd?>' class='td'>RD$<?=number_format($tot_diff3,2)?></th>
<th class='td'>RD$<?=number_format($tot_discount3 ,2)?></th>
<th class='td' id='sum_pat_fac_mat'>RD$<?=number_format($sum_tot_pag_pat3,2)?></th>
</tr>
<?php
}
?>
</table>
<div class="modal fade" id="edit_fac_matg"  role="dialog" >
<div class="modal-dialog" style="width: 80%;" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
 $(".matg-matg tr").on("click",function() {
   $(this).addClass('selected').siblings().removeClass('selected');    
     
});

$('#edit_fac_matg').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
facturaBodyMat();

});

$(".cancelar-fac-matg").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/canceled_em_fac')?>',
data: {id : del_id,table:'emergency_peticion'},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
facturaBodyMat();
 
}
});
}
})


tranfertGpT();
function tranfertGpT(){
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertGpT')?>',
data: {sum_tot_pag_pat3:<?=$sum_tot_pag_pat3?>},
success:function(data) {
	 $("#grand-patient-tot-mat").val(data);
}
}),

$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertCob3')?>',
data: {total_cob3:<?=$total_cob3?>},
success:function(data) {
	 $("#total_cob3").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDiff3')?>',
data: {tot_diff3:<?=$tot_diff3?>},
success:function(data) {
	 $("#tot_diff3").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDesc3')?>',
data: {tot_discount3:<?=$tot_discount3?>},
success:function(data) {
	 $("#tot_discount3").val(data);
}
})
}
</script>
