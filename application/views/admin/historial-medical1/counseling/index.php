<div id="counseling-paginate"></div>


<div id="counseling-content"></div>
<script>

 function loadounselingContent() {
$("#load-consejeria").show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 $("html, body").animate({
    scrollTop: 0
  }, 0);
	$.ajax({
	url: "<?php echo site_url('counseling_content/loadCounselingContent');?>",
	type: 'post',
	data:{user_id:<?=$user_id?>, idpatient:<?=$idpatient?>},
	success: function (data) {
	$("#counseling-content").html(data);
	
	},

	});
	}




 function paginateCounseling() {

	$.ajax({
	url: "<?php echo site_url('counseling_content/paginateCounseling');?>",
	type: 'post',
	data:{user_id:<?=$user_id?>, idpatient:<?=$idpatient?>},
	success: function (data) {
	$("#counseling-paginate").html(data);
	$("#load-consejeria").hide();
	},
	});
	}
	
	var countConse = 0;


	$('#show-consejeria').on('click', function(e) {
	e.preventDefault();
	
	countConse ++;
	if(countConse==1){
	paginateCounseling();
	loadounselingContent();
	}	
	});




</script>
