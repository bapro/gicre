<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px black border-bottom: solid 1px black; }
    td { border-right: none; border-left: none; }
 
	 div.footer-firma {
      position: absolute;
      width: 80%;
      bottom: 80px;
    }
 
 .center-pat-img {
   width:75px;
   height:75px;
   object-fit:cover;
   object-position:50% 50%;
  }
  .im-bg tr td{font-size:12px}
</style>
</head>

<?php

$centro=$this->db->select('name,logo,calle,barrio,primer_tel,segundo_tel,rnc,provincia,municipio')->where('id_m_c',$id_m_c)->get('medical_centers')->row_array(); 

$provinciacent=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipiocent=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');


?>

<table  id='header-table' style="width:100%" >
<tr>
<td>
<img class="img "  style="width:100px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />
<h3  align="center"> <?=$centro['name']?></h3>
<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provinciacent?>, <?=$muncipiocent?> </p>
</td>

</tr>
</table>
<br/>