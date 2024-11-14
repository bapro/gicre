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
$subtot=floatval($row->precio) * floatval($row->cantidad);
if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}

$total_sub4 += $subtot;
$total_cob4 += $row->cobertura;

$tot_diff4 +=$diff;
$tot_descuento4 +=$row->descuento;
$sum_tot_pag_pat4 += $totpagpat;
?>

<tr class='tr' id="<?=$row->id_lab?>">
<td class='td'><?php echo $i3; $i3++?></td>
<td class='td'><?php echo $row->insert_time ?></td>
<td class='td'><?php echo $data_lab['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?></td>
<td class='td getSubTotal' style='display:none'><?=$subtot?></td>
<td class='td'><?=number_format($subtot,2)?></td>
<td style='display:<?=$displayd?>'>
<span class="editSpan viewCobet">
<?=number_format($row->cobertura,2)?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editCobet" type="text" value='<?=$row->cobertura?>'  />
</td>
<td style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>
<td style='display:none' class='td medDiff'><?=$diff?></td>
<td >
<span class="editSpan viewMedDesc">
<?=$row->descuento?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editMedDesc" type="text" value='<?=$row->descuento?>'  />
</td>

<td class='td editMedTotPat'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<button type="button"  class="btn btn-sm btn-default editBtnFacLab" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button type="button" class="btn btn-sm btn-success saveBtnFacLab" style="float: none; display: none;"><span class="glyphicon glyphicon-floppy-save"></span></button>

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
 $('.editBtnFacLab').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtnFacLab").hide();

        $(this).closest("tr").find(".saveBtnFacLab").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });
	
	
	
	$(".saveBtnFacLab").on("click",function() {
	var ID = $(this).closest("tr").attr('id');
var cobclient=$(this).closest("tr").find(".editCobet").val();
 var editMedDesc = $(this).closest("tr").find(".editMedDesc").val();
var getSubTotal=$(this).closest("tr").find(".getSubTotal").text();
var medDiff=$(this).closest("tr").find(".medDiff").text();

if(parseFloat(medDiff) > parseFloat(editMedDesc) || parseFloat(medDiff) == parseFloat(editMedDesc)){

	 
  $(this).closest("tr").find(".editBtnFacLab").show();

 $(this).closest("tr").find(".saveBtnFacLab").hide();

 $(this).closest("tr").find(".editInput").hide();
 $(this).closest("tr").find(".editSpan").show();


 //----------AFFECT ROW----------------------
  $(this).closest("tr").find(".viewCobet").text(cobclient);
 $(this).closest("tr").find(".viewMedDesc").text(editMedDesc); 
 
var editMedTotPat = parseFloat(getSubTotal) - parseFloat(cobclient) - parseFloat(editMedDesc);
$(this).closest("tr").find(".editMedTotPat").text(parseFloat(editMedTotPat, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

var table="hosp_orden_medcia_lab";
$.ajax({
type: "POST",
url: '<?php echo site_url('hospitalizacion/updateOrdMedFac');?>',
data:{id:ID,operator:<?=$id_user?>,cobert:parseFloat(cobclient),table:table,
descuento:parseFloat(editMedDesc)
},
success: function(data){
facturaBodyLab();
},
});
}else{

var result= parseFloat(medDiff, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
var desc= parseFloat(editMedDesc, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
alert("descuento: "+desc+" demasiado, la differencia es: "+result);
	$(this).closest("tr").find(".editMedDesc").val('');
}	
});
	
	
	
	
	
	
$(".cancelar-fac-lab").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/canceled_em_fac')?>',
data: {id : del_id,table:'hosp_orden_medcia_lab'},
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