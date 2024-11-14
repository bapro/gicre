  <form action="<?php echo site_url('users/saveUser');?>" method="post" enctype="multipart/form-data"  novalidate class="needs-validation" autocomplete="off">
                    <div class="row mb-3 ">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Perfil</label>
                      <div class="col-md-8 col-lg-9">
                        			Médico
									 <input name="perfil" type="hidden" class="form-control" id="perfil"  value="Medico">
                      </div>
                    </div>

              <div class="row mb-3">
                      <label for="userEmail" class="col-md-4 col-lg-3 col-form-label">Correo Electrónico <span class="text-danger">*</span> </label>
                      <div class="col-md-5 col-lg-6">
                        <input name="id_user" type="hidden" class="form-control" id="id_user" >
						  <input name="userEmail" type="email" class="form-control" id="userEmail"  required>
						<div class="invalid-feedback">Por favor, introduzca el correo electrónico.</div>
                      </div>
                    </div>
					
					
                    <div class="row mb-3">
                      <label for="userName" class="col-md-4 col-lg-3 col-form-label">Nombres <span class="text-danger">*</span> </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="userName" type="text" class="form-control" id="userName"  required>
						<div class="invalid-feedback">Por favor, introduzca los nombres.</div>
						<div id="search-by-nombres"></div>
                      </div>
                    </div>
					
					<!--MEDICO FIELDS------->
					<span id="medico-fields">
					<div class="row mb-3">
					<label for="exequatur" class="col-md-4 col-lg-3 col-form-label">Exequatur <span class="text-danger">*</span> </label>
					<div class="col-md-6 col-lg-7">

					<input name="exequatur" type="text" class="form-control" id="exequatur"  required>
					<div class="invalid-feedback">Por favor, introduzca el exequatur.</div>
					<div id="nombres-options"></div>
					</div>
					</div>
					<div class="row mb-3">
					<label for="area" class="col-md-4 col-lg-3 col-form-label">Area <span class="text-danger">*</span> </label>
					<div class="col-md-4 col-lg-5">

					 <select class="form-select" id="area" name="especialidad" required>
						 <option value=""></option>
									<?php 
									$queryaR= $this->db->query("SELECT id_ar, title_area FROM areas ORDER BY title_area DESC ");
									$AREAS = $queryaR->result();
                                  foreach ($AREAS as $area)
									{
									echo "<option value='$area->id_ar'>$area->title_area</option>";
									}	

									?>

                            </select>
					<div class="invalid-feedback">Por favor, introduzca la area del médico.</div>
					</div>
					</div>
					
					
					
					
					<div class="row mb-3">
					<label for="area" class="col-md-4 col-lg-3 col-form-label">Plan de pago </label>
					<div class="col-md-4 col-lg-5">

					<div class="form-check">
					<input class="form-check-input" type="radio" id="payment-plan1"  name="payment-plan" checked>
					<label class="form-check-label" for="payment-plan1">
					Mensual	$40USD
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio"  name="payment-plan" id="payment-plan2">
					<label class="form-check-label" for="payment-plan2">
					Anual $400USD

					</label>
					</div>
		
					<div class="invalid-feedback">Por favor, eliga el plan de pago.</div>
					</div>
					</div>	
					</span>
					
				<!----MEDICO FIELDS END --------->
				<!--ASISTENTE MEDICO FIELDS------->
					<span id="asistente-medico-fields">
						</span>
                   <div class="row  mb-3">
                   <label for="userCedula" class="col-md-4 col-lg-3 col-form-label">Cédula</label>
                    <div class="col-md-3 col-lg-4"><input name="userCedula" type="text" class="form-control" id="userCedula" ></div>
                  </div>

                    <div class="row mb-3">
                      <label for="userPhone" class="col-md-4 col-lg-3 col-form-label">Teléfono </label>
                      <div class="col-md-3 col-lg-4">
                        <input name="userPhone" type="text" class="form-control" id="userPhone">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="whatsapp_link" class="col-md-4 col-lg-3 col-form-label">WhatsApp Link </label>
                      <div class="col-md-3 col-lg-4">
                        <input name="whatsapp_link" type="text" class="form-control" id="whatsapp_link">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
				  <script src="<?= base_url();?>assets_new/js/main.js"></script> 
		<script>

		$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		});



 	var keyupTimerLabI;
		  $(document).on('keyup', '#userName_', function(event) {
   	var keyword = $(this).val();
            clearTimeout(keyupTimerLabI);
           
            keyupTimerLabI = setTimeout(function () {
               autoCompleteInputName(keyword);
            }, 300);
        });





	
function autoCompleteInputName(keyword){ 

	$.ajax({
type: "POST",
url: "<?=base_url('users/autoCompleteDoctor')?>",
data: {keyword:keyword},
success:function(data){ 
$("#nombres-options").html(data); 

}  
});


};	
	


		</script>