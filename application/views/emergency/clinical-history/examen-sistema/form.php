<section class="section">
    <?php

    if ($sis_data == 0) {
        $sisneuro = '';
        $neurologico = '';
        $siscardio = '';
        $cardiova = '';
        $sist_uro = '';
        $urogenital = '';
        $sis_mu_e = '';
        $musculoes = '';
        $nervioso = '';
        $id_exam_sist = 0;
        $sist_resp = "";
        $linfatico = "";
        $respiratorio = "";
        $genitourinario = "";
        $digestivo = "";
        $sist_endo = "";
        $endocrino = '';
        $sist_rela = '';
        $otros_ex_sis = '';
        $dorsales = '';
        $sist_diges = '';
        $dorsalestext = '';
        $genitourinariotext = '';
        $linfaticotext = '';
        $nerviosostext = '';
		   $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
    } else {
        foreach ($query_sis as $row)
			$in_by = $row->inserted_by;
			$up_by = $this->session->userdata('user_id');
			$in_time = $row->inserted_time;
			$up_time = date("Y-m-d H:i:s");
            $sisneuro = $row->sisneuro;
        $sist_resp = $row->sist_resp;
        $neurologico = $row->neurologico;
        $dorsalestext = $row->dorsalestext;
        $sist_diges = $row->sist_diges;
        $siscardio = $row->siscardio;
        $cardiova = $row->cardiova;
        $sist_uro = $row->sist_uro;
        $urogenital = $row->urogenital;
        $nerviosostext = $row->nerviosostext;
        $sis_mu_e = $row->sis_mu_e;
        $linfaticotext = $row->linfaticotext;
        $musculoes = $row->musculoes;
        $nervioso = $row->nervioso;
        $linfatico = $row->linfatico;
        $respiratorio = $row->respiratorio;
        $genitourinario = $row->genitourinario;
        $digestivo = $row->digestivo;
        $genitourinariotext = $row->genitourinariotext;
        $sist_endo = $row->sist_endo;
        $endocrino = $row->endocrino;
        $sist_rela = $row->sist_rela;
        $otros_ex_sis = $row->otros_ex_sis;
        $dorsales = $row->dorsales;
        $id_exam_sist = $row->id;
        $params2 = array('table' => 'emerg_examen_sistema', 'id' => $id_exam_sist);
        echo $this->user_register_info_hospitalization->get_operation_info($params2);
    }
    ?>



    <div class="row">
        <div class="col-lg-12">


            <div class="card-body">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="sistema-all-deny">
				<label class="form-check-label" for="sistema-all-deny">
				<em>Todo Negado</em>
				</label>
				</div>
                <div class="accordion " id="accordionSistema">
                    <?php $sist_neu = $sisneuro != '' || $neurologico != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOneSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneSistema" aria-expanded="false" aria-controls="collapseOneSistema">
                                Sistema Neurológico <?= $sist_neu ?>
                            </button>
                        </h2>
                        <div id="collapseOneSistema" class="accordion-collapse collapse" aria-labelledby="headingOneSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sisneuro ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sisneuros" placeholder="Sistema neurológico">
                                        <label for=" <?= $id_exam_sist ?>_sisneuros"> Sistema Neurológico</label>
                                        <div id="suggestion-sistNeuro-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_neurologicos" style="height: 100px"><?= $neurologico ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_neurologicos">Descripción</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $sist_card_al = $siscardio != '' || $cardiova != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingTwoSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoSistema" aria-expanded="false" aria-controls="collapseTwoSistema">
                                Sistema Cardiovascular <?= $sist_card_al ?>
                            </button>
                        </h2>
                        <div id="collapseTwoSistema" class="accordion-collapse collapse" aria-labelledby="headingTwoSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">

                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $siscardio ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_siscardios" placeholder="Sistema cardiovascular">
                                        <label for=" <?= $id_exam_sist ?>_siscardios"> Sistema Cardiovascular</label>
                                        <div id="suggestion-sistCard-list"></div>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_cardiovas" style="height: 100px"><?= $cardiova ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_cardiovas">Descripción</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $sist_uro_al = $sist_uro != '' || $urogenital != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingThreeSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeSistema" aria-expanded="false" aria-controls="collapseThreeSistema">
                                Sistema Urogenital <?= $sist_uro_al ?>
                            </button>
                        </h2>
                        <div id="collapseThreeSistema" class="accordion-collapse collapse" aria-labelledby="headingThreeSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sist_uro ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sist_uros" placeholder="Sistema urogenital">
                                        <label for=" <?= $id_exam_sist ?>_sist_uros"> Sistema Urogenital</label>
                                        <div id="suggestion-sistUro-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_urogenitals" style="height: 100px"><?= $urogenital ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_urogenitals">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $sist_esq_al = $sis_mu_e != '' || $musculoes != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>

                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingFourSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourSistema" aria-expanded="false" aria-controls="collapseFourSistema">
                                Sistema Músculo Esquelético <?= $sist_esq_al ?>
                            </button>
                        </h2>
                        <div id="collapseFourSistema" class="accordion-collapse collapse" aria-labelledby="headingFourSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sis_mu_e ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sis_mu_es" placeholder="Sistema Músculo Esquelético">
                                        <label for=" <?= $id_exam_sist ?>_sis_mu_es"> Sistema Músculo Esquelético</label>
                                        <div id="suggestion-sistMusEs-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_musculoess" style="height: 100px"><?= $musculoes ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_musculoess">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $sist_nervioso_al = $nervioso != '' || $nerviosostext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingFiveSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveSistema" aria-expanded="false" aria-controls="collapseFiveSistema">
                                Sistema Nervioso <?= $sist_nervioso_al ?>
                            </button>
                        </h2>
                        <div id="collapseFiveSistema" class="accordion-collapse collapse" aria-labelledby="headingFiveSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $nervioso ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_nerviosos" placeholder="Sistema Nervioso">
                                        <label for=" <?= $id_exam_sist ?>_nerviosos"> Sistema Nervioso</label>
                                        <div id="suggestion-sistNerv-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_nerviosostext" style="height: 100px"><?= $nerviosostext ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_nerviosostext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $sist_linfatico_al = $linfatico != '' || $linfaticotext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingSixSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixSistema" aria-expanded="false" aria-controls="collapseSixSistema">
                                Sistema Linfático <?= $sist_linfatico_al ?>
                            </button>
                        </h2>
                        <div id="collapseSixSistema" class="accordion-collapse collapse" aria-labelledby="headingSixSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $linfatico ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_linfaticos" placeholder="Sistema Linfático">
                                        <label for=" <?= $id_exam_sist ?>_linfaticos"> Sistema Linfático</label>
                                        <div id="suggestion-sistLinf-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_linfaticotext" style="height: 100px"><?= $linfaticotext ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_linfaticotext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php $sist_respiratorio_al = $respiratorio != '' || $respiratorio != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingSevenSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSevenSistema" aria-expanded="false" aria-controls="collapseSevenSistema">
                                Sistema Respiratorio <?= $sist_respiratorio_al ?>
                            </button>
                        </h2>
                        <div id="collapseSevenSistema" class="accordion-collapse collapse" aria-labelledby="headingSevenSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $respiratorio ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_respiratorios" placeholder="Sistema Respiratorio">
                                        <label for=" <?= $id_exam_sist ?>_respiratorios"> Sistema Respiratorio</label>
                                        <div id="suggestion-sistResp-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_respiratoriostext" style="height: 100px"><?= $respiratorio ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_respiratoriostext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $sist_genito_al = $genitourinario != '' || $genitourinariotext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingHeightSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHeightSistema" aria-expanded="false" aria-controls="collapseHeightSistema">
                                Sistema Genitourinario <?= $sist_genito_al ?>
                            </button>
                        </h2>
                        <div id="collapseHeightSistema" class="accordion-collapse collapse" aria-labelledby="headingHeightSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $genitourinario ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_genitourinarios" placeholder="Sistema Genitourinario">
                                        <label for=" <?= $id_exam_sist ?>_genitourinarios"> Sistema Genitourinario</label>
                                        <div id="suggestion-sistGen-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_genitourinariostext" style="height: 100px"><?= $genitourinariotext ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_genitourinariostext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $sist_digestivo_al = $sist_diges != '' || $digestivo != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>

                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingNineSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNineSistema" aria-expanded="false" aria-controls="collapseNineSistema">
                                Sistema Digestivo <?= $sist_digestivo_al ?>
                            </button>
                        </h2>
                        <div id="collapseNineSistema" class="accordion-collapse collapse" aria-labelledby="headingNineSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sist_diges ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sist_digess" placeholder="Sistema Digestivo">
                                        <label for=" <?= $id_exam_sist ?>_sist_digess"> Sistema Digestivo</label>
                                        <div id="suggestion-sistDig-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_digestivos" style="height: 100px"><?= $digestivo ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_digestivos">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $sist_endocrino_al = $sist_endo != '' || $endocrino != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>

                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingTenSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTenSistema" aria-expanded="false" aria-controls="collapseTenSistema">
                                Sistema Endocrino <?= $sist_endocrino_al ?>
                            </button>
                        </h2>
                        <div id="collapseTenSistema" class="accordion-collapse collapse" aria-labelledby="headingTenSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sist_endo ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sist_endos" placeholder="Sistema Endocrino">
                                        <label for=" <?= $id_exam_sist ?>_sist_endos"> Sistema Endocrino</label>
                                        <div id="suggestion-sistEndoc-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_endocrinos" style="height: 100px"><?= $endocrino ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_endocrinos">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $sist_rela_al = $sist_rela != '' || $otros_ex_sis != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>

                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingElevenSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElevenSistema" aria-expanded="false" aria-controls="collapseElevenSistema">
                                Relativo a <?= $sist_rela_al ?>
                            </button>
                        </h2>
                        <div id="collapseElevenSistema" class="accordion-collapse collapse" aria-labelledby="headingElevenSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $sist_rela ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_sist_relas" placeholder=" Relativo a">
                                        <label for=" <?= $id_exam_sist ?>_sist_relas"> Relativo a</label>
                                        <div id="suggestion-sistRela-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_sist_relastext" style="height: 100px"><?= $otros_ex_sis ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_sist_relastext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php $sist_dorsales_al = $dorsales != '' || $dorsalestext != '' ? "<i class='bi bi-check-lg text-success fs-2'></i>" : ''; ?>

                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingTwelveSistema">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelveSistema" aria-expanded="false" aria-controls="collapseTwelveSistema">
                                Columna Dorsal <?= $sist_dorsales_al ?>
                            </button>
                        </h2>
                        <div id="collapseTwelveSistema" class="accordion-collapse collapse" aria-labelledby="headingTwelveSistema" data-bs-parent="#accordionSistema">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= $dorsales ?>" class="form-control txt-inp-exs" id="<?= $id_exam_sist ?>_dorsaless" placeholder="Columna Dorsal">
                                        <label for=" <?= $id_exam_sist ?>_dorsaless"> Columna Dorsal</label>
                                        <div id="suggestion-sistColDor-list"></div>
                                    </div>


                                    <div class="form-floating mb-3">

                                        <textarea class="form-control txt-ares-exs" id="<?= $id_exam_sist ?>_dorsalesstext" style="height: 100px"><?= $dorsalestext ?></textarea>
                                        <label for=" <?= $id_exam_sist ?>_dorsalesstext">Descripción</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

              <div class="float-end">
                    <br />
					<?php if ($id_exam_sist > 0) { ?>
                    <button type="button" class="btn btn-primary" id="resetExamSist">Nuevo</button>
					<?php } 
					if($this->session->userdata('user_id')==$in_by){?>
					<button type="button" class="btn btn-success" id="saveEditExamSist" <?=$this->session->userdata('show_edit_btn')?>>Guardar </button>
					<?php  }?>
                    <span id="alert_placeholder_exam_sist" style="position:absolute; " class="p-2"></span>
                </div>
            <?php
	$datasi= array(
'si_up_time'=>$up_time,
'si_in_time' =>$in_time,
'si_in_by'=>$in_by,
'si_up_by' => $up_by
);

$this->session->set_userdata($datasi);
			
			?>
        </div>
        <input type="hidden" value="<?= $sis_data ?>" id="sis_data" />
        <input type="hidden" value="<?= $id_exam_sist ?>" id="id_exam_sist" />
		<input type="hidden" id="exam-sistema-form-inputs" value="<?= $id_exam_sist ?>" />
    </div>
</section>


<?php //$this->load->view('clinical-history/examen-sistema/footer'); ?>