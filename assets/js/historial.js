//1--hide and show table on the head of historial------

$(document).ready(function(){
	$('.check-all').prop('disabled', true);
	$('.emp_checkbox').prop('checked', true);
	$('.text-marquo').prop('disabled', true);
	jQuery('#select_all').on('click', function(e) {
		if($(this).is(':checked',true)) {
			$(".emp_checkbox").prop('checked', true);
           $(".check_madre").prop('disabled', true); 
          $(".check_padre").prop('disabled', true); 
		 $(".check_hnos").prop('disabled', true); 
      $(".check_pers").prop('disabled', true);
	     $(".check_madre2").prop('checked', false); 
          $(".check_padre2").prop('checked', false); 
		 $(".check_hnos2").prop('checked', false); 
      $(".check_pers2").prop('checked', false);

           $(".check_madre2").prop('disabled', true); 
          $(".check_padre2").prop('disabled', true); 
		 $(".check_hnos2").prop('disabled', true); 
      $(".check_pers2").prop('disabled', true);


            $(".check_madre3").prop('disabled', true); 
          $(".check_padre3").prop('disabled', true); 
		 $(".check_hnos3").prop('disabled', true); 
      $(".check_pers3").prop('disabled', true);
	  
            $(".check_madre4").prop('checked', false); 
          $(".check_padre4").prop('checked', false); 
		 $(".check_hnos4").prop('checked', false); 
      $(".check_pers4").prop('checked', false);
	  
	             $(".check_madre4").prop('disabled', true); 
          $(".check_padre4").prop('disabled', true); 
		 $(".check_hnos4").prop('disabled', true); 
      $(".check_pers4").prop('disabled', true);

	  
	        $(".check_madre5").prop('checked', false); 
          $(".check_padre5").prop('checked', false); 
		 $(".check_hnos5").prop('checked', false); 
      $(".check_pers5").prop('checked', false);
	  
	             $(".check_madre5").prop('disabled', true); 
          $(".check_padre5").prop('disabled', true); 
		 $(".check_hnos5").prop('disabled', true); 
      $(".check_pers5").prop('disabled', true);

	  
	  	        $(".check_madre6").prop('checked', false); 
          $(".check_padre6").prop('checked', false); 
		 $(".check_hnos6").prop('checked', false); 
      $(".check_pers6").prop('checked', false);
	  
	             $(".check_madre6").prop('disabled', true); 
          $(".check_padre6").prop('disabled', true); 
		 $(".check_hnos6").prop('disabled', true); 
      $(".check_pers6").prop('disabled', true);

	  	  	  $(".check_madre7").prop('checked', false); 
          $(".check_padre7").prop('checked', false); 
		 $(".check_hnos7").prop('checked', false); 
      $(".check_pers7").prop('checked', false);
	  
	             $(".check_madre7").prop('disabled', true); 
          $(".check_padre7").prop('disabled', true); 
		 $(".check_hnos7").prop('disabled', true); 
      $(".check_pers7").prop('disabled', true);

	  
	             $(".check_madre8").prop('disabled', true); 
          $(".check_padre8").prop('disabled', true); 
		 $(".check_hnos8").prop('disabled', true); 
      $(".check_pers8").prop('disabled', true);

	   $(".check_madre8").prop('checked', false); 
          $(".check_padre8").prop('checked', false); 
		 $(".check_hnos8").prop('checked', false); 
      $(".check_pers8").prop('checked', false);
	  
	  	  	  	  $(".check_madre9").prop('checked', false); 
          $(".check_padre9").prop('checked', false); 
		 $(".check_hnos9").prop('checked', false); 
      $(".check_pers9").prop('checked', false);
	  
	             $(".check_madre9").prop('disabled', true); 
          $(".check_padre9").prop('disabled', true); 
		 $(".check_hnos9").prop('disabled', true); 
      $(".check_pers9").prop('disabled', true);

	  
	  
	  	  	  	  $(".check_madre10").prop('checked', false); 
          $(".check_padre10").prop('checked', false); 
		 $(".check_hnos10").prop('checked', false); 
      $(".check_pers10").prop('checked', false);
	  
	  
	             $(".check_madre10").prop('disabled', true); 
          $(".check_padre10").prop('disabled', true); 
		 $(".check_hnos10").prop('disabled', true); 
      $(".check_pers10").prop('disabled', true);

	  
	  
	  	  	  $(".check_madre11").prop('checked', false); 
          $(".check_padre11").prop('checked', false); 
		 $(".check_hnos11").prop('checked', false); 
      $(".check_pers11").prop('checked', false);
	  
           $(".check_madre11").prop('disabled', true); 
          $(".check_padre11").prop('disabled', true); 
		 $(".check_hnos11").prop('disabled', true); 
      $(".check_pers11").prop('disabled', true);

	  
	             $(".check_madre12").prop('disabled', true); 
          $(".check_padre12").prop('disabled', true); 
		 $(".check_hnos12").prop('disabled', true); 
      $(".check_pers12").prop('disabled', true);

	  
	  	  	  	  	  $(".check_madre12").prop('checked', false); 
          $(".check_padre12").prop('checked', false); 
		 $(".check_hnos12").prop('checked', false); 
      $(".check_pers12").prop('checked', false);
	  
	  
	  	  	  	$(".check_madre13").prop('checked', false); 
          $(".check_padre13").prop('checked', false); 
		 $(".check_hnos13").prop('checked', false); 
      $(".check_pers13").prop('checked', false);
	  
	             $(".check_madre13").prop('disabled', true); 
          $(".check_padre13").prop('disabled', true); 
		 $(".check_hnos13").prop('disabled', true); 
      $(".check_pers13").prop('disabled', true);

	  
	  	  	  	  	  $(".check_madre14").prop('checked', false); 
          $(".check_padre14").prop('checked', false); 
		 $(".check_hnos14").prop('checked', false); 
      $(".check_pers14").prop('checked', false);
	  
	             $(".check_madre14").prop('disabled', true); 
          $(".check_padre14").prop('disabled', true); 
		 $(".check_hnos14").prop('disabled', true); 
      $(".check_pers14").prop('disabled', true);

	  
	  	  	  	  	  $(".check_madre15").prop('checked', false); 
          $(".check_padre15").prop('checked', false); 
		 $(".check_hnos15").prop('checked', false); 
      $(".check_pers15").prop('checked', false);
	  
	             $(".check_madre15").prop('disabled', true); 
          $(".check_padre15").prop('disabled', true); 
		 $(".check_hnos15").prop('disabled', true); 
      $(".check_pers15").prop('disabled', true);

	  
	  
	  	  	  	  	  $(".check_madre16").prop('checked', false); 
          $(".check_padre16").prop('checked', false); 
		 $(".check_hnos16").prop('checked', false); 
      $(".check_pers16").prop('checked', false);
	  
	             $(".check_madre16").prop('disabled', true); 
          $(".check_padre16").prop('disabled', true); 
		 $(".check_hnos16").prop('disabled', true); 
      $(".check_pers16").prop('disabled', true);

	  
	  $(".check_madre17").prop('checked', false); 
          $(".check_padre17").prop('checked', false); 
		 $(".check_hnos17").prop('checked', false); 
      $(".check_pers17").prop('checked', false);
	  
	             $(".check_madre17").prop('disabled', true); 
          $(".check_padre17").prop('disabled', true); 
		 $(".check_hnos17").prop('disabled', true); 
      $(".check_pers17").prop('disabled', true);
		}

		
		else {  
			 $(".emp_checkbox").prop('checked', false);
           $(".check_madre").prop('disabled', false); 
          $(".check_padre").prop('disabled', false); 
		 $(".check_hnos").prop('disabled', false); 
      $(".check_pers").prop('disabled', false);


            $(".check_madre2").prop('disabled', false); 
          $(".check_padre2").prop('disabled', false); 
		 $(".check_hnos2").prop('disabled', false); 
      $(".check_pers2").prop('disabled', false);



            $(".check_madre3").prop('disabled', false); 
          $(".check_padre3").prop('disabled', false); 
		 $(".check_hnos3").prop('disabled', false); 
      $(".check_pers3").prop('disabled', false);
	  
	  
	        $(".check_madre4").prop('disabled', false); 
          $(".check_padre4").prop('disabled', false); 
		 $(".check_hnos4").prop('disabled', false); 
      $(".check_pers4").prop('disabled', false);
	  
	  
	       $(".check_madre5").prop('disabled', false); 
          $(".check_padre5").prop('disabled', false); 
		 $(".check_hnos5").prop('disabled', false); 
      $(".check_pers5").prop('disabled', false);
	  
	  
	       $(".check_madre6").prop('disabled', false); 
          $(".check_padre6").prop('disabled', false); 
		 $(".check_hnos6").prop('disabled', false); 
      $(".check_pers6").prop('disabled', false);
	  
	  
	  $(".check_madre7").prop('disabled', false); 
          $(".check_padre7").prop('disabled', false); 
		 $(".check_hnos7").prop('disabled', false); 
      $(".check_pers7").prop('disabled', false);
	  
	  
	  $(".check_madre8").prop('disabled', false); 
          $(".check_padre8").prop('disabled', false); 
		 $(".check_hnos8").prop('disabled', false); 
      $(".check_pers8").prop('disabled', false);
	  
	  $(".check_madre9").prop('disabled', false); 
          $(".check_padre9").prop('disabled', false); 
		 $(".check_hnos9").prop('disabled', false); 
      $(".check_pers9").prop('disabled', false);
	  
	  $(".check_madre10").prop('disabled', false); 
          $(".check_padre10").prop('disabled', false); 
		 $(".check_hnos10").prop('disabled', false); 
      $(".check_pers10").prop('disabled', false);
	  
	   $(".check_madre11").prop('disabled', false); 
          $(".check_padre11").prop('disabled', false); 
		 $(".check_hnos11").prop('disabled', false); 
      $(".check_pers11").prop('disabled', false);
	  
	   $(".check_madre12").prop('disabled', false); 
          $(".check_padre12").prop('disabled', false); 
		 $(".check_hnos12").prop('disabled', false); 
      $(".check_pers12").prop('disabled', false);
	  
	   $(".check_madre13").prop('disabled', false); 
          $(".check_padre13").prop('disabled', false); 
		 $(".check_hnos13").prop('disabled', false); 
      $(".check_pers13").prop('disabled', false);
	  
	   $(".check_madre14").prop('disabled', false); 
          $(".check_padre14").prop('disabled', false); 
		 $(".check_hnos14").prop('disabled', false); 
      $(".check_pers14").prop('disabled', false);
	  
	   $(".check_madre15").prop('disabled', false); 
          $(".check_padre15").prop('disabled', false); 
		 $(".check_hnos15").prop('disabled', false); 
      $(".check_pers15").prop('disabled', false);
	  
           $(".check_madre16").prop('disabled', false); 
          $(".check_padre16").prop('disabled', false); 
		 $(".check_hnos16").prop('disabled', false); 
      $(".check_pers16").prop('disabled', false);
	  
	  
	  $(".check_madre17").prop('disabled', false); 
          $(".check_padre17").prop('disabled', false); 
		 $(".check_hnos17").prop('disabled', false); 
      $(".check_pers17").prop('disabled', false);

	}
//---------------------------- set all checked checkbox count
		$("#select_count").html($("input.emp_checkbox:checked").length+" ");
	});
	
	
	// ---------------------------------------set particular checked checkbox count
	$(".emp_checkbox").on('click', function(e) {
		$("#select_count").html($("input.emp_checkbox:not(:checked)").length+" ");
		
	});
	//---------------------------------------------------
	jQuery('#select_all').on('click', function(e) {
		if($(this).is(':checked',true)) {
			$(".emp_checkbox").prop('checked', true);
			$(".text-marquo").prop('disabled', true);
						
		}  
		else {  
			$(".emp_checkbox").prop('checked',false);
            $(".text-marquo").prop('disabled', false);
            $("#otros").prop('disabled', false);	
		}		
		// set all checked checkbox count
		$("#select_count 2").html($("input.emp_checkbox:checked").length+" Seleccionada (s)");
	});
	// set particular checked checkbox count
	$(".emp_checkbox").on('click', function(e) {
		$("#select_count2").html($("input.emp_checkbox:checked").length+" Seleccionada (s)");
	});
	
	jQuery('.emp_checkbox').on('click', function(e) {
		if($(this).is(':checked',true)) {
			$("#otros").prop('disabled', true);
		}  
		else {  
			$("#otros").prop('disabled', false);	
		}
	}
	);
	//------------------------------------------------------------
	$(".niguno_checked1").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre").prop('disabled', true); 
          $(".check_padre").prop('disabled', true); 
		 $(".check_hnos").prop('disabled', true); 
      $(".check_pers").prop('disabled', true); 
            $(".check_madre").prop('checked', false); 
          $(".check_padre").prop('checked', false); 
		 $(".check_hnos").prop('checked', false); 
       $(".check_pers").prop('checked', false);
     $("#car_text").prop('disabled', true);
   $("#car_text").val('');	 
		}  
		else {  
			$(".check_madre").prop('disabled', false); 
          $(".check_padre").prop('disabled', false); 
		 $(".check_hnos").prop('disabled', false); 
      $(".check_pers").prop('disabled', false);
    $("#car_text").prop('disabled', false);	  
		}
	});
	
	//---------------------------------------------------------------
	$(".niguno_checked2").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre2").prop('disabled', true); 
          $(".check_padre2").prop('disabled', true); 
		 $(".check_hnos2").prop('disabled', true); 
      $(".check_pers2").prop('disabled', true); 
            $(".check_madre2").prop('checked', false); 
          $(".check_padre2").prop('checked', false); 
		 $(".check_hnos2").prop('checked', false); 
       $(".check_pers2").prop('checked', false); 
     $("#hip_text").prop('disabled', true);
   $("#hip_text").val('');	   
	}  
		else {  
			$(".check_madre2").prop('disabled', false); 
          $(".check_padre2").prop('disabled', false); 
		 $(".check_hnos2").prop('disabled', false); 
      $(".check_pers2").prop('disabled', false);
    $("#hip_text").prop('disabled', false);		  
		}
	});

	//-----------------------------------------------------------------
		$(".niguno_checked3").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre3").prop('disabled', true); 
          $(".check_padre3").prop('disabled', true); 
		 $(".check_hnos3").prop('disabled', true); 
      $(".check_pers3").prop('disabled', true); 
            $(".check_madre3").prop('checked', false); 
          $(".check_padre3").prop('checked', false); 
		 $(".check_hnos3").prop('checked', false); 
       $(".check_pers3").prop('checked', false); 
     $("#ec_text").prop('disabled', true);
   $("#ec_text").val('');	   
		}  
		else {  
			$(".check_madre3").prop('disabled', false); 
          $(".check_padre3").prop('disabled', false); 
		 $(".check_hnos3").prop('disabled', false); 
      $(".check_pers3").prop('disabled', false);
    $("#ec_text").prop('disabled', false);	  
		}
	});
	
	//-----------------------------------------------------------------
	
	$(".niguno_checked4").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre4").prop('disabled', true); 
          $(".check_padre4").prop('disabled', true); 
		 $(".check_hnos4").prop('disabled', true); 
      $(".check_pers4").prop('disabled', true); 
            $(".check_madre4").prop('checked', false); 
          $(".check_padre4").prop('checked', false); 
		 $(".check_hnos4").prop('checked', false); 
       $(".check_pers4").prop('checked', false);
    $("#ep_text").prop('disabled', true);
   $("#ep_text").val('');	   
		}  
		else {  
			$(".check_madre4").prop('disabled', false); 
          $(".check_padre4").prop('disabled', false); 
		 $(".check_hnos4").prop('disabled', false); 
      $(".check_pers4").prop('disabled', false);
    $("#ep_text").prop('disabled', false);		  
		}
	});
	
	//----------------------------------------------------------------------------------
	
	$(".niguno_checked5").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre5").prop('disabled', true); 
          $(".check_padre5").prop('disabled', true); 
		 $(".check_hnos5").prop('disabled', true); 
      $(".check_pers5").prop('disabled', true); 
            $(".check_madre5").prop('checked', false); 
          $(".check_padre5").prop('checked', false); 
		 $(".check_hnos5").prop('checked', false); 
       $(".check_pers5").prop('checked', false); 
    $("#as_text").prop('disabled', true);
   $("#as_text").val('');	   
		}  
		else {  
			$(".check_madre5").prop('disabled', false); 
          $(".check_padre5").prop('disabled', false); 
		 $(".check_hnos5").prop('disabled', false); 
      $(".check_pers5").prop('disabled', false); 
    $("#as_text").prop('disabled', false);		  
		}
	});
	
	
		$(".niguno_checked05").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre05").prop('disabled', true); 
          $(".check_padre05").prop('disabled', true); 
		 $(".check_hnos05").prop('disabled', true); 
      $(".check_pers05").prop('disabled', true); 
            $(".check_madre05").prop('checked', false); 
          $(".check_padre05").prop('checked', false); 
		 $(".check_hnos05").prop('checked', false); 
       $(".check_pers05").prop('checked', false); 
    $("#enre_text").prop('disabled', true);
   $("#enre_text").val('');	   
		}  
		else {  
			$(".check_madre05").prop('disabled', false); 
          $(".check_padre05").prop('disabled', false); 
		 $(".check_hnos05").prop('disabled', false); 
      $(".check_pers05").prop('disabled', false); 
    $("#enre_text").prop('disabled', false);		  
		}
	});
	
	
	
	
	
	
	
	
	
	$(".niguno_checked6").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre6").prop('disabled', true); 
          $(".check_padre6").prop('disabled', true); 
		 $(".check_hnos6").prop('disabled', true); 
      $(".check_pers6").prop('disabled', true); 
            $(".check_madre6").prop('checked', false); 
          $(".check_padre6").prop('checked', false); 
		 $(".check_hnos6").prop('checked', false); 
       $(".check_pers6").prop('checked', false);
    $("#tub_text").prop('disabled', true);
   $("#tub_text").val('');	   
		}  
		else {  
			$(".check_madre6").prop('disabled', false); 
          $(".check_padre6").prop('disabled', false); 
		 $(".check_hnos6").prop('disabled', false); 
      $(".check_pers6").prop('disabled', false); 
    $("#tub_text").prop('disabled', false);		  
		}
	});
	
	//-----------------------------------------------------
	
	$(".niguno_checked7").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre7").prop('disabled', true); 
          $(".check_padre7").prop('disabled', true); 
		 $(".check_hnos7").prop('disabled', true); 
      $(".check_pers7").prop('disabled', true); 
            $(".check_madre7").prop('checked', false); 
          $(".check_padre7").prop('checked', false); 
		 $(".check_hnos7").prop('checked', false); 
       $(".check_pers7").prop('checked', false);
    $("#dia_text").prop('disabled', true);
   $("#dia_text").val('');	   
		}  
		else {  
			$(".check_madre7").prop('disabled', false); 
          $(".check_padre7").prop('disabled', false); 
		 $(".check_hnos7").prop('disabled', false); 
      $(".check_pers7").prop('disabled', false); 
    $("#dia_text").prop('disabled', false);		  
		}
	});
	
	//-----------------------------------------------------
	$(".niguno_checked8").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre8").prop('disabled', true); 
          $(".check_padre8").prop('disabled', true); 
		 $(".check_hnos8").prop('disabled', true); 
      $(".check_pers8").prop('disabled', true); 
            $(".check_madre8").prop('checked', false); 
          $(".check_padre8").prop('checked', false); 
		 $(".check_hnos8").prop('checked', false); 
       $(".check_pers8").prop('checked', false);
    $("#tir_text").prop('disabled', true);
   $("#tir_text").val('');	   
		}  
		else {  
			$(".check_madre8").prop('disabled', false); 
          $(".check_padre8").prop('disabled', false); 
		 $(".check_hnos8").prop('disabled', false); 
      $(".check_pers8").prop('disabled', false);
    $("#tir_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------------
	$(".niguno_checked9").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre9").prop('disabled', true); 
          $(".check_padre9").prop('disabled', true); 
		 $(".check_hnos9").prop('disabled', true); 
      $(".check_pers9").prop('disabled', true); 
            $(".check_madre9").prop('checked', false); 
          $(".check_padre9").prop('checked', false); 
		 $(".check_hnos9").prop('checked', false); 
       $(".check_pers9").prop('checked', false); 
	 $("#hep_tipo").prop('disabled', true);
    $("#hep_text").prop('disabled', true);
   $("#hep_text").val('');	   
		}  
		else {  
			$(".check_madre9").prop('disabled', false); 
          $(".check_padre9").prop('disabled', false); 
		 $(".check_hnos9").prop('disabled', false); 
       $(".check_pers9").prop('disabled', false);
     $("#hep_tipo").prop('disabled', false);	  
    $("#hep_text").prop('disabled', false);		  
		}
	});
	
	//----------------------------------------------------------
	$(".niguno_checked10").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre10").prop('disabled', true); 
          $(".check_padre10").prop('disabled', true); 
		 $(".check_hnos10").prop('disabled', true); 
      $(".check_pers10").prop('disabled', true); 
            $(".check_madre10").prop('checked', false); 
          $(".check_padre10").prop('checked', false); 
		 $(".check_hnos10").prop('checked', false); 
       $(".check_pers10").prop('checked', false);
    $("#enfr_text").prop('disabled', true);
   $("#enfr_text").val('');	   
		}  
		else {  
			$(".check_madre10").prop('disabled', false); 
          $(".check_padre10").prop('disabled', false); 
		 $(".check_hnos10").prop('disabled', false); 
      $(".check_pers10").prop('disabled', false);
    $("#enfr_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------
	$(".niguno_checked11").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre11").prop('disabled', true); 
          $(".check_padre11").prop('disabled', true); 
		 $(".check_hnos11").prop('disabled', true); 
      $(".check_pers10").prop('disabled', true); 
            $(".check_madre11").prop('checked', false); 
          $(".check_padre11").prop('checked', false); 
		 $(".check_hnos11").prop('checked', false); 
       $(".check_pers11").prop('checked', false);
    $("#falc_text").prop('disabled', true);
   $("#falc_text").val('');	   
		}  
		else {  
			$(".check_madre11").prop('disabled', false); 
          $(".check_padre11").prop('disabled', false); 
		 $(".check_hnos11").prop('disabled', false); 
      $(".check_pers11").prop('disabled', false); 
    $("#falc_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------
	
	$(".niguno_checked12").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre12").prop('disabled', true); 
          $(".check_padre12").prop('disabled', true); 
		 $(".check_hnos12").prop('disabled', true); 
      $(".check_pers12").prop('disabled', true); 
            $(".check_madre12").prop('checked', false); 
          $(".check_padre12").prop('checked', false); 
		 $(".check_hnos12").prop('checked', false); 
       $(".check_pers12").prop('checked', false);
    $("#neop_text").prop('disabled', true);
   $("#neop_text").val('');	   
		}  
		else {  
			$(".check_madre12").prop('disabled', false); 
          $(".check_padre12").prop('disabled', false); 
		 $(".check_hnos12").prop('disabled', false); 
      $(".check_pers12").prop('disabled', false);
    $("#neop_text").prop('disabled', false);		  
		}
	});
	//-------------------------------------------------------
	
	$(".niguno_checked13").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre13").prop('disabled', true); 
          $(".check_padre13").prop('disabled', true); 
		 $(".check_hnos13").prop('disabled', true); 
      $(".check_pers13").prop('disabled', true); 
            $(".check_madre13").prop('checked', false); 
          $(".check_padre13").prop('checked', false); 
		 $(".check_hnos13").prop('checked', false); 
       $(".check_pers13").prop('checked', false); 
    $("#psi_text").prop('disabled', true);
   $("#psi_text").val('');	   
		}  
		else {  
			$(".check_madre13").prop('disabled', false); 
          $(".check_padre13").prop('disabled', false); 
		 $(".check_hnos13").prop('disabled', false); 
      $(".check_pers13").prop('disabled', false); 
    $("#psi_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------
	$(".niguno_checked14").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre14").prop('disabled', true); 
          $(".check_padre14").prop('disabled', true); 
		 $(".check_hnos14").prop('disabled', true); 
      $(".check_pers14").prop('disabled', true); 
            $(".check_madre14").prop('checked', false); 
          $(".check_padre14").prop('checked', false); 
		 $(".check_hnos14").prop('checked', false); 
       $(".check_pers14").prop('checked', false);
    $("#obs_text").prop('disabled', true);
   $("#obs_text").val('');	   
		}  
		else {  
			$(".check_madre14").prop('disabled', false); 
          $(".check_padre14").prop('disabled', false); 
		 $(".check_hnos14").prop('disabled', false); 
      $(".check_pers14").prop('disabled', false);
    $("#obs_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------
	$(".niguno_checked15").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre15").prop('disabled', true); 
          $(".check_padre15").prop('disabled', true); 
		 $(".check_hnos15").prop('disabled', true); 
      $(".check_pers15").prop('disabled', true); 
            $(".check_madre15").prop('checked', false); 
          $(".check_padre15").prop('checked', false); 
		 $(".check_hnos15").prop('checked', false); 
       $(".check_pers15").prop('checked', false);
    $("#ulp_text").prop('disabled', true);
   $("#ulp_text").val('');	   
		}  
		else {  
			$(".check_madre15").prop('disabled', false); 
          $(".check_padre15").prop('disabled', false); 
		 $(".check_hnos15").prop('disabled', false); 
      $(".check_pers15").prop('disabled', false);
    $("#ulp_text").prop('disabled', false);		  
		}
	});
	
	//-------------------------------------------------------
	$(".niguno_checked16").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre16").prop('disabled', true); 
          $(".check_padre16").prop('disabled', true); 
		 $(".check_hnos16").prop('disabled', true); 
      $(".check_pers16").prop('disabled', true); 
            $(".check_madre16").prop('checked', false); 
          $(".check_padre16").prop('checked', false); 
		 $(".check_hnos16").prop('checked', false); 
       $(".check_pers16").prop('checked', false);
    $("#art_text").prop('disabled', true);
   $("#art_text").val('');	   
		}  
		else {  
			$(".check_madre16").prop('disabled', false); 
          $(".check_padre16").prop('disabled', false); 
		 $(".check_hnos16").prop('disabled', false); 
      $(".check_pers16").prop('disabled', false);
    $("#art_text").prop('disabled', false);		  
		}
	});
	//------------------------------------------------------
		$(".niguno_checked016").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre016").prop('disabled', true); 
          $(".check_padre016").prop('disabled', true); 
		 $(".check_hnos016").prop('disabled', true); 
      $(".check_pers016").prop('disabled', true); 
            $(".check_madre016").prop('checked', false); 
          $(".check_padre016").prop('checked', false); 
		 $(".check_hnos016").prop('checked', false); 
       $(".check_pers016").prop('checked', false);
    $("#hem_text").prop('disabled', true);
   $("#hem_text").val('');	   
		}  
		else {  
			$(".check_madre016").prop('disabled', false); 
          $(".check_padre016").prop('disabled', false); 
		 $(".check_hnos016").prop('disabled', false); 
      $(".check_pers016").prop('disabled', false);
    $("#hem_text").prop('disabled', false);		  
		}
	});
	//------------------------------------------------------
	$(".niguno_checked17").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$(".check_madre17").prop('disabled', true); 
          $(".check_padre17").prop('disabled', true); 
		 $(".check_hnos17").prop('disabled', true); 
      $(".check_pers17").prop('disabled', true); 
            $(".check_madre17").prop('checked', false); 
          $(".check_padre17").prop('checked', false); 
		 $(".check_hnos17").prop('checked', false); 
       $(".check_pers17").prop('checked', false);
    $("#zika_text").prop('disabled', true);
   $("#zika_text").val('');	   
		}  
		else {  
			$(".check_madre17").prop('disabled', false); 
          $(".check_padre17").prop('disabled', false); 
		 $(".check_hnos17").prop('disabled', false); 
      $(".check_pers17").prop('disabled', false);
    $("#zika_text").prop('disabled', false);		  
		}
	});
	//====================================================================================
  $('#bt').click(function(){
   id = $(this).attr('title');
   txt = $(this).text();
   if (txt == 'Ocultar'){
  
     $(this).text('Mostrar');
	 $("section").css("margin-top", "100px");
   }
   else{
      $(this).text('Ocultar');
	  $("section").css("margin-top", "180px");
   }
   $("#"+id).toggle("slide");
   

  })

});
 $("#bt").submit(function(e){
        e.preventDefault();
    });
	
	
	
