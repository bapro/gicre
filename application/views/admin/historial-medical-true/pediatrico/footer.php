 <script  src="<?=base_url();?>assets/js/pediatrico_footer.js" charset="UTF-8"></script>
<script>
$("#loadf").hide();


$('#edit_ped').click(function() {
	$(this).hide();
	$("#save_ant_ped").show();
	$(".disable-all :input").not(".do-not-disable-me").prop("disabled", false);
	$('table#disab-vacu input[type=checkbox]').prop('disabled',false);
})

$(document).ready(function() {
  $("input[name='desco_peso_al_nacer']").click(function(){          
       if ($(this).is(':checked')) { 
$("#peso_al_nacer").prop("disabled", false);
	   } else{
		   $("#peso_al_nacer").prop("disabled", true);
		   $("#peso_al_nacer").val("");
	   }
   });
   
  

  $("input[name='desco_talla_al_nacer']").click(function(){          
       if ($(this).is(':checked')) { 
$("#talla_al_nacer").prop("disabled", false);
	   } else{
		   $("#talla_al_nacer").prop("disabled", true);
		   $("#talla_al_nacer").val("");
	   }
   });
   


$(".disable-all :input").not(".except-me :input").prop("disabled", true);  
$('table#disab-vacu input[type=checkbox]').prop('disabled',true);
//$(".hide-ant-save").show();




 $(".medica1").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});
	
	
$('.no_ah').hide();

//----------------------------------------------------------
jQuery("input[name='mf11']").on('click', function(e) {
if($('.chkYes5').is(':checked')) {

$('.text-maltrato').prop('disabled', false);
}
else{
$('.text-maltrato').prop('disabled', true);
$('.text-maltrato').val('');
}
});


jQuery("input[name='abs1']").on('click', function(e) {
if($('.chkYes6').is(':checked')) {

$('.text-abuso').prop('disabled', false);
}
else{
$('.text-abuso').prop('disabled', true);
$('.text-abuso').val('');
}
});


jQuery("input[name='neg1']").on('click', function(e) {
if($('.chkYes7').is(':checked')) {

$('.text-neg').prop('disabled', false);
}
else{
$('.text-neg').prop('disabled', true);
$('.text-neg').val('');
}
});



jQuery("input[name='mem1']").on('click', function(e) {
if($('.chkYes8').is(':checked')) {

$('.maltrato-emo').prop('disabled', false);
}
else{
$('.maltrato-emo').prop('disabled', true);
$('.maltrato-emo').val('');

}
});




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
$('.text-grueso').val('');
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
$('.text-fino').val('');
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
$('.text-lenguage').val('');
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
$('.text-social').val('');
}

});
$('input[name="fecha_nac2"]').mask('00/00/0000', {placeholder: '--/--/----'});
//===========================================================
$('.form_date').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f1",
    });
//======fecha 2=============================
$('.form_date2').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f2",
    });
	
	//======fecha 3=============================
$('.form_date3').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f3",
    });
	
	
		
	//======fecha 4=============================
$('.form_date4').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f4",
    });
	
	
		//======fecha 5=============================
$('.form_date5').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f5",
    });
	
	
			//======fecha 6=============================
$('.form_date6').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f6",
    });
	
//======fecha 7=============================
$('.form_date7').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f7",
    });
	
	//======fecha 8=============================
$('.form_date8').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f8",
    });
	
	
	//======fecha 7=============================
$('.form_date9').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f9",
    });
	
	
		
	//======fecha 10=============================
$('.form_date10').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f10",
    });
	
		//======fecha 11=============================
$('.form_date11').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f11",
    });
	
		//======fecha 10=============================
$('.form_date12').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f12",
    });
		//======fecha 10=============================
$('.form_date13').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f13",
    });
	
			//======fecha 14=============================
$('.form_date14').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f14",
    });
	
				//======fecha 15=============================
$('.form_date15').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f15",
    });
	
			//======fecha 16=============================
$('.form_date16').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f16",
    });
	
//======fecha 17=============================
$('.form_date17').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f17",
    });
	
//======fecha 18=============================
$('.form_date18').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "mirror_f18",
    });
//----------------------------------------------
 
//$('#cal_vacuna').on('click', function() {

