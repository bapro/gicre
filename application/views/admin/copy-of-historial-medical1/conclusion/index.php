<div id="conclucionForm" ></div>
<div class="modal fade" id="ver_con_d"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width" >
<div class="modal-content" >

</div>
</div>
</div>
<script>



conclucionForm();
function conclucionForm()
{
var historial_id = "<?=$historial_id?>";
var user_id = "<?=$user_id?>";
var centro_medico = "<?=$centro_medico?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/conclucionForm",
data: {historial_id:historial_id,user_id:user_id,centro_medico:centro_medico},
method:"POST",
success:function(data){
$('#conclucionForm').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#conclucionForm').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}





/*

var timer = null;
$('.on_input_cied').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000)
});

function doStuff1() {
	var id_pat="<?=$id_historial?>";
    var str= $(".on_input_cied").val();
	var tab= "exam-1";
$(".cied_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".cied_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat+"&tab="+tab, function( data ){
$(".cied_result").html(data); 
			   
});
}
}

*/

//----------------------------------------------------------------------------------------------------------------
$('.on_input_pro').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff2, 1000)
});


function doStuff2() {
	var id_pat="<?=$id_historial?>";
var str= $('.on_input_pro').val();
var tab= "exam-1";
$(".pro_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".pro_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_pro?value="+str+"&id_pat="+id_pat+"&tab="+tab, function( data ){
$(".pro_result").html(data); 
			   
});
}
}

</script>