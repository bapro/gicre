<?php $per_page=1;if($perfil=="Admin"){$contition="";}else{$contition="id_user=$user_id AND";}$sql="SELECT * FROM  h_c_ipss WHERE $contition historial_id=$id_historial ORDER BY id DESC";$cirugia_toracico=$this->db->query($sql);$count=$cirugia_toracico->num_rows();$pages=ceil($count/$per_page);if($pages>0){$regis_pages="$count registro(s)";}else{$regis_pages='no hay registro';} ?><i><?=$regis_pages?></i><div id="paginationh"><ul class="paginationh"><?php $i=1;foreach($cirugia_toracico->result()as $row){$timeins=date("d-m-Y H:i:s",strtotime($row->inserted_time));echo '<li class="paninate-li" id="'.$row->id.'">'.$timeins.'</li>';} ?><li class="load-cirugia"></li></ul></div><script>function refreshIpss(){$(".load-cirugia").not(".registro-li").fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'),$("#change-bgd-pag-re").css({background:"#DCDCDC"})}$("#nuevo-ipss").click(function(i){$("#content-ipss").hide(),$("#hide-table-ipss").show(),i.preventDefault()}),$("#paginationh li").not(".load-cirugia").click(function(){$("#hide-table-ipss").hide(),$("#paginationh li").not(".load-cirugia").css({border:"solid #0063DC 2px"}).css({color:"#0063DC"}),$(this).css({color:"#FF0084"}).css({border:"none"});var i=this.id;$("#content-ipss").show();var n=<?=$user_id?>,s=<?=$id_historial?>,o=<?=$centro_medico?>;$("#content-ipss").load("<?php echo base_url(); ?>/historialHeader/pagination_data_ipss?page="+i+"&user_id="+n+"&id_patient="+s+"&centro_medico="+o+"&perfil=<?=$perfil?>",refreshIpss())}),$("#nuevo-ipss").click(function(i){$("#content-ipss").hide(),$("#hide-table-ipss").show()})</script>