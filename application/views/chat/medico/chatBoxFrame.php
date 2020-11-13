<div id="chat-box"  >
<div class='messages'>
<div  id="new_message1_doc"></div>
</div>
<div class="sender">
<input type="hidden" id="chatWithId" value="<?=$chatWithId?>" >
<input type="hidden" id="iduser" value="<?=$iduser?>" >
<input type="text" style="font-size:11px" id="message-doc" placeholder="Escribir Mensage">
<button class="btn btn-primary" id="send-doc" type="button"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
</div>
</div>


<script>
	
var lastScrollPosition;
$("#new_message1_doc").fadeIn(1000).html('<span class="load"  > <img style="width:50px;" src="<?= base_url();?>assets/img/loading.gif" /></span>');



setInterval(function(){
 var div = $(".messages");
var messageTo=$("#chatWithId").val();
var id_user=$("#iduser").val();
  $.ajax({
   url:"<?php echo base_url(); ?>admin_medico/newMessageDoc",
  method:"POST",
   data:{messageTo:messageTo,id_user:id_user},
   success:function(data){
    $('#new_message1_doc').html(data);
	if (lastScrollPosition != div.prop('scrollHeight')){
      lastScrollPosition = div.prop('scrollHeight');
      div.scrollTop(lastScrollPosition );
    }
	
   }
  })
}, 1000);



//-------------------------chat doc----------------------------------

$("#message-doc").keypress(function(e) {
    if(e.which == 13) {
        $("#send-doc").click();
    }
});

$("#send-doc").on('click', function (e) {
	  if($("#message-doc").val() == "" ){
   $("#message-doc").focus();
   $('#message-doc').css('border-color', 'red'); 
	  } else{
		 $('#message-doc').css('border-color', '');
$("#send-doc").prop("disabled",true);
var message=$("#message-doc").val();
var message_from=<?=$iduser?>;
var message_to="<?=$chatWithId?>";
   $.post("<?php echo site_url('admin_medico/docSendMessageDoc');?>", {message:message,message_from:message_from,message_to:message_to}, function(result){
   $("#message-doc").val("");
$("#send-doc").prop("disabled",false);
        });
		load_message();
}
});


//------------------------------------------------------------

</script>