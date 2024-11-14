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

<?php 
$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";

	?>
<div class="container" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h2 class="h2 alert alert-info"> MI CUENTA</h2>
 <div class="text-danger text-center"><strong><?=$this->session->flashdata('flashError')?></strong></div>
   <div class="col-md-4" style="" >
 <h4 style="text-align:center" >DATOS PERSONALES  </h4>
 
<?php
foreach($patient_admedicall as $row)
$data['photo_rows']=$patient_admedicall;
 $this->load->view('navigation/patient-photo',$data);
 
 $nacer2 = date("d-m-Y", strtotime($row->date_nacer));
$ced11=substr("$row->cedula",0,3);
$ced22=substr("$row->cedula",3,10);
$ced33=substr("$row->cedula",-1);

 
?>


<table class="table table-striped ">
<tr>

<th colspan ="2" class="alert alert-info" style='text-align:center;text-transform:uppercase;'><?=$row->nombre ?> (# <?=$row->id_p_a ?>)</th>
</tr>
<tr>
<th class='change-direct'><strong>FECHA NAC.</strong></th>
<td> <?=$nacer2;?></td>
</tr>
<tr>
<th class='change-direct'>CEDULA</th> <td><?=$ced11;?>-<?=$ced22;?>-<?=$ced33;?></td>
</tr>
<tr>
<th class='change-direct'>CELULAR <span class="req">*</span> </th>
 <td><?=$row->tel_cel;?></td>
</tr>
</table>
</div> 

<div class="col-md-8"   style="background:linear-gradient(to right, white, #E0E5E6, white);border-left:1px solid #38a7bb;" >
<div><?php echo $this->session->flashdata('account-created'); ?></div>
<?php 
if($correo){
	$action=1;
	$info="<a  href='".site_url()."patient'  >Connectar A Mi Cuenta</a> | Actualizar Mi Cuenta";
	$go="updatePatientAccount";
}else{
	$action=0;
	$info='';
	$go="createPatientAccount";
}
echo $info;
echo form_open("navigation/createPatientAccount",['id'=>"createPatientAccount",'autocomplete'=>'off', 'class'=>'form-horizontal']);
?> 
<div id="cuenta_result"></div>
<h4 class="cita-title">DATOS DE LA CUENTA</h4>
<input  type="hidden" class="form-control"  name="id_p_a" value="<?=$row->id_p_a;?>"  >
<input  type="hidden"  name="action" value="<?=$action;?>"  >
<input type="hidden" class="form-control" name="nombres" value="<?=$row->nombre ?>"   />
<div class="form-group">
<label  class="control-label col-sm-4" ><span class="req">*</span> Correo Elec. </label>
<div class="col-sm-5" >
<?php echo form_input(['name'=>'correo', 'type'=>'text',  'class'=>'form-control', 'value'=>"$row->email"]);?>
 <span id="correo_error" class="text-empty"></span>
</div>

</div>

<!--
<div class="form-group">
<label  class="control-label col-sm-4" ><span class="req">*</span> Usuraio </label>
<div class="col-sm-5" >

<input type="text" class="form-control" name="username" value="<?=$username;?>"   />
 <span id="username_error" class="text-empty"></span>
</div>

</div>-->

<div class="form-group">
<label  class="control-label col-sm-4" ><span class="req">*</span> Contraseña </label>
<div class="col-sm-5" >
<?php echo form_input(['name'=>'password1', 'type'=>'password',  'class'=>'form-control']);?>
 <span id="password1_error" class="text-empty"></span>
</div>

</div>

<div class="form-group">
<label  class="control-label col-sm-4" ><span class="req">*</span> Confirmar Contraseña </label>
<div class="col-sm-5" >
<?php echo form_input(['name'=>'password2', 'type'=>'password',  'class'=>'form-control']);?>
 <span id="password2_error" class="text-empty"></span>
</div>
</div>
<?php if($action==1){?>
<div class="form-group">
<label class="control-label col-sm-4"> Cambiar la foto</label>
<div class="col-sm-6">
<a class="btn btn-default btn-xs" data-toggle="modal"  data-target="#updateFoto"  href="#"><i class="fa fa-user" aria-hidden="true"></i> Subir la foto</a>
</div>
</div>
<?php } ?>
<div class="form-group">              
<label class="control-label col-sm-4">Google Recaptcha <span class="req">*</span></label>
<div class="col-sm-3">

<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" data-callback="enableBtn"></div> 

</div>
</div>


<div class="form-group">
<div class="col-md-5 col-md-offset-4"  style="height: 22.8vh;" >
<br/><br/><br/><br/><br/><br/>
 <!--<a href="<?php echo site_url();?>" class="btn btn-success btn-lg " >Loguear</a>-->
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg " disabled><i class="fa fa-floppy-o" aria-hidden="true"></i>  guardar </button>
</div>
</div>
<?php echo form_close();?>
   </div>
  
 </div>

<div class="modal fade" id="updateFoto" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-md" >
        <div class="modal-content" >
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="modal-title">Subir Foto</h3>
		</div>
<?php echo  form_open_multipart("navigation/uploadImg", ['id'=>'uploadImg', 'class'=>'form-horizontal']); ?>
		<div class="modal-body"  style="height:500px;width:500px"  >
       <div id='ImgRslt'  class="text-empty"></div>
		<div class="form-group">
		<label class="control-label col-sm-4"> Cambiar la foto</label>
		<input  type="hidden" class="form-control"  name="id_p_a" value="<?=$row->id_p_a;?>"  >
		<div class="col-sm-6">
		<?php echo form_input(['name'=>'image_file','accept'=>'image/*', 'type'=>'file', 'onchange'=>'readURLadd(this)', 'class'=>'form-control']);?>
		<input name="if_photo" id="if_photo" type="hidden" value="0" />
		 <span id="img_error" class="text-empty"></span>
		<br/>
		<img id="photo_preview" src="" width="210" height="210" style="display:none" />
		</div>
		
		</div>
		 <button type="submit" id="btnImg" style="bottom:10px;position:absolute;text-align:right" class="btn btn-success btn-md " ><i class="fa fa-upload-o" aria-hidden="true"></i>  Cargar </button>

	
		</div>
			<?php echo form_close();?>
			
        </div>
    </div>
</div>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



	<script>
		 function enableBtn(){
   document.getElementById("sendc").disabled = false;
 }
 
 
	</script>
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
<script>

function readURLadd(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#photo_preview').show();
$('#photo_preview')
.attr('src', e.target.result);
};

reader.readAsDataURL(input.files[0]);
$('#if_photo').val(1);
}

}
$( document ).ready(function() {




  $('#uploadImg').on('submit',function(e){
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
	location.reload();
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




	
$('#createPatientAccount').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url: $(this).attr('action'),
   method:"POST",
data:new FormData(this), //this is formData
processData:false,
contentType:false,
cache:false,
async:false,
   dataType:"json",
   beforeSend:function(){
    $('#sendc').attr('disabled', 'disabled');
   },
   success:function(data)
   {
	     console.log(data); 
    if(data.error)
    {
		
	 if(data.correo_error != '')
     {
      $('#correo_error').html(data.correo_error);
     }
     else
     { 
      $('#correo_error').html('');
     }
     if(data.password1_error != '')
     {
      $('#password1_error').html(data.password1_error);
     }
     else
     { 
      $('#password1_error').html('');
     }
	   if(data.password2_error != '')
     {
      $('#password2_error').html(data.password2_error);
     }
     else
     {
      $('#password2_error').html('');
     }
    }
    if(data.success)
    {
	 $('#cuenta_result').html(data.success);

	 setTimeout(function(){
                location.reload();
            },1000)
	 }
	
	 if(data.failed)
    {
     $('#cuenta_result').html(data.failed);
	 
    }
	if(data.email_exist)
    {
     $('#cuenta_result').html(data.email_exist);
	 
    }
	
	
   $('#sendc').attr('disabled', false);
   },
   error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 $('#cuenta_result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
  })
  });

})
</script>
</body>
	</html>