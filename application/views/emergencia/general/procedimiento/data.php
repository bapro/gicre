<?php if($query->result() !=NULL)
{?>
<table class="table table-striped" id="table-emer-pro"  >
<thead>
<tr style="background:#428bca;" class="tr-header" >
<th style=";color:white">Procedimiento</th>
<th></th>
<th></th>
</tr>
<tr style="background:#428bca;" id='not-filter-me' >
<td><input class="form-control" id="search-emer-proc" placeholder='buscar'/></td>
<th style="color:white">Fecha</th>
<th style="color:white"></th>
</tr>
</thead>
<tbody id='filter-pro'>
<?php foreach($query->result() as $row)
{
$time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
?>
<tr>
<td>
<?=$row->sub_groupo?>
</td>
<td>
<?=$time?>
</td>
<td>
<?php if($row->id_user==$user_id  || $perfil=="Admin") {?>
<a title="Eliminar" style="cursor:pointer" class="delete-emg-proc" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>
<?php } ?>

</tbody>
</table>
<?php }else{
	echo "<em>no hay procedimientos...</em> ";
} ?>

<script>
$(".delete-emg-proc").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/deleteEmegProc')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
loadProcedimiento();
 
}
});
}
});


 $("#search-emer-proc").on("keyup", function() {
    var value = $(this).val().toLowerCase();
	 $("#table-emer-pro tbody tr").not('#not-filter-me').filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>