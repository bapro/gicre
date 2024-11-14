<?php $this->load->view('clinical-history/aside'); 
//style="border:1px solid color-mix(in srgb, #34c9eb, white);"style="border:1px solid color-mix(in srgb, #34c9eb, white);"
?>


<main id="main" class="main" >
    <div id="result-error"></div>

    <div class="tab-content" id="v-pills-tabContent" >
        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="background:none;border:none">

            <div class="card-body" >
                <h5 class="card-title">Antecedentes Generales</h5>
                <div class="accordion accordion-flush" id="accordionFlushExample" style="background:none;border:none">


                    <div class="accordion-item" style="background:none">
                        <h2 class="accordion-header" id="flush-antGnl">


                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseantGnl" aria-expanded="false" aria-controls="flush-collapseantGnl">
                               Antecedentes personales, familiares y patológicos
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
                                            <button class="nav-link" id="ssr-tab" data-bs-toggle="tab" data-bs-target="#ssr" type="button" role="tab" aria-controls="ssr" aria-selected="false"> 3- SSR</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="obs-tab" data-bs-toggle="tab" data-bs-target="#obs" type="button" role="tab" aria-controls="obs" aria-selected="false"> 4- Obstétricos</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="otrosAnt-tab" data-bs-toggle="tab" data-bs-target="#otrosAnt" type="button" role="tab" aria-controls="otrosAnt" aria-selected="false"> 5- Otros antecedentes</button>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-2" id="myTabContent" >
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <?php $this->load->view('clinical-history/antecedent-personal-family/index'); ?>
                                        </div>
                                        <div class="tab-pane fade" id="antAlegReactMed" role="tabpanel" aria-labelledby="antAlegReactMed-tab">

                                            <?php $this->load->view('clinical-history/food-drug-alergy/index'); ?>

                                        </div>



                                        <div class="tab-pane fade" id="ssr" role="tabpanel" aria-labelledby="ssr-tab">

                                            <?php $this->load->view('clinical-history/ginecology/ssr/index'); ?>
                                        </div>

                                        <div class="tab-pane fade" id="obs" role="tabpanel" aria-labelledby="obs-tab">
                                            <?php $this->load->view('clinical-history/ginecology/obs/index'); ?>
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
        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-sigVital" role="tabpanel" aria-labelledby="v-pills-sigVital-tab">
            <?php $this->load->view('clinical-history/vital-signals/index'); ?>
        </div>
		 <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-physic" role="tabpanel" aria-labelledby="v-pills-physic-tab">
        <?php $this->load->view('clinical-history/examen-fisico/index'); ?>

          </div>
        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-controlPrena" role="tabpanel" aria-labelledby="v-pills-controlPrena-tab">

            <?php $this->load->view('clinical-history/ginecology/control-prenatal/index'); ?>
        </div>
		  <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-recetas" role="tabpanel" aria-labelledby="v-pills-recetas-tab">

            <?php $this->load->view('clinical-history/indications/tabs/index'); ?>

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
$this->load->view('clinical-history/reset-form_alert-success');
 ?>


<!-- Vendor JS Files -->


<script>
  $(document).ready(function() {
	

    	    $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
	saveEnfermedadActualConclusionDiag(0, 0);
   


    });	
	
  });
  </script>