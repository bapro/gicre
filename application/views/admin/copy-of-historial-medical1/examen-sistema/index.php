<br/>
<div id="sistForm" ></div>

<div class="modal fade" id="ver_exasis"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width11" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
function sistForm()
{
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/sistForm",
data: {historial_id:historial_id,user_id:user_id},
method:"POST",
success:function(data){
$('#sistForm').html(data);
}
});
}


var countExamSf = 0;

$('#show-examSis-form').on('click', function(e) {
	e.preventDefault();
	   countExamSf ++;
	    if(countExamSf==1){
	 $("#sistForm").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
     	sistForm();
	   }
});
</script>