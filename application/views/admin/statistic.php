<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
 <style>
 .table1 { border-collapse: collapse; witdh:100%;font-size: 10px} 
    .tr { border-top: solid 1px gray border-bottom: solid 1px gray; } 
    .td { border-bottom:solid 1px gray;padding: 1em; }
	hyphens: auto;
	th{text-align:left}
</style>
</head>
<body style='text-align:center'>
<h1>ESTADÍSTICA</h1>
<?php 
$medicos=$this->db->select('area')->where('perfil','medico')
->get('users');

?>

<h3>Total Medicos : <?=$medicos->num_rows();?></h3>

<hr/>
<table id='table1' class='table table-striped' align="center">
 <tr class='tr' style="background:#428bca">
<thead>
<th>#</th><th>ESPECIALIDAD</th><th>TOT</th><th>%</th>
</thead>
</tr>
<tbody>
<?php
$i = 1;
$total_sub=0;
$sql ="SELECT area, COUNT(*) AS tot , (COUNT(*) / (SELECT COUNT(*) FROM users WHERE perfil='medico')) * 100 AS percent 
FROM users
WHERE perfil='medico'
GROUP BY area
ORDER BY tot desc";
$query1 = $this->db->query($sql);

foreach($query1->result() as $row)
{
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
	
$total_sub += $row->percent;
?>

<tr class='tr'>
<td class='td'><?php echo $i; $i++ ?></td>
<td class='td'><?=$area?> </td>
<td class='td'><?=$row->tot?> </td>
<td class='td'><?=round($row->percent)?>% </td>
<td></td>
</tr>

<?php
}

?>

<tr class='tr'>
<td class='td'></td>
<td class='td'></td>
<td class='td'> </td>
<td class='td'><?=round($total_sub)?>% </td>
<td></td>
</tr>
</tbody>

</table>

