<div class="container"> 
<div class="col-md-6"  >
<?php echo '<a class="btn btn-primary btn-xs" href="'.base_url().'alcalde" >CREAR MUNICIPIO</a>';?>
<h4 class="alert alert-info">SUPERVISOR <i class="fa fa-angle-double-right"></i></h4>
<table class="table  table-striped" style='font-size:11px'>

<tr>
<th>Foto</th>
<td>
<?php 
$ced1 = substr($supervisor['cedula'], 0, 3);
$ced2 = substr($supervisor['cedula'], 3, 7);
$ced3 = substr($supervisor['cedula'], -1);

?>


 <?php
$this->padron_database = $this->load->database('padron',TRUE);
if($supervisor['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ced1)
->where('SEQ_CED',$ced2)
->where('VER_CED',$ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($supervisor['photo']==""){
?>
<img  width="50" height="50"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	?>
<img  width="50" height="50"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $supervisor['photo']; ?>"  />
<?php

}
?>





</td>
</tr>
<tr>
<th> NOMBRES</th>
<td>
<?=$supervisor['nombres']?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<?=$supervisor['cedula']?>
</td>
</tr>

</table>
<?php
$id=$supervisor['id'];

$sqlm ="SELECT * FROM soto_coordinador WHERE super_id=$id";
$querym = $this->db->query($sqlm);

?>
<h4 class="alert alert-info">COORDONADOR</h4>
<div style="overflow-x:auto;">
<table class="table  table-striped" style='font-size:11px'>
<thead>
<tr>
<th>FOTO</th>
<th>NOMBRES</th>
<th>CEDULA</th>
<th></th>
</tr>
</thead>

<?php

foreach($querym->result() as $rowm){
?>
<tr>
<td>
<?php

$_ced1 = substr($rowm->cedula, 0, 3);
$_ced2 = substr($rowm->cedula, 3, 7);
$_ced3 = substr($rowm->cedula, -1);

if($rowm->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$_ced1)
->where('SEQ_CED',$_ced2)
->where('VER_CED',$_ced3)
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
<td><?=$rowm->nombres?></td>
<td><?=$rowm->cedula?></td>
</tr>
<?php } ?>
</table>
</div>

</div>

<?php $this->load->view('alcade/busquador');?>

<div class="col-md-12"> 

<div id="patientdata"> </div>
</div>

<br/><br/>	<br/>
