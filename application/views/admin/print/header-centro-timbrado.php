<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px #E6E6E6 border-bottom: solid 1px #E6E6E6; }
    td { border-right: none; border-left: none;border-color:#E6E6E6;}
    div.footer-firma {
      position: absolute;
      width: 80%;
      bottom: 80px;
    }
	
	.center-img {
   width:70%;
   height:70px;
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
$logoseg='<img  style="width:50px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}


 $nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array();

 $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');

$centroInfo=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle,type')->where('id_m_c',$centro)
->get('medical_centers')->row_array();
$centro_name=$centroInfo['name'];
$rnc=$centroInfo['rnc'];
$centro_logo=$centroInfo['logo'];
$primer_tel=$centroInfo['primer_tel'];
$segundo_tel=$centroInfo['segundo_tel'];
$barrio=$centroInfo['barrio'];
$calle=$centroInfo['calle'];
$centro_prov=$this->db->select('title')->where('id',$centroInfo['provincia'])->get('provinces')->row('title');
$centro_muni=$this->db->select('title_town')->where('id_town',$centroInfo['municipio'])->get('townships')->row('title_town');

$logo_tipo=$this->db->select('sello')->where('doc',$id_doc)->where('dist',1)->get('doctor_sello')->row('sello');

if ($logo_tipo) {
$doc_log_tipo= '<div style="text-align:center"><img class="center-img" src="'.base_url().'/assets/update/'.$logo_tipo.'"  /> </div>';

} else {
$doc_log_tipo=  "<br/><br/><br/><br/><br/>";
}
?>


<table style="width:100%">
<tr>
<td><img style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  /></td>
<td >
<h3><?=$centro_name?></h3>
<strong>Tel:</strong> <?=$primer_tel?> <?=$segundo_tel?> <strong>RNC: </strong><?=$rnc?> <strong>Ubicación:</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> 
</td>

</tr>
</table>


<p style='text-align:center'><strong><?=$title?></strong></p>
<table  align="left" style="width:100%" class='r-b' >
<tr>
	<?=$display?> 
		<td style="text-transform:uppercase;"><strong><?=$paciente['nombre']?>  </strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:100%;border-collapse: collapse; border-spacing: 0;">
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
		<td style="text-align:center;text-transform:lowercase"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		</tr>

		</table>
		</td>
		
	</tr>



<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td style='width"70px'><strong>Telefonos</strong></td>
		<td></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['cedula']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=""><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style=""></td>
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
