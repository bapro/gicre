	<script>









function showTariffTable(table) {
$('#show-tariff-table').addClass("spinner-border");
	$.ajax({
			type: 'POST',
			url: "<?php echo site_url('tarifarios/showTariffTable'); ?>",
			data: {
			table:table
			},
			success: function(data) {
				
				$('#show-tariff-table').html(data).removeClass("spinner-border");
				
			},

		});
}



	const current_controller = $("#current_controller").val();
	
	


	Number.prototype.format = function(n, x) {
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
		return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
	};

	$('.reduce-total').prop("disabled", true);



	$(function() {

		$(".clear-all-mod-pag-values").on("keyup blur", ".form-control", reduceTotal);

	});



	function onlyfloat(event) {
		event = (event) ? event : window.event;
		var charCode = (event.which) ? event.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57) && (event.which != 46 || $('.float').val().indexOf('.') != -1)) {
			return false;
		}
		return true;
	};




	function validateQty(event) {
		var key = window.event ? event.keyCode : event.which;

		if (event.keyCode == 8 || event.keyCode == 46 ||
			event.keyCode == 37 || event.keyCode == 39) {
			return true;
		} else if (key < 48 || key > 57) {
			return false;
		} else return true;
	};



	function recalc() {
		
		tt = 0;
		dd = 0;
		pp = 0;
		ss = 0;
		$("#table-tarifario").find('tr').each(function() {
			var c = $(this).find('input.cantidad').val();
			var p = $(this).find('input.precio').val();
			var dateTotal = (c * p);
			var tps = $(this).find('input.total-pag-seg').val();
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
		$('input[name="chkbox"]').each(function() {
			if ($(this).is(":checked")) {
				$(this).parents("tr").remove();
			}
		});

		var val = $('input[name="chkbox"]').length;
		if (val < 1) {
			$("#delete_row").slideUp();

		}

		if (val == 0) {
			$("#pdss").prop("disabled", false);
		}
	};
	
	
	$('#save_factura').on('click', function(event) {
		$('#save_factura').prop("disabled", true);
		var grupo_area_req =  $('#center_tariff_area').val();
		var grupo_area = [];
			$('.center_service_on_change').each(function() {
			grupo_area.push($(this).val());
		});

		var cant = $('input.cantidad').val();
		var prec = $('input.precio').val();
		var numauto = $('#numauto').val();
		var autopor = $('#autopor').val();
		var pendienteCaja = $('#pendiente-de-caja').val();
		var tarjeta = $('#tarjeta').val();
		var transferencia = $('#transferencia').val();
		var effectivo = $('#effectivo').val();
		var cheque = $('#cheque').val();
		var checqueNumero = $('#checque-numero').val();
		var servField = $('.save-servicios').val();
		var seguro_medico = $('#seguro_medico').val();
		var medico = $('#medico').val();
		var centro_medico = $('#centro_medico').val();
		var id_apoint = $('#id_apoint').val();
		var area = $('#area').val();
		
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
		var totalpaseg = [];

		$('input.total-pag-seg').each(function() {
			totalpaseg.push($(this).val());
		});
	
		
		$('.save-servicios').each(function() {
			service.push($(this).val());
		});
		$('input.cantidad').each(function() {
			cantidad.push($(this).val());
		});
		$('input.precio').each(function() {
			precio.push($(this).val());
		});
		$('input.row-total').each(function() {
			total.push($(this).val());
		});


		$('input.descuento').each(function() {
			descuento.push($(this).val());
		});

		$('input.total-pag-pa').each(function() {
			totpapat.push($(this).val());
		});
		var money_device = $('input[type=radio][name=select-device]:checked').val();

		//$('.loadf').addClass("spinner-border");
      var id_patient_to_save=$('#id_patient_to_save').val();
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?= base_url('patient_factura_controller/saveInvoice') ?>",
			data: {
				grupo_area_req:grupo_area_req,
				grupo_area: grupo_area,
				servField:servField,
				service: service,
				cantidad: cantidad,
				preciouni: precio,
				tsubtotal: tsubtotal,
				totalpaseg: totalpaseg,
				totsubdesc: totsubdesc,
				totpagpa: totpagpa,
				subtotal: total,
				descuento: descuento,
				totpapat: totpapat,
				money_device: money_device,
				seguro_medico: seguro_medico,
				medico: medico,
				codigoprestado: codigoprestado,
				fecha: fecha,
				id_apoint: id_apoint,
				numauto: numauto,
				autopor: autopor,
				numauto: numauto,
				autopor: autopor,
				comment: comment,
				area: area,
				centro_medico: centro_medico,
				cant: cant,
				prec: prec,
				pendienteCaja: pendienteCaja,
				tarjeta: tarjeta,
				transferencia: transferencia,
				effectivo: effectivo,
				cheque: cheque,
				checqueNumero: checqueNumero,
				id_patient:id_patient_to_save
			},
			success: function(response) {
				if (response.status == 1) {
					$('#save_factura').prop("disabled", false);
					$('.loadf').removeClass("spinner-border");
					Swal.fire({
						icon: 'warning',
						html: response.message,
					});
					$('#save_factura').prop("disabled", false);
				} else if (response.status == 0) {
					$('.loadf').removeClass("spinner-border");
					Swal.fire({
						icon: 'warning',
						html: response.message,
					});
					$('#save_factura').prop("disabled", false);
				} else {
					$('#save_factura').prop("disabled", true);
					var idfacc = response.status;
					window.location.href = "<?php echo site_url("$current_controller/factura_by_id"); ?>/" + idfacc + '/' + centro_type;

				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				if(jqXHR.status){
				alert('Grabacion fallo');
               $('#save_factura').prop("disabled", false);
				/*$('.loadf').html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);*/
				}
			},
		});

	});
	
	
	

	$(".select-device").change(function() {
		if (confirm("Para cambiar la modalidad de la moneda se limpiaran los campos, desea continuar?")) {
			$(".change-span-device").html($(".select-device:checked").val());
			changePaymentMethod($(this).next("input.tasa").val(), $(".select-device:checked").val());
		} else {
			$(this).prop("checked", false);
		}
	});
	
	
	function changePaymentMethod(tasa, moneda) {
		$('.loadf').addClass("spinner-border");
		$.ajax({
			type: "POST",
			url: "<?= base_url('tarifarios/convertDeviceToPeso') ?>",
			data: {
				tasa: tasa,
				moneda: moneda,
				patientPlan: $("#patientPlan").val(),
				seguro_medico: $("#seguro_medico").val(),
				medico: $("#medico").val(),
				centro_medico: $("#centro_medico").val()
			},
			success: function(data) {
				$('.loadf').removeClass("spinner-border");
				showTariffTable($('#table-to-load').val());
			},

		});


	}


	function addRow() {

		 $('.form-select').select2('destroy');
		var tableBody = $('#table-tarifario').find("tbody");
    var trLast = tableBody.find("tr:last");
	
    var trNew = trLast.clone();
	if($('#table-to-load').val()==1){
 const lastSelectedAreaIndex = trLast.find('.select2').eq(0).find('option:selected').index();
  trNew.find('.select2').eq(0).find('option').eq(lastSelectedAreaIndex).prop('selected', true);
	}
	  trNew.find('input').not('input.cantidad').val("");
	
  trLast.after(trNew);
	$('.form-select').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});
	$('#delete_row').slideDown();

var trFirst = tableBody.find("tr:first");
const firstChBox = trFirst.find('input[type=checkbox]').prop('disabled', true);
	
	}





	function reduceTotal() {
		var grandTotPagPatient = $("#tot-paciente-grand-total-unformat").val();

		var sum_amount = 0;
		$('.reduce-total').each(function() {
			sum_amount += +$(this).val();

		})
		var grantTotFormat = parseFloat(grandTotPagPatient).toFixed(2);
		//$("#sdfsdfdsfsd").val(sum_amount - grantTotFormat);
		var result = sum_amount - grantTotFormat;
		$('#pendiente-de-caja').val(result.toFixed(2));
		if (sum_amount > grantTotFormat) {
			$('#must-zero').text('* demasiado grande');
		} else {
			$('#must-zero').text('* debe ser igual a 0');
		}

	}
	</script>