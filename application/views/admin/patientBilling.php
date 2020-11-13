<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	 <title>ADMEDICALL</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet" id="theme-stylesheet">
 
 <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
  </head>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Desea facturar el paciente ?</h4>
</div>
<div class="modal-body">
<a  class="btn btn-primary btn-sm" href="<?php echo base_url('admin/create_cita')?>">  No</a>
<a style="float:right" class="btn btn-primary btn-sm" href="<?php echo base_url('admin/patientBilling')?>">  Si</a>
</div>
</div>
</div>
</div>

<div class="col-md-12"> 
<div id="patientHint"></div>
</div>
<div class="col-md-12" id="hide_patientf"> 
<div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" style="font-size:13px">
<li class="active" ><a href="#Datos_personales"  data-toggle="tab" class="">I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a href="#Contactos_de_emergencia" data-toggle="tab">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a href="#En_case_de_menores_de_edad" data-toggle="tab">III- RELACIONES FAMILIARES</a></li>
<li><a href="#Datos_citas" data-toggle="tab">IV- DATOS CITAS <i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>

</ul>
 
</div>
<div class="col-md-9 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h3 class="h3 hide_crear_nueva_cita">Crear Nueva Cita</h3>
<span class="missingc" style="display:none;color:red">La pestaña <b>DATOS CITAS</b> tiene campos obligatorios.</span>
<span class="missingdp" style="display:none;color:red">La pestaña <b>DATOS PERSONALES</b> tiene campos obligatorios.</span>

<hr class="rem-hr" id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">
 
 <form  class="form-horizontal "  > 

<button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-lg" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
<div class="tab-content"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 

<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control" placeholder="Nomres Apellidos" id="nombre" name="nombre"   >


</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-6">
<span class="radio-inline">
<input type="radio"  name="ced_pas"  value="Pasaporte" onclick="passaporte()" >Pasaporte
</span>
<span class="radio-inline">
<input type="radio"  name="ced_pas" value="Cedula" onclick="cedula1()" checked>Cedula
</span>
</label>
<div class="col-sm-3" >
<label class="cedpas" >Entra # cedula</label>                                                       
<input type="text" class="form-control"  name="cedula" id="cedula"  >
</div>
</div>

<div id="hideyear" style="">
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-7" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>
<div class="input-group date form_datetime col-md-8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" onchange="display_age()" id="date_nacer" name="date_nacer" Placeholder="Seleccionar fecha" readonly required>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>-->
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

</div>
<input type="hidden" name="date_nacer_format" id="mirror_field"   />

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control" id="age" name="age"  readonly >
</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-5 seg">

</div>
</div>
<div id="seguro_input"></div>
</div>

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
<input type="text" class="form-control bfh-phone"  id="form_phonecel" name="tel_cel"  >
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
<input  type="text" id="emailtest" name="email" class="form-control"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control" name="sexo" id="sexo"  >
<option value="">Selecionne</option>
<option >Masculino</option>
<option >Femenino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control" name="estado_civil" id="estado_civil">
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

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5 pro">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">
<select class="form-control"  name="municipio" id="municipio_dropdown"  >

</select>
<span id="municipio_loader"></span>
</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"><span class="req">*</span> Barrio </label>
<div class="col-sm-5">
<input type="text" class="form-control"  name="barrio"   >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"><span class="req">*</span> Calle</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="calle"   >
</div>
		
</div>
<a href="#"  id="backToTop" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div>
 
<div class="tab-pane" id="Contactos_de_emergencia">

<div class="form-group">
<label  class="control-label col-sm-3">Nombre</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_nombre">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="contacto_em_alias">
</div>
</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-sm-3" >Celular</label>
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
<div class="tab-pane" id="En_case_de_menores_de_edad">

<div class="tab-pane" id="Datos_citas">
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">


</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6 esp">

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control select-examsis"  style="width:100%"  name="doctor" id="doctor_dropdown"  >

</select>
<span id="doctor_loader"></span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control"  name="fecha_propuesta"  readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" value="" readonly />
</div>
</div>
</div>
 </div>
 </form>
  </span>
 </div><!--row background_ end -->
 </div>


