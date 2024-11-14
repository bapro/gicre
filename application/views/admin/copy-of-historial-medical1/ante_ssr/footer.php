<script>
$(".color-green").css( "color","green" );

$('.fecha_ul_m1').datetimepicker({
weekStart: 1,
todayBtn:  1,
autoclose: 1,
todayHighlight: 1,
startView: 2,
minView: 2,
forceParse: 0,
endDate: '+0d',
linkField: "fecha_ul_mc1",
}).on('changeDate', function (e) {
$("#fecha_ul_m_info1").css( "color","green" );
var today = moment();
var fecha_ul_m_c = $("#fecha_ul_mc1").val();
var moment1 = moment(fecha_ul_m_c);
var result = moment(moment1).add('days', 14);
var fUltimaM = moment(result).format('D MMMM YYYY');

var menosDay=moment(result).subtract('days', 3);
var menosDay1 = moment(menosDay).format('D MMMM YYYY');


var masDay=moment(result).add('days', 3);
var masDay1 = moment(masDay).format('D MMMM YYYY');
var tiempoAmeno=today.diff(moment1, "weeks");
if(tiempoAmeno >= 5){
$("#amenorea-alert1").css( "color","red" );
$("#amenorea-alert1").addClass("fa fa-warning");
$("#amenorea-text1").css( "color","red" );	
} else{
$("#amenorea-alert1").hide();
$("#amenorea-text1").css( "color","green" );	
}
var diff = moment.duration(today.diff(moment1));
if(diff.days()%7==0){
	var diaLeft="";
} else{
var diaLeft=diff.days()%7 + ' dia(s)';	
}
$("#fecha-ovulacion1").text('Fecha de ovulacion : '+ fUltimaM); 
$("#semana-fertil1").text('Semana fertil :' + menosDay1 + ' hasta '  + masDay1); 
$("#amenorea-text1").text('Tiempo amenorea : '   +  tiempoAmeno +" semana(s)  "+ diaLeft);
$("#amenorea-tiempo1").text(tiempoAmeno);
});

//----------------------------------------------------------------------------

$('#save_ant_ssr_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var idssr  = $("#idssr").val();

var optradio = $('input:radio[name=optradio1]:checked').val();
var edad = $("#edad1").val();

var numero = $("#numero1").val();
var sexual = $("#sexual").val();
var pareja = $("#pareja1").val();
var califica_text = $("#califica_text1").val();
var menarquia = $("#menarquia1").val();
var planif_text = $("#planif_text1").val();
var fecha_ul_m = $("#fecha_ul_m1").val();
var fechaOvulacion = $("#fecha-ovulacion1").text();
var semanaFertil = $("#semana-fertil1").text();
var amenoreaText = $("#amenorea-text1").text();
var amenoreaTiempo = $("#amenorea-tiempo1").text();
var fecha_ul_m_info = $("#fecha_ul_m_info").text();
var amenorea_text = $("#amenorea-text").text();
var cliclo_text = $("#cliclo_text1").val();
var dura_sang = $("#dura_sang1").val();
var ant_pap_re_text = $("#ant_pap_re_text1").val();
var realiza_auto_text = $("#realiza_auto_text1").val();
var planif = $('input:radio[name=planif1]:checked').val();
var embara = $('input:radio[name=embara1]:checked').val();
var menaop = $('input:radio[name=menaop1]:checked').val();
var cliclo = $('input:radio[name=cliclo1]:checked').val();
var dismeno = $('input:radio[name=dismeno1]:checked').val();
var ant_pap_re = $('input:radio[name=ant_pap_re1]:checked').val();
var realiza_auto = $('input:radio[name=realiza_auto1]:checked').val();
var fecha_ul_mama = $('input:radio[name=fecha_ul_mama1]:checked').val();
var cant_sang = $('input:radio[name=cant_sang1]:checked').val();
var nuligesta = $('input:radio[name=nuligesta1]:checked').val();
var complica = $('input:radio[name=complica1]:checked').val();
var complica_dur = $('input:radio[name=complica_dur1]:checked').val();
var infec_tran = $('input:radio[name=infec_tran1]:checked').val();
var califica = $('input:radio[name=califica1]:checked').val();
var utilizo = $('input:radio[name=utilizo1]:checked').val();
var sexual2 = $('input:radio[name=sexual21]:checked').val();
var fecha_ul_pap = $('input:radio[name=fecha_ul_pap1]:checked').val();
var totalGest = $("#totalGest1").val();
var e = $("#e1").val();
var p = $("#p1").val();
var a = $("#a1").val();
var c = $("#c1").val();
var complica_text = $("#complica_text1").val();
var otro_infeccion1 = $("#otro_infeccion11").val();
var complica_dur_text = $("#complica_dur_text1").val();
var sifilisc1 = [];
$("input[name='sifilis1']:checked").each(function(){
sifilisc1.push(this.value);
});

var gonorreac1 = [];
$("input[name='gonorrea1']:checked").each(function(){
gonorreac1.push(this.value);
});


var clamidiac1 = [];
$("input[name='clamidia1']:checked").each(function(){
clamidiac1.push(this.value);
});
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveEditAntssr')?>",
data: {idssr:idssr,edad:edad,optradio:optradio,numero:numero,sexual:sexual,pareja:pareja,
califica:califica,califica_text:califica_text,utilizo:utilizo,sexual2:sexual2,
planif:planif,planif_text:planif_text,embara:embara,menarquia:menarquia,
fechaOvulacion:fechaOvulacion, semanaFertil:semanaFertil, amenoreaText:amenoreaText, amenoreaTiempo:amenoreaTiempo,
fecha_ul_m:fecha_ul_m,menaop:menaop,cliclo:cliclo,cliclo_text:cliclo_text,
dura_sang:dura_sang,dismeno:dismeno,fecha_ul_pap:fecha_ul_pap,ant_pap_re:ant_pap_re,
ant_pap_re_text:ant_pap_re_text,realiza_auto:realiza_auto,realiza_auto_text:realiza_auto_text,
fecha_ul_mama:fecha_ul_mama,p:p,a:a,c:c,e:e,totalGest:totalGest,
otro_infeccion1:otro_infeccion1,cant_sang:cant_sang,nuligesta:nuligesta,complica:complica,
complica_text:complica_text,complica_dur:complica_dur,complica_dur_text:complica_dur_text,
sifilisc:sifilisc1,gonorreac:gonorreac1,clamidiac:clamidiac1,infec_tran:infec_tran,updated_by:updated_by},

cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_ant_ssr').slideDown();
	$(".save_ant_ssr_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});


$('input[name="date_fum"]').mask('00/00/0000', {placeholder: '--/--/----'});
$('.totgen1').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});
$('.totgen1').keyup(function () {

// initialize the sum (total price) to zero
var sum = 0;

// we use jQuery each() to loop through all the textbox with 'price' class
// and compute the sum for each loop
$('.totgen1').each(function() {
sum += Number($(this).val());
});

// set the computed value to 'totalPrice' textbox
$('#totalGest1').val(sum);

});

