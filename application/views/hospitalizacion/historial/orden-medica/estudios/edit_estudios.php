<?php

 foreach($edit_estudios->result() as $row_edit)

 $inserted_time = date("d-m-Y H:i:s", strtotime($row_edit->insert_date));
$historial_id=$this->db->select('historial_id')->where('id_i_e',$row_edit->id_i_e)->get('h_c_indicaciones_estudio')->row('historial_id');
$ussss=$this->db->select('name,area')->where('id_user',$row_edit->operator)->get('users')->row_array();
 $area=$ussss['area'];
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close close-edit-est"  aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Editar Estudios  # <span class="round"><?=$row_edit->id_i_e?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$ussss['name']?> | fecha :<?=$inserted_time?>
</h5>
  <div class='text-center' id='done-edit-est'><strong></strong></div>
</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div class="col-md-9  col-md-offset-1"  >
<form class="form-horizontal">
<div class="form-group">
<label class="control-label  col-md-3" ><font style="color:red">*</font>Estudios</label>
<div class="col-md-9">
<select  class="form-control  select_est"   id="study2" >

  <?php
  $med=$this->db->select('sub_groupo')->where('id_c_taf',$row_edit->estudio)->get('centros_tarifarios')->row('sub_groupo');
  if($med){
    $medhos=$med;
    $idmed=$row_edit->estudio;
    }else{
        $medhos=$row_edit->estudio;
        $idmed=$medhos;
    }
  ?>
    <option value="<?=$idmed?>"><?php echo $medhos?></option>


<?php
$sql ="SELECT sub_groupo, id_c_taf FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $row_edit->centro GROUP BY sub_groupo ORDER BY sub_groupo ASC";
$query = $this->db->query($sql);
foreach($query->result() as $row)
{
if($row_edit->estudio==$row->sub_groupo){
		        $selected="selected";
		} else {
		       $selected="";
	    }
?>
<option value="<?=$row->id_c_taf?>" <?=$selected?>><?=$row->sub_groupo?></option>
<?php
}
?>
</select>

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
<div class="col-md-8">


<input type="text" value="<?=$row_edit->lateralidad?>" class="form-control" id="lateralidad2"  />

</div>
</div>

<div class="form-group">
<label class="control-label col-md-3" >Observaciones</label>
<div class="col-md-9">
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


$('.close-edit-est').on('click', function () {
$('#edit_estudios_or_med2').modal('hide');

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
url: "<?=base_url('hospitalizacion/updateEstOrdMed')?>",
data: {study2:study2,cuerpo2:cuerpo2,lateralidad2:lateralidad2,operator:operator,observaciones2:observaciones2,id:id},

cache: true,

success:function(data){
  $("#done-edit-est").html(data).addClass("alert alert-success");
setTimeout(function() {$('#edit_estudios_or_med2').modal('hide');}, 1000);

}
});
return false;
});
</script>
