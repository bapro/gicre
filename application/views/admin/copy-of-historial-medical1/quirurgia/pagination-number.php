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
$sql ="SELECT id,inserted_time FROM  hc_quirurgica WHERE $contition id_patient=$id_historial ORDER BY id ASC";
$cirugia_toracico= $this->db->query($sql);
$count= $cirugia_toracico->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages="$count registro(s)";
}else{
$regis_pages='no hay registro';	
}
?>

<div id="paginationh">

<ul class="paginationh" >

<?php
$i=1;
foreach($cirugia_toracico->result() as $row)
{
$timeins = date("d-m-Y H:i:s", strtotime($row->inserted_time));
echo '<li class="paninate-li" id="'.$row->id.'">'.$timeins.'</li>';
}
?>
<li class="load-cirugia"></li>
</ul>




<br/>
</div>


<script>
function refreshQuirurgia(){
$(".load-cirugia").not('.registro-li').fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#save-quirurgica-update").css({'background' : '#DCDCDC'});
}
$("#nuevo-formq").click(function(e){
$("#contentq").hide();
$(".clear-cirugia-toracia").val("");
$("#imprimir-cirugiqe").hide();
$("#save-quirurgica-btn").prop("disabled",false);
$("#hide-form-quirurgia").show();
  e.preventDefault();	
	});

$("#paginationh li").not('.load-cirugia').click(function(){
$("#hide-form-quirurgia").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contentq").show();
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var centro_medico="<?=$centro_medico?>";
var perfil="<?=$perfil?>";
$("#contentq").load("<?php echo base_url(); ?>/admin_medico/pagination_data_quirurca?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&centro_medico="+centro_medico+"&perfil="+perfil,refreshQuirurgia());

});

</script>

