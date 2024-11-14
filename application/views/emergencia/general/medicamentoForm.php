Seleccionnar todos los medicamentos <input type="checkbox"/> 
<label class="control-label" ><span style="color:red">*</span> Medicamento </label>

<select  class="form-control  select2"   id="em-medicamento"  >


</select>
<input  class="form-control clinput" type="hidden"  id="tipo"  >

<label  class="control-label" style="font-size:12px"><i> Cantidad existenciel <span  id="cantidad-exist"  ></span></i></label>
</br>
<label class="control-label" ><span style="color:red">*</span> Cantidad</label>

<input  class="form-control  clinput"   id="cantidad"  >


<label class="control-label" ><span style="color:red">*</span> Dosis</label>

<input type="text" class="form-control clinput" id="dosis">
<label class="control-label" ><span style="color:red">*</span> Via</label>

<select  class="form-control select2"   id="em-via" >
<option></option>
<option>intravenoso</option>
<option>instramuscular</option>
<option>oral</option>
<option>vaginal</option>
<option>respiratoria</option>
<option>rectal</option>
<option>subcutanea</option>
<option>oftalmica</option>
<option>topica</option>
<option>sublingual</option>
<option>inhalatoria</option>
<option>parenteral</option>
<option>transdermica</option>
<option>gastroenterica</option>
</select>

<label class="control-label" ><span style="color:red">*</span> Cada</label>
<select  class="form-control select2"   id="em-cada" >
<option></option>
<option>1 dosis</option>
<option>1 hr</option>
<option>2 hrs</option>
<option>4 hrs</option>
<option>6 hrs</option>
<option>8 hrs</option>
<option>12 hrs</option>
<option>24 hrs</option>
</select>
<label class="control-label" > Nota Medica</label>
<textarea rows="3" cols="10" class="form-control clinput" id="nota-medica"   ></textarea>


<br/>
<button type="button" id="add-medicamento" class="btn btn-primary btn-xs">
<i class="fa fa-plus" aria-hidden="true"> Indicar</i>
</button> 



<script>
 $(".select2").select2({
  tags: true
});

function loadMedicamentos(){
	
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadMedicamentos",
success:function(data){
$('#em-medicamento').html(data);
	
}
});	
}



loadMedicamentos();

$('#refreshmedica').on('click', function(event) {
loadMedicamentos();
$("#cantidad-exist").html("");
});

$('#em-medicamento').on('change', function(event) {
var medid = $("#em-medicamento").val();	
$("#cantidad-exist").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>emergency/cantidadExis",
data: {medid:medid},
method:"POST",
success:function(data){
$("#cantidad-exist").html(data); 
var cantExist = $("#cantidad-exist").text();
if(cantExist==0){
	$("#cantidad-exist").css('color','red');
$('#add-medicamento').prop("disabled",true);	
}else{
	$("#cantidad-exist").css('color','green');
	$('#add-medicamento').prop("disabled",false);
	}	
},

});

$.get( "<?php echo base_url();?>emergency/medicaTipo?medid="+medid, function( data ){
$("#tipo").val(data); 
});
	   
});



function medicamentoHoy(){
var id_user  = <?=$id_user?>;
var op  = <?=$id_user?>;
var id_patient  = <?=$id_patient?>;
var empty = "No hay medicamentos por hoy.";
var where = 1;
$.ajax({
url:"<?php echo base_url(); ?>emergency/medicamentosData",
data: {op:op,num:'',where:where,empty:empty,id_patient:id_patient,id_user:id_user},
method:"POST",
success:function(data){
$('#medicamentos-data').html(data);
	
},

});
}






	
$('#add-medicamento').on('click', function(event) {
var nota = $("#nota-medica").val();	
var cada = $("#em-cada").val();	
var medicamento = $("#em-medicamento").val();
var cantidad = $("#cantidad").val();
var dosis = $("#dosis").val();	
var via = $("#em-via").val();
var tipo = $("#tipo").val();
var cantExist = $("#cantidad-exist").text();
if(parseFloat(cantidad) > parseFloat(cantExist)) {
	alert("Cantidad existencial es "+ cantExist);
	$("#cantidad").val("");
	}
else if(medicamento =="" || via =="" || cantidad =="" ||  dosis =="" || cada ==""){
	alert("´Todos los campos son requerido");
}else{	
var id_user  = <?=$id_user?>;
var id_patient = <?=$id_patient?>;
var idMed='none';
$.ajax({
url:"<?php echo base_url(); ?>emergency/addMedico",
data: {idMed:idMed,medicamento:medicamento,via:via,cada:cada,id_patient:id_patient,id_user:id_user,nota:nota.trim(),cantidad:cantidad,dosis:dosis,tipo:tipo},
method:"POST",
success:function(data){
//loadMedicamentos();
medicamentoForm();	
medicamentoHoy();
//newMedicamento();
//$(".select2").val('').trigger('change');
//$('.clinput').val('');
},

});
}
	
});	


</script>