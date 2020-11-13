 
 <script>
 $('.required-info').hide();
  $(".deactivate_obs :input").prop("disabled", true);
 //======fecha 1=============================
$('.dfecha1').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha1_link",
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
		linkField: "fecha2_link",
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
		linkField: "fecha3_link",
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
		linkField: "fecha4_link",
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
 //--------------------------------------------------------------------
$('input[name="fin_ant_emb"]').mask('00/0000', {placeholder: 'Meses/Anos'});
$('input[name="axx"]').mask('00/0000', {placeholder: 'Meses/Anos'});
$('input[name="sonog"]').mask('00 00 0000', {placeholder: '-- -- ----'});
//---------------------------------------------------------------------------
$('.onlynumber').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});
//=======================Calculo Gestacionario Segun Sonografia
$("#sono1").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono1").val();
$("#rest1").val(weekLeft);
//2- Calcul FPP
var fecha1_link = $("#fecha1_link");
var fl1 = moment(fecha1_link);
//fecha1 = "01 01 2018";
var result = moment(fl1).add('weeks', weekLeft);
var res = moment(result).format('D MMMM YYYY');
$("#fpp1").val(res);
})

$("#sono2").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono2").val();
$("#rest2").val(weekLeft);
//2- Calcul FPP
var fecha2_link = $("#fecha2_link");
var fl2 = moment(fecha2_link);
var result = moment(fl2).add('weeks', weekLeft);
var res = moment(result).format('D MMMM YYYY');
$("#fpp2").val(res);
})

$("#sono3").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono3").val();
$("#rest3").val(weekLeft);
//2- Calcul FPP
var fecha3_link = $("#fecha3_link");
var fl3 = moment(fecha3_link);
var result = moment(fl3).add('weeks', weekLeft);
var res = moment(result).format('D MMMM YYYY');
$("#fpp3").val(res);
})

$("#sono4").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono4").val();
$("#rest4").val(weekLeft);
//2- Calcul FPP
var fecha4_link = $("#fecha4_link");
var fl4 = moment(fecha4_link);
var result = moment(fl4).add('weeks', weekLeft);
var res = moment(result).format('D MMMM YYYY');
$("#fpp4").val(res);
})

//========================================================================


$("#fpp_cal_ges").keyup(function (e) {
var dfumcg_link = $('dfumcg_link').val();
//var fum = "01 01 2018"; 
var result = moment(dfumcg_link).add('days', 277);
var res = moment(result).format('D MMMM YYYY');
$("#fpp_cal_ges").val(res);
})
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


//========================Update Pediatrico=================================




$(".hide_acciones_obs").on('click', function (e) {
	$(this).hide();
	$(".save_ant_obs_hide").slideDown();
	$("input").prop("disabled", false);
   
}
)


//====navegador=========================

$("#id_obs").on('change', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$(".backg").css("background-color", "rgb(207,207,207)");
$(".save_ant_obs_hide").hide();
var hist_id = $("#hist_id").val();
var id_obs = $("#id_obs").val();
$.ajax({
url: '<?php echo site_url('admin/data_obs_by_id');?>',
type: 'post',
data:{id_obs:id_obs,hist_id:hist_id},
success: function (data) {
$("#hide_obs").hide();
$("#loadf").hide();
$(".backg").hide();
$("#show_obs_data").html(data);
$(".hide_acciones_obs").show();


}
});
});


//==Go back to new obstetrico============

//-------obstetrico--------------------
$("#obstetricohide").on('click', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$(".backg").css("background-color", "rgb(207,207,207)");
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/obstetrico');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$(".hide_acciones_obs").hide();
	$("#loadf").hide();
	$(".backg").hide();
	$(".save_ant_obs_hide").slideDown();
    $("#antechangecolor").css( "color", "#B22222" );
	$("#antechangecolor").css( "font-weight", "" );
	$("#indchangecolor").css( "color", "#191970" );
	$("#obstetricoshow").html(data);
	$("#obstetricoshow").show();
}

});
});

