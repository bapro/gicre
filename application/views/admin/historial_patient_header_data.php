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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
<?php foreach($HISTORIAL_MEDICAL as $historial_medical)
{
	$dato_citas=$this->db->select('nec,fecha_propuesta')->where('id_patient',$historial_medical->id_p_a )
->get('rendez_vous')->row_array();
?>
<tr>
<td><b>NEC :</b> <?=$dato_citas['nec'];?></td><td><b>CEDULA :</b> <?=$historial_medical->cedula;?></td><td style="text-transform:uppercase"><b>NOMBRES :</b> <?=$historial_medical->nombre;?></td><td><b>FECHA : </b><?=$dato_citas['fecha_propuesta'];?></td>
</tr>
<tr>
 <?php
  	$seguro_medico_name=$this->db->select('title')->where('id_sm',$historial_medical->seguro_medico)
 ->get('seguro_medico')->row('title');
  ?>
<td><b>EDAD : </b> <?=$historial_medical->edad;?></td><td><b>SEXO :</b> <?=$historial_medical->sexo;?></td><td><b>TIPO :</b> <?=$historial_medical->frecuencia;?></td><td><b>ARS :</b> <?=$seguro_medico_name;?></td>
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
<div  class="col-xs-12  hide-m-a"  >

<div class="col-xs-1" >
<a href="#" style="color:#000080;outline: 0;" onclick="window.location.href='<?=site_url("admin/Appointments")?>'"  id="add"  >Citas </a>
</div >
<div class="col-xs-4 his_med_title">
<a data-toggle="modal" data-target="#medicaha" href="<?php echo base_url('admin/showMedicine/'.$id_historial)?>" style="color:#000080;outline: 0;" >Mostrar Medicamentos Habituales  </a> 
</div >
<div class="col-xs-5 his_med_title">
<label>Alergicos :</label>  <span id="showal"  style="color:red;font-weight:bold" ><?php foreach($desa as $rowal) echo $rowal->otros;?></span>

 </div >
<div class="col-xs-2">
<button  class="btn-sm send-edit-ssr" style="display:none;color:green;border:1px solid green" id="send-edit-ssr"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar1</button>
<button  class=" btn-sm btn-success save_ant_ssr_hide" style="display:none" id="save_ant_ssr"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_ant_gen" id="send_data" style="display:none"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<div class="btn-group hide_acciones" style="display:none">
<label style="cursor:pointer" class="dropdown-toggle fix-it" data-toggle="dropdown">
ACCIONES<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</label>
<ul  class="dropdown-menu da"  role="menu">
<li class="hide-ant-save"><a id="hide-ant-save" style="cursor:pointer"  class="btn-sm" ><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</a></li>
<li class="hide-ant-gen-print"><a target="_blank" href="<?php echo base_url('admin/printAntGeneral/'.$id_historial)?>" class="btn-sm imp-ant-general"><i class="glyphicon glyphicon-print"></i> Imprimir</a></li>

</ul>
</div> 

</div>
</div>

</div>


<div class="stuck"  >
<a  title="configuraciones" data-toggle="modal" data-target="#configs" class="btn btn-primary btn-sm hide_sa" style="float:right"  ><i class="fa fa-cog" aria-hidden="true" ></i> </a>
<br/><br/>
<ul  class="nav nav-pills nav-stacked histmenu scrollable-menu">
<li class="dropdown">
  <a href="#"  class="dropdown-toggle left_hit" data-toggle="dropdown" id="antechangecolor"  > ANTECEDENTES <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="#" id="homeclick" class="left_hit active" onclick="clickSingleA(this)" > GENERAL</a></li>
    <li><a href="#" id="ssr" class="left_hit"  onclick="clickSingleA(this)"> SSR</a></li>
    <li><a href="#" id="obstetrico" class="left_hit"  onclick="clickSingleA(this)">OBSTETRICOS</a></li>
   <li><a href="#" id="pediatrico" class="left_hit"  onclick="clickSingleA(this)">PEDIATRICO</a></li>
    <!--<li><a href="#" id="prenatal" class="left_hit"  onclick="clickSingleA(this)">PERINATAL</a></li>-->
 <!-- <li><a href="#" id="desarrollo" class="left_hit"  onclick="clickSingleA(this)">DESARROLLO Y SOSPECHA ABUSO</a></li>-->
 </ul>
</li>  
<li><a href="#" id="enfermedadshow" class="left_hit" onclick="clickSingleA(this)"> ENFERMEDAD ACTUAL</a></li>
 <li class="dropdown" >
<a href="#"  class="dropdown-toggle left_hit" data-toggle="dropdown"   > EXAMEN <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="#" id="rehabilitation" onclick="clickSingleA(this)" class="left_hit">REHABILITACION</a></li>
<!--<li><a  href="<?php echo site_url("admin/newRehabilitation/".$id_historial); ?>" id="rehabilitation" onclick="clickSingleA(this)" class="left_hit">REHABILITACION</a></li>-->
<li><a href="#" id="examenf" onclick="clickSingleA(this)" class="left_hit"> FISICO</a></li>
<li><a href="#" id="oftalmologia" onclick="clickSingleA(this)" class="left_hit">OFTALMOLOGIA</a></li>
<li><a href="#" id="examensis" class="left_hit"  onclick="clickSingleA(this)">DEL SISTEMA</a></li>

</ul>
</li>
<li><a href="#" id="conclucion" class="left_hit" onclick="clickSingleA(this)"> CONCLUSION DIAGNOSTICA</a></li>
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