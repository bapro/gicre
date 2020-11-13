<?php

$this->padron_database = $this->load->database('padron',TRUE);

$id_admin=($this->session->userdata['admin_id']);

?>

<table class="table table-striped table-bordered display" id="example">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Photo</strong></th>
<th><strong>Nombres</strong></th>
<th><strong>Cedula</strong></th>
<th><strong>Edad</strong></th>
<th><strong>Sexo</strong></th>
<th><strong>Nacionalidad</strong></th>
<th><strong>Email</strong></th>
<th><strong>Citas</strong></th>
<th>Accion</th>
</tr>
</thead>
 <tbody>
<?php

$cpt="";
foreach($VER_CONFIRMADA_SOLICITUD as $ver)
{
$q=$this->db->select('id_patient')->where('id_patient',$ver->id_p_a)->get('rendez_vous');
//$numcitas=count($q);
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
if($ver->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ver->ced1)
->where('SEQ_CED',$ver->ced2)
->where('VER_CED',$ver->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($ver->photo==""){
	
}
else{
	?>
<img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $ver->photo; ?>"  />
<?php

}
?>

</td>
<td style="text-transform: uppercase"><a href="<?php echo site_url("admin_medico/patient/$ver->id_p_a/$id_admin"); ?>"><?=$ver->nombre;?></a></td>
<td><?=$ver->cedula;?></td>
<td><?=$ver->edad;?></td>
<td><?=$ver->sexo;?></td>
<td><?=$ver->nacionalidad;?></td>
<td><?=$ver->email;?></td>
<td><a data-toggle="modal"   data-target="#view_cita"  href="<?php echo site_url("admin_medico/modal_view_citas/".$ver->id_p_a)?>" class="btn btn-primary btn-sm" ><?=$q->num_rows();?></a></td>
<td><a title="bloquear" class="bloquear btn btn-primary btn-xs" id="<?=$ver->id_p_a; ?>"  >Bloquear</a></td>

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
</script>