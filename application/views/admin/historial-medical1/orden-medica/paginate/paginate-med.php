<table class="table table-striped"style="width:100%"><thead><tr style="background:#428bca"><th style="width:4px;color:#fff"><strong>Fecha</strong></th><th style="width:3px;color:#fff">Medica.</th><th style="width:3px;color:#fff">Operador.</th><th style="width:1px;color:#fff">Ver</th><th style="width:1px;color:#fff">Edit.</th><th style="width:1px;color:#fff">Bor.</th></tr></thead><tbody><?php $cpt="";$sql="select * from  orden_medica_recetas where id_sala=$idsala";$data=$this->db->query($sql);foreach($data->result()as $row){if($direction==0){$med=$row->medica;}else{if(is_numeric($row->medica)){$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');}else{$med=$row->medica;}}$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');$fecha=date("d-m-Y H:i:s",strtotime($row->insert_date));if($cpt==0){$cpt=1;$colorBg="#E0E5E6";}else{$cpt=0;$colorBg="#E0E5E6";} ?><tr bgcolor="<?=$colorBg?>"><td><?=$fecha?></td><td><?=$med?></td><td><?=$op?></td><td title="Presentation:<?=$row->presentacion?>Frecuencia:<?=$row->frecuencia?>Via:<?=$row->via?>Nota:<?=$row->nota?>"><i class="fa fa-eye"></i></td><td><?php if($row->operator==$user_id||$perfil=="Admin"){ ?><a class="btn-sm"style="cursor:pointer"title="Editar"data-target="#edit_recetas_or_med"data-toggle="modal"href="<?php echo base_url("admin_medico/edit_recetas_or_med/$row->id_i_m/$user_id/$direction") ?>"><span class="glyphicon glyphicon-pencil"></span></a><?php }else{echo "<i style='color:red' class='fa fa-ban'></i>";} ?></td><td><?php if($row->operator==$user_id||$perfil=="Admin"){ ?><a class="delete_recetas_or_med2"style="cursor:pointer"title="Eliminar recetas<?=$row->medica?>"id="<?=$row->id_i_m?>"><i class="fa fa-remove"style="color:red"></i></a><?php }else{echo "<i style='color:red' class='fa fa-ban'></i>";} ?></td></tr><?php } ?></tbody></table><script>$(".delete_recetas_or_med2").click(function(){if(confirm("Sure to delete ?")){var e=this,t=$(this).attr("id");$.ajax({type:"POST",url:"<?=base_url('admin_medico/deleteRecetasOM')?>",data:{id:t},success:function(t){$(e).closest("tr").css("background","tomato"),$(e).closest("tr").fadeOut(800,function(){$(this).remove()})}})}})</script>