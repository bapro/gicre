<script>
function clickSingleA(a)
{
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

items = document.querySelectorAll('.left_hit.active');
if(items.length) 
{
items[0].className = 'left_hit';
}

a.className = 'left_hit active';
$("html, body").animate({ scrollTop: 0 }, 500);
}

$('#otros_al').on('keyup', function() {
var otros_al= $('#otros_al').val();
$('#showal').text(otros_al);
})
	//----toggle intrafamilial
	$('#click_viol').click(function () {
	$('#click_viol').text($('#click_viol').text() == 'Ocultar Violencia Intafamiliar' ? 'Violencia Intafamiliar' : 'Ocultar Violencia Intafamiliar'); 
    $("#violenciaform").slideToggle("slow");
    $("#edit_datav").slideToggle("slow");	
	})
	
	
	
//----Sospecha de Abuso o Maltrato
	$('#click_sospecha_mal').click(function () {
	$('#click_sospecha_mal').text($('#click_sospecha_mal').text() == 'Ocultar Sospecha de Abuso o Maltrato' ? 'Sospecha de Abuso o Maltrato' : 'Ocultar Sospecha de Abuso o Maltrato'); 
    $("#sospecha_mal").slideToggle("slow");
    //$("#edit_datav").slideToggle("slow");	
	})
//show ssr

$("#ssr").on('click', function (e) {
e.preventDefault();	
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/ante_ssr');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
    $("#asidessr").show();
	$("#antechangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#ssrshow").html(data);
	$("#ssrshow").show();
	$(".save_ant_ssr_hide").show();
   $(".save_rehabilidad").hide();
   $("#loadf").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$(".modif_ant_pediat").hide();
	$(".save_enf_act").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	 $(".save_ant_gen").hide();
	$("#pediatricoshow").hide();
    $("#obstetricoshow").hide();
    $("#enfermedadshoww").hide();
	$("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
}

});
});

//---pediatrico---
$("#pediatrico").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/pediatrico');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
    $("#asidessr").show();
	$("#antechangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#pediatricoshow").html(data);
	$("#pediatricoshow").show();
	$(".save_ant_pediat").show();
	$(".save_enf_act").hide();
	$("#loadf").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".modif_ant_pediat").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#ssrshow").hide();
   $("#obstetricoshow").hide();
   $("#enfermedadshoww").hide();
	$("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
	
}

});
});


//-------obstetrico--------------------
$("#obstetrico").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/obstetrico');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
    $("#antechangecolor").css( "color", "#B22222" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#obstetricoshow").html(data);
	$("#obstetricoshow").show();
	 $("#loadf").hide();
	$(".save_ant_obs_hide").show();
	$(".save_enf_act").hide();
	$(".save_cont_pren").hide();
	$(".modif_ant_pediat").hide();
	$(".save_ant_pediat").hide();
	$(".save_cond").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
    $("#enfermedadshoww").hide();
    $("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
}

});
});
//----------------------------show enfermedad
$("#enfermedadshow").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/enfermedadshow');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
   $("#antechangecolor").css( "color", "#191970" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#enfermedadshoww").html(data);
	$("#enfermedadshoww").show();
	$(".save_enf_act").show();
	$(".save_cont_pren").hide();
	 $("#loadf").hide();
	$(".save_cond").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#obstetricoshow").hide();
    $("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$(".modif_ant_pediat").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
}

});
});


//-----------------------------show examen
$("#examenf").on('click', function (e) {

e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/examenf');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#examenshow").html(data);
	$("#examenshow").show();
	$(".save_exa_fisico").show();
	$(".save_enf_act").hide();
	$(".save_cont_pren").hide();
	 $("#loadf").hide();
	$(".save_cond").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
	$(".modif_ant_pediat").hide();
}

});
});

//-------- show examen sistema

$("#examensis").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/examensis');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
$("#antechangecolor").css( "color", "#191970" );
$("#antechangecolor").css( "font-weight", "" );
$("#indchangecolor").css( "color", "#191970" );
$("#examensisshow").html(data);
$("#examensisshow").show();
$(".save_exasis").show();
$("#obstetricoshow").hide();
 $("#loadf").hide();
$(".save_cont_pren").hide();
$(".save_enf_act").hide();
$(".save_cond").hide();
$(".save_ant_obs_hide").hide();
$(".save_ant_pediat").hide();
$(".save_ftalmologia").hide();
$(".save_rehabilidad").hide();
$(".hide_acciones_obs").hide();
$(".save_exa_fisico").hide();
$(".show_modif_ant_ssr").hide();
$(".save_ant_ssr_hide").hide();
$(".save_ant_gen").hide();
$("#ssrshow").hide();
$("#pediatricoshow").hide();
$("#prenatalshow").hide();
$("#signoshow").hide();
$("#examenshow").hide();
$("#enfermedadshoww").hide();
$("#home").hide();
$("#estudiosshow").hide();
$("#recetasshow").hide();
$("#laboratoriosshow").hide();
$("#conclucionshow").hide();
$("#controlprenatalshow").hide();
$("#desarrolloshow").hide();
$("#rehabilitationshow").hide();
$("#oftalmologiashow").hide();
$(".save_ant_pediat_cambia").hide();
$(".modif_ant_pediat").hide();
}

});
});


//-------- show sistemas

$("#recetas").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/recetas');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#indchangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "font-weight", "" );
	$("#recetasshow").html(data);
	$("#recetasshow").show();
	$(".save_enf_act").hide();
	$("#home").hide();
	 $("#loadf").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$("#obstetricoshow").hide();
	$(".save_exasis").hide();
	$(".save_enf_act").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#estudiosshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
	$(".modif_ant_pediat").hide();
	}

});
});


//-------- show estudios

$("#estudios").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/Estudios');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#indchangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "font-weight", "" );
    $("#estudiosshow").html(data);
	$("#estudiosshow").show();
	    $(".save_enf_act").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	 $("#loadf").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$("#obstetricoshow").hide();
	$(".save_exasis").hide();
	$(".save_enf_act").hide();
    $("#ssrshow").hide();
    $("#pediatricoshow").hide();
    $("#prenatalshow").hide();	
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".modif_ant_pediat").hide();
	$(".save_ant_pediat_cambia").hide();
}

});
});

//-------- show laboratorios

$("#laboratorios").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/Laboratorios');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#home").hide();
	$("#indchangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "font-weight", "" );
	$("#laboratoriosshow").html(data);
	$("#laboratoriosshow").show();
	    $(".save_enf_act").hide();
		 $("#loadf").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$("#obstetricoshow").hide();
	$(".save_exasis").hide();
	$(".save_enf_act").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".modif_ant_pediat").hide();
	$(".save_ant_pediat_cambia").hide();
	}

});
});

$("#conclucion").on('click', function (e) {
e.preventDefault();
var historial_id='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/Conclucion');?>',
type: 'post',
data:{historial_id:historial_id},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#home").hide();
	$("#conclucionshow").html(data);
	$(".save_cond").show();
	$(".save_enf_act").hide();
	 $("#loadf").hide();
	$(".save_cont_pren").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#obstetricoshow").hide();
	$("#conclucionshow").show();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#controlprenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".modif_ant_pediat").hide();
	$(".save_ant_pediat_cambia").hide();
	}

});
});