$('.no_ah').slideDown();
//$('.no_ap').prop('disabled', false);
var insert_d = $('#insert_d').val();
$('.bcg').val(insert_d);

//=====1era. Dosis Rota====================================
var mirror_field = $("#mirror_field").val();
var mom = moment(mirror_field);
var mom1 = moment(mom).add('months', 2); 
var dosis1 = moment(mom1).format('D MMMM YYYY');
var dosiss = moment(mom1);
$('.yel').val(dosis1);
$('#mirror_d3').val(dosiss);

//=====1era. Dosis Polio====================================
$('#mirror_d10').val(dosiss);

//=====2era. Dosis Rota====================================

$('#mirror_d5').val(dosiss);

//=====1era. Dosis Neu====================================

$('#mirror_d13').val(dosiss);

//=====2da. Dosis====================================
var mom2 = moment(mom).add('months', 4); 
var dosis2 = moment(mom2).format('D MMMM YYYY');
var dosiss2 = moment(mom2);
$('.bl').val(dosis2);
$('#mirror_d4').val(dosiss2);
$('#mirror_d6').val(dosiss2);
$('#mirror_d11').val(dosiss2);
$('#mirror_d14').val(dosiss2);
//=====3da. Dosis====================================
var mom3 = moment(mirror_field).add('months', 8); 
var dosis3 = moment(mom3).format('D MMMM YYYY');
$('.gr').val(dosis3);
var dosisss = moment(mom3);
$('#mirror_d7').val(dosisss);
$('#mirror_d12').val(dosisss);
//=====1era. Refuerzo====================================
var mom4 = moment(mirror_field).add('months', 18); 
var ref1 = moment(mom4).format('D MMMM YYYY');
$('.bll').val(ref1);
$('#mirror_d8').val(mom4);
$('#mirror_d15').val(mom4);
$('#mirror_d17').val(mom4);
//=====2do. Refuerzo====================================
var mom5 = moment(mirror_field).add('years', 4); 
var ref2 = moment(mom5).format('D MMMM YYYY');
$('.grr').val(ref2);
var dosissss = moment(mom5);
$('#mirror_d9').val(dosissss);
$('#mirror_d18').val(dosissss);
//=====SRP====================================
var mom6 = moment(mirror_field).add('years', 1); 
var srp = moment(mom6).format('D MMMM YYYY');
$('#bcg16').val(srp);
var dosiss = moment(mom6);
$('#mirror_d16').val(dosiss);
//})


//--------------fecha aplicada1--------------------------------------------
$(".form_date").on('change', function (e) {
$('#atras1').slideDown();	
var mirror_f1 = $('#mirror_f1').val();
var mirror_bcg1 = $('#mirror_bcg1').val(); 
var date1 = moment(mirror_f1);
var date2 = moment(mirror_bcg1);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf11").val(diffInMinutes);	 
})

//--------------fecha aplicada2--------------------------------------------
$(".form_date2").on('change', function (e) {
$('#atras2').slideDown();	
var mirror_f2 = $('#mirror_f2').val();
var mirror_bcg2 = $('#mirror_bcg2').val(); 
var date1 = moment(mirror_f2);
var date2 = moment(mirror_bcg2);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf21").val(diffInMinutes);	 
})


//--------------fecha aplicada3--------------------------------------------
$(".form_date3").on('change', function (e) {
$('#atras3').slideDown();	
var mirror_f3 = $('#mirror_f3').val();
var mirror_d3 = $('#mirror_d3').val(); 
var date1 = moment(mirror_f3);
var date2 = moment(mirror_d3);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf31").val(diffInMinutes);	 
})

//--------------fecha aplicada4--------------------------------------------
$(".form_date4").on('change', function (e) {
$('#atras4').slideDown();	
var mirror_f4 = $('#mirror_f4').val();
var mirror_d4 = $('#mirror_d4').val(); 
var date1 = moment(mirror_f4);
var date2 = moment(mirror_d4);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf41").val(diffInMinutes);	 
})

//--------------fecha aplicada5--------------------------------------------
$(".form_date5").on('change', function (e) {
$('#atras5').slideDown();	
var mirror_f5 = $('#mirror_f5').val();
var mirror_d5 = $('#mirror_d5').val(); 
var date1 = moment(mirror_f5);
var date2 = moment(mirror_d5);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf51").val(diffInMinutes);	 
})

