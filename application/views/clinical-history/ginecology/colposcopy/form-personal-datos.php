<?php

if ($colpos_data == 1) {
  foreach ($query_colpos as $row)
    $col_is_preg = $row->col_is_preg;
  $col_age_known_sex = $row->col_age_known_sex;
  $col_last_pap = $row->col_last_pap;
  $col_ref_motive = $row->col_ref_motive;
  $col_ac_sat = $row->col_ac_sat;
  $col_finding_show_fast = $row->col_finding_show_fast;
  $col_local = $row->col_local;
  $col_mos_fino = $row->col_mos_fino;
  $col_comp_end1 = $row->col_comp_end1;

  $col_comp_end2 = $row->col_comp_end2;

  $col_finding_no = $row->col_finding_no;

  $col_finding_minor_change = $row->col_finding_minor_change;

  $col_ext_f = $row->col_ext_f;
  $col_finding_major_change = $row->col_finding_major_change;


  $col_finding_tenue = $row->col_finding_tenue;

  $col_finding_dense = $row->col_finding_dense;
  $col_finding_acet_change = $row->col_finding_acet_change;


  $col_finding_image = $row->col_finding_image;


  $col_finding_loc_cuad = $row->col_finding_loc_cuad;


  $col_finding_inf_iz = $row->col_finding_inf_iz;


  $col_finding_inf_der = $row->col_finding_inf_der;


  $col_finding_sup_der = $row->col_finding_sup_der;
  $col_mos_grueso = $row->col_mos_grueso;

  $col_mos_mos = $row->col_mos_mos;

  $col_ext1 = $row->col_ext1;


  $col_ext2 = $row->col_ext2;


  $col_ext3 = $row->col_ext3;

  $col_ext4 = $row->col_ext4;
  $col_ext_g = $row->col_ext_g;


  $col_vas_at = $row->col_vas_at;


  $col_vas_orq = $row->col_vas_orq;


  $col_vas_s_c = $row->col_vas_s_c;


  $col_vas_sac = $row->col_vas_sac;


  $col_vas_vad = $row->col_vas_vad;


  $col_vas_dil = $row->col_vas_dil;


  $col_sug_ul = $row->col_sug_ul;


  $col_sug_bor = $row->col_sug_bor;


  $col_sug_sit = $row->col_sug_sit;


  $col_sug_perf = $row->col_sug_perf;


  $col_sug_elev = $row->col_sug_elev;


  $col_sug_reg = $row->col_sug_reg;


  $col_sug_cent = $row->col_sug_cent;


  $col_sug_irreg = $row->col_sug_irreg;


  $col_sug_sob = $row->col_sug_sob;


  $col_iodo_pos = $row->col_iodo_pos;


  $col_iodo_par = $row->col_iodo_par;

  $col_iodo_neg = $row->col_iodo_neg;
  $col_taking_bio = $row->col_taking_bio;
  $col_loc_ant = $row->col_loc_ant;
  $col_loc_post_cent = $row->col_loc_post_cent;
  $col_loc_iz_cent = $row->col_loc_iz_cent;
  $col_loc_de_cent = $row->col_loc_de_cent;
  $col_real_leg_end = $row->col_real_leg_end;
  $idCol = $row->id;
  $in_by = $row->inserted_by;
  $up_by = $id_user;
  $in_time = $row->inserted_time;
  $up_time = date("Y-m-d H:i:s");
  $params2 = array('table' => 'h_c_colposcopy_dh', 'id' => $idCol);
  echo $this->user_register_info->get_operation_info($params2);
  $print = '
  <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/colposcopy/' . $idCol . '/' . $id_patient . '/' . $id_user . '/' . $id_centro . '/r" target="_blank"> <i class="fa fa-print"></i> </span> Vert.</a>
  <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/colposcopy/' . $idCol . '/' . $id_patient . '/' . $id_user . '/' . $id_centro . '/r" target="_blank"> <i class="fa fa-print" ></i> </span> Horiz.</a>
  ';
} else {
  $print = '';
  $up_time = date("Y-m-d H:i:s");
  $in_time = date("Y-m-d H:i:s");
  $up_by = $id_user;
  $in_by = $id_user;
  $col_is_preg = "";
  $col_age_known_sex = "";
  $col_last_pap = "";
  $col_ref_motive = "";
  $col_ac_sat = "";
  $col_finding_show_fast = 0;
  $col_local = 0;
  $col_finding_dense = 0;
  $col_comp_end1 = 0;
  $col_ext_f = 0;
  $col_comp_end2 = 0;

  $col_finding_no = 0;

  $col_finding_minor_change = 0;
  $col_mos_grueso = 0;

  $col_finding_major_change = 0;
  $col_mos_fino = 0;

  $col_finding_tenue = 0;


  $col_finding_acet_change = 0;


  $col_finding_image = 0;


  $col_finding_loc_cuad = 0;


  $col_finding_inf_iz = 0;


  $col_finding_inf_der = 0;


  $col_finding_sup_der = 0;


  $col_mos_mos = 0;

  $col_ext1 = 0;


  $col_ext2 = 0;


  $col_ext3 = 0;

  $col_ext4 = 0;
  $col_ext_g = 0;


  $col_vas_at = 0;


  $col_vas_orq = 0;


  $col_vas_s_c = 0;


  $col_vas_sac = 0;


  $col_vas_vad = 0;


  $col_vas_dil = 0;


  $col_sug_ul = 0;


  $col_sug_bor = 0;


  $col_sug_sit = 0;


  $col_sug_perf = 0;


  $col_sug_elev = 0;


  $col_sug_reg = 0;


  $col_sug_cent = 0;


  $col_sug_irreg = 0;


  $col_sug_sob = 0;


  $col_iodo_pos = 0;


  $col_iodo_par = 0;

  $col_iodo_neg = 0;
  $col_taking_bio = "";
  $col_loc_ant = 0;
  $col_loc_post_cent = 0;
  $col_loc_iz_cent = 0;
  $col_loc_de_cent = 0;
  $col_real_leg_end = "";
  $idCol = 0;
}

