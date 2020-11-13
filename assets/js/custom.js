   $(".myModalArea").click(function (){
	 var ida = $(this).closest("tr").find(".ida").text();
	var idtitle = $(this).closest("tr").find(".ida").text();
	var especialidad = $(this).closest("tr").find(".especialidad").text();
	 $('#especialidad').val(especialidad);
	 $('#ida').val(ida);
	 $('#idtitle').val(idtitle);
	
})

//-------------------modal edit seguro medico ---------------------------


   $(".myModalSeguroMedico").click(function (){
	 var idsm = $(this).closest("tr").find(".idsm").text();
	var seguro_medico = $(this).closest("tr").find(".seguro_medico").text();
	 $('#seguro_medico').val(seguro_medico);
	 $('#idsm').val(idsm);
	 $('#idtitlesm').val(idsm);
	
})


  $(".myModalCausa").click(function (){
	 var ida = $(this).closest("tr").find(".ida").text();
	var idtitle = $(this).closest("tr").find(".ida").text();
	var causa = $(this).closest("tr").find(".causa").text();
	 $('#causa').val(causa);
	 $('#ida').val(ida);
	 $('#idtitle').val(idtitle);
	
})



//--------------------------------------------------------------

$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ ],

    } );

    $('.example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ ],

    } );
} );



 //check if validity por area
$(document).ready(function() {
$('#save_area').click(function(e) {
// Initializing Variables With Form Element Values
var area = $('#area').val();
// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;

// To Check Empty Form Fields.
if (area.length == 0) {
$('#blanck').text("* Este campo es obligatorio *"); // This Segment Displays The Validation Rule For All Fields
$("#area").focus();

return false;
}
// Validating Name Field.
if (!area.match(name_regex) || area.length == 0) {
$('#p1').text("* Para este campo, use solo alfabetos *"); // This Segment Displays The Validation Rule For Name
$("#area").focus();

return false;
}
// Validating Username Field.

// Validating Select Field.
//else {
//alert("Form Submitted Successfuly!");
//return true;
//}
});
});




 //check if validity por seguro medico
$(document).ready(function() {
$('#save_seguro_medico').click(function(e) {
// Initializing Variables With Form Element Values
var seguro_me = $('#seguro_me').val();
// Initializing Variables With Regular Expressions
var name_regex_s = /^[a-zA-Z]+$/;

// To Check Empty Form Fields.
if (seguro_me.length == 0) {
$('#blancks').text("* Este campo es obligatorio *"); // This Segment Displays The Validation Rule For All Fields
$("#seguro_me").focus();

return false;
}
// Validating Name Field.
if (!seguro_me.match(name_regex_s) || seguro_me.length == 0) {
$('#ps').text("* Para este campo, use solo alfabetos *"); // This Segment Displays The Validation Rule For Name
$("#seguro_me").focus();

return false;
}
// Validating Username Field.

// Validating Select Field.
//else {
//alert("Form Submitted Successfuly!");
//return true;
//}
});
});


//datetimepicker
$('.form_datetime').datetimepicker({
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy",
        linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
    });
	
	
	//
	
	$('.form_pro').datetimepicker({
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy - hh:ii:s",
        linkField: "mirror_pro",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
    });
	$(".form_pro").datetimepicker( "setDate", new Date());
	//----------
