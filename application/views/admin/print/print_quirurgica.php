<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px gray border-bottom: solid 1px gray; }
    td { border-right: none; border-left: none;padding: 1em; }


strong{font-size:13px}
#wrapper {
  display: flex;
}

#left {
  flex: 0 0 65%;
}

#right {
  flex: 1;
}
</style>
</head>

<?php
foreach ($cirugia_toracico->result() as $rowp)
?>
<div id="wrapper">
<p style="color:red;text-align:right;font-size:10px"><i>fecha de impresión <?=date('d-m-Y h:i A');?></i> </p>
<div id="left">
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong>Hora de Inicio</strong></td><td> <?=$rowp->hora_ini;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Hora Finalizacion</strong></td><td> <?=$rowp->hora_fin;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Tiempo Quirurgico</strong></td><td> <?=$rowp->tiempo_quirurgico;?></td>
</tr>
<tr>
<td  style="text-align:right"><strong>Diagnostico Pre-Quirurgico</strong></td><td>  <?=$rowp->diag_pre_qui;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Diagnostico Post-Quirurgico</strong></td><td> <?=$rowp->diag_post_qui;?></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Anestesia</strong></td><td>  <?=$rowp->anestesia;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Tipo de incision</strong></td><td> <?=$rowp->incision;?></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Cirugia Programada</strong></td><td>  <?=$rowp->cirugia_programada;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Cirugia Realizada</strong></td><td> <?=$rowp->cirugia_realizada;?></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Hallasgo</strong></td><td>  <?=$rowp->hallasgo;?></td>
</tr>


<tr>
<td style="text-align:right"><strong>Pronostico Post Quirurgico</strong></td><td> <?=$rowp->pro_post;?></td>

</tr>
</table>

</div>
<div id="right">
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong>Perdida Sanguinea</strong></td><td> <?=$rowp->perdida_sanguinea;?> CC</td>
</tr>
<tr>
<td style="text-align:right"><strong>No de Compresas</strong></td><td> <?=$rowp->compresa;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>No. de Gasas</strong></td><td> <?=$rowp->gasas;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Drenes</strong></td><td> <?=$rowp->drenes;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Transfusion</strong></td><td> <?=$rowp->transfusion;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Unids Transfundidas</strong></td><td> <?=$rowp->unids_transfusion;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Condicion del paciente</strong></td><td> <?=$rowp->condicion_paciente;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Traslado a</strong></td><td> <?=$rowp->traslado;?></td>
</tr>

<tr>
<td style="text-align:right"><strong>Cirujano:</strong></td><td> <?=$rowp->cirujano;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Ajudante(s)</strong></td><td> <?=$rowp->ajudante;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Ajudante(s) Enfemeria</strong></td><td> <?=$rowp->ajudante_enf;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Muesta(s) Envida(s) a Patologia</strong></td><td> <?=$rowp->muestras_patologia;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Reporte Histopatologico</strong></td><td> <?=$rowp->histopatologico;?></td>
</tr>
</table>
</div>
<table class='r-b' style="width:100%;" >
<tr>
<td style="text-align:right"><strong>Descripcion Del Procedimiento</strong></td><td style="width:100%;font-size:12px" > <?=$rowp->desc_proced;?></td>
</tr>
</table>

<hr/>
</div>
<div id="footer">
<?php
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$rowp->id_user)
 ->get('users')->row_array();
  $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
  
     $sello_doc=$this->db->select('sello')->where('doc',$rowp->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong><i>Dr</strong> <?=$doc['name']?></i></td>
<td style="text-align:right"><strong><i>Exeq.</strong> <?=$doc['exequatur']?></i></td>
<td style="text-align:right"><i><?=$area?></i></td>
<td style="text-align:right;color:red"><?=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));?></i></td>
</tr>

</table>

<table class='r-b' align="center"  >
<tr>
<td style="text-align:center">
<?php 
$firma_doc="$rowp->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<span style="font-size:11px" ><strong>Firma autorizada y sello del medico</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>
</html>
