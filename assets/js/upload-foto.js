	const form = document.getElementById("uploadDocumento"),
fileInput = document.getElementById("image_file");
form.addEventListener("click", () =>{
  fileInput.click();
});

$( document ).ready(function() {

listFolders();
function countFiles(){	
$.ajax({
url:$("#url_count_files").val(),
data: {id_patient:$("#id_p_a").val(),table_name:$("#table_name").val(), from:1}, 
method:"POST",
success:function(data){
$("#count-files").text(data);
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
countFiles();
},

});
};

 $("#uploadDocumento").on('change', function(e){
        e.preventDefault();
	var attach_id = "image_file";
	var size = $('#'+attach_id)[0].files[0].size;
	var sizeMg = size / (1024*1024);
	var sizeMgT = sizeMg.toFixed(2);
	if(sizeMgT > 4.024){
	alert('Tamaño '+ sizeMgT +' MB es más de 4 MB.');
	return false;
	}
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.floor((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+ '%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
			dataType:"json",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                //$('#uploadStatus').html('<img src="images/loading.gif"/>');
            },
	error: function(jqXHR, textStatus, errorThrown) {
	alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
	$('#img_error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
	console.log('jqXHR:');
	console.log(jqXHR);
	console.log('textStatus:');
	console.log(textStatus);
	console.log('errorThrown:');
	console.log(errorThrown);
	},
	success:function(data)
   {
	 console.log(data);
	 
    if(data.error)
    {
     if(data.img_error != '')
     {
      $('#img_error').html(data.img_error);
     }
     else
     {
      $('#img_error').html('');
     } 
	 }
    if(data.success_saved)
    {
	//location.reload();
	$('#image_file').val("");
	
	listFolders();
	 }
	 
	 if(data.failed_saved)
    {
     $('#img_error').html(data.failed_saved);
	 
    }
	
   }
        });
    });

});