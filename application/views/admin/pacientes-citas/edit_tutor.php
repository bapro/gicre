<?php
 foreach($edit_tutor as $row_edit)
 
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Cambiar La Relación familia  </h3><br/>
</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div class="col-md-6  col-md-offset-3"  >
<div class="form-group">
<label class="control-label  col-md-9" >Cual es la relación familia tiene <strong><?=$row_edit->name_tutor?></strong> con el paciente ?</label>
<div class="col-md-3">
<select  class="form-control"   id="rel_fam" >
<?php 

foreach($query->result()as $row)
{ 
if($row_edit->relacion==$row->name){
		        $selected="selected";
		} else {
		       $selected="";
	    }
?>
<option value="<?=$row->name?>" <?=$selected?>><?=$row->name?></option>
<?php
}
?>
</select>

</div>
</div>

<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="edit_t"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>


</div>
</div>


<script>

//--------------------------------------------------------------------------------------------
$('#edit_t').on('click', function(event) {
	var id = "<?=$row_edit->id?>";
	var rel_fam = $("#rel_fam").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/UpdatePatientTutor')?>",
data: {rel_fam:rel_fam,id:id},

cache: true,

success:function(data){ 
alert("Cambio ha echo con exito !");
$('#edit_tutor').modal('hide');

}  
});
return false;
});

</script>