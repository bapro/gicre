<style>
table.table-registo-sol-inter-doc tr th{
font-size:12px;text-align:right	
}
table.table-registo-sol-inter-doc tr td{
font-size:12px	
}
</style>


<?php if($editUser !=NULL) {
foreach($editUser as $row)?>

<table  class='table table-registo-sol-inter-doc' style='background:#DFC9C9'> 

<tr>
<th ><?=$user?></th>
<td><?=$row->name?></td>

<th>Exeq.</th>
<td>
<?=$row->exequatur?>
</td>


<th>Espe.</th>
<td>
<?php

echo $row->area;
?>
 </td>
 
 <?php
 if($fecha !='30-11--0001 00:00:00'){
 
?>
 <th><?=$fecha_title?></th>
<td>
<?php

echo $fecha;
?>
 </td>
 <?php
}
?>
 </tr>	
 
</table>
<?php
}
?>
