<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">GESTION DE FACTURAS Y SEGUROS MEDICOS </h2>
<hr id="hr_ad"/>
<div class="row">
<div class="col-md-12 searchb deactivate_s">
<h6>BUSCADOR DE PACIENTE <i>(<?=$count?>)</i></h6>
<div class="col-md-3 form-group">
        <label>cedula/pasaporte</label>
    <select class="form-control select2 " id="searchcedulafac"  >
	  <option value="" hidden></option>
	<?php 

	foreach($search_patients_factura as $row)
	{ 
	?>
	<option value="<?=$row->cedula?>" ><?=$row->cedula?></option>
	<?php
	}
	?>

   </select>
    </div>
    <div class="col-md-2 form-group">
        <label>NEC</label>
   <select class="form-control select2 " id="searchnecfac"  >
	  <option value="" hidden></option>
	<?php 

	foreach($search_patients_factura as $row)
	{ 
	?>
	<option value="<?=$row->nec1?>" ><?=$row->nec1?></option>
	<?php
	}
	?>

   </select>
    </div>
	    <div class="col-md-5 form-group">
        <label>Nombres</label>
   <select class="form-control select2 " id="searchnombresfac"  >
	  <option value="" hidden></option>
	<?php 

	foreach($search_patients_factura as $row)
	{ 
	?>
	<option value="<?=$row->id_p_a?>" ><?=$row->nombre?></option>
	<?php
	}
	?>

   </select>
    </div>

 </div>
 <!------------------------------------------------------------------------------------>
 <div class="col-md-12">
 <form target="_blank" method='GET' action="<?php echo site_url("printings/get_seguro_date_range");?>" >
<h6>BUSCADOR POR RANGO DE FECHA </h6>
    <div class="col-sm-3 form-group">
    <label>Centro Medico</label>
   <select class="form-control select2 " id="centro-search" name='centro-search'  >
	  <option value="" hidden></option>
	<?php 
    foreach($centro as $rowc)
	{ 
    $centroc= $this->db->select('name')->where('id_m_c',$rowc->centro_medico)->get('medical_centers')->row('name');

	?>
	<option value="<?=$rowc->centro_medico?>" ><?=$centroc?></option>
	<?php
	}
	?>

   </select>

</div>

<div class="col-sm-2 form-group">
<label>Medico</label>
<select class="form-control select2" name='doctor-rg'  id="doctor-rg"  >

</select>
</div>
<div class="col-md-2 form-group">
        <label>Seguro</label>
    <select class="form-control select2 " id="seguro" name="seguro"  disabled>
	  <option value="" hidden></option>
	<?php 

	foreach($search_date_range_seguro_factura as $row)
	{
     $seguro= $this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');		
	?>
	<option value="<?=$row->seguro_medico?>" ><?=$seguro?></option>
	<?php
	}
	?>

   </select>
    </div>
    <div class="col-md-2 form-group">
        <label>Desde</label>
   <select class="form-control select2 get_date_range_seguro_patient" id="desde-search" name="desde-search"  >
	 </select>
    </div>
	    <div class="col-md-2 form-group">
        <label>Hasta</label>
   <select class="form-control select2 get_date_range_seguro_patient" id="hasta-search" name="hasta-search"  disabled >
	 </select>
	</div>
<div class="col-md-1 form-group">
<br/><button disabled id='btn-seg' type="submit" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></button>
    </div>
</form>
 </div>
 <!------------------------------------------------------------------------------------->
 
 <div class="col-md-12 searchb">
 <h6>REPORTE DE FACTURAS</h6>
 <p>
 <label>Seleccione el tipo de seguro :</label> <input type="radio"  name="select-seguro" value="privado" class="select-seguro"/> privado | <input type="radio" value="general" class="select-seguro" name="select-seguro"/> general
 <span class="loadf"></span>
 </p>
    <div class="col-sm-3 form-group">
    <label>Centro Medico</label>
   <select class="form-control select2 " id="centro"  onChange="getDoc(this.value);" disabled >
	  <option value="" hidden></option>
	<?php 
    foreach($centro as $row)
	{ 
    $centro= $this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');

	?>
	<option value="<?=$row->centro_medico?>" ><?=$centro?></option>
	<?php
	}
	?>

   </select>

</div>
<div class="col-sm-3 form-group">
<label>Medico</label>
<select class="form-control select2"  id="doctor" disabled >

</select>
</div>
<div class="col-sm-3 form-group">
<label>Desde</label>
<select class="form-control select2 " id="desde" disabled >


</select>
</div> 
<div class="col-sm-3 form-group" >
<label>Hasta</label>
<select class="form-control select2 " id="hasta" disabled >


</select>
</div>

 </div>
 
<br/><br/>
</div>
<div class="row"> 
<input id="clone-check-seguro" type="hidden" />

<div id="patientHintNombres"></div>
</div>

 </div>
 <!--container-->

 <br/> <br/>


<?php $this->load->view('footer'); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.number.js" charset="UTF-8"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script>
  
  //==============nombres facturacion search on keyup==================

