 <?php
  if ($patient_admedicall != null)
 {
$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient_admedicall as $row)

if($perfil=="Admin"){
$controller="admin";
$centro=0;
$doc=0;
}
elseif($perfil=="Medico"){
$controller="medico";

$centro= $this->db->select('id_centro')->where('id_doctor',$user_id)->get('doctor_agenda_test')->row('id_centro');

$doc=$user_id;
}

else{
$controller="medico";
$doc= $this->db->select('id_doctor')->where('id_asdoc',$user_id)->get('centro_doc_as')->row('id_doctor');
//$centro=0;	
$centro= $this->db->select('centro_medico')->where('id_doctor',$user_id)->get('doctor_centro_medico')->row('centro_medico');	
}
?>

<div class="row"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >
<h5 class="h5"><i><?=$number_found?> resultado(s) encuentrado(s) en el base de datos <?=$base?>. <span style="color:green">(<?=$now?> segundos)</span></i></h5>
<div style="overflow-x:auto;">
<table class="table table-striped" id='result'>
<thead>
<tr style="background:#38a7bb;color:white">
<th style="font-size:13px">Foto</th>
<th style="width:20%;font-size:13px">Nombres</th>
<th style="font-size:13px">Cedula</th>
<th style="font-size:13px">Fecha de nacimiento</th>
<!--<th>Direccion</th>-->
<th colspan="2"></th>
</tr>
</thead>
<tbody>
<?php foreach($patient_admedicall as $row){?>
<tr>
<td>

<?php

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img  width="70"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  width="70" src="'.base_url().'/assets/img/user.png"  />';	
}
}
else if($row->photo==""){

}
else{
	?>
<img  width="70" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}

?>

</td>
<td style="font-size:13px"><?=$row->nombre ?> </td>
<td style="font-size:13px"><?=$row->cedula;?></td>
<td style="font-size:13px;border-right:1px solid #C0C0C0"><?=$row->date_nacer;?></td>
<!--<td><?=$row->calle;?></td>-->
<td style="font-size:13px;border-right:1px solid #C0C0C0;text-align:left">

<?php if($perfil=="Asistente Medico"){
	echo "SELECCIONE El DOCTOR:";
	echo "<div style='height: 70px;overflow-y: scroll;'>";
$sql ="SELECT id_doctor, name  FROM centro_doc_as JOIN users on users.id_user=centro_doc_as.id_doctor WHERE id_asdoc=$user_id GROUP BY id_doctor";	
	
 $query= $this->db->query($sql);

 foreach ($query->result() as $sd){
$link='<a href="'.base_url().'medico/patient/'.$row->id_p_a.'/'.$centro.'/'.$sd->id_doctor.'">'.$sd->name.'</a><br/>';
echo $link;
	
}
echo "</div>";
 } else{?>
<a href="<?php echo base_url("$controller/patient/$row->id_p_a/$centro/$doc")?>" class="btn btn-primary btn-sm" > Ver </a>
 <?php }?>


</td>
</tr>
<?php }?>
</tbody>
</table>
</div>

</div>

<script>

$("#hide_patientf").hide();

</script>
<?php
} else {
	echo "<div style='color:red;text-align:center'>No hay resultado...</div>";
}
?>