//validation Indicaciones medicas

$(document).ready(function() {
$('#saveIndicacionesMedicales').click(function(e) {
	//grab variables
 var medicamento = $("#medicamento").val();
 var frecuencia = $("#frecuencia").val();
   var cantidad = $("#cantidad").val();
var via = $("#via").val();
 var farmacia = $("#farmacia").val();

//set conditions
  if($("#medicamento").val() == "" ){
   $("#medicamento").focus();
   $('#medicamento').css('border-color', 'red'); 
   $("#errorBox").html("Selecciona el medicamento");
   return false;
  } if($("#frecuencia").val() == "" ){
    $("#frecuencia").focus();
	$('#frecuencia').css('border-color', 'red'); 
    $("#errorBox").html("Selecciona la frecuencia");
    return false;
  } 
    if($('#cantidad').val() == ""){
    $("#cantidad").focus();
	$('#cantidad').css('border-color', 'red'); 
    $("#errorBox").html("Selecciona la cantidad");
    return false;
  }
  
  if($("#via").val() == "" ){
    $("#via").focus();
	$('#via').css('border-color', 'red'); 
    $("#errorBox").html("Selecciona el campo : via");
    return false;
  } if($('#farmacia').val() == ""){
    $("#farmacia").focus();
	$('#farmacia').css('border-color', 'red'); 
    $("#errorBox").html("Selecciona la farmacia");
    return false;
  } 
  
     
});
});


