
    <section class="py-3">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                Usted tiene una cuenta gratuita !
            </div>
		<?php $this->load->view('patient/factura/header-privado');?>
	
       <?php //$this->load->view('patient/factura/header-factura');?>

            <div class="card my-3">
                <div class="card-body">
	
                    	<div class="row">
				<div class="col">
	      <h3 class="">Factura</h3>
             </div>
				<div class="col">
				<div class="text-end">
				
				<input id="tasa-cambio" type="hidden" value="<?=$tasa['amount']?>" />

				<input id="monto-cambiado" type="hidden" />
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
				<label class="form-check-label" for="inlineCheckbox1"><img  width="30"  src="<?=base_url()?>/assets_new/img/300164.png"  /></label>
				</div>
				<?php if($tasa['money']==1){?>
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox2" name="select-device" value="$">
				<label class="form-check-label" for="inlineCheckbox2"><img  width="40"  src="<?=base_url()?>/assets_new/img/206626.png"  /></label>
				</div>
				<?php } elseif($tasa['money']==2){?>
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox3" name="select-device" value="&euro;" >
				<label class="form-check-label" for="inlineCheckbox3"><img  width="40"  src="<?=base_url()?>/assets_new/img/5111601.png"  /></label>
				</div>
				<?php }?>
				</div>
                   </div>
				</div>
			
                    <div class="table-responsive">
                        <table class="table table-sm table-striped mb-0" id="table-tarifario">
                            <thead>
                                <tr class="bg-th">
                                    <th >
									<?php
										echo $tipo_tarifario. ' <span class="text-danger">*</span>';
										if($tarifarios==NULL){
										?>
                                    <a href="<?php echo base_url("tarifarios/upload/".$values_container['doctor_ct']."/".$values_container['seguro_ct']."/".$values_container['tarif_plan_ct']."/".$values_container['centro'])?>"class="btn btn-sm btn-outline-primary">No hay tarifarios crear</a>
										<?php }  ?>
									
									</th>
                                    <th>Cantidad <span class="text-danger">*</span></th>
                                    <th>Precio Unitario <span class="text-danger">*</span></th>
                                    <th>Sub-Total</th>
									<th >Total Pagar Seguro</th>
                                    <th>Descuento</th>
                                    <th>Total Pagar Paciente</th>
									 <th></th>
                                </tr>
                            </thead>
							<tfoot>
							     <tr class="align-middle bg-tbl-f text-center fw-bold">
                                    <td colspan="3">
                                        TOTALES
                                    </td>
									<td>
                                        RD$ <span id="table-grand-total" >0.00</span>
                                    </td>
                                    <td >
                                        RD$ <span id="seguro-grand-total">0.00</span>
                                    </td>
                                    <td>
                                        <div class="text-danger">
                                            RD$ <span id="descuento-grand-total">0.00</span>
                                        </div>
                                    </td>
                                    <td>
                                        RD$ <span id="tot-paciente-grand-total">0.00</span>
                                    </td>
									<td style="width:7%">
									<button type="button" id="add_row" class="btn btn-outline-primary btn-sm" disabled><i class="bi bi-plus-square-fill"></i></button>
									  <button type="button" title="Marca una casilla para quitar una fila" style="display:none" id="delete_row" class="btn btn-outline-danger btn-sm" ><i class="bi bi-x-lg"></i></button>
									
									 </td>
                                </tr>
								<!--<tr>
								<td colspan='8' title="Borrar fila con casilla marcada" style="display:none" class="text-end" id="delete_row"><button type="button"  class="btn btn-outline-danger btn-sm" ><i class="bi bi-x-lg"></i></button></td><td colspan="8"></td>
								</tr>-->
								</tfoot>
                            <tbody>
                                <tr id="addr1" class="align-middle calculation">
                                   <td style="width:280px;display:block">
								   
								    <select style='width:100%' class="form-select select2 save-servicios form-select-sm get-tarif-data" onChange="getTarifData(this);">
										
                                        <?php
										if($get_centro_info_by_id['type']=='privado') {
										echo $tarifarios;
                                        }else{
											echo $tarifarios_centro;
										}
										?>
										</select>
								   
                                    </td>
                                    <td class="cantidad">
                                        <input type="text" class="form-control form-control-sm cantidad"   value='1' onkeypress='return validateQty(event);'>
                                    </td>
                                    <td class="precio">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon2">RD$</span>
                                            <input type="text" class="form-control precio" aria-describedby="basic-addon2" onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                    <td class="row-total">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon3">RD$</span>
                                            <input type="text" class="form-control row-total"  aria-describedby="basic-addon3">
                                        </div>
                                    </td>
									
									  <td class="total-pag-seg" >
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon4">RD$</span>
                                            <input type="text" class="form-control total-pag-seg"  aria-describedby="basic-addon4">
											<input type="hidden" class="form-control total-monto-cambiado" >
                                        </div>
                                    </td>
                                    <td class="descuento">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon5">RD$</span>
                                            <input type="text" class="form-control descuento"  aria-describedby="basic-addon5" onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                    <td class="total-pag-pa">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon6">RD$</span>
                                            <input type="text" class="form-control total-pag-pa" aria-describedby="basic-addon6">
                                        </div>
                                    </td>
									 <td>
									 </td>
                                </tr>
								
								<tr id='addr2' class="calculation visible">
								
								
								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
 <?php $this->load->view('patient/factura/modalidad-de-pago');?>
           <!-- <div class="card my-3">
                <div class="card-body">
                    <div class="row">
					
                        <div class="col-md-6 text-end">
			 <div class="row g-3">
              
              </div>
                        </div>
					
						<div class="col-md-6  text-end">
					
					<div class="form-floating mb-5">
					
                            <textarea  class="form-control form-control-sm"  id="comment"></textarea>
							<label for="comment">Comentrio</label>
					</div>
					<button type="button" id="save_factura" class="btn btn-primary btn-lg" >Guardar</button>
				   
                  <div id="required_fac" class="pt-2"></div>
					</div>
                    </div>
                </div>
            </div>-->
			<?php

			$encrpyed_centro_type=encrypt_url($get_centro_info_by_id['type']);
			
			?>
