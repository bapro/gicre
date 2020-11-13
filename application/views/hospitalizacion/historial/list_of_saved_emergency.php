<?php
$this->padron_database = $this->load->database('padron',TRUE);
function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}
?>
<table  class="table table-striped sort-me"  >
<thead>
<tr style="background:white;">
<th>Foto</th>
<th>Nombres</th>
<th>Edad</th>
<th>NEC</th>
<th>Causa</th>
<th>Estado Del Paciente</th>
<th>ARS</th>
<th>Referido por</th>
<th>Operator/Fecha/Horario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($query->result() as $ver)
{
	
$emergency_triaje=$this->db->select('sintomatologia')->where('id_em',$ver->id_ep )
->get('emergency_triaje')->row('sintomatologia');	
	
	
	$escala=$this->db->select('color,name')->where('id',$emergency_triaje)
->get('emergency_sintomatologia')->row_array();
	
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,seguro_medico,contacto_em_nombre,contacto_em_tel1,date_nacer')->where('id_p_a',$ver->id_pat )
->get('patients_appointments')->row_array();

$estado_de_paciente=$this->db->select('em_name')->where('id_em_c',$ver->estado_de_paciente )
->get('emergency_adm_data')->row('em_name');

$causa=$this->db->select('em_name')->where('id_em_c',$ver->causa )
->get('emergency_adm_data')->row('em_name');

$seguro=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');

$created_by=$this->db->select('name')->where('id_user',$ver->inserted_by )
->get('users')->row('name');

$updated_by=$this->db->select('name')->where('id_user',$ver->update_by )
->get('users')->row('name');
$created_date=date("d-m-Y", strtotime($ver->created_date));
$updated_date=date("d-m-Y", strtotime($ver->update_date));

$referido_por=$this->db->select('em_name')->where('id_em_c',$ver->paciente_referido_por )
->get('emergency_adm_data')->row('em_name');

$medio_llegado=$this->db->select('em_name')->where('id_em_c',$ver->medio_de_llegado )
->get('emergency_adm_data')->row('em_name');

?>
<tr style="background:<?=$escala['color']?>" class="border_bottom"  >

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
?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}

?>
</td>

<td style="text-transform: uppercase;"><a style="color:<?=$ver->td?>" href="<?php echo site_url("$controller/patient/$ver->id_pat"); ?>"><?=$patient['nombre'];?></a> </td>
<td style="color:<?=$ver->td?>"> <?=getPatientAge($patient['date_nacer'])?></td>
<td style="color:<?=$ver->td?>">NEC-<?=$ver->id_pat;?></td>
<td style="color:<?=$ver->td?>;"><?=$escala['name']?></td>
<td style="color:<?=$ver->td?>"><?=$estado_de_paciente ?></td>
<td style="color:<?=$ver->td?>"><?=$seguro?></td>
<td style="color:<?=$ver->td?>"><?=$referido_por?></td>

<td style="font-size:12px;color:<?=$ver->td?>" >
<em>  
CREADO POR <?=$created_by?>, <?=$created_date?> : <?=$ver->create_time?>
</em>
</td>
<td style="font-size:12px;color:<?=$ver->td?>">

</td>
<td>
<a  class="btn btn-default btn-xs"  href="<?php echo site_url("emergency/triaje/$ver->id_ep/$id_user"); ?>">Triaje</a>
<br/><br/>
<a   title='Ir a external consulta de la emergencia'  href="<?php echo site_url("emergency/emergency_general/$ver->id_ep/$id_user"); ?>" class="hide-me btn btn-default btn-xs  hide-emgergencia"><i style='color:green;font-size:25px' class='fa fa-check-circle'></i></a>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>