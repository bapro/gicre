  <?php
    if ($ex_fis_data == 0) {
        $especuloscopia = "";
        $tacto_bima = "";
        $cervix = "";
        $cervix_text = "";
        $utero = "";
        $utero_text = "";
        $anexo_derecho_text = "";
        $anexo_iz_text = "";
        $inspection_vulval = "";
        $inspection_vulval_text = "";
        $rectal = "";
        $rectal_text = "";
        $genitalm = "";
        $genitalm_text = "";
        $genitalf = "";
        $genitalf_text = "";
        $vagina = "";
        $vagina_text = "";
        $anexo_derecho = "";
        $anexo_izquierdo = "";
    } else {
        foreach ($query_ex_fis as $rowExF)
            $especuloscopia = $rowExF->especuloscopia;
        $tacto_bima = $rowExF->tacto_bima;
        $cervix = $rowExF->cervix;
        $utero = $rowExF->utero;
        $cervix_text = $rowExF->cervix_text;
        $utero_text = $rowExF->utero_text;
        $anexo_derecho_text = $rowExF->anexo_derecho_text;
        $anexo_iz_text = $rowExF->anexo_iz_text;
        $inspection_vulval = $rowExF->inspection_vulval;
        $inspection_vulval_text = $rowExF->inspection_vulval_text;
        $rectal = $rowExF->rectal;
        $rectal_text = $rowExF->rectal_text;
        $genitalm = $rowExF->genitalm;
        $genitalm_text = $rowExF->genitalm_text;
        $genitalf = $rowExF->genitalf;
        $genitalf_text = $rowExF->genitalf_text;
        $vagina = $rowExF->vagina;
        $anexo_derecho = $rowExF->anexo_derecho;
        $anexo_izquierdo = $rowExF->anexo_izquierdo;
        $vagina_text = $rowExF->vagina_text;
        $params2 = array('table' => 'h_c_examen_fisico', 'id' => $rowExF->id);
        echo $this->user_register_info->get_operation_info($params2);
    }
    ?>

  <div class="col-sm-12">
      <div class="row">


          <div class="col-lg-6">

              <label class="col-form-label  col-sm-3">Especuloscopia</label>
              <div class="form-check form-check-inline">
                  <?php
                    if ($especuloscopia == "Si") {
                        $selected = "checked";
                    } else {
                        $selected = "";
                    }
                    ?>
                  <input class="form-check-input" type="radio" <?= $selected ?> name="<?= $ex_fis_data ?>_especuloscopiaex" id="<?= $ex_fis_data ?>_especuloscopiaex1" value="Si">
                  <label class="form-check-label" for="<?= $ex_fis_data ?>_especuloscopiaex1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                  <?php
                    if ($especuloscopia == "No") {
                        $selected = "checked";
                    } else {
                        $selected = "";
                    }
                    ?>
                  <input class="form-check-input" type="radio" name="<?= $ex_fis_data ?>_especuloscopiaex" id="<?= $ex_fis_data ?>_especuloscopiaex2" value='No' <?= $selected ?>>
                  <label class="form-check-label" for="<?= $ex_fis_data ?>_especuloscopiaex">No</label>
              </div>

          </div>

          <div class="col-lg-6">
              <label class="col-form-label  col-sm-3">Tacto Bimanual</label>
              <div class="form-check form-check-inline">
                  <?php
                    if ($tacto_bima == "Si") {
                        $selected = "checked";
                    } else {
                        $selected = "";
                    }
                    ?>
                  <input class="form-check-input" type="radio" name="<?= $ex_fis_data ?>_tacto_bimaex" id="<?= $ex_fis_data ?>_tacto_bimaex1" value="Si" <?= $selected ?>>
                  <label class="form-check-label" for="<?= $ex_fis_data ?>_tacto_bimaex1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                  <?php
                    if ($tacto_bima == "No") {
                        $selected = "checked";
                    } else {
                        $selected = "";
                    }
                    ?>
                  <input class="form-check-input" type="radio" name="<?= $ex_fis_data ?>_tacto_bimaex" id="<?= $ex_fis_data ?>_tacto_bimaex2" value="No" <?= $selected ?>>
                  <label class="form-check-label" for="<?= $ex_fis_data ?>_tacto_bimaex2">No</label>
              </div>
          </div>
          </fieldset>
      </div>
      <div class="row">
          <div class="col-lg-6">
              <div class="col-md-12">

                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $cervix ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_cervixex" placeholder="Cervix">
                      <label for="<?= $ex_fis_data ?>_cervixex"> Cervix</label>
                      <div id="suggestion-_cervixex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_cervix_textex" style="height: 100px"><?= $cervix_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_cervix_textex">Descripción</label>

                  </div>
              </div>
              <div class="col-md-12">

                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $utero ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_utero" placeholder="Utero">
                      <label for="<?= $ex_fis_data ?>_utero"> Utero</label>
                      <div id="suggestion-_utero-list"></div>
                  </div>

                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_utero_textex" style="height: 100px"><?= $utero_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_utero_textex">Descripción</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $anexo_derecho ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_anexo_derecho" placeholder="Anexo Derecho">
                      <label for="<?= $ex_fis_data ?>_anexo_derecho"> Anexo Derecho</label>
                      <div id="suggestion-_anexo_derecho-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_anexo_derecho_textex" style="height: 100px"><?= $anexo_derecho_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_anexo_derecho_textex">Descripción</label>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $anexo_izquierdo ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_anexo_izquierdo" placeholder="Anexo Izquierdo">
                      <label for="<?= $ex_fis_data ?>_anexo_izquierdo"> Anexo Izquierdo</label>
                      <div id="suggestion-_anexo_izquierdo-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_anexo_iz_textex" style="height: 100px"><?= $anexo_iz_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_anexo_iz_textex">Descripción</label>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $inspection_vulval ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_inspection_vulvalex" placeholder="Inspeccion Vulvar">
                      <label for="<?= $ex_fis_data ?>_inspection_vulvalex"> Inspeccion Vulvar</label>
                      <div id="suggestion-_inspection_vulvalex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_inspection_vulval_textex" style="height: 100px"><?= $inspection_vulval_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_inspection_vulval_textex">Descripción</label>
                  </div>
              </div>

          </div>
          <div class="col-lg-6">
              <div class="col-md-12">

                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $rectal ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_rectalex" placeholder="Tacto rectal">
                      <label for="<?= $ex_fis_data ?>_rectalex"> Tacto rectal</label>
                      <div id="suggestion-_rectalex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_rectal_textex" style="height: 100px"><?= $rectal_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_rectal_textex">Descripción</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $genitalm ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_genitalmex" placeholder="Genital masculino">
                      <label for="<?= $ex_fis_data ?>_genitalmex"> Genital masculino</label>
                      <div id="suggestion-_genitalmex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_genitalm_textex" style="height: 100px"><?= $genitalm_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_genitalm_textex">Descripción</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $genitalf ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_genitalfex" placeholder="Genital femenino">
                      <label for="<?= $ex_fis_data ?>_genitalfex"> Genital femenino</label>
                      <div id="suggestion-_genitalfex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_genitalf_textex" style="height: 100px"><?= $genitalf_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_genitalf_textex">Descripción</label>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-floating mb-3">
                      <input type="text" value="<?= $vagina ?>" class="form-control txt-inp-ext" id="<?= $ex_fis_data ?>_vaginaex" placeholder="Tacto vaginal">
                      <label for="<?= $ex_fis_data ?>_vaginaex"> Tacto vaginal</label>
                      <div id="suggestion-_vaginaex-list"></div>
                  </div>
                  <div class="form-floating mb-3">

                      <textarea class="form-control txt-ares-exf" id="<?= $ex_fis_data ?>_vagina_textex" style="height: 100px"><?= $vagina_text ?></textarea>
                      <label for="<?= $ex_fis_data ?>_vagina_textex">Descripción</label>
                  </div>
              </div>
          </div>
      </div>
  </div>