<input id="area" type="hidden" value="<?=$get_doctor_info_by_id['area']?>"  />
<input id="id_apoint" type="hidden" value="<?=$values_container_decrpyted['id_apoint']?>"  />
<input id="centro_medico" type="hidden" value="<?=$values_container_decrpyted['centro']?>"  />
<input id="medico" type="hidden" value="<?=$values_container_decrpyted['doctor']?>"  />
<input id="seguro_medico" type="hidden" value="<?=$values_container_decrpyted['seguro']?>"  />
<input id="codigoprestado" type="hidden" value="<?=$codigo_contrato?>"  />
<input id="centro_type" type="hidden" value="<?=$encrpyed_centro_type?>"  />
<input id="tot-paciente-grand-total-unformat" type="hidden"  />


<?php
if($get_centro_info_by_id['type']=='privado') {
 $controller='get_service_precio';
}else{
 $controller='get_service_precio_centro';
}
?>
<input id="get_controller_name_to_search_tarifarios_precios" type="" value="<?=$controller?>" />
<div class="loadf"></div> 

        </div>
    </section>
  <?php $this->load->view('footer');?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
	$('.form-select').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});
	
	
 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};
	
	$('.reduce-total').prop("disabled", true);
	

	

	function getTarifData(dropDown) {
		
var nap_state =$('#nap_state').val();
//nap:$("#numauto").val()
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var controller = $('#get_controller_name_to_search_tarifarios_precios').val();
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
//$(".loadf").hide();
$("#add_row").prop('disabled',false);
$('.reduce-total').prop("disabled", false);
addRow();
$(".change-span-device").html($(".select-device:checked").val());

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



var numRows = 2, ti = 5;
function addRow() {
//$("#add_row").prop("disabled",true);
$('#addr' + numRows).html("<td style='width:280px;display:block'><select style='width:100%' class='form-select form-select-sm  save-servicios  select2 get-tarif-data-clone' onChange='getTarifData(this);' ></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td  class='total-pag-seg'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input  name='totalpagseg" + numRows + "' type='text' class='total-pag-seg form-control'  tabindex='" + (ti++) + "'  /><input  name='totalmontocambiado" + numRows + "' type='hidden' class='total-monto-cambiado form-control'  tabindex='" + (ti++) + "'  /></div></td><td class='descuento'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input style='color:red' name='descuento" + numRows + "' type='text' class='descuento form-control float'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
var $options = $(".get-tarif-data > option").clone();
    $('.get-tarif-data-clone').append($options);
	$(".select2").select2(
	{
		theme: 'bootstrap-5',
		width: '100%'
	}
	);
$('#table-tarifario tr:last').after('<tr id="addr' + (numRows + 1) + '" class="calculation visible"></tr>');
numRows++;
$('#delete_row').slideDown();
}


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

$("#add_row").on("click",function() {addRow()});
$("#delete_row").on("click",function() {delRow(), recalc()});
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
$("#total-pagar-paciente").val(pp.format(2)); 
}

function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}

