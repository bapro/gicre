<?php

if ($vulvoscopy_data == 1) {
  foreach ($query_vu as $row)
    $vulvo_color_white = $row->vulvo_color_white;
  $vulvo_color_pig = $row->vulvo_color_pig;
  $vulvo_color_red = $row->vulvo_color_red;
  $part_vas_au = $row->part_vas_au;
  $part_vas_mot = $row->part_vas_mot;

  $part_vas_mos = $row->part_vas_mos;

  $part_vas_vas = $row->part_vas_vas;

  $vul_loc_ar_mu = $row->vul_loc_ar_mu;

  $vul_loc_ar_pi = $row->vul_loc_ar_pi;

  $vul_top_uni = $row->vul_top_uni;


  $vul_top_mul = $row->vul_top_mul;


  $vul_super_sob = $row->vul_super_sob;


  $vul_super_plena = $row->vul_super_plena;


  $vul_super_micro = $row->vul_super_micro;


  $vul_taking_bio = $row->vul_taking_bio;


  $vul_les_prer_1 = $row->vul_les_prer_1;


  $vul_les_prer_2 = $row->vul_les_prer_2;

  $in_by = $row->inserted_by;
  $up_by = $id_user;
  $in_time = $row->inserted_time;
  $up_time = date("Y-m-d H:i:s");
  $idVulvos = $row->id;
  $params2 = array('table' => 'h_c_colposcopy_dh', 'id' => $idVulvos);
  echo $this->user_register_info->get_operation_info($params2);
  $print = '
   <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/colposcopy/' . $idVulvos . '/' . $id_patient . '/' . $id_user . '/' . $id_centro . '/r" target="_blank"> <i class="fa fa-print"></i> </span> Vert.</a>
   <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/colposcopy/' . $idVulvos . '/' . $id_patient . '/' . $id_user . '/' . $id_centro . '/r" target="_blank"> <i class="fa fa-print" ></i> </span> Horiz.</a>
   ';
} else {
  $print = '';
  $up_time = date("Y-m-d H:i:s");
  $in_time = date("Y-m-d H:i:s");
  $up_by = $id_user;
  $in_by = $id_user;
  $vulvo_color_white = 0;
  $vulvo_color_pig = 0;
  $vulvo_color_red = 0;
  $part_vas_au = 0;
  $part_vas_mot = 0;

  $part_vas_mos = 0;

  $part_vas_vas = 0;

  $vul_loc_ar_mu = 0;

  $vul_loc_ar_pi = 0;

  $vul_top_uni = 0;


  $vul_top_mul = 0;


  $vul_super_sob = 0;


  $vul_super_plena = 0;


  $vul_super_micro = 0;


  $vul_taking_bio = "";


  $vul_les_prer_1 = "";


  $vul_les_prer_2 = "";
  $idVulvos = 0;
}


