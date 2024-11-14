 <section class="py-3">
        <div class="container">
           

            <div class="card">
					
			   <div class="card-body">
			   <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buscar Citas Previas</button>
			     <div class="collapse" id="collapseExample">
                    <h6>Seleccione un centro medico</h6>
					<form method="GET" action="<?php echo site_url("admin/appointments_by_date_range");?>" >
                    <div class="row g-2">
					
                        <div class="col-md-4">
                            <select class="form-select" id="centro" name="centro">
								
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Desde</span>
                                <input type="date" class="form-control" placeholder="" id="desde" name="desde">
                                <span class="input-group-text">Hasta</span>
                                <input type="date" class="form-control" placeholder="" id="hasta" name="hasta">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-search"></i></button>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="fa fa-print"></i></button>
                            </div>
                        </div>
						
                    </div>
</form>
                   </div>
                </div>
            </div>
			
			<div class="card">
			 <div class="card-header fs-2"> Citas de hoy</div>
			<div class="card-body">
 

    <div class="table-responsive">
	
	
                <table class="table table-sm  table-striped " id="patient-citas-table" style="width:100%">
                    <thead>
					<tr>
					<th></th>
						<th></th>
						<th>
						 
						
						</th>
						<th></th>
						<th>
						<select class="form-select centro common_selector" >
<option  value=""  >Filtrar por Centro Médico</option>
						<?php
						foreach($brand_data->result_array() as $row)
						{
						?>
						
						<option value="<?php echo $row['centro']; ?>"  > <?php echo $row['name']; ?></option>
						<?php
						}
						?>

						</select>
						
						</th>
						<th></th>
						 <th></th>
                          <th></th>
					</tr>
                        <tr class="bg-th">
						<th>Foto</th>
						<th>NEC</th>
						<th>Nombres</th>
						<th>Seguro Médico</th>
						<th >Centro Médico</th>
						<th>Doctor</th>
						 <th>Fecha Propuesta</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="filter_data">
                    </tbody>
                </table>
				 
            </div>
			<div style="position:fixed;top:50%;left:50%;z-index:900000"  class="filter_data_spin" >
                 
                </div>
				
			
<div style="float:right" id="pagination_link">

                </div>
			


</div>
	  </div>
      
    </section>
	
 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?= base_url(); ?>assets_new/js/upload-fotos.js?rnd=<?= time() ?>"></script>
  <script src="<?= base_url(); ?>assets_new/js/upload-surgery-documents.js?rnd=<?= time() ?>"></script>
   <script src="<?= base_url();?>assets_new/js/indications.js?rnd=<?= time() ?>" ></script>
    <script src="<?= base_url();?>assets_new/js/repeated-historial-clinica.js?rnd=<?= time() ?>" ></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
	  
	 	<script> 
	 document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    }    
    
    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
}); 
	</script>	  
	  
	<script>
$(document).ready(function(){
$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
    filter_data(1);

    function filter_data(page)
    {
        $('.filter_data_spin').html('<div class="spinner-border remove-this-spinner" ></div>')
        var action = 'fetch_data';
     
        var brand = get_filter('centro');
       
        $.ajax({
            url:"<?php echo base_url(); ?>product_filter/fetch_data/"+page,
            method:"POST",
            dataType:"JSON",
            data:{action:action,brand:brand},
            success:function(data)
            {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
				 $('.remove-this-spinner').removeClass("spinner-border");
            },
			 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.filter_data').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
        })
    }

    function get_filter(class_name)
    {
        //var filter = [];
       // $('.'+class_name+':checked').each(function(){
           // filter.push($(this).val());
       // });
        //return filter;
		return $('.centro').val();
    }

    $(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').change(function(){
		$('.filter_data').html('');
		$('.filter_data_spin').html('<div class="spinner-border remove-this-spinner"  ></div>');
        filter_data(1);
    });

 

});
</script>
