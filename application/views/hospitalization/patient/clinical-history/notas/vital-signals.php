<?php
$edad = $this->session->userdata('sessionPatientAge');
$year_age = substr($edad, 0, strpos($edad, "año"));
$month_age = substr($edad, 0, strpos($edad, "mes"));

if ($year_age) {
    switch ($year_age) {
        case ($year_age >= 1 && $year_age <= 2): //the range from range of 0-20
            $patient_age_range = "lactante mayor";
            break;
        case ($year_age >= 2 && $year_age <= 6):

            $patient_age_range = "pre-escolar";
            break;
        case ($year_age >= 6 && $year_age <= 13):

            $patient_age_range = "escolar";
            break;
        case ($year_age >= 13 && $year_age <= 16):

            $patient_age_range = "adolescente";
            break;

        case ($year_age > 16):
            $patient_age_range = "adulto";
    }

} elseif ($month_age) {
    //echo "patient age in month $month_age";
    if ($month_age == 1 || $month_age == 0) {
        $patient_age_range = 'recien nacido (0-6 semanas)';
    }

    if ($month_age > 1 && $month_age <= 11) {
        $patient_age_range = 'infante (7 semanas -1 año)';
    }

} else {
    $patient_age_range = 'recien nacido (0-6 semanas)';
}

if ($patient_age_range == "recien nacido (0-6 semanas)") {
    $fr_resp_rank = '40-45';
    $fr_card_rank = '120-140';
    $fr_tempo_rank = '38';
    $sistol = '70-100';
    $diastol = '50-68';
} else if ($patient_age_range == "infante (7 semanas -1 año)") {
    $fr_resp_rank = '20-30';
    $fr_card_rank = '100-130';
    $fr_tempo_rank = '37.5-37.8';
    $sistol = '84-106';
    $diastol = '56-70';
} else if ($patient_age_range == "lactante mayor") {
    $fr_resp_rank = '20-30';
    $fr_card_rank = '100-120';
    $fr_tempo_rank = '37.5-37.8';
    $sistol = '90-106';
    $diastol = '58-70';
} else if ($patient_age_range == "pre-escolar") {
    $fr_resp_rank = '20-30';
    $fr_card_rank = '80-120';
    $fr_tempo_rank = '37.5-37.8';
    $sistol = '99-112';
    $diastol = '64-70';
} else if ($patient_age_range == "escolar") {
    $fr_resp_rank = '12-20';
    $fr_card_rank = '80-100';
    $fr_tempo_rank = '37-37.5';
    $sistol = '104-124';
    $diastol = '64-86';
} else if ($patient_age_range == "adolescente") {
    $fr_resp_rank = '12-20';
    $fr_card_rank = '70-80';
    $fr_tempo_rank = '37';
    $sistol = '118-132';
    $diastol = '70-82';
} else {
    $fr_resp_rank = '12-20';
    $fr_card_rank = '60-80';
    $fr_tempo_rank = '36.2-37.2';
    $sistol = '110-140';
    $diastol = '70-90';
}

//----------------------------------- 
if ($ex_notas_fis_data) {
    foreach ($query_ex_notas_fis as $row) foreach ($notas_signos_vitales_by_id_result as $row_rslt)
            $fr = $row->fr;
    $fc = $row->fc;
    $tempo = $row->tempo;
    $ta = $row->ta;
    $hg = $row->hg;
    $pulso = $row->pulso;
    $glicemia = $row->glicemia;
    $signo_v_per_cef = $row->signo_v_per_cef;
    $peso = $row->peso;
    $kg = $row->kg;
    $talla = $row->talla;
    $talla_inc = $row->talla_imc;
    $imc = $row->imc;
    $signo_v_sat_ox = $row->signo_v_sat_ox;
    $id_sig = $row->idSearch;

    $fr_rsl = $row_rslt->fr;
    $fc_rsl = $row_rslt->fc;
    $ft_rsl = $row_rslt->ft;
    $fsist_rsl = $row_rslt->sist;
    $fdiast_rsl = $row_rslt->diast;


} else {
    $fr = "";
    $fc = "";
    $tempo = "";
    $signo_v_sat_ox = "";
    $ta = "";
    $hg = "";
    $pulso = "";
    $glicemia = "";
    $signo_v_per_cef = "";
    $peso = "";
    $kg = "";
    $talla = "";
    $talla_inc = "";
    $imc = "";
    $id_sig = 0;
    $fr_rsl = "";
    $fc_rsl = "";
    $ft_rsl = "";
    $fsist_rsl = "";
    $fdiast_rsl = "";
    $glicemia_rsl = "";

}

?>

<h4 class="card-title">Tabla de signos vitales por edad - Paciente
    <?= $patient_age_range; ?> (
    <?= $edad ?>)
