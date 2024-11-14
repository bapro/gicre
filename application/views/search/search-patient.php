<script type="text/javascript">


$('.enabled-search').on('change', function(event) {
	if($(this).val()==""){
		$('.search-patient').prop("disabled",true); 
	}else{
	$('.search-patient').prop("disabled",false); 
	}
});


var timer = null;
$('.search-patient').on('keyup', function(event) {
	$("#patientHintNombres").html('');
		$(".suggesstion-box").html('');
let input_class = $(this).prop('class').split(' ').slice(-1);
if(input_class=='search-patient-ced' && $(this).val() !=""){
	let digit=11- $(this).val().length;
let info;
let falta;
	//convert cedula to array
	let cedArray = $(this).val().split("");
	cedArray.splice(3, 0, "-"); //add - after position 3
    cedArray.splice(11, 0, "-");//add - after position 10
	if(digit==1){
		info='cifra';
		falta='falta';
	}else{
	info='cifras';
falta='faltan';	
	}
$("#missing-cedula").text(cedArray.join('') + falta + " " + digit + " " +info ).css('font-style','italic').css('color','#001340');
if(digit==0){
	$("#missing-cedula").text('espere...').css('font-style','italic').css('color','#001340');
typingPatientSearch($(this).val(), input_class);
}
} else if(input_class=='search-patient-nombres'){
   $('.search-patient-nombres').val(capitalizeTheFirstLetterOfEachWord($('.search-patient-nombres').val()));	
	   
	var text=$('.search-patient-nombres').val().split(' ')[1];
if(text){
$('#missing-apellido').html("");
typingPatientSearch($(this).val(), input_class);
}else{
$('#missing-apellido').html("falta apellido").css('font-style','italic').css('color','#001340');
}
	 	   
}else{
typingPatientSearch($(this).val(), input_class);
}
});





function typingPatientSearch(seach_content,input_class){
	if(seach_content){
$.ajax({
		type: "POST",
	url:"<?php echo base_url(); ?>search/getPatientSearchResult",
		data:{seach_content:seach_content,input_class:input_class,table:$("#where-search-is-from").text(),id_user:<?=$id_user?>},
    beforeSend: function(){
			$(".search-patient").css("background","#DCDCDC");
			$(".suggesstion-box").html('buscando...').css('font-style','italic').css('color','#001340');
		},
	success: function(data){
			$(".suggesstion-box").show();
			$(".suggesstion-box").html(data);
      $(".search-patient").css("background","");
	  $("#patientHintNombres").html('');
	  $('#missing-apellido').html("");
	  $("#missing-cedula").text("");
		},
		});
	}
};

function capitalizeTheFirstLetterOfEachWord(words) {
   var separateWord = words.toLowerCase().split(' ');
   for (var i = 0; i < separateWord.length; i++) {
      separateWord[i] = separateWord[i].charAt(0).toUpperCase() +
      separateWord[i].substring(1);
   }
   return separateWord.join(' ');
}


function selectThisPatient(id_patient) {
	var idDoc = $('#select-medico-fac').val();
	var idCent = $('#select-centro-fac').val();
	$("#patientHintNombres").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
		type: "POST",
	url:"<?php echo base_url(); ?>search/patientResult",
		data:{idDoc:idDoc,id_user:<?=$id_user?>,idCent:idCent,id_patient:id_patient,table:$("#where-search-is-from").text()},
	success: function(data){
			$(".suggesstion-box").html('');
			$("#patientHintNombres").html(data);
			 $(".search-patient").val('');
     	},
	});	

}

function onlyNumberNec(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode >= 48 && charCode <=57) {
        return  true;
    }
    return false;
    };
	
	
	
	$('.select2').select2({
placeholder: "Seleccionar",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});
	
	</script>