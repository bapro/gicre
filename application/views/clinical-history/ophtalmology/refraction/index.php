<div class="modal fade" id="largeModalRefraction" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Refracción</h4>
         
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
        
  <div class="card-body">
    
 <?php $this->load->view('patient/patient-info'); ?>
<hr/>
  <div id="pagination-refraction"></div>
  <div id="refraction-form">
  <?php $this->load->view('clinical-history/ophtalmology/refraction/form');?>
    </div>
  </div>

          </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
        </div>
      </div>
    </div>