<script>

$('#saveEditCounseling').on('click', function(event) {
event.preventDefault();

 var id= $("#id_counseling").val();
 var anti_radio= $("input[name='anti_radio']:checked").val();

 var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 });
 
  var diu = [];
 $("input[name='diu']:checked").each(function(){
            diu.push(this.value);
 })
  var implante = [];
 $("input[name='implante']:checked").each(function(){
            implante.push(this.value);
 })
  var siu = [];
 $("input[name='siu']:checked").each(function(){
            siu.push(this.value);
 })
  var condones = [];
 $("input[name='condones']:checked").each(function(){
            condones.push(this.value);
 })
  var anti_emergencia = [];
 $("input[name='anti_emergencia']:checked").each(function(){
            anti_emergencia.push(this.value);
 })
  var aqv = [];
 $("input[name='aqv']:checked").each(function(){
            aqv.push(this.value);
 })
  var inyectable1 = [];
 $("input[name='inyectable1']:checked").each(function(){
            inyectable1.push(this.value);
 })
  var inyectable3 = [];
 $("input[name='inyectable3']:checked").each(function(){
            inyectable3.push(this.value);
 })
  var solo_pro = [];
 $("input[name='solo_pro']:checked").each(function(){
            solo_pro.push(this.value);
 })
 
 
  var contraception_otro = $("#contraception_otro").val();
   var aclara_dudas_esp = $("#aclara_dudas_esp").val();
  var deseo_uso = $("#deseo_uso").val();
 var deseo_cambio1 = $("#deseo_cambio1").val();
 var deseo_cambio2 = $("#deseo_cambio2").val();