$("#controlprenatal").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/Controprenal');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#antechangecolor").css( "color", "#191970" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#home").hide();
	$("#controlprenatalshow").html(data);
	$("#controlprenatalshow").show();
	$(".save_cont_pren").show();
	$(".save_enf_act").hide();
	 $("#loadf").hide();
	  $("#obstetricoshow").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".save_cond").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$("#prenatalshow").hide();
	$("#conclucionshow").hide();
	$("#ssrshow").hide();
	$("#pediatricoshow").hide();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
	$(".modif_ant_pediat").hide();
    }

});
});
//rehabilitacion
$("#rehabilitation").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/newRehabilitation');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
 $("#asidessr").show();
	$("#antechangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#rehabilitationshow").html(data);
	$("#rehabilitationshow").show();
	$(".save_enf_act").hide();
	 $(".save_ant_ssr_hide").hide();
  $(".save_ant_obs_hide").hide();
   $("#loadf").hide();
   $(".save_ant_pediat").hide(); 
	$(".save_ant_gen").hide(); 
	$(".show_modif_ant_ssr").hide();
	 $(".hide_acciones_obs").hide();
	 $(".save_exasis").hide();
	 $(".save_exa_fisico").hide();
	 $(".save_cont_pren").hide();
	$(".save_cond").hide();
	$(".save_rehabilidad").show();
	$("#oftalmologiashow").hide();
	$("#prenatalshow").hide();
	$("#pediatricoshow").hide();
	$("#ssrshow").hide();
   $("#obstetricoshow").hide();
   $("#enfermedadshoww").hide();
	$("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$("#controlprenatalshow").hide();
	$("#oftalmologiashow").hide();
	$(".save_ant_pediat_cambia").hide();
	$(".modif_ant_pediat").hide();
}

});
});

//oftalmologia
$("#oftalmologia").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/createOftalmologia');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	//window.location.href = "<?php echo site_url("admin/rehabilitation/".$id_historial); ?>";
   $("#asidessr").show();
	$("#antechangecolor").css( "color", "#B22222" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#oftalmologiashow").html(data);
	$("#oftalmologiashow").show();
	$(".save_ftalmologia").show();
	$(".save_enf_act").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	 $("#loadf").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
    $(".save_ant_gen").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
	$("#rehabilitationshow").hide();
	$("#prenatalshow").hide();
	$("#pediatricoshow").hide();
	$("#ssrshow").hide();
   $("#obstetricoshow").hide();
   $("#enfermedadshoww").hide();
	$("#examenshow").hide();
	$("#home").hide();
	$("#signoshow").hide();
	$("#examensisshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
	$(".save_ant_pediat_cambia").hide();
	$("#controlprenatalshow").hide();
	$(".modif_ant_pediat").hide();
}

});
});
//home
$("#homeclick").on('click', function (e) {
	$(".save_enf_act").hide();
	$(".save_ant_obs_hide").hide();
	$(".save_ant_pediat").hide();
	$(".save_ftalmologia").hide();
	$(".save_rehabilidad").hide();
	$(".save_exasis").hide();
	$(".hide_acciones_obs").hide();
	$(".save_exa_fisico").hide();
	$(".show_modif_ant_ssr").hide();
	$(".save_ant_ssr_hide").hide();
	$(".save_cont_pren").hide();
	$(".save_cond").hide();
    $("#home").show();
	 $("#loadf").hide();
	$("#obstetricoshow").hide();
	$("#ssrshow").hide();
	$("#conclucionshow").hide();
	$("#laboratoriosshow").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#save_ant_ssr").hide();
	$(".save_ant_gen").show();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#controlprenatalshow").hide();
	$("#pediatricoshow").hide();
	$("#prenatalshow").hide();
	$("#desarrolloshow").hide();
	$("#rehabilitationshow").hide();
	$("#oftalmologiashow").hide();
	$(".modif_ant_pediat").hide();
	$(".save_ant_pediat_cambia").hide();
	});
	//------------------------SAVE SSR----------------------------------

$('#save_ant_ssr').on('click', function(event) {
event.preventDefault();
$("html, body").animate({ scrollTop: 0 }, 500);
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var inserted_by = $("#inserted_by").val();
var hist_id = $("#hist_id").val();
var operation = $("#operation").val();
var optradio = $('input:radio[name=optradio]:checked').val();
var edad = $("#edad").val();
var idssr = $("#idssr").val();
var numero = $("#numero").val();
var sexual = $("#sexual").val();
var pareja = $("#pareja").val();
var califica_text = $("#califica_text").val();
var menarquia = $("#menarquia").val();
var planif_text = $("#planif_text").val();
var fecha_ul_m = $("#fecha_ul_m").val();
var cliclo_text = $("#cliclo_text").val();
var dura_sang = $("#dura_sang").val();
var ant_pap_re_text = $("#ant_pap_re_text").val();
var realiza_auto_text = $("#realiza_auto_text").val();
var planif = $('input:radio[name=planif]:checked').val();
var embara = $('input:radio[name=embara]:checked').val();
var menaop = $('input:radio[name=menaop]:checked').val();
var cliclo = $('input:radio[name=cliclo]:checked').val();
var dismeno = $('input:radio[name=dismeno]:checked').val();
var ant_pap_re = $('input:radio[name=ant_pap_re]:checked').val();
var realiza_auto = $('input:radio[name=realiza_auto]:checked').val();
var fecha_ul_mama = $('input:radio[name=fecha_ul_mama]:checked').val();
var cant_sang = $('input:radio[name=cant_sang]:checked').val();
var nuligesta = $('input:radio[name=nuligesta]:checked').val();
var complica = $('input:radio[name=complica]:checked').val();
var complica_dur = $('input:radio[name=complica_dur]:checked').val();
var infec_tran = $('input:radio[name=infec_tran]:checked').val();
var califica = $('input:radio[name=califica]:checked').val();
var utilizo = $('input:radio[name=utilizo]:checked').val();
var sexual2 = $('input:radio[name=sexual2]:checked').val();
var fecha_ul_pap = $('input:radio[name=fecha_ul_pap]:checked').val();
var totalGest = $("#totalGest").val();
var e = $("#e").val();
var p = $("#p").val();
var a = $("#a").val();
var c = $("#c").val();
var complica_text = $("#complica_text").val();
var otro_infeccion1 = $("#otro_infeccion1").val();
var complica_dur_text = $("#complica_dur_text").val();
var otro_infeccion = $("#otro_infeccion").val();
var sifilisc = [];
$("input[name='sifilis']:checked").each(function(){
sifilisc.push(this.value);
});

var gonorreac = [];
$("input[name='gonorrea']:checked").each(function(){
gonorreac.push(this.value);
});


var clamidiac = [];
$("input[name='clamidia']:checked").each(function(){
clamidiac.push(this.value);
});
 $.ajax({
type: "POST",
url: "<?=base_url('admin/saveAntssr')?>",
data: {operation:operation,idssr:idssr,optradio:optradio,edad:edad,numero:numero,sexual:sexual,pareja:pareja,
califica:califica,califica_text:califica_text,utilizo:utilizo,sexual2:sexual2,
planif:planif,planif_text:planif_text,embara:embara,menarquia:menarquia,
fecha_ul_m:fecha_ul_m,menaop:menaop,cliclo:cliclo,cliclo_text:cliclo_text,
dura_sang:dura_sang,dismeno:dismeno,fecha_ul_pap:fecha_ul_pap,ant_pap_re:ant_pap_re,
ant_pap_re_text:ant_pap_re_text,realiza_auto:realiza_auto,realiza_auto_text:realiza_auto_text,
fecha_ul_mama:fecha_ul_mama,p:p,a:a,c:c,e:e,totalGest:totalGest,otro_infeccion:otro_infeccion,
otro_infeccion1:otro_infeccion1,cant_sang:cant_sang,nuligesta:nuligesta,complica:complica,
complica_text:complica_text,complica_dur:complica_dur,complica_dur_text:complica_dur_text,
sifilisc:sifilisc,gonorreac:gonorreac,clamidiac:clamidiac,infec_tran:infec_tran,hist_id:hist_id,inserted_by:inserted_by},

cache: true,

success:function(data){
$("#loadf").hide();
$('#msgs-ssr').delay(1000).fadeIn('slow').fadeOut(4000).html('La operación se ha realizado con éxito.');
$("input").prop("disabled", true);
$('#load-re-ssr').hide();
$("#hide_ssr").hide();
$("#show_ss_data").html(data);

}  
});
return false;
});


