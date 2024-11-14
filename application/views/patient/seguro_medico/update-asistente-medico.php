 <div class="container">
 

<?php foreach($editUser as $row)

?>

 <div class="row"  id="background_">
  <div class="col-md-9">
 </div>
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
 </div>
 <?php echo $this->session->flashdata('success_msg');?>

<div class="col-md-8">
<h3   class="h3">CAMBIAR USUARIO</h3>
</div>


<div class="col-md-4" style='color:black'>

<?php
$user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->insert_date));
$updated_time = date("d-m-Y H:i:s", strtotime($row->update_date));
echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)";
?>
</div>
<div class="col-md-9">
<form class="form-inline"  >

  <button class='btn btn-primary btn-sm"' style='font-size:9px' type='button' id='generarCont'>Generar</button>
   <input id="pass1"  style="width:190px" type="password" class="form-control new-pass" >

   <input id="pass2" style="width:190px" type="password" class="form-control new-pass" >
     <button  class="btn btn-default btn-sm" type="button" id="verPassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
   <button  class="btn btn-success btn-sm" type="button" id="savePassw" >Cambiar</button>
 </form>
 <span style="color:red" id="passwordResult"></span>
 <hr/>
 <h4>Agregar Datos Por Web Service </h4>

<div class="form-group" >
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7">
<select class="form-control select2"   id="centro_medico_web" >
<?php
foreach($centro_medico as $ce){

echo "<option value=".$ce->id_m_c.">".$ce->name."</option>";
	
}
?>

 </select>
 </div>
 </div>
  <br/>
 <div class="form-group">
<label class="control-label col-sm-3">Seguro medico</label>
<div class="col-sm-7">
 
<select class="form-control select2" id="seguroWeb">
<option value=""></option>
<?php 

foreach($seguro_medico as $rs)
{

echo "<option value='$rs->id_sm'>$rs->title</option>";
}
?>
</select>
 </div>
 </div>
 <br/>
 <div class="form-group">
<label class="control-label col-sm-3">Contraseña</label>
<div class="col-sm-7">
 
<input type="text" id="passSegWeb" class="form-control" placeholder="Contraseña Del Seguro Medico" />
 </div>
 <button type="button" style='font-size:12px' id='btnSavePasSeg' class="btn btn-default btn-sm">Guardar</button>
 </div>


<span style="color:red;float:right" id="saveWebResult"></span>
<hr/>
 
 
 
 </div>
  <div class="col-md-12"><h4>Datos Del Usuario</h4> </div>
<form   class="form-horizontal"  method="post" id="form_doc" action="<?php echo site_url('admin_medico/saveAsDoctorUpdate');?>" > 

<div class="col-sm-6">

<!--<a style="color:red;display:<?=$hide?>" href="<?php echo site_url("admin_medico/changePassw/$id_user/$id_cu_us");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>-->
 <br/> <br/>
<input class="form-control" value="<?=$row->id_user?>" name="id_user" id="id_user"  type="hidden">
<div class="form-group">
<label class="control-label col-sm-3" >Perfil</label>
<div class="col-sm-6">
<input class="form-control" value="<?=$row->perfil?>" name="perfil"  type="text" disabled>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Nombres Apellidos</label>
<div class="col-sm-7">
<input class="form-control" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" disabled>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Cédula </label>
<div class="col-sm-3">
<input type="text" class="form-control" id="cedula"  name="cedula" value="<?=$row->cedula?>" disabled >
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3">Centro médico</label>
<div class="col-sm-9">
<input type="checkbox" id="checkbox3"  checked> Seleccionar todo
<select class="form-control select2 required" id='e3' multiple="multiple"  name="centro_medico[]">
<?php 

foreach($centro_medico as $rc)
{
$id_doctorc=$this->db->select('id_doctor')->where('id_doctor',$row->id_user )
 ->where('centro_medico',$rc->id_m_c)
 ->get('doctor_centro_medico')->row('id_doctor');
		if($row->id_user==$id_doctorc){
		        $selected="selected";
		} else {
		       $selected="";
	    } 
echo "<option value='$rc->id_m_c.' $selected>$rc->name</option>";
}
?>
</select>
</div>
</div>



<div class="form-group" >
<label class="control-label col-sm-3">Médico</label>
<div class="col-sm-9">
<input type="checkbox" id="checkbox33" checked> Seleccionar todo
<select class="form-control select2 required" id='e33' multiple="multiple"  name="medico[]">

</select>
</div>
</div>






 </div>	
 <div class="col-sm-6">
 <div class="form-group" >
<label class="control-label col-sm-3" >Correo electronico</label>
<div class="col-sm-7">
<input  class="form-control email-clear"  id="email"  name="email"  value="<?=$row->correo?>" type="email" autocomplete="off" >
<div id="emailInfo"></div>
</div>
</div>



<div class="form-group">
<label class="control-label col-sm-3">Telefono celular</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="primer_tel" name="primer_tel" value="<?=$row->cell_phone?>" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Extension</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="extension" name="extension"  value="<?=$row->extension?>" disabled >
</div>
</div>



</div>
 <div class="col-sm-12">
<button type="submit" id="send"  class="btn btn-primary">Guardar</button> 
<br/><br/>
</div>

</form>

</div>
</div>
</div>
<hr/>
<?php 
 
$this->load->view('footer'); 

$data['id_cu_us']=$id_user;
$data['perfil']=$row->perfil;
 
 ?>



  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
 <?php $this->load->view('admin/users/footer-web-service-password', $data); ?>
<script> 

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
url:"<?php echo base_url(); ?>admin/newPasswordAsitente",
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
$(".new-pass").val("");
}
} 
});
});




$("#e3").on('change', function () {
load_center_medico($(this).val());
$('#checkbox33').prop('checked', false);
});

load_center_medico($('#e3').val());
function load_center_medico(id){
	$.ajax({
type: "POST",
url: "<?=base_url('admin/get_centro_medico2')?>",
data: {id_centro:id,id_user:<?=$row->id_user?>},
success:function(data){ 
$("#e33").html(data); 
},  
});
	
}



  $('#send').click(function(e) {
if($("#email").val() == "" ){
   $("#email").focus();
   $('#email').css('border-color', 'red'); 
   return false;
  }
  });	
	  $('.select2').select2({ 
  placeholder: "SELECCIONAR",
    tags: true

});

$("#checkbox3").click(function(){
    if($("#checkbox3").is(':checked') ){
        $("#e3 > option").prop("selected","selected");
        $("#e3").trigger("change");
    }else{
        $("#e3 > option").removeAttr("selected");
         $("#e3").trigger("change");
     }
});



$("#checkbox33").click(function(){
    if($("#checkbox33").is(':checked') ){
        $("#e33 > option").prop("selected","selected");
        $("#e33").trigger("change");
    }else{
        $("#e33 > option").removeAttr("selected");
         $("#e33").trigger("change");
     }
});








var timer = null;
$("#email").keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_email_exist2, 1000)
});

function check_if_email_exist2(){
var email2= $("#email").val();
if(email2 == "") {
$("#emailInfo").hide();
}else {
$.get( "<?php echo base_url();?>admin/check_if_email_exist?email="+email2, function( data ){
$( "#emailInfo" ).html( data ); 
$( "#emailInfo" ).show(); 		   
});
}
};

 </script>
   </body>
</html>