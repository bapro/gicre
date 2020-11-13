<table id="patCie10">
<?php 
if($patient_cie10 !=null){
$i = 1;	
foreach($patient_cie10->result() as $dr){

$diagno_def=$this->db->select('description')
->where('idd',$dr->diagno_def)
->get('cied')->row('description');	
?>
<tr>
<td style="text-align:left;font-size:14px">
<?=$i;$i++;?>-<?=$diagno_def;?>
<a title="Eliminar" class="delete-cied" id="<?=$dr->idcie; ?>"  style="color:red;cursor:pointer">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</a>
 </td>
</tr>
<?php
}
} else {
?>
<tr>
<td style="color:red">No hay conclusion diagnostica en el CIE10 </td>
</tr>
<?php	
}
?>
</table>

<script type="text/javascript">
var rowCount = $('#patCie10 tr').length;

if(rowCount==1){$(".delete-cied").hide();}else{$(".delete-cied").show();}


$(".delete-cied").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('emergency/DeletePatCied')?>',
data: {id : del_id},
success:function(response) {

patientCie10r();
}
});
}	
});

function patientCie10r()
{
var id_triaje = <?=$id_triaje?>;
$.ajax({
url:"<?php echo base_url(); ?>emergency/patientCie10",
data: {id_triaje:id_triaje},
method:"POST",
success:function(data){
$('#patientCie10').html(data);
}
});
}
</script>