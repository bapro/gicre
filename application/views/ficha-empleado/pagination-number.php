
<?php
$per_page = 1;
$sql ="SELECT * FROM  employees_lic_med WHERE id_employee=$id_emp ORDER BY id DESC";
$getData= $this->db->query($sql);
$count= $getData->num_rows();
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
$i=0;
foreach($getData->result() as $row)
{
$i++;
echo '<li class="paninate-li" style="font-size:11px" id="'.$row->id.'">'.date("d-m-Y H:i:s",strtotime($row->inserted_time)).'</li>';
}
?>
<li class="load-cirugia"></li>
</ul>

<br/>
</div>

<script>
$("#paginationh li").not('.load-cirugia').click(function(){
$("#paginationh li").not('.load-cirugia').css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#contentEmpLicMed").show();
$("#contentEmpLicMed").load("<?php echo base_url(); ?>/zona_franca/paginationDataLicMed?page="+pageNum+"&idUser="+<?=$id_user?>);

});
</script>