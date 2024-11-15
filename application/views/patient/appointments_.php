 <section class="py-3">
        <div class="container">
           

            <div class="card">
					
			   <div class="card-body">
			   <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buscar Citas Previas</button>
			     <div class="collapse" id="collapseExample">
                    <h6>Seleccione un centro medico</h6>
					<form method="GET" action="<?php echo site_url("$controller/appointments_by_date_range");?>" >
                    <div class="row g-2">
					
                        <div class="col-md-4">
                            <select class="form-select" id="centro" name="centro">
								<?php 
								echo $result_centro_medicos;
								?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Desde</span>
                                <input type="date" class="form-control" placeholder="" id="desde" name="desde">
                                <span class="input-group-text">Hasta</span>
                                <input type="date" class="form-control" placeholder="" id="hasta" name="hasta">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-search"></i></button>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="fa fa-print"></i></button>
                            </div>
                        </div>
						
                    </div>
</form>
                   </div>
                </div>
            </div>
			<div id="appointments-table-reload">
      <?php $this->load->view('patient/table-appointments'); ?>
	  </div>
        </div>
    </section>
	
		
	<span id="show-alert-if-inputs-data">
<?php $this->load->view('patient/modals-citas'); ?>
	</span>
	<div id="result-error"></div>
	<input id="desde" type="hidden" value="<?=$desde?>" />
	<input id="hasta"  type="hidden" value="<?=$hasta?>" />
	<input id="centroModal"  type=""  value="<?=$centro?>" />
	<input id="id_patient_hist"  type="hidden"  />

<input type="hidden" id="base_url" value="<?=base_url()?>"  />
  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?= base_url(); ?>assets_new/js/upload-fotos.js?rnd=<?= time() ?>"></script>
  <script src="<?= base_url(); ?>assets_new/js/upload-surgery-documents.js?rnd=<?= time() ?>"></script>
   <script src="<?= base_url();?>assets_new/js/indications.js?rnd=<?= time() ?>" ></script>
    <script src="<?= base_url();?>assets_new/js/repeated-historial-clinica.js?rnd=<?= time() ?>" ></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
 <?php  $this->load->view('clinical-history/reset-form_alert-success');?>
<script>
//alert($('#id_centro_to_save').val());
var desde =$("#desde").val();
var hasta =$("#hasta").val();
var centro=$("#centro").val();



	function clearInputField(input) {
	
  document.getElementById(input).value = "";
  $('#suggestion-lab-list').hide();
}

