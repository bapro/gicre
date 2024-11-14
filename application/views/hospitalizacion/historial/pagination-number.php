<?php

$asked_by=$this->db->select('asked_by')->where('asked_by',$user_id)->get('hosp_solicutud_consulta')->row('asked_by');
if($asked_by==$user_id){
$user_field='asked_by';	
}else{
$asked_to=$this->db->select('asked_to')->where('asked_to',$user_id)->get('hosp_solicutud_consulta')->row('asked_to');	
$user_field='asked_to';	
}

$in=1;
$per_page = 1;
if($perfil=="Admin"){
$contition="";
}else{
$contition="$user_field=$user_id AND";
}
$sqltr ="SELECT * FROM  hosp_solicutud_consulta WHERE $contition id_patient=$id_historial ORDER BY id DESC ";
$querytr= $this->db->query($sqltr);
$counts=$querytr->num_rows();
if($counts==1){
	echo "<em>$counts registro</em>";
}else if($counts > 1){
echo "<em>$counts registros</em>";
}
?>

<div id="paginationh">

<ul class="paginationh">
<?php
if($querytr->result() !=NULL){

foreach($querytr->result() as $row)
{

	$timeins = date("d-m-Y H:i:s", strtotime($row->asked_time));
	$user=$this->db->select('name')->where('id_user',$row->asked_by)->get('users')->row('name');


?>
<li class="paninate-li" id="<?php echo $in; $in++;?>"> <?=$timeins ?> </li>
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
$("#hideSolInterCons").hide();
$(".paginationh li").css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contentSolInterCons").show();
$("#contentSolInterCons").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var user_field="<?=$user_field?>";
var perfil="<?=$perfil?>";
$("#contentSolInterCons").load("<?php echo base_url(); ?>/hosp_interconsultas/dataPaginateSolInterCons?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&perfil="+perfil+"&user_field="+user_field);

});

</script>
