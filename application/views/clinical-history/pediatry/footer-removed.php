<script>
function no_ap_sh1() {
    $(".no_ap_sh1").slideToggle();
}
function no_ap_sh2() {
    $(".no_ap_sh2").slideToggle();
}
function no_ap_sh3() {
    $(".no_ap_sh3").slideToggle();
}
function no_ap_sh4() {
    $(".no_ap_sh4").slideToggle();
}
function no_ap_sh5() {
    $(".no_ap_sh5").slideToggle();
}
function no_ap_sh6() {
    $(".no_ap_sh6").slideToggle();
}
function no_ap_sh7() {
    $(".no_ap_sh7").slideToggle();
}
function no_ap_sh8() {
    $(".no_ap_sh8").slideToggle();
}
function no_ap_sh9() {
    $(".no_ap_sh9").slideToggle();
}
function no_ap_sh10() {
    $(".no_ap_sh10").slideToggle();
}
function no_ap_sh11() {
    $(".no_ap_sh11").slideToggle();
}
function no_ap_sh12() {
    $(".no_ap_sh12").slideToggle();
}
function no_ap_sh13() {
    $(".no_ap_sh13").slideToggle();
}
function no_ap_sh14() {
    $(".no_ap_sh14").slideToggle();
}
function no_ap_sh15() {
    $(".no_ap_sh15").slideToggle();
}
function no_ap_sh16() {
    $(".no_ap_sh16").slideToggle();
}
function no_ap_sh17() {
    $(".no_ap_sh17").slideToggle();
}
function no_ap_sh18() {
    $(".no_ap_sh18").slideToggle();
}
$(".deactivate_ped :input").prop("disabled", !0),
    $("#edit_ped").click(function () {
        $(this).hide(), $("#save_ant_ped").show(), $(".disable-all :input").not(".do-not-disable-me").prop("disabled", !1), $("table#disab-vacu input[type=checkbox]").prop("disabled", !1);
    }),
    $("input[name='desco_peso_al_nacer']").click(function () {
        $(this).is(":checked") ? $("#peso_al_nacer").prop("disabled", !1) : ($("#peso_al_nacer").prop("disabled", !0), $("#peso_al_nacer").val(""));
    }),
    $("input[name='desco_talla_al_nacer']").click(function () {
        $(this).is(":checked") ? $("#talla_al_nacer").prop("disabled", !1) : ($("#talla_al_nacer").prop("disabled", !0), $("#talla_al_nacer").val(""));
    }),
    $(".disable-all :input").not(".except-me :input").prop("disabled", !0),
    $("table#disab-vacu input[type=checkbox]").prop("disabled", !0),
    jQuery("input[name='mf11']").on("click", function (e) {
        $(".chkYes5").is(":checked") ? $(".text-maltrato").prop("disabled", !1) : ($(".text-maltrato").prop("disabled", !0), $(".text-maltrato").val(""));
    }),
    jQuery("input[name='abs1']").on("click", function (e) {
        $(".chkYes6").is(":checked") ? $(".text-abuso").prop("disabled", !1) : ($(".text-abuso").prop("disabled", !0), $(".text-abuso").val(""));
    }),
    jQuery("input[name='neg1']").on("click", function (e) {
        $(".chkYes7").is(":checked") ? $(".text-neg").prop("disabled", !1) : ($(".text-neg").prop("disabled", !0), $(".text-neg").val(""));
    }),
    jQuery("input[name='mem1']").on("click", function (e) {
        $(".chkYes8").is(":checked") ? $(".maltrato-emo").prop("disabled", !1) : ($(".maltrato-emo").prop("disabled", !0), $(".maltrato-emo").val(""));
    }),
    $(".no_ah").hide(),
    $(".no_ah").hide(),
    jQuery("input[name='mf1']").on("click", function (e) {
        $(".chkYes5").is(":checked") ? $(".text-maltrato").prop("disabled", !1) : $(".text-maltrato").prop("disabled", !0);
    }),
    jQuery("input[name='abs']").on("click", function (e) {
        $(".chkYes6").is(":checked") ? $(".text-abuso").prop("disabled", !1) : $(".text-abuso").prop("disabled", !0);
    }),
    jQuery("input[name='neg']").on("click", function (e) {
        $(".chkYes7").is(":checked") ? $(".text-neg").prop("disabled", !1) : $(".text-neg").prop("disabled", !0);
    }),
    jQuery("input[name='mem']").on("click", function (e) {
        $(".chkYes8").is(":checked") ? $(".maltrato-emo").prop("disabled", !1) : $(".maltrato-emo").prop("disabled", !0);
    }),
    jQuery("input[name='grueso']").on("click", function (e) {
        if ($(".chkNo").is(":checked")) {
            for ($(".ref-neurologia-text").text("Alert : Referir a neurologia"), $(".ref-neurologia-text").slideDown(), $(".triangle-1").slideDown(), i = 0; i < 100; i++) $(".triangle-1").fadeTo("slow", 0.1).fadeTo("slow", 1);
            $(".text-grueso").prop("disabled", !1);
        } else $(".ref-neurologia-text").slideUp(), $(".triangle-1").stop(!0), $(".triangle-1").slideUp(), $(".text-grueso").prop("disabled", !0);
    }),
    jQuery("input[name='fino']").on("click", function (e) {
        if ($(".chkNo2").is(":checked")) {
            for ($(".ref-neurologia-text").text("Alert : Referir a neurologia"), $(".ref-neurologia-text").slideDown(), $(".triangle-2").slideDown(), i = 0; i < 100; i++) $(".triangle-2").fadeTo("slow", 0.1).fadeTo("slow", 1);
            $(".text-fino").prop("disabled", !1);
        } else $(".ref-neurologia-text").slideUp(), $(".triangle-2").stop(!0), $(".triangle-2").slideUp(), $(".text-fino").prop("disabled", !0);
    }),
    jQuery("input[name='lenguage']").on("click", function (e) {
        if ($(".chkNo3").is(":checked")) {
            for ($(".ref-neurologia-text").text("Alert : Referir a neurologia"), $(".ref-neurologia-text").slideDown(), $(".triangle-3").slideDown(), i = 0; i < 100; i++) $(".triangle-3").fadeTo("slow", 0.1).fadeTo("slow", 1);
            $(".text-lenguage").prop("disabled", !1);
        } else $(".ref-neurologia-text").slideUp(), $(".triangle-3").stop(!0), $(".triangle-3").slideUp(), $(".text-lenguage").prop("disabled", !0);
    }),
    jQuery("input[name='social']").on("click", function (e) {
        if ($(".chkNo4").is(":checked")) {
            for ($(".ref-neurologia-text").text("Alert : Referir a neurologia"), $(".ref-neurologia-text").slideDown(), $(".triangle-4").slideDown(), i = 0; i < 100; i++) $(".triangle-4").fadeTo("slow", 0.1).fadeTo("slow", 1);
            $(".text-social").prop("disabled", !1);
        } else $(".ref-neurologia-text").slideUp(), $(".triangle-4").stop(!0), $(".triangle-4").slideUp(), $(".text-social").prop("disabled", !0);
    }),
    //$('input[name="fecha_nac2"]').mask("00/00/0000", { placeholder: "--/--/----" }),
    $(".form_date").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f1" }),
    $(".form_date2").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f2" }),
    $(".form_date3").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f3" }),
    $(".form_date4").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f4" }),
    $(".form_date5").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f5" }),
    $(".form_date6").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f6" }),
    $(".form_date7").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f7" }),
    $(".form_date8").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f8" }),
    $(".form_date9").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f9" }),
    $(".form_date10").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f10" }),
    $(".form_date11").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f11" }),
    $(".form_date12").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f12" }),
    $(".form_date13").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f13" }),
    $(".form_date14").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f14" }),
    $(".form_date15").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f15" }),
    $(".form_date16").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f16" }),
    $(".form_date17").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f17" }),
    $(".form_date18").datetimepicker({ autoclose: 1, startView: 2, minView: 2, format: "dd-mm-yyyy", linkField: "mirror_f18" }),
    $(".no_ah").slideDown();
