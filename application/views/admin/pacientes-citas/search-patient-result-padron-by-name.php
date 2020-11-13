<?php
$this->padron_database = $this->load->database('padron',TRUE);

?>
<div class="tab-content"   >
<div class="col-md-12"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >
  <?=$backbutton?>
<h5 class="h5"><i><?=$number_found?> resultado(s) encuentrado(s). <span style="color:green">(<?=$now?> segundos)</span></i></h5>

<div  style="overflow-x:auto;">
<!--    <input id="searchInput"class="form-control" placeholder='Buscar en los <?=$number_found?> resultado(s)  '>-->
<table class="table table-striped sortable" style="font-size:13px" id='padron-table' >
  <thead>
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>APELLIDO1</th>
<th>APELLIDO2</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Nueva cita</th>
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
<td>
<?php
 $id_pat_rdv=$this->db->select('id_p_a')->where('ced1',$row->MUN_CED)->where('ced2',$row->SEQ_CED)->where('ced3',$row->VER_CED)->get('patients_appointments')->row('id_p_a');
if($id_pat_rdv==""){
 ?>
<a href="<?php echo base_url("$controllerUser/create_new_patient_from_padron/$row->MUN_CED/$row->SEQ_CED/$row->VER_CED")?>" class="btn btn-default" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a>
<?php } else{
	 $rdv=$this->db->select('doctor,centro')->where('inserted_by',$user_id)->get('rendez_vous')->row_array();
     $doc=$rdv['doctor'];
	$centro=$rdv['centro'];
	?>

<a href="<?php echo base_url("$controllerUser/patient/$id_pat_rdv/$centro/$doc")?>" class="btn btn-default" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a>

<?php } ?>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
<p><?php echo $links; ?></p>
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
