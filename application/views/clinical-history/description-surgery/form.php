<style>
    header {
        color: #38a7bb;
        font-size: 27px;
        font-weight: 600;
        text-align: center;
    }
</style>

<section class="section">
<div id="save-quirurgica-desc"></div>
 
        <div class="row">
            <?php
			if ($desc_surgery_data == 1) {
                foreach ($query_des_surg as $row)
                    $diag_pre_qui = $row->diag_pre_qui;
                $pro_post = $row->pro_post;
                $diag_post_qui = $row->diag_post_qui;
                $anestesia = $row->anestesia;
                $incision = $row->incision;
                $cirugia_programada = $row->cirugia_programada;
                $cirugia_realizada = $row->cirugia_realizada;
                $hallasgo = $row->hallasgo;
                $desc_proced = $row->desc_proced;
                $perdida_sanguinea = $row->perdida_sanguinea;
                $compresa = $row->compresa;
                $gasas = $row->gasas;
                $drenes = $row->drenes;
                $transfusion = $row->transfusion;
                $unids_transfusion = $row->unids_transfusion;
                $condicion_paciente = $row->condicion_paciente;
                $traslado = $row->traslado;
                $hora_ini = $row->hora_ini;
                $hora_fin = $row->hora_fin;
                $tiempo_quirurgico = $row->tiempo_quirurgico;
                $cirujano = $row->cirujano;
                $ajudante = $row->ajudante;
                $ajudante_enf = $row->ajudante_enf;
                $muestras_patologia = $row->muestras_patologia;
                $histopatologico = $row->histopatologico;
                $centro = $row->centro;
                $id = $row->id;
                $in_by = $row->inserted_by;
                $up_by = $this->session->userdata('user_id');
                $in_time = $row->inserted_time;
                $up_time = date("Y-m-d H:i:s");
                $params2 = array('table' => 'hc_quirurgica', 'id' => $id);
                echo $this->user_register_info->get_operation_info($params2);
				
				 $print = '
       <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
  
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/print_quirurgica/'.$idpatient.'/'.$id.'/1/'.$centro.'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/print_quirurgica/'.$idpatient.'/'.$id.'/0/'.$centro.'" target="_blank">sin la foto</a>
       </li>
       
  </ul>
  </div>
';
		[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($centro);
			$result_centro_medicos='<option value="' . $centro.'" >' . $get_centro_info_by_id['name'] . '</option>';
			} else {
                $id = 0;
                $up_time = date("Y-m-d H:i:s");
                $in_time = date("Y-m-d H:i:s");
                $print = '';
                $up_by = $this->session->userdata('user_id');
                $in_by = $this->session->userdata('user_id');
                $diag_pre_qui = "";
                $pro_post = "";
                $diag_post_qui = "";
                $anestesia = "";
                $incision = "";
                $cirugia_programada = "";
                $cirugia_realizada = "";
                $hallasgo = "";
                $desc_proced = "";
                $perdida_sanguinea = "";
                $compresa = "";
                $gasas = "";
                $drenes = "";
                $transfusion = "";
                $unids_transfusion = "";
                $condicion_paciente = "";
                $traslado = "";
                $hora_ini = "";
                $hora_fin = "";
                $tiempo_quirurgico = "";
                $cirujano = "";
                $ajudante = "";
                $ajudante_enf = "";
                $muestras_patologia = "";
                $histopatologico = "";
			
                
            } 
			
			
			?>
                 
				<div class="col-lg-8">
				<div class=" mt-3 mb-3">

				<label class="form-label" for="centro_med_q_id"><span class="text-danger">*</span> Centro médico</label>
				<select class="form-select form-select3"  id="centro_med_q_id" aria-label="Centro médico" >
				<?php 
				echo $result_centro_medicos;
				?>
				</select>
				


				</div>
				</div>
			
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Diagnostico Pre-Quirurgico:" name="diag_pre_qui" id="diag_pre_qui" style="height:150px"><?= $diag_pre_qui ?></textarea>
                            <label for="diag_pre_qui1">Diagnostico Pre-Quirurgico:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Diagnostico Post-Quirurgico:" name="diag_post_qui" id="diag_post_qui" style="height:150px"><?= $diag_post_qui ?></textarea>
                            <label for="diag_post_qui">Diagnostico Post-Quirurgico:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Anestesia" name="anestesia" id="anestesia" style="height:150px"><?= $anestesia ?></textarea>
                            <label for="anestesia">Anestesia</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Tipo de incision" name="incision" id="incision" style="height:150px"><?= $incision ?></textarea>
                            <label for="incision">Tipo de incision</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Cirugía Programada" name="cirugia_programada" id="cirugia_programada" style="height:150px"><?= $cirugia_programada ?></textarea>
                            <label for="cirugia_programada">Cirugía programada</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Cirugía realizada" name="cirugia_realizada" id="cirugia_realizada" style="height:150px"><?= $cirugia_realizada ?></textarea>
                            <label for="cirugia_realizada">Cirugía realizada</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Hallazgo" name="hallasgo" id="hallasgo" style="height:150px"><?= $hallasgo ?></textarea>
                            <label for="hallasgo">Hallazgo</label>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <br />
                        <div class="row g-3 mb-3">

                            <div class="col-md-12">
                                <div class="input-group ">
								<span class="input-group-text" id="basic-addon1">Perdida Sanguinea</span>
                                    <input type="text" class="form-control" name="perdida_sanguinea" id="perdida_sanguinea" value="<?= $perdida_sanguinea ?>">
                                    <span class="input-group-text">CC</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group ">
								 <span class="input-group-text" > &#35; Compresas</span>
                                <input type="number" class="form-control" name="compresa" id="compresa" value="<?= $compresa ?>">
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group ">
									   <span class="input-group-text" >&#35; gasas</span>
                                    <input type="number" class="form-control" id="gasas" name="gasas" value="<?= $gasas ?>">
                              </div>
                            </div>
							<div class="col-md-12">
							 <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Drenes" name="drenes" id="drenes" value="<?= $drenes ?>">
                            <label for="drenes">Drenes</label>
                        </div>
						 </div>	
							
							
							 <div class="col-md-4 ">
                                <label>Transfusión</label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <?php
                                    if ($transfusion == "No") {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    } ?>
                                    <input type="radio" class="btn-check onchecked-trans" name="transfusion" id="transfusion1" autocomplete="off" value="No" <?= $checked ?>>
                                    <label class="btn btn-outline-secondary" for="transfusion1">No</label>
                                    <?php
                                    if ($transfusion == "Si") {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    } ?>
                                    <input type="radio" class="btn-check onchecked-trans" name="transfusion" id="transfusion2" autocomplete="off" value="Si" <?= $checked ?>>
                                    <label class="btn btn-outline-secondary" for="transfusion2">Si</label>

                                </div>

                            </div>


							<div class="col-md-6">

							<label for="unids_transfusion">Unids transfundidas</label>

							<input type="text" class="form-control"  name="unids_transfusion" id="unids_transfusion" value="<?= $unids_transfusion ?>">


							</div>
                            <div class="col-md-6">
                                <?php $patient_condtion_options = array("", "buena", "estable", "grave", "fallecido"); ?>
                               <label for="condicion_paciente1" >Condición del paciente</label>
                                    <select class="form-select" id="condicion_paciente1" name="condicion_paciente">
                                      
                                        <?php foreach ($patient_condtion_options as $patient_condtion_option) {
                                            if ($condicion_paciente == $patient_condtion_option) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo "<option $selected>$patient_condtion_option</option>";
                                        } ?>
                                    </select>
                               
                            </div>

                        <div class="col-5">
                      
                        <?php $traslado_options = array("", "sala", "recuperación", "UCI", "a su domicilio"); ?>
						  <label for="traslado1" >Traslado a</label>
                        <select class="form-select" id="traslado1" name="traslado">
                                <?php foreach ($traslado_options as $traslado_option) {
                                    if ($traslado == $traslado_option) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option $selected>$traslado_option</option>";
                                } ?>
                            </select>
                          
                         </div>
                       

                            <div class="col-5">
                                <label for="hora_ini1"> Inicio</label>
                                <input type="time" class="form-control hora_ini_desq" onchange="onTimeChangeDq('<?= $id ?>_hora_ini1')"  name="hora_ini" id="<?= $id ?>_hora_ini1" value="<?= $hora_ini ?>">
                            </div>
                            <div class="col-5">
                                <label for="hora_fin1"> Finalización</label>
                                <input type="time" class="form-control hora_fin_desq" onchange="onTimeChangeDq('<?= $id ?>_hora_fin1')" name="hora_fin" id="<?= $id ?>_hora_fin1" value="<?= $hora_fin ?>">


                            </div>
                            <div class="col-6">
                                <label for="tiempo_quirurgico1"> Tiempo quirurgico</label>
                                <input type="text" class="form-control tiempo_quirurgico_desc" id="<?= $id ?>_tiempo_quirurgico1" name="tiempo_quirurgico" value="<?= $tiempo_quirurgico ?>" style="pointer-events:none">

                            </div>
                       
                        <div class="form-floating mt-2">

                            <input type="text" class="form-control" placeholder="Cirujano" name="cirujano" id="cirujano1" value="<?= $cirujano ?>">
                            <label for="cirujano1">Cirujano</label>
                        </div>

                        <div class="form-floating mt-2">

                            <input type="text" class="form-control" placeholder="Ayudante(s)" name="ajudante" id="ajudante1" value="<?= $ajudante ?>">
                            <label for="ajudante1">Ayudante(s)</label>
                        </div>
                        <div class="form-floating mt-2">

                            <input type="text" class="form-control" placeholder="Ayudante(s) Enfemeria" name="ajudante_enf" id="ajudante_enf1" value="<?= $ajudante_enf ?>">
                            <label for="ajudante_enf1">Ayudante(s) Enfemeria</label>
                        </div>
                        <div class="form-floating mt-2">

                            <input type="text" class="form-control" placeholder="Muesta(s) Envida(s) a Patologia" name="muestras_patologia" id="muestras_patologia1" value="<?= $muestras_patologia ?>">
                            <label for="muestras_patologia1">Muesta(s) Envida(s) a Patologia</label>
                        </div>
                        <div class="form-floating mt-2">
                            <textarea class="form-control" placeholder="Gastable utilisado en sutura" name="histopatologico" id="histopatologico" style="height:150px"><?= $histopatologico ?></textarea>
                            <label for="histopatologico">Gastable Utilizado en Sutura</label>
                        </div>
                        
                        <div class="form-floating mt-2">
                            <textarea class="form-control" placeholder="Pronostico Post Quirurgico" name="pro_post" id="pro_post" style="height:150px"><?= $pro_post ?></textarea>
                            <label for="pro_post">Pronostico Post Quirurgico</label>
                        </div>
						<div class="form-floating mt-2">
                            <textarea class="form-control" placeholder="Descripción del procedimiento" name="desc_proced" id="desc_proced" style="height:200px"><?= $desc_proced ?></textarea>
                            <label for="desc_proced"><span class="text-danger">*</span> Descripción del Procedimiento</label>
                        </div>
                    </div>
					    </div>
                </div>
            </div>
<div class="row">
            <div class="col-lg-12">
			<div class="float-end">
			<?php 
			if($this->session->userdata('user_perfil') =="Medico"){
			?>

			<button type="button" class="btn btn-success btn-sm m-1" id="saveDesSurgery">Guardar </button>
			<?php if ($desc_surgery_data == 1) { ?>
			<button type="button" class="btn btn-primary btn-sm m-1" id="resetDesSurgery">Nuevo</button>

			<?php } ?>
			<span id="show-print-description_surgery"> </span>
			<span id="alert_placeholder_description_surgery"  style="position:absolute"></span> 
			<?php 
			}
			echo $print;
			?>   
			</div>

                <input type="hidden" id="desc_qui_up_time" value="<?= $up_time ?>" />
                <input type="hidden" id="desc_qui_in_time" value="<?= $in_time ?>" />
                <input type="hidden" id="desc_qui_in_by" value="<?= $in_by ?>" />
                <input type="hidden" id="desc_qui_up_by" value="<?= $up_by ?>" />
                <input type="hidden" id="id_desc_quir"  value="<?= $id ?>" />
				<input class="am_pm_hora_init" id="<?= $id ?>_hora-start-time" type="hidden" />
				<input class="am_pm_hora_fini" id="<?= $id ?>_hora-end-time" type="hidden" />
            </div>
        </div>
</div>


  
</section>

<script>

   var idDesQ=  document.getElementById('id_desc_quir').value;

        document.getElementById(idDesQ + "_hora_fin1").addEventListener("change", calHour);

        function toSeconds(time_str) {
            // Extract hours, minutes and seconds
            var parts = time_str.split(':');
            // compute  and return total seconds
            return parts[0] * 3600 + // an hour has 3600 seconds
                parts[1] * 60; // a minute has 60 seconds
            //+
            // parts[2]; // seconds
        }
	
        function calHour() {
	
            var a = document.getElementById(idDesQ + '_hora_ini1').value;
            var b = document.getElementById(idDesQ + '_hora_fin1').value;
	    
            var difference = Math.abs(toSeconds(a) - toSeconds(b));

            // format time differnece
            var result = [
                Math.floor(difference / 3600), // an hour has 3600 seconds
                Math.floor((difference % 3600) / 60) // a minute has 60 seconds
                //difference % 60
            ];
            // 0 padding and concatation
            result = result.map(function(v) {
                return v < 10 ? '0' + v : v;
            }).join(':');
            if (a == "" || b == "" || result == "NaN:NaN") {
                document.getElementById(idDesQ+'_tiempo_quirurgico1').value = "";
            } else {
                document.getElementById(idDesQ+'_tiempo_quirurgico1').value = result;
            }
			
			
        }
		
		
		


function onTimeChangeDq(inputId) {
	var inputEle = document.getElementById(inputId);
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  if(inputId==idDesQ+'_hora_ini1'){
document.getElementById(idDesQ+'_hora-start-time').value = meridian;
  }else{
 document.getElementById(idDesQ+'_hora-end-time').value = meridian;
  }
}
		
		

</script>




