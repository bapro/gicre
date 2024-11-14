 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>

<table id='table1' class='table table-striped proced-tab' >
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
$total_sub5=0;
$total_cob5=0;
$sum_tot_pag_pat5=0;
$tot_diff5=0;
$tot_descuento5=0;
if($query->result()!=NULL){

$i = 1;

foreach($query->result() as $row)
{
$data_pro=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->name)->get('centros_tarifarios')->row_array();
if($row->cobertura ==0.8 && $id_seguro !=11){
$monto=$data_pro['monto'];
$subtot=$row->monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8 && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=  $row->cobertura;
}else{
	$monto=$data_pro['monto'];	
$subtot=$monto * $row->cantidad;
$cobet=0;
}

$total_sub5 += $subtot;
$total_cob5 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff5 +=$diff;
$tot_descuento5 +=$row->descuento;
$sum_tot_pag_pat5 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i; $i++?></td>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $data_pro['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=$monto?> </td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$displayd?>'><?=number_format($cobet,2)?></td>
<td class='td' style='display:<?=$displayd?>'><?=number_format($diff,2)?></td>
<td ><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<a  data-toggle="modal" class="btn btn-sm btn-default " data-target="#edit_fac_proced"  href="<?php echo base_url("emergency/editEmFac/$row->id/5/$id_seguro")?>" ><span class="glyphicon glyphicon-pencil"></span></a>
</td>
<td>
<a  title='delete' class="btn btn-sm btn-default cancelar-fac-proced" id='<?=$row->id?>' style="float: none;color:red" ><span class="glyphicon glyphicon-trash"></span></a>
</td>
</tr>

<?php
}
?>
<tr class=''>
<th colspan='5'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub5,2)?></th>
<th style='display:<?=$displayd?>'>RD$<?=number_format($total_cob5,2)?></th>
<th style='display:<?=$displayd?>' class='td'>RD$<?=number_format($tot_diff5,2)?></th>
<th class='td'>RD$<?=number_format($tot_descuento5,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat5,2)?></th>
</tr>
<?php
}
?>
</table>


<div class="modal fade" id="edit_fac_proced"  role="dialog" >
<div class="modal-dialog" style="width: 80%;" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$(".proced-tab tr").on("click",function() {
   $(this).addClass('selected').siblings().removeClass('selected');    
     
});

$('#edit_fac_proced').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
facturaBodyProced();

});



$(".cancelar-fac-proced").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/canceled_em_fac')?>',
data: {id : del_id,table:'emergency_procedimiento'},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
facturaBodyProced();
 
}
});
}
})


tranfertGpTp();
function tranfertGpTp(){
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertGpTp')?>',
data: {sum_tot_pag_pat5:<?=$sum_tot_pag_pat5?>},
success:function(data) {
	 $("#grand-patient-tot-proced").val(data);
}
}),

$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertCob5')?>',
data: {total_cob5:<?=$total_cob5?>},
success:function(data) {
	 $("#total_cob5").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDiff5')?>',
data: {tot_diff5:<?=$tot_diff5?>},
success:function(data) {
	 $("#tot_diff5").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDesc5')?>',
data: {tot_discount5:<?=$tot_descuento5?>},
success:function(data) {
	 $("#tot_discount5").val(data);
}
})
}
</script>
