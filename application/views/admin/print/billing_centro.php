<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
</head>

<?php

$this->padron_database = $this->load->database('padron',TRUE);


foreach($billing1 as $row1)
 
 
 $numafiliado=$this->db->select('input_name')
->where('patient_id',$row1->paciente)
->where('input_name !=','')
->get('saveinput')->row("input_name");
 

 $seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();
$centro=$this->db->select('name,logo')->where('id_m_c',$row1->centro_medico)
->get('medical_centers')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');
$paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,plan')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 $doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row('name');
 if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:130px"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:130px" src="'.base_url().'/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat="";	
}
else{
$imgpat='<img  style="width:130px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}
 $segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row1->seguro_medico)->where('id_doctor',$row1->medico)
 ->where('plan',$paciente['plan'])
 ->get('codigo_contrato')->row('codigo');
   // Set some content to print
?>
<body >
 <div style="position: absolute; top: 0px; text-align:right; font-size: 10px;font-weight:bold">
 <?=$row1->numfac?>
 </div>
<h2 style="text-align:center;text-transform:uppercase"><?=$centro['name']?></h2>
<div  style="text-align:center;">
<!--<img class="img" style="width:170px;" src="<?=base_url()?>/assets/img/centros_medicos/<?=$centro['logo']?>"  />-->
<h5 style="text-align:center;color:blue;">RECLAMACION DE PAGO POR SERVICIO PRESTADO</h5>
</div>
<!--<table  align="center">

	<tr>
		<td><?=$imgpat?></td>
	</tr>
</table>
-->
<table style="width:100%">

	<tr>
		<td width="273"><?=$imgpat?></td>
		<td ><img class="img" style="width:150px;" src="<?=base_url()?>/assets/img/centros_medicos/<?=$centro['logo']?>"  /></td>
		<td  style="text-align:left"><?=date("d-m-Y H:i");?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></td>
	</tr>
</table>

<div  style="border-top:1px solid rgb(0,64,128)">
<br/>
<table style="font-size:13px;" align="center" >

<tr>
<td style="text-align:right"><strong>NOMBRE AFILIADO</strong> :  </td><td style="text-align:left;text-transform:uppercase"> <?=$paciente['nombre']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>CEDULA</strong> :</td><td style="text-align:left"><?=$paciente['cedula']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TELEFONO</strong> :</td><td style="text-align:left"><?=$paciente['tel_cel']?> /  <?=$paciente['tel_resi']?> </td>
</tr>
<tr >
<td style="text-align:right"><strong>ASEGURADORA</strong> :</td><td style="text-align:left"><?=$seguron['title']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO AFILIADO</strong> :</td><td style="text-align:left"><?=$paciente['afiliado']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>NO. AFILIADO</strong> :</td><td style="text-align:left"><?=$numafiliado?></td>
</tr>
<tr>
<td style="text-align:right"><strong>EMAIL</strong> :</td><td style="text-align:left"><?=$paciente['email']?></td>
</tr>

<tr>
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> <?=$segurocodigoc?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO DE SERVICIO</strong> :</td>

<td style="text-align:left">
<ol>
<?php
foreach($billing2 as $row2) {
$service=$this->db->select('sub_groupo')->where('id_c_taf',$row2->service)->get('centros_tarifarios')->row('sub_groupo');

?>
<li><?=$service?></li> 
<?php

}
?>
</ol>
</td>
</tr>
<?php if($show_diagno_pat !=NULL){?>
<tr>
<td style="text-align:right"><strong>DIAGNOSTICO</strong> :</td>
<td style="text-align:left">
<ol>
<?php
foreach($show_diagno_pat as $cie)

{
?>
<li><?=$cie->description?> </li> 
<?php

}
?>
</ol>
</td>
</tr>

<tr>
<td style="text-align:right"><strong>CODIGO CIE-10</strong> :</td>
<td style="text-align:left">
<ol>
<?php
foreach($show_diagno_pat as $cod)
{
?>
<li><?=$cod->code?> </li> 

<?php
}

?>
</ol>
</td>

</tr>
<?php } if($otros_diagnos !=""){?>
<tr>
<td style="text-align:right"><strong>OTRO DIAGNOSTICO</strong> :</td>
<td style="text-align:left">
<?=$otros_diagnos;?>
</td>
</tr>
<?php } if($procedimiento !=""){?>
<tr>
<td style="text-align:right"><strong>PROCEDIMIENTO</strong> :</td>
<td style="text-align:left">
<?=$procedimiento;?>
</td>
</tr>
<?php } ?>
<tr>
<td style="text-align:right"><strong>NRO AUTORIZACION</strong> :</td><td style="color:red;text-align:left"><?=$row1->numauto?> </td>
</tr>
<tr>
<td style="text-align:right"><strong>AUTORIZADO POR</strong> :</td><td style="text-align:left"><?=$row1->autopor?></td>
</tr>

