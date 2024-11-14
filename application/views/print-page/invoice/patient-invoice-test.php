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


 #absolute-element-footer2 {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
</head>


<?php

if($display_report !=NULL){
 foreach($display_report as $row1){
 $paciente=$this->db->select('id_p_a,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,plan')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 
 
 $pm = $this->db->select('paciente,medico,centro_medico,id_rdv')->where('idfacc', $row1->idfacc)->get('factura2')->row_array();
        
        $lastPatConDiag = $this->clinical_history->select('id, procedimiento, otros_diagnos')->where('historial_id', $row1->paciente)->where('id_user', $row1->medico)->order_by('id', 'DESC')->get('h_c_conclusion_diagno')->row_array();
			if($lastPatConDiag){
        $procedimiento = $lastPatConDiag['procedimiento'];
        $otros_diagnos = $lastPatConDiag['otros_diagnos'];
        $con_id_link = $lastPatConDiag['id'];
        $show_diagno_pat= $this->model_admin->show_diagno_pat($con_id_link);
			}else{
			 $procedimiento = '';
        $otros_diagnos = '';
		$show_diagno_pat = NULL;
			}
 	
		
 
  $numafiliado=$this->db->select('input_name')->where('patient_id',$row1->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');

$centroName=$this->db->select('name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row('name');
$seguron=$this->db->select('title,logo,id_sm,rnc')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();
$doctorInfo=$this->db->select('name, exequatur, area')->where('id_user',$row1->medico)->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$doctorInfo['area'])->get('areas')->row('title_area');
$exequatur=$doctorInfo['exequatur'];
$doctor=$doctorInfo['name'];
if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:60px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
 $seguroCodDoc=$this->db->select('codigo')->where('id_seguro',$row1->seguro_medico)->where('id_doctor',$row1->medico)->get('codigo_contrato')->row('codigo');
 
 $seguroCodCentro=$this->db->select('codigo')->where('id_centro',$row1->centro_medico)->where('id_seguro',$row1->seguro_medico)->get('codigo_contrato')->row('codigo');

$segt=substr($seguron['title'],0,6);
if($segt=='SENASA'){
$numseg='NSS';  
}else{
$numseg='NO. AFILIADO';  
}

if($print=='medico'){
$headInfo="$doctor";
$headInfo_="<span style='text-align:center;'>$area</span>
<span style='text-align:center;font-size:10px'>Exeq :$exequatur</span><br/>";
$seguroContrato=$seguroCodDoc;
$numFac = $row1->numfac;
}else{
$seguroContrato=$seguroCodCentro;
$headInfo=$centroName; 
$headInfo_="";
$numFac = $row1->numfac2;	
}


  
?>
 <div style="position: absolute; top: 0px; text-align:right; font-size: 10px;font-weight:bold">
 <?=$numFac?>
 </div>
<div  style="text-align:center;">
<span style="text-align:center;text-transform:uppercase"><?=$headInfo?></span><br/>
<?=$headInfo_?>
<span style="color:blue;font-size:13px">RECLAMACION DE PAGO POR SERVICIO PRESTADO</span><br/>
<span style="font-size:10px"><?=$seguron['title']?></span><br/>
<span style="font-size:10px">RNC: <?=$seguron['rnc']?></span>
</div>
<table style="width:100%;border-bottom:1px solid #DCDCDC">

	<tr>
	
	<td><?=$logoseg?></td>
	<td  style="text-align:right"><?=date("d-m-Y H:i");?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></td>
	</tr>
</table>



<div  style="border-top:1px solid rgb(0,64,128)">
<br/>


<table  align="center" >

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
<?php if($row1->seguro_medico !=11) {?>
<tr>
<td style="text-align:right"><strong>TIPO AFILIADO</strong> :</td><td style="text-align:left"><?=$paciente['afiliado']?></td>
</tr>

<tr>
<td style="text-align:right"><strong><?=$numseg?></strong> :</td><td style="text-align:left"><?=$numafiliado?></td>
</tr>
<?php
}
if($paciente['email']){
?>
<tr>
<td style="text-align:right"><strong>EMAIL</strong> :</td><td style="text-align:left"><?=$paciente['email']?></td>
</tr>
<?php
}
if($row1->medico > 1){
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
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> <?=$seguroContrato?></td>
</tr>
<tr>
<td style="text-align:right" valign="top">
<?php if($print=='medico'){
echo '<strong>TIPO DE SERVICIO</strong> :';
}else{
echo '<strong>AREA(S)</strong> :';
}?>
</td>

<td style="text-align:left">

<?php
$queryServices= $this->db->query("SELECT idfac, grupo_area, service FROM factura WHERE id2=$row1->idfacc GROUP BY service");
if($print=='medico'){
foreach($queryServices->result() as $row2) {
$service=$this->db->select('procedimiento')->where('id_tarif',$row2->service)->get('tarifarios_test')->row('procedimiento');
echo $service."<br/>";
}
}
else{
	if($row1->seguro_medico !=11){
		$area_public_centro_asegurado=$this->db->select('area_public_centro_asegurado')->where('idfacc',$row1->idfacc )->get('factura2')->row('area_public_centro_asegurado');
	echo $area_public_centro_asegurado;
	}else{
foreach($queryServices->result() as $row){
	echo $row->grupo_area. " - ";
}
	}
//$service=$this->db->query("Select DISTINCT groupo FROM centros_tarifarios_test WHERE id_c_taf=$row2->service GROUP BY groupo")->row()->groupo;
	}

?>


</td>
</tr>
<?php 
 if($show_diagno_pat !=NULL){?>
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
<?php if($show_diagno_pat !=""){?>
<tr>
<td style="text-align:right"><strong>DIAGNOSTICO</strong> :</td>
<td style="text-align:left">
<?php
$causa=$this->db->select('causa')->where('doctor',$row1->medico)->where('id_patient',$row1->paciente)->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('causa');
echo $causa;
?> 
</td>
</tr>
<?php }
 if($row1->seguro_medico !=11) {?>

<tr>
<td style="text-align:right"><strong>NRO AUTORIZACION</strong> :</td><td style="color:red;text-align:left"><?=$row1->numauto?> </td>
</tr>
<tr>
<td style="text-align:right"><strong>AUTORIZADO POR</strong> :</td><td style="text-align:left"><?=$row1->autopor?></td>
</tr>
 <?php } ?>
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
$this->db->where("id2",$row1->idfacc);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;
$sbt=number_format($sbt,2);
//---------------------------------
$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$row1->idfacc);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;
$tps=number_format($tps,2);
//-------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$row1->idfacc);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);


?>

TOTAL RECLAMADO : <b>RD$ <?=$sbt?></b>&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b>RD$ <?=$tps?></b>&nbsp;&nbsp;&nbsp;
 EL PACIENTE PAGARA : <b>RD$ <?=$tpat?></b>&nbsp;&nbsp;&nbsp;
 </p>

<?php

 $sello_doc=$this->db->select('sello')->where('doc',$row1->medico)->where('dist',0)->get('doctor_sello')->row('sello');
if ($sello_doc) {
$sellodoc='<img  style="width:160px;margin-left:30%" src="'.base_url().'/assets/update/'.$sello_doc.'"  />';
}else{
$sellodoc='';	
}
echo $sellodoc;
?>
<br/><br/>
<div id="<?=$push_down?>">
<table cellspacing="4" cellpadding="4" align="center" >
<tr>
<?php if($row1->medico > 1){ ?>
<td>
<?php 
$firma_doc="$row1->medico-1.png";

$signature = "assets/update/$firma_doc";
if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<br/>
<?php
} else {
}
?>
<hr/>
<strong style="font-size:11px">Firma autorizada y sello del reclamente</strong>
</td>
<?php } ?>
<td>

<?php 

foreach($display_report as $row2) 

$firma=$this->db->select('id_fac,firma,created_time,origne')->where('id_fac',$row1->idfacc)->get('factura_patient_firma')->row_array();
if($firma) {
if($firma['origne']==0)	{
$style="style='border-top:1px solid #708090'";	
}else{
$style="";	
}	
	?>
<table>
<tr>
<td>
<?=$row1->idfacc?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma['firma']?>"  />
</td>
<td>

<i style='font-size:6px;color:red;'><?=date("d-m-Y H:i:s", strtotime($firma['created_time']));?></i>
</td>
</tr>
</table>
<hr/>
<strong  style="font-size:11px">Firma del afiliado o familiar responsable</strong>
<?php
} else {
$style="style='border-top:1px solid #708090'";
?>
<!--<a style="color:red;font-size:11px" href="<?=site_url()?>admin_medico/sendLinkToPatientForSingning/<?=$row1->paciente?>/<?=$row2->idfacc?>/<?=$row1->centro_medico?>/<?=$row1->seguro_medico?>/<?=$row1->medico?>">Enviar el link de firma al paciente</a>
<br/>-->
<a style="color:red;font-size:11px" href="<?=site_url()?>signature/create_patient_signature/<?=$row1->paciente?>/<?=$row2->idfacc?>">Crear La Firma Del Paciente</a>

</td>

<?php
}
?>

		
</tr>
</table>
<p style="font-size:9px;text-align:center" id='<?=$break_after?>'><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>
</div>
<?php
}
}else{
	echo "No hay datos";
}


?>
