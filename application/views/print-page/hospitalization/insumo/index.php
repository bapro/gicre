<div class='hr'>
 <?php
 $totorden = $querydatasave->num_rows();
 $insum=$totorden + 1;
	  
	  
      foreach($querydatasave->result() as $rowds){
	
$sqlrs = "SELECT $table_insumo.id AS idp,
 $table_insumo.cantidad AS cant, 
$table_insumo.updated_time AS upt,
$table_insumo.centro AS cent,
$table_insumo.insumo AS medId,
$table_insumo.id_user AS idus, $table_insumo.id AS id_insumo FROM $table_insumo 

WHERE link=$rowds->id";
$queryresult= $this->hospitalization_emgergency->query($sqlrs);


?>
<hr/>
<span style='color:red'>ORDEN #<?php echo $rowds->id?></span>

<table  style="width:100%" >
<thead>
<tr class="trbgc" >
<td><strong>Insumo</strong></th>
<td><strong>Cantidad</strong></th>
<td><strong>Fecha</strong></th>
<td><strong>usuario</strong></th>
</tr>
</thead>
<tbody>
<?php
foreach($queryresult->result() as $rowrs){
$time = date("d-m-Y H:i:s", strtotime($rowrs->upt));
$user=$this->db->select('name')->where('id_user',$rowrs->idus)->get('users')->row('name');

if(is_numeric($rowrs->medId)){
$med_name2=$this->db->select('sub_groupo')->where('id_c_taf',$rowrs->medId)->get('centros_tarifarios_test')->row('sub_groupo');
}else{
$med_name2=$rowrs->medId;	
}
?>
<tr>
<td><?=$med_name2?></td>
<td><?=$rowrs->cant?></td>
<td><?=$time?></td>
<td><?=$user?></td>

</tr>
<?php } ?>
</tbody>
</table>
<?php	
}
echo '</div>';
?>
<div style="font-size:11px; color:red;text-align:right">
<?php echo "Usuario $doctor, Página {PAGENO} de {nb}";?>
</div>