<?php 
$this->padron_database = $this->load->database('padron',TRUE);
?>

<style>

.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}
td{text-align:left}
</style>
</head>
<!-- *** welcome message modal box *** -->


<body >

<div class="container">

<?php
$cpt="";
foreach($billings2 as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$insertt = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));
//$updatet = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->update_date)));
$insertt = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updatet = date("d-m-Y H:i:s", strtotime($row->update_date));
 $paciente=$this->db->select('nombre,cedula,afiliado,email,tel_cel,photo,id_p_a,ced1,ced2,ced3')->where('id_p_a',$row->paciente)->get('patients_appointments')->row_array();
 $seguro=$this->db->select('title,logo')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row_array();
$doctor=$this->db->select('name,id_user')->where('id_user',$row->medico )
->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
$exequatur=$this->db->select('exequatur')->where('first_name',$row->medico )
->get('doctors')->row('exequatur');


?>
<div class="row">
<div class="col-md-10">
<h2 class="h2" align="center">FACTURA # <span id="idfacc"><?=$row->idfacc?></span> </h2>
</div>
<div class="col-md-2">
<a href="<?php echo base_url("admin/billing_medicos")?>" class="btn btn-primary btn-xs st"  title="Nueva Factura"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva Factura</a>
</div>
</div>


</div>

<div class="col-sm-12 tab-content showdown searchb">
<div style="overflow-x:auto">
<table class="table" style="font-size:14px" >
<tr style="background:#A9E4EF;">
<th>Foto </th>
<th>Nombres</th>
<th>Cedula</th>
<th>Seguro Medico</th>
<th>No. Afiliado</th>
<th>Tipo Afiliado</th>
<th>Tel.</th>
<th>Direccion</th>
<th>Email</th>

</tr>


<tr>
<td>
<?php


if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="140"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="140" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>

</td>

<td id="paciente" style="text-transform:uppercase"><?=$paciente['nombre'];?></td>
<td id="cedula"><?=$paciente['cedula'];?></td>
<td id="seguro_medico"><?=$seguro['title'];?></td>
<td id="num_af"><?php echo $row->num_af;?></td>
<td id="tipoaf"><?php echo $paciente['afiliado'];?></td>
<td id="tel"><?=$paciente['tel_cel']?></td>
<td></td>
<td id="email"><?=$paciente['email']?></td>
</tr>

</table>
</div>
</div>
<div class="col-sm-12 tab-content showdown1 searchb" >
<div class="col-sm-6">
<h4 class="h4" >DATOS DEL MEDICO</h4> 
<br/>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Medico :</label>
<div class="col-sm-8">
<?=$doctor['name']?>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Exequatur :</label>
<div class="col-sm-8">

<?=$exequatur?>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Especialidad :</label>
<div class="col-sm-8">
<?=$area?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Centro Medico :</label>
<div class="col-sm-8">
<?=$centro?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-8">

<?=$row->codigoprestado?>
</div>
</div>

</form>
</div>
<div class="col-sm-6">
<h4 class="h4" >ENFERMEDAD(ES) DEL PACIENTE</h4> 
<br/>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-5"> CIE10 :</label>
<div class="col-sm-7" style="font-size:15px">
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
<div class="form-group">
<label class="control-label col-sm-5"> PROCEDIMIENTO :</label>
<div class="col-sm-7" style="font-size:15px">
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
</form>
</div>
</div>

<div class="col-sm-12 showdown3 searchb" >

<h2 class="h2" align="center">FACTURA</h2>
<br/>
 <form class="form-inline">
 <div class="form-group">
      <label>Fecha:</label>
      <input  class="form-control"  value="<?=$row->fecha?>" readonly>
    </div>
    <div class="form-group">
      <label>No Autorizacion:</label>
     <input  type="text" value="<?=$row->numauto?>" id="numauto" class="form-control change-red"/>
    </div>
    <div class="form-group">
      <label>Autorizado por:</label>
     <input  type="text" id="autopor" value="<?=$row->autopor?>" class="form-control change-red"/>
    </div>
  </form><br/>
  </div>
   <div class="col-sm-12 showdown3 searchb" >