//return field border color to initial on select

$(document).ready(function() {
     $('#medicamento').change(function() {

                var select = $(this);

                if( select.val() != "" ) {
                  select.css( "border", "1px solid #38a7bb" );
				   
                }   
            });
   });
   
    
   $(document).ready(function() {
     $('#frecuencia').change(function() {

                var select = $(this);

                if( select.val() != "" ) {
                  select.css( "border", "1px solid #38a7bb" );
                }   
            });
   });
   
   
    $(document).ready(function() {
     $('#cantidad').change(function() {

                var select = $(this);

                if( select.val() != "" ) {
                  select.css( "border", "1px solid #38a7bb" );
                }   
            });
			 });
			 
			 
			$(document).ready(function() {
     $('#via').change(function() {

                var select = $(this);

                if( select.val() != "" ) {
                  select.css( "border", "1px solid #38a7bb" );
                }   
            });
			 });
			 
			 
		$(document).ready(function() {
     $('#farmacia').change(function() {

                var select = $(this);

                if( select.val() != "" ) {
                  select.css( "border", "1px solid #38a7bb" );
                }   
            });
			
			 });
			 
//chosen select
			 
$(".chosen-select").chosen({
no_results_text: "Oops, nada encontrado por : "
})

//handle check infancia
$('.checkininfancia').change(function() {
    if ($('.checkininfancia:not(:checked)').length) {
        $('#infancia').prop('disabled', true);
		// $('input:checkbox').not('.checkininfancia').prop('disabled', true);
		$(".act_inf").hide();
		$(".dea_inf").show();
    } else {
		//$('input:checkbox').not('.checkininfancia').prop('disabled', true);
        $('#infancia').prop('disabled', false);
		$(".act_inf").show();
		$(".dea_inf").hide();
    }
});