</h4>
<div id="signos-vitales-form">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header" style="background: #e3acb7; text-align: center;color:black">
                    FRECUENCIA RESPIRATORIA
                </div>
                <div class="card-body">

                    <table class="table table-striped" style="text-align:center">
                        <tr>
                            <td>Rango (
                                <?= $fr_resp_rank ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="signo_fr_result_notas" id="<?= $id_sig ?>_signo_fr_result_notas"><?= $fr_rsl ?></div>
                            </td>
                        </tr>
                    </table>
                    <div class="input-group ">
                        <span class="input-group-text"><i class="bi bi-lungs"></i></span>
                        <input type="text" class="form-control only-float signo_v_fr_notas" id="<?= $id_sig ?>_signo_v_fr_notas" value="<?= $fr ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header" style="background: #ac98f8; text-align: center;color:black;">
                    FRECUENCIA CARDIACA
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="text-align:center">
                        <tr>
                            <td>(
                                <?= $fr_card_rank ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="signo_fc_result_notas" id="<?= $id_sig ?>_signo_fc_result_notas"><?= $fc_rsl ?></div>
                            </td>
                        </tr>
                    </table>
                    <div class="input-group ">
                        <span class="input-group-text"><i class="bi bi-activity"></i></span>
                        <input type="text" class="form-control only-float signo_v_fc_notas" id="<?= $id_sig ?>_signo_v_fc_notas" value="<?= $fc ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header" style="background:  #bb8fce;color:black;text-align:center">
                    FRECUENCIA TEMPERATURA
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="text-align:center">
                        <tr>
                            <td>Rango (
                                <?= $fr_tempo_rank ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="signo_temp_result_notas" id="<?= $id_sig ?>_signo_temp_result_notas"><?= $ft_rsl ?></div>
                            </td>
                        </tr>
                    </table>
                    <div class="input-group ">
                        <span class="input-group-text"><i class="bi bi-thermometer"></i> </span>
                        <input type="text" class="form-control only-float signo_v_temp_notas" id="<?= $id_sig ?>_signo_v_temp_notas" value="<?= $tempo ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" style="background:  #a9dfbf;color:black;text-align:center">
                    TENSION ARTERIAL
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Sistólica (
                                <?= $sistol ?>)
                            </td>
                            <td>Diastólica (
                                <?= $diastol ?>)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center tens_art_sis_result_notas" id="<?= $id_sig ?>_tens_art_sis_result_notas"><?= $fsist_rsl ?></div>
                            </td>
                            <td>
                                <div class="text-center tens_art_dias_result_notas" id="<?= $id_sig ?>_tens_art_dias_result_notas"><?= $fdiast_rsl ?></div>
                            </td>
                        </tr>
                    </table>
                    <div class="input-group">
                        <span class="input-group-text">T. A.(mm)</span>
                        <input type="text" class="form-control only-float signo_v_ta_mm_notas" id="<?= $id_sig ?>_signo_v_ta_mm_notas" value="<?= $ta ?>">
                        <span class="input-group-text">T. A. (hg)</span>
                        <input type="text" class="form-control only-float signo_v_ta_hg_notas" id="<?= $id_sig ?>_signo_v_ta_hg_notas" value="<?= $hg ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="input-group mb-2">
                <span class="input-group-text">Peso:</span>
                <input type="text" class="form-control only-float signo_v_peso_lb_notas" id="<?= $id_sig ?>_signo_v_peso_lb_notas" value="<?= $peso ?>">
                <span class="input-group-text">lb</span>
                <input type="text" class="form-control only-float signo_v_peso_kg_notas" style="text-align:right" id="<?= $id_sig ?>_signo_v_peso_kg_notas" value="<?= $kg ?>">
                <span class="input-group-text">kg</span>
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text">Talla (metro):</span>
                <input type="text" class="form-control only-float signo_v_talla_notas" id="<?= $id_sig ?>_signo_v_talla_notas" value="<?= $talla ?>">
                <span class="input-group-text">inc:</span>
                <input type="text" class="form-control only-float signo_v_talla_m_notas" id="<?= $id_sig ?>_signo_v_talla_m_notas" value="<?= $talla_inc ?>">
                <span class="input-group-text">IMC:</span>
                <input type="text" class="form-control only-float signo_v_talla_imc_notas" id="<?= $id_sig ?>_signo_v_talla_imc_notas" value="<?= $imc ?>">
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text">Pulso:</span>
                <input type="text" class="form-control only-float signo_v_pulso_notas" id="<?= $id_sig ?>_signo_v_pulso_notas"
                    value="<?= $pulso ?>">

            </div>

            <div class="input-group mb-2">
                <span class="input-group-text">Presión media:</span>
                <input type="text" class="form-control only-float" id="<?= $id_sig ?>_signo_v_per_cef_notas" value="<?= $signo_v_sat_ox ?>">
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text">Sat O2(%)</span>
                <input type="text" class="form-control only-float" id="<?= $id_sig ?>_signo_v_sat_ox_notas" value="<?= $signo_v_sat_ox ?>">
            </div>
        </div>
    </div>
</div>
<input value="<?= $patient_age_range ?>" id="patient_age_range" type="hidden" />