 <?php

$this->padron_database = $this->load->database('padron',TRUE);


?>
<div class="tab-content"  style="margin-left:6%;border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >
<?php if(!empty($necpatient ))  
{ ?>
<table class="table table-striped table-bordered" >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Direccion</th>
<th>Nueva cita</th>
<th>Historia Clinica</th>
</tr>
<?php
$cpt="";
foreach($necpatient as $row)
{
//	setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$nacer2 = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->date_nacer)));	
$nacer2 = date("d-m-Y", strtotime($row->date_nacer));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td> 



<?php


if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="70" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($row->photo==""){
	
}
else{
	?>
<img  width="70" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>


</td>
<td><?=$row->nombre ?> </td>
<td><?=$row->cedula;?></td>
<td><?=$nacer2;?></td>
<td><?=$row->calle;?></td>
<td><a href="<?php echo base_url("admin/patient/$row->id_p_a")?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a></td>
<td title="HISTORIAL MEDICO">
<a target="_blank" href="<?php echo site_url("admin/historial_medical/".$row->id_p_a); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
</td>
</tr>
<?php
}
?>
</table>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:20%">NEC no encontrado</i> '; 
}	
?>
</div>

</form>
</div>

