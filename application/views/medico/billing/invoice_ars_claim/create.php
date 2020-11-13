
<style>
th,td{text-align:left;}
.col-md-12{border:1px solid #38a7bb;background:#E4E9EA}

.box {
    width: 100%;

}
</style>

<!-- *** welcome message modal box *** -->

  
<div class="container"  >

 <h2 align="center">CREACION FACTURAS ARS CON NCF</h2>
 <a  href='#'  class='btn btn-xs btn-warning' data-toggle="modal" data-target="#reporte">Reporte De Facturas Enviados ARS</a>
  <a  href='#' class='btn btn-xs btn-warning'  data-toggle="modal" data-target="#reporte-ncf">Reporte De NCF</a>
 <p style="color:red;text-align:center"><?php if(count($date_range1)==0){echo "*** Todas las facturas son de seguros privados ***";}?></p>
 <div id="load-fields" align="center"></div>
 
<div class="row">
<div class="col-md-12">
<h6>Busquador de facturas</h6>
<div class="col-md-3 form-group">
<label><font style="color:red">*</font> Desde</label>
<select class="form-control  select2" id="desde" >
<option value=""></option>
<?php 
foreach ($query1->result() as $dr) { 
$desde = date("d-m-Y", strtotime($dr->filter_date)); 
?>
<option value="<?=$dr->filter_date?>" ><?=$desde?></option>
<?php
}
?>
</select>
</div>
<div class="col-md-3 form-group">
<label><font style="color:red">*</font> Hasta </label>

<select class="form-control  select2 " id="hasta" >
<option value=""></option>
<?php 

foreach ($query2->result() as $dr) { 
$hasta = date("d-m-Y", strtotime($dr->filter_date)); 
?>
<option value="<?=$dr->filter_date?>"><?=$hasta?></option>
<?php
}
?>
</select>
</div>
<div class="col-md-3 form-group">
<label><font style="color:red">*</font> ARS</label>
<select class="form-control  select2 " id="ars" disabled>

</select>
</div>
<div class="col-md-3 form-group">
<label>Centro Medico</label>
<select class="form-control select2" id="centro" disabled>

</select>

</div>
</div>
</div>
<div class="row searchb">

<div class="col-md-3 form-group">
<label><font style="color:red">*</font> Area</label>
<select class="form-control  select2 clear-patient select-commun" id="areas" disabled>

</select>
<!--<br/><br/>
<button class="btn btn-primary btn-xs" type="button" id="search-data"><i class="fa fa-search"></i> Buscar facturas por Area O Medico</button>-->

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
<!--<br/><br/>
<button class="btn btn-primary btn-xs" type="button" id="search-patient"><i class="fa fa-search"></i> Buscar facturas por paciente</button>-->
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
  <!------------------------------------------------------------------------------------------->
  <div class="modal fade" id="reporte"  role="dialog" >
<div class="modal-dialog" style="width: 100%;margin: auto;" >
<div class="modal-content" >
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Reporte De Facturas Enviados ARS</h3>

</div>
<div class="modal-body">
<div style="height:600px;overflow-y:auto">
<table id="example" class="table table-striped" >
<thead>
<tr style="background:#5957F7;color:white">
<th>ARS</th>
<th>
Desde
</th>
<th>
Hasta
</th>
<th>Centros</th>
<th>Area</th>
<th>Facturas</th>
<th>Cuento Por Cobra</th>
<th>Medico</th>
<th>Ver</th>
</tr>
</thead>
<tbody style='font-size:10px'>
<?php
$i=1;
$this->padron_database = $this->load->database('padron',TRUE);

$sql="SELECT *,sum(totpagseg) AS cc  FROM  invoice_ars_claims $where_report GROUP BY ncf_id  ORDER BY fecha DESC";
$query= $this->db->query($sql);
 foreach($query->result() as $row)
{
$fechadesc=$this->db->query("SELECT fecha FROM  invoice_ars_claims where ncf_id=$row->ncf_id ORDER BY fecha DESC")->row()->fecha;

$fechasc=$this->db->query("SELECT fecha FROM  invoice_ars_claims where ncf_id=$row->ncf_id  ORDER BY fecha ASC")->row()->fecha;

$qry=$this->db->query("SELECT id FROM  invoice_ars_claims where ncf_id=$row->ncf_id ");
$totfac=$qry->num_rows();
//------------------------------------------------------------------------------------------------------------------------
$centro=$this->db->select('name')->where('id_m_c',$row->center_id)->get('medical_centers')->row('name');
$med=$this->db->select('*')->where('id_user',$row->medico)->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$med['area'])->get('areas')->row('title_area');
$seguro=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$fecha= date("d-m-Y", strtotime($row->fecha));
?>
<tr>
<td><?php echo $seguro?></td>
<td><?= date("d-m-Y", strtotime($fechasc))?></td>
<td><?=date("d-m-Y", strtotime($fechadesc))?></td>
<td><?=$centro?></td>
<td><?=$area?></td>
<td><?=$totfac?></td>
<td>RD$<?=number_format($row->cc,2)?></td>
<td><?=$med['name']?></td>
<td><a  target="_blank" href="<?php echo base_url("printings/print_ars_fac_found/$row->ncf_id/$row->center_id/$fechasc/$fechadesc/0")?>"  title="Imprimir" class="btn btn-sm" >Ver</a></td>
</tr>

<?php
}
?>
</tbody>    
</table>

</div>
</div>
</div>
</div>
</div>
  
  
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<?php 
if($is_admin=="yes"){$controller="admin";}else{$controller="medico";}
?>
  <script>

     $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [1,'asc'] ],

    } );
