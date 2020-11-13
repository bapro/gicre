<div class="tab-content hideup" >
<?php
$name=($this->session->userdata['admin_name']);
 if(!empty($necpatient ))  
{ 

function rand_string( $length ) {

$chars = "0123456789";
return substr(str_shuffle($chars),0,$length);

}

?>
<style>

.loadf {
position: fixed; /* or absolute */
top: 50%;
left: 50%;
z-index:900000
}

span.load {
font-size:90px;
}
.glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg);}
    to { -webkit-transform: rotate(360deg);}
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg);}
    to { transform: scale(1) rotate(360deg);}
}
table, th, td {
   border: 1px solid #38a7bb
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
.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #38a7bb; 
}
</style>
<div style="overflow-x:auto">
<table class="table table-striped table-bordered" style="font-size:14px" >
<tr style="background:#38a7bb;color:white">
<td>Record</td>
<td>Nombres</td>
<td>Cedula</td>
<td>Seguro Medico</td>
<td>No. Afiliado</td>
<td>Tipo Afiliado</td>

</tr>
<?php
$cpt="";
foreach($necpatient as $row)
{
$fecha=date("Y-m-d");
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$createddate = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($fecha)));	
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
 
 $seguro_name=$this->db->select('id_sm, title')->where('id_sm',$row->seguro_medico )
 ->get('seguro_medico')->row_array();
?>

<tr>
<td><?=$row->nec ?> </td>
<td id="paciente" style="text-transform:uppercase"><a id="godown" onclick="godown()" href="#"><?=$row->nombre;?></a></td>
<td><?=$row->cedula;?></td>
<td id="seguro_medico"><?=$seguro_name['title'];?></td>
<td id="num_af"><?php echo $seguro_ingo['input_name'];?></td>
<td id="tipoaf"><?php echo $row->afiliado;?></td>
</tr>

<?php
}
?>
</table>
</div>
</div>
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<div class="col-sm-12 tab-content showdown searchb" style="display:none;">
<div style="overflow-x:auto">
<table class="table table-striped table-bordered" style="font-size:14px;" >
<tr style="background:#38a7bb;color:white">
<td>Record</td>
<td>Nombres</td>
<td>Cedula</td>
<td>Seguro Medico</td>
<td>No. Afiliado</td>
<td>Tipo Afiliado</td>
<td>Tel.</td>
<td>Direccion</td>
<td>Email</td>
<td>Foto</td>
</tr>
<?php
$cpt="";
foreach($necpatient as $row)
{
$fecha=date("Y-m-d");
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
 
 $seguro_name=$this->db->select('id_sm, title')->where('id_sm',$row->seguro_medico )
 ->get('seguro_medico')->row_array();
 
  $codigo_prestador=$this->db->select('codigo')->where('seguro',$seguro_name['id_sm'] )
 ->get('mssn2')->row_array();
?>

<tr>
<td><?=$row->nec ?> </td>
<td style="text-transform:uppercase"><?=$row->nombre;?></td>
<td id="cedula"><?=$row->cedula;?></td>
<td><?=$seguro_name['title'];?></td>
<td><?php echo $seguro_ingo['input_name'];?></td>
<td><?php echo $row->afiliado;?></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>
<td></td>
</tr>


<?php
}
?>
</table>
</div>
</div>
<div class="col-sm-12 tab-content showdown1 searchb" style="display:none;">
<div style="overflow-x:auto">

<h2 class="h2" align="center">DATOS DEL PRESTADOR</h2> 

<hr id="hr_ad"/>

<div class="col-sm-8">
<table class="table table-striped table-bordered tabinput" style="font-size:12px;">
<tr style="background:#38a7bb;color:white">
<td>Nombre Medico</td><td>Servicio</td><td>Centro Medico</td><td>Exequatur</td><td>Codigo Prestador</td>
</tr>
<?php
//-----------------centro medico-------------------------------

