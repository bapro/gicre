<div id="loadSeguroTarif"></div>

<script>


function loadSeguroTarif(){
$.ajax({
type:'POST',
url:'<?=base_url('admin/loadSeguroTarif')?>',
data: {seguro_id:<?=$seguro_id?>},
success:function(data) {
$("#loadSeguroTarif").html(data);
} 	
});	
}
loadSeguroTarif();	


//---------------------------------------------------------------------------------------------------------

	
</script>