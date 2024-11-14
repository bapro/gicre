<div id="my-errros" class='hide-up-f' style="float:right"><button  class="btn btn-sm" type="button" id="cancel_edit_fac" >Cancelar</div>
<table class="table hide-up-f" id="turf" style='border-bottom:1px solid #38a7bb'>
<tr style="background:#38a7bb;color:white">
<th >Servicio</th>
<th >Cantidad</th>
<th >Precio Unitario</th>
<th >Sub-Total</th>
<th >Total Pagar Seguro</th>
<th >Descuento</th>
<th >Total Pagar Paciente</th>
<th ></th>
</tr>

<tr id='addr1' class="calculation visible change-red">
<?php
 foreach($billings as $rf)
?>
<td >
<?php if($identificar=="privado") { 
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
?>

<select class="service form-control select2" onChange="getSegNamePrivado(this);">

<?php
foreach($serv as $s){
	
	if($service == $s->procedimiento) {
		echo "<option value=".$s->id_tarif." selected>".$s->procedimiento."</option>";
	} else {
		echo "<option value=".$s->id_tarif.">".$s->procedimiento."</option>";
	}
}
?>
</select>
<?php } else {
	$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
 ?>
<select class="service form-control select2" onChange="getSegName(this);">

<?php
foreach($edit_tarifario_centro as $s){
	
	if($service == $s->sub_groupo) {
		echo "<option value=".$s->id_c_taf." selected>".$s->sub_groupo."</option>";
	} else {
		echo "<option value=".$s->id_c_taf.">".$s->sub_groupo."</option>";
	}
}
?>
</select>
<?php } ?>
</td>
<td class="cantidad">
<input type="text" class="cantidad form-control " value="<?=$rf->cantidad?>" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<input class="precio form-control float" type="text" value="<?=$rf->preciouni?>" tabindex="2" onkeypress='return onlyfloat(event);' />

</td>
<td class="row-total">
<input type="text" class="row-total form-control sub-total"  value="<?=$rf->subtotal?>" readonly />

</td>
<td class="total-pag-seg">
<input type="text" class="total-pag-seg form-control total-pago-seguro"  value="<?=$rf->totalpaseg?>" tabindex="3" readonly />

</td>
<td class="descuento">
<input style='color:red' type="text" class="descuento form-control float descuento1" value="<?=$rf->descuento?>" tabindex="4" onkeypress='return onlyfloat(event);'/>

</td>
<td class="total-pag-pa">
<input type="text" class="total-pag-pa form-control total-pagar-paciente"  value="<?=$rf->totpapat?>" tabindex="5" readonly />

</td>

<td>

<button class="btn btn-sm btn-success" type="button" id="button_save_tarifarios" ><i class="fa fa-save"></i>Cambiar</button>

</td>

</tr>

</table>

<div id="required_fac" style="color:red"></div>
<?php

$centro=$this->db->select('name')->where('id_m_c',$centro_in_fac)->get('medical_centers')->row('name');
?>
 <script>
 
 $('#cancel_edit_fac').on('click', function(event) {
 factura_table_view();
 $('.hide-up-f').hide();
 })
 //====================================================================
$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	

function getSegName(dropDown) {
var centro_id ="<?=$centro?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('factura/get_service_precio_centro');?>',
data:{id_mssm1:dropDown.value,centro_id:centro_id},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
}
});

}


function getSegNamePrivado(dropDown) {

$.ajax({
type: "POST",
url: '<?php echo site_url('factura/get_service_precio');?>',
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
}
});

}








function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}

 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};




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
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
tt += isNumber(dateTotal) ? dateTotal : 0;
ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
});
$("#table-grand-total").html(tt.format(2));
$(".sub-total").val(tt);
$("#seguro-grand-total").html(ss.format(2)); 
$(".total-pago-seguro").val(ss);  
$("#descuento-grand-total").html(dd.format(2));
$(".descuento1").val(dd);  
$("#tot-paciente-grand-total").html(pp.format(2)); 
$(".total-pagar-paciente").val(pp); 
}




$(function () {
$("#turf").on("click", ".calculation", recalc);
$("#turf").on("keyup blur", ".form-control", recalc);

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
	
	
	
	
//************************************************************************************************
//===============save_factura==============================
$('#button_save_tarifarios').on('click', function(event) {
var cant = $('input.cantidad').val();
var prec = $('input.precio').val();
var numauto = $('#numauto').val();
var autopor = $('#autopor').val();
if(cant == "" || prec == "" )
{
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");
} else{

var tsubtotal = $('.sub-total').val();
var totpagseg = $('.total-pago-seguro').val();
var totsubdesc = $('.descuento1').val();
var totpagpa = $('.total-pagar-paciente').val();

var updated_by = "<?=$user?>";

var service =$('.service').val();
var cantidad =$('input.cantidad').val();

var precio =$('input.precio').val();
var total =$('input.row-total').val();

var totalpaseg =$('input.total-pag-seg').val();

var descuento =$('input.descuento').val();

var totpapat =$('input.total-pag-pa').val();

var idfacc="<?=$idfacc?>";
var idfac="<?=$rf->idfac?>";
var is_admin="<?=$is_admin?>";

//var centro="<?=$centro_in_fac?>";
var action=2;
//$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('factura/updateBill1')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,
tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,idfacc:idfacc,
idfac:idfac,updated_by:updated_by,action:action},
cache: true,
success:function(data){ 
 $('.hide-up-f').html(data);
factura_table_view(); 

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#my-errros').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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