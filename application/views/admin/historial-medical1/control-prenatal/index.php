<style>.reduce-height{height:28px}</style><h4 class="alert alert-success"id="msgs-ssr"style="display:none"></h4><span id="refresh-conprena"><div class="col-md-12 move_left"><h4 class="h4 his_med_title">Control Visitas Prenatales (<b><?=$count_cont_prenal?>regitros (s)</b>)</h4><br></div><?php if($count_cont_prenal>0){$i=1;foreach($ControPrenal as $row){$user_c40=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c41=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time)); ?><div class="pagination"><a data-target="#ver_con_pren"data-toggle="modal"href="<?php echo base_url("admin_medico/showSelectContP/$row->id_c1/$user_id") ?>"title="Creado por :<?=$user_c40?>, fecha :<?=$inserted_time?>> 
  Cambiado por :<?=$user_c41?>, fecha :<?=$updated_time?>"><?php echo $i;$i++; ?></a></div><?php } ?><br><?php }else{echo "<i><b>No hay registros</b></i>";} ?><div class="col-md-12 table-responsive"style=""><br><table class="table table-bordered table-fixed"id="flashcontprn"style="background:#e6e6fa;border-top:1px groove #38a7bb"><thead><tr><th><font style="color:red"><strong>*</strong></font> Fecha de la consulta</th><th><font style="color:red"><strong>*</strong></font> Semana de amenorrea</th><th><font style="color:red"><strong>*</strong></font> Peso (lb)</th><th><font style="color:red"><strong>*</strong></font> Tension Arterial Max.Min. (mm Hg)</th><th><font style="color:red"><strong>*</strong></font> Alt. Ulterina/Present Pubis.FondoCef/Pelv.Tr</th><th><font style="color:red"><strong>*</strong></font> F.C.F.(lat./min./Mov.Fetal)</th><th><font style="color:red"><strong>*</strong></font> Fedema / Varices</th><th>Otros</th><th>Evolucion</th></tr></thead><tbody><tr><td><input id="fecha"class="control-prenatal-fecha"size="10"data-mask="00/00/0000"></td><td><input id="semana"size="10"></td><td><input id="pesocp"size="10"></td><td><div class="input-group sepa"><input id="tension1"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension11"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt1"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt11"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt111"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal1"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal11"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema1"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema11"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otroscp"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion"style="width:150px"></textarea></td></tr><tr><td><input id="fecha2cp"class="control-prenatal-fecha"size="10"></td><td><input id="semana2"size="10"></td><td><input id="peso2"size="10"></td><td><div class="input-group"><input id="tension2"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension22"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt2"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt22"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt222"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal2"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal22"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema2"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema22"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros2cp"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion2"style="width:150px"></textarea></td></tr><tr><td><input id="fecha3cp"class="control-prenatal-fecha"size="10"></td><td><input id="semana3"size="10"></td><td><input id="peso3"size="10"></td><td><div class="input-group"><input id="tension3"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension33"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt3"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt33"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt333"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal3"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal33"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema3"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema33"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros3"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion3"style="width:150px"></textarea></td></tr><tr><td><input id="fecha4cp"class="control-prenatal-fecha"size="10"></td><td><input id="semana4"size="10"></td><td><input id="peso4"size="10"></td><td><div class="input-group"><input id="tension4"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension44"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt4"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt44"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt444"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal4"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal44"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema4"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema44"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros4"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion4"style="width:150px"></textarea></td></tr><tr><td><input id="fecha5"class="control-prenatal-fecha"size="10"></td><td><input id="semana5"size="10"></td><td><input id="peso5"size="10"></td><td><div class="input-group"><input id="tension5"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension55"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt5"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt55"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt555"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal5"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal55"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema5"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema55"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros5"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion5"style="width:150px"></textarea></td></tr><tr><td><input id="fecha6"class="control-prenatal-fecha"size="10"></td><td><input id="semana6"size="10"></td><td><input id="peso6"size="10"></td><td><div class="input-group"><input id="tension6"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension66"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt6"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt66"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt666"class="reduce-height form-control"style=""></div></td><td><div class="input-group"><input id="fetal6"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal66"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema6"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema66"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros6"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion6"style="width:150px"></textarea></td></tr><tr><td><input id="fecha7"class="control-prenatal-fecha"size="10"></td><td><input id="semana7"size="10"></td><td><input id="peso7"size="10"></td><td><div class="input-group"><input id="tension7"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension77"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt7"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt77"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt777"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal7"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal77"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema7"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema77"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros7"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion7"style="width:150px"></textarea></td></tr><tr><td><input id="fecha8"class="control-prenatal-fecha"size="10"></td><td><input id="semana8"size="10"></td><td><input id="peso8"size="10"></td><td><div class="input-group"><input id="tension8"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension88"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt8"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt88"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt888"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal8"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal88"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema8"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema88"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros8"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion8"style="width:150px"></textarea></td></tr><tr><td><input id="fecha9"class="control-prenatal-fecha"size="10"></td><td><input id="semana9"size="10"></td><td><input id="peso9"size="10"></td><td><div class="input-group"><input id="tension9"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="tension99"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="alt9"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="alt99"class="reduce-height form-control"style="width:50px"><span class="reduce-height input-group-addon">-</span><input id="alt999"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="fetal9"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="fetal99"class="reduce-height form-control"style="width:50px"></div></td><td><div class="input-group"><input id="edema9"class="reduce-height form-control"style="width:50px"> <span class="reduce-height input-group-addon">-</span> <input id="edema99"class="reduce-height form-control"style="width:50px"></div></td><td><textarea class="form-control"cols="20"id="otros9"style="width:150px"></textarea></td><td><textarea class="form-control"cols="20"id="evolucion9"style="width:150px"></textarea></td></tr></tbody><tfoot><tr><th>Fecha de la consulta</th><th>Semana de amenorrea</th><th>Peso (lb)</th><th>Tension Arterial Max.Min. (mm Hg)</th><th>Alt. Ulterina/Present Pubis.FondoCef/Pelv.Tr</th><th>F.C.F.(lat./min./Mov.Fetal)</th><th>Edema / Varices</th><th>Otros</th><th>Evolucion</th></tr></tfoot></table></div></span><div class="modal fade"id="ver_con_pren"role="dialog"tabindex="-1"><div class="modal-dialog modal-lg"style="width:90%;margin:10px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con1"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con2"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con3"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con4"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con5"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con6"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con7"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con8"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div><div class="modal modal-child"id="edit_con9"role="dialog"tabindex="-1"aria-hidden="true"aria-labelledby="myModalLabel"data-backdrop-limit="1"data-modal-parent="#ver_con_pren"><div class="modal-dialog modal-lg"style="width:1400px;margin:30px auto"><div class="modal-content"></div></div></div>