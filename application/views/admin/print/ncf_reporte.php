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

<div style="width: 100%;">

<?php
$doc=$this->db->select('name,exequatur,area,cedula')->where('id_user',$medico)
->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$doc['area'])
->get('areas')->row('title_area');
$fecha = date("d-m-Y");
?>

<div style="text-align:center">
<h2 style="text-align:center;text-transform:uppercase">Dr. <?=$doc['name']?> </h2>
<span ><strong><?=$area?></span><br/>
<span ><strong>Exeq : <?=$doc['exequatur']?></strong></span><br/>
<span><strong>RNC: <?=$doc['cedula']?></strong></span>
<div style="position: absolute; top: 0px; float:right; font-size: 10px;width:80px;color:red">
<?=$fecha?>
 </div>
</div>
<hr/>

<?php
$desde1= date("d-m-Y", strtotime($from));
$hasta1= date("d-m-Y", strtotime($to));
 $fecha = date("d-m-Y");
 $hour=date("H:i:s");
?>
<p style="text-align:center">Desde <?=$desde1?> Hasta <?=$hasta1?></p>

<table  style="font-size:11px;width:100%">
<thead>
<tr style="background:#D7E495">
<td  style="text-align:left"><strong>#</strong></td>
<td  style="text-align:left"><strong>FECHA</strong></td>
<td  style="text-align:left"><strong>NCF</strong></td>
<td  style="text-align:left"><strong>SEGURO</strong></td>
<td  style="text-align:left"><strong>RNC</strong></td>
<td  style="text-align:left"><strong>TOTAL</strong></td>
</tr>

</thead>
<tbody>

<?php
if($query->result() !=NULL){
$i = 1;
 $total_seg =0;
foreach ($query->result() as $row){
	$fecha=date("d-m-Y", strtotime($row->fecha));
	$ncf=$this->db->select('value')->where('id_ncf',$row->ncf_id)
->get('ncf')->row('value'); 

 $ars=$this->db->select('logo,title,rnc')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();

/*$sqlt ="SELECT sum(totpagseg) as t2 FROM invoice_ars_claims WHERE  ncf_id=$row->ncf_id group by numauto";
$queryt = $this->db->query($sqlt);
foreach ($queryt->result() as $rowt)*/
 $total_seg += $row->t2;
 $total_pagar_seguro=number_format($row->t2,2);

?>
<tr>
<td style="text-align:left;"><?php echo $i; $i++;?></td>
<td style="text-align:left;"><?php echo $fecha;?></td>
<td style="text-align:left;"><?php echo $row->value;?></td>
<td style="text-align:left;"><?=$ars['title']?></td>
<td style="text-align:left;"><?php echo $ars['rnc'];?></td>
<td style="text-align:left;"> RD$ <?php echo $total_pagar_seguro;?></td>
</tr>
<?php
}
}
else{
	echo "<tr><td colspan='6' style='text-align:center'>No hay datos...</td></tr>";
}
?>
 </table>
 </div>
 
 <div style='position: absolute; bottom: 60px;'>
<table  align="center" style='font-size:8px;width:100% '>
<tr>
<td style='border-bottom:1px solid #708090;border-top:none;width:30%'>
<?php 
$firma_doc="$medico-1.png";

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
$sello_doc=$this->db->select('sello')->where('doc',$medico)->get('doctor_sello')->row('sello');
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