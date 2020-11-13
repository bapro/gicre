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


<?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>


<th>Firma</th>
<td>

<img  class="img-fluid" style="width:150px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />

</td>


<?php
}

$sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {?>

<th>Sello</th>
<td style='text-align:left'>
<img  style="width:150px;" class="" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
</td>


<?php
} 
?>


<th>Exeq.</th>
<td>
<?=$row->exequatur?>
</td>


<th>Espe.</th>
<td>
<?php
$esp=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row('title_area');
echo $esp;
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
