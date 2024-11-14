<style>
.search-result {
  background-image: url('<?= base_url();?>assets/img/medica.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

</style>

<div class="container"> 
 <h1>FARMACIA INTERNA</h1>
 <div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <div class="alert alert-info">
  <strong>Buscador de paciente con KARDEX.</strong>
</div>
 <div class="form-group sumges">

  <div class="col-lg-2">
   <label class="control-label">Buscar  por NEC</label>
 <div class="input-group">
	   <span class="input-group-addon">NEC-</span>
<input autocomplete="off" id="searchnec" type="text" class="form-control" style="width:90px" data-mask="000000"/>

</div>


  </div>
 <div class="col-lg-10">
 
 
 <form class="form-inline" >
  <label class="control-label">Buscar por nombres</label>
<br/>
<input id="10searchNombreNotaEd" placeholder="nombres" style="width:80%" type="text" class="form-control" >

 </form>
 
 <div id="suggesstion-box-"></div>
 
  </div>
<br/><br/>
 </div>
</div>
<div class="col-md-12">
<hr/>
<h1>RECEPCION DE PETICIONES</h1>

<div id="display-patient-data"></div>

</div>
</div>
</div>
 <?php 


$this->load->view('footer');


?>


<div class="modal fade" id="edit_almacen"  role="dialog" >
<div class="modal-dialog lg" >
<div class="modal-content" >

</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>




var textInput = document.getElementById('searchnec');

// Init a timeout variable to be used below
var timeout = null;

// Listen for keystroke events
textInput.onkeyup = function (e) {

    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout);

    // Make a new timeout set to go off in 800ms
    timeout = setTimeout(function () {
       // console.log('Input Value:', textInput.value);
	   if(textInput.value !=""){
	   searchBynec(textInput.value);
	   }
    }, 500);
};


function searchBynec(str){

$("#display-patient-data").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

 $.ajax({
type: "GET",
url: "<?=base_url('internal_drugstore/searchPatientRecord')?>",
data: {id:str, iduser:<?=$iduser?>, id_centro:<?=$id_centro?>},
success:function(data){
$("#display-patient-data").html(data);
$("#suggesstion-box-").hide();
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#display-patient-data").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});




};





$("#10searchNombreNotaEd").keyup(function(){
var name = $(this).val();
if(name !=""){
$.ajax({
type: "POST",
url: "<?=base_url('internal_drugstore/searchPatientNombre')?>",
data:{keyword:name, iduser:<?=$iduser?>},
success: function(data){
setTimeout(function() {
$("#suggesstion-box-").show();
$("#suggesstion-box-").html(data);
}
, 1000);
},

});
}else{
$("#suggesstion-box-").hide();	
}
});


</script>