<table>
<?php 
$i = 1;	
foreach($patient_cie10 as $dr){

$diagno_def=$this->db->select('description')
->where('idd',$dr->diagno_def)
->get('cied')->row('description');	
?>
<tr>
<td><?=$i;$i++;?>-<?=$diagno_def;?>  <a title="Eliminar" class="delete-cied" id="<?=$dr->diagno_def; ?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
</tr>
<?php
}
?>
</table>




<script>
var count_patient_cie10="<?=$count_patient_cie10;?>";
if(count_patient_cie10==1){$(".delete-cied").hide();}
//------------------------------------------------------------------------------------------------------------------
$(".delete-cied").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeletePatCied')?>',
data: {id : del_id},
success:function(response) {
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
patientCie10();
});
}
});
}
})

</script>