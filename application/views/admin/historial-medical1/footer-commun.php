<style type="text/css">.custom_model{height:80%;width:40%;background-color:#fff;margin:0 auto}</style><?php $area1=encrypt_url($areaid);$historial_id1=encrypt_url($historial_id);$user_id1=encrypt_url($user_id);$centro_medico1=encrypt_url($centro_medico);$zero=encrypt_url(0);$typ = encrypt_url($type);$id_apB= encrypt_url($id_apoint);$segB= encrypt_url($id_segu); ?><div class="custom_model fade modal text-center"aria-hidden="true"aria-labelledby="myModalLabel"id="myModal"role="dialog"tabindex="-1"><div class="modal-header"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"></button><div class="alert alert-success"><h2>Datos se guadan con exito <i class="fa fa-check"style="font-size:24px"></i></h2></div></div><div class="modal-body"><p>¿ Desea facturar paciente ?</p><button onClick="stayInHist()" class="btn"type="button">No</button> <a class="btn btn-primary"href="<?php echo site_url("medico/patient_billing_/$typ/$id_apB/$user_id1/$centro_medico1/$segB/$historial_id1") ?>">Si</a></div></div><script>function runSpeechRecognition(t,e){var a=a||webkitSpeechRecognition,i=new a;i.onstart=function(){e.innerHTML="<small>escuchando, habla...</small>"},i.onspeechend=function(){e.innerHTML="<small>grabación terminó...</small>",i.stop(),"enf_signopsis"==t.id&&$("#copiar-estudios-div").show()},i.onresult=function(e){var a=e.results[0][0].transcript;e.results[0][0].confidence;t.value+=a+" "},i.start()}function stayInHist(){var e="<?=$area1?>",a="<?=$historial_id1?>",t="<?=$user_id1?>",i="<?=$centro_medico1?>",o="<?=$zero?>";window.location.href="<?php echo site_url('medico/historial_medical'); ?>/"+a+"/"+t+"/"+e+"/"+i+"/"+o+"/"+t}function clickSingleA(e){$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),items=document.querySelectorAll(".left_hit.active"),items.length&&(items[0].className="left_hit"),e.className="left_hit active",$("html, body").animate({scrollTop:0},500)}$("#enviar-email").click(function(){$(".email-patient").show()}),$(".no-email").click(function(){stayInHist()}),$(".show-all-btn-when").click(function(){$("#save_ant_gen").show()}),$("body").click(function(){$(".required-menu").fadeOut(),$(".tab-enf-act").removeClass("text-danger")}),$select=$("#hab_t_drug").off("change"),$select.on("change",function(e){$('#hab_t_drug option[value="ninguno"]').remove()});var timerped=null;function getPatientMedicaPed(){var e=$("#hist_id").val(),a=$(".selectpedia").val();$("#search-patient-medica-pedia").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?=base_url()?>assets/img/loading.gif" /></span>'),""==a?$("#search-patient-medica-pedia").hide():$.get("<?php echo base_url(); ?>saveHistorial/showPatientMedicaPedia?medica="+a+"&id_pat="+e+"&part=pedia&user_id=<?=$user_id?>",function(e){$("#search-patient-medica-pedia").html(e)})}$(".selectpedia").keydown(function(){clearTimeout(timerped),timerped=setTimeout(getPatientMedicaPed,1e3)});var timer=null;function getPatientMedica(){var e=$("#hist_id").val(),a=$(".selectmedic").val(),t=$(".medica-time").val();$("#search-patient-medica").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),""==a?$("#search-patient-medica").hide():$.get("<?php echo base_url(); ?>saveHistorial/showPatientMedica?medica="+a+"&id_pat="+e+"&part=gnl&user_id=<?=$user_id?>&medicaTime="+t,function(e){$("#search-patient-medica").html(e)})}function loadPatientMedicine(){$("#load-patient-medicine").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/loadPatientMedicine",data:{hist_id:e,user_id:"<?=$user_id?>"},method:"POST",success:function(e){$("#load-patient-medicine").html(e)}})}function loadPatientMedicinePed(){$("#load-patient-medicine-pedia").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/loadPatientMedicinePed",data:{hist_id:e,user_id:"<?=$user_id?>"},method:"POST",success:function(e){$("#load-patient-medicine-pedia").html(e)}})}function new_indication(){var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/new_indication",data:{historial_id:e,area:"<?=$areaid?>",user_id:"<?=$user_id?>"},method:"POST",success:function(e){$("#new_indication").html(e)},error:function(e,a,t){alert("An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#new_indication").html("<p>status code: "+e.status+"</p><p>errorThrown: "+t+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(a),console.log("errorThrown:"),console.log(t)}})}function allRecetas(centro_medico){var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/allRecetas",data:{historial_id:e,user_id:"<?=$user_id?>",area:"<?=$areaid?>",centro_medico:centro_medico},method:"POST",success:function(e){$("#allRecetas").html(e)}})}function allEstudios(){var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/allEstudios",data:{historial_id:e,area:"<?=$areaid?>",user_id:"<?=$user_id?>",emergency_id:"<?=$emergency_id?>",centro_medico:<?=$centro_medico?>},method:"POST",success:function(e){$("#allEstudios").html(e)}})}function allLaboratoriosInd(){var e=$("#hist_id").val(),a=$("#inserted_by").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/allLaboratoriosInd",data:{historial_id:e,operator:a,user_id:"<?=$user_id?>",emergency_id:"<?=$emergency_id?>",hist:"<?=$hist?>"},method:"POST",success:function(e){$("#allLaboratoriosInd").html(e)}})}function allGroupoLab(){var e=$("#hist_id").val(),a=$("#inserted_by").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/listarGroupLabHist",data:{historial_id:e,operator:a,user_id:"<?=$user_id?>",emergency_id:"<?=$emergency_id?>",hist:"<?=$hist?>",centro_medico:"<?=$centro_medico?>"},method:"POST",success:function(e){$("#list-group").html(e)}})}function allLaboratorios(centro_medico){var e=$("#hist_id").val();$.ajax({url:"<?php echo base_url(); ?>saveHistorial/allLaboratorios",data:{historial_id:e,area:"<?=$areaid?>",user_id:"<?=$user_id?>",emergency_id:"<?=$emergency_id?>",centro_medico:centro_medico},method:"POST",success:function(e){$("#allLaboratorios").html(e)}})}function show1(){$("#display_ifts").show("slow")}function show2(){$("#display_ifts").hide("slow")}function show3(){$("#complica_dur_text").show("slow")}function show4(){$("#complica_dur_text").hide("slow")}function show5(){$("#complica_text").show("slow")}function show6(){$("#complica_text").hide("slow")}function show7(){$("#realiza_auto_text").show("slow")}function show8(){$("#realiza_auto_text").hide("slow")}function show9(){$("#otros_t_text").slideToggle()}function show8(){$("#realiza_auto_text").hide("slow")}function show18(){$("#ant_pap_re_text").slideToggle()}function show17(){$("#ant_pap_re_text").hide("slow")}function show19(){$("#cliclo_text").slideToggle()}function show20(){$("#cliclo_text").hide("slow")}$(".selectmedic").keydown(function(){clearTimeout(timer),timer=setTimeout(getPatientMedica,1e3)}),loadPatientMedicine(),loadPatientMedicinePed(),$("#plan").keyup(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")}),$("#evolucion").keyup(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")}),$(".required-info").hide(),$(".deactivate_obs :input").prop("disabled",!0),$(".select-examsis").select2({allowClear:!0,tags:!0}),$(".select2-ex").select2({allowClear:!0,tags:!0}),$(".select2").select2({allowClear:!0,tags:!0,language:{noResults:function(){return"No hay resultado"},searching:function(){return"Buscando.."}}}),$(".example").DataTable({language:{url:"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},aaSorting:[[0,"desc"]]}),$("#click_viol").click(function(){$("#click_viol").text("Ocultar Violencia Intafamiliar"==$("#click_viol").text()?"Violencia Intafamiliar":"Ocultar Violencia Intafamiliar"),$("#violenciaform").slideToggle("slow"),$("#edit_datav").slideToggle("slow")}),$("#click_sospecha_mal").click(function(){$("#click_sospecha_mal").text("Ocultar Sospecha de Abuso o Maltrato"==$("#click_sospecha_mal").text()?"Sospecha de Abuso o Maltrato":"Ocultar Sospecha de Abuso o Maltrato"),$("#sospecha_mal").slideToggle()}),$("#click_antg").click(function(){$("#click_antg").text("Ocultar Antecedentes personales, familiares y patologicos"==$("#click_antg").text()?"Antecedentes personales, familiares y patologicos":"Ocultar Antecedentes personales, familiares y patologicos"),$("#show_gnrl").slideToggle()}),$("#click_otros_ant").click(function(){$("#click_otros_ant").text("Ocultar Otros antecedentes"==$("#click_otros_ant").text()?"Otros antecedentes":"Ocultar Otros antecedentes"),$("#show_otros_ant").slideToggle()}),$("#click_habitost").click(function(){$("#click_habitost").text("Ocultar Habitos Toxicos"==$("#click_habitost").text()?"Habitos Toxicos":"Ocultar Habitos Toxicos"),$("#habitost").slideToggle()}),$("#click_ant_al_rec_med").click(function(){$("#click_ant_al_rec_med").text(($("#click_ant_al_rec_med").text(),"Antecedentes alergicos y reaccion a medicamentos")),$("#ant_al_rec_med").slideToggle()}),$("#alergicos").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#medicaha").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#add-all").on("click",function(e){e.preventDefault();var a="<?=$centro_medico?>",t=$("#inserted_by").val(),i=$("#hist_id").val(),o=$("#medicamento1").val(),n=$("#medicamento-dosis").val(),s=$("#presentacion").val(),c=$("#frecuencia").val(),l=$("#cantidad").val(),r=$("#via").val(),m=$("#oyo").val();$.ajax({type:"POST",dataType:"json",url:"<?=base_url('saveHistorial/SaveFormIndicaciones')?>",data:{oyo:m,medicamento1:o,presentacion:s,operator:t,frecuencia:c,cantidad:l,via:r,historial_id:i,user_id:"<?=$user_id?>",medicamentoDosis:n,centro:a},success:function(e){1==e.status?$("#result").html('<p class="alert alert-danger ">'+e.message+"</p>"):($("#result").html(""),$("#new_indication").fadeIn().html('<span class="load"> <img  width="40px" src="<?=base_url()?>assets/img/loading.gif" /></span>'),$("#allRecetas").fadeIn().html('<span class="load"> <img  width="40px" src="<?=base_url()?>assets/img/loading.gif" /></span>'),$("#enviar-email-recetas").prop("disabled",!1),$(".show-btn-print-current").show(),recetasForm(),new_indication(),allRecetas(<?=$centro_medico?>))},error:function(e,a,t){alert("An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#new_indication").html("<p>status code: "+e.status+"</p><p>errorThrown: "+t+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(a),console.log("errorThrown:"),console.log(t)}})}),$("#saveIndicacionesEstudios").on("click",function(e){var a=$("#study").val(),t=$("#cuerpo").val(),i=$("#lateralidad").val(),o=$("#observaciones").val(),n=$("#inserted_by").val(),s=$("#hist_id").val();$.ajax({type:"POST",dataType:"json",url:"<?=base_url('saveHistorial/SaveFormIndicacionesEstudios')?>",data:{centro:"<?=$centro_medico?>",estudios:a,cuerpo:t,lateralidad:i,observaciones:o,operators:n,historial_id_es:s,emergency_id:"<?=$emergency_id?>"},success:function(e){1==e.status?$("#result").html('<p class="alert alert-danger ">'+e.message+"</p>"):($("#result").html(""),$("#allEstudios").fadeIn().html('<span class="load"> <img  width="40px" src="<?=base_url()?>assets/img/loading.gif" /></span>'),$("#saveIndicacionesEstudios").prop("disabled",!0),$("#enviar-email-estudios").prop("disabled",!1),allEstudios(),$("#saveIndicacionesEstudios").prop("disabled",!1))}})}),$("#reload-labs").on("click",function(e){allLaboratoriosInd(),allGroupoLab()}),$("#reload-groupos").on("click",function(e){allGroupoLab()}),$(".control-prenatal-fecha").mask("00/00/0000",{placeholder:"--/--/----"}),$('input[name="date_fum"]').mask("00/00/0000",{placeholder:"--/--/----"}),$(".totgen").bind("keyup paste",function(){this.value=this.value.replace(/[^0-9]/g,"")}),$("#grouposang").on("change",function(e){var a=$(this).val();$("#tipificacion").val(a)}),jQuery("input[name='tipificacion']").on("click",function(e){$(".ck").is(":checked")?($("#mas").show(),$("#menos").hide()):($("#menos").show(),$("#mas").hide())}),jQuery("input[name='rhoa']").on("click",function(e){$(".ck").is(":checked")?($("#mas").show(),$("#menos").hide()):($("#menos").show(),$("#mas").hide())}),jQuery("input[name='rhch']").on("click",function(e){$("#tip-hide").hide(),$("#tip-show").show(),$(".ck").is(":checked")?($("#mas").show(),$("#menos").hide()):($("#menos").show(),$("#mas").hide())}),$(document).ready(function(){$.fn.modal.Constructor.prototype.enforceFocus=function(){$(document).off("focusin.bs.modal").on("focusin.bs.modal",$.proxy(function(e){this.$element[0]===e.target||this.$element.has(e.target).length||$(e.target).closest(".select2-dropdown").length||this.$element.trigger("focus")},this))}}),jQuery("input[name='mf']").on("click",function(e){$(".chkYes5").is(":checked")?$(".text-maltrato").prop("disabled",!1):($(".text-maltrato").prop("disabled",!0),$(".text-maltrato").val(""))}),jQuery("input[name='abss']").on("click",function(e){$(".chkYes6").is(":checked")?$(".text-abuso").prop("disabled",!1):($(".text-abuso").prop("disabled",!0),$(".text-abuso").val(""))}),jQuery("input[name='negs']").on("click",function(e){$(".chkYes7").is(":checked")?$(".text-neg").prop("disabled",!1):($(".text-neg").prop("disabled",!0),$(".text-neg").val(""))}),jQuery("input[name='mems']").on("click",function(e){$(".chkYes8").is(":checked")?$(".maltrato-emo").prop("disabled",!1):($(".maltrato-emo").prop("disabled",!0),$(".maltrato-emo").val(""))}),$(".checkin_ala").change(function(){$(".checkin_ala:checked").length?($("#alimentos_al").prop("disabled",!0),$("#alimentos_al").val("")):$("#alimentos_al").prop("disabled",!1)}),$(".checkin_meda").change(function(){$(".checkin_meda:checked").length?($("#medicamentos_al").prop("disabled",!0),$("#medicamentos_al").val("")):$("#medicamentos_al").prop("disabled",!1)}),$(".checkin_otrosa").change(function(){$(".checkin_otrosa:checked").length?($("#otros_al").prop("disabled",!0),$("#otros_al").val("")):$("#otros_al").prop("disabled",!1)}),$(".checkin_qui").change(function(){$(".checkin_qui:checked").length?($("#quirurgicos").prop("disabled",!0),$("#quirurgicos").val("")):$("#quirurgicos").prop("disabled",!1)}),$(".checkin_abd").change(function(){$(".checkin_abd:checked").length?($("#abdominal").prop("disabled",!0),$("#abdominal").val("")):$("#abdominal").prop("disabled",!1)}),$(".checkin_trans").change(function(){$(".checkin_trans:checked").length?($("#transfusion").prop("disabled",!0),$("#transfusion").val("")):$("#transfusion").prop("disabled",!1)}),$(".checkin_gine").change(function(){$(".checkin_gine:checked").length?($("#gineco").prop("disabled",!0),$("#gineco").val("")):$("#gineco").prop("disabled",!1)}),$(".checkin_tora").change(function(){$(".checkin_tora:checked").length?($("#toracica").prop("disabled",!0),$("#toracica").val("")):$("#toracica").prop("disabled",!1)}),$(".checkin_otros").change(function(){$(".checkin_otros:checked").length?($("#otros1").val(""),$("#otros1").prop("disabled",!0),$("#otros1").val("")):$("#otros1").prop("disabled",!1)}),jQuery("input[name='radiomedi']").on("click",function(e){$(".chM").is(":checked")?$(".selectmedic").prop("disabled",!1):($(".selectmedic").prop("disabled",!0),$(".selectmedic").val(null).trigger("change"))}),$(".right-otro :input").prop("disabled",!0),$(".checkin-right-otro").change(function(){$(".checkin-right-otro:checked").length?$(".right-otro :input").prop("disabled",!0):$(".right-otro :input").prop("disabled",!1)}),$(".checkin_v1").change(function(){$(".checkin_v1:checked").length?($("#violencia1").prop("disabled",!0),$("#violencia1").val("")):$("#violencia1").prop("disabled",!1)}),$(".checkin_v2").change(function(){$(".checkin_v2:checked").length?($("#violencia2").prop("disabled",!0),$("#violencia2").val("")):$("#violencia2").prop("disabled",!1)}),$(".checkin_v3").change(function(){$(".checkin_v3:checked").length?($("#violencia3").prop("disabled",!0),$("#violencia3").val("")):$("#violencia3").prop("disabled",!1)}),$(".checkin_v4").change(function(){$(".checkin_v4:checked").length?($("#violencia4").prop("disabled",!0),$("#violencia4").val("")):$("#violencia4").prop("disabled",!1)}),$("#ver_ex_ot").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_ssr").on("hidden.bs.modal",function(){ssrForm(),$(this).removeData("bs.modal")}),$("#ver_pedia").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_obs").on("hidden.bs.modal",function(){obsForm(),$(this).removeData("bs.modal")}),$("#ver_enf_act").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_rehab").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_exafisico").on("hidden.bs.modal",function(){exaFisiForm(),$(this).removeData("bs.modal")}),$("#ver_exasis").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_derma").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_con_d").on("hidden.bs.modal",function(){$(".con-pop-load").hide(),$(this).removeData("bs.modal")}),$("#ver_con_pren").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_oft").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$("#ver_alergia").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")}),$(".peso-in").keyup(function(){var e=$(this).val();$(".talla-in").val();""==e?($(".talla-in").prop("disabled",!0),$(".talla-in").val("")):$(".talla-in").prop("disabled",!1);var a=.45*e;$(".kg-in").val(a)}),$(".talla-in").keyup(function(){var e=$(this).val(),a=e*e,t=$(".kg-in").val()/a;$(".imc-in").val(t)}),$(".imc-in").number(!0,2)</script>