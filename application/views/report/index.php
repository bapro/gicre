<div class="container">
<h2><?=$centro_name?></h2>
<h4> Elegir un criterio para mostra reporte</h4>
<div class="col-md-12 searchb deactivate_s">
 <div class="row">
 <div class="col-md-12 form-group">
 <label><input type="radio"  name="select-me" value="medico" checked /> Medico | <input type="radio" value="nurse"  name="select-me" /> Enfermería </label>

 </div>	
<form   method="POST"  >
<input id="report_type" type="hidden"/>
 <div class="col-md-6 form-group">
        <label>SELECCIONE EL TIPO DE REPORTE</label>
		<span id="show-medico">
      <select class="form-control select2 " id="h_c_sinopsis">
	  <option value=""></option>
	  <optgroup label="Reporte De Medico">
	  	<option value="1- h_c_sinopsis" class="disabled-med">Reporte De Medico Por Nombres</option>
		<option value="2- h_c_sinopsis" class="disabled-med">Reporte De Medico Por Especialidad</option>
		<option value="3- h_c_sinopsis" class="disabled-med">Reporte De Medico Por Turno</option>
		</optgroup>
      </select>
	  	  </span>
	 <span style="display:none" id="show-nursing">
	 <select class="form-control select2 "  id="nota_med_salud_ocupacional" >
	  <option value=""></option>
        <optgroup label="Reporte De Enfermería" >
		<option value="4- nota_med_salud_ocupacional" >Reporte De Enfermería Por Nombres</option>
		<option value="5- nota_med_salud_ocupacional" >Reporte De Enfermería Por Medicamentos</option>
		
	</optgroup>
	 </select>
	 </span>
	 
	  </div>
    <div class="col-md-2 form-group">
        <label>Desde</label>
      <select class="form-control select2 date-select" id="desde"  name="desde" >
	
	 </select>
    </div>
    <div class="col-md-2 form-group">
        <label>Hasta</label>
      <select class="form-control select2  date-select" id="hasta" name="hasta" >

	 </select>
	 
	  </div>
	
    
  <div class="col-md-2 form-group" >
	  <br/>
	  <button type="button" id="send-btn"  class="btn btn-primary btn-sm" >MOSTRAR</button> 

   </div>
   <br/><br/>
 </form>
 
 </div>

  
 </div>
 <div class="col-md-12 searchb deactivate_s">
  <hr/>
  <div id="report_result"></div>
  </div>
</div>
</div>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <script>
 $(document).ready(function() {
   $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   allowClear: true,
 
});

$('#h_c_sinopsis').change(function () {
$("#report_type").val($(this).val());
});

$('#nota_med_salud_ocupacional').change(function () {
$("#report_type").val($(this).val());
});
	   fetch_date_report("h_c_sinopsis","centro_medico");

$('input[type=radio][name=select-me]').change(function() {
    if (this.value == 'medico') {
       $("#show-medico").show();
	   $("#show-nursing").hide();
	   fetch_date_report("h_c_sinopsis","centro_medico");
	   
    }
    else {
       $("#show-medico").hide();
	   $("#show-nursing").show();
	   fetch_date_report("nota_med_salud_ocupacional","id_centro");
	 
    }
});




function fetch_date_report(table, centro_colmn){
$.ajax({
	type: "POST",
	url: '<?php echo site_url('report/fetch_date_report');?>',
	data:{table: table, centro_colmn:centro_colmn, centro_id: <?=$id_cm?>},
	success: function(data){
	$(".date-select").prop("disabled",false);
	$(".date-select").html(data);
	$(".spinning-me").hide();
	},
	 
	});
 }


$('#send-btn').click(function () {
	if($('#report_type').val() !="" && $('#desde').val() !="" && $('#hasta').val()!=""){
	$("#report_result").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load">');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('report/report_result');?>',
	data:{report_type: $('#report_type').val(), id_centro: <?=$id_cm?>, from: $('#desde').val(), to: $('#hasta').val()},
	success: function(data){
	$(".date-select").prop("disabled",false);
	$("#report_result").html(data);
	},
	 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#report_result").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
	});
}
});
});
 </script>