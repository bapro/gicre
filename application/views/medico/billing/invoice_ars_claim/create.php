
<style>
th,td{text-align:left;}
.col-md-12{border:1px solid #38a7bb;background:#E4E9EA}

.box {
    width: 100%;

}
</style>

<!-- *** welcome message modal box *** -->
<?php
$perfil_=encrypt_url($perfil);
$name_=encrypt_url($name);

?>

<div class="container"  >

 <h2 align="center">CREACION FACTURAS ARS CON NCF</h2>
 <a  href="<?=base_url("invoiceArsClaim/factura_reporte_con_ars/$perfil/$name/$admin_position_c")?>"  target="_blank" class='btn btn-xs btn-warning' >Reporte De Facturas Enviados ARS</a>
  <a  href='#' class='btn btn-xs btn-warning'  data-toggle="modal" data-target="#reporte-ncf">Reporte De NCF</a>
 <p style="color:red;text-align:center"><?php if(count($date_range1)==0){echo "*** No hay facturas para crear ***";}?></p>
 <div id="load-fields" align="center"></div>
 
<div class="row searchb">
<h4> &nbsp; &nbsp;Busquador de facturas</h4>
 <div class="col-md-5 form-group">
<label>Centro Medico</label> <input type="radio"  name="select-centro" value="privado" class="select-centro" checked  /> privado
<?php if($perfil !='Medico') {?> | <input type="radio" value="publico" class="select-centro" name="select-centro"/> público<?php }?>
<select class="form-control select2" id="centro" disabled>

</select>

</div>
<div class="col-md-2 form-group">
<label><font style="color:red">*</font> Desde</label>
<select class="form-control  select2" id="desde" >

</select>
</div>
<div class="col-md-2 form-group">
<label><font style="color:red">*</font> Hasta </label>

<select class="form-control  select2 " id="hasta" >

</select>
</div>
<div class="col-md-3 form-group">
<label><font style="color:red">*</font> ARS</label>
<select class="form-control  select2 " id="ars" disabled>

</select>
</div>
<div class="col-md-1 form-group"> 
<br/>
<button disabled id='searchFacCentPub' type="button" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></button>
</div>
</div>
<div class="row searchb" id="hideCentroPrivado" style="display:none">

<div class="col-md-3 form-group">
<label><font style="color:red">*</font> Area</label>
<select class="form-control  select2 clear-patient select-commun" id="areas" disabled>

</select>

</div>
<div class="col-md-3 form-group">
<label>Medico</label>
<select class="form-control  select2 clear-patient select-commun load-med" id="medico"  >
<?=$option?>

</select>
</div>
<div class="col-md-3 form-group">
<label>Paciente</label>
<select class="form-control  select2 " id="patient" disabled >
</select>
</div>

</div>


<br/>


  <div class="row box searchb">
  
  <div id="factura_date_range"></div>
 <br/>
    <div  style="overflow-x:auto;" id="second-table-reload">
<table class="table table-striped"  id="second-table" >
<thead>
<tr style="background:#DDFAFF">
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>Cedula</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamado</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td colspan='2'><strong>Paciente Pagara</strong></td>
<td><input type="checkbox" id="check-all2" /></td>
</tr>
</thead>
<tbody>

</tbody>
</table>

  </div>
  <div class="disabled-all">
   <hr id="hr_ad"/>
    <div class="col-md-6 form-group">
        <label>NCF Asignar</label>
        <input id="ncf" class="form-control ncf"  type="text"/>
		<span class="ncf_result"></span>
    </div>
    <div class="col-md-3 form-group">
  <!--<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Imprimir</button>-->  <button type="button" id="saveTransfer" class="btn btn-primary btn-xs" disabled><i class="fa fa-save"></i>Guardar</button>
    </div>
    <div class="col-md-11 form-group">
        <label>Nota</label>
        <input id="nota" class="form-control" type="text"/>
    </div>
</div>

  </div>

  <br/> <br/><br/> <br/>
  </div>
    <div class="modal fade" id="reporte-ncf"  role="dialog" >
<div class="modal-dialog modal-lg" style="margin: auto;" >
<div class="modal-content" >
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Reporte De Facturas Enviados ARS</h3>

</div>
<div class="modal-body">
<div style="overflow-y:auto">
<form target="_blank" method='get'  action='<?php echo base_url("printings/print_ncf_report")?>'>
<div class="col-md-5">
<label>Medico</label>
<select class="form-control  select2 load-med" id="medico-ncf" name='medico-ncf' >
<?=$option?>

</select>
</div>
<div class="col-md-2">
<label>Desde</label>
<select class="form-control  select2 ncf-date-range" id="desde-ncf" name='desde-ncf' disabled >


</select>
</div>
<div class="col-md-2">
<label>Hasta</label>
<select class="form-control  select2 ncf-date-range" id="hasta-ncf" name='hasta-ncf'disabled >


</select>

</div>
<div class="col-md-2 show-btn-ncf"  style='display:none'>
<br/>
<button type='submit'  title="Imprimir" class="btn btn-sm">Ver</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

  
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


  <script>

$(document).ready(function() {
	

$("#searchFacCentPub").on('click', function () {
	factura_date_range_area();
});	
	
displayCentroPrivido($('input:radio[name=select-centro]:checked').val());	
	
$('.select-centro').click(function () {
var checktype= $('input:radio[name=select-centro]:checked').val();
displayCentroPrivido(checktype);
});	


function displayCentroPrivido(checktype){
	
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/getCentroFacDateRange');?>",
	data:{checktype:checktype,id_user:<?=$name?>,perfil:"<?=$perfil?>", admin_centro:"<?=$admin_position_c?>"},
	success: function(data){
	$("#centro").html(data);
	$("#centro").prop("disabled",false);
	if(checktype=='privado'){
		$("#hideCentroPrivado").slideDown();
		$("#searchFacCentPub").slideUp();
	}else{
		$("#hideCentroPrivado").slideUp();
		$("#searchFacCentPub").slideDown();
		$("#searchFacCentPub").prop("disabled",true);
		  $("#areas").val("").trigger("change.select2");
		$("#medico").val("").trigger("change.select2");
		$("#patient").val("").trigger("change.select2");
	}
	getDateRanch();
	getDateRanch1();
	},

	});
	
}



function getDateRanch1(){
$.ajax({
type: "POST",
url: "<?=base_url('invoiceArsClaim/getDateRanch')?>",
data:{id_user:<?=$name?>,perfil:"<?=$perfil?>",begin:1},
success:function(data){ 
$( "#desde" ).html( data );
},


});	
}


function getDateRanch(){
$.ajax({
type: "POST",
url: "<?=base_url('invoiceArsClaim/getDateRanch')?>",
data:{id_user:<?=$name?>,perfil:"<?=$perfil?>",begin:0},
success:function(data){ 
$( "#hasta" ).html( data );
}
});	
}
	
	
$('#hasta').change(function () {
var hasta = $(this).val();
var desde = $('#desde').val();
if(desde < hasta){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//fetchCentro(hasta,desde);
fetchArea(hasta,desde);
fetchARS(hasta,desde);
//fetchMedico(hasta,desde);
fetchPatient(hasta,desde);
}else if(desde == hasta){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//fetchCentro(hasta,desde);
fetchArea(hasta,desde);
fetchARS(hasta,desde);
//fetchMedico(hasta,desde);
fetchPatient(hasta,desde);	
	
}

else{
$("#hasta").val("").trigger("change.select2");	
}
});


$('#desde').change(function () { 
$("#hasta").val("").trigger("change.select2");

});


function fetchCentro(){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/invoiceCentro')?>",
data:{id_user:id_user},
success:function(data){ 
$( "#centro" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}

function fetchArea(hasta,desde){
var centro = $("#centro").val();
$.ajax({
type: "POST",
//url: "<?=base_url('invoiceArsClaim/invoiceAcArea')?>",
//data:{id_user:id_user,desde:desde,hasta:hasta,perfil:"<?=$perfil?>"},
url: "<?php echo site_url('admin_medico/getcentEsp');?>",
data:'id_centro='+centro,
success:function(data){ 
$( "#areas" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}



  $('#areas').change(function () { 
  $( "#medico" ).prop('disabled',true);
  var area=$(this).val();
 var centro = $("#centro").val();
 $.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/invoiceMedico')?>",
data:{centro:centro,area:area,id_user:<?=$name?>,perfil:"<?=$perfil?>"},
success:function(data){ 
$( "#medico" ).html( data );
$( "#medico" ).prop('disabled',false);
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});
  
 }); 






function fetchARS(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/invoiceARS')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#ars" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}







function fetchPatient(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/invoicePatient')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#patient" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}
   
  $('#centro').change(function () { 
 $("#areas").val("").trigger("change.select2");
$("#medico").val("").trigger("change.select2");
});

  $('#patient').change(function () { 
 $("#areas").val("").trigger("change.select2");
$("#medico").val("").trigger("change.select2");
//$("#ars").val("").trigger("change.select2"); 
});


  
  
   $('#medico').change(function () { 
   //$("#areas").val("").trigger("change.select2");
   factura_date_range_area();
  }); 
  
   $('#ars').change(function () {
 $("#areas").val("").trigger("change.select2");	   
  $("#medico").val("").trigger("change.select2");
  $("#searchFacCentPub").prop("disabled",false);
  }); 
  
  $('.clear-patient').change(function () { 
  $("#patient").val("").trigger("change.select2");
});  
 
 $(".disabled-all :input").prop("disabled", true);
    $(".disabled-all :input").not("button").css("background", "rgb(235,235,235)");
  $('.select2').select2({ 
  placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

//----------SEACH BY PATIENT-----------------------------------------
$("#patient").on('change', function () {
	factura_by_patient();
});
function factura_by_patient()
{
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var areas = $("#areas").val();
var centro = $("#centro").val();
var medico = $("#medico").val();
var patient = $('#patient').val();
var is_admin = "<?=$is_admin?>";
var checktype= $('input:radio[name=select-centro]:checked').val();
var id_user = <?=$name?>;
var ars = $("#ars").val();
	if(desde > hasta){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
}
else if (hasta=="" || desde=="" || centro=="" || patient=="") {
alert("Los campos Hasta, Desde, Centro, Paciente deben estar lleno.");	
} else{
$("#saveTransfer").prop("disabled",true);
$("#second-table-reload").load(location.href + " #second-table-reload");
$("#factura_date_range").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>')

$.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/get_fac_ars1')?>",
data:{desde:desde,hasta:hasta,areas:areas,ars:ars,is_admin:is_admin,centro:centro,
medico:medico,patient:patient,id_user:id_user,checktype:checktype},
cache: true,
 success:function(data){ 
$( "#factura_date_range" ).html( data );
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#factura_date_range').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
}



function factura_date_range_area()
{
$("#saveTransfer").prop("disabled",true);
$("#second-table-reload").load(location.href + " #second-table-reload");
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var areas = $("#areas").val();
var centro = $("#centro").val();
var medico = $("#medico").val();
var patient = $('#patient').val();
var is_admin = "<?=$is_admin?>";
var id_user = <?=$name?>;
var ars = $("#ars").val();
var checktype= $('input:radio[name=select-centro]:checked').val();
if(desde > hasta){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
}
else if(hasta=="" || desde==""  || ars=="" ) {
alert("Los campos Hasta, Desde, ARS, Area deben estar llenos.");
} else if( medico=="" && areas=="" && checktype=='privado'){
alert("Elige uno de los campos en el segundo rango.");	
}
else {
$("#factura_date_range").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>')

$.ajax({
type: "GET",
url: "<?=base_url('invoiceArsClaim/get_fac_ars1')?>",
data: {desde:desde,hasta:hasta,areas:areas,ars:ars,is_admin:is_admin,centro:centro,medico:medico,patient:patient,id_user:id_user,checktype:checktype},
cache: true,
success:function(data){
$( "#factura_date_range" ).html( data ); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#factura_date_range').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});



}
};



//===================================================================================

$('#saveTransfer').on('click', function(event) {
$('#saveTransfer').prop('disabled',true);
var id_patient = $("#id_patient").val();
var is_admin="<?=$is_admin?>";
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var ncf = $("#ncf").val();
var nota = $("#nota").val();
var fecha = [];
var paciente = [];
var num_af = [];
var numauto = [];
var tsubtotal = [];
var totpagseg = [];
var totpagpa = [];
var medico = [];
var servicio = [];
var codigoprestado = [];
var rnc = [];
var seguro_medico = [];
var centro = [];
var area = [];
var idfacc = [];
var idfac2 = [];
$("#second-table").find('td.fecha1').each(function(){
fecha.push($(this).text());
});

$("#second-table").find('td.tarea').each(function(){
area.push($(this).text());
});

 
$("#second-table").find('td.tcentro').each(function(){
centro.push($(this).text());
});
$("#second-table").find('td.paciente').each(function(){
paciente.push($(this).text());
});

$("#second-table").find('td.num_af').each(function(){
num_af.push($(this).text());
});
$("#second-table").find('td.numauto').each(function(){
numauto.push($(this).text());
});
$("#second-table").find('td.tsubtotal').each(function(){
tsubtotal.push($(this).text());
});
$("#second-table").find('td.totpagseg').each(function(){
totpagseg.push($(this).text());
});
$("#second-table").find('td.totpagpa').each(function(){
totpagpa.push($(this).text());
});
$("#second-table").find('td.medico').each(function(){
medico.push($(this).text());
});
$("#second-table").find('td.servicio').each(function(){
servicio.push($(this).text());
});

$("#second-table").find('td.codigoprestado').each(function(){
codigoprestado.push($(this).text());
});
$("#second-table").find('td.rnc').each(function(){
rnc.push($(this).text());
});
$("#second-table").find('td.seguro_medico').each(function(){
seguro_medico.push($(this).text());  
});

$("#second-table").find('td.idfacc').each(function(){
idfacc.push($(this).text());  
});

$("#second-table").find('td.idfac2').each(function(){
idfac2.push($(this).text());  
});


var created_by="<?=$name?>";

$("#ncf").css("border","1px solid");

$.ajax({
type: "POST",
url: "<?=base_url('invoiceArsClaim/saveInvoiceArsClaim')?>",
data:{fecha:fecha,paciente:paciente,num_af:num_af,numauto:numauto,ncf:ncf,seguro_medico:seguro_medico,desde:desde,idfac2:idfac2,
tsubtotal:tsubtotal,totpagseg:totpagseg,totpagpa:totpagpa,nota:nota,created_by:created_by,area:area,centro:centro,
medico:medico,servicio:servicio,codigoprestado:codigoprestado,rnc:rnc,idfacc:idfacc,is_admin:is_admin,hasta:hasta,id_patient:id_patient},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");

window.location.href="<?php echo base_url();?>invoiceArsClaim/invoice_ars_p_v";

$("#ncf").val("");
$("#second-table-reload").load(location.href + " #second-table-reload");
}
});

})
//===========================================================================
function loadMedico(){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/loadMedicoFac');?>",
	data:{id_user:<?=$name?>},
	success: function(data){
	$(".load-med").html(data);
	$("#load-fields").hide();
	},
	 
	});	
}

loadMedico();


$("#medico-ncf").on('change', function () {
	$.ajax({
	type: "POST",
	url: '<?php echo site_url('invoiceArsClaim/ncfDateRange');?>',
	data:{id_user:$(this).val()},
	success: function(data){
	$(".ncf-date-range").html(data);
	$(".ncf-date-range").prop('disabled',false);
	},
	 
	});	
});	

$("#hasta-ncf").on('change', function () {
	$('.show-btn-ncf').show();
});
});
 </script>
 </body>
 </html>