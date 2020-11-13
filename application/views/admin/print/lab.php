<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>


</style>
</head>

<?php
foreach($IndicacionesLab as $rows)
$author=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($rows->updated_time));
$doc=$this->db->select('exequatur,area')->where('id_user',$rows->updated_by)->get('users')->row_array();
$exequatur=$doc['exequatur'];
$area=$doc['area'];
$especialidad=$this->db->select('title_area')->where('id_ar',$area)->get('areas')->row('title_area');

$sello_doc=$this->db->select('sello')->where('doc',$rows->updated_by)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}


?>
<table style="width:100%;border:none">
 <?php foreach($IndicacionesLab as $row)
	  {?>
<tr>
<?php
	$lab=$this->db->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
	 echo '<td style="border:none">' . $lab. '</td>';	
 
	 ?>
</tr>
	  <?php }?>
</table>

<table style="border-top:1px solid"> 
<tr>
<td style="border:none;font-size: 12px">
<strong>Dr <?=$author;?></strong>, Exeq. : <?=$exequatur;?><br/>
<?=$especialidad;?><br/>
<span style="color:red"><?=$inserted_time;?></span>

</td>
<td style="border:none">

<?php 
$firma_doc="$rows->updated_by-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>

</td>
<?=$sello?>
</tr>
</table> 


