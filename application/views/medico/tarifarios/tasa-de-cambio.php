  <section class="py-3">
  	<div class="row g-3">

</div>
		<div class="container d-flex align-items-center justify-content-center" >
	
<div class="col-md-6 mt-5">
<h3 class="mb-3">Tasa de cambio</h3>
		<div class="row g-3">
		<div class="col-md-12">
		<label class="form-label">Elegir un medico</label>
		<select style='width:100%' class="form-select" id="doctor">

		<?php

		echo $result_doctors;

		?>
		</select>
		

		</div>
		<div class="col-md-6">

		<input type="hidden" class="form-check-input" id="dolar" value="1" >
		<div class="input-group input-group-sm">
		<span class="p-1">1 <i class="bi bi-currency-dollar"></i></span> <img  width="40"  src="<?=base_url()?>/assets_new/img/206626.png"  /> <strong class="p-1">=</strong>
		<span class="input-group-text" id="basic-addon1"><input type="number" min="5" max="25" step="5" id="convert-dolar-to-peso" class="form-control form-control-sm" aria-describedby="basic-addon1" ></span>
		<img  width="40"  src="<?=base_url()?>/assets_new/img/300164.png"  />   <span class="p-1">RD$</span> 
		</div>
		</div>
		<div class="col-md-6">

   <input type="hidden" class="form-check-input" id="euro" value="2"  >
		<div class="input-group input-group-sm">

		<span class="p-1">1 <i class="bi bi-currency-euro"></i></span> <img  width="40"  src="<?=base_url()?>/assets_new/img/5111601.png"  />  <strong class="p-1">=</strong>
		<span class="input-group-text" id="basic-addon2"><input  type="number" min="5" max="25" step="5"  id="convert-euro-to-peso"  class="form-control form-control-sm" aria-describedby="basic-addon2" ></span>
		<img  width="40"  src="<?=base_url()?>/assets_new/img/300164.png"  /><span class="p-1">RD$</span> 
		</div>

		</div>
		<div class="text-center">
		<hr/>
		<button  type="button" class="btn btn-sm btn-success" id="save"  ><i class="fa fa-save"></i> Guardar</button>
		<input id="action" type="hidden" />
		<div id="info"></div>
		<div id="info-err"></div>
		</div>

		</div>

		</div>
		
		</div>



    </section>
	   <?php $this->load->view('footer');?>

      <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
   
<script>

$(document).ready(function() {
	$('#doctor').on('change', function(event) {
	$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('tarifarios/getDocTasa')?>",
data: {doctor:$(this).val()},
success:function(response){
	if(response.tasa_dolar=="" && response.tasa_euro==""){
		$(".form-control-sm").val("");
	}else{
	$("#action").val(response.action);
	
$("#convert-dolar-to-peso").val(response.tasa_dolar);
	
 $("#convert-euro-to-peso").val(response.tasa_euro);
  $("#info").html(response.creation_info);
	}
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#info').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
	});	
	
	$('.form-select').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});		



$('#save').on('click', function(event) {
$('#save').prop("disabled", true);
$('#info-err').addClass("spinner-border");
var doctor = $('#doctor').val();
var tasa_dolar = $('#convert-dolar-to-peso').val();
var tasa_euro = $('#convert-euro-to-peso').val();
var money_dolar = $('#dolar').val();
var money_euro = $('#euro').val();

 var action = $('#action').val();
$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('tarifarios/saveDocTasa')?>",
data: {doctor:doctor,tasa_dolar:tasa_dolar,tasa_euro:tasa_euro,
 action:action, money_dolar:money_dolar, money_euro:money_euro},
success:function(response){
$('#info-err').removeClass("spinner-border");
if(response.status == 0){
$('#info').html('<p class="text-danger ">'+response.message+'</p>');
}
else if(response.status == 1){
$('#info').html('<p class="text-success ">'+response.message+'</p>');
}else{

}
$('#save').prop("disabled", false);
},

});

return false;
});







});
</script>

</body>

</html>