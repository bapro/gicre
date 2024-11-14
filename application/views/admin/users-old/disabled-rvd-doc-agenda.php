<div class="modal-header "  id="background_">
<h3 class="modal-title">INHABILITAR LA LISTA DE PACIENTES QUE TIENE CITA </h3>
<a target="_blank" href="<?php echo base_url("printings/print_patients_to_disabled/$doc/$centro")?>"   class="btn btn-primary btn-sm" >Inhabilitar y imprimir <i style="font-size:24px" class="fa">&#xf02f;</i></a>
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>


</div>
<div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">

 <table id="example" class="table table-striped table-bordered" style="margin:auto"  cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto</strong></th>
<th><strong>NEC</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Causa</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Doctor</strong></th>
</tr>
</thead>
<tbody>
<?php

$this->padron_database = $this->load->database('padron',TRUE);
 
$sql ="SELECT * FROM  rendez_vous WHERE doctor=$doc AND centro =$centro";
$query1= $this->db->query($sql);
foreach ($query1->result() as $ver){

$patient=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();


?>
<tr>

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
<td><?=$ver->nec;?></td>
 <?php 
	 $patient=$this->db->select('nombre,sexo')->where('id_p_a',$ver->id_patient )
   ->get('patients_appointments')->row_array();
   
   ?>
   <td style="text-transform: uppercase;"><?=$patient['nombre'];?></td>

<td ><?=$ver->fecha_propuesta;?></td>
<td ><?=$ver->causa;?></td>
<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<?=$centro['name'];?>
</td>
<td style="text-transform: uppercase">
<?php 
	$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');
echo $doctor;
?>
 </td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>