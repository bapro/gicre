<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%; } 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }

</style>
</head>
<p style="text-align:right"><i><?=date('d-m-Y H:i A')?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></i></p>
<!--<p style="text-align:center"><?=$seguron['title']?></p>-->
 <!--<img  style="width:150px;margin-left:43%" src="<?=base_url()?>/assets/img/centros_medicos/<?=$centroval['logo']?>"  />-->

<?php 
$i=1;
$centroval=$this->db->select('name,logo')->where('id_m_c',$centro)->get('medical_centers')->row_array();
 foreach($display_report as $row2)	
 $seguron=$this->db->select('title,logo,id_sm')->where('id_sm',$seguro)->get('seguro_medico')->row_array();
 $doctor=$this->db->select('name')->where('id_user',$row2->medico2)->get('users')->row('name');	
	 $desde = date('d-m-Y', strtotime($desde));
	$hasta = date('d-m-Y', strtotime($hasta));
    ?>
	<div style='text-align:center'>
	<span style="text-align:center"><img  style="width:150px;" src="<?=base_url()?>/assets/img/seguros_medicos/<?=$seguron['logo']?>"  /></span><br/>
	  <span style="text-align:center">Doc <?=$doctor?> </span><br/>
    <span style="text-align:center;font-size:11px"><?=$centroval['name']?> </span>
  </div>
	<h4 style="text-align:center">Desde <?=$desde?>, Hasta <?=$hasta?> </h4>
	<h4 style="text-align:right"><i><?=$count?> registros</i></h4>
<table style="width:100%;">
<thead>
<tr style="background:#D7E495">
<td><strong>FECHA</strong></td>
<td><strong>#REC</strong></td>
<!--<th class="col-xs-2" >Foto</th>-->
<td><strong>NOMBRES</strong></td>
<td ><strong>SERVICIO</strong></td>
<td><strong>AREA</strong></td>
<td><strong>#FAC</strong></td>
<td><strong>SEGURO</strong></td>
<td><strong>#AUTO.</strong></td>
<td><strong>RECLAMADO ARS</strong></td>
<!--<td><strong>PRECIO</strong></td>-->
<td ><strong>DESC.</strong></td>
<td><strong>DIF. A PAGAR</strong></td>
<td><strong>USUARIOS</strong></td>
</tr>
</thead>
<tbody> 
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$total_price = 0;$total_desc = 0;$total_paga= 0;$totalpaseg=0;
 foreach($display_report as $row)

{
 $paciente=$this->db->select('nombre,photo,ced1, ced2, ced3, nec1')->where('id_p_a',$row->pat_id)
 ->get('patients_appointments')->row_array();
 $type=$this->db->select('type')->where('id_m_c',$row->center_id)->get('medical_centers')->row('type');
 $factura=$this->db->select('numfac,numfac2,numauto,autopor')->where('idfacc',$row->id2)->get('factura2')->row_array();
 if($type=="privado"){
 $procedimiento=$this->db->select('procedimiento')->where('id_tarif',$row->service)->get('tarifarios')->row('procedimiento');
 $numfac=$factura['numfac'];
 } else{
 $procedimiento=$this->db->select('sub_groupo')->where('id_c_taf',$row->service)->get('centros_tarifarios')->row('sub_groupo');	 
  $numfac=$factura['numfac2'];
 }
$user=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$area=$this->db->select('title_area')->where('id_ar',$row->area_id)->get('areas')->row('title_area');
$seguro=$this->db->select('title')->where('id_sm',$row->seguro)->get('seguro_medico')->row('title');
if($row->seguro==11){
$color="#d8d8ff";
	
}else{
$color="";	
}
?>
<tr style="background:<?=$color?>">
<td><?=$row->fecha_fac;?></td>
<td><?=$paciente['nec1'];?></td>
<!--<td>
<?php
if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="80" height="80"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img width="80" height="80" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>

</td>-->
<td style="text-transform:uppercase;"><?=$paciente['nombre'];?></td>
<td><?=$procedimiento;?></td>
<td><?=$area;?></td>
<td><?=$centro;?>-<?=$i;$i++;?></td>
<td><?=$seguro?></td>
<td><?=$factura['numauto']?></td>
<td><?=$row->totalpaseg?></td>
<!--<td><?=$row->preciouni;?></td>-->
<td><?=$row->descuento;?></td>
<td><?=$row->totpapat;?></td>
<td><?=$user;?></td>
</tr>
<?php
$totalpaseg += $row->totalpaseg;
$total_price += $row->preciouni;
$total_desc += $row->descuento;
$total_paga += $row->totpapat;
 
}

?>
</tbody> 
<tfoot>
<tr style="background:#cde2b2">
<td colspan="8"><span  style="margin-left: 520px;">TOTAL</span></td>
<td><strong>RD$<?=number_format($totalpaseg,2)?></strong></td>
<!--<td><strong>$RD <?=number_format($total_price,2)?></strong></td>-->
<td><strong>RD$<?=number_format($total_desc,2) ?></strong></td>
<td><strong>RD$<?=number_format($total_paga,2) ?></strong></td>
<td></td>
</tr> 
 </tfoot>
</table>


