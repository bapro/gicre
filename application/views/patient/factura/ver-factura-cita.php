
    <section class="py-3">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                Usted tiene una cuenta gratuita !
            </div>
			
        <?php $this->load->view('patient/factura/header-privado');?>
		
  

            <div class="card my-3 scroll-to-me">
                <div class="card-body ">
                   <div class="row g-2">
				  <div class="col-sm">
					<label class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" id="fecha-fac" value="<?=$factura_row1['fecha']?>" class="form-control form-control-sm">
					</div>
					<div class="col-sm">
					<label class="form-label">No autorización <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numauto" value="<?=$factura_row1['numauto']?>">
					</div>
					<div class="col-sm">
					<label class="form-label">Autorizado por <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="autopor" value="<?=$factura_row1['autopor']?>">
					</div>
					
					<div class="col-sm-5">
					<label class="form-label">Comentario</label>
                            <textarea  class="form-control form-control-sm"  id="comment" ><?=$factura_row1['comment']?></textarea>
							
					</div>
					<div class="col-sm mt-5">
					
					<button  class="btn btn-sm btn-primary" type="button" id="update_factura_fecha_com" >Guardar</button>
					</div>
					</div>
                </div>
            </div>

            <div class="card my-3 ">
                <div class="card-body">
				<!--<button class="btn btn-primary onpenCanvasEnfAct" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Diagramas</button>-->
		<div class="offcanvas offcanvas-end " style="width:" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Eliminar factura #<em id="num-fac"></em></h5>
            <button type="button" class="btn saveDiagramOnCloseEnf" data-bs-dismiss="offcanvas"><i class="bi bi-x fs-2"></i></button>
          </div>
          <div class="offcanvas-body">
		 
    
						<div class='form-floating mb-3'>
						
						<textarea class='form-control cl-ord-med-study reasonToCancelTableDFac'  placeholder='Porque lo quiere eliminar?' ></textarea>
						<label>Porque lo quiere eliminar?</label>
						</div>
						<button class='btn btn-sm btn-danger float-end m-1 save-cancel-fac'>Guardar</button>
						<!--<button class='btn btn-sm btn-secondary float-end m-1 anular-cancel-fac' >Cancel</button>-->
         
          </div>
        </div>
                    <h3 class="mb-3 ">Factura</h3>
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
									<th>Total Pagar Seguro</th>
                                    <th>Descuento</th>
                                    <th>Total Pagar Paciente</th>
									 <th colspan='3'> <button class="btn btn-sm btn-outline-secondary" type="button" id="cancel-action" style="display:none" >Cancelar</button></th>
									
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

          


<input id="id_facc" value="<?=$idfacc?>" type="hidden" />
 <input id="patient_seguro_from_factura" value="<?=$factura_row1['seguro_medico']?>" type="hidden" />
 
  <input id="medico" value="<?=$factura_row1['medico']?>" type="hidden" />
  

  <input id="centro" value="<?=$factura_row1['centro_medico']?>" type="hidden" />
  <input id="patient_doc_area_from_factura" value="<?=$get_doctor_info_by_id['area']?>" type="hidden" />
 
 <input id="seguro-title" value="<?=$get_patient_seguro_info_by_id['title']?>" type="hidden" />
 <input id="patient-seguro-plan" value="<?=$get_patient_info_by_id['plan']?>" type="hidden" />
  <input id="centro_type" value="<?=$centro_type?>" type="hidden" />
<div class="loadf position-fixed top-50 start-50"></div> 
<?php
if($get_centro_info_by_id['type']=='privado') {
 $controller='get_service_precio';
}else{
 $controller='get_service_precio_centro';
}

?>
<input id="get_controller_name_to_search_tarifarios_precios" type="hidden" value="<?=$controller?>" />
 <input id="id_to_update" value="0" type="hidden" />
        </div>
    </section>
  <?php $this->load->view('footer');?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>

	
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};


	function getTarifData(dropDown) {
var nap_state =$('#nap_state').val();
var controller = $('#get_controller_name_to_search_tarifarios_precios').val();
 $(".loadf").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
var doctorid =437;
$.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('consult_tarifario_por_web_service_controller');?>/" + controller,
data:{id_mssm1:dropDown.value, nap:0, nap_state:0},
success: function(result){
if(result.nap_state = 1){
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.precio);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);
}else{
($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);	
}

recalc();

 $(".loadf").removeClass('spinner-border');

},

});

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
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#table-tarifario").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
//wt += isNumber(p) ? parseInt(p, 10) : 0;
//lt += isNumber(c) ? parseInt(c, 10) : 0;
tt += isNumber(dateTotal) ? dateTotal : 0;
ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
}); //END .each
//$("#cantidad-grand-total").html(lt.toFixed(2));
//$("#precio-grand-total").html(wt.toFixed(2));
$("#table-grand-total").html(tt.format(2));
$("#sub-total").val(tt.format(2));
$("#seguro-grand-total").html(ss.format(2)); 
$("#total-pago-seguro").val(ss.format(2));  
$("#descuento-grand-total").html(dd.format(2));
$("#descuento1").val(dd.format(2));  
$("#tot-paciente-grand-total").html(pp.format(2));
$("#tot-paciente-grand-total-unformat").val(pp);  
$("#total-pagar-paciente").val(pp.format(2)); 
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
data: {id_facc:$("#id_facc").val(), patient_seguro_from_factura:$("#patient_seguro_from_factura").val(),centro_type:$("#centro_type").val(),privado:0},
success:function(data){ 
$(".loadf").removeClass("spinner-border");	
$("#list-of-previos-facturas").html(data);
//$('#change-header-fac').prop("disabled",false);
},
  
});

}


