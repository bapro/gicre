<?php

$this->padron_database = $this->load->database('padron',TRUE);

?>
</script>
<style>
table, th, td {
   font-size:14px
}
.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
/*.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #38a7bb; 
}*/

.trback th{background:#A9E4EF}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}

.not-pointer{pointer-events:none;}
.notme input[type="text"] {
background:#EEECEC
}
</style>
<div class="col-sm-12 tab-content showdown searchb">
<h3 class="h3" align="center">DATOS DEL PACIENTE</h3> 

<?php
foreach($patient_data as $row)

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');

echo '<img class="img-responsive" style="float:left; width:130px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($row->photo==""){
	
}
else{
	?>
<img  class="img-responsive" style="float:left; width:130px;"  class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
<div style="overflow-x:auto">
<table class="table" style="font-size:14px" >
<tr  class="trback">
<th>Record</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Seguro Medico</th>
<th>No. Afiliado</th>
<th>Tipo Afiliado</th>
<th>Tel.</th>
<th>Direccion</th>
<th>Email</th>
</tr>
<?php
$cpt="";

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}

$seguro_ingo=$this->db->select('input_name,inputf')->where('patient_id',$row->id_p_a )
 ->get('saveinput')->row_array();
 
 $seguro_name=$this->db->select('id_sm, title, rnc')->where('id_sm',$row->seguro_medico )
 ->get('seguro_medico')->row_array();
?>

<tr>
<td><?=$row->nec1 ?><input id="patient_id" type="hidden" value="<?=$row->id_p_a;?>"/></td>
<td id="paciente" style="text-transform:uppercase"><?=$row->nombre;?></td>
<td id="cedula"><?=$row->cedula;?></td>
<td><input id="seguro_medico" type="hidden" value="<?=$seguro_name['id_sm'];?> "/> <?=$seguro_name['title'];?>  <input type="hidden" id="rnc" value="<?=$seguro_name['rnc'];?>"/></td>
<td id="num_af"><?php echo $seguro_ingo['input_name'];?></td>
<td id="tipoaf"><?php echo $row->afiliado;?></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>

</tr>

</table>
</div>
</div>
<div class="col-sm-12 tab-content showdown1 searchb" >
<?php

//-----------------centro medico-------------------------------
foreach($rdv_data as $doc)

$doctor=$this->db->select('id_user, name')->where('id_user',$doc->doctor )
->get('users')->row_array();

$area=$this->db->select('*')->where('id_ar',$doc->area )
->get('areas')->row_array();

$exequatur=$this->db->select('exequatur')->where('first_name',$doc->doctor )
->get('doctors')->row('exequatur');


$centro=$this->db->select('name,rnc')->where('id_m_c',$doc->centro)
->get('medical_centers')->row_array();
//----------------------------------------------------------------------------
$cod=$this->db->select('codigo')->where('id_centro',$doc->centro)
->get('codigo_contrato')->row('codigo');
?>
<div style="overflow-x:auto">

<h3 class="h3" align="center">DATOS DEL PRESTADOR</h3> 
<br/>
<form  class="form-horizontal"> 
<div class="col-sm-6 notme">

<div class="form-group">
<label class="control-label col-sm-4"> Centro Medico </label>
<div class="col-sm-8">
<?=$centro['name']?>
<input id="centro_medico" value="<?=$doc->centro?>" type="hidden" />
<br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> CIE10 </label>
<div class="col-sm-9">
<ol>

<?php 

foreach($show_diagno_pat as $cie)
{

echo "<li>" . $cie->code . " $cie->description </li>";	
}	
?>

</ol>

</div>
</div>


</div>

<div class="col-sm-6">

<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador </label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"> Procedimiento </label>
<div class="col-sm-9">
<ol>

<?php 

foreach($show_diagno_pro_pat as $pro)
{

echo "<li>$pro->code $pro->name </li>";	
}	
?>

</ol>
</div>
</div>
 
</div>
</form>
</div>
</div>
<div class="col-md-12 searchb ">
<br/>
 <form class="form-inline">
 <?php 
 $fecha=date("Y-m-d");
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$createddate = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($fecha)));
$createddate = date("d-m-Y", strtotime($fecha));
   ?>
   <div class="form-group">
      <label>Fecha:</label>
      <input  class="form-control"  value="<?=$createddate?>" readonly>
    </div>
    <div class="form-group">
      <label>No Autorizacion:</label>
     <input  type="text" id="numauto" class="form-control change-red"/>
    </div>
    <div class="form-group">
      <label>Autorizado por:</label>
     <input  type="text" id="autopor" class="form-control change-red"/>
    </div>
  </form><br/>
 </div>
