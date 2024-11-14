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

<tr class='tr' id="<?=$row->id_i_m?>">
<td class='td'><?php echo $i; $i++?></td>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->insert_date));?></td>
<td class='td'><?php echo $med['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=$med['precio_venta']?></td>
<td class='td'><?=number_format($subtot,2)?></td>
<td style='display:<?=$displayd?>'>
<span class="editSpan viewCobet"><?=number_format($cobet,2)?></span>
<input style="display: none;"  class="form-control float  editInput input-sm editCobet" type="text" value='<?=$cobet?>'  />

</td>
<td  style='display:<?=$displayd?>' class='td'><?=number_format($diff,2)?></td>
<td  style='display:none' class='td medDiff'><?=$diff?></td>
<td >
<span class="editSpan viewMedDesc">
<?=$row->descuento?>
</span>
<input style="display: none;"  class="form-control float  editInput input-sm editMedDesc" type="text" value='<?=$row->descuento?>'  />
</td>

<td class='td editMedTotPat'><?=number_format($totpagpat,2)?></td>
<td class='td'>
<button type="button"  class="btn btn-sm btn-default editBtnFacMed" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button type="button"  class="btn btn-sm btn-success saveBtnFacMed" style="float: none; display: none;"><span class="glyphicon glyphicon-floppy-save"></span></button>
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

<script>

 $('.editBtnFacMed').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtnFacMed").hide();

        $(this).closest("tr").find(".saveBtnFacMed").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });



$(".saveBtnFacMed").on("click",function() {
var ID = $(this).closest("tr").attr('id');

var inputData = $(this).closest("tr").find(".editInput").serialize();

 var editCobet = $(this).closest("tr").find(".editCobet").val();
  var editMedDesc = $(this).closest("tr").find(".editMedDesc").val();
	var medDiff=$(this).closest("tr").find(".medDiff").text();  	  
var cobserver=<?=$cobet?>;
var cobclient=editCobet;
var percent=<?=$subtot?> * 0.8;
var cobfinal;
if(cobserver==0.8 && cobclient==percent){
cobfinal=0.8;	
}else{
cobfinal=cobclient;	
}

if(parseFloat(medDiff) > parseFloat(editMedDesc)  || parseFloat(<?=$diff?>) == parseFloat(editMedDesc) ){
	 
  $(this).closest("tr").find(".editBtnFacMed").show();

 $(this).closest("tr").find(".saveBtnFacMed").hide();

 $(this).closest("tr").find(".editInput").hide();
 $(this).closest("tr").find(".editSpan").show();
 //----------AFFECT ROW----------------------
  $(this).closest("tr").find(".viewCobet").text(editCobet);
 $(this).closest("tr").find(".viewMedDesc").text(editMedDesc);  
var editMedTotPat = <?=$subtot?> - editCobet - editMedDesc;
$(this).closest("tr").find(".editMedTotPat").text(parseFloat(editMedTotPat, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

var table="hosp_orden_medica_recetas";
$.ajax({
type: "POST",
url: '<?php echo site_url('hospitalizacion/updateOrdMedFac');?>',
data:{id:ID,operator:<?=$id_user?>,cobert:parseFloat(cobfinal),table:table,
descuento:parseFloat(editMedDesc)
},
success: function(data){
facturaBodyMed();
},
});
}
else{

var result=parseFloat(medDiff, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();	
	
	alert("descuento demasiado, la differencia es: "+result);
	$(this).closest("tr").find(".editMedDesc").val('');
}
});





$(".cancelar-fac-med").on("click",function() {
if (confirm("Seguro de cancelar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/canceled_em_fac')?>',
data: {id : del_id,table:'hosp_orden_medica_recetas'},
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
