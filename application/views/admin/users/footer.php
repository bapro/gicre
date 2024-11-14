<?php $this->load->view('prevent-duplicated-entry');?>
<input id="current_user_perfil" type="hidden" value="<?=$this->session->userdata('user_perfil')?>" />
<script>

$("#savePassw").on('click', function(event) {
event.preventDefault(); 
var pass1 =$("#newpassword1").val();
var pass2 =$("#newpassword2").val();
$.ajax({
url:"<?php echo base_url(); ?>users/saveNewPassword",
data: {pass1:pass1,pass2:pass2,id_table:$("#id_user").val()},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status == 0){
$('#passwordResult').html('<p class="text-danger ">'+response.message+'</p>');
}else if(response.status == 2){
	$('#passwordResult').html('<p class="text-danger ">'+response.message+'</p>');
}
else{
$('#passwordResult').html('<p class="text-success">'+response.message+'</p>');
if($('#current_user_perfil').val() !="Admin"){
setTimeout(function(){
window.location.href = '<?php echo site_url('login/medico_logout');?>/'
}, 3000);
}
}
} 
});
});

$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
});

$("#btnSavePasSeg").on('click', function(event) {
event.preventDefault(); 
$("#btnSavePasSeg").prop("disabled", true);
var passSegWeb =$("#passSegWeb").val();
var seguroWeb =$("#seguroWeb").val();
$.ajax({
url:"<?php echo base_url(); ?>users/saveNewPassWebService",
data: {password:passSegWeb,id_seguro:seguroWeb,id_user:$("#id_user").val(), id_centro: $("#centro_medico_web").val()},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status == 0){
$('#saveWebResult').html('<p class="text-danger ">'+response.message+'</p>');
}else if(response.status == 1){
	$('#saveWebResult').html('<p class="text-success ">'+response.message+'</p>');
}
else if(response.status == 2){
	$('#saveWebResult').html('<p class="text-success ">'+response.message+'</p>');
}
$("#btnSavePasSeg").prop("disabled", false);
}, 
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#saveWebResult').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
});



function random_password_generate(max,min)
{
    var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#@!%&()/";
    var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
    var randPassword = Array(randPwLen).fill(passwordChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
    return randPassword;
}
  
 $("#generarCont").on('click', function(event) {   
 $(".new-pass").val(random_password_generate(16,8));
});	


document.getElementById('userPhone').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});


 $('#verPassword').click(function() {
   $(this).children().toggleClass('fa fa-eye fa fa-eye-slash ');
	$('.new-pass').prop('type', $('.new-pass').prop('type') === 'password' ? 'text' : 'password');
  });
  
  
  
  $("#seguroWeb").on('change', function(event) {
$.ajax({
type: "POST",
url: "<?=base_url('webservice_consult/checkWebServicePass')?>",
data: {id_seguro:$(this).val(),id_user:$("#id_user").val(), id_centro:$("#centro_medico_web").val()},
success:function(data){ 
$("#passSegWeb").val(data); 
	
}    
});
});

$("#centro_medico_web").on('change', function(event) {
	$("#passSegWeb").val("");
	});
	
  
  
  
</script>