?>
<div class="row">

  <input type="hidden" id="vul_up_time" value="<?= $up_time ?>" />
  <input type="hidden" id="vul_in_time" value="<?= $in_time ?>" />
  <input type="hidden" id="vul_in_by" value="<?= $in_by ?>" />
  <input type="hidden" id="vul_up_by" value="<?= $up_by ?>" />
  <div class="col-md-12">
    <div class="d-flex flex-wrap">
      <div class="p-2 flex-fill">
        <legend style='font-size:19px'>Color</legend>
        <div class="form-check ">

          <?php
          if ($vulvo_color_white == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vulvo_color_white" id="<?= $idVulvos ?>_vulvo_color_white" <?= $selected ?>>Blanca</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vulvo_color_pig == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vulvo_color_pig" id="<?= $idVulvos ?>_vulvo_color_pig" <?= $selected ?>>Pigmentada</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vulvo_color_red == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vulvo_color_red" id="<?= $idVulvos ?>_vulvo_color_red" <?= $selected ?>>Roja</label>

        </div>

      </div>
      <div class="p-2  flex-fill">
        <legend style='font-size:19px'>Parte vascular</legend>
        <div class="form-check ">
          <?php
          if ($part_vas_au == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_part_vas_au" id="<?= $idVulvos ?>_part_vas_au" <?= $selected ?>>Ausente</label>

        </div>
        <div class="form-check ">
          <?php
          if ($part_vas_mot == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_part_vas_mot" id="<?= $idVulvos ?>_part_vas_mot" <?= $selected ?>>Moteado</label>

        </div>
        <div class="form-check ">
          <?php
          if ($part_vas_mos == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_part_vas_mos" id="<?= $idVulvos ?>_part_vas_mos" <?= $selected ?>>Mosaico</label>

        </div>
        <div class="form-check ">
          <?php
          if ($part_vas_vas == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_part_vas_vas" id="<?= $idVulvos ?>_part_vas_vas" <?= $selected ?>>Vasos Atipico</label>

        </div>
      </div>
      <div class="p-2  flex-fill">

        <legend style='font-size:19px'>Localización</legend>

        <div class="form-check ">
          <?php
          if ($vul_loc_ar_mu == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_loc_ar_mu" id="<?= $idVulvos ?>_vul_loc_ar_mu" <?= $selected ?>>Area Muscosa</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vul_loc_ar_pi == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_loc_ar_pi" id="<?= $idVulvos ?>_vul_loc_ar_pi" <?= $selected ?>>Area Pilosa</label>

        </div>


      </div>

      <div class="p-2  flex-fill">

        <legend style='font-size:19px'>Topografía</legend>

        <div class="form-check ">
          <?php
          if ($vul_top_uni == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_top_uni" id="<?= $idVulvos ?>_vul_top_uni" <?= $selected ?>>Unifocal</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vul_top_mul == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_top_mul" id="<?= $idVulvos ?>_vul_top_mul" <?= $selected ?>>Multifocal</label>

        </div>

      </div>
      <div class="p-2  flex-fill">
        <legend style='font-size:19px'>Superficie</legend>

        <div class="form-check ">
          <?php
          if ($vul_super_sob == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_super_sob" id="<?= $idVulvos ?>_vul_super_sob" <?= $selected ?>>Sobreelevada</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vul_super_plena == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_super_plena" id="<?= $idVulvos ?>_vul_super_plena" <?= $selected ?>>Plena</label>

        </div>
        <div class="form-check ">
          <?php
          if ($vul_super_micro == 0) {
            $selected = "";
          } else {
            $selected = "checked";
          }
          ?>
          <label><input type="checkbox" class="form-check-input" name="<?= $idVulvos ?>_vul_super_micro" id="<?= $idVulvos ?>_vul_super_micro" <?= $selected ?>>Micropapilar</label>

        </div>
      </div>
    </div>
  </div>


</div>
<div class='row'>
  <div class='col-md-12'>

    <legend style='font-size:19px'>Toma de biopsia</legend>
    <div class="form-check form-check-inline">
      <?php

      if ($vul_taking_bio == 'no') {
        $selected = "checked";
      } else {
        $selected = "";
      }
      ?>

      <input class="form-check-input" type="radio" name="<?= $idVulvos ?>_vul_taking_bio" id="<?= $idVulvos ?>_vul_taking_bio1" value="no" <?= $selected ?>>
      <label class="form-check-label">No</label>
    </div>
    <div class="form-check form-check-inline">
      <?php

      if ($vul_taking_bio == 'si') {
        $selected = "checked";
      } else {
        $selected = "";
      }
      ?>
      <input class="form-check-input" type="radio" name="<?= $idVulvos ?>_vul_taking_bio" id="<?= $idVulvos ?>_vul_taking_bio2" value="si" <?= $selected ?>>
      <label class="form-check-label">Si</label>
    </div>
    <br /> <br />
  </div>
</div>
<div class='row'>
  <legend style='font-size:19px'>Lesiones perinales</legend>

  <div class="col-md-6">
    <div class="form-floating">
      <textarea rows="6" class="form-control colp-remove" id="<?= $idVulvos ?>_vul_les_prer_1" placeholder="Descripción" name="<?= $idVulvos ?>_vul_les_prer_1" style="height:100px"><?= $vul_les_prer_1 ?></textarea>

      <label for="vul_les_prer_1">Descripción</label>
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-floating">
      <textarea rows="6" class="form-control colp-remove" id="<?= $idVulvos ?>_vul_les_prer_2" placeholder="Localización" name="<?= $idVulvos ?>_vul_les_prer_2" style="height:100px"><?= $vul_les_prer_2 ?></textarea>

      <label for="vul_les_prer_2">Localización</label>
    </div>
  </div>


</div>


<br /> <br />

<div class="float-end">
  <div class="input-group">
    <button type="button" class="btn btn-success btn-sm m-1" id="save_vulvoscopia">Guardar </button>
    <div id="show-print-vulvoscopy"> </div>
    <span id="alert_placeholder_vulvoscopy" style="position:absolute; " class="p-2"></span>
    <?php if ($vulvoscopy_data == 1) { ?>

      <button type="button" class="btn btn-primary btn-sm m-1 " id="resetFormVulvo">Nuevo</button>
    <?php
      echo  $print;
    } ?>

  </div>


  <input id="idVulvos" type="hidden" value="<?= $idVulvos ?>" />

</div>

