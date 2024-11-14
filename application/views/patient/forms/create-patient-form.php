 <?php

$data['nombre'] = set_value('nombre');
$data['apodo'] = set_value('apodo');
$data['cedula'] = '';
$data['date_nacer'] = set_value('date_nacer');
$data['tel_cel'] = set_value('tel_cel');
$data['edad'] = '';
$data['tel_resi'] = '';
$data['email'] = '';
$data['sexo'] = set_value('sexo');
$data['estado_civil'] = set_value('estado_civil');
$data['nacionalidad'] =set_value('nacionalidad');
$data['provincia'] = 0;
$data['municipio'] = 0;
$data['barrio'] = '';
$data['calle'] = '';
$data['seguro_medico_id']="";
$data['contacto_em_nombre']= "";
$data['contacto_em_alias']= "";
$data['contacto_em_cel']= "";
$data['contacto_em_tel1']="";
$data['contacto_em_tel2']= "";
$data['where_patient_from']= "";
 ?>
 
 <section class="py-3">
        <div class="container">
         
               <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">CREAR NUEVO PACIENTE</h5>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Personales</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Opcionales</button>
                </li>
                
              </ul>
			  <form action="<?php echo site_url("patient_controller/savePatientData"); ?>" novalidate class="needs-validation" enctype="multipart/form-data" id="sendcita" method="post">
                <input name="id_patient"  type="hidden" value="0" />
				   <input name="created_by"  type="hidden" value="<?=$this->session->userdata['user_id'];?>" />
				   <input name="updated_by"  type="hidden" value="<?=$this->session->userdata['user_id'];?>" />
				   <input name="created_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
				   <input name="updated_time"  type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
                 <?=$this->session->flashdata('error_messages')?> <?php echo validation_errors();?>
			  <span id="show-alert-if-inputs-data">
			 <div class="tab-content pt-2" id="myTabContent">
			 
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="row g-3">
                        
                        <?php $this->load->view('patient/forms/datos-personales-form', $data);?>

                             </div>
			   </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php $this->load->view('patient/forms/datos-opcionales-form');?>
				</div>
               
              </div><!-- End Default Tabs -->
</span>
            </div>
					  <div class="d-flex align-items-center justify-content-center mb-3">
					
             <button class="btn btn-primary btn-lg disabled-btn-duplicate-cedula" type="submit"><i class="bi bi-save"></i> GUARDAR</button>
            
        </div>
		</form>
		<input class="if-form-has-data" type="hidden" />
          </div>
            </div>

        </div>
    </section>
    <footer class="fixed-bottom bg-light border-top">
        <div class="container text-center py-3">
          Copyright © <?php echo date("Y"); ?> GICRE Todos los derechos reservados.
        </div>
        <div class="d-flex">
            <div class="flex-fill bg-primary pt-1"></div>
            <div class="flex-fill bg-warning pt-1"></div>
            <div class="flex-fill bg-success pt-1"></div>
            <div class="flex-fill bg-danger pt-1"></div>
        </div>
    </footer>

    
	  <!-- <script src="<?=base_url();?>assets2/js/bootstrap.bundle.js?rnd=123"></script>-->
	    <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
  <?php $this->load->view('patient/forms/footer');?>
<script>
$(document).ready( function(){
$("#seguro_medico").on('change', function (e) {
e.preventDefault();
onChangeSeguroMedico("", $(this).val(), "", 0);

});
$('form').on('change keyup keydown', 'input, textarea, select', function (e) {
var txtinput= $("input.required-before-leave").filter(function(){ return $(this).val(); }).length;
var select = $("select.required-before-leave").filter(function(){ return $(this).val(); }).length;
		
			if(txtinput ==0 && select==0){
				 $(".if-form-has-data").val(0);
			}else{
				$(".if-form-has-data").val(1);
			}

        });

 $("#sendcita").on("submit", function (e) {
      $(".if-form-has-data").val(0); 
    })

});
</script>
</body>

</html>