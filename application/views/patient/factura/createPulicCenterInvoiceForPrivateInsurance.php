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

		<?php $this->load->view('patient/factura/modalidad-de-pago'); 
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

	<input id="table-to-load" type="hidden" value="1" />

		<input id="current_controller" type="hidden" value="<?= $current_controller ?>" />

		<div class="loadf" id="showError"></div>

	</div>
</section>
<?php $this->load->view('footer'); ?>

<script src="<?= base_url(); ?>assets_new/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
				$($(dropDown).parents('tr')[0]).find('select.bind-area-to-list').html(data);
				$('.loadf').removeClass("spinner-border");
				//addRow();
			},

		});


	};


	function getTarifDataSeguroPrivado(dropDown) {

$('.loadf').addClass("spinner-border");

		var doctorid = $('#medico').val();
		centro_medico = $('#centro_medico').val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('tarifarios'); ?>/get_service_precio_centro",

			data: {
				id_mssm1: dropDown.value,
				doctorid: doctorid,
				centro_medico: centro_medico
			},
			success: function(data) {

				$($(dropDown).parents('tr')[0]).find('input.precio').val(data);

				recalc();
				$('.loadf').removeClass("spinner-border");
				$("#add_row").prop('disabled', false);
				$('.reduce-total').prop("disabled", false);
				addRow();
				$(".change-span-device").html($(".select-device:checked").val());

			},

		});

	}







	
</script>
</body>

</html>