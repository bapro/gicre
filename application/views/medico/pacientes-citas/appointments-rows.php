<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered display" id="example">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>NEC Me</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Historial Medico</strong></th>
</tr>
</thead>
 <tbody>
<?php

$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)

{
$insert_date = date("d-m-Y H:i:s", strtotime($ver->inserted_by));	
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
$patient=$this->db->select('nombre')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row('nombre');
?>

<tr bgcolor="<?=$colorBg ;?>">
<td class="id"><?=$ver->nec;?></td>
<td style="text-transform: uppercase;"><a href="<?php echo site_url("medico/patient/$ver->id_patient"); ?>"><?=$patient;?>  </a> </td>

<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a href="<?php echo site_url("medico/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>

<?php $id_usr=($this->session->userdata['medico_id']);
$area_id= $this->db->select('area')->where('first_name',$id_usr)->get('doctors')->row('area');
$area= $this->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');
?>
<td title="HISTORIAL MEDICO">
<a target="_blank" href="<?php echo site_url("admin_medico/historial_medical/$ver->id_patient/$id_usr/$area"); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
</td>
</tr>  

<?php
}

?>
 <tbody>
</table>
</div>