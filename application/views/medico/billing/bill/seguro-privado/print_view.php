
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>ADMEDICALL</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Theme stylesheet, if possible do not edit this stylesheet -->
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">


<!-- Favicon and apple touch icons-->
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<!-- owl carousel css -->
<style>
.hide-bottom td, .hide-bottom th {
    border: none;
}
th{text-align:left}
td{text-align:left} 
.img {
    width: 9%;
    height: auto;}
.uppercase{text-transform:uppercase}
</style>
</head>

<!-- *** welcome message modal box *** -->

<?php 

$cpt="";
$part="privado";

if($is_admin=="yes"){
 $controller="admin";
 $index="appointments";
} else {
$controller="medico";
 $index="index";
}
?>

<div class="container" >
<br/><br/>
<div class="col-md-8" > 
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/$index")?>">Pacientes</a>


</div>
<div class="col-md-4" > 
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billPrivado/$idfacc/privado")?>"><i class="fa fa-pencil"></i>  Editar</a>
  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url("admin_medico/print_billing/$idfacc/medico")?>"><i class="fa fa-print"></i>  Imprimir</a>
   <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billing_medicos")?>"><i class="fa fa-plus"></i>  Nueva</a>
</div>


<?php foreach($billing1 as $row1)
$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula')->where('id_p_a',$row1->paciente)->get('patients_appointments')->row_array();
$seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();

$doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');

$exequatur=$this->db->select('exequatur')->where('id_user',$row1->medico )
->get('users')->row('exequatur');


 $num_af=$this->db->select('input_name')->where('patient_id',$row1->paciente )
 ->get('saveinput')->row('input_name');

 ?>
<div class="col-md-12" >
<hr id="hr_ad"/>
<h3 align="center" style="text-transform:uppercase">medico <?=$doctor['name']?> </h3>
<p align="center" >Exeq : <?=$exequatur?></p>
<p align="center" style="color:blue">RECLAMACION DE PAGO POR SERVICIO PRESTADO</p>
<?php
if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
 ?>
<p align="center" ><?=$logoseg ?></p>
</div> 
