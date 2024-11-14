<script>

$('input:radio[name="gem1"]').change(function() {
  if ($(this).val() == 'si') {
   $('.gemales').css("color","red");
  } else {
   $('.gemales').css("color","");
  }
});

$('input:radio[name="dia11"]').change(function() {
  if ($(this).val() == 'si') {
   $('.diabetes').css("color","red");
  } else {
   $('.diabetes').css("color","");
  }
});


$('input:radio[name="tbc11"]').change(function() {
  if ($(this).val() == 'si') {
   $('.tbc-pulmonar').css("color","red");
  } else {
   $('.tbc-pulmonar').css("color","");
  }
});


$('input:radio[name="hip11"]').change(function() {
  if ($(this).val() == 'si') {
   $('.hipertencion').css("color","red");
  } else {
   $('.hipertencion').css("color","");
  }
});



$('input:radio[name="pelv1"]').change(function() {
  if ($(this).val() == 'si') {
   $('.pelvico-urinaria').css("color","red");
  } else {
   $('.pelvico-urinaria').css("color","");
  }
});


$('input:radio[name="inf1"]').change(function() {
  if ($(this).val() == 'si') {
   $('.infertibilidad').css("color","red");
  } else {
   $('.infertibilidad').css("color","");
  }
});


$('input:radio[name="dia21"]').change(function() {
  if ($(this).val() == 'si') {
   $('.diabetesf').css("color","red");
  } else {
   $('.diabetesf').css("color","");
  }
});

$('input:radio[name="tbc21"]').change(function() {
  if ($(this).val() == 'si') {
   $('.tbc-pulmonarf').css("color","red");
  } else {
   $('.tbc-pulmonarf').css("color","");
  }
});


$('input:radio[name="hip21"]').change(function() {
  if ($(this).val() == 'si') {
   $('.hpertencionf').css("color","red");
  } else {
   $('.hpertencionf').css("color","");
  }
});



$('input:radio[name="otros21"]').change(function() {
  if ($(this).val() == 'si') {
   $('#otros2_text1').css("color","red");
  } else {
   $('#otros2_text1').css("color","");
  }
});

$('#otros11').change(function(){
  if($(this).val()=='no') {
    $('#otros1_text1').val('');
  } 
});



$('#otros21').change(function(){
  if($(this).val()=='no') {
    $('#otros2_text1').val('');
  } 
});
//--------------------------------------------------------------------------------
	$('.dfumcg_linked').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "dfumcg_linked",
    }).on('changeDate', function (e) {
var dfumcg_link = $("#dfumcg_linked").val();
var moment1o = moment(dfumcg_link);
var nextyear = moment(moment1o).add('years', 1);
var nextyearmonth = moment(nextyear).subtract('months', 3);
var nextyearmonthday = moment(nextyearmonth).add('days', 7);
var fppsem = moment(nextyearmonthday).format('D MMMM YYYY');
var resulto = moment(moment1o).add('days', 14);

var masDayo=moment(resulto).add('days', 3);
var masDay1o = moment(masDayo).format('D MMMM YYYY');

var menosDayo=moment(resulto).subtract('days', 3);
var menosDay1o = moment(menosDayo).format('D MMMM YYYY');
$("#sem_act_a1").val(menosDay1o + ' hasta '  + masDay1o);
$("#fpp_cal_ges1").val(fppsem);
});



$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_ant_ssr").on('click', function (e) {
	$('.show_modif_ant_ssr').hide();
	$(".save_ant_ssr_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)




$('.dfecha1').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha1_link1",
    });
	 //======fecha 2=============================
$('.dfecha2').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha2_link1",
    });
	
	//======fecha 3=============================
$('.dfecha3').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha3_link1",
    });
	
		//======fecha 4=============================
$('.dfecha4').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha4_link1",
    });
	$('.dfumcg').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "dfumcg_link",
    });
	

//=======================Calculo Gestacionario Segun Sonografia

$("#sono11").keyup(function (e) {
var fecha1_link = $("#fecha1_link1").val();
$("#sonodia11").val("");$("#dia-rest11").val("");
var today = moment();
var fl1 = moment(fecha1_link);
var sono1=$("#sono11").val();
//add semana to today
var weekToHoy = today.add('weeks', sono1);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl1, "weeks");
$("#rest11").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono11").val();
var result = moment(fl1).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp11").val(fpp);

})



