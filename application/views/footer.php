   <div class="modal fade" id="largeModalImage" tabindex="-1"  data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Imagen</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body" style="max-height: 180vh;
    overflow-y: auto;">

         <div class="card-body">

           <div id="load-this-patient-image"></div>
           
         </div>

       </div>
       
     </div>
   </div>
 </div>
  
  <footer class="fixed-bottom bg-light border-top">
        <div class="container text-center py-3">
            Copyright © <?=date('Y')?> GICRE Todos los derechos reservados.
        </div>
        <div class="d-flex">
            <div class="flex-fill bg-primary pt-1"></div>
            <div class="flex-fill bg-warning pt-1"></div>
            <div class="flex-fill bg-success pt-1"></div>
            <div class="flex-fill bg-danger pt-1"></div>
        </div>
    </footer>
	<input type="hidden" id="base_url_1" value="<?=base_url()?>"  />