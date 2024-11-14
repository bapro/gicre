  <section class="py-3">
        <div class="container">
	<div id="showError"><div>
    <div class="card py-2">
            <div class="card-body">
             <h3 class="card-title text-center">Creación de facturas ARS con NCF</h3>
			  <a  href="<?=base_url("invoice_ars_report_controller/factura_reporte_con_ars/")?>"  target="_blank" class='btn btn-xs btn-warning' >Reporte De Facturas Enviados ARS</a>
  <a  href='#' class='btn btn-xs btn-warning' data-bs-toggle="modal" data-bs-target="#reporte-ncf"  >Reporte De NCF</a>
          <div class="row g-3">
		  <hr/>
                <div class="col-md-12">
				 <span class="show-spinner-oc" style="position:fixed;top:50%;left:50%;z-index:900000"></span>
                 <label>Centro médico :</label> <input type="radio"  name="select-centro" value="privado" class="select-centro" checked /> privado  <?php if($perfil !='Medico') {?> <input type="radio" value="publico" class="select-centro" name="select-centro"/> público<?php }?>
                </div>
                <div class="col">
                  <label for="centro" class="form-label"><span class="text-danger">*</span> Centro médico</label>
                  <select id="centro" class="form-select" >
					
					</select>
                </div>
                
                <div class="col">
                  <label for="desde" class="form-label"><span class="text-danger">*</span> Desde</label>
                  <select id="desde" class="form-select" >
                   
                  </select>
                </div>
                <div class="col">
                  <label for="hasta" class="form-label"><span class="text-danger">*</span> Hasta</label>
                  <select id="hasta" class="form-select" >
                    
                  </select>
				 
                </div>
                <div class="col">
                  <label for="ars" class="form-label"><span class="text-danger">*</span> ARS</label>
                  <select id="ars" class="form-select" disabled>
                  </select>
                </div>
				  <div class="text-end py-2" id='searchFacCentPub' style="display:none">
                  <button type="button" id="ver-reporte" class="btn btn-primary btn-search-filter">Mostrar</button>
				  
                  <input id="clone-check-seguro" type="hidden" />
                </div>
              </div><!-- End Multi Columns Form -->
              
			
			<hr/>
		
          <div class="row searchb" id="hideCentroPrivado" style="display:none">
			 <div class="row g-3">
                
                <div class="col">
                  <label for="area" class="form-label">Area</label>
                  <select id="area" class="form-select" >
					
					</select>
                </div>
                
                <div class="col">
                  <label for="medico" class="form-label"><span class="text-danger">*</span> Medico</label>
                  <select id="medico" class="form-select load-medByDefault" >
                   <option value=""></option>
				          <?=$result_doctors?>
                  </select>
                </div>
                <div class="col">
                  <label for="patient" class="form-label">Paciente</label>
                  <select id="patient" class="form-select" disabled>
                    
                  </select>
				 
                </div>
                <div class="text-end py-2">
                  <button type="button" id="ver-reporte-centro-privado" class="btn btn-primary btn-search-filter">Mostrar</button>
				 
                  <input id="clone-check-seguro" type="hidden" />
                </div>
              </div>
			   </div>
			  </div>
			
          </div>
   
       <div class="card mt-3">
            <div class="card-body">
			<div id="show-report-result"></div>
		
  <div class="disabled-all">
  	 <div class="row g-3 d-flex align-items-center justify-content-center">
   <hr id="hr_ad"/>
 
    <div class="col-md-3">
        <label>NCF Asignar</label>
        <input id="ncf" class="form-control ncf"  type="text"/>
		<span class="ncf_result"></span>
    </div>
	
    <div class="col-md-3">
        <label>Vecimiento Secuencia</label>
       <input id="vencimiento-fecha" class="form-control"  type="date"/>
    </div>
	 <div class="col-md-8">
        <label>Nota</label>
        <textarea id="nota" class="form-control" ></textarea>
    </div>
	<?php if($this->session->userdata('user_perfil') !="Admin"){?>
	   <div class="text-center">
	<button type="button" id="saveTransfer" class="btn btn-primary btn-xs" disabled><i class="fa fa-save"></i> Guardar</button>
	</div>
	<?php } ?>
