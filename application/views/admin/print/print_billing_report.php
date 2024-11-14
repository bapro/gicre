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
<h4 style="text-align:right"><i><?=date('d-m-Y H:i A')?></i></h4>
<?php 
$i=1;

if($centro==103){
	$additional_col_th_m="<td><strong>MEDICO</strong></td>";
	$additional_col_th_en="<td><strong>ENTREGA</strong></td>";
	$additional_col_th_en_in="<td style='border:1px solid'></td>";
	$colspan='7';
	$colspan2='9';
}else{
	$additional_col_th_m="";
    $additional_col_th_en="";
	$additional_col_th_en_in="";
    $colspan='6';	
	$colspan2='8';
}

if($checkval=="privado") {
	echo'<h2 style="text-align:center">REPORTE DE FACTURAS PACIENTES PRIVADOS</h2>';
	if($doctor==0){
$centroval=$this->db->select('name,logo')->where('id_m_c',$centro)->get('medical_centers')->row_array();

	?>

	<h3 style="text-align:center"><?=$centroval['name']?> </h3>
	<?php 
    } else{
    $doctor=$this->db->select('name')->where('id_user',$doctor)->get('users')->row('name');	
    ?>
    <h3 style="text-align:center">Doc <?=$doctor?> </h3>
    <?php
    }
	$desde = date('d-m-Y', strtotime($desde));
	$hasta = date('d-m-Y', strtotime($hasta));
	?>
	<h4 style="text-align:center">Desde <?=$desde?>, Hasta <?=$hasta?> </h4>
<h4 style="text-align:right"><i><?=$count?> registros</i></h4>
<table style="width:100%;display :none">
<thead>
<tr style="background:#D7E495">
<td><strong>FECHA</strong></td>
<td><strong>#REC</strong></td>
<td><strong>NOMBRES</strong></td>
<?=$additional_col_th_m ?>
<td ><strong>SERVICIO</strong></td>
<td><strong>AREA</strong></td>
<td><strong>#FAC</strong></td>
<!--<td><strong>PRECIO</strong></td>-->
<td ><strong>DESC.</strong></td>
<td><strong>DIF. A PAGAR</strong></td>
<?=$additional_col_th_en?>
<td><strong>USUARIOS</strong></td>
</tr>
</thead>
<tbody> 
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$total_price = 0;$total_desc = 0;$total_paga= 0;
 foreach($display_report as $row)
{
$fac_time =date("d-m-Y", strtotime($row->fecha_fac));
$get_hour_from_update_time = date("H:i:s", strtotime($row->updated_time));	
if($centro==103){
	$medico_name=$this->db->select('name')->where('id_user',$row->medico2)->get('users')->row('name');
	if($medico_name=="baptiste prophete"){
		$doc_name_="";
	}else{
   $doc_name_=$medico_name;
	}	
	$additional_col_td="<td>$doc_name_</td>";	
}else{
	$additional_col_td="";	
}	
		
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
?>
<tr>
<td><?=$fac_time;?> <?=$get_hour_from_update_time?></td>
<td><?=$paciente['nec1'];?></td>
<td style="text-transform:uppercase;"><?=$paciente['nombre'];?></td>
<?=$additional_col_td?>
<td><?=$procedimiento;?></td>
<td><?=$area;?></td>
<td><?=$numfac;?></td>
<!--<td><?=$numfac;?></td>-->
<!--<td><?=$row->preciouni;?></td>-->
<td><?=$row->descuento;?></td>
<td><?=$row->totpapat;?></td>
<?=$additional_col_th_en_in?>
<td><?=$user;?></td>
</tr>
<?php
$total_price += $row->preciouni;
$total_desc += $row->descuento;
$total_paga += $row->totpapat;
 
}

?>
</tbody> 
<tfoot>
<tr style="background:#cde2b2">
<td colspan="<?=$colspan?>" align="center"><strong>TOTAL</strong></td>
<!--<td><strong>$RD <?=number_format($total_price,2)?></strong></td>-->
<td><strong>RD$<?=number_format($total_desc,2) ?></strong></td>
<td><strong>RD$<?=number_format($total_paga,2) ?></strong></td>
</tr> 
 </tfoot>
</table>
<?php } else {
	echo '<h2 style="text-align:center">REPORTE DE FACTURAS GENERAL</h2>';
	if($doctor==0){
$centroval=$this->db->select('name,logo')->where('id_m_c',$centro)->get('medical_centers')->row_array();
	?>
	
  <img  style="width:150px;margin-left:43%" src="<?=base_url()?>/assets/img/centros_medicos/<?=$centroval['logo']?>"  />
	<h3 style="text-align:center"><?=$centroval['name']?> </h3>
	<?php 
    } else{
    $doctor=$this->db->select('name')->where('id_user',$doctor)->get('users')->row('name');	
    ?>
    <h3 style="text-align:center">Doc <?=$doctor?> </h3>
    <?php
    }
	 $desde = date('d-m-Y', strtotime($desde));
	$hasta = date('d-m-Y', strtotime($hasta));
	?>
	<h4 style="text-align:center">Desde <?=$desde?>, Hasta <?=$hasta?> </h4>
	<h4 style="text-align:right"><i><?=$count?> registros</i></h4>
<table style="width:100%;">
<thead>
<tr style="background:#D7E495">
<td><strong>FECHA</strong></td>
<td><strong>#REC</strong></td>
<td><strong>NOMBRES</strong></td>
<?=$additional_col_th_m ?>
<td ><strong>SERVICIO</strong></td>
<td><strong>AREA</strong></td>
<td><strong>#FAC</strong></td>
<td><strong>SEGURO</strong></td>
<td><strong>#AUTO.</strong></td>
<td><strong>RECLAMADO ARS</strong></td>
<!--<td><strong>PRECIO</strong></td>-->
<td ><strong>DESC.</strong></td>
<td><strong>DIF. A PAGAR</strong></td>
<?=$additional_col_th_en?>
<td><strong>USUARIOS</strong></td>
</tr>
</thead>
<tbody> 
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$total_price = 0;$total_desc = 0;$total_paga= 0;$totalpaseg=0;
 foreach($display_report as $row)
{
$fac_time =date("d-m-Y", strtotime($row->fecha_fac));
$get_hour_from_update_time = date("H:i:s", strtotime($row->updated_time));		
if($centro==103){
	$medico_name=$this->db->select('name')->where('id_user',$row->medico2)->get('users')->row('name');
	if($medico_name=="baptiste prophete"){
		$doc_name_="";
	}else{
   $doc_name_=$medico_name;
	}
	$additional_col_td="<td>$doc_name_</td>";
}else{
	$additional_col_td="";	
}		
	
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
<td><?=$fac_time;?> <?=$get_hour_from_update_time?></td>
<td><?=$paciente['nec1'];?></td>
<td style="text-transform:uppercase;"><?=$paciente['nombre'];?></td>
<?=$additional_col_td?>
<td><?=$procedimiento;?></td>
<td><?=$area;?></td>
<!--<td><?=$centro;?>-<?=$i;$i++;?></td>-->
<td><?=$numfac?></td>
<td><?=$seguro?></td>
<td><?=$factura['numauto']?></td>
<td><?=$row->totalpaseg?></td>
<!--<td><?=$row->preciouni;?></td>-->
<td><?=$row->descuento;?></td>
<td><?=$row->totpapat;?></td>
<?=$additional_col_th_en_in?> 
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
<td colspan="<?=$colspan2?>" align="center"><strong>TOTAL</strong></td>
<td><strong>RD$<?=number_format($totalpaseg,2)?></strong></td>
<!--<td><strong>$RD <?=number_format($total_price,2)?></strong></td>-->
<td><strong>RD$<?=number_format($total_desc,2) ?></strong></td>
<td><strong>RD$<?=number_format($total_paga,2) ?></strong></td>
</tr> 
 </tfoot>
</table>

	<?php } ?>

