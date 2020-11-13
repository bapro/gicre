<?php

$this->padron_database = $this->load->database('padron',TRUE);

?>

<table class="table table-striped table-bordered display" id="example">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Photo</strong></th>
<th><strong>Nombres</strong></th>
<th><strong>Sexo</strong></th>
<th><strong>Cedula</strong></th>
<th><strong>Edad</strong></th>
<th><strong>Nacion.</strong></th>
<th><strong>Tel</strong></th>
<th><strong>Centro</strong></th>
<th><strong>Doctor</strong></th>
<!--<th><strong>Citas</strong></th>-->
<th>Accion</th>
</tr>
</thead>
 <tbody>
<?php

$cpt="";
foreach($patient_data as $ver)
{
$q=$this->db->select('id_patient')->where('id_patient',$ver->id_patient)->where('doctor',$ver->doctor)->where('centro',$ver->centro)->get('rendez_vous');
$centro=$this->db->select('name')->where('id_m_c',$ver->centro)->get('medical_centers')->row('name');
$doc=$this->db->select('name')->where('id_user',$ver->doctor)->get('users')->row('name');
$pat=$this->db->select('nombre, cedula, sexo, edad,ced1, ced2, ced3, nacionalidad, tel_cel, tel_cel,photo')->where('id_p_a',$ver->id_patient)->get('patients_appointments')->row_array();
$sexo = substr($pat['sexo'], 0, 3);
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
if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($pat['photo']==""){
	
}
else{
	?>
<img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat['photo']; ?>"  />
<?php

}
?>

</td>
<td style="text-transform: uppercase"><a href="<?php echo site_url("$controller/patient/$ver->id_patient/$ver->centro"); ?>"><?=$pat['nombre'];?></a></td>
<td><?=$sexo;?>.</td>
<td><?=$pat['cedula'];?></td>
<td><?=$pat['edad'];?></td>
<td><?=$pat['nacionalidad'];?></td>
<td><?=$pat['tel_cel'];?> | <?=$pat['tel_cel'];?></td>
<td><a href="<?php echo site_url("$controller/centro_medico/$ver->centro"); ?>"><?=$centro;?></a></td>
<td><?=$doc;?></td>
<!--<td><a data-toggle="modal"   data-target="#view_cita"  href="<?php echo site_url("admin_medico/modal_view_citas/".$ver->id_patient)?>" class="btn btn-primary btn-sm" ><?=$q->num_rows();?></a></td>-->
<td><a title="bloquear" class="bloquear btn btn-primary btn-xs" id="<?=$ver->id_patient; ?>"  >Bloquear</a></td>

</tr>  

<?php
}

?>
 </tbody>
</table>
<div class="modal fade" id="view_cita"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>


<script>  
$('#view_cita').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$(document).ready(function() {

    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );

</script>