
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<?php
foreach($rendez_vous as $row_rd)

$patient=$this->db->select('nombre')->where('id_p_a',$row_rd->id_patient )
->get('patients_appointments')->row('nombre');
?>
<h3 class="modal-title"><?=$patient?>  (<i><?=$number_cita?> citas</i>)</h3>

</div>

<table class="table table-striped table-bordered" style="font-size:14px">
<tr style="background:#38a7bb;color:white"><th>Causa</th><th>Centro medico</th><th>Area</th><th>Doctor</th><th>Fecha</th></tr>
<?php
$cpt="";
foreach($rendez_vous as $row_rd)
{

//-----------causa--------------------
$caus=$this->db->select('title')->where('id',$row_rd->causa )
->get('type_reasons')->row_array();
//---------centro medico-------------------
$centro=$this->db->select('name')->where('id_m_c',$row_rd->centro )
->get(' medical_centers')->row_array();
//---------centro medico-------------------
$area=$this->db->select('title_area')->where('id_ar',$row_rd->area )
->get(' areas')->row_array();
//------------doctor--------------------
$doctor=$this->db->select('name')->where('id_user',$row_rd->doctor )
   ->get('users')->row('name');
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

<td><?=$caus['title']?></td>
<td><?=$centro['name']?></td>
<td><?=$area['title_area']?></td>
<td><?=$doctor;?></td>
<td><?=$row_rd->fecha_propuesta?></td>

</tr>
<?php
}
?>
</table>

