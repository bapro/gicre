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
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script>
moment.locale('es');
</script>
</head>
<div class="navbar navbar-fixed-top navbar-default" style="border-bottom:1px solid rgb(206,206,206)" >
<div class="col-xs-12" style="border-bottom:1px solid rgb(205,205,205 );background:#428bca;color:white">
<div class="col-xs-10">Datos personales</div>
<div class="col-xs-2">
<button title="Ocultar" style="background:white;color:black" type="button" id="bthide" class="btn btn-primary btn-xs reveal">Ocultar</button>
</div>
</div>
<div class="col-xs-12" id="Ocultar">
<div class="col-xs-1 hide-patient">
<img class="img-responsive" style="border-radius:20px" src="<?= base_url();?>assets/img/user.png" width="110" alt=""/>
<?php if($ctutor < 1){
	echo "";
	} 
	else{
		?>
<div class="btn-group" style="position:absolute;">
<button style="position:absolute;margin-left:23px" type="button"  class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-link" aria-hidden="true"></i><span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu" >
<?php

foreach($tutor as $tut)
{

?>
<li><a target="_blank" href="<?php echo site_url("admin/historial_medical/".$tut->id_tutor); ?>"><?=$tut->relacion?> : <?=$tut->name_tutor?></a></li>
<?php
}
?>
</ul>
</div>
<?php
}
?>
</div>
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

</div>
<div  class="col-md-12  hide-m-a"  >

<div class="col-xs-5 col-md-offset-1 his_med_title">
<a href="#"  style="color:#000080;outline: 0;" onclick="window.location.href='<?=site_url("admin/Appointments")?>'"  id="add"  >Citas </a>


<?php 
if($rowpm < 1)
{
	echo "";
}
else{
 ?>
<a data-toggle="modal" data-target="#medicaha" href="<?php echo base_url('admin/showMedicine/'.$id_historial)?>" style="color:#000080;outline: 0;margin-left:20px" >Medicamentos Habituales  </a> 
<?php
}

?>

</div >
<div class="col-xs-4 his_med_title">
<label>Alergicos :</label>  <span id="showal"  style="color:red;font-weight:bold" ><?php foreach($desa as $rowal) echo $rowal->otros;?></span>

 </div >
<div class="col-xs-2">
<?php 
if($antege < 1){
 ?>
<button  class=" btn-sm btn-success save_ant_gen" id="save_ant_gen"   type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<?php
}  
 ?>
<button  class=" btn-sm btn-success save_cont_pren" style="display:none" id="save_cont_pren"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_cond" style="display:none" id="save_cond"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_exasis" style="display:none" id="save_exasis"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_exa_fisico" style="display:none" id="save_exa_fisico"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_ftalmologia" style="display:none" id="save_ftalmologia"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_enf_act" style="display:none" id="save_enf_act"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  style="display:none" class="btn-sm btn-success save_rehabilidad" type="submit" id="save_rehabilidad" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_ant_ssr_hide" style="display:none" id="save_ant_ssr"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_ant_obs_hide" style="display:none" id="save_ant_obst"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success save_ant_pediat" id="save_ant_pediat" style="display:none"  type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<button  class=" btn-sm btn-success modif_ant_pediat"  style="display:none"  type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar</button>
<button  class=" btn-sm btn-success hide_acciones_obs"  style="display:none"  type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar</button>
<button  class=" btn-sm btn-success show_modif_ant_ssr"  style="display:none"  type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar</button>
<button  class=" btn-sm btn-success show_modif_cond"  style="display:none"  type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> Cambiar</button>

</div>
</div>

</div>


 <div class="col-sm-3 col-md-2 sidebar" style="background:white;">
  <br/>  <br/> <br/>  <br/> <br/>   <br/>
<!--<a  title="configuraciones" data-toggle="modal" data-target="#configs" class="btn btn-primary btn-sm hide_sa" style="float:right"  ><i class="fa fa-cog" aria-hidden="true" ></i> </a>-->

<ul  class="nav nav-pills nav-stacked histmenu scrollable-menu">
<li>
  <a href="#"  class="dropdown-toggle left_hit this-is-a-title" data-toggle="dropdown"  > ANTECEDENTES <b class="caret"></b></a>
  <ul class="">
    <li><a href="#" id="homeclick" class="left_hit active" onclick="clickSingleA(this)" > General</a></li>
    <li><a href="#" id="ssr" class="left_hit"  onclick="clickSingleA(this)"> SSR</a></li>
    <li><a href="#" id="obstetrico" class="left_hit"  onclick="clickSingleA(this)">Obstetricos</a></li>
   <li><a href="#" id="pediatrico" class="left_hit"  onclick="clickSingleA(this)">Pediatrico</a></li>
</ul>
</li>  
<li><a href="#" id="enfermedadshow" class="left_hit" onclick="clickSingleA(this)">ENFERMEDAD ACTUAL</a></li>
 <li>
<a href="#"  class="dropdown-toggle left_hit this-is-a-title" data-toggle="dropdown"   > EXAMEN <b class="caret"></b></a>
<ul>
<li><a href="#" id="rehabilitation" onclick="clickSingleA(this)" class="left_hit">Rehabilitacion</a></li>
<!--<li><a  href="<?php echo site_url("admin/newRehabilitation/".$id_historial); ?>" id="rehabilitation" onclick="clickSingleA(this)" class="left_hit">REHABILITACION</a></li>-->
<li><a href="#" id="examenf" onclick="clickSingleA(this)" class="left_hit"> Fisico</a></li>
<li><a href="#" id="oftalmologia" onclick="clickSingleA(this)" class="left_hit">Oftalmologia</a></li>
<li><a href="#" id="examensis" class="left_hit"  onclick="clickSingleA(this)">Del Sistema</a></li>

</ul>
</li>
<li><a href="#" id="conclucion" class="left_hit" onclick="clickSingleA(this)"> CONCLUSION DIAGNOSTICA</a></li>
 <li><a href="#" id="controlprenatal" class="left_hit" onclick="clickSingleA(this)"> CONTROL PRENATAL</a></li>

 
 <li>
  <a href="#"  class="dropdown-toggle left_hit this-is-a-title" data-toggle="dropdown" id="indchangecolor"  > INDICACIONES <b class="caret"></b></a>
  <ul>
  <li><a href="#" id="recetas" onclick="clickSingleA(this)" class="left_hit"> Recetas</a></li>
<li><a href="#" id="estudios" onclick="clickSingleA(this)" class="left_hit">Estudios</a></li>
 <li><a href="#" id="laboratorios" onclick="clickSingleA(this)" class="left_hit"> Laboratorios</a></li>

  </ul>
</li>
</ul>
</div><!--stuck end -->

