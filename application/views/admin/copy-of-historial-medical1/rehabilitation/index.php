<br/>
<div id="rehabForm"></div>



<div class="modal fade" id="ver_rehab"  role="dialog" >
<div class="modal-dialog modal-inc-width9" >
<div class="modal-content" >

</div>
</div>
</div>

<script>
rehabForm();
function rehabForm()
{
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/rehabForm",
data: {historial_id:historial_id,user_id:user_id,centro:"<?=$centro_medico?>"},
method:"POST",
success:function(data){
$('#rehabForm').html(data);
}
});
}
</script>