//-------------------Obstetrico-------------------------------------------
$('#save_ant_obst').on('click', function(event) {
event.preventDefault();
var operationobs = $("#operationobs").val();
$("html, body").animate({ scrollTop: 0 }, 500);
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var hist_id = $("#hist_id").val();
var inserted_by = $("#inserted_by").val();
var dia1  = $('input:radio[name=dia1]:checked').val();
var tbc1 = $('input:radio[name=tbc1]:checked').val();
var hip1 = $('input:radio[name=hip1]:checked').val();
var pelv = $('input:radio[name=pelv]:checked').val();
var inf = $('input:radio[name=inf]:checked').val();
var otros1 = $('input:radio[name=otros1]:checked').val();
var otros1_text = $("#otros1_text").val();

var otros2_text = $("#otros2_text").val();
var gem  = $('input:radio[name=gem]:checked').val();
var otros2 = $('input:radio[name=otros2]:checked').val();
var dia2   = $('input:radio[name=dia2]:checked').val();
var tbc2 = $('input:radio[name=tbc2]:checked').val();
var hip2 = $('input:radio[name=hip2]:checked').val();

var fiebre1 = [];
$("input[name='fiebre']:checked").each(function(){
fiebre1.push(this.value);
});
var artra1 = [];
$("input[name='artra']:checked").each(function(){
artra1.push(this.value);
});
var mia1 = [];
$("input[name='mia']:checked").each(function(){
mia1.push(this.value);
});
var exa1 = [];
$("input[name='exa']:checked").each(function(){
exa1.push(this.value);
});
var con1 = [];
$("input[name='con']:checked").each(function(){
con1.push(this.value);
});

var nig11 = [];
$("input[name='nig1']:checked").each(function(){
nig11.push(this.value);
});

var nig22 = [];
$("input[name='nig2']:checked").each(function(){
nig22.push(this.value);
});

var nig33 = [];
$("input[name='nig3']:checked").each(function(){
nig33.push(this.value);
});

var partos = $("#partos").val();
var arbotos = $("#arbotos").val();
var vaginales = $("#vaginales").val();
var viven = $("#viven").val();
var gestas = $("#gestas").val();
var cesareas = $("#cesareas").val();
var muertos1 = $("#muertos1").val();
var nacidov1 = $("#nacidov1").val();
var nacidom1 = $("#nacidom1").val();
var despues1s = $("#despues1s").val();
var otrosc = $("#otrosc").val();
var fin = $("#fin").val();
var rn = $("#rn").val();
var fecha1 = $("#fecha1").val();
var fecha2 = $("#fecha2").val();
var fecha3 = $("#fecha3").val();
var fecha4 = $("#fecha4").val();
var sono1 = $("#sono1").val();
var sono2 = $("#sono2").val();
var sono3 = $("#sono3").val();
var sono4 = $("#sono4").val();
var fpp1 = $("#fpp1").val();
var fpp2 = $("#fpp2").val();
var fpp3 = $("#fpp3").val();
var fpp4 = $("#fpp4").val();
var rest1 = $("#rest1").val();
var rest2 = $("#rest2").val();
var rest3 = $("#rest3").val();
var rest4 = $("#rest4").val();  
var peso1 = $("#peso1").val();
var talla1 = $("#talla1").val(); 
var fum_cal_ges = $("#fum_cal_ges").val();
var fpp_cal_ges = $("#fpp_cal_ges").val();
var sem_act_a = $("#sem_act_a").val();
var prev_act = $('input:radio[name=prev_act]:checked').val();  
var prev_act_mes = $("#prev_act_mes").val();
 var r2 = $("#2r").val();
 var sencibil = $('input:radio[name=sencibil]:checked').val(); 
var rh = $('input:radio[name=rh]:checked').val();  
var rh_option = $("#rh_option").val();   
var odont = $('input:radio[name=odont]:checked').val();   
var pelvis = $('input:radio[name=pelvis]:checked').val();    
var papani = $('input:radio[name=papani]:checked').val();
var colp = $('input:radio[name=colp]:checked').val(); 
var cevix = $('input:radio[name=cevix]:checked').val();
var vdrl11 = [];
$("input[name='vdrl1']:checked").each(function(){
vdrl11.push(this.value);
});	

var vdrl22 = [];
$("input[name='vdrl2']:checked").each(function(){
vdrl22.push(this.value);
});
var diasmes = $("#diasmes").val();
 
var pu_fecha1 = $("#pu_fecha1").val();
var pu_fecha2 = $("#pu_fecha2").val();
var pu_fecha3 = $("#pu_fecha3").val();
var pu_t1 = $("#pu_t1").val();
var pu_t2 = $("#pu_t2").val();
var pu_t3 = $("#pu_t3").val();
var pu_pul1 = $("#pu_pul1").val();
var pu_pul11 = $("#pu_pul11").val();
var pu_pul2 = $("#pu_pul2").val();
var pu_pul22 = $("#pu_pul22").val();
var pu_pul3 = $("#pu_pul3").val();
var pu_pul33 = $("#pu_pul33").val();
var pu_ten1 = $("#pu_ten1").val();
var pu_ten11 = $("#pu_ten11").val();
var pu_ten2 = $("#pu_ten2").val();
var pu_ten22 = $("#pu_ten22").val();  
var pu_ten3 = $("#pu_ten3").val();
var pu_ten33 = $("#pu_ten33").val(); 
var pu_inv1 = $("#pu_inv1").val();
var pu_inv2 = $("#pu_inv2").val();
var pu_inv3 = $("#pu_inv3").val();
var loquios1 = $("#loquios1").val();  
var loquios2 = $("#loquios2").val();
var loquios3 = $("#loquios3").val(); 
var getidobs = $("#getidobs").val();
$.ajax({
url: '<?php echo site_url('admin/saveObstetrico');?>',
type: 'post',
data:{getidobs:getidobs,operationobs:operationobs,hist_id:hist_id,inserted_by:inserted_by,dia1:dia1,tbc1:tbc1,hip1:hip1,pelv:pelv,inf:inf,otros1:otros1,otros1_text:otros1_text,
dia2:dia2,tbc2:tbc2,hip2:hip2,gem:gem,otros2:otros2,otros2_text:otros2_text,fiebre1:fiebre1,artra1:artra1,mia1:mia1,exa1:exa1,con1:con1,
nig11:nig11,nig22:nig22,nig33:nig33,partos:partos,arbotos:arbotos,vaginales:vaginales,viven:viven,gestas:gestas,cesareas:cesareas,
muertos1:muertos1,nacidov1:nacidov1,nacidom1:nacidom1,despues1s:despues1s,otrosc:otrosc,fin:fin,rn:rn,fecha1:fecha1,fecha2:fecha2,fecha3:fecha3,
fecha4:fecha4,sono1:sono1,sono2:sono2,sono3:sono3,sono4:sono4,fpp1:fpp1,fpp2:fpp2,fpp3:fpp3,fpp4:fpp4,rest1:rest1,rest2:rest2,rest3:rest3,rest4:rest4,
peso1:peso1,talla1:talla1,fum_cal_ges:fum_cal_ges,fpp_cal_ges:fpp_cal_ges,sem_act_a:sem_act_a,prev_act:prev_act,prev_act_mes:prev_act_mes,r2:r2,
rh:rh,sencibil:sencibil,rh_option:rh_option,odont:odont,pelvis:pelvis,papani:papani,colp:colp,cevix:cevix,vdrl11:vdrl11,vdrl22:vdrl22,diasmes:diasmes,
pu_fecha1:pu_fecha1,pu_fecha2:pu_fecha2,pu_fecha3:pu_fecha3,pu_t1:pu_t1,pu_t2:pu_t2,pu_t3:pu_t3,pu_pul1:pu_pul1,pu_pul11:pu_pul11,pu_pul2:pu_pul2,
pu_pul22:pu_pul22,pu_pul3:pu_pul3,pu_pul33:pu_pul33,pu_ten1:pu_ten1,pu_ten11:pu_ten11,pu_ten2:pu_ten2,pu_ten22:pu_ten22,pu_ten3:pu_ten3,pu_ten33:pu_ten33,
pu_inv1:pu_inv1,pu_inv2:pu_inv2,pu_inv3:pu_inv3,loquios1:loquios1,loquios2:loquios2,loquios3:loquios3},
success: function (data) {
$('#msgs-ssr').delay(1000).fadeIn('slow').fadeOut(4000).html('La operación se ha realizado con éxito.');
$("#loadf").hide();
$("input").prop("disabled", true);
$("#hide_obs").hide();
$("#show_obs_data").html(data);
}

});

});


