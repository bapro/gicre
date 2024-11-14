<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%}
    tr { border-top: solid 1px black border-bottom: solid 1px black; }
    td { border-right: none; border-left: none;padding: 6px; }

p{text-align:center}
.trback td{background:#EDEBEB}

#header-table, tr, td {
    border: none;
}
</style>
</head>

<body>
<?php

$this->padron_database = $this->load->database('padron',TRUE);


foreach($billing1 as $row1)


 $numafiliado=$this->db->select('input_name')->where('patient_id',$row1->paciente)->where('input_name !=','')
 ->get('saveinput')->row('input_name');


 $seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();
$centro=$this->db->select('name,logo,provincia,municipio,barrio,calle,rnc,primer_tel,segundo_tel,type')->where('id_m_c',$row1->centro_medico)
->get('medical_centers')->row_array();
$provincia=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipio=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');

$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');
$paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,barrio,calle')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 $doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row('name');


foreach($billing2 as $rw)
if($print=="privado"){
	$display="";
$service=$this->db->select('procedimiento')->where('id_tarif',$rw->service)->get('tarifarios')->row('procedimiento');
} else{
$display="display:none";
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rw->service)->get('centros_tarifarios')->row('sub_groupo');
}


//----------------------------get patient abono----------------------------------------
$total_bono=0;
$sqlabono = "select * from factura_privado_bono where id_fac=$last_bill_id order by fecha DESC";
$abonodata= $this->db->query($sqlabono);
foreach($abonodata->result() as $row)
{

  $total_bono += $row->bono;

}

?>
 <div style="<?=$display?>; position: absolute; top: 0px; text-align:right; font-size: 10px;font-weight:bold">
 <?=$row1->numfac?>
 </div>

<table  id='header-table' >
<tr>
<td>
<img class="img "  style="width:130px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />
<!--<h3  align="center"> <?=$centro['name']?></h3>-->
<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p ><strong>Ubicación :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provincia?>, <?=$muncipio?> </p>
</td>
<td >
<?php
$comprobante= $this->db->select('name,comprobante,vencimiento')->join('comprobante_fiscal_name', 'comprobante_fiscal_paciente.id_comprobante = comprobante_fiscal_name.id')->where('id_fac',$last_bill_id)->get('comprobante_fiscal_paciente')->row_array();
if($comprobante){
$compro=$comprobante['comprobante'];
echo "<strong>NCF $compro</strong><br/>";
echo "<strong>Factura de</strong> ". $comprobante['name'];
echo "<br/>";
if($comprobante['vencimiento']){
echo "<strong>Vencimiento </strong>". $comprobante['vencimiento'];
}
}else{
$compro='';	
}
?>
</td>
</tr>
</table>
<br/>
<div  style="border-top:1px solid rgb(0,64,128)">
<?php
$currentDateTime=date('d-m-Y H:i:s');
$newDateTime = date('d-m-Y h:i A', strtotime($currentDateTime));
if($compro){
$numfacp='';
}else{
$numfacp="FACTURA # $row1->numfac2";
}
 ?>
<h6  style="text-align:right"><?=$numfacp?></h6>
<h3  align="center">DETALLE DE FACTURA </h3>
<table style="font-size:11px;width:100%"  >
<tr  class="trback">
<td><strong>Nombres</strong></td>
<td><strong>Cedula</strong></td>
<td><strong>Seguro Medico</strong></td>
<td><strong>Tel.</strong></td>
<td><strong>Dirección</strong></td>
<td><strong>Correo Elec.</strong></td>
</tr>
<tr>
<td style="text-transform:uppercase"> <?=$paciente['nombre']?></td>
<td><?=$paciente['cedula']?></td>
<td><?=$seguron['title']?></td>
<td><?=$paciente['tel_cel']?> / <?=$paciente['tel_resi']?> </td>
<td><?=$paciente['barrio']?> <?=$paciente['calle']?></td>
<td><?=$paciente['email']?></td>
</tr>

</table>

</div>


