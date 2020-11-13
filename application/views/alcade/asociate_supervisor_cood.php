<?php $this->padron_database = $this->load->database('padron',TRUE);
$sql1 ="SELECT * FROM soto_supervisor  WHERE id=$super_id";
$querysup = $this->db->query($sql1);
 foreach ($querysup->result() as $rowsup)
 
  $vced1 = substr($rowsup->cedula, 0, 3);
$vced2 = substr($rowsup->cedula, 3, 7);
$vced3 = substr($rowsup->cedula, -1);
 
?>

<h4>SUPERVISOR</h4>
 <div class="col-md-2">
 <?php
if($rowsup->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';

} 
else if($rowsup->photo==""){

?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{

	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $rowsup->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-7">
<table class="table" style='font-size:11px'>

<tr>
<th> NOMBRES</th>
<td>
<?=$rowsup->nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<?=$rowsup->cedula?>
</td>
</tr>
</table>
<BR/><BR/>
</div>

<h4>COORDINADORES</h4>
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