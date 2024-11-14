<?php 
if($values_container_decrpyted['seguroId'] !=11){
$showPublico="";
$getTarifData='getTarifDataSeguroPublico';
$toDisp="";
}else{
$showPublico="style='display:none'";
$getTarifData='getTarifDataSeguroPrivado';
$toDisp="none";
}

?>

<style>
td.total-pag-seg {
	display:<?=$toDisp?>
}
</style>
    <section class="py-3">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                Usted tiene una cuenta gratuita ! 
            </div>
			
      <?php $this->load->view('patient/factura/header-privado');?>
		
  
 
            <div class="card my-3">
                <div class="card-body">
				<div class="row">
				<div class="col">
	      <h3 class="">Factura</h3>
             </div>
			
				<div class="col">
				
				<div class="text-end">
				 <?php if($tasa){ ?>
					<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
				<input  type="hidden" class="tasa" id="tasa-peso"  value="0" >
				<label class="form-check-label" for="inlineCheckbox1"><img  width="28"  src="<?=base_url()?>/assets_new/img/flag-dom-vec.png"  /></label>
				</div>
				
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox2" name="select-device" value="USD$">
				<input  type="hidden" class="tasa" id="tasa-dolar"  value="<?=$tasa['tasa_dolar']?>" >
				<label class="form-check-label" for="inlineCheckbox2"><img  width="20"  src="<?=base_url()?>/assets_new/img/206626.png"  /></label>
				<small ><?=$tasa['tasa_dolar']?></small>
				</div>
				
				<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox3" name="select-device" value="&euro;" >
				<input  type="hidden"  class="tasa" id="tasa-euro"  value="<?=$tasa['tasa_euro']?>" >
				<label class="form-check-label" for="inlineCheckbox3"><img  width="20"  src="<?=base_url()?>/assets_new/img/5111601.png"  /></label>
					<small ><?=$tasa['tasa_euro']?></small>
				</div>
				
			
				<?php } else {
                  	?>
					<div class="form-check form-check-inline">
				<input class="form-check-input select-device" type="radio" id="inlineCheckbox1" name="select-device" value="RD$" checked>
				<input  type="hidden" class="tasa" id="tasa-peso"  value="0" >
				<label class="form-check-label" for="inlineCheckbox1"><img  width="28"  src="<?=base_url()?>/assets_new/img/flag-dom-vec.png"  /></label>
				</div>
					  <a href="<?php echo base_url("$controller/exchange_rate/")?>" class="btn btn-sm btn-outline-primary">Crear su tasa de cambio</a>
					   
				   <?php } ?>
				</div>
				
                   </div>
				   
				 
				</div>
				<!--<div class="row">
				  <div class="col-4">
                    <?php 
					if($centro_type_get=='publico' && $count_centro_tariff > 0){?>
					<label>Servicio</label>
				<select  class="form-select select2 form-select-sm" id="center_service_on_change" >
				<option value=""></option>
				<?php 
				foreach($select_servicios->result() as $rowS){

				echo "<option>$rowS->groupo</option>"; 
				}

				?>					

				</select>
					<br/>
				    <?php } ?>
					</div>
					</div>-->
                    <div class="table-responsive">
					<?php 
			
					// CENTRO MEDICO ES PRIVADO Y NO HAY TARIFARIOS
					if($centro_type_get=='privado' && $count_medico_tariff==0){
						?>
						<a href="<?php echo base_url("$controller/upload_tariff_form/".$values_container['doctor_ct']."/".$values_container['seguro_ct']."/".$values_container['tarif_plan_ct']."/".$values_container['centro'])?>"class="btn btn-sm btn-outline-danger">No hay tarifarios crearlo</a>
					
					<?php
					} 
					if($centro_type_get=='publico' && $count_centro_tariff==0) {?>
					<a href="<?php echo base_url("$controller/upload_center_tariffs/".$values_container_decrpyted['centro']."/".$values_container_decrpyted['seguroId'])?>"class="btn btn-sm btn-outline-danger">No hay tarifarios crearlo</a>
					
					<?php }
					
					 ?>     
					   <table class="table table-sm table-striped mb-0" id="table-tarifario" >
                            <thead>
                                <tr class="bg-th">
                                    <th scope="col">
									<?php
										echo $tipo_tarifario. ' <span class="text-danger">*</span>';
									 ?>
									
									</th>
                                    <th scope="col">Cantidad <span class="text-danger">*</span></th>
                                    <th scope="col">Precio Unitario <span class="text-danger">*</span></th>
                                    <th scope="col">Sub-Total</th>
									<?php if($values_container_decrpyted['seguroId'] !=11){?>
									<th scope="col">Total Pagar Seguro</th>
									<?php } ?>
                                    <th scope="col">Descuento</th>
                                    <th scope="col">Total Pagar Paciente</th>
									 <th scope="col"></th>
                                </tr>
                            </thead>
							<tfoot>
							     <tr class="align-middle bg-tbl-f text-center fw-bold">
                                    <td colspan="3">
                                        TOTALES
                                    </td>
									<td>
                                        <span class="change-span-device">RD$</span> <span id="table-grand-total" >0.00</span>
                                    </td>
										<?php if($values_container_decrpyted['seguroId'] !=11){?>
                                     <td >
                                        <span class="change-span-device">RD$</span> <span id="seguro-grand-total">0.00</span>
                                    </td>
									<?php } ?>
                                    <td>
                                        <div class="text-danger">
                                            <span class="change-span-device">RD$</span> <span id="descuento-grand-total">0.00</span>
                                        </div>
                                    </td>
                                    <td>
                                       <span class="change-span-device"> RD$</span> <span id="tot-paciente-grand-total">0.00</span>
                                    </td>
									<td style="width:7%">
									<!--<button type="button" id="add_row" class="btn btn-outline-primary btn-sm" disabled><i class="bi bi-plus-square-fill"></i></button>-->
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
								     <span  id="hideTarifCentro">
									 
								    <select style='width:100%' class="form-select select2 save-servicios form-select-sm get-tarif-data" id="consultTafFromWebservice"  onChange="<?=$getTarifData?>(this);">
										
                                        <?php
										
										if($centro_type_get=='privado') {
										echo $tarifarios;
                                        }else{
											echo $tarifarios_centro;
										}
										?>
										</select>
								        </span>
								   <span style="display:none" id="showLoadSimon">
								          <select style='width:100%' class="form-select select2 select-simon1" id="loadSimon" onChange="getSeguroCodSimon(this);" >
                                            </select>
											</span>
								   
								   
								   
                                    </td>
                                    <td class="cantidad">
                                        <input type="text" class="form-control form-control-sm cantidad"   value='1' onkeypress='return validateQty(event);'>
                                    </td>
                                    <td class="precio">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon2">RD$</span>
                                            <input type="text" class="form-control precio" aria-describedby="basic-addon2" >
                                        </div>
                                    </td>
                                    <td class="row-total" style='width:20%'>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon3">RD$</span>
                                            <input type="text" class="form-control row-total"  aria-describedby="basic-addon3">
											 <input  class="form-control row-total"  type="hidden" value="0.00">
                                        </div>
                                    </td>
									<?php if($values_container_decrpyted['seguroId'] !=11){?>
									  <td class="total-pag-seg"  >
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon4">RD$</span>
                                            <input type="text" class="form-control total-pag-seg" value="0.00" aria-describedby="basic-addon4">
											<!--<input type="hidden" class="form-control total-monto-cambiado" >-->
                                        </div>
                                    </td>
									<?php } else{ ?>
									<input type="hidden" class="form-control total-pag-seg" value="0.00" >
									<?php }  ?>
                                    <td class="descuento" style='width:20%'>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon5">RD$</span>
                                            <input type="text" class="form-control descuento text-danger"  aria-describedby="basic-addon5" onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                    <td class="total-pag-pa">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon6">RD$</span>
                                            <input type="text" class="form-control total-pag-pa" value="0.00" aria-describedby="basic-addon6">
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
			<?php

			$encrpyed_centro_type=encrypt_url($get_centro_info_by_id['type']);
			
			?>
