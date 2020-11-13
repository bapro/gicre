<?php $this->padron_database = $this->load->database('padron',TRUE);
 if($querym->result() !=NULL){

?>

 <div class="col-md-2">
 <?php
 if($querym->result() !=NULL)
foreach ($querym->result() as $row) 

$vced1 = substr($row->cedula, 0, 3);
$vced2 = substr($row->cedula, 3, 7);
$vced3 = substr($row->cedula, -1);

 	$nombres=$row->nombres;
	$telefono=$row->telefono;
	$cedula=$row->cedula;
	$direccion=$row->direccion;
	$mesa=$row->mesa;
	$id=$row->id;
	$sector=$row->sector;
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($row->photo==""){
$readonlyag="";
?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-10">
<table class="table" style='font-size:11px'>

<tr>
<th> NOMBRES</th>
<td>
<?=$nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<a  href="<?php echo base_url("alcalde/member_selected/$cedula")?>"><?=$cedula?></a>

</td>
</tr>
<tr>
<th> TELEFONO</th>
<td>
<?=$telefono?>
</td>
</tr>
<tr>
<th> DIRECCION</th>
<td>
<?=$direccion?>
</td>
</tr>
<tr>
<th> MESA</th>
<td>
<?=$mesa?>
</td>
</tr>

<tr>
<th> SECTOR</th>
<td>
<?=$sector?>
</td>
</tr>


  <tr>
    <td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit_member" href="<?php echo base_url("alcalde/edit_member/$row->id/$vced1/$vced2/$vced3/$tablemember")?>">
Editar
</a></td><td></td>
  </tr>
</table>
</div>

 <?php }else{
	echo"<span style='color:red;font-size:13px'><i>No hay</i></span>"; 
 }?>
<!--
<table class="table" style='font-size:11px'>
<thead>
<tr><th>Foto</th><th>Nombres</th><th>Cedula</th><th>Telefono</th><th style="color:green">COORDINADOR</th></tr>
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
<td style='font-size:11px'> 
<a  href="<?php echo base_url("alcalde/member_selected/$rowm->cedula")?>"><?=$rowm->cedula?></a>
</td>
<td style='font-size:11px'> <?=$rowm->telefono?> <span style="color:blue;pointer:cursor" title="Direccion : <?=$rowm->direccion?> &#013 Mesa : <?=$rowm->mesa?> &#013 Sector : <?=$rowm->sector?>" ><i class="fa fa-plus"></i></span></td>
<td style='font-size:11px'>
<?php 
$value=$this->db->select('super_id')->where('super_id',$rowm->id)->get('soto_coordinador')->row('super_id');
 if($value !=""){
 ?>
<a  data-toggle="modal" data-target="#ver_cood" href="<?php echo base_url("alcalde/ver_cood/$rowm->id")?>">
ver 
</a>
<?php }?>
</td>
</tr>
<?php }?>
</table>
-->

<div class="modal fade" id="ver_cood"  role="dialog" >
<div class="modal-dialog" >
<div class="modal-content" >

</div>
</div>
</div>


<script>
$('#ver_cood').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
</script>