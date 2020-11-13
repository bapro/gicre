<table class="table" style="font-size:14px" >
<?php 
$i = 1;
foreach($RESULT_DOCTOR as $row)
$area=$this->db->select('title_area')->where('id_ar',$row->area )
->get('areas')->row_array();
?>
<tr>
<th><label>Medico</label></th><td><input class="form-control pter"  type="text"  value="<?=$row->first_name?>  <?=$row->last_name?>" class="pter"/></td>
</tr>
<tr>
<th><label>Exequatur</label></th><td><input class="form-control pter"  type="text" value="<?=$row->exequatur?>" class="pter"/></td>
</tr>
<tr>
<th><label>Area</label></th><td><input class="form-control pter"  type="text" class="pter" value="<?=$area['title_area']?>"/></td>
</tr>
<tr>
<th><label>Centro Medico</label> Total (<?=$count?>)</th>
<td>
<ol style="background:white;border:1px solid #38a7bb;font-size:13px">
<?php foreach($CENTRO_MEDICO_DOCTOR as $c_m_s)

{
	
?>
<li><?=$c_m_s->name;?></li><br/>
<?php
}
?>
</ol>
</td>
</tr>
</table>