<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em;border-color:#E6E6E6; }
</style>
</head>
<body>
<?php

  $total_sub=0;
$total_seg=0;
$total_pat=0;
 $fecha = date("d-m-Y");
 $hour=date("H:i:s");
  foreach ($invoice as $row)
 foreach ($nota_ncf as $nncf) 
 $ars=$this->db->select('logo,title,id_sm,rnc')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();
$doc=$this->db->select('name,exequatur,area,cedula')->where('id_user',$row->medico)
->get('users')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');

$centroInfo=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle,type')->where('id_m_c',$id_centro)
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

if($centroInfo['type']=="privado"){
$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_doctor',$row->medico)->get('codigo_contrato')->row('codigo');

?>
<div style=" top: 0px; float:left; font-size: 7px;font-weight:bold;width:80px;">
 <?=$doc['exequatur']?>-<?=$id_ncf?> 
 </div>
 <br/>
<div style="text-align:center">
<h2 style="text-align:center;text-transform:uppercase">Dr. <?=$doc['name']?> </h2>
<span ><strong><?=$area?></span><br/>
<span ><strong>Exeq : <?=$doc['exequatur']?></strong></span><br/>
<span><strong>RNC: <?=$doc['cedula']?></strong></span>
</div>
<hr/>
<?php } else {
$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_centro',$id_centro)->get('codigo_contrato')->row('codigo');
		
	?>
<span style="position: absolute; top: 0px; float:right; font-size: 10px;width:100%;font-weight:bold">
<?=$id_centro?>-<?=$id_ncf?>
 </span>
<table >
<tr style="border:none">
<td>
<img  style="width:70px" src="<?= base_url();?>assets/img/centros_medicos/<?=$centro_logo;?>"  />
</td>
<td >
<h3><?=$centro_name?></h3>
<strong>Tel:</strong> <?=$primer_tel?> <?=$segundo_tel?> <strong>RNC: </strong><?=$rnc?> <strong>Ubicación:</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> 
</td>

</tr>
</table>
<hr/>
<?php }?>

<div style="width:13%;display: block;float: left;">
<span style="font-size:7px;text-align:center"><strong><?=$ars['title']?></strong></span><br/>

<table>
<tr style="border:none">
<th>
<?php 
if($ars['title']=="PRIVADO"){} else {
	 ?> 
<img  style="width:70px;" src="<?=base_url()?>/assets/img/seguros_medicos/<?=$ars['logo']?>"  />
<span style='font-size:8px'>RNC: <?php echo $ars['rnc'];?></span>
<?php
}
?> 

</th>

</tr>
</table>
</div>
 <?php if($nncf->cancel_text !=""){
	$cancel="<span style='color:red;border:1px solid red;'>Cancelado</span>";   
   }else{
	$cancel="";   
   }?>
<div style="width: 16%;display: block;float: right;font-size:12px;">
<span><strong>Fecha</strong> : <?=$fecha?></span><br/>
<span><strong>Hora</strong> : <?=$hour?></span><br/>
<span><strong>No. Contrado</strong> <span style="color:#8B0000"><?=$segurocodigoc?></span></span>
</div>
<div style="width:71%;display: block;float: right;font-size:12px;text-align:center">
<h3 >Factura Válida Para Crédito Fiscal</h3>
<span ><strong>NCF</strong> : <?=$nncf->value?></span ><br/>
<span ><strong>Vencimiento Secuencia</strong> : <?=date("d-m-Y", strtotime($nncf->vec_fec))?></span >
<br/>
<?=$cancel?>
</div>
<div style="width: 100%;">
<hr/>
<?php
$desde1= date("d-m-Y", strtotime($desde));
$hasta1= date("d-m-Y", strtotime($hasta));
?>
<p style="font-size:11px;">Desde <?=$desde1?> Hasta <?=$hasta1?></p>
<table  style="font-size:11px;width:100%">
<thead>
<tr style="background:#D7E495">
<td  ><strong>#</strong></td>
<td ><strong>Fecha</strong></td>
<td ><strong>Foto</strong></td>
<td ><strong>Paciente</strong></td>
<td ><strong>Cedula</strong></td>
<td ><strong>NSS</strong></td>
<td ><strong>No Autorizaciòn</strong></td>
<td ><strong>Servicio</strong></td>
<!--<th style="text-align:right">Total Reclamado</th>
<th style="text-align:right">Paciente Pagara</th>-->
<td ><strong>Aseguradora Pagará</strong></td>
</tr>