//handle check adolencencia
$('.checkin_adol').change(function() {
    if ($('.checkin_adol:checked').length) {
        $('#adolescencia').prop('disabled', false);
		//$('input:checkbox').not('.checkin_adol').prop('disabled', true);
		$(".act_adol").hide();
		$(".dea_adol").show();
    } else {
        $('#adolescencia').prop('disabled', true);
		$(".act_adol").show();
		$(".dea_adol").hide();
    }
});



//handle check adultez
$('.checkin_adultez').change(function() {
    if ($('.checkin_adultez:checked').length) {
        $('#adultez').prop('disabled', false);
		//$('input:checkbox').not('.checkin_adultez').prop('disabled', true);
		$(".act_adul").hide();
		$(".dea_adul").show();
    } else {
        $('#adultez').prop('disabled', true);
		$(".act_adul").show();
		$(".dea_adul").hide();
    }
});			 

//handle check adultez
$('.checkin_fami').change(function() {
    if ($('.checkin_fami:checked').length) {
        $('#familiares').prop('disabled', false);
		//$('input:checkbox').not('.checkin_fami').prop('disabled', true);
		$(".act_fam").hide();
		$(".dea_fam").show();
    } else {
        $('#familiares').prop('disabled', true);
		$(".act_fam").show();
		$(".dea_fam").hide();
    }
});





