<?php if($seguro){
 $autoNumber=random_int(100, 100000);
 
 ?>
 <div class="loadf"></div>
 <div class="form-group">
   <div class="col-lg-9">
   <input  type="hidden" class="form-control" id="autoNomber" value="<?=$autoNumber?>" >
<label class="control-label"><span class="req">*</span> Centro médico</label>

<select class="form-control select2"  id="centro_medico_fac" > 
 <option value="">Selecionne</option>
  <?php 

 foreach($centro_medico_tarif as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>
 </select>

 <label class="control-label"><span class="req">*</span> Médico</label>

<select class="form-control select2"  id="doctor_id" disabled> 


 </select>
<input  type="hidden" class="form-control" id="doc_id" >
 </div>
 </div>
  <div class="form-group">
 <div class="col-lg-12">
<label class="control-label" ><span class="req">*</span> Conclusión  Diagnostico</label>

<input  type="text" class="form-control" id="conclusion_diag" >
</div>
</div>
 <div class="form-group">
<div class="col-lg-10">
  <label class="control-label" ><span class="req">*</span> Buscar Procedimiento</label>
<select class="form-control" id="tarif-proced" disabled> 
 <option value="">Selecionne</option>
 </select>
</div>
  <div class="col-lg-2">
  <label class="control-label" ><span class="req">*</span> Precio</label>
<input  type="text" class="form-control" id="precio" onkeypress='return onlyfloat(event);'  >
  </div>

</div>

<?php }else{
	echo "<span style='color:red'>El campo de seguro del paciente esta vacío</span>";
}?>
<hr/>
<div class="loadf"></div>
<div class="col-md-12">
<div id="loadContentOrdMed"></div>
</div>
<div class="col-md-12">
<div id="paginationProcedFacData"></div>
<hr/>
</div>
<?php 
$data['user_id']=$user_id;
$data['patient']=$patient;
$this->load->view('factura/footer-procedimiento', $data);
?>
<script>
$('#centro_medico_fac').change(function () {
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/get_doc_centro');?>",
	data:{id_centro:$(this).val(),id_user:<?=$user_id?>},
	success: function(data){
	$("#doctor_id").prop("disabled",false);
	$("#doctor_id").html(data);
	$(".loadf").hide();
	},
	 
	});

});

$('#doctor_id').change(function () {
	
	paginationProcedFacData($(this).val());
	loadLastProced($(this).val());
	$("#doc_id").val($(this).val());
	//$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/loadProcedimientoDoc');?>",
	data:{seguro:<?=$seguro?>,id_doc:$(this).val()},
	success: function(data){
	
	$("#tarif-proced").html(data);
	
	//$(".loadf").hide();
	},

	 });	

});





</script>