//========================Pediatrico=================================
$('#save_ant_pediat').on('click', function(event) {
event.preventDefault();
var idpedia = $("#idpedia").val();
$("html, body").animate({ scrollTop: 0 }, 500);
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var hist_id = $("#hist_id").val();
var inserted_by = $("#inserted_by").val();
var iden_pedia = $("#iden_pedia").val();
//--------------------------------------------------------------------
var evo = $('input:radio[name=evo]:checked').val();  
var evol_text = $("#evol_text").val();
var med = $("#med").val();
var dosis = $("#dosis").val();
var tiempo = $("#tiempo").val();
var edad = $("#edad").val();
var via = $("#via").val();
var tnaci = $('input:radio[name=tnaci]:checked').val();
var describa = $("#describa").val(); 
var edad_gest = $("#edad_gest").val(); 
var peso = $("#peso").val(); 
var descoa = [];
$("input[name='desco1']:checked").each(function(){
descoa.push(this.value);
});
var talla = $("#talla").val(); 

var descob = [];
$("input[name='desco2']:checked").each(function(){
descob.push(this.value);
});

var lactamat1 = [];
$("input[name='lactamat']:checked").each(function(){
lactamat1.push(this.value);
});

var leche1 = [];
$("input[name='leche']:checked").each(function(){
leche1.push(this.value);
});
var otrosinfo = $("#otrosinfo").val(); 
var traum = $('input:radio[name=traum]:checked').val();
var traum_text = $("#traum_text").val();
var trans = $('input:radio[name=trans]:checked').val(); 
var trans_text = $("#trans_text").val(); 
//---------------------------------------------------------------
var textmaltrato = $("#textmaltrato").val();
var textabuso = $("#textabuso").val();
var textneg = $("#textneg").val();
var maltratoemo = $("#maltratoemo").val();
//--------------------------------------------
var textgrueso = $("#text-grueso").val();
var textfino = $("#text-fino").val();
var textlenguage = $("#text-lenguage").val();
var textsocial = $("#text-social").val();

//--------------------------------------------
var ale1 = [];
$("input[name='ale']:checked").each(function(){
ale1.push(this.value);
});
var hep1 = [];
$("input[name='hep']:checked").each(function(){
hep1.push(this.value);
});
var amig1 = [];
$("input[name='amig']:checked").each(function(){
amig1.push(this.value);
});
var infv1 = [];
$("input[name='infv']:checked").each(function(){
infv1.push(this.value);
});
var asm1 = [];
$("input[name='asm']:checked").each(function(){
asm1.push(this.value);
});

var neum1 = [];
$("input[name='neum']:checked").each(function(){
neum1.push(this.value);
});

var cirug1 = [];
$("input[name='cirug']:checked").each(function(){
cirug1.push(this.value);
});

var otot1 = [];
$("input[name='otot']:checked").each(function(){
otot1.push(this.value);
});

var deng1 = [];
$("input[name='deng']:checked").each(function(){
deng1.push(this.value);
});


var pape1 = [];
$("input[name='pape']:checked").each(function(){
pape1.push(this.value);
});

var diar1 = [];
$("input[name='diar']:checked").each(function(){
diar1.push(this.value);
});

var paras1 = [];
$("input[name='paras']:checked").each(function(){
paras1.push(this.value);
});

var zika1 = [];
$("input[name='zika']:checked").each(function(){
 zika1.push(this.value);
});

var saram1 = [];
$("input[name='saram']:checked").each(function(){
 saram1.push(this.value);
});

var chicun1 = [];
$("input[name='chicun']:checked").each(function(){
 chicun1.push(this.value);
});


var varicela1 = [];
$("input[name='varicela']:checked").each(function(){
 varicela1.push(this.value);
});


var falc1 = [];
$("input[name='falc']:checked").each(function(){
 falc1.push(this.value);
});

var otros_t_text = $("#otros_t_text").val();

//===VACUNACION=========================================

var insert_d = $("#insert_d").val();

var no_ap1 = $("#no_ap11").val();
var bcg1 = $("#bcg1").val();
var resf1 = $("#resf1").val();

var no_ap2 = $("#no_ap22").val();
var bcg2 = $("#bcg2").val();
var resf2 = $("#resf2").val();

var no_ap3 = $("#no_ap33").val();
var  yel3 = $("#yel3").val();
var resf3 = $("#resf3").val();

var no_ap4 = $("#no_ap44").val();
var  bl4 = $("#bl4").val();
var resf4 = $("#resf4").val();

var  no_ap5 = $("#no_ap55").val();
var  yel5 = $("#yel5").val();
var resf5 = $("#resf5").val();

var no_ap6 = $("#no_ap66").val();
var  bl6 = $("#bl6").val();
var resf6 = $("#resf6").val();

var  no_ap7 = $("#no_ap77").val();
var  gr7 = $("#gr7").val();
var resf7 = $("#resf7").val();

var  no_ap8 = $("#no_ap88").val();
var  bll8 = $("#bll8").val();
var resf8 = $("#resf8").val();

var  no_ap9 = $("#no_ap99").val(); 
var  grr9 = $("#grr9").val();
var resf9 = $("#resf9").val();

var  no_ap10 = $("#no_ap1010").val();
var  yel10 = $("#yel10").val();
var resf10 = $("#resf10").val();

var  no_ap11 = $("#no_ap1111").val();
 var bl11 = $("#bl11").val();
 var resf11 = $("#resf11").val();
 
var  no_ap12 = $("#no_ap1212").val();
var gr12 = $("#gr12").val();
var resf12 = $("#resf12").val();

var no_ap13 = $("#no_ap1313").val();
var yel13 = $("#yel13").val();
var resf13 = $("#resf13").val();

var  no_ap14 = $("#no_ap1414").val();
var  bl14 = $("#bl14").val();
var resf14 = $("#resf14").val();

var no_ap15 = $("#no_ap1515").val();
var  bll15 = $("#bll15").val();
var resf15 = $("#resf15").val();

 var no_ap16 = $("#no_ap1616").val();
var  srp16 = $("#bcg16").val();
var resf16 = $("#resf16").val();

var  no_ap17 = $("#no_ap1717").val();
var  bll17 = $("#bll17").val();
var resf17 = $("#resf17").val();

var  no_ap18 = $("#no_ap1818").val();
 var grr18 = $("#grr18").val();
 var resf18 = $("#resf18").val();
 var editpedia = $("#editpedia").val();
$.ajax({
url: '<?php echo site_url('admin/savePedia');?>',
type: 'post',

data:{editpedia:editpedia, idpedia:idpedia,hist_id:hist_id,inserted_by:inserted_by,ale1:ale1,otros_t_text:otros_t_text,hep1:hep1,amig1:amig1,infv1:infv1,asm1:asm1,neum1:neum1,cirug1:cirug1,otot1:otot1,deng1:deng1,pape1:pape1,diar1:diar1,paras1:paras1,zika1:zika1,saram1:saram1,chicun1:chicun1,varicela1:varicela1,falc1:falc1,
textmaltrato:textmaltrato,textabuso:textabuso,textneg:textneg,maltratoemo:maltratoemo,textsocial:textsocial,textlenguage:textlenguage,textfino:textfino,textgrueso:textgrueso,
evo:evo,evol_text:evol_text,med:med,/*dosis:dosis,tiempo:tiempo,edad:edad,via:via,*/tnaci:tnaci,describa:describa,edad_gest:edad_gest,peso:peso,talla:talla,descoa:descoa,descob:descob,lactamat1:lactamat1,leche1:leche1,otrosinfo:otrosinfo,traum_text:traum_text,trans_text:trans_text,
insert_d:insert_d, no_ap1:no_ap1, bcg1:bcg1,resf1:resf1,no_ap2:no_ap2,bcg2:bcg2,resf2:resf2,no_ap3:no_ap3,yel3:yel3,resf3:resf3, no_ap4:no_ap4, bl4:bl4, resf4:resf4,no_ap5:no_ap5,yel5:yel5,resf5:resf5,no_ap6:no_ap6, bl6:bl6,resf6:resf6,
no_ap7:no_ap7,gr7:gr7,resf7:resf7,no_ap8:no_ap8,bll8:bll8,resf8:resf8,no_ap9:no_ap9,grr9:grr9,resf9:resf9,no_ap10:no_ap10,yel10:yel10,resf10:resf10,no_ap11:no_ap11,bl11:bl11,resf11:resf11,no_ap12:no_ap12,gr12:gr12,resf12:resf12,no_ap13:no_ap13,yel13:yel13,resf13:resf13,
no_ap14:no_ap14,bl14:bl14,resf14:resf14,no_ap15:no_ap15,bll15:bll15,resf15:resf15,no_ap16:no_ap16,srp16:srp16,resf16:resf16,no_ap17:no_ap17,bll17:bll17,resf17:resf17,no_ap18:no_ap18,grr18:grr18,resf18:resf18
},

success: function (data) {
$('#loadf').hide();
$("#hide_pedia").hide();
$("#show_pedia").html(data);	
//$("input").prop("disabled", true);
$('#msgs-ssr').html('Operación hecha con éxito.').fadeIn('slow').delay(5000).fadeOut('slow');

}

});

});


