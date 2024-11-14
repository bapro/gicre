<br/>
<div id="ssrForm" ></div>
<div class="modal fade" id="ver_ssr"  role="dialog" >
<div class="modal-dialog modal-inc-width7" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
ssrForm();
function ssrForm()
{
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/ssrForm",
data: {historial_id:historial_id,user_id:user_id},
method:"POST",
success:function(data){
$('#ssrForm').html(data);
}
});
}
</script>