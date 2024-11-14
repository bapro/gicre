<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px} 
    tr { border-top: solid 1px gray border-bottom: solid 1px gray; } 
    td { border-right: none; border-left: none;padding: 1em; }
	hyphens: auto;
</style>
</head>
<?php
if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:190px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}?>
<table class="table" style="width:100%;font-size:10px" border="1">
<tr>
<td colspan='3'></td><td style="color:red;text-align:right"><?=date("d-m-Y H:i:s", strtotime($insert_time));?></td>
</tr>
    <tr style="background:rgb(192,192,192);color:white">
	   <td><strong>Estudio</strong></td>
		 <td><strong>Parte del cuerpo</strong></td>
		  <td><strong>Lateralidad</strong></td>
        <td><strong>Observaciones</strong></td>
	 </tr>
    <?php foreach($estudios as $row)
	 
	 {
	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	 ?>
        <tr>
		
		<td valign="top"><?=$row->estudio;?></td>
		<td valign="top"><?=$row->cuerpo;?></td>
		<td valign="top"><?=$row->lateralidad;?></td>
		<td valign="top"><?=$row->observacion;?></td>
	  </tr>
		
	 <?php
	 }
	 ?>
       
</table>     
 

<table style="border:none"> 
<tr>
<td style="border:none">

<?php 
$firma_doc="$id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:500px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>

</td>
<?=$sello?>
</tr>
</table> 

<?php $mpdf->setFooter("Dr ". $author. ", Exeq.". $exequatur. ", ". $especialidad);?>