$("#send_name").on('click', function (e) {
e.preventDefault();
var new_name  = $("#new_name").val();
var location  = $("#location").val();
$.ajax({
url: '<?php echo site_url('admin/save_new_name');?>',
type: 'post',
data:{new_name:new_name,location:location},
success: function (data) {
	$('#info_campo').text("éxito de inserción !");
	$('#form_name')[0].reset();
}

});
});



//===============enfermedad actual==============================
$('#save_enf_act').on('click', function(event) {
$(".success-send-enf").fadeIn(600).html('<span class="load"><img style="width:30px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var enf_motivo = $("#enf_motivo").val();
var enf_signopsis = $("#enf_signopsis").val();
var enf_laboratorios = $("#enf_laboratorios").val();
var enf_estudios = $("#enf_estudios").val();
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveEnfermedad')?>",
data: {enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#success-send-enf').hide(); 
$("#enfermedad_hide").hide(); 
$("#enfermedad_show").html(data);

}  
});

return false;
});



//======================Rehabilitacion==========================================
$('#save_rehabilidad').on('click', function(event) {
$('html, body').animate({ scrollTop: 0 }, 0);
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var marcha_inicio   = $("#marcha_inicio").val();
 var long_mov_der  = $("#long_mov_der").val();
 var  long_mov_izq  = $("#long_mov_izq").val();
 var long_simetria = $("#long_simetria").val();
var long_fluidez   = $("#long_fluidez").val();
 var long_traject   = $("#long_traject ").val();
 var  long_tronco  = $("#long_tronco").val();
 var long_postura = $("#long_postura").val();
 var equi_sentado   = $("#equi_sentado").val();
 var equi_levantarse  = $("#equi_levantarse").val();
 var  equi_intentos  = $("#equi_intentos").val();
 var equi_biped1 = $("#equi_biped1").val();
var equi_biped2   = $("#equi_biped2").val();
 var equi_emp  = $("#equi_emp").val();
 var equi_ojos  = $("#equi_ojos").val();
 var equi_vuelta = $("#equi_vuelta").val();
 var equi_sentarse   = $("#equi_sentarse").val();
 var eval_balsys  = $("#eval_balsys").val();
 var  eval_movim   = $("#eval_movim").val();
 var eval_monop = $("#eval_monop").val();
var criteria_intens   = $("#criteria_intens").val();
 var criteria_cuidado1  = $("#criteria_cuidado1").val();
 var levantar_peso  = $("#levantar_peso").val();
 var criteria_caminar = $("#criteria_caminar").val();
 var criteria_estar_sent   = $("#criteria_estar_sent").val();
 var criteria_dormir  = $("#criteria_dormir").val();
 var criteria_sexual  = $("#criteria_sexual").val();
 var criteria_vida = $("#criteria_vida").val();
var historial_id = $("#historial_id").val();
 var inserted_by = $("#inserted_by").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/saveRehabilidad')?>",
data:{ marcha_inicio:marcha_inicio,long_mov_der:long_mov_der,long_mov_izq:long_mov_izq,long_simetria:long_simetria,
long_fluidez:long_fluidez,long_traject:long_traject,long_tronco:long_tronco,long_postura:long_postura,
equi_sentado:equi_sentado,equi_levantarse:equi_levantarse,equi_intentos:equi_intentos,equi_biped1:equi_biped1,
equi_biped2:equi_biped2,equi_emp:equi_emp,equi_ojos:equi_ojos,equi_vuelta:equi_vuelta,equi_sentarse:equi_sentarse,
eval_balsys:eval_balsys,eval_movim:eval_movim,eval_monop:eval_monop,criteria_intens:criteria_intens,criteria_cuidado1:criteria_cuidado1,
levantar_peso:levantar_peso,criteria_caminar:criteria_caminar,criteria_estar_sent:criteria_estar_sent,criteria_dormir:criteria_dormir,
criteria_sexual:criteria_sexual,criteria_vida:criteria_vida,historial_id:historial_id,inserted_by:inserted_by},

cache: true,
success:function(data){ 

$("#loadf").hide();

$("#hide-rehab").hide();
$("#show-rehab").html(data);
$('#msgs-ssr').html('Operación hecha con éxito.').fadeIn('slow').delay(4000).fadeOut('slow');

}  
});

