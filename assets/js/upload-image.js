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


(function() {
const form = document.getElementById("uploadDocumento"),
fileInput = document.getElementById("image_file"),
progressArea = document.querySelector(".progress-area"),
 urlImage = document.getElementById('uploadDocumento').action,
uploadedArea = document.querySelector(".uploaded-area");

form.addEventListener("click", () =>{
  fileInput.click();

});

fileInput.onchange = ({target})=>{
  let file = target.files[0];
  if(file){
    let fileName = file.name;
    if(fileName.length >= 12){
      let splitName = fileName.split('.');
      fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    }
    uploadFile(fileName);
  }
}

function uploadFile(name){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", urlImage);
  xhr.upload.addEventListener("progress", ({loaded, total}) =>{
    let fileLoaded = Math.floor((loaded / total) * 100);
    let fileTotal = Math.floor(total / 1000);
    let fileSize;
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;
    if(loaded == total){
      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      //uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
	  listFolders();
    }
  });
  let data = new FormData(form);
  xhr.send(data);
}

})();