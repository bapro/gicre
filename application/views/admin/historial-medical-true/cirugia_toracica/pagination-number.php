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
$sql ="SELECT id,inserted_time FROM  hc_cirugia_toracica WHERE $contition id_patient=$id_historial ORDER BY id ASC";
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
<li class="load-cirugia"></li>
</ul>

<br/>
</div>


<script>
function refreshCirugia(){
$(".load-cirugia").not('.registro-li').fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#change-bgd-pag").css({'background' : '#DCDCDC'});
}
$("#nuevo-form").click(function(e){
$("#contenth").hide();
$(".clear-cirugia-toracia").val("");
$("#imprimir-cirugia").hide();
$("#save-cirugia-toracia").prop("disabled",false);
$("#hide-form-cirugia").show();
  $('.unchecked-me-c:checked').removeAttr('checked');
    e.preventDefault();	
	});
	
	
$("#paginationh li").not('.load-cirugia').click(function(){
$("#hide-form-cirugia").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contenth").show();
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var centro_medico=<?=$centro_medico?>;
var perfil="<?=$perfil?>";
$("#contenth").load("<?php echo base_url(); ?>/admin_medico/pagination_data_cirugia_toracica?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&centro_medico="+centro_medico+"&perfil="+perfil,refreshCirugia());

});


</script>

