
<div id="examNeuro" ></div>

<div class="modal fade" id="ver_ex_neu"  role="dialog" >
<div class="modal-dialog modal-inc-width8" >
<div class="modal-content" >

</div>
</div>
</div>
<script>


$('#ver_ex_neu').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
examNeuro();
function examNeuro()
{
var user_id  = <?=$user_id?>;
var historial_id  = <?=$id_historial?>;
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/examNeuro",
data: {historial_id:historial_id,user_id:user_id},
method:"POST",
success:function(data){
$('#examNeuro').html(data);
}
});
}
</script>