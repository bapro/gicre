<script>

$(document).ready(function(){  

listSesionPhotos('r',1,'r_');
listSesionPhotos('r',2,'r_');
listSesionPhotos('r',3,'r_');
listSesionPhotos('r',4,'r_');
listSesionPhotos('r',5,'r_');
listSesionPhotos('r',6,'r_');
listSesionPhotos('r',7,'r_');
listSesionPhotos('r',8,'r_');
listSesionPhotos('r',9,'r_');
listSesionPhotos('r',10,'r_'); 




$('#r_upload_form_se_f1').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f1");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});


$('#r_upload_form_se_f2').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f2");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});



$('#r_upload_form_se_f3').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f3");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});


$('#r_upload_form_se_f4').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f4");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});

$('#r_upload_form_se_f5').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f5");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});


$('#r_upload_form_se_f6').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f6");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});


$('#r_upload_form_se_f7').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f7");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});

$('#r_upload_form_se_f8').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f8");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});

$('#r_upload_form_se_f9').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f9");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});


$('#r_upload_form_se_f10').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("r_upload_form_se_f10");
var fd = new FormData(myform);
var pos_num=$(this).find("#r_pos_num").val();
var position=$(this).find("#r_position").val();
var aside=$(this).find("#r_aside").val();
saveSesionFotoRight(fd,pos_num,position,aside);
});

function saveSesionFotoRight(fd,pos_num,position,aside){
$.ajax({
 url:"<?php echo base_url(); ?>sesionFotos/uploadPhotoSesionRight", 
type:"post",
data:fd,  
contentType: false,  
cache: false,  
processData:false,  
dataType: "json",
success: function(response){
console.log(response.message);
 if(response.status == 1){
  $('#showEr').html('<p class="alert alert-warning">'+response.message+'</p>');
  }
else if(response.status == 3){
 $('#showEr').html('<p class="alert alert-warning">'+response.message+'</p>');	
}else{	
listSesionPhotos(position,pos_num,aside);
	
}

},
 
});	
}


});
</script>