foreach($necpatient as $doc)
{
	
$doctor=$this->db->select('id, first_name, last_name, exequatur')->where('id',$doc->doctor )
->get('doctors')->row_array();
//----------------------------------------------------------------------------
$area=$this->db->select('title_area')->where('id_ar',$doc->area )
->get('areas')->row_array();

$doctor_ex=$this->db->select('code')->where('idex',$doctor['exequatur'] )
->get('execuatur')->row_array();
?>
<tr>
<td id="medico" style="text-transform:uppercase"><?=$doctor['first_name']?> <?=$doctor['last_name']?></td>
<td id="servicio"><?=$area['title_area']?></td>
<td>
<select id='centro_medico' class="form-control">
<?php foreach($CENTRO_MEDICO_DOCTOR as $centm){?>
<option><?=$centm->name?></option>
<?php
}
?>
</select>
</td>
<td class="td-input-r" id="exequatur"><?=$doctor_ex['code']?></td>
<input type="hidden" id="numfac" value="<?=$doctor_ex['code']?>-<?=rand_string(2);?>">
<?php
}
?>
<td  id="codigoprestado"><?=$codigo_prestador['codigo']?></td>

</tr>

</table>
<form  class="form-horizontal "> 
<div class="form-group">
<label class="control-label col-sm-2"> CIE10</label>
<div class="col-sm-10">
 <input  type="text" list="cie" class="form-control" name="cie" >
<datalist id="cie"  >
<?php 

foreach($diag_pres as $row)
{ 
?>
<option><?=$row->code?> <?=$row->description?></option>
<?php
}
?>
</datalist>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2"> Procedimiento</label>
<div class="col-sm-6">
 <input  type="text" list="procedimiento" name="procedimiento" class="form-control" >
<datalist id="procedimiento"  >
<?php 

foreach($diag_pro as $row)
{ 
?>
<option><?=$row->name?></option>
<?php
}
?>
</datalist>
</div>
</div>
</form>
</div>
<div class="col-sm-4">
<table class="table  table-bordered tabinput" style="font-size:14px">
<tr>
<th style="color:#38a7bb">Fecha</th>
<td><?=$createddate?></td>
</tr>

<tr>
<th class="td-input-r" style="color:#38a7bb">No Autorizacion</th>
<td class="td-input" contenteditable='true' id="numauto"></td>
</tr>
<tr>
<th class="td-input-r" style="color:#38a7bb">Autorizado por</th>
<td class="td-input" contenteditable='true' id="autopor"></td>
</tr>
</table> 
</div>

</div>
</div>
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<div class="col-sm-12 tab-content showdown2 searchb" style="display:none">
<h2 class="h2" align="center">FACTURA</h2>
<hr id="hr_ad"/>
<input type="hidden" value="<?=$fecha?>" id="fecha"/>
<button type="button" style="font-size:12px;color:blue"  onClick="addRow2('dataTable')" ><i class="fa fa-plus"></i> Agregar</button>
<button type="button" style="display:none;color:red;font-size:12px" class="showfac" onClick="deleteRow('dataTable')" ><i class="fa fa-remove"></i> Borrar</button>

<table id="tabd" class="table table-striped table-bordered" style="font-size:14px" >
<thead>
<tr>
<td>

