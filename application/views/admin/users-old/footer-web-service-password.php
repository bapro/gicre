
<script>

$("#centro_medico_web").on('change', function(event) {
	$("#passSegWeb").val("");
	});
$("#btnSavePasSeg").on('click', function(event) {
event.preventDefault(); 
var passSegWeb =$("#passSegWeb").val();
var seguroWeb =$("#seguroWeb").val();
$.ajax({
url:"<?php echo base_url(); ?>creation/saveNewPassWebService",
data: {password:passSegWeb,id_seguro:seguroWeb,id_user:<?=$id_user?>, id_centro: $("#centro_medico_web").val()},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status == 0){
$('#saveWebResult').html('<p class="alert alert-danger ">'+response.message+'</p>');
}else if(response.status == 1){
	$('#saveWebResult').html('<p class="alert alert-success ">'+response.message+'</p>');
}
else if(response.status == 2){
	$('#saveWebResult').html('<p class="alert alert-success ">'+response.message+'</p>');
}

} 
});
});

$("#seguroWeb").change(function(){
$.ajax({
type: "POST",
url: "<?=base_url('creation/checkWebServicePass')?>",
data: {id_seguro:$(this).val(),id_user:<?=$id_user?>,id_centro: $("#centro_medico_web").val(), perfil:"<?=$perfil?>"},
success:function(data){ 
$("#passSegWeb").val(data); 
	
}    
});
});

</script>