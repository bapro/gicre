<div id="newMedicaData"></div>
<script>

newMedicaData();
function newMedicaData()
{
var historial_id = "<?=$hist_id?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/newMedicaData",
data: {historial_id:historial_id},
method:"POST",
success:function(data){
$('#newMedicaData').html(data);
}
});
}

</script>