<div style="overflow-x:auto">
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf">
<thead>
<tr class="trback">
<td class="heading" title="Añadir fila" id="add_row" style="cursor:pointer;font-size:13px;color:blue;background:white"><span class="glyphicon glyphicon-plus-sign"></span></td>
<th class="heading">Servicio</th>
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
<?php
 foreach($billings as $rf){
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
 ?>
<tr id='addr1' class="calculation visible change-red">
<td></td>
<td style="width:180px;display:block">

<select class="service form-control select2" onChange="getSegName(this);">

<?php
foreach($EditProcedTarif as $s){
	
	if($service == $s->procedimiento) {
		echo "<option value=".$s->id_tarif." selected>".$s->procedimiento."</option>";
	} else {
		echo "<option value=".$s->id_tarif.">".$s->procedimiento."</option>";
	}
}
?>
</select>
</td>
<td class="cantidad">
<input type="text" class="cantidad form-control " value="<?=$rf->cantidad?>" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float" type="text" value="<?=$rf->preciouni?>" tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$ me</span>
<input type="text" class="row-total form-control sub-total"  value="<?=$rf->subtotal?>" readonly />
</div>
</td>
<td class="total-pag-seg">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-seg form-control total-pago-seguro"  value="<?=$rf->totalpaseg?>" tabindex="3" readonly />
</div>
</td>
<td class="descuento">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input style='color:red' type="text" class="descuento form-control float descuento1" value="<?=$rf->descuento?>" tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td class="total-pag-pa">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-pa form-control total-pagar-paciente"  value="<?=$rf->totpapat?>" tabindex="5" readonly />
</div>
</td>
</tr>
<?php
 }
 ?>
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
<input class="total-pagar-paciente" type="hidden"> <input type="hidden" class="descuento1">   <input type="hidden" class="total-pago-seguro">    <input class="sub-total" type="hidden">  
<label>Comentario</label>
<textarea class="form-control" rows="10" placeholder="Comentario" id="comment" ><?=$row->comment?></textarea>
<i>
Creado por <?=$row->inserted_by?> - Modificado por <?=$row->updated_by?><br/>
fecha de creacion  <?=$row->inserted_time?> - fecha de modificacion <?=$row->update_date?>
<br/><br/>
</i>
</div>
<div class="col-sm-3">
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>

</div>
</div>
</div>
<div class="loadf"></div>
</div>
<?php $this->load->view('footer'); 	?>
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>
 
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
 
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function getSegName(dropDown) {
var doctorid ="<?=$row->medico ?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/get_service_precio');?>',
data:{id_mssm1:dropDown.value,doctorid:doctorid},
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
$(".sub-total").val(tt);
$("#seguro-grand-total").html(ss.format(2)); 
$(".total-pago-seguro").val(ss);  
$("#descuento-grand-total").html(dd.format(2));
$(".descuento1").val(dd);  
$("#tot-paciente-grand-total").html(pp.format(2)); 
$(".total-pagar-paciente").val(pp); 
}

function addRow() {

$('#addr' + numRows).html("<td><input type='checkbox' name='chkbox' class='remove'></td><td <td style='width:180px;display:block'><select class='service form-control' onChange='getSegName(this);'><option value='' hidden></option><?php foreach($EditProcedTarif as $s){?><option  value='<?=$s->id_tarif?>'><?=$s->procedimiento?></option><?php }?></select></td><td class='cantidad'><input name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group'><span class='input-group-addon'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "' readonly /></div></td><td class='descuento'><div class='input-group'><span class='input-group-addon'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group'><span class='input-group-addon'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td>");

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

var tsubtotal = $('.sub-total').val();
var totpagseg = $('.total-pago-seguro').val();
var totsubdesc = $('.descuento1').val();
var totpagpa = $('.total-pagar-paciente').val();

var comment = $('#comment').val();
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
var idfacc="<?=$row->idfacc?>";

var identificar="doctor";
$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin/updateBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,
tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,idfacc:idfacc,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by},
cache: true,
success:function(data){ 

window.location.href="<?php echo base_url(); ?>/admin/billing_print_view2?identificar="+identificar+"&idfacc="+idfacc;


//$( "html" ).load( "<?php echo base_url('admin/showBilling'); ?>" ); 

}  
});
}
return false;
});
</script>
</body>



</html>
