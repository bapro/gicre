<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }

p{text-align:center}
.trback td{background:#A9E4EF}

#header-table, tr, td {
    border: none;
}
</style>
</head>


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
 
 if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img  width="90"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat="";	
}
else{
$imgpat='<img  style="width:90px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		
}
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
<!--<div align="center">  <img class="img "  style="width:90px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  /></div>
<div  align="center" style="font-size:12px">

<h2  align="center"> <?=$centro['name']?></h2>

<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provincia?>, <?=$muncipio?> </p>

<input id="servicio" type="hidden" value="<?=$area?>"/>

</div>-->
<table  id='header-table' >
<tr>
<td>
<h3  align="center"> <?=$centro['name']?></h3>
<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provincia?>, <?=$muncipio?> </p>
</td>
<td style="font-size:11px">
<img class="img "  style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />
<?php
$comprobante= $this->db->select('name,comprobante')->join('comprobante_fiscal_name', 'comprobante_fiscal_paciente.id_comprobante = comprobante_fiscal_name.id')->where('id_fac',$last_bill_id)->get('comprobante_fiscal_paciente')->row_array();
$compro=$comprobante['comprobante'];
echo "<strong>NCF $compro</strong><br/>";
echo "factuara de ". $comprobante['name'];
?>
</td>
</tr>
</table>
<br/>
<div  style="border-top:1px solid rgb(0,64,128)">
<br/>
<h3  align="center">DATOS DEL PACIENTE<br/><?=$imgpat?> </h3> 
<table style="font-size:11px;width:100%"  >
<tr  class="trback">
<td><strong>Nombres</strong></td>
<td><strong>Cedula</strong></td>
<td><strong>Seguro Medico</strong></td>
<td><strong>Tel.</strong></td>
<td><strong>Direccion</strong></td>
<td><strong>Email</strong></td>
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
<?php 
$currentDateTime=date('d-m-Y H:i:s');
$newDateTime = date('d-m-Y h:i A', strtotime($currentDateTime));

 ?>
<h3  align="center">FACTURA # <?=$row1->numfac2?></h3> 
<h6  align="center" style="color:red">Fecha de impresión <?=$newDateTime?></h6> 
<table style="font-size:11px;width:100%">
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
$sbt=$this->db->get()->row()->sbt;
//------------------------------------

$abono=	$sbt - $total_bono;
$abono=number_format($abono,2);	

$sbt=number_format($sbt,2);
//---------------------------------
$this->db->select("SUM(descuento) as descu");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$descu=$this->db->get()->row()->descu;
$descu=number_format($descu,2);
//-------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$last_bill_id);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);	

	?>
<tr style="background:#cde2b2;color:white">
<td colspan='4'></td>
<td>
<strong>Subtotal </strong>
<td>
<td>
<strong>RD$<?=$abono;?></strong>
</td>

</tr>
<tr style="background:#cde2b2;color:white">
<td colspan='4'></td>
<td>
<strong>Descuento </strong>
<td>
<td>
<strong>RD$<?=$descu;?></strong>
</td>

</tr>

<tr style="background:#cde2b2;color:white">
<td colspan='4'></td>
<td>
<strong>Abono </strong>
<td>
<td>
<strong>RD$<?=number_format($row->bono,2);?></strong>
</td>

</tr>



<tr style="background:#cde2b2;color:white">
<td colspan='4'></td>
<td>
<strong>Subtotal </strong>
<td>
<td>
<strong>RD$<?=$tpat;?></strong>
</td>

</tr>

</table>
<br/><br/>
<div style="text-align:center">

 <?php 
$firma_doc="$id_doc-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr style="width:50%"/>
<span style="text-align:center">Firma y sello</span>
</div>
