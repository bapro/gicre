<div class="col-md-12 lab-ref"><table class="examplelabhist table table-striped"id="grouped-lab"><thead><tr style="background:#38a7bb;color:#fff"><th style="display:none"></th><th style="color:#fff">Laboratorios</th><th style="color:#fff;width:20px"><button class="btn btn-default btn-xs"id="save-groupo-lab"style="background:red;color:#fff"type="button">Indicar</button><ul class="nav navbar-nav show-imp-lab-grop"style="display:none"><li class="dropdown"><span class="dropdown-toggle"data-toggle="dropdown"style="cursor:pointer"><i class="fa fa-print"style="font-size:20px;color:#fff"></i><span class="caret"></span></span><ul class="dropdown-menu"><li><a>FORMATO VERTICAL</a> <a class="imprimirRecetasForPat"href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/1/printing/h_c_indications_labs") ?>"style="cursor:pointer;color:#000"target="_blank">con la foto</a> <a class="imprimirRecetasForPat"href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/0/printing/h_c_indications_labs") ?>"style="cursor:pointer;color:#000"target="_blank">Sin la foto</a></li><li><a>FORMATO HORIZONTAL</a> <a class="imprimirRecetasForPat horiz"href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/1/printing/h_c_indications_labs") ?>"style="cursor:pointer;color:#000"target="_blank"id="1">con la foto</a> <a class="imprimirRecetasForPat horiz"href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/0/printing/h_c_indications_labs") ?>"style="cursor:pointer;color:#000"target="_blank"id="0">Sin la foto</a></li></ul></li></ul></th></tr></thead><tbody><?php foreach($query->result()as $row){ ?><tr><td style="display:none"><?=$row->id?></td><td style="text-transform:uppercase"><?=$row->lab_name?></td><td style="width:1px"><input checked class="check-lab-grp"id="print_<?=$row->lab_id?>"name="check-lab-grp"type="checkbox"value="<?=$row->lab_id?>"></td></tr><?php } ?></tbody></table></div><script>4==<?=$hist?>?$(".check-lab").prop("disabled",!0):$(".check-lab").prop("disabled",!1),$(".examplelabhist").DataTable({language:{url:"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},aaSorting:[[0,"asc"]]}),$("#save-groupo-lab").on("click",function(a){a.preventDefault();$("#nuevo-lab").val(),$("#nuevo-groupo").val();if($(".check-lab-grp").is(":checked")){var u=[];$.each($("input[name='check-lab-grp']:checked"),function(){u.push($(this).val())}),$("#save-groupo-lab").prop("disabled",!0),$.ajax({type:"POST",url:"<?=base_url('admin_medico/SaveFormIndicacionesLabGroupo')?>",data:{lab:u,historial_id_l:<?=$id_historial?>,operatorl:<?=$operator?>,user_id:<?=$user_id?>,emergency_id:<?=$emergency_id?>},success:function(a){$(".show-imp-lab-grop").show(),$("#save-groupo-lab").prop("disabled",!1),allLaboratorios()}})}else alert("Elige al menos uno")})</script>