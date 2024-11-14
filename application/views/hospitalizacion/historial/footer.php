
<div class="modal fade" id="hos-notas"  role="dialog" >
<div class="modal-dialog modal-lg" style="width: 86%;margin: auto;">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<div class="modal fade" id="sol-inter" role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<div class="modal fade" id="quirurgia"  role="dialog" >
<div class="modal-dialog modal-lg"  style="width: 86%;margin: auto;" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="orden-medico"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>


<script>


$('#hos-notas').on('hidden.bs.modal', function () {
var idExF1=0;
//loadSignoEf(idExF1);
loadSigno(idExF1);
//$(this).removeData('bs.modal');
});


//$('#orden-medico').on('hidden.bs.modal', function () {
//$(this).removeData('bs.modal');
//});


$('#verEvaCon').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});




$('#sol-inter').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});


$('#quirurgia').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
//--------------------------SAVE DATA------------------------------------------------------------------
 


$('body').on('click', function(event) {
$('.required-menu').html('');
})






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


	//-------------------------------------------------------------------------------------------------------------



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
//--------------EMPTY HISTORIAL--------------------
$('#checkin_cafe').change(function() {
    if ($('#checkin_cafe:checked').length) {
        $('#hab_c_caf').prop('disabled', false);
		 $('#hab_f_caf').prop('disabled', false);
    } else {
        $('#hab_c_caf').prop('disabled', true);
		$('#hab_f_caf').prop('disabled', true);
    }
});


//handle habitos toxicos pipa


$('#checkin_pipa').change(function() {
    if ($('#checkin_pipa:checked').length) {
        $('#hab_c_pip').prop('disabled', false);
		 $('#hab_f_pip').prop('disabled', false);
    } else {
        $('#hab_c_pip').prop('disabled', true);
		$('#hab_f_pip').prop('disabled', true);
    }
});

//handle habitos toxicos ciga


$('#checkin_ciga').change(function() {
    if ($('#checkin_ciga:checked').length) {
        $('#hab_c_ciga').prop('disabled', false);
		 $('#hab_f_ciga').prop('disabled', false);
    } else {
        $('#hab_c_ciga').prop('disabled', true);
		$('#hab_f_ciga').prop('disabled', true);
    }
});

//handle habitos toxicos alcohol


$('#checkin_al').change(function() {
    if ($('#checkin_al:checked').length) {
        $('#hab_c_al').prop('disabled', false);
		 $('#hab_f_al').prop('disabled', false);
    } else {
        $('#hab_c_al').prop('disabled', true);
		$('#hab_f_al').prop('disabled', true);
    }
});


//handle habitos toxicos tabaco


$('#checkin_tab').change(function() {
    if ($('#checkin_tab:checked').length) {
        $('#hab_c_tab').prop('disabled', false);
		 $('#hab_f_tab').prop('disabled', false);
    } else {
        $('#hab_c_tab').prop('disabled', true);
		$('#hab_f_tab').prop('disabled', true);
    }
});




$('#checkin_drug').change(function() {
    if ($('#checkin_drug:checked').length) {
        $('#hab_f_drug').prop('disabled', false);
		 $('#hab_c_drug').prop('disabled', false);
		 $('.hab_t_drug').prop('disabled', false);
    } else {
        $('#hab_f_drug').prop('disabled', true);
		$('#hab_c_drug').prop('disabled', true);
		$('.hab_t_drug').prop('disabled', true);
    }
});





$('#checkin_hookah').change(function() {
    if ($('#checkin_hookah:checked').length) {
        $('#hookah').prop('disabled', false);
		 $('#hab_f_hookah').prop('disabled', false);
	 } else {
        $('#hookah').prop('disabled', true);
		$('#hab_f_hookah').prop('disabled', true);

    }
});




	 $select = $("#hab_t_drug").off("change");
    // and if country then bind it
     $select.on("change", function(e) {
         $('#hab_t_drug option[value="ninguno"]').remove();
	 });
//-------------------------------------------------------------------------------------------------------------------------

</script>