//--------------fecha aplicada6--------------------------------------------
$(".form_date6").on('change', function (e) {
$('#atras6').slideDown();	
var mirror_f6 = $('#mirror_f6').val();
var mirror_d6 = $('#mirror_d6').val(); 
var date1 = moment(mirror_f6);
var date2 = moment(mirror_d6);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf61").val(diffInMinutes);	 
})


//--------------fecha aplicada7--------------------------------------------
$(".form_date7").on('change', function (e) {
$('#atras7').slideDown();	
var mirror_f7 = $('#mirror_f7').val();
var mirror_d7 = $('#mirror_d7').val(); 
var date1 = moment(mirror_f7);
var date2 = moment(mirror_d7);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf71").val(diffInMinutes);	 
})


//--------------fecha aplicada8--------------------------------------------
$(".form_date8").on('change', function (e) {
$('#atras8').slideDown();	
var mirror_f8 = $('#mirror_f8').val();
var mirror_d8 = $('#mirror_d8').val(); 
var date1 = moment(mirror_f8);
var date2 = moment(mirror_d8);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf81").val(diffInMinutes);	 
})


//--------------fecha aplicada9--------------------------------------------
$(".form_date9").on('change', function (e) {
$('#atras9').slideDown();	
var mirror_f9 = $('#mirror_f9').val();
var mirror_d9 = $('#mirror_d9').val(); 
var date1 = moment(mirror_f9);
var date2 = moment(mirror_d9);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf91").val(diffInMinutes);	 
})

//--------------fecha aplicada10--------------------------------------------
$(".form_date10").on('change', function (e) {
$('#atras10').slideDown();	
var mirror_f10 = $('#mirror_f10').val();
var mirror_d10 = $('#mirror_d10').val(); 
var date1 = moment(mirror_f10);
var date2 = moment(mirror_d10);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf101").val(diffInMinutes);	 
})
//--------------fecha aplicada11--------------------------------------------
$(".form_date11").on('change', function (e) {
$('#atras11').slideDown();	
var mirror_f11 = $('#mirror_f11').val();
var mirror_d11 = $('#mirror_d11').val(); 
var date1 = moment(mirror_f11);
var date2 = moment(mirror_d11);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf111").val(diffInMinutes);	 
})
//--------------fecha aplicada12--------------------------------------------
$(".form_date12").on('change', function (e) {
$('#atras12').slideDown();	
var mirror_f12 = $('#mirror_f12').val();
var mirror_d12 = $('#mirror_d12').val(); 
var date1 = moment(mirror_f12);
var date2 = moment(mirror_d12);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf121").val(diffInMinutes);	 
})
//--------------fecha aplicada13--------------------------------------------
$(".form_date13").on('change', function (e) {
$('#atras13').slideDown();	
var mirror_f13 = $('#mirror_f13').val();
var mirror_d13 = $('#mirror_d13').val(); 
var date1 = moment(mirror_f13);
var date2 = moment(mirror_d13);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf131").val(diffInMinutes);	 
})

//--------------fecha aplicada13--------------------------------------------
$(".form_date14").on('change', function (e) {
$('#atras14').slideDown();	
var mirror_f14 = $('#mirror_f14').val();
var mirror_d14 = $('#mirror_d14').val(); 
var date1 = moment(mirror_f14);
var date2 = moment(mirror_d14);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf141").val(diffInMinutes);	 
})

//--------------fecha aplicada15--------------------------------------------
$(".form_date15").on('change', function (e) {
$('#atras15').slideDown();	
var mirror_f15 = $('#mirror_f15').val();
var mirror_d15 = $('#mirror_d15').val(); 
var date1 = moment(mirror_f15);
var date2 = moment(mirror_d15);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf151").val(diffInMinutes);	 
})
//--------------fecha aplicada16--------------------------------------------
$(".form_date16").on('change', function (e) {
$('#atras16').slideDown();	
var mirror_f16 = $('#mirror_f16').val();
var mirror_d16 = $('#mirror_d16').val(); 
var date1 = moment(mirror_f16);
var date2 = moment(mirror_d16);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf161").val(diffInMinutes);	 
})


