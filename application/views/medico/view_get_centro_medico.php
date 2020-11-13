<style>
#dis{display:none}



</style>

<?php 
$medico_id=($this->session->userdata['medico_id']);
$areaid=$this->db->select('area')->where('first_name',$medico_id)
->get('doctors')->row('area');








if ($VER_CONFIRMADA_SOLICITUD !== null)
{
	
?>
<div class="row">
<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered display" id="example">
 <thead>
<tr style="background:#5957F7;color:white">
<th><strong>NEC</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Historial Medico</strong></th>
</tr>
</thead>
 <tbody>
<?php
$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)

{
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($ver->inserted_by)));	
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
<td class="id"><?=$ver->nec;?></td>
<td class="fecha_propuesta"><?=$ver->fecha_propuesta;?></td>

<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<?=$centro['name'];?>
</td>
<?php 
$patient=$this->db->select('nombre')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();?>
<td style="text-transform: uppercase;"><?=$patient['nombre'];?></td>
<td title="HISTORIAL MEDICO">
<a target="_blank" href="<?php echo site_url("medico/historial_medical/$ver->id_patient/$areaid"); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
</td>
</tr>  

<?php
}

?>
 <tbody>
</table>
</div>
	</div>
<?php
}
else
{
	echo"<div class='alert alert-info'><strong>No hay datos.</strong></div>";
}
?>