$("#searchnombresfac").change(function(){
$("#patientHintNombres").fadeIn().html('<span style="font-size:25px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var nombres=  $(this).val();
var id_user= "<?=$id_user?>";
if(nombres == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/ajaxsearchnombresfac?nombres="+nombres+"&id_user="+id_user, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});

$("#searchcedulafac").change(function(){
$("#patientHintNombres").fadeIn().html('<span style="font-size:25px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var cedula= $(this).val();
var id_user= "<?=$id_user?>";
if(cedula == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/patient_cedula_billing?cedula="+cedula+"&id_user="+id_user, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});


$("#searchnecfac").change(function(){
$("#patientHintNombres").fadeIn().html('<span style="font-size:25px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var nec= $(this).val();
var id_user= "<?=$id_user?>";
if(nec == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/patient_nec_billing?nec="+nec+"&id_user="+id_user, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});

$('.select2').select2({
placeholder: "Seleccionar",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});
//-----------------------------REPORTE------------------------------------------------------------------------------

$('.select-seguro').click(function () {
var checkval = $('input:radio[name=select-seguro]:checked').val();
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_user = <?=$id_user?>;
$('#clone-check-seguro').val(checkval);
$("#centro").prop("disabled",false);
getDesde(checkval);
getHasta(checkval);
});




function getDesde(checkval) {
$("#desde").prop("disabled",true);
$.ajax({
	type: "GET",
	url: '<?php echo site_url('admin_medico/report_bill_by_desde');?>',
	data:{checkval:checkval,id_user:<?=$id_user?>},
	success: function(data){
	$("#desde").html(data);
	$("#desde").prop("disabled",false);
	$(".loadf").hide();
	},
	 
	});
}



function getHasta(checkval) {
$("#hasta").prop("disabled",true);
$.ajax({
	type: "GET",
	url: '<?php echo site_url('admin_medico/report_bill_by_hasta');?>',
	data:{checkval:checkval,id_user:<?=$id_user?>},
	success: function(data){
	$("#hasta").html(data);
	$("#hasta").prop("disabled",false);
	$(".loadf").hide();
	},
	 
	});
}






function getDoc(val) {
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$('#doctor_dropdown').val(null).trigger('change');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc_centro');?>',
	data:{id_centro:val,id_user:<?=$id_user?>},
	success: function(data){
	$("#doctor").prop("disabled",false);
	$("#doctor").html(data);
	$(".loadf").hide();
	},
	 
	});
}




$('#doctor').change(function () {
$("#hasta").val("").trigger("change.select2");

});

$('#centro').change(function () {
$("#hasta").val("").trigger("change.select2");

});


$('#desde').change(function () {
$("#hasta").val("").trigger("change.select2");

});



$("#hasta").change(function(){
var centro = $("#centro").val();
var doctor = $("#doctor").val();
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var checkval= $('#clone-check-seguro').val();
var perfil="<?=$perfil?>";
var id_user="<?=$id_user?>";
if(centro=="")
{
alert("Elige un centro medico.");	
}
else if(desde > hasta ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
} else {
$("#patientHintNombres").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/get_fac_date_report')?>",
data: {desde:desde,hasta:hasta,checkval:checkval,perfil:perfil,id_user:id_user,centro:centro,doctor:doctor},
cache: true,
success:function(data){
$( "#patientHintNombres" ).html( data ); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#patientHintNombres').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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

//=--------------SEARCH BY SEGURO DATE RANGE------------------------------

$('#desde-search').change(function () {
$("#hasta-search").prop('disabled',false);
$("#hasta-search").val("").trigger("change.select2");

});

$('#doctor-rg').change(function () {
$("#seguro").prop('disabled',false);
$("#seguro").val("").trigger("change.select2");

});



$('#centro-search').change(function () {
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc_centro');?>',
	data:{id_centro:$(this).val(),id_user:<?=$id_user?>},
	success: function(data){
	$("#doctor-rg").prop("disabled",false);
	$("#doctor-rg").html(data);
	$(".loadf").hide();
	},
	 
	});

});

function loadMedico(){
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/loadMedicoFac');?>',
	data:{id_user:<?=$id_user?>},
	success: function(data){
	$("#doctor-rg").html(data);
	$(".loadf").hide();
	},
	 
	});	
}

loadMedico();


$("#seguro").change(function(){
	$("#desde-search").prop('disabled',true);
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$.ajax({
	type: "GET",
	url: '<?php echo site_url('admin_medico/get_date_range_seguro_patient');?>',
	data:{seguro:$(this).val(),id_doc:$('#doctor-rg').val()},
	success: function(data){
	$(".get_date_range_seguro_patient").html(data);
	$("#desde-search").prop('disabled',false);
	$(".loadf").hide();
	},
	 
	});
	});

$("#hasta-search").change(function(){
var seguro = $("#seguro").val();
var centro = $("#centro-search").val();
var hasta = $(this).val();
var desde = $("#desde-search").val();
var perfil="<?=$perfil?>";
var id_user="<?=$id_user?>";
if(centro=="" && seguro=="")
{
alert("Elige centro y seguro.");
$("#btn-seg").prop('disabled',true);	
}
else if(desde > hasta ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta-search").val("").trigger("change.select2");
$("#btn-seg").prop('disabled',true);
} else{
$("#btn-seg").prop('disabled',false);	
	
}
})





</script>
