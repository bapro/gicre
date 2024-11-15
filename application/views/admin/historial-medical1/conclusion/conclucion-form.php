<br><h4 class="h4 his_med_title">conclusion diagnostica <em style='text-transform:lowercase'><?=$count_conc?> registro(s)</em></h4><?php $disable_cied='';if($count_conc>0){$hist_date=$this->db->select('hist_date')->where('id_pat',$id_historial)->get('saveHistPat')->row('hist_date');if($hist_date==date("Y-m-d")){$disable_cied="disabled";}else{$disable_cied="";} ?><div id="paginationh"><ul class="paginationh"><?php $i=1;foreach($concluciones as $row){$diagno_def=$this->db->select('diagno_def')->where('con_id_link',$row->id_cdia)->get('h_c_diagno_def_link')->row('diagno_def');$diag=$this->db->select('description')->where('idd',$diagno_def)->get('cied')->row('description');if($diag==""){$diagdata="";}else{$diagdata="<strong><u>CIE10</u></strong>  $diag<br/>";}if($row->otros_diagnos!=""){$otros_diag="<strong><u>OTROS DIAGNOSTICOS</u></strong> $row->otros_diagnos<br/>";}else{$otros_diag="";}$user_c36=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c37=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time));$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name'); ?><li class="paninate-li"><a data-html="true"data-placement="bottom"data-target="#ver_con_d"data-toggle="modal"data-trigger="hover"href="<?php echo base_url("saveHistorial/show_con_by_id/$row->id_cdia/$id_historial/$user_id/$row->centro_medico/0") ?>"rel="tooltip"title="
<h4 style='color:green'><?=$centro?></h4><strong>Creado por</strong> <?=$user_c36?><br/>
<strong>Cambiado por</strong> <?=$user_c37?>,<?=$updated_time?>"><?=$inserted_time?></a></li><?php } ?></ul></div><?php }else{echo "<i><b>No hay registros</b></i>";} ?><div class="col-md-12 move_left"id="reload-cond"><hr class="prenatal-separator"><div class="col-md-12 form-horizontal"id="flashe"><div class="form-group"><label class="col-md-2 control-label"><span style="color:red"><strong>*</strong></span> Diagnostico(s) Presuntivo o Definitivo (CIE10):</label><div class="col-md-10"><input id="on_input_cied"autocomplete="off"class="form-control on_input_cied"<?=$disable_cied?>><br><div id="show-selected-cie10"style="display:none"></div><div class="cied_result"></div></div></div><div class="form-group otros-diagnos"style="display:none"><label class="col-md-2 control-label">Otros diagnosticos (opcional)</label><div class="col-md-10"><textarea class="form-control save-con-diag"id="otros_diagnos"></textarea></div></div><div class="form-group"><label class="col-md-2 control-label"><span style="color:red"><strong>*</strong></span> Plan</label><div class="col-md-10"><button class="btn btn-primary btn-sm"id="btnSpeechConDiagPlan"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"></i></button> <span id="actionSpeechConDiagPlan"></span> <textarea class="form-control save-con-diag required-patient-inputs "id="plan"rows="6"></textarea></div></div><div class="form-group"><label class="col-md-2 control-label">Procedimiento</label><div class="col-md-10"><button class="btn btn-primary btn-sm"id="btnSpeechConDiagProced"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"></i></button> <span id="actionSpeechConDiagProced"></span> <textarea class="form-control save-con-diag "id="proced"rows="6"></textarea></div></div><div class="form-group"><label class="col-md-2 control-label">Evolucion (Paciente subsecuente):</label><div class="col-md-10"><button class="btn btn-primary btn-sm"id="btnSpeechConDiagEvo"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"></i></button> <span id="actionSpeechConDiagEvo"></span> <textarea class="form-control save-con-diag required-patient-inputs "id="evolucion"rows="7"></textarea></div></div><div class="form-group"><label class="col-md-2 control-label"></label><div class="col-md-6"><input id="conclusion_radio"name="conclusion_radio"type="radio"value="Mejoria"checked> <label>Mejoria</label> <input id="conclusion_radio"name="conclusion_radio"type="radio"value="Empeorando"> <label>Empeorando</label> <input id="conclusion_radio"name="conclusion_radio"type="radio"value="No mejoria"> <label>No mejoria</label></div></div></div></div>
<script>
function saveOtrosDiag(){var e=$("input:radio[name=conclusion_radio]:checked").val();$.ajax({type:"POST",url:"<?=base_url('saveHistorial/saveOtrosDiag')?>",data:{user_id:"<?=$user_id?>",centro_medico:"<?=$centro_medico?>",id_pat:"<?=$id_historial?>",otros_diagnos:$("#otros_diagnos").val(),plan:$("#plan").val(),proced:$("#proced").val(),evolucion:$("#evolucion").val(),conclusion_radio:e},success:function(e){}})}$('[rel="tooltip"]').tooltip(),$(".save-con-diag").on("input",function(){saveOtrosDiag()}),$("input[type=radio][name=conclusion_radio]").on("change",function(){saveOtrosDiag()});var btnSpeechConDiagPlan=document.getElementById("btnSpeechConDiagPlan");btnSpeechConDiagPlan.onclick=function(){var e=document.getElementById("plan"),o=document.getElementById("actionSpeechConDiagPlan");runSpeechRecognition(e,o)};var btnSpeechConDiagProced=document.getElementById("btnSpeechConDiagProced");btnSpeechConDiagProced.onclick=function(){var e=document.getElementById("proced"),o=document.getElementById("actionSpeechConDiagProced");runSpeechRecognition(e,o)};var btnSpeechConDiagEvo=document.getElementById("btnSpeechConDiagEvo");btnSpeechConDiagEvo.onclick=function(){var e=document.getElementById("evolucion"),o=document.getElementById("actionSpeechConDiagEvo");runSpeechRecognition(e,o)};var timer=null;function doStuff1(){var e=$(".on_input_cied").val();$(".cied_result").fadeIn().html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),""==e?$(".cied_result").hide():$.get("<?php echo base_url();?>saveHistorial/on_input_cied?value="+e+"&id_pat=<?=$id_historial?>&tab=exam-1&user_id=<?=$user_id?>&centro_medico=<?=$centro_medico?>&id_cdia=&origine=0",function(e){$(".cied_result").html(e)})}$(".on_input_cied").keydown(function(){clearTimeout(timer),timer=setTimeout(doStuff1,1e3)}),doStuff1(),$(".select2").select2({tags:!0});
</script>