return false;
});



//==========examen sis====================
$('#save_exasis').on('click', function(event) {
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
var sisneuro  = $("#sisneuro").val();
var neurologico  = $("#neurologico").val();
var siscardio  = $("#siscardio").val();
var cardiova  = $("#cardiova").val();
var sist_uro  = $("#sist_uro").val();
var urogenital  = $("#urogenital").val();
var sis_mu_e  = $("#sis_mu_e").val();
var musculoes  = $("#musculoes").val();
var sist_resp  = $("#sist_resp").val();
var nervioso = $("#nervioso").val();
var linfatico = $("#linfatico").val();
var digestivo = $("#digestivo").val();
var respiratorio = $("#respiratorio").val();
var genitourinario = $("#genitourinario").val();
var sist_diges = $("#sist_diges").val();
var sist_endo = $("#sist_endo").val();
var endocrino = $("#endocrino").val();
var sist_rela = $("#sist_rela").val();
var otros_ex_sis = $("#otros_ex_sis").val();
var dorsales = $("#dorsales").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveSExamSis')?>",
data:{sisneuro:sisneuro,neurologico:neurologico,siscardio:siscardio,cardiova:cardiova,
sist_uro:sist_uro,urogenital:urogenital,sis_mu_e:sis_mu_e,musculoes:musculoes,
sist_resp:sist_resp,nervioso:nervioso,linfatico:linfatico,digestivo:digestivo,
respiratorio:respiratorio,genitourinario:genitourinario,sist_diges:sist_diges,
sist_endo:sist_endo,endocrino:endocrino,sist_rela:sist_rela,otros_ex_sis:otros_ex_sis,
dorsales:dorsales,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$("#loadf").hide();
$('#msgs-ssr').delay(1000).fadeIn('slow').fadeOut(4000).html('La operación se ha realizado con éxito.');
$("#hide_all2").hide();
$("#show_all2").html(data);
$("#show_all2").show();
}  
});

return false;
});


