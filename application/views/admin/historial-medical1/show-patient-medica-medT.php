<div style="margin:auto;">
<?=count($users);?>

  <a  href='<?= base_url() ?>update_user/exportCSVbill'>Export</a><br><br>

<table style="margin:auto;width:50%">

<tr>
<th>Nombres</th>
<th>Perfil</th>
</tr>

<?php foreach($users as $row)

{
	
?>
<tr>

<td style="text-transform:uppercase"><?=$row->name;?></td>
<td><?=$row->perfil;?></td>
</tr>

<?php
}
?>
   
</table>
</div>