<input id="area" type="hidden" value="<?=$get_doctor_info_by_id['area']?>"  />
<input id="id_apoint" type="hidden" value="<?=$values_container_decrpyted['id_apoint']?>"  />
<input id="centro_medico" type="hidden" value="<?=$values_container_decrpyted['centro']?>"  />
<input id="medico" type="hidden" value="<?=$values_container_decrpyted['doctor']?>"  />
<input id="seguro_medico" type="hidden" value="<?=$values_container_decrpyted['seguroId']?>"  />
<input id="codigoprestado" type="hidden" value="<?=$codigo_contrato?>"  />
<input id="centro_type" type="hidden" value="<?=$encrpyed_centro_type?>"  />
<input id="getTarifData" type="hidden" value="<?=$getTarifData?>"  />

<input id="patientPlan" type="hidden" value="<?=$values_container_decrpyted['patientPlan']?>"  />
<input id="tot-paciente-grand-total-unformat" type="hidden"  />


<?php
if($get_centro_info_by_id['type']=='privado') {
 $controller_function='get_service_precio';
}else{
 $controller_function='get_service_precio_centro';
}
?>

<input id="current_controller" type="hidden" value="<?=$current_controller?>" />
<input id="get_controller_name_to_search_tarifarios_precios" type="hidden" value="<?=$controller_function?>" />
<div class="loadf" id="showError"></div> 

        </div>
    </section>
  <?php $this->load->view('footer');?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