<tr>
<td style="text-align:right"><strong>FECHA</strong> :</td><td style="text-align:left"><?=$row1->fecha?></td>
</tr>

</table>

</div>
<br/>
<p style="font-size:10px;width: 100%;text-align:center;">
<br/><br/>
<?php
$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;
$sbt=number_format($sbt,2);
//---------------------------------
$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;
$tps=number_format($tps,2);
//-------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);
?>

TOTAL RECLAMADO : <b>RD$ <?=$sbt?></b>&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b>RD$ <?=$tps?></b>&nbsp;&nbsp;&nbsp;
 EL PACIENTE PAGARA : <b>RD$ <?=$tpat?></b>&nbsp;&nbsp;&nbsp;
 </p>

<br/>
<?php
 $sello_doc=$this->db->select('sello')->where('doc',$row1->medico)->where('dist',0)->get('doctor_sello')->row('sello');
if ($sello_doc) {
$sellodoc='<img  style="width:100px;margin-left:20%" src="'.base_url().'/assets/update/'.$sello_doc.'"  />';
}else{
$sellodoc='';	
}
echo $sellodoc;
?>
<table cellspacing="3" cellpadding="4" align="center" >
<tr>
<td>
<table>
<tr>
<td>
<?php 
$firma_doc="$row1->medico-1.png";

$signature = "assets/update/$firma_doc";
if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
</td>
</tr>
<tr>
<td>
</td>
</tr>
<tr>
<td>
</td>
</tr>
<tr>
<td  style='border-top:1px solid #708090'>
<strong style="font-size:11px">Firma autorizada y sello del reclamente</strong>
</td>
</tr>
</table>
</td>
<td>
<table>
<tr>
<td>
<?php 
$firma=$this->db->select('id_fac,firma,created_time,origne')->where('id_fac',$row2->idfac)->get('factura_patient_firma')->row_array();
if($firma['id_fac'] !="") {
if($firma['origne']==0)	{
$style="style='border-top:1px solid #708090'";	
}else{
$style="";	
}
	
?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma['firma']?>"  />
</td>
</tr>
<tr>
<td style='text-align:center'>
<i style='font-size:6px;color:red'><?=date("d-m-Y H:i:s", strtotime($firma['created_time']));?></i>
</td>
</tr>
<?php
} else {
	$style="style='border-top:1px solid #708090'";
?>
<tr>
<td >
<a style="color:red;font-size:11px" href="https://www.admedicall.com/admin_medico/sendLinkToPatientForSingning/<?=$row1->paciente?>/<?=$row2->idfac?>/<?=$row1->centro_medico?>/<?=$row1->seguro_medico?>/<?=$row1->medico?>">Enviar el link de firma al paciente</a>
<br/><br/>
<a style="color:red;font-size:11px" href="https://www.admedicall.com/printings/signaturePatient/<?=$row1->paciente?>/<?=$row2->idfac?>">Crear La Firma Del Paciente</a>
</td>
</tr>
<?php
}
?>
<tr>
<td <?=$style?>>
<span style="font-size:11px"><strong>Nombre y cedula del afiliado o familiar responsable</strong></span>
</td>
</tr>
</table>
</td>
		
</tr>
</table>
<p style="font-size:9px;text-align:center"><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>
</body>

