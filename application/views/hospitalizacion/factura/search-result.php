<div class="col-md-12 showdown searchb" style="text-align:center">
<?php 
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$now =number_format($now,3);?>

<span style="font-size:14px;color:green"><i>resultados (<?=$now?> segundos)</i></span>

<?php

$this->load->view('search/patient-info');
?>


<h3>FACTURAS DE HOSPITALIZACION</h3>
<div style="overflow-x:auto" >
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
foreach($hosp_data->result() as $row_hosp)
{

$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_hosp->id_patient)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$centro=$this->db->select('name,type')->where('id_m_c',$row_hosp->centro)->get('medical_centers')->row_array();
$type=$centro["type"];

?>

<tr>
<td><?php echo $centro["name"];?> <strong>(<?php echo $centro["type"];?>)</strong></td>
<td><?php echo $seguro_title;?></td>
<td><?php echo date("d-m-Y H:i:s", strtotime($row_hosp->timeinserted));?> </td>

<td>

<?php

if($row_hosp->alta==1) 
{
$found=$this->db->select('id_hosp')->where('id_hosp',$row_hosp->id)->get('hosp_factura')->row('id_hosp');

if($found){
$button='Ver Factura';
$btn='btn-default';
}else{
$button='Crear Factura';
$btn='btn-primary';	
}
?>
<a class="btn <?=$btn?>   btn-xs disabled-me" href="<?php echo site_url("hospitalizacion/create_new_factura/$row_hosp->id/$id_user/$id_centro")?>" target="_blank"><?=$button?></a>
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
<!--
<script>
$(document).ready(function() {
	
load_patient_citas();
function load_patient_citas()
{
var id_p_a = <?=$pat->id_p_a?>;
var id_user = <?=$id_user?>;
var perfil = "<?=$perfil?>";
$("#load_patient_citas").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/load_patient_hosp')?>",
data: {id_p_a:id_p_a,id_user:<?=$id_user?>},
cache: true,
success:function(data){
$("#load_patient_citas").html(data);
  
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#load_patient_citas").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}




	
});
	


</script>-->