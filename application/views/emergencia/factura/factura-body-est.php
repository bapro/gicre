 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>

<table id='table1' class='table table-striped estudio-tab' >
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
$total_sub2=0;
$total_cob12=0;
$sum_tot_pag_pat2=0;
$tot_diff2=0;
$tot_descuento2=0;
$total_cob2=0;
$i2=1;
foreach($query->result() as $row)
{
$data_est=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->estudio)->get('centros_tarifarios')->row_array();	

if($row->cobertura ==0.8  && $id_seguro !=11){
$monto=$data_est['monto'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8  && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=  $row->cobertura;
} 
else{
$monto=$data_est['monto'];	
$subtot=$monto * $row->cantidad;
$cobet=0;	
}

$total_sub2 += $subtot;
$total_cob2 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff2 +=$diff;
$tot_descuento2 +=$row->descuento;
$sum_tot_pag_pat2 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i2; $i2 ++?></td>
<td class='td'><?php echo $row->insert_date ?></td>
<td class='td'><?php echo $data_est['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($monto,2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$displayd?>'><?=number_format($cobet,2)?></td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>
<td ><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<a  data-toggle="modal" class="btn btn-sm btn-default " data-target="#edit_fac_est"  href="<?php echo base_url("emergency/editEmFac/$row->id_i_e/2/$id_seguro")?>" ><span class="glyphicon glyphicon-pencil"></span></a>
</td>
<td>
<a  title='delete' class="btn btn-sm btn-default cancelar-fac-estudio" id='<?=$row->id_i_e?>' style="float: none;color:red" ><span class="glyphicon glyphicon-trash"></span></a>
</td>
</tr>

<?php
}
?>
<tr class='tr'>
<th colspan='5'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub2,2)?></th>
<th style='display:<?=$displayd?>'>RD$<?=number_format($total_cob2,2)?></th>
<th style='display:<?=$displayd?>' class='td'>RD$<?=number_format($tot_diff2,2)?></th>
<th class='td'>RD$<?=$tot_descuento2?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat2,2)?></th>
</tr>
</table>

<div class="modal fade" id="edit_fac_est"  role="dialog" >
<div class="modal-dialog" style="width: 80%;" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$(".estudio-tab tr").on("click",function() {
   $(this).addClass('selected').siblings().removeClass('selected');    
     
});

$('#edit_fac_est').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
facturaBodyEst();

});


$(".cancelar-fac-estudio").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/canceled_em_fac')?>',
data: {id : del_id,table:'orden_medica_estudios'},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
facturaBodyEst();
 
}
});
}
})


tranfertGpTest();
function tranfertGpTest(){
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertGpTest')?>',
data: {sum_tot_pag_pat2:<?=$sum_tot_pag_pat2?>},
success:function(data) {
 $("#grand-patient-tot-est").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertCob2')?>',
data: {total_cob2:<?=$total_cob2?>},
success:function(data) {
	 $("#total_cob2").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDiff2')?>',
data: {tot_diff2:<?=$tot_diff2?>},
success:function(data) {
	 $("#tot_diff2").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDesc2')?>',
data: {tot_discount2:<?=$tot_descuento2?>},
success:function(data) {
	 $("#tot_discount2").val(data);
}
})
}
</script>