</thead>
<tbody>

<?php
$i = 1;
foreach($invoice as $fac) 
{ 
  
 $paciente=$this->db->select('nombre,cedula,ced1,ced2,ced3,photo')->where('id_p_a',$fac->paciente)
 ->get('patients_appointments')->row_array();


 $num_af=$this->db->select('input_name')->where('patient_id',$fac->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');


  $numautoid=$this->db->select('id2, service')->where('id2',$fac->id_f)
 ->get('factura')->row_array();
 
   $factData=$this->db->select('numauto, area_public_centro_asegurado')->where('idfacc',$numautoid['id2'])
 ->get('factura2')->row_array();
 
 if($centroInfo['type']=="privado"){
$service=$this->db->select('procedimiento')->where('id_tarif',$numautoid['service'])->get('tarifarios_test')->row('procedimiento');	
 }else{
	 if($row->seguro_medico==11){
 $service=$this->db->select('sub_groupo')->where('id_c_taf',$numautoid['service'])->get('centros_tarifarios_test')->row('sub_groupo');
	 }else{
		$service=$factData['area_public_centro_asegurado'];
	 }
 }

 
$fecha=date("d-m-Y", strtotime($fac->fecha));


$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$fac->idfacc);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;



   $total_seg += $tps;
  


$money_device = $this->db->select('money_device')->where('id_factura', $fac->idfacc)->get('factura_modalidad_pago')->row('money_device');
if($money_device){
$money_device=$money_device;	
}else{
$money_device='RD$';	
}

 
?>
<tr>
<td style="text-align:left;" valign="top"><?php echo $i; $i++;?> </td>
<td style="text-align:left;" valign="top"><?=$fecha?></td>
<td style="text-align:left;" valign="top"></td>
<td style="text-transform:uppercase;text-align:left" valign="top"><?=$paciente['nombre']?></td>

<td  valign="top"><?=$paciente['cedula']?></td>

<td  valign="top"><?=$num_af?></td>
<td style="text-align:left;color:#8B0000"valign="top" ><?=$factData['numauto']?></td>
<td style="text-align:left;" valign="top"><?=$service?></td>
<td  valign="top"><?=$money_device?> <?=number_format($tps,2)?></td>

</tr> 
<?php

}
 
$total_pagar_seguro=number_format($total_seg,2);
?>
</tbody>
<footer>
<tr><th><?=$cntinv?></th><th colspan="4" style="background:#D7E495"></th><th style="background:#D7E495"></th><th style="text-align:left;background:#D7E495"></th><th style="text-align:right;font-size:12px;background:#D7E495">Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th style="text-align:left;font-size:9px">&nbsp;&nbsp;<?=$money_device?> <?=$total_pagar_seguro?></th></tr>
<tr>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td>
<table style="width:100%">
<tr >
<td style="color:red;border:none;padding:0px;text-align:left">DESC.</td><td style="padding:0px;color:red;border:none;text-align:left;"> 0.00</td>
</tr>
<tr>
<td  style="color:red;border:none;padding:0px;text-align:left">ITBIS</td><td   style="color:red;text-align:left;padding:0px;border:none"> 0.00 </td>
</tr>
<tr  style="border:none">
<th style="color:blue;border:none;text-align:left">TOTAL&nbsp;</th><th style="padding:0px;color:blue;text-align:left;border:none"><?=$money_device?>&nbsp;<?=$total_pagar_seguro?></th>
</tr>
</table>
</td>
</tr>


</footer>
 </table>
 </div>
<div style='position: absolute; bottom: 60px;'>
<table  align="center" style='font-size:8px;width:100% '>
<tr>
<td style='border-bottom:1px solid #708090;border-top:none;width:30%'>
<?php 
$firma_doc="$row->medico-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
}else{
	
}
?>
</td> 
<td style='border:none;width:70%'>
<?php
$sello_doc=$this->db->select('sello')->where('doc',$row->medico)->where('dist',0)->get('doctor_sello')->row('sello');
if ($sello_doc) {?>
<img  style="width:200px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {
}
?>
</td>
</tr>
<tr>
<td style='border:none;text-align:center'>
<strong>FIRMA DEL PROVEEDOR DEL SERVICIO</strong>
</td>
<td style='border-top:none;text-align:center'>
<strong>SELLO DEL PROVEEDOR DEL SERVICIO</strong>
</td>
</tr>
</table>
</div>

</body>
