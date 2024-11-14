<div class="row">
  <?php
  if ($data_refraccion == 0) {
    $od_espera_r = "";
    $od_espera = "";
    $od_cilindro_r = "";
    $eje_od = "";
    $add_od = "";
    $od_cilindro = "";
    $os_espera_r = "";
    $espera_os = "";
    $os_cilindro_r = "";
    $cilindro_os = "";
    $eje_os = "";
    $add_os = "";
    $vision_sencilla = "";
    $flat_top = "";
    $invisibles = "";
    $progresivos = "";
    $antirreflejos = "";
    $policarbonatos = "";
    $transitions = "";
    $foto_croma = "";
    $ref_observaciones = "";
    $altura_mm = "";
	$d_prf="";
    $id = 0;
	 $up_time = date("Y-m-d H:i:s");
  $in_time = date("Y-m-d H:i:s");
  $up_by = $this->session->userdata('user_id');
  $in_by = $this->session->userdata('user_id');
  } else {
    foreach ($query_ref as $row)
      $od_espera_r = $row->od_espera_r;
    $od_espera = $row->od_espera;
    $od_cilindro_r = $row->od_cilindro_r;
    $eje_od = $row->eje_od;
    $add_od = $row->add_od;
    $od_cilindro = $row->od_cilindro;
    $os_espera_r = $row->os_espera_r;
    $espera_os = $row->espera_os;
    $os_cilindro_r = $row->os_cilindro_r;
    $cilindro_os = $row->cilindro_os;
    $eje_os = $row->eje_os;
    $add_os = $row->add_os;
	$d_prf=$row->d_prf;
    $vision_sencilla = $row->vision_sencilla;
    $flat_top = $row->flat_top;
    $invisibles = $row->invisibles;
    $progresivos = $row->progresivos;
    $antirreflejos = $row->antirreflejos;
    $policarbonatos = $row->policarbonatos;
    $transitions = $row->transitions;
    $foto_croma = $row->foto_croma;
    $altura_mm = $row->altura_mm;
    $ref_observaciones = $row->ref_observaciones;
    $id = $row->id;
	  $in_by = $row->inserted_by;
  $up_by = $this->session->userdata('user_id');
  $in_time = $row->inserted_time;
  $up_time = date("Y-m-d H:i:s");
    $params2 = array('table' => 'h_c_of_refracion', 'id' => $id);
    echo $this->user_register_info->get_operation_info($params2);


  $print = '
       <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$row->id_hist.'/'.$id.'/1/vert/'.$row->id_centro.'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$row->id_hist.'/'.$id.'/0/vert/'.$row->id_centro.'" target="_blank">con la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$row->id_hist.'/'.$id.'/1/horiz/'.$row->id_centro.'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/refraction/'.$row->id_hist.'/'.$id.'/0/horiz/'.$row->id_centro.'" target="_blank">con la foto</a>
       </li>
  </ul>
  </div>
';

[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($row->id_centro);
			$result_centro_medicos='<option value="' . $row->id_centro.'" >' . $get_centro_info_by_id['name'] . '</option>';

  }
  ?>
    <div class="col-lg-8">
				<div class="form-floating mt-3 mb-3">

				
				<select class="form-select form-select2-refraction"  id="id_centro_refr" aria-label="Centro médico" >
				<?php 
				echo $result_centro_medicos;
				?>
				</select>
				<label for="id_centro_refr">Centro médico</label>


				</div>
				</div>
 <form class="form-horizontal" method="post"  >
    <div class="col-lg-12">
	<div id="refraction-info"></div>
  <input type="hidden" id="refreaction_up_time" value="<?= $up_time ?>" />
  <input type="hidden" id="refreaction_in_time" value="<?= $in_time ?>" />
  <input type="hidden" id="refreaction_in_by" value="<?= $in_by ?>" />
  <input type="hidden" id="refreaction_up_by" value="<?= $up_by ?>" />
      <table class="table" style="width:100%" id='hide-refraccion'>
        <tr>
          <th></th>
          <th>Esfera</th>
          <th>Cilindro</th>
          <th>Eje</th>
          <th>Add</th>
        </tr>
        <tr>
          <th>OD</th>
          <td>
            <div class="input-group">
              <span class="input-group-text reduce-height">
                <?php if ($od_espera_r == "1") {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input type="radio" name="od_espera_r" id="od_espera_r" value="1" <?= $checked ?>>&nbsp;+<br />
                <?php if ($od_espera_r == "0") {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input value="0" type="radio" name="od_espera_r"  id="od_espera_r" <?= $checked ?>>&nbsp;-
              </span>
            
			  
			  <input list="od_esperalist"  class="form-control" name="od_espera" id="od_espera" value="<?=$od_espera?>">
  <datalist id="od_esperalist">
     <?php

                for ($i = 0; $i <= 20; $i++) {
                  $formatedNumber = number_format($i, 2, '.', '');
                 
                  echo "<option value=" . $formatedNumber . " >" . $formatedNumber . "</option>";
                }
                ?>
  </datalist>
			  
			  
            </div>
          </td>
          <td>
            <div class="input-group">
              <span class="input-group-text reduce-height">
                <?php if ($od_cilindro_r == '1') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input type="radio" name="od_cilindro_r" id="od_cilindro_r" value='1' <?= $checked ?>>&nbsp;+<br />
                <?php if ($od_cilindro_r == '0') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input value='0' type="radio" name="od_cilindro_r" id="od_cilindro_r" <?= $checked ?>>&nbsp;-
              </span>
             
			   <input list="od_cilindro_rlisst"  class="form-control" name="od_cilindro" id="od_cilindro" value="<?=$od_cilindro?>">
  <datalist id="od_cilindro_rlisst">
     <?php
                for ($n = 0.00; $n <= 20.00; $n += 0.25) {
                  $formatedNumber = number_format($n, 2, '.', '');
                  
                  echo '<option value=' . $formatedNumber . ' >' . $formatedNumber . '</option>';
                }
                ?>
  </datalist>
			  
			  
            </div>
          </td>
          <td>
              <input list="eje_odlist"  class="form-control" name="eje_od" id="eje_od" value="<?=$eje_od?>">
  <datalist id="eje_odlist">
       <?php

              for ($i = 0; $i <= 180; $i++) {
                $formatedNumber = number_format($i, 2, '.', '');
               
                echo "<option value=" . $formatedNumber . " >" . $formatedNumber . "</option>";
              }
              ?>
  </datalist>
			
			
			
          </td>
          <td>
           
      <input list="add_odlist"  class="form-control" name="add_od" id="add_od" value="<?=$add_od?>">
  <datalist id="add_odlist">
      <?php

              for ($i = 1; $i <= 3; $i++) {
                $formatedNumber = number_format($i, 2, '.', '');
               
                echo "<option value=" . $formatedNumber . " >" . $formatedNumber . "</option>";
              }
              ?>
  </datalist>



          </td>

        </tr>
        <tr>
          <th>OS</th>
          <td>
            <div class="input-group">
              <span class="input-group-text reduce-height">
                <?php if ($os_espera_r == '1') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input type="radio" name="os_espera_r" id="os_espera_r" value='1' <?= $checked ?>>&nbsp;+
                <?php if ($os_espera_r == '0') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>

                <br /><input value='0' type="radio" id="os_espera_r" name="os_espera_r" <?= $checked ?>>&nbsp;-
              </span>
             
			    <input list="espera_oslist"  class="form-control" name="espera_os" id="espera_os" value="<?=$espera_os?>">
  <datalist id="espera_oslist">
       <?php for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                  $option = number_format($i, 2);
                 
                  echo "<option value=" . $option . " >" . $option . "</option>";
                } ?>
  </datalist>
			  
			  
			  
            </div>
          </td>
          <td>
            <div class="input-group">
              <span class="input-group-text reduce-height">
                <?php if ($os_cilindro_r == '1') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <input type="radio" name="os_cilindro_r" id="os_cilindro_r" value='1' <?= $checked ?>>&nbsp;+
                <?php if ($os_cilindro_r == '0') {
                  $checked = "checked";
                } else {
                  $checked = "";
                } ?>
                <br /><input value='0' type="radio" name="os_cilindro_r" id="os_cilindro_r" <?= $checked ?>>&nbsp;-
              </span>
              
			    <input list="cilindro_oslist"  class="form-control" name="cilindro_os" id="cilindro_os"  value="<?=$cilindro_os?>">
  <datalist id="cilindro_oslist">
        <?php
                for ($n = 0.00; $n <= 20.00; $n += 0.25) {
                  $formatedNumber = number_format($n, 2, '.', '');
                  echo '<option value=' . $formatedNumber . '   >' . $formatedNumber . '</option>';
                }
                ?>
  </datalist>
			  
			  
            </div>
          </td>
          <td>
             <input list="eje_oslist"  class="form-control" name="eje_os" id="eje_os" value="<?=$eje_os?>">
  <datalist id="eje_oslist">
       <?php

              for ($i = 0; $i <= 180; $i++) {
                $formatedNumber = number_format($i, 2, '.', '');
                
                echo "<option value=" . $formatedNumber . " >" . $formatedNumber . "</option>";
              }
              ?>
  </datalist>



          </td>

          <td>
		  
           <input list="add_oslist"  class="form-control" name="add_os" id="add_os" value="<?=$add_os?>">
  <datalist id="add_oslist">
        <?php

              for ($i = 1; $i <= 3; $i++) {
                $formatedNumber = number_format($i, 2, '.', '');
               
                echo "<option value=" . $formatedNumber . ">" . $formatedNumber . "</option>";
              }
              ?>
  </datalist>
			
			
          </td>

        </tr>

      </table>
    </div>

  <div class="col-lg-10">

    <div class="row">
      <div class="d-flex flex-wrap">
        <div class="p-2 flex-fill">

          <div class="input-group">
            <span class="input-group-text reduce-height">
              <label>DP</label>
            </span>
            <?php
            if ($vision_sencilla == '0') {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-control" type="text" name='d-prf' id='d-prf'  value="<?=$d_prf?>">
            <span class="input-group-text reduce-height">
              <label>Mm</label>
            </span>
          </div>
          <br />
<div class="form-check">
            <?php
            if ($vision_sencilla == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>

            <input class="form-check-input" type="checkbox" name="vision-sencilla" id="vision-sencilla1" <?= $selected ?>>
            <label for="flat-top1">Visión Sencilla</label>
          </div>
          <div class="form-check">
            <?php
            if ($flat_top == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>

            <input class="form-check-input" type="checkbox" name="flat-top" id="flat-top1" <?= $selected ?>>
            <label for="flat-top1">Flat Top</label>
          </div>
          <div class="form-check ">
            <?php
            if ($invisibles == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="invisibles" id="invisibles1" <?= $selected ?>>
            <label for="invisibles1">Invisibles</label>
          </div>
          <div class="form-check ">
            <?php
            if ($progresivos == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="progresivos" id="progresivos1" <?= $selected ?>>
            <label for="progresivos1">Progresivos</label>
          </div>

        </div>

        <div class="p-2 flex-fill">
          <div class="input-group">
            <span class="input-group-text reduce-height">
              <label>Altura</label>
            </span>

            <input class="form-control" type="text" name='altura-mm' id='altura-mm' value="<?= $altura_mm ?>">
            <span class="input-group-text reduce-height">
              <label> Mm</label>
            </span>
          </div>
          <br />
          <div class="form-check">
            <?php
            if ($antirreflejos == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="antirreflejos" id="antirreflejos1" <?= $selected ?>>
            <label for="antirreflejos1">Antirreflejos</label>
          </div>
          <div class="form-check">
            <?php
            if ($policarbonatos == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="policarbonatos" id="policarbonatos1" <?= $selected ?>>
            <label for="policarbonatos1">Policarbonatos</label>
          </div>
          <div class="form-check ">
            <?php
            if ($transitions == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="transitions" id="transitions1" <?= $selected ?>>
            <label for="transitions1">Transición</label>
          </div>
          <div class="form-check ">
            <?php
            if ($foto_croma == 0) {
              $selected = "";
            } else {
              $selected = "checked";
            }
            ?>
            <input class="form-check-input" type="checkbox" name="foto_croma" id="foto_croma1" <?= $selected ?>>
            <label for="foto_croma1">Fotocromatico</label>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div class="col-lg-12">
    <div class="form-floating mb-3">
      <textarea id="refr_nota" name="refr_nota"  class="form-control" style="height:130px" placeholder="Observación"><?= $ref_observaciones ?></textarea>
      <label for="refr_nota1"> Observación</label>
    </div>
    <div id="alert_placeholder_refraction" class="float-start"></div>
	<?php 
if($this->session->userdata('user_perfil') !="Admin"){
?>
  <div class="float-end">
    <div class="input-group">
      <button type="button" class="btn btn-success btn-sm m-1" id="saveRefractionBtn">Guardar </button>
      <div id="show-print-refraction"> </div>

      <?php if ($data_refraccion == 1) { ?>
  <button type="button" class="btn btn-primary btn-sm m-1" id="resetRefra">Nuevo</button>
         <?php echo "$print"; ?>
      <?php } ?>
     
    </div>
  </div>
<?php }


$datarefra = array(
'refra_g_up_time'=>$up_time,
'refra_g_in_time' =>$in_time,
'refra_g_in_by'=>$in_by,
'refra_g_up_by' => $up_by
);

$this->session->set_userdata($datarefra);


 ?>
  </div>

  <input type="hidden" name="id_refraction" id="id_refraction" value="<?= $id ?>">
  <input type="hidden" name="data_refraccion" id="data_refraccion" value="<?= $data_refraccion ?>">
</div>
</form>