//Medicamentos Habituales
$('.checkin_medh').change(function() {
    if ($('.checkin_medh:checked').length) {
        $('#medicamentos_hab').prop('disabled', false);
		$(".act_medh").hide();
		$(".dea_medh").show();
    } else {
        $('#medicamentos_hab').prop('disabled', true);
		$(".act_medh").show();
		$(".dea_medh").hide();
    }
});





//Traumatismo
$('.checkin_trau').change(function() {
    if ($('.checkin_trau:checked').length) {
        $('#traumatismo').prop('disabled', false);
		$(".act_trau").hide();
		$(".dea_trau").show();
    } else {
        $('#traumatismo').prop('disabled', true);
		$(".act_trau").show();
		$(".dea_trau").hide();
    }
});


//-------------------------hadle examenes textarea

$('.check_neuro').change(function() {
    if ($('.check_neuro:checked').length) {
        $('#neurologico').prop('disabled', true);
		
    } else {
        $('#neurologico').prop('disabled', false);
		
    }
});

$('.check_abdo').change(function() {
    if ($('.check_abdo:checked').length) {
        $('#abdomen').prop('disabled', true);
		
    } else {
        $('#abdomen').prop('disabled', false);
		
    }
});



$('.check_cabe').change(function() {
    if ($('.check_cabe:checked').length) {
        $('#cabeza').prop('disabled', true);
		
    } else {
        $('#cabeza').prop('disabled', false);
		
    }
});


