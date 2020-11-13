
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">GESTION DE FACTURAS Y SEGUROS MEDICOS</h2>
<hr id="hr_ad"/>
<h6>BUSCADOR DE PACIENTE  <i class="fa fa-arrow-down" style="font-size:18px;cursor:pointer;display:none"></i></h6>
<div class="col-md-12 searchb deactivate_s">
<br/>
<div class="row">
    <div class="col-md-3 form-group">
        <label>CEDULA/PASAPORTE</label>
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
    <div class="col-md-3 form-group">
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
	    <div class="col-md-3 form-group">
        <label>NOMBRES</label>
   <select class="form-control select2 " id="searchnombresfac"  >
	  <option value="" hidden></option>
	<?php 

	foreach($search_patients_factura as $row)
	{ 
	?>
	<option value="<?=$row->nombre?>" ><?=$row->nombre?></option>
	<?php
	}
	?>

   </select>
    </div>

</div>
 </div>
<div class="col-md-12"> 

<hr id="hr_ad"/>
<div id="patientHint"></div>
<div id="patientHintNombres"></div>
</div>
 </div>
 <!--container-->

 <br/> <br/>


<div><button style="color:red;font-size:13px;display:none" id='delete_row' class="pull-left"><span class="glyphicon glyphicon-minus-sign"></span> Borrar</button>

</div>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.number.js" charset="UTF-8"></script>

 <script>
  
  //==============nombres facturacion search on keyup==================


$("#searchnombresfac").change(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var nombres=  $(this).val();
var identificar= "medico";
if(nombres == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>medico/ajaxsearchnombresfac?nombres="+nombres+"&identificar="+identificar, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});

$("#searchcedulafac").change(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var cedula= $(this).val();
var identificar= "medico";
if(cedula == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>medico/patient_cedula_billing?cedula="+cedula+"&identificar="+identificar, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});


$("#searchnecfac").change(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var nec= $(this).val();
var identificar= "medico";
if(nec == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>medico/patient_nec_billing?nec="+nec+"&identificar="+identificar, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});

$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});
</script>
</html>