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

  <input type="text" name="search_text" id="search_text" placeholder="Buscar usuarios" class="form-control" />
</div>
<div class='col-sm-7'>
  <input type="hidden" id="message-to"/>
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
<div id="chat-box"></div>
</div>
 </div>
<br/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>


//---------------------------------------------------------------------------------------
var id_user="<?=$iduser?>";


//--------------------------------------------------------------------------------------
 
 
$("#load-medicos").fadeIn().html('<span   class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

load_data();
 function load_data()
 {
$.ajax({
   url:"<?php echo base_url(); ?>admin_medico/allMessReceived",
   method:"POST",
   data:{id_user:<?=$iduser?>},
   success:function(data){
    $('#load-medicos').html(data);
   },
   error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#load-medicos').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
   })
 }

  



setInterval(function(){
  var receiverId= $("#message-to").val();
 $("#receiver-status").load("<?php echo base_url("admin_medico/chatWithStatus")?>?receiverId="+receiverId);
}, 1000);
//------------------------------------------------------------

 
 function goBack() { window.history.back(); } 
 

//----------------------------------------RELOAD ALL USERS WHEN ANY OF THEM LOGIN-----------------------------------------------------

//no-message-send new-message-sender
</script>