$('.check_pelvi').change(function() {
    if ($('.check_pelvi:checked').length) {
        $('#pelvica').prop('disabled', true);
		
    } else {
        $('#pelvica').prop('disabled', false);
		
    }
});



$('.check_evali').change(function() {
    if ($('.check_evali:checked').length) {
        $('#evaluacion_mama').prop('disabled', true);
		
    } else {
        $('#evaluacion_mama').prop('disabled', false);
		
    }
});


$('.check_insp').change(function() {
    if ($('.check_insp:checked').length) {
        $('#inspeccion_genital').prop('disabled', true);
		
    } else {
        $('#inspeccion_genital').prop('disabled', false);
		
    }
});


$('.check_torax').change(function() {
    if ($('.check_torax:checked').length) {
        $('#torax').prop('disabled', true);
		
    } else {
        $('#torax').prop('disabled', false);
		
      }
});

$('.check_columna').change(function() {
    if ($('.check_columna:checked').length) {
        $('#columna_dorsal').prop('disabled', true);
		
    } else {
        $('#columna_dorsal').prop('disabled', false);
		
      }
});

$('.check_corazon').change(function() {
    if ($('.check_corazon:checked').length) {
        $('#corazon').prop('disabled', true);
		
    } else {
        $('#corazon').prop('disabled', false);
		
      }
});

