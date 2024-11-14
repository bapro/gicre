 <?php
$this->padron_database = $this->load->database('padron',TRUE);
if($perfil=="Admin"){
$controller="admin";
$centro=0;
$doc=0;
}
else if($perfil=="Medico"){
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
<div  style="overflow-x:auto;">
<?php 
if($number_found==0){
$create ="<h2 class='h2' ><a class='btn btn-primary btn-sm' href='".site_url()."$controller/create_cita'  >Crear Nueva Cita</a></h2>";
} else {
	$create="";
}
?>
<h5 class="h5"><i><?=$number_found?> resultado(s) encuentrado(s) en el base de datos <?=$base?>. <span style="color:green">(<?=$now?> segundos)</span></i></h5>
<?=$create?>
<?php if ($patient_admedicall == null) {?>

<table class="table table-striped" style="font-size:13px" >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>APELLIDO1</th>
<th>APELLIDO2</th>
<th>Cedula</th>
<!--<th>Fecha de nacimiento</th>-->
<th></th>
</tr>
<?php
$cpt="";
foreach($patient_padron as $row)
{
foreach($photo as $ph)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$nacer = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->FECHA_NAC)));	
//$nacer = date("d-m-Y", strtotime($row->FECHA_NAC));

//-------------------------------------
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
echo '<img width="70" class="img-thumbnail" src="data:image/jpeg;base64,'. base64_encode($ph->IMAGEN) .'" />';
}
else{
echo "No hay foto por este paciente";	
}
?> 
</td>
<td><?=$row->NOMBRES?> </td>
<td><?=$row->APELLIDO1 ?> </td>
<td><?=$row->APELLIDO2 ?> </td>
<td><?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?></td>
<!--<td><?=$nacer;?></td>-->
<td><a href="<?php echo base_url("$controller/create_new_patient_from_padron/$row->MUN_CED/$row->SEQ_CED/$row->VER_CED")?>" class="btn btn-default" >  ver </a></td>
</tr>
<?php
}
?>
</table>

<?php } else { ?>
<table class="table table-striped " >
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th></th>

</tr>
<?php
$cpt="";
foreach($patient_admedicall as $row)
{

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
if($photo){
echo '<img  width="70" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  width="70" class="img-thumbnail"  src="'.base_url().'/assets/img/user.png"  />';	
}

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
<td>

<a href="<?php echo base_url("$controller/patient/$row->id_p_a/$centro/$doc")?>" class="btn btn-primary btn-sm" >ver </a>
</td>


</tr>
<?php
}
?>
</table>

<?php }  ?>
</div>
</div>

<script>
$('.patient-cedula').val("");
</script>