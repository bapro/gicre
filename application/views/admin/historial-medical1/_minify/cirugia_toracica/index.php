<div class="modal-header"id="background_"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"title="Cierra"><i class="fa fa-times-circle"style="font-size:48px;color:red"></i></button><h3 class="h3 his_med_title">Cirugía Torácica y General</h3></div><div class="modal-body"id="background_"><div class="container"><div class="row"><div id="paginationNumber"></div><hr class="prenatal-separator"><button class="btn btn-primary btn-xs"id="nuevo-form">NUEVO REGISTRO</button><hr class="prenatal-separator"><div id="contenth"></div><div id="hide-form-cirugia"><form class="form-horizontal"method="post"><h3>CREAR NUEVO REGISTRO</h3><hr><div class="form-group"><label class="control-label col-sm-2">HORA INICIO:</label><div class="col-sm-2"><select class="form-control select2"id="hora_inicio"><?php echo $option;$sql2="SELECT * FROM hour_from order by id ASC";$query2=$this->db->query($sql2);foreach($query2->result()as $row){if($genda['hour_from']==$row->hour){echo "<option selected>".$row->hour."</option>";}else{echo "<option >".$row->hour."</option>";}} ?></select></div><label class="control-label col-sm-2">HORA FINALIZACION:</label><div class="col-sm-2"><select class="form-control select2"id="hora_final"><?php echo $option;$sql2="SELECT * FROM hour_from order by id DESC";$query2=$this->db->query($sql2);foreach($query2->result()as $row){if($genda['hour_to']==$row->hour){echo "<option selected>".$row->hour."</option>";}else{echo "<option >".$row->hour."</option>";}} ?></select></div></div><div class="form-group"><label class="control-label col-sm-3">DIAGNOSTICO PRE-FBC:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="diag_pre_fbc"></textarea></div></div><div class="col-md-3"></div><div class="col-md-9"><table class="table"style="width:75%"><tr><td>S/V:</td><td><input class="form-control clear-cirugia-toracia"id="svta"></td><td>mmhg:</td><td><input class="form-control clear-cirugia-toracia"id="mmhg"></td><td>l/min:</td><td><input class="form-control clear-cirugia-toracia"id="minfr"></td><td>Res/min:</td><td><input class="form-control clear-cirugia-toracia"id="resmin"></td></tr><tr><td>TA:</td><td><input class="form-control clear-cirugia-toracia"id="tacir"></td><td>FC:</td><td><input class="form-control clear-cirugia-toracia"id="fccir"></td><td>FR:</td><td><input class="form-control clear-cirugia-toracia"id="frcir"></td><td>SATO2:</td><td><input class="form-control clear-cirugia-toracia"id="sato2"></td></tr></table></div><div class="form-group"><label class="control-label col-sm-3">FOSAS NASALES:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="fosas_nasales"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">CUERDAS BOCALES:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="cuerdad_bocales"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">TRAQUEA:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="traqua_text"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">CARINA:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="carina_text"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">BRONQUIO PRINCIPAL DERECHO:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="bronquio_principal"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">LSD, LM, LID:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="lsd_lm"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">BRONQUIO PRINCIPAL IZQUIERDO:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="bronquio_prince_iz"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">LSI, LII:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="lsi_lii"></textarea></div></div><div class="col-md-3"></div><div class="col-md-9"><label class="checkbox-inline"><input class="unchecked-me-c"name="cepillado_bronquial"type="checkbox"> CEPILLADO BRONQUIAL</label> <label class="checkbox-inline"><input class="unchecked-me-c"name="lavado_bronco"type="checkbox"> LAVADO BRONCOALVEOLAR</label> <label class="checkbox-inline"><input class="unchecked-me-c"name="broncoas"type="checkbox"> BRONCOASPIRADO</label><br><label class="checkbox-inline"><input class="unchecked-me-c"name="biopsia_bronq"type="checkbox"> BIOPSIA BRONQUIAL</label> <label class="checkbox-inline"><input class="unchecked-me-c"name="biopsia_tras"type="checkbox"> BIOPSIA TRASBRONQUIAL</label> <label class="checkbox-inline"><input class="unchecked-me-c"name="puncion_tras"type="checkbox"> PUNCION TRASBRONQUIAL</label><br><br></div><div class="form-group"><label class="control-label col-sm-3">COMPLICACIONES:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="complic_text"></textarea></div></div><div class="form-group"><label class="control-label col-sm-3">DIAGNOSTICO POST-FBC:</label><div class="col-sm-5"><textarea class="form-control clear-cirugia-toracia"id="diag_post_fbc"></textarea></div></div><div class="form-group"><div class="col-sm-9 col-sm-offset-3"><button class="btn btn-md btn-success"id="save-cirugia-toracia"type="button"><i class="fa after-actionp fa-check"style="display:none;color:#00f;font-size:30px;position:absolute"></i> GUARDAR</button> <a class="btn btn-md btn-primary"href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/g") ?>"id="imprimir-cirugia"style="display:none"target="_blank"><i class="fa fa-print"></i> Imprimir</a></div></div><div id="rrrt"></div></form></div></div></div></div><script>function paginationNumber(){var a=<?=$centro_medico?>;$.ajax({url:"<?php echo base_url(); ?>admin_medico/showCirugiaTabulation",data:{id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:a},method:"POST",success:function(a){$("#paginationNumber").html(a)}})}$(".select2").select2({tags:!0}),paginationNumber(),$("#save-cirugia-toracia").on("click",function(a){a.preventDefault(),$("#save-cirugia-toracia").prop("disabled",!0),$("#save-cirugia-toracia").text("guardando...");var i=$("#hora_inicio").val(),r=$("#hora_final").val(),c=$("#diag_pre_fbc").val(),t=$("#svta").val(),e=$("#mmhg").val(),n=$("#minfr").val(),o=$("#resmin").val(),l=$("#fosas_nasales").val(),s=$("#cuerdad_bocales").val(),u=$("#traqua_text").val(),_=$("#carina_text").val(),v=$("#bronquio_principal").val(),p=$("#lsd_lm").val(),d=$("#bronquio_prince_iz").val(),m=$("#lsi_lii").val(),g=[];$("input[name='cepillado_bronquial']:checked").each(function(){g.push(this.value)});var h=[];$("input[name='lavado_bronco']:checked").each(function(){h.push(this.value)});var f=[];$("input[name='broncoas']:checked").each(function(){f.push(this.value)});var b=[];$("input[name='biopsia_bronq']:checked").each(function(){b.push(this.value)});var x=[];$("input[name='biopsia_tras']:checked").each(function(){x.push(this.value)});var k=[];$("input[name='puncion_tras']:checked").each(function(){k.push(this.value)});var z=$("#complic_text").val(),q=$("#diag_post_fbc").val(),N=<?=$user_id?>,T=<?=$id_historial?>,w=$("#tacir").val(),O=$("#fccir").val(),j=$("#frcir").val(),A=$("#sato2").val();$.ajax({url:"<?php echo base_url(); ?>admin_medico/cirugiaToracia",data:{hora_inicio:i,hora_final:r,svta:t,mmhg:e,minfr:n,resmin:o,diag_pre_fbc:c,tacir:w,fccir:O,fosas_nasales:l.trim(),cuerdad_bocales:s.trim(),traqua_text:u.trim(),id_cirugia_toracia:0,frcir:j,carina_text:_.trim(),bronquio_principal:v.trim(),lsd_lm:p.trim(),bronquio_prince_iz:d.trim(),lsi_lii:m.trim(),id_user:N,id_patient:T,cepillado_bronquial:g,lavado_bronco:h,diag_post_fbc:q.trim(),sato2:A,broncoas:f,biopsia_bronq:b,biopsia_tras:x,puncion_tras:k,complic_text:z.trim()},method:"POST",success:function(a){paginationNumber(),$(".after-action").fadeIn("slow",function(){$(".after-action").delay(3e3).fadeOut()}),$("#imprimir-cirugia").show(),$("#save-cirugia-toracia").prop("disabled",!1),$("#save-cirugia-toracia").text("GUARDAR")}})})</script>