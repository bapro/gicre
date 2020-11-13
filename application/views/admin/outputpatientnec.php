<div class="tab-content"  style="margin-left:6%" >
<?php if(!empty($necpatient ))  
{ ?>
<table class="table table-striped table-bordered" >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Direccion</th>
<th>Nueva cita</th>
</tr>
<?php
$cpt="";
foreach($necpatient as $row)
{
	setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$nacer2 = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->date_nacer)));	

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td>   </td>
<td><?=$row->nombre ?> </td>
<td><?=$row->cedula;?></td>
<td><?=$nacer2;?></td>
<td><?=$row->calle;?></td>
<td><a href="<?php echo base_url("admin/Patient/$row->id_p_a")?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a></td>
</tr>
<?php
}
?>
</table>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:20%">NEC no encontrado</i> <a href="" id="displaycita">Mostrar el formulario de cita</a>'; 
}	
?>
</div>

</form>
</div>

