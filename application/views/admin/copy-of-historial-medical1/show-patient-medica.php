<?php if(!empty($medicamentos))  
{ 

?>


<table style="width:100%">
 <tr>
 <th>Medicamentos habituales</th>
 <th></th>
  </tr>
<?php 
$i = 1;	
foreach($medicamentos as $row){

?>
<tr>
<td><?=$i;$i++;?>-<?=$row->medicine;?> <a title="Eliminar" class="delete-ant-gnl-medicine" id="<?=$row->id; ?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
</tr>
<?php
}
?>
</table>

<?php
} else {
echo "<label>Medicamento Habituales : No hay</label>";

} 


?>

<script>


//=======================================================================================


$('.delete-ant-gnl-medicine').click(function(){
	
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteMedHab')?>',
data: {id : del_id},
success:function(response) {
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
loadPatientMedicine();
});
}
});
}
})



</script>