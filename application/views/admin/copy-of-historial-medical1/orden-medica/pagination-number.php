<style>
.paginationh{display:flex}#paginationh{overflow-x:auto;width:100%}ul.paginationh{list-style:none;text-align:center;font-size:12px}li.paninate-li{list-style:none;float:left;margin-right:16px;padding:5px;border:2px solid #0063dc;background:#dcdcdc;color:#0063dc}li.paninate-li:hover{color:#ff0084;cursor:pointer}

</style>
<?php
$per_page = 1;
if($perfil=="Admin"){
$contition="";	
}else{
$contition="id_user=$user_id AND";	
}
$sql ="SELECT * FROM  orden_medica_sala WHERE $contition id_historial=$id_historial AND direction=$direction ORDER BY idsala DESC";
$cirugia_toracico= $this->db->query($sql);
$count= $cirugia_toracico->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages='registros:';
}else{
$regis_pages='no hay registro';	
}
?>

<div id="paginationh">
<ul class="paginationh">
<li class="load-cirugia registro-li" ><?=$regis_pages?> <em class='repetion-done'></em></li>
<?php
//Pagination Numbers
foreach($cirugia_toracico->result() as $row)
{
$timeins = date("d-m-Y H:i:s", strtotime($row->inserted_time));
echo '<li class="paninate-li" id="'.$row->idsala.'">'.$timeins.'</li>';
}
?>
<li class="load-cirugia"></li>
</ul>

<br/>
</div>

<script>

$("#paginationh li").not('.load-cirugia').click(function(){
$("#loadContentOrdMed").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#content-orden-medica").show();
$("#content-orden-medica").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var direction=<?=$direction?>;
var id_em=<?=$id_emergency?>;
var centro_id=<?=$centro_id?>;
var perfil="<?=$perfil?>";
$("#content-orden-medica").load("<?php echo base_url(); ?>/admin_medico/pagination_data_orden_medica?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil+"&direction="+direction+"&id_em="+id_em+"&centro_id="+centro_id);

});

</script>

