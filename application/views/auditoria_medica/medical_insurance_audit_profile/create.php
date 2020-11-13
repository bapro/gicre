<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">PERFIL SEGURO MEDICO Y AUDITORIA</h2>
<hr id="hr_ad"/>
<h6>BUSCADOR DE MEDICO  <i class="fa fa-arrow-down" style="font-size:18px;cursor:pointer;display:none"></i></h6>
<div class="col-md-12 searchb deactivate_s">
<div class="row">
    <div class="col-md-3 form-group">
        <label>NUMERO DE CONTRATO</label>
      <select class="form-control select2 " id="numcontrato">
	  <option value="" hidden></option>
	<?php 

	foreach($codigo as $row)
	{ 
	?>
	<option value="<?=$row->codigoprestado?>" ><?=$row->codigoprestado?></option>
	<?php
	}
	?>

   </select>
    </div>
    <div class="col-md-3 form-group">
        <label>NOMBRE DEL MEDICO</label>
      <select class="form-control select2 " id="nombremedico">
	  <option value="" hidden></option>
	<?php 

	foreach($medicos_facturar as $row)
	{ 
	?>
	<option value="<?=$row->name?>" ><?=$row->name?></option>
	<?php
	}
	?>

   </select>
    </div>
	    <div class="col-md-3 form-group">
        <label>EXEQUATUR</label>
		 <select class="form-control select2 " id="exequatur">
		  <option value="" hidden></option>
		<?php 

		foreach($exequatur_medico_factura as $row)
		{ 
		?>
		<option value="<?=$row->exequatur?>" ><?=$row->exequatur?></option>
		<?php
		}
		?>

		 </select>
    </div>
	    <div class="col-md-3 form-group">
        <label>CEDULA</label>
		<select class="form-control select2 " id="cedula">
        <option value="" hidden></option>
		<?php 

		foreach($cedula_medico_factura as $row)
		{ 
		$medico=$row->medico;
		$sql ="SELECT cedula FROM doctors where first_name=$medico";
		$query = $this->db->query($sql);

		foreach($query->result() as $ced)
		{
		?>
		<option value="<?=$ced->cedula?>" ><?=$ced->cedula?></option>
		<?php
		}
		}
		?>

		 </select>
    </div>
</div>
 </div>
<div class="col-md-12"> 

<hr id="hr_ad"/>
<div id="hintnumcontrato"></div>
</div>
 </div>
 <!--container-->

 <br/> <br/>


<div><button style="color:red;font-size:13px;display:none" id='delete_row' class="pull-left"><span class="glyphicon glyphicon-minus-sign"></span> Borrar</button>

</div>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script>
 
  //==============numero contrato search on keyup==================


$("#numcontrato").change(function(){
$("#hintnumcontrato").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var num_cont=  $(this).val();
if(num_cont == "") 
{
$("#hintnumcontrato").hide();
}
else {
$.get( "<?php echo base_url();?>admin/get_numero_contrado?num_cont="+num_cont, function( data ){
$( "#hintnumcontrato" ).html( data ); 		   
});
}
});

  //==============doctor name search on keyup==================
$("#nombremedico").change(function(){
	alert("sdfsdf");
$("#hintnumcontrato").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var medico=  $(this).val();
if(medico == "") 
{
$("#hintnumcontrato").hide();
}
else {
$.get( "<?php echo base_url();?>admin/get_nombre_medico?medico="+medico, function( data ){
$( "#hintnumcontrato" ).html( data ); 		   
});
}
});


  //==============exequatur search on keyup==================
$("#exequatur").change(function(){
$("#hintnumcontrato").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var exequatur=  $(this).val();
if(exequatur == "") 
{
$("#hintnumcontrato").hide();
}
else {
$.get( "<?php echo base_url();?>admin/get_exequatur_medico?exequatur="+exequatur, function( data ){
$( "#hintnumcontrato" ).html( data ); 		   
});
}
});


  //==============cedula search on keyup==================
$("#cedula").change(function(){
$("#hintnumcontrato").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var cedula=  $(this).val();
if(cedula == "") 
{
$("#hintnumcontrato").hide();
}
else {
$.get( "<?php echo base_url();?>admin/get_cedula_medico?cedula="+cedula, function( data ){
$( "#hintnumcontrato" ).html( data ); 		   
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