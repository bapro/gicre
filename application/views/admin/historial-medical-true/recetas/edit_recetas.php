<?php
foreach($edit_recetas as $row_edit)
 
 $inserted_time = date("d-m-Y H:i:s", strtotime($row_edit->insert_date));
$historial_id=$this->db->select('historial_id')->where('id_i_m',$row_edit->id_i_m)->get('h_c_indicaciones_medicales')->row('historial_id');
$usss=$this->db->select('name')->where('id_user',$row_edit->operator)->get('users')->row('name');
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Editar Recetas #  <span class="round"><?=$row_edit->id_i_m?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$usss?> | fecha :<?=$inserted_time?> 
</h5>
<!--<div class="col-md-12 text-center"> <a target="_blank"  href="<?php echo base_url("printings/print_recetas/$historial_id/$id_user/$row_edit->id_i_m")?>" style="cursor:pointer" title="Imprimir" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a></div>
-->
</div>

<div class="modal-body disable-all" style=" overflow-y: auto;">
<div class="col-md-6  col-md-offset-3"  >
<div class="form-group">
<label class="control-label  col-md-3" ><font style="color:red">*</font>Medicamento</label>
<div class="col-md-6">
<select  class="form-control  select_edit"   id="medicamento11" >
<?php 

foreach($medicamentos as $row)
{ 
if($row_edit->medica==$row->name){
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

<div class="form-group">
<label class="control-label   col-md-3" ><font style="color:red">*</font>Presentacion</label>
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
<label class="control-label  col-md-3" ><font style="color:red">*</font>Frecuencia</label>
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
<label class="control-label  col-md-3" ><font style="color:red">*</font>Via</label>
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
<label class="control-label  col-md-3" >Cantidad (dias)</label>
<div class="col-md-6">

<?php
if($row_edit->cantidad==0){
		        $checked="checked";
				$disabled="disabled";
		} else {
		       $checked="";
			    $disabled="";
	    }
?>
<input type="number" value="<?=$row_edit->cantidad?>" class="form-control reset-res" name="cantidad1" id="cantidad1" min="1" <?=$disabled?>/>

<label class="control-label" >Uso continuo</label> <input type="checkbox" class="uso-continuo" <?=$checked?>/>
</div>
</div>

<div class="form-group">
<label class="control-label   col-md-3" >Farmacia</label>
<div class="col-md-6">
<select  class="form-control select_edit"  name="farmacia1" id="farmacia1" onChange="getSucE(this.value);">
<?php 

foreach($farmacia as $row)
{
if($row_edit->farmacia==$row->id){
		        $selected="selected";
		} else {
		       $selected="";
			   echo "<option></option>";
	    }	
echo "<option value='$row->id' $selected>$row->noma</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label  col-md-3" >Sucursal</label>
<div class="col-md-6">
<?php 
if($row_edit->branch==0)
{
$id_farma=0;
$dis="display:none";
} else {
	$id_farma=$row_edit->farmacia;
$dis="";
}?>
<span id="show-branch" style="">
<select class="form-control select_edit"  name="branch1" id="branch1">
<?php 
$sql ="SELECT id, branch_name FROM drug_store_branches where drug_store_id=$id_farma";
$query = $this->db->query($sql);
foreach($query->result() as $brc)
{
	
echo "<option value='$brc->id' $selected>$brc->branch_name</option>";
}
?>
</select>
</span>
</div>
</div>

<div class="col-md-3 col-md-offset-3">
<button   class="btn btn-md btn-success "  id="edit_recetas1"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>


</div>
</div>


<script>
$(".select_edit").select2({
  tags: true
});


$(document).ready(function() {

var farmacia1 = $("#farmacia1").val();
$.ajax({
url: '<?php echo site_url('admin_medico/getSucEdit');?>',
type: 'post',

data:{id_esp:farmacia1},
success: function (data) {
$("#branch1").html(data);
}

});
});

function getSucE(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getSuc');?>',
	data:'id_esp='+val,
	success: function(data){
		//alert(data);
	$("#branch1").prop('disabled', false);
		$("#branch1").html(data);
	}
	});
}




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
	
var operator = "<?=$id_user?>";
var id = "<?=$row_edit->id_i_m?>";
var medicamento1 = $("#medicamento11").val();
var presentacion = $("#presentacion1").val();
var frecuencia = $("#frecuencia1").val();
var cantidad = $("#cantidad1").val();
var via = $("#via1").val();
var oyo = $("#oyo1").val();
var farmacia = $("#farmacia1").val();
var branch = $("#branch1").val();	
	if(medicamento1==""  || presentacion=="" || frecuencia=="" || via==""){
		alert("Los campos con '*' son obligatorios !");
	} else {

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/UpdateFormIndicaciones')?>",
data: {oyo:oyo,medicamento1:medicamento1,presentacion:presentacion,operator:operator,frecuencia:frecuencia,cantidad:cantidad,via:via,farmacia:farmacia,branch:branch,id:id},

cache: true,

success:function(data){ 
alert("Cambio ha echo con exito !");
 $('#edit_recetas').modal('hide');
}  
});
	}
return false;
});
</script>