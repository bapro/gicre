
<?php

foreach($data_cita as $row)
$medico=$this->db->select('name')->where('id_user',$row->doctor )->get('users')->row('name');
$exequatur=$this->db->select('exequatur')->where('first_name',$row->doctor )->get('doctors')->row('exequatur');
$area=$this->db->select('title_area')->where('id_ar',$row->area )->get('areas')->row('title_area');
 
$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('seguro_medico');
 $cod=$this->db->select('codigo')->where('id_seguro',$seguro_medico)->where('id_doctor',$row->doctor)
->get('codigo_contrato')->row('codigo');

$centro=$this->db->select('name')->where('id_m_c',$row->centro )->get('medical_centers')->row('name');

?>

<div class="tab-content " >

<div class="col-sm-12 tab-content showdown1 searchb" >

<div class="col-sm-6">
<h4 class="h4" >DATOS DEL MEDICO</h4> 
<br/>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-3"> Medico</label>
<div class="col-sm-9">

<input  value="<?=$medico?>" class="form-control" readonly />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Exequatur</label>
<div class="col-sm-4">

<input  value="<?=$exequatur?>" class="form-control" readonly />

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Especialidad</label>
<div class="col-sm-7">

<input  value="<?=$area?>" class="form-control" readonly />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"> Codigo Prestador</label>
<div class="col-sm-4">

<input  value="<?=$cod?>" class="form-control" readonly />
</div>
</div>

</form>
</div>
<div class="col-sm-6">
<h4 class="h4" >ENFERMEDAD(ES) DEL PACIENTE</h4> 
<br/>
<form  class="form-horizontal"> 

<div class="form-group">
<label class="control-label col-sm-5"> Centro Medico</label>
<div class="col-sm-7">

<input  value="<?=$centro?>" class="form-control" readonly title="<?=$centro?>"/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5"> CIE10</label>
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
<label class="control-label col-sm-5"> PROCEDIMIENTO</label>
<div class="col-sm-7" style="font-size:15px">
<?=$procedimiento?>
</div>
</div>
</form>
</div>
</div>
<div class="col-md-12 searchb ">
<h4 class="h4" >FACTURA</h4>
<br/>
 <form class="form-inline">
 <?php 
$createddate = date("d-m-Y");
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
 <?php if(empty($serv)) {
$display="style='display:none'";
}
else {$display="";}
?>
<div style="overflow-x:auto">
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf">
<thead>
<tr class="trback">
<td  class="heading" title="Añadir fila"  style="cursor:pointer;font-size:13px;color:blue;background:white"><span <?=$display?> id="add_row" class="glyphicon glyphicon-plus-sign"></span></td>
<th class="heading">
<?php if(empty($serv)) {
	echo "<span style='color:#B18904'>No hay servicios | <a target='_blank' href='".base_url()."/admin_medico/import_rates_fac/$id_doctor/$id_seg/$id_user'>Crear</a></span>";
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
<tr id='addr1' class="calculation visible change-red">
<td></td>
<td style="width:180px;display:block">

<select class="service form-control select2"  onChange="getSegName(this);" >
<option value="" hidden></option>
<?php foreach($serv as $s){?>
<option  value="<?=$s->id_tarif?>"><?=$s->procedimiento?></option>
<?php
}
?>
</select>

</td>
<td class="cantidad">
<input type="text" class="cantidad form-control "  tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float" type="text"  tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="row-total form-control" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-seg form-control"  tabindex="3" readonly />
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
<a style="font-size:24px" href="#"><i class="fa fa-arrow-circle-up"></i></a>
</div>
<div class="col-sm-3">
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
<div style="display:none" id="ver_factura">
<i class="fa fa-check-circle" style="color:green">  Creada con con éxito !</i> <a  target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url("admin_medico/billing_print_view")?>">Ver</a>
</div>
</div>
</div>
</div>
<?php

 $rnc=$this->db->select('rnc')->where('id_sm',$seguro_medico)
 ->get('seguro_medico')->row('rnc');

$num_af=$this->db->select('input_name')->where('patient_id',$row->id_patient )
 ->get('saveinput')->row('input_name');

$createddate = date("d-m-Y");
?>
<div class="loadf"></div>
<script type="text/javascript" src="<?=base_url();?>assets/js/factura-table-dynamic.js" charset="UTF-8"></script>
<?php $this->load->view('admin/billing/bill/factura-table-dynamic');?>
 <script>
 

function row_data_of_numbers()
{
var id_p_a = "<?=$row->id_patient?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/row_data_of_numbers')?>",
data: {id_p_a:id_p_a},
cache: true,
success:function(data){
$("#row_data_of_numbers").html(data);
  
} 
});
}

 
 
 //---------------------------------------------------------------------------
function getSegName(dropDown) {
var doctorid ="<?=$id_doctor ?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio');?>',
data:{id_mssm1:dropDown.value,doctorid:doctorid},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(data);
recalc();
}
});

}



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
var patient_id = "<?=$id_patient?>";

var tsubtotal = $('#sub-total').val();
var totpagseg = $('#total-pago-seguro').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();

var medico = "<?=$id_doctor ?>";
var area = "<?=$row->area ?>";
var exequatur = "<?=$exequatur?>";
var codigoprestado = "<?=$cod?>";
var fecha = "<?=$createddate?>";
var centro_medico = "<?=$id_centro ?>";
var seguro_medico = "<?=$seguro_medico ?>";
var rnc = "<?=$rnc?>";
var identificar="doctor";
var num_af = "<?=$num_af?>";
var comment = $('#comment').val();
var inserted_by = "<?=$name?>";
var service = [];
var cantidad = [];
var precio = [];
var total = [];
var totalpaseg = [];
var descuento = [];
var totpapat = [];
var id_apoint = "<?=$id_apoint ?>";
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
medico:medico,codigoprestado:codigoprestado,fecha:fecha,exequatur:exequatur,id_apoint:id_apoint,
numauto:numauto,autopor:autopor,comment:comment,inserted_by:inserted_by,rnc:rnc,area:area},
cache: true,
success:function(data){
row_data_of_numbers();	
$(".loadf").hide();
$('#ver_factura').show(); 
$('#save_factura').hide();

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



</script>