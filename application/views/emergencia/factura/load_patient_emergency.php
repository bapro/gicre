<style>
td,th{font-size:12px}
</style>
<div class="col-md-12" >
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">FACTURA DE EMERGENCIA</a></li>
  </ul>
<div class="tab-content" style="max-height:60vh;overflow-x:auto">
<div id="home" class="tab-pane fade in active">
<h3>FACTURAS DE EMERGENCIA</h3>
<table class="table fixed table-striped" align="center" id="center-it" style="font-size:10px;background:#E0E5E6;" >
<thead>
<tr style="background:#38a7bb;color:white">
<th>CENTRO MEDICO</th>
<th> ARS</th>
<th>FECHA</th>
<th>Accion</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$cpt="";
foreach($emergency->result() as $row_emcy)
{

$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_emcy->id_pat)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$centro=$this->db->select('name,type')->where('id_m_c',$row_emcy->centro)->get('medical_centers')->row_array();
$type=$centro["type"];

?>

<tr>
<td><?php echo $centro["name"];?> <strong>(<?php echo $centro["type"];?>)</strong></td>
<td><?php echo $seguro_title;?></td>
<td><?php echo $row_emcy->created_date;?> </td>

<td>

<?php if($row_emcy->worked==1) 
{
$found=$this->db->select('id_mergencia')->where('id_mergencia',$row_emcy->id_ep)->get('emergency_factura')->row('id_mergencia');

if($found){
$button='Ver Factura';
$btn='btn-default';
}else{
$button='Crear Factura';
$btn='btn-primary';	
}
?>
<a class="btn <?=$btn?>   btn-xs disabled-me" href="<?php echo site_url("emergency/create_new_factura/$row_emcy->id_ep/$id_user")?>" target="_blank"><?=$button?></a>
<?php
}

?>
</td>

</tr>

<?php
}
?>
</tbody>
</table>
</div>

</div>
</div>


<script>
$(document).ready(function() {


$('#center-it').DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,'desc'] ],

});



   
});
</script>