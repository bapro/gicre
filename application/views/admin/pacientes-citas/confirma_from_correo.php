	<!-- *** welcome message modal box *** -->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="robots" content="solicitud de citas">
<meta name="googlebot" content="solicitud de citas">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admedicall</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<!-- Theme stylesheet, if possible do not edit this stylesheet -->
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

<style>
input.form-control{border:none}
</style>
</head>

<body>
<?php foreach($query->result() as $row)
$number_cita=$this->db->select('id_patient')->where('doctor',$row->doctor)->where('id_patient',$row->id_patient)->where('cancelar',0)->get('rendez_vous');
$frecuencia=$number_cita->num_rows();
$pat=$this->db->select('nombre,tel_resi,tel_cel,email,frecuencia,seguro_medico,photo,ced1,ced2,ced3')->where('id_p_a',$row->id_patient)
->get('patients_appointments')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row('title_area');

 ?>
<div class="container"  >
<div class="col-md-12" style='background:#A4C3FD' >
<h3 style='text-align:center'>CONFIRMACION DE SOLICITUD DE CITA</h3>
</div>
<div id="userText" class="form-horizontal"  > 
<div class="form-group" id="background_">
<label class="control-label col-sm-4">Foto:</label>
<div class="col-sm-8">
<?php
$this->padron_database = $this->load->database('padron',TRUE);
if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img  style="width:16%;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  style="width:16%;" src="'.base_url().'/assets/img/user.png"  />';	
}
$readonlyag="readonly";
} 
else if($pat['photo']==""){
$readonlyag="";
?>
<img  style="width:16%;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="width:16%;" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat['photo']; ?>"  />
<?php

}
?>
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-4">NEC:</label>
<div class="col-sm-8">
<?=$row->nec?>
</div>
</div>

<div class="form-group" id="background_">
<label class="control-label col-sm-4">Nombre:</label>
<div class="col-sm-8">
<?= $pat['nombre'] ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Fecha solicitud:</label>
<div class="col-sm-8">
<?=$row->fecha_propuesta?>
</div>
</div>
<div class="form-group" id="background_">
<label class="control-label col-sm-4">Frecuencia:</label>
<div class="col-sm-8">
<?php
if($frecuencia == 1){
	 $frecuencia_text="1.ª vez";
  } else{
	$frecuencia_text="$frecuencia veces"; 
 } 
echo $frecuencia_text;
 ?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Email:</label>
<div class="col-sm-8">
<?=$pat['email'] ?>
</div>
</div>

<div class="form-group" id="background_" style='color:red'>
<label class="control-label col-sm-4">Telefono celular:</label>
<div class="col-sm-8">
<?=$pat['tel_cel'] ?>
</div>
</div>


<div class="form-group" >
<label class="control-label col-sm-4">Telefono residencial:</label>
<div class="col-sm-8">
<?=$pat['tel_resi'] ?>
</div>
</div>

<div class="form-group" id="background_">
<label class="control-label col-sm-4">Centro medico:</label>
<div class="col-sm-8" >
<?php 
	$medical_centers=$this->db->select('name')->where('id_m_c',$row->centro )
   ->get('medical_centers')->row('name');
   echo $medical_centers ;?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Especialidad:</label>
<div class="col-sm-8">
<?php 
echo $area;
?>
</div>
</div>

<div class="form-group" id="background_">
<label class="control-label col-sm-4">Doctor:</label>
<div class="col-sm-8">
<?php 
	$doc=$this->db->select('name')->where('id_user',$row->doctor)
   ->get('users')->row('name');
   echo $doc;
   ?>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Seguro Medico:</label>
<div class="col-sm-8">
<?php 
	$seguro_name=$this->db->select('title')->where('id_sm',$pat['seguro_medico'])
   ->get('seguro_medico')->row('title');
   echo $seguro_name;
   ?>
</div>
</div>
<div class="form-group"  style='background:#FFAA8D'>
<label class="control-label col-sm-4">Causa:</label>
<div class="col-sm-8" style='text-transform:uppercase'>
<?php echo $row->causa ?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Fecha Propuesta:</label>
<div class="col-sm-8">
<?php 
	$seguro_name=$this->db->select('title')->where('id_sm',$pat['seguro_medico'])
   ->get('seguro_medico')->row('title');
   echo $seguro_name;
   ?>
</div>
</div>
</div>

  <div>
  <strong>
 Una vez usted confirme la cita el paciente recibirá un correo electrónico con la confirmación de la misma.<br/>
  </strong></div>
<form  class="form-horizontal" method="post"  action="<?php echo site_url("admin_medico/confirmar_solicitud");?>" > 
<input type="hidden" name="id_apoint" value="<?=$row->id_apoint?>"/>
<input type="hidden" name="patient" value="<?=$pat['nombre']?>"/>
<input type="hidden" name="centro" value="<?=$medical_centers?>"/>
<input type="hidden" value="<?=$row->nec?>" name="patient-nec"/>
<input type="hidden" value="<?=$user_id?>" name="user-id"/>
<input type="hidden" value="<?=$row->doctor?>" name="doc-id"/>
<input type="hidden" value="<?=$pat['email'] ?>" name="patient-email"/>
<input type="hidden" value="<?=$area ?>" name="doctor-area"/>
<input type="hidden" value="<?=$row->centro?>" name="centro-id"/>
<input type="hidden" value="2" name="direction"/>
<input type="hidden" value="<?=$pat['tel_cel'] ?>" name="patient-phone"/>
<hr/>
<textarea placeholder="Escribir mensage al paciente." class="form-control" id="background_" name="medico-text" rows="4" cols="55"></textarea><br/>

<div class="form-group" >
<label class="control-label col-sm-4">Fecha Propuesta</label>
<div class="col-sm-5" >

<div class="input-group form_datetime2" >
<input type="text" class="form-control" style='border:1px solid #38a7bb' value="<?=$row->fecha_propuesta?>" name="fecha-doctor"/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</div>


<div class="form-group" >
<label class="control-label col-sm-4">Link de Zoom</label>
<div class="col-sm-8">
<input type="text" class="form-control" style='border:1px solid #38a7bb' name="link-zoom" placeholder='entrar el link de zoom' />

</div>
</div>
<div class="form-group" >
<?php if($row->centro ==50){
	echo "<span style='color:red'>El paciente debe pagar el centro</span>";
} else{	?>
<label class="control-label col-sm-4">Link de Pago:</label>
<div class="col-sm-8">
<input type="text" class="form-control" style='border:1px solid #38a7bb' name="link-pago" placeholder='entrar el link del pago' />
<?php 
$val=$this->db->select('price,name')->where('id_doctor',$row->doctor)->get('products')->row_array();
if($val['price']){
	$price=$val['price'];
	$servicio=$val['name'];
echo "<label>$servicio : $$price USD</label>";	
}else{
$link='href="https://www.admedicall.com/medico/payment_received"';	
echo "<span style='color:red'>El servicio online no tiene precio<br/> <u><a $link>Crearlo antes de confirmar</a></ul></span>";	
}
?>
</div>
<?php } ?>
</div>
<button class="btn btn-primary btn-xs" type="submit">Confirmar</button>
<br/><br/>
</form>
</div>
</body>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
$('.form_datetime2').datetimepicker({
      format: 'DD-MM-YYYY'
	  });
</script>
	</html>