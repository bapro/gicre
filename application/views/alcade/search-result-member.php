
<style>
td,th{text-align:left;font-size:11px}
</style>

<h3 style="color:green"><?=$member?> <i class="fa fa-angle-double-right"></i></h3>
 <div class="col-md-2">
 <?php
 $this->padron_database = $this->load->database('padron',TRUE);
foreach ($search->result() as $rowf) 
 $vced1 = substr($rowf->cedula, 0, 3);
$vced2 = substr($rowf->cedula, 3, 7);
$vced3 = substr($rowf->cedula, -1);
if($rowf->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($rowf->photo==""){
$readonlyag="";
?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $rowf->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-4">
<table class="table" style='font-size:11px'>

<tr>
<th> NOMBRES</th>
<td>
<?=$rowf->nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<?=$rowf->cedula?>
</td>
</tr>
<tr>
<th> TELEFONO</th>
<td>
<?=$rowf->telefono?>
</td>
</tr>
<tr>
<th> DIRECCION</th>
<td>
<?=$rowf->direccion?>
</td>
</tr>
<tr>
<th> MESA</th>
<td>
<?=$rowf->mesa?>
</td>
</tr>

<tr>
<th> SECTOR</th>
<td>
<?=$rowf->sector?>
</td>
</tr>

<tr>
<th> RECINTO</th>
<td>
<?=$rowf->recinto?>
</td>
</tr>
  <tr>
    <td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit_member" href="<?php echo base_url("alcalde/edit_member/$rowf->id/$vced1/$vced2/$vced3/$tablemember")?>">
Editar
</a></td><td></td>
  </tr>
</table>
</div>