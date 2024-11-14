<br/>
<div id="sistForm" ></div>

<div class="modal fade" id="ver_exasis"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width11" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
sistForm();
function sistForm()
{

var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/sistForm",
data: {historial_id:historial_id,user_id:user_id,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
$('#sistForm').html(data);
}
});
}

var countExamSf = 0;

$('#show-examSis-form').on('click', function(e) {
		alert(<?=$centro_medico?>);
	e.preventDefault();
	   countExamSf ++;
	    if(countExamSf==1){
	 examSistSisMuEs();
		examSistRelativoA();
	   }
});
</script>