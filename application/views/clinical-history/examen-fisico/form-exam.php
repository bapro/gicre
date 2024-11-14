<?php
if ($ex_fis_data > 0 && $query_ex_fis !=NULL ) {
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
    $params2 = array('table' => 'h_c_examen_fisico', 'id' => $id_exam_fis);
    echo $this->user_register_info->get_operation_info($params2);
   
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_neuro_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $neuro_s ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_neuro_sex" placeholder="Neurológico" />
                                <label for="<?= $id_exam_fis ?>_neuro_sex"> Neurológico</label>
                                <div id="suggestion-examNeuro-list"></div>
                            </div>


                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_neuro_textex" style="height: 100px"><?= $neuro_text ?></textarea>
                                <label for="<?= $id_exam_fis ?>_neuro_textex">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_cabeza_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $cabeza ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_cabezaex" placeholder="Cabeza">
                                <label for="<?= $id_exam_fis ?>_cabezaex"> Cabeza</label>
                                <div id="suggestion-examCabeza-list"></div>
                            </div>
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_cabeza_textex" style="height: 100px"><?= $cabeza_text ?></textarea>
                                <label for="<?= $id_exam_fis ?>_cabeza_textex">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_cuello_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $cuello ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_cuelloex" placeholder="Cuello">
                                <label for="<?= $id_exam_fis ?>_cuelloex"> Cuello</label>
                                <div id="suggestion-examCuello-list"></div>
                            </div>
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_cuello_textex" style="height: 100px"><?= $cuello_text ?></textarea>
                                <label for="<?= $id_exam_fis ?>_cuello_textex">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_toraxex_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $torax ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_toraxex" placeholder="Torax: Corazón y pulmones">
                                <label for="<?= $id_exam_fis ?>_toraxex"> Torax: Corazón y pulmones</label>
                                <div id="suggestion-examExtTcP-list"></div>
                            </div>

                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_torax_textex" style="height: 100px"><?= $torax_text ?></textarea>
                                <label for="<?= $id_exam_fis ?>_torax_textex">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_abd_inspex_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $abd_insp ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_abd_inspex" placeholder="Abdomen Inspección: Forma">
                                <label for="<?= $id_exam_fis ?>_abd_inspex"> Abdomen Inspección: Forma</label>
                                <div id="suggestion-examAbIns-list"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_abd_inspext" style="height: 100px"><?= $abd_inspext ?></textarea>
                                <label for="<?= $id_exam_fis ?>_abd_inspext">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_ext_sup_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" id="<?= $id_exam_fis ?>_ext_supex" value="<?= $ext_sup ?>" class="form-control  txt-inp-ext" id="<?= $id_exam_fis ?>_floatingMed" placeholder="Extremidades superiores">
                                <label for="<?= $id_exam_fis ?>_ext_supex"> Extremidades superiores</label>
                                <div id="suggestion-examExtSup-list"></div>
                            </div>
                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_ext_sup_textex" style="height: 100px"><?= $ext_sup_text ?></textarea>
                                <label for="<?= $id_exam_fis ?>_ext_sup_textex">Descripción</label>
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
								<input type="checkbox"   <?=$checked ?> class="ms-2" name="<?= $id_exam_fis?>_ext_infex_normal" <?=$checked?> /> Normal
								
								</div>
                            <div class="form-floating mb-3">
                                <input type="text" value="<?= $ext_inf ?>" class="form-control txt-inp-ext" id="<?= $id_exam_fis ?>_ext_infex" placeholder="Extremidades Inferiores">
                                <label for="<?= $id_exam_fis ?>_ext_infex"> Extremidades Inferiores</label>
                                <div id="suggestion-examExtInf-list"></div>
                            </div>

                            <div class="form-floating mb-3">

                                <textarea class="form-control txt-ares-exf" id="<?= $id_exam_fis ?>_ext_inftex" style="height: 100px"><?= $ext_inft ?></textarea>
                                <label for="<?= $id_exam_fis ?>_ext_inftex">Descripción</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="accordion-item">
  <?php
$discapacidad_no='';
$tiene_dificuldad_oir='';
$tiene_dificuldad_caminar='';
$tiene_dificuldad_lavar='';
  $discapacida_options = array("", "1. No, ninguna dificultad.", "2.  Sí, cierta dificultad. ", "3. Sí, mucha dificultad.", "4. No puedo ver/oír en absoluto. / No puedo realizar esta actividad."); ?>
			 <h2 class="accordion-header" id="headingDiscapacidad">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiscapacidad" aria-expanded="false" aria-controls="collapseDiscapacidad">
                        Discapacida   
                    </button>
                </h2>
                <div id="collapseDiscapacidad" class="accordion-collapse collapse" aria-labelledby="headingDiscapacidad" data-bs-parent="#accordiOneExFisCxamFisChildren">
                    <div class="accordion-body">
                        <div class="col-md-12">
						 <label for="ant_violencia2" class="form-label">1. ¿Tiene dificultad para ver, incluso cuando usa lentes?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select violintraselect onchange-show-tiene-miedo-de-su-pareja" id="<?=$id_vioint?>_ant_violencia2" aria-label="Floating label select example">
                           <?php  foreach($discapacida_options as $discapacida_option){
							   	 if($discapacidad_no==$discapacida_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$discapacida_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                        </div>
						
						
						  <div class="col-md-12">
						 <label for="ant_violencia2" class="form-label">2. ¿Tiene dificultad para oír, incluso cuando usa un audífono? </label>
                       <div class="form-floating mb-3">
                         <select class="form-select violintraselect onchange-show-tiene-miedo-de-su-pareja" id="<?=$id_vioint?>_ant_violencia2" aria-label="Floating label select example">
                           <?php  foreach($discapacida_options as $discapacida_option){
							   	 if($tiene_dificuldad_oir==$discapacida_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$discapacida_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                        </div>
						
						
						  <div class="col-md-12">
						 <label for="ant_violencia2" class="form-label">3. ¿Tiene dificultad para caminar o subir escalones?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select violintraselect onchange-show-tiene-miedo-de-su-pareja" id="<?=$id_vioint?>_ant_violencia2" aria-label="Floating label select example">
                           <?php  foreach($discapacida_options as $discapacida_option){
							   	 if($tiene_dificuldad_caminar==$discapacida_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$discapacida_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                        </div>
						
						<div class="col-md-12">
						 <label for="ant_violencia2" class="form-label">4. ¿Tiene dificultad para lavarse o vestirse (gestionar su autosuficiencia para el cuidado personal)? </label>
                       <div class="form-floating mb-3">
                         <select class="form-select violintraselect onchange-show-tiene-miedo-de-su-pareja" id="<?=$id_vioint?>_ant_violencia2" aria-label="Floating label select example">
                           <?php  foreach($discapacida_options as $discapacida_option){
							   	 if($tiene_dificuldad_lavar==$discapacida_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$discapacida_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />
    </div>
</div>


<input type="hidden" id="id_exam_fis" value="<?= $id_exam_fis ?>" />