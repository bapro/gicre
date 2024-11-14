
    <section class="py-3">
        <div class="container">
		<div class="scroll-to-me"></div>
            <div class="alert alert-primary" role="alert">
                Usted tiene una cuenta gratuita !
            </div>
		 <?php $this->load->view('patient/factura/header-privado');?>
  

            <div class="card my-3 ">
                <div class="card-body">
				
				<!--<button class="btn btn-primary onpenCanvasEnfAct" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Diagramas</button>-->
		<div class="offcanvas offcanvas-end " style="width:" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Eliminar factura #<em><?=$idfacc?></em></h5>
			<em class="text-danger">La factura será eliminada con todos sus artículos</em>
            <button type="button" class="btn saveDiagramOnCloseEnf" data-bs-dismiss="offcanvas"><i class="bi bi-x fs-2"></i></button>
          </div>
          <div class="offcanvas-body">
		 
    
						<div class='form-floating mb-3'>
						
						<textarea class='form-control cl-ord-med-study reasonToCancelTableDFac'  placeholder='Porque lo quiere eliminar?' ></textarea>
						<label>Porque lo quiere eliminar?</label>
						</div>
						<button class='btn btn-sm btn-danger float-end m-1 save-cancel-fac' type="button">Guardar</button>
						<!--<button class='btn btn-sm btn-secondary float-end m-1 anular-cancel-fac' >Cancel</button>-->
         
          </div>
        </div>
                   
					<input value="<?=$tasa_cambio?>" type="hidden" id="tasa_cambio" />
					<input value="<?=$tipo_monena?>"  type="hidden" id="tipo_monena" />
					
					
					<div class="row">
				<div class="col">
	      <h3 class="">Factura #<?=$idfacc?></h3>
             </div>
			
				<div class="col">
				
				<div class="text-end">
				 <?php
	 if($tipo_monena=="RD$"){ ?>
			

				<input id="monto-cambiado" type="hidden" />
				<div class="form-check form-check-inline">
				<label class="form-check-label" for="inlineCheckbox1"><img  width="20"  src="<?=base_url()?>/assets_new/img/300164.png"  /></label>
				</div>
				 <?php }elseif($tipo_monena=="USD$") { ?>
				<div class="form-check form-check-inline">
				<label class="form-check-label" for="inlineCheckbox2"><img  width="20"  src="<?=base_url()?>/assets_new/img/206626.png"  /></label>
				<small ><?=$tasa_cambio?></small>
				</div>
					 <?php }else { ?>
				<div class="form-check form-check-inline">
					<label class="form-check-label" for="inlineCheckbox3"><img  width="20"  src="<?=base_url()?>/assets_new/img/5111601.png"  /></label>
					<small ><?=$tasa_cambio?></small>
				</div>
				<?php }?>
			
				</div>
				<button type="button" class="btn btn-sm btn-danger button_delete_tarifarios float-end m-2" title="Eliminar la factura #<?=$idfacc?>"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" ><i class="bi bi-x-circle-fill"></i> Eliminar Factura</button>
                   </div>
				   
				</div>
					
					
					
					
					

                    <div class="table-responsive">
					
                        <table class="table table-sm table-striped mb-0 text-start" id="table-tarifario">
						
							
                            <thead>
						
                                <tr class="bg-th">
                                    <th >
										<?php
										
										echo $tipo_tarifario. ' <span class="text-danger">*</span>';
										  ?>
									
									</th>
                                    <th>Cantidad <span class="text-danger">*</span></th>
                                    <th>Precio Unitario <span class="text-danger">*</span></th>
                                    <th>Sub-Total</th>
									<?php if($values_container_decrpyted['seguroId'] !=11){?>
									<th >Total Pagar Seguro</th>
									<?php } ?>
									 <th>Descuento</th>
                                    <th>Total Pagar Paciente</th>
									 <th colspan='3'> <button class="btn btn-sm btn-outline-secondary" type="button" id="cancel-action" style="display:none" ><i class="bi bi-x-lg"></i> Cancelar</button></th>
									
                                </tr>
                            </thead>
						     
                            <tbody id="new-factura-inputs">
                             
							</tbody>
									  
				 
								             
							  <tfoot id="list-of-previos-facturas">
							
								  </tfoot>	
                        
                        </table>
                    </div>
                </div>
            </div>
   <?php $this->load->view('patient/factura/modalidad-de-pago');?>
          
			


