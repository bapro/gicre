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

$this->load->view('cauter/header');

?>
<hr style="background:#38a7bb;height:1px"/>
 <div class="container">
 <div class="row">
	 <a href="<?php echo site_url('cauter/create_appointment');?>" class="btn btn-primary btn-xs">Nueva cita</a>
	 </div>
	 <hr id="hr_ad"/>
  

 <div class="col-md-12"><h3>Citas Confirmadas</h3></div><br/>


 <hr id="hr_ad"/>

 <div class="col-md-12">
<div class="row"  id="dis" >
<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered display" id="example">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>NEC</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Patiente</strong></th>

</tr>
</thead>
 <tbody>
<?php
$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)

{
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($ver->inserted_by)));	

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td class="id"><?=$ver->nec;?></td>
<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<?=$centro['name'];?>
</td>

<td style="text-transform: uppercase">
<?php 
$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
->get('users')->row('name');?>
<?=$doctor;?>
</td>
<?php 
$patient=$this->db->select('nombre')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();?>
<td style="text-transform: uppercase;"><a title="Ver este paciente" href="<?php echo site_url("cauter/patient/$ver->id_patient"); ?>"><?=$patient['nombre'];?>  </a> </td>

</tr>  

<?php
}

?>
 <tbody>
</table>
</div>
	</div>
	<br/>
	 <div class="row">
	 <a href="<?php echo site_url('cauter/create_appointment');?>" class="btn btn-primary btn-xs">Nueva cita</a>
	 </div>
</div>
<br/><br/><br/>

<div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div>
    </div>
</div>

</div>
<!-- /.container -->

	<br/><br/>


</html>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script>
  <script type="text/javascript">





			
    </script>

