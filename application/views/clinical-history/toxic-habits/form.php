<div class="col-sm-12">

  <div class="table-responsive">
    <table class="table">

      <tr style="font-weight:700">
        <th>
        <td>Habito</td>
        <td>Cantidad</td>
        <td>Descripción</td>
        <td>Frecuencia</td>
        <td></td>
        <td>Habito</td>
        <td>Cantidad</td>
        <td>Descripción</td>
        <td>Frecuencia</th>
      </tr>
      <tr>
        <th><span class="material-symbols-outlined">
            local_cafe
          </span></th>
        <td class="th_habitos">Cafe</td>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>hab_c_caf" style="width:120px" value="<?= $cafe_cant ?>"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_caf" style="width:120px" value="<?= $cafe_cant_desc ?>"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_caf" style="width:149px">
            <option selected><?= $cafe_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
        <th><img src="<?= base_url(); ?>assets_new/img/pipe.jpg" width="30"></th>
        <td class="th_habitos">Pipa</td>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>hab_c_pip" style="width:120px" value="<?= $pipa_cant ?>"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_pipa" style="width:120px" value="<?= $pipa_cant_desc ?>"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_pip" style="width:149px">
            <option selected><?= $pipa_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
      </tr>
      <tr>
        <!--<th class="id"><span class="material-symbols-outlined">
            smoking_rooms
          </span></th>
        <td class="th_habitos">Cigarillo</td>
        <th><input class="form-control input_habitos" value="<?= $ciga_can ?>" id="<?= $hab_tox_data ?>hab_c_ciga" style="width:120px"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_cig" style="width:120px" value="<?= $ciga_can_desc ?>"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_ciga" style="width:149px">
            <option selected><?= $ciga_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>-->
        <th><span class="material-symbols-outlined">
            liquor
          </span></th>
        <td class="th_habitos">Alcohol</td>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>hab_c_al" value="<?= $alc_can ?>" style="width:120px"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_alco" value="<?= $alc_can_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_al" style="width:149px">
            <option selected><?= $alc_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
      </tr>
      <tr>
        <th class="id"><span class="material-symbols-outlined">
            vape_free
          </span></th>
        <td class="th_habitos">Tabaco</td>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>hab_c_tab" value="<?= $tab_can ?>" style="width:120px"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_tab" value="<?= $tab_can_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_tab" style="width:149px">
            <option selected><?= $tab_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
        <th class="id"><img src="<?= base_url(); ?>assets_new/img/7772283.jpg" width="30"></th>
        <td class="th_habitos">Hookah</td>
        <th><input class="form-control input_hookah" id="<?= $hab_tox_data ?>hookah" value="<?= $hookah ?>" style="width:120px"></th>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_hooka" value="<?= $hookah_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_hookah" style="width:149px">
            <option selected><?= $hab_f_hookah ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
      </tr>
    </table>
    <table class="table">
      <tr>
        <th style="width:100px"></th>
        <th></th>
        <th style="width:550px">Tipo</th>
        <th>Cantidad</th>
        <th>Descripción</th>
        <th>Frecuencia</th>
      </tr>
      <tr>
        <th></th>
        <td class="th_habitos"><img src="<?= base_url(); ?>assets_new/img/drug.jpg" width="30" style="padding:1px"> Droga</td>
        <td>
          <select class="form-control" id="<?= $hab_tox_data ?>hab_t_drug">
            <option value="">Seleccione</option>
            <?php

            $query = $this->db->query("Select * FROM historial_dropdown WHERE location=25");
            foreach ($query->result() as $row) {
              echo '<option  value="' . $row->name . '">' . $row->name . '</option>';
            }
            ?>
          </select>
          <br />
          <textarea class="form-control" id="<?= $hab_tox_data ?>drug_list"><?= $hab_t_drug ?></textarea>

        </td>
        <td><input class="form-control input_habitos" id="<?= $hab_tox_data ?>hab_c_drug" value="<?= $hab_c_drug ?>" style="width:120px"></td>
        <th><input class="form-control input_habitos" id="<?= $hab_tox_data ?>desc_drug" value="<?= $hab_c_drug_desc ?>" style="width:120px"></th>
        <td class="th_habitos"><select class="form-control" id="<?= $hab_tox_data ?>hab_f_drug" style="width:149px">
            <option selected><?= $hab_f_drug ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></td>
      </tr>
    </table>
  </div>
  <input type="hidden" value="<?= $id_ht ?>" id="id_hab_tx">
  <input type="hidden" value="<?= $hab_tox_data ?>" id="hab_tox_data">

</div>


<div class="row">
 <div class="col-lg-12">
   <?php if ($query_toxic_habits->num_rows() > 0 ) { ?>
    <div class="float-end">
      <br />

      <button type="button" class="btn btn-success" id="saveEditToxHab">Guardar </button><span id="successEdithabT" class="p-2" style="position:absolute"></span>
    </div>
  <?php  } ?>
 </div>
 </div>