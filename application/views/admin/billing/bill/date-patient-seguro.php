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
 $total_sub=0;
$total_seg=0;
$total_pat=0;
$this->padron_database = $this->load->database('padron',TRUE);
//$condition = "filter BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'";
$sqlgnl="SELECT *,sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura2 JOIN factura ON factura.id2=factura2.idfacc WHERE filter_date BETWEEN '$desde' AND '$hasta' AND seguro_medico=$seguro AND centro_medico=$centro GROUP BY numauto ORDER BY filter_date DESC";
$querygnl = $this->db->query($sqlgnl);
 $i = 1;
 foreach($querygnl->result() as $row){
	 $total_sub += $row->t1;
   $total_seg += $row->t2;
   $total_pat += $row->t3; 
//$fac2=$this->db->select('numfac,area,numauto, autopor, fecha,id_rdv')->where('idfacc',$row->id2)->get('factura2')->row_array();
$filter_date=$this->db->select('filter_date')->where('id_apoint',$row->id_rdv)->get('rendez_vous')->row('filter_date');
$logoc=$this->db->select('logo,name')->where('id_m_c',$centro)->get('medical_centers')->row_array();
$seguron=$this->db->select('title,logo,id_sm')->where('id_sm',$seguro)->get('seguro_medico')->row_array();
$doctor=$this->db->select('id_user, name')->where('id_user',$row->medico )
->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
$exequatur=$this->db->select('exequatur')->where('id_user',$row->medico )
->get('users')->row('exequatur');
if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:110px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
 $segurocodigoc=$this->db->select('codigo')->where('id_seguro',$seguro)->where('id_doctor',$row->medico)
 ->get('codigo_contrato')->row('codigo');
  // Set some content to print
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
$imgpat='<img  width="80"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat='<img  width="80" src="'.base_url().'/assets/img/user.png"  />';		
}
else{
$imgpat='<img  width="80" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}

 $segt=substr($seguron['title'],0,6);
  if($segt=='SENASA'){
	$numseg='NSS';  
  }else{
	$numseg='NO. AFILIADO';  
  }
?>
 <div style="position: absolute; top: 0px; text-align:left; font-size: 10px;font-weight:bold">
 <?=$exequatur?>-<?php echo $i; $i++ ?>
 </div>
<h4 style="text-align:center;text-transform:uppercase"><?=$doctor['name']?></h4>
<div  style="text-align:center;">
<span style="text-align:center;font-size:10px"><?=$area?></span><br/>
<span style="text-align:center;font-size:10px">Exeq :<?=$exequatur?></span>
<h5 style="text-align:center;color:blue;">RECLAMACION DE PAGO POR SERVICIO PRESTADO</h5>
</div>
<table style="width:100%;border-bottom:1px solid #DCDCDC">

	<tr>
	<td><?=$imgpat?></td>
	<td><?=$logoseg?><br/><span style='font-size:10px'><?=$seguron['title']?></span></td>
		<td  style="text-align:right"><?=date("d-m-Y H:i");?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></td>
	</tr>
</table>

<table   align="center" >
<!--
<tr>
<td style="text-align:left"><?php
echo $i;
$i++;
?>- <?=$imgpat?></td>
</tr>

<tr>
<td style="text-align:left"><?=$imgpat?> </td><td style="text-align:left;"> </td>
</tr>

-->

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
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> <?=$segurocodigoc?></td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO DE SERVICIO</strong> :</td>

<td style="text-align:left">
<!--<?php $service=$this->db->select('procedimiento')->where('id_tarif',$row->service)->get('tarifarios')->row('procedimiento');?>
<?=$service?>-->

<ol>
<?php
$sqlservice="SELECT service FROM factura WHERE id2=$row->idfacc GROUP BY service";
$queryservice = $this->db->query($sqlservice);
 //foreach($display_report as $rowsv){
foreach($queryservice->result() as $rowsv) {
$service=$this->db->select('procedimiento')->where('id_tarif',$rowsv->service)->get('tarifarios')->row('procedimiento');
?>
<li><?=$service?></li> 
<?php

}
?>
</ol>
</td>
</tr>

<?php 
$sqldiag="SELECT code,description FROM h_c_diagno_def_link JOIN cied ON h_c_diagno_def_link.diagno_def=cied.idd WHERE  p_id=$row->paciente && user_id=$row->medico && centro_medico=$row->centro_medico GROUP BY description";

$querydate = $this->db->query($sqldiag);
if($querydate->result() !=NULL){
?>
<tr>
<td style="text-align:right"><strong>DIAGNOSTICO</strong> :</td>
<td style="text-align:left">
<ol>
<?php
foreach($querydate->result() as $cie)

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
foreach($querydate->result() as $cod)
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

 $diagnos =$this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$row->paciente)->
where('id_user',$row->medico)->
where('centro_medico',$row->centro_medico)->
//where('current_day',$filter_date)->
get('h_c_conclusion_diagno')->row_array();
$procedimiento=$diagnos['procedimiento'];
$otros_diagnos=$diagnos['otros_diagnos'];
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
<br/><br/><br/><br/><br/><br/><br/><br/>
<p style="font-size:10px;width: 100%;text-align:center;">

 
 TOTAL RECLAMADO : <b>RD$ <?=number_format($row->t1,2)?></b>&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b>RD$ <?=number_format($row->t2,2)?></b>&nbsp;&nbsp;&nbsp;
 EL PACIENTE PAGARA : <b>RD$ <?=number_format($row->t3,2)?></b>&nbsp;&nbsp;&nbsp;
 </p>
<table cellspacing="3" cellpadding="4" align="center">

	<tr>
<td>
<?php 
$firma_doc1="$row->medico-1.png";

$signature1 = "assets/update/$firma_doc1";

if (file_exists($signature1)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc1?>"  />

<?php
} else {

}
?>
<hr />
<span style="font-size:11px" title="sdfsdf"><strong>Firma autorizada y sello del reclamente</strong></span> 
</td>
		<td>
 <?php 
$firma_doc="$row->paciente-0.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
		<hr/><span style="font-size:11px"><strong>Nombre y cedula del afiliado o familiar responsable</strong></span>

		</td>
	</tr>
</table>
<p style="font-size:11px;text-align:center" id='break-after' ><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>

<?php }


 ?>

