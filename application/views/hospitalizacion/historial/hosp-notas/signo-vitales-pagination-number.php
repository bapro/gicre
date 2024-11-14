<?php
$in=1;
$per_page = 1;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$user_id AND";
}
$sqltr ="SELECT id, hallazgo,inserted_time,inserted_by, nombre_nota FROM  hosp_signo_vitales WHERE $contition historial_id=$id_historial ORDER BY id DESC ";
$querytr= $this->db->query($sqltr);
$counts=$querytr->num_rows();
if($counts==1){
	echo "<em>$counts registro</em>";
}else if($counts > 1){
echo "<em>$counts registros</em>";
}
?>

<div id="paginationh">
<ul class="paginationh paginationh-hosp">
<?php

if($querytr->result() !=NULL){

foreach($querytr->result() as $row)
{

	$timeins = date("d-m-Y H:i:s", strtotime($row->inserted_time));
	$user=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');


?>
<li class="paninate-li" id="<?php echo $row->id;?>" title='<?php echo $row->nombre_nota;?>' > <?=$timeins ?></li>
<?php
}
}else{
echo "<li style='color:red;list-style: none;'>no hay registros</li>";
}

?>
</ul>
</div>

<script>


$("#paginationh li").click(function(){
$(".hide-signo-vitales-n").hide();
$(".disable-all :input").prop("disabled", true);
//$("#id_notas_edit").addClass('id_notas_edit');
$(".paginationh-hosp li").css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#id_notas_edit_").val(pageNum);
$("#signo_id").val(1);
$("#content-signo-vitales-n").show();
$("#content-signo-vitales-n").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var perfil="<?=$perfil?>";

$("#content-signo-vitales-n").load("<?php echo base_url(); ?>/hospitalizacion/pagination_data_signo_vitales?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil);

});

</script>
