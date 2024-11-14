  <section class="py-3">
  	<div class="row g-3">

</div>
		<div class="container d-flex align-items-center justify-content-center" >
	
<div class="col-md-6 mt-5">
<h3 class="mb-3">Integrar un API</h3>
		<div class="row">
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Seleccionar el nombre cliente</label>
		<select style='width:100%' class="form-select" id="client_id">
		<option value=""></option>
			<?php
         foreach ($results as $row){
			 echo "<option value='$row->id'>$row->client_name</option>";
			 
		 }
			?>
		
		</select>
		</div>
		<div class="mb-3">
  <label for="instance_id" class="form-label">Instance Id</label>
  <input type="text" class="form-control" id="instance_id" > 
</div>
<div class="mb-3">
  <label for="token" class="form-label">Token</label>
<input type="text" class="form-control" id="token" >
</div>

<div class="mb-3">
  <label for="api_link" class="form-label">Enlace del API </label>
<input type="text" class="form-control" id="api_link" placeholder="opcional" >
</div>
		<div class="text-center">
		<hr/>
		<button  type="button" class="btn btn-sm btn-success" id="save"  ><i class="fa fa-save"></i> Guardar</button>
		<input id="action" type="hidden" value="0"/>
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
	$('#client_id').on('change', function(event) {
	$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('api_client/getClientApiData')?>",
data: {client_id:$(this).val()},
success:function(response){
	if(response.instance_id=="" && response.token==""){
		$(".form-control-sm").val("");
	}else{
	$("#action").val(response.action);
	
$("#instance_id").val(response.instance_id);
$("#token").val(response.token);	
 $("#api_link").val(response.api_link);
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
var client_id = $('#client_id').val();
var instance_id = $('#instance_id').val();
var token = $('#token').val();
var api_link = $('#api_link').val();

 var action = $('#action').val();
$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('api_client/storeNewClientApiIntegration')?>",
data: {client_id:client_id,instance_id:instance_id,token:token,api_link:api_link,action:action},
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

return false;
});







});
</script>

</body>

</html>