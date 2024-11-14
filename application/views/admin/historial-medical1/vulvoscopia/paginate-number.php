<div class="col-md-12"  >

<em> <b><?=$nb_co?> registros (s)</b></em>

<?php if ($nb_co > 0)
{
	
?>

<div id="paginationh" class="vulvoscopia-pagination">

<ul class="paginationh" >
<?php 
 foreach($query_co->result() as $row)
{

$user_c9=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c10=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
echo '<li title="Creado por '.$user_c9.', Actualizado por '.$user_c10.'" class="paninate-li" style="font-size:11px" id="'.$row->id.'">'.date("d-m-Y H:i:s",strtotime($row->inserted_time)).'</li>';
 }?>
 
</ul>

</div>
<?php
}
?>
<hr class="prenatal-separator"/>
</div>

<div class="load-paginate-on-click" id="load-vulvoscopia"></div>

<script>

$(".vulvoscopia-pagination li").click(function(){
$("#load-vulvoscopia").show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 $('#vulvoscopiaContent').css("opacity",".5");
$("#paginationh li").css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});

$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#vulvoscopiaContent").show();
$("#vulvoscopiaContent").load("<?php echo base_url(); ?>/colcoscopy_content/paginationDataVulvoscopia?page="+pageNum+"&idUser="+<?=$user_id?>+"&id_patient="+<?=$idpatient?>+"&id_centro="+<?=$id_centro?>);

});

</script>