<?php
 foreach($edit->result() as $row_edit)
 
 $inserted_time = date("d-m-Y H:i:s", strtotime($row_edit->inserted_time));
$ussss=$this->db->select('name,area')->where('id_user',$id_user)->get('users')->row_array();
 $area=$ussss['area'];
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Editar Medida General  # <span class="round"><?=$row_edit->idem?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$ussss['name']?> | fecha :<?=$inserted_time?> 
</h5>
</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div class="col-md-9  col-md-offset-1"  >
<form class="form-horizontal">
<div class="form-group">
<label class="control-label  col-md-3" >Medidas Generales</label>
<div class="col-md-6">
<select  class="form-control  select_est"   id="medgen2" >
<?php 
if($row_edit->medidas_gen=='Medidas Generales'){
$selected1="selected";
} else {
$selected1="";
}


if($row_edit->medidas_gen=='Dieta'){
$selected2="selected";
} else {
$selected2="";
}
?>
<option value="Medidas Generales" <?=$selected1?>>Medidas Generales</option>
<option value="Dieta" <?=$selected2?>>Dieta</option>
</select>

</div>
</div>




<div class="form-group">
<label class="control-label col-md-3" >Descripcion</label>
<div class="col-md-6">
<textarea  class="form-control reset-est" id="descripcion_mg2" ><?=$row_edit->descripcion_mg?></textarea>
</div>
</div>



<div class="form-group">
<label class="control-label  col-md-3" >Intervalo De Realizacion</label>
<div class="col-md-6">


<input type="text" value="<?=$row_edit->intervalo_de_real?>" class="form-control" id="intervalo_de_real2"  />

</div>
</div>
<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="btn_intervalo_de_real2"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>
</form>

</div>
</div>


<script>
$(".select_est").select2({
  tags: true
});




//--------------------------------------------------------------------------------------------

$('#btn_intervalo_de_real2').on('click', function(event) {
event.preventDefault();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateOrdMedSave')?>",
data: {medgen2:$("#medgen2").val(),intervalo_de_real2:$("#intervalo_de_real2").val(),
descripcion_mg2:$("#descripcion_mg2").val(),operator:<?=$id_user?>,id:<?=$row_edit->idem?>},

success:function(data){ 
alert("Cambio ha echo con exito !");
 $('#edit_medida_gnl').modal('hide');

}  
});
return false;
});
</script>