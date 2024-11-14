<?php
    if ($obs_data == 0) {
      $dia1 = "";
      $tbc1 = "";
      $hip1 = "";
      $pelv = "";
      $infert = "";
      $otros1 = "";
      $otros1_text = "";
      $dia2 = "";
      $tbc2 = "";
      $hip2 = "";
      $gem = "";
      $otros2 = "";
      $otros2_text = "";
      $fiebre = "";
      $artra = "";
      $mia = "";
      $exa = "";
      $con = "";
      $nig1 = "";
      $rh_option = "";
      $partos = "";
      $arbotos = "";
      $vaginales = "";
      $viven = "";
      $nig2 = "";
      $gestas = "";
      $cesareas = "";
      $muertos1 = "";
      $nig3 = "";
      $nacidov1 = "";
      $nacidom1 = "";
      $despues1s = "";
      $otrosc = "";
      $fin = "";
      $rn = "";
      $fecha1 = "";
      $sono1 = "";
      $sonodia1 = "";
      $fpp1 = "";
      $rest1 = "";
      $diarest1 = "";
      $fecha2 = "";
      $sono2 = "";
      $sonodia2 = "";
      $fpp2 = "";
      $rest2 = "";
      $diarest2 = "";
      $fecha3 = "";
      $sono3 = "";
      $sonodia3 = "";
      $fpp3 = "";
      $rest3 = "";
      $diarest3 = "";
      $fecha4 = "";
      $sono4 = "";
      $sonodia4 = "";
      $fpp4 = "";
      $rest4 = "";
      $diarest4 = "";
      $peso1 = "";
      $talla1 = "";
      $fum_cal_ges = $fum_cal_ges_database;
      $fpp_cal_ges = $fpp_cal_ges_database;
      $sem_act_a = "";
      $prev_act = "";
      $sencibil = "";
      $rh = "";
      $odont = "";
      $pelvis = "";
      $papani = "";
      $colp = "";
      $cevix = "";
      $vdr1 = "";
      $diasmes = "";
      $prev_act_mes = "";
      $rr = "";
     $vdrl2 ="";
	   $vdrl1 ="";
      $idObs = 0;
	      $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
    } else {
      foreach ($query_obs as $row)
	  $in_by = $row->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $row->inserted_time;
$up_time = date("Y-m-d H:i:s");
        $dia1 = $row->dia1;
      $tbc1 = $row->tbc1;
      $hip1 = $row->hip1;
      $pelv = $row->pelv;
      $infert = $row->infert;
      $otros1 = $row->otros1;
      $otros1_text = $row->otros1_text;
      $dia2 = $row->dia2;
      $tbc2 = $row->tbc2;
      $hip2 = $row->hip2;
      $gem = $row->gem;
	  $fin = $row->fin;
      $rn = $row->rn;
      $otros2 = $row->otros2;
      $otros2_text = $row->otros2_text;
      $fiebre = $row->fiebre;
      $artra = $row->artra;
      $mia = $row->mia;
      $exa = $row->exa;
      $con = $row->con;
      $idObs = $row->id;
      //-----------row3 3
        $fecha1 = $row->fecha1;
      $sono1 = $row->sono1;
      $sonodia1 = $row->sonodia1;
      $fpp1 = $row->fpp1;
      $rest1 = $row->rest1;
      $diarest1 = $row->diarest1;
	  /*
      $fecha2 = $row->fecha2;
      $sono2 = $row->sono2;
      $sonodia2 = $row->sonodia2;
      $fpp2 = $row->fpp2;
      $rest2 = $row->rest2;
      $diarest2 = $row->diarest2;
      $fecha3 = $row->fecha3;
      $sono3 = $row->sono3;
      $sonodia3 = $row->sonodia3;
      $fpp3 = $row->fpp3;
      $rest3 = $row->rest3;
      $diarest3 = $row->diarest3;
      $fecha4 = $row->fecha4;
      $sono4 = $row->sono4;
      $sonodia4 = $row->sonodia4;
      $fpp4 = $row->fpp4;
      $rh_option = $row->rh_option;
      $rest4 = $row->rest4;
      $diarest4 = $row->diarest4;
      $peso1 = $row->peso1;
      $talla1 = $row->talla1;
      $fum_cal_ges = $row->fum_cal_ges;
      $fpp_cal_ges = $row->fpp_cal_ges;
      $sem_act_a = $row->sem_act_a;
      $prev_act = $row->prev_act;
      $sencibil = $row->sencibil;
      $rh = $row->rh;
      $odont = $row->odont;
      $pelvis = $row->pelvis;
      $papani = $row->papani;
      $colp = $row->colp;
      $cevix = $row->cevix;
      $vdrl1 = $row->vdrl1;
      $diasmes = $row->diasmes;
      $prev_act_mes = $row->prev_act_mes;
      $rr = $row->rr;
      $vdrl2 = $row->vdrl2;*/
	   $rh_option = $row->rh_option;
       $peso1 = $row->peso1;
      $talla1 = $row->talla1;
      $fum_cal_ges = $row->fum_cal_ges;
      $fpp_cal_ges = $row->fpp_cal_ges;
      $sem_act_a = $row->semana_amorea;
      $prev_act = $row->prev_act;
      $sencibil = $row->sencibil;
      $rh = $row->rh;
      $odont = $row->odont;
      $pelvis = $row->pelvis;
      $papani = $row->papani;
      $colp = $row->colp;
      $cevix = $row->cevix;
      $vdrl1 = $row->vdr1;
      $diasmes = $row->diasmes;
      $prev_act_mes = $row->prev_act_mes;
      $rr = $row->rr;
      $vdrl2 = $row->vdr2;
	  
	  
      $params2 = array('table' => 'h_c_ante_obs', 'id' => $idObs);
      echo $this->user_register_info->get_operation_info($params2);
    }
    ?>
