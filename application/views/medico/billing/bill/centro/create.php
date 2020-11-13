
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

 <div class="col-lg-4">

 <label class="control-label col-sm-6">CEDULA/PASAPORTE</label>
 <div class="col-sm-5">
   <input id="searchcedulafac"  type="text" class="form-control patient-cedula" data-mask="00000000000">
    </div>
    </div>
  <div class="col-lg-3">
   <div class="form-group">
   <label class="control-label col-sm-2">NEC</label>
    <div class="col-sm-6">
	<input  id="searchnecfac" type="text" class="form-control"  />
    </div>
  </div>
  </div>
 <div class="col-lg-3">
 <div class="form-group">
 <label class="control-label col-sm-4">	NOMBRES</label>
  
<div class="col-sm-8">
   <input type="text" id="searchnombresfac"  style="precio:200px" class="form-control">

</div>
  </div>

 </div>
 <br/> <br/>
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
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script>
  
  //==============nombres facturacion search on keyup==================


$("#searchnombresfac").keyup(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var nombres=  $(this).val();
var identificar= "centro";
if(nombres == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin/ajaxsearchnombresfac?nombres="+nombres+"&identificar="+identificar, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});

$("#searchcedulafac").keyup(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var cedula= $(this).val();
if(cedula == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin/patient_cedula_billing?cedula="+cedula, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});


$("#searchnecfac").keyup(function(){
$("#patientHintNombres").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var nec= $(this).val();
if(nec == "") {
$("#patientHintNombres").hide();
}else {
$.get( "<?php echo base_url();?>admin/patient_nec_billing?nec="+nec, function( data ){
$( "#patientHintNombres" ).html( data ); 
$( "#hide_patientf" ).hide();
		   
});
}
});
</script>
</html>