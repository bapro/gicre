<br/>
<?php foreach($print_recetas as $rows)
$inserted_time = date("d-m-Y H:i:s", strtotime($rows->updated_time));
$exequatur=$this->db->select('exequatur')->where('first_name',$user_id)->get('doctors')->row('exequatur');
$especialidad=$this->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');

?>

<h5><?=$inserted_time;?></h5>
<table  style="width:100%;font-size:13px" border="1">
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Frecuencia</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>Cantidad (dias)</strong></td>
</tr>
<?php foreach($print_recetas as $row)

{
?>
<tr>
<td><?=$row->medica;?></td>
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
<br/>   <br/>  
<hr/>
<p>Dr <?=$rows->updated_by;?></p> 
<p>Exequatur : <?=$exequatur;?></p> 
<p>Especialidad : <?=$especialidad;?></p> 