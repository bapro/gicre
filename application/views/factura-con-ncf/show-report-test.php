<?php
echo $condition_inv;
$sqlncf ="SELECT * FROM invoice_ars_claims WHERE $condition_inv GROUP BY ncf_id";
$querysqlncf = $this->db->query($sqlncf);


 if($querysqlncf->num_rows() > 0  ){
	 foreach ($querysqlncf->result() as $n) {
		
$sql ="SELECT * FROM  invoice_ars_claims WHERE  $condition_inv AND ncf_id=$n->ncf_id";
$query = $this->db->query($sql); 
	 $nfc=$this->db->select('value,id_ncf,cancel_text')->where('id_ncf',$n->ncf_id)
 ->get('ncf')->row_array();	
 $ncf_id=$nfc['id_ncf']; 
  $update_date= date("d-m-Y H:i",strtotime($n->updated_date));
   $crpa=$this->db->select('name')->where('id_user',$n->updated_by)->get('users')->row('name');
   if($nfc['cancel_text'] !=""){
	 $cancel_text= $nfc['cancel_text'];
    $cancel=' <a class="btn btn-sm" data-toggle="modal" style="color:red" data-target="#edit-cancel"  href="'.base_url().'/admin_medico/editCancelFacArc/'.$n->ncf_id.'/'.$desde.'/'.$hasta.'/'.$patient.'" >Canceladas (Crear)<a/>';   
  
  }else{
	$cancel="";   
   }
	 ?>
	 <div class="alert alert-info">
	 Hay <strong><u>NCF : <?=$nfc['value']?></u></strong> con <strong><?=$query->num_rows()?> factura(s)</strong> creada(s) segun las entradas de la busqueda (Creado por : <?=$crpa?> | <?=$update_date?>)<a  target="_blank" href="<?php echo base_url("invoice_ars_report_controller/patient_invoice_ncf/$ncf_id/$desde/$hasta/$patient/")?>"  title="Imprimir" class="btn btn-sm" >Ver</a>
	 <?=$cancel?>
	 </div>  
	 <?php 
 } 
}

$sql2 ="SELECT *,sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura2 JOIN factura ON factura.id2=factura2.idfacc
WHERE $condition_fac AND factura2.canceled=0 AND idfacc NOT IN (SELECT id_f from invoice_ars_claims) GROUP BY numauto ORDER BY filter_date DESC";
$query2 = $this->db->query($sql2);


?>
<div  style="overflow-x:auto;border-top:1px solid  #38a7bb" >
<?php
$emty="";
 if($query2->num_rows()==0){
echo '<div class="alert alert-warning">No se encontraron facturas de acuerdo a sus entradas.</div>';
$emty="style='display:none'";
}
else {
$emty='';

?>
<div class="alert alert-info">Lista de <strong><?=$query2->num_rows()?></strong> facturas que aún no se han creado</div>
<?php }?>
<table class="table table-striped  paginated" id="factura" <?=$emty?>>
	 <thead>
	<tr style="background:#C9F7FF">
	<td><strong>#</strong></td>
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>Cedula</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamdo</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td><strong>Paciente Pagara</strong></td>
	<td></td>
	<td>Seleccionar todos <br/><input type="checkbox" id="copy-all" /></td>
	</tr>
	</thead>
	 <tbody id="copy-all-rows">
	<?php
     foreach ($query2->result() as $fac) {
	$paciente=$this->db->select('id_p_a, nombre,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$fac->paciente)
	 ->get('patients_appointments')->row_array();
	$fecha1 = date("d-m-Y",strtotime($fac->filter_date));
 
	?>
<tr>
<td class="id_fac"><?=$fac->idfac;?></td>
<td><?=$fecha1;?></td>
<td>
<?php

$array_values_for_photo = array(
			'id_p_a' => $paciente['id_p_a'],
			'cedula' => $paciente['cedula'],
			'image_class' => "rounded-circle",
			'style' => 'width=60'

		);
		$photo= $this->search_patient_photo->search_patient($array_values_for_photo);

echo $photo;

?>
</td>

	<td ><?=$paciente['nombre'];?></td>
	<td ><?=$paciente['cedula'];?></td>
	<td><?=$fac->num_af;?></td>
	<td><?=$fac->numauto;?></td>
    <td><?=number_format($fac->t1,2)?></td>
	<td><?=number_format($fac->t2,2)?></td>
	<td><?=number_format($fac->t3,2)?></td>
	<td class="rnc" ><?=$fac->rnc;?></td>
	<td><input type="checkbox"  class="copy-one"  /></td>
	</tr>  

	<?php
	}

	?>
	 </tbody>
	</table>
	<input type="hidden" id="id_patient" value="<?=$patient?>"/>
<div id="id_val"></div>
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="edit-cancel"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>

</div>


<script>

$('#edit-cancel').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

	//-----------------------------------------------------------------------------------------
$('#copy-all').on('click', function(e) {
//$(this).prop('disabled',true);
if($(this).is(':checked',true)) {
$(".copy-one").prop('checked', true);
var id_fac = [];
$("#factura").find('td.id_fac').each(function(){
id_fac.push($(this).text());
alert(id_fac);
});
}
else{
$(".copy-one").prop('checked', false);

}

})


	

	//CLICKING BY ROW
		
	$('#factura').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	});
	$(this).closest('tr').clone().appendTo('#second-table>tbody');
	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	}
	//search_result();
	})
		
		
		
		$('#second-table').on('click','.copy-one',function(e){
		 e.preventDefault();
        $(this).closest('tr').fadeOut(800, function(){ 
		$(this).remove();
		});
		var id =$(this).val();
		$(this).closest('tr').clone().appendTo('#factura>tbody');
		})
	
</script>