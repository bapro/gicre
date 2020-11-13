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
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/chatb.jpg" type="image/x-icon" />
  <style>
.info2{font-size:11px;font-weight:normal;text-transform:lowercase;color:#00529B;}
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
<h4 class="modal-title"  style='text-transform:uppercase;'> <?=$userInfo?> <i class="info2" id="currentLoginChat"></i> </h4>

  <input type="text" name="search_text" id="search_text" placeholder="Buscar usuarios" class="form-control" />
</div>
<div class='col-sm-7'>
<table>
<tr>
<!--<td style="padding: 3px;"><span style="text-transform:uppercase;display:<?=$onlyadmin?>"> <button type="button" id="siWrite" class="btn btn-primary btn-sm"  ><i class="fa fa-envelope" aria-hidden="true"></i> Escribir a todos </button></span></td>
<td style="padding: 3px;"><span style="text-transform:uppercase;display:<?=$onlyadmin?>"> <button type="button" id="si" class="btn btn-primary btn-sm"  > Avisar una actualización </button></span></td>
-->
<td style="padding: 3px;display:<?=$onlyadmin?>">

</td>
</tr>
</table>
</div>
</div>
</div>
<div class="row" style="">
<div class="col-sm-5" style="max-height:80vh;overflow: auto;">
<div id="load-medicos"></div>
</div>
<div class="col-sm-7" style="background:#E2E3FD;display:<?=$onlyadmin?>">
<ul class="nav nav-tabs"> 
<li class="active"><a  data-toggle="tab" href="#home"><i class="fa fa-envelope" aria-hidden="true"></i> Escribir a todos</a></li>
<li><a data-toggle="tab" href="#menu1">Avisar una actualización</a></li>
</ul>
<div class="tab-content">
<div  id="menu1" class="cita-border tab-pane fade in">
<h4>ENVIAR MENSAGES A TODOS LOS USUARIOS SOBRE LA ACTUALIZACION DE GICRE</h4>
<form method="post" class="form-horizontal" id="submit" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red">*</span> Versión</label>
<div class="col-sm-4">
<input  type="text" class="form-control" id="titulo" name="titulo" placeholder="Versión" >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Enlace de video youtube (opcional)</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="videol" name="videol" placeholder="Enlace de video (opcional)" >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red">*</span> Subir documento</label>
<div class="col-sm-5">
<input type="file" name="file" class="file"  id="file"  accept=".pdf, .doc, .docx" />

</div>
<div id="errores"></div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-3">
<button type="submit" id="btn-send-ac" class="btn btn-primary btn-sm" >Enviar</button>
</div>
</div>
</form>

<h5><i class="fa fa-history"  aria-hidden="true" ></i> Versión historial</h5>
<?php
$sqtu="SELECT id_user FROM users";
$qtuser = $this->db->query($sqtu);
?>
<table class="table table-striped" style="width:70%;font-size:14px">
<thead>
<tr>
<th>Versión</th><th>Fecha</th><th>Vistas</th>
</tr>
</thead>
 <tbody>
<?php
$sql="SELECT userid, titulo, timesent FROM message_to_users GROUP BY titulo ORDER BY timesent DESC";
$query=$this->db->query($sql);
foreach ($query->result() as $row){
$timesent = date("d-m-Y H:i", strtotime($row->timesent));
$sqlv="SELECT name, id_user, perfil FROM users a WHERE a.id_user NOT IN (SELECT b.userid FROM message_to_users b WHERE b.titulo='$row->titulo') ORDER BY perfil ASC";
$qviews = $this->db->query($sqlv);
 ?>
<tr>
<td style="text-align:left"><?=$row->titulo?></td>
<td style="text-align:left"><?=$timesent?></td>
<td style="text-align:left">
<a data-toggle="modal" data-target="#viewedUsers" href="<?php echo base_url("admin/versionViewd/$row->titulo")?>"><?=$qviews->num_rows()?>/<?=$qtuser->num_rows()?> usuarios</a>
</td>
</tr>
<?php } ?>
 </tbody>
</table>
 </div>
 <div  class="active tab-pane fade in"  id="home">
 <h4>ENVIAR MENSAGES A TODOS LOS USUARIOS</h4>
<form method="post" class="form-horizontal" id="submitm">
 <div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red">*</span> Tipo de usuarios desaría enviar el mensage</label>
<div class="col-sm-4">
<select class="form-control select2" id="tipo">
<option value=""></option>
<option value="Todo">Todo</option>
<option value="Admin">Admin</option>
<option value="Medico">Médico</option>
<option value="Asistente Medico">Asistente Médico</option>
<option value="med-as">Medico y Asistente Médico</option>
<option value="Auditoria Medica">Auditoria Médica</option>
</select>
</div>
</div>
<div class="form-group area-div" style="display:none">
<label class="control-label col-sm-3">Area</label>
<div class="col-sm-5">
<select class="form-control select2" id="area">
 <option value="" >Todas</option>
 <?php 
$sql="SELECT title_area, id_ar FROM areas ORDER BY title_area DESC";
$query=$this->db->query($sql);
foreach ($query->result() as $row){
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
 
 </div>
 </div>	


<div class="form-group">
<label class="control-label col-sm-3" ><span style="color:red">*</span> Mensage</label>
<div class="col-sm-7">
<textarea class="form-control" id="messages-contents" /></textarea>
<div id="content-legnth" style="font-size:12px"><i></i></div>
</div>

</div>

<div class="form-group">
<div class="col-md-2 col-md-offset-2">
<button type="button" id="btn-send-m" class="btn btn-primary btn-sm" >Enviar</button>
</div>
</div>
</form>
 </div>
 </div>
</div>
</div>
 <div class="modal fade" id="viewedUsers" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >
<div class="modal-content" >
</div>
</div>
</div>

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
<br/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
 $('.select2').select2({ 
});

$('#tipo').on('change', function() {
if($(this).val()=="Medico"){
$(".area-div").show();	
}else{
$(".area-div").hide();	
}
});

$('#viewedUsers').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
$('#submit').submit(function(e){
e.preventDefault();
var file=$('#file').val();
var titulo=$('#titulo').val();
if(titulo ==""){
$('#titulo').focus();	
}
else if(file ==""){
alert("Sube el documento que tiene la actualizacion.");	
}  else {
$("#btn-send-ac").prop("disabled",true);	
$.ajax({
url:'<?php echo base_url();?>admin/mensagesUpdte',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
alert("Mensages enviados a todos los usuarios.");
$('#titulo').val('');
$('#videol').val('');
$('#messages-contents').val('');
$('#file').val('');
}

});
}

});



//--------------Send message to all------------------------------------
$('#messages-contents').on('keyup', function() {
 $('#content-legnth').text($(this).val().length + ' carácteres');
});
 
$('#btn-send-m').on('click', function(){
var content=$('#messages-contents').val();
var tipo=$('#tipo').val();
var area=$('#area').val();
var legnth= $('#messages-contents').val().length;
 if(tipo ==""){
$('#tipo').focus(); 	
}
 else if(content ==""){
$('#messages-contents').focus(); 	
} else if(legnth < 10){
	alert("Escribe al menos 10 carácteres.");
} else {
$.ajax({
method: "POST",
url: "<?=base_url('admin/mensagesToAllUsers')?>",
data: {tipo:tipo,content:content,area:area},
success:function(data){
alert("Mensages enviados a todos los usuarios.");
$('#tipo').val('');
$('#messages-contents').val('');
$('#content-legnth').text('');	
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#content-legnth').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}  
})	 
	 
	 
//---------------------------------------------------------------------------------------
var id_user="<?=$iduser?>";

//--------------------------------------------------------------------------------------
 
 
$("#load-medicos").fadeIn().html('<span   class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

load_data();
 function load_data(query)
 {
$.ajax({
   url:"<?php echo base_url(); ?>admin_medico/search_fetch_medico_chat_test",
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


setInterval(function(){
 $("#currentLoginChat").load("<?php echo base_url("admin_medico/currentLoginChat")?>?id_user="+id_user);
}, 5000);
//------------------------------------------------------------

 
 function goBack() { window.history.back(); } 
 


</script>