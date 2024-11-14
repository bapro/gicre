<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px;border-color:white}

  td { border:none;padding: 1em; border-bottom:1px solid #E6E6E6;}

  .td-head { border-right: none; border-left: none;border-color:white}

strong{font-size:13px}
#wrapper {
  display: flex;
}

#left {
  flex: 0 0 65%;
}

#right {
  flex: 1;
}
</style>
</head>
<body>
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
<div id="wrapper">
<table style="width:100%">
<tr>
<td><img style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  /></td>
<td >
<h3><?=$centro_name?></h3>
<strong>Tel :</strong> <?=$primer_tel?> <?=$segundo_tel?> <strong>RNC : </strong><?=$rnc?> <strong>Ubicación :</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> 
</td>

</tr>
</table>
<h3 style="text-align:center"><?=$title?></h3>
<table>
<tr>
	<?=$display?> 	
		<td class="td-head" style="text-transform:uppercase;"><strong><?=$paciente['nombre']?></strong></td>

		<td class="td-head"  style="text-align:center">
		<table class="r-b" style="border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td  class="td-head">
		<?=$logoseg?>
		</td>
		<td  class="td-head" style="text-align:center">
		<?php
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<td  class="td-head" style="text-align:center;text-transform:lowercase"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		</tr>

		</table>
		</td>
		
	</tr>

<tr style="background:rgb(192,192,192);color:white">

		<td class="td-head"><strong>Cedula</td>
		<td class="td-head"><strong>Nacionalidad</strong></td>
		<td class="td-head"><strong>Edad</strong></td>
		<td class="td-head" style='width"70px'><strong>Telefonos</strong></td>
		<td class="td-head"></td>
	</tr>

	<tr>
		<td class="td-head"> <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td  class="td-head"><?=$paciente['nacionalidad']?></td>
		<td  class="td-head"><?=getPatientAge($paciente['date_nacer'])?></td>
		<td  class="td-head"><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td  class="td-head" style="text-transform: lowercase;"></td>
	</tr>
</table>
<?php
foreach ($cirugia_toracico->result() as $rowp)
?>


<div id="left">
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong>Hora de Inicio</strong></td><td> <?=$rowp->hora_ini;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Hora Finalización</strong></td><td> <?=$rowp->hora_fin;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Tiempo Quirurgico</strong></td><td> <?=$rowp->tiempo_quirurgico;?></td>
</tr>
<tr>
<td  style="text-align:right"><strong>Diagnostico Pre-Quirurgico</strong><br/><?=$rowp->diag_pre_qui;?></td><td>  </td>
</tr>
<tr>
<td style="text-align:right"><strong>Diagnostico Post-Quirurgico</strong><br/> <?=$rowp->diag_post_qui;?></td><td></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Anestesia</strong>  <br/><?=$rowp->anestesia;?></td><td></td>
</tr>
<tr>
<td style="text-align:right"><strong>Tipo de incisión</strong><br/> <?=$rowp->incision;?></td><td></td>
</tr>

<tr>
<td  style="text-align:right"><strong>Cirugía Programada</strong><br/><?=$rowp->cirugia_programada;?></td><td></td>
</tr>
<tr>
<td style="text-align:right"><strong>Cirugía Realizada</strong><br/><?=$rowp->cirugia_realizada;?></td><td> </td>
</tr>

<tr>
<td  style="text-align:right"><strong>Hallazgo</strong><br/><?=$rowp->hallasgo;?></td><td>  </td>
</tr>


<tr>
<td style="text-align:right"><strong>Pronostico Post Quirurgico</strong><br/><?=$rowp->pro_post;?></td><td> </td>

</tr>
</table>

</div>
<div id="right">
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong>Perdida Sanguínea</strong></td><td> <?=$rowp->perdida_sanguinea;?> CC</td>
</tr>
<tr>
<td style="text-align:right"><strong>No de Compresas</strong></td><td> <?=$rowp->compresa;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>No. de Gasas</strong></td><td> <?=$rowp->gasas;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Drenes</strong><br/><?=$rowp->drenes;?></td><td> </td>
</tr>
<tr>
<td style="text-align:right"><strong>Transfusión</strong></td><td> <?=$rowp->transfusion;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Unids Transfundidas</strong></td><td> <?=$rowp->unids_transfusion;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Condición del paciente</strong></td><td> <?=$rowp->condicion_paciente;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Traslado a</strong></td><td> <?=$rowp->traslado;?></td>
</tr>

<tr>
<td style="text-align:right"><strong>Cirujano:</strong></td><td> <?=$rowp->cirujano;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Ayudante(s)</strong></td><td> <?=$rowp->ajudante;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Ayudante(s) Enfemería</strong></td><td> <?=$rowp->ajudante_enf;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Muestra(s) Enviada(s) a Patología</strong></td><td> <?=$rowp->muestras_patologia;?></td>
</tr>
<tr>
<td style="text-align:right"><strong>Gastable Utilizado En Sutura</strong><br/><?=$rowp->histopatologico;?></td><td> </td>
</tr>
</table>
</div>
<table class='r-b' style="width:100%;" >
<tr>
<td style="text-align:right"><strong>Descripción Del Procedimiento</strong></td><td style="width:100%;font-size:12px" > <?=$rowp->desc_proced;?></td>
</tr>
</table>

<hr/>
</div>
<div id="footer">
<?php
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$rowp->id_user)
 ->get('users')->row_array();
  $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
  
     $sello_doc=$this->db->select('sello')->where('doc',$rowp->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>


<table class='r-b' align="center"  >
<tr>
<td style="text-align:center;border-bottom:1px solid #E6E6E6">
<?php 
$firma_doc="$rowp->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<span style="font-size:7px" ><strong>Firma autorizada y sello del medico</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>
<?php
$done_date=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
$author = $doc['name'];
$exeq = $doc['exequatur'];
$mpdf->setFooter("Dr $author, Exeq. $exeq, $area<br/><span style='color:red'>Fecha de creación $done_date</span><br/>Página {PAGENO} de {nb}");
?>
</body>
</html>