<input id="id_facc" value="<?=$idfacc?>" type="hidden" />
 <input id="patient_seguro_from_factura" value="<?=$factura_row1['seguro_medico']?>" type="hidden" />
 
  <input id="medico" value="<?=$factura_row1['medico']?>" type="hidden" />
  

  <input id="centro" value="<?=$factura_row1['centro_medico']?>" type="hidden" />
  <input id="patient_doc_area_from_factura" value="<?=$get_doctor_info_by_id['area']?>" type="hidden" />
 
 <input id="seguro-title" value="<?=$get_patient_seguro_info_by_id['title']?>" type="hidden" />
 <input id="patient-seguro-plan" value="<?=$get_patient_info_by_id['plan']?>" type="hidden" />
  <input id="centro_type" value="<?=$centro_type?>" type="hidden" />
    <input id="get_controller_name_to_search_tarifarios_precios" value="<?=$controller_to_search_tariff_monto?>" type="hidden" />
   <input id="id_to_update" value="0" type="hidden" />
   <input id="tot-paciente-grand-total-unformat" type="hidden"  />
<div class="loadf position-fixed top-50 start-50"></div> 
<input id="type-of-money-factura" type="hidden" value="<?=$tipo_monena?>" />
        </div>
		<input id="show-num-fac" type="hidden" />
		<div id="showThisEr"></div>
		<?php
		$link_to_create_invoice = $this->session->userdata('link_to_create_invoice');
		?>
		<input id="redirect-after-invoice-cancelation" type="hidden" value="<?= base_url("$USER_CONTROLLER/create_invoice/$link_to_create_invoice") ?>" />
		
    </section>
  <?php $this->load->view('footer');?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
     <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script>
var facturaMoneyType = $("#type-of-money-factura").val();
	
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

	var getTarifData = $("#getTarifData").val();

$(function () {

$(".clear-all-mod-pag-values").on("keyup blur", ".form-control", reduceTotal);

});
	
	
	function reduceTotal(){
	var grandTotPagPatient = $("#tot-paciente-grand-total-unformat").val();
	 var sum_amount = 0;
	 
  $('.reduce-total').each(function(){
	  
	  sum_amount += +$(this).val();
   
  })

  var result = grandTotPagPatient - sum_amount;
   $('#pendiente-de-caja').val(result.format(2));
 
 
	}














function recalculateTotalPatientPrice(){
	var newTot = parseInt($("#tot-paciente-grand-total").html().replace(/\,(\d\d)$/, ".$1").replace(',',''));
var oldTot = parseInt($('input.total-pag-pa').val().replace(/\,(\d\d)$/, ".$1").replace(',',''));
 var result = newTot + oldTot;
 $("#tot-paciente-grand-total-unformat").val(result); 
$("#pendiente-de-caja").val(result.format(2));
$("#tot-paciente-grand-total").html($("#pendiente-de-caja").val());
}

function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };




function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;

if (event.keyCode == 8 || event.keyCode == 46
 || event.keyCode == 37 || event.keyCode == 39) {
    return true;
}
else if ( key < 48 || key > 57 ) {
    return false;
}
else return true;
};


$(function () {
$("#table-tarifario").on("click", ".calculation", recalc);
$("#table-tarifario").on("keyup blur", ".form-control", recalc);

});


function recalc() {
	$('.clear-all-mod-pag-values').find('input').prop('disabled', false);
	$('.clear-all-mod-pag-values').find('input').not("#pendiente-de-caja").val('');
	$('#save_factura').prop('disabled', false);
var tt = 0,
dd = 0;
pp = 0;
ss = 0;
$("#table-tarifario").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;

//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(result1.toFixed(2) ? result1.toFixed(2) : "");
var totpatpag = result1.toFixed(2) ? result1.toFixed(2) : "";
$(this).find('span.totpapat-n').html(facturaMoneyType + totpatpag);
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
var totserv =  dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "";
$(this).find('span.subtotal-n').html(facturaMoneyType+totserv);
tt += isNumber(dateTotal) ? dateTotal : 0;
ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(result1) ? result1 : 0;
}); //END .each
$("#table-grand-total").html(tt.format(2));
$("#sub-total").val(tt.format(2)); 
$("#seguro-grand-total").html(ss.format(2)); 
$("#total-pago-seguro").val(ss.format(2));  
$("#descuento-grand-total").html(dd.format(2));
$("#descuento1").val(dd.format(2));  
$("#tot-paciente-grand-total").html(pp.format(2)); 
$("#total-pagar-paciente").val(pp.format(2)); 
  
