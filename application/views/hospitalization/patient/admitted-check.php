<section class="py-5">
<div class="container-fluid">
	<div class="col-md-12">
	<div class="row py-3">
	<div class="col-md-6">
	  <div class="card">
					
			   <div class="card-body">
			     <h6>Filtra por centro medico</h6>
					<form method="GET" action="<?php echo site_url("medico/appointments_by_date_range");?>" >
                    <div class="row g-2">
					
                        <div class="col-md-4">
						<select class="form-select centro common_selector" >
						<option  value=""  ></option>
						<?php 
						echo $filter_by_centro;
						?>

						</select>
                        </div>
                       <!-- <div class="col-md-8">
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
                        </div>-->
						
                    </div>
</form>
                </div>
            </div>
			</div>
			
			
			
			
			
			<div class="col-md-6">
			
			
			
			
			
			  <div class="card">
			
			   <div class="card-body">
			     <h6>Filtra por paciente hospitalizado</h6>
					 <div class="row g-2">
					
                        <div class="col-md-4">
						<select class="form-select patient common_selector" disabled>
						<option  value=""  ></option>
						
						</select>
                        </div>
                       
						
                    </div>

                </div>
            </div>
			</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		<div class="card">
			 <div class="card-header fs-2"> <?=$table_title?></div>
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
					<th>CAUSA</th>
					<th>SALA</th>
					
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
	
	 <div class="modal fade" id="largeModalInsumo" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Insumo</h4>
         
            
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
        
  <div class="card-body">

  </div>

          </div>
      
        </div>
      </div>
    </div>
	
	
	 <div class="modal fade" id="largeModalKardex" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Kardex</h4>
         
            
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
        
  <div class="card-body">
 <div id="kardez-content"></div>
  </div>

          </div>
      
        </div>
      </div>
    </div>
<div id="serr"></div>

  <?php $this->load->view('footer');?>
<input type="hidden" id="base_url" value="<?=base_url()?>"  />
<input type="hidden" id="table_insumo" value="<?=$table_insumo?>"  />
<input type="hidden" id="table_insumo_link" value="<?=$table_insumo_link?>"  />
<input type="hidden" id="id_patient_hist"   />
<input type="hidden" id="id_centro_to_save"   />
 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
 <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script> 
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
<script src="<?= base_url();?>assets-hopitalization/js/insumo.js?rnd=<?= time() ?>"></script> 
<script src="<?= base_url();?>assets-hopitalization/js/kardex.js?rnd=<?= time() ?>"></script> 
<?php $this->load->view('prevent-duplicated-entry');?>
 <?php $this->load->view('linked-selected-functions');?>
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
            url:"<?php echo base_url(); ?>utilitaire/fetch_patients_hoptalization_data/"+page,
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

$('#serr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
		
		  $.ajax({
            url:"<?php echo base_url(); ?>patient_hospitalization_controller/fetch_patients/",
            method:"POST",
            dataType:"JSON",
            data:{centro:$('.centro').val(), origine:<?=$origine?>},
            success:function(data)
            {
				$('.patient').prop('disabled', false);
                $('.patient').html(data.patient_list);
           
            },

        })
    });
	
	
	
	//--LOAD KARDEX POP UP-----
	
	let largeModalKardex = 0;
		var exampleModalKarex= $('#largeModalKardex');
		exampleModalKarex.on('show.bs.modal', function(event) {
			
			var button = $(event.relatedTarget);
			largeModalKardex++;

			if (largeModalKardex == 1) {
				 $.ajax({
            url:"<?php echo base_url(); ?>hosp_kardex/loadModalKardex/",
            method:"POST",
            data:{patient:button.data('id')},
            success:function(data)
            {
				 $('#kardez-content').html(data);
           
            },

        })
			}
		})
	
	
	
	
	
	
 });
</script>

	

	 
</body>

</html>