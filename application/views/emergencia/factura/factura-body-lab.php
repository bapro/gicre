 	<?php if($id_seguro ==11){
	$displayd='none';
	}else{
	$displayd='';
	}?>

<table id='table1' class='table table-striped lab-tab ' >
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
$total_sub4=0;
$total_cob4=0;
$sum_tot_pag_pat4=0;
$tot_diff4=0;
$tot_descuento4 =0;
$i3=1;
foreach($query->result() as $row)
{
$data_lab=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->laboratory)->get('centros_tarifarios')->row_array();
if($row->cobertura ==0.8   && $id_seguro !=11){
$monto=$data_lab['monto'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8   && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=  $row->cobertura;
}else{
$monto=$data_lab['monto'];	
$subtot=$monto * $row->cantidad;
$cobet=0;	
}

$total_sub4 += $subtot;
$total_cob4 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff4 +=$diff;
$tot_descuento4 +=$row->descuento;
$sum_tot_pag_pat4 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i3; $i3++?></td>
<td class='td'><?php echo $row->insert_time ?></td>
<td class='td'><?php echo $data_lab['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($monto,2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$displayd?>'><?=number_format($cobet,2)?></td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>

<td ><?=$row->descuento?></td>

<td class='td'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<a  data-toggle="modal" class="btn btn-sm btn-default " data-target="#edit_fac_lab"  href="<?php echo base_url("emergency/editEmFac/$row->id_lab/3/$id_seguro")?>" ><span class="glyphicon glyphicon-pencil"></span></a>
</td>
<td>
<a  title='delete' class="btn btn-sm btn-default cancelar-fac-lab" id='<?=$row->id_lab?>' style="float: none;color:red" ><span class="glyphicon glyphicon-trash"></span></a>
</td>
</tr>

<?php
}
?>
<tr class='tr'>
<th colspan='5'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub4,2)?></th>
<th style='display:<?=$displayd?>'>RD$<?=number_format($total_cob4,2)?></th>
<th style='display:<?=$displayd?>' class='td'>RD$<?=number_format($tot_diff4,2)?></th>
<th class='td'>RD$<?=number_format($tot_descuento4,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat4,2)?></th>
</tr>
</table>

<div class="modal fade" id="edit_fac_lab"  role="dialog" >
<div class="modal-dialog" style="width: 80%;" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$(".lab-tab tr").on("click",function() {
   $(this).addClass('selected').siblings().removeClass('selected');    
     
});

$('#edit_fac_lab').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
facturaBodyLab();

});





$(".cancelar-fac-lab").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/canceled_em_fac')?>',
data: {id : del_id,table:'orden_medcia_lab'},
success:function(response) {

facturaBodyLab();
 
}
});
}
})


tranfertGpTlab();
function tranfertGpTlab(){
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertGpTlab')?>',
data: {sum_tot_pag_pat4:<?=$sum_tot_pag_pat4?>},
success:function(data) {
 $("#grand-patient-tot-lab").val(data);
}
}),

$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertCob4')?>',
data: {total_cob4:<?=$total_cob4?>},
success:function(data) {
	 $("#total_cob4").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDiff4')?>',
data: {tot_diff4:<?=$tot_diff4?>},
success:function(data) {
	 $("#tot_diff4").val(data);
}
}),
$.ajax({
type:'POST',
url:'<?=base_url('emergency/tranfertDesc4')?>',
data: {tot_discount4:<?=$tot_descuento4?>},
success:function(data) {
	 $("#tot_discount4").val(data);
}
})
}
</script>