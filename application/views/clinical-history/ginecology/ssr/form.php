<?php
if ($ssr_data == 0) {
  $optradio = "";
  $idSsr = 0;
  $edad = "";
  $numero = "";
  $sexual = "";
  $pareja = "";
  $califica = "";
  $califica_text = "";
  $utilizo = "";
  $sexual2 = "";
  $planif = "";
  $planif_text = "";
  $complica_text = "";
  $embara = "";
   $prueba_vih='';
    $prueba_vih_resultado='';
  $menarquia = "";
  $fecha_ul_m = "";
  $fecha_ovulacion = "";
  $semana_fertil = "";
  $amenorea_tiempo = "";
  $menaop = "";
  $cliclo = "";
  $cliclo_text = "";
  $dura_sang = "";
  $cant_sang = "";
  $dismeno = "";
  $fecha_ul_pap = "";
  $complica_dur_text = "";
  $ant_pap_re = "";
  $ant_pap_re_text = "";
  $realiza_auto = "";
  $realiza_auto_text = "";
  $fecha_ul_mama = "";
  $p = "";
  $a = "";
  $c = "";
  $e = "";
  $totalGest = "";
  $nuligesta = "";
  $complica = "";
  $complica_dur = "";
  $infec_tran = "";
  $infeccion1 = "";
  $infeccion2 = "";
  $infeccion3 = "";
  $otro_infeccion1 = "";
    $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
} else {
  foreach ($query_ssr as $row)
    $idSsr = $row->id ;
  $optradio = $row->optradio;
  $edad = $row->edad;
  $numero = $row->numero;
  $sexual = $row->sexual;
  $pareja = $row->pareja;
  $califica = $row->califica;
  $califica_text = $row->califica_text;
  $utilizo = $row->utilizo;
  $sexual2 = $row->sexual2;
   $prueba_vih_resultado=$row->prueba_vih_resultado;
    $prueba_vih= $row->prueba_vih;
  $planif = $row->planif;
  $complica_text = $row->complica_text;
  $planif_text = $row->planif_text;
  $embara = $row->embara;
  $menarquia = $row->menarquia;
  $fecha_ul_m = $row->fecha_ul_m;
  $fecha_ovulacion = $row->fecha_ovulacion;
  $semana_fertil = $row->semana_fertil;
  $amenorea_tiempo = $row->amenorea_tiempo;
  $menaop = $row->menaop;
  $cliclo = $row->cliclo;
  $complica_dur_text = $row->complica_dur_text;
  $cliclo_text = $row->cliclo_text;
  $dura_sang = $row->dura_sang;
  $cant_sang = $row->cant_sang;
  $dismeno = $row->dismeno;
  $fecha_ul_pap = $row->fecha_ul_pap;
  $ant_pap_re = $row->ant_pap_re;
  $ant_pap_re_text = $row->ant_pap_re_text;
  $realiza_auto = $row->realiza_auto;
  $realiza_auto_text = $row->realiza_auto_text;
  $fecha_ul_mama = $row->fecha_ul_mama;
  $p = $row->p;
  $a = $row->a;
  $c = $row->c;
  $e = $row->e;
  $totalGest = $row->totalGest;
  $nuligesta = $row->nuligesta;
  $complica = $row->complica;
  $complica_dur = $row->complica_dur;
  $infec_tran = $row->infec_tran;
  $infeccion1 = $row->infeccion1;
  $infeccion2 = $row->infeccion2;
  $infeccion3 = $row->infeccion3;
  $otro_infeccion1 = $row->otro_infeccion1;
   $params2 = array('table' => 'h_c_ant_ssr', 'id' => $idSsr);
      echo $this->user_register_info->get_operation_info($params2);

$in_by = $row->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $row->inserted_time;
$up_time = date("Y-m-d H:i:s");
}
?>
<div class="row" id="ssr-form">
  <div class="col-lg-12">
  <div class="card">
  <div class="card-body">
  <h5 class="card-title">Actividad sexual</h5>
  
  
   <form class="row g-4">
                <div class="col-md-12">
				  <label class="form-label">Ha tenido relaciones sexuales ?</label>
                  <div class="form-check">
          <?php
          if ($optradio == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input ha-tenido-relacion-sex" type="radio" <?= $checked ?> name="<?= $idSsr?>_optradio" id="<?= $idSsr?>_optradio1" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_optradio1">
            Si
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($optradio == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input ha-tenido-relacion-sex" type="radio" <?= $checked ?> name="<?= $idSsr?>_optradio" id="<?= $idSsr?>_optradio2" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_optradio2">
            No
          </label>
        </div>
                </div>
				
                <div class="col-md-3 disabled-all-fields-ha-tenido-re-sex">
                 	<label class="form-label">Edad de inicio de la vida sexual activa </label>
        <input type="number" class="form-control txt-inp-ssr"  id="<?= $idSsr?>_edad_ssr" min="1" value="<?= $edad ?>">
                </div>
                <div class="col-md-3 disabled-all-fields-ha-tenido-re-sex">
                 <label class="form-label">Tiene vida sexuale actual ?</label>
       
        <div class="form-check">
          <?php
          if ($sexual == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_sexual" id="<?= $idSsr?>_sexual1" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_sexual1">
            Si
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($sexual == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          } ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_sexual" id="<?= $idSsr?>_sexual2" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_sexual2">
            No
          </label>
        </div>
                </div>
                <div class="col-md-3  disabled-all-fields-ha-tenido-re-sex">
				<label class="form-label" for="<?= $idSsr?>_floatingEmail">Número de parejas sexuales </label>
                  
                 <input type="number" class="form-control txt-inp-ssr" id="<?= $idSsr?>_numero" min="1" value="<?= $numero ?>">
				   
                </div>
                <div class="col-md-3  disabled-all-fields-ha-tenido-re-sex">
                     <?php
        $sexo_pareja_options = array("Seleccionar", "Masculino", "Femenina", "Otros");

        ?>
        <div class="form-floating mb-3">
          <select class="form-select" id="<?= $idSsr?>_pareja" aria-label="State">
            <?php
            foreach ($sexo_pareja_options as $sexo_pareja_option) {
              if ($pareja == $sexo_pareja_option) {
                $selected = "selected";
              } else {
                $selected = "";
              }
              echo "<option $selected>$sexo_pareja_option</option>";
            }

            ?>
          </select>
          <label for="<?= $idSsr?>_pareja" class="form-label">Sexo de la pareja actual:</label>
        </div>
                </div>
                <div class="col-md-4  disabled-all-fields-ha-tenido-re-sex">
                   <div class="form-floating mb-3">
          <select class="form-select" id="<?= $idSsr?>_califica" >
            <?php
			 $sexual_life_qualities = array("Seleccionar", "Bueno", "Regular", "Mala"); 
            foreach ($sexual_life_qualities as $sexual_life_quality) {
              if ($califica == $sexual_life_quality) {
                $selected = "selected";
              } else {
                $selected = "";
              }
              echo "<option $selected>$sexual_life_quality</option>";
            }

            ?>

          </select>
          <label for="<?= $idSsr?>_califica">Como califica su vida sexual?</label>
        </div>
                </div>
				
				      <div class="col-md-4  disabled-all-fields-ha-tenido-re-sex">
        <label class="form-label">Ha tenido relaciones sexuales con personas de su mismo sexo ?</label>
        <div class="form-check form-check-inline">
          <?php
          if ($sexual2 == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr ?>_sexual2" id="<?= $idSsr ?>_sexual21" value="Si">
          <label class="form-check-label" for="<?= $idSsr ?>_sexual21">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($sexual2 == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr ?>_sexual2" id="<?= $idSsr ?>_sexual22" value="No">
          <label class="form-check-label" for="<?= $idSsr ?>_sexual22">
            No
          </label>
        </div>

      </div>
                <div class="col-md-9  disabled-all-fields-ha-tenido-re-sex">
                 <div class="form-floating">
          <textarea class="form-control txt-ares-ssr" placeholder="Como califica su vida sexua" id="<?= $idSsr?>_califica_text" style="height:100px"><?= $califica_text ?></textarea>
          <label for="<?= $idSsr?>_califica_text">Decir más de su vida sexual</label>
        </div>
                </div>
            
              </form>
  </div>
  </div>
	</div>
	
	
	
	 <div class="col-lg-12">
	  <div class="card">
  <div class="card-body">
  <h5 class="card-title">Ciclo ovárico</h5>

   <form class="row g-4">
   <div class="col-md-2">
   
   
   <label class="form-label">Menarquia</label>
   
   
   <div class="input-group ">
               <input class="form-control" type="text" id="<?= $idSsr?>_menarquia" value="<?=$menarquia?>" />
               <span class="input-group-text">años</span>
              </div>
   

 </div>  
   
   
                <div class="col-md-3">
				 <label class="form-label">Ciclos menstruales</label>
        <div class="form-check">
          <?php
          if ($cliclo == "Regulares") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input ciclo-mens-action" type="radio" <?= $checked ?> name="<?= $idSsr?>_cliclo" id="<?= $idSsr?>_cliclo1" value="Regulares">
          <label class="form-check-label" for="<?= $idSsr?>_cliclo1">
            Regulares
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($cliclo == "Irregulares") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input ciclo-mens-action" type="radio" <?= $checked ?> name="<?= $idSsr?>_cliclo" id="<?= $idSsr?>_cliclo2" value="Irregulares">
          <label class="form-check-label" for="<?= $idSsr?>_cliclo2">
            Irregulares
          </label>
        </div>
</div>
<div class="col-md-3">
        <label for="<?= $idSsr?>_floatingName" class="form-label">Duración de sangrado menstrual en días:</label>

        <input type="number" value="<?= $dura_sang ?>" class="form-control txt-inp-ssr" id="<?= $idSsr?>_dura_sang">

             </div>
                <div class="col-md-4">
                   <label class="form-label">Cantidad de sangrado menstrual</label>
        <div class="form-check">
          <?php
          if ($cant_sang == "Normal") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_cant_sang" value="Normal" id="<?= $idSsr?>_cant_sang1">
          <label class="form-check-label" for="<?= $idSsr?>_cant_sang1">
            Normal
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($cant_sang == "Escaso") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_cant_sang" value="Escaso" id="<?= $idSsr?>_cant_sang2">
          <label class="form-check-label" for="<?= $idSsr?>_cant_sang2">
            Escaso
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($cant_sang == "Abudante") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_cant_sang" value="Abudante" id="<?= $idSsr?>_cant_sang3">
          <label class="form-check-label" for="<?= $idSsr?>_cant_sang3">
            Abudante
          </label>
        </div>
                </div>
              
                <div class="col-md-4">
                <label class="form-label">Fecha de última menstruación (FUM) </label>
        <div class="form-floating">
          <input type="date" value="<?= $fecha_ul_m ?>" class="form-control txt-inp-ssr fecha_ul_m" id="<?= $idSsr?>_fecha_ul_m" placeholder="seleccione fecha">
          <label for="<?= $idSsr?>_fecha_ul_m">Fecha de última menstruación (FUM)</label>
        </div>
		<div  id="<?= $idSsr?>_fecha-ovulacion"></div>

                </div>
                <div class="col-md-4">
              <label class="col-sm-12 col-form-label">Menopáusica</label>
        <div class="form-check form-check-inline">
          <?php
          if ($menaop == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_menaop" name="<?= $idSsr?>_menaop" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_exampleRadios1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($menaop == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_menaop" name="<?= $idSsr?>_menaop" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_exampleRadios2">
            No
          </label>
        </div>
                </div>
              <div class="col-md-4">
        <label class="col-sm-12 col-form-label">Dismenorrea</label>
        <div class="form-check form-check-inline">
          <?php
          if ($dismeno == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_dismeno" value="No" id="<?= $idSsr?>_dismeno1">
          <label class="form-check-label" for="<?= $idSsr?>_dismeno1">
            No
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($dismeno == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> name="<?= $idSsr?>_dismeno" value="Si" id="<?= $idSsr?>_dismeno2">
          <label class="form-check-label" for="<?= $idSsr?>_dismeno2">
            Si
          </label>
        </div>
                </div>
              
              
              </form>
  
  </div>
  </div>
	</div>
	
	
	
	
	
	
	
	
	
	
	 <div class="col-lg-12">
	  <div class="card">
  <div class="card-body">
  <h5 class="card-title">Gestaciones</h5>


  
   <form class="row g-4">
                <div class="col-12">
				 <div class="d-flex flex-row">
		   <div class="m-1 flex-fill" >
              <div class="input-group ">
                <span class="input-group-text">P</span>
                <input type="text" value="<?= $p ?>" class="form-control totgen txt-inp-ssr" id="<?= $idSsr?>_p">
              </div>
               </div>
            <div class="m-1 flex-fill" >
              <div class="input-group ">
                <span class="input-group-text">A</span>
                <input type="number" value="<?= $a ?>" class="form-control totgen txt-inp-ssr" id="<?= $idSsr?>_a">
              </div>
              </div>
            <div class="m-1 flex-fill" >
              <div class="input-group ">
                <span class="input-group-text">C</span>
                <input type="number" value="<?= $c ?>" class="form-control totgen txt-inp-ssr" id="<?= $idSsr?>_c">
              </div>
                   </div>
            <div class="m-1 flex-fill" >
              <div class="input-group ">
                <span class="input-group-text">E</span>
                <input type="number" value="<?= $e ?>" class="form-control totgen txt-inp-ssr" id="<?= $idSsr?>_e">
              </div>
              </div>
            <div class="m-1 flex-fill" >
			   <div class="input-group ">
			    <span class="input-group-text">Total</span>
          <input type="number" value="<?= $totalGest ?>" class="form-control txt-inp-ssr totalGest" id="<?= $idSsr?>_totalGest">
         
        </div>
		</div>	 
		 
      
          </div>
   </div>
         <div class="col-md-4">
        <label class="form-label">Complicaciones durante el embarazo</label>
        <div class="form-check">
          <?php
          if ($complica_dur == "No") {
            $checked = "checked";
            $_complica_dur_show = "";
          } else {
            $checked = "";
            $_complica_dur_show = "display:none";
          }
          ?>
          <input class="form-check-input complication-emb-action" type="radio" <?= $checked ?> id="<?= $idSsr?>_complica_dur1" name="<?= $idSsr?>_complica_dur" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_complica_dur1">
            No
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($complica_dur == "Si") {
            $checked = "checked";
            $_complica_dur_show = "";
          } else {
            $checked = "";
            $_complica_dur_show = "display:none";
          }
          ?>
          <input class="form-check-input complication-emb-action" type="radio" <?= $checked ?> id="<?= $idSsr?>_complica_dur2" name="<?= $idSsr?>_complica_dur" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_complica_dur2">
            Si
          </label>
        </div>

        <div class="form-floating complica_dur_show"  style="<?= $_complica_dur_show ?>">
          <input type="text" class="form-control txt-inp-ssr" id="<?= $idSsr?>_complica_dur_text" placeholder="Descripción" value="<?= $complica_dur_text ?>">
          <label for="<?= $idSsr?>_complica_dur_text">Descripción</label>
        </div>

      </div>       
              
             <div class="col-md-4">
        <label class="form-label">Complicaciones Partos/Cesarea</label>
        <div class="form-check">
          <?php
          if ($complica == "Si") {
            $checked = "checked";
			$showCpC="";
          } else {
            $checked = "";
			$showCpC="style='display:none'";
          }
          ?>
          <input class="form-check-input complicassr-option" type="radio" <?= $checked ?> id="<?= $idSsr?>_complicapc_ssr1" name="<?= $idSsr?>_complicapc_ssr" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_complicapc_ssr1">
            Si
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($complica == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input complicassr-option" type="radio" <?= $checked ?> id="<?= $idSsr?>_complicapc_ssr2" name="<?= $idSsr?>_complicapc_ssr" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_complicapc_ssr2">
            No
          </label>
        </div>

        <div class="form-floating show-complica-text"  <?=$showCpC?>>
          <input type="text" value="<?= $complica_text ?>" class="form-control txt-inp-ssr complica_text" id="<?= $idSsr?>_complica_text" placeholder="Descripción">
          <label for="<?= $idSsr?>_complica_text">Descripción</label>
        </div>
      </div> 

<div class="col-md-4">
        <label class="col-sm-12 col-form-label">En caso de nuligesta, ha sido por:</label>
        <div class="form-check">
          <?php
		  
          if ($nuligesta == "No ha iniciado vida sexual activa") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_nuligesta1" name="<?= $idSsr?>_nuligesta" value="No ha iniciado vida sexual activa">
          <label class="form-check-label" for="<?= $idSsr?>_nuligesta1">
            No ha iniciado vida sexual activa
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($nuligesta == "Propia elección") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_nuligesta2" name="<?= $idSsr?>_nuligesta" value="Propia elección">
          <label class="form-check-label" for="<?= $idSsr?>_nuligesta2">
            Propia elección
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($nuligesta == "No ha podido embarazarse") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_nuligesta3" name="<?= $idSsr?>_nuligesta" value="No ha podido embarazarse">
          <label class="form-check-label" for="<?= $idSsr?>_nuligesta3">
            No ha podido embarazarse
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($nuligesta == "No ha podido conservar los embarazos") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>

          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_nuligesta" name="<?= $idSsr?>_nuligesta" value="No ha podido conservar los embarazos">
          <label class="form-check-label" for="<?= $idSsr?>_nuligesta4">
            No ha podido conservar los embarazos
          </label>
        </div>
      </div>	  
              </form>
  
  </div>
  </div>
	</div>
	
	
	
		 <div class="col-lg-12">
	  <div class="card">
  <div class="card-body">
  <h5 class="card-title">ITS (Infección de Transmisión Sexual)</h5>


  
   <form class="row g-4">
                <div class="col-md-4">
		 
        <label class="form-label"> Infección de Transmisión Sexual</label>
        <div class="form-check ">
          <?php if ($infec_tran == "No") {
            $checked = "checked";
            $show_infection_options = 'display:none';
          } else {
            $checked = "";
            $show_infection_options = '';
          }
          ?>
          <input class="form-check-input infec-trans" type="radio" <?= $checked ?> name="<?= $idSsr?>_infec_tran" id="<?= $idSsr?>_infec_tran1" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_infec_tran1">
            No
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($infec_tran == "Si") {
            $checked = "checked";
            $show_infection_options = "";
            $txt_p = '';
          } else {
            $checked = "";
            $show_infection_options = 'display:none';
          }
          ?>
          <input class="form-check-input infec-trans" type="radio" <?= $checked ?> name="<?= $idSsr?>_infec_tran" id="<?= $idSsr?>_infec_tran2" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_infec_tran2">
            Si
          </label>
        </div>
        <div class="show-infection-options" style="<?= $show_infection_options ?>">
          <div class="form-check">
            <?php
            if ($infeccion1 == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input unchecked-inf-opt" <?= $checked ?> type="checkbox" name="<?= $idSsr?>_sifilis" id="<?= $idSsr?>_sifilis1">
            <label class="form-check-label" for="<?= $idSsr?>_sifilis1">
              Sífilis
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($infeccion2 == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input unchecked-inf-opt" <?= $checked ?> type="checkbox" name="<?= $idSsr?>_gonorrea" id="<?= $idSsr?>_gonorrea1">
            <label class="form-check-label" for="<?= $idSsr?>_gonorrea1">
              Gonorrea
            </label>
          </div>
          <div class="form-check">
            <?php
            if ($infeccion3 == 0) {
              $checked = "";
            } else {
              $checked = "checked";
            }
            ?>
            <input class="form-check-input unchecked-inf-opt" <?= $checked ?> type="checkbox" name="<?= $idSsr?>_clamidia" id="<?= $idSsr?>_clamidia">
            <label class="form-check-label" for="<?= $idSsr?>_clamidia1">
              Clamidia
            </label>
           
          </div>
		   <input id="<?= $idSsr?>_otro_infection" style="width:30%" value='<?= $otro_infeccion1 ?>' placeholder="Otros" class="form-control" />
        </div>
     
      
</div>
  <div class="col-md-6">
        <label class="form-label">Se ha realizado prueba VIH?</label>
        <div class="form-check">
          <?php
          if ($prueba_vih == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input prueba_vih_option" type="radio" <?= $checked ?> id="<?= $idSsr ?>_prueba_vih1" name="<?= $idSsr ?>_prueba_vih" value="Si">
          <label class="form-check-label" for="<?= $idSsr ?>_prueba_vih1">
            Si
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($prueba_vih == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input prueba_vih_option" type="radio" <?= $checked ?> id="<?= $idSsr ?>_prueba_vih2" name="<?= $idSsr ?>_prueba_vih" value="No">
          <label class="form-check-label" for="<?= $idSsr ?>_prueba_vih2">
            No
          </label>
		
        </div>
      <div class="form-floating prueba_vih_show"  style="display:none">
          <input type="text" value="<?= $prueba_vih_resultado ?>" class="form-control txt-inp-ssr prueba_vih_resultado" id="<?= $idSsr ?>_prueba_vih_resultado" placeholder="Resultado">
          <label for="<?= $idSsr ?>_prueba_vih_resultado">Resultados</label>
        </div>
       
      </div>
   </form>
  
  </div>
  </div>
	</div>
	
	
	 <div class="col-lg-12">
	  <div class="card">
  <div class="card-body">
  <h5 class="card-title">Tamisaje y resulstados diagnósticos</h5>


  
   <form class="row g-4">
                <div class="col-md-4">
		 
        <label class="form-label">Fecha de la última mamografía</label>
        <div class="form-check">
          <?php
          if ($fecha_ul_mama == "Nunca") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-mama" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_mama1" name="<?= $idSsr?>_fecha_ul_mama" value="Nunca">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_mama1">
            Nunca
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_mama == "Menos de un año") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-mama" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_mama2" name="<?= $idSsr?>_fecha_ul_mama" value="Menos de un año">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_mama2">
            Menos de un año
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_mama == "Entre uno a tres años") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>

          <input class="form-check-input fecha-ul-mama" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_mama3" name="<?= $idSsr?>_fecha_ul_mama" value="Entre uno a tres años">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_mama3">
            Entre uno a tres años
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_mama == "Mas de tres años") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-mama" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_mama4" name="<?= $idSsr?>_fecha_ul_mama" value="Mas de tres años">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_mama4">
            Más de tres años
          </label>
        </div>
     
      
</div>

          <div class="col-md-8">
        <label class="form-label">Se realiza autoexamen mamario</label>
        <div class="form-check form-check-inline">
          <?php
          if ($realiza_auto == "Si") {
            $checked = "checked";
            $show_autoexam_mamario = "";
          } else {
            $checked = "";
            $show_autoexam_mamario = "display:none";
          }
          ?>
          <input class="form-check-input autoexam-mamario" type="radio" <?= $checked ?> id="<?= $idSsr?>_realiza_auto1" name="<?= $idSsr?>_realiza_auto" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_realiza_auto1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($realiza_auto == "No") {
            $checked = "checked";
            $show_autoexam_mamario = "display:none";
          } else {
            $checked = "";
            $show_autoexam_mamario = "";
          }
          ?>
          <input class="form-check-input autoexam-mamario" type="radio" <?= $checked ?> id="<?= $idSsr?>_realiza_auto2" name="<?= $idSsr?>_realiza_auto" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_realiza_auto2">
            No
          </label>
        </div>
        <div class="form-floating show-autoexam-mamario"  style="<?= $show_autoexam_mamario ?>">
          <textarea  class="form-control txt-inp-ssr realiza_auto_text" id="<?= $idSsr?>_realiza_auto_text" placeholder="Descripción" style="height:100px"><?= $realiza_auto_text ?></textarea>
          <label for="<?= $idSsr?>_realiza_auto_text">Descripción</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="form-label">Antecedentes de papanicolaou resultados alterados o anormales</label>
        <div class="form-check">
          <?php
          if ($ant_pap_re == "No") {
            $checked = "checked";
            $show_ant_pap_res_al = "display:none";
          } else {
            $checked = "";
            $show_ant_pap_res_al = "";
          }
          ?>
          <input class="form-check-input ant-pap-res-al" type="radio" <?= $checked ?> name="<?= $idSsr?>_ant_pap_re" id="<?= $idSsr?>_ant_pap_re1" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_ant_pap_re1">
            No
          </label>
        </div>
        <div class="form-check">
          <?php if ($ant_pap_re == "Si") {
            $checked = "checked";
            $show_ant_pap_res_al = "";
          } else {
            $checked = "";
            $show_ant_pap_res_al = "display:none";
          }
          ?>
          <input class="form-check-input ant-pap-res-al" type="radio" <?= $checked ?> name="<?= $idSsr?>_ant_pap_re" id="<?= $idSsr?>_ant_pap_re2" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_ant_pap_re2">
            Si
          </label>
        </div>

        <div class="form-floating show-ant-pap-res-al" style="<?= $show_ant_pap_res_al ?>">
          <input type="text" value="<?= $ant_pap_re_text ?>" class="form-control txt-inp-ssr ant_pap_re_text" id="<?= $idSsr?>_ant_pap_re_text" placeholder="Descripción">
          <label for="<?= $idSsr?>_ant_pap_re_text">Descripción</label>
        </div>
      </div>
	  
	     <div class="col-md-6">
        <label class="form-label">Fecha de última papanicolaou</label>
        <div class="form-check">
          <?php
          if ($fecha_ul_pap == "Nunca") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-pap" type="radio" <?= $checked ?> name="<?= $idSsr?>_fecha_ul_pap" id="<?= $idSsr?>_fecha_ul_pap1" value="Nunca">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_pap1">
            Nunca
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_pap == "Menos de un año") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-pap" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_pap2" name="<?= $idSsr?>_fecha_ul_pap" value="Menos de un año">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_pap2">
            Menos de un año
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_pap == "Entre uno a tres años") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input  fecha-ul-pap" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_pap3" name="<?= $idSsr?>_fecha_ul_pap" value="Entre uno a tres años">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_pap3">
            Entre uno a tres años
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($fecha_ul_pap == "Mas de tres años") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input fecha-ul-pap" type="radio" <?= $checked ?> id="<?= $idSsr?>_fecha_ul_pap4" name="<?= $idSsr?>_fecha_ul_pap" value="Mas de tres años">
          <label class="form-check-label" for="<?= $idSsr?>_fecha_ul_pap4">
            Más de tres años
          </label>
        </div>
      </div>
              </form>
  
  </div>
  </div>
	</div>
	
	
	
		 <div class="col-lg-12">
	  <div class="card">
  <div class="card-body">
  <h5 class="card-title">Planificación familiar</h5>


  
   <form class="row g-4">
          <div class="col-md-6">
        <label class="form-label">Utilizó algún método de planificación familiar?</label>
        <div class="form-check form-check-inline">
          <?php
          if ($planif == "Si") {
            $checked = "checked";
            $planif_met_div = '';
          } else {
            $checked = "";
            $planif_met_div = 'display:none';
          }
          ?>
          <input class="form-check-input planif-method" type="radio" <?= $checked ?> name="<?= $idSsr?>_planif" id="<?= $idSsr?>_planif1" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_planif1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php
          if ($planif == "No") {
            $checked = "checked";
            $planif_met_div = 'display:none';
          } else {
            $checked = "";
            $planif_met_div = '';
          }
          ?>
          <input class="form-check-input planif-method" type="radio" <?= $checked ?> name="<?= $idSsr?>_planif" id="<?= $idSsr?>_planif2" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_planif2">
            No
          </label>
        </div>
        <div class="form-floating mb-3" style="<?= $planif_met_div ?>" id="<?= $idSsr?>_planif-method-div">
          <?php
          $planif_method_options = array(
            "Seleccionar", "Condón masculino", "Condón femenino", "Pildoras anticonceptivas",
            "Anillo Hormonal", "DIU", "Injeccion Anticonceptivas", "Ligadura de trompas", "Implante", "Marcha atrás", "Calculadora de día fertiles",
            "Ducha vaginal", "Parche anticonceptivo", "Diafragma"
          );

          ?>


          <select class="form-select" id="<?= $idSsr?>_planif_text" aria-label="State">
            <?php
            foreach ($planif_method_options as $planif_method_option) {
              if ($planif_text == $planif_method_option) {
                $selected = "selected";
              } else {
                $selected = "";
              }
              echo "<option $selected>$planif_method_option</option>";
            }

            ?>
          </select>
          <label for="<?= $idSsr?>_planif-method-text">Cuál es ?</label>
        </div>

      </div>

      
   
	   <div class="col-md-6">
        <label class="form-label">Quiére embarazarse ?</label>
        <div class="form-check form-check-inline">
          <?php
          if ($embara == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_embara1" name="<?= $idSsr?>_embara" value="Si">
          <label class="form-check-label" for="<?= $idSsr?>_embara1">
            Si
          </label>
        </div>
        <div class="form-check form-check-inline">
          <?php if ($embara == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>

          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr?>_embara2" name="<?= $idSsr?>_embara" value="No">
          <label class="form-check-label" for="<?= $idSsr?>_embara2">
            No
          </label>
        </div>

      </div>
	  
	   <!--  <div class="col-md-6">
        <label class="form-label">Utilizó preservativo en su última relación sexual?</label>
        <div class="form-check">
          <?php
          if ($utilizo == "Si") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr ?>_utilizo1" name="<?= $idSsr ?>_utilizo" value="Si">
          <label class="form-check-label" for="<?= $idSsr ?>_utilizo1">
            Si
          </label>
        </div>
        <div class="form-check">
          <?php
          if ($utilizo == "No") {
            $checked = "checked";
          } else {
            $checked = "";
          }
          ?>
          <input class="form-check-input" type="radio" <?= $checked ?> id="<?= $idSsr ?>_utilizo2" name="<?= $idSsr ?>_utilizo" value="No">
          <label class="form-check-label" for="<?= $idSsr ?>_utilizo2">
            No
          </label>
        </div>

      </div>-->
              </form>
  
  </div>
  </div>
	</div>
	
	
	</div>


<?php if ($ssr_data == 1) { ?>

  <div class="float-end">

    <button type="button" class="btn btn-primary" id="resetFormSsr">Nuevo</button>
    <button type="button" class="btn btn-success" id="saveEditSsr">Guardar </button>
    <span id="alert_placeholder_ssr" style="position:absolute; " class="p-2"></span>
 
  </div>
  <br /> <br />
<?php } ?>
<input id="ssr-form-inputs" type="hidden" value="<?= $idSsr ?>" />
<input id="ssr-form-radio" type="hidden" value="<?= $idSsr ?>" />
<input id="idssr" type="hidden" value="<?= $idSsr ?>" />

<?php 
$datassr = array(
'ssrup_time'=>$up_time,
'ssrin_time' =>$in_time,
'ssrin_by'=>$in_by,
'ssrup_by' => $up_by
);

$this->session->set_userdata($datassr);

 ?>