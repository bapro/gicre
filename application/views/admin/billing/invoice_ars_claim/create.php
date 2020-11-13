
<style>
th,td{text-align:left;}
.col-md-12{border:1px solid #38a7bb;background:#E4E9EA}

.box {
    width: 100%;

}
</style>

<!-- *** welcome message modal box *** -->

  
<div class="container"  >
 <div class="col-md-12">
 <h2 align="center">Creacion Facturas ARS con NCF</h2>
 </div>
 <div class="col-md-12">
   <h4>Busquador de facturas</h4>
<div class="row">
<div class="col-md-6">
<!-- <div class="row">
<label class="col-xs-12">Label3</label>
</div>-->
<div class="row">
<div class="col-md-11 col-md-6">
<label>Desde</label>

</div>
<div class="col-md-11 col-md-6">
<label>Area</label>

<?php 

foreach($areas as $row)

$area=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row(('title_area'));
?>

<input class="form-control" value="<?=$area?>" readonly>

</div>
</div>
</div>
<div class="col-md-4 form-group">
<label>Paciente</label>
<select class="form-control  select2 " id="patient" >
<option value=""></option>
<?php 

foreach($paciente as $row)
{
 $paciente=$this->db->select('nombre')->where('id_p_a',$row->paciente)
 ->get('patients_appointments')->row('nombre');	
?>
<option value="<?=$row->paciente?>"><?=$paciente?></option>
<?php
}
?>
</select>
</div>
<div class="col-md-3 form-group">
<label>Hasta</label>
<select class="form-control  select2 " id="hasta" >
<option value=""></option>
<?php 

foreach($date_range1 as $dr)
{ 
$hasta = date("d-m-Y", strtotime($dr->filter));	
?>
<option value="<?=$dr->filter?>"><?=$hasta?></option>
<?php
}
?>
</select>

<br/><br/>
<button class="btn btn-primary btn-xs" type="button" id="search"><i class="fa fa-search"></i></button>
</div>

<div class="col-md-3 form-group">
<label>ARS</label>
<select class="form-control  select2 " id="ars" >
<option value=""></option>
<?php 

foreach($ars as $row)
{
$seguro=$this->db->select('title')->where('id_sm',$row->seguro_medico )
->get('seguro_medico')->row('title');
?>
<option value="<?=$row->seguro_medico?>"><?=$seguro?></option>
<?php
}
?>
</select>

</div>
</div>

 </div>
  <div class="col-md-12 box">
  
  <div id="factura_date_range"><i>Resultado de la busqueda</i></div>
  </div>
     <div class="col-md-12">
  <!--<div id="factura_date_range_transfert"></div>-->
    <div  style="overflow-x:auto;" id="second-table-reload">
<table class="table table-striped table-bordered"  id="second-table" >
<thead>
<tr style="background:#DDFAFF">
<th><strong>Fecha</strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Cedula</strong></th>
<th><strong>NSS</strong></th>
<th><strong>No Autorizacion</strong></th>
<th><strong>Total Reclamdo</strong></th>
<th><strong>Aseguradora Pagara</strong></th>
<th><strong>Paciente Pagara</strong></th>
<th><input type="checkbox" id="check-all2" /></th>
</tr>
</thead>
<tbody>

</tbody>
</table>

  </div>
  <div class="row disabled-all">
   <hr id="hr_ad"/>
    <div class="col-xs-6 form-group">
        <label>NCF Asignar <span style='color:red'>*</span></label>
        <input id="ncf" class="form-control" type="text"/>
    </div>
    <div class="col-xs-3 form-group">
  <!--<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Imprimir</button>-->  <button type="button" id="saveTransfer" class="btn btn-primary btn-xs" ><i class="fa fa-save"></i>Guardar</button>
    </div>
    <div class="col-xs-12 form-group">
        <label>Nota</label>
        <input id="nota" class="form-control" type="text"/>
    </div>
</div>

  </div>
  </div>
  </div>
  <div id="result"></div>
  <br/> <br/><br/> <br/>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<?php 

foreach($areas as $row)

$area=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row('title_area');
$last_id=$this->db->select('id_ncf')->order_by('id_ncf','desc')->limit(1)->get('ncf')->row('id_ncf');
$new_id_ncf=$last_id + 1;
if($is_admin=="yes"){$controller="admin";}else{$controller="medico";}
?>
  <script>
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
	var is_admin = "<?=$is_admin?>";
	$("#second-table-reload").load(location.href + " #second-table-reload");
var patient = $('#patient').val();
$("#factura_date_range").fadeIn().html('<span class="load" ><img style="width:120px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.get( "<?php echo base_url();?><?=$controller?>/get_fac_ars_by_patient?patient="+patient+"&is_admin="+is_admin, function( data ){
$( "#factura_date_range" ).html( data ); 
		   
});
}


//----------SEACH BY DATE RANGE-----------------------------------------	
$("#search").on('click', function () {
	factura_date_range();
});

function factura_date_range()
{
	$("#second-table-reload").load(location.href + " #second-table-reload");
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var areas = "<?=$row->area?>";
var is_admin = "<?=$is_admin?>";
var ars = $("#ars").val();
//send ajax request
//alert(desde);
if(desde > hasta){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
}
else if(hasta=="" || desde=="" || areas=="" || ars=="") {
alert("Los campos Hasta, Desde y ARS deben ser lleno.");	
}
else {
$("#factura_date_range").fadeIn().html('<span class="load" ><img style="width:120px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.get( "<?php echo base_url();?><?=$controller?>/get_fac_ars?desde="+desde+"&hasta="+hasta+"&areas="+areas+"&ars="+ars+"&is_admin="+is_admin, function( data ){
$( "#factura_date_range" ).html( data ); 
		   
});
}
};



//===================================================================================

$('#saveTransfer').on('click', function(event) {
var is_admin="<?=$is_admin?>";
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
var idfacc = [];
$("#second-table").find('td.fecha1').each(function(){
fecha.push($(this).text());
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

var created_by="<?=$name?>";
var new_id_ncf="<?=$new_id_ncf?>";
if(ncf==""){
$("#ncf").css("border","1px solid");
$("#ncf").css("color","red");
	//alert("NCF Asignar es obligatorio !");
} else {
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveInvoiceArsClaim')?>",
data:{fecha:fecha,paciente:paciente,num_af:num_af,numauto:numauto,ncf:ncf,seguro_medico:seguro_medico,
tsubtotal:tsubtotal,totpagseg:totpagseg,totpagpa:totpagpa,nota:nota,created_by:created_by,
medico:medico,servicio:servicio,codigoprestado:codigoprestado,rnc:rnc,idfacc:idfacc,new_id_ncf:new_id_ncf},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");

window.location.href="<?php echo base_url();?>admin_medico/invoice_ars_p_v?new_id_ncf="+new_id_ncf+"&is_admin="+is_admin;
 //window.open("<?php echo base_url(); ?>/admin_medico/invoice_ars_p_v?new_id_ncf="+new_id_ncf+"&when="+when);
 //location.reload(true);
//factura_date_range_reload();
//factura_by_patient();
$("#ncf").val("");
$("#second-table-reload").load(location.href + " #second-table-reload");
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
})
//===========================================================================

 </script>
 </body>
 </html>