<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL - CHATEAR</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/chat.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/chatb.jpg" type="image/x-icon" />
  <style>
  .btn-select-file {
  border-radius: 20px;
}

input[type="file"] {
  display: none;
}
.info2{font-size:11px;font-weight:normal;text-transform:lowercase;color:#00529B;}
  </style>
</head>

<div class="modal-header" style="background: #CACDCA;border-bottom:1px solid gray">
<button type="button"  onclick="goBack()" class="close" title="Volver a GICRE" ><i class="fa fa-times" aria-hidden="true" style="color:black;"></i></button>
<div class="row" style="">
<div class='col-sm-5'>
<h4 class="modal-title"  style='text-transform:uppercase;'> <?=$userInfo?>  <i class="current-login-chat info2"></i> <i class="info2" id="currentLoginChat"></i> </h4>
<span id="first-load" style="display:none"></span><span id="loginMas"  style="display:none"></span>
<span id="not-reload-us" style="display:none"></span><span id="reload-us"  style="display:none"></span>
  <input type="text" name="search_text" id="search_text" placeholder="Buscar usuarios" class="form-control" />
</div>
<div class='col-sm-7'>
<table>
<tr>
<td><h4  id="message-to-name" style="text-transform:uppercase">Con quien quiere chatear ?</h4></td>
<td id="chat-with" style="display:none"></td>
<td id="receiver-status" style="display:none"></td>
</tr>
</table>
</div>
</div>
</div>
<div class="modal-body" >
<div class="col-sm-5" style="max-height:80vh;overflow: auto;">
<div id="load-medicos"></div>
</div>
<div class="col-sm-7" style="background:#E2E3FD">
<div class="tile" id="chat-medico" style="display:none" >

<div class="messanger"  >
<div class='messages'>
<div  id="chat-historial"></div>
</div>
<div class="sender">
<input type="hidden" id="message-to" >
<span class="isUserTyping"></span>
<input type="text" class="chat_message" style="font-size:11px" id="message-doc" placeholder="Escribir Mensage">
<button class="btn btn-primary" id="send-doc" type="button" title="Enviar"><i class="fa fa-lg fa-fw fa-paper-plane"></i><i class='load' ></i></button>
<div class="file-block">
<span id="divFiles"></span>
  <button class="btn btn-info btn-select-file" title="Subir documento : imagen, word, excel, pdf">Subir</button>
  <input type="file" name="documento" id="documento" >
</div>
</div>
</div>

</div>
</div>
 </div>
<br/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>


$("#send-doc").on('click', function (e) {
if($("#message-doc").val() == "" ){
   $("#message-doc").focus();
   $('#message-doc').css('border-color', 'red'); 
	  } else{
 //$(".load").fadeIn().html('<span style="font-size:16px;color:white"  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//$(".fa-paper-plane").hide();
$("#send-doc").prop("disabled",true);
$('#message-doc').css('border-color', '');
//$("#send-doc").prop("disabled",true);
var messageTxt=$("#message-doc").val();
var message_from=<?=$iduser?>;
var message_to=$("#message-to").val();
$.ajax({
method: "POST",
url: "<?=base_url('admin_medico/docSendMessageDoc')?>",
data: {messageTxt:messageTxt,message_from:message_from,message_to:message_to},
success:function(data){
$("#message-doc").val("");
//$(".fa-paper-plane").show();
//$(".load").hide();
$("#send-doc").prop("disabled",false);
} 
});		
}
});


function userIsTypingInfo(){
	var messageTo=$("#message-to").val();
 $.ajax({
    url:"<?=base_url(); ?>admin_medico/userIsTypingInfo",
   method:"POST",
   data:{messageTo:messageTo,id_user:<?=$iduser?>},
   success:function(data)
   {
   $('.isUserTyping').html(data);
   }
  })

}

setInterval(function(){
  userIsTypingInfo();
}, 1000);
//---------------------------------------------------------------------------------------
var id_user="<?=$iduser?>";
setInterval(function(){
 $("#reload-us").load("<?php echo base_url("admin_medico/connectedUsers")?>?id_user="+id_user);
}, 1000);

$("#not-reload-us").load("<?php echo base_url("admin_medico/connectedUsers")?>?id_user="+id_user);


setInterval(function(){
  var first = $("#reload-us").text();
 var second = $("#not-reload-us").text();
if(first != second){
load_data(); 
$("#reload-us").text(second);
}
}, 1000);
//---------------------------------------------------------------------------------------
setInterval(function(){
 $("#currentLoginChat").load("<?php echo base_url("admin_medico/currentLoginChat")?>?id_user="+id_user);
}, 1000);
//--------------------------------------------------------------------------------------

setInterval(function(){
  var receiverId= $("#message-to").val();
 $("#receiver-status").load("<?php echo base_url("admin_medico/chatWithStatus")?>?receiverId="+receiverId);
}, 1000);
//--------------------------------------------------------------------------------------
	 var lastScrollPosition;

function load_message()
 {
var div = $(".messages");
var messageTo=$("#message-to").val();
  $.ajax({
   url:"<?php echo base_url(); ?>admin_medico/newMessageDoc",
   method:"POST",
   data:{messageTo:messageTo,id_user:<?=$iduser?>},
  success:function(data){
    $('#chat-historial').html(data);
	if (lastScrollPosition != div.prop('scrollHeight')){
      lastScrollPosition = div.prop('scrollHeight');
      div.scrollTop(lastScrollPosition );
    }
	
   }
  })
 }

 
$("#load-medicos").fadeIn().html('<span   class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

load_data();
 function load_data(query)
 {
$.ajax({
   url:"<?php echo base_url(); ?>admin_medico/search_fetch_medico_chat",
   method:"POST",
   data:{query:query,id_user:<?=$iduser?>},
   success:function(data){
    $('#load-medicos').html(data);
   }
   })
 }

	


  $('#search_text').keyup(function(){
	  
  var search = $(this).val();
  if(search !=""){
	   load_data(search);
   }else{
	   load_data();
	 }
 
});


function start() {
	 add = setInterval(function(){
	load_message();
}, 1000);
}


start();


jQuery(document).ready(function(){
    $( ".messages" )
    .mouseout(function() {
    start();
    })
    .mouseover(function() {
	clearInterval(add);
   
    });
}); 

//-------------------------chat doc----------------------------------
$(".chat_message").keyup(function(){
var is_type = 'no';
  var messageTo=$("#message-to").val();
    $.ajax({
    url:"<?php echo base_url(); ?>admin_medico/userIsTyping",
   method:"POST",
   data:{is_type:is_type,messageTo:messageTo,id_user:<?=$iduser?>},
   success:function(data)
   {
userIsTypingInfo();
 }
  })
});



$("#message-doc").keypress(function(e) {
	$("#isUserTypingVal").val('yes');
 if(e.which == 13) {
       $("#send-doc").click();
    }	
  var is_type = 'yes';
   var messageTo=$("#message-to").val();
    $.ajax({
    url:"<?php echo base_url(); ?>admin_medico/userIsTyping",
   method:"POST",
   data:{is_type:is_type,messageTo:messageTo,id_user:<?=$iduser?>},
   success:function(data)
   {
userIsTypingInfo();
 }
  })	
	

});


//------------------------------------------------------------

 
 function goBack() { window.history.back(); } 
 

 const fileBlocks = document.querySelectorAll('.file-block')
const buttons = document.querySelectorAll('.btn-select-file')

;[...buttons].forEach(function (btn) {
  btn.onclick = function () {
    btn.parentElement.querySelector('input[type="file"]').click()
  }
})

;[...fileBlocks].forEach(function (block) {
  block.querySelector('input[type="file"]').onchange = function () {
    const filename = this.files[0].name

    block.querySelector('.btn-select-file').textContent = filename
	
	 var size=$('#documento')[0].files[0].size;
 var extension=$('#documento').val().replace(/^.*\./, '');
 switch (extension) {
        case 'php': case 'html': case 'htm': case 'asp': case 'js': case 'css': case 'htaccess':
		block.querySelector('.btn-select-file').textContent = "Subir"
            alert('Esta extension es prohibida : ' + extension );
			  break;
         }
  }
})
//----------------------------------------RELOAD ALL USERS WHEN ANY OF THEM LOGIN-----------------------------------------------------

//no-message-send new-message-sender
</script>