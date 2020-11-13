<table class="table table-striped table-bordered" style="font-size:12px">
<tr style="background:#E2FDFB">
<th class="table-center-all" ># </th>
<th class="table-center-all" style="width:200px;text-aling :center">FECHA</th>
<th class="table-center-all">PRESENTACION</th>
<th class="table-center-all">FRECUENCIA</th>
<th class="table-center-all"><strong>VIA</strong></th>
<th class="table-center-all">CANTIDAD (dias)</th>
<th class="table-center-all" style="text-aling :center">MEDICO</th>
</tr>
<?php
$i=1;
$cpt="";
//$sql ="SELECT * FROM indicaciones_medicales where historial_id = '$id_patient' AND medica = '$med_name'";
//$query = $this->db->query($sql);
//foreach($query->result() as $row) 
foreach($get_med_name as $row)
{

$insert_date = date("d-m-Y H:i:s", strtotime($row->insert_date));	
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
<td class="table-center-all"><?=$i;$i++;?></td>
<td class="table-center-all"style="text-aling :center"><?=$insert_date?></td>
<!--<td style="text-aling :center"><?=$row->operator?></td>-->
<td class="table-center-all"><?=$row->presentacion;?></td>
<td class="table-center-all"><?=$row->frecuencia;?></td>
<td class="table-center-all"><?=$row->via;?></td>
<td class="table-center-all"><?=$row->cantidad;?></td>
<td class="table-center-all"><?=$row->operator?></td>
</tr>
<?php } ?>
</table>