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
#chat-medico {
  background-image: url('<?= base_url();?>assets/img/gicle.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

 </style>
 
   <script>

// Add event listener offline to detect network loss.
window.addEventListener("offline", function(e) {
    showPopForOfflineConnection();
});

// Add event listener online to detect network recovery.
window.addEventListener("online", function(e) {
    hidePopAfterOnlineInternetConnection();
});

function hidePopAfterOnlineInternetConnection(){
	$('#myModalConnection').modal('hide');
	$('#myModalConnectionBack').modal({
	backdrop: 'static',
	keyboard: false
	})

    // Set a timeout to hide the element again
    setTimeout(function(){
        $("#myModalConnectionBack").modal('hide');
    }, 2000);
	

}

function showPopForOfflineConnection(){
	
$('#myModalConnection').modal({
backdrop: 'static',
keyboard: false
})
$(".spinning-me").fadeIn().html('<span style="font-size:15px;color:#B3AF76" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load text-danger"></span>');

}

</script>
</head>

<div class="modal-header" style="background: #CACDCA;border-bottom:1px solid gray">
<button type="button"  onclick="goBack()" class="close" title="Volver a GICRE" ><i class="fa fa-times" aria-hidden="true" style="color:black;"></i></button>
<div class="row" style="">
<div class='col-sm-5'>
<h4 class="modal-title"  style='text-transform:uppercase;'> <?=$messageFromName?> <i class="current-login-chat info2"></i> <i class="info2" id="currentLoginChat"></i> </h4>

  <input type="text" name="search_text" id="search_text" placeholder="Buscar usuarios" class="form-control" />
</div>
<div class='col-sm-7'>

<table>
<tr>
<td><h4 style="text-transform:uppercase"><?=$messageToName?></h4></td>
<td id="receiver-status"></td>
</tr>
</table>
</div>
</div>
</div>
<div class="modal-body" >
<div class="col-sm-5" style="max-height:80vh;overflow: auto;">
<div id="load-medicos">
<?php $this->load->view('chat/all-users');?>

</div>
</div>
<div class="col-sm-7" style="background:#E2E3FD">
<div class="tile" id="chat-medico">
<div class="messanger"  >
<div class='messages' id="loadChatData">
<?php $this->load->view('chat/loadChatData');?>
</div>

<div class="sender">
<input type="text" class="chat_message" style="font-size:11px;" id="textMessage" placeholder="Escribir Mensage">
<button class="btn btn-primary" id="send-message" type="button" title="Enviar"><i class="fa fa-lg fa-fw fa-paper-plane"></i><i class='load' ></i></button>
<!--<div class="file-block">
<span id="divFiles"></span>
  <button class="btn btn-info btn-select-file" title="Subir documento : imagen, word, excel, pdf">Subir</button>
  <input type="file" name="documento" id="documento" class="upload_attachmentfile">
</div>-->
</div>

</div>
</div>
</div>
 </div>
<br/>
<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<h4>Parece que su conexión a Internet está fuera de línea.</h4>
</div>
<div class="alert alert-warning text-center"><i> Intentando reconectar </i><span class="spinning-me" ></span></i></div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="myModalConnectionBack" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-success text-center">
<h4>Esta connectado.</h4>
</div>
</div>
</div>
</div>
</div>
<?php 
$imgpat='<img  style="width:30px;color:green" src="'.base_url().'/assets/img/user.png"  />';

$time1 = date("d-m-Y");
	$hm = date("H:i");
	$today=date("d-m-Y");
	$ayer=date('d-m-Y', strtotime('-1 days'));
	 if($time1==$today){
		$time1="hoy $hm"; 
	 } 
	 elseif($time1==$ayer){
	$time1="ayer $hm"; 	 
	 }
	 else{
		$time1="$time1 $hm";  
	 }

?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
 var lastScrollPosition;
 var div = $(".messages");
if (lastScrollPosition != div.prop('scrollHeight')){
      lastScrollPosition = div.prop('scrollHeight');
      div.scrollTop(lastScrollPosition );
    }
load_data();
 function load_data(query)
 {
$.ajax({
   url:"<?php echo base_url(); ?>admin_medico/search_fetch_medico_chat_test",
   method:"POST",
   data:{query:query,id_user:<?=$id_user?>},
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

$("#textMessage").keypress(function(e) {
 if(e.which == 13) {
       sendTxtMessage($(this).val());
    }
});


$('#send-message').click(function(){
       sendTxtMessage($('#textMessage').val());
	  
});

function DisplayMessage(message){
var str = '<div class="message me">';
str+='<?=$imgpat?>';
str+='<p class="info">';
str+='<span style="font-size:11px"><?=$messageFromName?></span>';
str+='<br/><strong>'+message ;
str+='</strong><br/>';
str+='<span style="font-size:11px;float:right"> <?=$time1?> </span>'; 

str+='</div>';
$('#loadChatData').append(str);
}

function sendTxtMessage(message) {
var div = $(".messages");	
var messageTxt = message.trim();
if(messageTxt != "" ){
$("#textMessage").val("");
DisplayMessage(messageTxt);
var message_from=<?=$id_user?>;
var message_to=<?=$idChatWith?>;
$.ajax({
method: "POST",
url: "<?=base_url('admin_medico/docSendMessageDoc')?>",
data: {messageTxt:messageTxt,message_from:message_from,message_to:message_to},
success:function(data){
} 
});

if (lastScrollPosition != div.prop('scrollHeight')){
      lastScrollPosition = div.prop('scrollHeight');
      div.scrollTop(lastScrollPosition );
    }
  }else{
		$('#textMessage').focus();  
	  }
};


function loadChatData(message_to)
 {

 $.ajax({
   url:"<?php echo base_url(); ?>admin_medico/loadChatData",
   method:"POST",
   data:{idChatWith:message_to,id_user:<?=$id_user?>},
  success:function(data){
    $('#loadChatData').html(data);
	var div = $(".messages");
if (lastScrollPosition != div.prop('scrollHeight')){
      lastScrollPosition = div.prop('scrollHeight');
      div.scrollTop(lastScrollPosition );
    }
 }
  })
 }





 function goBack() 
 { 
  window.history.go(-2);
 } 
 
 
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


setInterval(function(){
	var id_user=<?=$id_user?>;
	$("#currentLoginChat").load("<?php echo base_url("admin_medico/currentLoginChat")?>?id_user="+id_user);
	var receiverId=<?=$idChatWith?>;
 $("#receiver-status").load("<?php echo base_url("admin_medico/chatWithStatus")?>?receiverId="+receiverId);
loadChatData(<?=$idChatWith?>);
}, 5000);





/*jQuery(document).ready(function(){
    $( ".messages" )
    .mouseout(function() {
    start();
    })
    .mouseover(function() {
	clearInterval(add);
   
    });
});*/
//-----------------------------------------------------------------------


</script>