$(document).on('click', '#agregar_new_fac', function(event) {
event.preventDefault();
var cantidad =$('input.cantidad').val();
var total =$('input.row-total').val();

var totalpaseg =$('input.total-pag-pa').val();

var descuento =$('input.descuento').val();

var totpapat =$('input.total-pag-pa').val();
var totpagseg = $('input.total-pag-seg').val();

var precio =$('input.precio').val();
var service =$('.get-tarif-data').val();


$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/addNewFactura')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,area_id:$("#patient_doc_area_from_factura").val(),
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,idfacc:$("#id_facc").val(),id_to_update:$("#id_to_update").val(),
medico:$("#medico").val(),seguro:$("#patient_seguro_from_factura").val(),centro:$("#centro").val(),pendienteCaja:'0.00'

},
cache: true,
success:function(response){ 
if(response.status == 1){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');;
}else{
factura_table_view(); 
 $("#id_to_update").val(0);
 $("#cancel-action").hide();
 $('#table-tarifario').find('input[type=text]').each(function(){
        $(this).val("");
		$('.get-tarif-data').val(null).trigger('change');
    });
}
},
});

});	


$(document).on('click', '#update_factura', function(event) {
event.preventDefault();
var cantidad =$('input.cantidad').val();

var precio =$('input.precio').val();
var service =$('.get-tarif-data').val();
if(service =="" || cantidad == "" || precio == "" )
{
alert("Servicio, cantidad, precio unitario son requeridos !")

}
else
{


var total =$('input.row-total').val();

var totalpaseg =$('input.total-pag-seg').val();

var descuento =$('input.descuento').val();

var totpapat =$('input.total-pag-pa').val();


$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/updateFactura')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,subtotal:total,totalpaseg:totalpaseg,
descuento:descuento,totpapat:totpapat,idfacc:$("#id_facc").val(),id_to_update:$("#id_to_update").val()
},
cache: true,
success:function(response){ 
if(response.status == 1){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');;
}else{
factura_table_view();
$("#agregar_new_fac").show(); 
 $("#id_to_update").val(0);
 $("#cancel-action").hide();
  $("#update_factura").hide();
 $('#table-tarifario').find('input[type=text]').each(function(){
        $(this).val("");
		$('.get-tarif-data').val(null).trigger('change');
    });
}
},
   
});
}

});	







 new_factura_input();
 
 function new_factura_input()
{

$(".loadf").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");	

$.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/new_factura_input')?>",
data: {seguroTitle:$("#seguro-title").val(), value:0, medico:$("#medico").val(),id_facc:$("#id_facc").val(),centro_type:$("#centro_type").val(), 
seguro:$("#patient_seguro_from_factura").val(),centro:$("#centro").val(),patientPlan:$("#patient-seguro-plan").val(),privado:0},
success:function(data){ 
$(".loadf").removeClass("spinner-border");	
$("#new-factura-inputs").html(data);
//$('#change-header-fac').prop("disabled",false);
},
  
});

}


$('#cancel-action').on('click', function(event) {
event.preventDefault();
 $('#cancel-action').hide();
 $("#id_to_update").val(0);
new_factura_input();
});



$(document).on('click', '.button_edit_tarifarios', function(event) {
 event.preventDefault();
 var id_to_update = $(this).attr('id');
  
 $('html, body').animate({
        scrollTop: $(".scroll-to-me").offset().top
    }, 0);
$(".loadf").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");	


 $("#id_to_update").val(id_to_update);
 $.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/new_factura_input')?>",

data: {seguroTitle:$("#seguro-title").val(), value:1, medico:$("#medico").val(),id_facc:$("#id_facc").val(),centro_type:$("#centro_type").val(), 
seguro:$("#patient_seguro_from_factura").val(),centro:$("#centro").val(),patientPlan:$("#patient-seguro-plan").val(),privado:0,id_to_update:id_to_update},

cache: true,
success:function(data){
$(".loadf").removeClass("spinner-border");	
$("#new-factura-inputs").html(data);
 $("#cancel-action").show();
$("#agregar_new_fac").hide();
}  
});
})

$(document).on('click', '#table-tarifario tr', function(event) {

   $(this).addClass('table-active').siblings().removeClass('table-active');    
    
});

$('.anular-cancel-fac').on('click', function(event) {
event.preventDefault();
$('.show-text-area-reason-cancel-fac').hide();
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
  var numauto=$('#numauto').val();
   var autopor=$('#autopor').val();
   var idFac= $('#num-fac').html();
   var count = $('#show-num-fac').html();
   $.ajax({
type: "POST",
url: "<?=base_url('patient_factura_controller/delete_this_fac')?>",
data: {id_facc:idFac,count:count,reazon:reasonToCancelTable.trim(),numauto:numauto,autopor:autopor},
success:function(data){
	$(".reasonToCancelTableDFac").val("");
	//$('.show-text-area-reason-cancel-fac').hide();
	$('.offcanvas').offcanvas('hide');
 factura_table_view();
} ,
 
});
}
});



$(document).on('click', '#update_factura_fecha_com', function(event) {
event.preventDefault();

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/update_factura_fecha_com')?>",
data: {idfacc:$("#id_facc").val(),fecha:$("#fecha-fac").val(),comment:$("#comment").val(),numauto:$("#numauto").val(), autopor:$("#autopor").val()},
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