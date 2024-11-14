
<?php
$sql = "SELECT * from message_to_users where userid=".$this->session->userdata['medico_id'];
$query= $this->db->query($sql);

?>
<table style="background:#FCCDCD" >
<?php
foreach ($query->result() as $row) {
?>
<tr>
<td  style="padding:8px;color:red">GICRE <?=$row->titulo?> (<?=$row->id?>)</td>
 <?php if($row->video !="") {?><td ><a target="_blank" href="<?=$row->video?>" >Explicación en youtube</a></td><?php } ?>
<td  style="padding:8px;"> <a  href="<?=base_url()?>admin_medico/download_update/<?=$row->message?>/<?=$row->id?>">Descargar para ver</a> </td>
</tr>
<?php }?>

</table>

