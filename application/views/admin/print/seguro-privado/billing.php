<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">

</head>


<?php

$this->padron_database = $this->load->database('padron',TRUE);

 foreach($billing1 as $row1)
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 
 
 if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img  width="130"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat="";		
}
else{
$imgpat='<img  width="130" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}

$numafiliado=$this->db->select('input_name')
->where('patient_id',$row1->paciente)
->where('inputf',"No. DE AFILIADO")
->get('saveinput')->row("input_name");

$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
$seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();
$doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');
$exequatur=$this->db->select('exequatur')->where('id_user',$row1->medico )
->get('users')->row('exequatur');
if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
   // Set some content to print
?>
 <div style="position: absolute; top: 0px; text-align:right; font-size: 10px;font-weight:bold">
 <?=$row1->numfac?>
 </div>
<h2 style="text-align:center;text-transform:uppercase"><?=$doctor['name']?></h2>
<div  style="text-align:center;">
<span style="text-align:center;"><?=$area?></span><br/>
<span style="text-align:center;font-size:10px">Exeq :<?=$exequatur?></span>
<h5 style="text-align:center;color:blue;">RECLAMACION DE PAGO POR SERVICIO PRESTADO</h5>

</div>
<table style="width:100%">

	<tr>
		<td width="273"><?=$imgpat?></td>
		<td ><?=$logoseg?></td>
		<td  style="text-align:left"><?=date("d-m-Y H:i");?></td>
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
<td style="text-align:right"><strong>MEDICO TRATANTE</strong> :</td><td style="text-align:left;text-transform:uppercase"><?=$doctor['name']?> </td>
</tr>
<tr>
<td style="text-align:right"><strong>ESPECIALIDAD</strong> :</td><td style="text-align:left"><?=$area?></td>
</tr>
<tr>
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> <?=$row1->codigoprestado?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO DE SERVICIO</strong> :</td>

<td style="text-align:left">
<ol>
<?php
foreach($billing2 as $row2) {
$service=$this->db->select('procedimiento')->where('id_tarif',$row2->service)->get('tarifarios')->row('procedimiento');
?>
<li><?=$service?></li> 
<?php

}
?>
</ol>
</td>
</tr>
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
<tr>
<td style="text-align:right"><strong>PROCEDIMIENTO</strong> :</td>
<td style="text-align:left">
<?=$procedimiento;?>
</td>
</tr>

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


<table cellspacing="3" cellpadding="4" align="center">

	<tr>
		<td> <hr /><span style="font-size:11px"><strong>Firma autorizada y sello del reclamente</strong></span> </td>
		<td> <hr/><span style="font-size:11px"><strong>Nombre y cedula del afiliado o familiar responsable</strong></span></td>
		
	</tr>
</table>
<p style="font-size:9px;text-align:center"><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>


