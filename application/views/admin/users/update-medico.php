<style>
.active {
    color: green;
	 text-decoration: underline;
	 text-decoration-color: green;
}
</style>
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->
<style>

td,th{text-align:left}

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
 if($user==1){
        $this->load->view('admin/header_admin');
 }else{
	$this->load->view('seller/header'); 
 }
 

 ?>
<body  >

 <div class="container" id="background_">
   <div id="show-errorse"></div>
 <div class="row">
 <div class="col-md-9">
 </div>
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
 </div>
  
 </div>
 

<?php foreach($editUser as $row)

?>

 <?php echo $this->session->flashdata('success_msg');?>
<div class="col-md-9"><h3   class="h3">Información del usuario</h3></div>

<div class="col-md-3">

<a style="color:red;display:<?=$hide?>" href="<?php echo site_url("admin_medico/changePassw/$id_user/$id_cu_us");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
 

</div>

<div id="success" class='alert alert-success' style="text-aling:center;display:none">Usuario se guada con exito.</div>
<br/>

<div class="col-md-12 show_centro" >
<p style='color:black'>
<?php
$user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->insert_date));
$updated_time = date("d-m-Y H:i:s", strtotime($row->update_date));
echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)";
?>
</p>
<form   class="form-horizontal"  method="post" id="form_doc" action="<?php echo site_url('admin_medico/saveDoctorUpdate');?>" enctype="multipart/form-data"> 
<br/>
<div class="row">

<input class="form-control" value="<?=$row->id_user?>" name="id_user" id="id_user"  type="hidden">
<div class="form-group">
<label class="control-label col-sm-3" >Perfil</label>
<div class="col-sm-2">
<input class="form-control" value="<?=$row->perfil?>" name="perfil"  type="text" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Pago por paypal - Cuenta Gratis</label>
<div class="col-sm-6">
<table style='width:100%;border:1px solid #38a7bb;'>
<tr style='background:white'>
<td style='text-align:left;font-size:14px;'>
<?php

if($row->cuenta_gratis==1){
$checked1='checked';
$disagr='disabled';	
$ifpayc='Cuenta no ha pagado';
}else{
$checked1='';	
$ifpayc='';
}

if($row->cuenta_gratis==0){
$checked='checked';
$disagr='';	
}else{
$checked='';	

}


if($row->payment_plan >0 && $row->cuenta_gratis==1){
$product=$this->db->select('plan,precio')->where('id',$row->payment_plan)->get('medico_precio_plan')->row_array();
$plan=$product['plan'];$precio=$product['precio'];
$ifpay="Plan: $plan $$precio USD";	
$ifpayc='';
$checked='checked';
}else{
$ifpay='';	


}
?>
&nbsp;<input type="radio" name="plan-gratis" class='plan-gratis' value='0' <?=$checked?> <?=$disagr?>> <label>si</label>
&nbsp;<input type="radio" name="plan-gratis" class='plan-gratis' value='1' <?=$checked1?> <?=$disagr?>> <label>no</label>
</td> 
<td style='text-align:left;color:green' id='send-email'><?=$ifpay?> <?=$ifpayc?></td>
</tr>
</table>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Pago por otro medio - Cuenta Gratis</label>
<div class="col-sm-6">
<table style='width:100%;border:1px solid #38a7bb;'>
<tr style='background:white'>
<td style='text-align:left;font-size:14px;'>
&nbsp;<input type="radio" name='other-means' class='other-means' value='0' <?=$checked?> <?=$disagr?>> <label>si</label>
&nbsp;<input type="radio" name='other-means' class='other-means' value='1' <?=$checked1?> <?=$disagr?>> <label>no</label>
</td> 
<?php
if($row->cuenta_gratis==1){
$disedit='';

}else{
$disedit='none';	

}
?>
<td style="color:red;display:<?=$disedit?>"> 

<a  href="#" data-toggle="modal"   data-target="#myModalPay" ><i class="fa fa-pencil"></i>  Editar</a>
 </td> 