$('.check_ext').change(function() {
    if ($('.check_ext:checked').length) {
        $('#extremidades').prop('disabled', true);
		
    } else {
        $('#extremidades').prop('disabled', false);
		
      }
});

$('.check_pulm').change(function() {
    if ($('.check_pulm:checked').length) {
        $('#pulmones').prop('disabled', true);
		
    } else {
        $('#pulmones').prop('disabled', false);
		
      }
});

$('.check_otros').change(function() {
    if ($('.check_otros:checked').length) {
        $('#otros').prop('disabled', true);
		
    } else {
        $('#otros').prop('disabled', false);
		
      }
});

//----------------------------Desarollo-------------------------

jQuery("input[name='grueso']").on('click', function(e) {
		if($('.chkNo').is(':checked')) {
			$(".ref-neurologia-text").text('Alert : Referir a neurologia');
			 $(".ref-neurologia-text").slideDown();
			 $(".triangle-1").slideDown();
			 for(i=0;i<100;i++) {
             $(".triangle-1").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
             };
			 $('.text-grueso').prop('disabled', false);
		}
		else{
			$(".ref-neurologia-text").slideUp();
			 $(".triangle-1").stop(true);
			$(".triangle-1").slideUp();
			$('.text-grueso').prop('disabled', true);
			
		}
		
});

