<style>
td,th{font-size:12px}
</style>
<div style="overflow-x:auto" >
<table class="table fixed" style="border-bottom:1px solid #38a7bb;">
<tr style="background:#A9E4EF;">
<th>Foto</th><th>NEC</th><th>Nombres</th><th>Cedula</th><th>NO. AFILIADO</th><th>TIPO AFILIADO</th><th>TEL</th><th>DIRECCION</th><th>EMAIL</th>
</tr>
<tr>
<td style="width:17%;">
<?php
 foreach($patient_data as $pat)
 $patientAge=getPatientAge($pat->date_nacer);
 echo "&nbsp; $patientAge";
$this->padron_database = $this->load->database('padron',TRUE);

 $num_af=$this->db->select('input_name')->where('patient_id',$pat->id_p_a )->where('input_name !=','')
 ->get('saveinput')->row('input_name');
if($pat->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat->ced1)
->where('SEQ_CED',$pat->ced2)
->where('VER_CED',$pat->ced3)
->get('fotos')->row('IMAGEN');
echo '<img style="width:130px;float:left; " src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($pat->photo==""){
echo "No hay Foto";	
}
else{
	?>
<img  style="width: auto;height :100px;float:left; " src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat->photo; ?>"  />
<?php

}

?>
</td>
<td><?=$pat->nec1;?></td>
<td><!--<a target="_blank" href="<?php echo base_url("$controller/patient/$pat->id_p_a")?>" ><a>--><?=$pat->nombre?></td>
<td><?=$pat->cedula;?></td>
<td> <?php echo $num_af;?></td>
<td> <?php echo $pat->afiliado;?></td>
<td> <?=$pat->tel_cel?> / <?=$pat->tel_resi?></td>
 <td> <?=$pat->calle?>, <?=$pat->barrio?></td>
<td>   <?=$pat->email?></td>
 
</tr>

</table>
</div>

<?php
function getPatientAge($birthday) {

$age_format = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age_format = ($years < 2) ? '1 año' : "$years años";
} else {
$age_format = '';
if ($months) $age_format .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age_format .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age_format);
}
?>