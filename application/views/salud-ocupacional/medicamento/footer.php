 <script>
 

$('#passLeftMedicaments').on('submit', function (e) {
e.preventDefault();
$.ajax({
url: "<?=base_url('salud_ocupacional_med/passLeftMedicaments')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$('#insertionResultMed').show();
if(response.status == 1 || response.status == 2){
$('#insertionResultMed').html('<p class="alert alert-warning">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
} else{
	$('#insertionResultMed').html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	passLeftMedData();
	$('#isPass').val(1);
	//$('.id_med').val(null).trigger("change");
	$('.clr-drg').val("");
	$('#amt_available').val(response.assign);
}

},
 
});

});

passLeftMedData();

function passLeftMedData(){

$('#passLeftMedData').html('<em>wait...</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/passLeftMedData');?>",
	data:{id_p_a:<?=$val?>, id_centro:<?=$id_cm?>},
	success: function(data){
   $("#passLeftMedData").html(data);
	},

	});
}

function listadoPatMedSaved(){

$('#passLeftMedData').html('<em>transferiendo...</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/listadoPatMedSaved');?>",
	data:{id_p_a:<?=$val?>, id_centro:<?=$id_cm?>},
	success: function(data){
   $("#listadoPatMedSaved").html(data);

	},

	});
}


$('#saveListMed').on('click', function (e) {
	e.preventDefault()
	if($('#isPass').val()==1){
	$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/saveListMed');?>",
	data:{id_p_a:<?=$val?>, id_centro:<?=$id_cm?>, nota_med:$("#nota-med").val(),id_user:<?=$id_user?>},
	success: function(data){
	passLeftMedData();
	$("#nota-med").val("");
	listadoPatMedSaved();
	listadoPatMedSavedRegistros();
	$('#isPass').val(0);
	},

	});
}
});



listadoPatMedSavedRegistros();
function listadoPatMedSavedRegistros(){

$('#listadoPatMedSavedRegistros').html('<em>transferiendo...</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/listadoPatMedSavedRegistros');?>",
	data:{id_p_a:<?=$val?>, id_centro:<?=$id_cm?>, id_user:<?=$id_user?>},
	success: function(data){
   $("#listadoPatMedSavedRegistros").html(data);

	},

	});
}






$('#clear-drug-form').on('click', function(event){
  event.preventDefault();
   $('#crudMedForm')[0].reset();
   $('#drug_action').val(0);
   $('#drug-title').html("Create a new drug");
 });


	 	$('.dateFmt').datetimepicker({
    format: 'YYYY-MM-DD'
})




$('#crudMedForm').on('submit', function (e) {
	e.preventDefault();
$.ajax({
url: "<?=base_url('salud_ocupacional_med/crudMedForm')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$('#new_drug_add').show();
if(response.status == 1){
$('#new_drug_add').html('<p class="alert alert-warning">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
} else{
	$('#new_drug_add').html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	listDrugs();
   $('#drug_action').val(0);
   $('#drug-title').html("Create a new drug");
    $('#crudMedForm')[0].reset();
	$('#amt_available').val("");
}

},
 
});
});




listDrugs();
function listDrugs(){

$('.listDrugs').html('<em>showing...</em>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('salud_ocupacional_med/listDrugs');?>",
	data:{ id_centro:<?=$id_cm?>},
	success: function(data){
   $(".listDrugs").html(data);

	},

	});
}




 </script>