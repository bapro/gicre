<br/>
<div id="exaFisiForm" ></div>
<div class="modal fade" id="ver_exafisico"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width3" >
<div class="modal-content" >

</div>
</div>
</div>
<div class="modal fade" id="ver_ex_ot"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width10" >
<div class="modal-content" >

</div>
</div>
</div>

<script>
exaFisiForm();
function exaFisiForm()
{
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
var orientation  = 1;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/exaFisiForm",
data: {historial_id:historial_id,user_id:user_id,orientation:orientation},
method:"POST",
success:function(data){
$('#exaFisiForm').html(data);
}
});
}
</script>