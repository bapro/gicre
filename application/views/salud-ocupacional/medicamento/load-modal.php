<div id="load-modal"></div>

<script>
function loadModal(){
	$('#load-modal').html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/modal_search_report_fields');?>",
	data:{id_user:<?=$id_user?>, id_cm:<?=$id_cm?>, table_name:"<?=$table_name?>", controller_report:"<?=$controller_report?>", target:<?=$target?>},
	success: function(data){
   $("#load-modal").html(data);

	},

	});
}

loadModal();
</script>