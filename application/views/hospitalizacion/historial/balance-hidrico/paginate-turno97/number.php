<?php
$in=1;
$per_page = 1;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$id_user AND";
}
$sqltr ="SELECT id,inserted_time,inserted_by FROM  hosp_balance_hidrico_t97 WHERE $contition id_patient=$id_patient ORDER BY id DESC ";
$querytr= $this->db->query($sqltr);
$counts=$querytr->num_rows();
if($counts==1){
	echo "<em class='alert-info'>$counts registro</em>";
}else if($counts > 1){
echo "<em class='alert-info' style='font-size:14px'>$counts registros</em>";
}
?>

<div id="paginationh97">
<ul class="paginationh">
<?php

if($querytr->result() !=NULL){

foreach($querytr->result() as $row)
{

	$timeins = date("d-m H:i:s", strtotime($row->inserted_time));
	$user=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');


?>
<li class="paninate-li" id="<?php echo $in; $in++;?>" title='creado por <?=$user?>' > <?=$timeins ?></li>
<?php
}
}else{
echo "<span style='color:red'><em>no hay registro</em></span>";
}

?>
</ul>
</div>


<script>

$("#paginationh97 li").on('click', function(e){
  e.preventDefault();
$('#content-turno-paginate-97').css("opacity",".5");
$("#SaveTurno97").css("opacity",".5");
$(".paginationh li").css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#content-turno-paginate-97").show();
$('.successfull_saving').html(' procesando...').addClass('fa fa-spinner');
$.ajax({
type: "GET",
url: "<?=base_url('hosp_balance_hidrico/pagination_data_turno97')?>",
data: {page:pageNum,user_id:<?=$id_user?>,id_patient:<?=$id_patient?>,perfil:"<?=$perfil?>"},
 success:function(data){ 
$('#content-turno-paginate-97').html(data);
$('#content-turno-paginate-97').css("opacity","");
$("#SaveTurno97").css("opacity","");
$("#SaveTurno97").hide();
$('.successfull_saving').html('').removeClass('fa fa-spinner');
},

});
});






</script>