var insert_d = $("#insert_d").val();
$(".bcg").val(insert_d);
var mirror_field = $("#mirror_field").val(),
    mom = moment(mirror_field),
    mom1 = moment(mom).add(2, "months"),
    dosis1 = moment(mom1).format("DD-MM-YYYY"),
    dosiss = moment(mom1);
$(".yel").val(dosis1), $("#mirror_d3").val(dosiss), $("#mirror_d10").val(dosiss), $("#mirror_d5").val(dosiss), $("#mirror_d13").val(dosiss);
var mom2 = moment(mom).add("months", 4),
    dosis2 = moment(mom2).format("DD-MM-YYYY"),
    dosiss2 = moment(mom2);
$(".bl").val(dosis2), $("#mirror_d4").val(dosiss2), $("#mirror_d6").val(dosiss2), $("#mirror_d11").val(dosiss2), $("#mirror_d14").val(dosiss2);
var mom3 = moment(mirror_field).add("months", 8),
    dosis3 = moment(mom3).format("DD-MM-YYYY");
$(".gr").val(dosis3);
var dosisss = moment(mom3);
$("#mirror_d7").val(dosisss), $("#mirror_d12").val(dosisss);
var mom4 = moment(mirror_field).add("months", 18),
    ref1 = moment(mom4).format("DD-MM-YYYY");
