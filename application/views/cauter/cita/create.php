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
<a class="btn btn-primary btn-xs" href="<?php echo site_url('cauter/appointments');?>">ver los citas</a>
</div>
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h1 class="h1 hide_crear_nueva_cita" style="color:green;text-align:center">Crear Nueva Cita</h1>
<hr id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
 
 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('cauter/save_patients_appointments');?>" > 
 <input  type="hidden" name="creadted_by"   value="<?=$name?>"  >

<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div  id="Datos_personales" class="cita-border"> 
<h4 class="cita-title">I- DATOS PERSONALES</h4>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control required" placeholder="Nomres Apellidos" id="nombre" name="nombre"   >
<span class="required-text"></span>
</div>

</div>

<div class="form-group">
<label  class="control-label col-sm-3"> Cedula/Pasaporte</label>
<div class="col-sm-6">
<input  type="text" class="form-control required" id="cedula" name="cedula"  placeholder="000000000000" data-mask="000000000000"   ></div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-7" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date form_datetime col-md-8 "  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control required" data-name="display_age"  onchange="display_age()" id="date_nacer" name="date_nacer" value="01 Enereo 2010" readonly>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="date_nacer_format" id="mirror_field"   />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control required" id="age" name="age"  readonly >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-5 seg">
<select class="form-control select2 required"  style="width:100%"   name="seguro_medico" id="seguro_medico" >
<option value="" hidden></option>
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
<div id="seguro_input"></div>


<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">
<label class="radio-inline">
<input type="radio" name="frecuencia" value="Primera vez" checked>
Primera vez
</label>
<label class="radio-inline">
<input type="radio" name="frecuencia" value="Subsecuente" >
Subsecuente
</label>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Teléfono celular </label>
<div class="col-sm-6">						
<input type="text" class="form-control bfh-phone required"  id="form_phonecel" name="tel_cel"  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="form_phoneres" name="tel_resi"   >

</div>
</div>
<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3"><span class="req">*</span>Correo electrónico </label>
<div class="col-sm-6">
<input  type="email" id="emailtest" name="email" class="form-control required"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="sexo" id="sexo"  >
<option value="" hidden></option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="estado_civil" id="estado_civil">
<option value="" hidden></option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>Menor</option>
</select>
</div>
</div>
<div class="form-group nat">
<label class="control-label col-sm-3" ><span class="req">*</span> Nacianalidad</label>
<div class="col-sm-6 na">
<select  class="form-control  select2 required"  style="width:100%" id="nacionalidad"  name="nacionalidad"  >
<option value="" hidden></option>
<?php 

foreach($countries as $row)
{ 
echo '<option value="'.$row->short_name.'">'.$row->short_name.'</option>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">

<select class="form-control select2 required"  style="width:100%"  name="provincia" id="provincia" >
<option value="" hidden></option>
<?php
foreach($provinces as $listElement){
?>
<option  value="<?php echo $listElement->id?>"><?php echo $listElement->title?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">
<select class="form-control select2 required"  name="municipio" id="municipio_dropdown"  >

</select>
<span id="municipio_loader"></span>
</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Barrio </label>
<div class="col-sm-5">
<input type="text" class="form-control"  name="barrio"   >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3">Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="calle"   >
</div>
		
</div>

</div>
 
<div  id="Contactos_de_emergencia" class="cita-border">
<br/>
<h4>II- CONTACTOS DE EMERGENCIA</h4>
<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_nombre">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Parentesco</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_cel">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_tel1" >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_tel2"   >

 </div>
</div>
 </div>
<!--<div  id="En_case_de_menores_de_edad" class="cita-border">
<br/>
<h4>III- RELACIONES FAMILIARES</h4>
<div id='tienetutor' style='color:#B69200'></div>
  <?php $this->load->view('admin/pacientes-citas/create-patient-tutor'); ?>
</div>-->
<div  id="Datos_citas" class="cita-border">
<br/>
<h4>IV- DATOS CITAS</h4>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control select2 required"  style="width:100%" name="causa" id="causa" >
<option value="" hidden></option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->title.'</option>';
}
?>

</select>

</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onchange="getDoc(this.value);" >
 <option value="" hidden></option>
 <?php 

 foreach($especialidad as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control select2 required"  style="width:100%"  name="doctor" id="doctor_dropdown"  >
</select>
<span id="doctor_loader"></span>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-7" >
<div class="input-group date form_pro col-md-8 "  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" name="fecha_propuesta" readonly>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>--><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" />

</div>

</div>
</div>
 </div>
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg enable-send" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>

 <a href="#"  id="" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<br/><br/><br/><br/>
 </form>
  </span>
 </div>
</div>
<!-- /.container -->

	<br/><br/>


</html>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?=base_url();?>assets/js/validation-jq.js"></script>
<script>

$(window).on( "load", function() {display_age()})
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
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy",
        linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
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



function display_age(){
	var date_nacer=document.getElementById('date_nacer').value;
	var textage=document.getElementById('incorect_age');
	var dateinsert=document.getElementById('mirror_field').value;
    var datefrom = new Date(dateinsert);
   var dateto = new Date();
    var dateofbirth = date_nacer.slice(-4);
		var d = new Date();
         var n = d.getFullYear();
		  var currentm = d.getMonth();
		 if(datefrom > dateto)
		 {
			//textage.innerHTML += 'No puede nacer despues este año.';
			textage.style.display='block';
		document.getElementById('date_nacer').value = "";
		document.getElementById('age').value = ""; 
		 }
		 else if(dateofbirth==n)
		 { 
	 textage.style.display='none';
	       var nocando = datefrom<dateto ? null : 'datefrom > dateto!'
    ,diffM = nocando || 
             dateto.getMonth() - datefrom.getMonth() 
              + (12 * (dateto.getFullYear() - datefrom.getFullYear()))
    ,diffY = nocando || Math.floor(diffM/12)
    ,diffD = dateto.getDate()-datefrom.getDate()
    ,diffYM = nocando || 
                diffM%12+' mes(es) '+(diffD>0? (diffD+' día(s)') : '') ;
    document.getElementById("age").value = diffYM;
		 }
	 
		 else{
			 textage.style.display='none';
		 var age_result= n - dateofbirth+' año(s)';
		document.getElementById('age').value=age_result;
		 }
	
	}
	
	
		$('.form_pro').datetimepicker({
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy - hh:ii:s",
        linkField: "mirror_pro",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
    });
	$(".form_pro").datetimepicker( "setDate", new Date());
	
	
	
	$("#seguro_medico").on('change', function (e) {
e.preventDefault();
$.ajax({
url: '<?php echo site_url('cauter/seguro_name');?>',
type: 'post',
data:'seguro_medico='+$(this).val(),
success: function (data) {
$("#seguro_input").html(data);
			 
}

});
})





	$("#provincia").on('change', function (e) {
e.preventDefault();
$.ajax({
url: '<?php echo site_url('cauter/municipio_dropdown');?>',
type: 'post',
data:'provincia='+$(this).val(),
success: function (data) {
$("#municipio_dropdown").html(data);
			 
}

});
})



function getDoc(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('cauter/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").html(data);
	
	},
	});
}
</script>

