<table class="table" style="font-size:14px" >
<?php 
$i = 1;
foreach($RESULT_CENTRO as $row)

?>
<tr>
<th style="text-align:right"><label>#</label></th><td id="centro_id"> <?=$row->id_m_c;?></td>
</tr>
<!--<tr>
<th style="text-align:right"> <label>Nombres</label></th><td title="<?=$row->name?>"><input class="form-control pter"  type="text"  value="<?=$row->name?>" class="pter"/></td>
</tr>-->
<tr>
<th style="text-align:right"> <label>Logo</label></th><td><img class="img" style="display:block; width:100%; height:130px;" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $row->logo; ?>"  /></td>
</tr>
<tr>
<th style="text-align:right"><label>RNC</label></th><td><input class="form-control pter"  type="text" value="<?=$row->rnc?>" class="pter"/></td>
</tr>

<tr>
<th style="text-align:right"><label>Medicos</label> Total (<?=$count?>)</th>
<td>
<ol style="background:white;border:1px solid #38a7bb;font-size:13px">
<?php foreach($RESULT_DOCTOR as $c_m_s)

{
	
?>
<li style="text-transform:uppercase"><?=$c_m_s->first_name;?></li><br/>
<?php
}
?>
</ol>
</td>
</tr>
</table>