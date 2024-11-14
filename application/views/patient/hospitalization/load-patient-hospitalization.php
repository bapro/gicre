    <br/>
	<div class="table-responsive">
                <table class="table table-xs  table-striped" id="load-patient-hospitalization">
                    <thead>
                        <tr class="bg-th">
                            <th>Fecha ingreso</th>
							<th>Fecha egreso</th>
							 <th>Centro médico</th> 
                             
							<th>Causa</th>
							<th>Via</th>
							<th>Sala</th>
							<th>Servicio</th>
							<th>Cama</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
            </div>
			
				 <div class="modal fade" id="editPatientHosp" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title">Paciente Ingresado</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body " style="max-height: 180vh;
    overflow-y: auto;">
 <div class="card">
<div class="card-body">
<div id="show-edit-form-hosp"></div>
</div>
</div>
   
       </div>
     
     </div>
   </div>
 </div>
			
			
			<script>

	
	$('#load-patient-hospitalization').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>patient_hospitalization_controller/hospitalizationPatientTable",
              type: 'GET',
               'data': function(data) {


              }
            },
           order: [[0, 'desc']],
          });
	
	
   $(document).on('click', '.update-this-hospitalization', function(){  
           var id = $(this).attr("id");  
  loadCreateForm(id, "hospitalization", "patient_hospitalization_controller");
		

      });
	  
	  
	  
	  
	 $('#editPatientHosp').on('show.bs.modal', function(event) {
		 var button = $(event.relatedTarget);
         	$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>patient_hospitalization_controller/edit_hospitalization",
					data: {
					id_hosp:button.data('id')
					},
					beforeSend: function() {
					$("#show-edit-form-hosp").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						
					$("#show-edit-form-hosp").html(data).removeClass("spinner-border");
			         },
			});
	
			
		}) 
	  
	  
	  

	  
	  
	  
</script>