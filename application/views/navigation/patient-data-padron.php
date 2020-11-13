<style>
 table.center {
    margin-left:auto; 
    margin-right:auto;
	font-size:13px
  }
</style>

<table class="table table-striped center" style='width:65%;' >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Fecha de nacimiento</th>
<th>Cedula</th>
</tr>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";
foreach($patient_padron as $row)

 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->MUN_CED)
->where('SEQ_CED',$row->SEQ_CED)
->where('VER_CED',$row->VER_CED)
->get('fotos')->row('IMAGEN');

$nacer = date("d-m-Y", strtotime($row->FECHA_NAC));

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
if($photo != null){
echo '<img width="100" class="img-thumbnail" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}
else{
echo "No hay foto por este paciente";
}

?>

</td>
<td><?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?></td>
<td><?=$nacer;?></td>
<td><?=$row->MUN_CED;?>-<?=$row->SEQ_CED;?>-<?=$row->VER_CED;?></td>

</tr>

</table>