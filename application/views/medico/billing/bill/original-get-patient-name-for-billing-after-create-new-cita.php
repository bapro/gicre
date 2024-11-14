<div class="col-sm-12 showdown3 searchb" >
 <?php 
if($identificar=="privado") {$tarif="Doctor Tarifarios ";} else{$tarif="Centro Tarifarios <span style='display:$ws'><input  type='checkbox' id='pdss'/> PDSS</span>";}

foreach($patient_data as $row)

   ?>
   <div id="showError"> </div>
<h2 class="h2" align="center">FACTURA</h2>
<div style="overflow-x:auto">
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf">
<thead>
<tr class="trback">
<?php if($identificar=="privado") {
	 if(empty($serv)) {
$display="style='display:none'";
}
else {$display="";}	

	?>

<th class="heading">
<?php if(empty($serv)) {
	echo "<span style='color:#B18904'><form method='post' action='".base_url()."admin_medico/import_rates_fac'>
	<input type='hidden' name='id_doc' value='$id_doc'/>
	<input type='hidden' name='id_seguro' value='$id_seguro'/>
	<input type='hidden' name='plan' value='$planOcentro'/>
	<input type='hidden' name='name' value='$name'/>
	<input type='submit' value='No hay tarifarios crear'/></form></span>";
	$disabled="disabled";$display="none";
} else {
echo $tarif;
$disabled="";
}
?>
</th>

<?php
} else {
	
	
	if(empty($serv_centro)) {
$display="style='display:none'";
}
else {$display="";}

?>

<th class="heading">
<?php if(empty($serv_centro)) {
	echo "<span style='color:#B18904'>No hay servicios | <a  href='".base_url()."admin_medico/import_rates_fac_centro/$id_cm/$id_seguro/$name'>Crear</a></span>";
	
	$disabled="disabled";$display="none";
} else {
echo $tarif;
$disabled="";
}
?>
</th>

<?php
}
?>
<th class="heading">Cantidad</th>
<th class="heading">Precio Unitario</th>
<th class="heading">Sub-Total</th>
<th class="heading">Total Pagar Seguro</th>
<th class="heading">Descuento</th>
<th class="heading">Total Pagar Paciente</th>
<?php if($identificar=="privado") {
	 if(empty($serv)) {
$display="style='display:none'";
}
else {$display="";}	
	
	?>
<td></td>


<?php
} else {
	
	
	if(empty($serv_centro)) {
$display="style='display:none'";
}
else {$display="";}
?>
<td></td>



<?php
}
?>

</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="3">TOTALES</th>
<!--<th id="cantidad-grand-total">0.00</th>
<th id="precio-grand-total">0.00</th>-->
<th>RD$ <span id="table-grand-total" >0.00</span></th>
<th>RD$ <span id="seguro-grand-total">0.00</span></th>
<th style='color:red'>RD$ <span id="descuento-grand-total">0.00</span></th>
<th>RD$ <span id="tot-paciente-grand-total">0.00</span></th>
<th style="background:white">
<?php if($identificar=="privado") {
 if(empty($serv)) {
$display="display:none";
}
else {$display="";}	
?>
<button disabled type="button" title="Añadir fila" id="add_row" style="cursor:pointer;font-size:13px;color:blue;background:white;<?=$display?>"><span  class="glyphicon glyphicon-plus-sign"></span></button>


<?php
} else {
		
	if(empty($serv_centro)) {
$display="display:none";
}
else {$display="";}
?>
<button type="button" disabled title="Añadir fila" id="add_row_c" style="cursor:pointer;font-size:13px;color:blue;background:white;<?=$display?>"><span  class="glyphicon glyphicon-plus-sign"></span></button>

<?php
}
?>



</th>
</tr>

<tr>
<td colspan='8' title="Borrar fila con casilla marcada" style="color:red;font-size:13px;display:none;cursor:pointer;background:white;text-align:right" id='delete_row'><span class="glyphicon glyphicon-minus-sign"></span></td><td colspan="8"></td>
</tr>
</tfoot>
<tbody>
<tr id='addr1' class="calculation visible change-red">