//-------------------------------------------------------------------------------



//-----------------------------------------------------------

$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_ant_ssr").on('click', function (e) {
	$('.show_modif_ant_ssr').hide();
	$(".save_ant_ssr_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)


$('input[name="date_fum1"]').mask('00/00/0000', {placeholder: '--/--/----'});




$('.fecha-ul-mama1').change(function(){
  if($(this).val()=='Nunca' || $(this).val()=='Mas de tres anos' ||  $(this).val()=='Entre uno a tres anos') {
	  $('.li21').show();
	  $('#hide-first-ol').slideUp();
    $('.alert-ssr-mama1').slideDown();
	var texto=" Fecha de ultima mamagrafia : " + $(this).val();
	$('.fecha-ultima-mama-value1').text(texto);
  } else {
	  $('#hide-first-ol').slideUp();
	  $('.li21').hide();
    $('.alert-ssr-mama1').hide();
	$('.fecha-ultima-mama-value1').text("");
  }
});





$('.fecha-ul-pap1').change(function(){
  if($(this).val()=='Nunca' || $(this).val()=='Mas de tres anos' ||  $(this).val()=='Entre uno a tres anos') {
   $('.li31').show();
   $('#hide-ol-f-u-p').slideUp();
   $('.alert-ssr1').slideDown();
	var texto=" Fecha de ultima PAP : " + $(this).val();
	$('.fecha-ultima-pap-value1').text(texto);
  } else {
	   $('#hide-ol-f-u-p').slideUp();
	  $('.li31').hide();
    $('.alert-ssr1').hide();
	$('.fecha-ultima-pap-value1').text("");
  }
});




$('.ant-pap-re1').change(function(){
  if($(this).val()=='Si') {
	   $('.li41').show();
	   $('#hide-ol-a-p-r-t').slideUp();
    $('.alert-ssr-pap1').slideDown();
		var texto=" Antecedentes de PAP Resultados Alterados o Anormales : ";
	$('.ant-pap-re-value1').text(texto);
  } else {
	  $('#hide-ol-a-p-r-t').slideUp();
	   $('.li41').hide();
    $('.alert-ssr-pap1').hide();
	$('.ant-pap-re-value1').text("");
	$('#ant_pap_re_text1').text("");
  }
});


$('#ant_pap_re_text1').keyup(function(){
	var texto="(" + $(this).val() + " )";
$('#desc-ant-pap1').text(texto);   
});





$('.metodo-planif1').change(function(){
  if($(this).val()=='Si') {
	 $('.si-usa-metodo-plan1').slideDown(); 
	 $('.txt-p').slideDown(); 
  } else {
   $('.si-usa-metodo-plan1').slideUp();
   $('.txt-p').slideUp(); 
$('#planif_text1').val('');
$('.li11').hide();
 $('#hide-ol-plan-text').hide(); 
  }
});

$('#planif_text1').change(function(){
$('.li11').show();
var texto="Metodo de planificacion familial : "+ $(this).val();
$('.si-usa-metodo-plan-que1').text(texto);
});







$('.infec-trans1').change(function(){
  if($(this).val()=='Si') {
	 $(".alert-sex1").show();
	$("#show-inf-sex1").show();
	 $('#display_ifts1').slideDown(); 
  } else {
	 $(".alert-sex1").hide();
	 $("#show-inf-sex1").hide();
	 $("#trans-sexual-text1").text("");
	 $('#otro_infeccion11').val(""); 
	 $('.infec-trans-val1').removeAttr('checked');
   $('#display_ifts1').slideUp(); 
   $(".hide-ol-sexual-d").hide();
  }
});



$(".infec-trans-val1").on("click", function(){
    if($(this).is(":checked")) {
		$("#show-inf-sex1").show();
		 $(this).closest("td").siblings("td").each(function(){
			 
			var enf=$(this).text() + ".";
          $("#trans-sexual-text1").append(enf).show();
        });
    }
    else {
		$("#show-inf-sex1").show();
     $("#trans-sexual-text1").html("");
     $(".infec-trans-val1:checked").closest("td").siblings("td").each(function(){
		 var enf=$(this).text() + ".";
       $("#trans-sexual-text1").append(enf);
     });
    }
})



$('#otro_infeccion11').keyup(function(){
$("#hide-ol-otros").hide();
$(".hide-ol-sexual-d").hide();
$("#show-inf-sex1").show();
$('#otros-infec-text1').text($(this).val());   
});
</script>