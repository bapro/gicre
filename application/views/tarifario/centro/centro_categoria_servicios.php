<div id="load-cat-tarif"></div>

<script>


function loadCatTarif(){
$.ajax({
type:'POST',
url:'<?=base_url('tarifarios_centro/loadCatTarif')?>',
data: {categoria :"<?=$categoria?>",id_centro :<?=$id_centro?>,id_seguro :<?=$id_seguro?>},
success:function(data) {
$("#load-cat-tarif").html(data);
},
 	
});	
}
loadCatTarif();	


//---------------------------------------------------------------------------------------------------------

	
</script>