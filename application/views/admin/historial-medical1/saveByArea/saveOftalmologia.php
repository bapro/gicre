<script>$("#save_ant_gen").on("click",function(e){e.preventDefault();var a=$("#enf_motivo").val(),c=$("#enf_signopsis").val().trim(),n=$("#enf_laboratorios").val(),h=$("#enf_estudios").val(),t=($("#ant_fam").val(),$("#ant_prenatales").val(),$("#factories_ambiente").val(),$("#inserted_by").val()),i=$("#hist_id").val(),u=<?=$user_id?>,p=<?=$centro_medico?>,_=$("input[name='cied']:checked").val(),o=$("#plan").val().trim(),s=$("#otros_diagnos").val().trim(),v=[];$("input[name='todo']:checked").each(function(){v.push(this.value)});var r=[];$("input[name='car_nin']:checked").each(function(){r.push(this.value)});var l=[];$("input[name='car_m']:checked").each(function(){l.push(this.value)});var m=[];$("input[name='car_p']:checked").each(function(){m.push(this.value)});var k=[];$("input[name='car_h']:checked").each(function(){k.push(this.value)});var d=[];$("input[name='car_pe']:checked").each(function(){d.push(this.value)});var f=$("#car_text").val(),b=[];$("input[name='hip_nin']:checked").each(function(){b.push(this.value)});var x=[];$("input[name='hip_m']:checked").each(function(){x.push(this.value)});var g=[];$("input[name='hip_p']:checked").each(function(){g.push(this.value)});var y=[];$("input[name='hip_h']:checked").each(function(){y.push(this.value)});var j=[];$("input[name='hip_pe']:checked").each(function(){j.push(this.value)});var z=$("#hip_text").val(),T=[];$("input[name='ec_nin']:checked").each(function(){T.push(this.value)});var q=[];$("input[name='ec_m']:checked").each(function(){q.push(this.value)});var R=[];$("input[name='ec_p']:checked").each(function(){R.push(this.value)});var D=[];$("input[name='ec_h']:checked").each(function(){D.push(this.value)});var H=[];$("input[name='ec_pe']:checked").each(function(){H.push(this.value)});var L=$("#ec_text").val(),S=[];$("input[name='ep_nin']:checked").each(function(){S.push(this.value)});var w=[];$("input[name='ep_m']:checked").each(function(){w.push(this.value)});var C=[];$("input[name='ep_p']:checked").each(function(){C.push(this.value)});var F=[];$("input[name='ep_h']:checked").each(function(){F.push(this.value)});var O=[];$("input[name='ep_pe']:checked").each(function(){O.push(this.value)});var U=$("#ep_text").val(),X=[];$("input[name='as_nin']:checked").each(function(){X.push(this.value)});var A=[];$("input[name='as_m']:checked").each(function(){A.push(this.value)});var B=[];$("input[name='as_p']:checked").each(function(){B.push(this.value)});var I=[];$("input[name='as_h']:checked").each(function(){I.push(this.value)});var P=[];$("input[name='as_pe']:checked").each(function(){P.push(this.value)});var E=$("#as_text").val(),G=[];$("input[name='enre_nin']:checked").each(function(){G.push(this.value)});var J=[];$("input[name='enre_m']:checked").each(function(){J.push(this.value)});var K=[];$("input[name='enre_p']:checked").each(function(){K.push(this.value)});var M=[];$("input[name='enre_h']:checked").each(function(){M.push(this.value)});var N=[];$("input[name='enre_pe']:checked").each(function(){N.push(this.value)});var Q=$("#enre_text").val(),V=[];$("input[name='tub_nin']:checked").each(function(){V.push(this.value)});var W=[];$("input[name='tub_m']:checked").each(function(){W.push(this.value)});var Y=[];$("input[name='tub_p']:checked").each(function(){Y.push(this.value)});var Z=[];$("input[name='tub_h']:checked").each(function(){Z.push(this.value)});var ee=[];$("input[name='tub_pe']:checked").each(function(){ee.push(this.value)});var ae=$("#tub_text").val(),ce=[];$("input[name='dia_nin']:checked").each(function(){ce.push(this.value)});var ne=[];$("input[name='dia_m']:checked").each(function(){ne.push(this.value)});var he=[];$("input[name='dia_p']:checked").each(function(){he.push(this.value)});var te=[];$("input[name='dia_h']:checked").each(function(){te.push(this.value)});var ie=[];$("input[name='dia_pe']:checked").each(function(){ie.push(this.value)});var ue=$("#dia_text").val(),pe=[];$("input[name='tir_nin']:checked").each(function(){pe.push(this.value)});var _e=[];$("input[name='tir_m']:checked").each(function(){_e.push(this.value)});var oe=[];$("input[name='tir_p']:checked").each(function(){oe.push(this.value)});var se=[];$("input[name='tir_h']:checked").each(function(){se.push(this.value)});var ve=[];$("input[name='tir_pe']:checked").each(function(){ve.push(this.value)});var re=$("#tir_text").val(),le=$("#hep_tipo").val(),me=[];$("input[name='hep_nin']:checked").each(function(){me.push(this.value)});var ke=[];$("input[name='hep_m']:checked").each(function(){ke.push(this.value)});var $e=[];$("input[name='hep_p']:checked").each(function(){$e.push(this.value)});var de=[];$("input[name='hep_h']:checked").each(function(){de.push(this.value)});var fe=[];$("input[name='hep_pe']:checked").each(function(){fe.push(this.value)});var be=$("#hep_text").val(),xe=[];$("input[name='enfr_nin']:checked").each(function(){xe.push(this.value)});var ge=[];$("input[name='enfr_m']:checked").each(function(){ge.push(this.value)});var ye=[];$("input[name='enfr_p']:checked").each(function(){ye.push(this.value)});var je=[];$("input[name='enfr_h']:checked").each(function(){je.push(this.value)});var ze=[];$("input[name='enfr_pe']:checked").each(function(){ze.push(this.value)});var Te=$("#enfr_text").val(),qe=[];$("input[name='falc_nin']:checked").each(function(){qe.push(this.value)});var Re=[];$("input[name='falc_m']:checked").each(function(){Re.push(this.value)});var De=[];$("input[name='falc_p']:checked").each(function(){De.push(this.value)});var He=[];$("input[name='falc_h']:checked").each(function(){He.push(this.value)});var Le=[];$("input[name='falc_pe']:checked").each(function(){Le.push(this.value)});var Se=$("#falc_text").val(),we=[];$("input[name='neop_nin']:checked").each(function(){we.push(this.value)});var Ce=[];$("input[name='neop_m']:checked").each(function(){Ce.push(this.value)});var Fe=[];$("input[name='neop_p']:checked").each(function(){Fe.push(this.value)});var Oe=[];$("input[name='neop_h']:checked").each(function(){Oe.push(this.value)});var Ue=[];$("input[name='neop_pe']:checked").each(function(){Ue.push(this.value)});var Xe=$("#neop_text").val(),Ae=[];$("input[name='psi_nin']:checked").each(function(){Ae.push(this.value)});var Be=[];$("input[name='psi_m']:checked").each(function(){Be.push(this.value)});var Ie=[];$("input[name='psi_p']:checked").each(function(){Ie.push(this.value)});var Pe=[];$("input[name='psi_h']:checked").each(function(){Pe.push(this.value)});var Ee=[];$("input[name='psi_pe']:checked").each(function(){Ee.push(this.value)});var Ge=$("#psi_text").val(),Je=[];$("input[name='obs_nin']:checked").each(function(){Je.push(this.value)});var Ke=[];$("input[name='obs_m']:checked").each(function(){Ke.push(this.value)});var Me=[];$("input[name='obs_p']:checked").each(function(){Me.push(this.value)});var Ne=[];$("input[name='obs_h']:checked").each(function(){Ne.push(this.value)});var Qe=[];$("input[name='obs_pe']:checked").each(function(){Qe.push(this.value)});var Ve=$("#obs_text").val(),We=[];$("input[name='ulp_nin']:checked").each(function(){We.push(this.value)});var Ye=[];$("input[name='ulp_m']:checked").each(function(){Ye.push(this.value)});var Ze=[];$("input[name='ulp_p']:checked").each(function(){Ze.push(this.value)});var ea=[];$("input[name='ulp_h']:checked").each(function(){ea.push(this.value)});var aa=[];$("input[name='ulp_pe']:checked").each(function(){aa.push(this.value)});var ca=$("#ulp_text").val(),na=[];$("input[name='art_nin']:checked").each(function(){na.push(this.value)});var ha=[];$("input[name='art_m']:checked").each(function(){ha.push(this.value)});var ta=[];$("input[name='art_p']:checked").each(function(){ta.push(this.value)});var ia=[];$("input[name='art_h']:checked").each(function(){ia.push(this.value)});var ua=[];$("input[name='art_pe']:checked").each(function(){ua.push(this.value)});var pa=$("#art_text").val(),_a=[];$("input[name='hem_nin']:checked").each(function(){_a.push(this.value)});var oa=[];$("input[name='hem_m']:checked").each(function(){oa.push(this.value)});var sa=[];$("input[name='hem_p']:checked").each(function(){sa.push(this.value)});var va=[];$("input[name='hem_h']:checked").each(function(){va.push(this.value)});var ra=[];$("input[name='hem_pe']:checked").each(function(){ra.push(this.value)});var la=$("#hem_text").val(),ma=[];$("input[name='zika_nin']:checked").each(function(){ma.push(this.value)});var ka=[];$("input[name='zika_m']:checked").each(function(){ka.push(this.value)});var $a=[];$("input[name='zika_p']:checked").each(function(){$a.push(this.value)});var da=[];$("input[name='zika_h']:checked").each(function(){da.push(this.value)});var fa=[];$("input[name='zika_pe']:checked").each(function(){fa.push(this.value)});var ba=$("#zika_text").val(),xa=$("#otros").val(),ga=$("#text-maltrato").val(),ya=$("#text-abuso").val(),ja=$("#text-neg").val(),za=$("#maltrato-emo").val(),Ta=$("#alimentos_al").val(),qa=$("#medicamentos_al").val(),Ra=$("#otros_al").val(),Da=$("#quirurgicos").val(),Ha=$("#gineco").val(),La=$("#abdominal").val(),Sa=$("#toracica").val(),wa=$("#transfusion").val(),Ca=$("#otros1").val(),Fa=$("#grouposang").val(),Oa=$("input:radio[name=hepatis]:checked").val(),Ua=$("input:radio[name=hpv]:checked").val(),Xa=$("input:radio[name=toxoide]:checked").val(),Aa=$("#tipificacion").val(),Ba=$("input:radio[name=rhoa]:checked").val(),Ia=$("#violencia1").val(),Pa=$("#violencia2").val(),Ea=$("#violencia3").val(),Ga=$("#violencia4").val(),Ja=$("#hab_c_caf").val(),Ka=$("#hab_f_caf").val(),Ma=$("#hab_c_pip").val(),Na=$("#hab_f_pip").val(),Qa=$("#hab_c_ciga").val(),Va=$("#hab_f_ciga").val(),Wa=$("#hab_c_al").val(),Ya=$("#hab_f_al").val(),Za=$("#hab_c_tab").val(),ec=$("#hab_f_tab").val(),ac=$("#hookah").val(),cc=$("#hab_f_hookah").val(),nc=$("#hab_t_drug").val(),hc=$("#hab_c_drug").val(),tc=$("#hab_f_drug").val(),ic=$("#od_con_cor").val(),uc=$("#od_sin_con").val(),pc=$("input[name='od_mas_o_meno']:checked").val(),_c=$("#od_cor_act").val(),oc=$("#os_sin_con").val(),sc=$("#os_con_cor").val(),vc=$("input[name='os_mas_o_meno']:checked").val(),rc=$("#os_cor_act").val(),lc=$("#retine1").val(),mc=$("#retine2").val(),kc=$("#retine3").val(),$c=$("#retine4").val(),dc=$("#retine5").val(),fc=$("#retine6").val(),bc=$("#retine7").val(),xc=$("#retine8").val(),gc=$("input[name='masomenos1']:checked").val(),yc=$("input[name='masomenos2']:checked").val(),jc=$("input[name='masomenos3']:checked").val(),zc=$("input[name='masomenos4']:checked").val(),Tc=$("input[name='masomenos5']:checked").val(),qc=$("input[name='masomenos6']:checked").val(),Rc=$("input[name='masomenos7']:checked").val(),Dc=$("input[name='masomenos8']:checked").val(),Hc=$("#ppm").val(),Lc=$("#converg").val(),Sc=$("#ducvers").val(),wc=$("#convertest").val(),Cc=$("#conj1").val(),Fc=$("#conj2").val(),Oc=$("#cornea1").val(),Uc=$("#cornea2").val(),Xc=$("#pup1").val(),Ac=$("#pup2").val(),Bc=$("#crist1").val(),Ic=$("#crist2").val(),Pc=$("#vitreo1").val(),Ec=$("#vitreo2").val(),Gc=$("#not-oftm").val(),Jc=$("#fondos1").val(),Kc=$("#fondos2").val(),Mc=canvas2.toDataURL("image/png"),Nc=canvas21.toDataURL("image/png");$.ajax({type:"POST",url:"<?=base_url('saveHistorialForms/saveOftalmologia')?>",data:{todo_check:v,car_nin_check:r,madre_check:l,padre_check:m,car_h_check:k,car_pe_check:d,car_text:f,nin_check2:b,madre_check2:x,padre_check2:g,h_check2:y,pe_check2:j,hip_text:z,nin_check3:T,madre_check3:q,padre_check3:R,h_check3:D,pe_check3:H,ec_text:L,nin_check4:S,madre_check4:w,padre_check4:C,h_check4:F,pe_check4:O,ep_text:U,nin_check5:X,madre_check5:A,padre_check5:B,h_check5:I,pe_check5:P,as_text:E,nin_check05:G,madre_check05:J,padre_check05:K,h_check05:M,pe_check05:N,enre_text:Q,nin_check6:V,madre_check6:W,padre_check6:Y,h_check6:Z,pe_check6:ee,tub_text:ae,nin_check7:ce,madre_check7:ne,padre_check7:he,h_check7:te,pe_check7:ie,dia_text:ue,nin_check8:pe,madre_check8:_e,padre_check8:oe,h_check8:se,pe_check8:ve,tir_text:re,hep_tipo:le,nin_check9:me,madre_check9:ke,padre_check9:$e,h_check9:de,pe_check9:fe,hep_text:be,nin_check10:xe,madre_check10:ge,padre_check10:ye,h_check10:je,pe_check10:ze,enfr_text:Te,nin_check11:qe,madre_check11:Re,padre_check11:De,h_check11:He,pe_check11:Le,falc_text:Se,neop_check12:we,madre_check12:Ce,padre_check12:Fe,h_check12:Oe,pe_check12:Ue,neop_text:Xe,psi_check13:Ae,madre_check13:Be,padre_check13:Ie,h_check13:Pe,pe_check13:Ee,psi_text:Ge,obs_check14:Je,madre_check14:Ke,padre_check14:Me,h_check14:Ne,pe_check14:Qe,obs_text:Ve,ulp_check15:We,madre_check15:Ye,padre_check15:Ze,h_check15:ea,pe_check15:aa,ulp_text:ca,art_check16:na,madre_check16:ha,padre_check16:ta,h_check16:ia,pe_check16:ua,art_text:pa,art_check016:_a,madre_check016:oa,padre_check016:sa,h_check016:va,pe_check016:ra,hem_text:la,zika_check17:ma,madre_check17:ka,padre_check17:$a,h_check17:da,pe_check17:fa,zika_text:ba,otros:xa,textmaltrato_g:ga,textabuso_g:ya,textneg_g:ja,maltratoemo_g:za,alimentos_al:Ta,medicamentos_al:qa,otros_al:Ra,violencia1:Ia,violencia2:Pa,violencia3:Ea,violencia4:Ga,quirurgicos:Da,gineco:Ha,abdominal:La,toracica:Sa,transfusion:wa,otros1_g:Ca,hepatis:Oa,toxoide:Xa,hpv:Ua,grouposang:Fa,tipificacion:Aa,rhoa:Ba,hab_c_caf:Ja,hab_f_caf:Ka,hab_c_pip:Ma,hab_f_pip:Na,hab_c_ciga:Qa,hab_f_ciga:Va,hab_c_al:Wa,hab_f_al:Ya,hab_c_tab:Za,hab_f_tab:ec,hab_t_drug:nc,hab_c_drug:hc,hab_f_drug:tc,hookah:ac,hab_f_hookah:cc,enf_motivo:a,enf_signopsis:c,enf_laboratorios:n,enf_estudios:h,od_sin_con:uc,od_con_cor:ic,od_mas_o_meno:pc,od_cor_act:_c,os_sin_con:oc,os_con_cor:sc,os_mas_o_meno:vc,os_cor_act:rc,retine1:lc,retine2:mc,retine3:kc,retine4:$c,retine5:dc,retine6:fc,retine7:bc,retine8:xc,ppm:Hc,converg:Lc,ducvers:Sc,convertest:wc,masomenos1:gc,masomenos2:yc,masomenos3:jc,masomenos4:zc,masomenos5:Tc,masomenos6:qc,masomenos7:Rc,masomenos8:Dc,conj1:Cc,conj2:Fc,cornea1:Oc,cornea2:Uc,pup1:Xc,pup2:Ac,crist1:Bc,crist2:Ic,vitreo1:Pc,vitreo2:Ec,not_oftm:Gc,fondos1:Jc,fondos2:Kc,canvasOj:Mc,canvasFo:Nc,hist_id:i,inserted_by:t,user_id:u,centro_medico:p,plan:o,cied:_,otros_diagnos:s},dataType:"json",cache:!0,error:function(e,a,c){alert("An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#result").html("<p>statuscode: "+e.status+"</p><p>errorThrown: "+c+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(a),console.log("errorThrown:"),console.log(c)},success:function(e){pressBtnHist(e)}})})</script>