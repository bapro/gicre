<?php
foreach($edit_recetas->result() as $row_edit)

 $inserted_time = date("d-m-Y H:i:s", strtotime($row_edit->insert_date));
$historial_id=$this->db->select('historial_id')->where('id_i_m',$row_edit->id_i_m)->get('h_c_indicaciones_medicales')->row('historial_id');
$usss=$this->db->select('name')->where('id_user',$row_edit->operator)->get('users')->row('name');
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close close-edit-rec"  aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Editar Recetas #  <span class="round"><?=$row_edit->id_i_m?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$usss?> | fecha :<?=$inserted_time?>
</h5>
      <div class='text-center' id='done-edit-med'><strong></strong></div>

 </div>

<div class="modal-body disable-all" style=" overflow-y: auto;">

<div class="col-md-9 col-md-offset-2"  >

<form method="post" class="form-horizontal" >
<div class="form-group">
<label class="control-label  col-md-3" >Medicamento</label>
<div class="col-md-9">
<select  class="form-control  select_edit"   id="medicamento11" >
<?php
$med=$this->db->select('name')->where('id',$row_edit->medica)->get('emergency_medicaments')->row('name');
if($med){
  $medhos=$med;
  $idmed=$row_edit->medica;
  }else{
      $medhos=$row_edit->medica;
      $idmed=$medhos;
  }
?>
  <option value="<?=$idmed?>"><?php echo $medhos?></option>
<?php
$sqladf ="SELECT id, name, cantidad_comp FROM  emergency_medicaments WHERE centro=$row_edit->centro && selected=0";
$querymedal = $this->db->query($sqladf);
foreach($querymedal->result() as $row)
{
?>
<option value="<?=$row->id?>" ><?=$row->name?></option>
<?php
}
?>
</select>

</div>
</div>
<div class="form-group">
<label class="control-label  col-md-3" >Cantidad</label>
<div class="col-md-4">
<input class="form-control"   id="cantidad11" value="<?=$row_edit->cantidad?>" >

</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Presentacion</label>
<div class="col-md-6">
<select  class="form-control select_edit"  name="presentacion1" id="presentacion1" >
<?php

foreach($presentacion as $rowp)
{

if($row_edit->presentacion==$rowp->name){
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
<label class="control-label  col-md-3" >Frecuencia</label>
<div class="col-md-6">
<select  class="form-control select_edit"   name="frecuencia1" id="frecuencia1" >
<?php

foreach($frecuencia as $row)
{

if($row_edit->frecuencia==$row->frecuency){
		        $selected="selected";
		} else {
		       $selected="";
	    }

echo "<option value='$row->frecuency' $selected>$row->frecuency</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Via</label>
<div class="col-md-6">
  <select  class="form-control select_edit"   name="via1" id="via1" >
<?php

foreach($via as $row)
{
if($row_edit->via==$row->via){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$row->via' $selected>$row->via</option>";
}
?>
</select>
<?php
if($row_edit->via =="OFTALMICA")
{
$display="";
}
else {
$display="display:none";
}
?>
<span style="<?=$display?>" class="show-oyo">
  <select  class="form-control select_edit"   name="oyo1" id="oyo1" >
  <option hidden><?=$row_edit->oyo?></option>
<option>Ojo izquiedo</option>
<option>Ojo derecho</option>
<option>Ambos ojos </option>

</select>
</span>
</div>
</div>
<div class="form-group">
<label class="control-label  col-md-3" >Nota</label>
<div class="col-md-9">
<textarea  class="form-control" id="nota_ed" rows='6' ><?=$row_edit->nota?></textarea>
</div>
</div>

<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="edit_recetas1"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>
</form>

</div>
</div>


<script>
$(".select_edit").select2({
  tags: true
});


$('.close-edit-rec').on('click', function () {
$('#edit_recetas_or_med').modal('hide');

});




$("#via1").change(function() {
  var via = $(this).val();
if(via=="OFTALMICA")
{
	$(".show-oyo").show();
}else
{
	$(".show-oyo").hide();
}
});



$('.uso-continuo').change(function() {
    if ($('.uso-continuo:checked').length) {
        $('#cantidad1').prop('disabled', true);
		  $('#cantidad1').val('');

    } else {
        $('#cantidad1').prop('disabled', false);

    }
});


//--------------------------------------------------------------------------------------------

$('#edit_recetas1').on('click', function(event) {
	event.preventDefault();
	var medicamento1 = $("#medicamento11").val();
var presentacion = $("#presentacion1").val();
var frecuencia = $("#frecuencia1").val();
 var cantidad = $("#cantidad11").val();
var via = $("#via1").val();
var oyo = $("#oyo1").val();
	if(medicamento1=="" || cantidad==""  || presentacion=="" || frecuencia=="" || via==""){
		alert("Los campos con '*' son obligatorios !");
	} else {

$.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/updateFormRecetasOrdMed')?>",
data: {oyo:oyo,medicamento1:medicamento1,presentacion:presentacion,nota:$("#nota_ed").val(),operator:<?=$id_user?>,frecuencia:frecuencia,via:via,id:<?=$row_edit->id_i_m?>,cantidad:cantidad},

success:function(data){
  $("#edit_recetas1").prop('disabled',true);
  $("#done-edit-med").html(data).addClass("alert alert-success");
setTimeout(function() {$('#edit_recetas_or_med').modal('hide');}, 2000);
allRecetasOrdMed();
}
});
	}
return false;
});



</script>
