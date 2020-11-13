<?php if($perfil=="Admin"){$controller="admin";} else {$controller="medico";} ?>

<h3>FACTURA DE CITA</h3>
<!--<button style="display:none;float:right" class="btn-sm btn-primary refresh-fac" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
-->
<table class="table fixed" align="center" id="center-it" style="font-size:10px;background:#E0E5E6;" >
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
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E8F6F9";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_citas->id_patient)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$centro=$this->db->select('name,type')->where('id_m_c',$row_citas->centro)->get('medical_centers')->row_array();
$medico=$this->db->select('name')->where('id_user',$row_citas->doctor)->get('users')->row('name');
$type=$centro["type"];


$is_billed_already=$this->db->select('id_rdv,idfacc')->where('id_rdv',$row_citas->id_apoint)->get('factura2')->row_array();
$idfacc=$is_billed_already['idfacc'];
?>

<tr bgcolor="<?=$colorBg?>">
<td><?php echo $centro["name"];?> <strong>(<?php echo $centro["type"];?>)</strong></td>
<td><?php echo $medico;?></td>
<td><?php echo $seguro_title;?></td>
<td><?php echo $row_citas->fecha_propuesta;?> </td>

<td>

<?php if($is_billed_already['id_rdv']==0) 
{
?>

<a class="btn btn-primary  btn-sm disabled-me" href="<?php echo site_url("$controller/patient_billing_/$type/$row_citas->id_apoint/$row_citas->doctor/$row_citas->centro/$seguro_medico")?>" target="_blank">Facturar</a>
<?php
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
<script>
$("a.disabled-me").click(function(){
$(this).hide();
//$(".refresh-fac").show();
//$(this).closest("tr").find('button').show();	
});

/*$(".refresh-fac").click(function(){
alert(1);
loadFacCita();	
});*/



$('#center-it').DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,'desc'] ],

});
</script>