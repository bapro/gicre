<?php
if ($data_eva_cardio > 0 ) {
  foreach ($query_ex_fis as $rowExF)
        $neuro_s = $rowExF->neuro_s;
    $neuro_text = $rowExF->neuro_text;
    $cabeza = $rowExF->cabeza;
    $cabeza_text = $rowExF->cabeza_text;
    $cuello = $rowExF->cuello;
    $cuello_text = $rowExF->cuello_text;
    $abd_insp = $rowExF->abd_insp;
    $ext_sup = $rowExF->ext_sup;
    $ext_sup_text = $rowExF->ext_sup_text;
    $ext_inft = $rowExF->ext_inft;
    $ext_inf = $rowExF->ext_inf;
    $torax_text = $rowExF->torax_text;
    $torax = $rowExF->torax;
    $abd_inspext = $rowExF->abd_inspext;
	 $neuro_normal=$rowExF->neuro_normal;
 $cabeza_normal=$rowExF->cabeza_normal;	
 $cuello_normal=$rowExF->cuello_normal;
$abd_inspex_normal=$rowExF->abd_inspex_normal;
$ext_sup_normal=$rowExF->ext_sup_normal;
$ext_infex_normal=$rowExF->ext_infex_normal;
$toraxex_normal=$rowExF->toraxex_normal;
    $id_exam_fis = $rowExF->id;

   
} else {
 $neuro_s = '';
    $neuro_text = '';
    $cabeza = '';
    $cabeza_text = '';
    $cuello = '';
    $cuello_text = '';
    $abd_insp = '';
    $ext_sup = '';
    $ext_sup_text = '';
    $id_exam_fis = 0;
    $ext_inft = "";
    $ext_inf = "";
    $torax_text = "";
    $torax = "";
    $abd_inspext = ""; 

 $neuro_normal='';
 $cabeza_normal='';	
 $cuello_normal='';
$abd_inspex_normal='';
$ext_sup_normal='';
$ext_infex_normal='';
$toraxex_normal='';
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="accordion accordion-flush" id="accordiOneExFisCxamFisChildren">
		<?php $exam_neu = $neuro_s != '' || $neuro_text != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
            <div class="accordion-item  ">
                <h2 class="accordion-header" id="headingOneExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneExFisC" aria-expanded="false" aria-controls="collapseOneExFisC">
                        Neurológico <?= $exam_neu ?>
                    </button>
                </h2>
                <div id="collapseOneExFisC" class="accordion-collapse collapse " aria-labelledby="headingOneExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
						<div class="p-1">
                                <?php
									if ($neuro_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_neuro_normal" <?=$checked?> /> Normal
								
								</div>
                         


                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_neuro_textex" style="height: 100px"><?= $neuro_text ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_neuro_textex">Descripción</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
			<?php $exam_cab = $cabeza != '' || $cabeza_text != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingTwoExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoExFisC" aria-expanded="false" aria-controls="collapseTwoExFisC">
                        Cabeza <?=$exam_cab?>
                    </button>
                </h2>
                <div id="collapseTwoExFisC" class="accordion-collapse collapse" aria-labelledby="headingTwoExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
                           <div class="p-1">
                                <?php
									if ($cabeza_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_cabeza_normal" <?=$checked?> /> Normal
								
								</div>
                          
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_cabeza_textex" style="height: 100px"><?= $cabeza_text ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_cabeza_textex">Descripción</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
					<?php $exam_cuello = $cuello != '' || $cuello_text != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingThreeExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeExFisC" aria-expanded="false" aria-controls="collapseThreeExFisC">
                        Cuello <?=$exam_cuello?>
                    </button>
                </h2>
                <div id="collapseThreeExFisC" class="accordion-collapse collapse" aria-labelledby="headingThreeExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <div class="p-1">
                                <?php
									if ($cuello_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_cuello_normal" <?=$checked?> /> Normal
								
								</div>
                           
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_cuello_textex" style="height: 100px"><?= $cuello_text ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_cuello_textex">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
			<?php $exam_ab_if = $abd_insp != '' || $abd_inspext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingFourExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourExFisC" aria-expanded="false" aria-controls="collapseFourExFisC">
                        Abdomen Inspección: Forma <?=$exam_ab_if?>
                    </button>
                </h2>
                <div id="collapseFourExFisC" class="accordion-collapse collapse" aria-labelledby="headingFourExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
                        <div class="p-1">
                                <?php
									if ($abd_inspex_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_abd_inspex_normal" <?=$checked?> /> Normal
								
								</div>
                           
                            <div class="form-floating mb-3">
                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_abd_inspext" style="height: 100px"><?= $abd_inspext ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_abd_inspext">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
			<?php $exam_ex_sup = $ext_sup != '' || $ext_sup_text != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingFiveExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveExFisC" aria-expanded="false" aria-controls="collapseFiveExFisC">
                        Extremidades superiores <?=$exam_ex_sup?>
                    </button>
                </h2>
                <div id="collapseFiveExFisC" class="accordion-collapse collapse" aria-labelledby="headingFiveExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
						<div class="p-1">
                                <?php
									if ($ext_sup_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_ext_sup_normal" <?=$checked?> /> Normal
								
								</div>
                          
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_ext_sup_textex" style="height: 100px"><?= $ext_sup_text ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_ext_sup_textex">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
			<?php $exam_ex_inf = $ext_inf != '' || $ext_inft != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingSixExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixExFisC" aria-expanded="false" aria-controls="collapseSixExFisC">
                        Extremidades Inferiores <?=$exam_ex_inf ?>
                    </button>
                </h2>
                <div id="collapseSixExFisC" class="accordion-collapse collapse" aria-labelledby="headingSixExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
						<div class="p-1">
                                <?php
									if ($ext_infex_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_ext_infex_normal" <?=$checked?> /> Normal
								
								</div>
                     

                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_ext_inftex" style="height: 100px"><?= $ext_inft ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_ext_inftex">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
			<?php $exam_tcp = $torax != '' || $torax_text != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                <h2 class="accordion-header" id="headingSevenExFisC">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSevenExFisC" aria-expanded="false" aria-controls="collapseSevenExFisC">
                        Torax: Corazón y pulmones <?=$exam_tcp?>
                    </button>
                </h2>
                <div id="collapseSevenExFisC" class="accordion-collapse collapse" aria-labelledby="headingSevenExFisC" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
						<div class="p-1">
                                <?php
									if ($toraxex_normal == 0) {
									$checked = "";
									} else {
									$checked = "checked";
									}
									?>
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $data_eva_cardio?>_toraxex_normal" <?=$checked?> /> Normal
								
								</div>
                         

                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="_<?=$data_eva_cardio ?>_torax_textex" style="height: 100px"><?= $torax_text ?></textarea>
                                <label for="_<?=$data_eva_cardio ?>_torax_textex">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />
    </div>
</div>
<div class="row">
 <div class="col-lg-12">
   <?php


   if ($data_eva_cardio > 0) { ?>
    <div class="float-end">
      <br />

      <button type="button" class="btn btn-success" id="_saveEditExamFis">Guardar </button><span id="_successEdiExamFis" class="p-2" style="position:absolute"></span>
    </div>
  <?php  } 
 

  ?>
 </div>
 </div>

