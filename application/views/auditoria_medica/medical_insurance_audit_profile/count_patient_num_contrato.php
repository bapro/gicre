<span class="loadit"></span> <input type="hidden" id="medico" value="<?=$medico?>"/> <a  class="godown round-billing"  style="">(<?=$count;?>)</a>  <input type="hidden" id="des" value="<?=$desde?>"/>  <input id="has" type="hidden" value="<?=$hasta?>"/>



<script>
$('.godown').click(function() {
$(".loadit").fadeIn().html('<span class="load" style="position:absolute"><img style="width:30px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var des = $('#des').val();
var has = $('#has').val();
var medico = "<?=$medico?>";
var god_own = "yes";
$.get( "<?php echo base_url();?>auditoria_medica/count_patient_num_contrato?desde="+des+"&hasta="+has+"&god_own="+god_own+"&medico="+medico, function( data ){
$(".loadit").hide();
$("#go_down_patient_num_con").html( data ); 
		   
}); 
 
});

</script>