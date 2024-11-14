<style>
#absolute-element-footer2 {
	position: fixed;
	bottom: 10px;
	left: 0;       
}
</style>
<?php
 foreach($query_rows as $rows)
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

if($table=='h_c_indicaciones_medicales'){
?>
<table  style="width:100%;" border="1">
<tr>
<td colspan="4" ></td><td color="red"><?=$inserted_time;?></td>
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
}else{
echo "<p style='text-align:left;font-size:13px'>";
 foreach($query_rows as $rowfecha)
 $inserted_timelab = date("d-m-Y H:i:s", strtotime($rowfecha->updated_time));
 echo "<span style='color:red'>$inserted_timelab</span><br/>";
 $i=0;
 foreach($query_rows as $row)
	  {	  
	$i++;
$lab=$this->clinical_history->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
	 echo "$i-" . $lab. ' &nbsp;';	
 
	 }
echo "</p>";	
}?>
<div id="absolute-element-footer2">
<table style="border:none;width:100%"> 
<tr>
<td style="border:none;">

</td>
<td  style="border:none"> </td>
<td  style="border:none"></td>

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
</div> 
<?php $mpdf->setFooter("Dr $author, Exeq. $exequatur, $especialidad");?>


