<script>

$("#e2").on('change', function () {

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/get_centro_medico')?>",
data: {id_centro:$(this).val()},
success:function(data){ 
$("#e3").html(data); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showere').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
});





$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" }) ;

//----------------------------------------------------------------------------------------------------------------
$(document).ready(function() {
  var validator = $("#form_user2").validate();
 $('.select2').on('change', function () {
        $(this).valid();
    });


});



$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});



$("#exequatur").change(function(){
$("#nombre").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var exequatur=$(this).val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/get_medico_exequatur')?>",
data: {exequatur:exequatur},
cache: true,
success:function(data){ 
$("#nombre").html(data); 

}  
});


});




$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $("#e2 > option").prop("selected","selected");
        $("#e2").trigger("change");
    }else{
        $("#e2 > option").removeAttr("selected");
         $("#e2").trigger("change");
     }
});


$("#Reset").click(function(){
$('#form_user2').find('input, select, textarea').not(".savethisperfil").val('');
});



var timer = null;
$("#email2").keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_email_exist2, 1000)
});

function check_if_email_exist2(){
var email2= $("#email2").val();
if(email2 == "") {
$("#emailInfo2").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email2, function( data ){
$( "#emailInfo2" ).html( data ); 
$( "#emailInfo2" ).show(); 		   
});
}
};






var timer3 = null;
$("#email3").keydown(function(){
       clearTimeout(timer3); 
       timer3 = setTimeout(check_if_email_exist3, 1000)
});

function check_if_email_exist3(){
var email3= $("#email3").val();
if(email3 == "") {
$("#emailInfo3").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email3, function( data ){
$( "#emailInfo3" ).html( data ); 
$( "#emailInfo3" ).show(); 		   
});
}
};
</script>