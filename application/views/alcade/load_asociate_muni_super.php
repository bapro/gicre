<?php $this->padron_database = $this->load->database('padron',TRUE);

if($querym->result() !=NULL){
?>

<table class="table" style='font-size:11px'>
<thead>
<tr><th>Foto</th><th>Nombres</th><th>Cedula</th><th>Telefono</th><th style="color:green">COORDINADOR</th></tr>
</thead>
<?php
 foreach ($querym->result() as $rowm) { ?>
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
<?php }else{
	
	echo "<span style='color:red;font-size:13px'><i>No hay spervisores para este muncipe</i></span>";
}?>

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