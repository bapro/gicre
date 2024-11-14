<script>
function searchAuToComplete(keyword, table, field, targetDiv, onSelectedValue){

	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>searchAutoComplete/filterDiagnosticos",
data:{keyword:keyword,origin:3, action: <?=$id_em_lic?>, table:table, field:field, targetDiv:targetDiv, onSelectedValue:onSelectedValue},
beforeSend: function(){
$("#"+targetDiv+"-<?=$id_em_lic?>").css("background","#DCDCDC");
},
success: function(data){
$("#"+targetDiv+"-display-<?=$id_em_lic?>").show();
$("#"+targetDiv+"-display-<?=$id_em_lic?>").html(data);
$("#"+targetDiv+"-<?=$id_em_lic?>").css("background","");
},

});
	
}


</script>