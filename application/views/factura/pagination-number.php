<style>
.paginationh{display:flex}#paginationh{overflow-x:auto;width:100%}ul.paginationh{list-style:none;text-align:center;font-size:12px}li.paninate-li{list-style:none;float:left;margin-right:16px;padding:5px;border:2px solid #0063dc;background:#dcdcdc;color:#0063dc}li.paninate-li:hover{color:#ff0084;cursor:pointer}

</style>
<?php
$per_page = 1;
$sql ="SELECT id, time_created, autoNomber, count(id) as tot FROM  h_c_procedimiento_tarif WHERE  patient=$patient && user=$id_doc && id_cd=0 GROUP BY autoNomber ORDER BY id DESC";
$cirugia_toracico= $this->db->query($sql);
$count= $cirugia_toracico->num_rows();
$pages = ceil($count/$per_page);
if($pages > 0){
$regis_pages='registros: ';

?>
<em><?=$regis_pages?></em> 
<div id="paginationh">
<ul class="paginationh">
<?php
$ct=0;
foreach($cirugia_toracico->result() as $row)
{
$ct++;	
$timeins = date("d-m-Y H:i:s", strtotime($row->time_created));
echo "<li class='paninate-li $ct' title='$row->tot registro(s)' id='$row->autoNomber'>$timeins</li>";
}
?>
<li class="load-cirugia"></li>
</ul>

<br/>
</div>
<?php 

}
else{
$regis_pages='no hay registro';	
}
?>
<script>
$(document).ready( function () {
	
	$( "li.paninate-li" ).each(function( index ) {
   var registro =$(this).attr('class').split(' ')[1];
   if(registro==1){
	   $(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
   }
});
	

$("#paginationh li").not('.load-cirugia').click(function(){
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#loadContentOrdMed").show();
$("#loadContentOrdMed").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
var user_id=<?=$user_id?>;
var id_doc=<?=$id_doc?>;
var patient=<?=$patient?>;

$("#loadContentOrdMed").load("<?php echo base_url(); ?>/factura/paginationProcedFacData?page="+pageNum+"&user_id="+user_id+"&patient="+patient+"&id_doc="+id_doc);


});
});
</script>

