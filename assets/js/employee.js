$( document ).ready(function() {
	
$("input[name='status']").change(function(){
var option = $(this).val();
if(option =="Active"){
$(".isActive").show();	
$(".dateEnd").hide();
$("#terminated_date").prop('required',false);
$("#terminated_date").val('');
}else{
$(".dateEnd").show();
$(".isActive").hide();
$("#terminated_date").prop('required',true);
}
});
	$('#click-nuevo').click(function() {

    location.reload();
});
	$('#click-editar').on('click', function(event){
	$("#save-datos-empleado :input").prop("disabled", false);
	$('#click-editar').prop("disabled", true);
	//$('.create-new').hide();
});

$('.date_f').mask('0000-00-00', {placeholder: 'yyyy-mm-dd'});



$('#save-datos-empleado').on('submit', function (e) {
	e.preventDefault();
$.ajax({
url:$("#saveDatosEmpleado").val(), // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$('#insertionResultEmp').show();
if(response.status == 1){
$('#insertionResultEmp').html('<p class="alert alert-warning">'+response.message+'</p>').delay( 2000 ).hide(0);

} else if(response.status == 2){
	$('#insertionResultEmp').html('<p class="alert alert-warning">'+response.message+'</p>').delay( 2000 ).hide(0);
}else{
	$('#insertionResultEmp').html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	$("#save-datos-empleado :input").prop("disabled", true);
		$('#click-editar').prop("disabled", false);
	if($("#idEmp").val()==0){
	getClockResult(response.id_last);
	console.log(response.id_last);
	}	
}

},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#insertionResultEmp').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
});



})
