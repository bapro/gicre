<?php $id_admin=($this->session->userdata['admin_id']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->
<style>

td,th{text-align:left}

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
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
 <hr id="hr_ad"/>
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
<div id="success" class='alert alert-success' style="text-aling:center;display:none">Usuario se guada con exito.</div>
<br/>
<form method="post" id="form_user"  class="form-horizontal" action="<?php echo site_url('admin/SaveUserEdit');?>">
<input class="form-control" value="<?=$row->id_user?>" name="id_user"  type="hidden">
<p style="text-align:center;color:red"  id="errorBox"></p>


<!-- left column -->
<div class="col-sm-6">


<div class="form-group">
<label class="control-label col-sm-4" >Nombres Apellidos</span> <span id="oblig">*</span></label>
<div class="col-sm-7">
<input class="form-control" value="<?=$row->name?>" name="nombre" id="nombre"  type="text">
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" >Nombre usuario</span> <span id="oblig">*</span></label>
<div class="col-sm-7">
<input class="form-control" name="user" id="user" type="text" value="<?=$row->username?>">
</div>
</div>
<?php if($row->perfil=="Auditoria Medica") {?>
<div class="form-group">
<label class="control-label col-sm-4" >Seguro Medico</label>
<div class="col-sm-5">

<select class="form-control select2"  name="seguro">
 
 
 <?php 

foreach($seguro_medico as $rs)
{

if($row->user_ars == $rs->id_sm) {
		echo "<option value=".$rs->id_sm." selected>".$rs->title."</option>";
	} else {
		echo "<option value=".$rs->id_sm.">".$rs->title."</option>";
	}
}
?>
 
 </select>
</div>
</div>
<?php } ?>



<?php if($row->perfil=="Farmacia") {
?>
<div class="form-group">
<label class="control-label col-sm-4" >Farmacia</label>
<div class="col-sm-5">
<?php 
echo $farmacia;

 ?>

</div>
</div>
<?php } ?>


<div class="col-sm-5 col-md-offset-4">

<button type="submit" id="send"  class="btn btn-primary">Cambiar</button>
<br/><br/>
</div>
</div>



</form>

<!-- left column -->
<!--<div class="col-sm-6">

 <div class='alert alert-info'>Acuedase que despues que le cambie recibire un nuevo codigo de securidad </div>
<div class="form-group">
<label class="control-label col-sm-4" >Correo electronico <i style='color:green;display:none' class="fa fa-check-circle"></i></label>
<div class="col-sm-8">

<input class="form-control" name="email" id="email" value="<?=$row->correo?>" type="email" autocomplete="off">
</div>
</div>

<div class="col-sm-5 col-md-offset-4">
<br/>
<button type="button" id="update_email"  class="btn btn-primary" disabled>Cambiar</button>
<br/><br/>
</div>
</div>-->

<div class="col-md-3">

<a style="color:red;" href="<?php echo site_url("admin_medico/changePassw/$id_user/$id_cu_us");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
 

</div>


</div>
</div>

</div>
<br/><br/>
 <?php 
 
 
        $this->load->view('footer');


 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 

$('#send').click(function(e) {
var nombre = $("#nombre").val();
var user = $("#user").val();

if($("#nombre").val() == "" ){
$("#nombre").focus();
$('#nombre').css('border-color', 'red'); 
$("#errorBox").html("Ingrese los nombres");
return false;
} 
if($('#user').val() == ""){
$("#user").focus();
$('#user').css('border-color', 'red'); 
$("#errorBox").html("Ingrese el nombre de usuario");
return false;
}

});


$('#nombre').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );

}   
});



$('#user').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );
}   
});

$('.select2').select2({ 
   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	

//----------------------------------------------------------------------------------------------

$('#email').keyup(function() {
var email= $("#email").val();
var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
if (testEmail.test(email)){
	$('#update_email').prop("disabled",false);
	
} 
	else {
$('#update_email').prop("disabled",true);
}
	

})


$('#update_email').click(function() {
var email= $("#email").val();
var user_name="<?=$row->name?>";
var id_user="<?=$row->id_user?>";
	$.ajax({
type: "POST",
url: "<?=base_url('admin/change_email')?>",
data: {email:email,user_name:user_name,id_user:id_user},
 
success:function(data){ 
$('.fa-check-circle').slideDown();
$('#update_email').prop("disabled",true);
},  
})
})
 </script>

</html>