<br/>
<div id="urologyPaginate" ></div>
<div id="urology-content" ></div>


<script>

function loadUrologyContent()
{
$('#urology-content').show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var user_id  = "<?=$user_id?>";
var historial_id  = "<?=$id_historial?>";
var orientation  = 1;
$.ajax({
url:"<?php echo base_url(); ?>urologo/loadUrologyContent",
data: {historial_id:historial_id,user_id:user_id,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
$('#urology-content').html(data);
}
});
}


 function paginateUrology() {
	$.ajax({
	url: "<?php echo site_url('urologo/paginateUrology');?>",
	type: 'POST',
	data:{user_id:<?=$user_id?>, idpatient:<?=$id_historial?>, centro:<?=$centro_medico?>},
	success: function (data) {
	$("#urologyPaginate").html(data);
	$("#load-urology").hide();
	},
	});
	}


var countExamUro = 0;

$('#getExamFisSelectedUrologo').on('click', function(e) {
	e.preventDefault();
	   countExamUro ++;
	    if(countExamUro==1){
	paginateUrology();
	loadUrologyContent();
	   }
});
</script>