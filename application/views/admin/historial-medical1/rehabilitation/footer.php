<script>
$("#save_rehab_hide").on("click",function(a){a.preventDefault();var e=$("#updated_by").val(),i=$("#id_rehab").val(),l=$("#marcha_inicio1").val(),_=$("#long_mov_der1").val(),r=$("#long_mov_izq1").val(),o=$("#long_simetria1").val(),t=$("#long_fluidez1").val(),v=$("#long_traject1").val(),n=$("#long_tronco1").val(),s=$("#long_postura1").val(),d=$("#equi_sentado1").val(),c=$("#equi_levantarse1").val(),u=$("#equi_intentos1").val(),m=$("#equi_biped11").val(),b=$("#equi_biped21").val(),h=$("#equi_emp1").val(),p=$("#equi_ojos1").val(),q=$("#equi_vuelta1").val(),g=$("#equi_sentarse1").val(),f=$("#eval_balsys1").val(),j=$("#eval_movim1").val(),w=$("#eval_monop1").val(),y=$("#criteria_intens1").val(),z=$("#criteria_cuidado11").val(),x=$("#levantar_peso1").val(),D=$("#criteria_caminar1").val(),k=$("#criteria_estar_sent1").val(),C=$("#criteria_dormir1").val(),O=$("#criteria_sexual1").val(),P=$("#criteria_vida1").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/saveUpRehabilidad')?>",data:{id_rehab:i,updated_by:e,marcha_inicio:l,long_mov_der:_,long_mov_izq:r,long_simetria:o,long_fluidez:t,long_traject:v,long_tronco:n,long_postura:s,equi_sentado:d,equi_levantarse:c,equi_intentos:u,equi_biped1:m,equi_biped2:b,equi_emp:h,equi_ojos:p,equi_vuelta:q,equi_sentarse:g,eval_balsys:f,eval_movim:j,eval_monop:w,criteria_intens:y,criteria_cuidado1:z,levantar_peso:x,criteria_caminar:D,criteria_estar_sent:k,criteria_dormir:C,criteria_sexual:O,criteria_vida:P},cache:!0,success:function(a){alert("Cambiado ha sido hecho !"),$(".show_modif_rehab").slideDown(),$(".save_rehab_hide").hide(),$(".disable-all select").prop("disabled",!0)}}),!1}),$(".show_modif_rehab").on("click",function(a){$(".show_modif_rehab").hide(),$(".save_rehab_hide").slideDown(),$(".disable-all select").prop("disabled",!1)});
</script>