<script>

$("#center_service_on_change").on('change', function (e) {

	var seguro_medico=$('#seguro_medico').val();
	var centro_medico=$('#centro_medico').val();

$.ajax({
	type:'POST',
	url: "<?php echo site_url('tarifarios/get_service_for_public_center');?>",
	data:{groupo:$(this).val(),seguro:seguro_medico,centro:centro_medico},
	success:function(data) {
	$('.get-tarif-data').html(data);
	},
	 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.loadf').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});

	
	});




const credenVals= {
docCedula: "<?=$cedulaFormat;?>",
 docPassword: "<?=$password;?>",
 proveedo: "<?=$codigo_contrato;?>",
 patientNss: "<?=$patientNss?>"

}
const current_controller=$("#current_controller").val();
//--WE CALL THOSE FUNCTIONS WHEN CENTRO IS PUBLICO TO SEARCH SERVICE BY SIMON CODIGO

$("#pdss").on('click', function (e) {
	if ($(this).is(":checked")) {
	$("#hideTarifCentro").hide();
	$("#showLoadSimon").show();
	$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_factura_controller/loadSimon');?>",
	data:{},
	success: function(data){
	$("#loadSimon").html(data);
	$(".loadf").html("");
	},

	});
	}else{
	$("#hideTarifCentro").show();
	$("#showLoadSimon").hide();			
	}
	});




 function getSeguroCodSimon(dropDown) {
$("#consultar_nap").prop("disabled",false);
  var credentials = JSON.stringify(credenVals);
 $('#showError').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
  $.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('webservice_consult/checkIfSimonAuth');?>",
data:{codigo_simon: dropDown.value, credentials: credentials, wsl_centro: "<?=$wslCentro?>"},
success: function(result){
if(result.message=="AUTORIZACION NO PROCEDE ==> Este procedimiento no está parametrizado"){
$('#showError').html('<p class="alert alert-danger ">'+result.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
}else{
$("#add_row_c").prop('disabled',false);	
//addRowSimon();
addRow();
$("#pdss").prop("disabled", true);
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);
$('#showError').html('<p class="alert alert-success">'+result.message+'</p>').fadeIn('slow').delay(4000).fadeOut('slow');
}
},
 error: function() {
$('#showError').html('<p class="alert alert-danger ">El procedimiento ha excedido su limite de: 2 coberturas por semana.</p>').fadeIn('slow').delay(4000).fadeOut('slow');

},
});
} 
//-------------------------------------------------------------------------

 $("#consultar_nap").on('click', function (e) {
	e.preventDefault();
	$('#nap_state').val(1);
   getNap(); 
	 });


 function getNap(){
	 var credentials = JSON.stringify(credenVals);
$("#consultar_nap").prop("disabled", true);
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
 dataType: 'json',
url: "<?=base_url('webservice_consult/getNap')?>",
 data: {credentials:credentials},
success:function(nap){

$("#numauto").val(nap);
 $("#autopor").val("webservice");

  var $newOption = $("<option selected='selected'></option>").val(2036).text("CONSULTA MEDICINA ESPECIALIZADA");
$("#consultTafFromWebservice").append($newOption).trigger('change');
 $("#consultar_nap").hide();
 $("#cancel_nap").prop("disabled", false);
  $("#cancel_nap").show();
  $("#MotivoAnulacion").show();
$(".loadf").fadeIn().html('');
$("#add_row").hide();
},
 error: function() {
 //$(".wait1").text('No autorización:').css('font-style','');
  //$(".wait2").text('Autorizado por:').css('font-style','');
$('.loadf').html('<p class="alert alert-danger ">Nap inválido o agotado.</p>');
$("#add_row").show();
},
});		
}


	$('.form-select').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});
	
		var getTarifData = $("#getTarifData").val();


 //$('#table-tarifario').find("input").prop("disabled", true);
 //$('#table-tarifario').find("select").prop("disabled", true);


 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};
	
	$('.reduce-total').prop("disabled", true);
	