//====Examen fisico===============================
$('#save_exa_fisico').on('click', function(event) {
$('html, body').animate({ scrollTop: 0 }, 0);
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
//------Signos vitales--------------------------
var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var radio_signo= $("input[name='radio_signo']:checked").val();

//------------------------------Neurologico---------------------
var neuro_text = $("#neuro_text").val();
var cabeza = $("#cabeza").val();
var cuello = $("#cuello").val();
var cabeza_text = $("#cabeza_text").val();
var cuello_text = $("#cuello_text").val();
var abd_insp = $("#abd_insp").val();
var ausc = $("#ausc").val();
var perc = $("#perc").val();
var palpa = $("#palpa").val();
var ext_sup_text = $("#ext_sup_text").val();
var ext_sup = $("#ext_sup").val();
var ext_inf = $("#ext_inf").val();
var ext_inft = $("#ext_inft").val();
var rectal = $("#rectal").val();
var rectal_text = $("#rectal_text").val();
var genitalm = $("#genitalm").val();
var vagina = $("#vagina").val();
var vagina_text = $("#vagina_text").val();
var genitalm_text = $("#genitalm_text").val();
var genitalf = $("#genitalf").val();
var genitalf_text = $("#genitalf_text").val();
var torax = $("#torax").val();
var torax_text = $("#torax_text").val();
var corazon_text = $("#corazon_text").val();
var pulmones_text = $("#pulmones_text").val();
var abdomen_text = $("#abdomen_text").val(); 

//------------------------------Examen de Ambas Mamas--------------------- 
//--------------------left------
var cuad_inf_ext1 = $("#cuad_inf_ext1").val(); 
var mama_izq1 = $("#mama_izq1").val();
var cuad_sup_ext1 = $("#cuad_sup_ext1").val();
var cuad_inf_ext11 = $("#cuad_inf_ext11").val();
var region_retro1 = $("#region_retro1").val();
var region_areola_pezon1 = $("#region_areola_pezon1").val();
var region_ax1 = $("#region_ax1").val();

//-------------------right--------------
var cuad_inf_ext2 = $("#cuad_inf_ext2").val(); 
var mama_izq2 = $("#mama_izq2").val();
var cuad_sup_ext2 = $("#cuad_sup_ext2").val();
var cuad_inf_ext22 = $("#cuad_inf_ext22").val();
var region_retro2 = $("#region_retro2").val();
var region_areola_pezon2 = $("#region_areola_pezon2").val();
var region_ax2 = $("#region_ax2").val();
        
//--------------------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual---------------------------

var especuloscopia= $("input[name='especuloscopia']:checked").val();
var tacto_bima= $("input[name='tacto_bima']:checked").val();
var cervix  = $("#cervix").val()
var cervix_text  = $("#cervix_text").val()
var utero_text  = $("#utero_text").val()
var anexo_derecho_text  = $("#anexo_derecho_text").val()
var anexo_iz_text  = $("#anexo_iz_text").val()
var inspection_vulval  = $("#inspection_vulval").val()
var inspection_vulval_text  = $("#inspection_vulval_text").val()
var extremidades_inf  = $("#extremidades_inf").val()
var extremidades_inf_text  = $("#extremidades_inf_text").val()
var otros_examen  = $("#otros_examen").val(); 
var neuro_s  = $("#neuro_s").val();  
//-----------------------------------------------
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveExamenFisico')?>",
data:{peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,//signo end
//begin neurologia
neuro_s:neuro_s,neuro_text:neuro_text, cabeza:cabeza, cabeza_text:cabeza_text, cuello:cuello, 
cuello_text:cuello_text,abd_insp:abd_insp, ausc:ausc,perc:perc,palpa:palpa,ext_sup:ext_sup, ext_sup_text:ext_sup_text,
torax:torax, torax_text:torax_text,ext_inf:ext_inf,ext_inft:ext_inft,rectal:rectal,rectal_text:rectal_text,
genitalm_text:genitalm_text,genitalm:genitalm,genitalf_text:genitalf_text,genitalf:genitalf,
corazon_text:corazon_text, pulmones_text:pulmones_text,abdomen_text:abdomen_text,vagina:vagina,vagina_text:vagina_text,
//begin Examen de Ambas Mamas
/*-left */cuad_inf_ext1:cuad_inf_ext1, mama_izq1:mama_izq1, cuad_sup_ext1:cuad_sup_ext1,
cuad_inf_ext11:cuad_inf_ext11, region_retro1:region_retro1, 
region_areola_pezon1:region_areola_pezon1,region_ax1:region_ax1,//left end
/*-right */cuad_inf_ext2:cuad_inf_ext2, mama_izq2:mama_izq2, 
cuad_sup_ext2:cuad_sup_ext2,cuad_inf_ext22:cuad_inf_ext22, region_retro2:region_retro2, 
region_areola_pezon2:region_areola_pezon2,region_ax2:region_ax2,//end Examen de Ambas Mamas
//begin Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
especuloscopia:especuloscopia, tacto_bima:tacto_bima, cervix:cervix, cervix_text:cervix_text, utero_text:utero_text,
anexo_derecho_text:anexo_derecho_text, anexo_iz_text:anexo_iz_text,
 inspection_vulval:inspection_vulval,
inspection_vulval_text:inspection_vulval_text, extremidades_inf:extremidades_inf,
extremidades_inf_text:extremidades_inf_text, 
inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#loadf').hide();
$('#msgs-ssr').html('Operación hecha con éxito.').fadeIn('slow').delay(3000).fadeOut('slow');
$("#hide_exam_fisico_after_select").hide();
$("#show_exam_fisico_after_select").html(data);



}  
});

return false;
});



//Conclusion diagnostic===================
$('#save_cond').on('click', function(event) {
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 var plan   = $("#plan").val();
  var id_con   = $(".id_con").val();
 var diagno_def  = $("#diagno_def").val();
 var procedimiento = $("#procedimiento").val();
 var evolucion = $("#evolucion").val();
var conclusion_radio = $('input:radio[name=conclusion_radio]:checked').val();
var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveConcluciones')?>",
data:{id_con:id_con, plan:plan, diagno_def:diagno_def,procedimiento:procedimiento,evolucion:evolucion,conclusion_radio:conclusion_radio,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){
$('#loadf').hide();
$('#msgs-ssr').html('Operación hecha con éxito.').fadeIn('slow').delay(5000).fadeOut('slow');
$("#hide_allc").hide();
$("#show_allc").html(data);



}  
});

