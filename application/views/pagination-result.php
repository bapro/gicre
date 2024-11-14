 <script>
 
 function paginationResult(display_content, controller, pageNum) {
			$(".spinner-border").show();
$.ajax({
url:"<?php echo base_url(); ?>"+controller+"/paginationResult",
data: {page:pageNum, action:1},
method:"GET",
success:function(data){
$(display_content).html(data);
$(".spinner-border").hide();
},
 
});
		
		
		}
		
</script>