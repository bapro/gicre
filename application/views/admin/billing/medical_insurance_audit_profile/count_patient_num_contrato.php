<span class="loadit"></span> <a  class="godown round-billing"  style=""><?=$count;?></a>  <input type="hidden" id="des" value="<?=$desde?>"/>  <input id="has" type="hidden" value="<?=$hasta?>"/>

<script>
$('.godown').on('click', function(event){
//$('.godown').click(function() {
$(".loadit").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var des = "<?=$desde?>";
var has = "<?=$hasta?>"; 
var medico = "<?=$medico?>";
var id_seguro = "<?=$id_seguro?>";
var god_own = "yes";

$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/go_down_patient_num_con')?>",
data: {desde:des,hasta:has,god_own:god_own,medico:medico,id_seguro:id_seguro},
cache: true,
success:function(data){ 
$(".loadit").hide();
$("#go_down_patient_num_con").html(data);
},
  
});

/*$.get( "<?php echo base_url();?>admin_medico/go_down_patient_num_con?desde="+des+"&hasta="+has+"&god_own="+god_own+"&medico="+medico+"&id_seguro="+id_seguro, function( data ){
$(".loadit").hide();
$("#go_down_patient_num_con").html( data ); 
		   
}); */
 
});

</script>