$(function () {

$(".clear-all-mod-pag-values").on("keyup blur", ".form-control", reduceTotal);

});
	
	


	function getTarifDataSeguroPrivado(dropDown) {

$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var controller = $('#get_controller_name_to_search_tarifarios_precios').val();
var doctorid =$('#medico').val();
centro_medico= $('#centro_medico').val();
$.ajax({
type: "POST",
url: "<?php echo site_url('tarifarios');?>/" + controller,

data:{id_mssm1:dropDown.value, doctorid:doctorid, centro_medico:centro_medico},
success: function(data){

$($(dropDown).parents('tr')[0]).find('input.precio').val(data);

recalc();
//$(".loadf").hide();
$("#add_row").prop('disabled',false);
$('.reduce-total').prop("disabled", false);
addRow();
$(".change-span-device").html($(".select-device:checked").val());

},

});

}



	function getTarifDataSeguroPublico(dropDown) {
var nap_state =$('#nap_state').val();
//nap:$("#numauto").val()
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var controller = $('#get_controller_name_to_search_tarifarios_precios').val();

$.ajax({
type: "POST",
dataType: 'json',
url: "<?php echo site_url('consult_tarifario_por_web_service_controller');?>/" + controller,

data:{id_mssm1:dropDown.value, nap:0, nap_state:0},
success: function(result){
if(result.nap_state = 1){
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);

}else{
$($(dropDown).parents('tr')[0]).find('input.precio').val(result.total_pag_seg);
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);	
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
$('#addr' + numRows).html("<td style='width:280px;display:block'><select style='width:100%' class='form-select form-select-sm  save-servicios  select2 get-tarif-data-clone' onChange='"+getTarifData+"(this);' ></select></td><td class='cantidad'><input value='1' name='cantidad" + numRows + "' type='text' class='cantidad form-control form-control-sm'  tabindex='" + (ti++) + "' onkeypress='return validateQty(event);' /></td><td class='precio'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input  name='precio" + numRows + "' type='text' class='precio form-control float'  tabindex='" + (ti++) + "' onkeypress='return onlyfloat(event);' /></div></td><td class='row-total'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input type='text' class='row-total form-control' value='0.00' readonly /></div></td><td class='total-pag-seg' ><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input type='text' class='total-pag-seg form-control' value='0.00' readonly /></div></td><td class='descuento'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input name='descuento" + numRows + "' type='text' class='descuento form-control float text-danger'  tabindex='" + (ti++) + "'onkeypress='return onlyfloat(event);' /></div></td><td class='total-pag-pa'><div class='input-group input-group-sm'><span class='input-group-text change-span-device'>RD$</span><input  name='totalpagpa" + numRows + "' type='text' class='total-pag-pa form-control ' value='0.00' tabindex='" + (ti++) + "' readonly /></div></td><td><input type='checkbox' name='chkbox' class='remove'></td>");
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
tt = 0;
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

$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
tt += isNumber(dateTotal) ? dateTotal : 0;
ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
}); //END .each

$("#table-grand-total").html(tt.format(2));
$("#sub-total").val(tt.format(2));
$("#seguro-grand-total").html(ss.format(2)); 
$("#total-pago-seguro").val(ss.format(2)); 
$("#descuento-grand-total").html(dd.format(2));  
$("#tot-paciente-grand-total").html(pp.format(2));
$("#tot-paciente-grand-total-unformat").val(pp);  
$("#total-pagar-paciente").val(pp.format(2)); 
$("#pendiente-de-caja").val(pp.format(2));
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
var pendienteCaja = $('#pendiente-de-caja').val();
var tarjeta =$('#tarjeta').val();
var transferencia= $('#transferencia').val();
var  effectivo =$('#effectivo').val();
var  cheque=$('#cheque').val();
var checqueNumero =$('#checque-numero').val();
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
var totsubdesc = $('#descuento1').val();
var totpagpa = $('#total-pagar-paciente').val();
var comment = $('#comment').val();
 var centro_type = $('#centro_type').val();

var service = [];
var cantidad = [];
var precio = [];
var total = [];
var descuento = [];
var totpapat = [];
var totalpaseg= [];

$('input.total-pag-seg').each(function(){
totalpaseg.push($(this).val());
});


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


$('input.descuento').each(function(){
descuento.push($(this).val());	
});

$('input.total-pag-pa').each(function(){
totpapat.push($(this).val());	
});
var money_device = $('input[type=radio][name=select-device]:checked').val();

$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
dataType: 'json',
url: "<?=base_url('patient_factura_controller/saveInvoicePrivado')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,tsubtotal:tsubtotal,totalpaseg:totalpaseg,totsubdesc:totsubdesc,
totpagpa:totpagpa,subtotal:total,descuento:descuento,totpapat:totpapat,money_device:money_device,
seguro_medico:seguro_medico,medico:medico,codigoprestado:codigoprestado,fecha:fecha,id_apoint:id_apoint,numauto:numauto,autopor:autopor,
numauto:numauto,autopor:autopor,comment:comment,area:area,centro_medico:centro_medico,cant:cant,prec:prec,servField:servField,
pendienteCaja:pendienteCaja, tarjeta:tarjeta, transferencia:transferencia, effectivo:effectivo, cheque:cheque, checqueNumero:checqueNumero},
success:function(response){
if(response.status == 1){
//$('.loadf').html('<p class="alert alert-danger d-flex justify-content-md-center align-items-center">'+response.message+'</p>');
Swal.fire({
icon: 'warning',
html: response.message,
});
$('#save_factura').prop("disabled", false);
}
else if(response.status == 0){
//$('.loadf').html('<p class="alert alert-danger d-flex justify-content-md-center align-items-center">'+response.message+'</p>');
Swal.fire({
icon: 'warning',
html: response.message,
});
}else{
var idfacc = response.status;	
window.location.href = "<?php echo site_url("$current_controller/factura_by_id");?>/" + idfacc + '/'+ centro_type;

}

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.loadf').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});

});


 $(".select-device").change(function(){
 if(confirm("Para cambiar la modalidad de la moneda se limpiaran los campos, desea continuar?"))
{
$(".change-span-device").html($(".select-device:checked").val());
	changePaymentMethod($(this).next("input.tasa").val(), $(".select-device:checked").val());
}else{
 $(this).prop("checked", false);	
}
});


function changePaymentMethod(tasa, moneda){
 
$("#table-tarifario").find("tr.visible").remove();
	$('.form-select').val(null).trigger('change');
$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/convertDeviceToPeso')?>",
data: {tasa:tasa, moneda:moneda, patientPlan:$("#patientPlan").val(), seguro_medico:$("#seguro_medico").val(), medico:$("#medico").val(), centro_medico:$("#centro_medico").val()},
success:function(data){
$(".loadf").html(data);	
},
  
});


}



	function reduceTotal(){
	var grandTotPagPatient = $("#tot-paciente-grand-total-unformat").val();
	
	 var sum_amount = 0;
  $('.reduce-total').each(function(){
    sum_amount += +$(this).val();
 
  })
 var grantTotFormat = parseFloat(grandTotPagPatient).toFixed(2);
 //$("#sdfsdfdsfsd").val(sum_amount - grantTotFormat);
  var result = sum_amount - grantTotFormat;
   $('#pendiente-de-caja').val(result.toFixed(2));
 if(sum_amount > grantTotFormat){
	$('#must-zero').text('* demasiado grande'); 
 }else{
	 $('#must-zero').text('* debe ser igual a 0');
 }
 
	}
	




</script>
</body>

</html>