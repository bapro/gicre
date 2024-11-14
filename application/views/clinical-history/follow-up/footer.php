 <script>
$( document ).ready(function() {

$('#upFollowUp').on('click', function(event) {
	event.preventDefault();
	   	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/update_evolution",
data:{id_con_evo:$("#id_con_evo").val(), id_user:$("#id_user").val(),conDiagEvo:$("#conDiagEvo").val()},
dataType: 'json',
cache: false,
success: function(response){
	if(response.status==0){
$('#evo-edit-result').html(response.message).show().delay(2000).fadeOut();

	}
},

});
});

	   
$('.saveFollowUp').on('click', function(event) {
	event.preventDefault();
	   	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/save_evolution",
data:{conDiagEvo:$("#conDiagEvo").val(), id_user:$("#id_user").val(), id_cdia:$("#id_cdia").val()},
dataType: 'json',
cache: false,

success: function(response){
	if(response.status==0){
$("#evolution-diag-list-li").html(response.list);
$("#conDiagEvo").val("");
$('.saveFollowUp').hide();
$('#upFollowUp').show();
	}
},

});
});


$("#evolution-diag-list-li li").on('click', function(e) {
	//e.preventDefault();
alert(1);
var pageNum = this.id;
$("#id_con_evo").val(pageNum);
$('#upFollowUp').show();
$("#evolution-diag-list-li li.active").removeClass("active"); 
    $(this).addClass("active"); 
//$(".spinner-border").show();
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/form",
data:{page:pageNum},
success: function(data){

$("#conDiagEvo").val(data);

},

});

});

});





	   </script>