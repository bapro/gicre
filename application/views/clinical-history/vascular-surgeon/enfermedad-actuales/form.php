<div class="col-md-12">
    <?php
    if ($enfermedad_data == 1) {
        foreach ($emfermedades as $row)
            $cir_vas_dol = $row->cir_vas_dol;
        $cir_vas_edema = $row->cir_vas_edema;
        $cir_vas_pesadez = $row->cir_vas_pesadez;
        $cir_vas_cansancio = $row->cir_vas_cansancio;
        $cir_vas_quemazo = $row->cir_vas_quemazo;
        $cir_vas_calambred = $row->cir_vas_calambred;
        $cir_vas_purito = $row->cir_vas_purito;
        $cir_vas_hiper = $row->cir_vas_hiper;
        $cir_vas_ulceras = $row->cir_vas_ulceras;
        $cir_vas_pares = $row->cir_vas_pares;
        $cir_vas_claud = $row->cir_vas_claud;
        $cir_vas_necrosis = $row->cir_vas_necrosis;
        $cir_vas_otros = $row->cir_vas_otros;
        $cir_vas_historial = $row->cir_vas_historial;
        $cir_vas_cirugias = $row->cir_vas_cirugias;
        $cir_vas_alergias = $row->cir_vas_alergias;
        $cir_vas_enf_sis = $row->cir_vas_enf_sis;
        $cir_vas_habitos = $row->cir_vas_habitos;
        $cir_vas_exam_fis_dir = $row->cir_vas_exam_fis_dir;
        $id_env = $row->id;
        $params2 = array('table' => 'h_c_cirujano_vascular', 'id' => $id_env);
        echo $this->user_register_info->get_operation_info($params2);
        $endo_images = "assets_new/img/cirujano-vascular/" . $row->diagrama_cirugia_vascular;
		
			if($endo_images=='assets_new/img/cirujano-vascular/'){
			$ifVasSurgery=0;
			}else{
			$ifVasSurgery=1;
			}
       
    } else {
		$ifVasSurgery=0;
        $id_env = 0;
        $cir_vas_dol = "";
        $cir_vas_edema = "";
        $cir_vas_pesadez = "";
        $cir_vas_cansancio = "";
        $cir_vas_quemazo = "";
        $cir_vas_calambred = "";
        $cir_vas_purito = "";
        $cir_vas_hiper = "";
        $cir_vas_ulceras = "";
        $cir_vas_pares = "";
        $cir_vas_claud = "";
        $cir_vas_necrosis = "";
        $cir_vas_otros = "";
        $cir_vas_historial = "";
        $cir_vas_cirugias = "";
        $cir_vas_alergias = "";
        $cir_vas_enf_sis = "";
        $cir_vas_habitos = "";
        $cir_vas_exam_fis_dir = "";
        $endo_images = "assets_new/img/cirujano-vascular/endovascular2.png";
    } 
	
	
	?>
    <div class="card-body" id="cirujano-vas-forms">
        <div class="accordion " id="accordionVasSurgeon">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOneVasSurgeon">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneVasSurgeon" aria-expanded="false" aria-controls="collapseOneVasSurgeon">
                        Signos y síntomas
                    </button>
                </h2>
                <div id="collapseOneVasSurgeon" class="accordion-collapse collapse" aria-labelledby="headingOneVasSurgeon" data-bs-parent="#accordionVasSurgeon">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap">
                            <div class="p-2 flex-fill">
                                <?php
                                if ($cir_vas_dol == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_dol" <?= $selected ?>>Dolor</label>
                                </div>
                                <?php
                                if ($cir_vas_edema == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_edema" <?= $selected ?>>Edema</label>
                                </div>
                                <?php
                                if ($cir_vas_pesadez == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_pesadez" <?= $selected ?>>Pesadez</label>
                                </div>
                                <?php
                                if ($cir_vas_cansancio == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_cansancio" <?= $selected ?>>Cansancio</label>
                                </div>
                                <?php
                                if ($cir_vas_quemazo == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_quemazo" <?= $selected ?>>Quemazo</label>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">
                                <?php
                                if ($cir_vas_calambred == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_calambred" <?= $selected ?>>Calambres</label>
                                </div>
                                <?php
                                if ($cir_vas_purito == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_purito" <?= $selected ?>>Prurito</label>
                                </div>
                                <?php
                                if ($cir_vas_hiper == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_hiper" <?= $selected ?>>Hipercromica</label>
                                </div>
                                <?php
                                if ($cir_vas_ulceras == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_ulceras" <?= $selected ?>>Úlceras</label>
                                </div>
                                <?php
                                if ($cir_vas_pares == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_pares" <?= $selected ?>>Parestesias</label>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">

                                <?php
                                if ($cir_vas_claud == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_claud" <?= $selected ?>>Claudicación</label>
                                </div>
                                <?php
                                if ($cir_vas_necrosis == 0) {
                                    $selected = "";
                                } else {
                                    $selected = "checked";
                                }
                                ?>
                                <div class="form-check ">
                                    <label><input type="checkbox" class="form-check-input" name="<?= $id_env ?>_cir_vas_necrosis" <?= $selected ?>>Necrosis</label>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-floating mb-3">
                                            <input id="<?= $id_env ?>_cir_vas_otros" class="form-control txt-inp-ciruv" value='<?= $cir_vas_otros ?>' placeholder="Otros">
                                            <label for="<?= $id_env ?>_cir_vas_otros">Otros</label>
                                        </div>

                                    </div>

                                </div>
                            </div>
							<!-- <div class="col-md-12">

                            <div class="form-floating mb-3">
                                <textarea id="<?= $id_env ?>_cir_vas_historial" class="form-control txt-ares-ciruv" style="height:100px" placeholder="Historia"><?= $cir_vas_historial ?></textarea>
                                <label for="<?= $id_env ?>_cir_vas_historial">Historia</label>
                            </div>
							</div>-->
							
							
							
                        </div>
						<div class="col-md-12 mb-4">
                          
							<?php
							
							$paramcv = array('id_paginate' => 'paginate-vascular_surgeon_hist-li', 'rows' => $enf_hist_result, 'id' => 'id', 'total' => $enf_hist_total);
							echo $this->user_register_info->list_patients_registers_by_date($paramcv);
							
							?>
                           
                          <div id="vascular_surgeon_hist-form"></div>
						<div class="hide-hist-enf-endo">
							<!--<button type="button" id="btnSpeechEnfHistEndV"  title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm mb-1 hide-enf-mic" ><i class="bi bi-mic-fill"></i></button>-->
							Historia
							&nbsp; <span id="actionSpeechEnfHistEndV"></span>
							<div id="quill-editor-cir_vas_historial_<?=$id_env?>"  class="border form-control rounded-2 quill-text" style="height:400px"><?=$cir_vas_historial; ?></div>
                          </div>
						  </div>
							
                    </div>
                </div>
            </div>
         

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeVasSurgeon">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeVasSurgeon" aria-expanded="false" aria-controls="collapseThreeVasSurgeon">
                        Diagramas
                    </button>
                </h2>
                <div id="collapseThreeVasSurgeon" class="accordion-collapse collapse" aria-labelledby="headingThreeVasSurgeon" data-bs-parent="#accordionVasSurgeon">
                    <div class="accordion-body">
<?php if($ifVasSurgery==0) {?>
    	  <div class="d-flex flex-row " style="cursor:pointer;width:100%">
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:black;border-radius:20px" data-color="black" onclick="getColor(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:green;border-radius:20px" data-color="green" onclick="getColor(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:blue;border-radius:20px" data-color="blue" onclick="getColor(this)"></div>
    <div class="m-1 flex-fill" style="width:20px;height:20px;background:red;border-radius:20px" data-color="red" onclick="getColor(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:yellow;border-radius:20px" data-color="yellow" onclick="getColor(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:orange;border-radius:20px" data-color="orange" onclick="getColor(this)"></div>
   <div class="flex-fill"><i class="bi bi-eraser-fill fs-3" data-color="eraser" onclick="getColor(this)"></i></div>
  <div class="flex-fill"> <button type="button" class="btn btn-danger btn-xs"  size="23" onclick="erase()">Nuevo</button></div>
</div>
<?php } ?>
<input id="id_enf_act"  type="hidden" value="<?= $id_env ?>" />
<input id='ifVasSurgery' type="hidden" value="<?=$ifVasSurgery?>" />
	       <?php 
		   if($endo_images !="assets_new/img/cirujano-vascular/"){
		   $this->load->view('clinical-history/vascular-surgeon/drawing/image'); 
		   ?>
		   <input id='inpuImgSaveToDatabaseEndV' type="hidden" />
		    <canvas id="canvasfinalImgSaveToDatabaseEndV" style="display:none"> </canvas>
                    <canvas id="<?=$id_env?>_canvas_image_vascular"  class="img-fluid"  style="background-repeat: no-repeat;" > </canvas>
    		<script>
		init_diagram_vascular('<?= base_url(); ?><?=$endo_images?>', 'canvas_image_vascular');
				</script>
				
				<?php } else{
					echo "<em>Este registro no tiene diagrama.</em>";

				}		?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($id_env > 0) { ?>

            <div class="float-end">
                <br />
                <button type="button" class="btn btn-primary" id="resetSurVas">Nuevo</button>
                <button type="button" class="btn btn-success" id="saveEditSurVas">Guardar </button>
                <span id="alert_placeholder_surg_vas" style="position:absolute; " class="p-2"></span>
            </div>
        <?php } ?>
    </div>
    

	<input id="cirujano-vas-checkbox" type="hidden" value="<?= $id_env ?>" />
	<input id="cirujano-vas-inputs" type="hidden" value="<?= $id_env ?>" />
</div>