<td style="width:180px;display:block">
<?php if($identificar=="privado") {?>
<select class="service form-control select2 option-select1" id="consultTafFromWebservice" onChange="getSegName(this);">
<option value="" ></option>
<?php foreach($serv as $s){?>
<option  value="<?=$s->id_tarif?>"><?=$s->procedimiento?></option>
<?php
}
?>
</select>

<?php
} else {
?>
<span  id="hideTarifCentro">
<select class="service form-control change-red select2 select-option-centro1"  onChange="getSegNameCentro(this);">
<option value="" >Entrar procedimiento</option>
<?php foreach($serv_centro as $s){?>
<option  value="<?=$s->id_c_taf?>"><?=$s->sub_groupo?></option>
<?php
}
?>
</select>
</span>
<span style="display:none" id="showLoadSimon">
<select class=" form-control select2 select-simon1" id="loadSimon" onChange="getSeguroCodSimon(this);" >
</select>
</span>
<?php
}
?>

</td>
<td class="cantidad">
<input type="text" class="cantidad form-control " value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float " type="text"  tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="row-total form-control " value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-seg form-control " id="webSerPrecio" value="0.00"  />
</div>
</td>
<td class="descuento">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input style='color:red' type="text" class="descuento form-control float"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td class="total-pag-pa">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-pa form-control" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>

<tr id='addr2' class="calculation visible">
</tbody>
</table>
<div id="required_fac" style="color:red"></div>
</div>
<div class="loadf"></div> 
</div>

<div class="col-sm-12 showdown3 searchb" >
<br/>

<div class="col-sm-9" >
<input id="total-pagar-paciente" type="hidden"> <input type="hidden" id="descuento1">   <input type="hidden" id="total-pago-seguro">    <input id="sub-total" type="hidden">  
<textarea class="form-control" rows="10" placeholder="Comentario" id="comment" ></textarea>
<br/>
</div>
<div class="col-sm-3">
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success" <?=$disabled?>><i class="fa fa-save"></i> Guardar</button>

</div>


</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
 <script>

const credenVals= {
docCedula: "<?=$cedulaFormat;?>",
 docPassword: "<?=$password;?>",
 proveedo: "<?=$cod;?>",
 patientNss: "<?=$patientNss?>"

}
	$("#pdss").on('click', function (e) {
	if ($(this).is(":checked")) {
	$("#hideTarifCentro").hide();
	$("#showLoadSimon").show();
	$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/loadSimon');?>",
	data:{},
	success: function(data){
	$("#loadSimon").html(data);
	$(".loadf").html("");
	},

	});
	}else{
	$("#hideTarifCentro").show();
	$("#showLoadSimon").hide();			
	}
	});
 
 
 /*$("#loadSimon").on('change', function (e) {
  $("#consultar_nap").prop("disabled",false);
  
  var credentials = JSON.stringify(credenVals);
  $.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('webservice_consult/get_simon_tarif');?>",
data:{codigo_simon: $(this).val(), credentials: credentials},
success: function(result){

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showError').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});*/
  
  
  
  
 function getSeguroCodSimon(dropDown) {

$("#consultar_nap").prop("disabled",false);
  var credentials = JSON.stringify(credenVals);
 $('#showError').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
  $.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('webservice_consult/checkIfSimonAuth');?>",
data:{codigo_simon: dropDown.value, credentials: credentials, wsl_centro: "<?=$wslCentro?>"},
success: function(result){
if(result.message=="AUTORIZACION NO PROCEDE ==> Este procedimiento no está parametrizado"){
$('#showError').html('<p class="alert alert-danger ">'+result.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
}else{
$("#add_row_c").prop('disabled',false);	
addRowSimon();
$("#pdss").prop("disabled", true);
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);
$('#showError').html('<p class="alert alert-success">'+result.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
}
},
 error: function() {
$('#showError').html('<p class="alert alert-danger ">El procedimiento ha excedido su limite de: 2 coberturas por semana.</p>').fadeIn('slow').delay(4000).fadeOut('slow');

},
});
} 
  
  
  function addRowSimon() {
$("#add_row_c").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:180px;display:block'><select class='service form-control select2 select-simon2' onChange='getSeguroCodSimon(this);'></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "'  /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".select-simon1 > option").clone();
    $('.select-simon2').append($options);
