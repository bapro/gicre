<?php

if ($ant_ped_data == 1) {
  foreach ($query_ant_ped->result() as $row)
    $evo = $row->evo;
  $evol_text = $row->evol_text;
  $edad_gest = $row->edad_gest;
  $leche = $row->leche;
  $lactamat = $row->lactamat;
  $otrosinfo = $row->otrosinfo;
  $traum_text = $row->traum_text;
  $trans_text = $row->trans_text;

  $trans = $row->trans;
  $traum = $row->traum;


  $motor1 = $row->motor1;
  $motor2 = $row->motor2;
  $lenguaje = $row->lenguaje;
  $social = $row->social;
  $social_text = $row->social_text;
  $motor1_text = $row->motor1_text;
  $motor2_text = $row->motor2_text;
  $lenguaje_text = $row->lenguaje_text;
  $tnaci = $row->tnaci;
  $describa = $row->describa;
  $peso = $row->peso;
  $talla = $row->talla;
  $ale = $row->ale;
  $asm = $row->asm;
  $cirug = $row->cirug;
  $deng = $row->deng;
  $diar = $row->diar;
  $zika = $row->zika;
  $chicun = $row->chicun;
  $falc = $row->falc;
  $hep = $row->hep;
  $infv = $row->infv;
  $neum = $row->neum;
  $otot = $row->otot;
  $pape = $row->pape;
  $paras = $row->paras;
  $saram = $row->saram;
  $varicela = $row->varicela;
  $otros_t_text = $row->otros_t_text;
  $id_pedia = $row->id;
 
$in_by = $row->inserted_by;
			$up_by = $this->session->userdata('user_id');
			$in_time = $row->inserted_time;
			$up_time = date("Y-m-d H:i:s");
  $params = array('table' => 'h_c_ant_pedia', 'id' => $id_pedia);
  echo $this->user_register_info->get_operation_info($params);
} else {
	 $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
  $social_text = "";
  $motor1_text = "";
  $motor2_text = "";
  $lenguaje_text = "";
  $trans = "";
  $traum = "";
  $evo = "";
  $evol_text = "";
  $edad_gest = "";
  $leche = "";
  $lactamat = "";
  $otrosinfo = "";
  $traum_text = "";
  $trans_text = "";
  $motor1 = "";
  $motor2 = "";
  $lenguaje = "";
  $social = "";
  $tnaci = "";
  $describa = "";
  $peso = "";
  $talla = "";
  $ale = "";
  $hep = "";
  $asm = "";
  $cirug = "";
  $deng = "";
  $diar = "";
  $zika = "";
  $chicun = "";
  $falc = "";
  $hep = "";
  $infv = "";
  $neum = "";
  $otot = "";
  $pape = "";
  $paras = "";
  $saram = "";
  $varicela = "";
  $otros_t_text = "";
  $id_pedia = 0;

  $nacer_fecha1 ="";

  $nacer_fecha2 = "";

  $nacer_chk1 ="";

  $nacer_chk2 = "";

  $mes2_fecha1 ="";

  $mes2_fecha2 = "";

  $mes2_fecha3 = "";

  $mes2_fecha4 = "";

  $mes2_chk1 = "";

  $mes2_chk2 = "";
  
$mes2_chk3 = "";
$mes2_chk4 = "";
$mes4_fecha1 = "";
$mes4_fecha2 = "";
$mes4_fecha3 = "";
$mes4_fecha4 = "";
$mes4_chk1 = "";
$mes4_chk2='';
$mes4_chk3 = "";
$mes4_chk4 = "";
$mes6_fecha1 = "";
$mes6_fecha2 = "";
$mes6_chk1 = "";
$mes6_chk2 = "";
$mes12_fecha1 ="";
$mes12_fecha2 ="";
$mes12_chk1 ="";
$mes12_chk2 = "";
$year9_14_mas_fecha1="";
$mes18_fecha1 = "";
$mes18_fecha2 = "";
$mes18_chk1 = "";
$mes18_chk2 = "";
$mes18_chk3 = "";
$mes18_fecha3 = "";
$year4_fecha1 = "";
$year4_fecha2 = "";
$year4_chk1 ="";
$year4_chk2 ="";
$year9_14_fecha1 ="";
$year9_14_chk1 = "";
$year9_14_mas_chk1 = "";
}


