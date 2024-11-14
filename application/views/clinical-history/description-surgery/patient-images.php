<div style="overflow-x:auto;">
<?php
if($query->result() ==NULL){
	echo "<em>No hay documento.</em>";
}else{
?>

<table class="table table-striped" style="width:100%;font-size:13px">
  <thead>
    <tr>
     <th></th>
		<th></th>
	  <th><em>Info</em></th>
      <th><em>Quitar</em></th>
    </tr>
  </thead>
 <tbody>
<?php
$i=1;
foreach($query->result() as $row){
?>
<tr>
<td  style="width:60px">

<img  style="width:100px" src="<?= base_url();?>/<?=$folder_name?><?=$row->folder?>"  />

</td>
<td title="<?=$row->folder?>"><em>...<?=substr($row->folder, -7);?></em> </td>
<td <td  style="width:160px"><em><?=date('d-m-Y H:i:s', strtotime($row->inserted_date))?></em></td>
<td>

  <i class="fa fa-remove remove-doc" id="<?=$row->id?>" title="eliminar este archivo" style='color:red;cursor:pointer;'></i>
 
 </td>

</tr>

<?php
}
?>
 </tbody>
</table>
<?php
}
?>
</div>


<script>

 $('#zoomimagead').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
 //location.reload();
});
$(".remove-doc").on('click', function(e){ 
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:"<?php echo base_url(); ?>patient/delPatDoc",
data: {id : del_id, table_name:"<?=$table_name?>", folder_name:"<?=$folder_name?>", id_patient:<?=$id_patient?>},
success:function(data) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
$("#count-files").text(data);
});
},
});
}
})

</script>