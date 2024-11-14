<style>
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left;font-size:14px}
</style>

<h3 style="text-align:center"><?=$title?></h3>
<hr id="hr_ad"/>

<div style="overflow-x:auto" >
	<p style="float:right;"> 
    <?php 
	$i=1;
	
	if($doctor==""){ 
    $doctor=0;
  } 
  if($centro==""){
   $centro=0;
  }
      ?>
<form method="get" target="_blank"  action="<?php echo base_url("$controller/print_billing_report/$desde/$hasta/$checkval/$id_user/$doctor/$centro")?>">
<!--<a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/print_billing_report/$desde/$hasta/$checkval/$id_user/$doctor/$centro")?>"><i class="fa fa-print"></i>  Imprimir</a>-->
<button type="submit" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i>  Imprimir</button>
</form>
  </p>
<table id="report-fac-table" class="table table-striped" width="100%;" style="font-size:13px" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th>Fecha/Hora</th>
<th>#REC</th>
<!--<th class="col-xs-2" >Foto</th>-->
<th>NOMBRES</th>
<th>CENTRO</th>
<th >SERVICIO</th>
<th>AREA</th>
<th>#fAC</th>
<th <?=$display?>>#SEGURO</th>
<th <?=$display?>>#AUTO.</th>
<th <?=$display?>>AUTORIZADO POR</th>
<th <?=$display?>>RECLAMADO ARS</th>
<!--<th>PRECIO</th>-->
<th >DESC.</th>
<th title='Diferencia a pagar'>DIF. A PAGAR</th>
<th>USUARIOS</th>
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
	
 $paciente=$this->db->select('nombre,photo,ced1, ced2, ced3, id_p_a,plan')->where('id_p_a',$row->pat_id)
 ->get('patients_appointments')->row_array();
 $type=$this->db->select('type')->where('id_m_c',$row->center_id)->get('medical_centers')->row('type');
 $factura=$this->db->select('numfac,numfac2,numauto,autopor,area')->where('idfacc',$row->id2)->get('factura2')->row_array();
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
$center_name=$this->db->select('name')->where('id_m_c',$row->center_id)->get('medical_centers')->row('name');
if($row->seguro==11){
$color="#d8d8ff";
$plan='';	
}else{
$color="white";	
$plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
}
?>
<tr style="background:<?=$color?>">
<td><?=$fac_time;?> <?=$get_hour_from_update_time?></td>
<td>NEC-<?=$paciente['id_p_a'];?></td>
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
<td><?=$center_name;?></td>
<td><?=$procedimiento;?></td>
<td><?=$area;?></td>
<td><?=$numfac;?></td>
<td <?=$display?>><?=$seguro?>-<?=$plan?></td>
<td <?=$display?>><?=$factura['numauto']?></td>
<td <?=$display?>><?=$factura['autopor']?></td>
<td <?=$display?>><?=$row->totalpaseg?></td>
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
<th colspan="<?=$thnum?>"><span  style="margin-left: 520px;">TOTAL</span></th>
<th <?=$display?>>RD$<?=number_format($totalpaseg,2)?></th>
<th></th>
<th>RD$<?=number_format($total_desc,2) ?></th>
<th>RD$<?=number_format($total_paga,2) ?></th>
<th></th>
</tr> 
</tfoot>  
</table>
</div>

<br/><br/>



<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->


<script>
$(document).ready(function() {
    $('#report-fac-table').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
//"aaSorting": [ [0,'desc'] ],

    } );
  } );	
</script>