</tr>
</table>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Nombres Apellidos</label>
<div class="col-sm-5">
<input class="form-control required" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" >
</div>
</div>

<div class="form-group" >
<label class="control-label col-sm-3" >Firma</label>
<div class="col-sm-5">
 <?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  class="img-fluid" style="border:1px solid #38a7bb;width:30%" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {
echo "No tiene firma";
}
?>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Sello</label>
<div class="col-sm-3">
<?php 
$sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='0'><i> Quita El Sello</i></a><br/>
<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {?>

<input type="file" name="selloimage" id="file_m_enf" class="file_m_enf form-control" onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg"  >
 <img id="output_image" class='rezise-load-image' />
<?php
}
?>
</div>
</div>

<div class="form-group" >
<label class="control-label col-sm-3" >Logo Tipo</label>
<div class="col-sm-3">

<?php 
$logo_tipo=$this->db->select('sello')->where('doc',$id_user)->where('dist',1)->get('doctor_sello')->row('sello');

if ($logo_tipo) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='1'><i> Quita El Logo Tipoo</i></a><br/>
<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $logo_tipo; ?>"  />
<?php
} else {?>

<input type="file" name="logo-tipo" id="logo-tipo" class="logo-tipo form-control" onchange="preview_logo_tipo(event)"   accept=".png, .jpg, .jpeg"  >
  <img id="output_logo_tipo" class='rezise-load-image' />
 
<?php
}
?>
</div>
</div>








<div class="form-group">
<label class="control-label col-sm-3" >Cedula</label>
<div class="col-sm-3">
<input type="text" class="form-control required" id="cedula"  name="cedula" value="<?=$row->cedula?>"  >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Exequatur</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="exequatur"  name="exequatur" value="<?=$row->exequatur?>" disabled >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-3">
<select class="form-control select2"    name="especialidad">
<?php
foreach($especialidades as $esp){
	
	if($row->area == $esp->id_ar) {
		echo "<option value=".$esp->id_ar." selected>".$esp->title_area."</option>";
	} else {
		echo "<option value=".$esp->id_ar.">".$esp->title_area."</option>";
	}
}
?>
 </select>
 
 </div>
 </div>
