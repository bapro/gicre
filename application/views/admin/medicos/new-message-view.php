<?php
foreach ($query->result() as $mes){
		$iduser=$mes->iduser;
$sent_by=$this->db->select('name')->where('id_user',$iduser)->get('users')->row('name');
	$response=$mes->response;
$insert_time = date("d-m-Y H:i:s", strtotime($mes->insert_time));
?>
<div class='message me'>
<p class='info'>
<span style='font-size:11px'><?=$sent_by?></span>
<br/><strong><?=$response?></strong><br/>
<span style='font-size:11px;float:right'><?=$insert_time?><a  id='<?=$mes->idsm?>'  class='deletem' style='color:white;cursor:pointer'><i class='fa fa-trash-o'  ></i></a></span>
</p>
</div>
<?php
}
?>

<script>
//delete message
$(function() {
$(".deletem").click(function(e){
	e.preventDefault();
	if (confirm("Borrar este mensage ?"))
			{ 
		
		var el = this;
   var del_id = $(this).attr('id');
    $.ajax({
            type:'POST',
            url:'<?=base_url('admin_medico/DeleteMessage')?>',
            data: {id : del_id},
            success:function(data) {
		$(el).closest('div').css('background','tomato');
    $(el).closest('div').fadeOut(800, function(){ 
     $(this).remove();
    });
	  }
    });
 };
 });
  })
  </script>