<div class="loadf"></div>

 <?php if($seguro){
 $autoNumber=random_int(100, 100000);

 ?>
  <div class="form-group">
   <div class="col-lg-9">
   <input  type="hidden" class="form-control" id="autoNomber" value="<?=$autoNumber?>" >
<label class="control-label"><span class="req">*</span> Centro medico</label>

<select class="form-control select2"  id="centro_medico_fac" > 
 <option value="">Selecionne</option>
  <?php 

 foreach($centro_medico_tarif as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>
 </select>
 <input  type="hidden" class="form-control" id="doc_id" value="<?=$user_id?>" >
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
<select class="form-control " id="tarif-proced"> 
 <option value="">Selecionne</option>
  <?php 
  
  $sqlpt = "select id_tarif, procedimiento,monto FROM tarifarios WHERE id_seguro=$seguro AND id_doctor=$user_id GROUP BY procedimiento";
	$proct= $this->db->query($sqlpt);
foreach($proct->result() as $rowTaf)
{ 
echo '<option value="'.$rowTaf->id_tarif.'">'.$rowTaf->procedimiento.'</option>';
}
?>
 </select>
</div>
  <div class="col-lg-2">
  <label class="control-label" ><span class="req">*</span> Precio</label>
<input  type="text" class="form-control" id="precio" onkeypress='return onlyfloat(event);' >
  </div>

</div>

<?php }else{
	echo "<span style='color:red'>El campo de seguro del paciente esta vacío</span>";
}?>
<hr/>
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

paginationProcedFacData(<?=$user_id?>);


loadLastProced(<?=$user_id?>);



</script>