<script>
	//$(".spinner-border").hide();

function resetForm(li,controller,div){
$("#"+li+" li.active").removeClass("active"); 
$(".hide-enf-mic").show();
$("#"+div).load("<?php echo base_url(); ?>/"+controller+"/form?page="+0+"&signo="+0);	
}


function showalert(message, alerttype, alert_placeholder) {
    $('#'+alert_placeholder).append('<span id="alertdivAfterSaveForm" class="alert ' +  alerttype + '" role="alert">' + message + '</span>');
    setTimeout(function() {
        $("#alertdivAfterSaveForm").remove();
    }, 3000);
 }
 
 
 function paginateLiForm(display_content, controller, pageNum) {
			$(".spinner-border").show();
			

$(".hide-enf-mic").hide();
			$(display_content).load("<?php echo base_url(); ?>" + controller + "/form?page=" + pageNum + "&signo=" + 1);



		}
		
		
		function loadPagination(arg, id_patient){
			
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>"+arg+"/pagination",
					data: {
						id_patient:id_patient
					},
					beforeSend: function() {
						$("#pagination-"+arg).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$("#pagination-"+arg).removeClass("spinner-border");
						$("#pagination-"+arg).html(data);

					},

				});
			
		}
</script>