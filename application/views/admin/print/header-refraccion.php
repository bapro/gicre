<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px black border-bottom: solid 1px black; }
    td { border-right: none; border-left: none;padding: 1em; }
    div.footer-firma {
      position: absolute;
      width: 80%;
      bottom: 80px;
    }
	

</style>
</head>

<table>
<tr   style='border: none !important;'>
<td>
 <img  style="width:110px;text-align:center" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
  </td> 
  <td  style='text-align:center'>
  <h2><?=$centro_name?> </h2>
  <span  style='font-size:9px;'>
  <?php  echo "{$centro_prov}, {$centro_muni}, {$calle}, {$barrio}<br/>  <strong>Tel: </strong>{$primer_tel} <strong>RNC: </strong> {$rnc}";?>
</span>
  </td>

</tr>
 </table>
 <hr/>
 <?php
 $paciente=$this->db->select('provincia,municipio,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$id_historial)
 ->get('patients_appointments')->row_array();

 $provincia=$this->db->select('title')->where('id',$paciente['provincia'])
 ->get('provinces')->row('title');


$municipio=$this->db->select('title_town')->where('id_town',$paciente['municipio'])
 ->get('townships')->row('title_town');


 $seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();

if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:50px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}


 $nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');

?>
<!--<br/><br/><br/><br/><br/>-->
<table  align="left" style="width:100%" class='r-b' >
<tr>
<th colspan='3'><h2><?=$title?></h2></th>
</tr>
	<tr>
		<?=$display?>
		<td style="text-transform:uppercase"><strong><?=$paciente['nombre']?></strong></td>

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
<table style="width:100%;">

<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td><strong>Telefonos</strong></td>
		<td><strong>Direccion</strong></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=";"><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style="text-transform: lowercase;"><?=$municipio?>, <?=$paciente['calle']?></td>
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
