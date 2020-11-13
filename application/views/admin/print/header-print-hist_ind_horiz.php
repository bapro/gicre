<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral"></link>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }
</style>
</head>
 <?php

 $paciente=$this->db->select('nombre,seguro_medico,afiliado,plan,date_nacer')->where('id_p_a',$id_historial)
 ->get('patients_appointments')->row_array(); 
 $seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();


if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:30px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
 $nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array(); 
 
  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
?>
<br/><br/><br/>


<table  align="left" style="width:100%" class='r-b' >
<tr>
		<td style="text-transform:uppercase"><?=$display?></td> <td><strong><?=$paciente['nombre']?> (<?=getPatientAge($paciente['date_nacer'])?>)</strong></td>
		
		<td style="text-align:center">
		<table class="r-b" style="width:40px;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="text-align:center">
		<?php 
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<td style="text-align:center"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		</tr>
		
		</table>
		</td>
	</tr>
	
</table>
<?php
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
