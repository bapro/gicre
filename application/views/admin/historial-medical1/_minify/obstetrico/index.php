<br/>
<div id="obsForm" ></div>

<div class="modal fade" id="ver_obs"  role="dialog" >
<div class="modal-dialog modal-inc-width8" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
obsForm();
function obsForm()
{
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/obsForm",
data: {historial_id:historial_id,user_id:user_id},
method:"POST",
success:function(data){
$('#obsForm').html(data);
}
});
}
</script>