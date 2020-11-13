<div class="modal-header"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h2 class="modal-title"  >Editar Insumo</h2>

</div>
<div class="modal-body" >
<div class="input-group">
<select  class="form-control  select2" id="emer-nursing2" >
<option><?=$edit['insumo']?></option>
<?php 
foreach($rows->result() as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<input class="form-control" id='cantidad_insumo2' value='<?=$edit['cantidad']?>'/>
<span class="input-group-addon">
<button type='button' id='save-nursing2'>Guardar</button></span>
</div>

</div>

<script>
$('#save-nursing2').on('click', function(event) {
	$.ajax({
url:"<?php echo base_url(); ?>emergency/updateInsumo",
data: {insumo:$('#emer-nursing2').val(),cantidad_insumo:$('#cantidad_insumo2').val(),id:<?=$id?>},
method:"POST",
success:function(data){
$('#editInsumo1').modal('hide');
},
});
});
</script>