$('#hasta').change(function () {
var hasta = $(this).val();
var desde = $('#desde').val();
if(desde < hasta){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
fetchCentro(hasta,desde);
fetchArea(hasta,desde);
fetchARS(hasta,desde);
//fetchMedico(hasta,desde);
fetchPatient(hasta,desde);
}else if(desde == hasta){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
fetchCentro(hasta,desde);
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


function fetchCentro(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoiceCentro')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#centro" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}

function fetchArea(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoiceAcArea')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#areas" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}


function fetchARS(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoiceARS')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#ars" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}


/*function fetchMedico(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoiceMedico')?>",
data:{id_user:id_user,desde:desde,hasta:hasta},
success:function(data){ 
$( "#medico" ).html( data );
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});	
}*/


  $('#areas').change(function () { 
  $( "#medico" ).prop('disabled',true);
  var area=$(this).val();
 var centro = $("#centro").val();
 $.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoiceMedico')?>",
data:{centro:centro,area:area},
success:function(data){ 
$( "#medico" ).html( data );
$( "#medico" ).prop('disabled',false);
$(".select2").prop("disabled",false);
$("#load-fields").hide();
}
});
  
 }); 




function fetchPatient(hasta,desde){
var id_user = <?=$name?>;
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/invoicePatient')?>",
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
$("#ars").val("").trigger("change.select2"); 
});


  
  
   $('#medico').change(function () { 
   //$("#areas").val("").trigger("change.select2");
   factura_date_range_area();
  }); 
  
   $('#ars').change(function () {
 $("#areas").val("").trigger("change.select2");	   
  $("#medico").val("").trigger("change.select2");
  }); 
  
  $('.clear-patient').change(function () { 
  $("#patient").val("").trigger("change.select2");
});  
 
//----------------------------------------------------------------------------------------------
 /* var timer = null;
$('.ncf').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000);
	   $("#saveTransfer").prop("disabled",true);
});

function doStuff1() {
	 var str= $(".ncf").val();
$(".ncf_result").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#saveTransfer").prop("disabled",false);
if(str == "") {
$( ".ncf_result" ).hide();
$("#saveTransfer").prop("disabled",false);
}else {
$.get( "<?php echo base_url();?>admin_medico/ncf?value="+str, function( data ){
$(".ncf_result").html(data); 
			   
});
}
}*/
  
  //-------------------------------------------------------------------------------------------------------------
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
$("#factura_date_range").fadeIn().html('<span class="load" ><img style="width:120px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
/*$.get( "<?php echo base_url();?>admin_medico/get_fac_ars1?desde="+desde+"&hasta="+hasta+"&areas="+areas+"&ars="+ars+"&is_admin="+is_admin+"&centro="+centro+"&medico="+medico+"&patient="+patient, function( data ){
$( "#factura_date_range" ).html( data ); 
		   
});*/

$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/get_fac_ars1')?>",
data:{desde:desde,hasta:hasta,areas:areas,ars:ars,is_admin:is_admin,centro:centro,
medico:medico,patient:patient,id_user:id_user},
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


//----------SEACH BY DATE RANGE-----------------------------------------	
/*$(".select-commun").on('click', function () {
	factura_date_range_area();
});*/

 


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
if(desde > hasta){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
}
else if(hasta=="" || desde==""  || ars=="" ) {
alert("Los campos Hasta, Desde, ARS, Area deben estar llenos.");
} else if( medico=="" && areas==""){
alert("Elige uno de los campos en el segundo rango.");	
}
else {
$("#factura_date_range").fadeIn().html('<span class="load" ><img style="width:120px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
//$.get( "<?php echo base_url();?>admin_medico/get_fac_ars1?desde="+desde+"&hasta="+hasta+"&areas="+areas+"&ars="+ars+"&is_admin="+is_admin+"&centro="+centro+"&medico="+medico+"&patient="+patient, function( data ){
//$( "#factura_date_range" ).html( data ); 
		   
//});

$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/get_fac_ars1')?>",
data: {desde:desde,hasta:hasta,areas:areas,ars:ars,is_admin:is_admin,centro:centro,medico:medico,patient:patient,id_user:id_user},
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

//if(ncf==""){
$("#ncf").css("border","1px solid");
//$("#ncf").css("color","red");
	//alert("NCF Asignar es obligatorio !");
//} else {
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveInvoiceArsClaim')?>",
data:{fecha:fecha,paciente:paciente,num_af:num_af,numauto:numauto,ncf:ncf,seguro_medico:seguro_medico,desde:desde,idfac2:idfac2,
tsubtotal:tsubtotal,totpagseg:totpagseg,totpagpa:totpagpa,nota:nota,created_by:created_by,area:area,centro:centro,
medico:medico,servicio:servicio,codigoprestado:codigoprestado,rnc:rnc,idfacc:idfacc,is_admin:is_admin,hasta:hasta,id_patient:id_patient},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");

window.location.href="<?php echo base_url();?>admin_medico/invoice_ars_p_v";
 //window.open("<?php echo base_url(); ?>/admin_medico/invoice_ars_p_v?new_id_ncf="+new_id_ncf+"&when="+when);
 //location.reload(true);
//factura_date_range_reload();
//factura_by_patient();
$("#ncf").val("");
$("#second-table-reload").load(location.href + " #second-table-reload");
}
});
//}
})
//===========================================================================
function loadMedico(){
$("#load-fields").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/loadMedicoFac');?>',
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
	url: '<?php echo site_url('admin_medico/ncfDateRange');?>',
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

 </script>
 </body>
 </html>