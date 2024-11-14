<h3 style='text-align:center'><?=$title?></h3>
<table style='width:100%;' class='im-bg' >
<tr>
<td class='sidetable'></td>
<td class='sidetable'><strong>Nombres</strong> </td>
<td class='sidetable'><strong>Edad</strong> </td>
<td class='sidetable'><strong>NEC</strong></td>
<td class='sidetable'><strong>Cedula</strong> </td>
<td class='sidetable'><strong>Seguro</strong> </td>
<td class='sidetable'><strong>Fecha De Ingreso</strong> </td>
<td class='sidetable'><strong>Diagnostico De Ingreso</strong> </td>
<td class='sidetable'><strong>Sala</strong> </td>
<td class='sidetable'><strong>Cama</strong> </td>

</tr>
<tr>
<td>	
<?php
$sexo="";

$this->padron_database = $this->load->database('padron',TRUE);
$patient_data=$this->db->select('*')->where('id',$id_hosp)->get('hospitalization_data')->row_array();
$causa=$patient_data['causa'];
$sala=$patient_data['sala'];
$cama=$patient_data['cama'];
 $fecha_ingreso=$patient_data['timeinserted'];
 $patient=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado,cedula,id_p_a,date_nacer_format')->where('id_p_a',$patient_data['id_patient'])
 ->get('patients_appointments')->row_array(); 
$patient_id=$patient['id_p_a'];

$photo=$patient['photo'];
$nombre=$patient['nombre'];
//$date_nacer=$patient['date_nacer'];
$cedula=$patient['cedula'];
$ced1=$patient['ced1'];
$ced2=$patient['ced2'];
$ced3=$patient['ced3'];
$seguro_medico_name=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');


if($photo=="padron"){
$photop=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ced1)
->where('SEQ_CED',$ced2)
->where('VER_CED',$ced3)
->get('fotos')->row('IMAGEN');
 if($photo){

$imgpat='<img  class="center-pat-img "  src="data:image/jpeg;base64,'. base64_encode($photop) .'"  />';	
echo $imgpat;
echo "</a>";
}else{

$imgpat='<img class="center-pat-img "  src="'.base_url().'/assets/img/user.png"  />';	
echo $imgpat;
?>

<?php
}

} else if($photo==""){
	$sex = substr($sexo, 0, 3);
$sexo="<li><a style='color:#209BD8;' >$sex.</a></li>";
echo '<img class="center-pat-img " src="'.base_url().'/assets/img/user.png"  />';
}
else{
$sexo="";
?>
<img  class="center-pat-img " src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $photo; ?>"  />

<?php }

$agett=getPatientAge($date_nacer);


?>



</td>
<td class='sidetable'><?=$nombre;?></td>
<td class='sidetable'><?=$agett?> </td>
<td class='sidetable'><?=$patient_id;?></td>
<td class='sidetable'> <?=$cedula;?></td>
<td class='sidetable'> <?=$seguro_medico_name;?></td>
<td class='sidetable'><?=date("d-m-Y H:i:s", strtotime($fecha_ingreso));?></td>
<td class='sidetable'> <?=$causa;?></td>
<td class='sidetable'> <?=$sala?></td>
<td class='sidetable'><?=$cama;?></td>

</tr>
</table>