$(".select2").select2();
$('#turf tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
$('#delete_row').slideDown();
}

 
 
 $("#consultar_nap").on('click', function (e) {
	e.preventDefault();
	$('#nap_state').val(1);
   getNap(credenVals); 
	 });


 $("#cancel_nap").on('click', function (e) {
 var nap= $("#numauto").val();
var	motivoAnulacion = $("#MotivoAnulacion").val();
	if(nap !="" && motivoAnulacion !=""){
	$('#nap_state').val(0);
	$("#cancel_nap").prop("disabled", true);
	$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('webservice_consult/cancel_nap');?>",
data:{nap: nap, MotivoAnulacion:motivoAnulacion},
success: function(result){
$("#cancel_nap").hide();
  var $newOption = $("<option selected='selected'></option>").val(2036).text("CONSULTA MEDICINA ESPECIALIZADA");
$("#consultTafFromWebservice").append($newOption).trigger('change');

$(".loadf").html('<p class="alert alert-success ">'+result+'</p>').fadeIn('slow').delay(6000).fadeOut('slow');
 $("#consultar_nap").prop("disabled", false);
  $("#consultar_nap").show();
 $("#MotivoAnulacion").hide();
 $("#add_row").show();
  $("#autopor").val("");
   $("#numauto").val(""); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showError').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}else{
$(".loadf").html('<p class="alert alert-warning">nesecitamos el Nap y el motivo de anulación par proceder.</p>').fadeIn('slow').delay(4000).fadeOut('slow');	
}
});


 function getNap(credenVals){
	 var credentials = JSON.stringify(credenVals);
$("#consultar_nap").prop("disabled", true);
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
 dataType: 'json',
url: "<?=base_url('webservice_consult/getNap')?>",
 data: {credentials:credentials},
success:function(nap){

$("#numauto").val(nap);
 $("#autopor").val("webservice");

  var $newOption = $("<option selected='selected'></option>").val(2036).text("CONSULTA MEDICINA ESPECIALIZADA");
$("#consultTafFromWebservice").append($newOption).trigger('change');
 $("#consultar_nap").hide();
 $("#cancel_nap").prop("disabled", false);
  $("#cancel_nap").show();
  $("#MotivoAnulacion").show();
$(".loadf").fadeIn().html('');
$("#add_row").hide();
},
 error: function() {
 $(".wait1").text('No autorización:').css('font-style','');
  $(".wait2").text('Autorizado por:').css('font-style','');
$('.loadf').html('<p class="alert alert-danger ">Nap inválido o agotado.</p>');
$("#add_row").show();
},
});		
}


function getSegName(dropDown) {
var nap_state =$('#nap_state').val();
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var doctorid ="<?=$id_doc?>";
$.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('webservice_consult/get_service_precio');?>",
data:{id_mssm1:dropDown.value, nap:$("#numauto").val(), nap_state:nap_state},
success: function(result){
if(result.nap_state = 1){
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.precio);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);
}else{
($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);	
}


recalc();
$(".loadf").hide();
$("#add_row").prop('disabled',false);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showError').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

}




 $("#fecha-fac").datepicker({
    dateFormat: 'dd-mm-yy',
	maxDate: "-1d"

  });
  
  
$("#check-if-is-as-medico").click(function(){
	var perfil="<?=$perfil?>";	
	if(perfil == "Asistente Medico" ){
   alert('Solamento el doctor puede crear tarifarios ?'); 
   return false;
  }	

});
 
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};



function getSegNameCentro(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: "<?php echo site_url('factura/get_service_precio_centro');?>",
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
$(".loadf").hide();
$("#add_row_c").prop('disabled',false);
}
});

}
//=====================================================================
var numRows = 2, ti = 5;

function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}

function recalc() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#turf").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
//wt += isNumber(p) ? parseInt(p, 10) : 0;
//lt += isNumber(c) ? parseInt(c, 10) : 0;
tt += isNumber(dateTotal) ? dateTotal : 0;
ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
}); //END .each
//$("#cantidad-grand-total").html(lt.toFixed(2));
//$("#precio-grand-total").html(wt.toFixed(2));
$("#table-grand-total").html(tt.format(2));
$("#sub-total").val(tt);
$("#seguro-grand-total").html(ss.format(2)); 
$("#total-pago-seguro").val(ss);  
$("#descuento-grand-total").html(dd.format(2));
$("#descuento1").val(dd);  
$("#tot-paciente-grand-total").html(pp.format(2)); 
$("#total-pagar-paciente").val(pp); 
}

