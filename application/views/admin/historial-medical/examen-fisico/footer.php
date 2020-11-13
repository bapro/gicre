
<script>

$('#save_exam_fis_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var id_sig  = $("#id_sig").val();

 //save examen fisico
 
 //------Signos vitales--------------------------
var peso = $("#pesoex").val();
var kg = $("#kgex").val();
var talla = $("#tallaex").val();
var imc = $("#imcex").val();
var ta = $("#taex").val();
var fr = $("#frex").val();
var fc = $("#fcex").val();
var hg = $("#hgex").val();
var tempo = $("#tempoex").val();
var pulso = $("#pulsoex").val();
var radio_signo= $("input[name='radio_signoex']:checked").val();

//------------------------------Neurologico---------------------
var neuro_s = $("#neuro_sex").val();
var neuro_text = $("#neuro_textex").val();
var cabeza = $("#cabezaex").val();
var cuello = $("#cuelloex").val();
var cabeza_text = $("#cabeza_textex").val();
var cuello_text = $("#cuello_textex").val();
var abd_insp = $("#abd_inspex").val();
var ausc = $("#auscex").val();
var perc = $("#percex").val();
var palpa = $("#palpaex").val();
var ext_sup_text = $("#ext_sup_textex").val();
var ext_sup = $("#ext_supex").val();
var ext_inf = $("#ext_infex").val();
var ext_inft = $("#ext_inftex").val();
var rectal = $("#rectalex").val();
var rectal_text = $("#rectal_textex").val();
var genitalm = $("#genitalmex").val();
var vagina = $("#vaginaex").val();
var vagina_text = $("#vagina_textex").val();
var genitalm_text = $("#genitalm_textex").val();
var genitalf = $("#genitalfex").val();
var genitalf_text = $("#genitalf_textex").val();
var torax = $("#toraxex").val();
var torax_text = $("#torax_textex").val();


//------------------------------Examen de Ambas Mamas--------------------- 
//--------------------left------
var cuad_inf_ext1 = $("#cuad_inf_ext1ex").val(); 
var mama_izq1 = $("#mama_izq1ex").val();
var cuad_sup_ext1 = $("#cuad_sup_ext1ex").val();
var cuad_inf_ext11 = $("#cuad_inf_ext11ex").val();
var region_retro1 = $("#region_retro1ex").val();
var region_areola_pezon1 = $("#region_areola_pezon1ex").val();
var region_ax1 = $("#region_ax1ex").val();

//-------------------right--------------
var cuad_inf_ext2 = $("#cuad_inf_ext2ex").val(); 
var mama_izq2 = $("#mama_izq2ex").val();
var cuad_sup_ext2 = $("#cuad_sup_ext2ex").val();
var cuad_inf_ext22 = $("#cuad_inf_ext22ex").val();
var region_retro2 = $("#region_retro2ex").val();
var region_areola_pezon2 = $("#region_areola_pezon2ex").val();
var region_ax2 = $("#region_ax2ex").val();


//--------------------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual---------------------------

var especuloscopia= $("input[name='especuloscopiaex']:checked").val();
var tacto_bima= $("input[name='tacto_bimaex']:checked").val();
var cervix  = $("#cervixex").val();
var cervix_text  = $("#cervix_textex").val();
var utero_text  = $("#utero_textex").val();
var anexo_derecho_text  = $("#anexo_derecho_textex").val();
var anexo_iz_text  = $("#anexo_iz_textex").val();
var inspection_vulval  = $("#inspection_vulvalex").val();
var inspection_vulval_text  = $("#inspection_vulval_textex").val();
var extremidades_inf  = $("#extremidades_infex").val();
var extremidades_inf_text  = $("#extremidades_inf_textex").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpExamenFisico')?>",
data: {id_sig:id_sig,updated_by:updated_by,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,//signo end
//begin Examen de Ambas Mamas
/*-left */cuad_inf_ext1:cuad_inf_ext1, mama_izq1:mama_izq1, cuad_sup_ext1:cuad_sup_ext1,
cuad_inf_ext11:cuad_inf_ext11, region_retro1:region_retro1, 
region_areola_pezon1:region_areola_pezon1,region_ax1:region_ax1,//left end
/*-right */cuad_inf_ext2:cuad_inf_ext2, mama_izq2:mama_izq2, 
cuad_sup_ext2:cuad_sup_ext2,cuad_inf_ext22:cuad_inf_ext22, region_retro2:region_retro2, 
region_areola_pezon2:region_areola_pezon2,region_ax2:region_ax2,
//begin neurologia
neuro_s:neuro_s,neuro_text:neuro_text, cabeza:cabeza, cabeza_text:cabeza_text, cuello:cuello, 
cuello_text:cuello_text,abd_insp:abd_insp, ausc:ausc,perc:perc,palpa:palpa,ext_sup:ext_sup, ext_sup_text:ext_sup_text,
torax:torax, torax_text:torax_text,ext_inf:ext_inf,ext_inft:ext_inft,rectal:rectal,rectal_text:rectal_text,
genitalm_text:genitalm_text,genitalm:genitalm,genitalf_text:genitalf_text,genitalf:genitalf,
vagina:vagina,vagina_text:vagina_text,
//begin Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
especuloscopia:especuloscopia, tacto_bima:tacto_bima, cervix:cervix, cervix_text:cervix_text, utero_text:utero_text,
anexo_derecho_text:anexo_derecho_text, anexo_iz_text:anexo_iz_text,
 inspection_vulval:inspection_vulval,
inspection_vulval_text:inspection_vulval_text, extremidades_inf:extremidades_inf,
extremidades_inf_text:extremidades_inf_text


},

cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#resultexam').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },   
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_exam_fis').slideDown();
	$(".save_exam_fis_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});




//--------------------------------------------------------------
$("#pesoex").keyup(function() {
  var peso = $(this).val();
  var talla =$("#tallaex").val();
if(peso==""){
$("#tallaex").prop("disabled", true);
$("#tallaex").val("");
}
else{
$("#tallaex").prop("disabled", false);
};
var ma = peso * 0.45;
$("#kgex").val(ma);

});

//------------------------

$("#tallaex").keyup(function() {
  var talla = $(this).val();
   var kg =$("#kgex").val();
 var talla_result= talla * talla;
//calcul imc
//$('.number').number( myNumber, 2 )
var imc_result = kg / talla_result;
$("#imcex").val(imc_result);
});


$('#imcex').number( true, 2 );
//----------------------------------
$("#top_exam").on('click', function (e) {
e.preventDefault();
})
//---------------------------
$(".select-examsisex").select2({
  tags: true
});	





$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_exam_fis").on('click', function (e) {
	$('.show_modif_exam_fis').hide();
	$(".save_exam_fis_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)










			
 </script>