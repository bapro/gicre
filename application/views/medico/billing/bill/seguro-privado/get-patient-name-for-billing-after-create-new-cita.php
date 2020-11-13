<style>
.heading{text-align:left}

</style>
<?php 
if($is_admin=="yes"){$cont="admin";}else{$cont="medico";}

if($identificar=="privado") {$tarif="Doctor Tarifarios ";} else{$tarif="Centro Tarifarios";}
   ?>
 <div class="col-sm-12 showdown3 searchb" >
<br/>
 <form class="form-inline">
<div class="form-group"> 
      <label>Fecha </label>
      <input  class="form-control change-red" id='fecha-edit' value="<?=date("d-m-Y");?>" style="width:130px"   >
	  <br/><br/>
    </div>
	</form>
	<!--<a class="btn btn-sm btn-primary" style="float:right" id='view-fac-after-save'  href="<?php echo base_url("admin_medico/billing_print_view1/$idfacc/$is_admin")?>" ><i class="fa fa-eye"></i>Ver Factura </a>-->
</div>
<div class="row showdown3 searchb" >

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
	//echo "<span style='color:#B18904'>No hay servicios | <a id='check-if-is-as-medico' href='".base_url()."/admin_medico/import_rates_fac/$id_doc/$id_seguro/medico'>Crear</a></span>";
	
		echo "<span style='color:#B18904'><form method='post' action='".base_url()."admin_medico/import_rates_fac'>
	<input type='hidden' name='id_doc' value='$id_doc'/>
	<input type='hidden' name='id_seguro' value='$id_seguro'/>
	<input type='hidden' name='plan' value='$planOcentro'/>
	<input type='hidden' name='name' value='$name'/>
	<input type='submit' value='No hay tarifarios crear'/></form></span>";
	$disabled="disabled";$display="none";
	
	
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
<td colspan='7' title="Borrar fila con casilla marcada" style="color:red;font-size:13px;display:none;cursor:pointer;background:white;text-align:right" id='delete_row'><span class="glyphicon glyphicon-minus-sign"></span></td><td colspan="8"></td>
</tr>
</tfoot>
<tbody>
<tr id='addr1' class="calculation visible change-red">
<td style="width:180px;display:block">
<?php if($identificar=="privado") {?>
<select class="service form-control select2 option-seguro1"  onChange="getSegName(this);">
<option value="" hidden></option>
<?php foreach($serv as $s){?>
<option  value="<?=$s->id_tarif?>"><?=$s->procedimiento?></option>
<?php
}
?>
</select>

<?php
} else {
?>

<select class="service form-control change-red select2 option-centro1" onChange="getSegNameCentro(this);">
<option value="" hidden></option>
<?php foreach($serv_centro as $s){?>
<option  value="<?=$s->id_c_taf?>"><?=$s->sub_groupo?> - (<?=$s->groupo?>)</option>
<?php
}
?>
</select>

<?php
}
?>

</td>
<td class="cantidad">
<input type="text" class="cantidad form-control" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float" type="text" readonly tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="row-total form-control" value="0.00" readonly />
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
</div>

<div class="row showdown3 searchb" >
<br/>
<div style="overflow-x:auto">
<div class="col-sm-9" >
<input id="total-pagar-paciente" type="hidden"> <input type="hidden" id="descuento1">   <input type="hidden" id="total-pago-seguro">    <input id="sub-total" type="hidden">  
<textarea class="form-control" rows="10" placeholder="Comentario" id="comment" ></textarea>
<br/>
</div>
<div class="col-sm-3">
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success" <?=$disabled?>><i class="fa fa-save"></i> Guardar</button>
</div>
</div>
</div>
<div class="loadf"></div>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
 <script>
 $("#fecha-edit").datepicker({
    dateFormat: 'dd-mm-yy',
	maxDate: "-1d",
	   beforeShow: function() {
        setTimeout(function(){
            $('.ui-datepicker').css('z-index', 99999999999999);
        }, 0);
    }

  });
