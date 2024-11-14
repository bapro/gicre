<script>

//=======================tipification===========================
jQuery("input[name='tipificacion']").on('click', function(e) {
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});


//=======================tipification===========================
jQuery("input[name='rhoa']").on('click', function(e) {
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});

jQuery("input[name='rhch']").on('click', function(e) {
$("#tip-hide").hide();
$("#tip-show").show();
if($('.ck').is(':checked')) {
$("#mas").show();
$("#menos").hide();
}
else{
$("#menos").show();
$("#mas").hide();
}
});




//=======infeccion transmision sexual
function show1(){
$("#display_ifts").show('slow');
//$("#display_ifts").css("visibility", "visible");
}
function show2(){
$("#display_ifts").hide('slow');
//$("#display_ifts").css("visibility", "hidden");
}
//-----------------------------------------
function show3(){
$("#complica_dur_text").show('slow');
//$("#complica_dur_text").css("visibility", "visible");
}
function show4(){
$("#complica_dur_text").hide('slow');
//$("#complica_dur_text").css("visibility", "hidden");
}
//------------------------------------------------
function show5(){
$("#complica_text").show('slow');
//$("#complica_text").css("visibility", "visible");
}
function show6(){
$("#complica_text").hide('slow');
//$("#complica_text").css("visibility", "hidden");
}

