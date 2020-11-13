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
 foreach($print_recetas as $rows)
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
<table  style="width:100%;" border="1">
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Presentacion</strong></td>
<td ><strong>Frecuencia</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>Cantidad (dias)</strong></td>
</tr>
<?php foreach($print_recetas as $row)

{
?>
<tr>
<td>
<strong><?=$row->medica;?></strong>
<br/>
<span style="font-size:11px"><i><?=$row->dosis;?></i></span>
</td>
<td><?=$row->presentacion;?></td>
<td><?=$row->frecuencia;?></td>
<td><?=$row->via;?><br/><?=$row->oyo;?></td>
<td>
<?php
if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
?>
</td>

</tr>

<?php
}
?>

</table>  
<table style="border:none;width:100%"> 
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



