<?php
	if($id_seguro ==11){
	$display='none'	;
	}else{
	$display=''	;
	}
?>

<h5><u>DETALLE DEL SERVICIO</u></h5>
<strong>MEDICAMENTOS</strong>
<table id='table1' class='table table-striped proced-med' >
<thead>
  <tr class='tr'>
 <th>Fecha</th>
<th>Nombre</th>
<th>Cant.</th>
<th>Precio</th>
<th>SubTot.</th>
<th style='display:<?=$display?>'>Cobertura</th>
<th style='display:<?=$display?>'>Diferencia</th>
<th>Descuento</th>
<th>Tot. Pagar Paciente</th>
</tr>
</thead>

<?php
$total_sub0=0;
$total_cob0=0;
$sum_tot_pag_pat0=0;
$tot_diff0=0;
$tot_discount0=0;

$i = 1;
$sql ="SELECT * FROM hosp_orden_medica_recetas WHERE id_hosp=$id_hosp && canceled=0 ";
$query = $this->db->query($sql);
foreach($query->result() as $row)
{

$med=$this->db->select('name,precio_venta')->where('id',$row->medica)->get('emergency_medicaments')->row_array();


if($row->cobertura ==0.8 && $id_seguro !=11){
$monto=$med['precio_venta'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8 && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=$row->cobertura;
} else{
$monto=$med['precio_venta'];	
$subtot=$monto * $row->cantidad;
$cobet=0;	
}


$total_sub0 += $subtot;
$total_cob0 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff0 +=$diff;
$tot_discount0 +=$row->descuento;
$sum_tot_pag_pat0 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->insert_date));?></td>
<td class='td'><?php echo $med['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($med['precio_venta'],2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$display?>'><?=number_format($cobet,2)?></td>
<td style='display:<?=$display?>' class='td'><?=number_format($diff,2)?></td>

<td >
<?=$row->descuento?></td>

<td class='td'><?=number_format($totpagpat,2)?></td>

</tr>

<?php
}
?>
<tr>
<th colspan='4'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub0,2)?></th>
<th style='display:<?=$display?>'>RD$<?=number_format($total_cob0,2)?></th>
<th style='display:<?=$display?>' class='td'>RD$<?=number_format($tot_diff0,2)?></th>
<th class='td'>RD$<?=number_format($tot_discount0,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat0,2)?></th>
</tr>
<tr >
<th colspan='9' class='bg-gr'></th>

</tr>

<tr>

<th colspan='9' class='bgc'>ESTUDIOS</th>
</tr>
<?php
$total_sub2=0;
$total_cob12=0;
$sum_tot_pag_pat2=0;
$tot_diff2=0;
$tot_descuento2=0;
$total_cob2=0;
$i2=1;
$sql1 ="SELECT estudio, insert_date, cantidad, descuento, cobertura, precio FROM hosp_orden_medica_estudios

WHERE id_hosp=$id_hosp  AND canceled=0 ORDER BY id_i_e DESC";
$query1 = $this->db->query($sql1);
foreach($query1->result() as $row)
{
$data_est=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->estudio)->get('centros_tarifarios')->row_array();
$subtot=floatval($row->precio) * floatval($row->cantidad);
if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}

$total_sub2 += $subtot;
$total_cob2 += $row->cobertura;
$tot_diff2 +=$diff;
$tot_descuento2 +=$row->descuento;
$sum_tot_pag_pat2 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->insert_date));?></td>
<td class='td'><?php echo $data_est['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$display?>'><?=number_format($row->cobertura,2)?></td>
<td style='display:<?=$display?>' class='td'><?=number_format($diff,2)?></td>
<td ><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>

</tr>

<?php
}
?>
<tr>
<th colspan='4'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub2,2)?></th>
<th style='display:<?=$display?>'>RD$<?=number_format($total_cob2,2)?></th>
<th style='display:<?=$display?>' class='td'>RD$<?=number_format($tot_diff2,2)?></th>
<th class='td'>RD$<?=$tot_descuento2?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat2,2)?></th>
</tr>
<tr >
<th colspan='9' class='bg-gr' ></th>

