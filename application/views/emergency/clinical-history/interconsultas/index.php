<div class="modal fade" id="largeModalInteCon" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Solicitud de interconsultas</h4>
         
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
        
  <div class="card-body">
    <?php $this->load->view('patient/patient-info'); ?>
<hr/>
    <div class="row">
<div id="pagination-hosp_interconsultas"></div>
    <div id="hospSolCon-form">
	
	<?php
	$data['orden_medica_data'] = 0;
	$this->load->view('emergency/clinical-history/interconsultas/form', $data);
	?>
   </div>
     </div>
  </div>

          </div>
        
        </div>
      </div>
    </div>
	
	
			   		   	<script>
	$(document).ready(function() {
	
			var modalOrdMed= 0;
		var loadOrdMed = document.getElementById('largeModalInteCon')
		loadOrdMed.addEventListener('show.bs.modal', function(event) {
			modalOrdMed++;
			if (modalOrdMed == 1) {
			loadPagination('hosp_interconsultas');
			
			}
		})
		
		
	$(document).on('click', '#paginate-hospSolCon-li li', function() {

			var display_content = "#hospSolCon-form";
			var controller = "emerg_interconsultas";
			var pageNum = this.id;
			$("#paginate-hospSolCon-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);
 //registroRespInterDoc();
 // registroSolInterDoc();

		});
		})
	</script>