<section class="py-5">
<div class="container-fluid">
	<div class="col-md-12">
	<div class="row py-3">
	 <h1 class="text-danger text-center">EMERGENCIA</h1>
	<div class="col-md-6">
	  <div class="card">
					
			   <div class="card-body">
			     <h6>Filtra por centro medico</h6>
					<form method="GET" action="<?php echo site_url("medico/appointments_by_date_range");?>" >
                    <div class="row g-2">
					
                        <div class="col-md-4">
						<select class="form-select centro common_selector" >
						<?php 
						echo $filter_by_centro;
						?>

						</select>
                        </div>
                   
						
                    </div>
</form>
                </div>
            </div>
			</div>
			
			
			
			
			
			<div class="col-md-6">
			
			
			
			
			
			  <div class="card">
			
			   <div class="card-body">
			     <h6>Buscar paciente por nombres o por NEC</h6>
					 <div class="row g-2">
					
                        <div class="col-md-4">
						<select class="form-select patient common_selector" disabled>
						</select>
                        </div>
                       
						
                    </div>

                </div>
            </div>
			</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		<div class="card">
			 <div class="card-header fs-2 text-center"> <?=$table_title?></div>
			<div class="card-body">
 

    <div class="table-responsive">
	
	
                <table class="table table-sm  table-striped" id="patient-citas-table">
                    <thead>
					<tr>
					
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						 <th></th>
                        <th></th>
						  
						
					</tr>
                          <tr>
					
					<th>NOMBRES</th>
					<th>FECHA INGRESO</th>
					<th>
					<?php if($origine==1){?>
					FECHA EGRESO
					<?php } ?>
					</th>
					
					<th>SEGURO MEDICO</th>
					<th>CENTRO MEDICO</th>
					<?php if($origine==1){
					echo '<th>DIAGNOSTICO</th>';	
					}else{
					echo '<th>CAUSA</th>';	
					}  ?>
					<th>REFERIDO POR</th>
					
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
	</div>

 </div>
    </section>
	



  <?php $this->load->view('footer');?>
<input type="hidden" id="base_url" value="<?=base_url()?>"  />
<input type="hidden" id="id_patient_hist"   />
<input type="hidden" id="id_centro_to_save"   />
 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
 <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script> 

<script>

$(document).ready( function(){

$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
	
	
	
	
	 filter_data(1);

    function filter_data(page)
    {
        $('.filter_data_spin').html('<div class="spinner-border remove-this-spinner" ></div>')
        var action = 'fetch_data';
     
        var centro = $('.centro').val();
        var patient = $('.patient').val();
        $.ajax({
            url:"<?php echo base_url(); ?>patient_emergency_controller/fetch_patients_emergency_data/"+page,
            method:"POST",
            dataType:"JSON",
            data:{action:action,centro:centro, patient:patient, origine:<?=$origine?>},
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

   

    $(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').change(function(){
		$('.filter_data').html('');
		$('.filter_data_spin').html('<div class="spinner-border remove-this-spinner"  ></div>');
        filter_data(1);
		filter_data_patient($('.centro').val());
		
    });
	
	
	
filter_data_patient($('.centro').val());

   function filter_data_patient(centro)
    {
        $.ajax({
            url:"<?php echo base_url(); ?>patient_emergency_controller/fetch_patients/",
            method:"POST",
            dataType:"JSON",
            data:{centro:centro, origine:<?=$origine?>},
            success:function(data)
            {
				$('.patient').prop('disabled', false);
                $('.patient').html(data.patient_list);
           
            },

        })
    }


	
	
 });
</script>

	

	 
</body>

</html>