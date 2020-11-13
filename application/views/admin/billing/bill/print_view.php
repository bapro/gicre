
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="all,follow">
<meta name="googlebot" content="index,follow,snippet,archive">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
if($is_admin=="yes"){
 $controller="admin";
 $index="appointments";
} else {
$controller="medico";
 $index="index";
}
$cpt="";
$part="privado";
?>

<div class="container" >
<br/><br/>
<div class="col-md-8" > 
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/$index")?>">Pacientes</a>


</div>
<div class="col-md-4" > 
 <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/bill/$idfacc/$part")?>"><i class="fa fa-pencil"></i>  Editar</a>
  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url("admin_medico/print_billing_/$idfacc/$part")?>"><i class="fa fa-print"></i>  Imprimir</a>
   <a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/billing_medicos")?>"><i class="fa fa-plus"></i>  Nueva</a>
</div>


<?php foreach($billing1 as $row1)
$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula')->where('id_p_a',$row1->paciente)->get('patients_appointments')->row_array();
$seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();

$doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');

$exequatur=$this->db->select('exequatur')->where('first_name',$row1->medico )
->get('doctors')->row('exequatur');


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
<td>NOMBRE AFILIADO</td><th class="uppercase"><?=$paciente['nombre']?></th>
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

<ol>

<?php 

foreach($billing2 as $row2)
{
$service=$this->db->select('procedimiento')->where('id_tarif',$row2->service)->get('tarifarios')->row('procedimiento');
echo "<li>$service </li>";	
}	
?>

</ol>
</th>
</tr>
<tr>
<td>DIAGNOSTICO </td><th>
<ol>

<?php 

foreach($show_diagno_pat as $cie)
{

echo "<li>$cie->description </li>";	
}	
?>

</ol>
</th>
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
<td>AUTORIZADO POR</td><th class="uppercase"><?=$row1->autopor?></th>
</tr>
<tr>
<td>CEDULA</td><th><?=$paciente['cedula']?></th>
</tr>
<tr>
<td>NO. AFILIADO</td><th><?=$num_af?></th>
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

</tr>
<tr>
<td>ESPECIALIDAD</td><th><?=$area?></th>
</tr>
</tr>
</table>
</div>
</div>
<div class="col-md-12" style="text-align:center" >

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
</body>



</html>