<?php if(!empty($medicamentos))  
{ 

?>
<table class="table table-striped table-bordered">
 <thead>
<tr>
<th>Medicamento Habituales</th><th>Quitar</th>


</tr>
 </thead>
 <tbody>
<?php

foreach($medicamentos as $row)
{

?>
<tr>
<td>
<?=$row->medicine;?>
</td>
<td>
<input type='checkbox' class="s-med-s22"  value="<?=$row->medicine?>" checked disabled />
<!--<input type='checkbox' value="<?=$row->id?>" <?php echo !is_null($row->id_patient)?'checked':''; ?> />-->
</td>

</tr>
<?php
}
?>
</tbody>
</table>
<?php
} else {
echo "<label>Medicamento Habituales : No hay</label>";

} 


?>

<script>


//=======================================================================================
$('.s-med-s22').change(function() {
	var id_pat  = "<?=$hist_id?>";
	var part  = "<?=$part?>";
	var user_id  = "<?=$user_id?>";
	var medCheckded= $(this).val();
	
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteEmptyMedPedTrueTable')?>',
data: {medicine:medCheckded,id_pat:id_pat,part:part,user_id:user_id},
success:function(data) {
	loadPatientMedicinePed();
  },

});	

 })
 


</script>