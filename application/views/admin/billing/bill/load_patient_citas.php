<style>
td,th{font-size:12px}
</style>
<?php if($perfil=="Admin"){$controller="admin";} else {$controller="medico";} ?>
<?php if($factura_sin_cita !=NULL){$show="";} else{$show="none";}?>
<div class="col-md-12" >
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">FACTURA DE CITA</a></li>
    <li style="display:<?=$show?>"><a data-toggle="tab" href="#menu1">FACTURAS AMBULATORIAS</a></li>
  </ul>
<div class="tab-content" style="max-height:60vh;overflow-x:auto">
<div id="home" class="tab-pane fade in active">
<h3>FACTURAS DE CITAS</h3>
<table class="table fixed table-striped" align="center" id="center-it" style="font-size:10px;background:#E0E5E6;" >
<thead>
<tr style="background:#38a7bb;color:white">
<th>CENTRO MEDICO</th>
<th> MEDICO</th>
<th> ARS</th>
<th>FECHA</th>
<th>Accion</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$cpt="";
foreach($citas as $row_citas)
{

$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_citas->id_patient)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$centro=$this->db->select('name,type')->where('id_m_c',$row_citas->centro)->get('medical_centers')->row_array();
$medico=$this->db->select('name')->where('id_user',$row_citas->doctor)->get('users')->row('name');
$type=$centro["type"];


$is_billed_already=$this->db->select('id_rdv,idfacc')->where('id_rdv',$row_citas->id_apoint)->get('factura2')->row_array();
$idfacc=$is_billed_already['idfacc'];
?>

<tr>
<td><?php echo $centro["name"];?> <strong>(<?php echo $centro["type"];?>)</strong></td>
<td><?php echo $medico;?></td>
<td><?php echo $seguro_title;?></td>
<td><?php echo $row_citas->fecha_propuesta;?> </td>

<td>

<?php if($is_billed_already['id_rdv']==0) 
{
if($seguro_title==""){
echo '<span style="color:red">No hay seguro</span>';
}else{
?>
<a class="btn btn-primary  btn-xs disabled-me" href="<?php echo site_url("$controller/patient_billing_/$type/$row_citas->id_apoint/$row_citas->doctor/$row_citas->centro/$seguro_medico")?>" target="_blank">Facturar</a>
<?php
}
} else {
if($seguro_medico==11){
$goto="viewPrivateBill";
} else{
$goto="bill";
}
?>

<a target="_blank" href="<?php echo base_url("$controller/$goto/$idfacc/$type")?>">VER FACTURA</a>
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

 <div id="menu1" class="tab-pane fade">
  <?php if($factura_sin_cita !=NULL){ ?>

<h3>FACTURAS AMBULATORIAS</h3>
<table class="table fixed table-striped" align="center" id="facsincita" style="font-size:10px;background:#E0E5E6;" >
<thead>
<tr style="background:#38a7bb;color:white">
<th>CENTRO MEDICO</th>
<th> MEDICO</th>
<th>ARS</th>
<th>FECHA</th>
<th>Accion</th>
</tr>
</thead>
<tbody>
<?php 
foreach($factura_sin_cita as $row)
{
	
$seguro_title=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$medico=$this->db->select('name')->where('id_user',$row->medico)->get('users')->row('name');
$centro=$this->db->select('name,type')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row_array();
$type=$centro['type'];	
	if($row->seguro_medico==11){
		$goto="viewPrivateBill";
	} else{
		$goto="bill";
	}
?>
<tr>
<td><?php echo $centro['name'];?></td>
<td><?php echo $medico;?></td>
<td><?php echo $seguro_title;?></td>
<td><?php echo date("d-m-Y", strtotime($row->fecha)) ;?> </td>	
<td><a target="_blank" href="<?php echo base_url("$controller/$goto/$row->idfacc/$type")?>">VER FACTURA</a></td>	
</tr>
<?php
}
?>	
</tbody>
</table>
<?php }?>
</div>

</div>
</div>


<script>
$(document).ready(function() {
$("a.disabled-me").click(function(){
$(this).hide();
//$(".refresh-fac").show();
//$(this).closest("tr").find('button').show();	
});
$('#facsincita').DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,'desc'] ],
});

$('#center-it').DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,'desc'] ],

});



   
});
</script>