<span class="loadit"></span> <input type="hidden" id="id_centro" value="<?=$id_centro?>"/> <a  class="godown round-billing"  style=""><?=$count;?></a>  <input type="hidden" id="des" value="<?=$desde?>"/>  <input id="has" type="hidden" value="<?=$hasta?>"/>



<script>
$('.godown').click(function() {
$(".loadit").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var des = $('#des').val();
var has = $('#has').val();
var id_centro = $("#id_centro").val();
var god_own = "yes";
$.get( "<?php echo base_url();?>admin/count_centro_medico_factura?desde="+des+"&hasta="+has+"&god_own="+god_own+"&id_centro="+id_centro, function( data ){
$(".loadit").hide();
$("#go_down_patient_num_con").html( data ); 
		   
}); 
 
});

</script>