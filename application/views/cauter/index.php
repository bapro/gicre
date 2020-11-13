<!DOCTYPE html>
<html lang="en">

<head>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<title>Solicitud de cita, Hospital General Regional Dr. Marcelino Vélez Santana</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<style>
.control-label{text-transform:uppercase;font-weight:bold}
.input-group-addon span{height:20px}
</style>
</head>
<?php
$name=($this->session->userdata['cauter_name']);
$medico_id=($this->session->userdata['cauter_id']);


$this->load->view('cauter/header');
?>
<hr style="background:#38a7bb;height:1px"/>
<div class="container" style="background:linear-gradient(to top, #64D991, white);border:1px solid #38a7bb;" >
<div class="col-xs-12">
<a class="btn btn-primary btn-xs" href="<?php echo site_url('cauter/requests');?>">ver las solicitudes</a>
</div>
<div class="col-md-6 col-md-offset-4">

<h2 class="text-uppercase" style="color:green">SOLICITUD DE CITA</h2>
<?php echo $this->session->flashdata('success_msg'); ?>
</div>


<div class="col-md-12">
<hr style="background:#38a7bb;height:1px"/>
<form   class="form-horizontal" id="sendcita" name="myForm" id="myForm" method="post" action="<?php echo site_url('cauter/send_cita_from_out');?>"> 

<div class="tab-content">
<div class="form-group">
<label class="control-label col-sm-5" for="firstname"> Nombres <span class="req">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control required" id="name"  name="name" placeholder="Nombres Apellidos"  >

</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-5"> Cedula <span class="req">*</span></label>
<div class="col-sm-4">                                                       
<input type="text" class="form-control required"  name="cedula" placeholder="00000000000" data-mask="00000000000"  >
</div>
</div>


<div class="form-group">
<label  class="control-label col-sm-5"> Especifique el numero de historial clinico o RECORD (NHC) <span class="req">*</span></label>
<div class="col-sm-2">                                                       
<input type="text" class="form-control required" name="numero" >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-5" for="form_fecha" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-7">
<div class="input-group date form_datetime col-md-6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control required" id="form_fecha" name="fecha"  >
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_field" value="" readonly />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5">Seleccione el turno que desea para la cita</label>
<div class="col-sm-5">
<div class="radio">
<label>
<input type="radio" name="turno" value="Mañana" checked>
Mañana
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="turno" value="Tarde" >
Tarde
</label>
</div>
</div>

</div>
<div class="form-group">

<label class="control-label col-sm-5" >Frecuencia</label>
<div class="col-sm-6">

<div class="radio">
<label>
<input type="radio" name="frecuencia" value="Primera vez" checked>
Primera vez
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="frecuencia" value="Subsecuente" >
Subsecuente
</label>
</div>
</div>
</div>

<div class="form-group">

<label class="control-label col-sm-5" >Seleccione la via por la que desea ser contactado</label>
<div class="col-sm-6">

<div class="radio">
<label>
<input type="radio" name="via" value="Teléfono" checked>
Teléfono
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="via" value="Correo Electronico" >
Correo Electronico
</label>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5" for="form_phoneres">Teléfono residencial </label>
<div class="col-sm-3">
<input type="text" class="form-control" id="form_phoneres" name="tel" >


</div>
</div>						
<div class="form-group">
<label class="control-label col-sm-5" for="form_phonecel">Teléfono celular <span class="req">*</span></label>
<div class="col-sm-3">
<input type="text" class="form-control bfh-phone required"  id="form_phonecel" name="telc"  >


</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5" for="form_email">Correo electrónico <span class="req">*</span></label>
<div class="col-sm-3">
<input id="form_email" type="email" name="email" class="form-control required"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5">Seguro médico</label>
<div class="col-sm-4">
<select name="seguro_medico" id="seguro_medico" class="form-control select2 required" >
<option value="">Seleccione</option>
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->title.'">'.$row->title.'</option>';
}
?>
</select>
</div>
<label>

</div>
<div class="form-group">
<label class="control-label col-sm-5">NSS</label>
<div class="col-sm-4">
<input  type="text" name="nss" class="form-control required"   >
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-5">Causa</label>
<div class="col-sm-5">
<select name="causa"  class="form-control select2 required" >
<option value="">Seleccione</option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->title.'">'.$row->title.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-5">Seleccione la especialidad que desea para la cita</label>
<div class="col-sm-4">
<select name="especialidad"  class="form-control select2 required" >
<option value="" hidden>Seleccione</option>
<?php 

foreach($especialidad as $row)
{ 
echo '<option value="'.$row->title_area.'">'.$row->title_area.'</option>';
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-5">Escribe un breve comentario de su malestar</label>
<div class="col-sm-4">
<textarea  class="form-control required" name="comentario"></textarea>
</div>

</div>
</div>

<div class="col-xs-12 col-md-offset-5"  >
<input type="submit" name="send_citas" class="btn btn-primary btn-send" value="Enviar La Cita ">


</div>
<br/><br/>
</form>
</div>



</div>
<!-- /.container -->
</div>
	<br/><br/>


</html>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?=base_url();?>assets/js/validation-jq.js"></script>
<script>


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




$(document).ready(function () {

    $('.select2').on('change', function () {
        $(this).valid();
    });

     $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   tags: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

    var validator = $("#sendcita").validate();

});
//mask input telephones
document.getElementById('form_phoneres').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.getElementById('form_phonecel').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

//datetimepicker
$('.form_datetime').datetimepicker({
	//language:  'fr',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	forceParse: 0,
	showMeridian: 1,
	format: "dd MM yyyy - hh:ii:s",
	linkField: "mirror_field",
	linkFormat: "yyyy-mm-dd",
});
//-----------------------------------

$('#myCheck').change(function() {
$('#seguro_medico').attr('disabled', this.checked);
$('#seguro_medico').val('');
$("#seguro_input").hide();
});






$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	
</script>

