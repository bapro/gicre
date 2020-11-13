
<?php
$sql = "SELECT * from message_to_users where userid=$id_usr";
$query= $this->db->query($sql);

?>
<table style="background:#FCCDCD" >
<?php
foreach ($query->result() as $row) {
?>
<tr>
<td  style="padding:8px;color:red">GICRE versión : <?=$row->titulo?></td>
 <?php if($row->video !="") {?><td ><a target="_blank" href="<?=$row->video?>" >Explicación en youtube</a></td><?php } ?>
<td> <a  href="<?=base_url()?>admin_medico/download_update/<?=$row->message?>/<?=$row->userid?>">Descargar el documento de actualización</a></td>
</tr>
<?php }?>

</table>

