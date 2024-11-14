
<!--IN THE CASE THERE IS NO APPOINTMENT FOR TODAY IN THE BILLING TABLE 
$id_rdv=0;
SHOWING MODAL AFTER SAVE AND ASK DOCTOR IF HE OR SHE WANTS TO BILL THE PATIENT-->

<script>
var id_rdv= $('#id_rdv').val();

var con_data = $("#conclusion_data").val();

function sweetalert2HisSucess(){
Swal.fire({
  title: '<strong>Datos han sido guadado con éxito</strong>',
  icon: 'success',
   html:
    '¿ Desea facturar paciente ?',
 showCancelButton: true,
 cancelButtonText: 'No',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  allowOutsideClick: false,
  confirmButtonText: 'Si!'
}).then((result) => {
  if (result.isConfirmed) {
  window.location.href = "<?php echo site_url("medico/patient_billing_/$centro_type/$id_apoint/$id_user/$centro_medico/$id_seguro")?>"
  }else if (result.isDismissed) {
       location.reload();
    }
})
}





// CALL THIS FUNCTION IF FIELDS ARE REQUIRED
function callSweetalert2Required(response){
Swal.fire({
  icon: 'error',
  title: 'Campos Obligatorios',
  html: '<p style="color:red">'+response.message+'</p>',
  timer: 5000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
}
function pressBtnHist(response){
	
if(response.status == 1){

 $("#enf_motivo").focus();
callSweetalert2Required(response);

$(".enfermedad-menu").addClass("fa fa-asterisk").css('color','red');

} 
else if(response.status == 2){
 $("#enf_signopsis").focus();
callSweetalert2Required(response);
$(".enfermedad-menu").addClass("fa fa-asterisk").css('color','red');

}
else if(response.status == 3){
 $("#floatingDiagOtros-"+con_data).focus();
callSweetalert2Required(response);
 $(".conclusion-menu").addClass("fa fa-asterisk").css('color','red'); 
}
 else if(response.status == 4){
 $("#con_dia_plan").focus();
callSweetalert2Required(response);
 $(".conclusion-menu").addClass("fa fa-asterisk").css('color','red'); 
}
else{
$('#btnSaveHist').prop("disabled",true);
 $('#keepOnSavingOption').val(1);
 console.log('set keepOnSavingOption to 1');
if(id_rdv==0){
	// THERE IS NO BILL FOR TODAY SHOW MODAL TO CONFIRM SAVING AND THE OPTION TO BILL THE PATIENT
	//$('#HistSaveModal').modal('show');
sweetalert2HisSucess();
} else{	
// RELOAD THE PAGE AFTER SAVING THE HISTORIAL
	//stayInHist();
	location.reload();

	
}
}
}







</script>