<div class="col-sm-12 showdown3 searchb" >
 <?php if(empty($serv_centro)) {
$display="style='display:none'";
}
else {$display="";}
?>
<h2 class="h2" align="center">FACTURA</h2>
<div style="overflow-x:auto">
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf">
<thead>
<tr class="trback">
<td class="heading" title="Añadir fila" id="add_row" style="cursor:pointer;font-size:13px;color:blue;background:white"><span <?=$display?>  class="glyphicon glyphicon-plus-sign"></span></td>
<th class="heading">
<?php if(empty($serv_centro)) {
	echo "<span style='color:#B18904'>No hay servicios | <a  href='".base_url()."/admin/import_rates_fac_centro/$doc->centro/centro'>Crear</a></span>";
	$disabled="disabled";$display="none";
} else {
?>
Servicio
<?php
$disabled="";
}
?>
</th>
<th class="heading">Cantidad</th>
<th class="heading">Precio Unitario</th>
<th class="heading">Sub-Total</th>
<th class="heading">Total Pagar Seguro</th>
<th class="heading">Descuento</th>
<th class="heading">Total Pagar Paciente</th>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th style="background:white"></th>
<th  colspan="3">TOTALES</th>
<!--<th id="cantidad-grand-total">0.00</th>
<th id="precio-grand-total">0.00</th>-->
<th>RD$ <span id="table-grand-total" >0.00</span></th>
<th>RD$ <span id="seguro-grand-total">0.00</span></th>
<th style='color:red'>RD$ <span id="descuento-grand-total">0.00</span></th>
<th>RD$ <span id="tot-paciente-grand-total">0.00</span></th>
</tr>

<tr>
<td title="Borrar fila con casilla marcada" style="color:red;font-size:13px;display:none;cursor:pointer;background:white" id='delete_row'><span class="glyphicon glyphicon-minus-sign"></span></td><td colspan="8"></td>
</tr>
</tfoot>
<tbody>
<tr id='addr1' class="calculation visible">
<td></td>
<td style="width:180px;display:block">

<select class="service form-control change-red select2" onChange="getSegName(this);">
<option value="" hidden></option>
<?php foreach($serv_centro as $s){?>
<option  value="<?=$s->id_c_taf?>"><?=$s->sub_groupo?></option>
<?php
}
?>
</select>
</td>
<td class="cantidad">
<input type="text" class="cantidad form-control change-red"  tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float change-red" type="text"  tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="row-total form-control change-red" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-seg form-control change-red"  tabindex="3" readonly />
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
<input type="text" class="total-pag-pa form-control change-red" value="0.00" tabindex="5" readonly />
</div>
</td>
</tr>

<tr id='addr2' class="calculation visible">
</tbody>
</table>
<div id="required_fac" style="color:red"></div>
</div>
</div>

<div class="col-sm-12 showdown3 searchb" >
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
</div>
 <?php
        $this->load->view('footer');
 ?>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script>
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function getSegName(dropDown) {
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio_centro');?>',
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
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
//$("#turf").on("keyup", ".cantidad:last", function () {
//if (!$(this).data("done")) { // only do this once per field
//$(this).data("done", true);
//addRow();
//}
//});
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
$(".change-red").css("border-color", "");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "");

//var diagnostic = $("input[name=cie]").val();
//var procedimiento = $("input[name=procedimiento]").val();
var patient_id = $("#patient_id").val();
var area = "<?=$doc->area ?>";
var exequatur = "<?=$centro['rnc']?>";
var id_apoint = "<?=$id_apoint ?>";
var tsubtotal = $('#sub-total').val();
var totpagseg = $('#total-pago-seguro').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var codigoprestado = "<?=$cod?>";
var fecha = "<?=$createddate?>";
var centro_medico = "<?=$doc->centro?>";
var seguro_medico = "<?=$seguro_name['id_sm'];?>";
var identificar="centro";
var rnc = $('#rnc').val();
var medico = "<?=$doc->doctor?>";
var num_af = $('#num_af').text();
//var tipoaf = $('#tipoaf').text();
var comment = $('#comment').val();
//var email = $('#email').text();
var inserted_by = "<?=$name?>";
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
url: "<?=base_url('admin_medico/SaveBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,centro_medico:centro_medico,num_af:num_af,
tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,patient_id:patient_id,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,seguro_medico:seguro_medico,
codigoprestado:codigoprestado,fecha:fecha,area:area,exequatur:exequatur,id_apoint:id_apoint,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,rnc:rnc,medico:medico},
cache: true,
success:function(data){ 
window.location.href="<?php echo base_url(); ?>/admin/billing_print_view";

//$( "html" ).load( "<?php echo base_url('admin/showBilling'); ?>" ); 

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