function delRow() { 
$('input[name="chkbox"]').each(function(){
if($(this).is(":checked")){
$(this).parents("tr").remove();
}
});

var val=$('input[name="chkbox"]').length;
if(val < 1)
{
$("#delete_row").slideUp();

}

if(val == 0){
$("#pdss").prop("disabled", false);
}
};


$('#save_factura').on('click', function(event) {
$('#save_factura').prop("disabled", true);
var cant = $('input.cantidad').val();
var prec = $('input.precio').val();
var numauto = $('#numauto').val();
var autopor = $('#autopor').val();
var servField = $('.save-servicios').val();

/*if(numauto == "" || autopor == "" || cant == "" || prec == "" )
{
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");
}
else
{*/
var seguro_medico= $('#seguro_medico').val();
var medico= $('#medico').val();
var centro_medico = $('#centro_medico').val();
var id_apoint= $('#id_apoint').val();
var area= $('#area').val();
var codigoprestado = $('#codigoprestado').val();
var fecha = $('#fecha-fac').val();
var tsubtotal = $('#sub-total').val();
var totpagseg = $('#total-pago-seguro').val();
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var comment = $('#comment').val();
 var centro_type = $('#centro_type').val();

var service = [];
var cantidad = [];
var precio = [];
var total = [];
var totalpaseg = [];
var descuento = [];
var totpapat = [];

$('.save-servicios').each(function(){
service.push($(this).val());
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

$('input.total-pag-seg').each(function(){
totalpaseg.push($(this).val());	
});

$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});


$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/saveInvoice')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,tsubtotal:tsubtotal,totpagseg:totpagseg,totsubdesc:totsubdesc,
totpagpa:totpagpa,subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,
seguro_medico:seguro_medico,medico:medico,codigoprestado:codigoprestado,fecha:fecha,id_apoint:id_apoint,
numauto:numauto,autopor:autopor,comment:comment,area:area,centro_medico:centro_medico,cant:cant,prec:prec,servField:servField},
cache: true,
success:function(response){
if(response.status == 1){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>');
$('#save_factura').prop("disabled", false);
}
else if(response.status == 2){
$('.loadf').html('<p class="alert alert-danger ">'+response.message+'</p>');
}else if(response.status == 3){
$('#save_factura').prop("disabled", false);	
$('#required_fac').html('<p class="alert alert-danger ">'+response.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
$(".change-red").css("border-color", "red");
$(".change-red").find(".form-control").not(".descuento").css("border-color", "red");	
$(".loadf").fadeIn().html('');	
}else{
var idfacc = response.status;	
window.location.href = "<?php echo site_url('admin/factura_by_id');?>/" + idfacc + '/'+ centro_type;

}
},
 
});

return false;
});





</script>
</body>

</html>