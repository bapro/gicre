  <section class="section">
    <div class="row">
	<div id="result-errordddd"></div>
      <div class="col-lg-12" id="exam-fisico-form">
        <?php
		$servicio=$this->session->userdata('doctorEspecialidad');
		if($servicio=='ginecology'){
			$hide_exam_fisico="style='display:none'";
			$hide_ex_fis_mamas_y_pelvico='';
			$show_when_cardiovas="";
			$dont_show_this_button_when_evacardio="";
			echo "<input value='1' type='hidden' id='isGinecoloyMamas' />";
		}elseif($servicio=='pediatry'){
			$hide_exam_fisico="";
			$hide_ex_fis_mamas_y_pelvico='';
			$show_when_cardiovas="";
			$dont_show_this_button_when_evacardio="";
			echo "<input value='1' type='hidden' id='isGinecoloyMamas' />";
		}
		
		elseif($servicio=='evaluation_cardiovascular'){
			$hide_exam_fisico="";
			$hide_ex_fis_mamas_y_pelvico="style='display:none'";
			$dont_show_this_button_when_evacardio="style='display:none'";
			$show_when_cardiovas="show";
			echo "<input value='0' type='hidden'  id='isGinecoloyMamas' />";
		}
		
		else{
			$hide_ex_fis_mamas_y_pelvico="style='display:none'";
			$hide_exam_fisico="";
			$dont_show_this_button_when_evacardio="";
			$show_when_cardiovas="";
			echo "<input value='0' type='hidden' id='isGinecoloyMamas'  />";
		}
    
	
if ($ex_fis_data > 0 && $query_ex_fis !=NULL ) {
  foreach ($query_ex_fis as $rowEd1)
$in_by = $rowEd1->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $rowEd1->inserted_time;
$up_time = date("Y-m-d H:i:s");

} else { 
$up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
}
	
        ?>

        <div class="card-body">
          <div class="accordion  " id="accordionExamFis">
            <div class="accordion-item" <?=$hide_exam_fisico?>>
              <h2 class="accordion-header shadow-sm" id="headingOneExamFis">
                <button <?=$dont_show_this_button_when_evacardio?> class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneExamFis" aria-expanded="false" aria-controls="collapseOneExamFis">
                  I- Examen físico
                </button>
              </h2>
              <div id="collapseOneExamFis" class="accordion-collapse collapse show <?=$show_when_cardiovas?>" aria-labelledby="headingOneExamFis" data-bs-parent="#accordionExamFis">
                <div class="accordion-body">
                  <?php $this->load->view('clinical-history/examen-fisico/form-exam'); ?>

                </div>
              </div>
            </div>
            <div class="accordion-item border-top" <?= $hide_ex_fis_mamas_y_pelvico ?>>
              <h2 class="accordion-header" id="headingTwoExamFis">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoExamFis" aria-expanded="false" aria-controls="collapseTwoExamFis">
                  II- Examen de mamas
                </button>
              </h2>
              <div id="collapseTwoExamFis" class="accordion-collapse collapse" aria-labelledby="headingTwoExamFis" data-bs-parent="#accordionExamFis">
                <div class="accordion-body">
                  <?php $this->load->view('clinical-history/examen-fisico/form-exam-mamas'); ?>

                </div>
              </div>
            </div>
            <div class="accordion-item border-top" <?= $hide_ex_fis_mamas_y_pelvico ?>>
              <h2 class="accordion-header" id="headingThreeExamFis">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeExamFis" aria-expanded="false" aria-controls="collapseThreeExamFis">
                  III- Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
                </button>
              </h2>
              <div id="collapseThreeExamFis" class="accordion-collapse collapse" aria-labelledby="headingThreeExamFis" data-bs-parent="#accordionExamFis">
                <div class="accordion-body">
                  <?php $this->load->view('clinical-history/examen-fisico/form-pelv-exp'); ?>
                </div>
              </div>
            </div>
          </div>
          <?php

          if ($ex_fis_data == 1) { ?>
            <div class="float-end">
              <br />

                <button type="button" class="btn btn-primary" id="resetExamFis">Nuevo</button>
             
              <button type="button" class="btn btn-success" id="saveEditExamFisico">Guardar </button>
              <span id="alert_placeholder_exam_fis" style="position:absolute; " class="p-2"></span>
            </div>
          <?php } ?>

        </div>
 <input type="hidden" id="exam-fisico-form-inputs" value="<?=$ex_fis_data?>" />
 
      </div>

    </div>
  </section>



  <?php
$data = array(
'exam_fisup_time'=>$up_time,
'exam_fisin_time' =>$in_time,
'exam_fisin_by'=>$in_by,
'exam_fisup_by' => $up_by
);

$this->session->set_userdata($data);

 ?>