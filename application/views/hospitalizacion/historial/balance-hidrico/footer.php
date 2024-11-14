  <script>
   /* function abs(a) { 
        // Check the number is negative 
        if (a < 0) { 
            // Multiply number with -1 
            // to make it positive 
            a = a * -1; 
        } 
        // Return the positive number 
        return a; 
    }*/ 
//turno 7-2
 $("#table-turno-7-2-liq").on('input', '.turno72_sol', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-7-2-liq .turno72_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno72_sol").text(calculated_total_sum);
			  
			total72LiqIngEgBal();
			       
			   
       });
	   
	  
	     $("#table-turno-7-2-liq").on('input', '.turno72_med', function () {
       var calculated_total_sum = 0;

       $("#table-turno-7-2-liq .turno72_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno72_med").text(calculated_total_sum);
			  total72LiqIngEgBal();
			  
       });
	   
	   
 
	      $("#table-turno-7-2-liq").on('input', '.turno72_vo', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-7-2-liq .turno72_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno72_vo").text(calculated_total_sum);
			 	  total72LiqIngEgBal();
			 
       });
  
  
  
  	   
	     function total72LiqIngEgBal(){
		  //total ingreso
			  var tot=parseFloat($(".tot_turno72_sol").text()) + parseFloat($(".tot_turno72_med").text()) + parseFloat($(".tot_turno72_vo").text());
			  
			  $("#turno_72_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $("#turno_72_ingreso_t").val() - $("#turno_72_egreso_t").val();
			  
			   $("#turno_72_balance").val(bal); 
            			   
		  
	  }
	   
  
  
 //---------------------------turno 7-2 eliminado di
        
    $("#table-turno-7-2-el").on('input', '.turno72_di', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-7-2-el .turno72_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno72_di").text(calculated_total_sum);
			  
			total72ElIngEgBal();
		 
			  
       });
	   
	   
	   //turno 7-2 eliminado eva
	   
	    $("#table-turno-7-2-el").on('input', '.turno72_eva', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-7-2-el .turno72_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno72_eva").text(calculated_total_sum);
			  total72ElIngEgBal();
			   
			  
       });
	   
	    function total72ElIngEgBal(){
	  
	   var tot=parseFloat($(".tot_turno72_eva").text()) + parseFloat($(".tot_turno72_di").text());
			  
			  
			  $("#turno_72_egreso_t").val(tot);
			   //balance
			  
			  var bal=$("#turno_72_ingreso_t").val() - $("#turno_72_egreso_t").val();
			  
			  
			$("#turno_72_balance").val(bal);
			
	  
  }
  
	//------------------------------------------------------------------------------------------------------------------------   
	   //turno 2-9 liquidos
	   
	 /*1-*/ $("#table-turno-2-9-liq").on('input', '.turno29_sol', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-2-9-liq .turno29_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno29_sol").text(calculated_total_sum);
			  total29LiIngEgBal();
       });
	   
	  
	   /*2-*/  $("#table-turno-2-9-liq").on('input', '.turno29_med', function () {
       var calculated_total_sum = 0;

       $("#table-turno-2-9-liq .turno29_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno29_med").text(calculated_total_sum);
			  
			  total29LiIngEgBal();
       });
	   
	   
	    /*3-*/  $("#table-turno-2-9-liq").on('input', '.turno29_vo', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-2-9-liq .turno29_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno29_vo").text(calculated_total_sum);
			  
			  total29LiIngEgBal();
			   
       });
  
  
  
  
  function total29LiIngEgBal(){
	  
	  //total ingreso
			  var tot=parseFloat($(".tot_turno29_sol").text()) + parseFloat($(".tot_turno29_med").text()) + parseFloat($(".tot_turno29_vo").text());
			  
			  $(".turno_29_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $(".turno_29_ingreso_t").val() - $("#turno_29_egreso_t").val();
			  
			  
			  $("#turno_29_balance").val(bal); 
			  
	  
  }
  
  
  
  
  
  //turno 2-9 elimiandos
        
    $("#table-turno-2-9-el").on('input', '.turno29_di', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-2-9-el .turno29_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno29_di").text(calculated_total_sum);
			  
			  total29ElIngEgBal();
			 
       });
	   
	   
	   
	   
	    $("#table-turno-2-9-el").on('input', '.turno29_eva', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-2-9-el .turno29_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno29_eva").text(calculated_total_sum);
			 total29ElIngEgBal();
			 
       });
	   
	   
	   
	   
	     function total29ElIngEgBal(){
			   var tot=parseFloat($(".tot_turno29_eva").text()) + parseFloat($(".tot_turno29_di").text());
			  
			  
			  $("#turno_29_egreso_t").val(tot);
			   //balance
			  
			  var bal= $(".turno_29_ingreso_t").val() - $("#turno_29_egreso_t").val() ;
			  
			  
			$("#turno_29_balance").val(bal);
			
		 }
	   
	   
	   //-------------------------------------------------------------------------------------------------------
	   //turno 9-7 liquidos
	   
	    $("#table-turno-9-7-liq").on('input', '.turno97_sol', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-9-7-liq .turno97_sol").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno97_sol").text(calculated_total_sum);
			  total97liqIngEgBal();
			   
       });
	   
	  
	     $("#table-turno-9-7-liq").on('input', '.turno97_med', function () {
       var calculated_total_sum = 0;

       $("#table-turno-9-7-liq .turno97_med").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno97_med").text(calculated_total_sum);
			  total97liqIngEgBal();
			   
       });
	   
	   
	      $("#table-turno-9-7-liq").on('input', '.turno97_vo', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-9-7-liq .turno97_vo").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno97_vo").text(calculated_total_sum);
			 
			total97liqIngEgBal()   
       });
  
  
  function total97liqIngEgBal(){
	  
	   //total ingreso
			  var tot=parseFloat($(".tot_turno97_sol").text()) + parseFloat($(".tot_turno97_med").text()) + parseFloat($(".tot_turno97_vo").text());
			  
			  $(".turno_97_ingreso_t").val(tot);
			  
			  
			  //balance
			  
			  var bal= $(".turno_97_ingreso_t").val() - $("#turno_97_egreso_t").val();
			  
			  
			  $("#turno_97_balance").val(bal);
			  
  }
  
  
  
  
  
  
  //turno 9-7 elimiandos
        
    $("#table-turno-9-7-el").on('input', '.turno97_di', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-9-7-el .turno97_di").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno97_di").text(calculated_total_sum);
			  
			  	 total97ElIngEgBal();
			 
       });
	   
	   
	   
	   
	    $("#table-turno-9-7-el").on('input', '.turno97_eva', function () {
       var calculated_total_sum = 0;
     
       $("#table-turno-9-7-el .turno97_eva").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $(".tot_turno97_eva").text(calculated_total_sum);
			  total97ElIngEgBal(); 
			 
       });
	   
	  
	  function total97ElIngEgBal(){
		   var tot=parseFloat($(".tot_turno97_eva").text()) + parseFloat($(".tot_turno97_di").text());
			  
			  
			  $("#turno_97_egreso_t").val(tot);
			   //balance
			  
			  var bal= $(".turno_97_ingreso_t").val() - $("#turno_97_egreso_t").val();
			  
			  
			$("#turno_97_balance").val(bal);
			
	  }
	  


 //-------save turno 7-2
 
 
    $("#SaveTurno72").on('submit', function(e){
        e.preventDefault();
		
			$('#turno72_23').val($('.tot_turno72_sol').text());
	$('#turno72_24').val($('.tot_turno72_med').text());
	$('#turno72_25').val($('.tot_turno72_vo').text());
	
	$('#turno72_46').val($('.tot_turno72_di').text());
	$('#turno72_47').val($('.tot_turno72_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno72',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
				  $('.successfull_saving').html('procesando').css('font-style','italic');
                $('#submitTurno72').attr("disabled","disabled");
                $('#SaveTurno72').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#successTurno72').html('');
                if(response.status == 1){
                    $('#SaveTurno72')[0].reset();
					$('.clear-turno72').html(0);
                    $('#successTurno72').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
					paginateTurno72();
                } else if(response.status == 2){
				       $('#successTurno72').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#successTurno72').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#SaveTurno72').css("opacity","");
                $("#submitTurno72").removeAttr("disabled");
				$('.successfull_saving').html('');
            }
        });
    });

  //-------save turno 2-9
 
 
     $("#SaveTurno29").on('submit', function(e){
        e.preventDefault();
			$('#turno29_23').val($('.tot_turno29_sol').text());
	$('#turno29_24').val($('.tot_turno29_med').text());
	$('#turno29_25').val($('.tot_turno29_vo').text());
	
	$('#turno29_46').val($('.tot_turno29_di').text());
	$('#turno29_47').val($('.tot_turno29_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno29',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
				 $('.successfull_saving').html('procesando').css('font-style','italic');
                $('#submitTurno29').attr("disabled","disabled");
                $('#SaveTurno29').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#successTurno29').html('');
                if(response.status == 1){
                    $('#SaveTurno29')[0].reset();
					$('.clear-turno29').html(0);
                    $('#successTurno29').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
					paginateTurno29();
                } else if(response.status == 2){
				       $('#successTurno29').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#successTurno29').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#SaveTurno29').css("opacity","");
                $("#submitTurno29").removeAttr("disabled");
				$('.successfull_saving').html('');
            }
        });
    });
 
  //-------save turno 9-7
 
   $("#SaveTurno97").on('submit', function(e){
        e.preventDefault();
			$('#turno97_23').val($('.tot_turno97_sol').text());
	$('#turno97_24').val($('.tot_turno97_med').text());
	$('#turno97_25').val($('.tot_turno97_vo').text());
	
	$('#turno97_46').val($('.tot_turno97_di').text());
	$('#turno97_47').val($('.tot_turno97_eva').text()); 
        $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hosp_balance_hidrico/saveTurno97',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
				 $('.successfull_saving').html('procesando').css('font-style','italic');
                $('#submitTurno97').attr("disabled","disabled");
                $('#SaveTurno97').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('#successTurno97').html('');
                if(response.status == 1){
                    $('#SaveTurno97')[0].reset();
					$('.clear-turno97').html(0);
                    $('#successTurno97').html('<p class="alert alert-success">'+response.message+'</p>');
					turnoGrandToal();
					paginateTurno97();
                } else if(response.status == 2){
				       $('#successTurno97').html('<p class="alert alert-warning">'+response.message+'</p>');	
				}else{
                    $('#successTurno97').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#SaveTurno97').css("opacity","");
                $("#submitTurno97").removeAttr("disabled");
				$('.successfull_saving').html('');
            },
			
        });
    });

turnoGrandToal();

 function turnoGrandToal(){
$.ajax({
type: "POST",
url: "<?=base_url('hosp_balance_hidrico/turnoGrandTotal')?>",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_id:<?=$centro_id?>},
 success:function(data){ 
$('#turno-grand-total').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#turno-grand-total').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}



//----pagination bullet turno 7-2

function paginateTurno72(){
$("#paginateTurno72").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>hosp_balance_hidrico/paginateTurno72",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginateTurno72').html(data);
},

});
}

paginateTurno72();


//----pagination bullet turno 2-9

function paginateTurno29(){
$.ajax({
url:"<?php echo base_url(); ?>hosp_balance_hidrico/paginateTurno29",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginateTurno29').html(data);
},

});
}

paginateTurno29();


//----pagination bullet turno 2-9
function paginateTurno97(){
$.ajax({
url:"<?php echo base_url(); ?>hosp_balance_hidrico/paginateTurno97",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginateTurno97').html(data);
},

});
}

paginateTurno97();
   </script>
