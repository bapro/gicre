 <div class="modal fade" id="largeModalReporteGnrl" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reporte General</h4>
         
            
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
        
  <div class="card-body">
    
 <?php $this->load->view('patient/patient-info'); ?>
<hr/>
  <div id="pagination-modal_report_general"></div>
  <div id="report-general-form">
  <?php 
  $this->load->view('clinical-history/general-report/form');
  ?>
    </div>
	 <?php 
$this->load->view('clinical-history/general-report/folder/form');
  ?>
  </div>

          </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
        </div>
      </div>
    </div>
	
	
	