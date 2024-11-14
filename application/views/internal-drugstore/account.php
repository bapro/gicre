<div class="container">
  <div class="row">
   
 <div class="col-md-12">
 <div class="col-md-9">
</div>
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
</div>
  
 </div>
 

</div>

<?php foreach($editUser as $row)

?>

<h3   class="h3">CAMBIAR USUARIO <?=$row->perfil?></h3>
<div style="color:red" id="errorBox"></div>
<div class="col-xs-12 "  id="background_">
<p style='color:black'>
<?php
$user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($row->insert_date));
$updated_time = date("d-m-Y H:i:s", strtotime($row->update_date));

echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)";
?>
</p>
<div class="col-md-9">
<form method="post" id="form_user"  class="form-horizontal">
<input class="form-control" value="<?=$row->id_user?>" name="id_user"  type="hidden">
<input class="form-control" value="<?=$id_cu_us?>" name="id_operator"  type="hidden">
<p style="text-align:center;color:red"  id="errorBox"></p>

<div class="form-group">
<label class="control-label col-sm-4" >Nombres Apellidos <span id="oblig">*</span></label>
<div class="col-sm-7">
<input class="form-control" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" >Tele. Celular</label>
<div class="col-sm-7">
<input class="form-control" value="<?=$row->cell_phone?>" name="cell_phone" id="cell_phone"  type="text" >
</div>
</div>




<div class="form-group">
<label class="control-label col-sm-4" >Correo Elec.<span id="oblig">*</span></label>
<div class="col-sm-7">
<input class="form-control" name="user" id="user" type="text" value="<?=$row->correo?>" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Centro Medico<span id="oblig">*</span></label>
<div class="col-sm-7">

<select class="form-control select2"  style="width:100%" name="centro" id="centro" >
<?php 

foreach($centro_medico as $ce){
	
	if($id_centro == $ce->id_m_c) {
		echo "<option value=".$ce->id_m_c." selected>".$ce->name."</option>";
	} else {
		echo "<option value=".$ce->id_m_c.">".$ce->name."</option>";
	}
	}
 ?>



 </select>
</div>
</div>
<div class="col-sm-5 col-md-offset-4">

<button type="submit" id="saveData"  class="btn btn-success btn-sm">Guardar</button>
<br/><br/>
<div id="saveDataInfo"></div>
</div>
</form>
</div>
<div class="col-md-9 col-md-offset-3">
<br/>
<form class="form-inline"  >
<label class="control-label" >Cambiar Contrasena</label><br/>
  <button class='btn btn-primary btn-sm"' style='font-size:9px' type='button' id='generarCont'>Generar</button>
   <input id="pass1"  style="width:190px" type="password" class="form-control new-pass" >

   <input id="pass2" style="width:190px" type="password" class="form-control new-pass" >
     <button  class="btn btn-default btn-sm" type="button" id="verPassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
   <button  class="btn btn-success btn-sm" type="button" id="savePassw" >Guardar</button>
     <span style="color:red" id="passwordResult"></span>
 </form>

<br/><br/>
</div>
</div>
</div>

</div>
<br/><br/>
 <?php 
 
 
        $this->load->view('footer');


 ?>


  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 

$('.select2').select2({ 


});



 $('#verPassword').click(function() {
   $(this).children().toggleClass('fa fa-eye fa fa-eye-slash ');
	$('.new-pass').prop('type', $('.new-pass').prop('type') === 'password' ? 'text' : 'password');
  });

function random_password_generate(max,min)
{
    var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#@!%&()/";
    var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
    var randPassword = Array(randPwLen).fill(passwordChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
    return randPassword;
}
  
 $("#generarCont").on('click', function(event) {   
 $(".new-pass").val(random_password_generate(16,8));
});



$("#savePassw").on('click', function(event) {
event.preventDefault();
var pass1 =$("#pass1").val();
var pass2 =$("#pass2").val();
$.ajax({
url:"<?=$updated_password?>",
data: {pass1:pass1,pass2:pass2,id_user:<?=$id_cu_us?>,id_table:<?=$id_user?>},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status == 0){
$('#passwordResult').html('<p class="alert alert-danger ">'+response.message+'</p>');
}else if(response.status == 2){
	$('#passwordResult').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else{
$('#passwordResult').html('<p class="alert alert-success">'+response.message+'</p>');
setTimeout(function(){
window.location.href = '<?php echo site_url('login/medico_logout');?>/'
}, 3000);
}
} 
});
});



  $("#form_user").on('submit', function(e){
	   e.preventDefault();
	
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>creation/saveUserEdit',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#saveData').attr("disabled","disabled");
               
            },
            success: function(response){ //console.log(response);
                $('#saveDataInfo').html('');
                if(response.status == 1){
                $('#saveDataInfo').html('<p class="alert alert-success">'+response.message+'</p>');
					   location.reload();
                } else if(response.status == 2){
				       $('#saveDataInfo').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#saveDataInfo').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                 $("#saveData").removeAttr("disabled");
		
            },
			
        });  
	
	});	
 </script>
   </body>
</html>