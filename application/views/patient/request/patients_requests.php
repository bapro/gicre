 <section class="py-3">
        <div class="container">
<?php echo $this->session->flashdata('appointment_confirmation');?>
			<div class="card">
			 <div class="card-header fs-2">
 Colar de solicitudes
  </div>
			<div class="card-body">

    <div class="table-responsive">
                <table class="table table-sm  table-striped" id="patient-request-table" style="width:100%">
                    <thead>
                        <tr class="bg-th">
							<th >Solicitud</th>
							<th >Solicitante</th>
							<th>Teléfono</th>
							<th >Email</th>
							<th >Fecha Solicitud</th>
							<th >Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
            </div>
</div>
</div>
        </div>
    </section>
	
					<div class="modal fade" id="see_patient_request" tabindex="-1">
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="card-title" style="color: #012970;">Ver Solicitud</h4>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" >

				<div class="card-body">
					<div class="load-patient-data"></div>
				<div id="patient-request-data"></div>
				</div>

				</div>

				</div>
				</div>
				</div>

	
	<div id="result-error"></div>
	
  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script>
$('#patient-request-table').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>patient_cita_controller/patientRequestTable",
              type: 'GET',
              
            },
           order: [[0, 'desc']],
		   	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
       //'sEmptyTable': '<a class="btn btn-danger" href="<?php echo site_url('medico/search_patient_name_in_gicre');?>/' + nombres + '/' + apellidos + '/' + apellidos2 + '">No lo hemos encontrado. Buscar en en GICRE</a>'
		
    },
          });
	


	var see_patient_request = document.getElementById('see_patient_request')
		see_patient_request.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_cita_controller/patient_request",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#patient-request-data").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					//loadPatientData(button.data('id'));
						$("#patient-request-data").removeClass("spinner-border");
						$("#patient-request-data").html(data);
					},
					 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#result-error").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
					
			});
			});	


</script>

	

	 
</body>

</html>