$("#sonodia11").keyup(function (e) {
var sono1=	$("#sono11").val();
var weekLeft = 40 - sono1;
var sonodia1 = $("#sonodia11").val();
var fecha1_link = $("#fecha1_link1").val();
var fl1 = moment(fecha1_link);
var result = moment(fl1).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia1);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp11").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia1);
var diff = moment.duration(weekToHoy.diff(fl1));
$("#dia-rest11").val(diff.days()%7);
})


$("#sono21").keyup(function (e) {
var fecha1_link = $("#fecha2_link1").val();
$("#sonodia21").val("");$("#dia-rest21").val("");
var today = moment();
var fl1 = moment(fecha1_link);
var sono1=$("#sono21").val();
//add semana to today
var weekToHoy = today.add('weeks', sono1);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl1, "weeks");
$("#rest21").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono21").val();
var result = moment(fl1).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp21").val(fpp);

})



$("#sonodia21").keyup(function (e) {
var sono1=	$("#sono21").val();
var weekLeft = 40 - sono1;
var sonodia1 = $("#sonodia21").val();
var fecha1_link = $("#fecha2_link1").val();
var fl1 = moment(fecha1_link);
var result = moment(fl1).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia1);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp21").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia1);
var diff = moment.duration(weekToHoy.diff(fl1));
$("#dia-rest21").val(diff.days()%7);
})

$("#sono31").keyup(function (e) {
var fecha1_link = $("#fecha3_link1").val();
$("#sonodia31").val("");$("#dia-rest31").val("");
var today = moment();
var fl1 = moment(fecha1_link);
var sono1=$("#sono31").val();
//add semana to today
var weekToHoy = today.add('weeks', sono1);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl1, "weeks");
$("#rest31").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono31").val();
var result = moment(fl1).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp31").val(fpp);

})



$("#sonodia31").keyup(function (e) {
var sono1=	$("#sono31").val();
var weekLeft = 40 - sono1;
var sonodia1 = $("#sonodia31").val();
var fecha1_link = $("#fecha3_link1").val();
var fl1 = moment(fecha1_link);
var result = moment(fl1).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia1);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp31").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia1);
var diff = moment.duration(weekToHoy.diff(fl1));
$("#dia-rest31").val(diff.days()%7);
})


$("#sono41").keyup(function (e) {
var fecha1_link = $("#fecha4_link1").val();
$("#sonodia41").val("");$("#dia-rest41").val("");
var today = moment();
var fl1 = moment(fecha1_link);
var sono1=$("#sono41").val();
//add semana to today
var weekToHoy = today.add('weeks', sono1);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl1, "weeks");
$("#rest41").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono41").val();
var result = moment(fl1).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp41").val(fpp);

})



$("#sonodia41").keyup(function (e) {
var sono1=	$("#sono41").val();
var weekLeft = 40 - sono1;
var sonodia1 = $("#sonodia41").val();
var fecha1_link = $("#fecha4_link1").val();
var fl1 = moment(fecha1_link);
var result = moment(fl1).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia1);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp41").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia1);
var diff = moment.duration(weekToHoy.diff(fl1));
$("#dia-rest41").val(diff.days()%7);
})





//========================================================================


	$('.dfumcg_linked').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "dfumcg_linked",
    }).on('changeDate', function (e) {
		$("#sem_act_a1").css("color","green");
	$("#fpp_cal_ges1").css("color","green");
var dfumcg_linked = $("#dfumcg_linked").val();
var moment1o = moment(dfumcg_linked);
var nextyear = moment(moment1o).add('years', 1);
var nextyearmonth = moment(nextyear).subtract('months', 3);
var nextyearmonthday = moment(nextyearmonth).add('days', 7);
var fppsem = moment(nextyearmonthday).format('D MMMM YYYY');
var resulto = moment(moment1o).add('days', 14);

var masDayo=moment(resulto).add('days', 3);
var masDay1o = moment(masDayo).format('D MMMM YYYY');

var menosDayo=moment(resulto).subtract('days', 3);
var menosDay1o = moment(menosDayo).format('D MMMM YYYY');
$("#sem_act_a1").val(menosDay1o + ' hasta '  + masDay1o);
$("#fpp_cal_ges1").val(fppsem);
});
 //-----------------------------------------------------------
