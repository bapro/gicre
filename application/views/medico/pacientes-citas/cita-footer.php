<script>

 $(".show-btn-cita").click(function(){
	 $("#orientation").val(0);
 })
 
$(".show-btn-fac-amb").click(function(){
	 $("#orientation").val(1);
 })


$("#factura-centro").change(function(){
$("#load-fac-div").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $(this).val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
	$('#factura-esp').prop("disabled",false);
	$('#factura-esp').val(null).trigger('change');	
	$("#factura-esp").html(data);
	$("#load-fac-div").hide();
	},

	}); 

});


function getDocFac(val) {
$("#load-fac-div").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//$('#facturar-doc').val(null).trigger('change');
var id_centro= $("#factura-centro").val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	$("#facturar-doc").prop("disabled",false);
	$("#facturar-doc").html(data);
	$("#load-fac-div").hide();
	},
	});
}

$.validator.setDefaults({
    errorElement: "span",
    errorClass: "help-block",
    //	validClass: 'stay',
	
    highlight: function (element, errorClass, validClass) {
        $(element).addClass(errorClass); //.removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass(errorClass); //.addClass(validClass);
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
        }
    
		else {
            error.insertAfter(element);
        }
    }
});

$(document).ready(function () {

    $('.select2').on('change', function () {
        $(this).valid();
    });

     $('.select2').select2({ 
  placeholder: "SELECCIONAR",
  allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

    var validator = $("#sendcita").validate();	
	
$('#causa').select2({ 
placeholder: "SELECCIONAR",
tags: true

});

$('.emergencia').select2({ 
placeholder: "SELECCIONAR",
tags: true

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
        linkFormat: "dddd",
		 startDate: "1900-01-01"
    }).on('changeDate', function (e) {
  $(this).focus();
  $(this).validate('revalidateField', 'eventDate');
 
   
});



$('#dateOfBirth').datetimepicker({
    format: 'DD-MM-YYYY',
	locale:'es'
}).on('dp.change', function(e) {
    //
    // on date change get current date and format as weekday
    //
    $('#mirror_field').val(e.date.format('YYYY-MM-DD'));
	display_age();
});


function display_age(){
	$("#load-time-age").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
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
	$("#load-time-age").hide();
		 }
	 
		 else{
			 textage.style.display='none';
		 var age_result= n - dateofbirth+' año(s)';
		document.getElementById('age').value=age_result;
		$("#load-time-age").hide();
		 }
	
	}
	

	
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
	
	
  function get_detail()
{
 var size=$('#picture')[0].files[0].size;
 var extension=$('#picture').val().replace(/^.*\./, '');

 switch (extension) {
            case 'png': case 'jpeg': case 'jpg':
              $('#divFiles').hide();
			   $('.photo_location').val("2");
				 $('.enable-send').prop("disabled", false);
                break;
           // case 'html': case 'htm':
              //  $('#divFiles').text('File type: ' + fileExtension);
           // case 'pdf':
               // $('#divFiles').text('File type: ' + fileExtension);
              //  break;
            default:
			$('#picture').val("");
			$('#divFiles').show();
			  $('#divFiles').text('Esta extension es prohibida : ' + extension );
			  // $("#file_detail").html("File Size : "+size+" <br>Extension : "+extension+"");
              $('.enable-send').prop("disabled", true);
        }
 
 
 
//var valid_extensions = array('jpeg', 'jpg', 'png', 'gif');	
// $("#divFiles").html("File Size : "+size+" <br>Extension : "+extension+"");
}	




	$('#fechaPro').datetimepicker({
    format: 'DD-MM-YYYY',
	//minDate: new Date(),
	locale:'es',
	  widgetPositioning: {
         horizontal: 'auto',
        vertical: 'bottom'
        }
}).on('dp.change', function(e) {
    $('#weekday').val(e.date.format('dddd'));
  /*$.get( "<?php echo base_url();?>admin_medico/daySelected?day="+$('#weekday').val()+"&doc="+<?=$id_user?>+"&fecha_propuesta1="+$('#fecha_propuesta1').val(), function( data ){
	$( "#horario-info").html(data).css('color','red');    
	});*/
	var day=$('#weekday').val();
	var doc=$('#doctor_dropdown').val();
	var centro_medico=$('#centro_medico').val();
	var fecha_propuesta1 =$('#fecha_propuesta1').val();
	var id_patient="0";
	if(day !="" &&  doc !="" && centro_medico !="" && fecha_propuesta1 !=""){
		 $("#horario-info").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$.ajax({
	type: "POST",
	url: "<?=base_url('admin_medico/daySelected')?>",
	data: {day:day,doc:doc,fecha_propuesta1:fecha_propuesta1,centro_medico:centro_medico,id_patient:id_patient},
	cache: true,
	success:function(data){ 
	$( "#horario-info").html(data).css('color','red'); 

	},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$( "#horario-info").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 	
	});
	}	
});



$("#centro_medico").change(function(){
$("#load-time").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#centro_medico").val();
$('#especialidad').val(null).trigger('change');
//$('#doctor_dropdown').val(null).trigger('change');
$('#fecha_propuesta1').prop("disabled",false);	
//$('#fecha_propuesta1').val("");
$( "#horario-info").html(""); 
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#especialidad").prop("disabled",false);
	$("#especialidad").html(data);
	$("#load-time").hide();
	},

	});
});

function getDoc(val) {
$("#load-time").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
//$('#doctor_dropdown').val(null).trigger('change');
var id_centro= $("#centro_medico").val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	$("#doctor_dropdown").prop("disabled",false);
	$("#doctor_dropdown").html(data);
	$("#load-time").hide();
	},
	});
}


$("#doctor_dropdown").change(function(){
$('#fecha_propuesta1').prop("disabled",false);	
$('#fecha_propuesta1').val("");
$( "#horario-info").html(""); 
});


$("#hosp_centro").change(function(){
$("#load-time").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#hosp_centro").val();
$('#hosp_esp').val(null).trigger('change');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#hosp_esp").prop("disabled",false);
	$("#hosp_esp").html(data);
	$("#load-time").hide();
	},

	});
	
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospSala');?>',
	data:'id_centro='+id,
	success: function(data){
	
	$("#hosp_sala").html(data);
	
	},

	});
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospServ');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#hosp_servicio").html(data);
	
	},

	});
	
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospCama');?>',
	data:'id_centro='+id,
	success: function(data){
	$("#hosp_cama").html(data);

	},

	});
	
	
});





function getDocHosp(val) {
$("#load-time").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var id_centro= $("#hosp_centro").val(); 
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	$("#hosp_doctor").prop("disabled",false);
	$("#hosp_doctor").html(data);
	$("#load-time").hide();
	},
	});
}
</script>