?>
<h4 class="card-title"> Pediátrico</h4>

<div class="row" id="pediatry-form">
  <div class="col-lg-6">
    <form class="row g-3">
      <div class="col-md-12">
        <label><span style="color:red">*</span> Evolución del embarazo (informaciones de la madre durante el embarazo del niño/a)</label>
        <div class="form-check form-check-inline">
          <?php
          if ($evo == "normal") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input pedia-evo-radio" type="radio" name="<?= $id_pedia ?>_pediatry_evo" id="<?= $id_pedia ?>_pediatry_evo1" value="normal" <?= $checked ?>>
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_evo1">
            Normal
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($evo == "complicado") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input pedia-evo-radio" type="radio" name="<?= $id_pedia ?>_pediatry_evo" id="<?= $id_pedia ?>_pediatry_evo2" value="complicado" <?= $checked ?>>
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_evo2">
            Complicado
          </label>
        </div>

      </div>
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia pedia-evo-text" id="<?= $id_pedia ?>_pediatry_evo_txt" placeholder="Describa"><?= $evol_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_evo_txt">Describa</label>
        </div>
      </div>
      <div class="form-floating mb-3">
        <?php $edad_gestlists = array("Seleccione", "Pre-termino", "De-termino", "Post-termino"); ?>
        <select class="form-select" id="<?= $id_pedia ?>_pediatry_edad_gest" aria-label="Floating label select example">
          <?php
          foreach ($edad_gestlists as $edad_gestlist) {
            if ($edad_gest == $edad_gestlist) {
              $selected = "selected";
            } else {
              $selected = "";
            }
            echo "<option $selected>$edad_gestlist</option>";
          }
          ?>

        </select>
        <label for="<?= $id_pedia ?>_pediatry_edad_gest" class="form-label">Edad gestacional al momento del nacimiento</label>
      </div>
      <div class="col-md-12">




        <div class="form-check form-check-inline">
          <?php
          if ($lactamat == 0) {
            $checked = "";
          } else {
            $checked = "checked";
          }
          ?>
          <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_lactancia" id="<?= $id_pedia ?>_pediatry_lactancia1" <?= $checked ?>>
          <label class="form-check-label" for="pediatry_lactancia1">
            Lactancia materna
          </label>
        </div>



        <div class="form-check form-check-inline">
          <?php
          if ($leche == 0) {
            $checked = "";
          } else {
            $checked = "checked";
          }
          ?>
          <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_milk" id="<?= $id_pedia ?>_pediatry_milk1" <?= $checked ?>>
          <label class="form-check-label" for="pediatry_milk1">
            Leche de formulas
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_other_food_txt" placeholder="Otros"><?= $otrosinfo ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_other_food_txt">Otros</label>
        </div>
      </div>

      <div class="col-md-12">
        <label>Traumático/somático, psicológico </label>
        <div class="form-check form-check-inline">
          <?php
          if ($traum == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_trau_som_ps" id="<?= $id_pedia ?>_pediatry_trau_som_ps2" <?= $checked ?> value="Si">
          <label class="form-check-label" for="pediatry_trau_som_ps2">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($traum == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_trau_som_ps" id="<?= $id_pedia ?>_pediatry_trau_som_ps1" <?= $checked ?> value="No">
          <label class="form-check-label" for="pediatry_trau_som_ps1">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_trau_som_ps_txt" placeholder="Detalle"><?= $traum_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_trau_som_ps_txt">Detalle</label>
        </div>
      </div>
      <div class="col-md-12">
        <label>Transfusionales</label>
        <div class="form-check form-check-inline">
          <?php
          if ($trans == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_transf" id="<?= $id_pedia ?>_pediatry_transf1" <?= $checked ?> value="Si">
          <label class="form-check-label" for="pediatry_transf1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($trans == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_transf" id="<?= $id_pedia ?>_pediatry_transf2" <?= $checked ?> value="No">
          <label class="form-check-label" for="pediatry_transf2">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_transf_txt" placeholder="Detalle"><?= $trans_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_transf_txt">Detalle</label>
        </div>
      </div>


    </form>

    <form class="row g-3">

      <div class="col-md-12">
        <label>Motor Grueso adecuado para su edad </label>
        <div class="form-check form-check-inline">
          <?php
          if ($motor1 == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_grueso" id="<?= $id_pedia ?>_pediatry_grueso1" <?= $checked ?> value="Si">
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_grueso1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($motor1 == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_grueso" id="<?= $id_pedia ?>_pediatry_grueso2" value="No" <?= $checked ?>>
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_grueso2">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_text_grueso" placeholder="Detalle"><?= $motor1_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_text_grueso">Detalle</label>
        </div>
      </div>



      <div class="col-md-12">
        <label>Motor fino adecuado para su edad</label>
        <div class="form-check form-check-inline">
          <?php
          if ($motor2 == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_fino" id="<?= $id_pedia ?>_pediatry_fino1" <?= $checked ?> value="Si">
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_fino1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($motor2 == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_fino" id="<?= $id_pedia ?>_pediatry_fino2" <?= $checked ?> value="No">
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_fino2">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_text_fino" placeholder="Detalle"><?= $motor2_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_text_fino">Detalle</label>
        </div>
      </div>

      <div class="col-md-12">
        <label>Lenguaje adecuado para su edad</label>
        <div class="form-check form-check-inline">
          <?php
          if ($lenguaje == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_lenguage" id="<?= $id_pedia ?>_pediatry_lenguage1" <?= $checked ?> value="Si">
          <label class="form-check-label" for="pediatry_lenguage1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($lenguaje == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_lenguage" id="<?= $id_pedia ?>_pediatry_lenguage2" <?= $checked ?> value="No">
          <label class="form-check-label" for="pediatry_lenguage2">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_text_lenguage" placeholder="Detalle"><?= $lenguaje_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_text_lenguage">Detalle</label>
        </div>
      </div>

      <div class="col-md-12  ">
        <label>Social adecuado para su edad </label>
        <div class="form-check form-check-inline">
          <?php
          if ($social == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_social" id="<?= $id_pedia ?>_pediatry_social1" <?= $checked ?> value="Si">
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_social1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($social == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }

          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_social" id="<?= $id_pedia ?>_pediatry_social2" <?= $checked ?> value="No">
          <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_social2">
            No
          </label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_text_social" placeholder="Detalle"><?= $social_text ?></textarea>
          <label for="<?= $id_pedia ?>_pediatry_text_social">Detalle</label>
        </div>
      </div>

    </form>


  </div>

  <div class="col-lg-6">
    <form class="row g-3">
      <div class="col-md-12">
        <label><span style="color:red">*</span> Tipo de nacimiento</label><br />
        <div class="form-check form-check-inline">
          <?php

          if ($tnaci == "parto") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_birth_type" id="<?= $id_pedia ?>_pediatry_birth_type1" value="parto" <?= $checked ?>>
          <label class="form-check-label" for="pediatry_birth_type1">
            Parto
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($tnaci == "cesarea") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_birth_type" id="<?= $id_pedia ?>_pediatry_birth_type2" value='cesarea' <?= $checked ?>>
          <label class="form-check-label" for="pediatry_birth_type2">
            Cesárea
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($tnaci == "desconocido") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input " type="radio" name="<?= $id_pedia ?>_pediatry_birth_type" id="<?= $id_pedia ?>_pediatry_birth_type3" value="desconocido" <?= $checked ?>>
          <label class="form-check-label" for="pediatry_birth_type3">
            Desconocido
          </label>
        </div>

      </div>
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <textarea class="form-control txt-ares-pedia" id="<?= $id_pedia ?>_pediatry_birth_type_txt" placeholder="Describa"><?= $describa ?></textarea>
          <label for="pediatry_birth_type_txt">Describa</label>
        </div>
      </div>
      <div class="col-md-4">

        <div class="form-floating mb-3">
          <input type="text" class="form-control txt-inp-pedia" id="<?= $id_pedia ?>_pediatry_birth_weight_value" placeholder="Peso al Nacer" value="<?= $peso ?>" />
          <label for="pediatry_birth_weight_value">Peso al nacer</label>
        </div>
      </div>
      <div class="col-md-4">

        <div class="form-floating mb-3">
          <input type="text" class="form-control txt-inp-pedia" id="<?= $id_pedia ?>_pediatry_birth_size_value" placeholder="Talla al nacer" value="<?= $talla ?>" />
          <label for="pediatry_birth_size_value">Talla al nacer</label>
        </div>
      </div>

      <div class="row">
        <label>Patologías</label>
        <div class="col-md-6">
          <div class="form-check">
            <?php
            if ($ale == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }

            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_ale" id="<?= $id_pedia ?>_pediatry_ale1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_ale1">
              Alergia
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($hep == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_amig" id="<?= $id_pedia ?>_pediatry_amig1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_amig1">
              Amigdalitis
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($asm == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_asm" id="<?= $id_pedia ?>_pediatry_asm1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_asm1">
              Asma
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($cirug == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_cirug" id="<?= $id_pedia ?>_pediatry_cirug1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_cirug1">
              Cirugías
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($deng == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_deng" id="<?= $id_pedia ?>_pediatry_deng1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_deng">
              Dengue
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($diar == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_diar" id="<?= $id_pedia ?>_pediatry_diar1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_diar1">
              Diarrea
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($zika == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_zika" id="<?= $id_pedia ?>_pediatry_Zika1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_Zika1">
              Zika
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($chicun == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_chicun" id="<?= $id_pedia ?>_pediatry_chicun1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_chicun1">
              Chikungunya
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($falc == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_falc" id="<?= $id_pedia ?>_pediatry_falc1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_falc1">
              Falcemia
            </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-check">
            <?php
            if ($hep == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_hep" id="<?= $id_pedia ?>_pediatry_hep1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_hep1">
              Hepatitis
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($infv == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_infv" id="<?= $id_pedia ?>_pediatry_infv1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_infv1">
              Infección vías urinarias
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($neum == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_neum" id="<?= $id_pedia ?>_pediatry_neum1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_neum1">
              Neumonía
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($otot == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_otot" id="<?= $id_pedia ?>_pediatry_otot1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_otot1">
              Otitis
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($pape == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_pape" id="<?= $id_pedia ?>_pediatry_pape1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_pape1">
              Paperas
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($paras == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_paras" id="<?= $id_pedia ?>_pediatry_paras1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_paras">
              Parasitosis
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($saram == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_saram" id="<?= $id_pedia ?>_pediatry_saram1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_saram1">
              Sarampión
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($varicela == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="<?= $id_pedia ?>_pediatry_varicela" id="<?= $id_pedia ?>_pediatry_varicela1" <?= $checked ?>>
            <label class="form-check-label" for="<?= $id_pedia ?>_pediatry_varicela1">
              Varicela
            </label>
          </div>
          <div class="form-floating mb-3">
            <input type="text txt-inp-pedia" class="form-control" id="<?= $id_pedia ?>_pediatry_pat_otros" placeholder="Otro" value="<?= $otros_t_text ?>" />
            <label for="<?= $id_pedia ?>_pediatry_pat_otros">Otro</label>
          </div>
        </div>
      </div>

    </form>

  </div>
 

  <?php if ($id_pedia > 0) { ?>
    <div style="text-align:right">
      <br />

      <button type="button" class="btn btn-success" id="updatePediatry">Guardar </button>
      <span id="successEditPed" class="p-2"></span>
    </div>
  <?php  } 
  	$datapd= array(
'pd_up_time'=>$up_time,
'pd_in_time' =>$in_time,
'pd_in_by'=>$in_by,
'pd_up_by' => $up_by
);

$this->session->set_userdata($datapd);

  ?>

  <input type="hidden" id="id_pedia" value="<?= $id_pedia ?>">
  <input type="hidden" id="pediatry-form-inputs" value="<?= $id_pedia ?>">
  <input type="hidden" id="pediatry-form-checkbox" value="<?= $id_pedia ?>">
  <input type="hidden" id="pediatry-form-radio" value="<?= $id_pedia ?>">
</div>

