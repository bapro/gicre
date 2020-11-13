$(".deactivate_ped :input").prop("disabled", true);
	//========VACUNACION=======================================
function no_ap_sh1(){
$(".no_ap_sh1").slideToggle();
}

function no_ap_sh2(){
$(".no_ap_sh2").slideToggle();
}

function no_ap_sh3(){
$(".no_ap_sh3").slideToggle();
}

function no_ap_sh4(){
$(".no_ap_sh4").slideToggle();
}

function no_ap_sh5(){
$(".no_ap_sh5").slideToggle();
}
function no_ap_sh6(){
$(".no_ap_sh6").slideToggle();
}
function no_ap_sh7(){
$(".no_ap_sh7").slideToggle();
}
function no_ap_sh8(){
$(".no_ap_sh8").slideToggle();
}
function no_ap_sh9(){
$(".no_ap_sh9").slideToggle();
}
function no_ap_sh10(){
$(".no_ap_sh10").slideToggle();
}
function no_ap_sh11(){
$(".no_ap_sh11").slideToggle();
}
function no_ap_sh12(){
$(".no_ap_sh12").slideToggle();
}
function no_ap_sh13(){
$(".no_ap_sh13").slideToggle();
}
function no_ap_sh14(){
$(".no_ap_sh14").slideToggle();
}
function no_ap_sh15(){
$(".no_ap_sh15").slideToggle();
}
function no_ap_sh16(){
$(".no_ap_sh16").slideToggle();
}
function no_ap_sh17(){
$(".no_ap_sh17").slideToggle();
}
function no_ap_sh18(){
$(".no_ap_sh18").slideToggle();
}
$(document).ready(function(){


 $(".medica").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});
	
	 $("#med").select2({
	  tags: true,
	  tokenSeparators: [',', ' ']
	});	
$('.no_ah').hide();

//----------------------------------------------------------
jQuery("input[name='mf1']").on('click', function(e) {
if($('.chkYes5').is(':checked')) {

$('.text-maltrato').prop('disabled', false);
}
else{
$('.text-maltrato').prop('disabled', true);

}
});


jQuery("input[name='abs']").on('click', function(e) {
if($('.chkYes6').is(':checked')) {

$('.text-abuso').prop('disabled', false);
}
else{
$('.text-abuso').prop('disabled', true);

}
});


jQuery("input[name='neg']").on('click', function(e) {
if($('.chkYes7').is(':checked')) {

$('.text-neg').prop('disabled', false);
}
else{
$('.text-neg').prop('disabled', true);

}
});



jQuery("input[name='mem']").on('click', function(e) {
if($('.chkYes8').is(':checked')) {

$('.maltrato-emo').prop('disabled', false);
}
else{
$('.maltrato-emo').prop('disabled', true);

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
$('.atras1').slideDown();	
var mirror_f1 = $('#mirror_f1').val();
var mirror_bcg1 = $('#mirror_bcg1').val(); 
var date1 = moment(mirror_f1);
var date2 = moment(mirror_bcg1);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$(".resf1").val(diffInMinutes);	 
})

//--------------fecha aplicada2--------------------------------------------
$(".form_date2").on('change', function (e) {
$('.atras2').slideDown();	
var mirror_f2 = $('#mirror_f2').val();
var mirror_bcg2 = $('#mirror_bcg2').val(); 
var date1 = moment(mirror_f2);
var date2 = moment(mirror_bcg2);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$(".resf2").val(diffInMinutes);	 
})


//--------------fecha aplicada3--------------------------------------------
$(".form_date3").on('change', function (e) {
$('.atras3').slideDown();	
var mirror_f3 = $('#mirror_f3').val();
var mirror_d3 = $('#mirror_d3').val(); 
var date1 = moment(mirror_f3);
var date2 = moment(mirror_d3);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf3").val(diffInMinutes);	 
})

//--------------fecha aplicada4--------------------------------------------
$(".form_date4").on('change', function (e) {
$('.atras4').slideDown();	
var mirror_f4 = $('#mirror_f4').val();
var mirror_d4 = $('#mirror_d4').val(); 
var date1 = moment(mirror_f4);
var date2 = moment(mirror_d4);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf4").val(diffInMinutes);	 
})

//--------------fecha aplicada5--------------------------------------------
$(".form_date5").on('change', function (e) {
$('.atras5').slideDown();	
var mirror_f5 = $('#mirror_f5').val();
var mirror_d5 = $('#mirror_d5').val(); 
var date1 = moment(mirror_f5);
var date2 = moment(mirror_d5);
var diff = date1.diff(date2);
diffInMinutes = date1.diff(date2, 'days');
$("#resf5").val(diffInMinutes);	 
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
$("#resf6").val(diffInMinutes);	 
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
$("#resf7").val(diffInMinutes);	 
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
$("#resf8").val(diffInMinutes);	 
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
$("#resf9").val(diffInMinutes);	 
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
$("#resf10").val(diffInMinutes);	 
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
$("#resf11").val(diffInMinutes);	 
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
$("#resf12").val(diffInMinutes);	 
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
$("#resf13").val(diffInMinutes);	 
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
$("#resf14").val(diffInMinutes);	 
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
$("#resf15").val(diffInMinutes);	 
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
$("#resf16").val(diffInMinutes);	 
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
$("#resf17").val(diffInMinutes);	 
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
$("#resf18").val(diffInMinutes);	 
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
$(".modif_ant_pediat").on('click', function (e) {
	$(this).hide();
	$(".save_ant_pediat").slideDown();
	$(".deactivate_ped:input").prop("disabled", false);
    $("textarea").prop("disabled", false);
	$("select").prop("disabled", false);
}
)


}
)