$("#tot-paciente-grand-total-unformat").val(pp);  
$("#pendiente-de-caja").val(pp.format(2));


}

function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}





 factura_table_view();
 
 function factura_table_view()
{

$.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/getOfPreviosFacturas')?>",
data: {id_facc:$("#id_facc").val(), patient_seguro_from_factura:$("#patient_seguro_from_factura").val(), centro_type:$("#centro_type").val(),privado:1},
success:function(data){ 
$(".loadf").removeClass("spinner-border");	
$("#list-of-previos-facturas").html(data);
//$('#change-header-fac').prop("disabled",false);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showThisEr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});

}





	

$(document).on('click', '#save_factura', function(event) {
$('#save_factura').prop("disabled", true);
var cant = $('input.cantidad').val();
var prec = $('input.precio').val();
var pendienteCaja = $('#pendiente-de-caja').val();
var tarjeta =$('#tarjeta').val();
var transferencia= $('#transferencia').val();
var  effectivo =$('#effectivo').val();
var  cheque=$('#cheque').val();
var checqueNumero =$('#checque-numero').val();

var tsubtotal = $('#sub-total').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var idFact = $('#id_facc').val();
var eachIdFac = [];
var cantidad = [];
var precio = [];
var total = [];
var descuento = [];
var totpapat = [];
var totalpaseg= [];

$('input.total-pag-seg').each(function(){
totalpaseg.push($(this).val());
});

$('input.each-factura-id').each(function(){
eachIdFac.push($(this).val());
});

$('input.cantidad').each(function(){
cantidad.push($(this).val());
});
$('input.precio').each(function(){
precio.push($(this).val());
});
$('input.row-total').each(function(){
total.push($(this).val());	
});


$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});
var modalidadId = $('#modalidadDePagoId').val();

$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/updateFactura')?>",
data: {
	 cantidad:cantidad,preciouni:precio,tsubtotal:tsubtotal,totalpaseg:totalpaseg,
	 totsubdesc:totsubdesc,totpagpa:totpagpa,subtotal:total,descuento:descuento,eachIdFac:eachIdFac,
    totpapat:totpapat,cant:cant,prec:prec,idFact:idFact,
pendienteCaja:pendienteCaja, tarjeta:tarjeta, transferencia:transferencia,
 effectivo:effectivo, cheque:cheque, checqueNumero:checqueNumero, modalidadId:modalidadId},
success:function(response){
if(response.status == 1){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
$('#save_factura').prop("disabled", false);
}
else if (response.status == 6){
	$('.loadf').html('<p class="alert alert-success ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
	setTimeout(function() {
       
         factura_table_view();
        }, 1500)


}else{
	$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showThisEr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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








 $(document).on('click', '.button_delete_tarifarios', function(event){ 
  $('html, body').animate({
        scrollTop: $(".scroll-to-me").offset().top
    }, 0);
	 var id_fact = $(this).attr('id');
	$('#num-fac').html(id_fact);
	$('.show-text-area-reason-cancel-fac').show(); 
	});	




 $('.save-cancel-fac').on('click', function(event){ 
var reasonToCancelTable=$(".reasonToCancelTableDFac").val();

if (reasonToCancelTable !="")
{ 

   var idFac= $("#id_facc").val();
var redirect= $("#redirect-after-invoice-cancelation").val();
   $.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/cancelInvoice')?>",
data: {id_facc:idFac,reazon:reasonToCancelTable.trim()},
success:function(data){
	if(data==1){
	window.location.href = redirect;
	}else{
		alert('Error');
	}
	
},
  
});
}
});


$(document).on('click', '#update_factura_fecha_com', function(event) {
event.preventDefault();

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/update_factura_fecha_com')?>",
data: {idfacc:$("#id_facc").val(),fecha:$("#fecha-fac").val(),comment:$("#comment").val(),numauto:$("#numauto").val(), autopor:$("#autopor").val()
},
cache: true,
success:function(response){ 
if(response.status == 0){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');;
}else{
$('.loadf').html('<p class="alert alert-success ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');;
}
},

   
});

});



</script>
</body>

</html>