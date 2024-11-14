 <div class="modal fade" id="largeModalSurgeryDescription1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Descripción quirúrgica</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body" style="max-height: 180vh;
    overflow-y: auto;">

         <div class="card-body">

           <?php $this->load->view('patient/patient-info'); ?>
           <hr />
           <div id="pagination-description_surgery"></div>
           <div id="description_surgery-form">
             <?php $this->load->view('clinical-history/description-surgery/form'); ?>
           </div>
		 <?php 
		 $data['idpatient']=$idpatient;
		 $this->load->view('clinical-history/description-surgery/patient-images/form', $data); ?>
         </div>

       </div>
       <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
     </div>
   </div>
 </div>
 
