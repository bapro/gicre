  <table id="plazo-ago" class="table table-striped table-bordered example" style="margin:auto" cellspacing="0">
    <thead>
	 
    <tr style="background:#5957F7;color:white">
	  <th style="width:4px">#</th>
	  <th>USUARIOS CON PLAZO AGOTADO</th>
     </tr>
    </thead>
    <tbody>
	
    <?php
	$i=1;
foreach ($userPlazo as $row)
	 {
$insert_date= $this->db->select('plazo')->where('id_user',$row->id_user)->get('users')->row('plazo');
$delay= date('d-m-Y', strtotime("+3 months", strtotime($insert_date)));
$insert_date_pure= date("Y-m-d",strtotime($delay));
$start  = date_create($insert_date_pure);
$end = date_create(); // Current time and date
$diff  	= date_diff($start, $end );
$currentDate=date('Y-m-d');
$crtDate = new DateTime($currentDate);
$termDate = new DateTime($insert_date_pure);
?>		 	

<tr>
<?php
if(($crtDate > $termDate) || ($diff->days==0 )){	
$changeplazo='<a style="color:blue" data-toggle="modal" data-target="#account-extent" title="Editar plazo"  href="'.base_url().'/admin/extendUserAccount/'.$row->id_user.'" ><i class="fa fa-edit"></i> Cambiar Plazo</a>';	
$info=" $row->perfil - $row->name $changeplazo";
?>
<td style='color:#341010;background:#FFB8B8;'><?php echo $i; $i++;  ?></td>	
<td title="desde <?=$delay ?>" style='color:#341010;background:#FFB8B8;text-transform:uppercase'>
<?=$info?>
</td>
<?php
}
?>

</tr>

<?php
}
?>
</tbody>    
</table>