return false;
});
//=================================================================

  $('#bthide').click(function(){
   id = $(this).attr('title');
   txt = $(this).text();
   if (txt == 'Ocultar'){
  
     $(this).text('Mostrar');
	 $(".not-stuck").css("margin-top", "100px");
	 $(".stuck").css("margin-top", "-45px");
	 $(".push-save-down").css("margin-top", "-129px");
   }
   else{
      $(this).text('Ocultar');
	  $(".not-stuck").css("margin-top", "180px");
	  $(".stuck").css("margin-top", "-4px");
	  $(".push-save-down").css("margin-top", "-129px");
	  
   }
   $("#"+id).slideToggle(200);
   

  });
  
  
  
  
  
  
  
  $('#save_cont_pren').on('click', function(event) {
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 var fecha   = $("#fecha").val();
 var semana  = $("#semana").val();
 var peso = $("#peso").val();
 
  var tension1   = $("#tension1").val();
 var tension11  = $("#tension11").val();
 
 var alt1 = $("#alt1").val();
 var alt11 = $("#alt11").val();
 var alt111 = $("#alt111").val();
 
  var fetal1   = $("#fetal1").val();
 var fetal11  = $("#fetal11").val();
 
 var edema1   = $("#edema1").val();
 var edema11  = $("#edema11").val();

 var otros   = $("#otros").val();
 var evolucion  = $("#evolucion").val();

var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();

//-----------------------------control prenatal2 --------------------------

 var fecha2   = $("#fecha2").val();
 var semana2  = $("#semana2").val();
 var peso2 = $("#peso2").val();
 
  var tension2   = $("#tension2").val();
 var tension22  = $("#tension22").val();
 
 var alt2 = $("#alt2").val();
 var alt22 = $("#alt22").val();
 var alt222 = $("#alt222").val();
 
  var fetal2   = $("#fetal2").val();
 var fetal22  = $("#fetal22").val();
 
 var edema2   = $("#edema2").val();
 var edema22  = $("#edema22").val();
 var otros2   = $("#otros2").val();
 var evolucion2  = $("#evolucion2").val();

 //---------------------------control prenatal3------------------------------
  var fecha3   = $("#fecha3").val();
 var semana3  = $("#semana3").val();
 var peso3 = $("#peso3").val();
 
  var tension3   = $("#tension3").val();
 var tension33  = $("#tension33").val();
 
 var alt3 = $("#alt3").val();
 var alt33 = $("#alt33").val();
 var alt333 = $("#alt333").val();
 
  var fetal3   = $("#fetal3").val();
 var fetal33  = $("#fetal33").val();
 
 var edema3   = $("#edema3").val();
 var edema33  = $("#edema33").val();
  var otros3   = $("#otros3").val();
 var evolucion3  = $("#evolucion3").val();
 
 //----------------------control prenatal4-----------------------------------
  var fecha4   = $("#fecha4").val();
 var semana4  = $("#semana4").val();
 var peso4 = $("#peso4").val();
 
  var tension4   = $("#tension4").val();
 var tension44  = $("#tension44").val();
 
 var alt4 = $("#alt4").val();
 var alt44 = $("#alt44").val();
 var alt444 = $("#alt444").val();
 
  var fetal4   = $("#fetal4").val();
 var fetal44  = $("#fetal44").val();
 
 var edema4   = $("#edema4").val();
 var edema44  = $("#edema44").val();
  var otros4   = $("#otros4").val();
 var evolucion4  = $("#evolucion4").val();
 
 //-------------------------contro prenatal5--------------------------------
 
  var fecha5   = $("#fecha5").val();
 var semana5  = $("#semana5").val();
 var peso5 = $("#peso5").val();
 
  var tension5   = $("#tension5").val();
 var tension55  = $("#tension55").val();
 
 var alt5 = $("#alt5").val();
 var alt55 = $("#alt55").val();
 var alt555 = $("#alt555").val();
 
  var fetal5   = $("#fetal5").val();
 var fetal55  = $("#fetal55").val();
 
 var edema5   = $("#edema5").val();
 var edema55  = $("#edema55").val();
  var otros5   = $("#otros5").val();
 var evolucion5  = $("#evolucion5").val();
 
 //-----------------------------contro prenatal6-----------------------------
 
  var fecha6   = $("#fecha6").val();
 var semana6  = $("#semana6").val();
 var peso6 = $("#peso6").val();
 
  var tension6   = $("#tension6").val();
 var tension66  = $("#tension66").val();
 
 var alt6 = $("#alt6").val();
 var alt66 = $("#alt66").val();
 var alt666 = $("#alt666").val();
 
  var fetal6   = $("#fetal6").val();
 var fetal66  = $("#fetal66").val();
 
 var edema6   = $("#edema6").val();
 var edema66  = $("#edema66").val();
  var otros6   = $("#otros6").val();
 var evolucion6  = $("#evolucion6").val();
 
 //--------------------contro prenatal7-------------------------------------
 
 var fecha7   = $("#fecha7").val();
 var semana7  = $("#semana7").val();
 var peso7 = $("#peso7").val();
 
  var tension7   = $("#tension7").val();
 var tension77  = $("#tension77").val();
 
 var alt7 = $("#alt7").val();
 var alt77 = $("#alt77").val();
 var alt777 = $("#alt777").val();
 
  var fetal7   = $("#fetal7").val();
 var fetal77  = $("#fetal77").val();
 
 var edema7   = $("#edema7").val();
 var edema77  = $("#edema77").val();
  var otros7   = $("#otros7").val();
 var evolucion7  = $("#evolucion7").val();
 
 //----------------------contro prenatal8------------------------------
  var fecha8   = $("#fecha8").val();
 var semana8  = $("#semana8").val();
 var peso8 = $("#peso8").val();
 
  var tension8   = $("#tension8").val();
 var tension88  = $("#tension88").val();
 
 var alt8 = $("#alt8").val();
 var alt88 = $("#alt88").val();
 var alt888 = $("#alt888").val();
 
  var fetal8   = $("#fetal8").val();
 var fetal88  = $("#fetal88").val();
 
 var edema8   = $("#edema8").val();
 var edema88  = $("#edema88").val();
  var otros8   = $("#otros8").val();
 var evolucion8  = $("#evolucion8").val();
 
 //------------------------------control prenal9---------------------------
 
  var fecha9   = $("#fecha9").val();
 var semana9  = $("#semana9").val();
 var peso9 = $("#peso9").val();
 
  var tension9   = $("#tension9").val();
 var tension99  = $("#tension99").val();
 
 var alt9 = $("#alt9").val();
 var alt99 = $("#alt99").val();
 var alt999 = $("#alt999").val();
 
  var fetal9   = $("#fetal9").val();
 var fetal99  = $("#fetal99").val();
 
 var edema9   = $("#edema9").val();
 var edema99  = $("#edema99").val();
  var otros9   = $("#otros9").val();
 var evolucion9  = $("#evolucion9").val();
 

$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveConPrenatales')?>",
data:{ fecha:fecha, semana:semana,peso:peso,
tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
otros:otros,evolucion:evolucion,
//2
 fecha2:fecha2, semana2:semana2,peso2:peso2,
tension2:tension2,tension22:tension22,alt2:alt2,alt22:alt22,alt222:alt222,
fetal2:fetal2,fetal22:fetal22, edema2:edema2,edema22:edema22,
otros2:otros2,evolucion2:evolucion2,
//3
 fecha3:fecha3, semana3:semana3,peso3:peso3,
tension3:tension3,tension33:tension33,alt3:alt3,alt33:alt33,alt333:alt333,
fetal3:fetal3,fetal33:fetal33, edema3:edema3,edema33:edema33,
otros3:otros3,evolucion3:evolucion3,
//4
 fecha4:fecha4, semana4:semana4,peso4:peso4,
tension4:tension4,tension44:tension44,alt4:alt4,alt44:alt44,alt444:alt444,
fetal4:fetal4,fetal44:fetal44, edema4:edema4,edema44:edema44,
otros4:otros4,evolucion4:evolucion4,
//5
 fecha5:fecha5, semana5:semana5,peso5:peso5,
tension5:tension5,tension55:tension55,alt5:alt5,alt55:alt55,alt555:alt555,
fetal5:fetal5,fetal55:fetal55, edema5:edema5,edema55:edema55,
otros5:otros5,evolucion5:evolucion5,
//6
 fecha6:fecha6, semana6:semana6,peso6:peso6,
tension6:tension6,tension66:tension66,alt6:alt6,alt66:alt66,alt666:alt666,
fetal6:fetal6,fetal66:fetal66, edema6:edema6,edema66:edema66,
otros6:otros6,evolucion6:evolucion6,
//7
 fecha7:fecha7, semana7:semana7,peso7:peso7,
tension7:tension7,tension77:tension77,alt7:alt7,alt77:alt77,alt777:alt777,
fetal7:fetal7,fetal77:fetal77, edema7:edema7,edema77:edema77,
otros7:otros7,evolucion7:evolucion7,
//8
 fecha8:fecha8, semana8:semana8,peso8:peso8,
tension8:tension8,tension88:tension88,alt8:alt8,alt88:alt88,alt888:alt888,
fetal8:fetal8,fetal88:fetal88, edema8:edema8,edema88:edema88,
otros8:otros8,evolucion8:evolucion8,
//9
 fecha9:fecha9, semana9:semana9,peso9:peso9,
tension9:tension9,tension99:tension99,alt9:alt9,alt99:alt99,alt999:alt999,
fetal9:fetal9,fetal99:fetal99, edema9:edema9,edema99:edema99,
otros9:otros9,evolucion9:evolucion9,
inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#loadf').hide();
$('#msgs-ssr').html('Operación hecha con éxito.').fadeIn('slow').delay(5000).fadeOut('slow');
$("#hide_cont_pren").hide();
$("#show_cont_pren").html(data);



}  
});

return false;
});
</script>