<section class="section">
  <?php
  if ($data_ophtal == 0) {
	   $showDrawingToolsOphtal= 1;
    $od_sin_con = "";
    $od_con_cor = "";
    $od_mas_o_meno = "";
    $od_cor_act = "";
    $os_sin_con = "";
    $os_con_cor = "";
    $masomenos1 = "";
    $retine1 = "";
    $os_mas_o_meno = "";
    $masomenos2 = "";
    $retine2 = "";
    $masomenos3 = "";
    $retine3 = "";
    $masomenos4 = "";
    $retine4 = "";
    $masomenos5 = "";
    $retine5 = "";
    $masomenos6 = "";
    $retine6 = "";
    $masomenos7 = "";
    $retine7 = "";
    $masomenos8 = "";
    $retine8 = "";
    $ppm = "";
    $converg = "";
    $ducvers = "";
    $convertest = "";
    $conj1 = "";
    $conj2 = "";
    $cornea1 = "";
    $cornea2 = "";
    $os_cor_act = "";
    $pup1 = "";
    $pup2 = "";
    $crist1 = "";
    $crist2 = "";
    $vitreo1 = "";
    $vitreo2 = "";
    $fondos1 = "";
    $fondos2 = "";
    $nota = "";
    $id_oftal = 0;
    $oyos_images = "assets_new/img/ophtal/ojos3.png";
    $fondos_images = "assets_new/img/ophtal/fondo-ojos.png";
    $height_ojos = '150';
	  $up_time = date("Y-m-d H:i:s");
    $in_time = date("Y-m-d H:i:s");
    $up_by = $this->session->userdata('user_id');
    $in_by = $this->session->userdata('user_id');
  } else {
	  $showDrawingToolsOphtal= 0;
    foreach ($query_ophtal as $row)
	  $in_by = $row->inserted_by;
    $up_by = $this->session->userdata('user_id');
    $in_time = $row->inserted_time;
    $up_time = date("Y-m-d H:i:s");
	
      $od_sin_con = $row->od_sin_con;
    $od_con_cor = $row->od_con_cor;
    $od_mas_o_meno = $row->od_mas_o_meno;
    $od_cor_act = $row->od_cor_act;
    $os_sin_con = $row->os_sin_con;
    $os_con_cor = $row->os_con_cor;
    $masomenos1 = $row->masomenos1;
    $retine1 = $row->retine1;
    $os_cor_act = $row->os_cor_act;
    $os_mas_o_meno = $row->os_mas_o_meno;
    $masomenos2 = $row->masomenos2;
    $retine2 = $row->retine2;
    $masomenos3 = $row->masomenos3;
    $retine3 = $row->retine3;
    $masomenos4 = $row->masomenos4;
    $retine4 = $row->retine4;
    $masomenos5 = $row->masomenos5;
    $retine5 = $row->retine5;
    $masomenos6 = $row->masomenos6;
    $retine6 = $row->retine6;
    $masomenos7 = $row->masomenos7;
    $retine7 = $row->retine7;
    $masomenos8 = $row->masomenos8;
    $retine8 = $row->retine8;
    $ppm = $row->ppm;
    $converg = $row->converg;
    $ducvers = $row->ducvers;
    $convertest = $row->convertest;
    $conj1 = $row->conj1;
    $conj2 = $row->conj2;
    $cornea1 = $row->cornea1;
    $cornea2 = $row->cornea2;
    $pup1 = $row->pup1;
    $pup2 = $row->pup2;
    $crist1 = $row->crist1;
    $crist2 = $row->crist2;
    $vitreo1 = $row->vitreo1;
    $vitreo2 = $row->vitreo2;
    $fondos1 = $row->fondos1;
    $fondos2 = $row->fondos2;
    $nota = $row->nota;
    $id_oftal = $row->id;
    $oyos_images = "assets/img/oftal/" . $row->ojo;
    $fondos_images = "assets/img/oftal/" . $row->fondo;
    $height_ojos = '250';
    $params2 = array('table' => 'h_c_oftalmologia', 'id' => $row->id);
    echo $this->user_register_info->get_operation_info($params2);
  }

  $agudesa_options = array("20", "25", "30", "40", "80", "100", "150", "200", "300", "400", "600", "C/D", "P/L", "N/PL", "N/M");

  ?>
 <input type="hidden" id="id_oftal" value="<?= $id_oftal ?>">
    <div class="card-body" id="ophtalmology-forms">
      <div class="accordion " id="accordionOphtalmology">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingAgudesaVisual">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAgudesaVisual" aria-expanded="false" aria-controls="collapseAgudesaVisual">
            Agudeza visual
            </button>
          </h2>
          <div id="collapseAgudesaVisual" class="accordion-collapse " aria-labelledby="headingAgudesaVisual" data-bs-parent="#accordionOphtalmology">
            <div class="accordion-body">
              <table class="table table-borderless table-sm" style="width:100%">
                <tr>
                  <th></th>
                  <th>Sin Correccion</th>
                  <th>Con Correccion</th>
                  <th>Correccion Actual</th>
                </tr>
                <tr>
                  <td title='Este campo debe ser lleno para guardar sus datos'>OD <span style='color:red'>*</span></td>
                  <td title='Este campo debe ser lleno para guardar sus datos'>

					   <input list="od_sin_con_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_od_sin_con"  value="<?=$od_sin_con?>">

						<datalist id="od_sin_con_list">
						<?php
						foreach ($agudesa_options as $agudesa_option) {
						if ($od_sin_con == $agudesa_option) {
						$selected = "selected";
						} else {
						$selected = "";
						}
						echo "<option $selected>$agudesa_option</option>";
						}

						?>
						</datalist>
		    </td>
                  <td>
                <input list="od_con_cor_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_od_con_cor"  value="<?=$od_con_cor?>">

						<datalist id="od_con_cor_list">
					 <?php
                      foreach ($agudesa_options as $agudesa_option) {
                        if ($od_con_cor == $agudesa_option) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        }
                        echo "<option $selected>$agudesa_option</option>";
                      }

                      ?>
						</datalist>
				   </td>
                  <td>
                    <div class="input-group">
                      <span class="input-group-text reduce-height">
                        <?php if ($od_mas_o_meno == "mas") {
                          $checked = "checked";
                        } else {
                          $checked = "";
                        } ?>
                        <input type="radio" class="form-check-input" value='mas' name="<?= $id_oftal ?>_od_mas_o_meno" <?= $checked ?> />
                        &nbsp;<span style="font-weight:bold" class="mas">+ &nbsp;</span>

                        <?php if ($od_mas_o_meno == "menos") {
                          $checked = "checked";
                        } else {
                          $checked = "";
                        } ?>
                        <br /><input type="radio" class="form-check-input" value='menos' name="<?= $id_oftal ?>_od_mas_o_meno" <?= $checked ?> />
                        &nbsp;
                        <span style="font-weight:bold" class="menos">- &nbsp;</span>
                      </span>
                    
					  
					    <input list="od_cor_act_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_od_cor_act"  value="<?=$od_cor_act?>">

						<datalist id="od_cor_act_list">
					  <?php for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                          $option = number_format($i, 2);
                          if ($od_cor_act == $option) {
                            $selected = "selected";
                          } else {
                            $selected = "";
                          }
                          echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                        } ?>
						</datalist>
					  
					  
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>OS</td>
                  <td>
                  	 <input list="os_sin_con_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_os_sin_con"  value="<?=$os_sin_con?>">

						<datalist id="os_sin_con_list">
					  <?php
                      foreach ($agudesa_options as $agudesa_option) {
                        if ($os_sin_con == $agudesa_option) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        }
                        echo "<option $selected>$agudesa_option</option>";
                      }

                      ?>
						</datalist>
					
				   </td>
                  <td>
				  
				  
				   <input list="os_con_cor_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_os_con_cor"  value="<?=$os_con_cor?>">

						<datalist id="os_con_cor_list">
					  <?php
                      foreach ($agudesa_options as $agudesa_option) {
                        if ($os_con_cor == $agudesa_option) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        }
                        echo "<option $selected>$agudesa_option</option>";
                      }

                      ?>
						</datalist>
				  
                  </td>

                  <td>
                    <div class="input-group">
                      <span class="input-group-text reduce-height">
                        <?php
                        if ($os_mas_o_meno == "mas") {
                          $checked = "checked";
                        } else {
                          $checked = "";
                        } ?>
                        <input type="radio" class="form-check-input" value='mas' name="<?= $id_oftal ?>_os_mas_o_meno" <?= $checked ?> />
                        &nbsp;<span style="font-weight:bold" class="mas">+&nbsp;</span>

                        <?php
                        if ($os_mas_o_meno == "menos") {
                          $checked = "checked";
                        } else {
                          $checked = "";
                        } ?>

                        <br /><input value='menos' type="radio" class="form-check-input" name="<?= $id_oftal ?>_os_mas_o_meno" <?= $checked ?> />
                        &nbsp;<span style="font-weight:bold" class="menos">-&nbsp;</span>
                      </span>
                      <input list="os_cor_act_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_os_cor_act"  value="<?=$os_cor_act?>">

						<datalist id="os_cor_act_list">
					  <?php for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                          $option = number_format($i, 2);
                          if ($os_cor_act == $option) {
                            $selected = "selected";
                          } else {
                            $selected = "";
                          }
                          echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                        } ?>
						</datalist>
					   
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingRetineB">
            <button class=" accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRetineB" aria-expanded="false" aria-controls="collapseRetineB">
              Retinoscopía y Balance muscular
            </button>
          </h2>
          <div id="collapseRetineB" class="accordion-collapse " aria-labelledby="headingRetineB" data-bs-parent="#accordionOphtalmology">
            <div class="accordion-body">
              <div class="col-lg-12">
                <div class="row">
                  <hr class="title-highline-top" />

                  <div class="col-lg-5 ">
                    <h6>Retinoscopía </h6>
                    <table class="table table-borderless" style=" width:100%;">
                      <tr>
                        <td>
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php


                              if ($masomenos1 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              }


                              ?>
                              <input type="radio" class="form-check-input" value="si" name="<?= $id_oftal ?>_masomenos1" <?= $checked ?> />&nbsp;+&nbsp;
                              <?php

                              if ($masomenos1 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              }
                              ?>
                              <br /><input type="radio" class="form-check-input" value="no" name="<?= $id_oftal ?>_masomenos1" <?= $checked ?> />&nbsp;-
                            </span>
                        <input list="retine1_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine1"  value="<?=$retine1?>">

						<datalist id="retine1_list">
					     <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine1 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
							
							
                          </div>
                        </td>
                        <td style="border-left:2px solid #38a7bb">

                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos2 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos2" value="si" <?= $checked ?> />&nbsp;+&nbsp;
                              <?php
                              if ($masomenos2 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>


                              <br /><input value="no" type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos2" <?= $checked ?> />&nbsp;-
                            </span>
                          
							      <input list="retine2_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine2"  value="<?=$retine2?>">
							
								<datalist id="retine2_list">
					     <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine2 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
							
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb">
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos3 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos3" value="si" <?= $checked ?> />&nbsp;+&nbsp;
                              <?php
                              if ($masomenos3 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>


                              <br /><input type="radio" class="form-check-input" value="no" name="<?= $id_oftal ?>_masomenos3" <?= $checked ?>>&nbsp;-
                            </span>
                        <input list="retine3_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine3"  value="<?=$retine3?>">
							
								<datalist id="retine3_list">
					      <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine3 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
                          </div>
                        </td>
                        <td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb;">
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos4 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos4" value="si" <?= $checked ?> />&nbsp;+&nbsp;
                              <?php
                              if ($masomenos4 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <br /><input type="radio" class="form-check-input" value="no" name="<?= $id_oftal ?>_masomenos4" <?= $checked ?> />&nbsp;-
                            </span>
                        <input list="retine4_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine4"  value="<?=$retine4?>">
							
								<datalist id="retine4_list">
					      <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine4 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-5 ">
                    <br />
                    <table class="table table-borderless" style="width:100%;">
                      <tr>
                        <td>
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos5 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos5" value="si" <?= $checked ?> />&nbsp;+&nbsp;<br />
                              <?php
                              if ($masomenos5 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>



                              <input value="no" type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos5" <?= $checked ?> />&nbsp;-
                            </span>
                           <input list="retine5_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine5"  value="<?=$retine5?>">
							
								<datalist id="retine5_list">
					      <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine5 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
                          </div>
                        </td>
                        <td style="border-left:2px solid #38a7bb">
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos6 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos6" value="si" <?= $checked ?> />&nbsp;+&nbsp;
                              <?php
                              if ($masomenos6 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <br /><input value="no" type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos6" <?= $checked ?> />&nbsp;-
                            </span>
                         	  <input list="retine6_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine6"  value="<?=$retine5?>">
							
								<datalist id="retine6_list">
					       <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine6 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
							
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb">
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos7 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos7" value="si" <?= $checked ?> />&nbsp;+&nbsp;

                              <?php
                              if ($masomenos7 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <br /><input value="no" type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos7" <?= $checked ?> />&nbsp;-
                            </span>
                          <input list="retine7_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine7"  value="<?=$retine7?>">
							
								<datalist id="retine7_list">
					      <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine7 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
							
							
                          </div>
                        </td>
                        <td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb;">
                          <div class="input-group">
                            <span class="input-group-text reduce-height">
                              <?php
                              if ($masomenos8 == 'si') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>

                              <input type="radio" class="form-check-input" name="<?= $id_oftal ?>_masomenos8" value="si" <?= $checked ?>>&nbsp;+&nbsp;
                              <?php
                              if ($masomenos8 == 'no') {
                                $checked = "checked";
                              } else {
                                $checked = "";
                              } ?>
                              <br /><input type="radio" class="form-check-input" value="no" name="<?= $id_oftal ?>_masomenos8" <?= $checked ?>>&nbsp;-
                            </span>
                            <input list="retine8_list"  class="form-control txt-inp-oph" id="<?= $id_oftal ?>_retine8"  value="<?=$retine8?>">
							
								<datalist id="retine8_list">
					      <?php
                              for ($i = 0.50; $i <= 20.00; $i += 0.50) {
                                $option = number_format($i, 2);
                                if ($retine8 == $option) {
                                  $selected = "selected";
                                } else {
                                  $selected = "";
                                }
                                echo "<option value=" . $option . "  " . $selected . ">" . $option . "</option>";
                              } ?>
						</datalist>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-10 border-start">
                    <h6>Balance muscular</h4>
                      <div class="form-floating mb-3">
                        <input type="text" id="<?= $id_oftal ?>_ppm" class="form-control txt-inp-oph" value="<?= $ppm ?>" placeholder="PPM">
                        <label for="<?= $id_oftal ?>_ppm">PPM</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" id="<?= $id_oftal ?>_converg" class="form-control txt-inp-oph" value="<?= $converg ?>" placeholder="Converg">
                        <label for="<?= $id_oftal ?>_converg">Converg</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" id="<?= $id_oftal ?>_convertest" class="form-control txt-inp-oph" value="<?= $convertest ?>" placeholder="Cover test.">
                        <label for="<?= $id_oftal ?>_convertest">Cover test.</label>
                      </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingLampH">
            <button class=" accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLampH" aria-expanded="false" aria-controls="collapseLampH">
              Lampara de hendidura y Fondoscopía
            </button>
          </h2>
          <div id="collapseLampH" class="accordion-collapse collapse" aria-labelledby="headingLampH" data-bs-parent="#accordionOphtalmology">
            <div class="accordion-body">
              <div class="col-md-12">

                <div class="card mb-3" style="max-width: auto">
                  <div class="row g-0">
			
                    <div class="col-md-12" >
                      <div class="card-body">
                        <h6 class="card-title">Lampara de hendidura </h6>
						<div class="table-responsive">
                        <table class="table table-borderless" style="width:100%">
                          <tr>
                            <td><label>Conjuntiva</label></td>
                            <td><input type="text" id="<?= $id_oftal ?>_conj1" value="<?= $conj1 ?>" class="form-control txt-inp-oph"></td>
                            <td><input type="text" id="<?= $id_oftal ?>_conj2" value="<?= $conj2 ?>" class="form-control txt-inp-oph"></td>
                          </tr>
                          <tr>
                            <td><label>Córnea</label></td>
                            <td><input type="text" id="<?= $id_oftal ?>_cornea1" value="<?= $cornea1 ?>" class="form-control txt-inp-oph"></td>
                            <td><input type="text" id="<?= $id_oftal ?>_cornea2" value="<?= $cornea2 ?>" class="form-control txt-inp-oph"></td>
                          </tr>
                          <tr>
                            <td><label>Pupila</label></td>
                            <td><input type="text" id="<?= $id_oftal ?>_pup1" value="<?= $pup1 ?>" class="form-control txt-inp-oph"></td>
                            <td><input type="text" id="<?= $id_oftal ?>_pup2" value="<?= $pup2 ?>" class="form-control txt-inp-oph"></td>
                          </tr>
                          <tr>
                            <td><label>Cristalino</label></td>
                            <td><input type="text" id="<?= $id_oftal ?>_crist1" value="<?= $crist1 ?>" class="form-control txt-inp-oph"></td>
                            <td><input type="text" id="<?= $id_oftal ?>_crist2" value="<?= $crist2 ?>" class="form-control txt-inp-oph"></td>
                          </tr>
                          <tr>
                            <td><label>Vítreo</label></td>
                            <td><input type="text" id="<?= $id_oftal ?>_vitreo1" value="<?= $vitreo1 ?>" class="form-control txt-inp-oph"></td>
                            <td><input type="text" id="<?= $id_oftal ?>_vitreo2" value="<?= $vitreo2 ?>" class="form-control txt-inp-oph"></td>
                          </tr>
                          <tr>
                            <td><label>Nota</label></td>
                            <td colspan='2'>
                              <button type="button" id="btnSpeechOftal1" title='soporte solo para el navegador Chrome' class="btn btn-primary btn-sm"><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
                              &nbsp; <span id="actionSpeechOftal1"></span>
							  
							  	<div id="quill-editor-oftalmologia_note_<?=$id_oftal?>" class="border  rounded-2" style="height:100px"><?=$nota; ?></div>
                              <!--<textarea rows="8" id="<?= $id_oftal ?>_not-oftm" class="form-control txt-ares-ophtal"><?= $nota ?></textarea>-->
                            </td>

                          </tr>
						  
						  <tr>
						  <td></td>
						  <td>
						  <?php if($showDrawingToolsOphtal==1) {?>
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
					
						<input id='inputImgSaveToDatabaseOftalOjos' type="hidden" />
						<?php $this->load->view('clinical-history/ophtalmology/drawing/drawOnEyes'); ?>
						<canvas id="canvasfinalImgSaveToDatabaseOftalOjos" style="display:none" > </canvas>

						<canvas id="<?=$id_oftal?>_canvas_image_eyes"   style="background-repeat: no-repeat;" > </canvas>
						<input id="init_diagram_name" type="hidden" />
						<script>
						init_diagram_ojos('<?= base_url(); ?><?=$oyos_images?>', 'canvas_image_eyes');
						</script>
						<?php } else { ?>
					<img src="<?= base_url(); ?><?=$oyos_images?>" style="background-repeat: no-repeat;" > 
				<?php } ?>
						  </td>
						  </tr>
                        </table>
						
                      </div>
						
					   </div>
					   
					    <div class="col-md-5 ms-3">
        
                    </div>
                    </div>
                   
              
                </div>

              </div>
              <div class="col-md-12  ">
                <div class="card mb-3" style="max-width: auto">
                  <div class="row g-0">
                    <div class="col-md-12">
                      <div class="card-body">
                        <h6 class="card-title">Fondoscopía</h6>
                        <div class="row">
						 <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input id="<?= $id_oftal ?>_fondos1" class="form-control txt-ares-ophtal" value="<?= $fondos1 ?>">
                          <label for="<?= $id_oftal ?>_fondos1"> Nota</label>
                        </div>
                          </div>
						  <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input id="<?= $id_oftal ?>_fondos2" class="form-control txt-ares-ophtal"  value="<?= $fondos2 ?>">
                          <label for="<?= $id_oftal ?>_fondos2"> Nota</label>
                        </div>
						</div>
                    </div>
                      </div>
                    </div>
                    <div class="col-md-7 container align-items-center justify-content-center">
                        <input type="hidden" id="showDrawingToolsOphtal" value="<?= $showDrawingToolsOphtal ?>">
                        
					 <?php if($showDrawingToolsOphtal==1) {?>
	  <div class="d-flex flex-row " style="cursor:pointer;width:100%">
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:black;border-radius:20px" data-color="black" onclick="getColorFondo(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:green;border-radius:20px" data-color="green" onclick="getColorFondo(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:blue;border-radius:20px" data-color="blue" onclick="getColorFondo(this)"></div>
    <div class="m-1 flex-fill" style="width:20px;height:20px;background:red;border-radius:20px" data-color="red" onclick="getColorFondo(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:yellow;border-radius:20px" data-color="yellow" onclick="getColorFondo(this)"></div>
  <div class="m-1 flex-fill" style="width:20px;height:20px;background:orange;border-radius:20px" data-color="orange" onclick="getColorFondo(this)"></div>
   <div class="flex-fill"><i class="bi bi-eraser-fill fs-3" data-color="eraser" onclick="getColorFondo(this)"></i></div>
  <div class="flex-fill"> <button type="button" class="btn btn-danger btn-xs"  size="23" onclick="eraseFondo()">Nuevo</button></div>
</div>
		  <?php $this->load->view('clinical-history/ophtalmology/drawing/drawOnFondos'); ?>
		   <input id='inpuImgSaveToDatabaseOftalFondos' type="hidden" />
		    <canvas id="canvasfinalImgSaveToDatabaseOftalFondos" style="display:none"> </canvas>
                    <canvas id="<?=$id_oftal?>_canvas_image_fondo"   style="background-repeat: no-repeat;" > </canvas>
    	           <script>
			
				init_diagram_fondos('<?= base_url(); ?><?=$fondos_images?>', 'canvas_image_fondo');
				</script>
				
				<?php } else { ?>
					<img src="<?= base_url(); ?><?=$fondos_images?>" style="background-repeat: no-repeat;" > 
				<?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if ($id_oftal > 0) { ?>

        <div class="float-end">
          <br />
          <button type="button" class="btn btn-primary" id="resetOph">Nuevo</button>
          <button type="button" class="btn btn-success" id="saveEditOph">Guardar </button>
          <span id="alert_placeholder_exam_oph" style="position:absolute; " class="p-2"></span>
        </div>
        <?php } else {?>
	  <br>
		  <button type="button" class="btn btn-success btn-lg" id="saveOphData">Guardar Datos De Oftalmología</button>
	   <?php }
	  
	  $dataof = array(
'of_up_time'=>$up_time,
'of_in_time' =>$in_time,
'of_in_by'=>$in_by,
'of_up_by' => $up_by
);

$this->session->set_userdata($dataof);

	  ?>
    
  

<input type="hidden" id="ophtalmology-form-radio" value="<?= $id_oftal ?>">
<input type="hidden" id="ophtalmology-form-text" value="<?= $id_oftal ?>">
    </div>
</section>
