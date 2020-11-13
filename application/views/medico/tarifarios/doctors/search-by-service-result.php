<div class="col-md-12 table-responsive" >

<h4 style="color:green">I- TARIFARIOS POR SERVICIO : <?=$servicio?></h4>

<table class="table table-striped  mssm-table" >
<tr style="background:#38a7bb;color:white">
<th>#</th>
<th>Logo</th>
<th>Nombres</th>
<th>Codigo</th>
<th>Simon</th>
<th class="inputh"> Monto</th>

</tr>

  <?php
$i = 1;
$cpt="";
 foreach($tarifarios_by_seguros as $row)
{
$seguro=$this->db->select('title,logo')->where('id_sm',$row->id_seguro)->get('seguro_medico')->row_array();
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
if($seguro['logo']==""){
	$img="---";
} else{
$img='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguro['logo'].'"  />';	
}
?>
<tr bgcolor='<?=$colorBg?>'>
<td><?=$i;$i++;?></td>
<td><?=$img?></td>
<td>
<label style="font-size:12px"><?=$seguro['title']?></label> 
<input type="hidden" class="seguro" value="<?=$row->id_seguro?>"/>
</td>
<td><?=$row->codigo?></td>
<td><?=$row->simon?></td>
<td>
RD$ <?=number_format($row->monto,2)?>
</td>

</tr>
<?php
}

?>

</table>
<hr id="hr_ad"/>
</div>