</div>
	</div>	
	</div>
	 </div>
     </div>
	 
	 
	
    </section>
	
	
	
		  <div class="modal fade" id="reporte-ncf" tabindex="-1">
       <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reporte General de NCF</h4>
         
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
				<div class="modal-body" >

				<div class="card-body">
				
            
				<form target="_blank" method='get'  action='<?php echo base_url("print_page/printNcf")?>'>
				 <div class="row g-3">
				<div class="col">
				<label for="medico-ncf"  class="form-label">Medico</label>
				<select class="form-select   load-medByDefault" id="medico-ncf" name='medico-ncf' >
				<option value=""></option>
				<?=$result_doctors?>

				</select>
				</div>
				<div class="col">
				<label  for="desde-ncf" class="form-label">Desde</label>
				<select class="form-select ncf-date-range" id="desde-ncf" name='desde-ncf' disabled >


				</select>
				</div>
				<div class="col">
				<label for="hasta-ncf" class="form-label">Hasta</label>
				<select class="form-control  ncf-date-range" id="hasta-ncf" name='hasta-ncf' disabled >


				</select>
         <div class="col show-btn-ncf"  style='display:none'>
				<br/>
				<button type='submit'  title="Imprimir" class="btn btn-primary btn-sm">Ver</button>
				</div>
				</div>
				
				</div>
				</form>
                
				
                </div>
				</div>
        
        </div>
      </div>
    </div>
    <?php $this->load->view('footer'); ?>

     <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>

<script>
$(document).ready(function() {

	$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%',
		allowClear: true,
		placeholder: '',
	});
	
 $(".disabled-all :input").prop("disabled", true);
	$('#centro').change(function () {
	loadDocOnCentroSelect($(this).val(), "medico");
	});
	
	
	
		$('#medico').change(function () {
$('#patient').prop("disabled", false);

});
	
	$('.select-centro').click(function () {
var checktype= $('input:radio[name=select-centro]:checked').val();
displayCentroOnSelect(checktype);

});	
	
	displayCentroOnSelect($('input:radio[name=select-centro]:checked').val());	
	
function displayCentroOnSelect(checktype){

	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_factura_controller/getCentroFacDateRange');?>",
	data:{checktype:checktype},
	success: function(data){
	$("#centro").html(data);
	$("#centro").prop("disabled",false);
	if(checktype=='privado'){
		$("#hideCentroPrivado").slideDown();
		$("#searchFacCentPub").slideUp();
	}else{
		$("#hideCentroPrivado").slideUp();
		$("#searchFacCentPub").slideDown();
		//$("#searchFacCentPub").prop("disabled",true);
		  $("#area").val("").trigger("change.select2");
		$("#medico").val("").trigger("change.select2");
		$("#patient").val("").trigger("change.select2");
	}
	getDateRanch();
	getDateRanch1();
	},

	});
	
}


function getDateRanch1(){
$.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/getDateRanch')?>",
data:{begin:1},
success:function(data){ 
$( "#desde" ).html( data );
},


});	
}


function getDateRanch(){
$.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/getDateRanch')?>",
data:{begin:0},
success:function(data){ 
$( "#hasta" ).html( data );
}
});	
}

$('#hasta').change(function () {
var hasta = $(this).val();
var desde = $('#desde').val();
$("#ars").prop("disabled",false);
if(desde < hasta){
$( ".show-spinner-oc" ).addClass("spinner-border");
//fetchCentro(hasta,desde);
fetchArea(hasta,desde);
fetchARS(hasta,desde);
//fetchMedico(hasta,desde);
fetchPatient(hasta,desde);
}else if(desde == hasta){
$( ".show-spinner-oc" ).addClass("spinner-border");
//fetchCentro(hasta,desde);
fetchArea(hasta,desde);
fetchARS(hasta,desde);
//fetchMedico(hasta,desde);
fetchPatient(hasta,desde);	
	
}

else{
$("#hasta").val("").trigger("change.select2");	
}
});

function fetchArea(hasta,desde){
var centro = $("#centro").val();
$.ajax({
type: "POST",
//url: "<?=base_url('invoiceArsClaim/invoiceAcArea')?>",
//data:{id_user:id_user,desde:desde,hasta:hasta,perfil:"<?=$perfil?>"},
url: "<?php echo site_url('general_controller/getcentEsp');?>",
data:'id_centro='+centro,
success:function(data){ 
$( "#area" ).html( data );
//$(".select2").prop("disabled",false);
//$("#load-fields").hide();
}
});	
}


function fetchARS(hasta,desde){
$.ajax({
type: "GET",
url: "<?=base_url('patient_factura_controller/invoiceARS')?>",
data:{desde:desde,hasta:hasta},
success:function(data){ 
$( "#ars" ).html( data );
//$(".select2").prop("disabled",false);
//$("#load-fields").hide();
}
});	
}

function fetchPatient(hasta,desde){
$.ajax({
type: "GET",
url: "<?=base_url('patient_factura_controller/invoicePatient')?>",
data:{desde:desde,hasta:hasta},
success:function(data){ 
$( "#patient" ).html( data );
$(".select2").prop("disabled",false);
$( ".show-spinner-oc" ).removeClass("spinner-border");
}
});	
}

$('#ver-reporte-centro-privado').click(function () {

	show_report_result_area();
	});

$("#searchFacCentPub").on('click', function () {
	show_report_result_area();

});