</td>
<th style="color:#38a7bb">Servicio</th>
<th style="color:#38a7bb">Cantidad</th>
<th style="color:#38a7bb">Precio Unitario</th>
<th style="color:#38a7bb">Sub-Total</th>
<th style="color:#38a7bb">Total Pagar Seguro</th>
<th style="color:#38a7bb">Descuento</th>
<th style="color:#38a7bb">Total Pagar Paciente</th>
</tr>
</thead>
<tbody id="dataTable">
<tr class="dataRow">
<td></td>
<td>
<select class='service'>
<option value=''></option>
<?php foreach($serv as $s){?>
<option><?=$s->insumservicio?></option>
<?php
}
?>
</select>
</td>
<td contenteditable="true" class="cantidad" onkeyup="calc2($(this))" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46">
<!--<input type="text" step="any" class="cantidad" min="1" onkeyup="calc2($(this))" onkeydown='return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46'>-->
</td>
<td contenteditable="true" class="precio"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190">
<!--<input type="text" step="any" min="0" value="0" class="precio"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190">-->
</td>
<td class="total"></td>
<td class="totalpaseg" style="display:none" >
<?php foreach($pago as $pag)
echo $pag->precio;
?>
</td>
<td contenteditable="true" class="descuento"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190">
<!--<input type="text" step="any" min="0" value="0" class="descuento"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190">-->
</td>
<td class="totpapat" onkeyup="calc2($(this));"></td>
</tr>
</tbody>
</table>
<span id="required_fac" style="color:red"></span>
</div>
<div class="col-sm-12 showdown3 searchb" style="display:none">
<br/>
<div style="overflow-x:auto">
<div class="col-sm-9" >
<textarea class="form-control" rows="10" placeholder="Comentario" id="comment" ></textarea>
</div>
<div class="col-sm-3">
<table class="table table-striped table-bordered sumfac" style="font-size:14px" >
<tr>
<th style="color:#38a7bb">Total Sub-Total</th><td class="g_total" id="tsubtotal"></td>
</tr>
<tr>
<th style="color:#38a7bb">Total Pago Seguro</th><td class="tot-pag-seg" id="totpagseg"></td>
</tr>
<tr>
<th style="color:#38a7bb">Total Descuento</th><td class="tot-sub-desc" id="totsubdesc"></td>
</tr>
<tr>
<th style="color:#38a7bb">Total Pago Pacientes</th><td class="tot-pag-pa" id="totpagpa"></td>
</tr>
</table>
</div>
</div>
<br/>
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
<br/><br/>
</div>
<div  class="loadf"></div>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:20%">Paciente no encontrado</i> '; 
}	
?>
<script>

function godown()
{
$(".hideup").slideUp(1000);	
$(".showdown").slideDown(1000);
$(".showdown1").slideDown(1000);
$(".showdown2").slideDown(1000);
$(".showdown3").slideDown(1000);
 $(".deactivate_s").hide();
 $(".fa-arrow-down").show();
}
$('.fa-arrow-down').on('click', function() {
	 $( "html" ).load( "<?php echo base_url('admin/billing'); ?>" ); 
}
)
//===============save_factura==============================
$('#save_factura').on('click', function(event) {
var service = $('.service').val();
var cant = $('.cantidad').text();
var prec = $('.precio').text();
if(service=="" || cant == "" || prec == "")
{
$('#required_fac').html('La primera fila es obligatoria.').fadeIn('slow').delay(4000).fadeOut('slow');
}
else
{
var diagnostic = $("input[name=cie]").val();
var procedimiento = $("input[name=procedimiento]").val();
var tsubtotal = $('#tsubtotal').text();
var totpagseg = $('#totpagseg').text();
var totsubdesc = $('#totsubdesc').text();
var totpagpa = $('#totpagpa').text();

var medico = $('#medico').text();
var servicio = $('#servicio').text();
var exequatur = $('#exequatur').text();
var codigoprestado = $('#codigoprestado').text();
var fecha = $('#fecha').val();
var centro_medico = $('#centro_medico').val();
var seguro_medico = $('#seguro_medico').text();
var cedula = $('#cedula').text();
var tel = $('#tel').text();
var numfac = $('#numfac').val();
var numauto = $('#numauto').text();
var autopor = $('#autopor').text();
var paciente = $('#paciente').text();
var num_af = $('#num_af').text();
var tipoaf = $('#tipoaf').text();
var comment = $('#comment').val();
var email = $('#email').text();
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
$('.cantidad').each(function(){
cantidad.push($(this).text());
});
$('.precio').each(function(){
precio.push($(this).text());
});
$('.total').each(function(){
total.push($(this).text());	
});

$('.totalpaseg').each(function(){
totalpaseg.push($(this).text());	
});

$('.descuento').each(function(){
descuento.push($(this).text());	
});

$('.totpapat').each(function(){
totpapat.push($(this).text());	
});
$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveBill')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,centro_medico:centro_medico,num_af:num_af,
tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,totpagpa:totpagpa,tel:tel,paciente:paciente,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,seguro_medico:seguro_medico,
medico:medico,servicio:servicio,exequatur:exequatur,codigoprestado:codigoprestado,cedula:cedula,
diagnostic :diagnostic,procedimiento:procedimiento,fecha:fecha,numfac:numfac,tipoaf:tipoaf,email:email,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,},
cache: true,
success:function(data){ 
//window.location.href="<?php echo base_url('admin/showBilling'); ?>?patient_nombres="+patient_nombres;
//ChangeUrl('Guardar', '<?php echo base_url('admin/showBilling'); ?>');
$( "html" ).load( "<?php echo base_url('admin/showBilling'); ?>" ); 
}  
});
}
return false;
});
//==============================================================
$(document).ready(function() {
	
 //this is added just to pre-populate some rows
  addRow2('dataTable');
  addRow2('dataTable');
  addRow2('dataTable');
  addRow2('dataTable');
  

  
  $('.g_total').keyup(function(e) {
    g_total = 0;
    $('.total').each(function() {
      g_total += eval($(this).text());
    });
    console.log(g_total);
    $('.g_total').html(g_total);
  })
  
 
  
 $('.total').keyup(function() {
    g_total = 0;
    $('.total').each(function() {
      g_total += eval($(this).text());
      $('.g_total').html(g_total);
    })
  })
})

