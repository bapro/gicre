<?php $medicamentos= $this->model_admin->medicamentos();
$presentacion= $this->model_admin->Presentacion();
$branches= $this->model_admin->branches();
$via = $this->model_admin->via();
$frecuencia = $this->model_admin->frecuencia();
$per=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');	
if($per=='Admin') {
$querycentro = $this->account_demand_model->getCentroMedico();	
}else if($per=='Medico'){
$querycentro = $this->model_medico->getMedicoCentro($user_id);	
}else{
$querycentro = $this->model_admin->view_as_doctor_centro($user_id);
}
?>

<div class="col-md-7">
<label class="control-label" ><span style='color:red'>*</span> Centro Medico</label>
<select class="form-control select2" id='centro'>
<option value=''></option>
 <?php 
foreach($querycentro as $row)
 { 
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
</div>
<div class="col-md-3">
<label class="control-label" ><span style='color:red'>*</span> Sala</label>
<input type="text" id="sala"  class="form-control saveSalaInfo" disabled /> <p id='processing-sala'></p>
</div>
<div class="col-md-3"><label class="control-label" > Fecha De Ingreso</label>
<input type="text" id="fechaIng"  class="form-control saveSalaInfo disNewInp" disabled /> 
</div>
<div class="col-md-7">
 <label class="control-label" > Diagnostico De Ingreso</label>
 <input type="text" id="diagIng"  class="form-control saveSalaInfo disNewInp" disabled />
 </div>
<div class="col-md-12" style='text-align:center'><i id='result-sala' class='fa fa-check-circle' style='color:green;display:none' ></i></div>
<input type="hidden" id="what-to-do"  value='0' />

<div class="col-md-12 move_left" style="background:#E6E6FA"  >
 <hr class="hr_ad"/>
<h4 class="h4 his_med_title">I- Indicaciones Medicamentos</h4>

</div>
<form method="post" class="form-horizontal" id="submit-ord-med">
<input type="hidden" name="historial_id" value="<?=$id_historial?>">
<input type="hidden" name="operator" value="<?=$user_id?>">
<input type="hidden" name="sala" id="copy-sala" >
<input  type="hidden"   value="1" name="printing" >
<input  type="hidden"   value="0" name="centro" >
<input  type="hidden"   value="0" name="cantidad" >
<input  type="hidden"   value="0" name="descuento" >
<input  type="hidden"   value="0" name="id_em" >
<input  type="hidden"   value="0" name="cobert" >
<div class="col-md-3"  >
<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Medicamento</label>

<select  class="form-control  select2"  name="medicamento_ord_med" >
<option value=''></option>
<?php 

foreach($medicamentos as $row)
{ 
?>
<option value="<?=$row->name?>"><?=$row->name?></option>
<?php
}
?>
</select>


</div>


<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Presentacion</label>

<select  class="form-control select2"  name="presentacion_ord_med" >
<option value="" hidden></option>
<?php 

foreach($presentacion as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>

</div>
<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Frecuencia</label>

<select  class="form-control select2"   name="frecuencia_ord_med"  >
<option value="" hidden></option>
<?php 

foreach($frecuencia as $row)
{ 
echo '<option value="'.$row->frecuency.'">'.$row->frecuency.'</option>';
}
?>
</select>

</div>
<div class="form-group">
<label class="control-label" ><span style="color:red">*</span> Via</label>

  <select  class="form-control select2" id="via_ord_med"  name="via_ord_med"  >
<option value="" hidden></option>
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
<span>
</div>


<div class="form-group">
<label class="control-label" >Nota</label>
<textarea  class="form-control reset-est" name="nota_ord_med" rows='6' ></textarea>
</div>
</div>
<div title="Ingresar" class="col-md-1" >
<div class="btn-group">

<button type="submit" id="add-all-ord-med" class="btn btn-primary btn-xs btn-dis-or-med" disabled title='El campo sala debe ser lleno primero.'>
<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
</button>

 </div>
</div>
</form>
<div class="col-md-8 doubleb"  style="top:20px;height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
	
<div id="new_indication_ord_med"></div>

</div>
<div class="col-md-12">
 <hr class="hr_ad"/>
</div>

<script>
$("#sala").on('keyup', function () {
if($("#sala").val()==""){
$('.disNewInp').prop("disabled",true);
}else{
$('.disNewInp').prop("disabled",false);
}
}),
	
$('#centro').change(function(e){
	if($(this).val()==""){
	$('#sala').prop('disabled',true);
    $("#imprimirOrMed").hide();	
	}else if($('#what-to-do').val()==0){	
 $.ajax({
url:'<?php echo base_url();?>saveHistorial/saveOrdMedSala',
data: {sala:"",user_id:<?=$user_id?>,historial_id:<?=$id_historial?>,centro:$('#centro').val()},
method:"POST",
dataType: 'JSON',
success: function(msg){
$("#processing-sala").hide();
$('#sala').prop('disabled',false);
$('#what-to-do').val(1);
$('#result-sala').show().text('Agregado con exito');
$("#copy-sala").val(msg);
$(".btn-dis-or-med").prop("disabled",false);
},
 
});
}else if($('#what-to-do').val()==1){
	$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/editSala",
data: {centro:$("#centro").val(),sala:$("#sala").val(),id:$("#copy-sala").val()},
method:"POST",
success:function(data){
$("#processing-sala").hide();
$('#sala').prop('disabled',false);
$('#result-sala').show().text(' Cambiado con exito');
$(".btn-dis-or-med").prop("disabled",false);
},
 
});
}
});

