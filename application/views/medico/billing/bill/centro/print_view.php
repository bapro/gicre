
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
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billing_medicos")?>">Pacientes</a>


</div>
<div class="col-md-4" > 
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/bill/$idfacc/$part")?>"><i class="fa fa-pencil"></i>  Editar</a>
  <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo base_url("printings/print_billing/$idfacc/$part")?>"><i class="fa fa-print"></i>  Imprimir</a>
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

 ?>
<div class="col-md-12" >
<hr id="hr_ad"/>
<h3 align="center" style="text-transform:uppercase"><?=$centro['name']?></h3>
<div align="center" ><img class="img"  src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></div>

<p align="center" style="color:blue">RECLAMACION DE PAGO POR SERVICIO PRESTADO </p>
</div> 
<!--
<div class="col-md-12" >
<div class="col-md-6" >
<table class="table hide-bottom" >

<tr>
<td>ASEGURADORA</td>
<th>
<?=$seguron['title']?>  
</th>
</tr>
<tr>
<td>CODIGO PRESTADOR</td><th><?=$row1->codigoprestado?></th>
</tr>
<tr>
<td>NOMBRE AFILIADO</td><th style="text-transform:uppercase"><?=$paciente['nombre']?></th>
</tr>
<tr>
<td>TELEFONO</td><th><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></th>
</tr>
<tr>
<td>NO. CONTRATO</td><th><?=$row1->codigoprestado?></th>
</tr>
<tr>
<td>TIPO DE SERVICIO</td>
<th>

<?php 
$i=1;
foreach($billing2 as $row2) {
$service=$this->db->select('sub_groupo')->where('id_c_taf',$row2->service)->get('centros_tarifarios')->row('sub_groupo');
echo $i;$i++;
?>
- <?=$service?>
<?php
} ?>

</th>
</tr>
<tr>
<td>DIAGNOSTICO</td><th><ol>

<?php 

foreach($show_diagno_pat as $cie)
{

echo "<li>$cie->description </li>";	
}	
?>

</ol></th>
</tr>
<tr>
<td>MEDICO TRATANTE</td><th class="uppercase"><?=$doctor['name']?></th>
</tr>
<tr>
<td>PROCEDIMIENTO REALIZADO</td><th><ol>

<?php 

foreach($show_diagno_pro_pat as $pro)
{

echo "<li>$pro->name </li>";	
}	
?>

</ol></th>
</tr>

</table>
</div>
<div class="col-md-6" >

<table class="table hide-bottom" >

<tr>
<td>NRO AUTORIZACION</td>

<th style="color:red"><?=$row1->numauto?></th>
</tr>
<tr>
<td>FECHA</td><th><?=$row1->fecha?></th>
</tr>
<tr>
<td>AUTORIZADO POR</td><th style="text-transform:uppercase"><?=$row1->autopor?></th>
</tr>
<tr>
<td>CEDULA</td><th><?=$paciente['cedula']?></th>
</tr>
<tr>
<td>NO. AFILIADO</td><th><?=$row1->numfac?></th>
</tr>
<tr>
<td>TIPO AFILIADO</td><th><?=$paciente['afiliado']?></th>
</tr>
<tr>
<td>EMAIL</td><th><?=$paciente['email']?></th>
</tr>
<tr>
<td>CODIGO CIE-10</td><th><ol>

<?php 

foreach($show_diagno_pat as $cie)
{

echo "<li>" . $cie->code . " </li>";	
}	
?>

</ol></th>
<td>CODIGO CIE-10</td><th><?=substr($row1->diagnostic, 0, strpos($row1->diagnostic, ' '))?></th>

</tr>
<tr>
<td>ESPECIALIDAD</td><th><?=$area?></th>
</tr>
</tr>
</table>
</div>
</div>
<div class="col-md-12" >
TOTAL RECLAMADO : <b><u><?=number_format("$row1->tsubtotal",2)?></u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b><u><?=number_format("$row1->totpagseg",2)?></u></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 EL PACIENTE PAGARA : <b><u><?=number_format("$row1->totpagpa",2)?></u></b> <br/><br/><br/>
 <div class="col-md-6" >
 <hr style="border:1px solid black;"/>
 <b>FIRMA AUTORIZADA Y SELLO DEL RECLAMENTE</b>
 </div>
<div class="col-md-6" >
 <hr style="border:1px solid black;"/>
 <b>NOMBRE Y CEDULA DEL AFILIADO O FAMILIAR RESPONSABLE</b>
 </div>
</div>
<div class="col-md-12" >
<br/>
<p style="font-size:13px"><b>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</b></p>
</div>
</div>
<br/><br/><br/><br/>
</body>-->



</html>