$("#check-if-is-as-medico").click(function(){
	var perfil="<?=$perfil?>";	
	if(perfil == "Asistente Medico" ){
   alert('Solamente el doctor puede crear tarifarios ?'); 
   return false;
  }	

});
 
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function getSegName(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var doctorid ="<?=$id_doc ?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio');?>',
data:{id_mssm1:dropDown.value,doctorid:doctorid,id_centro:<?=$id_cm?>},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio').val(data);
recalc();
$(".loadf").hide();
$("#add_row").prop("disabled",false);
}
});

}

function getSegNameCentro(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio_centro');?>',
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio').val(data);
recalc();
$(".loadf").hide();
$("#add_row_c").prop("disabled",false);
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
var d = $(this).find('input.descuento').val();
var result1 = dateTotal;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
//wt += isNumber(p) ? parseInt(p, 10) : 0;
//lt += isNumber(c) ? parseInt(c, 10) : 0;
tt += isNumber(dateTotal) ? dateTotal : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
}); //END .each
//$("#cantidad-grand-total").html(lt.toFixed(2));
//$("#precio-grand-total").html(wt.toFixed(2));
$("#table-grand-total").html(tt.format(2));
$("#sub-total").val(tt);
;  
$("#descuento-grand-total").html(dd.format(2));
$("#descuento1").val(dd);  
$("#tot-paciente-grand-total").html(pp.format(2)); 
$("#total-pagar-paciente").val(pp); 
}

function addRow() {
$("#add_row").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:180px;display:block'><select class='service form-control select2 option-seguro2' onChange='getSegName(this);'></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".option-seguro1 > option").clone();
 $('.option-seguro2').append($options);
$(".select2").select2();
$('#turf tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
$('#delete_row').slideDown();
}


function addRowC() {
$("#add_row_c").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:180px;display:block'><select class='service form-control select2 option-centro2' onChange='getSegNameCentro(this);'></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".option-centro1 > option").clone();
 $('.option-centro2').append($options);
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
};



$(function () {
$("#turf").on("click", ".calculation", recalc);
$("#turf").on("keyup blur", ".form-control", recalc);
//$("#turf").on("keyup", ".cantidad:last", function () {
//if (!$(this).data("done")) { // only do this once per field
//$(this).data("done", true);
//addRow();
//}
//});
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
if(numauto == "" || autopor == "" || cant == "" || prec == "" )
{
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");
}
else
{
var patient_id = "<?=$id_p_a?>";
var area = "<?=$area ?>";
var id_apoint = "<?=$id_apoint ?>";
var medico = "<?=$id_doc ?>";
var centro_medico = "<?=$id_cm?>";
var seguro_medico = "<?=$id_seguro;?>";
var codigoprestado = "<?=$cod?>";
var fecha = $('#fecha-edit').val();
var inserted_by = "<?=$name?>";
var is_admin = "<?=$is_admin?>";
var tsubtotal = $('#sub-total').val();
var totpagseg = "";
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var comment = $('#comment').val();
var identificar="centro";
var service = [];
var cantidad = [];
var precio = [];
var total = [];
var totalpaseg = "";
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


$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});

$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,
seguro_medico:seguro_medico,patient_id:patient_id,medico:medico,codigoprestado:codigoprestado,fecha:fecha,id_apoint:id_apoint,is_admin:is_admin,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,area:area,centro_medico:centro_medico},
cache: true,
success:function(data){
window.location.href="<?php echo base_url(); ?><?=$cont?>/editPrivateBill?is_admin="+is_admin+"&inserted_by="+inserted_by;
//window.location.href="<?php echo base_url(); ?>/admin_medico/billing_print_view_privado?identificar="+identificar+"&idfacc="+idfacc+"&medico="+medico;
//window.location.href="<?php echo base_url(); ?><?=$cont?>/editPrivateBill";

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
}
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