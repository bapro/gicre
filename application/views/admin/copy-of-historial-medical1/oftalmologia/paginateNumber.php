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
$sql ="SELECT * FROM  h_c_of_refracion WHERE $contition id_hist=$id_historial ORDER BY id ASC";
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
<li class="load-cirugia registro-li" ><i><?=$regis_pages?></i></li>
<?php
//Pagination Numbers
for($i=1; $i<=$pages; $i++)
{
echo '<li class="paninate-li" id="'.$i.'">'.$i.'</li>';
}
?>
<li class='load-cirugia loadingrf'></li>
</ul>

<br/>
</div>


<script>

$("#paginationh li").not('.load-cirugia').click(function(){
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
$(".loadingrf").html('<br> cargando...').css({'font-style' : 'italic'});
$("#updtade-of-ref").css({'background' : '#CBC7C7'});
//Loading Data
var pageNum = this.id;
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var perfil="<?=$perfil?>";
$("#content-refraccion").show();
$("#content-refraccion").load("<?php echo base_url(); ?>/admin_medico/pagination_data_refraccion?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil/*,refreshCirugiaReporte()*/);
$("#save-of-ref").hide();
});


</script>

