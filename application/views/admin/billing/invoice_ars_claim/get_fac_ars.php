<?php
$this->padron_database = $this->load->database('padron',TRUE);

$sqlncf ="SELECT * FROM invoice_ars_claims WHERE 
 $condition_inv GROUP BY ncf_id ";
$querysqlncf = $this->db->query($sqlncf);


 if($querysqlncf->num_rows() > 0  ){
	 foreach ($querysqlncf->result() as $n) {
$sql ="SELECT *
FROM 
invoice_ars_claims 
WHERE  $condition_inv AND ncf_id=$n->ncf_id
";
$query = $this->db->query($sql); 
	 $nfc=$this->db->select('value,id_ncf,cancel_text')->where('id_ncf',$n->ncf_id)
 ->get('ncf')->row_array();	
 $ncf_id=$nfc['id_ncf']; 
  $update_date= date("d-m-Y H:i",strtotime($n->updated_date));
   $crpa=$this->db->select('name')->where('id_user',$n->updated_by)->get('users')->row('name');
   if($nfc['cancel_text'] !=""){
	 $cancel_text= $nfc['cancel_text'];
    $cancel=' <a class="btn btn-sm" data-toggle="modal" style="color:red" data-target="#edit-cancel"  href="'.base_url().'/admin_medico/editCancelFacArc/'.$n->ncf_id.'/'.$is_admin.'/'.$id_user.'/'.$desde.'/'.$hasta.'/'.$patient.'" >Canceladas (Crear)<a/>';   
  
  }else{
	$cancel="";   
   }
	 ?>
	 <div class="alert alert-info">
	 Hay <strong><u>NCF : <?=$nfc['value']?></u></strong> con <strong><?=$query->num_rows()?> factura(s)</strong> creada(s) segun las entradas de la busqueda (Creado por : <?=$crpa?> | <?=$update_date?>)<a  target="_blank" href="<?php echo base_url("printings/invoice_ars_p_v_/$desde/$hasta/$ncf_id/$is_admin/$id_user/$patient")?>"  title="Imprimir" class="btn btn-sm" >Ver</a>
	 <?=$cancel?>
	 </div>  
	 <?php 
 } 
}

$sql2 ="SELECT *,sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura2
JOIN factura ON factura.id2=factura2.idfacc
WHERE 
$condition_fac  AND idfac NOT IN (SELECT id_fac2 from invoice_ars_claims) GROUP BY numauto ORDER BY filter_date DESC";
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
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>Cedula</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamdo</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td><strong>Paciente Pagara</strong></td>
	<td></td>
	<td><input type="checkbox" id="copy-all" /></td>
	</tr>
	</thead>
	 <tbody id="copy-all-rows">
	<?php
     foreach ($query2->result() as $fac) {
	$paciente=$this->db->select('nombre,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$fac->paciente)
	 ->get('patients_appointments')->row_array();
	$fecha1 = date("d-m-Y",strtotime($fac->filter_date));
 
	?>
<tr>
<td><?=$fecha1;?></td>
<td>
<?php

if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>
</td>
	<td class="fecha1"  style="display:none"><?=$fac->filter_date;?></td>
	<td class="paciente" style="display:none"><?=$fac->paciente;?></td>
	<td ><?=$paciente['nombre'];?></td>
	<td ><?=$paciente['cedula'];?></td>
	<td class="num_af"><?=$fac->num_af;?></td>
	<td class="numauto"><?=$fac->numauto;?></td>
   <td class="tcentro"  style="display:none"><?=$fac->centro_medico;?></td>
   <td class="tarea"  style="display:none"><?=$fac->area;?></td>
	<td><?=number_format($fac->t1,2)?></td>
	<td><?=number_format($fac->t2,2)?></td>
	<td><?=number_format($fac->t3,2)?></td>
	<td class="tsubtotal" style="display:none"><?=$fac->t1?></td>
	<td class="totpagseg" style="display:none"><?=$fac->t2?></td>
	<td class="totpagpa" style="display:none"><?=$fac->t3?></td>
	<td class="medico" style="display:none"><?=$fac->medico;?></td>
	<td class="servicio" style="display:none"><?=$fac->service;?></td>
	<td class="codigoprestado" style="display:none"><?=$fac->codigoprestado;?></td>
	<td class="rnc" ><?=$fac->rnc;?></td>
	<td class="seguro_medico" style="display:none"><?=$fac->seguro_medico;?></td>
	<td class="idfacc" style="display:none"><?=$fac->idfac;?></td>
	<td class="idfac2" style="display:none"><?=$fac->id2;?></td>
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
jQuery('#copy-all').on('click', function(e) {

if($(this).is(':checked',true)) {

}
else{
$(".copy-one").prop('checked', false);
}
})




$('#factura').on('click','#copy-all',function(e){
	//jQuery('#copy-all').on('click', function(e) {
	if($(this).is(':checked',true)) {
	$("#copy-all-rows").fadeOut(800, function(){ 
	$(this).remove();
	});
	$("#copy-all-rows").clone().appendTo('#second-table');
	

	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	//search_result();
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