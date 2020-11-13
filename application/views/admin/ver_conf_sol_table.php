<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered display" id="example">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>NEC</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Historial Medico</strong></th>
</tr>
</thead>
 <tbody>
<?php
$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)

{
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($ver->inserted_by)));	

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
<td class="id"><?=$ver->nec;?></td>
<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a href="<?php echo site_url("admin/CentroMedico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>

<td style="text-transform: uppercase">
<?php 
$doctor=$this->db->select('first_name,last_name')->where('id',$ver->doctor )
->get('doctors')->row_array();?>
<a href="<?php echo site_url("admin/Doctor/".$ver->doctor); ?>"><?=$doctor['first_name'];?> <?=$doctor['last_name'];?></a>
</td>
<?php 
$patient=$this->db->select('nombre')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();?>
<td style="text-transform: uppercase;"><a href="<?php echo site_url("admin/Patient/$ver->id_patient"); ?>"><?=$patient['nombre'];?>  </a> </td>
<td title="HISTORIAL MEDICO">
<a target="_blank" href="<?php echo site_url("admin/historial_medical/".$ver->id_patient); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
</td>
</tr>  

<?php
}

?>
 <tbody>
</table>
</div>