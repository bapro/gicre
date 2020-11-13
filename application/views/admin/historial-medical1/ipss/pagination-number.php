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
$sql ="SELECT * FROM  h_c_ipss WHERE $contition historial_id=$id_historial ORDER BY id ASC";
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
function refreshIpss(){
$(".load-cirugia").not('.registro-li').fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#change-bgd-pag-re").css({'background' : '#DCDCDC'});
}

$("#nuevo-ipss").click(function(e){
$("#content-ipss").hide();
$("#hide-table-ipss").show();
    e.preventDefault();	
	});





$("#paginationh li").not('.load-cirugia').click(function(){
$("#hide-table-ipss").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#content-ipss").show();
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var centro_medico=<?=$centro_medico?>;
var perfil="<?=$perfil?>";
$("#content-ipss").load("<?php echo base_url(); ?>/admin_medico/pagination_data_ipss?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&centro_medico="+centro_medico+"&perfil="+perfil,refreshIpss());

});


//--------------------------------------------------------------------------------------------------------------

$("#nuevo-ipss").click(function(e){
$("#content-ipss").hide();
$("#hide-table-ipss").show();
/*$(".clear-cirugia-toracia").val("");
$("#imprimir-cirugia-reporte").hide();
$("#save-cirugia-reporte").prop("disabled",false);
$("#hide-form-cirugia-reporte").show();
  $('.unchecked-me-c:checked').removeAttr('checked');
    e.preventDefault();	*/
	});
</script>

