<?php
        $this->load->view('admin/header_admin');
 ?>
 <div class="container">

<h3 class="h3"><i class="fa fa-bar-chart" style="font-size:80px"></i> ELIGIR LOS CRITERIOS PARA MOSTRAR GRAFICO</h3>
<div class="col-md-12 searchb deactivate_s">
 <div class="row">
<form   method="GET" action="<?php echo site_url("admin/showChart");?>" >
     <div class="col-md-6 form-group">
        <label>Consultar Datos</label>
      <select class="form-control select2 " name="dato" id="dato">
	   <option value="1" >TOTAL DE PACIENTES VISTOS</option>
	  <option value="2" >TOTAL DE PACIENTE VISTOS POR SEXO</option>
	  <option value="3" >TOTAL DE PACIENTES VISTOS POR EDAD</option>
	  <option value="4" >TOTAL DE PACIENTE VISTO POR DIAGNOTICOS CIE-10</option>
	  <option value="5" >TOTAL DE PACIENTES VISTOS POR OTROS DIAGNOSTICOS</option> 
	  <option value="6" >TOTAL DE PACIENTES VISTOS POR PROVINCIA</option> 
	  <option value="7" >TOTAL DE PACIENTES VISTOS POR NACIONALIDAD</option>
	  
		
	 </select>
	  </div>
	 <div class="col-md-12 form-group">

 <label><input type="radio"  name="select-me" value="centro" /> Centro Medico | <input type="radio" value="medico"  name="select-me"/> Medico
 </div>	
 <div class="col-md-3 form-group">
        <label>Centro Medico</label>
      <select class="form-control select2 " name="centro" id="centro" onChange="getCentroDate(this.value);" disabled>
	  <option value="" hidden></option>
	  <?PHP
			$sql ="SELECT name,centro_medico  FROM  medical_centers INNER JOIN h_c_sinopsis ON medical_centers.id_m_c=h_c_sinopsis.centro_medico group by name order by name desc";
			$query= $this->db->query($sql);
			foreach ($query->result() as $row){?>
			<option value="<?=$row->centro_medico?>" ><?=$row->name?></option>
			<?php
			}

	  ?>
	 </select>
    </div>



    <div class="col-md-3 form-group">
        <label>Medico</label>
		<span class="spinning-me"></span>
      <select class="form-control select2 " name="medico" id="medico" onChange="getDocDate(this.value);" disabled>
	  <option value="" hidden></option>
	  <?PHP
			$sql ="SELECT name,user_id  FROM  h_c_sinopsis INNER JOIN users ON h_c_sinopsis.user_id=users.id_user group by name order by name desc";
			$query= $this->db->query($sql);
			foreach ($query->result() as $row){?>
			<option value="<?=$row->user_id?>" ><?=$row->name?></option>
			<?php
			}

	  ?>
	 </select>
    </div>




    <div class="col-md-3 form-group">
        <label>Desde</label>
      <select class="form-control select2 date-select" id="desde"  name="desde" disabled>
	
	 </select>
    </div>
    <div class="col-md-3 form-group">
        <label>Hasta</label>
      <select class="form-control select2  date-select" id="hasta" name="hasta" disabled>

	 </select>
	 
	  </div>
	  <div class="col-md-2" style="float:right">
	  
	  <button type="submit" id="send-btn"  class="btn btn-primary btn-sm" >MOSTRAR</button> 
	  <br/> <br/>
   </div>
</div>

	 </form>
 </div>
  </div>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <script>
   $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   allowClear: true,
  language: {

    noResults: function() {

      return "No hay.";        
    },
   
  }
});


$('input[type=radio][name=select-me]').change(function() {
    if (this.value == 'centro') {
       $("#centro").prop("disabled",false);
	   $("#medico").prop("disabled",true);
    }
    else {
       $("#centro").prop("disabled",true);
	   $("#medico").prop("disabled",false);
    }
});

function getDocDate(med) {
$(".spinning-me").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getDateMedicoFechaChart');?>',
	data:{id_medico:med},
	success: function(data){
	$(".date-select").prop("disabled",false);
	$(".date-select").html(data);
	$(".spinning-me").hide();
	},
	 
	});
}


function getCentroDate(centro) {
$(".spinning-me").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getDateCentroFechaChart');?>',
	data:{id_centro:centro},
	success: function(data){
	$(".date-select").prop("disabled",false);
	$(".date-select").html(data);
	$(".spinning-me").hide();
	},
	 
	});
}

/*
$('#show-chart').click(function () {
$(".spinning-me").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var desde  = $("#desde").val();
var hasta  = $("#hasta").val();
var centro  = $("#centro").val();
var medico  = $("#medico").val();
var dato  = $("#dato").val();
$.ajax({
	type: "GET",
	url: '<?php echo site_url('admin_medico/showPieChart');?>',
	data:{desde:desde,hasta:hasta,centro:centro,medico:medico,dato:dato},
	success: function(data){
	$("#my-chart").html(data);
	$(".spinning-me").hide();
	},
	  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#my-chart').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
	});
});*/

$('#medico').change(function () {
$("#centro").val("").trigger("change.select2");

});
$('#centro').change(function () {
$("#medico").val("").trigger("change.select2");

});
 </script>