<script>
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
   tags: true, 
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
    }).on('changeDate', function (e) {
  $(this).focus();
  $(this).validate('revalidateField', 'eventDate');
 
   
});
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
	
	
/*
function age1(val){
//current year
	var dteNow = new Date();
	var intYear = dteNow.getFullYear();
		//current month
	var currentm = dteNow.getMonth();
	
	if (val == intYear){
	var month = $("#month").val();
	var age1= currentm - month+' mese(s)';
	 $("#patient_age").val(age1);
	} 
	else 
		{
	var age= intYear - val+' año(s)';
	 $("#patient_age").val(age);
	}

};
$('#month').change(function(){
$('#year').val(null).trigger('change');
 });*/
	
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
             // $('.enable-send').prop("disabled", true);
        }
 
 
 
//var valid_extensions = array('jpeg', 'jpg', 'png', 'gif');	
// $("#divFiles").html("File Size : "+size+" <br>Extension : "+extension+"");
}	
</script>