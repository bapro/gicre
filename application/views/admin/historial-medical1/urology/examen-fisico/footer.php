<script>var id_sig=$("#id_sig").val();function loadSigno(){$.ajax({url:"<?php echo base_url(); ?>urologo/loadSigno",data:{id_exam_fis:id_sig,idpatient:"<?=$idpatient?>"},method:"POST",success:function(o){$("#reload-table-signo").html(o)}})}function formUpdate(){$("#uroFrmUpdate").show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),$.ajax({url:"<?php echo base_url(); ?>urologo/formUpdate",data:{id_exam_fis:id_sig},method:"POST",success:function(o){$("#uroFrmUpdate").html(o)}})}loadSigno(),$("#saveEditUrology").on("click",(function(o){o.preventDefault();var a=$("#id_urology").val(),e=$("#pesoex").val(),l=$("#kgex").val(),i=$("#tallaex").val(),r=$("#pulgada-exf1").val(),t=$("#imcex").val(),s=$("#taex").val(),d=$("#frex").val(),u=$("#fcex").val(),n=$("#hgex").val(),_=$("#tempoex").val(),p=$("#pulsoex").val(),c=$("#glicemiae").val(),g=$("input[name='radio_signoex']:checked").val(),v=[];$("input[name='uro_tacto_rectal_done']:checked").each((function(){v.push(this.value)}));var h=$("#uro_pene").val(),m=$("#uro_testicule").val(),f=$("#uro_epididimos").val(),x=$("#uro_tato_rec_pros").val(),y=$("#uro_vejiga").val(),b=$("#uro_geni_mujer").val(),U=$("#uro_loins").val(),j=$("#uro_otros").val(),S=$("#urology_user_id").val();$.ajax({type:"POST",url:"<?=base_url('save_urology/updateUrology')?>",data:{uro_pene:h,uro_testicule:m,uro_epididimos:f,uro_tato_rec_pros:x,uro_tacto_rectal_done:v,peso:e,kg:l,talla:i,imc:t,ta:s,pulgada:r,fr:d,fc:u,hg:n,tempo:_,pulso:p,radio_signo:g,glicemiae:c,id_sig:id_sig,uro_geni_mujer:b,uro_vejiga:y,uro_loins:U,uro_otros:j,id_user:S,id:a},dataType:"json",cache:!0,success:function(o){loadSigno(),formUpdate(),$("#load-urology").show().html('<p style="width:100%">'+o.message+"</p>").delay(3e3).fadeOut(2500),$("#disabled-all-urology input").prop("disabled",!0),$("#disabled-all-urology textarea").prop("disabled",!0),$("#showEditUrology").slideDown(),$("#saveEditUrology").hide(),$("#disabled-all-urology button").slideUp()}})}));</script>