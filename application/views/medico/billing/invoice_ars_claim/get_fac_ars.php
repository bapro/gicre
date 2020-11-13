<?php
if(!empty($display_billings ))  
{

foreach($display_billings as $exist)
{
$is_found=$this->db->select('id_fac2')->where('id_fac2',$exist->idfacc)
->get('invoice_ars_claims')->row('id_fac2');
echo $is_found;
}		
?>
<div  style="overflow-x:auto;">
<h6>Listado de Facturasd</h6>
	<table class="table table-striped table-bordered" id="factura">
	 <thead>
	<tr style="background:#C9F7FF">
	<th><strong>Fecha</strong></th>
	<th><strong>Paciente</strong></th>
	<th><strong>Cedula</strong></th>
	<th><strong>NSS</strong></th>
	<th><strong>No Autorizacion</strong></th>
	<th><strong>Total Reclamdo</strong></th>
	<th><strong>Aseguradora Pagara</strong></th>
	<th><strong>Paciente Pagara</strong></th>
	<th><input type="checkbox" id="copy-all" /></th>
	</tr>
	</thead>
	 <tbody id="copy-all-rows">
	<?php

	foreach($display_billings as $fac)

	{
		
	$paciente=$this->db->select('nombre,cedula')->where('id_p_a',$fac->paciente)
	 ->get('patients_appointments')->row_array();
	$fecha1 = date("d-m-Y", strtotime($fac->filter_date));	

	?>
	<tr>
	<td class="fecha1"><?=$fecha1;?></td>
	<td class="paciente" style="display:none"><?=$fac->paciente;?></td>
	<td ><?=$paciente['nombre'];?></td>
	<td ><?=$paciente['cedula'];?></td>
	<td class="num_af"><?=$fac->num_af;?></td>
	<td class="numauto"><?=$fac->numauto;?></td>

	<td class="tsubtotal"><?=$fac->tsubtotal;?></td>
	<td class="totpagseg"><?=$fac->totpagseg;?></td>
	<td class="totpagpa"><?=$fac->totpagpa;?></td>
	<td class="medico" style="display:none"><?=$fac->medico;?></td>
	<td class="servicio" style="display:none"><?=$fac->servicio;?></td>
	<td class="codigoprestado" style="display:none"><?=$fac->codigoprestado;?></td>
	<td class="rnc" style="display:none"><?=$fac->rnc;?></td>
	<td class="seguro_medico" style="display:none"><?=$fac->seguro_medico;?></td>
	<td class="idfacc" style="display:none"><?=$fac->idfacc;?></td>
	<td><input type="checkbox"  class="copy-one"  /></td>
	</tr>  

	<?php
	}

	?>
	 </tbody>
	</table>
<div id="id_val"></div>
</div>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:2%">No hay datos </i> '; 
}	
?>
<script>
jQuery('#copy-all').on('click', function(e) {
if($(this).is(':checked',true)) {
$(".copy-one").prop('checked', true);
}
else{
$(".copy-one").prop('checked', false);
}
})


jQuery('.copy-one').on('click', function(e) {
if($(this).is(':checked',true)) {
$(this).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
$(this).closest('tr').clone().appendTo('#second-table>tbody');
$(".disabled-all :input").prop("disabled", false);
$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
}
})


	jQuery('#copy-all').on('click', function(e) {
	if($(this).is(':checked',true)) {
	$("#copy-all-rows").fadeOut(800, function(){ 
	$(this).remove();
	});
	$("#copy-all-rows").clone().appendTo('#second-table');
	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	}
	})

</script>