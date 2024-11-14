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

$subtot=floatval($row->precio) * floatval($row->cantidad);

if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}



$total_sub5 += $subtot;
$total_cob5 += $row->cobertura;

$tot_diff5 +=$diff;
$tot_descuento5 +=$row->descuento;
$sum_tot_pag_pat5 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?php echo $i; $i++?></td>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $data_pro['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?> </td>
<td class='td getSubTotal' style='display:none'><?=$subtot?></td>
<td class='td'><?=number_format($subtot,2)?></td>
<td style='display:<?=$displayd?>'>
<span class="editSpan viewCobet">
<?=number_format($row->cobertura,2)?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editCobet" type="text" value='<?=$row->cobertura?>'  />
</td>
<td class='td' style='display:<?=$displayd?>'><?=number_format($diff,2)?></td>
<td style='display:none' class='td medDiff'><?=$diff?></td>
<td >
<span class="editSpan viewMedDesc">
<?=$row->descuento?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editMedDesc" type="text" value='<?=$row->descuento?>'  />
</td>
<td class='td editMedTotPat'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<button type="button"  class="btn btn-sm btn-default editBtnFacProced" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button type="button" class="btn btn-sm btn-success saveBtnFacProced" style="float: none; display: none;"><span class="glyphicon glyphicon-floppy-save"></span></button>

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


<script>
 $('.editBtnFacProced').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtnFacProced").hide();

        $(this).closest("tr").find(".saveBtnFacProced").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });
	


$(".saveBtnFacProced").on("click",function() {
	var ID = $(this).closest("tr").attr('id');
var cobclient=$(this).closest("tr").find(".editCobet").val();
 var editMedDesc = $(this).closest("tr").find(".editMedDesc").val();
var getSubTotal=$(this).closest("tr").find(".getSubTotal").text();
var medDiff=$(this).closest("tr").find(".medDiff").text();

if(parseFloat(medDiff) > parseFloat(editMedDesc) || parseFloat(medDiff) == parseFloat(editMedDesc)){

	 
  $(this).closest("tr").find(".editBtnFacProced").show();

 $(this).closest("tr").find(".saveBtnFacProced").hide();

 $(this).closest("tr").find(".editInput").hide();
 $(this).closest("tr").find(".editSpan").show();


 //----------AFFECT ROW----------------------
  $(this).closest("tr").find(".viewCobet").text(cobclient);
 $(this).closest("tr").find(".viewMedDesc").text(editMedDesc); 
 
var editMedTotPat = parseFloat(getSubTotal) - parseFloat(cobclient) - parseFloat(editMedDesc);
$(this).closest("tr").find(".editMedTotPat").text(parseFloat(editMedTotPat, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

var table="hosp_procedimiento";
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










$(".cancelar-fac-proced").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/canceled_em_fac')?>',
data: {id : del_id,table:'hosp_procedimiento'},
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