$(".loquios").change(function () {
if($(this).val()=='Purulento'){
$("#alert1").slideDown("slow");
$("#alert2").hide();
}
else if($(this).val()=='Hematico'){
$("#alert2").slideDown("slow");
$("#alert1").hide();
}
else{}
})
	
	
	

	
$('#save_ant_obs').on('click', function(event) {
event.preventDefault();

var idobs = $("#idobs").val();
var updated_by = $("#updated_by").val();
var dia1 = $('input:radio[name=dia11]:checked').val();
var tbc1 = $('input:radio[name=tbc11]:checked').val();
var hip1 = $('input:radio[name=hip11]:checked').val();
var pelv = $('input:radio[name=pelv1]:checked').val();
var inf = $('input:radio[name=inf1]:checked').val();
var otros1 = $('input:radio[name=otros11]:checked').val();
var otros1_text = $("#otros1_text1").val();

var otros2_text = $("#otros2_text1").val();
var gem  = $('input:radio[name=gem1]:checked').val();
var otros2 = $('input:radio[name=otros21]:checked').val();
var dia2   = $('input:radio[name=dia21]:checked').val();
var tbc2 = $('input:radio[name=tbc21]:checked').val();
var hip2 = $('input:radio[name=hip21]:checked').val();

var fiebre1 = [];
$("input[name='fiebre1']:checked").each(function(){
fiebre1.push(this.value);
});
var artra1 = [];
$("input[name='artra1']:checked").each(function(){
artra1.push(this.value);
});
var mia1 = [];
$("input[name='mia1']:checked").each(function(){
mia1.push(this.value);
});
var exa1 = [];
$("input[name='exa1']:checked").each(function(){
exa1.push(this.value);
});
var con1 = [];
$("input[name='con1']:checked").each(function(){
con1.push(this.value);
});

var nig11 = [];
$("input[name='nig11']:checked").each(function(){
nig11.push(this.value);
});

var nig22 = [];
$("input[name='nig21']:checked").each(function(){
nig22.push(this.value);
});

var nig33 = [];
$("input[name='nig31']:checked").each(function(){
nig33.push(this.value);
});

var partos = $("#partos1").val();
var arbotos = $("#arbotos1").val();
var vaginales = $("#vaginales1").val();
var viven = $("#viven1").val();
var gestas = $("#gestas1").val();
var cesareas = $("#cesareas1").val();
var muertos1 = $("#muertos11").val();
var nacidov1 = $("#nacidov11").val();
var nacidom1 = $("#nacidom11").val();
var despues1s = $("#despues1s1").val();
var otrosc = $("#otrosc1").val();
var fin = $("#fin1").val();
var rn = $("#rn1").val();
var fecha1 = $("#fecha11").val();
var fecha2 = $("#fecha21").val();
var fecha3 = $("#fecha31").val();
var fecha4 = $("#fecha41").val();
var sono1 = $("#sono11").val();
var sono2 = $("#sono21").val();
var sono3 = $("#sono31").val();
var sono4 = $("#sono41").val();
var sonodia1 = $("#sonodia11").val();
var sonodia2 = $("#sonodia21").val();
var sonodia3 = $("#sonodia31").val();
var sonodia4 = $("#sonodia41").val();
var diarest1 = $("#dia-rest11").val();
var diarest2 = $("#dia-rest21").val();
var diarest3 = $("#dia-rest31").val();
var diarest4 = $("#dia-rest41").val();
var fpp1 = $("#fpp11").val();
var fpp2 = $("#fpp21").val();
var fpp3 = $("#fpp31").val();
var fpp4 = $("#fpp41").val();
var rest1 = $("#rest11").val();
var rest2 = $("#rest21").val();
var rest3 = $("#rest31").val();
var rest4 = $("#rest41").val();  
var peso1 = $("#peso11").val();
var talla1 = $("#talla11").val(); 
var fum_cal_ges = $("#fum_cal_ges1").val();
var fpp_cal_ges = $("#fpp_cal_ges1").val();
var sem_act_a = $("#sem_act_a1").val();
var prev_act = $('input:radio[name=prev_act1]:checked').val();  
var prev_act_mes = $("#prev_act_mes1").val();
 var r2 = $("#2r1").val();
 var sencibil = $('input:radio[name=sencibil1]:checked').val(); 
var rh = $('input:radio[name=rh1]:checked').val();  
var rh_option = $("#rh_option1").val();   
var odont = $('input:radio[name=odont1]:checked').val();   
var pelvis = $('input:radio[name=pelvis1]:checked').val();    
var papani = $('input:radio[name=papani1]:checked').val();
var colp = $('input:radio[name=colp1]:checked').val(); 
var cevix = $('input:radio[name=cevix1]:checked').val();
var vdrl111 = [];
$("input[name='vdrl11']:checked").each(function(){
vdrl111.push(this.value);
});	

var vdrl221 = [];
$("input[name='vdrl21']:checked").each(function(){
vdrl221.push(this.value);
});
var diasmes = $("#diasmes1").val();

var pu_fecha1 = $("#pu_fecha11").val();
var pu_fecha2 = $("#pu_fecha21").val();
var pu_fecha3 = $("#pu_fecha31").val();
var pu_t1 = $("#pu_t11").val();
var pu_t2 = $("#pu_t21").val();
var pu_t3 = $("#pu_t31").val();
var pu_pul1 = $("#pu_pul111").val();
var pu_pul11 = $("#pu_pul111").val();


var pu_pul2 = $("#pu_pul21").val(); 
var pu_pul22 = $("#pu_pul221").val();
var pu_pul3 = $("#pu_pul31").val();
var pu_pul33 = $("#pu_pul331").val();
var pu_ten1 = $("#pu_ten11s").val();
var pu_ten11 = $("#pu_ten111").val();
var pu_ten2 = $("#pu_ten21").val();
var pu_ten22 = $("#pu_ten221").val();  
var pu_ten3 = $("#pu_ten31").val();
var pu_ten33 = $("#pu_ten331").val(); 
var pu_inv1 = $("#pu_inv11").val();
var pu_inv2 = $("#pu_inv21").val();
var pu_inv3 = $("#pu_inv31").val();
var loquios1 = $("#loquios11").val();  
var loquios2 = $("#loquios21").val();
var loquios3 = $("#loquios31").val(); 

$.ajax({
url: '<?php echo site_url('admin_medico/saveUpObstetrico');?>',
type: 'post',
data:{idobs:idobs,updated_by:updated_by,dia1:dia1,tbc1:tbc1,hip1:hip1,pelv:pelv,inf:inf,otros1:otros1,otros1_text:otros1_text,
sonodia1:sonodia1,sonodia2:sonodia2,sonodia3:sonodia3,sonodia4:sonodia4,diarest1:diarest1,diarest2:diarest2,diarest3:diarest3,diarest4:diarest4,
dia2:dia2,tbc2:tbc2,hip2:hip2,gem:gem,otros2:otros2,otros2_text:otros2_text,fiebre1:fiebre1,artra1:artra1,mia1:mia1,exa1:exa1,con1:con1,
nig11:nig11,nig22:nig22,nig33:nig33,partos:partos,arbotos:arbotos,vaginales:vaginales,viven:viven,gestas:gestas,cesareas:cesareas,
muertos1:muertos1,nacidov1:nacidov1,nacidom1:nacidom1,despues1s:despues1s,otrosc:otrosc,fin:fin,rn:rn,fecha1:fecha1,fecha2:fecha2,fecha3:fecha3,
fecha4:fecha4,sono1:sono1,sono2:sono2,sono3:sono3,sono4:sono4,fpp1:fpp1,fpp2:fpp2,fpp3:fpp3,fpp4:fpp4,rest1:rest1,rest2:rest2,rest3:rest3,rest4:rest4,
peso1:peso1,talla1:talla1,fum_cal_ges:fum_cal_ges,fpp_cal_ges:fpp_cal_ges,sem_act_a:sem_act_a,prev_act:prev_act,prev_act_mes:prev_act_mes,r2:r2,
rh:rh,sencibil:sencibil,rh_option:rh_option,odont:odont,pelvis:pelvis,papani:papani,colp:colp,cevix:cevix,vdrl11:vdrl111,vdrl22:vdrl221,diasmes:diasmes,
pu_fecha1:pu_fecha1,pu_fecha2:pu_fecha2,pu_fecha3:pu_fecha3,pu_t1:pu_t1,pu_t2:pu_t2,pu_t3:pu_t3,pu_pul1:pu_pul1,pu_pul11:pu_pul11,pu_pul2:pu_pul2,
pu_pul22:pu_pul22,pu_pul3:pu_pul3,pu_pul33:pu_pul33,pu_ten1:pu_ten1,pu_ten11:pu_ten11,pu_ten2:pu_ten2,pu_ten22:pu_ten22,pu_ten3:pu_ten3,pu_ten33:pu_ten33,
pu_inv1:pu_inv1,pu_inv2:pu_inv2,pu_inv3:pu_inv3,loquios1:loquios1,loquios2:loquios2,loquios3:loquios3},
success: function (data) {
	alert("Cambiado ha sido hecho !");
	$('.show_modif_ant_ssr').slideDown();
	$(".save_ant_ssr_hide").hide();
$(".disable-all :input").prop("disabled", true);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

});
</script>