    <br/>
	<div class="table-responsive">
                <table class="table table-xs  table-striped" id="load-patient-emergency">
                    <thead>
                        <tr class="bg-th">
                            <th>Fecha ingreso</th>
							<th>Fecha egreso</th>
							 <th>Centro médico</th> 
                             <th>Causa</th>
							<th>Via</th>
							<th>Referido Por</th>
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

	
	$('#load-patient-emergency').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>patient_emergency_controller/emergencyPatientTable",
              type: 'GET',
               'data': function(data) {


              }
            },
           order: [[0, 'desc']],
          });
	
	
 
	  
	
	  
	  
	  

	  
	  
	  
</script>