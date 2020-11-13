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
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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

<form   class="form-horizontal"  method="post" id="form_doc" action="<?php echo site_url('admin_medico/saveAsDoctorUpdate');?>" > 
<br/>
<div class="col-sm-6">
<a style="color:red;display:<?=$hide?>" href="<?php echo site_url("admin_medico/changePassw/$id_user/$id_cu_us");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
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
<label class="control-label col-sm-3" >Cedula</label>
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
   </body>
 <?php 
 
        $this->load->view('footer');


 ?>



        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script> 

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

</html>