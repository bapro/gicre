<div id="loadDocTarif"></div>

<script>


function loadDocTarif(){
$.ajax({
type:'POST',
url:'<?=base_url('medico/loadDocTarif')?>',
data: {seguro_id:<?=$seguro_id?>},
success:function(data) {
$("#loadDocTarif").html(data);
} 	
});	
}
loadDocTarif();	


//---------------------------------------------------------------------------------------------------------

	
</script>