<div class="row" id="obs-form">
    <div class="col-lg-4">
      <table class="table table-striped">
        <tr>
          <th> Personales</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <th></th>
          <th>No</th>
          <th>Si</th>
        </tr>
        <tr>
          <td>
            <?php
            if ($dia1 == "no") {
              $color = "";
            } else {
              $color = "color:red";
            }

            ?>
            <label <?= $color ?>> Diabetes </label>

          </td>
          <td>
            <?php
            if ($dia1 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_dia1" class="dia1  alert-chekbox1 form-check-input" value="no">
          </td>
          <td>
            <?php
            if ($dia1 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_dia1" class="dia1 alert-chekbox1 form-check-input" value="si">
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($tbc1 == "no" || $tbc1 == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="tbc-pulmonar"> TBC Pulmonar </label>
          </td>
          <td>
            <?php
            if ($tbc1 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_tbc1" id="obs_<?= $idObs ?>_tbc1" class='alert-chekbox2 form-check-input' value="no">
          </td>
          <td>
            <?php
            if ($tbc1 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_tbc1" id="obs_<?= $idObs ?>_tbc1" class='alert-chekbox2 form-check-input' value="si">
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($hip1 == "no" || $hip1 == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="hipertencion"> Hipertensión </label>
          </td>
          <td>
            <?php
            if ($hip1 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_hip1" id="obs_<?= $idObs ?>_hip1" class='alert-chekbox3 form-check-input' value="no">
          </td>
          <td>
            <?php
            if ($hip1 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_hip1" id="obs_<?= $idObs ?>_hip1" value="si" class='alert-chekbox3 form-check-input'>
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($pelv == "no"  || $pelv == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="pelvico-urinaria"> Pelvico-Urinaria </label>
          </td>
          <td>

            <?php
            if ($pelv == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_pelv" id="obs_<?= $idObs ?>_pelv" value="no" class='alert-chekbox4 form-check-input'>
          </td>
          <td>
            <?php
            if ($pelv == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_pelv" id="obs_<?= $idObs ?>_pelv" value="si" class='alert-chekbox4 form-check-input'>
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($infert == "no" || $infert == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="infertibilidad"> Infertilidad </label>
          </td>
          <td>
            <?php
            if ($infert == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }

            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_inf" id="obs_<?= $idObs ?>_inf" value="no" class='alert-chekbox5 form-check-input'>
          </td>
          <td>
            <?php
            if ($infert == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_inf" id="obs_<?= $idObs ?>_inf" value="si" class='alert-chekbox5 form-check-input'>
          </td>
        </tr>
        <tr>
          <td><?php
              if ($otros1 == "no" || $otros1 == "") {
                $color = "";
              } else {
                $color = "color:red";
              }

              ?>



            <label style="<?= $color ?>">Otros </label>
          </td>
          <td>
            <?php
            if ($otros1 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }

            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_otros1" id="obs_<?= $idObs ?>_otros1" value="no" class='alert-chekbox6 form-check-input'>
          </td>
          <td>
            <?php
            if ($otros1 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_otros1" id="obs_<?= $idObs ?>_otros1" value="si" class='alert-chekbox6 form-check-input'>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <div class="form-floating">
              <input type="text" value="<?= $otros1_text ?>" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_otros1_text" placeholder="Detalle">
              <label for="otros1_text">Detalle </label>
            </div>

          </td>
        </tr>
      </table>

    </div>

    <div class="col-lg-4">
      <table class="table table-striped">
        <tr>
          <th> Familiares</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <th></th>
          <th>No</th>
          <th>Si</th>
        </tr>
        <tr>
          <td> <?php
                if ($dia2 == "no" || $dia2 == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="diabetesf"> Diabetes</label>
          </td>
          <td>
            <?php
            if ($dia2 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_dia2" id="obs_<?= $idObs ?>_dia2" value="no" class='alert-chekbox7 form-check-input'>
          </td>
          <td>
            <?php
            if ($dia2 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_dia2" id="obs_<?= $idObs ?>_dia2" value="si" class='alert-chekbox7 form-check-input'>
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($tbc2 == "no" || $tbc2 == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="tbc-pulmonarf"> TBC Pulmonar</label>
          </td>
          <td>
            <?php
            if ($tbc2 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_tbc2" id="obs_<?= $idObs ?>_tbc2" value="no" class='alert-chekbox8 form-check-input'>
          </td>
          <td>
            <?php
            if ($tbc2 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }

            ?>
            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_tbc2" id="obs_<?= $idObs ?>_tbc2" value="si" class='alert-chekbox8 form-check-input'>
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($hip2 == "no" || $hip2 == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="hpertencionf"> Hipertensión</label>
          </td>
          <td>
            <?php
            if ($hip2 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_hip2" id="obs_<?= $idObs ?>_hip2" value="no" class='alert-chekbox9 form-check-input'>
          </td>
          <td>
            <?php
            if ($hip2 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_hip2" id="obs_<?= $idObs ?>_hip2" value="si" class='alert-chekbox9 form-check-input'>
          </td>
        </tr>
        <tr>
          <td> <?php
                if ($gem == "no"  || $gem == "") {
                  $color = "";
                } else {
                  $color = "color:red";
                }

                ?>
            <label style="<?= $color ?>" class="gemales"> Gemelares</label>
          </td>
          <td>
            <?php
            if ($gem == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }

            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_gem" id="obs_<?= $idObs ?>_gem" value="no" class='alert-chekbox10 form-check-input'>
          </td>
          <td>
            <?php
            if ($gem == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }

            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_gem" id="obs_<?= $idObs ?>_gem" value="si" class='alert-chekbox10 form-check-input'>
          </td>
        </tr>
        <tr>
          <td>
            <?php
            if ($otros2 == "no" || $otros2 == "") {
              $color = "";
            } else {
              $color = "color:red";
            }

            ?>
            <label style="<?= $color ?>">Otros</label>
          </td>
          <td>
            <?php
            if ($otros2 == "no") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_otros2" id="obs_<?= $idObs ?>_otros2" value="no" class='alert-chekbox11 form-check-input'>
          </td>
          <td>
            <?php
            if ($otros2 == "si") {
              $checked = "checked";
            } else {
              $checked = "";
            }
            ?>

            <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_otros2" id="obs_<?= $idObs ?>_otros2" value="si" class='alert-chekbox11 form-check-input'>
          </td>
        </tr>
        <tr>
          <td colspan="3">

            <div class="form-floating">
              <input type="text" value="<?= $otros2_text ?>" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_otros2_text" placeholder="Detalle">
              <label for="otros2_text">Detalle </label>
            </div>

          </td>
        </tr>
      </table>

    </div>

    <div class="col-lg-4">
      <table class="table table-striped">
        <tr>
          <th>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</th>
          <th></th>
        </tr>
        <tr>
          <td> <?php if ($fiebre == 0) {
                  $color = "";
                } else {
                  $color = "color:red";
                } ?>
            <label style="<?= $color ?>"> Fiebre </label>
          </td>
          <td>
            <?php
            if ($fiebre == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_fiebre">
          </td>
        </tr>
        <tr>
          <td> <?php if ($artra == 0) {
                  $color = "";
                } else {
                  $color = "color:red";
                } ?>
            <label style="<?= $color ?>"> Artralgia </label>
          </td>
          <td>
            <?php
            if ($artra == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_artra">
          </td>
        </tr>
        <tr>
          <td> <?php if ($mia == 0) {
                  $color = "";
                } else {
                  $color = "color:red";
                } ?>

            <label style="<?= $color ?>">Mialgia </label>
          </td>
          <td>
            <?php
            if ($mia == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_mia">
          </td>
        </tr>
        <tr>
          <td> <?php if ($exa == 0) {
                  $color = "";
                } else {
                  $color = "color:red";
                } ?>
            <label style="<?= $color ?>">Exantema cutaneo </label>
          </td>
          <td>
            <?php
            if ($exa == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_exa">
          </td>
        </tr>
        <tr>
          <td> <?php if ($con == 0) {
                  $color = "";
                } else {
                  $color = "color:red";
                } ?>
            <label style="<?= $color ?>">Conjuctivitis no purulenta/hiperemica </label>
          </td>
          <td>
            <?php
            if ($con == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_con">
          </td>


        </tr>

      </table>

    </div>
    <div class="col-lg-6">
      <div style="overflow-x:auto;">
        <table class="table">
<!--
          <tr>
            <td> Ninguno o mas de 3 partos</td>
            <td>
              <?php
              if ($nig1 == 0) {
                $checked = "";
              } else {
                $checked = "checked";
              }
              ?>
              <input class="thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_nig1">
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Partos</span>
                <input type="text" value="<?= $partos ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_partos">
              </div>
            </td>

            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Aborto</span>
                <input type="text" value="<?= $arbotos ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_arbotos">
              </div>
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Vaginales</span>
                <input value="<?= $vaginales ?>" type="text" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_vaginales">
              </div>
            </td>

            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Viven</span>
                <input type="text" value="<?= $viven ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_viven">
              </div>
            </td>
          </tr>
          <tr>
            <td> Algun RN menor de 2500g</td>
            <td>
              <?php
              if ($nig2 == 0) {
                $checked = "";
              } else {
                $checked = "checked";
              }
              ?>

              <input class="thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_nig2">
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Gestas</span>
                <input type="text" value="<?= $gestas ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_gestas">
              </div>
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Cesareas</span>
                <input type="text" value="<?= $cesareas ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_cesareas">
              </div>
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Muertos 1era sem.</span>
                <input type="text" value="<?= $muertos1 ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_muertos1">
              </div>
            </td>
          </tr>
          <tr>
            <td> Embarazo multiple</td>
            <td>
              <?php
              if ($nig3 == 0) {
                $checked = "";
              } else {
                $checked = "checked";
              }
              ?>

              <input class="thischeckbox" type="checkbox" <?= $checked ?> name="obs_<?= $idObs ?>_nig3">
            </td>

            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Nacidos vivos</span>
                <input type="text" value="<?= $nacidov1 ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_nacidov1">
              </div>
            </td>
            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Nacidos muertos</span>
                <input type="text" value="<?= $nacidom1 ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_nacidom1">
              </div>
            </td>

            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">Despues 1era sem.</span>
                <input type="text" value="<?= $despues1s ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_despues1s">
              </div>
            </td>

            <td>
              <div class="input-group mb-2">
                <span class="input-group-text">otros</span>
                <input type="text" value="<?= $otrosc ?>" class="form-control sumg txt-inp-obs" id="obs_<?= $idObs ?>_otrosc">
              </div>
            </td>
          </tr>-->
          <tr>
            <td colspan="3">
              <div class="form-floating">
                <input type="text" value="<?= $fin ?>" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_fin" placeholder="Fin Ant. Embarazo">
                <label for="fin">Fin Ant. Embarazo </label>
              </div>
            </td>
            <td>
              <div class="input-group mb-2">
                <div class="form-floating">
                  <input type="text" value="<?= $rn ?>" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_rn" placeholder="RN con mayor peso">
                  <label for="fin">RN con mayor peso </label>
                </div>
                <span class="input-group-text">lb</span>
              </div>

            </td>
          </tr>
        </table>
      </div>
    </div>


    <div class="col-lg-12">
      <hr class="hr_ad" />
      <h4 class=" h4">Embarazo Actual</h4>
      <div class="col-lg-12 table-responsive" style="border-right:1px solid rgb(210,210,210)">
        <table class="table table-striped">
          <tr>
            <th>Cálculo Gestacionario Segun Sonografia</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td>
              <label> Fecha de la 1era sonografia</label>
              <!-- <div class="input-group date dfecha1" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                <input type="text" class="form-control bcgno" id="obs_<?= $idObs ?>_fecha1" readonly>
                <span class="input-group-text"><span class="glyphicon glyphicon-th"></span></span>
              </div>
              <input id="obs_<?= $idObs ?>_fecha1" type="hidden"> -->
              <input type="date" value="<?= $fecha1 ?>" class="form-control bcgno txt-inp-obs obs_fecha1" id="obs_<?= $idObs ?>_fecha1">
            </td>
            <td> <label>Semana y día de la 1era sonografia</label>
              <table style="width:210px">
                <tr>
                  <td>
                    <div class="input-group ">
                      <input type="text" value="<?= $sono1 ?>" class="form-control onlynumber txt-inp-obs obs_sono1" id="obs_<?= $idObs ?>_sono1">
                      <span class="input-group-text">Sem.</span>
                    </div>

                  </td>
                  <td>
                    <div class="input-group">
                      <input type="text" value="<?= $sonodia1 ?>" class="form-control onlynumber txt-inp-obs obs_sonodia1" id="obs_<?= $idObs ?>_sonodia1">
                      <span class="input-group-text">Días</span>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
            <td title="Mas o menos 2 semanas"><label>FPP (+ o - 2 sem.)</label>
              <input value="<?= $fpp1 ?>" type="text" class="form-control fpp txt-inp-obs obs_fpp1" id="obs_<?= $idObs ?>_fpp1" readonly>
            </td>
            <td style="width:90px">
              <label>Tiempo Amenorrea</label>
              <table style="width:210px">
                <tr>
                  <td>
                    <div class="input-group">
                      <input value="<?= $rest1 ?>" type="text" class="form-control rest txt-inp-obs obs_rest1" id="obs_<?= $idObs ?>_rest1" readonly>
                      <span class="input-group-text">Sem.</span>
                    </div>
                  </td>
                  <td>
                    <div class="input-group">
                      <input  value="<?= $diarest1 ?>" type="text" class="form-control rest txt-inp-obs obs_dia_rest1" id="obs_<?= $idObs ?>_dia-rest1" readonly />
                      <span class="input-group-text">Días</span>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
       
        </table>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <table class="table">

            <tr>
              <th> <label><span style="color:red">*</span> Peso</label></th>
              <th><label> <span style="color:red">*</span> Talla cm</label></th>
            </tr>
            <tr>
              <td>
                <div class="input-group">
                  <input type="text" value="<?= $peso1 ?>" class="form-control txt-inp-obs" style="text-transform:lowercase" id="obs_<?= $idObs ?>_peso"> <span class="input-group-text">lb</span>
                </div>
              </td>
              <td><input type="text" value="<?= $talla1 ?>" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_talla"></td>
            </tr>
          </table>
        </div>
        <div class="col-lg-5">
          <table class="table">
            <tr>
              <th> Cálculo Gestacionario Segun FUM</th>
            </tr>
            <tr>
              <td>
                <label>FUM <span style="color:red">*</span></label>
                <input type="date" value="<?= $fum_cal_ges ?>" class="form-control bcgno txt-inp-obs obs_fum_cal_ges" id="obs_<?= $idObs ?>_fum_cal_ges">

              </td>
            </tr>
            <tr>
              <td> <label>FPP(+ o - 2 sem.) </label> <input value="<?= $fpp_cal_ges ?>" class="form-control txt-inp-obs obs_fpp_cal_ges" id="obs_<?= $idObs ?>_fpp_cal_ges" readonly /></td>
            </tr>
            <tr>
              <td> <label>Tiempo amenorea </label> <input value="<?= $sem_act_a ?>" class="form-control txt-inp-obs obs_sem_act_a" id="obs_<?= $idObs ?>_sem_act_a" readonly></td>
            </tr>
          </table>
        </div>

      </div>
    </div>
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6 table-responsive">
          <table class="table" style="width:90%">
            <tr>
              <th>Antitetanica </th>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td> <label>Previa</label></td>
              <td><label>Actual</label></td>
              <td> </td>
              <td></td>
            </tr>
            <tr>
              <td><label> No </label>
                <?php
                if ($prev_act == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_prev_act" id="obs_<?= $idObs ?>_prev_act" value="no">
              </td>
              <td><label> Si</label>

                <?php
                if ($prev_act == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>


                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_prev_act" id="obs_<?= $idObs ?>_prev_act" value="si">
              </td>

              <td>
                <div class="input-group">
                  <span class="input-group-text">1</span>
                  <input type="text" value="<?= $prev_act_mes ?>" class="form-control txt-inp-obs" name="obs_<?= $idObs ?>_mes" id="obs_<?= $idObs ?>_prev_act_mes" placeholder="Mes" style="text-transform:lowercase">
                </div>
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-text">2/R</span> <input value="<?= $rr ?>" type="text" class="form-control txt-inp-obs" id="obs_<?= $idObs ?>_2r" placeholder="Gesta" style="text-transform:lowercase">
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6 table-responsive">
          <table class="table" style="width:70%">
            <tr>
              <th>Grupo</th>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><label>Sencibil</label></td>
              <td><label>Si </label>
                <?php
                if ($sencibil == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_sencibil" id="obs_<?= $idObs ?>_sencibil" value="si">
              </td>
              <td> <label>No </label>

                <?php
                if ($sencibil == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_sencibil" id="obs_<?= $idObs ?>_sencibil" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Rh</label></td>
              <td>+

                <?php
                if ($rh == "+") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>


                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_rh" id="obs_<?= $idObs ?>_rh" value="+">

                <?php
                if ($rh == "-") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>
                - <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_rh" id="obs_<?= $idObs ?>_rh" value="-">
              </td>
              <td>
                <div class="input-group">
                  <?php $rh_select_options = array("Seleccionar", "A", "AB", "O"); ?>
                  <select class="form-control" id="obs_<?= $idObs ?>_rh_option">
                    <?php
                    foreach ($rh_select_options as $rh_select_option) {
                      if ($rh_option == $rh_select_option) {
                        $selected = "selected";
                      } else {
                        $selected = "";
                      }
                      echo "<option $selected>$rh_select_option</option>";
                    }

                    ?>
                  </select>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> Ox. Odont.</th>

            <tr>
              <td><label>Normal</label></td>
              <td><span style="color:red">*</span></td>
            </tr>
            <tr>
              <td><label>No</label></td>
              <td>
                <?php
                if ($odont == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_odont" id="obs_<?= $idObs ?>_odont" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Si</label></td>
              <td>
                <?php
                if ($odont == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>
                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_odont" id="obs_<?= $idObs ?>_odont" value="si">
              </td>
            </tr>
          </table>

        </div>
        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> Ex. Pelvis.</th>
            <tr>
              <td><label>Normal</label></td>
              <td><span style="color:red">*</span></td>
            </tr>
            <tr>
              <td><label>No</label></td>
              <td>

                <?php
                if ($pelvis == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>


                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_pelvis" id="obs_<?= $idObs ?>_pelvis" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Si</label></td>
              <td>
                <?php
                if ($pelvis == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_pelvis" id="obs_<?= $idObs ?>_pelvis" value="si">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> Papanicola</th>
            <tr>
              <td><label>Normal</label></td>
              <td><span style="color:red">*</span></td>
            </tr>
            <tr>
              <td><label>No</label></td>
              <td>
                <?php
                if ($papani == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_papani" id="obs_<?= $idObs ?>_papani" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Si</label></td>
              <td>
                <?php
                if ($papani == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_papani" id="obs_<?= $idObs ?>_papani" value="si">
              </td>
            </tr>
          </table>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> COLPOSCOPIA</th>
            <tr>
              <td><label>Normal</label></td>
              <td><span style="color:red">*</span></td>
            </tr>
            <tr>
              <td><label>No</label></td>
              <td>

                <?php
                if ($colp == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>
                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_colp" id="obs_<?= $idObs ?>_colp" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Si</label></td>
              <td>
                <?php
                if ($colp == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_colp" id="obs_<?= $idObs ?>_colp" value="si">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> CEVIX</th>
            <tr>
              <td><label>Normal</label></td>
              <td><span style="color:red">*</span></td>
            </tr>
            <tr>
              <td><label>No</label></td>
              <td>
                <?php
                if ($cevix == "no") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_cevix" id="obs_<?= $idObs ?>_cevix" value="no">
              </td>
            </tr>
            <tr>
              <td><label>Si</label></td>
              <td>
                <?php
                if ($cevix == "si") {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input type="radio" <?= $checked ?> name="obs_<?= $idObs ?>_cevix" id="obs_<?= $idObs ?>_cevix" value="si">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-4 table-responsive">
          <table class="table" style="width:40%">
            <th> VDRL </th>
            <th><span style="color:red">*</span></th>

            <tr>
              <td>
                <?php
                if ($vdrl1 == 1) {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input class="thischeckbox" type="checkbox" <?= $checked ?> id="obs_<?= $idObs ?>_vdrl1" name="obs_<?= $idObs ?>_vdrl1"> +
              </td>
              <td><label>Dia/Mes</label></td>
            </tr>
            <tr>
              <td>
                <?php
                if ($vdrl2 == 1) {
                  $checked = "checked";
                } else {
                  $checked = "";
                }
                ?>

                <input class="thischeckbox" type="checkbox" <?= $checked ?> id="obs_<?= $idObs ?>_vdrl2" name="obs_<?= $idObs ?>_vdrl2"> -
              </td>
              <td><input value="<?= $diasmes ?>" class="form-control txt-inp-obs" type="text" id="obs_<?= $idObs ?>_diasmes"></td>
            </tr>
          </table>
        </div>
      </div>
      <?php if ($obs_data == 1) { ?>

        <div class="float-end">
          <br />
          <button type="button" class="btn btn-primary" id="resetFormObs">Nuevo</button>
          <button type="button" class="btn btn-success" id="saveEditAntObs">Guardar </button>
          <span id="alert_placeholder_obs" style="position:absolute; " class="p-2"></span>
        </div>
      <?php }
$dataobs = array(
'obs_up_time'=>$up_time,
'obs_in_time' =>$in_time,
'obs_in_by'=>$in_by,
'obs_up_by' => $up_by
);

$this->session->set_userdata($dataobs);


	  ?>
    </div>

  </div>
  <input id="idObs" type="hidden" value="<?= $idObs ?>" />
 
    <input id="obs-form-inputs" type="hidden" value="<?= $idObs ?>" />
	 <input id="obs-form-radio" type="hidden" value="<?= $idObs ?>" />
 <input id="obs-form-chkb" type="hidden" value="<?= $idObs ?>" />
