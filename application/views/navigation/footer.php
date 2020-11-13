<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>

<script type="text/javascript"> 

$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $("#e2 > option").prop("selected","selected");
        $("#e2").trigger("change");
    }else{
        $("#e2 > option").removeAttr("selected");
         $("#e2").trigger("change");
     }
});



$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" }) ;

//----------------------------------------------------------------------------------------------------------------
$(document).ready(function() {
  var validator = $("#form_user2").validate();
 $('.select2').on('change', function () {
        $(this).valid();
    });


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




$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    //	validClass: 'stay',
	
    highlight: function (element, errorClass, validClass) {
        $(element).addClass(errorClass); //.removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass(errorClass); //.addClass(validClass);
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        }
    
		else {
            error.insertAfter(element);
        }
    }
});
$(document).ready(function() {
	
	
	  var validator = $("#form_user").validate();
	  
	  
	  
	  
	
	
//----------------------------------------------------------	
$('#pass2').bind("cut copy paste",function(e) {
e.preventDefault();
});






});

var timer = null;
$("#email").keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(check_if_email_exist, 1000)
});

function check_if_email_exist(){
var email= $("#email").val();
if(email == "") {
$("#emailInfo").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email, function( data ){
$( "#emailInfo" ).html( data ); 
$( "#emailInfo" ).show(); 		   
});
}
};


//$('#form_user').on('submit', function(event) {
//	alert("El usuario se guarda con exito !");
//});



$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});



//--------------------------------------------------

 </script>