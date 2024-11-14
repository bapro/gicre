<?php $sql_uro_ant="SELECT *  FROM  h_c_urology_antecedentes WHERE id_patient=$id_historial";$query_uro_ant=$this->db->query($sql_uro_ant);$ct_query_uro_ant=$query_uro_ant->num_rows();if($ct_query_uro_ant==1){foreach($query_uro_ant->result()as $row)$uro_sin_ha_1=$row->uro_sin_ha_1;$uro_ant_escl=$row->uro_ant_escl;$uro_ant_imp=$row->uro_ant_imp;$uro_ant_ane_fal=$row->uro_ant_ane_fal;$uro_ant_vari=$row->uro_ant_vari;$uro_ant_fimosis=$row->uro_ant_fimosis;$uro_ant_hid=$row->uro_ant_hid;$uro_ant_its=$row->uro_ant_its;$uro_ant_tumorales=$row->uro_ant_tumorales;$uro_ant_otros=$row->uro_ant_otros;$uro_sin_ha_2=$row->uro_sin_ha_2;$uro_ant_cancer_prostata=$row->uro_ant_cancer_prostata;$uro_ant_poli_renal=$row->uro_ant_poli_renal;$uro_ant_uroli=$row->uro_ant_uroli;$uro_ant_cist=$row->uro_ant_cist;$uro_ant_otros2=$row->uro_ant_otros2;$id=$row->id;}else{$uro_sin_ha_1=0;$uro_ant_escl=0;$uro_ant_imp=0;$uro_ant_ane_fal=0;$uro_ant_vari=0;$uro_ant_fimosis=0;$uro_ant_hid=0;$uro_ant_its="";$uro_ant_tumorales="";$uro_ant_otros="";$uro_sin_ha_2=0;$uro_ant_cancer_prostata=0;$uro_ant_poli_renal=0;$uro_ant_uroli=0;$uro_ant_cist=0;$uro_ant_otros2="";$id=0;} ?><div class="load-paginate-on-click"id="load-uro-ant"></div><div style="position:fixed;left:16vw;z-index:500"><span id="uro-ant-btns"style="display:none"><button class="btn btn-lg btn-success"id="saveEditUroAnt"type="button"style="border:1px solid;display:none"><i class="fa fa-save"></i></button> <button class="btn btn-lg btn-warning"id="showEditUroAnt"type="button"style="border:1px solid"><i class="fa fa-pencil"></i></button></span></div><br><div id="uro-ant-disabled"><div class="col-md-12"><input id="hist_id"value="<?=$id_historial?>"type="hidden"> <input id="id_uro_ant"value="<?=$id?>"type="hidden"> <input id="uro_ant_user_id"value="<?=$user_id?>"type="hidden"> <strong>Antecedentes Personales Patológicos</strong><table class="table"style="width:80%"><tr><td style="text-align:left"><div class="checkbox"><?php if($uro_sin_ha_1==0){$selected="";}else{$selected="checked";} ?><label><input id="uro_sin_ha_1"type="checkbox"name="uro_sin_ha_1"<?=$selected?>>Sin Hallazgo</label></div></td><td></td></tr><tr class="disabled-antes1"><td style="text-align:left"><div style="margin-left:30px;position:absolute"><div class="checkbox"><?php if($uro_ant_escl==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_escl"<?=$selected?>>Esclerosis Múltiple</label></div><div class="checkbox"><?php if($uro_ant_imp==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_imp"<?=$selected?>>Impotencia</label></div><div class="checkbox"><?php if($uro_ant_ane_fal==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_ane_fal"<?=$selected?>>Anemia Falciforme</label></div></div></td><td style="text-align:left"><div class="checkbox"><?php if($uro_ant_vari==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_vari"<?=$selected?>>Varicoceles</label></div><div class="checkbox"><?php if($uro_ant_fimosis==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_fimosis"<?=$selected?>>Fimosis</label></div><div class="checkbox"><?php if($uro_ant_hid==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_hid"<?=$selected?>>Hidroceles</label></div></td></tr></table></div><div class="col-md-12 disabled-antes1"><div class="form-group row"><label class="col-form-label col-sm-2"style="text-align:right">ITS</label><div class="col-sm-8"><button class="btn btn-primary btn-sm"id="btnSpeechUroAntIts"type="button"title="soporte solo para el navegador Chrome"><i class="fa fa-microphone"aria-hidden="true"></i></button> <span id="actionSpeechUroAntIts"></span> <textarea class="form-control"id="uro_ant_its"placeholder="Ninguno"rows="6"><?=$uro_ant_its?></textarea></div></div><div class="form-group row"><label class="col-form-label col-sm-2"style="text-align:right">Tumorales</label><div class="col-sm-8"><button class="btn btn-primary btn-sm"id="btnSpeechUroAntTumo"type="button"title="soporte solo para el navegador Chrome"><i class="fa fa-microphone"aria-hidden="true"></i></button> <span id="actionSpeechUroAntTumo"></span> <textarea class="form-control"id="uro_ant_tumorales"placeholder="Ninguno"rows="6"><?=$uro_ant_tumorales?></textarea></div></div><div class="form-group row"><label class="col-form-label col-sm-2"style="text-align:right">Otros</label><div class="col-sm-8"><button class="btn btn-primary btn-sm"id="btnSpeechUroAntOtros"type="button"title="soporte solo para el navegador Chrome"><i class="fa fa-microphone"aria-hidden="true"></i></button> <span id="actionSpeechUroAntOtros"></span> <textarea class="form-control"id="uro_ant_otros"placeholder="Ninguno"rows="6"><?=$uro_ant_otros?></textarea></div></div></div><div class="col-md-12"><hr class="prenatal-separator"><strong>Antecedentes Familiares</strong><table class="table"><tr><td style="text-align:left"><div class="checkbox"><?php if($uro_sin_ha_2==0){$selected="";}else{$selected="checked";} ?><label><input id="uro_sin_ha_2"type="checkbox"name="uro_sin_ha_2"<?=$selected?>>Sin Hallazgo</label></div></td><td></td></tr><tr class="disabled-antes2"><td style="text-align:left"><div style="margin-left:30px;position:absolute"><div class="checkbox"><?php if($uro_ant_cancer_prostata==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_cancer_prostata"<?=$selected?>>Cáncer Próstata</label></div><div class="checkbox"><?php if($uro_ant_poli_renal==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_poli_renal"<?=$selected?>>Polisquistosis Renal</label></div><div class="checkbox"><?php if($uro_ant_uroli==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_uroli"<?=$selected?>>Urolitiasis</label></div><div class="checkbox"><?php if($uro_ant_cist==0){$selected="";}else{$selected="checked";} ?><label><input type="checkbox"name="uro_ant_cist"<?=$selected?>>Cistinuria</label></div></div></td><td style="text-align:left"><div class="form-group row"><label class="col-form-label col-sm-2"style="text-align:right">Otros</label><div class="col-sm-8"><button class="btn btn-primary btn-sm"id="btnSpeechUroAntOtros2"type="button"title="soporte solo para el navegador Chrome"><i class="fa fa-microphone"aria-hidden="true"></i></button> <span id="actionSpeechUroAntOtros2"></span> <textarea class="form-control"id="uro_ant_otros2"placeholder="Ninguno"rows="6"><?=$uro_ant_otros2?></textarea></div></div></td></tr></table></div><div class="col-md-12"><hr class="prenatal-separator"><strong>Antecedentes alergicos y reaccion a medicamentos</strong><?php $sql_uro_ant_al="SELECT id_desa, alimentos, medicamentos, otros FROM  h_c_desarollo WHERE historial_id=$id_historial";$query_uro_ant_al=$this->db->query($sql_uro_ant_al);if($query_uro_ant_al->result()!=NULL){foreach($query_uro_ant_al->result()as $row)$alimentos_al=$row->alimentos;$medicamentos_al=$row->medicamentos;$otros_al=$row->otros;$id_desa=$row->id_desa;}else{$alimentos_al="";$medicamentos_al="";$otros_al="";$id_desa="";} ?><input id="id_desa"value="<?=$id_desa?>"type="hidden"><table class="table"><tr><td style="text-align:left"><div class="form-group"><label class="col-md-2 control-label">Alimentos Alergicos</label><div class="col-md-9"><input id="alimentos_al"value="<?=$alimentos_al?>"class="form-control"placeholder="Ninguno"></div></div><div class="form-group"><label class="col-md-2 control-label">Medicamentos Alergicos</label><div class="col-md-9"><input id="medicamentos_al"value="<?=$medicamentos_al?>"class="form-control"placeholder="Ninguno"></div></div><div class="form-group"><label class="col-md-2 control-label">Otros Alergicos</label><div class="col-md-9"><input id="otros_al"value="<?=$otros_al?>"class="form-control"placeholder="Ninguno"></div></div></td></tr></table><hr class="prenatal-separator"><strong>Otros antecedentes</strong></div><div class="col-md-12"><?php $sql_uro_ant_al="SELECT * FROM  h_c_ante_otros WHERE historial_id=$id_historial";$query_uro_ant_al=$this->db->query($sql_uro_ant_al);if($query_uro_ant_al->result()!=NULL){foreach($query_uro_ant_al->result()as $row)$quirurgicos=$row->quirurgicos;$gineco=$row->gineco;$abdominal=$row->abdominal;$toracica=$row->toracica;$transfusion=$row->transfusion;$otros1=$row->otros1;$hepatis=$row->hepatis;$hpv=$row->hpv;$toxoide=$row->toxoide;$otros2=$row->otros2;$grouposang=$row->grouposang;$tipificacion=$row->tipificacion;$rh=$row->rh;$id_ao=$row->id_ao;}else{$quirurgicos="";$gineco=0;$abdominal="";$toracica="";$transfusion="";$otros1="";$hepatis="";$hpv="";$toxoide="";$otros2="";$grouposang="";$tipificacion="";$rh="";$id_ao="";} ?><input id="id_desa"value="<?=$id_desa?>"type="hidden"><div class="col-md-8"><table class="table"><tr><td class="col-xs-6">Quirurgicos <textarea class="form-control"id="quirurgicos"placeholder="Ninguno"rows="6"><?=$quirurgicos?></textarea></td><td>Gineco-obstetricos <select class="form-control select2"id="gineco"><option value="">Ninguno</option><?php foreach($GinecOb as $row){if($gineco==$row->name){$selected="selected";}else{$selected="";}echo '<option value="'.$row->name.'"  '.$selected.'>'.$row->name.'</option>';} ?></select></td></tr><tr><td>Abdominal <textarea class="form-control"id="abdominal"placeholder="Ninguno"rows="6"><?=$abdominal?></textarea></td><td>Toracica <textarea class="form-control"id="toracica"placeholder="Ninguno"rows="6"><?=$toracica?></textarea></td></tr><tr><td>Transfusion sanguinea <textarea class="form-control"id="transfusion"placeholder="Ninguno"rows="6"><?=$transfusion?></textarea></td><td>Otros <textarea class="form-control"id="otros1"placeholder="Ninguno"rows="6"><?=$otros1?></textarea></td></tr></table><div id="new-medica-select"></div></div><div class="col-md-4"><table class="table"style="width:100%"><tr><td>Hepatis B</td><td><?php if($hepatis=="No"){$checked="checked";}else{$checked="";}echo" &nbsp;No <input type='radio' id='hepatis' name='hepatis' value='No' $checked>";if($hepatis=="Si"){$checked="checked";}else{$checked="";}echo" &nbsp; Si&nbsp;<input type='radio' id='hepatis' name='hepatis' value='Si' $checked>"; ?></td></tr><tr><td>HPV</td><td><?php if($hpv=="No"){$checked="checked";}else{$checked="";}echo"&nbsp;No&nbsp;<input type='radio'  id='hpv' name='hpv' value='No' $checked>";if($hpv=="Si"){$checked="checked";}else{$checked="";}echo"&nbsp; Si&nbsp;<input type='radio'  id='hpv' name='hpv' value='Si' $checked>"; ?></td></tr><tr><td>Toxoide Tetanico</td><td><?php if($toxoide=="No"){$checked="checked";}else{$checked="";}echo"No&nbsp;<input type='radio' id='toxoide' name='toxoide' value='No' $checked>";if($toxoide=="Si"){$checked="checked";}else{$checked="";}echo"&nbsp;Si&nbsp;<input type='radio' id='toxoide' name='toxoide' value='Si'  $checked>"; ?></td></tr><tr><td>Grupo Sanguineo</td><td><?php $grouposangvalues=array("A","B","AB","0");echo '<select class="form-control" id="grouposang">';echo '<option value="" >Ninguno</option>';foreach($grouposangvalues as $grouposangvalue){if($grouposang==$grouposangvalue){$selected="selected";}else{$selected="";}echo"<option $selected >$grouposangvalue</option>";}echo '</select>'; ?><span class="alert-danger tipif-info">Alerto: Si no tiene el tipo de sangre del paciente debe de indicar una tipificación.</span></td></tr><tr><td style="width:20px">Rh</td><td>Positivo<?php if($rh=="Positivo"){$checked="checked";}else{$checked="";} ?><input id="rhoa"value="Positivo"class="ck"name="rhoa"type="radio"<?=$checked?>><?php if($rh=="Negativo"){$checked="checked";}else{$checked="";} ?>Negativo <input id="rhoa"value="Negativo"type="radio"name="rhoa"<?=$checked?>></td></tr><tr><td>Tipificación</td><td style="width:190px"><input id="tipificacion"value="<?=$tipificacion?>"style="width:40px"> <span id="tip-hide"><?php if($rh=="Positivo"){echo "<span  style='font-weight:bold;'>+</span>";}else if($rh=="Negativo"){echo "<span  style='font-weight:bold;'>-</span>";}else{echo "<span  style='font-weight:bold;'></span>";} ?></span><span id="mas"style="display:none;font-weight:700">+</span> <span id="menos"style="display:none;font-weight:700">-</span></td></tr></table></div></div><div class="col-md-12"><br><br><hr class="prenatal-separator"><strong>Habitos Toxicos </strong><?php $sql_uro_ant_ht="SELECT * FROM  h_c_habitos_toxicos WHERE historial_id=$id_historial";$query_uro_ant_ht=$this->db->query($sql_uro_ant_ht);if($query_uro_ant_ht->result()!=NULL){foreach($query_uro_ant_ht->result()as $row)$cafe_cant=$row->cafe_cant;$cafe_cant_desc=$row->cafe_cant_desc;$cafe_frec=$row->cafe_frec;$pipa_cant=$row->pipa_cant;$pipa_cant_desc=$row->pipa_cant_desc;$pipa_frec=$row->pipa_frec;$ciga_can=$row->ciga_can;$ciga_can_desc=$row->ciga_can_desc;$ciga_frec=$row->ciga_frec;$alc_can=$row->alc_can;$alc_can_desc=$row->alc_can_desc;$hookah=$row->hookah;$hookah_desc=$row->hookah_desc;$hab_f_hookah=$row->hab_f_hookah;$alc_frec=$row->alc_frec;$tab_can=$row->tab_can;$tab_can_desc=$row->tab_can_desc;$tab_frec=$row->tab_frec;$hab_c_drug=$row->hab_c_drug;$hab_c_drug_desc=$row->hab_c_drug_desc;$hab_f_drug=$row->hab_f_drug;$id=$row->id;}else{$ciga_can_desc="";$cafe_cant_desc='';$cafe_cant="";$hab_c_drug_desc="";$cafe_frec="";$pipa_cant="";$pipa_cant_desc="";$pipa_frec="";$ciga_can="";$ciga_frec="";$alc_can="";$alc_can_desc="";$hookah="";$hookah_desc="";$hab_f_hookah="";$alc_frec="";$tab_can="";$tab_can_desc="";$tab_frec="";$hab_c_drug="";$hab_f_drug="";$id="";}$frecuencies=array("Diariamente","Ocasionalmente","A veces"); ?><div class="table-responsive"><table class="table"><tr style="font-weight:700"><th><td></td><td>Habito</td><td>Cantidad</td><td>Descripción</td><td>Frecuencia</td><td></td><td></td><td>Habito</td><td>Cantidad</td><td>Descripción</td><td>Frecuencia</th></tr><tr><th></th><th class="id"><img alt=""src="<?=base_url()?>assets/img/historial_medical/cafe_burned.png"style="border:1px solid #cecece;padding:1px"width="30"></th><th class="th_habitos">Cafe</th><td><input id="hab_c_caf"value="<?=$cafe_cant?>"class="form-control"style="width:50px"></td><td><input id="cafe_cant_desc"value="<?=$cafe_cant_desc?>"class="form-control"style="width:250px"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_caf" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($cafe_frec==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td><th></th><th><img alt=""src="<?=base_url()?>assets/img/historial_medical/pipe_burned.png"style="border:1px solid #cecece;padding:1px"width="30"></th><th class="th_habitos">Pipa</th><td><input id="hab_c_pip"value="<?=$pipa_cant?>"class="form-control"style="width:50px"></td><td><input id="pipa_cant_desc"value="<?=$pipa_cant_desc?>"class="form-control"style="width:250px"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_pip" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($pipa_frec==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td></tr><tr><th></th><th class="id"><img alt=""src="<?=base_url()?>assets/img/historial_medical/cigaret_burned.png"style="border:1px solid #cecece;padding:1px"width="30"></th><th class="th_habitos">Cigarillo</th><td><input id="hab_c_ciga"value="<?=$ciga_can?>"class="form-control"style="width:50px"></td><td><input id="ciga_can_desc"value="<?=$ciga_can_desc?>"class="form-control"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_ciga" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($ciga_frec==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td><th></th><th><img alt=""src="<?=base_url()?>assets/img/historial_medical/alcohol_burned.png"style="border:1px solid #cecece;padding:1px"width="20"></th><th class="th_habitos">Alcohol</th><td><input id="hab_c_al"value="<?=$alc_can?>"class="form-control"style="width:50px"></td><td><input id="alc_can_desc"value="<?=$alc_can_desc?>"class="form-control"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_al" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($alc_frec==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td></tr><tr><th></th><th class="id"><img alt=""src="<?=base_url()?>assets/img/historial_medical/tobacco_burned.png"style="border:1px solid #cecece;padding:1px"width="30"></th><th class="th_habitos">Tabaco</th><td><input id="hab_c_tab"value="<?=$tab_can?>"class="form-control"style="width:50px"></td><td><input id="tab_can_desc"value="<?=$tab_can_desc?>"class="form-control"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_tab" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($tab_frec==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td><th></th><th class="id"><img alt=""src="<?=base_url()?>assets/img/historial_medical/hookah_burned.png"style="border:1px solid #cecece;padding:1px"width="33"></th><th class="th_habitos">Hookah</th><td><input id="hookah"value="<?=$hookah?>"class="form-control input_hookah"style="width:50px"></td><td><input id="hookah_desc"value="<?=$hookah_desc?>"class="form-control input_hookah"style="width:250px"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_hookah" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($hab_f_hookah==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td></tr></table><table class="table"><tr><th style="width:100px"></th><th></th><th style="width:550px">Tipo</th><th>Cantidad</th><th>Descripción</th><th>Frecuencia</th></tr><tr><th><img alt=""src="<?=base_url()?>assets/img/historial_medical/drugs_burned.png"style="border:1px solid #cecece;padding:1px"width="60"></th><th class="th_habitos">Droga</th><td><select class="form-control select2 hab_t_drug"id="hab_t_drug"multiple><option value="ninguno">ninguno</option><?php foreach($drug as $d){$drug_name=$this->db->select('name')->where('id_patient',$id_historial)->where('name',$d->name)->get('h_c_droga')->row('name');if($d->name==$drug_name){$selected="selected";}else{$selected="";}echo"<option value='$d->name' $selected>$d->name</option>";} ?></select></td><td><input id="hab_c_drug"value="<?=$hab_c_drug?>"class="form-control"style="width:50px"></td><td><input id="hab_c_drug_desc"value="<?=$hab_c_drug_desc?>"class="form-control"style="width:250px"></td><td class="th_habitos"><?php echo '<select class="form-control" id="hab_f_drug" style="width:149px">';echo '<option value="" >Ninguno</option>';foreach($frecuencies as $frecuency){if($hab_f_drug==$frecuency){$selected="selected";}else{$selected="";}echo"<option $selected >$frecuency</option>";}echo '</select>'; ?></td></tr></table></div></div></div><?php if($id>0){$this->load->view('admin/historial-medical1/urology/footer');} ?><script>var btnSpeechUroAntIts=document.getElementById("btnSpeechUroAntIts");btnSpeechUroAntIts.onclick=function(){var e=document.getElementById("uro_ant_its"),t=document.getElementById("actionSpeechUroAntIts");runSpeechRecognition(e,t)};var btnSpeechUroAntTumo=document.getElementById("btnSpeechUroAntTumo");btnSpeechUroAntTumo.onclick=function(){var e=document.getElementById("uro_ant_tumorales"),t=document.getElementById("actionSpeechUroAntTumo");runSpeechRecognition(e,t)};var btnSpeechUroAntOtros=document.getElementById("btnSpeechUroAntOtros");btnSpeechUroAntOtros.onclick=function(){var e=document.getElementById("uro_ant_otros"),t=document.getElementById("actionSpeechUroAntOtros");runSpeechRecognition(e,t)};var btnSpeechUroAntOtros2=document.getElementById("btnSpeechUroAntOtros2");function groupSangTip(){""==$("#grouposang").val()?$(".tipif-info").show(1e3):$(".tipif-info").hide();var e=$("#grouposang").val();$("#tipificacion").val(e)}btnSpeechUroAntOtros2.onclick=function(){var e=document.getElementById("uro_ant_otros2"),t=document.getElementById("actionSpeechUroAntOtros2");runSpeechRecognition(e,t)},$("#showEditUroAnt").on("click",function(e){e.preventDefault(),$(this).hide(),$("#saveEditUroAnt").slideDown(),$("#uro-ant-disabled input").prop("disabled",!1),$("#uro-ant-disabled textarea").prop("disabled",!1),$("#uro-ant-disabled select").prop("disabled",!1),$("#uro-ant-disabled button").fadeIn(1e3)}),0==<?=$ct_query_uro_ant?>?($("#uro-ant-btns").hide(),$("#uro-ant-disabled input").prop("disabled",!1),$("#uro-ant-disabled textarea").prop("disabled",!1),$("#uro-ant-disabled select").prop("disabled",!1),$("#uro-ant-disabled button").hide()):($("#uro-ant-btns").show(),$("#uro-ant-disabled input").prop("disabled",!0),$("#uro-ant-disabled textarea").prop("disabled",!0),$("#uro-ant-disabled select").prop("disabled",!0),$("#uro-ant-disabled button").show()),$("#uro_sin_ha_1").click(function(){$("#uro_sin_ha_1").is(":checked")?($(".disabled-antes1 input").prop("disabled",!0),$(".disabled-antes1 textarea").prop("disabled",!0),$(".disabled-antes1 textarea").val(""),$(".disabled-antes1 input").prop("checked",!1)):($(".disabled-antes1 input").prop("disabled",!1),$(".disabled-antes1 textarea").prop("disabled",!1))}),$("#uro_sin_ha_2").click(function(){$("#uro_sin_ha_2").is(":checked")?($(".disabled-antes2 input").prop("disabled",!0),$(".disabled-antes2 textarea").prop("disabled",!0),$(".disabled-antes2 textarea").val(""),$(".disabled-antes2 input").prop("checked",!1)):($(".disabled-antes2 input").prop("disabled",!1),$(".disabled-antes2 textarea").prop("disabled",!1))}),groupSangTip(),$("#grouposang").on("change",function(e){groupSangTip(),$("#tip-hide").hide()}),jQuery("input[name='tipificacion']").on("click",function(e){$(".ck").is(":checked")?($("#mas").show(),$("#menos").hide()):($("#menos").show(),$("#mas").hide())}),jQuery("input[name='rhoa']").on("click",function(e){$("#tip-hide").hide(),$("#tip-show").show(),$(".ck").is(":checked")?($("#mas").show(),$("#menos").hide()):($("#menos").show(),$("#mas").hide())})</script>