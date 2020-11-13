<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size:12px} 
    tr {border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none; }

p{text-align:center}
.trback td{background:#A9E4EF}

</style>
</head>


<?php

$this->padron_database = $this->load->database('padron',TRUE);


$centro=$this->db->select('name,logo,provincia,municipio,barrio,calle,rnc,primer_tel,segundo_tel,type')->where('id_m_c',$centro)
->get('medical_centers')->row_array();

$provincia=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipio=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');



 $doctor=$this->db->select('name,cedula,area')->where('id_user',$id_user)
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');

?>
 <div style="display:<?=$display?>">
<div align="center">
  <img class="img "  style="width:90px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />
  </div>
<div  align="center" style="font-size:12px">

<h2  align="center"> <?=$centro['name']?></h2>

<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provincia?>, <?=$muncipio?> </p>
 </div>
  </div>
<!--
<h2  align="center" style="text-transform:uppercase">Dr.(a) <?=$doctor['name']?></h2>
<p><strong>Exeq.</strong> <?=$doctor['cedula']?></p>


 </div>
 </div>
<hr/>
-->
<h3 align="center"><?=$cita_fecha?></h3> 
<table style="width:100%;">
<tr style="background:#D7E495">
<td><strong>#</strong></td>
<td><strong>FOTO</strong></td>
<td><strong>NEC</strong></td>
<td><strong>NOMBRES</strong></td>
<td><strong>TELEFONOS</strong></td>
<td><strong>FECHA PROPUESTA</strong></td>
<!--<td><strong>CENTRO</strong></td>-->
<td><strong>DOCTOR</strong></td>

</tr>
<?php
$i=1;

 foreach($appointments as $ver)
{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,frecuencia,tel_resi,tel_cel')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();

?>
<tr>
<td><?php echo $i; $i++?></td>
<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
if($patient['tel_resi'] !=""){
$second_t=$patient['tel_resi'];
$second_tel=" / $second_t";	
}else{
$second_tel="";	
}
?>
</td>
<td><?=$ver->nec;?></td>

<td style="text-transform: uppercase;"><?=$patient['nombre'];?> </td>
<td style="color:red;"><?=$patient['tel_cel']?><?=$second_tel;?></td>
<td ><?=$ver->fecha_propuesta;?></td>
<!--<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<?=$centro['name'];?>
</td>-->
<td style="text-transform: uppercase">
<?php 
	$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');?>
<?=$doctor;?>
 </td>

</tr>
<?php }?>
</table>

