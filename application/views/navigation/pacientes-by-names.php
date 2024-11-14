<div class='container'>
<div class="tab-content"   >
<div class="col-md-12"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >
  <?php echo $backbutton;
if($number_found >0){
$this->padron_database = $this->load->database('padron',TRUE);

?>
<h5 class="h5"><?=$number_found?> resultado(s) encuentrado(s)</h5>

<div  style="overflow-x:auto;">
<!--    <input id="searchInput"class="form-control" placeholder='Buscar en los <?=$number_found?> resultado(s)  '>-->
<table class="table table-striped sortable" style="font-size:13px" id='padron-table' >
  <thead>
<tr style="background:#38a7bb;color:white">
<th>Solicitar</th>
<th>Foto</th>
<th>Nombres</th>
<th>APELLIDO1</th>
<th>APELLIDO2</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
</tr>
  </thead>
  <tbody id="myTable">
<?php
$cpt="";
foreach($patient_padron as $row)
{
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->MUN_CED)
->where('SEQ_CED',$row->SEQ_CED)
->where('VER_CED',$row->VER_CED)
->get('fotos')->row('IMAGEN');

$nacer = date("d-m-Y", strtotime($row->FECHA_NAC));
//-------------------------------------
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
}
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td>
<?php
 $id_pat_rdv=$this->db->select('id_p_a')->where('ced1',$row->MUN_CED)->where('ced2',$row->SEQ_CED)->where('ced3',$row->VER_CED)->get('patients_appointments')->row('id_p_a');
if($id_pat_rdv==""){
 ?>
<a href="<?php echo base_url("navigation/search_result/$row->MUN_CED/$row->SEQ_CED/$row->VER_CED")?>" class="btn btn-default btn-xs" > Cita </a>
<?php } else{
	$id_pat_rdv_ = encrypt_url($id_pat_rdv);
	?>

<a href="<?php echo base_url("navigation/patient_found/$id_pat_rdv_")?>" class="btn btn-default btn-xs" > Cita </a>

<?php } ?>
</td>
<td>
<?php
if($photo != null){
echo '<img width="100" class="img-thumbnail" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}
else{
echo "No hay foto por este paciente";
}
?>
</td>
<td><?=$row->NOMBRES?> </td>
<td><?=$row->APELLIDO1 ?> </td>
<td><?=$row->APELLIDO2 ?> </td>
<td><?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?></td>
<td><?=$nacer;?></td>

</tr>
<?php
}
?>
</tbody>
</table>
<p><?php echo $links; ?></p>
</div>
<?php } else if($query_admedicall !=NULL) {?>

<div  style="overflow-x:auto;">
<table class="table table-striped " >
<tr style="background:#38a7bb;color:white">
<th>Solicitar</th>
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
</tr>
<?php
$cpt="";
foreach($query_admedicall as $row)
{
$id_p_a= $this->db->select('id_p_a')->where('nec1',$row->nec1)->get('patients_appointments')->row('id_p_a');	

$nacer2 = date("d-m-Y", strtotime($row->date_nacer));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
	$id_p_a_ = encrypt_url($row->id_p_a);
?>
<tr>
<td>
<a href="<?php echo base_url("navigation/patient_found/$id_p_a_")?>" class="btn btn-default btn-xs" >Cita </a>
</td>
<td> 
<?php
 if($row->photo==""){
	
}
else{
	?>
<img  width="70" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>

</td>
<td><?=$row->nombre ?> </td>
<td><?=$row->cedula;?></td>
<td><?=$nacer2;?></td>
</tr>
<?php
}
?>
</table>

</div>

<?php } else{
$names = $patientNamesData['patient_nombres'];
$apel1= $patientNamesData['patient_apellido'];
$apel2=$patientNamesData['patient_apellido2'];
$nameformat = "$names $apel1 $apel2";
redirect("navigation/createNewRequest/$nameformat");
}	

	?>
</div>

</div>
</div>
<script src="<?=base_url();?>assets/js/sortable.js"></script>
<!--$(document).ready(function(e){
  var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
  $('#padron-table').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'admin_medico/ajax_list_padron_search_name',
              type : 'POST',
			    "data": {
             "patient_nombres": $("#patient_nombres").val(),
			 "patient_apellido": $("#patient_apellido").val(),
			 "patient_apellido2": $("#patient_apellido2").val(),
             }
            },
  }); // End of DataTable
});


<input id='patient_nombres' value='<?=$names['patient_nombres']?>' />
<input id='patient_apellido' value='<?=$names['patient_apellido']?>' />
<input id='patient_apellido2' value='<?=$names['patient_apellido2']?>' />-->
