<?php
$this->padron_database = $this->load->database('padron',TRUE);
?>
<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered display" id="example">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto</strong></th>
<th><strong>NEC</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Historial Medico</strong></th>
</tr>
</thead>
 <tbody>
<?php

$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)

{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();
$insert_date = date("d-m-Y H:i:s", strtotime($ver->inserted_by));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}

?>

<tr bgcolor="<?=$colorBg ;?>">
<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
	
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td class="id"><?=$ver->nec;?></td>
<td style="text-transform: uppercase;"><a href="<?php echo site_url("admin/patient/$ver->id_patient"); ?>"><?=$patient['nombre'];?>  </a> </td>

<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a href="<?php echo site_url("admin/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>

<td style="text-transform: uppercase">
<?php 
$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
->get('users')->row('name');
$admin_id=($this->session->userdata['admin_id']);

?>
<a href="<?php echo site_url("admin/doctor/".$ver->doctor); ?>"><?=$doctor;?></a>
</td>

<td title="HISTORIAL MEDICO">
<a target="_blank" href="<?php echo site_url("admin_medico/historial_medical/$ver->id_patient/$admin_id/0"); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
</td>
</tr>  

<?php
}

?>
 <tbody>
</table>
</div>