</tr>
<tr>
<th colspan='9' class='bgc'>LABORATORIOS</th>
</tr>
<?php
$total_sub3=0;
$total_cob3=0;
$sum_tot_pag_pat3=0;
$tot_diff3=0;
$tot_descuento3 =0;
$i3=1;
$sql3 ="SELECT laboratory, insert_time, cantidad, descuento, cobertura, precio FROM hosp_orden_medcia_lab 
WHERE id_hosp=$id_hosp  AND canceled=0 ORDER BY id_lab DESC";
$query3 = $this->db->query($sql3);
foreach($query3->result() as $row)
{
	
$data_lab=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->laboratory)->get('centros_tarifarios')->row_array();
$subtot=floatval($row->precio) * floatval($row->cantidad);
if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}	

$total_sub3 += $subtot;
$total_cob3 += $row->cobertura;

$tot_diff3 +=$diff;
$tot_descuento3 +=$row->descuento;
$sum_tot_pag_pat3 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->insert_time));?></td>
<td class='td'><?php echo $data_lab['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>

<td style='display:<?=$display?>'><?=number_format($row->cobertura,2)?></td>
<td class='td' style='display:<?=$display?>'><?=number_format($diff,2)?></td>

<td ><?=$row->descuento?></td>

<td class='td'><?=number_format($totpagpat,2)?></td>

</tr>

<?php
}
?>
<tr>
<th colspan='4'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub3,2)?></th>
<th style='display:<?=$display?>' >RD$<?=number_format($total_cob3,2)?></th>
<th style='display:<?=$display?>'class='td'>RD$<?=number_format($tot_diff3,2)?></th>
<th class='td'>RD$<?=number_format($tot_descuento3,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat3,2)?></th>
</tr>
<tr >
<th colspan='9' class='bg-gr' ></th>

</tr>
<tr>
<th colspan='9' class='bgc'>MATERIAL GASTABLE</th>
</tr>
<?php
$total_sub7=0;
$total_cob7=0;
$sum_tot_pag_pat7=0;
$tot_diff7=0;
$tot_discount7=0;

$i = 1;
$sql4 ="SELECT * FROM  hosp_peticion WHERE idemp=$id_hosp  && canceled=0 ORDER BY id DESC";
$query4= $this->db->query($sql4);
foreach($query4->result() as $row)
{

$mat=$this->db->select('name,precio_venta')->where('id',$row->insumo)->get('emergency_medicaments')->row_array();


if($row->cobertura ==0.8  && $id_seguro !=11){
$monto=$mat['precio_venta'];
$subtot=$monto * $row->cantidad;
$cobet= $subtot *  $row->cobertura;
}else if($row->cobertura !=0.8  && $id_seguro !=11){
$monto=$row->precio;	
$subtot=$monto * $row->cantidad;
$cobet=$row->cobertura;
}else{
	$monto=$mat['precio_venta'];	
$subtot=$monto * $row->cantidad;
$cobet=0;
}


$total_sub7 += $subtot;
$total_cob7 += $cobet;
$totpagpat= $subtot-$cobet-$row->descuento;
$diff=$subtot-$cobet;
$tot_diff7 +=$diff;
$tot_discount7 +=$row->descuento;
$sum_tot_pag_pat7 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $mat['name'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($monto,2)?></td>
<td class='td'><?=number_format($subtot,2)?></td>
<td style='display:<?=$display?>' class='td'><?=number_format($cobet,2)?></td>
<td style='display:<?=$display?>' class='td'><?=number_format($diff,2)?></td>
<td class='td'><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>

</tr>

<?php
}
?>
<tr>
<th colspan='4'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub7,2)?></th>
<th style='display:<?=$display?>'>RD$<?=number_format($total_cob7,2)?></th>
<th style='display:<?=$display?>'class='td'>RD$<?=number_format($tot_diff7,2)?></th>
<th class='td'>RD$<?=number_format($tot_discount7,2)?></th>
<th class='td' id='sum_pat_fac_mat'>RD$<?=number_format($sum_tot_pag_pat7,2)?></th>
</tr>
<tr >
<th colspan='9' class='bg-gr' ></th>

