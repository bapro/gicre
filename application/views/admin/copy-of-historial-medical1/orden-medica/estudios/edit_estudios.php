<?php

 foreach($edit_estudios->result() as $row_edit)
 
 $inserted_time = date("d-m-Y H:i:s", strtotime($row_edit->insert_date));
$historial_id=$this->db->select('historial_id')->where('id_i_e',$row_edit->id_i_e)->get('h_c_indicaciones_estudio')->row('historial_id');
$ussss=$this->db->select('name,area')->where('id_user',$row_edit->operator)->get('users')->row_array();
 $area=$ussss['area'];
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Editar Estudios  # <span class="round"><?=$row_edit->id_i_e?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$ussss['name']?> | fecha :<?=$inserted_time?> 
</h5>
</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div class="col-md-9  col-md-offset-1"  >
<form class="form-horizontal">
<div class="form-group">
<label class="control-label  col-md-3" ><font style="color:red">*</font>Estudios</label>
<div class="col-md-6">
<?php if($direction==0){?>
<select  class="form-control  select_est"   id="study2" >
<?php 

foreach($estudios as $row)
{ 
if($row_edit->estudio==$row->name){
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
<?php
}else{
?>
<select  class="form-control  select_est"   id="study2" >
<?php 
$sql ="SELECT sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $row_edit->centro GROUP BY sub_groupo ORDER BY sub_groupo ASC";
$query = $this->db->query($sql);
foreach($query->result() as $row)
{ 
if($row_edit->estudio==$row->sub_groupo){
		        $selected="selected";
		} else {
		       $selected="";
	    }
?>
<option value="<?=$row->sub_groupo?>" <?=$selected?>><?=$row->sub_groupo?></option>
<?php
}
?>
</select>
<?php
}
?>
</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" ><font style="color:red">*</font>Parte del cuerpo</label>
<div class="col-md-6">
<select  class="form-control select_est"   id="cuerpo2" >
<?php 

foreach($cuerpo as $rowp)
{ 

if($row_edit->cuerpo==$rowp->name){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$rowp->name' $selected>$rowp->name</option>";
}
?>
</select>
</div>
</div>


<div class="form-group">
<label class="control-label  col-md-3" >Lateralidad</label>
<div class="col-md-6">


<input type="text" value="<?=$row_edit->lateralidad?>" class="form-control" id="lateralidad2"  />

</div>
</div>

<div class="form-group">
<label class="control-label col-md-3" >Observaciones</label>
<div class="col-md-6">
<textarea  class="form-control reset-est" id="observaciones2" ><?=$row_edit->observacion?></textarea>
</div>
</div>

<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="edit_estudios2"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>
</form>

</div>
</div>


<script>
$(".select_est").select2({
  tags: true
});




//--------------------------------------------------------------------------------------------

$('#edit_estudios2').on('click', function(event) {
	event.preventDefault();
var operator = <?=$id_user?>;
var id = <?=$row_edit->id_i_e?>;
var study2 = $("#study2").val();
var cuerpo2 = $("#cuerpo2").val();
var lateralidad2 = $("#lateralidad2").val();
var observaciones2 = $("#observaciones2").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateEstOrdMed')?>",
data: {study2:study2,cuerpo2:cuerpo2,lateralidad2:lateralidad2,operator:operator,observaciones2:observaciones2,id:id},

cache: true,

success:function(data){ 
alert("Cambio ha echo con exito !");
 $('#edit_estudios_or_med2').modal('hide');

}  
});
return false;
});
</script>