function display_age(){
	var date_nacer=document.getElementById('date_nacer').value;
	var textage=document.getElementById('incorect_age');
	var dateinsert=document.getElementById('mirror_field').value;
    var datefrom = new Date(dateinsert);
   var dateto = new Date();
    var dateofbirth = date_nacer.slice(-4);
		var d = new Date();
         var n = d.getFullYear();
		  var currentm = d.getMonth();
		 if(datefrom > dateto)
		 {
			//textage.innerHTML += 'No puede nacer despues este año.';
			textage.style.display='block';
		document.getElementById('date_nacer').value = "";
		document.getElementById('age').value = ""; 
		 }
		 else if(dateofbirth==n)
		 { 
	 textage.style.display='none';
	       var nocando = datefrom<dateto ? null : 'datefrom > dateto!'
    ,diffM = nocando || 
             dateto.getMonth() - datefrom.getMonth() 
              + (12 * (dateto.getFullYear() - datefrom.getFullYear()))
    ,diffY = nocando || Math.floor(diffM/12)
    ,diffD = dateto.getDate()-datefrom.getDate()
    ,diffYM = nocando || 
                diffM%12+' mes(es) '+(diffD>0? (diffD+' día(s)') : '') ;
    document.getElementById("age").value = diffYM;
		 }
	 
		 else{
			 textage.style.display='none';
		 var age_result= n - dateofbirth+' año(s)';
		document.getElementById('age').value=age_result;
		 }
	
	}

  //cita validation
  
  
$('#sendc').click(function() {
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var emailaddressVal = $("#emailtest").val();
if($("#nombre").val() == ""){
$("#nombre").focus();
$('#nombre').css('border', '2px solid'); 
$('#nombre').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#nombre').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}



/*if($("#cedula").val() == ""){
$("#cedula").focus();
$('#cedula').css('border', '2px solid'); 
$('#cedula').css('border-color', 'red'); 
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#cedula').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}*/

if($("#selectnacimento").val() == ""){
$("#selectnacimento").focus();
$('#selectnacimento').css('border', '2px solid'); 
$('#selectnacimento').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#selectnacimento').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}
if($("#date_nacer").val() == ""){
$("#date_nacer").focus();
$('#date_nacer').css('border', '2px solid'); 
$('#date_nacer').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#date_nacer').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#form_phonecel").val() == ""){
$("#form_phonecel").focus();
$('#form_phonecel').css('border', '2px solid'); 
$('#form_phonecel').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#form_phonecel').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

/*if($("#emailtest").val() == ""){
$("#emailtest").focus();
$('#emailtest').css('border', '2px solid'); 
$('#emailtest').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#emailtest').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}*/

if(!emailReg.test(emailaddressVal)){
$("#emailtest").focus();
$('#emailtest').css('border', '2px solid'); 
$('#emailtest').css('border-color', 'red');
$("#incorectemail").text("Introduzca una dirección de correo electrónico válida !");
$("#incorectemail").slideDown("slow");
return false;
}

if($("#sexo").val() == ""){
$("#sexo-focus").focus();
 $('span.select2-selection').css('border-color', 'red');
//$('.sex').find('#sexo').find('.select2-selection').css('border-color', 'red');
//$('span.select2-selection').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('span.select2-selection').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#estado_civil").val() == ""){
$("#estado_civil").focus();
$('#estado_civil').css('border', '2px solid'); 
$('#estado_civil').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#estado_civil').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#nacionalidad").val() == ""){
$("#nacionalidad").focus();
$('.na').find('.select-examsis').find('.btn').css('border', '2px solid'); 
$('.na').find('.select-examsis').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
$('.na').find('.bootstrap-select').find('.btn').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}


if($("#provincia").val() == ""){
$("#provincia").focus();
$('.pro').find('.bootstrap-select').find('.btn').css('border', '2px solid'); 
$('.pro').find('.bootstrap-select').find('.btn').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
$('.pro').find('.bootstrap-select').find('.btn').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}
if($("#municipio_dropdown").val() == -1){
$("#municipio_dropdown").focus();
$('#municipio_dropdown').css('border', '2px solid'); 
$('#municipio_dropdown').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('#municipio_dropdown').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#causa").val() == ""){
$("#causa").focus();
$("#causa").css('border', '2px solid'); 
$("#causa").css('border-color', 'red');
$(".missingc").slideDown("slow");
$(".datoscitas").slideDown("slow");
for(i=0;i<3;i++) {
$("#causa").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#centro_medico").val() == ""){
$("#centro_medico").focus();
$("#centro_medico").css('border', '2px solid'); 
$("#centro_medico").css('border-color', 'red');
$(".missingc").slideDown("slow");
$(".datoscitas").slideDown("slow");
for(i=0;i<3;i++) {
$("#centro_medico").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}

if($("#especialidad").val() == ""){
$("#especialidad").focus();
$("#especialidad").css('border', '2px solid'); 
$("#especialidad").css('border-color', 'red');
$(".missingc").slideDown("slow");
$(".datoscitas").slideDown("slow");
for(i=0;i<3;i++) {
$("#especialidad").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}


if($("#doctor_dropdown").val() == -1){
$("#doctor_dropdown").focus();
$('#doctor_dropdown').css('border', '2px solid'); 
$('#doctor_dropdown').css('border-color', 'red');
$(".missingc").slideDown("slow");
$(".datoscitas").slideDown("slow");
for(i=0;i<3;i++) {
  $('#doctor_dropdown').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}
//---------------------
});


$('#nombre').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
$(".missingdp").fadeOut(1500);
$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

}   
});



$('#cedula').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

}   
});

$('#date_nacer').change(function() {

var input = $(this);

if( input.val() != "" ) {
	$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

}   
});

$('#form_phonecel').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

}   
});

