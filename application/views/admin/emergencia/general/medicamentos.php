<div class="row" >
<div class="col-md-12" >
<h4 class="h4 his_med_title">Medicacion </h4>

<div class="col-md-4" >
Seleccionnar todos los medicamentos <input id='select-medicamentos' type="checkbox"/> 
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
</div>
<div class="col-md-8" id="newMedicamento" style="top:20px;height:500px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);">

</div>
<div class="col-md-12" >
<br/>
 <hr id="hr_ad"/>
<div id="listOfMedicamentos"></div>
</div>
</div>
</div>

<script>


 $(".select2").select2({
  tags: true
});



$('#em-medicamento').on('click', function(event) {
if ($(this).is(":checked")) {
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadMedicamentos",
success:function(data){
$('#em-medicamento').html(data);
	
}
});	
} else {
$("#dvPassport").hide();
}
});



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

},

});
}
	
});


</script>