<?php
 foreach($print_recetas->result() as $rows)
$author=$this->db->select('name')->where('id_user',$rows->user)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($rows->inserted_time));
$doc=$this->db->select('exequatur,area')->where('id_user',$rows->user)->get('users')->row_array();
$exequatur=$doc['exequatur'];
$area=$doc['area'];
$especialidad=$this->db->select('title_area')->where('id_ar',$area)->get('areas')->row('title_area');
?>
<table  style="width:100%;" border="1">
<tr style="background:rgb(192,192,192);color:white">
<th style="font-size:10px;">Medicamento</th>
<th style="font-size:10px;">Cant.</th>
<th style="font-size:10px;">Via</th>
<th style="font-size:10px">Cada</th>
<th style="font-size:10px;">Nota</th>
</tr>
<?php foreach($print_recetas->result() as $row)
{
$name=$this->db->select('nombre')->where('id',$row->name)->get('emergency_almanacen_gnrl')->row('nombre');
?>
<tr>
<td style="font-size:12px"><?=$name;?>(<?=$row->tipo?>)</td>
<td style="font-size:12px"><?=$row->cantidad?></td>
<td style="font-size:12px"><?=$row->via?></td>
<td style="font-size:12px"><?=$row->cada;?></td>
<td style="font-size:12px"><?=$row->nota;?></td>

</tr>

<?php
}
?>

</table>  

<p style="font-size: 9px">Dr <?=$author;?>, Exeq. : <?=$exequatur;?><br/>
<?=$especialidad;?><br/>
<span style="color:red"><?=$inserted_time;?></span>
</p> 
