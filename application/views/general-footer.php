<script>
function saveReasonToCancelTable(el, del_id, reasonToCancelTable, tableName, field, value){	

$.ajax({
type:'POST',
url:'<?=base_url('cancel_table/index')?>',
data: {id : del_id,reasonToCancelTable:reasonToCancelTable,tableName:tableName, field:field, value:value},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(el).remove();
});
},

});	
}



function onclickElimiarBtnTableRegister(el, table){	
	
  el.closest("tr").find(".show-text-area-reason-cancel-"+table).show();
  el.closest("tr").find(".hide-cancel-td-"+table).hide();	
}


function onclickNotElimiarBtnTableRegister(el, table){	
	
  el.closest("tr").find(".show-text-area-reason-cancel-"+table).hide();
  el.closest("tr").find(".hide-cancel-td-"+table).show();
  
}

</script>