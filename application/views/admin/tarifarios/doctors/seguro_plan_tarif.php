<div id="loadSeguroDocTarif"></div>

<script>


function loadSeguroDocTarif(){
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/loadSeguroDocTarif')?>',
data: {id_doctor :<?=$id_doctor?>,id_seguro :<?=$id_seguro?>,id_plan :<?=$id_plan?>,user_name:<?=$user?>},
success:function(data) {
$("#loadSeguroDocTarif").html(data);
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#loadSeguroDocTarif').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},   	
});	
}
loadSeguroDocTarif();	


//---------------------------------------------------------------------------------------------------------

	
</script>