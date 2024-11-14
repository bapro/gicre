<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.change-direct{text-align:right}
.req{
	font-weight:bold
}

.text-empty{
	color:red
}
</style>
 <br/>
<div class="container" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<div id="ImgRslt"></div>
<h2 class="h2 alert alert-info"> Subir Documentos</h2>
<p class="alert alert-info">Sus documentos subidos pueden ser vistos por los medicos de GICRE.</p>

<div class="col-md-8"  >

<?php echo  form_open_multipart("patient/uploadDocumento", ['id'=>'uploadDocumento', 'class'=>'form-horizontal']); ?>

<div class="form-group">
<label class="control-label col-sm-4"> Elegir documento</label>
<input  type="hidden" class="form-control"  name="id_p_a" value="<?=$id_patient;?>"  >
<div class="col-sm-6">
<?php echo form_input(['name'=>'image_file','id'=>'image_file','accept'=>'image/*,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.zip,.rar,.7zip', 'type'=>'file', 'onchange'=>'readURLadd(this)', 'class'=>'form-control']);?>
</div>
<!--<button type="submit" id="btnImg" style="" class="btn btn-success btn-md " ><i class="fa fa-upload-o" aria-hidden="true"></i>  Cargar </button>
-->
</div>

<?php echo form_close();?>
</div>
   
   
   <div class="col-md-12"  >
<h2 class="h2 alert alert-info"> Listado De Documentos</h2>
<div id="listFolders"></div>
   </div>
  
 </div>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<script>

$( document ).ready(function() {
listFolders();
function listFolders(){
$('#listFolders').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>patient/listFolders",
data: {id_patient:<?=$id_patient?>,from:1},
method:"POST",
success:function(data){
$('#listFolders').html(data);

},

});
};


$('#uploadDocumento').on('change', function(e){ 
  //$('#uploadDocumento').on('submit',function(e){
e.preventDefault(); 
$.ajax({
url: $(this).attr('action'),
type:"post",
data:new FormData(this), //this is formData
  dataType:"json",
processData:false,
contentType:false,
cache:false,
async:false,
  beforeSend:function(){
    $('#btnImg').attr('disabled', 'disabled');
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
     $('#ImgRslt').html(data.failed_saved);
	 
    }
	
	
   $('#btnImg').attr('disabled', false);
   },
    error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#ImgRslt').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

});



})
</script>
</body>
	</html>
