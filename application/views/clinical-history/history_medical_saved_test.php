<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="<?= base_url();?>assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <link href="<?= base_url();?>assets2/css/style.css?rnd=3" rel="stylesheet">

 <title>GICRE</title>
	<style>
	body{padding-bottom: 90px;}
.fs-7 { font-size: .5rem!important; }
.btn-back{left:0; top: 22px;}
@media screen and (max-width: 768px) {
    .btn-back{left:auto; right:50%}
  }
  
  
  
	</style>

</head>
    <body>

      <main>

<div class="container  d-flex justify-content-center">
 <div class="col-5">
        <div class="row">
          <div class="card">
		  <br/>
           <div class="alert alert-success text-center fs-1" role="alert">
              La historia clínica ha sido guardada con éxito!
              </div>
			  
			  <div class="d-flex">
			  <div class="flex-fill">
			 <?=$patient_photo_large?>
			 </div>
			  <div class="flex-fill">
			  <strong>NEC:</strong> <?=$get_patient_info_by_id['id_p_a']?><br>
			 <strong>NOMBRES:</strong> <?=$get_patient_info_by_id['nombre']?><br>
			 <strong>CEDULA:</strong> <?=$get_patient_info_by_id['cedula']?><br>
			 <strong>EDAD:</strong> <?=$patient_age?><br>
			 </div>
			 </div>
            <div class="card-body">
			<div class="alert alert-info text-center" role="alert">
               Desea realizar otra cita?
			   	 <button type="button" class="btn btn-success si">Si</button>
             <button type="button" id="go-back-to-list" class="btn btn-primary">No</button>
		
			 </div>
			 <form style="display:none" class="cita" id="save-cita-form">
			 <h3>Programar Proxima Cita</h3>
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Causa</span>
  <input type="text" class="form-control" placeholder="Causa" name="cita-causa" id="cita-causa" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
 <span class="input-group-text" id="basic-addon2">Fecha <span class="text-danger">*</span></span>
  <input type="date" class="form-control" name='cita-fecha' id='cita-fecha' aria-describedby="basic-addon2">
 
</div>

<div id="horario-info"></div>


<div id="horario-error"></div>
<hr/>
<button class="btn btn-primary btn-save-cita btn-sm" type="submit" id="save-cita-btn"><i class="fa fa-save"></i>
GUARDAR <div class="save-spiner"></div> </button>
<input type="hidden" name="cita-id" value="0"  />
<input type="hidden" name="cita_centro" value="<?=$id_centro?>"  />
<input name="dayNumber" id="dayNumber" type="hidden"/>	
<input name="cita-doc"  type="hidden" value="<?=$this->session->userdata('user_id')?>"/>
<input name="cita_created_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input name="cita_updated_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input name="cita_updated_by"  type="hidden" value="<?=$this->session->userdata('user_id')?>"/>
<input name="cita_created_by"  type="hidden" value="<?=$this->session->userdata('user_id')?>"/>
<input type="hidden" name="id_patient" value="<?=$id_patient?>"  />
</form>
		 
            </div>
          
          </div>


 </div>
        </div>
 </div>
      </main><!-- End #main -->

      <!-- Template Main JS File -->
    <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
      <script>
        $(document).ready(function() {



$('.si').on('click', function () {

	$('.cita').show();
});

$('#cita-fecha').on('change', function(e) {
	
var dayNumber = new Date($(this).val()).getUTCDay();
  var fecha_propuesta = $(this).val()
 var centro_medico = <?=$id_centro?>;
  var doctor = <?=$this->session->userdata('user_id')?>;
  if(dayNumber==0){
	  dayNumber=7;
  }else{
	dayNumber=dayNumber;  
  }
  searchDocSchedule(dayNumber,fecha_propuesta,centro_medico, doctor);
   
});



function searchDocSchedule(dayNumber,fecha_propuesta,centro_medico, doctor){
	
	$.ajax({
type: "POST",
url: "<?=base_url('searchDocScheldureAppController/daySelected')?>",
data: {dayNumber:dayNumber,fecha_propuesta:fecha_propuesta,centro_medico:centro_medico, doctor:doctor},
cache: true,
beforeSend: function() {
						$("#horario-info").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
success:function(data){ 
$("#horario-info").removeClass("spinner-border");
$( "#horario-info").html(data); 
$("#dayNumber").val(dayNumber);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('operación fallida!');


},
  
});
  
	
}


$('#go-back-to-list').on('click', function(event){
	event.preventDefault();
window.location.href = "<?php echo base_url(); ?>medico/appointments";
});


$('#save-cita-form').on('submit', function(event){
event.preventDefault();

if($("#cita-causa").val()==""){
	$("#cita-causa").val("...");
}

$.ajax({
url:"<?php echo base_url(); ?>patient_cita_controller/saveNewCita",
method:"POST",
data:new FormData(this),
dataType: 'json',
contentType:false,
cache:false,
processData:false,
beforeSend: function(){
$('.save-spiner').html('guardando... ').addClass('fa fa-spinner').css("font-size", "9px");
$('#save-cita-btn').prop("disabled",true);
},
success:function(response){
if(response.status == 0){
Swal.fire({
icon: 'warning',
html: "La fecha es obligatoria.",
});
$('.save-spiner').html('').removeClass('fa fa-spinner'); 	
$('#save-cita-btn').prop("disabled",false);
}
else if(response.status == 1){
Swal.fire({
icon: 'success',
html: "Cita Realizada. Mensaje enviado al paciente por WhatsApp.",
});
$('#save-cita-btn').prop("disabled",true);
   setTimeout(function() {
      window.location.href = "<?php echo base_url(); ?>medico/appointments";
        }, 2000);

}else if(response.status == 3){
Swal.fire({
icon: 'warning',
html: response.message,
});
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#save-cita-btn').prop("disabled",false);
}else{
Swal.fire({
icon: 'warning',
html: response.message,
});
$('.save-spiner').html('').removeClass('fa fa-spinner'); 
$('#save-cita-btn').prop("disabled",false);
}
},
error: function(jqXHR, textStatus, errorThrown) {
alert('operación fallida!');
$('#erBoxCita').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

});




		  
        });
      </script>
    </body>

    </html>
	
