<script>

$(document).ready(function(){  

listSesionPhotos('l',1,'l_');
listSesionPhotos('l',2,'l_');
listSesionPhotos('l',3,'l_');
listSesionPhotos('l',4,'l_');
listSesionPhotos('l',5,'l_');
listSesionPhotos('l',6,'l_');
listSesionPhotos('l',7,'l_');
listSesionPhotos('l',8,'l_');
listSesionPhotos('l',9,'l_');
listSesionPhotos('l',10,'l_'); 




$('#l_upload_form_se_f1').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f1");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


$('#l_upload_form_se_f2').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f2");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});



$('#l_upload_form_se_f3').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f3");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


$('#l_upload_form_se_f4').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f4");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});

$('#l_upload_form_se_f5').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f5");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


$('#l_upload_form_se_f6').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f6");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


$('#l_upload_form_se_f7').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f7");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});

$('#l_upload_form_se_f8').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f8");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});

$('#l_upload_form_se_f9').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f9");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


$('#l_upload_form_se_f10').on('change', function(e){ 
e.preventDefault(); 
var myform = document.getElementById("l_upload_form_se_f10");
var fd = new FormData(myform);
var pos_num=$(this).find("#l_pos_num").val();
var position=$(this).find("#l_position").val();
var aside=$(this).find("#l_aside").val();
saveSesionFotoLeft(fd,pos_num,position,aside);
});


function saveSesionFotoLeft(fd,pos_num,position,aside){
$.ajax({
 url:"<?php echo base_url(); ?>sesionFotos/uploadPhotoSesionLeft", 
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