   <section class="py-3">
        <div class="container">
            <h3 class="border-bottom text-primary pb-2">Busqueda de tarifarios</h3>
          
	      <div class="card bg-light">
		  
		  
		  
		   <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Tarifarios para Médicos</button>
                </li>
				<?php if($USER_PERFIL !="Medico") { ?>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Tarifarios para Centros Médicos</button>
                </li>
                <?php } ?>
              </ul>
		  
		  
		  
		  
		   <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <form class="row g-3" method="post" action="<?php echo site_url("$USER_CONTROLLER/show_invoice_tariff_by_insurance"); ?>" >
                <div class="card-body">
				 <div class="row g-2">
                        <div class="col-md-5">
                            <label class="form-label">Seleccione Centros Médico</label>
                            <select class="form-select select2" id="centro" name="id_centro">
                             
								<?=$result_centro_medicos?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Seleccione Médicos</label>
                            <select class="form-select select2" id="medico-search" name="id_doctor">
                               
                            </select>
							<button class="btn btn-primary float-end mt-2" type="submit" id="searchDocTariff" disabled><i class="bi bi-search"></i></button>
                        </div>
						
                    </div>
                </div>
				</form>
				
				</div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                   <form class="row g-3" method="GET" action="<?php echo site_url("$USER_CONTROLLER/display_tarif_centro_categoria"); ?>" >
                <div class="card-body">
				 <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Seleccione Centros Médicos</label>
                            <select class="form-select select2" id="centro_center" name="id_centro_center" >
								<option value=""></option>
								<?php 

								foreach($centro_medicos_publico as $row)
								{ 
								?>
								<option value="<?=$row->id_m_c?>" ><?=$row->name?></option>
								<?php
								}
								?>
								</select>
                        </div>
						
                        <div class="col-md-6">
                            <label class="form-label">Seguro Médicos </label>
                            <select class="form-select select2" id="seguro-search-with-tariff" name="seguro-search">
                              <option value=""></option>
                            </select>
						 </div>
						  
						 </div>
                    </div>
					</form>
                </div>
				
			   </div>
                
              </div>
		  
		  
		  
		  
		  
			
            
			<div id="show-tariff-result">
			</div>

           

        </div>
    </section>
	<input  id="controller" type="hidden" value="<?=$USER_CONTROLLER?>"/>
	 <?php $this->load->view('footer'); ?>
	    <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>

    <?php $this->load->view('linked-selected-functions');?>
	<script>
	
	$(document).ready( function(){
		
	$('#centro').change(function () {
	loadDocOnCentroSelect($(this).val(), "medico-search");
	});
	var controllerLing = $('#controller').val();
	
		$('.select2').select2({
		theme: 'bootstrap-5',
		width: '100%',
	});
	
	$('#medico-search').on('change', function () {

$('#searchDocTariff').prop("disabled", false);

});
	$('#seguro-search-with-tariff').on('change', function () {

$.ajax({
type: "POST",
url: '<?php echo site_url('tarifarios_centro/display_tarif_centro_categoria');?>',
data:{id_seguro:$('#seguro-search-with-tariff').val(),id_centro:$('#centro_center').val()},
success: function(data){
if(data==0){
window.location.href = "<?php echo site_url()?>"+controllerLing+"/display_tarif_centro_categoria/" + $('#centro_center').val() + "/" +$('#seguro-search-with-tariff').val();	

}else{
     $('html, body').animate({
        scrollTop: $("#show-tariff-result").offset().top
    }, 1000);
$("#show-tariff-result").html(data);
}
},


});



});
/*	
var id_centro= $('#centro_center').val();
var id_seguro = $('#seguro-search').val();
	$('.seguro-search').select2({
		theme: 'bootstrap-5',
		width: '100%',
		language: {
            noResults: function () {
              return $("<a href='upload_center_tariffs/"+$('#centro_center').val()+"' class='new_item'>Subir Tarifarios para el Centro Médicos seleccionado </a>");
		 }
        }
		
	});*/
	
	$('#centro_center').on('change', function(event) {
     $.ajax({
	type: "POST",
	url: '<?php echo site_url('tarifarios_centro/getSeguroWithTariff');?>',
	data:'id='+$('#centro_center').val(),
	success: function(data){
	$("#seguro-search-with-tariff").html(data);
	},

	});
	
	
});
	
		
	});
	
		

	</script>
	 </body>

</html>