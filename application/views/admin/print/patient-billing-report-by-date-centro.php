<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<style>
td{font-size:12px}
@media print {
   #break-after {
        page-break-after: always;
		
    }
}

 
</style>
</head>
<?php

$this->padron_database = $this->load->database('padron',TRUE);
if($querygnl->result() !=NULL){
 $i = 1;
 foreach($querygnl->result() as $row){

$filter_date=$this->db->select('filter_date')->where('id_apoint',$row->id_rdv)->get('rendez_vous')->row('filter_date');
$centroInfo=$this->db->select('name,type')->where('id_m_c',$centro)->get('medical_centers')->row_array();
$centroName=$centroInfo['name'];
$centroType=$centroInfo['type'];
$seguron=$this->db->select('title,logo,id_sm,rnc')->where('id_sm',$seguro)->get('seguro_medico')->row_array();
$doctorInfo=$this->db->select('id_user, name, exequatur, area')->where('id_user',$row->medico)->get('users')->row_array();

$exequatur=$doctorInfo['exequatur'];
$doctor=$doctorInfo['name'];

$area=$this->db->select('title_area')->where('id_ar',$doctorInfo['area'])->get('areas')->row('title_area');

if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:110px;" src="https://www.admedicall.com/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
 $seguroCodDoc=$this->db->select('codigo')->where('id_seguro',$seguro)->where('id_doctor',$row->medico)->get('codigo_contrato')->row('codigo');
 $seguroCodCentro=$this->db->select('codigo')->where('id_seguro',$seguro)->where('id_centro',$centro)->get('codigo_contrato')->row('codigo');
  $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,plan')->where('id_p_a',$row->paciente)
 ->get('patients_appointments')->row_array();

 $numafiliado=$this->db->select('input_name')->where('patient_id',$row->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');
 if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:80px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:80px;" src="https://www.admedicall.com/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat='<img  width="80px" src="https://www.admedicall.com/assets/img/user.png"  />';		
}
else{
$imgpat='<img  width="80px" src="https://www.admedicall.com/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}

 $segt=substr($seguron['title'],0,6);
  if($segt=='SENASA'){
	$numseg='NSS';  
  }else{
	$numseg='NO. AFILIADO';  
  }
  


  
  
  
?>
 <div style="position: absolute; top: 0px; text-align:left; font-size: 10px;font-weight:bold">
 <?=$row->numfac2?>
 </div>
<h4 style="text-align:center;text-transform:uppercase"><?=$centroName?></h4>
<div  style="text-align:center;">
<h5 style="text-align:center;color:blue;">RECLAMACION DE PAGO POR SERVICIO PRESTADO</h5>
<span style="text-align:center;font-size:10px"><?=$logoseg?></span><br/>
<span style="text-align:center;font-size:10px"><?=$seguron['title']?></span><br/>
<span style="text-align:center;font-size:10px">RNC: <?=$seguron['rnc']?></span>
</div>
<table style="width:100%;border-bottom:1px solid #DCDCDC">

	<tr>
	<td><?=$imgpat?></td>
	<td></td>
	<td  style="text-align:right"><?=date("d-m-Y H:i");?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></td>
	</tr>
</table>

<table   align="center" >

<tr>
<td style="text-align:right"><strong>NOMBRE AFILIADO</strong> :  </td><td style="text-align:left;text-transform:uppercase"> <?=$paciente['nombre']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>CEDULA</strong> :</td><td style="text-align:left"><?=$paciente['cedula']?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TELEFONO</strong> :</td><td style="text-align:left"><?=$paciente['tel_cel']?> /  <?=$paciente['tel_resi']?> </td>
</tr>

<tr>
<td style="text-align:right"><strong>TIPO AFILIADO</strong> :</td><td style="text-align:left"><?=$paciente['afiliado']?></td>
</tr>
<tr>
<td style="text-align:right"><strong><?=$numseg?></strong> :</td><td style="text-align:left"><?=$numafiliado?></td>
</tr>
<?php
if($paciente['email']){
?>
<tr>
<td style="text-align:right"><strong>EMAIL</strong> :</td><td style="text-align:left"><?=$paciente['email']?></td>
</tr>
<?php } 
if($row->medico > 1){

?>
<tr>
<td style="text-align:right"><strong>MEDICO TRATANTE</strong> :</td><td style="text-align:left;text-transform:uppercase"><?=$doctorInfo['name']?> </td>
</tr>
<tr>
<td style="text-align:right"><strong>ESPECIALIDAD</strong> :</td><td style="text-align:left"><?=$area?></td>
</tr>
<tr>
<td style="text-align:right"><strong>EXEQUATUR</strong> :</td><td style="text-align:left"><?=$exequatur?></td>
</tr>
<?php } ?>
<tr>
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> <?=$seguroCodCentro?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO DE SERVICIO</strong> :</td>

<td style="text-align:left">
<ol>
<?php
$sqlservice="SELECT service FROM factura WHERE id2=$row->idfacc GROUP BY service";
$queryservice = $this->db->query($sqlservice);
foreach($queryservice->result() as $rowsv) {
if($centroType=='privado'){
$service=$this->db->select('procedimiento')->where('id_tarif',$rowsv->service)->get('tarifarios')->row('procedimiento');
}else{
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rowsv->service)->get('centros_tarifarios')->row('sub_groupo');
}
?>
<li><?=$service?></li> 
<?php

}
?>
</ol>
</td>
</tr>

<?php 

$lastPatConDiag=$this->db->select('id_cdia, procedimiento, otros_diagnos')->where('historial_id',$row->paciente)->where('id_user',$row->medico)->where('centro_medico',$row->centro_medico)->order_by('id_cdia','DESC')->get('h_c_conclusion_diagno')->row_array();

$procedimiento=$lastPatConDiag['procedimiento'];
$otros_diagnos=$lastPatConDiag['otros_diagnos'];
$con_id_link=$lastPatConDiag['id_cdia']; 
 $show_diagno_pat=$this->model_admin->show_diagno_pat($con_id_link);

if($show_diagno_pat !=NULL){
?>
<tr>
<td></td>
</tr>

<tr>
<td style="text-align:right" valign="top"><strong>DIAGNOSTICO</strong> :</td>
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
<td style="text-align:right" valign="top"><strong>CODIGO CIE-10</strong> :</td>
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
<?php }


 if($otros_diagnos !=""){?>
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
<td style="text-align:right"><strong>NRO AUTORIZACION</strong> :</td><td style="color:red;text-align:left"><?=$row->numauto?> </td>
</tr>
<tr>
<td style="text-align:right"><strong>AUTORIZADO POR</strong> :</td><td style="text-align:left"><?=$row->autopor?></td>
</tr>

<tr>
<td style="text-align:right"><strong>FECHA</strong> :</td><td style="text-align:left"><?=$row->fecha?></td>
</tr>
</table>
<br/><br/><br/><br/>
<p style="font-size:10px;width: 100%;text-align:center;">
 TOTAL RECLAMADO : <b>RD$ <?=number_format($row->t2,2)?></b>&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b>RD$ <?=number_format($row->t2,2)?></b>&nbsp;&nbsp;&nbsp;
EL PACIENTE PAGARA : <b>RD$ 0.00</b>&nbsp;&nbsp;&nbsp;
</p>
<?php
 $sello_doc=$this->db->select('sello')->where('doc',$row->medico)->where('dist',0)->get('doctor_sello')->row('sello');
if ($sello_doc) {
$sellodoc='<td><img  style="width:100px;" src="https://www.admedicall.com/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sellodoc='';	
}

?>
<table cellspacing="5" cellpadding="5" align="center">
<tr>
<?php if($row->medico > 1){ ?>
<td style="text-align:center">
<br/>
<?php 
$firma_doc="$row->medico-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<div style="font-size:11px;border-top:1px solid #DCDCDC"><strong>Firma autorizada y sello del medico</strong></div>
</td>
<?php } ?>
<?=$sellodoc?>
<td>
<br/>
<table>
<tr>
<td>
<?php 
$firma=$this->db->select('id_fac,firma,created_time')->where('id_fac',$row->idfac)->get('factura_patient_firma')->row_array();
if($firma['id_fac'] !="") {?>
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
?>
<tr>
<td >
</td>
</tr>
<?php
}
?>
<tr>
<td  style='border-top:1px solid #DCDCDC'>
<strong  style="font-size:11px">Firma del afiliado o familiar responsable</strong>
</td>
</tr>
</table>
</td>
</tr>
</table>

<p style="font-size:11px;text-align:center" id='break-after' ><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>
<?php
 }
}else{
	echo "No hay datos";
}

 ?>


 