$(".bll").val(ref1), $("#mirror_d8").val(mom4), $("#mirror_d15").val(mom4), $("#mirror_d17").val(mom4);
var mom5 = moment(mirror_field).add("years", 4),
    ref2 = moment(mom5).format("DD-MM-YYYY");
$(".grr").val(ref2);
var dosissss = moment(mom5);
$("#mirror_d9").val(dosissss), $("#mirror_d18").val(dosissss);
var mom6 = moment(mirror_field).add("years", 1),
    srp = moment(mom6).format("DD-MM-YYYY");
$("#bcg16").val(srp);
dosiss = moment(mom6);
$("#mirror_d16").val(dosiss),
    $(".form_date").on("change", function (e) {
        $(".atras1").slideDown();
        var i = $("#mirror_f1").val(),
            o = $("#mirror_bcg1").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $(".resf1").val(diffInMinutes), $(".resf11").val(diffInMinutes);
    }),
    $(".form_date2").on("change", function (e) {
        $(".atras2").slideDown();
        var i = $("#mirror_f2").val(),
            o = $("#mirror_bcg2").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $(".resf2").val(diffInMinutes), $(".resf21").val(diffInMinutes);
    }),
    $(".form_date3").on("change", function (e) {
        $(".atras3").slideDown();
        var i = $("#mirror_f3").val(),
            o = $("#mirror_d3").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf3").val(diffInMinutes), $("#resf31").val(diffInMinutes);
    }),
    $(".form_date4").on("change", function (e) {
        $(".atras4").slideDown();
        var i = $("#mirror_f4").val(),
            o = $("#mirror_d4").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf4").val(diffInMinutes), $("#resf41").val(diffInMinutes);
    }),
    $(".form_date5").on("change", function (e) {
        $(".atras5").slideDown();
        var i = $("#mirror_f5").val(),
            o = $("#mirror_d5").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf5").val(diffInMinutes), $("#resf51").val(diffInMinutes);
    }),
    $(".form_date6").on("change", function (e) {
        $("#atras6").slideDown();
        var i = $("#mirror_f6").val(),
            o = $("#mirror_d6").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf6").val(diffInMinutes), $("#resf61").val(diffInMinutes);
    }),
    $(".form_date7").on("change", function (e) {
        $("#atras7").slideDown();
        var i = $("#mirror_f7").val(),
            o = $("#mirror_d7").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf7").val(diffInMinutes), $("#resf71").val(diffInMinutes);
    }),
    $(".form_date8").on("change", function (e) {
        $("#atras8").slideDown();
        var i = $("#mirror_f8").val(),
            o = $("#mirror_d8").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf8").val(diffInMinutes), $("#resf81").val(diffInMinutes);
    }),
    $(".form_date9").on("change", function (e) {
        $("#atras9").slideDown();
        var i = $("#mirror_f9").val(),
            o = $("#mirror_d9").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf9").val(diffInMinutes), $("#resf91").val(diffInMinutes);
    }),
    $(".form_date10").on("change", function (e) {
        $("#atras10").slideDown();
        var i = $("#mirror_f10").val(),
            o = $("#mirror_d10").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf10").val(diffInMinutes), $("#resf101").val(diffInMinutes);
    }),
    $(".form_date11").on("change", function (e) {
        $("#atras11").slideDown();
        var i = $("#mirror_f11").val(),
            o = $("#mirror_d11").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf11").val(diffInMinutes), $("#resf111").val(diffInMinutes);
    }),
    $(".form_date12").on("change", function (e) {
        $("#atras12").slideDown();
        var i = $("#mirror_f12").val(),
            o = $("#mirror_d12").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf12").val(diffInMinutes), $("#resf121").val(diffInMinutes);
    }),
    $(".form_date13").on("change", function (e) {
        $("#atras13").slideDown();
        var i = $("#mirror_f13").val(),
            o = $("#mirror_d13").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf13").val(diffInMinutes), $("#resf131").val(diffInMinutes);
    }),
    $(".form_date14").on("change", function (e) {
        $("#atras14").slideDown();
        var i = $("#mirror_f14").val(),
            o = $("#mirror_d14").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf14").val(diffInMinutes), $("#resf141").val(diffInMinutes);
    }),
    $(".form_date15").on("change", function (e) {
        $("#atras15").slideDown();
        var i = $("#mirror_f15").val(),
            o = $("#mirror_d15").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf15").val(diffInMinutes), $("#resf151").val(diffInMinutes);
    }),
    $(".form_date16").on("change", function (e) {
        $("#atras16").slideDown();
        var i = $("#mirror_f16").val(),
            o = $("#mirror_d16").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf16").val(diffInMinutes), $("#resf161").val(diffInMinutes);
    }),
    $(".form_date17").on("change", function (e) {
        $("#atras17").slideDown();
        var i = $("#mirror_f17").val(),
            o = $("#mirror_d17").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf17").val(diffInMinutes), $("#resf171").val(diffInMinutes);
    }),
    $(".form_date18").on("change", function (e) {
        $("#atras18").slideDown();
        var i = $("#mirror_f18").val(),
            o = $("#mirror_d18").val(),
            r = moment(i),
            a = moment(o);
        r.diff(a);
        (diffInMinutes = r.diff(a, "days")), $("#resf18").val(diffInMinutes), $("#resf181").val(diffInMinutes);
    }),
    $("#frem1").on("click", function (e) {
        $("#atras1").hide();
    }),
    $("#frem2").on("click", function (e) {
        $("#atras2").hide();
    }),
    $("#frem3").on("click", function (e) {
        $("#atras3").hide();
    }),
    $("#frem4").on("click", function (e) {
        $("#atras4").hide();
    }),
    $("#frem5").on("click", function (e) {
        $("#atras5").hide();
    }),
    $("#frem6").on("click", function (e) {
        $("#atras6").hide();
    }),
    $("#frem7").on("click", function (e) {
        $("#atras7").hide();
    }),
    $("#frem8").on("click", function (e) {
        $("#atras8").hide();
    }),
    $("#frem9").on("click", function (e) {
        $("#atras9").hide();
    }),
    $("#frem10").on("click", function (e) {
        $("#atras10").hide();
    }),
    $("#frem11").on("click", function (e) {
        $("#atras11").hide();
    }),
    $("#frem12").on("click", function (e) {
        $("#atras12").hide();
    }),
    $("#frem13").on("click", function (e) {
        $("#atras13").hide();
    }),
    $("#frem14").on("click", function (e) {
        $("#atras14").hide();
    }),
    $("#frem15").on("click", function (e) {
        $("#atras15").hide();
    }),
    $("#frem16").on("click", function (e) {
        $("#atras16").hide();
    }),
    $("#frem17").on("click", function (e) {
        $("#atras17").hide();
    }),
    $("#frem18").on("click", function (e) {
        $("#atras18").hide();
    }),
    $(".desco1").change(function () {
        $(".desco1:checked").length ? $("#peso").prop("disabled", !0) : $("#peso").prop("disabled", !1);
    }),
    $("#desco2").change(function () {
        $("#desco2:checked").length ? $("#talla").prop("disabled", !0) : $("#talla").prop("disabled", !1);
    }),
    $(".modif_ant_pediat").on("click", function (e) {
        $(this).hide(), $(".save_ant_pediat").slideDown(), $(".deactivate_ped:input").prop("disabled", !1), $("textarea").prop("disabled", !1), $("select").prop("disabled", !1);
    });

</script>