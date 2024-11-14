<h4>drug list</h4>
<?php
$per_page = 1;
$sql ="SELECT * FROM  nota_med_salud_ocupacional WHERE id_patient=$id_p_a ORDER BY id DESC";
$getData= $this->db->query($sql);
$count= $getData->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages="$count record(s)";
}else{
$regis_pages='there is no record';	
}
?>
<i><?=$regis_pages?></i>
<div id="paginationh" >

<ul class="paginationh" >

<?php
$i=0;
foreach($getData->result() as $row)
{
$i++;
echo '<li class="paninate-li" style="font-size:15px" id="'.$row->id.'">'.date("d-m-Y H:i:s",strtotime($row->inserted_time)).'</li>';
}
?>
<li class="load-cirugia"></li>
</ul>

</div>

<script>
$("#paginationh li").not('.load-cirugia').click(function(){
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
var id_centro=<?=$id_centro?>;
var id_user=<?=$id_user?>;
$("#contentPatMedSavedRegistros").show();
$("#contentPatMedSavedRegistros").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#contentPatMedSavedRegistros").load("<?php echo base_url(); ?>/salud_ocupacional_med/paginationDataMedic?page="+pageNum+"&id_centro="+id_centro+"&id_user="+id_user);

});
</script>