<div class="form-group" id="second">
<label class="control-label col-sm-3">Seguro médico</label>
<div class="col-sm-7">
<input type="checkbox" id="checkbox2" checked> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $rs)
{
$id_doctor=$this->db->select('id_doctor')->where('id_doctor',$row->id_user)
 ->where('seguro_medico',$rs->id_sm)
 ->get('doctor_seguro')->row('id_doctor');
		if($row->id_user==$id_doctor){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$rs->id_sm.' $selected>$rs->title</option>";
}
?>
</select>
</div>
</div>

 <div class="form-group" >
<label class="control-label col-sm-3" >Correo electronico</label>
<div class="col-sm-4">
<input  class="form-control email-clear required" id="email" style="text-transform:lowercase"  name="email" value="<?=$row->correo?>" type="email" autocomplete="off" >
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
 <div class="row  col-sm-offset-3" >
<button type="submit" id="send"  class="btn btn-primary">Guardar</button> 
<br/><br/>
</div>
 <div class="row" >
  <hr id="hr_ad"/>
 <div class="col-md-8" >
  <h4   class="h4">Haga un clic sobre el centro medico para editar su agenda</h4>
<div style="overflow-x:auto;">
<?php
$sql ="SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id_user group by id_centro";
$query= $this->db->query($sql);
?>
<table  class='table table-striped' id="Navigation">
<tr> 
<?php
foreach ($query->result() as $rowct){
	$centro= $this->db->select('name')->where('id_m_c',$rowct->id_centro)->get('medical_centers')->row('name');
	?>
<td>
<i id='<?=$rowct->id_centro?>' style="cursor:pointer;color:red" title="quitar este centro medico" class="fa fa-remove delete-centro"></i>
 <a style='cursor:pointer' id="<?php echo $rowct->id_centro?>" class="select-centro"><?=$centro?></a></td>
<?php
}

?>
</tr>
</table>
 </div>
  </div>
<div class="col-md-4">
 <h4   class="h4">Seleccionar el centro medico para crear su agenda</h4>
 
<select class="form-control select3" id="centroSelect">
<option value=''>Seleccionar</option>
<?php 
 $sql2 ="SELECT id_m_c, name FROM medical_centers WHERE id_m_c NOT IN (SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id_user group by id_centro)";
    $query2 = $this->db->query($sql2);
foreach ($query2->result() as $rowcent)
{
echo "<option value='$rowcent->id_m_c'>$rowcent->name</option>";
}	

?>
</select>
</div>
 </div>
  <div id="load-agenda"> </div>
</div>

</form>

</div>
</div>
<hr/>

 <?php 
 
        $this->load->view('footer');


 ?>
 
 
 <div class="modal fade" id="sello"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
<div class="content" >
  <div class="container">
 <div id="uploadPreview"></div>
 <div class="col-md-4">

<form method="post" id="uploadimgenf" class='form-horizontal' enctype="multipart/form-data">
<div class="form-group ">
<label class="control-label">SUBIR SELLO</label>
<input type="file" name="selloimage" id="file_m_enf" class="file_m_enf form-control"   accept=".png, .jpg, .jpeg"  >
<input type='hidden' name='doc' value="<?=$id_user?>"/>
<br/>
<button type="submit" id="btn-send-ac" style='display:none'  class="btn btn-primary btn-sm hide-btn-sello" >Guardar</button>
<em id='guardando'></em>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 
 
 
 
 	<div class="modal fade" id="myModalPay" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Una vez que médico pague por otro medio aplica su plan de pago en el sistema para que el pueda loguearse</h4>
 </div>

<div class="modal-body" style=" " >
<form method="post" class="form-horizontal" action="<?php echo site_url('admin/payByOtherMeans');?>">

<div class="form-group">
<label class="control-label col-sm-2">ELEGIR PLAN DE PAGO</label>
<div class="col-sm-8">
<input name='this-doc-plan' value="<?=$id_user?>" type='hidden'/>
<table style='width:100%;border:1px solid #38a7bb;'>
<?php 
$sqlot="SELECT * FROM medico_precio_plan ORDER BY precio ASC";
$querysqlot=$this->db->query($sqlot);
foreach($querysqlot->result() as $rowot)
{
	if($rowot->id==$row->payment_plan){
	$checkedot='checked';	
	}else{
	$checkedot='';	
	}
?>
<tr>
<td style='text-align:left;font-size:14px;background:white'>&nbsp;<input type="radio" name="plan-pago" <?=$checkedot?> value='<?=$rowot->id?>'> <label><?=$rowot->plan?> </label></td> <td style='font-size:14px;background:white'><label>$<?=$rowot->precio?> USD</label></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<button type="sumbmit" class="btn btn-primary btn-xs" disabled id='disabled-plan-btn'> Enviar</button>

</div>
<br/>
</div>

</form>

</div>
</div>
</div>
</div>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<script> 
checkIfPlan();
function checkIfPlan(){
if ($('input:radio[name="plan-pago"]').is(':checked')) {
           $("#disabled-plan-btn").prop('disabled',false);
        }else{
		 $("#disabled-plan-btn").prop('disabled',true);	
		}
}


$('input:radio[name="plan-pago"]').change(
    function(){
        if ($(this).is(':checked')) {
           $("#disabled-plan-btn").prop('disabled',false);
        }
    });
	
	
	$('input:radio[name="other-means"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 1) {
           $("#myModalPay").modal('show');
        }
    });
//------------------------------------------------------------------------------------------------
 $(".plan-gratis").change(function(){

        var selValue = $("input[type='radio']:checked").val();
         if(selValue==1){
		$.ajax({
		type: "POST",
		url: "<?=base_url('admin_medico/emailUserToPay')?>",
		data: {id:<?=$id_user?>,email:"<?=$row->correo?>",plan:selValue},
		success:function(data){ 
		$("#send-email").html('correo enviado al medico para eligir su plan de pago'); 
		$(".plan-gratis").prop('disabled',true);
		},
		error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-errorse').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
		});
		 }

    });




