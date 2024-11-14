<script>	

function autoCompleteSelectWithId(keyword, table, field_name_in_table, input_name, input_name_id, div_result){
if(keyword==""){
	$("#"+div_result).hide();
	$("#suggestion-grup-lab-list-selected").hide();
}else{
    var fields = JSON.stringify(field_name_in_table);
	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>auto_complete_input/autoCompleteSelectWithId",
data:{keyword:keyword, table:table, field_name_in_table:fields, input_name:input_name, input_name_id:input_name_id, div_result:div_result},

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},

});
}	
}

</script>