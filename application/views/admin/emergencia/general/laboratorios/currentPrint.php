<div id="currentprint"></div>
<script>

currentprint();
function currentprint()
{
var historial_id = "<?=$historial_id?>";
var user_id = "<?=$user_id?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/currentprintLab",
data: {historial_id:historial_id,user_id:user_id},
method:"POST",
success:function(data){
$('#currentprint').html(data);
}
});
}

</script>