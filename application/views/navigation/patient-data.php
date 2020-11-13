<style>
 table.center {
    margin-left:auto; 
    margin-right:auto;
  }
</style>

<table class="table table-striped center" style='width:65%;' >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Fecha de nacimiento</th>
<th>Cedula</th>
<th>NEC</th>

</tr>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";
foreach($patient_admedicall as $row)
{

$nacer2 = date("d-m-Y", strtotime($row->date_nacer));
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
<td> 

<?php


if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="70" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($row->photo==""){
	
}
else{
	?>
<img  width="70" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>

</td>
<td><?=$row->nombre ?> </td>
<td><?=$nacer2;?></td>
<td><?=$row->cedula;?></td>
<td><?=$row->nec1;?></td>

</tr>
<?php
}
?>
</table>