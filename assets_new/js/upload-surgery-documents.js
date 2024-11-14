     $(document).on('change', '#uploadDocumentoDesQ', function(event) {
	   event.preventDefault(); 
var myform = document.getElementById("uploadDocumentoDesQ");
var fd = new FormData(myform);
 var url_load = $(this).attr('action');
var table_name=$(this).find("#table_name_dq").val();
var id_p_a=$(this).find("#id_patient_to_load_dq").val();
var folder_name=$(this).find("#folder_name_dq").val();
 var attach_id = "document_file";
uploadPatientFileDq(fd,url_load,table_name,id_p_a,folder_name,attach_id);
});


function uploadPatientFileDq(fd,url_load,table_name,id_p_a,folder_name,attach_id){

var ins = document.getElementById(attach_id).files.length;
for (var x = 0; x < ins; x++) {
fd.append("files[]", document.getElementById(attach_id).files[x]);

var size = $('#'+attach_id)[0].files[x].size;
var sizeMg = size / (1024*1024);
var sizeMgT = sizeMg.toFixed(2);

if(sizeMgT > 5){
  Swal.fire({
icon: 'warning',
text: 'Un archivo tiene un tamaño de '+ sizeMgT + ' MB, el cual es más de 4 MB.',
});
$('#'+attach_id).val('');
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

success:function(res)  
{  
console.log(res.success);
if(res.success == true){
$('#'+attach_id).val('');

$('#msgDq').html(res.msg);   
$('#divMsgDq').show(); 
listFoldersDescQ();
delayHideMe();						   
}
else if(res.success == false){
$('#msgDq').html(res.msg); 
$('#divMsgDq').show(); 
delayHideMe();
}
setTimeout(function(){
$('#msgDq').html('');
$('#divMsgDq').hide(); 
}, 3000);

},

});	
}


function listFoldersDescQ(){
$('#listFoldersDescQ').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:$("#url_load_dq").val(),
data: {id_patient:$("#id_patient_to_load_dq").val(),table_name:$("#table_name_dq").val(),folder_name:$("#folder_name_dq").val(), from:1}, 
method:"POST",
success:function(data){
$('#listFoldersDescQ').html(data);
//countFiles();
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#listFoldersDescQ').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
};

   