<div id="load-cat-tarif"></div>

<script>


function loadCatTarif(){
$.ajax({
type:'POST',
url:'<?=base_url('admin/loadCatTarif')?>',
data: {categoria :"<?=$categoria?>",id_centro :<?=$id_centro?>,id_seguro :<?=$id_seguro?>},
success:function(data) {
$("#load-cat-tarif").html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-cat-tarif').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 	
});	
}
loadCatTarif();	


//---------------------------------------------------------------------------------------------------------

	
</script>