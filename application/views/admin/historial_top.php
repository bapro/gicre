<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
	   <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
 <link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
 <style>
.hide_pagination{display:block}
</style>
</head>
<div class="navbar navbar-fixed-top navbar-default" style="border-bottom:1px solid rgb(206,206,206)" >
<div class="col-xs-12" style="border-bottom:1px solid rgb(205,205,205 );background:#428bca;color:white">
<div class="col-xs-10">Datos personales</div>
<div class="col-xs-2">
<button title="Ocultar" style="background:white;color:black" type="button" id="bthide" class="btn btn-primary btn-xs reveal">Ocultar</button>
</div>
</div>
<div class="col-xs-12" id="Ocultar">
<div class="col-xs-11" style=""  >

<table class="table hide-datos-personales"  style="border:1px solid rgb(206,206,206);border-right:none">
 <?php $historial_id=$this->session->userdata('historial_id');
$sql ="SELECT * FROM patients_appointments where id_p_a=2";
$query = $this->db->query($sql);
foreach ($query->result() as $historial_medical)
{
?>

<tr>
 <?php
  	$seguro_medico_name=$this->db->select('title')->where('id_sm',$historial_medical->seguro_medico)
 ->get('seguro_medico')->row('title');
  ?>
<td>EDAD :  <?=$historial_medical->edad;?></td><td>SEXO : <?=$historial_medical->sexo;?></td><td>TIPO : <?=$historial_medical->frecuencia;?></td><td>ARS : <?=$seguro_medico_name;?></td>
</tr>
<?php
}

?>
</table>

</div>
<div class="col-xs-1 hide-patient"><br/>
<img class="img-responsive" style="border-radius:20px" src="<?= base_url();?>assets/img/user.png" width="110" alt=""/>
</div>
</div>
<div class="col-xs-12" >
<div class="col-xs-3">
  <a class="left_hit_" href="<?php echo site_url('admin/create_cita');?>">Nueva cita</a> 
  <a class="left_hit" style="margin-left:20px" href="<?php echo site_url('admin/ver_confirmada_solicitud');?>">Cola de Citas </a>
  </div>
 <div class="col-xs-9" >
 <span class="historial_sent" style="display:none;color:green;font-size:20px">Neuvos datos han sido ingresado con exito !</span>
 <span class="hide_pagination" style="margin-top:-1.94%;font-weight:bold" ><?php echo $this->ajax_pagination->create_links(); ?></span>
 <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/img/loading.gif'; ?>"/></div></div>
 </div>
	
</div>
</div><!--navbar end-->
<br/>

<div class="stuck">
<br/>
<ul  class="nav nav-pills nav-stacked histmenu scrollable-menu">
<li class="dropdown">
  <a href="#"  class="dropdown-toggle left_hit" data-toggle="dropdown" id="antechangecolor"  > ANTECEDENTES <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="homeclick" class="left_hit active" onclick="clickSingleA(this)" > GENERAL</a></li>
    <li><a href="#" id="ssr" class="left_hit"  onclick="clickSingleA(this)"> SSR</a></li>
    <li><a href="#" id="obstetrico" class="left_hit"  onclick="clickSingleA(this)">OBSTETRICOS</a></li>
   <li><a href="#" id="pediatrico" class="left_hit"  onclick="clickSingleA(this)">PEDIATRICO</a></li>
    <li><a href="#" id="prenatal" class="left_hit"  onclick="clickSingleA(this)">PRENATAL</a></li>
 <!-- <li><a href="#" id="desarrollo" class="left_hit"  onclick="clickSingleA(this)">DESARROLLO Y SOSPECHA ABUSO</a></li>-->
 </ul>
</li>  
<li><a href="#" id="enfermedadshow" class="left_hit" onclick="clickSingleA(this)"> ENFERMEDAD ACTUAL</a></li>
 <li class="dropdown" >
<a href="#"  class="dropdown-toggle left_hit" data-toggle="dropdown"   > EXAMEN <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a  href="<?php echo site_url("admin/newRehabilitation/".$historial_id); ?>" onclick="clickSingleA(this)" class="left_hit">REHABILITACION</a></li>
<li><a href="#" id="examenf" onclick="clickSingleA(this)" class="left_hit"> FISICO</a></li>
<li><a href="<?php echo site_url("admin/oftalmologia/".$historial_id); ?>" id="oftalmologia" onclick="clickSingleA(this)" class="left_hit">OFTALMOLOGIA</a></li>
<li><a href="#" id="examensis" class="left_hit"  onclick="clickSingleA(this)">DEL SISTEMA</a></li>

</ul>
</li>
<li><a href="#" id="conclucion" class="left_hit" onclick="clickSingleA(this)"> CONCLUCION DIAGNOSTICA</a></li>
 <li><a href="#" id="controlprenatal" class="left_hit" onclick="clickSingleA(this)"> CONTROL PRENATAL</a></li>

 
 <li class="dropdown">
  <a href="#"  class="dropdown-toggle left_hit" data-toggle="dropdown" id="indchangecolor"  > INDICACIONES <b class="caret"></b></a>
  <ul class="dropdown-menu">
  <li><a href="#" id="recetas" onclick="clickSingleA(this)" class="left_hit"> RECETAS</a></li>
<li><a href="#" id="estudios" onclick="clickSingleA(this)" class="left_hit">ESTUDIOS</a></li>
 <li><a href="#" id="laboratorios" onclick="clickSingleA(this)" class="left_hit"> LABORATORIOS</a></li>

  </ul>
</li>
</ul>
</div><!--stuck end -->