<?php
$per_page = 1;
if($perfil=="Admin"){
$contition="";	
}else{
$contition="id_user=$user_id AND";	
}
$sql ="SELECT * FROM  hc_cirugia_reporte WHERE $contition id_patient=$id_historial ORDER BY id DESC";
$cirugia_toracico= $this->db->query($sql);
$count= $cirugia_toracico->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages="$count registro(s)";
}else{
$regis_pages='no hay registro';	
}
?>
<i><?=$regis_pages?></i>
<div id="paginationh" >

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

function refreshCirugiaReporte(){
$(".load-cirugia").not('.registro-li').fadeIn().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#change-bgd-pag-re").css({'background' : '#DCDCDC'});
}
$("#nuevo-formr").click(function(e){
  paginationNumberReport();
$("#contentrp").hide();
$(".clear-cirugia-toracia").val("");
$("#imprimir-cirugia-reporte").hide();
$("#save-cirugia-reporte").prop("disabled",false);
$("#hide-form-cirugia-reporte").show();
  $('.unchecked-me-c:checked').removeAttr('checked');
    e.preventDefault();	
	});

$("#paginationh li").not('.load-cirugia').click(function(){
$("#hide-form-cirugia-reporte").hide();
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contentrp").show();
var user_id=<?=$user_id?>;
var id_patient=<?=$id_historial?>;
var centro_medico=<?=$centro_medico?>;
var perfil="<?=$perfil?>";
$("#contentrp").load("<?php echo base_url(); ?>/admin_medico/pagination_data_cirugia_general?page="+ pageNum+"&user_id="+user_id+"&id_patient="+id_patient+"&centro_medico="+centro_medico+"&perfil="+perfil,refreshCirugiaReporte());

});

</script>

