
<div class="tab-pane active" id="medicamentos">
<?php if (empty($drugStoreMedica))
{
	
echo"<div class='alert alert-warning'>  No hay medicamentos  registrados para esta farmacia. </div>";
?>

<?php
}
else{
$cpt="";	
?>
<div style="overflow-x:auto;">
<span style="font-size:12px;"><b><i>Total : <?=$count1?></i></b></span>
<table id="example" class="table table-striped table-bordered" style="font-size:14px" cellspacing="0" >
<tr style="background:#38a7bb;color:white">
<th>NEC</th>
<th>Paciente</th>
<th>Fecha</th>
<th>Medicamento</th>
<th>Presentacion</th>
<th >Frecuencia</th>
<th >Via</strong></th>
<th style="width:5px;font-size:10px;color:white">Cantidad (dias)</th>
<th >Operador</th>
</tr>

<?php foreach($drugStoreMedica as $row2)

{
$paciente=$this->db->select('nombre,id_p_a')->where('id_p_a',$row2->historial_id )
->get('patients_appointments')->row_array();
$doctor=$this->db->select('name')->where('id_user',$row2->operator)
   ->get('users')->row('name');
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
<td>NEC-<?=$paciente['id_p_a'];?></td>
<td style="text-transform:uppercase"><?=$paciente['nombre'];?></td>
<td><?=$row2->insert_date;?></td>
<td><?=$row2->medica;?></td>
<td><?=$row2->presentacion;?></td>
<td><?=$row2->frecuencia;?></td>
<td><?=$row2->via;?></td>
<td><?=$row2->cantidad;?></td>
<td><?=$doctor;?></td>
</tr> 

<?php
}

?>

</table>
</div>
<?php
}
?>
</div><!--centro medico end-->


