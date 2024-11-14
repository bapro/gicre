<style>
#absolute-element-footer2 {
	position: fixed;
	bottom: 10px;
	left: 0;       
}

@media print {
   #break-after {
        page-break-after: always;
		
    }
}
</style>
<?php

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

if($table=='h_c_indicaciones_medicales'){
 foreach($query_rows as $rows)
	 $inserted_timerec= date("d-m-Y H:i:s", strtotime($rows->insert_time));
?>
<table  style="width:100%;" border="1">
<tr>
<td colspan="4" ></td><td color="red"><?=$inserted_timerec?></td>
</tr>
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Presentacion</strong></td>
<td ><strong>Frecuencia</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>Cantidad (dias)</strong></td>
</tr>
<?php foreach($query_rows as $row)

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
<?php
}elseif($table=="h_c_indications_labs"){
echo "<br><br>";
	 $inserted_timelab = date("d-m-Y H:i:s", strtotime($registerInfo['insert_time']));
 echo "<span style='color:red;font-size:10px'>$inserted_timelab</span><br/>";
	echo "<table >
	<tr>
	<td>
	";
	 $i=0;
	 foreach($partlab1->result() as $row1)
	  {	  
	$i++;
$lab=$this->clinical_history->select('name')->where('id',$row1->laboratory)
  ->get('laboratories')->row('name');
	 echo "$i-" . $lab. ' <br/>';	
 
	 }
	 echo "</td>";
	 $count_numlab= $partlab1->num_rows();
	 ?>
	 <td style="vertical-align:top">
	 
	 <?php
  foreach($partlab2->result() as $row2)
	  {	  
	$i++;
$lab=$this->clinical_history->select('name')->where('id',$row2->laboratory)
  ->get('laboratories')->row('name');
	 echo "$i-" . $lab. ' <br/>';	
 
	 }
 ?>
	 
	 
	 </td>
	 </tr>
	 </table>
<?php	 
} else {

echo "<br><br>";

 ?>
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
    <?php foreach($query_rows as $row)
	 
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




<?php } ?>






<div id="absolute-element-footer2">
<table style="border:none;width:100%"> 
<tr>
<td style="border:none;">

</td>
<td  style="border:none"> </td>
<td  style="border:none"></td>

<td style="border:none">
<?php 
$firma_doc="$id_user-1.png";

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
</div> 

<?php $mpdf->setFooter("Dr $author, Exeq. $exequatur, $especialidad");?>
</p>


