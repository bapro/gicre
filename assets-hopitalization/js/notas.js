// ===============================================================================================================
// ======================================== BEGIN NOTAS (EXAMEN FISICO) FORM =====================================
// ===============================================================================================================

$(document).on('click', '#btnSaveExamenFisicoNotas', function (event) {
    event.preventDefault();

    $('#btnSaveExamenFisicoNotas').prop("disabled", true);
    saveExamenFisicoNotas($('#id_exf_notas').val());
});

function saveExamenFisicoNotas(exfId) {

    var nameNotas = $('#' + exfId + '_hallazgo_exf_name_notas').val();
    var descNotas = $('#' + exfId + '_hallazgo_exf_desc_notas').val();

    //--SIGNOS VITALES
    var signo_v_fr = $('#' + exfId + '_signo_v_fr_notas').val();
    var signo_v_fc = $('#' + exfId + '_signo_v_fc_notas').val();
    var signo_v_temp = $('#' + exfId + '_signo_v_temp_notas').val();
    var signo_v_ta_mm = $('#' + exfId + '_signo_v_ta_mm_notas').val();
    var signo_v_ta_hg = $('#' + exfId + '_signo_v_ta_hg_notas').val();
    var signo_v_peso_lb = $('#' + exfId + '_signo_v_peso_lb_notas').val();
    var signo_v_peso_kg = $('#' + exfId + '_signo_v_peso_kg_notas').val();
    var signo_v_talla = $('#' + exfId + '_signo_v_talla_notas').val();
    var signo_v_talla_m = $('#' + exfId + '_signo_v_talla_m_notas').val();
    var signo_v_talla_imc = $('#' + exfId + '_signo_v_talla_imc_notas').val();
    var signo_v_pulso = $('#' + exfId + '_signo_v_pulso_notas').val();

    //var signo_v_glicemia = $('#' + exfId + '_signo_v_glicemia').val();
    var signo_v_per_cef = $('#' + exfId + '_signo_v_per_cef_notas').val();
    var signo_v_sat_ox = $('#' + exfId + '_signo_v_sat_ox_notas').val();

    //-SIGNOS VITALES RESULTADOS
    var signo_sat = $('#' + exfId + '_signo_sat').val();
    var signo_fcf = $('#' + exfId + '_signo_fcf').val();

    var signo_fr_result = $('#' + exfId + '_signo_fr_result_notas').html();
    var signo_fc_result = $('#' + exfId + '_signo_fc_result_notas').html();
    var signo_temp_result = $('#' + exfId + '_signo_temp_result_notas').html();
    var tens_art_sis_result = $('#' + exfId + '_tens_art_sis_result_notas').html();
    var tens_art_dias_result = $('#' + exfId + '_tens_art_dias_result_notas').html();
    //var glicemia_rslt = $("." + exfId + "_glicemia_"+signo_form_id).html();

    if (nameNotas == "") {
        Swal.fire({
            title: 'Nombre de nota es obligatorio',
            icon: 'error',
        })
        $('#btnSaveExamenFisicoNotas').prop("disabled", false);
    } else if (descNotas == "") {
        Swal.fire({
            title: 'Descripcion de nota es obligatorio',
            icon: 'error',
        })
        $('#btnSaveExamenFisicoNotas').prop("disabled", false);
    } else {
        $.ajax({
            type: "POST",
            url: base_url + "hosp_notas/saveExamenFisicoNotas",

            data: {
                nameNotas: nameNotas,
                descNotas: descNotas,

                signo_sat: signo_sat,
                signo_fcf: signo_fcf,
                signo_v_fr: signo_v_fr,
                signo_v_fc: signo_v_fc,
                signo_v_temp: signo_v_temp,
                signo_v_ta_mm: signo_v_ta_mm,
                signo_v_ta_hg: signo_v_ta_hg,
                signo_v_peso_lb: signo_v_peso_lb,
                signo_v_peso_kg: signo_v_peso_kg,
                signo_v_talla: signo_v_talla,
                signo_v_talla_m: signo_v_talla_m,
                signo_v_per_cef: signo_v_per_cef,
                signo_v_talla_imc: signo_v_talla_imc,
                signo_v_pulso: signo_v_pulso,
                signo_fr_result: signo_fr_result,
                signo_fc_result: signo_fc_result,
                signo_temp_result: signo_temp_result,
                tens_art_sis_result: tens_art_sis_result,
                tens_art_dias_result: tens_art_dias_result,
                signo_v_sat_ox: signo_v_sat_ox,
                idExF: exfId,

                inserted_by: $('#ex_vitales_in_by').val(),
                updated_by: $('#ex_vitales_up_by').val(),
                inserted_time: $('#ex_vitales_in_time').val(),
                updated_time: $("#ex_vitales_up_time").val()
            },
            success: function (data) {
                showalert(data, "alert-success", "alert_placeholder_exf_notas");
                $('#btnSaveExamenFisicoNotas').prop("disabled", false);
                if (exfId == 0) {
                    loadPagination('hosp_notas');
                }
            },
        })
    }
}
// ===============================================================================================================
// ========================================= END NOTAS (EXAMEN FISICO) FORM ======================================
// ===============================================================================================================


