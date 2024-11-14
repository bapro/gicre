<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px;border-color:white}

  td { border:none;padding: 1em; border-bottom:1px solid #E6E6E6;}

  .td-head { border-left: none; border-left: none;border-color:white}

strong{font-size:13px}
#wrapper {
  display: flex;
}

#left {
  flex: 0 0 65%;
}

#left {
  flex: 1;
}
</style>
</head>
<body>

<div id="wrapper">

<h3 style="text-align:center"><?=$title?></h3>

<?php

foreach ($cirugia_toracico->result() as $rowp)
?>


<div id="left">
<table class='r-b'  >
<tr>
<td style="text-align:left"><strong>Hora de Inicio:</strong> <?=$rowp->hora_ini;?> <?=$rowp->am_pm_hora_init;?><br/>
 <strong>Hora Finalización:</strong> <?=$rowp->hora_fin;?> <?=$rowp->am_pm_hora_fini;?><br/>
 <strong>Tiempo Quirurgico:</strong> <?=$rowp->tiempo_quirurgico;?>
 </td>
</tr>


<tr>
<td  style="text-align:left"><strong>Diagnostico Pre-Quirurgico:</strong> <?=$rowp->diag_pre_qui;?><br/> <strong>Diagnostico Post-Quirurgico:</strong> <?=$rowp->diag_post_qui;?>
 </td>
</tr>


<tr>
<td  style="text-align:left"><strong>Anestesia:</strong> <?=$rowp->anestesia;?><br/> <strong>Tipo de incisión:</strong> <?=$rowp->incision;?>
</td>
</tr>


<tr>
<td  style="text-align:left"><strong>Cirugía Programada:</strong> <?=$rowp->cirugia_programada;?><br/> <strong>Cirugía Realizada:</strong> <?=$rowp->cirugia_realizada;?></td>
</tr>


<tr>
<td  style="text-align:left"><strong>Hallazgo:</strong> <?=$rowp->hallasgo;?>  </td>
</tr>


<tr>
<td style="text-align:left"><strong>Pronostico Post Quirurgico:</strong> <?=$rowp->pro_post;?> </td>

</tr>
</table>

</div>
<div id="left">
<table class='r-b'  >
<tr>
<td style="text-align:left"><strong>Perdida Sanguínea:</strong> <?=$rowp->perdida_sanguinea;?> CC <br/> <strong>No de Compresas:</strong> <?=$rowp->compresa;?> <br/><strong>No. de Gasas:</strong> <?=$rowp->gasas;?> <br/><strong>Drenes:</strong> <?=$rowp->drenes;?></td>
</tr>

<tr>
<td style="text-align:left"><strong>Transfusión:</strong> <?=$rowp->transfusion;?><br/> <strong>Unids Transfundidas:</strong> <?=$rowp->unids_transfusion;?></td>
</tr>

<tr>
<td style="text-align:left"><strong>Condición del paciente:</strong> <?=$rowp->condicion_paciente;?><br/> <strong>Traslado a:</strong> <?=$rowp->traslado;?></td>
</tr>


<tr>
<td style="text-align:left"><strong>Cirujano::</strong> <?=$rowp->cirujano;?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Ayudante(s):</strong> <?=$rowp->ajudante;?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Ayudante(s) Enfemería:</strong> <?=$rowp->ajudante_enf;?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Muestra(s) Enviada(s) a Patología:</strong> <?=$rowp->muestras_patologia;?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Gastable Utilizado En Sutura:</strong> <?=$rowp->histopatologico;?></td><td> </td>
</tr>
</table>
</div>
<strong>Descripción Del Procedimiento:</strong><br/> <span style="font-size:13px"><?=$rowp->desc_proced;?></span>

<?php
$sql ="SELECT * FROM  hc_quirurgica_patient_images WHERE id_p_a=$rowp->id_patient ORDER BY id DESC";
$queryImg= $this->clinical_history->query($sql);
if($queryImg->num_rows() > 0){
	echo "
	<hr/>
	<table >
	<tr>
	";
foreach($queryImg->result() as $rowImg){?>

<td  style="border:none"><img  style="width:200px;" src="<?= base_url();?>/assets_new/img/description-surgery/<?=$rowImg->folder?>"  /></td>

<?php
}
echo "
</tr>
</table>";

}
?>

<hr/>
</div>
<div id="footer">
<?php
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$id_user)
 ->get('users')->row_array();
  $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
  
     $sello_doc=$this->db->select('sello')->where('doc',$id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:140px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>


<table class='r-b' align="center"  >
<tr>
<td style="text-align:center;border-bottom:1px solid #E6E6E6">
<?php 
$firma_doc="$id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<span style="font-size:7px" ><strong>Firma autorizada y sello del medico:</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>
<?php
$done_date=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
$author = $doc['name'];
$exeq = $doc['exequatur'];
echo "<span style='font-size:10px'>Dr $author, Exeq. $exeq, $area<br/><span style='color:red'>Fecha de creación $done_date</span></span>";
?>
</body>
</html>
