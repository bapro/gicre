<br/>
<div id="pediaForm" ></div>

<script>

function pediaForm()
{
$('#pediaForm').html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>saveHistorial/pediaForm",
data: {user_id:<?=$user_id?>,historial_id:<?=$id_historial?>,centro_medico:<?=$centro_medico?>,area:<?=$areaid?>},
method:"POST",
success:function(data){
$('#pediaForm').html(data);
}, 
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#pediaForm').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}


var countPedia = 0;

$('#pediat_show_btn').on('click', function(e) {
	e.preventDefault();
	   countPedia ++;
	    if(countPedia==1){
	   pediaForm();
	   }
});
</script>