//====================================================
$("#sono1").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono1").val();
$("#rest1").val(weekLeft);
//2- Calcul FPP
var fecha1 = $("#fecha1");
//fecha1 = "01 01 2018";
var result = (moment(fecha1).add(weekLeft, 'weeks').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp1").val(res);
})

$("#sono2").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono2").val();
$("#rest2").val(weekLeft);
//2- Calcul FPP
var fecha2 = $("#fecha2");
var result = (moment(fecha2).add(weekLeft, 'weeks').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp2").val(res);
})

$("#sono3").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono3").val();
$("#rest3").val(weekLeft);
//2- Calcul FPP
var fecha3 = $("#fecha3");
var result = (moment(fecha3).add(weekLeft, 'weeks').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp3").val(res);
})

$("#sono4").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono4").val();
$("#rest4").val(weekLeft);
//2- Calcul FPP
var fecha4 = $("#fecha4");
var result = (moment(fecha4).add(weekLeft, 'weeks').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp4").val(res);
})

//========================================================================
$("#sono4").keyup(function (e) {
//1- Calcul Sem rest	
var weekLeft = 40 - $("#sono4").val();
$("#rest4").val(weekLeft);
//2- Calcul FPP
var todayDate = new Date();
var result = (moment(todayDate).add(weekLeft, 'weeks').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp4").val(res);
})

$("#fum_cal_ges").keyup(function (e) {
//var fpp_cal_ges = $("#fpp_cal_ges").val();	
var fum = $().val(this);
//var fum = "01 01 2018"; 
var result = (moment(fum).add(277, 'days').calendar());
var res = moment(result).format('D MMMM YYYY');
$("#fpp_cal_ges").val(res);
})
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

$('.required-info').hide();

$("#hide_update2").hide();
$("#hide_update2").slideDown(1000);

//-------------------Save Obstetrico-------------------------------------------

//$('input').on('click', function(event) {
	//$('.required-info').slideUp('fast');
//});


//$('#formObstetrico').on('submit', function(event) {
$('#save_ant_obst').on('click', function(event) {
event.preventDefault();
//if (! $('.thischeckbox')[0].checked){
    //  $('.required-info').fadeIn('fast');
      // return false;
    //}
		
		
if($(".required-input").val() == ""){
$('.required-info').fadeIn();
return false;
};
var operationobs = $("#operationobs").val();
//$("html, body").animate({ scrollTop: 0 }, 500);

var hist_id = $("#hist_id").val();
var inserted_by = $("#inserted_by").val();
var dia1  = $('input:radio[name=dia1]:checked').val();

  var radioList = $("#formObstetrico").find('input:radio');

 
      var radioNameList = new Array();
      var radioUniqueNameList = new Array();
      var notCompleted = 0;
      for(var i=0; i< radioList.length; i++){
          radioNameList.push(radioList[i].name);
      }
      radioUniqueNameList = jQuery.unique( radioNameList );
      for(var i=0; i< radioUniqueNameList.length; i++){
          if(typeof($('input:radio[name='+radioUniqueNameList[i]+']:checked').val()) === "undefined"){
              $('.required-info').fadeIn();
              notCompleted++;
          }
        }
     if(notCompleted > 0){
         return false;
     };




var tbc1 = $('input:radio[name=tbc1]:checked').val();
var hip1 = $('input:radio[name=hip1]:checked').val();
var pelv = $('input:radio[name=pelv]:checked').val();
var inf = $('input:radio[name=inf]:checked').val();
var otros1 = $('input:radio[name=otros1]:checked').val();
var otros1_text = $("#otros1_text").val();

var otros2_text = $("#otros2_text").val();
var gem  = $('input:radio[name=gem]:checked').val();
var otros2 = $('input:radio[name=otros2]:checked').val();
var dia2   = $('input:radio[name=dia2]:checked').val();
var tbc2 = $('input:radio[name=tbc2]:checked').val();
var hip2 = $('input:radio[name=hip2]:checked').val();

var fiebre1 = [];
$("input[name='fiebre']:checked").each(function(){
fiebre1.push(this.value);
});
var artra1 = [];
$("input[name='artra']:checked").each(function(){
artra1.push(this.value);
});
var mia1 = [];
$("input[name='mia']:checked").each(function(){
mia1.push(this.value);
});
var exa1 = [];
$("input[name='exa']:checked").each(function(){
exa1.push(this.value);
});
var con1 = [];
$("input[name='con']:checked").each(function(){
con1.push(this.value);
});

var nig11 = [];
$("input[name='nig1']:checked").each(function(){
nig11.push(this.value);
});

var nig22 = [];
$("input[name='nig2']:checked").each(function(){
nig22.push(this.value);
});

var nig33 = [];
$("input[name='nig3']:checked").each(function(){
nig33.push(this.value);
});

var partos = $("#partos").val();
var arbotos = $("#arbotos").val();
var vaginales = $("#vaginales").val();
var viven = $("#viven").val();
var gestas = $("#gestas").val();
var cesareas = $("#cesareas").val();
var muertos1 = $("#muertos1").val();
var nacidov1 = $("#nacidov1").val();
var nacidom1 = $("#nacidom1").val();
var despues1s = $("#despues1s").val();
var otrosc = $("#otrosc").val();
var fin = $("#fin").val();
var rn = $("#rn").val();
var fecha1 = $("#fecha1").val();
var fecha2 = $("#fecha2").val();
var fecha3 = $("#fecha3").val();
var fecha4 = $("#fecha4").val();
var sono1 = $("#sono1").val();
var sono2 = $("#sono2").val();
var sono3 = $("#sono3").val();
var sono4 = $("#sono4").val();
var fpp1 = $("#fpp1").val();
var fpp2 = $("#fpp2").val();
var fpp3 = $("#fpp3").val();
var fpp4 = $("#fpp4").val();
var rest1 = $("#rest1").val();
var rest2 = $("#rest2").val();
var rest3 = $("#rest3").val();
var rest4 = $("#rest4").val();  
var peso1 = $("#peso1").val();
var talla1 = $("#talla1").val(); 
var fum_cal_ges = $("#fum_cal_ges").val();
var fpp_cal_ges = $("#fpp_cal_ges").val();
var sem_act_a = $("#sem_act_a").val();
var prev_act = $('input:radio[name=prev_act]:checked').val();  
var prev_act_mes = $("#prev_act_mes").val();
 var r2 = $("#2r").val();
 var sencibil = $('input:radio[name=sencibil]:checked').val(); 
var rh = $('input:radio[name=rh]:checked').val();  
var rh_option = $("#rh_option").val();   
var odont = $('input:radio[name=odont]:checked').val();   
var pelvis = $('input:radio[name=pelvis]:checked').val();    
var papani = $('input:radio[name=papani]:checked').val();
var colp = $('input:radio[name=colp]:checked').val(); 
var cevix = $('input:radio[name=cevix]:checked').val();
var vdrl11 = [];
$("input[name='vdrl1']:checked").each(function(){
vdrl11.push(this.value);
});	

var vdrl22 = [];
$("input[name='vdrl2']:checked").each(function(){
vdrl22.push(this.value);
});
var diasmes = $("#diasmes").val();
 
var pu_fecha1 = $("#pu_fecha1").val();
var pu_fecha2 = $("#pu_fecha2").val();
var pu_fecha3 = $("#pu_fecha3").val();
var pu_t1 = $("#pu_t1").val();
var pu_t2 = $("#pu_t2").val();
var pu_t3 = $("#pu_t3").val();
var pu_pul1 = $("#pu_pul1").val();
var pu_pul11 = $("#pu_pul11").val();
var pu_pul2 = $("#pu_pul2").val();
var pu_pul22 = $("#pu_pul22").val();
var pu_pul3 = $("#pu_pul3").val();
var pu_pul33 = $("#pu_pul33").val();
var pu_ten1 = $("#pu_ten1").val();
var pu_ten11 = $("#pu_ten11").val();
var pu_ten2 = $("#pu_ten2").val();
var pu_ten22 = $("#pu_ten22").val();  
var pu_ten3 = $("#pu_ten3").val();
var pu_ten33 = $("#pu_ten33").val(); 
var pu_inv1 = $("#pu_inv1").val();
var pu_inv2 = $("#pu_inv2").val();
var pu_inv3 = $("#pu_inv3").val();
var loquios1 = $("#loquios1").val();  
var loquios2 = $("#loquios2").val();
var loquios3 = $("#loquios3").val(); 
var getidobs = $("#getidobs").val();
$.ajax({
url: '<?php echo site_url('admin/saveObstetrico');?>',
type: 'post',
data:{getidobs:getidobs,operationobs:operationobs,hist_id:hist_id,inserted_by:inserted_by,dia1:dia1,tbc1:tbc1,hip1:hip1,pelv:pelv,inf:inf,otros1:otros1,otros1_text:otros1_text,
dia2:dia2,tbc2:tbc2,hip2:hip2,gem:gem,otros2:otros2,otros2_text:otros2_text,fiebre1:fiebre1,artra1:artra1,mia1:mia1,exa1:exa1,con1:con1,
nig11:nig11,nig22:nig22,nig33:nig33,partos:partos,arbotos:arbotos,vaginales:vaginales,viven:viven,gestas:gestas,cesareas:cesareas,
muertos1:muertos1,nacidov1:nacidov1,nacidom1:nacidom1,despues1s:despues1s,otrosc:otrosc,fin:fin,rn:rn,fecha1:fecha1,fecha2:fecha2,fecha3:fecha3,
fecha4:fecha4,sono1:sono1,sono2:sono2,sono3:sono3,sono4:sono4,fpp1:fpp1,fpp2:fpp2,fpp3:fpp3,fpp4:fpp4,rest1:rest1,rest2:rest2,rest3:rest3,rest4:rest4,
peso1:peso1,talla1:talla1,fum_cal_ges:fum_cal_ges,fpp_cal_ges:fpp_cal_ges,sem_act_a:sem_act_a,prev_act:prev_act,prev_act_mes:prev_act_mes,r2:r2,
rh:rh,sencibil:sencibil,rh_option:rh_option,odont:odont,pelvis:pelvis,papani:papani,colp:colp,cevix:cevix,vdrl11:vdrl11,vdrl22:vdrl22,diasmes:diasmes,
pu_fecha1:pu_fecha1,pu_fecha2:pu_fecha2,pu_fecha3:pu_fecha3,pu_t1:pu_t1,pu_t2:pu_t2,pu_t3:pu_t3,pu_pul1:pu_pul1,pu_pul11:pu_pul11,pu_pul2:pu_pul2,
pu_pul22:pu_pul22,pu_pul3:pu_pul3,pu_pul33:pu_pul33,pu_ten1:pu_ten1,pu_ten11:pu_ten11,pu_ten2:pu_ten2,pu_ten22:pu_ten22,pu_ten3:pu_ten3,pu_ten33:pu_ten33,
pu_inv1:pu_inv1,pu_inv2:pu_inv2,pu_inv3:pu_inv3,loquios1:loquios1,loquios2:loquios2,loquios3:loquios3},
success: function (data) {
$('.required-info').slideUp();
$("#hide-navegador-obs").hide();
$("#show-navegador-obs").html(data);
$('#msgs').fadeIn('fast').fadeOut(4000).html('La operación se ha realizado con éxito.');
$("html, body").animate({ scrollTop: 0 }, 500);
$("#hide_obs").find("input:text").val(''); 
$("#hide_obs").find("select").not('#id_obs').val('');
$("#hide_obs").find("textarea").val(''); 
$("#hide_obs").find("#numero").val('');  
$("#hide_obs").find('input:checkbox').removeAttr('checked');
$("#hide_obs").find('input:radio').removeAttr('checked');

},

});

});

});
</script>