?>


<div class="row">
  <input type="hidden" id="up_time_colposcopy" value="<?= $up_time ?>" />
  <input type="hidden" id="in_time_colposcopy" value="<?= $in_time ?>" />
  <input type="hidden" id="in_by_colposcopy" value="<?= $in_by ?>" />
  <input type="hidden" id="up_by_colposcopy" value="<?= $up_by ?>" />
  <div class="col-lg-6">
    <form class="row g-3">

      <div class="col-md-7">
        <label>Estas Embarazada ? <?= $col_is_preg ?></label>
        <div class="form-check form-check-inline">

          <?php
          if ($col_is_preg == 'si') {
            $selected = "checked";
          } else {
            $selected = "";
          }
          ?>
          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_is_preg1' name='<?= $idCol ?>_col_is_preg' value='si'>
          <label class="form-check-label" for="col_is_preg1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($col_is_preg == 'no') {
            $selected = "checked";
          } else {
            $selected = "";
          }
          ?>

          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_is_preg2' name='<?= $idCol ?>_col_is_preg' value='no'>
          <label class="form-check-label" for="col_is_preg2">
            No
          </label>
        </div>

      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="<?= $idCol ?>_col_age_known_sex" name="<?= $idCol ?>_col_age_known_sex" value="<?= $col_age_known_sex ?>" placeholder="Edad Primera Relacion Coital" />
          <label for="floatingTextarea">Edad Primera Relacion Coital</label>
        </div>
      </div>

      <div class="col-md-6" title="Como califica su vida sexual?">
        <div class="form-floating">
          <input type="date" class="form-control" placeholder="Fecha Ultimo PAP" id="<?= $idCol ?>_col_last_pap" name="<?= $idCol ?>_col_last_pap" value="<?= $col_last_pap ?>" />
          <label for="floatingTextarea">Fecha Ultimo PAP</label>
        </div>
      </div>

      <div class="col-md-12">

        <div class="form-floating">
          <textarea class="form-control" placeholder="Motivo Referimiento" id="<?= $idCol ?>_col_ref_motive" name="<?= $idCol ?>_col_ref_motive"><?= $col_ref_motive ?></textarea>
          <label for="floatingTextarea">Motivo Referimiento</label>
        </div>
      </div>
      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Colcoscopia (Acetico 5%)</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check form-check-inline">
                <?php
                if ($col_ac_sat == 'si') {
                  $selected = "checked";
                } else {
                  $selected = "";
                } ?>
                <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_ac_sat1' name='<?= $idCol ?>_col_ac_sat' value='si'>
                <label class="form-check-label" for="<?= $idCol ?>_col_ac_sat1">
                  Satisfactoria
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_ac_sat == 'no') {
                  $selected = "checked";
                } else {
                  $selected = "";
                } ?>
                <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_ac_sat2' name='<?= $idCol ?>_col_ac_sat' value='no'>
                <label class="form-check-label" for="<?= $idCol ?>_col_ac_sat2">
                  No Satisfactoria
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_local == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_local1" name="<?= $idCol ?>_col_local" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_local1">
                  Localizada en el ectocérvix, totalmente visible
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_comp_end1 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_comp_end11" name="<?= $idCol ?>_col_comp_end1" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_comp_end11">
                  Con un componente endoservical totalmente visible
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_comp_end2 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_comp_end21" name="<?= $idCol ?>_col_comp_end2" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_comp_end21">
                  Con un componente endoservical NO totalmente visible
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div class="col-md-8">
        <label>Mosaico</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_mos_fino == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_mos_fino1" name="<?= $idCol ?>_col_mos_fino" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_mos_fino1">
                  Fino
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_mos_grueso == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_mos_grueso1" name="<?= $idCol ?>_col_mos_grueso" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_mos_grueso1">
                  Grueso
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_mos_mos == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_mos_mos1" name="<?= $idCol ?>_col_mos_mos" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_mos_mos1">
                  Mosaico ancho con rosetas de diferente tamaño
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div class="col-md-12">
        <label class="col-sm-12">Extensión</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check form-check-inline">
                <?php
                if ($col_ext1 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_ext11" name="<?= $idCol ?>_col_ext1" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_ext11">
                  < 25% </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_ext2 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_ext21" name="<?= $idCol ?>_col_ext2" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_ext21">
                  25 a 50%
                </label>
              </div>

              <div class="form-check form-check-inline">
                <?php
                if ($col_ext3 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_ext31" name="<?= $idCol ?>_col_ext3" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_ext31">
                  50 a 75%
                </label>
              </div>

              <div class="form-check form-check-inline">
                <?php
                if ($col_ext4 == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_ext42" name="<?= $idCol ?>_col_ext4" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_ext42">
                  > 75%
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>



      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Vasos Atipicos</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_vas_orq == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_orq" name="<?= $idCol ?>_col_vas_orq" <?= $selected ?>>
                <label class="form-check-label" for="exampleRadios1">
                  Stops
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_vas_orq == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_orq" name="<?= $idCol ?>_col_vas_orq" <?= $selected ?>>
                <label class="form-check-label" for="exampleRadios1">
                  Orquilla
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_vas_s_c == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_s_c1" name="<?= $idCol ?>_col_vas_s_c" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_vas_s_c1">
                  Busco Cambio
                </label>
              </div>
            </td>
            <td>
              <div class="form-check">
                <?php
                if ($col_vas_sac == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_sac2" name="<?= $idCol ?>_col_vas_sac" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_vas_sac2">
                  Sacacorchos
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_vas_vad == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_vad1" name="<?= $idCol ?>_col_vas_vad" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_vas_vad1">
                  Vasos de distintos calibres
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_vas_dil == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_vas_dil1" name="<?= $idCol ?>_col_vas_dil" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_vas_dil1">
                  Dilataciones
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Sugestiva de carcinoma</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_sug_ul == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_ul1" name="<?= $idCol ?>_col_sug_ul" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_ul1">
                  Ulceración
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_bor == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_bor1" name="<?= $idCol ?>_col_sug_bor" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_bor1">
                  Borders
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_sit == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_sit1" name="<?= $idCol ?>_col_sug_sit" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_sit1">
                  Situación
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_perf == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_perf1" name="<?= $idCol ?>_col_sug_perf" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_perf1">
                  Periférica
                </label>
              </div>
            </td>
            <td>
              <div class="form-check">
                <?php
                if ($col_sug_elev == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_elev" name="<?= $idCol ?>_col_sug_elev" <?= $selected ?>>
                <label class="form-check-label" for="exampleRadios1">
                  Elevación
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_reg == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_reg1" name="<?= $idCol ?>_col_sug_reg" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_reg1">
                  Regular
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_cent == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_cent1" name="<?= $idCol ?>_col_sug_cent" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_cent1">
                  Central
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_irreg == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_irreg1" name="<?= $idCol ?>_col_sug_irreg" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_irreg1">
                  Irregular
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_sug_sob == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_sug_sob1" name="<?= $idCol ?>_col_sug_sob" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_sug_sob1">
                  Sobreelevado
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </form>
  </div>
  <div class="col-lg-6">

    <form class="row g-3">
      <span class="text-muted">Hallazgos</span>
      <div class="col-md-12">
        <label class="col-sm-12">Ciclos menstruales</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check form-check-inline">
                <?php
                if ($col_finding_no == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>


                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_no1" name="<?= $idCol ?>_col_finding_no" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_no1">
                  Normal
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_finding_minor_change == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_minor_change1" name="<?= $idCol ?>_col_finding_minor_change" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_minor_change1">
                  Cambios Menores
                </label>
              </div>
              <div class="form-check form-check-inline">
                <?php
                if ($col_finding_major_change == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_major_change1" name="<?= $idCol ?>_col_finding_major_change" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_major_change1">
                  Cambios Mayores
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>


      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Locacion Del Cuadrante</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_finding_loc_cuad == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_loc_cuad1" name="<?= $idCol ?>_col_finding_loc_cuad" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_loc_cuad1">
                  Superior Izquierdo (12 a 3)
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_inf_iz == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_inf_iz1" name="<?= $idCol ?>_col_finding_inf_iz" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_inf_iz1">
                  Inferior Izquierdo (3 a 6)
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_inf_der == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_inf_der1" name="<?= $idCol ?>_col_finding_inf_der" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_inf_der1">
                  Inferior Derecho (6 a 9)
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_sup_der == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_sup_der1" name="<?= $idCol ?>_col_finding_sup_der" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_sup_der1">
                  Superior Derecho (9 a 12)
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Epitelio Acetoblanco</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_finding_tenue == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_tenue1" name="<?= $idCol ?>_col_finding_tenue" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_tenue1">
                  Tenue
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_dense == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_dense1" name="<?= $idCol ?>_col_finding_dense" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_dense1">
                  Denso
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_show_fast == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_show_fast1" name="<?= $idCol ?>_col_finding_show_fast" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_show_fast1">
                  Que aparece rapido y desaparece lento. Blanco Ostraceo
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_acet_change == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_acet_change1" name="<?= $idCol ?>_col_finding_acet_change" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_acet_change1">
                  Cambio acetoblanco debil que aparece TARDE y desaparece pronto
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_finding_image == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_finding_image1" name="<?= $idCol ?>_col_finding_image" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_finding_image1">
                  Imagen de blanco sobre blanco (border interno)
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>



      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">LUGOL (Test Shiller)</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_iodo_pos == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_iodo_pos1" name="<?= $idCol ?>_col_iodo_pos" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_iodo_pos1">
                  IODO Positivo
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_iodo_par == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_iodo_par1" name="<?= $idCol ?>_col_iodo_par" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_iodo_par1">
                  IODO Parcialmente negativo (posibilidad debil, parcialement moteado)
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_iodo_neg == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_iodo_neg1" name="<?= $idCol ?>_col_iodo_neg" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_iodo_neg1">
                  IODO negativo (amarillo mostaza sobre epitelio acetoblanco)
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-12">
        <label class="col-sm-12">Se toma biopsa</label>
        <div class="form-check form-check-inline">
          <?php
          if ($col_taking_bio == 'si') {
            $selected = "checked";
          } else {
            $selected = "";
          }
          ?>
          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_taking_bio1' name='<?= $idCol ?>_col_taking_bio' value='si'>
          <label class="form-check-label" for="<?= $idCol ?>_col_taking_bio1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($col_taking_bio == 'no') {
            $selected = "checked";
          } else {
            $selected = "";
          }
          ?>
          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_taking_bio1' name='+idCol+' _col_taking_bio' value="no">
          <label class="form-check-label" for='<?= $idCol ?>_col_taking_bio1'>
            No
          </label>
        </div>

      </div>

      <div class="col-md-12">
        <label class="col-sm-12 col-form-label">Localización</label>
        <table class="table table-borderless">
          <tr>
            <td>
              <div class="form-check">
                <?php
                if ($col_loc_ant == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_loc_ant1" name="<?= $idCol ?>_col_loc_ant" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_loc_ant1">
                  Anterior-Central-Periferico
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_loc_post_cent == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_loc_post_cent" name="<?= $idCol ?>_col_loc_post_cent" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_loc_post_cent1">
                  Posterior-Central-Periferico
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_loc_iz_cent == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_loc_iz_cent" name="<?= $idCol ?>_col_loc_iz_cent" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_loc_iz_cent1">
                  Izquierda-Central-Periferico
                </label>
              </div>
              <div class="form-check">
                <?php
                if ($col_loc_de_cent == 0) {
                  $selected = "";
                } else {
                  $selected = "checked";
                }
                ?>
                <input class="form-check-input" type="checkbox" id="<?= $idCol ?>_col_loc_de_cent" name="<?= $idCol ?>_col_loc_de_cent" <?= $selected ?>>
                <label class="form-check-label" for="<?= $idCol ?>_col_loc_de_cent1">
                  Derecha-Central-Periferico
                </label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-12">
        <label class="col-sm-12">Se realizo legrado endocervical</label>
        <div class="form-check form-check-inline">
          <?php
          if ($col_real_leg_end == 'si') {
            $selected = "checked";
          } else {
            $selected = "";
          }
          ?>
          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_real_leg_end11' name='<?= $idCol ?>_col_real_leg_end' value="si">
          <label class="form-check-label" for="<?= $idCol ?>_col_real_leg_end11">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($col_real_leg_end == 'no') {
            $selected = "checked";
          } else {
            $selected = "";
          }

          ?>
          <input class="form-check-input" type='radio' <?= $selected ?> id='<?= $idCol ?>_col_real_leg_end21' name='<?= $idCol ?>_col_real_leg_end' value="no">
          <label class="form-check-label" for="<?= $idCol ?>_col_real_leg_end21">
            No
          </label>
        </div>

      </div>
    </form>

  </div>
</div>

<div class="float-end">
  <div class="input-group">
    <button type="button" class="btn btn-success m-1 btn-sm " id="saveEditColPh">Guardar </button>
    <div id="show-print-colposcopy"> </div>
    <span id="alert_placeholder_colph" style="position:absolute; " class="p-2"></span>
    <?php if ($colpos_data == 1) { ?>

      <button type="button" class="btn btn-primary m-1 btn-sm " id="resetFormColPh">Nuevo</button>
    <?php
      echo  $print;
    } ?>

  </div>
</div>
<br /> <br />

<input id="id_colph" type="hidden" value="<?= $idCol ?>" />
<input id="idCol" type="hidden" value="<?= $idCol  ?>" />