//--------------fecha aplicada16--------------------------------------------
$(".form_date17").on('change', function (e) {
$('#atras17').slideDown();	
var mirror_f17 = $('#mirror_f17').val();
var mirror_d17 = $('#mirror_d17').val(); 
var date1 = moment(mirror_f17);
var date2 = moment(mirror_d17);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf171").val(diffInMinutes);	 
})


//--------------fecha aplicada16--------------------------------------------
$(".form_date18").on('change', function (e) {
$('#atras18').slideDown();	
var mirror_f18 = $('#mirror_f18').val();
var mirror_d18 = $('#mirror_d18').val(); 
var date1 = moment(mirror_f18);
var date2 = moment(mirror_d18);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf181").val(diffInMinutes);	 
})
//====Remove fecha1==================

$('#frem1').on('click', function(ev){
$("#atras1").hide();
});


//====Remove fecha2==================

$('#frem2').on('click', function(ev){
$("#atras2").hide();
});

//====Remove fecha3==================

$('#frem3').on('click', function(ev){
$("#atras3").hide();
});

//====Remove fecha4==================

$('#frem4').on('click', function(ev){
$("#atras4").hide();
});

//====Remove fecha5==================

$('#frem5').on('click', function(ev){
$("#atras5").hide();
});
//====Remove fecha6==================
$('#frem6').on('click', function(ev){
$("#atras6").hide();
});

//====Remove fecha7==================
$('#frem7').on('click', function(ev){
$("#atras7").hide();
});

//====Remove fecha8==================
$('#frem8').on('click', function(ev){
$("#atras8").hide();
});
//====Remove fecha9==================
$('#frem9').on('click', function(ev){
$("#atras9").hide();
});
//====Remove fecha10==================
$('#frem10').on('click', function(ev){
$("#atras10").hide();
});
//====Remove fecha11==================
$('#frem11').on('click', function(ev){
$("#atras11").hide();
});

//====Remove fecha12==================
$('#frem12').on('click', function(ev){
$("#atras12").hide();
});


//====Remove fecha13==================
$('#frem13').on('click', function(ev){
$("#atras13").hide();
});

//====Remove fecha14==================
$('#frem14').on('click', function(ev){
$("#atras14").hide();
});
//====Remove fecha15==================
$('#frem15').on('click', function(ev){
$("#atras15").hide();
});

//====Remove fecha16==================
$('#frem16').on('click', function(ev){
$("#atras16").hide();
});

//====Remove fecha17==================
$('#frem17').on('click', function(ev){
$("#atras17").hide();
});

//====Remove fecha18==================
$('#frem18').on('click', function(ev){
$("#atras18").hide();
});
//====================================================================
$('.desco1').change(function() {
    if ($('.desco1:checked').length) {
        $('#peso').prop('disabled', true);
	} else {
        $('#peso').prop('disabled', false);
	 }
});

$('#desco2').change(function() {
    if ($('#desco2:checked').length) {
        $('#talla').prop('disabled', true);
	} else {
        $('#talla').prop('disabled', false);
	 }
});


//=======================================

//=======Show vacuna=================================
$("#show_vacuna").on('click', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$('html, body').animate({ scrollTop: $(document).height() }, 1200);
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/vacuna');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#loadf").hide();
	$("#show_vacuna").hide();
   $("#vacunacion").html(data);
   }

});
});


//=======Show vacuna data=================================
$("#show_vacuna_data").on('click', function (e) {
e.preventDefault();
var id_pedia = $("#id_p").val();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$('html, body').animate({ scrollTop: $(document).height() }, 1200);
$.ajax({
url: '<?php echo site_url('admin/vacuna_data');?>',
type: 'post',
data:{id_pedia:id_pedia},
success: function (data) {
	$("#loadf").hide();
	$("#show_vacuna_data").hide();
   $("#vacunacion_data").html(data);
   }

});
});




