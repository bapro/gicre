<?php $this->padron_database = $this->load->database('padron',TRUE);
if($unique==2){
?>
<?php if($querym->result() !=NULL) {?>

<table class="table" style='font-size:11px'>
<thead>
<tr><th>Foto</th><th>Nombres</th><th>Cedula</th><th>Telefono</th></tr>
</thead>
<?php foreach ($querym->result() as $rowm) { ?>
<tr>
<td>
 <?php
 
 $eced1 = substr($rowm->cedula, 0, 3);
$eced2 = substr($rowm->cedula, 3, 7);
$eced3 = substr($rowm->cedula, -1);
 
if($rowm->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$eced1)
->where('SEQ_CED',$eced2)
->where('VER_CED',$eced3)
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
<td style='font-size:11px'><?=$rowm->nombres?></td>
<td style='font-size:11px'> <a  href="<?php echo base_url("alcalde/member_selected/$rowm->cedula")?>"><?=$rowm->cedula?></a></td>
<td style='font-size:11px'> <?=$rowm->telefono?> <span style="color:blue;pointer:cursor" title="Direccion : <?=$rowm->direccion?> &#013 Mesa : <?=$rowm->mesa?> &#013 Sector : <?=$rowm->sector?>" ><i class="fa fa-plus"></i></span></td>

</tr>
<?php }?>
</table>
<?php }else{
	echo "<span style='color:red'><i>No hay municipe por el supervisor</i></span>";
}?>
<?php }else{
	if($querym->result() !=NULL){
	foreach ($querym->result() as $rowm)
$vced1 = substr($rowm->cedula, 0, 3);
$vced2 = substr($rowm->cedula, 3, 7);
$vced3 = substr($rowm->cedula, -1);
	?>

 <div class="col-md-2">
 <?php
if($rowm->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($rowm->photo==""){

?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{

	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $rowm->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-10">
<table class="table" style='font-size:11px'>

<tr>
<th> NOMBRES</th>
<td>
<?=$rowm->nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<a  href="<?php echo base_url("alcalde/member_selected/$rowm->cedula")?>"><?=$rowm->cedula?></a>
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

</table>
	<?php }else{
		
		echo "<span style='color:red'>no hay, buscarlo en el buscador</span>";
	}?>
<br/><br/>
</div>

<?php }?>