<div class="modal fade" id="largeModalOrdenMedica" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Orden Medica </h4>
         
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
        
  <div class="card-body">
    <?php $this->load->view('hospitalization/patient/patient-info'); ?>
<hr/>
    <div class="row">
<div id="pagination-emerg_orden_medica"></div>
    <div id="medical-order-forms">
	
	<?php
	$data['orden_medica_data'] = 0;


	$this->load->view('emergency/clinical-history/medical-order/forms', $data);
	?>
   </div>
     </div>
  </div>

          </div>
        
        </div>
      </div>
    </div>
	
	
