
<div id="examNeuro" ></div>

<div class="modal fade" id="ver_ex_neu" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-inc-width8" role="document">
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
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/examNeuro",
data: {historial_id:<?=$id_historial?>,user_id:<?=$user_id?>,id_hosp:<?=$id_hosp?>},
method:"POST",
success:function(data){
$('#examNeuro').html(data);
}
});
}
</script>