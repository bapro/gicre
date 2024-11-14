<div class="modal fade" id="largeModalOrdenMedica" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Orden Medica</h4>
         
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
        
  <div class="card-body">
    <?php $this->load->view('patient/patient-info'); ?>
<hr/>
    <div class="row">
    <div id="pagination-modal_orden_medica"></div>
    <div id="medical-order-forms">
  <?php $this->load->view('clinical-history/medical-order/forms');?>
    </div>
     </div>
  </div>

          </div>
        
        </div>
      </div>
    </div>