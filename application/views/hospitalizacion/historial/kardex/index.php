 <div id="kardexIndex"   >

 </div>

   
   <script>
   let  countkardex = 0;
$('#load-kardex').on('click',function(e){
 //countkardex ++;
	   // if(countkardex==1){
	// $("#kardexIndex").html('<em>cargando kardex...</em> <span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
     kardexIndex();
	   //}

});


function kardexIndex(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/kardexIndex",
data: {id_historial:<?=$id_historial?>,user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$('#kardexIndex').html(data);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#kardexIndex').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

}


</script>
   