<h4 class="h4 his_med_title">Examen del sistema <em style='text-transform:lowercase'><?=$count_examensis?> registro(s)</em></h4><?php if($count_examensis>0){ ?><div id="paginationh"><ul class="paginationh"><?php foreach($examensis as $row){$user_c28=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');$user_c29=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));$updated_time=date("d-m-Y H:i:s",strtotime($row->updated_time)); ?><li class="paninate-li"><a data-html="true"data-placement="bottom"data-target="#ver_exasis"data-toggle="modal"data-trigger="hover"href="<?php echo base_url("admin_medico/show_examsis_by_id/$row->id_exs/$user_id") ?>"rel="tooltip"title="
<strong>Creado por</strong> <?=$user_c28?><br/>
<strong>Cambiado por</strong> <?=$user_c29?>,<?=$updated_time?>"><?php echo $inserted_time; ?></a></li><?php } ?></ul></div><?php }else{echo "<i><b>No hay registros</b></i>";} ?><div style="overflow-x:auto"><span id="exam-sistema-fields"style="display:none">0</span><form class="system-exam"><table cellspacing="0"class="table"style="width:100%"><tr><td class="ida"><label class="control-label">Sistema neurológico</label> <select class="form-control select2"id="sisneuro"style="width:100%"><option value="">Ningúno</option><?php foreach($neuro as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis1"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis1"></span> <textarea class="form-control"id="neurologico"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema cardiovascular</label> <select class="form-control select2"id="siscardio"style="width:100%"><option value="">Ningúno</option><?php foreach($cardiov as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis2"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis2"></span> <textarea class="form-control"id="cardiova"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label"><font style="color:red"><strong>*</strong></font> Sistema urogenital</label> <select class="form-control select2"id="sist_uro"style="width:100%"><option value="">Ningúno</option><?php foreach($urogenial as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis3"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis3"></span> <textarea class="form-control"id="urogenital"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema músculo esquelético</label> <select class="form-control select2"id="sis_mu_e"style="width:100%"></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis4"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis4"></span> <textarea class="form-control"id="musculoes"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema nervioso</label><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis5"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis5"></span> <textarea class="form-control"id="nervioso"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema linfatico</label><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis6"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis6"></span> <textarea class="form-control"id="linfatico"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema respiratorio</label> <select class="form-control select2"id="sist_resp"style="width:100%"><option value="">Ningúno</option><?php foreach($resp as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis7"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis7"></span> <textarea class="form-control"id="respiratorio"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema genitourinario</label><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis8"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis8"></span> <textarea class="form-control"id="genitourinario"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema digestivo</label> <select class="form-control select2"id="sist_diges"style="width:100%"><option value="">Ningúno</option><?php foreach($digest as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis9"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis9"></span> <textarea class="form-control"id="digestivo"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Sistema endocrino</label> <select class="form-control select2"id="sist_endo"style="width:100%"><option value="">Ningúno</option><?php foreach($endocrino as $row){echo '<option value="'.$row->name.'">'.$row->name.'</option>';} ?></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis10"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis10"></span> <textarea class="form-control"id="endocrino"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Relativo a</label> <select class="form-control select2"id="sist_rela"style="width:100%"></select><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis11"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis11"></span> <textarea class="form-control"id="otros_ex_sis"rows="11"></textarea></td></tr><tr><td class="ida"><label class="control-label">Columna dorsal</label><br><button class="btn btn-primary btn-sm"id="btnSpeechExamSis12"title="soporte solo para el navegador Chrome"type="button"><i aria-hidden="true"class="fa fa-microphone"style="font-size:9px"></i></button> <span id="actionSpeechExamSis12"></span> <textarea class="form-control"id="dorsales"rows="11"></textarea></td></tr></table></form></div>
<script>
function examSistSisMuEs(){$.ajax({url:"<?php echo base_url(); ?>admin_medico/examSistSisMuEs",data:{},method:"POST",success:function(e){$("#sis_mu_e").html(e)}})}function examSistRelativoA(){$.ajax({url:"<?php echo base_url(); ?>admin_medico/examSistRelativoA",data:{},method:"POST",success:function(e){$("#sist_rela").html(e)}})}$('[rel="tooltip"]').tooltip(),$(".pagination").hover((function(){$(this).find(".box-tooltip").show()}),(function(){$(this).find(".box-tooltip").hide()})),$(".select2").select2({tags:!0});var btnSpeechExamSis1=document.getElementById("btnSpeechExamSis1");btnSpeechExamSis1.onclick=function(){var e=document.getElementById("neurologico"),t=document.getElementById("actionSpeechExamSis1");runSpeechRecognition(e,t)};var btnSpeechExamSis2=document.getElementById("btnSpeechExamSis2");btnSpeechExamSis2.onclick=function(){var e=document.getElementById("cardiova"),t=document.getElementById("actionSpeechExamSis2");runSpeechRecognition(e,t)};var btnSpeechExamSis3=document.getElementById("btnSpeechExamSis3");btnSpeechExamSis3.onclick=function(){var e=document.getElementById("urogenital"),t=document.getElementById("actionSpeechExamSis3");runSpeechRecognition(e,t)};var btnSpeechExamSis4=document.getElementById("btnSpeechExamSis4");btnSpeechExamSis4.onclick=function(){var e=document.getElementById("musculoes"),t=document.getElementById("actionSpeechExamSis4");runSpeechRecognition(e,t)};var btnSpeechExamSis5=document.getElementById("btnSpeechExamSis5");btnSpeechExamSis5.onclick=function(){var e=document.getElementById("nervioso"),t=document.getElementById("actionSpeechExamSis5");runSpeechRecognition(e,t)};var btnSpeechExamSis6=document.getElementById("btnSpeechExamSis6");btnSpeechExamSis6.onclick=function(){var e=document.getElementById("linfatico"),t=document.getElementById("actionSpeechExamSis6");runSpeechRecognition(e,t)};var btnSpeechExamSis7=document.getElementById("btnSpeechExamSis7");btnSpeechExamSis7.onclick=function(){var e=document.getElementById("respiratorio"),t=document.getElementById("actionSpeechExamSis7");runSpeechRecognition(e,t)};var btnSpeechExamSis8=document.getElementById("btnSpeechExamSis8");btnSpeechExamSis8.onclick=function(){var e=document.getElementById("genitourinario"),t=document.getElementById("actionSpeechExamSis8");runSpeechRecognition(e,t)};var btnSpeechExamSis9=document.getElementById("btnSpeechExamSis9");btnSpeechExamSis9.onclick=function(){var e=document.getElementById("digestivo"),t=document.getElementById("actionSpeechExamSis9");runSpeechRecognition(e,t)};var btnSpeechExamSis10=document.getElementById("btnSpeechExamSis10");btnSpeechExamSis10.onclick=function(){var e=document.getElementById("endocrino"),t=document.getElementById("actionSpeechExamSis10");runSpeechRecognition(e,t)};var btnSpeechExamSis11=document.getElementById("btnSpeechExamSis11");btnSpeechExamSis11.onclick=function(){var e=document.getElementById("otros_ex_sis"),t=document.getElementById("actionSpeechExamSis11");runSpeechRecognition(e,t)};var btnSpeechExamSis12=document.getElementById("btnSpeechExamSis12");btnSpeechExamSis12.onclick=function(){var e=document.getElementById("dorsales"),t=document.getElementById("actionSpeechExamSis12");runSpeechRecognition(e,t)};
</script>