function addRow() {
$("#add_row").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:180px;display:block'><select class='service form-control select2 option-select2' onChange='getSegName(this);'></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "'  /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".option-select1 > option").clone();
    $('.option-select2').append($options);
	$(".select2").select2();
$('#turf tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
$('#delete_row').slideDown();
}





function addRowC() {
$("#add_row_c").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:180px;display:block'><select class='service form-control select2 select-option-centro2' onChange='getSegNameCentro(this);'></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "'  /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".select-option-centro1 > option").clone();
    $('.select-option-centro2').append($options);
$(".select2").select2();
$('#turf tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
$('#delete_row').slideDown();
}

function delRow() { 
$('input[name="chkbox"]').each(function(){
if($(this).is(":checked")){
$(this).parents("tr").remove();
}
});

var val=$('input[name="chkbox"]').length;
if(val < 1)
{
$("#delete_row").slideUp();

}

if(val == 0){
$("#pdss").prop("disabled", false);
}
};



$(function () {
$("#turf").on("click", ".calculation", recalc);
$("#turf").on("keyup blur", ".form-control", recalc);
$("#add_row").on("click",function() {addRow()});
$("#add_row_c").on("click",function() {addRowC()});
$("#delete_row").on("click",function() {delRow(), recalc()});
});

//========================================================================
function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;

if (event.keyCode == 8 || event.keyCode == 46
 || event.keyCode == 37 || event.keyCode == 39) {
    return true;
}
else if ( key < 48 || key > 57 ) {
    return false;
}
else return true;
};

function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };
	
	
//===============save_factura==============================
$('#save_factura').on('click', function(event) {
var cant = $('input.cantidad').val();
var prec = $('input.precio').val();
var numauto = $('#numauto').val();
var autopor = $('#autopor').val();
var servField = $('.service').val();
/*if(numauto == "" || autopor == "" || cant == "" || prec == "" )
{
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");
}
else
{*/
var patient_id = "<?=$id_p_a?>";
var area = "<?=$area ?>";
var id_apoint = "<?=$id_apoint ?>";
var medico = "<?=$id_doc ?>";
var centro_medico = "<?=$id_cm?>";
var seguro_medico = "<?=$id_seguro;?>";
var codigoprestado = "<?=$cod?>";
var fecha = $('#fecha-fac').val();
var inserted_by = "<?=$name?>";
var is_admin = "<?=$is_admin?>";
var tsubtotal = $('#sub-total').val();
var totpagseg = $('#total-pago-seguro').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var comment = $('#comment').val();
var identificar="<?=$identificar?>";
var service = [];
var cantidad = [];
var precio = [];
var total = [];
var totalpaseg = [];
var descuento = [];
var totpapat = [];

$('.service').each(function(){
service.push($(this).val());
});
$('input.cantidad').each(function(){
cantidad.push($(this).val());
});
$('input.precio').each(function(){
precio.push($(this).val());
});
$('input.row-total').each(function(){
total.push($(this).val());	
});

$('input.total-pag-seg').each(function(){
totalpaseg.push($(this).val());	
});

$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});


$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('factura/SaveBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,
seguro_medico:seguro_medico,patient_id:patient_id,medico:medico,codigoprestado:codigoprestado,fecha:fecha,id_apoint:id_apoint,is_admin:is_admin,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,area:area,centro_medico:centro_medico,cant:cant,prec:prec,servField:servField},
cache: true,
success:function(response){
if(response.status == 1){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else if(response.status == 2){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>');
}else if(response.status == 3){
	
$('#required_fac').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");	
$(".loadf").fadeIn().html('');	
}else{
var idfacc = response.status;	
window.location.href = "<?php echo site_url('redirect_fact/billing_process');?>/" + idfacc + "/" +identificar + "/" +is_admin;

}
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.loadf').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});

return false;
});



$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});	

	

</script>