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
$regis_pages='';
$iexf=1;
if($perfil=="Admin"){
$contition="";	
}else{
$contition="inserted_by=$user_id AND";	
}
$sql ="SELECT * FROM  emergency_signo_vitales WHERE $contition historial_id=$id_historial && hallazgo !='' ORDER BY id DESC";
$queryExF= $this->db->query($sql);
$count= $queryExF->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages="<li class='load-cirugia registro-li' >$regis_pages</li>";
}else{
$regis_pages='<em style="color:red">no hay registro en el examen fisico</em>';	
}
?>

<div id="" class='pag-num-sig'>
<ul class="paginationh">
<?php 
$sqltr ="SELECT id, hallazgo,inserted_time,inserted_by, id_triaje FROM  emergency_signo_vitales WHERE  historial_id=$id_historial  && hallazgo =''";
$querytr= $this->db->query($sqltr);
if($querytr->result() !=NULL){
$i2=1;
foreach($querytr->result() as $row)
{

	$timeins = date("d-m-Y H:i:s", strtotime($row->inserted_time));
	$user=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
?>
<li class="paninate-li load-cirugia" ><a style='color:red' title='creado por <?=$user?> &#013 fecha de creacion :<?=$timeins?>' data-toggle="modal" data-target="#triaje" href="<?php echo base_url("emergency/viewSignoVitalesTriaje/$row->id_triaje/$id_historial")?>"  ><?php echo $i2; $i2++;?>-triaje</a></li>
<?php
}
	
}
echo $regis_pages;
//my initial location
if($queryExF->result() !=NULL){

foreach($queryExF->result() as $rowExf)
{

	$timeins = date("d-m-Y H:i:s", strtotime($rowExf->inserted_time));
	$user=$this->db->select('name')->where('id_user',$rowExf->inserted_by)->get('users')->row('name');


?>
<li class="paninate-li" id="<?php echo $iexf; $iexf++;?>" title='Creado por <?php echo $user;?>' > <?=$timeins ?></li>
<?php
}
}else{
echo "<li style='color:red;list-style: none;'>no hay registros</li>";
}

?>
<li class="load-cirugia"></li>
</ul>

</div>


<script>
$('#triaje').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$(".pag-num-sig li").not('.load-cirugia').click(function(){
$("#hideExFis").hide();
$(".pag-num-sig li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contentExFis").show();
$("#contentExFis").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var perfil="<?=$perfil?>";
$("#contentExFis").load("<?php echo base_url(); ?>/emergency/pagination_data_signo_vitales?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil);

});

</script>

