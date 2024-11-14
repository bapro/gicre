     $(document).on('change', '#uploadDocumento', function(event) {
	   event.preventDefault(); 
var myform = document.getElementById("uploadDocumento");
var fd = new FormData(myform);
 var url_load = $(this).attr('action');
var table_name=$(this).find("#table_name").val();
var id_p_a=$(this).find("#id_p_a").val();
var folder_name=$(this).find("#folder_name").val();
 var attach_id = "image_file";
uploadPatientFile(fd,url_load,table_name,id_p_a,folder_name,attach_id);
});


function delayHideMe(){
setTimeout(function() {
$('.progress-bar').fadeOut('slow');
}, 2000);

}



function uploadPatientFile(fd,url_load,table_name,id_p_a,folder_name,attach_id){
	//var imageType = $("#image_file").val();
//var fileExtension = imageType.substr((imageType.lastIndexOf('.') + 1));	
var ins = document.getElementById('image_file').files.length;
for (var x = 0; x < ins; x++) {
fd.append("files[]", document.getElementById('image_file').files[x]);

var size = $('#'+attach_id)[0].files[x].size;
var sizeMg = size / (1024*1024);
var sizeMgT = sizeMg.toFixed(2);

if(sizeMgT > 5){
  Swal.fire({
icon: 'warning',
text: 'Un archivo tiene un tamaño de '+ sizeMgT + ' MB, el cual es más de 4 MB.',
});
$('#image_file').val('');
return false;
}	

}
	
$.ajax({
 url:url_load, 
  xhr: function() {
                var xhr = new window.XMLHttpRequest();
				 $('.progress-bar').show();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.floor((evt.loaded / evt.total) * 100);
                        $('.progress-bar').width(percentComplete + '%');
                        $('.progress-bar').html(percentComplete+ '%');
                    }
                }, false);
                return xhr;
            },
type:"post",
data:fd,  
contentType: false,  
cache: false,  
processData:false,  
dataType: "json",
/*
success: function(response){
console.log(response.message);
 if(response.status == 1){
	 listFolders();
	  $('#image_file').val("");
	    delayHideMe();
  }else if(response.status == 3){
	$('#errorWhenUp').html(response.message);
 $('#image_file').val("");	
  delayHideMe();
  }
else{	
 $('#errorWhenUp').html('<p class="alert alert-warning">'+response.message+'</p>');
	
}

},*/
success:function(res)  
{  
console.log(res.success);
if(res.success == true){
$('#image_file').val('');

$('#msg').html(res.msg);   
$('#divMsg').show(); 
listFolders();
delayHideMe();						   
}
else if(res.success == false){
$('#msg').html(res.msg); 
$('#divMsg').show(); 
delayHideMe();
}
setTimeout(function(){
$('#msg').html('');
$('#divMsg').hide(); 
}, 3000);

},

});	
}


function listFolders(){
$('#listFolders').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:$("#url_load").val(),
data: {id_patient:$("#id_p_a").val(),table_name:$("#table_name").val(),folder_name:$("#folder_name").val(), from:1}, 
method:"POST",
success:function(data){
$('#listFolders').html(data);
//countFiles();
},

});
};

   