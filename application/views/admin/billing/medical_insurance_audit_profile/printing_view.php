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
  <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
  <style>
.modal-header {
    cursor: move;
}
td,th{text-align:left}

</style>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
 <div class="col-xs-12 text-right" >
 <?php if($id_seguro=="") {
	 ?>
  <a  class="btn btn-primary btn-sm" href="<?php echo base_url('admin/medical_insurance_audit_profile')?>"><i class="fa fa-plus"></i>  Nuevo</a>
 <?php } else {
	
	 ?>
   <a  class="btn btn-primary btn-sm" href="<?php echo base_url('auditoria_medica/index')?>"><i class="fa fa-plus"></i>  Nuevo</a>
 <?php } ?>
  <a class="btn btn-primary btn-sm" href="<?php echo base_url("printings/medical_insurance_audit_profile_print/$desde/$hasta/$medico/$id_patient/$id_seguro")?>"><i class="fa fa-print"></i>  Imprimir</a>
 </div>
<?php

foreach($patient_rows as $row)
$doc=$this->db->select('name')->where('id_user',$medico)->get('users')->row('name');
$exequatur=$this->db->select('exequatur')->where('id_user',$medico)->get('users')->row('exequatur');
$area_id=$this->db->select('area')->where('id_user',$row->medico)->get('users')->row('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)
->get('areas')->row('title_area');
$seguroid=$this->db->select('seguro_medico')->where('paciente',$row->paciente)->get('factura2')->row('seguro_medico');
$logo=$this->db->select('title,logo')->where('id_sm',$seguroid)->get('seguro_medico')->row_array();  

?>

</div>

<div style="overflow-x:auto">
<h2 style="text-align:center;text-transform:uppercase"><?=$doc?></h2>
<h4 style="text-align:center"> <?=$area?></h4>
<h4 style="text-align:center">Exq :<?= $exequatur?> </h4>
<hr/>
<h3 style="text-align:center"><?=$logo['title']?></h3>
 <div style="text-align:center">
 <?php if($logo['logo']=="") {} else {?>
 <img class="img" style="width:100px;" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $logo['logo']; ?>" /> 
 <?php }?>
 </div>
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
$paciente=$this->db->select('nombre')->where('id_p_a',$row->paciente)
->get('patients_appointments')->row('nombre');
?>
<tr class="row-copier">
<td class="paciente" style="text-transform:uppercase">
 <?php if($id_seguro=="") {?>
<a target="_blank"  href="<?php echo base_url('admin/patient/'.$row->paciente)?>"> <?=$paciente?></a>
 <?php } else { echo $paciente;}?>
</td>
<td class="cedula"><?=$row->numauto;?></td>
<?php if($row->causa_perfil_seguro_audit !="") 
{
	echo'<td style="background:#f7f6e4"></td>';
} 
else{
?>	
<td><?=number_format($row->monto_seguro_audit,2)?></td>
<?php
}
if($row->causa_perfil_seguro_audit=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td style="color:red"><?=number_format($row->monto_seguro_audit,2)?></td>
<?php
}

if($row->causa_perfil_seguro_audit=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td class="num_af"><?=$row->causa_perfil_seguro_audit;?></td>
<?php
}
?>

</tr> 
<?php
}
$empty="";
//------------------------------------------
$this->db->select("SUM(monto_seguro_audit) as total");
$this->db->where("filter >=",$desde);
$this->db->where("filter <=",$hasta);
$this->db->where("causa_perfil_seguro_audit !=","");
$this->db->where("medico2",$medico);
if($id_seguro=="") {} else 
{$this->db->where('seguro',$id_seguro);}
$this->db->from('factura');
$r1=$this->db->get()->row()->total;
$r11=number_format($r1,2);
//------------------------------------------
$this->db->select("SUM(monto_seguro_audit) as total1");
$this->db->where("filter >=",$desde);
$this->db->where("filter <=",$hasta);
$this->db->where("causa_perfil_seguro_audit","");
$this->db->where("medico2",$medico);
if($id_seguro=="") {} else 
{$this->db->where('seguro',$id_seguro);}
$this->db->from('factura');
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



$(".modal-header").on("mousedown", function(mousedownEvt) {
    var $draggable = $(this);
    var x = mousedownEvt.pageX - $draggable.offset().left,
        y = mousedownEvt.pageY - $draggable.offset().top;
    $("body").on("mousemove.draggable", function(mousemoveEvt) {
        $draggable.closest(".modal-dialog").offset({
            "left": mousemoveEvt.pageX - x,
            "top": mousemoveEvt.pageY - y
        });
    });
    $("body").one("mouseup", function() {
        $("body").off("mousemove.draggable");
    });
    $draggable.closest(".modal").one("bs.modal.hide", function() {
        $("body").off("mousemove.draggable");
    });
});


</script>

</body>

</html>