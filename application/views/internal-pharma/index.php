 <section class="py-3">
        <div class="container">
		  <div class="col-md-12">
		  		   <div class="card">
               <!-- <div class="card-header">
                    Buscar el paciente primero ante de empezar a crear nueva cita.
                </div>-->
                <div class="card-body">
                    <div class="row g-2">
					<h1 class="card-header"><a href="<?php echo site_url("internal_pharmacy/index/1");?>">Buscar paciente en emergencia</a></h1>
					<h1 class="card-header ">Buscar paciente en HOSPITALIZACIÓN</h1>
					  <div class="col-md-3">
                            <label class="form-label">Buscar por cédula</label>
                            <div class="row g-1">
                                <div class="col-12">
                                    <input type="text" id="patient-cedula" class="form-control patient-cedula-entry" placeholder="000-0000000-0" data-mask="00000000000">
									 <span id="missing-cedula" ></span>
									 <input type="hidden" id="url-to-search-patient" value="<?php echo base_url(); ?>patient_search/search_patient_by_cedula">
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Por NEC</label>
                            <div class="input-group">
                                <span class="input-group-text " id="basic-addon1">NEC-</span>
                                <input type="text"  id="patient-nec-search" class="form-control patient-nec-entry">
								
                            </div>
                        </div>
                        <div class="col-md-7">
						  <form method='get' class="form-inline" id="show-link-back"  >
                            <label class="form-label me-2">Por nombres</label>
                          
                            <div class="input-group mb-3">
							
                                <input type="text" class="form-control" placeholder="Nombres" autocomplete="off" name="patient-nombres" id="patient-nombres">
								
                                <input type="text" class="form-control" placeholder="Apellidon1" name="patient-apellidos" id="patient-apellidos">
                                <input type="text" class="form-control" placeholder="Apellidon2" id="patient-apellidos2" name="patient-apellidos2" >
                                <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
										
                            </div>
							<!--<div id="search-resut-nombres-padron"></div>-->
							</form>
                        </div>
						
                    </div>
                </div>
				<hr/>
                    <div class="card-body">
						 <h3 class="card-title">Recepción de Petición</h3>
					<div id="search-results"></div>
					</div>
					
            </div>
		
         </div>
        </div>
		
	
    </section>


  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script> 


<script>

$(document).ready( function(){

	var keyupTimer1;
  $(document).on('keyup', '#patient-nec-search', function(event) {
  	var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               searchBynec(keyword);
            }, 300);
        });
	
	
	
function searchBynec(str){
		window.location.href = "<?php echo site_url('internal_pharmacy/searchPatientRecord');?>/" + str;
/*
 $.ajax({
type: "GET",
url: "<?=base_url('internal_pharmacy/searchPatientRecord')?>",
data: {keyword:str},
success:function(data){
$("#search-results").html(data);
//$("#suggesstion-box-").hide();
},

});

*/


}	
	
var base_url='<?php echo base_url(); ?>';	

	
	  $(document).on('click', '.printDispatchedDrugs', function(event) {
		 event.preventDefault();

		 
  	window.open(base_url +'print_page_hospitalization/farma_interna/'+ $(".id_patient").val()+'/'+ $(".id_centro").val()+'/'+ $(".id_hosp").val(), '_blank', 'noopener, noreferrer');
	 
setTimeout(function() {
        //searchBynec($('#patient-nec-search').val());
		 location.reload(true);
		}, 1000);
	
        });
	
	
	
	
	
 });
</script>

	

	 
</body>

</html>