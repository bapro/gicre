<table class="table table-striped table-bordered" style="font-size:15px">
<tr style="background:#E2FDFB" >
<th># </th>
<th style="width:370px;text-aling :center">FECHA</th>
<th style="text-aling :center">MEDICO</th>
</tr>
<?php 
$i=1;
$cpt="";
foreach($get_lab_name as $row)
{
$insert_date = date("d-m-Y H:i:s", strtotime($row->insert_time));	
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor="<?=$colorBg ;?>">
<td><?=$i;$i++;?></td>
<td style="text-aling :center"><?=$insert_date?></td>
<td style="text-aling :center"><?=$row->operator?></td>
</tr>
<?php } ?>
</table>