 <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<style>
td,th{text-align:left}

</style>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<?php
$cpt="";
foreach($info as $row1)
$farmacia=$this->db->select('noma')->where('id',$row1->farmacia)
->get('drug_stores')->row_array();
//---------------------------------------------------------------------------------
$paciente=$this->db->select('nombre,id_p_a')->where('id_p_a',$row1->historial_id )
->get('patients_appointments')->row_array();
?>
<h4 class="modal-title"><u>FARMACIA : <?=$farmacia['noma']?> </u></h4>
Paciente : <span style="text-transform:uppercase"><?=$paciente['nombre']?></span> <span style="font-size:12px"><i>(<?=$num?> medicamentos)</i></span> 
</div>
<div style="overflow-x:auto;">
<table  class="table table-striped table-bordered"  >
<tr style="background:#38a7bb;color:white">
<th style="width:5px">Medicamento</th>
<th>Presentacion</th>
<th >Frecuencia</th>
<th >Via</th>
<th>Cantidad (dias)</th>
<th >Operador</th>
<th>Fecha</th>

</tr>

<?php foreach($info as $row2)

{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td style="font-size:12px"><?=$row2->medica;?></td>
<td style="font-size:12px"><?=$row2->presentacion;?></td>
<td style="font-size:12px"><?=$row2->frecuencia;?></td>
<td style="font-size:12px"><?=$row2->via;?></td>
<td style="font-size:12px"><?=$row2->cantidad;?></td>
<td style="font-size:12px"><?=$row2->operator;?></td>
<td style="font-size:12px"><?=$row2->insert_date;?></td>

</tr> 

<?php
}

?>

</table>
</div>