<?php $this->load->view('clinical-history/aside'); ?>
<main id="main" class="main">
  <div id="result-error"></div>
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="background:none;border:none">

      <div class="card-body" style="background:none;border:none">
        <h5 class="card-title">Antecedentes Generales</h5>
        <div class="accordion accordion-flush" id="accordionFlushExample" style="background:none;border:none">


          <div class="accordion-item" style="background:none">
            <h2 class="accordion-header" id="flush-antGnl">


              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseantGnl" aria-expanded="false" aria-controls="flush-collapseantGnl">
                Antecedentes personales, familiares y patologicos
              </button>
            </h2>
            <div id="flush-collapseantGnl" class="accordion-collapse collapse" aria-labelledby="flush-antGnl" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <div class="col-sm-12">

                  <!-- Default Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">1- Personales y familiares</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="antAlegReactMed-tab" data-bs-toggle="tab" data-bs-target="#antAlegReactMed" type="button" role="tab" aria-controls="antAlegReactMed" aria-selected="false"> 2- Alérgicos y reacción a medicamentos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pediatry-tab" data-bs-toggle="tab" data-bs-target="#pediatry" type="button" role="tab" aria-controls="pediatry" aria-selected="false"> 3- Pediátrico</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="otrosAnt-tab" data-bs-toggle="tab" data-bs-target="#otrosAnt" type="button" role="tab" aria-controls="otrosAnt" aria-selected="false"> 4- Otros antecedentes</button>
                    </li>

                  </ul>
                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <?php $this->load->view('clinical-history/antecedent-personal-family/index'); ?>
                    </div>
                    <div class="tab-pane fade" id="antAlegReactMed" role="tabpanel" aria-labelledby="antAlegReactMed-tab">

                      <?php $this->load->view('clinical-history/food-drug-alergy/index'); ?>

                    </div>



                    <div class="tab-pane fade" id="pediatry" role="tabpanel" aria-labelledby="pediatry-tab">
                      <?php $this->load->view('clinical-history/pediatry/form'); ?>
                    </div>
                    <div class="tab-pane fade" id="otrosAnt" role="tabpanel" aria-labelledby="otrosAnt-tab">
                      <?php $this->load->view('clinical-history/other-antecedents/index'); ?>
                    </div>
                  </div><!-- End Default Tabs -->


                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item" style="background:none">
            <h2 class="accordion-header" id="flush-sosAbMal">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSosAbMal" aria-expanded="false" aria-controls="flush-collapseSosAbMal">
                Sospecha de abuso o maltrato
              </button>
            </h2>
            <div id="flush-collapseSosAbMal" class="accordion-collapse collapse" aria-labelledby="flush-sosAbMal" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <?php $this->load->view('clinical-history/abuse-suspition/index'); ?>
              </div>
            </div>
          </div>

          <div class="accordion-item" style="background:none">
            <h2 class="accordion-header" id="flush-VioIntraFam">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseVioIntraFam" aria-expanded="false" aria-controls="flush-collapseVioIntraFam">
                Violencia intrafamiliar
              </button>
            </h2>
            <div id="flush-collapseVioIntraFam" class="accordion-collapse collapse" aria-labelledby="flush-VioIntraFam" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <?php $this->load->view('clinical-history/intra-family-violence/index'); ?>

              </div>
            </div>
          </div>


          <div class="accordion-item" style="background:none">
            <h2 class="accordion-header" id="flush-HabTox">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseHabTox" aria-expanded="false" aria-controls="flush-collapseHabTox">
                Hábitos tóxicos
              </button>
            </h2>
            <div id="flush-collapseHabTox" class="accordion-collapse collapse" aria-labelledby="flush-HabTox" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">

                <div class="col-sm-12">
                  <?php $this->load->view('clinical-history/toxic-habits/index'); ?>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Accordion without outline borders -->

      </div>



    </div>
    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-currentDisease" role="tabpanel" aria-labelledby="v-pills-currentDisease-tab">
      <?php $this->load->view('clinical-history/enfermedad-actuales/index'); ?>
    </div>
    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-condiag" role="tabpanel" aria-labelledby="v-pills-condiag-tab">
      <?php $this->load->view('clinical-history/conclusion-diag/index'); ?>
    </div>
	 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-physic" role="tabpanel" aria-labelledby="v-pills-physic-tab">
        <?php $this->load->view('clinical-history/examen-fisico/index'); ?>

          </div>
    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-sigVital" role="tabpanel" aria-labelledby="v-pills-sigVital-tab">

      <?php

      $this->load->view('clinical-history/vital-signals/index');
      ?>

    </div>

 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-recetas" role="tabpanel" aria-labelledby="v-pills-recetas-tab">
 <?php $this->load->view('clinical-history/indications/tabs/index'); ?>

        </div>
 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-vacunas" role="tabpanel" aria-labelledby="v-pills-vacunas-tab">

      <?php $this->load->view('clinical-history/pediatry/vacuna'); ?>

    </div>
	<div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-patDocumentos" role="tabpanel" aria-labelledby="v-pills-patDocumentos-tab">
   <h4 class="card-title">Documentos del paciente</h4>
	    
       <div class="col-sm-12">
	   <?php $this->load->view('patient/documentos');?>
       </div>

        </div>
  </div>