//-----------------------------------------------------------------------------------------------------------------
//========================Pediatrico=================================
$('#save_ant_ped').on('click', function(event) {
event.preventDefault();
var idpedia = $("#idpedia").val();
var hist_id = $("#hist_id").val();
var updated_by = $("#updated_by").val();

//--------------------------------------------------------------------
var evo = $('input:radio[name=evo1]:checked').val();  
var evol_text = $("#evol_text1").val();
var dosis = $("#dosis1").val();
var tiempo = $("#tiempo1").val();
var edad = $("#edad1").val();
var via = $("#via1").val();
var tnaci = $('input:radio[name=tnaci1]:checked').val();
var describa = $("#describa1").val(); 
var edad_gest = $("#edad_gest1").val(); 
var peso = $("#peso_al_nacer").val();
var talla = $("#talla_al_nacer").val();  
var desco_peso_al_nacer1 = [];
$("input[name='desco_peso_al_nacer']:checked").each(function(){
desco_peso_al_nacer1.push(this.value);
});


var desco_talla_al_nacer1 = [];
$("input[name='desco_talla_al_nacer']:checked").each(function(){
desco_talla_al_nacer1.push(this.value);
});

var lactamat11 = [];
$("input[name='lactamat1']:checked").each(function(){
lactamat11.push(this.value);
});

var leche11 = [];
$("input[name='leche1']:checked").each(function(){
leche11.push(this.value);
});
var otrosinfo = $("#otrosinfo1").val(); 
var traum = $('input:radio[name=traum1]:checked').val();
var traum_text = $("#traum_text1").val();
var trans = $('input:radio[name=trans1]:checked').val(); 
var trans_text = $("#trans_text1").val(); 
//---------------------------------------------------------------
var textmaltrato = $("#textmaltrato1").val();
var textabuso = $("#textabuso1").val();
var textneg = $("#textneg1").val();
var maltratoemo = $("#maltratoemo1").val();
//--------------------------------------------
var textgrueso = $("#text-grueso1").val();
var textfino = $("#text-fino1").val();
var textlenguage = $("#text-lenguage1").val();
var textsocial = $("#text-social1").val();

//--------------------------------------------
var ale11 = [];
$("input[name='ale1']:checked").each(function(){
ale11.push(this.value);
});
var hep11 = [];
$("input[name='hep1']:checked").each(function(){
hep11.push(this.value);
});
var amig11 = [];
$("input[name='amig1']:checked").each(function(){
amig11.push(this.value);
});
var infv11 = [];
$("input[name='infv1']:checked").each(function(){
infv11.push(this.value);
});
var asm11 = [];
$("input[name='asm1']:checked").each(function(){
asm11.push(this.value);
});

var neum11 = [];
$("input[name='neum1']:checked").each(function(){
neum11.push(this.value);
});

var cirug11 = [];
$("input[name='cirug1']:checked").each(function(){
cirug11.push(this.value);
});

var otot11 = [];
$("input[name='otot1']:checked").each(function(){
otot11.push(this.value);
});

var deng11 = [];
$("input[name='deng1']:checked").each(function(){
deng11.push(this.value);
});


var pape11 = [];
$("input[name='pape1']:checked").each(function(){
pape11.push(this.value);
});

var diar11 = [];
$("input[name='diar1']:checked").each(function(){
diar11.push(this.value);
});

var paras11 = [];
$("input[name='paras1']:checked").each(function(){
paras11.push(this.value);
});

var zika11 = [];
$("input[name='zika1']:checked").each(function(){
 zika11.push(this.value);
});

var saram11 = [];
$("input[name='saram1']:checked").each(function(){
 saram11.push(this.value);
});

var chicun11 = [];
$("input[name='chicun1']:checked").each(function(){
 chicun11.push(this.value);
});


var varicela11 = [];
$("input[name='varicela1']:checked").each(function(){
 varicela11.push(this.value);
});


var falc11 = [];
$("input[name='falc1']:checked").each(function(){
 falc11.push(this.value);
});

var otros_t_text = $("#otros_t_text1").val();

//===VACUNACION=========================================
var bcg1 = $("#bcg11").val();
var resf1 = $("#resf11").val();


var hepb1 = $("#hepb1").val();
var resf2 = $("#resf21").val();

var no_ap3 = $("#no_ap331").val();
var resf3 = $("#resf31").val();

var bl4 = $("#bl41").val();
var resf4 = $("#resf41").val();

var yel5 = $("#yel51").val();
var resf5 = $("#resf51").val();


var  bl6 = $("#bl61").val();
var resf6 = $("#resf61").val();


var  gr7 = $("#gr71").val();
var resf7 = $("#resf71").val();

var  bll8 = $("#bll81").val();
var resf8 = $("#resf81").val();

var  grr9 = $("#grr91").val();
var resf9 = $("#resf91").val();

var  yel10 = $("#yel101").val();
var resf10 = $("#resf101").val();

var  bl11 = $("#bl111").val();
var resf11 = $("#resf111").val();

var  gr12 = $("#gr121").val();
var resf12 = $("#resf121").val();

var  yel13 = $("#yel131").val();
var resf13 = $("#resf131").val();

var  bl14 = $("#bl141").val();
var resf14 = $("#resf141").val();

var  bll15 = $("#bll151").val();
var resf15 = $("#resf151").val();

var  srp16 = $("#bcg161").val();
var resf16 = $("#resf161").val();

var  bll17 = $("#bll171").val();
var resf17 = $("#resf171").val();

 var grr18 = $("#grr181").val();
 var resf18 = $("#resf181").val();


$.ajax({
url: '<?php echo site_url('admin_medico/saveUpPedia');?>',
type: 'post',

data:{hist_id:hist_id,idpedia:idpedia,updated_by:updated_by,ale1:ale11,otros_t_text:otros_t_text,hep1:hep11,amig1:amig11,infv1:infv11,asm1:asm11,neum1:neum11,cirug1:cirug11,otot1:otot11,deng1:deng11,pape1:pape11,diar1:diar11,paras1:paras11,zika1:zika11,saram1:saram11,chicun1:chicun11,varicela1:varicela11,falc1:falc11,
textmaltrato:textmaltrato,textabuso:textabuso,textneg:textneg,maltratoemo:maltratoemo,textsocial:textsocial,textlenguage:textlenguage,textfino:textfino,textgrueso:textgrueso,
evo:evo,evol_text:evol_text,tnaci:tnaci,describa:describa,edad_gest:edad_gest,peso:peso,talla:talla,desco_talla_al_nacer:desco_talla_al_nacer1,desco_peso_al_nacer:desco_peso_al_nacer1,lactamat1:lactamat11,leche1:leche11,otrosinfo:otrosinfo,traum_text:traum_text,trans_text:trans_text,
bcg1,bcg1,resf1:resf1,hepb1:hepb1,resf2:resf2,resf3:resf3,no_ap3:no_ap3,bl4:bl4,resf4:resf4,resf5:resf5,yel5:yel5,bl6:bl6,resf6:resf6,gr7:gr7,resf7:resf7,bll8:bll8,resf8:resf8,grr9:grr9,resf9:resf9,yel10:yel10,resf10:resf10,bl11:bl11,resf11:resf11,gr12:gr12,resf12:resf12,yel13:yel13,resf13:resf13,bl14:bl14,resf14:resf14,
bll15:bll15,resf15:resf15,srp16:srp16,resf16:resf16,bll17:bll17,resf17:resf17,grr18:grr18,resf18:resf18},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#loadfped').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
success: function (data) {
	alert("Cambiado ha sido hecho !");
	//alert(yel5);
	$('.show_modif_ant_ped').slideDown();
	$(".save_ant_ped_hide").hide();
$(".disable-all :input").prop("disabled", true);
}

});

});
 });
 
 /*
 //show vacunation
 
 $('#click_show_vacuna').click(function () {
	$('#click_show_vacuna').text($('#click_show_vacuna').text() == 'Ocultar Vacuna' ? 'Vacuna' : 'Ocultar Vacuna'); 
    $("#show-vacuna").slideToggle();
    //$("#edit_datav").slideToggle("slow");	
	})
	
	*/
	
$('#click_show_vacuna').click(function() {

var id_historial ="<?=$id_historial?>";
$.get( "<?php echo base_url();?>admin/vacuna_data?id_historial="+id_historial, function( data ){
$(this).text($('#click_show_vacuna').text() == 'Ocultar Vacuna' ? 'Vacuna' : 'Ocultar Vacuna'); 
$("#show-vacuna").html(data).slideToggle("slow"); 
}); 
 
});
</script>