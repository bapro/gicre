<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
  <style>

td,th{text-align:left}

</style>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
 <div class="col-xs-12 text-right" >
  <a  class="btn btn-primary btn-sm" href="<?php echo base_url('auditoria_medica/index')?>"><i class="fa fa-plus"></i>  Nuevo</a>
 
  <a  class="btn btn-primary btn-sm" href="<?php echo base_url("printings/medical_insurance_audit_profile_print/$desde/$hasta/$medico")?>"><i class="fa fa-print"></i>  Imprimir</a>
 </div>
<?php

foreach($patient_rows as $row)
$doc=$this->db->select('name')->where('id_user',$medico)->get('users')->row('name');
$exequatur=$this->db->select('exequatur')->where('first_name',$medico)->get('doctors')->row('exequatur');
$area_id=$this->db->select('area')->where('first_name',$row->medico)->get('doctors')->row('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)
->get('areas')->row('title_area');
$seguroid=$this->db->select('seguro_medico')->where('paciente',$row->patient)->get('factura2')->row('seguro_medico');
$logo=$this->db->select('title,logo')->where('id_sm',$seguroid)->get('seguro_medico')->row_array();  

?>

</div>

<div style="overflow-x:auto">
<h2 style="text-align:center;text-transform:uppercase"><?=$doc?></h2>
<h4 style="text-align:center"> <?=$area?></h4>
<h4 style="text-align:center">Exq :<?= $exequatur?> </h4>
<hr/>
<h3 style="text-align:center"><?=$logo['title']?>  <img class="img" style="width:100px;" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $logo['logo']; ?>" /> </h3>

<?php 
$desde1 = date("d-m-Y", strtotime($desde));
$hasta1 = date("d-m-Y", strtotime($hasta));
echo "<p style='float:right;padding:20px'><strong>Desde : $desde1<br/>Hasta : $hasta1</strong></p>";
?>


<table  class="table table-bordered" width="100%;" cellspacing="0">
<tr style="background:#cde2b2;">
<th style="width:230px;">Paciente</th>
<th>No Reclamcion</th>
<th>Monto Aprobado</th>
<th>Monto Glosado</th>
<th>Causa</th>
</tr>
<?php foreach($patient_rows as $row)
{
$paciente=$this->db->select('nombre')->where('id_p_a',$row->patient)
->get('patients_appointments')->row('nombre');
?>
<tr class="row-copier">
<td class="paciente" style="text-transform:uppercase"> <?=$paciente?></td>
<td class="cedula"><?=$row->num;?></td>
<?php if($row->causa !="") 
{
	echo'<td style="background:#f7f6e4"></td>';
} 
else{
?>	
<td><?=number_format($row->monto,2)?></td>
<?php
}
if($row->causa=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td style="color:red"><?=number_format($row->monto,2)?></td>
<?php
}

if($row->causa=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td class="num_af"><?=$row->causa;?></td>
<?php
}
?>

</tr> 
<?php
}
$empty="";
//------------------------------------------
$this->db->select("SUM(monto) as total");
$this->db->where("desde >=",$desde);
$this->db->where("hasta <=",$hasta);
$this->db->where("causa !=","");
$this->db->where("medico",$medico);
$this->db->from('medical_insurance_audit_profile');
$r1=$this->db->get()->row()->total;
$r11=number_format($r1,2);
//------------------------------------------
$this->db->select("SUM(monto) as total1");
$this->db->where("desde >=",$desde);
$this->db->where("hasta <=",$hasta);
$this->db->where("causa","");
$this->db->where("medico",$medico);
$this->db->from('medical_insurance_audit_profile');
$r2=$this->db->get()->row()->total1;
$r22=number_format($r2,2);
$total_reclamdo=$r1 + $r2;
?>
<tr>
<th style="background:#cde2b2;">Total</th><th><?=$count?></th><th>RD$ <?=$r22?></th><th style="color:red">RD$ <?=$r11?></th><th style="background:#cde2b2;"></th>
</tr>
</table>
<p style="padding:10px;color:blue"><strong>Total Reclamado: RD$ <?=number_format($total_reclamdo,2)?></strong></p>

<br/><br/>
</div>
</div>

</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})
</script>

</body>

</html>