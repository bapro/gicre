<script>$(".hab_t_drug").select2({tags:!0,tokenSeparators:[","," "]}),$(".hide-ant-save").hide(),$("#save_edit_datam").hide(),$("#save_edit_datad").hide(),$("#save_edit_datadsam").hide(),$("#save_edit_datasa").hide(),$("#save_edit_otrosant").hide(),$("#save_edit_datav").hide(),$("#save_edit_datah").hide(),$("#send_data").hide(),$(".view-all :input").prop("disabled",!0),$(".emp_checkbox1").prop("disabled",!0),$("#otros").prop("disabled",!0),$("#edit_datam").on("click",function(){$("#edit_datam").hide(),$(".emp_checkbox1").prop("disabled",!1),$(".check-all").prop("disabled",!1),$("#otros").prop("disabled",!1),$("#save_edit_datam").slideDown(),$("#save_edit_datam").prop("disabled",!1),$("#select_all").prop("disabled",!1)}),$("#edit_datad").on("click",function(){$("#edit_datad").hide(),$("#save_edit_datad").slideDown(),$("#save_edit_datad").prop("disabled",!1),$("#ant_al_rec_med .me").prop("disabled",!1)}),$("#edit_dataotrosant").on("click",function(){$("#edit_dataotrosant").hide(),$("#save_edit_otrosant").slideDown(),$("#show_otros_ant").find("input:checkbox").prop("disabled",!1),$("#show_otros_ant").find("input:radio").prop("disabled",!1),$("#show_otros_ant").find("#grouposang").prop("disabled",!1),$("#show_otros_ant").find("#tipificacion").prop("disabled",!1),$("#show_otros_ant").find("input").prop("disabled",!1)}),$("#edit_datadsam").on("click",function(){$("#edit_datadsam").hide(),$("#save_edit_datadsam").slideDown(),$("#save_edit_datadsam").prop("disabled",!1),$("#sospecha_mal").find("input:radio").prop("disabled",!1)}),$("#edit_datav").on("click",function(){$("#edit_datav").hide(),$("#save_edit_datav").slideDown(),$("#save_edit_datav").prop("disabled",!1),$("#violenciaform").find("input:checkbox").prop("disabled",!1)}),$("#edit_datah").on("click",function(){$("#edit_datah").hide(),$("#save_edit_datah").slideDown(),$("#save_edit_datah").prop("disabled",!1),$("#habitost :input").prop("disabled",!1)}),$("#save_edit_datah").on("click",function(e){e.preventDefault();var a=$("#inserted_by").val(),c=$("#hist_id").val(),t=$("#hab_c_caf").val(),h=$("#hab_f_caf").val(),n=$("#hab_c_pip").val(),i=$("#hab_f_pip").val(),u=$("#hab_c_ciga").val(),p=$("#hab_f_ciga").val(),d=$("#hab_c_al").val(),s=$("#hab_f_al").val(),_=$("#hab_c_tab").val(),o=$("#hab_f_tab").val(),l=$("#hab_t_drug").val(),r=$("#hab_c_drug").val(),v=$("#hab_f_drug").val(),m=$("#hookahe").val(),k=$("#hab_f_hookahe").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateHabitosT')?>",data:{hab_c_caf:t,hab_f_caf:h,hab_c_pip:n,hab_f_pip:i,hab_c_ciga:u,hab_f_ciga:p,hab_c_al:d,hab_f_al:s,hab_c_tab:_,hab_f_tab:o,hab_t_drug:l,hookah:m,hab_f_hookah:k,hab_c_drug:r,hab_f_drug:v,hist_id:c,modify_by:a},cache:!0,success:function(e){$("#msght").html("Cambiado con éxito !").fadeIn("slow").delay(1e3).fadeOut("slow"),$("#habitost :input").prop("disabled",!0),$("#save_edit_datah").hide(),$("#edit_datah").show()}}),!1}),$("#save_edit_datad").on("click",function(e){e.preventDefault();var a=$("#medicamentos_al").val(),c=$("#alimentos_al").val(),t=$("#otros_al").val(),h=$("#inserted_by").val(),n=$("#hist_id").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateAntAl')?>",data:{otros_al:t,medicamentos_al:a,alimentos_al:c,hist_id:n,modify_by:h},cache:!0,success:function(e){$(".msgs22").html("Datos editados con éxito.").fadeIn("slow").delay(5e3).fadeOut("slow"),$("#save_edit_datad").hide(),$("#edit_datad").show(),$("#ant_al_rec_med :input").prop("disabled",!0)}}),!1}),$("#save_edit_otrosant").on("click",function(e){e.preventDefault();var a=$("#inserted_by").val(),c=$("#hist_id").val(),t=$("#quirurgicos").val(),h=$("#gineco").val(),n=$("#abdominal").val(),i=$("#toracica").val(),u=$("#transfusion").val(),p=$("#otros1").val(),d=$("#selectmedic").val(),s=$("#grouposang").val(),_=$("input:radio[name=hepatis]:checked").val(),o=$("input:radio[name=hpv]:checked").val(),l=$("input:radio[name=toxoide]:checked").val(),r=$("#tipificacion").val(),v=$("input:radio[name=rhch]:checked").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateAnteOtros')?>",data:{hist_id:c,modify_by:a,quirurgicos:t,gineco:h,abdominal:n,toracica:i,transfusion:u,otros1:p,hepatis:_,toxoide:l,hpv:o,grouposang:s,tipificacion:r,rh:v,selectmedic:d},cache:!0,success:function(e){$(".msgs2").html("Datos editados con éxito.").fadeIn("slow").delay(2e3).fadeOut("slow"),$("#save_edit_otrosant").hide(),$("#edit_dataotrosant").show(),$("#show_otros_ant :input").prop("disabled",!0)}}),!1}),$("#save_edit_datav").on("click",function(e){e.preventDefault();var a=$("#inserted_by").val(),c=$("#hist_id").val(),t=$("#violencia1").val(),h=$("#violencia2").val(),n=$("#violencia3").val(),i=$("#violencia4").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateViolencia')?>",data:{violencia1:t,violencia2:h,violencia3:n,violencia4:i,hist_id:c,modify_by:a},cache:!0,success:function(e){$(".msgs3").html("Datos editados con éxito.").fadeIn("slow").delay(2e3).fadeOut("slow"),$(".habitos-t :input").prop("disabled",!0),$("#save_edit_datav").hide(),$("#edit_datav").show(),$("#violenciaform :input").prop("disabled",!0)}}),!1}),$("#save_edit_datam").on("click",function(e){e.preventDefault();var a=$("#inserted_by").val(),c=$("#hist_id").val(),t=[];$("input[name='car_nin']:checked").each(function(){t.push(this.value)});var h=[];$("input[name='car_m']:checked").each(function(){h.push(this.value)});var n=[];$("input[name='car_p']:checked").each(function(){n.push(this.value)});var i=[];$("input[name='car_h']:checked").each(function(){i.push(this.value)});var u=[];$("input[name='car_pe']:checked").each(function(){u.push(this.value)});var p=$("#car_text").val(),d=[];$("input[name='hip_nin']:checked").each(function(){d.push(this.value)});var s=[];$("input[name='hip_m']:checked").each(function(){s.push(this.value)});var _=[];$("input[name='hip_p']:checked").each(function(){_.push(this.value)});var o=[];$("input[name='hip_h']:checked").each(function(){o.push(this.value)});var l=[];$("input[name='hip_pe']:checked").each(function(){l.push(this.value)});var r=$("#hip_text").val(),v=[];$("input[name='ec_nin']:checked").each(function(){v.push(this.value)});var m=[];$("input[name='ec_m']:checked").each(function(){m.push(this.value)});var k=[];$("input[name='ec_p']:checked").each(function(){k.push(this.value)});var f=[];$("input[name='ec_h']:checked").each(function(){f.push(this.value)});var b=[];$("input[name='ec_pe']:checked").each(function(){b.push(this.value)});var x=$("#ec_text").val(),w=[];$("input[name='ep_nin']:checked").each(function(){w.push(this.value)});var g=[];$("input[name='ep_m']:checked").each(function(){g.push(this.value)});var y=[];$("input[name='ep_p']:checked").each(function(){y.push(this.value)});var D=[];$("input[name='ep_h']:checked").each(function(){D.push(this.value)});var O=[];$("input[name='ep_pe']:checked").each(function(){O.push(this.value)});var T=$("#ep_text").val(),S=[];$("input[name='as_nin']:checked").each(function(){S.push(this.value)});var j=[];$("input[name='as_m']:checked").each(function(){j.push(this.value)});var z=[];$("input[name='as_p']:checked").each(function(){z.push(this.value)});var I=[];$("input[name='as_h']:checked").each(function(){I.push(this.value)});var P=[];$("input[name='as_pe']:checked").each(function(){P.push(this.value)});var q=$("#as_text").val(),C=[];$("input[name='enre_nin']:checked").each(function(){C.push(this.value)});var H=[];$("input[name='enre_m']:checked").each(function(){H.push(this.value)});var R=[];$("input[name='enre_p']:checked").each(function(){R.push(this.value)});var X=[];$("input[name='enre_h']:checked").each(function(){X.push(this.value)});var A=[];$("input[name='enre_pe']:checked").each(function(){A.push(this.value)});var F=$("#enre_text").val(),L=[];$("input[name='tub_nin']:checked").each(function(){L.push(this.value)});var B=[];$("input[name='tub_m']:checked").each(function(){B.push(this.value)});var E=[];$("input[name='tub_p']:checked").each(function(){E.push(this.value)});var G=[];$("input[name='tub_h']:checked").each(function(){G.push(this.value)});var J=[];$("input[name='tub_pe']:checked").each(function(){J.push(this.value)});var K=$("#tub_text").val(),M=[];$("input[name='dia_nin']:checked").each(function(){M.push(this.value)});var N=[];$("input[name='dia_m']:checked").each(function(){N.push(this.value)});var Q=[];$("input[name='dia_p']:checked").each(function(){Q.push(this.value)});var U=[];$("input[name='dia_h']:checked").each(function(){U.push(this.value)});var V=[];$("input[name='dia_pe']:checked").each(function(){V.push(this.value)});var W=$("#dia_text").val(),Y=[];$("input[name='tir_nin']:checked").each(function(){Y.push(this.value)});var Z=[];$("input[name='tir_m']:checked").each(function(){Z.push(this.value)});var ee=[];$("input[name='tir_p']:checked").each(function(){ee.push(this.value)});var ae=[];$("input[name='tir_h']:checked").each(function(){ae.push(this.value)});var ce=[];$("input[name='tir_pe']:checked").each(function(){ce.push(this.value)});var te=$("#tir_text").val(),he=$("#hep_tipo").val(),ne=[];$("input[name='hep_nin']:checked").each(function(){ne.push(this.value)});var ie=[];$("input[name='hep_m']:checked").each(function(){ie.push(this.value)});var ue=[];$("input[name='hep_p']:checked").each(function(){ue.push(this.value)});var pe=[];$("input[name='hep_h']:checked").each(function(){pe.push(this.value)});var de=[];$("input[name='hep_pe']:checked").each(function(){de.push(this.value)});var se=$("#hep_text").val(),_e=[];$("input[name='enfr_nin']:checked").each(function(){_e.push(this.value)});var oe=[];$("input[name='enfr_m']:checked").each(function(){oe.push(this.value)});var le=[];$("input[name='enfr_p']:checked").each(function(){le.push(this.value)});var re=[];$("input[name='enfr_h']:checked").each(function(){re.push(this.value)});var ve=[];$("input[name='enfr_pe']:checked").each(function(){ve.push(this.value)});var $e=$("#enfr_text").val(),me=[];$("input[name='falc_nin']:checked").each(function(){me.push(this.value)});var ke=[];$("input[name='falc_m']:checked").each(function(){ke.push(this.value)});var fe=[];$("input[name='falc_p']:checked").each(function(){fe.push(this.value)});var be=[];$("input[name='falc_h']:checked").each(function(){be.push(this.value)});var xe=[];$("input[name='falc_pe']:checked").each(function(){xe.push(this.value)});var we=$("#falc_text").val(),ge=[];$("input[name='neop_nin']:checked").each(function(){ge.push(this.value)});var ye=[];$("input[name='neop_m']:checked").each(function(){ye.push(this.value)});var De=[];$("input[name='neop_p']:checked").each(function(){De.push(this.value)});var Oe=[];$("input[name='neop_h']:checked").each(function(){Oe.push(this.value)});var Te=[];$("input[name='neop_pe']:checked").each(function(){Te.push(this.value)});var Se=$("#neop_text").val(),je=[];$("input[name='psi_nin']:checked").each(function(){je.push(this.value)});var ze=[];$("input[name='psi_m']:checked").each(function(){ze.push(this.value)});var Ie=[];$("input[name='psi_p']:checked").each(function(){Ie.push(this.value)});var Pe=[];$("input[name='psi_h']:checked").each(function(){Pe.push(this.value)});var qe=[];$("input[name='psi_pe']:checked").each(function(){qe.push(this.value)});var Ce=$("#psi_text").val(),He=[];$("input[name='obs_nin']:checked").each(function(){He.push(this.value)});var Re=[];$("input[name='obs_m']:checked").each(function(){Re.push(this.value)});var Xe=[];$("input[name='obs_p']:checked").each(function(){Xe.push(this.value)});var Ae=[];$("input[name='obs_h']:checked").each(function(){Ae.push(this.value)});var Fe=[];$("input[name='obs_pe']:checked").each(function(){Fe.push(this.value)});var Le=$("#obs_text").val(),Be=[];$("input[name='ulp_nin']:checked").each(function(){Be.push(this.value)});var Ee=[];$("input[name='ulp_m']:checked").each(function(){Ee.push(this.value)});var Ge=[];$("input[name='ulp_p']:checked").each(function(){Ge.push(this.value)});var Je=[];$("input[name='ulp_h']:checked").each(function(){Je.push(this.value)});var Ke=[];$("input[name='ulp_pe']:checked").each(function(){Ke.push(this.value)});var Me=$("#ulp_text").val(),Ne=[];$("input[name='art_nin']:checked").each(function(){Ne.push(this.value)});var Qe=[];$("input[name='art_m']:checked").each(function(){Qe.push(this.value)});var Ue=[];$("input[name='art_p']:checked").each(function(){Ue.push(this.value)});var Ve=[];$("input[name='art_h']:checked").each(function(){Ve.push(this.value)});var We=[];$("input[name='art_pe']:checked").each(function(){We.push(this.value)});var Ye=$("#art_text").val(),Ze=[];$("input[name='hem_nin']:checked").each(function(){Ze.push(this.value)});var ea=[];$("input[name='hem_m']:checked").each(function(){ea.push(this.value)});var aa=[];$("input[name='hem_p']:checked").each(function(){aa.push(this.value)});var ca=[];$("input[name='hem_h']:checked").each(function(){ca.push(this.value)});var ta=[];$("input[name='hem_pe']:checked").each(function(){ta.push(this.value)});var ha=$("#hem_text").val(),na=[];$("input[name='zika_nin']:checked").each(function(){na.push(this.value)});var ia=[];$("input[name='zika_m']:checked").each(function(){ia.push(this.value)});var ua=[];$("input[name='zika_p']:checked").each(function(){ua.push(this.value)});var pa=[];$("input[name='zika_h']:checked").each(function(){pa.push(this.value)});var da=[];$("input[name='zika_pe']:checked").each(function(){da.push(this.value)});var sa=$("#zika_text").val(),_a=$("#otros").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateMarquePos')?>",data:{car_nin_check:t,madre_check:h,padre_check:n,car_h_check:i,car_pe_check:u,car_text:p,nin_check2:d,madre_check2:s,padre_check2:_,h_check2:o,pe_check2:l,hip_text:r,nin_check3:v,madre_check3:m,padre_check3:k,h_check3:f,pe_check3:b,ec_text:x,nin_check4:w,madre_check4:g,padre_check4:y,h_check4:D,pe_check4:O,ep_text:T,nin_check5:S,madre_check5:j,padre_check5:z,h_check5:I,pe_check5:P,as_text:q,nin_check05:C,madre_check05:H,padre_check05:R,h_check05:X,pe_check05:A,enre_text:F,nin_check6:L,madre_check6:B,padre_check6:E,h_check6:G,pe_check6:J,tub_text:K,nin_check7:M,madre_check7:N,padre_check7:Q,h_check7:U,pe_check7:V,dia_text:W,nin_check8:Y,madre_check8:Z,padre_check8:ee,h_check8:ae,pe_check8:ce,tir_text:te,hep_tipo:he,nin_check9:ne,madre_check9:ie,padre_check9:ue,h_check9:pe,pe_check9:de,hep_text:se,nin_check10:_e,madre_check10:oe,padre_check10:le,h_check10:re,pe_check10:ve,enfr_text:$e,nin_check11:me,madre_check11:ke,padre_check11:fe,h_check11:be,pe_check11:xe,falc_text:we,neop_check12:ge,madre_check12:ye,padre_check12:De,h_check12:Oe,pe_check12:Te,neop_text:Se,psi_check13:je,madre_check13:ze,padre_check13:Ie,h_check13:Pe,pe_check13:qe,psi_text:Ce,obs_check14:He,madre_check14:Re,padre_check14:Xe,h_check14:Ae,pe_check14:Fe,obs_text:Le,ulp_check15:Be,madre_check15:Ee,padre_check15:Ge,h_check15:Je,pe_check15:Ke,ulp_text:Me,art_check16:Ne,madre_check16:Qe,padre_check16:Ue,h_check16:Ve,pe_check16:We,art_text:Ye,art_check016:Ze,madre_check016:ea,padre_check016:aa,h_check016:ca,pe_check016:ta,hem_text:ha,zika_check17:na,madre_check17:ia,padre_check17:ua,h_check17:pa,pe_check17:da,zika_text:sa,otros:_a,hist_id:c,modify_by:a},cache:!0,success:function(e){alert("Datos editados con éxito !"),$(".marque-lo-negativo :input").prop("disabled",!0),$("#save_edit_datam").hide(),$("#edit_datam").show()}}),!1}),$("#save_edit_datadsam").on("click",function(e){e.preventDefault();var a=$("#inserted_by").val(),c=$("#hist_id").val(),t=$("#text-maltrato").val(),h=$("#text-abuso").val(),n=$("#text-neg").val(),i=$("#maltrato-emo").val();return $.ajax({type:"POST",url:"<?=base_url('admin_medico/updateDesarollo')?>",data:{hist_id:c,inserted_by:a,text_maltrato:t,text_abuso:h,text_neg:n,maltrato_emo:i},cache:!0,error:function(e,a,c){alert("An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#result").html("<p>statuscode: "+e.status+"</p><p>errorThrown: "+c+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(a),console.log("errorThrown:"),console.log(c)},success:function(e){$(".msgs").html("Datos editados con éxito.").fadeIn("slow").delay(2e3).fadeOut("slow"),$("#sospecha_mal input").prop("disabled",!0),$("#sospecha_mal textarea").prop("disabled",!0),$("#save_edit_datadsam").hide(),$("#edit_datadsam").show()}}),!1})</script>