<table style="font-size:11px;width:100%" cellpadding="0" cellspacing="0">
<tr  class="trback">
<td><strong>Servicio</strong></td>
<td><strong>Cantidad</strong></td>
<td><strong>Precio Unitario</strong></td>
<td><strong>Sub-Total</strong></td>
<td><strong>Descuento</strong></td>
<td><strong>Total Pagar Paciente</strong></td>
<td><strong>Fecha</strong></td>
</tr>
<?php foreach($billing2 as $rf){

$fecha_fac=date('d-m-Y', strtotime($rf->filter));
	?>
<tr>

<td>
<?php
if($print=="privado"){
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
} else{
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
}

echo $service;
?>
</td>
<td>
<?=$rf->cantidad?>
</td>
<td>
RD$<?=number_format($rf->preciouni,2);?>

</td>
<td>
RD$<?=number_format($rf->subtotal,2);?>
</td>

<td style="color:red">
RD$<?=number_format($rf->descuento,2);?>
</td>
<td>

RD$<?=number_format($rf->totpapat,2);?>

</td>
<td>

<?=$fecha_fac;?>

</td>
</tr>
<?php }
 $this->db->select("SUM(cantidad) as cant");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$cant=$this->db->get()->row()->cant;
//----------------------------------------------
  $this->db->select("SUM(preciouni) as pu");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$pu=$this->db->get()->row()->pu;
$pun=number_format($pu,2);
//-----------------------------------------------------
$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$sbt1=$this->db->get()->row()->sbt;

//-----------------------------------------
$sbt=number_format($sbt1,2);
//---------------------------------
$this->db->select("SUM(descuento) as descu");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$descu1=$this->db->get()->row()->descu;
$descu=number_format($descu1,2);
//-------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);

//-----------------------CUANDO HAY COMPROBANTE------------------
if($comprobante){
$itbs1=$sbt1 * 0.18;
$totgeneral1=$itbs1 + $sbt1;
$totgeneral=number_format($totgeneral1,2);
$itbs=number_format($itbs1,2);
$totpagpat1=$totgeneral1 - ($total_bono + $descu1);
$totpagpat=number_format($totpagpat1,2);
}else{
$itbs=0;
$totpagpat=0;
$totpagpat1= $sbt1 - ($total_bono + $descu1);
$totpagpat=number_format($totpagpat1,2);
}
	?>

<tr style='border-top:1px solid #c0c0c0'>
<td colspan='4'></td>
<td>
<strong>Subtotal: </strong>
</td>
<td>
<strong>RD$<?=$sbt;?></strong>
</td>
</tr>
<?php if($comprobante){?>
<tr style='border-bottom:1px solid #c0c0c0;background:#EDEBEB'>
<td colspan='4'></td>
<td>
<strong>Itbis(18%): </strong>
</td>
<td>
<strong>RD$<?=$itbs?></strong>
</td>

</tr>
<tr style='border-bottom:1px solid #c0c0c0;'>
<td colspan='4'></td>
<td>
<strong>Total General: </strong>
</td>
<td>
<strong>RD$<?=$totgeneral?></strong>
</td>

</tr>
<?php } ?>
<tr>
<td colspan='4'></td>
<td>
<strong>Descuento: </strong>
</td>
<td>
<strong>RD$<?=$descu;?></strong>
</td>

</tr>

<tr style='border-bottom:1px solid #c0c0c0'>
<td colspan='4'></td>
<td>
<strong>Abono: </strong>
</td>
<td>
<strong>RD$<?=number_format($total_bono,2);?></strong>
</td>

</tr>



<tr style='background:#EDEBEB'>
<td colspan='4'></td>
<td>
<strong>Total Pagar Paciente: </strong>
</td>
<td>
<strong>RD$<?=$totpagpat;?></strong>
</td>

</tr>

</table>
<br/><br/><br/><br/>
<table style='width:100%'>
<tr>
  <td style='text-align:center;width:50%'>

<hr/>
Firma Del Responsable

</td>

<td style='text-align:center;width:50%'>

<hr/>
Firma Del Paciente

</td>
</tr>

</table>
<p  style="color:red;text-align:right;float:left;position:absolute;bottom:60">FECHA DE IMPRESION <?=$newDateTime?></p>
</body>