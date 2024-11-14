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
<th style='display:<?=$displayd?>'>Total Pagar Seguro</th>
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

$subtot=floatval($row->precio) * floatval($row->cantidad);
if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}

$total_sub2 += $subtot;
$total_cob2 += $row->cobertura;
$tot_diff2 +=$diff;
$tot_descuento2 +=$row->descuento;
$sum_tot_pag_pat2 += $totpagpat;
?>

<tr class='tr' id="<?=$row->id_i_e?>">
<td class='td'><?php echo $i2; $i2 ++?></td>
<td class='td'><?php echo $row->insert_date ?></td>
<td class='td'><?php echo $data_est['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?></td>
<td class='td getSubTotal'><?=number_format($subtot,2)?></td>
<td style='display:<?=$displayd?>'>
<span class="editSpan viewCobet">
<?=number_format($row->cobertura,2)?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editCobet" type="text" value='<?=$row->cobertura?>'  />
</td>
<td style='display:none' class='td medDiff'><?=$diff?></td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>
<td >
<span class="editSpan viewMedDesc">
<?=$row->descuento?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editMedDesc" type="text" value='<?=$row->descuento?>'  />
</td>
<td class='td editMedTotPat'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<button type="button"  class="btn btn-sm btn-default editBtnFacEst" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button type="button" class="btn btn-sm btn-success saveBtnFacEst" style="float: none; display: none;"><span class="glyphicon glyphicon-floppy-save"></span></button>

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
 $('.editBtnFacEst').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtnFacEst").hide();

        $(this).closest("tr").find(".saveBtnFacEst").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });


$(".saveBtnFacEst").on("click",function() {
var ID = $(this).closest("tr").attr('id');
var cobclient=$(this).closest("tr").find(".editCobet").val();
 var editMedDesc = $(this).closest("tr").find(".editMedDesc").val();
  var medDiff = $(this).closest("tr").find(".medDiff").text();
  var getSubTotal = $(this).closest("tr").find(".getSubTotal").text();

if(parseFloat(medDiff) > parseFloat(editMedDesc) || parseFloat(medDiff) == parseFloat(editMedDesc)){

	 
  $(this).closest("tr").find(".editBtnFacEst").show();

 $(this).closest("tr").find(".saveBtnFacEst").hide();

 $(this).closest("tr").find(".editInput").hide();
 $(this).closest("tr").find(".editSpan").show();


 //----------AFFECT ROW----------------------
  $(this).closest("tr").find(".viewCobet").text(cobclient);
 $(this).closest("tr").find(".viewMedDesc").text(editMedDesc);  
var editMedTotPat = getSubTotal - parseFloat(cobclient) - parseFloat(editMedDesc);
$(this).closest("tr").find(".editMedTotPat").text(parseFloat(editMedTotPat, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

var table="hosp_orden_medica_estudios";
$.ajax({
type: "POST",
url: '<?php echo site_url('hospitalizacion/updateOrdMedFac');?>',
data:{id:ID,operator:<?=$id_user?>,cobert:parseFloat(cobclient),table:table,
descuento:parseFloat(editMedDesc)
},
success: function(data){
facturaBodyEst();
},
});
}else{
var result= parseFloat(medDiff, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
var desc= parseFloat(editMedDesc, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
alert("descuento: "+desc+" demasiado, la differencia es: "+result);
	$(this).closest("tr").find(".editMedDesc").val('');
}	
});




$(".cancelar-fac-estudio").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/canceled_em_fac')?>',
data: {id : del_id,table:'hosp_orden_medica_estudios'},
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