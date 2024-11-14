<style>.control-label{font-size:16px}.table-bordered input{font-size:12px;text-transform:lowercase}#show_vacuna{text-decoration:none;background:green;color:#fff;display:inline-block;padding:6px;border-radius:20px;cursor:pointer}</style><br><div class="col-md-12"style="margin-left:3%"id="reset-pediad"><div class="col-md-12"><div class="table-responsive col-md-6"><table class="table"style="border-bottom:1px solid #cdcdcd"><tr><th colspan="3">Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</th></tr><tr><td style="width:30px"colspan="6"><input type="radio"name="evo"value=""checked hidden> <input type="radio"name="evo"value="normal"> <label>Normal</label></td></tr><tr><td style="width:30px"colspan="6"><input type="radio"name="evo"value="complicado"> <label>Complicado</label></td></tr><tr><td colspan="6"><textarea class="form-control"id="evol_text"cols="170"></textarea></td></tr><tr><td><label>Edad gestacional al momento del nac.</label> <select class="form-control"id="edad_gest"><option hidden></option><option>Predetermino</option><option>Termino</option><option>Post termino</option></select></td><td></td></tr></table></div><div class="table-responsive col-md-6"style="border-left:1px solid #cdcdcd"><table class="table"><tr><th colspan="3"><font style="color:red"><strong>*</strong></font> Tipo de nacimiento</th></tr><tr><td style="width:30px"><input type="radio"name="tnaci"value=""checked hidden> <input type="radio"name="tnaci"value="parto"> <label>Parto</label></td><td style="width:30px"><input type="radio"name="tnaci"value="cesarea"> <label>Cesarea</label></td><td style="width:30px"><input type="radio"name="tnaci"value="desconocido"> <label>Desconocido</label></td></tr><tr><td colspan="6"><label>Describa</label> <textarea class="form-control"id="describa"cols="170"></textarea></td></tr></table><table class="table"style="width:100%;border-bottom:1px solid #cdcdcd"><tr><td><label>Peso al nacer</label> <input id="pesopd"></td><td><label>Desconocido</label> <input type="checkbox"name="desco1"class="desco1"id="desco1"></td></tr><tr><td><label>Talla al nacer</label> <input id="talla"></td><td><label>Desconocido</label> <input type="checkbox"name="desco2"id="desco2"></td></tr></table></div></div><h3 class="h4 his_med_title">Antecedentes Pediatrico</h3><h4 style="color:green">Antecedentes Personales</h4><div class="table-responsive col-md-6"style="border-right:1px solid #cecece"><table class="table"><tr><th>No patologicos</th><th></th><th></th></tr><tr><td></td><td><input type="checkbox"name="lactamat"></td><td><label>Lactancia Materna</label></td></tr><tr><td><label>Alimentos</label></td><td><input type="checkbox"name="leche"></td><td><label>Leche de formulas</label></td></tr><tr><td colspan="3"><label>Otros</label> <textarea class="form-control"id="otrosinfo"cols="70"></textarea></td></tr></table><table class="table"><tr><th>Traumatico/somatico, psicolog</th></tr><tr><td><input type="radio"name="traum"value="no"id="traum"><label>No</label> <input type="radio"name="traum"value="si"id="traum"> <label>Si</label> <textarea class="form-control"id="traum_text"cols="20"></textarea></td></tr></table><table class="table"><tr><th>Transfusionales</th></tr><tr><td><input type="radio"name="trans"value=""id="trans"checked hidden> <input type="radio"name="trans"value="no"id="trans"><label>No</label> <input type="radio"name="trans"value="si"id="trans"> <label>Si</label> <textarea class="form-control"id="trans_text"cols="20"></textarea></td></tr></table><table class="table"style="width:100%"><tr><th><h4 style="color:green">Desarollo</h4></th><th></th><th></th></tr><tr><tr><td style="width:100%"colspan="3"><span class="ref-neurologia-text"style="display:none;font-size:13px;color:red"></span></td></tr><td style="font-size:12px"><label>Motor Grueso adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio"name="grueso"class="chkYes"checked></td><td style="font-size:12px"><label>No</label> <input type="radio"name="grueso"class="chkNo"><i aria-hidden="true"class="fa fa-exclamation-triangle triangle-1"style="color:red;display:none"title="Alert : Referir a neurologia"></i></td><tr><td colspan="3"><textarea class="form-control text-grueso"id="text-grueso"disabled></textarea></td></tr><tr><td style="font-size:12px"><label>Motor fino adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio"name="fino"class="chkYes2"checked></td><td style="font-size:12px"><label>No</label> <input type="radio"name="fino"class="chkNo2"><i aria-hidden="true"class="fa fa-exclamation-triangle triangle-2"style="color:red;display:none"title="Alert : Referir a neurologia"></td></tr><tr><td colspan="3"><textarea class="form-control text-fino"id="text-fino"disabled></textarea></td></tr><tr><td style="font-size:12px"><label>Lenguaje adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio"name="lenguage"class="chkYes3"checked></td><td style="font-size:12px"><label>No</label> <input type="radio"name="lenguage"class="chkNo3"><i aria-hidden="true"class="fa fa-exclamation-triangle triangle-3"style="color:red;display:none"title="Alert : Referir a neurologia"></td></tr><tr><td colspan="3"><textarea class="form-control text-lenguage"id="text-lenguage"disabled></textarea></td></tr><tr><td style="font-size:12px"><label>Social adecuado para su edad</label></td><td style="font-size:12px">Si <input type="radio"name="social"class="chkYes4"checked></td><td style="font-size:12px">No <input type="radio"name="social"class="chkNo4"><i aria-hidden="true"class="fa fa-exclamation-triangle triangle-4"style="color:red;display:none"title="Alert : Referir a neurologia"></td></tr><tr><td colspan="3"><textarea class="form-control text-social"id="text-social"disabled></textarea></td></tr></table></div><div class="table-responsive col-md-6"style=""><table class="table"><tr><th>Patologias</th><th></th></tr><tr><td><input type="checkbox"name="ale"> <label>Alergia</label></td><td><input type="checkbox"name="hep"> <label>Hepatitis</label></td></tr><tr><td><input type="checkbox"name="amig"> <label>Amigdalitis</label></td><td><input type="checkbox"name="infv"> <label>Infeccion vias urinarias</label></td></tr><tr><td><input type="checkbox"name="asm"> <label>Asma</label></td><td><input type="checkbox"name="neum"> <label>Neumoria</label></td></tr><tr><td><input type="checkbox"name="cirug"> <label>Cirugias</label></td><td><input type="checkbox"name="otot"> <label>Ototis</label></td></tr><tr><td><input type="checkbox"name="deng"> <label>Dengue</label></td><td><input type="checkbox"name="pape"> <label>Paperas</label></td></tr><tr><td><input type="checkbox"name="diar"> <label>Diarrea</label></td><td><input type="checkbox"name="paras"> <label>Parasitosis</label></td></tr><tr><td><input type="checkbox"name="zika"> <label>Zika</label></td><td><input type="checkbox"name="saram"> <label>Sarampion</label></td></tr><tr><td><input type="checkbox"name="chicun"> <label>Chicungunya</label></td><td><input type="checkbox"name="varicela"> <label>Varicela</label></td></tr><tr><td><input type="checkbox"name="falc"> <label>Falcemia</label></td><td><input type="checkbox"onclick="show9()"> <label>Otros</label> <textarea class="form-control"id="otros_t_text"cols="20"style="display:none"></textarea></td></tr></table><table class="table"style="width:100%"><tr><th><h4 style="color:green">Sospecha de Abuso o Maltrato</h4></th><th></th><th></th></tr><tr><td><label>Maltrato fisico</label></td><td>Si <input type="radio"name="mf1"class="chkYes5"></td><td>No <input type="radio"name="mf1"class="chkNo5"checked></td></tr><tr><td colspan="3"><textarea class="form-control text-maltrato"id="textmaltrato"disabled>
</textarea></td></tr><tr><td><label>Abuso sexual</label></td><td>Si <input type="radio"name="abs"class="chkYes6"></td><td>No <input type="radio"name="abs"class="chkNo6"checked></td></tr><tr><td colspan="3"><textarea class="form-control text-abuso"id="textabuso"disabled>
</textarea></td></tr><tr><td><label>Negligencia</label></td><td>Si <input type="radio"name="neg"class="chkYes7"></td><td>No <input type="radio"name="neg"class="chkNo7"checked></td></tr><tr><td colspan="3"><textarea class="form-control text-neg"id="textneg"disabled>
</textarea></td></tr><tr><td><label>Maltrato emocional</label></td><td>Si <input type="radio"name="mem"class="chkYes8"></td><td>No <input type="radio"name="mem"class="chkNo8"checked></td></tr><tr><td colspan="3"><textarea class="form-control maltrato-emo"id="maltratoemo"disabled>
</textarea></td></tr></table></div></div><div class="col-md-12"><hr class="title-highline-top"><h4 style="color:green">VACUNACION</h4><div class="table-responsive"><table class="table table-bordered table-striped"><tr><th></th><th class="col-xs-2"style="font-size:12px">Fecha Nac : <span style="color:#00f"><?=$date_nacer?></span></th><th class="col-xs-2"><input type="hidden"id="insert_d"value="<?=date("d-m-Y",strtotime($date_nacer))?>"></th><th class="col-xs-2">DOSIS</th><th class="col-xs-2"></th><th class="col-xs-2"></th><th class="col-xs-2"></th></tr><tr style="text-decoration:underline"><th><input type="hidden"id="mirror_field"value="<?=$date_nacer?>"></th><th>DOSIS UNICA</th><th>1era. Dosis</th><th>2da. Dosis</th><th>3era. Dosis</th><th>1er.Refuerzo</th><th>2do.Refuerzo</th></tr><tr><th>BCG</th><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date no_ap_sh1"style="display:none;background:red"id="no_ap1"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap11"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem1"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f1"> <input id="bcg1"class="form-control bcg"> <input type="hidden"id="mirror_bcg1"value="<?=$date_nacer?>"> <span class="atras1"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf1"class="resf1"style="pointer-events:none;border:none"></i></span></td><td></td><td></td><td></td><td></td><td></td></tr><tr><th>HEPATITIS B</th><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date2 no_ap_sh2"style="display:none"id="no_ap2"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap22"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem2"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f2"> <input id="bcg2"class="form-control bcg"> <input type="hidden"id="mirror_bcg2"value="<?=$date_nacer?>"> <span class="atras2"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf2"class="resf2"style="pointer-events:none;border:none;background:0 0"></i></span></td><td></td><td></td><td></td><td></td><td></td></tr><tr><th>ROTAVIRUS</th><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date3 no_ap_sh3"style="display:none"id="no_ap3"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap33"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem3"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f3"> <input id="yel3"class="form-control yel"> <input type="hidden"id="mirror_d3"> <span class="atras3"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf3"style="pointer-events:none;border:none"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date4 no_ap_sh4"style="display:none"id="no_ap4"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap44"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem4"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f4"> <input id="bl4"class="form-control bl"> <input type="hidden"id="mirror_d4"> <span class="atras4"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf4"style="pointer-events:none;border:none"></i></span></td><td></td><td></td><td></td></tr><tr><th>POLIO</th><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date5 no_ap_sh5"style="display:none"id="no_ap5"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap55"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem5"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f5"> <input id="yel5"class="form-control yel"> <input type="hidden"id="mirror_d5"> <span class="atras5"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf5"style="pointer-events:none;border:none"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date6 no_ap_sh6"style="display:none"id="no_ap6"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap66"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem6"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f6"> <input id="bl6"class="form-control bl"> <input type="hidden"id="mirror_d6"> <span class="atras6"style="display:none;font-size:13px;color:red"><i>días de atraso<br><input id="resf6"style="pointer-events:none;border:none"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date7 no_ap_sh7"style="display:none"id="no_ap7"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap77"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem7"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f7"> <input id="gr7"class="form-control gr"> <input type="hidden"id="mirror_d7"> <span style="display:none;font-size:13px;color:red"id="atras7"><i>días de atraso<br><input id="resf7"style="pointer-events:none;border:none;width:70px;background:0 0"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date8 no_ap_sh8"style="display:none"id="no_ap8"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap88"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem8"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f8"> <input id="bll8"class="form-control bll"> <input type="hidden"id="mirror_d8"> <span style="display:none;font-size:13px;color:red"id="atras8"><i>días de atraso<br><input id="resf8"style="pointer-events:none;border:none;width:80px"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date9 no_ap_sh9"style="display:none"id="no_ap9"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap99"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem9"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f9"> <input id="grr9"class="form-control grr"> <input type="hidden"id="mirror_d9"> <span style="display:none;font-size:13px;color:red"id="atras9"><i>días de atraso<br><input id="resf9"style="pointer-events:none;border:none;width:90px;background:0 0"></i></span></td></tr><tr><th>PENTAVALENTE</th><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date10 no_ap_sh10"style="display:none"id="no_ap10"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1010"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem10"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f10"> <input id="yel10"class="form-control yel"> <input type="hidden"id="mirror_d10"> <span style="display:none;font-size:13px;color:red"id="atras10"><i>días de atraso<br><input id="resf10"style="pointer-events:none;border:none;width:100px"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date11 no_ap_sh11"style="display:none"id="no_ap111"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1111"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem11"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f11"> <input id="bl11"class="form-control bl"> <input type="hidden"id="mirror_d11"> <span style="display:none;font-size:13px;color:red"id="atras11"><i>días de atraso<br><input id="resf11"style="pointer-events:none;border:none;width:110px"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date12 no_ap_sh12"style="display:none"id="no_ap122"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1212"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem12"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f12"> <input id="gr12"class="form-control gr"> <input type="hidden"id="mirror_d12"> <span style="display:none;font-size:13px;color:red"id="atras12"><i>días de atraso<br><input id="resf12"style="pointer-events:none;border:none;width:120px"></i></span></td><td></td><td></td></tr><tr><th>NEUMOCOCO</th><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date13 no_ap_sh13"style="display:none"id="no_ap133"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1313"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem13"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f13"> <input id="yel13"class="form-control yel"> <input type="hidden"id="mirror_d13"> <span style="display:none;font-size:13px;color:red"id="atras13"><i>días de atraso<br><input id="resf13"style="pointer-events:none;border:none;width:130px;background:0 0"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date14 no_ap_sh14"style="display:none"id="no_ap144"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1414"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem14"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f14"> <input id="bl14"class="form-control bl"> <input type="hidden"id="mirror_d14"> <span style="display:none;font-size:13px;color:red"id="atras14"><i>días de atraso<br><input id="resf14"style="pointer-events:none;border:none;width:140px"></i></span></td><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date15 no_ap_sh15"style="display:none"id="no_ap155"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1515"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem15"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f15"> <input id="bll15"class="form-control bll"> <input type="hidden"id="mirror_d15"> <span style="display:none;font-size:13px;color:red"id="atras15"><i>días de atraso<br><input id="resf15"style="pointer-events:none;border:none;width:150px"></i></span></td><td></td></tr><tr><th>SRP</th><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date16 no_ap_sh16"style="display:none"id="no_ap166"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1616"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem16"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f16"> <input id="bcg16"class="form-control bcg"> <input type="hidden"id="mirror_d16"> <span style="display:none;font-size:13px;color:red"id="atras16"><i>días de atraso<br><input id="resf16"style="pointer-events:none;border:none;width:160px"></i></span></td><td></td><td></td><td></td><td></td><td></td></tr><tr><th>DTP</th><td></td><td></td><td></td><td></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date17 no_ap_sh17"style="display:none"id="no_ap177"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1717"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem17"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f17"> <input id="bll17"class="form-control bll"> <input type="hidden"id="mirror_d17"> <span style="display:none;font-size:13px;color:red"id="atras17"><i>días de atraso<br><input id="resf17"style="pointer-events:none;border:none;width:170px"></i></span></td><td><span class="no_ah"><input type="checkbox"onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span><div class="date input-group form_date18 no_ap_sh18"style="display:none"id="no_ap188"data-date-format="dd MM yyyy"data-link-field="dtp_input1"><input id="no_ap1818"class="form-control bcgno"readonly> <span class="input-group-addon"id="frem18"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span></div><input type="hidden"id="mirror_f18"> <input id="grr18"class="form-control grr"> <input type="hidden"id="mirror_d18"> <span style="display:none;font-size:13px;color:red"id="atras18"><i>días de atraso<br><input id="resf18"style="pointer-events:none;border:none;width:180px"></i></span></td></tr></table></div><br><br><br></div>