//-----------------------------------------------------
function show7(){
$("#realiza_auto_text").show('slow');
//$("#realiza_auto_text").css("visibility", "visible");
}
function show8(){
$("#realiza_auto_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show9(){
$("#otros_t_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show8(){
$("#realiza_auto_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


function show18(){
$("#ant_pap_re_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show17(){
$("#ant_pap_re_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show19(){
$("#cliclo_text").slideToggle();
//$("#realiza_auto_text").css("visibility", "hidden");
}



function show20(){
$("#cliclo_text").hide('slow');
//$("#realiza_auto_text").css("visibility", "hidden");
}


$(document).ready(function() {
	
	  $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    };
})




jQuery("input[name='mf']").on('click', function(e) {
		if($('.chkYes5').is(':checked')) {
		
			  $('.text-maltrato').prop('disabled', false);
		}
		else{
			$('.text-maltrato').prop('disabled', true);
			$('.text-maltrato').val('');
			
		}
});





jQuery("input[name='abss']").on('click', function(e) {
		if($('.chkYes6').is(':checked')) {
		
			  $('.text-abuso').prop('disabled', false);
		}
		else{
			$('.text-abuso').prop('disabled', true);
			$('.text-abuso').val('');
			
		}
});


jQuery("input[name='negs']").on('click', function(e) {
		if($('.chkYes7').is(':checked')) {
		
			  $('.text-neg').prop('disabled', false);
		}
		else{
			$('.text-neg').prop('disabled', true);
			$('.text-neg').val('');
			
		}
});


jQuery("input[name='mems']").on('click', function(e) {
if($('.chkYes8').is(':checked')) {

$('.maltrato-emo').prop('disabled', false);
}
else{
$('.maltrato-emo').prop('disabled', true);
$('.maltrato-emo').val('');

}
});

//--------------------------------------------------------------------------------------------------------------


//Alimentos

$('.checkin_ala').change(function() {
    if ($('.checkin_ala:checked').length) {
        $('#alimentos_al').prop('disabled', true);
		$('#alimentos_al').val('');
	} else {
        $('#alimentos_al').prop('disabled', false);
	}
});

//medicamentos

$('.checkin_meda').change(function() {
    if ($('.checkin_meda:checked').length) {
        $('#medicamentos_al').prop('disabled', true);
		  $('#medicamentos_al').val('');
	 } else {
        $('#medicamentos_al').prop('disabled', false);
	}
});


//otros
$('.checkin_otrosa').change(function() {
	if ($('.checkin_otrosa:checked').length) {
        $('#otros_al').prop('disabled', true);
		$('#otros_al').val('');
		
     } else {
        $('#otros_al').prop('disabled', false);
	 }
});




//Quirurgicos
$('.checkin_qui').change(function() {
    if ($('.checkin_qui:checked').length) {
        $('#quirurgicos').prop('disabled', true);
		$('#quirurgicos').val('');
	 } else {
        $('#quirurgicos').prop('disabled', false);
	 }
});


//Abdominal
$('.checkin_abd').change(function() {
    if ($('.checkin_abd:checked').length) {
        $('#abdominal').prop('disabled', true);
		$('#abdominal').val('');
	 } else {
        $('#abdominal').prop('disabled', false);
	}
});

//Transfusión
$('.checkin_trans').change(function() {
    if ($('.checkin_trans:checked').length) {
        $('#transfusion').prop('disabled', true);
		$('#transfusion').val('');
    } else {
        $('#transfusion').prop('disabled', false);
		
    }
});


//gine obstetrico

$('.checkin_gine').change(function() {
    if ($('.checkin_gine:checked').length) {
        $('#gineco').prop('disabled', true);
		 $('#gineco').val('');
    } else {
        $('#gineco').prop('disabled', false);
		
    }
});

$('.checkin_tora').change(function() {
    if ($('.checkin_tora:checked').length) {
        $('#toracica').prop('disabled', true);
		 $('#toracica').val('');
		
    } else {
        $('#toracica').prop('disabled', false);
		
    }
});





$('.checkin_otros').change(function() {
	 if ($('.checkin_otros:checked').length) {
          $("#otros1").val('');
        $('#otros1').prop('disabled', true);
		 $('#otros1').val('');
		
   } else {
        $('#otros1').prop('disabled', false);
		 
		
    }
});


jQuery("input[name='radiomedi']").on('click', function(e) {
if($('.chM').is(':checked')) {

$('.selectmedic').prop('disabled', false);

}
else{
$('.selectmedic').prop('disabled', true);
$(".selectmedic").val(null).trigger("change");
}
});


$(".right-otro :input").prop("disabled", true);

$('.checkin-right-otro').change(function() {
    if ($('.checkin-right-otro:checked').length) {
        $('.right-otro :input').prop('disabled', true);
		
    } else {
        $('.right-otro :input').prop('disabled', false);
		
    }
});





//violencia infantil
$('.checkin_v1').change(function() {
    if ($('.checkin_v1:checked').length) {
        $('#violencia1').prop('disabled', true);
		  $('#violencia1').val('');
		
    } else {
        $('#violencia1').prop('disabled', false);
		
    }
});

$('.checkin_v2').change(function() {
    if ($('.checkin_v2:checked').length) {
        $('#violencia2').prop('disabled', true);
		  $('#violencia2').val('');
		
    } else {
        $('#violencia2').prop('disabled', false);
		
    }
});

$('.checkin_v3').change(function() {
    if ($('.checkin_v3:checked').length) {
        $('#violencia3').prop('disabled', true);
		 $('#violencia3').val('');
		
    } else {
        $('#violencia3').prop('disabled', false);
		
    }
});

$('.checkin_v4').change(function() {
    if ($('.checkin_v4:checked').length) {
        $('#violencia4').prop('disabled', true);
		 $('#violencia4').val('');
		
    } else {
        $('#violencia4').prop('disabled', false);
		
    }
});


//---------------------------
$(".select-examsis").select2({
	allowClear: true,
  tags: true
});


$(".select2-ex").select2({
	allowClear: true,
  tags: true
});

$('.select2').select2({ 
allowClear: true,
tags: true,  
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	




    $('.example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

	//----toggle intrafamilial
	$('#click_viol').click(function () {
	$('#click_viol').text($('#click_viol').text() == 'Ocultar Violencia Intafamiliar' ? 'Violencia Intafamiliar' : 'Ocultar Violencia Intafamiliar'); 
    $("#violenciaform").slideToggle("slow");
    $("#edit_datav").slideToggle("slow");	
	})
	
	
	
//----Sospecha de Abuso o Maltrato
	$('#click_sospecha_mal').click(function () {
	$('#click_sospecha_mal').text($('#click_sospecha_mal').text() == 'Ocultar Sospecha de Abuso o Maltrato' ? 'Sospecha de Abuso o Maltrato' : 'Ocultar Sospecha de Abuso o Maltrato'); 
    $("#sospecha_mal").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant gnrl
	$('#click_antg').click(function () {
	$('#click_antg').text($('#click_antg').text() == 'Ocultar Antecedentes personales, familiares y patologicos' ? 'Antecedentes personales, familiares y patologicos' : 'Ocultar Antecedentes personales, familiares y patologicos'); 
    $("#show_gnrl").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	//----ant otros_gnrl
	$('#click_otros_ant').click(function () {
	$('#click_otros_ant').text($('#click_otros_ant').text() == 'Ocultar Otros antecedentes' ? 'Otros antecedentes' : 'Ocultar Otros antecedentes'); 
    $("#show_otros_ant").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
		//----ant habitos
	$('#click_habitost').click(function () {
	$('#click_habitost').text($('#click_habitost').text() == 'Ocultar Habitos Toxicos' ? 'Habitos Toxicos' : 'Ocultar Habitos Toxicos'); 
    $("#habitost").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	
	
		//----ant habitos
	$('#click_ant_al_rec_med').click(function () {
	$('#click_ant_al_rec_med').text($('#click_ant_al_rec_med').text() == 'Antecedentes alergicos y reaccion a medicamentos' ? 'Antecedentes alergicos y reaccion a medicamentos' : 'Antecedentes alergicos y reaccion a medicamentos'); 
    $("#ant_al_rec_med").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	
	$('#alergicos').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	
	$('#medicaha').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	</script>