// ===============================================================================================================
// ======================================== BEGIN NOTAS (SIGNO VITALES) FORM =====================================
// ===============================================================================================================

// ----------------------------------------------- PATIENT AGE RANGE ---------------------------------------------
var rango = $('#patient_age_range').val();
var timerGli = null;

$(document).on('keydown', '.signo_v_glicemia', function (event) {
    //$('#'+signo_data+'_signo_v_glicemia').keydown(function(){
    clearTimeout(timerGli);
    timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

    var glicemia = $('.signo_v_glicemia').val();

    if (glicemia != "" && (0 >= glicemia || glicemia <= 69)) {
        var value = "Glicemia " + glicemia + " : paciente diabetes";
        $('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >" + value + "</i>").slideDown();
    }

    else if (glicemia != "" && (70 >= glicemia || glicemia <= 140)) {
        var value = "Glicemia " + glicemia + " : paciente normal";
        $('.glicemia').html("<i class='bi bi-check-lg text-success'  >" + value + "</i>").slideDown();
    }
    else if ((glicemia != "") && (140 > glicemia || glicemia <= 200)) {
        var value = "Glicemia " + glicemia + " : paciente pre-diabetes";
        $('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger text-danger'  >" + value + "</i>").slideDown();
    }

    else if (glicemia != "" && 200 < glicemia) {
        var value = "Glicemia " + glicemia + " : paciente diabetes";
        $('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >" + value + "</i>").slideDown();
    }
    else {
        $('.glicemia').hide();
    }

}

// ----------------------------------------------- FRECUENCIA RESPIRATORIA ---------------------------------------------
var timerFrNotas = null;

$(document).on('keydown', '.signo_v_fr_notas', function (event) {

    var funct;
    clearTimeout(timerFrNotas);
    if (rango == 'recien nacido (0-6 semanas)') {
        funct = frecuencia_respiratoria1_notas;
    }
    else if (rango == 'infante (7 semanas -1 año)' || rango == 'lactante mayor' || rango == 'pre-escolar') {
        funct = frecuencia_respiratoria2_notas;
    }

    else if (rango == 'escolar' || rango == 'adolescente' || rango == 'adulto') {
        funct = frecuencia_respiratoria3_notas;
    }


    else { }
    timerFrNotas = setTimeout(funct, 1000)
});

function frecuencia_respiratoria1_notas() {
    var signo_v_fr = $('.signo_v_fr_notas').val();

    if (signo_v_fr == "") {
        $('.signo_fr_result_notas').text('');
    }
    else if (40 <= signo_v_fr && signo_v_fr <= 45) {
        $('.signo_fr_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fr_result_notas').html("<i class='bi bi-exclamation-triangle text-danger'  > anormal</i>");
    }
}

function frecuencia_respiratoria2_notas() {
    var signo_v_fr = $('.signo_v_fr_notas').val();

    if (signo_v_fr == "") {
        $('.signo_fr_result_notas').text('');
    }

    else if (20 <= signo_v_fr && signo_v_fr <= 30) {
        $('.signo_fr_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fr_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function frecuencia_respiratoria3_notas() {
    var signo_v_fr = $('.signo_v_fr_notas').val();

    if (signo_v_fr == "") {
        $('.signo_fr_result_notas').text('');
    }

    else if (12 <= signo_v_fr && signo_v_fr <= 20) {
        $('.signo_fr_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fr_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

// ------------------------------------------------- FRECUENCIA CARDIACA -----------------------------------------------
var timerFcNotas = null;

$(document).on('keydown', '.signo_v_fc_notas', function (event) {
    var funfc;

    clearTimeout(timerFcNotas);
    if (rango == 'recien nacido (0-6 semanas)') {
        funfc = f_c_r_n_notas;
    } else if (rango == 'infante (7 semanas -1 año)') {
        funfc = f_c_inf_notas;
    } else if (rango == 'lactante mayor') {
        funfc = f_c_lm_notas;
    } else if (rango == 'pre-escolar') {
        funfc = f_c_pes_notas;
    } else if (rango == 'escolar') {
        funfc = f_c_es_notas;
    } else if (rango == 'adolescente') {
        funfc = f_c_ado_notas;
    } else if (rango == 'adulto') {
        funfc = f_c_adult_notas;
    } else { }

    timerFcNotas = setTimeout(funfc, 1000)
});

function f_c_adult_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (60 <= signo_v_fc && signo_v_fc <= 80) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_r_n_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (120 <= signo_v_fc && signo_v_fc <= 140) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_inf_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (100 <= signo_v_fc && signo_v_fc <= 130) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_lm_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (100 <= signo_v_fc && signo_v_fc <= 120) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_pes_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (80 <= signo_v_fc && signo_v_fc <= 120) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_es_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (80 <= signo_v_fc && signo_v_fc <= 100) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function f_c_ado_notas() {
    var signo_v_fc = $('.signo_v_fc_notas').val();

    if (signo_v_fc == "") {
        $('.signo_fc_result_notas').text('');
    }

    else if (70 <= signo_v_fc && signo_v_fc <= 80) {
        $('.signo_fc_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    }
    else {
        $('.signo_fc_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

// ------------------------------------------------ FRECUENCIA TEMPERATURA ----------------------------------------------

var timerTpNotas = null;

$(document).on('keydown', '.signo_v_temp_notas', function (event) {
    var funtp;

    clearTimeout(timerTpNotas);
    if (rango == 'recien nacido (0-6 semanas)') {
        funtp = tempo_r_n;
    } else if (rango == 'infante (7 semanas -1 año)' || rango == 'lactante mayor' || rango == 'pre-escolar') {
        funtp = tempo_inf_lm_pes;
    } else if (rango == 'escolar') {
        funtp = tempo_esc;
    } else if (rango == 'adolescente') {
        funtp = tempo_adol;
    } else if (rango == 'adulto') {
        funtp = tempo_adulto;
    } else { }

    timerTpNotas = setTimeout(funtp, 1000)
});

function tempo_adol() {
    var signo_v_temp = $('.signo_v_temp_notas').val();

    if (signo_v_temp == "") {
        $('.signo_temp_result_notas').text('');
    } else if (signo_v_temp == 37) {
        $('.signo_temp_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.signo_temp_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function tempo_adulto() {
    var signo_v_temp = $('.signo_v_temp_notas').val();

    if (signo_v_temp == "") {
        $('.signo_temp_result_notas').text('');
    } else if (36.2 <= signo_v_temp && signo_v_temp <= 37.2) {
        $('.signo_temp_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.signo_temp_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function tempo_esc() {
    var signo_v_temp = $('.signo_v_temp_notas').val();

    if (signo_v_temp == "") {
        $('.signo_temp_result_notas').text('');
    } else if (37 <= signo_v_temp && signo_v_temp <= 37.5) {
        $('.signo_temp_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.signo_temp_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function tempo_inf_lm_pes() {
    var signo_v_temp = $('.signo_v_temp_notas').val();

    if (signo_v_temp == "") {
        $('.signo_temp_result_notas').text('');
    } else if (37.5 <= signo_v_temp && signo_v_temp <= 37.8) {
        $('.signo_temp_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.signo_temp_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function tempo_r_n() {
    var signo_v_temp = $('.signo_v_temp_notas').val();

    if (signo_v_temp == "") {
        $('.signo_temp_result_notas').text('');
    } else if (signo_v_temp == 38) {
        $('.signo_temp_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.signo_temp_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

// ----------------------------------------------- TENSION ARTERIAL SISTOLICA --------------------------------------------
$(document).on('keydown', '.signo_v_ta_mm_notas', function (event) {
    var timerTaNotas = null;
    var funta;

    clearTimeout(timerTaNotas);
    if (rango == 'recien nacido (0-6 semanas)') {
        funta = ta_r_n_notas;
    } else if (rango == 'infante (7 semanas -1 año)') {
        funta = ta_inf_notas;
    } else if (rango == 'lactante mayor') {
        funta = ta_lm_notas;
    } else if (rango == 'pre-escolar') {
        funta = ta_pres_notas;
    } else if (rango == 'escolar') {
        funta = ta_es_notas;
    } else if (rango == 'adolescente') {
        funta = ta_adol_notas;
    } else if (rango == 'adulto') {
        funta = ta_adulto_notas;
    } else { }

    timerTaNotas = setTimeout(funta, 1000)
});

function ta_es_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (104 <= signo_v_ta_mm && signo_v_ta_mm <= 124) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function ta_pres_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (99 <= signo_v_ta_mm && signo_v_ta_mm <= 112) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}


function ta_lm_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (90 <= signo_v_ta_mm && signo_v_ta_mm <= 106) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function ta_inf_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (84 <= signo_v_ta_mm && signo_v_ta_mm <= 106) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function ta_r_n_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (70 <= signo_v_ta_mm && signo_v_ta_mm <= 100) {
        $('#' + signo_data + '_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function ta_adol_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (118 <= signo_v_ta_mm && signo_v_ta_mm <= 132) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

function ta_adulto_notas() {
    var signo_v_ta_mm = $('.signo_v_ta_mm_notas').val();

    if (signo_v_ta_mm == "") {
        $('.tens_art_sis_result_notas').text('');
    } else if (110 <= signo_v_ta_mm && signo_v_ta_mm <= 140) {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_sis_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

// ----------------------------------------- TENSION ARTERIAL DIASTOLICA  ---------------------------------------
var timerTadNotas = null;
$(document).on('keydown', '.signo_v_ta_hg_notas', function (event) {
    var funtad;
    clearTimeout(timerTadNotas);

    if (rango == 'recien nacido (0-6 semanas)') {
        funtad = ta_r_nd;
    } else if (rango == 'infante (7 semanas -1 año)') {
        funtad = ta_infd;
    } else if (rango == 'lactante mayor') {
        funtad = ta_lmd;
    } else if (rango == 'pre-escolar') {
        funtad = ta_presd;
    } else if (rango == 'escolar') {
        funtad = ta_esd;
    } else if (rango == 'adolescente') {
        funta = ta_adold;
    } else if (rango == 'adulto') {
        funtad = ta_adultod_notas;
    } else { }

    timerTadNotas = setTimeout(funtad, 1000)
});

function ta_adultod_notas() {
    var signo_v_ta_hg = $('.signo_v_ta_hg_notas').val();

    if (signo_v_ta_hg == "") {
        $('.tens_art_dias_result_notas').text('');
    } else if (70 <= signo_v_ta_hg && signo_v_ta_hg <= 90) {
        $('.tens_art_dias_result_notas').html("<i class='bi bi-check-lg text-success'  >normal</i>");
    } else {
        $('.tens_art_dias_result_notas').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
    }
}

// ------------------------------------------------ CALCULATE PESO  ---------------------------------------------
$(document).on('keyup', '.signo_v_peso_lb_notas', function (event) {
    var peso = $(this).val();
    var talla = $('.signo_v_talla_notas').val();

    if (peso == '') {
        $('.signo_v_talla_notas').prop('disabled', true);
        $('.signo_v_talla_notas').val('');
        $('.signo_v_talla_imc_notas').prop('disabled', true);
        $('.signo_v_talla_imc_notas').val('');
    } else {
        $('.signo_v_talla_notas').prop('disabled', false);
    }

    var ma = peso * 0.45;
    $('.signo_v_peso_kg_notas').val(ma);

    calculIMCNotas();
});

$('#' + signo_data + '_signo_v_talla_notas').keyup(function () {
    $('.signo_v_talla_m_notas').val($(this).val() * 39.37).number(true, 2);
    calculIMCNotas();
});

function calculIMCNotas() {
    var peso = $('#' + signo_data + '_signo_v_peso_kg_notas').val();
    var talla = $('#' + signo_data + '_signo_v_talla_notas').val();
    var cal1 = talla * talla;
    var imc_result = peso / cal1;
    $('.signo_v_talla_imc_notas').val(imc_result).number(true, 2);
}

// -------------------------------------------------- PAGINATION  -----------------------------------------------

$(document).on('click', '.paginate-notas-examfisico-li', function () {
    var display_content = "#examfisico-form-notas";
    var controller = "hosp_notas";
    var pageNum = this.id;

    $(".paginate-notas-examfisico-li.active").removeClass("active");
    $(this).addClass("active");

    paginateLiForm(display_content, controller, pageNum);

});

// ------------------------------------------------ NEW FORM -----------------------------------------------------

$(document).on('click', '#resetFormFormExFNotas', function (event) {
	event.preventDefault();
	var li = "paginate-notas-examfisico-li";
	var controller = "hosp_notas";
	var div = "examfisico-form-notas";
	resetForm(li, controller, div);
});

// ===============================================================================================================
// ========================================= END NOTAS (SIGNO VITALES) FORM ======================================
// ===============================================================================================================