function grandTotal(){
  g_total = 0;
    $('.total').each(function() {
      g_total += eval($(this).text());
      $('.g_total').html(g_total);
    })
}


function addRow2(tableid) {
	$(".showfac").slideDown();
  var table = $('#' + tableid);
  rowCount = table.children().length;
  //console.log(table.children().length);
  newrow = '<tr class="dataRow"><td><input type="checkbox" name="chkbox" class="remove"></td><td><select class="service"><option value=""></option><?php foreach($serv as $s){?><option><?=$s->insumservicio?></option><?php } ?></select></td><td contenteditable="true" class="cantidad" onkeyup="calc2($(this))" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46"></td><td contenteditable="true" class="precio"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190"></td><td class="total"></td><td class="totalpaseg" style="display:none"><?php foreach($pago as $pag) echo $pag->precio; ?></td><td contenteditable="true" class="descuento"  onkeyup="calc2($(this));" onkeydown="return (event.which >= 48 && event.which <= 57)  || event.which == 8 || event.which == 46 || event.which == 190"></td><td class="totpapat" onkeyup="calc2($(this));"></td></tr>';
  table.append(newrow);
}



function calc2(_row) {
	$('.totalpaseg').slideDown("fast");
	 t_pag = 0;
    $('.totalpaseg').each(function() {
      t_pag += eval($(this).text());
      $('.tot-pag-seg').html(t_pag);
    })
	//==================================
	
	 t_desc = 0;
    $('.descuento').each(function() {
      t_desc += eval($(this).text());
      $('.tot-sub-desc').html(t_desc);
    })
	//==================================
	
	
  row = _row.closest('.dataRow');
  //console.log();
  //
  qty = row.find('.cantidad').text();
 price = row.find('.precio').text();
  total = parseFloat(qty) * parseFloat(price)  || 0;
   total1 = total.toFixed(2);
  console.log( 'qty:'+ qty +' * price:'+price + ' = '+total);
  row.closest('.dataRow').find('.total').text(total1);
  //-------------------------------------------------------------
  totalpaseg = row.find('.totalpaseg').text();
  descuento = row.find('.descuento').text();
  minus_price_seg_subtot = total - totalpaseg;
  minus_price_seg_subtot_descuento = minus_price_seg_subtot - descuento;
  console.log( 'total:'+ total +' - totalpaseg:'+totalpaseg + ' = '+minus_price_seg_subtot);
  console.log( 'minus_price_seg_subtot:'+ minus_price_seg_subtot +' - descuento:'+descuento + ' = '+minus_price_seg_subtot_descuento);
  totpa = minus_price_seg_subtot_descuento.toFixed(2);
  row.closest('.dataRow').find('.totpapat').text(totpa);
  //======================================================================
   t_pagp = 0;
    $('.totpapat').each(function() {
      t_pagp += eval($(this).text());
      $('.tot-pag-pa').html(t_pagp);
    })
	
  grandTotal();
}


$(".showfac").click(function(){
$("#tabd tbody").find('input[name="chkbox"]').each(function(){
if($(this).is(":checked")){
$(this).parents("tr").remove();
}


});
var val=$('input[name="chkbox"]').length;
if(val < 1)
{
$(".showfac").slideUp();

}
});

</script>

 