</tr>
<tr>
<th colspan='9' class='bgc'>PROCEDIMIENTO</th>
</tr>

<?php
$total_sub4=0;
$total_cob4=0;
$sum_tot_pag_pat4=0;
$tot_diff4=0;
$tot_descuento4=0;
$sql4 ="SELECT name, inserted_time, cantidad, descuento, cobertura, precio FROM hosp_procedimiento

 WHERE id_hosp=$id_hosp AND canceled=0 ORDER BY id DESC";
$query4 = $this->db->query($sql4);

foreach($query4->result() as $row)
{
$data_pro=$this->db->select('sub_groupo,monto')->where('id_c_taf',$row->name)->get('centros_tarifarios')->row_array();

$subtot=floatval($row->precio) * floatval($row->cantidad);

if($id_seguro !=11){
$diff=floatval($subtot) - floatval($row->cobertura);
$totpagpat= $diff - $row->descuento;
}else{
$diff=$subtot;
$totpagpat= $diff - $row->descuento;	
}

$total_sub4 += $subtot;
$total_cob4 += $row->cobertura;
$tot_diff4 +=$diff;
$tot_descuento4 +=$row->descuento;
$sum_tot_pag_pat4 += $totpagpat;
?>

<tr class='tr'>
<td class='td'><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
<td class='td'><?php echo $data_pro['sub_groupo'];?></td>
<td class='td'><?php echo $row->cantidad;?> </td>
<td class='td'><?=number_format($row->precio,2)?> </td>
<td class='td'><?=number_format($subtot,2)?></td>
<td style='display:<?=$display?>'><?=number_format($row->cobertura,2)?></td>
<td class='td' style='display:<?=$display?>'><?=number_format($diff,2)?></td>
<td ><?=$row->descuento?></td>
<td class='td'><?=number_format($totpagpat,2)?></td>
</tr>

<?php
}
?>
<tr class='bder-gr'>
<th colspan='4'></th>
<th id='updateGtotTm'>RD$<?=number_format($total_sub4,2)?></th>
<th style='display:<?=$display?>'>RD$<?=number_format($total_cob4,2)?></th>
<th style='display:<?=$display?>' class='td'>RD$<?=number_format($tot_diff4,2)?></th>
<th class='td'>RD$<?=number_format($tot_descuento4,2)?></th>
<th class='td'>RD$<?=number_format($sum_tot_pag_pat4,2)?></th>
</tr>



<tr style='background:red;'>
<th colspan='5'></td>
<th style='display:<?=$display?>;color:white' >Total Pagar Seguro</td>
<th style='display:<?=$display?>;color:white' >Total Pagar Diff</th>
<th style='color:white'>Total Pagar Desc</th>
<th style='color:white'>Total Pagar Paciente</th>
</tr>
<?php
$grandeTotalC=$total_cob0 + $total_cob2 + $total_cob4 + $total_cob7 + $total_cob3;

$grandeTotalD=$tot_diff0 + $tot_diff2 + $tot_diff4 + $tot_diff7 + $tot_diff3;

$grandeTotalDes=$tot_discount0 + $tot_descuento2 + $tot_descuento4 + $tot_discount7 + $tot_descuento3;

$grandeTotal=$sum_tot_pag_pat0 + $sum_tot_pag_pat2 + $sum_tot_pag_pat4 + $sum_tot_pag_pat7 + $sum_tot_pag_pat3;

?>


<tr style='color:red'>
<th colspan='5'></th>
<th style='display:<?=$display?>'>RD$<?=number_format($grandeTotalC,2)?></th>
<th style='display:<?=$display?>'>RD$<?=number_format($grandeTotalD,2)?></th>
<th>RD$<?=number_format($grandeTotalDes,2)?></th>
<th>RD$<?=number_format($grandeTotal,2)?></th>
</tr>

</table>
<hr/>


