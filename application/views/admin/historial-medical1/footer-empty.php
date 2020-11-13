<script>




//handle habitos toxicos cafe
     
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
</script>