//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('.saveSalaInfo');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

$('#centro').on('keydown', function () {
  clearTimeout(typingTimer);
});


//user is "finished typing," do something
function doneTyping () {
$("#processing-sala").fadeIn().html('<img  src="<?= base_url();?>assets/img/loading.gif" />');
if($input.val().trim() ==""){
$('#result-sala').hide();
$("#processing-sala").hide();
$(".btn-dis-or-med").prop("disabled",true);
$("#imprimirOrMed").hide();

}
else if($input.val().trim() !=""){
	$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/editSala",
data: {centro:$("#centro").val(),sala:$("#sala").val(),id:$("#copy-sala").val(),fecha_ingreso:$("#fechaIng").val(),diagno_ing:$("#diagIng").val()},
method:"POST",
success:function(data){
$("#processing-sala").hide();
$('#result-sala').show().text(' Cambiado con exito');
$(".btn-dis-or-med").prop("disabled",false);
$("#imprimirOrMed").show();
},
 
});


}
}


$('#submit-ord-med').submit(function(e){
e.preventDefault();	
if($("select[name=medicamento_ord_med]").val()=="" ||
 $("select[name=presentacion_ord_med]").val()=="" || 
 $("select[name=frecuencia_ord_med]").val()=="" || 
 $("select[name=via_ord_med]").val()=="" ){ alert("Los campos con '*' son obligatorios para grabar una receta!");} else {
$("#add-all-ord-med").prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>saveHistorial/saveOrdenMedicaRecetas',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
$("#add-all-ord-med").prop('disabled',false);
$('#imprimirOrMed').show();
//$(".select2").val("").trigger("change");
$(".reset-est").val("");
allRecetasOrdMed();
},

});
}
});



function allRecetasOrdMed()
{
$("#allRecetasOrdMed").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var user_id  = <?=$user_id?>;
var historial_id = <?=$id_historial?>;
var area  = "";
$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/allRecetasOrdMed",
data: {historial_id:historial_id,user_id:user_id,area:area,printing:1},
method:"POST",
success:function(data){

$('#new_indication_ord_med').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#new_indication_ord_med').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}




$(".select2").select2({
	
  tags: true
});



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





</script>