$(document).ready( function(){
$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
	
	$('#patient-citas-table').DataTable({
		"aoColumnDefs": [ 
                       
                        { "bVisible": false, "aTargets": [ 6 ] }
                    ],
            "ajax": {
              url: "<?php echo base_url(); ?>admin_test/citasTable",
              type: 'GET',
              'data': {
				  centro:"<?=$centro?>",
				  desde: "<?=$desde?>",
				  hasta: "<?=$hasta?>"
			  }
            },
		"rowCallback": function( row, data ) {
    if ( data[6] ) {
      //$('td:eq(4)', row).addClass('text-success');
	 $('td', row).addClass('text-success');
    }
  },
           order: [[0, 'desc']],
		 
		   	   	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
       //'sEmptyTable': '<a class="btn btn-danger" href="<?php echo site_url('medico/search_patient_name_in_gicre');?>/' + nombres + '/' + apellidos + '/' + apellidos2 + '">No lo hemos encontrado. Buscar en en GICRE</a>'
		
    },
          });
	
		

	
		var indications = document.getElementById('indications')
		indications.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			
			$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/get_patient_id",
					data: {
						id_apoint: button.data('id')
					},
					success: function(data) {
					$("#id_patient_hist").val(data);
					},
			});
			
			
			 $("#indications").on('hide.bs.modal', function(){
    $('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data  select').removeClass('changed-input');
  });
			
			//----------------------------
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/indications",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#load-indications").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					$("#load-indications").removeClass("spinner-border");
						$("#load-indications").html(data);
							 indication_med_down($("#id_patient_hist").val(),$('#id_centro_to_save').val());
							 indication_study_data($("#id_patient_hist").val());
							  allLaboratorios("patient-labs-content",0,$("#id_patient_hist").val(),$('#id_centro_to_save').val());

					},
			});
			
		})
		
		
		
		
		var reporteGeneral = document.getElementById('largeModalReporteGnrl2')
		reporteGeneral.addEventListener('show.bs.modal', function(event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				
					$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/get_patient_id",
					data: {
					id_apoint: button.data('id')
					},
					success: function(data) {
					$("#id_patient_hist").val(data);
					},
					});
				
				
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/reporteGeneral",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#report-general-form").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
						$("#report-general-form").removeClass("spinner-border");
						loadPagination('modal_report_general');
						$("#report-general-form").html(data);
							

					},
			});
			
		})
		
		
		
		
			var loadOrdenMed = document.getElementById('largeModalOrdenMedica2')
		loadOrdenMed.addEventListener('show.bs.modal', function(event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/orden_medica",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#medical-order-forms").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
						$("#medical-order-forms").removeClass("spinner-border");
						loadPagination('modal_orden_medica');
						$("#medical-order-forms").html(data);
							

					},
			});
			
		})
		
	
		
		 
			var patientDocumentos = document.getElementById('patientDocumentos')
		patientDocumentos.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/patientDocumentos",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#load-patient-documento").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
						$("#load-patient-documento").removeClass("spinner-border");
						$("#load-patient-documento").html(data);
						listFolders();
					},
			});
			});		
		
		
			var largeModalSurgeryDescription1 = document.getElementById('largeModalSurgeryDescription2')
		largeModalSurgeryDescription1.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			
					$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/get_patient_id",
					data: {
					id_apoint: button.data('id')
					},
					success: function(data) {
					$("#id_patient_hist").val(data);
					},
					});

			
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/largeModalSurgeryDescription1",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#description_surgery-form").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						
					loadPatientData(button.data('id'));
					 loadPagination("description_surgery",$("#id_patient_hist").val());
						$("#description_surgery-form").removeClass("spinner-border");
						$("#description_surgery-form").html(data);
						listFoldersDescQ();
					},
	
			});
			});	



	var largeModalResumenHist2 = document.getElementById('largeModalResumenHist2')
		largeModalResumenHist2.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/largeModalResumenHist",
					data: {
						id_apoint: button.data('id'), origine:'resume'
					},
					beforeSend: function() {
						$("#resumen-hist-content").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
						$("#resumen-hist-content").removeClass("spinner-border");
						$("#resumen-hist-content").html(data);
					},
					
			});
			});	






	var largeModalFollowUp2 = document.getElementById('largeModalFollowUp2')
		largeModalFollowUp2.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/largeModalFollowUp",
					data: {
						id_apoint: button.data('id'), origine:'follow-up'
					},
					beforeSend: function() {
						$("#patient-follow-up").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
						$("#patient-follow-up").removeClass("spinner-border");
						$("#patient-follow-up").html(data);
					},
					
			});
			});	

		
	
 });
 
 
 	var refraction = document.getElementById('largeModalRefraction');
		refraction.addEventListener('show.bs.modal', function(event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				
					$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/get_patient_id",
					data: {
					id_apoint: button.data('id')
					},
					success: function(data) {
					$("#id_patient_hist").val(data);
					},
					});
				
				
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/refraction",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#refraction-form").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
					loadPatientData(button.data('id'));
					$("#refraction-form").removeClass("spinner-border");
						loadPagination('refraction',$("#id_patient_hist").val());
						$("#refraction-form").html(data);
					},
	
			});
			
		})
 
 
 		
		function loadPatientData(id_apoint){
			$("#load-patient-data").addClass("spinner-border");
			  	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/loadPatientData",

					data: {
						id_apoint: id_apoint
					},
					
					success: function(data) {
					$(".load-patient-data").removeClass("spinner-border").html(data);
							

					},
			})
		}
 
 
 
 
 	var largeModalCardiovasEval = document.getElementById('cardiovasEval')
		largeModalCardiovasEval.addEventListener('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			
					$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/get_patient_id",
					data: {
					id_apoint: button.data('id')
					},
					success: function(data) {
					$("#id_patient_hist").val(data);
					},
					});

			
             	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_historial_default_menu/largeModalCardiovasEval",
					data: {
						id_apoint: button.data('id')
					},
					beforeSend: function() {
						$("#eva_cardiovascular-form").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						
					loadPatientData(button.data('id'));
					 loadPagination("eva_cardiovascular",$("#id_patient_hist").val());
						$("#eva_cardiovascular-form").removeClass("spinner-border");
						$("#eva_cardiovascular-form").html(data);
						
					},
	
			});
			});	
 
 
 
 
 
 
 
 
</script>

	

	 
</body>

</html>