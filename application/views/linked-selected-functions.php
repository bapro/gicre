<script>
function loadDocOnCentroSelect(id_cent, doctAtName){
	
	$.ajax({
url: "<?php echo site_url('general_controller/getDocsFromCenterMed');?>",
type: 'POST',
data:{centro_medico:id_cent},
success: function (data) {
//$("#display_seguro_data").removeClass("spinner-border").html("");
$("#"+doctAtName).html(data);

},

});	
}
</script>