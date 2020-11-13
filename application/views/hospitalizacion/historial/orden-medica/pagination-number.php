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

?>

<div id="paginationh">
<ul class="paginationh">
<li class="load-cirugia registro-li" ><em class='repetion-done'></em></li>
<?php
$sqltr ="SELECT * FROM  hosp_orden_medica_sala WHERE $contition id_historial=$id_historial ORDER BY idsala ASC ";
$querytr= $this->db->query($sqltr);
if($querytr->result() !=NULL){
$iod=1;
foreach($querytr->result() as $row)
{

	$timeins = date("d-m-Y H:i:s", strtotime($row->inserted_time));
	$user=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');


?>
<li class="paninate-li" id="<?php echo $iod; $iod++;?>"> <?=$timeins ?></li>
<?php
}
}else{
echo "<li style='color:red;list-style: none;'>no hay registros</li>";
}

?>
<li class="load-cirugia"></li>
</ul>

<br/>
</div>

<script>

$("#paginationh li").not('.load-cirugia').click(function(){
$("#loadContentOrdMed1").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#content-orden-medica1").show();
$("#content-orden-medica1").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var id_hosp=<?=$id_hosp?>;
var centro_id=<?=$centro_id?>;
var perfil="<?=$perfil?>";
$("#content-orden-medica1").load("<?php echo base_url(); ?>/hospitalizacion/pagination_data_orden_medica?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil+"&id_hosp="+id_hosp+"&centro_id="+centro_id);

});

</script>
