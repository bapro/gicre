<input id="data_eva_cardio__" type="hidden" value="<?=$data_eva_cardio?>" />
<?php

if ($data_eva_cardio == 0) {
	
	$card_asma_bronquial='';
	$card_tuberculosis='';
	$card_neumonia='';
	$card_epoc='';
	$card_hta='';
	$card_lam ='';
	
	
  $card_eva_pre_quir = "";
  $card_eva_sin_act = "";
  $card_eva_med_act = '';
  $card_eva_hiper_art = "";
  $card_eva_otro = "";
  $card_eva_riesgos = "";
  $card_eva_diag_obs_rec = '';
  $card_eva_rad_to = '';
  $card_eva_lab = '';
  $card_eva_electrocar = '';
  $idEvaC = 0;
  $card_eva_riesgos_me = '';
  $card_eva_riesgos_ma = '';
  $card_eva_riesgos_int = '';
  $card_eva_riesgos_me_txt = '';
  $card_eva_riesgos_ma_txt = '';
  $card_eva_riesgos_int_txt = '';
  $up_time = date("Y-m-d H:i:s");
  $in_time = date("Y-m-d H:i:s");
  $print = '';
  $up_by = $id_user;
  $in_by = $id_user;
  $show_menor = "display:none";
  $show_mayor = "display:none";
  $show_int = "display:none";
  [$result_centro_medicos]= $this->create_forms->getCentroAndSeguroByPerfil(0);
} else {
  foreach ($query_eva_card as $row_evc)
    $card_eva_pre_quir = $row_evc->card_eva_pre_quir;
  $card_eva_sin_act = $row_evc->card_eva_sin_act;
  $card_eva_med_act = $row_evc->card_eva_med_act;
  $card_eva_hiper_art = $row_evc->card_eva_hiper_art;
  $card_eva_otro = $row_evc->card_eva_otro;
  $card_eva_lab = $row_evc->card_eva_lab;
  $card_eva_diag_obs_rec = $row_evc->card_eva_diag_obs_rec;
  $card_eva_rad_to = $row_evc->card_eva_rad_to;
  $card_eva_riesgos = $row_evc->card_eva_riesgos;
  $card_eva_electrocar = $row_evc->card_eva_electrocar;
  $card_eva_riesgos_me = $row_evc->card_eva_riesgos_me;
  $card_eva_riesgos_ma = $row_evc->card_eva_riesgos_ma;
  $card_eva_riesgos_int = $row_evc->card_eva_riesgos_int;
  $card_eva_riesgos_me_txt = $row_evc->card_eva_riesgos_me_txt;

  if ($card_eva_riesgos_me_txt == "") {
    $show_menor = "display:none";
  } else {
    $show_menor = "";
  }

  $card_eva_riesgos_ma_txt = $row_evc->card_eva_riesgos_ma_txt;

  if ($card_eva_riesgos_ma_txt == "") {
    $show_mayor = "display:none";
  } else {
    $show_mayor = "";
  }

  $card_eva_riesgos_int_txt = $row_evc->card_eva_riesgos_int_txt;

  if ($card_eva_riesgos_int_txt == "") {
    $show_int = "display:none";
  } else {
    $show_int = "";
  }
  $in_by = $row_evc->inserted_by;
  $up_by = $row_evc->inserted_by;
  $in_time = $row_evc->inserted_time;
  $up_time = date("Y-m-d H:i:s");

  $idEvaC = $row_evc->id;
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
      <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$row_evc->id_patient.'/'.$idEvaC.'/1/'.$row_evc->id_centro.'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$row_evc->id_patient.'/'.$idEvaC.'/0/'.$row_evc->id_centro.'" target="_blank">con la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$row_evc->id_patient.'/'.$idEvaC.'/1/'.$row_evc->id_centro.'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$row_evc->id_patient.'/'.$idEvaC.'/0/'.$row_evc->id_centro.'" target="_blank">con la foto</a>
       </li>
  </ul>
  </div>
';

[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($row_evc->id_centro);
$result_centro_medicos='<option value="' . $row_evc->id_centro.'" >' . $get_centro_info_by_id['name'] . '</option>';
  $params2 = array('table' => 'eva_car_patient', 'id' => $idEvaC);
  echo $this->user_register_info->get_operation_info($params2);
}

  $data['data_eva_cardio']=$idEvaC; 
?>
  <div id="result-error"></div>

<input type="hidden" id='doNotSaveEvaCard'  />
	
<label>Centro médico</label>
				
				<select class="form-select form-select3"  id="id_centro_evaCard" aria-label="Centro médico" >
				
				<?php 
				echo $result_centro_medicos;
				?>
				</select>
				<br/>
				
				
<div class="accordion accordion-flush" id="accordionFlushExampleEvCard">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
       ANTECEDENTES PERSONALES
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExampleEvCard">
      <div class="accordion-body">
	  <?php $this->load->view('clinical-history/cardiovascular-evaluation/ant-personales/index', $data);?>
	  </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
       HABITOS TOXICOS
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExampleEvCard">
      <div class="accordion-body">
	  <?php	$this->load->view('clinical-history/cardiovascular-evaluation/habitos-toxicos/index', $data); ?>
	  </div>
    </div>
  </div>
  
   <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFourth">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFourth" aria-expanded="true" aria-controls="flush-collapseFourth">
        EXPLORACION FISICA
      </button>
    </h2>
    <div id="flush-collapseFourth" class="accordion-collapse" aria-labelledby="flush-headingFourth" data-bs-parent="#accordionFlushExampleEvCard">
      <div class="accordion-body">

<?php $this->load->view('clinical-history/cardiovascular-evaluation/vital-signals/index', $data); 
		$this->load->view('clinical-history/cardiovascular-evaluation/examen-fisico/index', $data); ?>
	  </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
         RESULTADO DE EXAMENES
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExampleEvCard">
      <div class="accordion-body">
	  <?php $this->load->view('clinical-history/cardiovascular-evaluation/exams-result/form', $data);  ?>

	  </div>
    </div>
  </div>
  
  
   
  
</div>


	<div class="row">
<div class="col-lg-12">
<?php 
if($this->session->userdata('user_perfil') !="Admin"){
?>
<hr>
<div class="text-center">

<?php if ($idEvaC > 0) { ?>
<button type="button" class="btn btn-primary btn-lg m-1" id="resetFormEvaCardio">Nuevo</button>

<?php echo $print; ?>
<?php } else {
echo '<button type="button" class="btn btn-success btn-lg m-1" id="saveEditEvaCardioData" >Guardar </button><br/> <br/><div id="alert_placeholder_eva_cardio" ></div> ';
	
}?>
<span id="show-print-eva-cardio"> </span>


</div>
<?php 
}
?>
	
   <input id="id_eva_cardiovacular" type="hidden" value="<?= $idEvaC ?>" />
      <input type="hidden" id="eva_card_up_time" value="<?= $up_time ?>" />
      <input type="hidden" id="eva_card_in_time" value="<?= $in_time ?>" />
      <input type="hidden" id="eva_card_in_by" value="<?= $in_by ?>" />
      <input type="hidden" id="eva_card_up_by" value="<?= $up_by ?>" />
 
	  </div>
	
  </div>


