<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%}
    tr { border-top: solid 1px black border-bottom: solid 1px black; }
    td { border-right: none; border-left: none;padding: 5px; }
    div.footer-firma {
      position: absolute;
      width: 90%;
      bottom: 80px;
    }
	
	.center-img {
   width:75%;
   height:125px;
   object-fit:cover;
   object-position:50% 50%;
  }
</style>
</head>
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
$logoseg='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}

$nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array();
$plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');

$logo_tipo=$this->db->select('sello')->where('doc',$id_doc)->where('dist',1)->get('doctor_sello')->row('sello');

if ($logo_tipo) {
echo '<div style="text-align:center"><img  class="center-img" src="'.base_url().'/assets/update/'.$logo_tipo.'"  /></div>';

} else {
echo "<br/><br/><br/><br/><br/>";
}


?>
<h4 style='text-align:center'><?=$title?></h4>
<table  align="left" style="width:100%;">

	<tr>
		<?=$display?>
		<td style="text-transform:uppercase"><strong><?=$paciente['nombre']?></strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:40px;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="font-size:11px;text-align:center">
		<?php
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<td style="font-size:11px;text-align:center"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		</tr>

		</table>
		</td>
	</tr>
</table>
<table style="width:100%;font-size:13px">

<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td><strong>Telefonos</strong></td>
		<td><strong>Direccion</strong></td>
	</tr>

	<tr>
		<td> <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td><?=$paciente['nacionalidad']?></td>
		<td><?=getPatientAge($paciente['date_nacer'])?></td>
		<td><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style="font-size:11px"><?=$municipio?>, <?=$paciente['calle']?></td>
	</tr>
</table>


<h4 style="text-transform:uppercase"><?=$updated_by?> <?=$date_modif;?> </h4>
<?=$doc_ingo;?>

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
