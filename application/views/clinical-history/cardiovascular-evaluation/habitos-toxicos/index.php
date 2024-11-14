<?php

if ($data_eva_cardio > 0 ) {
	//if ($query_toxic_habits->result() !=NULL && $data_eva_cardio==1){
  foreach ($query_toxic_habits->result() as $rowht)

    $cafe_cant = $rowht->cafe_cant;
  $cafe_cant_desc = $rowht->cafe_cant_desc;
  $cafe_frec = $rowht->cafe_frec;
  $pipa_cant = $rowht->pipa_cant;
  $pipa_cant_desc = $rowht->pipa_cant_desc;
  $pipa_frec = $rowht->pipa_frec;
  $ciga_can = $rowht->ciga_can;
  $ciga_can_desc = $rowht->ciga_can_desc;
  $ciga_frec = $rowht->ciga_frec;

  $alc_can = $rowht->alc_can;
  $alc_can_desc = $rowht->alc_can_desc;
  $alc_frec = $rowht->alc_frec;
  $tab_can = $rowht->tab_can;
  $tab_can_desc = $rowht->tab_can_desc;
  $tab_frec = $rowht->tab_frec;
  $hookah = $rowht->hookah;
  $hookah_desc = $rowht->hookah_desc;
  $hab_f_hookah = $rowht->hab_f_hookah;
  $hab_c_drug_desc = $rowht->hab_c_drug_desc;
  $hab_c_drug = $rowht->hab_c_drug;
  $hab_f_drug = $rowht->hab_f_drug;
  $id_ht = $rowht->id;
  $hab_t_drug = $rowht->hab_t_drug;

} else {

  $hab_t_drug = "";
  $cafe_cant = "";
  $cafe_cant_desc = "";
  $cafe_frec = "";
  $pipa_cant = "";
  $pipa_cant_desc = "";
  $pipa_frec = "";
  $ciga_can = "";
  $ciga_can_desc = "";
  $ciga_frec = "";

  $alc_can = "";
  $alc_can_desc = "";
  $alc_frec = "";
  $tab_can = "";
  $tab_can_desc = "";
  $tab_frec = "";
  $hookah = "";
  $hookah_desc = "";
  $hab_f_hookah = "";
  $hab_c_drug_desc = "";
  $hab_c_drug = "";
  $hab_f_drug = "";
  $id_ht = 0;
}


?>
<div class="col-sm-12">

  <div class="table-responsive">
    <table class="table table-sm">

      <tr style="font-weight:700">
        <th>
        <td>Hábito</td>
        <td>Cantidad</td>
        <td>Descripción</td>
        <td>Frecuencia</td>
        <td></td>
        <td>Hábito</td>
        <td>Cantidad</td>
        <td>Descripción</td>
        <td>Frecuencia</th>
      </tr>
      <tr>
        <th></th>
        <td class="th_habitos">Café</td>
        <th><input class="form-control input_habitos" type="text" id="_<?=$data_eva_cardio?>hab_c_caf" style="width:120px" value="<?= $cafe_cant ?>"></th>
        <th><input class="form-control input_habitos" type="text" id="_<?=$data_eva_cardio?>desc_caf" style="width:120px" value="<?= $cafe_cant_desc ?>"></th>
        <th class="th_habitos"><select class="form-control" id="_<?=$data_eva_cardio?>hab_f_caf" style="width:149px">
            <option selected><?= $cafe_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
		   <th class="id"></th>
        <td class="th_habitos">Tabaquismo</td>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>hab_c_tab" value="<?= $tab_can ?>" style="width:120px"></th>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>desc_tab" value="<?= $tab_can_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="_<?=$data_eva_cardio?>hab_f_tab" style="width:149px">
            <option selected><?= $tab_frec ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
      
      </tr>
     
      <tr>
       
        <th class="id"></th>
        <td class="th_habitos">Hookah</td>
        <th><input type="text" class="form-control input_hookah" id="_<?=$data_eva_cardio?>hookah" value="<?= $hookah ?>" style="width:120px"></th>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>desc_hooka" value="<?= $hookah_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="_<?=$data_eva_cardio?>hab_f_hookah" style="width:149px">
            <option selected><?= $hab_f_hookah ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></th>
		   <th></th>
        <td class="th_habitos">Alcohol</td>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>hab_c_al" value="<?= $alc_can ?>" style="width:120px"></th>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>desc_alco" value="<?= $alc_can_desc ?>" style="width:120px"></th>
        <th class="th_habitos"><select class="form-control" id="_<?=$data_eva_cardio?>hab_f_al" style="width:149px">
            <option selected><?= $alc_frec ?></option>
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
        <td class="th_habitos"> Droga</td>
        <td>
          <select class="form-control eva_card_droga" >
            <option value="">Seleccione</option>
            <?php

            $query = $this->clinical_history->query("Select * FROM historial_dropdown WHERE location=25");
            foreach ($query->result() as $row) {
              echo '<option  value="' . $row->name . '">' . $row->name . '</option>';
            }
            ?>
          </select>
          <br />
          <textarea class="form-control eva_card_droga_content" ><?= $hab_t_drug ?></textarea>

        </td>
        <td><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>hab_c_drug" value="<?= $hab_c_drug ?>" style="width:120px"></td>
        <th><input type="text" class="form-control input_habitos" id="_<?=$data_eva_cardio?>desc_drug" value="<?= $hab_c_drug_desc ?>" style="width:120px"></th>
        <td class="th_habitos"><select class="form-control" id="_<?=$data_eva_cardio?>hab_f_drug" style="width:149px">
            <option selected><?= $hab_f_drug ?></option>
            <option>Diariamente</option>
            <option>Ocasionalmente</option>
            <option>A veces</option>
          </select></td>
      </tr>
    </table>
  </div>





<div class="row">
 <div class="col-lg-12">
   <?php


   if ($data_eva_cardio > 0) { ?>
    <div class="float-end">
      <br />

      <button type="button" class="btn btn-success" id="_saveEditToxHab">Guardar </button><span id="_successEdithabT" class="p-2" style="position:absolute"></span>
    </div>
  <?php  } 
 

  ?>
 </div>
 </div>



</div>


