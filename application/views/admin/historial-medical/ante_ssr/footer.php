<script>

$('#save_ant_ssr_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var idssr  = $("#idssr").val();

var optradio = $('input:radio[name=optradio1]:checked').val();
var edad = $("#edad1").val();

var numero = $("#numero1").val();
var sexual = $("#sexual").val();
var pareja = $("#pareja1").val();
var califica_text = $("#califica_text1").val();
var menarquia = $("#menarquia1").val();
var planif_text = $("#planif_text1").val();
var fecha_ul_m = $("#fecha_ul_m1").val();
var cliclo_text = $("#cliclo_text1").val();
var dura_sang = $("#dura_sang1").val();
var ant_pap_re_text = $("#ant_pap_re_text1").val();
var realiza_auto_text = $("#realiza_auto_text1").val();
var planif = $('input:radio[name=planif1]:checked').val();
var embara = $('input:radio[name=embara1]:checked').val();
var menaop = $('input:radio[name=menaop1]:checked').val();
var cliclo = $('input:radio[name=cliclo1]:checked').val();
var dismeno = $('input:radio[name=dismeno1]:checked').val();
var ant_pap_re = $('input:radio[name=ant_pap_re1]:checked').val();
var realiza_auto = $('input:radio[name=realiza_auto1]:checked').val();
var fecha_ul_mama = $('input:radio[name=fecha_ul_mama1]:checked').val();
var cant_sang = $('input:radio[name=cant_sang1]:checked').val();
var nuligesta = $('input:radio[name=nuligesta1]:checked').val();
var complica = $('input:radio[name=complica1]:checked').val();
var complica_dur = $('input:radio[name=complica_dur1]:checked').val();
var infec_tran = $('input:radio[name=infec_tran1]:checked').val();
var califica = $('input:radio[name=califica1]:checked').val();
var utilizo = $('input:radio[name=utilizo1]:checked').val();
var sexual2 = $('input:radio[name=sexual21]:checked').val();
var fecha_ul_pap = $('input:radio[name=fecha_ul_pap1]:checked').val();
var totalGest = $("#totalGest1").val();
var e = $("#e1").val();
var p = $("#p1").val();
var a = $("#a1").val();
var c = $("#c1").val();
var complica_text = $("#complica_text1").val();
var otro_infeccion1 = $("#otro_infeccion11").val();
var complica_dur_text = $("#complica_dur_text1").val();
var otro_infeccion = $("#otro_infeccion1").val();
var sifilisc1 = [];
$("input[name='sifilis1']:checked").each(function(){
sifilisc1.push(this.value);
});

var gonorreac1 = [];
$("input[name='gonorrea1']:checked").each(function(){
gonorreac1.push(this.value);
});


var clamidiac1 = [];
$("input[name='clamidia1']:checked").each(function(){
clamidiac1.push(this.value);
});
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveEditAntssr')?>",
data: {idssr:idssr,edad:edad,optradio:optradio,numero:numero,sexual:sexual,pareja:pareja,
califica:califica,califica_text:califica_text,utilizo:utilizo,sexual2:sexual2,
planif:planif,planif_text:planif_text,embara:embara,menarquia:menarquia,
fecha_ul_m:fecha_ul_m,menaop:menaop,cliclo:cliclo,cliclo_text:cliclo_text,
dura_sang:dura_sang,dismeno:dismeno,fecha_ul_pap:fecha_ul_pap,ant_pap_re:ant_pap_re,
ant_pap_re_text:ant_pap_re_text,realiza_auto:realiza_auto,realiza_auto_text:realiza_auto_text,
fecha_ul_mama:fecha_ul_mama,p:p,a:a,c:c,e:e,totalGest:totalGest,otro_infeccion:otro_infeccion,
otro_infeccion1:otro_infeccion1,cant_sang:cant_sang,nuligesta:nuligesta,complica:complica,
complica_text:complica_text,complica_dur:complica_dur,complica_dur_text:complica_dur_text,
sifilisc:sifilisc1,gonorreac:gonorreac1,clamidiac:clamidiac1,infec_tran:infec_tran,updated_by:updated_by},

cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_ant_ssr').slideDown();
	$(".save_ant_ssr_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});


$('input[name="date_fum"]').mask('00/00/0000', {placeholder: '--/--/----'});
$('.totgen1').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});
$('.totgen1').keyup(function () {

// initialize the sum (total price) to zero
var sum = 0;

// we use jQuery each() to loop through all the textbox with 'price' class
// and compute the sum for each loop
$('.totgen1').each(function() {
sum += Number($(this).val());
});

// set the computed value to 'totalPrice' textbox
$('#totalGest1').val(sum);

});

//-------------------------------------------------------------------------------



//-----------------------------------------------------------

$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_ant_ssr").on('click', function (e) {
	$('.show_modif_ant_ssr').hide();
	$(".save_ant_ssr_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)


$('input[name="date_fum1"]').mask('00/00/0000', {placeholder: '--/--/----'});











//====navegador SSR=========================

$("#id_ssr").on('change', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$(".backg").css("background-color", "rgb(207,207,207)");

var hist_id = $("#hist_id").val();
var id_ssr = $("#id_ssr").val();
$.ajax({
url: '<?php echo site_url('admin/data_ssr_by_id');?>',
type: 'post',
data:{id_ssr:id_ssr,hist_id:hist_id},
success: function (data) {
$(".save_ant_ssr_hide").hide();
$("#loadf").hide();
$(".show_modif_ant_ssr").slideDown();
$(".backg").hide();
$("#hide_ssr").hide();
$("#show_ss_data").html(data);

}
});
});
</script>