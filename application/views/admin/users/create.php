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
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
 <div class="container" >
 <h3   class="h3">REGISTRAR USUARIO</h3>
   <div class="col-md-3" style='border-top:7px solid #E0E5E6'>

 <h4>Selecciona un perfil:</h4>
   <div class="radio">
   <label>
      <input type="radio" class="id_radio1" name="perfil" value="Admin" checked> Admin
	   </label>
    </div>
	 <div class="radio">
	 <label>
      <input type="radio" class="id_radio2" name="perfil" value="Medico"> Medico
	   </label>
    </div>
	    <div class="radio">
		<label>
      <input type="radio" class="id_radio2" name="perfil" value="Asistente Medico">Asistente Medico
	   </label>
  </div>
	
	 <div class="radio">
	 <label>
      <input type="radio" class="id_radio1" name="perfil" value="Auditoria Medica">Auditoria Medica
	   </label>
   </div>
	 <div class="radio">
	 <label>
      <input type="radio" class="id_radio1" name="perfil" value="Vendedor">Vendedor
	   </label>
   </div>
	
	 <div class="radio">
	 <label>
      <input type="radio" class="id_radio1" name="perfil" value="Farmacia">Farmacia
	   </label>
    </div>
	
	 <div class="radio">
	 <label>
      <input type="radio" class="id_radio1" name="perfil" value="Estudios">Estudios
	   </label>
  </div>
	
	<div class="radio">
	<label>
      <input type="radio" class="id_radio1" name="perfil" value="Técnico de lentes">Técnico de lentes
	  </label>
    </div>
	<div class="radio">
	<label>
      <input type="radio" class="id_radio1" name="perfil" value="Optómetra">Optómetra
	  </label>
    </div>

 </div>
    <div class="col-md-9" id="background_">
 <div id="div1">
<form method="post" id="form_user"  class="form-horizontal" action="<?php echo site_url('admin/SaveUser2');?>">

<h3 style="text-align:center;color:red"  id="errorBox"></h3>

<div class="form-group ">
<!-- left column -->
<div class="col-sm-12">
<?php echo $this->session->flashdata('success_msg_create_user'); ?>

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2" >Perfil</span></label>
<div class="col-sm-3">
<input class="form-control perfil1" name="perfil1" style="pointer-events:none" type="text" value="Admin" >
</div>
</div>

<div class="form-group show-area-optometra" style="display:none" >
<label class="control-label col-sm-2" >Area</span></label>
<div class="col-sm-3">
<input class="form-control" name="area" style="pointer-events:none" type="text" value="Optómetra" >
</div>
</div>


<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2" >Nombres Apellidos</label>
<div class="col-sm-4">
<input class="form-control required"  name="nombre1" id="nombreuser"  type="text">
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2" >Correo electronico</label>
<div class="col-sm-4">
<input  class="form-control required email-clear" name="email" id="email" type="email" >
<div id="emailInfo"></div>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" >Telefono</label>
<div class="col-sm-4">
<input  class="form-control" name="phone" id="phone" type="text" >
</div>
</div>

<div class="show-farmacia" style="display:none">
<div class="form-group" >
<label class="control-label col-sm-2" >Seleccionar la farmacia</label>
<div class="col-sm-5">
<select class="form-control select2 required"  name="farmacia"  id="farmacia">
 <option value="" hidden></option>
 <?php 
	$sql ="SELECT id, noma FROM drug_stores";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->noma.'</option>';
 }
 ?>
 </select>
</div>



</div>

</div>
<div class="show-tecnico-de-lente" style="display:none">
<div class="form-group" >
<label class="control-label col-sm-2" >Seleccionar laboratorio de lentes</label>
<div class="col-sm-5">
<select class="form-control select2 required"  name="tecnico-de-lente"  id="tecnico-de-lente">
 <option value="" hidden></option>
 <?php 
	$sql ="SELECT id, nombre_comercial FROM labo_lentes";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->nombre_comercial.'</option>';
 }
 ?>
 </select>
