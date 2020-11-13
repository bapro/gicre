<?php 
$sqlm ="SELECT * FROM municipe WHERE id=$mun_id";
$querym = $this->db->query($sqlm);

?>

<table class="table" style='font-size:11px'>
<?php 
foreach($querym->result() as $rowm){
?>
<tr>
<th>Foto</th>
<td>
 <?php
if($rowm->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($rowm->photo==""){
?>
<img  width="50" height="50"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	?>
<img  width="50" height="50"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $rowm->photo; ?>"  />
<?php

}
?>

</td>
</tr>
<tr>
<th> NOMBRES</th>
<td>
<?=$rowm->nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<?=$rowm->cedula?>
</td>
</tr>
<tr>
<th> TELEFONO</th>
<td>
<?=$rowm->telefono?>
</td>
</tr>
<tr>
<th> DIRECCION</th>
<td>
<?=$rowm->direccion?>
</td>
</tr>
<tr>
<th> MESA</th>
<td>
<?=$rowm->mesa?>
</td>
</tr>

<tr>
<th> SECTOR</th>
<td>
<?=$rowm->sector?>
</td>
</tr>


  <tr>
    <td><input type="submit" value="EDITAR" class="btn btn-primary btn-xs" /></td><td></td>
  </tr>
  <?php 
}
?>
</table>