</main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php 
$this->load->view('clinical-history/general-report/index'); 
 $this->load->view('clinical-history/medical-order/index'); 
 $this->load->view('clinical-history/ginecology/colposcopy/index'); 
 $this->load->view('clinical-history/ginecology/vulvoscopy/index'); 
 $this->load->view('clinical-history/description-surgery/index'); 
  $this->load->view('clinical-history/resume/index'); 
  $this->load->view('clinical-history/follow-up/index');  
  $this->load->view('clinical-history/footer-links'); 
  $this->load->view('clinical-history/reset-form_alert-success');  ?>
 <script>
  $(document).ready(function() {
    $("#pediatry-form").on('change', function(event) {
      var countCheckedCheckboxes = $('#pediatry-form input[type="checkbox"]').filter(':checked').length;
      var countCheckedRadio = $('#pediatry-form input[type="radio"]').filter(':checked').length;
      var txtinput = $("input.txt-inp-pedia").filter(function() {
        return $(this).val();
      }).length;
      var txtarea = $("textarea.txt-ares-pedia").filter(function() {
        return $(this).val();
      }).length;
      $("#pediatry-form-checkbox").val(countCheckedCheckboxes);
      $("#pediatry-form-radio").val(countCheckedRadio);
      if (txtinput == 0 && txtarea == 0) {
        $("#pediatry-form-inputs").val(0);
      } else {
        $("#pediatry-form-inputs").val(1);
      }

    });

  



   $("#vaccination-form").on('change', function(event) {
      var countCheckedCheckboxes = $('#vaccination-form input[type="checkbox"]').filter(':checked').length;
       var txtinput = $("input.vacunation-input").filter(function() {
        return $(this).val();
      }).length;
    
      $("#vacunation-form-checkbox").val(countCheckedCheckboxes);
   
      if (txtinput == 0) {
        $("#vacunation-form-inputs").val(0);
      } else {
        $("#vacunation-form-inputs").val(1);
      }

    });



    $(".vacuan-dosis-checked input[type='checkbox']").on('change', function(event) {
      if ($(this).is(":checked")) {
        $(this).closest("tr").addClass("bg-success text-white");
      } else {
        $(this).closest("tr").removeClass("bg-success text-white");
      }
    });
	
	
	
	    $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
      saveEnfermedadActualConclusionDiag(0, 0);
    
     });
	
	
	
	
	
	
	
	
	
	
  });
  </script>
<?php 
//$this->load->view('clinical-history/pediatry/save-footer-pediatry'); 
?>

<!-- Vendor JS Files -->