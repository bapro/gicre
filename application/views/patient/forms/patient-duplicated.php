<div id="hide-patient-duplicated">
<table class="table table-striped table-hover"  style="" >
<thead>
<tr style="background:#5957F7;color:white">
<?php 
$go_to_patient_data ='<a class="px-2" href="'.site_url().''.$this->session->userdata('USER_CONTROLLER').'/patient/'.encrypt_url($results['id_p_a']).'/0/0" >No</a>';
 ?>
<th style="background:white;color:red">Ese paciente existe,<br/> desea continuar? <button class="btn btn-sm btn-primary px-2" type="button" id="confirm-keep-creating">Si</button><?=$go_to_patient_data ?></th><th>Nombres</th><th>Cédula</th><th>Fecha nac.</th><th>Sexo</th><th>Tel.</th>
</tr>
</thead>
<tbody>
<?php 

$array_values_for_photo = array(
			'id_p_a' => $results['id_p_a'],
			'cedula' => $results['cedula'],
			'image_class' => "",
			'style' => "style='width:30%'"

		);
		$img_patient= $this->search_patient_photo->search_patient($array_values_for_photo);


?>
<tr>
<td >
<?=$img_patient?>
</td>
<td ><?=$results['nombre'];?></td>
<th style="color:red"><?=$results['cedula'];?></th>
<td><?= date('d-m-Y', strtotime($results['date_nacer']));?></td>
<td><?=substr($results['sexo'], 0, 3)?>.</td>
<td id="formatdate"><?=$results['tel_cel'];?></td>
</tr>

</tbody>    
</table>
</div>
