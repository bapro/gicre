<table><?php if($patient_cie10!=null){$i=1;foreach($patient_cie10 as $dr){$diagno_def=$this->db->select('description')->where('idd',$dr->diagno_def)->get('cied')->row('description'); ?><tr><td><?=$i;$i++?>-<?=$diagno_def?><a class="delete-cied"id="<?=$dr->diagno_def?>"style="color:red;cursor:pointer;display:none"title="Eliminar"><i aria-hidden="true"class="fa fa-trash-o"></i></a></td></tr><?php }}else{ ?><tr><td style="color:red">No hay conclusion diagnostica en el CIE10</td></tr><?php } ?></table><script>var count_patient_cie10="<?=$count_patient_cie10?>";1==count_patient_cie10?$(".delete-cied").hide():$(".delete-cied").show(),$(".delete-cied").click(function(){if(confirm("Estás seguro de eliminar ?")){var t=this,e=$(this).attr("id");$.ajax({type:"POST",url:"<?=base_url('admin_medico/DeletePatCied')?>",data:{id:e},success:function(e){$(t).closest("tr").css("background","tomato"),$(t).closest("tr").fadeOut(800,function(){$(this).remove(),patientCie10(),$(".disable-all textarea").prop("disabled",!0),$(".disable-all select").prop("disabled",!0),$(".disable-all input").prop("disabled",!0),$(".show_modif_con_diag").slideDown(),$(".save_con_diag_hide").hide()})}})}})</script>