function show_report_result_area()
{

$("#saveTransfer").prop("disabled",true);

$("#second-table-reload").load(location.href + " #second-table-reload");
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var areas = $("#area").val();
var centro = $("#centro").val();
var medico = $("#medico").val();
var patient = $('#patient').val();
var ars = $("#ars").val();
var checktype= $('input:radio[name=select-centro]:checked').val();
if(desde > hasta){
Swal.fire({
 icon: 'error',
  html: 'No se puede seleccionar una fecha inferior a la fecha de inicio!',
});
$("#hasta").val("").trigger("change.select2");
}
else if(hasta=="" || desde==""  || ars=="" ) {
Swal.fire({
 icon: 'error',
  html: 'Los campos <span class="text-danger">*</span> Centro, <span class="text-danger">*</span> Desde, <span class="text-danger">*</span> Hasta, <span class="text-danger">*</span> ARS deben estar llenos!',
});
} else if( medico=="" && areas=="" && checktype=='privado'){
	
Swal.fire({
 icon: 'error',
  html: 'Elige uno de los campos en el segundo rango!',
});	
	
	
}
else {
	$('.btn-search-filter').prop("disabled", true);
$( ".show-spinner-oc" ).addClass("spinner-border");
$.ajax({
type: "GET",
url: "<?=base_url('invoice_ars_report_controller/get_fac_ars1')?>",
data: {desde:desde,hasta:hasta,areas:areas,ars:ars,is_admin:0,centro:centro,medico:medico,patient:patient,checktype:checktype},
cache: true,
success:function(data){
$( "#show-report-result" ).html( data ); 
$('.btn-search-filter').prop("disabled", false);
$( ".show-spinner-oc" ).removeClass("spinner-border");
},
  
});

}
}


$("#patient").on('change', function () {
	factura_by_patient();
});
function factura_by_patient()
{
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var areas = $("#area").val();
var centro = $("#centro").val();
var medico = $("#medico").val();
var patient = $('#patient').val();
var checktype= $('input:radio[name=select-centro]:checked').val();
var ars = $("#ars").val();
	if(desde > hasta){

Swal.fire({
 icon: 'error',
  html: 'No se puede seleccionar una fecha inferior a la fecha de inicio!',
});


$("#hasta").val("").trigger("change.select2");
}
else if (hasta=="" || desde=="" || centro=="" || patient=="") {	
Swal.fire({
 icon: 'error',
  title: 'Los campos Hasta, Desde, Centro, Paciente deben estar lleno!',
});
} else{
$("#saveTransfer").prop("disabled",true);
$("#second-table-reload").load(location.href + " #second-table-reload");
$("#show-report-result").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>')

$.ajax({
type: "GET",
url: "<?=base_url('invoice_ars_report_controller/get_fac_ars1')?>",
data:{desde:desde,hasta:hasta,areas:areas,ars:ars,centro:centro,
medico:medico,patient:patient,checktype:checktype},
cache: true,
 success:function(data){ 
$( "#show-report-result" ).html( data );
},

});
}
}



$("#medico-ncf").on('change', function () {
	$.ajax({
	type: "POST",
	url: '<?php echo site_url('invoice_ars_report_controller/ncfDateRange');?>',
	data:{id_user:$(this).val()},
	success: function(data){
	$(".ncf-date-range").html(data);
	$(".ncf-date-range").prop('disabled',false);
	},
	 
	});	
});	

$("#hasta-ncf").on('change', function () {
	$('.show-btn-ncf').show();
});


	
		
	$('#saveTransfer').on('click', function(event) {
$('#saveTransfer').prop('disabled',true);

var id_fac = [];
	 $('.copy-one').each(function(){  
                if($(this).is(":checked"))  
                {  
                     id_fac.push($(this).val());  
                }  
           });		
	
var ncf = $("#ncf").val();
var nota = $("#nota").val();
var vencimientoFecha = $("#vencimiento-fecha").val();
 var desde = $("#desde").val();
 var hasta = $("#hasta").val();
$.ajax({
type: "POST",
url: "<?=base_url('invoice_ars_report_controller/saveInvoiceArsClaim')?>",
data:{id_fac:id_fac, ncf:ncf, nota:nota, vencimientoFecha:vencimientoFecha,desde:desde, hasta:hasta},
dataType: 'json',
cache: false,
 success:function(response){ 
 if(response.status ==0){
	Swal.fire({
 icon: 'warning',
html: response.message,
}) 
$('#saveTransfer').prop('disabled',false);
 }else if(response.status ==-1){
		Swal.fire({
 icon: 'error',
html: response.message,
})
$('#saveTransfer').prop('disabled',false); 
 }else{
Swal.fire({
	allowOutsideClick: false,
  icon: 'success',
  title: 'Datos guardados con éxito!',
}).then((result) => {
  if (result.isConfirmed) {
window.location.href = "<?php echo site_url('invoice_ars_report_controller/patient_invoice_ncf');?>/" + response.last_id_ncf  + "/" +desde + "/" +hasta;	  
	 
  }
})
 }

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showError').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
 <?php $this->load->view('linked-selected-functions');?>

</body>

</html>