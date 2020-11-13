<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral"></link>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%; align-self: center;font-size:9px} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }
	
	#div {
  display: flex;
  justify-content: center;
}
p{text-align:center}

</style>
</head>
 <?php

 $paciente=$this->db->select('nombre')->where('id_p_a',$id_historial)
 ->get('patients_appointments')->row('nombre'); 
 
?>
<body >
<div>
<p><?=$title?></p>
<p><?=$paciente?><p>
<br/><br/>
<?php
 foreach($print_recetas as $rows)
$author=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($rows->updated_time));
$doc=$this->db->select('exequatur,area')->where('id_user',$rows->updated_by)->get('users')->row_array();
$exequatur=$doc['exequatur'];
$area=$doc['area'];
$especialidad=$this->db->select('title_area')->where('id_ar',$area)->get('areas')->row('title_area');
?>
<table   style="width:100%">
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Presentacion</strong></td>
<td ><strong>Frec.</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>dias</strong></td>
</tr>
<?php foreach($print_recetas as $row)

{
?>
<tr>
<td style='text-transform:lowercase;'>
<strong><?=$row->medica;?></strong>
<br/>
<span style="font-size:11px"><i><?=$row->dosis;?></i></span>
</td>
<td style='text-transform:lowercase;'><?=$row->presentacion;?></td>
<td style='text-transform:lowercase;'><?=$row->frecuencia;?></td>
<td style='text-transform:lowercase;'><?=$row->via;?><br/><?=$row->oyo;?></td>
<td style='text-transform:lowercase;'>
<?php
if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
?>
</td>

</tr>

<?php
}
?>

</table>  

<p style="font-size: 9px">Dr <?=$author;?>, Exeq. : <?=$exequatur;?><br/>
<?=$especialidad;?><br/>
<span style="color:red"><?=$inserted_time;?></span>
</p> 
</div>
</body>
</html>