</div>



</div>

</div>


<div class="show-estudios" style="display:none">
<div class="form-group" >
<label class="control-label col-sm-2" >Seleccionar el estudio</label>
<div class="col-sm-5">
<select class="form-control select2 required"  name="estudio"  id="estudio">
 <option value="" hidden></option>
 <?php 
	$sql ="SELECT id, nombre_comercial FROM estudios";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->nombre_comercial.'</option>';
 }
 ?>
 </select>
</div>



</div>

</div>


<div class="form-group show-seguro" style="display:none" >
<label class="control-label col-sm-2" >Seleccionar el Seguro Medico</label>
<div class="col-sm-5">
<select class="form-control select2 required"  name="seguro"  id="seguro">
 <option value="" hidden></option>
 <?php 

 foreach($seguros as $row)
 { 
 echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
 }
 ?>
 </select>
</div>

</div>
<button type="reset" class="btn btn-default" id="newConsigneeReset">Reiniciar</button>
<button type="submit" id="send"  class="btn btn-primary">Crear registro</button>
<br/><br/>
</div>

</form>
</div>
</div>
<div id="div2"></div>
</div>
</div>
</div>
<hr/>

 <?php 
 
 
        $this->load->view('footer');


 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
<script type="text/javascript"> 


$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    //	validClass: 'stay',
	
    highlight: function (element, errorClass, validClass) {
        $(element).addClass(errorClass); //.removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass(errorClass); //.addClass(validClass);
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        }
    
		else {
            error.insertAfter(element);
        }
    }
});
$(document).ready(function() {
	
	
	  var validator = $("#form_user").validate();
	  
	  
	  
	  
	  
$('.id_radio1').click(function () {
var perfil = $('input:radio[name=perfil]:checked').val();

$('#div2').hide('fast');
$('#div1').show('fast');
$('.perfil1').val(perfil);
if(perfil=="Auditoria Medica"){
$('.show-seguro').show('fast');
} else {
	$('.show-seguro').hide('fast');
}

if(perfil=="Farmacia"){
$('.show-farmacia').show('fast');
} else {
	$('.show-farmacia').hide('fast');
}

if(perfil=="Estudios"){
$('.show-estudios').show('fast');
} else {
	$('.show-estudios').hide('fast');
}

if(perfil=="Técnico de lentes"){
$('.show-tecnico-de-lente').show('fast');
} else {
	$('.show-tecnico-de-lente').hide('fast');
}
if(perfil=="Optómetra"){
$('.perfil1').val('Medico');
$('.show-area-optometra').show('fast');
} else {
	$('.show-area-optometra').hide('fast');
}
 


});


$('.id_radio2').click(function () {
$('#div1').hide('fast');
$("#div2").fadeIn().html('<span style="text-align:center"> <img   src="<?= base_url();?>assets/img/loading.gif" /></span>');
var perfil = $('input:radio[name=perfil]:checked').val();
var cont='admin';
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/get_doc_user_form')?>",
data :{perfil:perfil,cont:cont},
cache: true,
success:function(data){
$('#div2').show('fast');	
$('#div2').html(data); 
$('.savethisperfil').val(perfil);
}  
});
});	
	
//----------------------------------------------------------	
$('#pass2').bind("cut copy paste",function(e) {
e.preventDefault();
});



 
//---------------------------------------------------
$('#send').click(function(e) {
var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
 if(pass1 != pass2){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBox").html("Las contraseñas no coinciden");
return false;
}

});



});

var timer = null;
$("#email").keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_email_exist, 1000)
});

function check_if_email_exist(){
var email= $("#email").val();
if(email == "") {
$("#emailInfo").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email, function( data ){
$( "#emailInfo" ).html( data ); 
$( "#emailInfo" ).show(); 		   
});
}
};


//$('#form_user').on('submit', function(event) {
//	alert("El usuario se guarda con exito !");
//});



$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});



//--------------------------------------------------

 </script>

</html>