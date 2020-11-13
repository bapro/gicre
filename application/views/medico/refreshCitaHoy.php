<table id="paginate" class="table table-striped sort-me" style="margin:auto"  cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto </strong></th>
<th><strong>NEC</strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Historial Medica</strong></th>
<th><strong>Acciones</strong></th>
</tr>
</thead>
<tbody>
<?php
$today=date('Y-m-d');
$this->padron_database = $this->load->database('padron',TRUE);
 foreach($appointments as $ver)
{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,frecuencia')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();
$q=$this->db->select('id_patient')->where('id_patient',$ver->id_patient)->where('doctor',$ver->doctor)->where('centro',$ver->centro)->like('update_time',date("Y-m-d"))->get('rendez_vous');
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$ver->id_patient AND user_id=$ver->doctor AND centro_medico=$ver->centro";
$atendido_con = $this->db->query($sql_con);
$area_d=$this->db->select('title_area')->where('id_ar',$ver->area )
->get('areas')->row("title_area");


if($atendido_con->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
$title_hist="&#013 Hay una historial medica por hoy";
$hist=1;
}
else 
{
$atend="";
$hist=0;
$title_hist="";
}

$sqlcita="SELECT id_rdv FROM factura2 where id_rdv=$ver->id_apoint";
$cita_con = $this->db->query($sqlcita);

if($cita_con->num_rows() > 0){
$cita='#B8FFD3';

$thay_fac1="<span title='cita facturada' style='color:green;font-size:11px'>RD$</span>";  
}
else 
{
$cita="";

$thay_fac1=""; 
}



$freq="SELECT historial_id FROM h_c_enfermedad WHERE  historial_id=$ver->id_patient AND user_id=$ver->doctor group by filter_date";
$cita_freq = $this->db->query($freq);

if($cita_freq->num_rows() == 0){
	 $frecuencia_text="";$frecuencia_nbr="";
  }else if($cita_freq->num_rows() == 1){
	$frecuencia_text="$cita_freq->num_rows vista"; $frecuencia_nbr="$cita_freq->num_rows";   
  } else{
	$frecuencia_text="$cita_freq->num_rows vistas"; $frecuencia_nbr="$cita_freq->num_rows";
 }

?>
<tr style="background:<?=$cita?>" title="<?=$title_hist?>">

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
<td><?=$ver->nec;?></td>

<td style="text-transform: uppercase;">
<a  href="<?php echo site_url("$controller/patient/$ver->id_patient/$ver->centro/$ver->doctor"); ?>"><?=$patient['nombre'];?></a> 
</td>

<td ><?=$ver->fecha_propuesta;?></td>
<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name,type')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a  href="<?php echo site_url("$controller/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>
<td style="text-transform: uppercase">
<?php 
	$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');
   if($perfil=="Admin"){?> <a  title="<?=$area_d?>" href="<?php echo site_url("admin/doctor/".$ver->doctor); ?>"><?=$doctor;?></a><?}else{echo $doctor;}?>
   
   </td>
<td style="text-transform: uppercase">
<?php if($perfil=="Admin") {?>
<a  href="<?php echo site_url("$controller/historial_medical/$ver->id_patient/$iduser/0/$ver->centro/$hist/$iduser"); ?>"><i  class="fa fa-history" aria-hidden="true" title='ir a la historia clinica' ></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php } else if($perfil=="Medico"){
?>
<a  href="<?php echo site_url("$controller/historial_medical/$ver->id_patient/$iduser/$area_id/$ver->centro/$hist/$iduser"); ?>"><i  class="fa fa-history" aria-hidden="true" title='ir a la historia clinica' ></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php	
}else if($perfil=="Asistente Medico" && $centro['type']=="privado"){
$areaid= $this->db->select('area')->where('id_user',$ver->doctor)->get('users')->row('area');
?>
<a href="<?php echo site_url("$controller/historial_medical_past/$ver->id_patient/$ver->doctor/$areaid/$ver->centro/4/$iduser"); ?>"><i class="fa fa-history" aria-hidden="true" title='ir a la historia clinica'></i> <?=$atend?> <em  title='<?=$frecuencia_text;?>'> <?=$frecuencia_nbr;?></em></a>
<?php
}else{
echo "<span style='color:red;font-size:15px'>No tiene acceso a la historia clinica</span>";
}?>

</td>
<td>
<?php 
if($cita_con->num_rows()== 0 && $atendido_con->num_rows()== 0){
?>	

<a style='color:red;cursor:pointer;'  class="cancelar-cita" id="<?=$ver->id_apoint; ?>" title='Cancelar la cita'><i class="fa fa-remove" ></i></a>
<a data-toggle="modal"  class='btn-programar' data-target="#EditC" href="<?php echo site_url("admin_medico/UpdateCita/$ver->id_apoint/$iduser/0")?>"    title='Reprogramar la cita' ><i class="fa fa-pencil" aria-hidden="true" ></i></a>

<?php
}
echo $thay_fac1;
?>


</td>
</tr>

<?php
}
?>
</tbody>    
</table>
<div class="modal fade" id="EditC"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<script>
$('#EditC').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$(".cancelar-cita").click(function(){
if (confirm("¿Estás seguro de cancelar esta cita?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/cancelCita')?>',
data: {id:del_id,iduser:<?=$iduser?>},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})

$(document).ready(function() {

    $('#paginate').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],
 "columnDefs": [
    { "orderable": false, "targets": 7 }
  ]
    } );
	 } );
</script>