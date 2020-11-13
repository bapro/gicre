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
$contition="user_id=$user_id AND";	
}
$sql ="SELECT * FROM  h_c_diagno_def_link WHERE $contition p_id=$id_historial AND origine=1 ORDER BY id_linkd ASC";
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
$("#hide-proced").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#content-proced").show();
$("#content-proced").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var perfil="<?=$perfil?>";
$("#content-proced").load("<?php echo base_url(); ?>/emergency/paginationDataProced?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil+"&centro_id="+<?=$centro_id?>);

});

</script>

