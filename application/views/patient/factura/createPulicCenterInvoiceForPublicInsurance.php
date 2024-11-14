<section class="py-3">
	<div class="container-fluid">
		<div class="alert alert-primary" role="alert">
			Usted tiene una cuenta gratuita !
		</div>

		<?php $this->load->view('patient/factura/header'); ?>

<div class="card my-3">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h3 class="">Factura</h3>
					</div>

					<div class="col">

						<div class="text-end">
							<?php $this->load->view('patient/factura/change-rate-option'); ?>
						</div>

					</div>


				</div>
				
				<div class="table-responsive">
					<?php

					if ($centro_type_get == 'publico' && $count_centro_tariff == 0) { ?>
						<a href="<?php echo base_url("$controller/upload_center_tariffs/" . $values_container_decrpyted['centro'] . "/" . $values_container_decrpyted['seguroId']) ?>" class="btn btn-sm btn-outline-danger">No hay tarifarios crearlo</a>

					<?php }

					?>
					<div id="show-tariff-table"></div>

				</div>
			</div>
		</div>

		<?php $this->load->view('patient/factura/modalidad-de-pago'); ?>
		<?php

		$encrpyed_centro_type = encrypt_url($get_centro_info_by_id['type']);

		?>
		<input id="area" type="hidden" value="<?= $get_doctor_info_by_id['area'] ?>" />
		<input id="id_apoint" type="hidden" value="<?= $values_container_decrpyted['id_apoint'] ?>" />
		<input id="centro_medico" type="hidden" value="<?= $values_container_decrpyted['centro'] ?>" />
		<input id="medico" type="hidden" value="<?= $values_container_decrpyted['doctor'] ?>" />
		<input id="seguro_medico" type="hidden" value="<?= $values_container_decrpyted['seguroId'] ?>" />
		<input id="codigoprestado" type="hidden" value="<?= $codigo_contrato ?>" />
		<input id="centro_type" type="hidden" value="<?= $encrpyed_centro_type ?>" />

	<input id="patientPlan" type="hidden" value="<?= $values_container_decrpyted['patientPlan'] ?>" />
		<input id="tot-paciente-grand-total-unformat" type="hidden" />

	<input id="table-to-load" type="hidden" value="2" />

		<input id="current_controller" type="hidden" value="<?= $current_controller ?>" />

		<div class="loadf" id="showError"></div>
<div  id="servFieldfsdfsdf"></div>
	</div>
</section>
<?php $this->load->view('footer'); ?>

<script src="<?= base_url(); ?>assets_new/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="<?= base_url(); ?>assets_new/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php $this->load->view('patient/factura/footer'); ?>
<script>


showTariffTable($('#table-to-load').val());



	function center_area_on_change(dropDown) {
		var seguro_medico = $('#seguro_medico').val();
		var centro_medico = $('#centro_medico').val();
		var groupo = dropDown.value;
		$('.loadf').addClass("spinner-border");
		$.ajax({
			type: 'POST',
			url: "<?php echo site_url('tarifarios_centro/get_service_for_public_center'); ?>",
			data: {
				groupo: groupo,
				seguro: seguro_medico,
				centro: centro_medico
			},
			success: function(data) {
				//$('.get-tarif-data').html(data);
				//$('.bind-area').text(groupo);
				$('select.get-tarif-data').html(data);
				$('.loadf').removeClass("spinner-border");
				
			},

		});


	};










	


	const credenVals = {
		docCedula: "<?= $cedulaFormat; ?>",
		docPassword: "<?= $password; ?>",
		proveedo: "<?= $codigo_contrato; ?>",
		patientNss: "<?= $patientNss ?>"

	}

	//--WE CALL THOSE FUNCTIONS WHEN CENTRO IS PUBLICO TO SEARCH SERVICE BY SIMON CODIGO

	$("#pdss").on('click', function(e) {
		if ($(this).is(":checked")) {
			$("#hideTarifCentro").hide();
			$("#showLoadSimon").show();
			$('.loadf').addClass("spinner-border");
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('patient_factura_controller/loadSimon'); ?>",
				data: {},
				success: function(data) {
					$(".loadSimon").html(data);
					$('.loadf').removeClass("spinner-border");
					$(".loadf").html("");
				},

			});
		} else {
			$("#hideTarifCentro").show();
			$("#showLoadSimon").hide();
		}
	});




	function getSeguroCodSimon(dropDown) {
		$("#consultar_nap").prop("disabled", false);
		var credentials = JSON.stringify(credenVals);
		$('#showError').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?php echo site_url('webservice_consult/checkIfSimonAuth'); ?>",
			data: {
				codigo_simon: dropDown.value,
				credentials: credentials,
				wsl_centro: "<?= $wslCentro ?>"
			},
			success: function(result) {
				if (result.message == "AUTORIZACION NO PROCEDE ==> Este procedimiento no está parametrizado") {
					$('#showError').html('<p class="alert alert-danger ">' + result.message + '</p>').fadeIn('slow').delay(4000).fadeOut('slow');
				} else {
					$("#add_row_c").prop('disabled', false);
					//addRowSimon();
					addRow();
					$("#pdss").prop("disabled", true);
					$($(dropDown).parents('tr')[0]).find('input.precio').val(result.total_pag_seg);
					$($(dropDown).parents('tr')[0]).find('input.total-pag-seg').val(result.total_pag_seg);
					$($(dropDown).parents('tr')[0]).find('input.total-pag-pa').val(result.total_pag_patient);
					$('#showError').html('<p class="alert alert-success">' + result.message + '</p>').fadeIn('slow').delay(4000).fadeOut('slow');
				}
			},
			error: function() {
				$('#showError').html('<p class="alert alert-danger ">El procedimiento ha excedido su limite de: 2 coberturas por semana.</p>').fadeIn('slow').delay(4000).fadeOut('slow');

			},
		});
	}
	//-------------------------------------------------------------------------

	$("#consultar_nap").on('click', function(e) {
		e.preventDefault();
		$('#nap_state').val(1);
		getNap();
	});


	function getNap() {
		var credentials = JSON.stringify(credenVals);
		$("#consultar_nap").prop("disabled", true);
		$('.loadf').addClass("spinner-border");
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?= base_url('webservice_consult/getNap') ?>",
			data: {
				credentials: credentials
			},
			success: function(nap) {

				$("#numauto").val(nap);
				$("#autopor").val("webservice");

				var $newOption = $("<option selected='selected'></option>").val(2036).text("CONSULTA MEDICINA ESPECIALIZADA");
				$("#consultTafFromWebservice").append($newOption).trigger('change');
				$("#consultar_nap").hide();
				$("#cancel_nap").prop("disabled", false);
				$("#cancel_nap").show();
				$("#MotivoAnulacion").show();
				$('.loadf').removeClass("spinner-border");
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



	
</script>
</body>

</html>