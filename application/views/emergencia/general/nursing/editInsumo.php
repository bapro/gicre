<div class="modal-header"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h2 class="modal-title"  >Editar Insumo</h2>

</div>
<div class="modal-body" >
<div class="input-group">
<select  class="form-control  select-ins" id="emer-nursing2" >
<?php 

foreach($rows->result() as $row){
	
	if($edit['insumo'] == $row->id) {
	echo '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
	} else {
		echo '<option value="'.$row->id.'">'.$row->name.'</option>';
	}
}


?>
</select>
<input class="form-control" id='cantidad_insumo2' value='<?=$edit['cantidad']?>'/>
<span class="input-group-addon">
<button type='button' id='save-nursing2'>Guardar</button></span>
</div>

</div>

<script>

$(".select-ins").select2({

});

$('#save-nursing2').on('click', function(event) {
	if($('#cantidad_insumo2').val() !=""){
	$.ajax({
url:"<?php echo base_url(); ?>emergency/updateInsumo",
data: {insumo:$('#emer-nursing2').val(),cantidad_insumo:$('#cantidad_insumo2').val(),id:<?=$id?>, table:"hosp_peticion", user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$('#editInsumo1').modal('hide');
},
});
}
});
</script>