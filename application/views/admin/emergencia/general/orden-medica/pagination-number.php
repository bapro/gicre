<style>
li.registro-li{
	list-style: none;
	float: left;
	margin-right: 16px;
	padding:5px;
	point-events:none
	
}
</style>
<?php
$per_page = 1;
if($perfil=="Admin"){
$contition="";	
}else{
$contition="id_user=$user_id AND";	
}
$sql ="SELECT * FROM  emergency_orden_medica WHERE $contition id_patient=$id_historial ORDER BY id ASC";
$query= $this->db->query($sql);
$count= $query->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages='registros:';
}else{
$regis_pages='no hay registro';	
}
?>

<div id="paginationh">
<ul class="paginationh">
<li class="load-cirugia registro-li" ><i><?=$regis_pages?></i></li>
<?php
//Pagination Numbers
for($i=1; $i<=$pages; $i++)
{
echo '<li class="paninate-li" id="'.$i.'">'.$i.'</li>';
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
var centro_id=<?=$centro_id?>;
var enviado_a=<?=$enviado_a?>;
var perfil="<?=$perfil?>";
$("#content-orden-medica").load("<?php echo base_url(); ?>/emergency/pagination_data_orden_medica?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil+"&centro_id="+centro_id+"&enviado_a="+enviado_a);

});

</script>

