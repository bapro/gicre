<script>$("#save_ant_gen").on("click",function(e){e.preventDefault();var a=$("#enf_motivo").val(),c=$("#enf_signopsis").val().trim(),n=$("#enf_laboratorios").val(),t=$("#enf_estudios").val(),i=($("#ant_fam").val(),$("#ant_prenatales").val(),$("#factories_ambiente").val(),$("#inserted_by").val()),h=$("#hist_id").val(),u=<?=$user_id?>,l=<?=$centro_medico?>,v=$("input[name='cied']:checked").val(),o=$("#plan").val().trim(),p=$("#otros_diagnos").val().trim(),_=[];$("input[name='todo']:checked").each(function(){_.push(this.value)});var s=[];$("input[name='car_nin']:checked").each(function(){s.push(this.value)});var r=[];$("input[name='car_m']:checked").each(function(){r.push(this.value)});var d=[];$("input[name='car_p']:checked").each(function(){d.push(this.value)});var m=[];$("input[name='car_h']:checked").each(function(){m.push(this.value)});var f=[];$("input[name='car_pe']:checked").each(function(){f.push(this.value)});var k=$("#car_text").val(),x=[];$("input[name='hip_nin']:checked").each(function(){x.push(this.value)});var g=[];$("input[name='hip_m']:checked").each(function(){g.push(this.value)});var b=[];$("input[name='hip_p']:checked").each(function(){b.push(this.value)});var z=[];$("input[name='hip_h']:checked").each(function(){z.push(this.value)});var y=[];$("input[name='hip_pe']:checked").each(function(){y.push(this.value)});var q=$("#hip_text").val(),w=[];$("input[name='ec_nin']:checked").each(function(){w.push(this.value)});var T=[];$("input[name='ec_m']:checked").each(function(){T.push(this.value)});var j=[];$("input[name='ec_p']:checked").each(function(){j.push(this.value)});var H=[];$("input[name='ec_h']:checked").each(function(){H.push(this.value)});var S=[];$("input[name='ec_pe']:checked").each(function(){S.push(this.value)});var C=$("#ec_text").val(),R=[];$("input[name='ep_nin']:checked").each(function(){R.push(this.value)});var X=[];$("input[name='ep_m']:checked").each(function(){X.push(this.value)});var A=[];$("input[name='ep_p']:checked").each(function(){A.push(this.value)});var B=[];$("input[name='ep_h']:checked").each(function(){B.push(this.value)});var D=[];$("input[name='ep_pe']:checked").each(function(){D.push(this.value)});var F=$("#ep_text").val(),I=[];$("input[name='as_nin']:checked").each(function(){I.push(this.value)});var L=[];$("input[name='as_m']:checked").each(function(){L.push(this.value)});var O=[];$("input[name='as_p']:checked").each(function(){O.push(this.value)});var P=[];$("input[name='as_h']:checked").each(function(){P.push(this.value)});var E=[];$("input[name='as_pe']:checked").each(function(){E.push(this.value)});var G=$("#as_text").val(),J=[];$("input[name='enre_nin']:checked").each(function(){J.push(this.value)});var K=[];$("input[name='enre_m']:checked").each(function(){K.push(this.value)});var M=[];$("input[name='enre_p']:checked").each(function(){M.push(this.value)});var N=[];$("input[name='enre_h']:checked").each(function(){N.push(this.value)});var Q=[];$("input[name='enre_pe']:checked").each(function(){Q.push(this.value)});var U=$("#enre_text").val(),V=[];$("input[name='tub_nin']:checked").each(function(){V.push(this.value)});var W=[];$("input[name='tub_m']:checked").each(function(){W.push(this.value)});var Y=[];$("input[name='tub_p']:checked").each(function(){Y.push(this.value)});var Z=[];$("input[name='tub_h']:checked").each(function(){Z.push(this.value)});var ee=[];$("input[name='tub_pe']:checked").each(function(){ee.push(this.value)});var ae=$("#tub_text").val(),ce=[];$("input[name='dia_nin']:checked").each(function(){ce.push(this.value)});var ne=[];$("input[name='dia_m']:checked").each(function(){ne.push(this.value)});var te=[];$("input[name='dia_p']:checked").each(function(){te.push(this.value)});var ie=[];$("input[name='dia_h']:checked").each(function(){ie.push(this.value)});var he=[];$("input[name='dia_pe']:checked").each(function(){he.push(this.value)});var ue=$("#dia_text").val(),le=[];$("input[name='tir_nin']:checked").each(function(){le.push(this.value)});var ve=[];$("input[name='tir_m']:checked").each(function(){ve.push(this.value)});var oe=[];$("input[name='tir_p']:checked").each(function(){oe.push(this.value)});var pe=[];$("input[name='tir_h']:checked").each(function(){pe.push(this.value)});var _e=[];$("input[name='tir_pe']:checked").each(function(){_e.push(this.value)});var se=$("#tir_text").val(),re=$("#hep_tipo").val(),$e=[];$("input[name='hep_nin']:checked").each(function(){$e.push(this.value)});var de=[];$("input[name='hep_m']:checked").each(function(){de.push(this.value)});var me=[];$("input[name='hep_p']:checked").each(function(){me.push(this.value)});var fe=[];$("input[name='hep_h']:checked").each(function(){fe.push(this.value)});var ke=[];$("input[name='hep_pe']:checked").each(function(){ke.push(this.value)});var xe=$("#hep_text").val(),ge=[];$("input[name='enfr_nin']:checked").each(function(){ge.push(this.value)});var be=[];$("input[name='enfr_m']:checked").each(function(){be.push(this.value)});var ze=[];$("input[name='enfr_p']:checked").each(function(){ze.push(this.value)});var ye=[];$("input[name='enfr_h']:checked").each(function(){ye.push(this.value)});var qe=[];$("input[name='enfr_pe']:checked").each(function(){qe.push(this.value)});var we=$("#enfr_text").val(),Te=[];$("input[name='falc_nin']:checked").each(function(){Te.push(this.value)});var je=[];$("input[name='falc_m']:checked").each(function(){je.push(this.value)});var He=[];$("input[name='falc_p']:checked").each(function(){He.push(this.value)});var Se=[];$("input[name='falc_h']:checked").each(function(){Se.push(this.value)});var Ce=[];$("input[name='falc_pe']:checked").each(function(){Ce.push(this.value)});var Re=$("#falc_text").val(),Xe=[];$("input[name='neop_nin']:checked").each(function(){Xe.push(this.value)});var Ae=[];$("input[name='neop_m']:checked").each(function(){Ae.push(this.value)});var Be=[];$("input[name='neop_p']:checked").each(function(){Be.push(this.value)});var De=[];$("input[name='neop_h']:checked").each(function(){De.push(this.value)});var Fe=[];$("input[name='neop_pe']:checked").each(function(){Fe.push(this.value)});var Ie=$("#neop_text").val(),Le=[];$("input[name='psi_nin']:checked").each(function(){Le.push(this.value)});var Oe=[];$("input[name='psi_m']:checked").each(function(){Oe.push(this.value)});var Pe=[];$("input[name='psi_p']:checked").each(function(){Pe.push(this.value)});var Ee=[];$("input[name='psi_h']:checked").each(function(){Ee.push(this.value)});var Ge=[];$("input[name='psi_pe']:checked").each(function(){Ge.push(this.value)});var Je=$("#psi_text").val(),Ke=[];$("input[name='obs_nin']:checked").each(function(){Ke.push(this.value)});var Me=[];$("input[name='obs_m']:checked").each(function(){Me.push(this.value)});var Ne=[];$("input[name='obs_p']:checked").each(function(){Ne.push(this.value)});var Qe=[];$("input[name='obs_h']:checked").each(function(){Qe.push(this.value)});var Ue=[];$("input[name='obs_pe']:checked").each(function(){Ue.push(this.value)});var Ve=$("#obs_text").val(),We=[];$("input[name='ulp_nin']:checked").each(function(){We.push(this.value)});var Ye=[];$("input[name='ulp_m']:checked").each(function(){Ye.push(this.value)});var Ze=[];$("input[name='ulp_p']:checked").each(function(){Ze.push(this.value)});var ea=[];$("input[name='ulp_h']:checked").each(function(){ea.push(this.value)});var aa=[];$("input[name='ulp_pe']:checked").each(function(){aa.push(this.value)});var ca=$("#ulp_text").val(),na=[];$("input[name='art_nin']:checked").each(function(){na.push(this.value)});var ta=[];$("input[name='art_m']:checked").each(function(){ta.push(this.value)});var ia=[];$("input[name='art_p']:checked").each(function(){ia.push(this.value)});var ha=[];$("input[name='art_h']:checked").each(function(){ha.push(this.value)});var ua=[];$("input[name='art_pe']:checked").each(function(){ua.push(this.value)});var la=$("#art_text").val(),va=[];$("input[name='hem_nin']:checked").each(function(){va.push(this.value)});var oa=[];$("input[name='hem_m']:checked").each(function(){oa.push(this.value)});var pa=[];$("input[name='hem_p']:checked").each(function(){pa.push(this.value)});var _a=[];$("input[name='hem_h']:checked").each(function(){_a.push(this.value)});var sa=[];$("input[name='hem_pe']:checked").each(function(){sa.push(this.value)});var ra=$("#hem_text").val(),$a=[];$("input[name='zika_nin']:checked").each(function(){$a.push(this.value)});var da=[];$("input[name='zika_m']:checked").each(function(){da.push(this.value)});var ma=[];$("input[name='zika_p']:checked").each(function(){ma.push(this.value)});var fa=[];$("input[name='zika_h']:checked").each(function(){fa.push(this.value)});var ka=[];$("input[name='zika_pe']:checked").each(function(){ka.push(this.value)});var xa=$("#zika_text").val(),ga=$("#otros").val(),ba=$("#text-grueso").val(),za=$("#text-fino").val(),ya=$("#text-lenguage").val(),qa=$("#text-social").val(),wa=$("#text-maltrato").val(),Ta=$("#text-abuso").val(),ja=$("#text-neg").val(),Ha=$("#maltrato-emo").val(),Sa=$("#alimentos_al").val(),Ca=$("#medicamentos_al").val(),Ra=$("#otros_al").val(),Xa=$("#quirurgicos").val(),Aa=$("#gineco").val(),Ba=$("#abdominal").val(),Da=$("#toracica").val(),Fa=$("#transfusion").val(),Ia=$("#otros1").val(),La=$("#grouposang").val(),Oa=$("input:radio[name=hepatis]:checked").val(),Pa=$("input:radio[name=hpv]:checked").val(),Ea=$("input:radio[name=toxoide]:checked").val(),Ga=$("#tipificacion").val(),Ja=$("input:radio[name=rhoa]:checked").val(),Ka=$("#violencia1").val(),Ma=$("#violencia2").val(),Na=$("#violencia3").val(),Qa=$("#violencia4").val(),Ua=$("#hab_c_caf").val(),Va=$("#hab_f_caf").val(),Wa=$("#hab_c_pip").val(),Ya=$("#hab_f_pip").val(),Za=$("#hab_c_ciga").val(),ec=$("#hab_f_ciga").val(),ac=$("#hab_c_al").val(),cc=$("#hab_f_al").val(),nc=$("#hab_c_tab").val(),tc=$("#hab_f_tab").val(),ic=$("#hookah").val(),hc=$("#hab_f_hookah").val(),uc=$("#hab_t_drug").val(),lc=$("#hab_c_drug").val(),vc=$("#hab_f_drug").val(),oc=$("#oido1").val(),pc=$("#oido2").val(),_c=$("#nariz").val(),sc=$("#boca").val(),rc=$("#otorrino-cuello1").val(),$c=$("#otorrino-cuello2").val(),dc=$("#observaciones-ot").val(),mc=$("#peso").val(),fc=$("#kg").val(),kc=$("#talla-ef").val(),xc=$("#pulgada-exf").val(),gc=$("#imc").val(),bc=$("#ta").val(),zc=$("#fr").val(),yc=$("#fc").val(),qc=$("#hg").val(),wc=$("#tempo").val(),Tc=$("#pulso").val(),jc=$("#glicemia").val(),Hc=$("input[name='radio_signo']:checked").val(),Sc=$("#neuro_text").val(),Cc=$("#cabeza").val(),Rc=$("#cuello").val(),Xc=$("#cabeza_text").val(),Ac=$("#cuello_text").val(),Bc=$("#abd_insp").val(),Dc=$("#ausc").val(),Fc=$("#perc").val(),Ic=$("#palpa").val(),Lc=$("#ext_sup_text").val(),Oc=$("#ext_sup").val(),Pc=$("#ext_inf").val(),Ec=$("#ext_inft").val(),Gc=$("#rectal").val(),Jc=$("#rectal_text").val(),Kc=$("#genitalm").val(),Mc=$("#vagina").val(),Nc=$("#vagina_text").val(),Qc=$("#genitalm_text").val(),Uc=$("#genitalf").val(),Vc=$("#genitalf_text").val(),Wc=$("#torax").val(),Yc=$("#torax_text").val(),Zc=$("#corazon_text").val(),en=$("#pulmones_text").val(),an=$("#abdomen_text").val(),cn=$("#cuad_inf_ext1").val(),nn=$("#mama_izq1").val(),tn=$("#cuad_sup_ext1").val(),hn=$("#cuad_inf_ext11").val(),un=$("#region_retro1").val(),ln=$("#region_areola_pezon1").val(),vn=$("#region_ax1").val(),on=$("#cuad_inf_ext2").val(),pn=$("#mama_izq2").val(),_n=$("#cuad_sup_ext2").val(),sn=$("#cuad_inf_ext22").val(),rn=$("#region_retro2").val(),$n=$("#region_areola_pezon2").val(),dn=$("#region_ax2").val(),mn=$("input[name='especuloscopia']:checked").val(),fn=$("input[name='tacto_bima']:checked").val(),kn=$("#cervix").val(),xn=$("#cervix_text").val(),gn=$("#utero_text").val(),bn=$("#anexo_derecho_text").val(),zn=$("#anexo_iz_text").val(),yn=$("#inspection_vulval").val(),qn=$("#inspection_vulval_text").val(),wn=$("#extremidades_inf").val(),Tn=$("#extremidades_inf_text").val(),jn=$("#neuro_s").val(),Hn=$("#sisneuro").val(),Sn=$("#neurologico").val(),Cn=$("#siscardio").val(),Rn=$("#cardiova").val(),Xn=$("#sist_uro").val(),An=$("#urogenital").val(),Bn=$("#sis_mu_e").val(),Dn=$("#musculoes").val(),Fn=$("#sist_resp").val(),In=$("#nervioso").val(),Ln=$("#linfatico").val(),On=$("#digestivo").val(),Pn=$("#respiratorio").val(),En=$("#genitourinario").val(),Gn=$("#sist_diges").val(),Jn=$("#sist_endo").val(),Kn=$("#endocrino").val(),Mn=$("#sist_rela").val(),Nn=$("#otros_ex_sis").val(),Qn=$("#dorsales").val(),Un=$("input:radio[name=evo]:checked").val(),Vn=$("#evol_text").val(),Wn=($("#med").val(),$("#dosis").val(),$("#tiempo").val(),$("#edad").val(),$("#via").val(),$("input:radio[name=tnaci]:checked").val()),Yn=$("#describa").val(),Zn=$("#edad_gest").val(),et=$("#pesopd").val(),at=[];$("input[name='desco1']:checked").each(function(){at.push(this.value)});kc=$("#talla").val();var ct=[];$("input[name='desco2']:checked").each(function(){ct.push(this.value)});var nt=[];$("input[name='lactamat']:checked").each(function(){nt.push(this.value)});var tt=[];$("input[name='leche']:checked").each(function(){tt.push(this.value)});var it=$("#otrosinfo").val(),ht=($("input:radio[name=traum]:checked").val(),$("#traum_text").val()),ut=($("input:radio[name=trans]:checked").val(),$("#trans_text").val()),lt=$("#textmaltrato").val(),vt=$("#textabuso").val(),ot=$("#textneg").val(),pt=$("#maltratoemo").val(),_t=(ba=$("#text-grueso").val(),za=$("#text-fino").val(),ya=$("#text-lenguage").val(),qa=$("#text-social").val(),[]);$("input[name='ale']:checked").each(function(){_t.push(this.value)});var st=[];$("input[name='hep']:checked").each(function(){st.push(this.value)});var rt=[];$("input[name='amig']:checked").each(function(){rt.push(this.value)});var $t=[];$("input[name='infv']:checked").each(function(){$t.push(this.value)});var dt=[];$("input[name='asm']:checked").each(function(){dt.push(this.value)});var mt=[];$("input[name='neum']:checked").each(function(){mt.push(this.value)});var ft=[];$("input[name='cirug']:checked").each(function(){ft.push(this.value)});var kt=[];$("input[name='otot']:checked").each(function(){kt.push(this.value)});var xt=[];$("input[name='deng']:checked").each(function(){xt.push(this.value)});var gt=[];$("input[name='pape']:checked").each(function(){gt.push(this.value)});var bt=[];$("input[name='diar']:checked").each(function(){bt.push(this.value)});var zt=[];$("input[name='paras']:checked").each(function(){zt.push(this.value)});var yt=[];$("input[name='zika']:checked").each(function(){yt.push(this.value)});var qt=[];$("input[name='saram']:checked").each(function(){qt.push(this.value)});var wt=[];$("input[name='chicun']:checked").each(function(){wt.push(this.value)});var Tt=[];$("input[name='varicela']:checked").each(function(){Tt.push(this.value)});var jt=[];$("input[name='falc']:checked").each(function(){jt.push(this.value)});var Ht=$("#otros_t_text").val(),St=$("#insert_d").val(),Ct=$("#no_ap11").val(),Rt=$("#bcg1").val(),Xt=$("#resf1").val(),At=$("#no_ap22").val(),Bt=$("#bcg2").val(),Dt=$("#resf2").val(),Ft=$("#no_ap33").val(),It=$("#yel3").val(),Lt=$("#resf3").val(),Ot=$("#no_ap44").val(),Pt=$("#bl4").val(),Et=$("#resf4").val(),Gt=$("#no_ap55").val(),Jt=$("#yel5").val(),Kt=$("#resf5").val(),Mt=$("#no_ap66").val(),Nt=$("#bl6").val(),Qt=$("#resf6").val(),Ut=$("#no_ap77").val(),Vt=$("#gr7").val(),Wt=$("#resf7").val(),Yt=$("#no_ap88").val(),Zt=$("#bll8").val(),ei=$("#resf8").val(),ai=$("#no_ap99").val(),ci=$("#grr9").val(),ni=$("#resf9").val(),ti=$("#no_ap1010").val(),ii=$("#yel10").val(),hi=$("#resf10").val(),ui=$("#no_ap1111").val(),li=$("#bl11").val(),vi=$("#resf11").val(),oi=$("#no_ap1212").val(),pi=$("#gr12").val(),_i=$("#resf12").val(),si=$("#no_ap1313").val(),ri=$("#yel13").val(),$i=$("#resf13").val(),di=$("#no_ap1414").val(),mi=$("#bl14").val(),fi=$("#resf14").val(),ki=$("#no_ap1515").val(),xi=$("#bll15").val(),gi=$("#resf15").val(),bi=$("#no_ap1616").val(),zi=$("#bcg16").val(),yi=$("#resf16").val(),qi=$("#no_ap1717").val(),wi=$("#bll17").val(),Ti=$("#resf17").val(),ji=$("#no_ap1818").val(),Hi=$("#grr18").val(),Si=$("#resf18").val();$.ajax({type:"POST",url:"<?=base_url('saveHistorialForms/savePediatria')?>",data:{todo_check:_,car_nin_check:s,madre_check:r,padre_check:d,car_h_check:m,car_pe_check:f,car_text:k,nin_check2:x,madre_check2:g,padre_check2:b,h_check2:z,pe_check2:y,hip_text:q,nin_check3:w,madre_check3:T,padre_check3:j,h_check3:H,pe_check3:S,ec_text:C,nin_check4:R,madre_check4:X,padre_check4:A,h_check4:B,pe_check4:D,ep_text:F,nin_check5:I,madre_check5:L,padre_check5:O,h_check5:P,pe_check5:E,as_text:G,nin_check05:J,madre_check05:K,padre_check05:M,h_check05:N,pe_check05:Q,enre_text:U,nin_check6:V,madre_check6:W,padre_check6:Y,h_check6:Z,pe_check6:ee,tub_text:ae,nin_check7:ce,madre_check7:ne,padre_check7:te,h_check7:ie,pe_check7:he,dia_text:ue,nin_check8:le,madre_check8:ve,padre_check8:oe,h_check8:pe,pe_check8:_e,tir_text:se,hep_tipo:re,nin_check9:$e,madre_check9:de,padre_check9:me,h_check9:fe,pe_check9:ke,hep_text:xe,nin_check10:ge,madre_check10:be,padre_check10:ze,h_check10:ye,pe_check10:qe,enfr_text:we,nin_check11:Te,madre_check11:je,padre_check11:He,h_check11:Se,pe_check11:Ce,falc_text:Re,neop_check12:Xe,madre_check12:Ae,padre_check12:Be,h_check12:De,pe_check12:Fe,neop_text:Ie,psi_check13:Le,madre_check13:Oe,padre_check13:Pe,h_check13:Ee,pe_check13:Ge,psi_text:Je,obs_check14:Ke,madre_check14:Me,padre_check14:Ne,h_check14:Qe,pe_check14:Ue,obs_text:Ve,ulp_check15:We,madre_check15:Ye,padre_check15:Ze,h_check15:ea,pe_check15:aa,ulp_text:ca,art_check16:na,madre_check16:ta,padre_check16:ia,h_check16:ha,pe_check16:ua,art_text:la,art_check016:va,madre_check016:oa,padre_check016:pa,h_check016:_a,pe_check016:sa,hem_text:ra,zika_check17:$a,madre_check17:da,padre_check17:ma,h_check17:fa,pe_check17:ka,zika_text:xa,otros:ga,textmaltrato_g:wa,textabuso_g:Ta,textneg_g:ja,maltratoemo_g:Ha,alimentos_al:Sa,medicamentos_al:Ca,otros_al:Ra,violencia1:Ka,violencia2:Ma,violencia3:Na,violencia4:Qa,quirurgicos:Xa,gineco:Aa,abdominal:Ba,toracica:Da,transfusion:Fa,otros1_g:Ia,hepatis:Oa,toxoide:Ea,hpv:Pa,grouposang:La,tipificacion:Ga,rhoa:Ja,hab_c_caf:Ua,hab_f_caf:Va,hab_c_pip:Wa,hab_f_pip:Ya,hab_c_ciga:Za,hab_f_ciga:ec,hab_c_al:ac,hab_f_al:cc,hab_c_tab:nc,hab_f_tab:tc,hab_t_drug:uc,hab_c_drug:lc,hab_f_drug:vc,hookah:ic,hab_f_hookah:hc,enf_motivo:a,enf_signopsis:c,enf_laboratorios:n,enf_estudios:t,peso:mc,kg:fc,talla:kc,imc:gc,ta:bc,pulgada:xc,fr:zc,fc:yc,hg:qc,tempo:wc,pulso:Tc,radio_signo:Hc,glicemia:jc,neuro_s:jn,neuro_text:Sc,cabeza:Cc,cabeza_text:Xc,cuello:Rc,cuello_text:Ac,abd_insp:Bc,ausc:Dc,perc:Fc,palpa:Ic,ext_sup:Oc,ext_sup_text:Lc,torax:Wc,torax_text:Yc,ext_inf:Pc,ext_inft:Ec,rectal:Gc,rectal_text:Jc,genitalm_text:Qc,genitalm:Kc,genitalf_text:Vc,genitalf:Uc,corazon_text:Zc,pulmones_text:en,abdomen_text:an,vagina:Mc,vagina_text:Nc,cuad_inf_ext1:cn,mama_izq1:nn,cuad_sup_ext1:tn,cuad_inf_ext11:hn,region_retro1:un,region_areola_pezon1:ln,region_ax1:vn,cuad_inf_ext2:on,mama_izq2:pn,cuad_sup_ext2:_n,cuad_inf_ext22:sn,region_retro2:rn,region_areola_pezon2:$n,region_ax2:dn,especuloscopia:mn,tacto_bima:fn,cervix:kn,cervix_text:xn,utero_text:gn,anexo_derecho_text:bn,anexo_iz_text:zn,inspection_vulval:yn,inspection_vulval_text:qn,extremidades_inf:wn,extremidades_inf_text:Tn,oido1:oc,oido2:pc,nariz:_c,boca:sc,otorrino_cuello1:rc,otorrino_cuello2:$c,observaciones_ot:dc,sisneuro:Hn,neurologico:Sn,siscardio:Cn,cardiova:Rn,sist_uro:Xn,urogenital:An,sis_mu_e:Bn,musculoes:Dn,sist_resp:Fn,nervioso:In,linfatico:Ln,digestivo:On,respiratorio:Pn,genitourinario:En,sist_diges:Gn,sist_endo:Jn,endocrino:Kn,sist_rela:Mn,otros_ex_sis:Nn,dorsales:Qn,ale1:_t,otros_t_text:Ht,hep1:st,amig1:rt,infv1:$t,asm1:dt,neum1:mt,cirug1:ft,otot1:kt,deng1:xt,pape1:gt,diar1:bt,paras1:zt,zika1:yt,saram1:qt,chicun1:wt,varicela1:Tt,falc1:jt,textmaltrato:lt,textabuso:vt,textneg:ot,maltratoemo:pt,textsocial:qa,textlenguage:ya,textfino:za,textgrueso:ba,evo:Un,evol_text:Vn,tnaci:Wn,describa:Yn,edad_gest:Zn,pesopd:et,talla:kc,descoa:at,descob:ct,lactamat1:nt,leche1:tt,otrosinfo:it,traum_text:ht,trans_text:ut,insert_d:St,no_ap1:Ct,bcg1:Rt,resf1:Xt,no_ap2:At,bcg2:Bt,resf2:Dt,no_ap3:Ft,yel3:It,resf3:Lt,no_ap4:Ot,bl4:Pt,resf4:Et,no_ap5:Gt,yel5:Jt,resf5:Kt,no_ap6:Mt,bl6:Nt,resf6:Qt,no_ap7:Ut,gr7:Vt,resf7:Wt,no_ap8:Yt,bll8:Zt,resf8:ei,no_ap9:ai,grr9:ci,resf9:ni,no_ap10:ti,yel10:ii,resf10:hi,no_ap11:ui,bl11:li,resf11:vi,no_ap12:oi,gr12:pi,resf12:_i,no_ap13:si,yel13:ri,resf13:$i,no_ap14:di,bl14:mi,resf14:fi,no_ap15:ki,bll15:xi,resf15:gi,no_ap16:bi,srp16:zi,resf16:yi,no_ap17:qi,bll17:wi,resf17:Ti,no_ap18:ji,grr18:Hi,resf18:Si,hist_id:h,inserted_by:i,user_id:u,centro_medico:l,plan:o,cied:v,otros_diagnos:p},dataType:"json",cache:!0,error:function(e,a,c){alert("An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#result").html("<p>statuscode: "+e.status+"</p><p>errorThrown: "+c+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(a),console.log("errorThrown:"),console.log(c)},success:function(e){pressBtnHist(e)}})})</script>