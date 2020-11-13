<div id="Ocultar" style="margin-left:10px; background:#E7FEE9;">
 <table class="table table-striped table-bordered">

	<?php foreach($messages as $mes)
	 
	 {
		 $mesa=$mes->message;
		 ?>
        <tr>
          <th><?=wordwrap($mesa,10,"\n", 1)?></th>
     
           <td><?= $mes->insert_time?> <a title="Eliminar" id="<?=$mes->idsm; ?>"  class="delete" style="color:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" ></i></a></td>
	  </tr>
	  	<?php	
	 }
	 ?>
	   </table>
	 </div>
	 <script>
	//delete message
$(function() {
$(".delete").click(function(e){
	e.preventDefault();
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		
		var el = this;
   var del_id = $(this).attr('id');
    $.ajax({
            type:'POST',
            url:'<?=base_url('admin/DeleteMessage')?>',
            data: {id : del_id},
            success:function(data) {
		 // Removing row from HTML Table
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });
          
                  
            }
    });
 };
 });
  })
</script>