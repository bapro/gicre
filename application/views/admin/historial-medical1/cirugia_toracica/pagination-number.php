<?php $per_page=1;if($perfil=="Admin"){$contition="";}else{$contition="user=$user_id AND";}$sql="SELECT id,inserted_time FROM  hc_cirugia_toracica WHERE $contition id_patient=$id_historial ORDER BY id DESC";$cirugia_toracico=$this->db->query($sql);$count=$cirugia_toracico->num_rows();$pages=ceil($count/$per_page);if($pages>0){$regis_pages="$count registro(s)";}else{$regis_pages='no hay registro';} ?><div id="paginationh"><ul class="paginationh"><?php $i=1;foreach($cirugia_toracico->result()as $row){$timeins=date("d-m-Y H:i:s",strtotime($row->inserted_time));echo '<li class="paninate-li" id="'.$row->id.'">'.$timeins.'</li>';} ?><li class="load-cirugia"></li></ul></div><script>function refreshCirugia(){$(".load-cirugia").not(".registro-li").fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),$("#change-bgd-pag").css({background:"#DCDCDC"})}$("#nuevo-form").click(function(i){$("#contenth").hide(),$(".clear-cirugia-toracia").val(""),$("#imprimir-cirugia").hide(),$("#save-cirugia-toracia").prop("disabled",!1),$("#hide-form-cirugia").show(),$(".unchecked-me-c:checked").removeAttr("checked"),i.preventDefault()}),$("#paginationh li").not(".load-cirugia").click(function(){$("#hide-form-cirugia").hide(),$("#paginationh li").not(".load-cirugia").css({border:"solid #0063DC 2px"}).css({color:"#0063DC"}),$(this).css({color:"#FF0084"}).css({border:"none"});var i=this.id;$("#contenth").show();var a=<?=$user_id?>,e=<?=$id_historial?>,r=<?=$centro_medico?>;$("#contenth").load("<?php echo base_url(); ?>/historialHeader/pagination_data_cirugia_toracica?page="+i+"&user_id="+a+"&id_patient="+e+"&centro_medico="+r+"&perfil=<?=$perfil?>",refreshCirugia())})</script>