$('#emailtest').keyup(function() {

var input = $(this);
if(input.val() != "" ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );
$("#incorectemail").slideUp("slow");

}   
});


$('#sexo').change(function() {

var input = $(this);
if(input.val() != "" ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

}   
});
$('#estado_civil').change(function() {
var input = $(this);
if(input.val() != "" ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

} 
});

$('#nacionalidad').change(function() {
var input = $(this);
if(input.val() != "" ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
$('.na').find('.select-examsis').find('.btn').css( "border", "1px solid #38a7bb" );

}
}); 



$('#provincia').change(function() {
var input = $(this);
if(input.val() != "" ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
$('#provincia').css( "border", "1px solid #38a7bb" );

} 
});

$('#municipio_dropdown').change(function() {
var input = $(this);
if(input.val() != -1 ){
$(".missingdp").fadeOut(1500);$(".datosp").fadeOut(1500);
input.css( "border", "1px solid #38a7bb" );

} 
});

$('#causa').change(function() {
var input = $(this);
if(input.val() != "" ){
$('#causa').css( "border", "1px solid #38a7bb" );
$(".missingc").slideUp("slow");
$(".datoscitas").slideUp("slow");
} 
});

$('#centro_medico').change(function() {
var input = $(this);
if(input.val() != "" ){
$('#centro_medico').css( "border", "1px solid #38a7bb" );
$(".missingc").slideUp("slow");
$(".datoscitas").slideUp("slow");
} 
});

$('#especialidad').change(function() {
var input = $(this);
if(input.val() != "" ){
$('#especialidad').css( "border", "1px solid #38a7bb" );
$(".missingc").slideUp("slow");
$(".datoscitas").slideUp("slow");
} 
});


$('#doctor_dropdown').change(function() {
var input = $(this);
if(input.val() != -1 ){
$('#doctor_dropdown').css( "border", "1px solid #38a7bb" );
$(".missingc").slideUp("slow");
$(".datoscitas").slideUp("slow");
} 
});


jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
            $('#backToTop').fadeIn('slow');
        } else {
            $('#backToTop').fadeOut('slow');
        }
    });
    $('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });

});


 //check if validity por area
$(document).ready(function() {
$('#save_disease').click(function(e) {
// Initializing Variables With Form Element Values
var disease = $('#disease').val();
// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;

// To Check Empty Form Fields.
if (disease.length == 0) {
$('#blanckd').text("* Este campo es obligatorio *"); // This Segment Displays The Validation Rule For All Fields
$("#disease").focus();

return false;
}
// Validating Name Field.
if (!disease.match(name_regex) || disease.length == 0) {
$('#p1').text("* Para este campo, use solo alfabetos *"); // This Segment Displays The Validation Rule For Name
$("#disease").focus();

return false;
}

});
});