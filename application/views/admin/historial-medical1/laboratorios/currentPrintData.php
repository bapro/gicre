<div class="col-md-3" id="hidetableprint">
 <?php if ($printlab !== null)
{?>
<table class="table" id="tableLabprintCurrent">
<?php
foreach($printlab as $row)
{
	$lab=$this->db->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
?> <tr>
<td><a  class="deletelabprint" id="<?=$row->id_lab; ?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td> <?=$lab?></td>
</tr>
<?php } ?>

</table>
<a target="_blank"  class="currentprint"  href="<?php echo base_url("printings/print_laboratorios/$historial_id/$areaid/$user_id")?>"><i style="font-size:24px;float:left" class="fa">&#xf02f;</i></a>

<?php }?>
</div>
<script>
$(".currentprint").click(function(){
	$("#hidetableprint").hide();
})

$(".deletelabprint").click(function(){
var totalRowCount = $("#tableLabprintCurrent tr").length;
var rowCount = $("#tableLabprintCurrent td").closest("tr").length;
var message = "Total Row Count: " + totalRowCount;
message += "\nRow Count: " + rowCount;

if(rowCount ==1){
	$(".currentprint").slideUp();
	}
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteHistLab')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

//$("#refresh-ant-ssr").fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
//$('#reloadprint').load("<?php echo base_url("admin_medico/LoadcurrentprintLab/$historial_id/$areaid/$user_id")?>").fadeIn("slow");
allLaboratorios();
}
});
})
</script>