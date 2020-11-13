<?php
$branches= $this->model_admin->branches();
$via = $this->model_admin->via();
$frecuencia = $this->model_admin->frecuencia();

$sqladf ="SELECT id, name, cantidad_comp FROM  emergency_medicaments WHERE centro=$centro_id && selected=0";
$querymedal = $this->db->query($sqladf);
?>

<div class="col-md-12" style='text-align:center'>
<div id="showerror"></div>
</div>
<input type="hidden" id="what-to-do"  value='0' />

<div class="col-md-12 move_left" style="background:#E6E6FA"  >
<h4 class="h4 his_med_title">I- Indicaciones Medicamentos</h4>
</div>
<div class="col-md-4" >
Elegir medicamentos del almacen <em style='font-size:11px'>(<?=$querymedal->num_rows();?> registros)<input id='select-medicamentos' type="checkbox"/>
<form method='post' >
<label class="control-label" ><span style="color:red">*</span> Medicamento <em id="ldm" style='font-size:11px'></em></label>

<select  class="form-control  select2" name="medicamento_ord_med"  id="medicamento"  >
<option></option>

</select>
<input  type='hidden' id='cantAlmacen'/>

<label class="control-label" ><span style="color:red">*</span> Cantidad </label>

<input class="form-control" name="cantidad"  id="cantidad" disabled >
<p><em id='result-cant'></em></p>
<label class="control-label" >Dosis </label>

<input class="form-control" name="dosisord"  id="dosis"  >
<input  type="hidden" name="operator" value="<?=$user_id?>" >
<input  type="hidden" name="historial_id" value="<?=$id_historial?>" >
<input  type="hidden"   value="" name="sala" >
<input  type="hidden"   value="<?=$centro_id?>" name="centro" >
<label class="control-label" ><span style="color:red">*</span> Presentacion</label>

<select  class="form-control select2" id="presentacion" name="presentacion_ord_med" >


</select>


<label class="control-label" ><span style="color:red">*</span> Frecuencia</label>

<select  class="form-control select2"   name="frecuencia_ord_med"  >
<?php

foreach($frecuencia as $row)
{
echo '<option value="'.$row->frecuency.'">'.$row->frecuency.'</option>';
}
?>
</select>


<label class="control-label" ><span style="color:red">*</span> Via</label>

<select  class="form-control select2" id="via_ord_med"  name="via_ord_med"  >
<?php

foreach($via as $row)
{
echo '<option value="'.$row->via.'">'.$row->via.'</option>';
}
?>
</select>

<span style="display:none" class="show-oyo">
  <select  class="form-control select2"   name="oyo_ord_med" >
  <option value="" hidden></option>
<option>Ojo izquiedo</option>
<option>Ojo derecho</option>
<option>Ambos ojos </option>

</select>
</span>

<label class="control-label" >Nota</label>
<textarea  class="form-control reset-est" name="nota_ord_med" rows='6' id='nota_ord_med' ></textarea>

<input  type="hidden"   value="2" name="printing" >
</div>
<div class="col-md-1" >
<div class="btn-group">
<button type="button" id='submit-medicamentoss' class="btn btn-primary btn-xs btn-dis-or-med" >
<i class="fa fa-arrow-right" aria-hidden="true"></i>
</button>
</div>
 </div>
 </form>
<div class="col-md-7 doubleb"  style="top:20px;height:550px;overflow-y:auto;background:white; box-shadow:
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">

<div id="new_indication_ord_med1"></div>

</div>
<div class="col-md-12">
 <hr class="hr_ad"/>
</div>

<script>

$('#select-medicamentos').on('click', function() {

if ($(this).is(":checked")) {
loadAllMedicamentos();
}else{
$("#medicamento").html("");
allPresentation();
}
});

function loadAllMedicamentos(){
$("#ldm").html('cargando...');
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadAllMedicamentos",
data: {centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$("#medicamento").html(data);
$("#ldm").html('');
},

});
}



$("#medicamento").on('change', function(event) {
getCantidad($(this).val());
$('#cantidad').prop('disabled',false);
$.ajax({
url:"<?php echo base_url(); ?>emergency/getMedPresentation",
data: {idmed:$(this).val()},
method:"POST",
success:function(data){
$("#presentacion").html(data);
},

});
});


function getCantidad(med){
$.ajax({
url:"<?php echo base_url(); ?>emergency/getCantidad",
data: {centro_id:<?=$centro_id?>,med:med},
method:"POST",
success:function(data){
$("#cantAlmacen").val(data);
},
});
}

function allPresentation(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/allPresentation",
method:"POST",
success:function(data){
$("#presentacion").html(data);
},
});
}




 $(".select2").select2({
  tags: true
});


$('#submit-medicamentoss').click(function(e){
e.preventDefault();
if($("select[name=medicamento_ord_med]").val()=="" ||
 $("select[name=presentacion_ord_med]").val()=="" ||
 $("select[name=frecuencia_ord_med]").val()=="" ||
 $("select[name=via_ord_med]").val()=="" ){
alert("Los campos con '*' son obligatorios para guardar un medicamento!");
} else {
	$('#submit-medicamentoss').prop('disabled',true);
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/saveOrdenMedicaRecetas",
data: {printing:2,centro:<?=$centro_id?>,medicamento_ord_med:$("select[name=medicamento_ord_med]").val(),dosis:$("input[name=dosisord]").val(),
presentacion_ord_med:$("select[name=presentacion_ord_med]").val(),frecuencia_ord_med:$("select[name=frecuencia_ord_med]").val(),
via_ord_med:$("select[name=via_ord_med]").val(),oyo_ord_med:$("select[name=oyo_ord_med]").val(),operator:<?=$user_id?>,cobert:0.8,id_hosp:<?=$id_hosp?>,
nota_ord_med:$("#nota_ord_med").val().trim(),sala:"",cantidad:$("#cantidad").val(),historial_id:<?=$id_historial?>,descuento:0
},
method:"POST",
success: function(data){
$("#cantidad").val("");
$('#submit-medicamentoss').prop('disabled',false);
loadAllMedicamentos();
allRecetasOrdMed();
kardexContent();
},

});
}
});


//-----------------------------------------------------------------------------------------

function allRecetasOrdMed()
{
$("#new_indication_ord_med").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/allRecetasOrdMed",
data: {historial_id:<?=$id_historial?>,user_id:<?=$user_id?>,area:"",printing:2},
method:"POST",
success:function(data){

$('#new_indication_ord_med1').html(data);
},

});
}



//---------------------------------------------------------------------------------------
$("#via_ord_med").change(function() {
  var via = $(this).val();
if(via=="OFTALMICA")
{
	$(".show-oyo").show();
}else
{
	$(".show-oyo").hide();
}
});
//----------------------------------------------------------------------------------------------



(function($) {
  $.fn.donetyping = function(callback) {
    var _this = $(this);
    var x_timer;
    _this.keyup(function() {
      clearTimeout(x_timer);
      x_timer = setTimeout(clear_timer, 1000);
    });

    function clear_timer() {
      clearTimeout(x_timer);
      callback.call(_this);
    }
  }
})(jQuery);

$('#cantidad').donetyping(function(callback) {
var cantidad=parseFloat($("#cantidad").val());
var cantAlmacen=parseFloat($("#cantAlmacen").val());
var text;
if(cantidad > cantAlmacen){
text='Hay solamente ' + cantAlmacen + ' disponible';
$("#cantidad").val('');
}else{
text='';
}
  $('#result-cant').text(text).css('color','red');
});




</script>
