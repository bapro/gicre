<script>
//=====================================================================
 //format total 
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

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

$('#addr' + numRows).html("<td><input type='checkbox' name='chkbox' class='remove'></td><td style='width:180px;display:block'><select class='service form-control' onChange='getSegName(this);'><option value='' hidden></option><?php foreach($serv_centro as $s){?><option  value='<?=$s->id_c_taf?>'><?=$s->sub_groupo?></option><?php }?></select></td><td class='cantidad'><input name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "' readonly /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td>");

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
$("#add_row").on("click",function() {addRow()});
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
	
	
$('.select2').select2({ 
//tags: true,   
language: {

noResults: function() {

return "No hay resultado";        
},

}
});	

</script>