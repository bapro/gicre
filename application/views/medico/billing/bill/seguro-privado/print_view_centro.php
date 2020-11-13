
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>ADMEDICALL</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
    width: 15%;
    height: auto;


}
</style>
</head>

<!-- *** welcome message modal box *** -->

<?php 

$cpt="";
$part="centro";

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
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billPrivado/$idfacc/$part")?>"><i class="fa fa-pencil"></i>  Editar</a>
  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url("admin_medico/print_billing/$idfacc/$part")?>"><i class="fa fa-print"></i>  Imprimir</a>
   <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billing_medicos")?>"><i class="fa fa-plus"></i>  Nueva</a>
</div>

<?php

 foreach($billing1 as $row1)
$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
 
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula')->where('id_p_a',$row1->paciente)->get('patients_appointments')->row_array();

 $seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();

 $doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$row1->area )->get('areas')->row('title_area');

$centro=$this->db->select('name,logo')->where('id_m_c',$row1->centro_medico )
->get('medical_centers')->row_array();
$centro=$this->db->select('name,logo,provincia,municipio,barrio,calle,rnc,primer_tel,segundo_tel,type')->where('id_m_c',$row1->centro_medico )->get('medical_centers')->row_array();
$provincia=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipio=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');
 ?>
<div class="row"  align="center" >
<hr id="hr_ad"/>
<h2 align="center" style="color:blue">RECLAMACION DE PAGO POR SERVICIO PRESTADO </h2>
<h3 align="center" style="text-transform:uppercase"><?=$centro['name']?></h3>
<div align="center" ><img class="img" style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></div>
<p><label><i class="fa fa-phone" style="font-size:24px"></i> </label> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><label>RNC</label> <?=$centro['rnc']?></p>
<p><label><i class="fa fa-map-marker" style="font-size:24px"></i></label> <?=$provincia?>, <?=$muncipio?>, <?=$centro['calle']?>, <?=$centro['barrio']?> </p>

<input id="servicio" type="hidden" value="<?=$area?>"/>

</div> 

