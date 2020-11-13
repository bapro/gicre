<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }
</style>
</head>
<body>
<?php

 $this->padron_database = $this->load->database('padron',TRUE);
  $total_sub=0;
$total_seg=0;
$total_pat=0;
 $fecha = date("d-m-Y");
 $hour=date("H:i:s");
  foreach ($invoice as $row)
 foreach ($nota_ncf as $nncf) 
 $ars=$this->db->select('logo,title,id_sm,rnc')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();
$doctor=$this->db->select('name')->where('id_user',$row->medico)
->get('users')->row('name');
$doc=$this->db->select('exequatur,area,cedula')->where('id_user',$row->medico)
->get('users')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');
$centro=$this->db->select('name,type,logo')->where('id_m_c',$id_centro)->get('medical_centers')->row_array();	

if($centro['type']=="privado"){
$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_doctor',$row->medico)->get('codigo_contrato')->row('codigo');

?>
<div style=" top: 0px; float:left; font-size: 7px;font-weight:bold;width:80px;">
 <?=$doc['exequatur']?>-<?=$last_id?> 
 </div>
 <br/>
<div style="text-align:center">
<h2 style="text-align:center;text-transform:uppercase">Dr. <?=$doctor?> </h2>
<span ><strong><?=$area?></span><br/>
<span ><strong>Exeq : <?=$doc['exequatur']?></strong></span><br/>
<span><strong>RNC: <?=$doc['cedula']?></strong></span>
</div>
<?php } else {
$centro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$segurocodigoc=$this->db->select('codigo')->where('id_seguro',$row->seguro_medico)->where('id_centro',$id_centro)->get('codigo_contrato')->row('codigo');
		
	?>
<div style="position: absolute; top: 0px; float:right; font-size: 10px;width:30px;font-weight:bold">
<?=$id_centro?>-<?=$last_id?>
 </div>
<h2 style="text-align:center;text-transform:uppercase"><?=$centro['name']?> </h2>
<h5 style="text-align:center"><?=$centro_logo?></h5>

<?php }?>
<hr/>
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
<span ><strong>Vencimiento Secuencia</strong> : <?=$nncf->vec_fec?></span >
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
<td  style="text-align:left"><strong>#</strong></td>
<td style="text-align:left"><strong>Fecha</strong></td>
<td style="text-align:left"><strong>Foto</strong></td>
<td style="text-align:left"><strong>Paciente</strong></td>
<td style="text-align:left"><strong>Cedula</strong></td>
<td style="text-align:left"><strong>NSS</strong></td>
<td style="text-align:left"><strong>No Autorizaciòn</strong></td>
<td style="text-align:left"><strong>Servicio</strong></td>
<!--<th style="text-align:right">Total Reclamado</th>
<th style="text-align:right">Paciente Pagara</th>-->
<td style="text-align:left"><strong>Aseguradora Pagará</strong></td>
</tr>

</thead>
<tbody>

<?php
$i = 1;
foreach($invoice as $fac) 
{ 
  $total_sub += $fac->t1;
   $total_seg += $fac->t2;
   $total_pat += $fac->t3;
 $paciente=$this->db->select('nombre,cedula,ced1,ced2,ced3,photo')->where('id_p_a',$fac->paciente)
 ->get('patients_appointments')->row_array();


 $num_af=$this->db->select('input_name')->where('patient_id',$fac->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');


  $numautoid=$this->db->select('id2')->where('idfac',$fac->id_fac2)
 ->get('factura')->row('id2');
 
   $numauto=$this->db->select('numauto')->where('idfacc',$numautoid)
 ->get('factura2')->row('numauto');
 
 if($centro['type']=="privado"){
$service=$this->db->select('procedimiento')->where('id_tarif',$fac->servicio)->get('tarifarios')->row('procedimiento');	
 }else{
 $service=$this->db->select('sub_groupo')->where('id_c_taf',$fac->servicio)->get('centros_tarifarios')->row('sub_groupo');
 }

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:60px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:60px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}
$fecha=date("d-m-Y", strtotime($fac->fecha));
 
?>
<tr>
<td style="text-align:left;"><?php echo $i; $i++;?></td>
<td style="text-align:left;"><?=$fecha?></td>
<td style="text-align:left;"><?=$imgpat?></td>
<td style="text-transform:uppercase;text-align:left"><?=$paciente['nombre']?></td>

<td style="text-align:left"><?=$paciente['cedula']?></td>

<td style="text-align:left"><?=$num_af?></td>
<td style="text-align:left;color:#8B0000" ><?=$numauto?></td>
<td style="text-align:left;" ><?=$service?></td>
<!--<td style="text-align:right"><?=number_format($fac->tsubtotal,2)?></td>
<td style="text-align:right"><?=number_format($fac->totpagpa,2)?></td>-->
<td style="text-align:left">RD$ <?=number_format($fac->t2,2)?></td>

</tr> 
<?php

}
$sub_total=number_format($total_sub,2);  
$total_pagar_seguro=number_format($total_seg,2);
?>
</tbody>
<footer>
<tr><th><?=$cntinv?></th><th colspan="4" style="background:#D7E495"></th><th style="background:#D7E495"></th><th style="text-align:left;background:#D7E495"></th><th style="text-align:right;font-size:12px;background:#D7E495">Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th style="text-align:left;font-size:9px">&nbsp;&nbsp;RD$ <?=$total_pagar_seguro?></th></tr>
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
<th style="color:blue;border:none;text-align:left">TOTAL&nbsp;</th><th style="padding:0px;color:blue;text-align:left;border:none">RD$&nbsp;<?=$total_pagar_seguro?></th>
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
$sello_doc=$this->db->select('sello')->where('doc',$row->medico)->get('doctor_sello')->row('sello');
if ($sello_doc) {?>
<img  style="width:200px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {
}
?>
</td>
</tr>
<tr>
<td style='border:none'>
<strong>FIRMA DEL PROVEEDOR DEL SERVICIO</strong>
</td>
<td style='border:none'>
<strong>SELLO DEL PROVEEDOR DEL SERVICIO</strong>
</td>
</tr>
</table>
</div>

</body>
