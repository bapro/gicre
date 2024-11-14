<h2>CREACION DE CUENTAS PARA MEDICOS</h2>
<form>
<div id='send-succed'></div>
  <div class="form-group row">
    <label for="nombres" class="col-sm-2 col-form-label">Nombres Y Apellidos<strong style='color:red'>*</strong></label>
    <div class="col-sm-5">
	<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
    <input type="text" class="form-control clear" id="nombres" placeholder="Nombres Y Apellidos" autofocus>
    </div>
    </div> 
  </div>
  <!--<div class="form-group row">
    <label for="especialidad" class="col-sm-2 col-form-label">Especialidad <strong style='color:red'>*</strong></label>
    <div class="col-sm-5">
	  	<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-medkit" aria-hidden="true"></i></span>
    	<select class="form-control select2" id="especialidad" >
	<option value=''></option>
	<?php 

	foreach($especialidades as $row)
	{ 
	echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
	}
	?>
	</select>
    </div>

    </div>
  </div>-->
  <div class="form-group row">
    <label for="doc-email" class="col-sm-2 col-form-label">Correo Electrónico <strong style='color:red'>*</strong></label>
    <div class="col-sm-5">
	<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
     <input type="text" class="form-control clear" id="doc-email" placeholder="Correo Electrónico">
    </div>
    </div>
  </div>
  
   <div class="form-group row">
    <label for="codigo-generado" class="col-sm-2 col-form-label"  >Número De Teléfono <strong style='color:red'>*</strong> </label>
    <div class="col-sm-5">
     	<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-whatsapp" style='color:green;strong-size:17px' aria-hidden="true"></i></span>
     <input type="text" class="form-control clear" id="phone" placeholder="Número De Teléfono">
    </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-5">
      <button type="button" id="enviar-codigo" class="btn btn-primary btn-success">Crear</button>
    </div>
  </div>
</form>
<hr style="height:1px;border-width:0;color:gray;background-color:#c0c0c0"/>
<div id='listado'>


</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
document.getElementById('phone').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

$(document).ready(function() {
	
$('.select2').select2({ 
placeholder: "Seleccionar La Especialidad",

});		
		
		
function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(16);
  });
}



listadoDeCodigosGenerados();
function listadoDeCodigosGenerados(){
	$.ajax({
url:"<?php echo base_url(); ?>affiliated/listadoDeCodigosGenerados",
data: {id_user:<?=$id_user?>},
method:"POST",
success:function(data){

$('#listado').html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#listado').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}

$("#enviar-codigo").on('click', function(event) {
event.preventDefault();
var phone =$("#phone").val();
var correo =$("#doc-email").val();
var nombres =$("#nombres").val();
$.ajax({
url:"<?php echo base_url(); ?>affiliated/saveAffiliated",
data: {codigo:uuidv4(),correo:correo,id_user:<?=$id_user?>,nombres:nombres,phone:phone},
method:"POST",
 dataType: 'json',
success:function(response){
$('html,body').animate({
   scrollTop: $("#send-succed").offset().top
});
 if(response.status == 0){
$('#send-succed').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else if(response.status == 1){
$('#send-succed').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else if(response.status == 2){
$('#send-succed').html('<p class="alert alert-warning ">'+response.message+'</p>');
}
else if(response.status == 21){
$('#send-succed').html('<p class="alert alert-warning ">'+response.message+'</p>');
}
else if(response.status==3){
$('#send-succed').html('<p class="alert alert-success ">'+response.message+'</p>');
$(".clear").val("");
$('.select2').val(null).trigger('change');
listadoDeCodigosGenerados();
}else if(response.status==4){
	$('#send-succed').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
}
});
});

$('#nombres').on('keyup', function(event) {
	$('#nombres').val(capitalizeTheFirstLetterOfEachWord($('#nombres').val()));	
});


function capitalizeTheFirstLetterOfEachWord(words) {
   var separateWord = words.toLowerCase().split(' ');
   for (var i = 0; i < separateWord.length; i++) {
      separateWord[i] = separateWord[i].charAt(0).toUpperCase() +
      separateWord[i].substring(1);
   }
   return separateWord.join(' ');
}




});
</script>
