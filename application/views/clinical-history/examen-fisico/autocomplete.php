<script>
    var ex_fis_data = $("#ex_fis_data").val();

    $("#" + ex_fis_data + "_neuro_sex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "neuro_s", ex_fis_data + "_neuro_sex", "suggestion-examNeuro-list");

    });



    $("#" + ex_fis_data + "_cabezaex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cabeza", ex_fis_data + "_cabezaex", "suggestion-examCabeza-list");


    });



    $("#" + ex_fis_data + "_cuelloex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuello", ex_fis_data + "_cuelloex", "suggestion-examCuello-list");

    });



    $("#" + ex_fis_data + "_abd_inspex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "abd_insp", ex_fis_data + "_abd_inspex", "suggestion-examAbIns-list");

    });



    $("#" + ex_fis_data + "_ext_supex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "ext_sup", ex_fis_data + "_ext_supex", "suggestion-examExtSup-list");

    });



    $("#" + ex_fis_data + "_ext_infex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "ext_inf", ex_fis_data + "_ext_infex", "suggestion-examExtInf-list");

    });


    $("#" + ex_fis_data + "_toraxex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "torax", ex_fis_data + "_toraxex", "suggestion-examExtTcP-list");

    });


    //-----------------EXAMENES MAMAS-----------



    $("#" + ex_fis_data + "_cuad_inf_ext1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuad_inf_ext1", ex_fis_data + "_cuad_inf_ext1ex", "suggestion-cualInfExt1-list");

    });


    $("#" + ex_fis_data + "_mama_izq1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuad_sup_ext2", ex_fis_data + "_mama_izq1ex", "suggestion-cualSupExt1-list");

    });


    $("#" + ex_fis_data + "_mama_izq2ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuad_sup_ext2", ex_fis_data + "_mama_izq2ex", "suggestion-cualSupExt1-list");

    });


    $("#" + ex_fis_data + "_cuad_sup_ext1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuad_sup_ext1", ex_fis_data + "_cuad_sup_ext1ex", "suggestion-cualSupExt2-list");

    })


    $("#" + ex_fis_data + "_cuad_inf_ext11ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cuad_inf_ext11", ex_fis_data + "_cuad_inf_ext11ex", "suggestion-cualInfExt2-list");

    })

    $("#" + ex_fis_data + "_region_retro1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_retro1", ex_fis_data + "_region_retro1ex", "suggestion-cualInfReR1-list");

    })


    $("#" + ex_fis_data + "_region_retro2ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_retro2", ex_fis_data + "_region_retro2ex", "suggestion-cualInfReR2-list");

    })


    $("#" + ex_fis_data + "_region_areola_pezon1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_areola_pezon1", ex_fis_data + "_region_areola_pezon1ex", "suggestion-regAr1-list");

    })
    $("#" + ex_fis_data + "_region_areola_pezon2ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_areola_pezon2", ex_fis_data + "_region_areola_pezon2ex", "suggestion-regAr2-list");

    })



    $("#" + ex_fis_data + "_region_ax1ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_ax1", ex_fis_data + "_region_ax1ex", "suggestion-regAx1-list");

    })

    $("#" + ex_fis_data + "_region_ax2ex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "region_ax2", ex_fis_data + "_region_ax2ex", "suggestion-regAx2-list");

    })


    $("#" + ex_fis_data + "_cervixex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "cervix", ex_fis_data + "_cervixex", "suggestion-_cervixex-list");

    })


    $("#" + ex_fis_data + "_utero").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "utero", ex_fis_data + "_utero", "suggestion-_utero-list");

    })

    $("#" + ex_fis_data + "_anexo_derecho").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "anexo_derecho", ex_fis_data + "_anexo_derecho", "suggestion-_anexo_derecho-list");

    })

    $("#" + ex_fis_data + "_anexo_izquierdo").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "anexo_izquierdo", ex_fis_data + "_anexo_izquierdo", "suggestion-_anexo_izquierdo-list");

    })
    $("#" + ex_fis_data + "_inspection_vulvalex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "inspection_vulval", ex_fis_data + "_inspection_vulvalex", "suggestion-_inspection_vulvalex-list");

    })
    $("#" + ex_fis_data + "_rectalex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "rectal", ex_fis_data + "_rectalex", "suggestion-_rectalex-list");

    })

    $("#" + ex_fis_data + "_genitalmex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "genitalm", ex_fis_data + "_genitalmex", "suggestion-_genitalmex-list");

    })

    $("#" + ex_fis_data + "_genitalfex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "genitalf", ex_fis_data + "_genitalfex", "suggestion-_genitalfex-list");

    })

    $("#" + ex_fis_data + "_vaginaex").keyup(function() {
        var keyword = $(this).val();
        autoCompleteInput(keyword, "h_c_examen_fisico", "vagina", ex_fis_data + "_vaginaex", "suggestion-_vaginaex-list");

    })
</script>