$(".remove-logo-tipo-o-sello").click(function(){
if (confirm("Lo quire quitar ?"))
{ 
var answerid = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/removeSello')?>',
data: {id : <?=$id_user?>,answerid:answerid},
success:function(response) {

location.reload();
 
}
});
}
})



function preview_sello(event) 
{
 var reader = new FileReader();
  var size=$('#file_m_enf')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
  $('#output_image').show();	
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#file_m_enf').val('');
 $('#output_image').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}


function preview_logo_tipo(event) 
{
 var reader = new FileReader();
  var size=$('#logo-tipo')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_logo_tipo');
  output.src = reader.result;
  $('#output_logo_tipo').show();	
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#logo-tipo').val('');
 $('#output_logo_tipo').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}

//-----------------------------------------------------------------------------------------


$(document).on('click','.thumb',function(e) {
   // $(this).prev().remove();
    $(this).remove();   
     $('#file_m_enf').val(''); 
$('#btn-send-ac').hide();	 
});

function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var w = this.width,
          h = this.height,
          t = file.type, // ext only: // file.type.split('/')[1],
          n = file.name,
          s = ~~(file.size/1024) +'KB';
      $('#uploadPreview').append('<img style="width:250px" src="' + this.src + '" class="thumb">');
	 // alert(s);
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };      
  };

}
$("#file_m_enf").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }

  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
	  $('#btn-send-ac').show();
	  // $('#file_m_enf').prop('disabled',true);
    }
  }
});






//$('.select-centro').on('click', function(){$(this).css("background-color","yellow");});
var a = document.getElementById('Navigation').getElementsByClassName('active');

$('#Navigation').on('click', 'a', function() {
    if (a[0]) a[0].className = '';
    this.className = 'active';
});



$(".select-centro").click(function(){
var idcentro = $(this).attr('id');
var iddoc = $("#id_user").val();
$("#load-agenda").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro},
cache: true,
success:function(data){ 
$("#load-agenda").html(data); 

}  
});
});



$("#centroSelect").change(function(){
$("#Navigation").find("a").removeClass("active");
var idcentro =$(this).val();
var iddoc = $("#id_user").val();
$("#load-agenda").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro},
cache: true,
success:function(data){ 
$("#load-agenda").html(data); 

}  
});


});

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


var validator = $("#form_doc").validate();

$('.select2').on('change', function () {
$(this).valid();
});	
$('.select2').select2({ 
placeholder: "SELECCIONAR"

});


$('.select3').select2({ 
placeholder: "SELECCIONAR EL CENTRO MEDICO"

});

$("#checkbox2").click(function(){
if($("#checkbox2").is(':checked') ){
$("#e2 > option").prop("selected","selected");
$("#e2").trigger("change");
}else{
$("#e2 > option").removeAttr("selected");
$("#e2").trigger("change");
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
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email2, function( data ){
$( "#emailInfo" ).html( data ); 
$( "#emailInfo" ).show(); 		   
});
}
};
/*setTimeout(function(){
	 $('html, body').animate({
        scrollTop: $("#second").offset().top
    }, 2000);
	},4000
	);*/
	$(".delete-centro").click(function(e){
	e.preventDefault();
	if (confirm("Seguro de borrar ?"))
			{ 
		var id_doctor  = "<?=$id_user?>";
	var el = this;
	
   var del_id = $(this).attr('id');

    $.ajax({
            type:'POST',
            url:'<?=base_url('admin_medico/DeleteDocCentroAgenda')?>',
            data: {iduser:id_doctor,centro_medico:del_id},
            success:function(data) {
	$(el).closest('td').css('background','tomato');
    $(el).closest('td').fadeOut(800, function(){ 
     $(this).remove();
    });

	  }
    });
 };
 });
	

</script>

</html>