var motivo_uso = $("#motivo_uso").val();
 var deseo_cambio1 = $("#deseo_cambio1").val();
 var deseo_cambio2 = $("#deseo_cambio2").val();
 var motivo_uso = $("#motivo_uso").val();
 var deseo_retiro = $("#deseo_retiro").val();
  var aclara_dudas = $("#aclara_dudas").val();
  var momento_uso = $("#momento_uso").val();

  var vio_basada = [];
 $("input[name='vio_basada']:checked").each(function(){
            vio_basada.push(this.value);
 })
  var pre_prueba_vih = [];
 $("input[name='pre_prueba_vih']:checked").each(function(){
            pre_prueba_vih.push(this.value);
 })
  var prost_prueba_vih_mas = [];
 $("input[name='prost_prueba_vih_mas']:checked").each(function(){
            prost_prueba_vih_mas.push(this.value);
 })
  var prost_prueba_vih_menos = [];
 $("input[name='prost_prueba_vih_menos']:checked").each(function(){
            prost_prueba_vih_menos.push(this.value);
 })
  var con_ad_arv = [];
 $("input[name='con_ad_arv']:checked").each(function(){
            con_ad_arv.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var ap_ps_vih = [];
 $("input[name='ap_ps_vih']:checked").each(function(){
            ap_ps_vih.push(this.value);
 })
  var infertilidad = [];
 $("input[name='infertilidad']:checked").each(function(){
            infertilidad.push(this.value);
 })
  var cancer_mama = [];
 $("input[name='cancer_mama']:checked").each(function(){
            cancer_mama.push(this.value);
 })
  var prueba_pre_post = [];
 $("input[name='prueba_pre_post']:checked").each(function(){
            prueba_pre_post.push(this.value);
 })
  var reduce_riesgo = [];
 $("input[name='reduce_riesgo']:checked").each(function(){
            reduce_riesgo.push(this.value);
 })
  var post_aborto = [];
 $("input[name='post_aborto']:checked").each(function(){
            post_aborto.push(this.value);
 })
  var zika = [];
 $("input[name='zika']:checked").each(function(){
            zika.push(this.value);
 })
  var pre_post_prueba_its = [];
 $("input[name='pre_post_prueba_its']:checked").each(function(){
            pre_post_prueba_its.push(this.value);
 })
  var aoc = [];
 $("input[name='aoc']:checked").each(function(){
            aoc.push(this.value);
 })
  var sexualidad = [];
 $("input[name='sexualidad']:checked").each(function(){
            sexualidad.push(this.value);
 })
  var pre_natal = [];
 $("input[name='pre_natal']:checked").each(function(){
            pre_natal.push(this.value);
 })
  var reduce_riesgo_its = [];
 $("input[name='reduce_riesgo_its']:checked").each(function(){
            reduce_riesgo_its.push(this.value);
 })
  var otro_conselling = $("#otro_conselling").val();
  var tipo_servicio = $("#tipo_servicio").val();
  var entrega_materiel= $("#entrega_materiel").val();
 
var ref_anti= $("#ref_anti").val();

  var ref_gineco = [];
 $("input[name='ref_gineco']:checked").each(function(){
            ref_gineco.push(this.value);
 })
  var ref_obs = [];
 $("input[name='ref_obs']:checked").each(function(){
            ref_obs.push(this.value);
 })
  var ref_uro = [];
 $("input[name='ref_uro']:checked").each(function(){
            ref_uro.push(this.value);
 })
  var ref_infet = [];
 $("input[name='ref_infet']:checked").each(function(){
            ref_infet.push(this.value);
 })
  var ref_pedia = [];
 $("input[name='ref_pedia']:checked").each(function(){
            ref_pedia.push(this.value);
 })
  var ref_pws = [];
 $("input[name='ref_pws']:checked").each(function(){
            ref_pws.push(this.value);
 })
  var ref_otro_serv = [];
 $("input[name='ref_otro_serv']:checked").each(function(){
            ref_otro_serv.push(this.value);
 })
  var ref_apoyo_emo = [];
 $("input[name='ref_apoyo_emo']:checked").each(function(){
            ref_apoyo_emo.push(this.value);
 })
  var ref_endo = [];
 $("input[name='ref_endo']:checked").each(function(){
            ref_endo.push(this.value);
 })
  var ref_servicio = [];
 $("input[name='ref_servicio']:checked").each(function(){
            ref_servicio.push(this.value);
 })
 
 var ref_otro1 = $("#ref_otro1").val();
 
 var ref_serv_legal = [];
 $("input[name='ref_serv_legal']:checked").each(function(){
            ref_serv_legal.push(this.value);
 })


 var ref_onco = [];
 $("input[name='ref_onco']:checked").each(function(){
            ref_onco.push(this.value);
 })


var ref_obs_mat = [];
 $("input[name='ref_obs_mat']:checked").each(function(){
            ref_obs_mat.push(this.value);
 })

 var ref_otro2 = $("#ref_otro2").val();

 var comment_counselling = $("#comment_counselling").val();
    var id_user = $("#Counseling_user_id").val();
 $.ajax({
type: "POST",
url: "<?=base_url('save_counseling/updateCounseling')?>",
data: {anti_radio:anti_radio, aoc:aoc, diu:diu, implante:implante, siu:siu, condones:condones, anti_emergencia:anti_emergencia,
aqv:aqv, inyectable1:inyectable1, inyectable3:inyectable3, solo_pro:solo_pro, contraception_otro:contraception_otro,
 deseo_uso:deseo_uso, deseo_cambio1:deseo_cambio1, deseo_cambio2:deseo_cambio2, motivo_uso:motivo_uso,deseo_retiro:deseo_retiro,
 aclara_dudas:aclara_dudas, momento_uso:momento_uso, vio_basada:vio_basada, pre_prueba_vih:pre_prueba_vih, prost_prueba_vih_mas:prost_prueba_vih_mas,
 prost_prueba_vih_menos:prost_prueba_vih_menos, con_ad_arv:con_ad_arv, ap_ps_vih:ap_ps_vih, infertilidad:infertilidad,aclara_dudas_esp:aclara_dudas_esp,
 cancer_mama:cancer_mama, prueba_pre_post:prueba_pre_post, reduce_riesgo:reduce_riesgo, post_aborto:post_aborto, zika:zika,
 pre_post_prueba_its:pre_post_prueba_its, sexualidad:sexualidad, pre_natal:pre_natal,  reduce_riesgo_its:reduce_riesgo_its,
 otro_conselling:otro_conselling, tipo_servicio:tipo_servicio, entrega_materiel:entrega_materiel, ref_anti:ref_anti,id_user:id_user,
 ref_gineco:ref_gineco, ref_obs:ref_obs, ref_uro:ref_uro, ref_infet:ref_infet, ref_pedia:ref_pedia, ref_pws:ref_pws,id:id,
 ref_otro_serv:ref_otro_serv, ref_apoyo_emo:ref_apoyo_emo, ref_endo:ref_endo, ref_servicio:ref_servicio, ref_otro1:ref_otro1,
 ref_serv_legal:ref_serv_legal, ref_onco:ref_onco, ref_obs_mat:ref_obs_mat, ref_otro2:ref_otro2, comment_counselling:comment_counselling
},
dataType: 'json',
cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#update-counseling-info').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
			
success:function(response){
$("#load-consejeria").show().html('<p style="width:100%">'+response.message+'</p>').delay(3000).fadeOut(2500);
$( "#disabled-all-counseling input" ).prop( "disabled", true );
	   $( "#disabled-all-counseling select" ).prop( "disabled", true );
	   $( "#disabled-all-counseling textarea" ).prop( "disabled", true );
	   $('#showEditCounseling').slideDown();
  $('#saveEditCounseling').hide();	   
}  
});



 });
 </script>