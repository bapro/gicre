<div class="col-md-12"  >
<h4 class="h4 his_med_title">CONSEJERIA (<b><?=$nb_cnsling?> regitros (s)</b>)</h4>

<?php if ($nb_cnsling > 0)
{
?>

<div id="paginationh" >

<ul class="paginationh" >
<?php 
 foreach($query_cnsling->result() as $row)
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

</div>

<div class="load-paginate-on-click" id="load-consejeria"></div>

<script>

$("#paginationh li").click(function(){
$("#load-consejeria").show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#showEditCounseling").show();
	$('#saveEditCounseling').hide(); 
 $('#counseling-content').css("opacity",".5");
$("#paginationh li").css({'border' : 'solid #0063DC 2px'}).css({'color' : '#0063DC'});
$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
//Loading Data
var pageNum = this.id;
$("#counseling-content").show();
$("#counseling-content").load("<?php echo base_url(); ?>/Counseling_content/paginationData?page="+pageNum+"&idUser="+<?=$user_id?>+"&id_patient="+<?=$idpatient?>);

});

</script>