<?php
 foreach($results as $rw)
//==================================================================
$sql_doc ="SELECT id, first_name
FROM doctors
WHERE id NOT IN 
(select id_doct FROM tarif_seg_doc where id_cat='$rw->id_categoria' ) ";
$query_doct = $this->db->query($sql_doc);
?>
<hr id="hr_ad"/>
<label class="control-label">Agregar otros medicos a estes tarifarios</label>
<select class="form-control id_doccc"  multiple id="id_doccc" style="height:10px">
<option value=""></option>
<?php 
foreach($query_doct->result() as $row)
{ 
echo "<option value=".$row->id.">".$row->first_name."</option>";
}
?>
</select>
<button type="button" id="add_doccc" disabled class="btn btn-info">Agregar</button><span id="load_add" style="position:absolute;display:none"></span>
<script>
$("#id_doccc").change(function(){
$("#add_doccc").prop("disabled",false);
});
$('.id_doccc').select2({
	 width: '100%',
 placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});







$('#add_doccc').on('click', function(event) {
$("#load_add").fadeIn().html('<span class="load"   ><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var id_doc  = $("#id_doccc").val();
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/addDoctTarif')?>",
data: {id_categoria:id_categoria,id_doc:id_doc,id_seguro:id_seguro},
cache: true,
 success:function(data){
$("#load_add").hide();	 
 $('#hide_seguro_doct_data_after_add_doc').hide();
 $('#show_seguro_doct_data_after_add_doc').html(data);
$('.id_doccc').val(null).trigger('change');
},
 
});

return false;
});	
</script>