//-------------------------
jQuery("input[name='fino']").on('click', function(e) {
		if($('.chkNo2').is(':checked')) {
			$(".ref-neurologia-text").text('Alert : Referir a neurologia');
			 $(".ref-neurologia-text").slideDown();
			 $(".triangle-2").slideDown();
			 for(i=0;i<100;i++) {
             $(".triangle-2").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
             };
			  $('.text-fino').prop('disabled', false);
		}
		else{
			$(".ref-neurologia-text").slideUp();
			 $(".triangle-2").stop(true);
			$(".triangle-2").slideUp();
			$('.text-fino').prop('disabled', true);
			
		}
		
});


//-------------------------
jQuery("input[name='lenguage']").on('click', function(e) {
		if($('.chkNo3').is(':checked')) {
			$(".ref-neurologia-text").text('Alert : Referir a neurologia');
			 $(".ref-neurologia-text").slideDown();
			 $(".triangle-3").slideDown();
			 for(i=0;i<100;i++) {
             $(".triangle-3").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
             };
			  $('.text-lenguage').prop('disabled', false);
		}
		else{
			$(".ref-neurologia-text").slideUp();
			 $(".triangle-3").stop(true);
			$(".triangle-3").slideUp();
			$('.text-lenguage').prop('disabled', true);
			
		}
		
});

//------------------------------------------------------------
jQuery("input[name='social']").on('click', function(e) {
		if($('.chkNo4').is(':checked')) {
			$(".ref-neurologia-text").text('Alert : Referir a neurologia');
			 $(".ref-neurologia-text").slideDown();
			 $(".triangle-4").slideDown();
			 for(i=0;i<100;i++) {
             $(".triangle-4").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
             };
			  $('.text-social').prop('disabled', false);
		}
		else{
			$(".ref-neurologia-text").slideUp();
			 $(".triangle-4").stop(true);
			$(".triangle-4").slideUp();
			$('.text-social').prop('disabled', true);
			
		}
		
});




