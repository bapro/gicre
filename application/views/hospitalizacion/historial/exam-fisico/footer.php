<script>

   $("#saveEvaCond").on('click', function(e){
	   e.preventDefault();
	   if($("#saveEvaCond").text()=="Guardar Examen Fis."){
 let peso = $("#3peso").val();
let kg = $("#3kg").val();
let talla = $("#3talla-ef").val();
let imc = $("#3imc").val();
let ta = $("#3ta").val();
let fr = $("#3fr").val();
let fc = $("#3fc").val();
let hg = $("#3hg").val();
let tempo = $("#3tempo").val();
let pulso = $("#3pulso").val();
let glicemia = $("#1glicemia").val();
let fcf = $("#3fcf").val();
let satoe = $("#3satoe").val();
let radio_signo= $("input[name='3radio_signo']:checked").val();
let hallazgo=$("#3hallazgo").val();
let id_hosp=<?=$id_hosp?>;
let user_id=<?=$user_id?>;
let d_centro=<?=$centro_id?>;
let id_patient=<?=$patient_id?>;

$.ajax({
type: 'POST',
dataType: 'json',
url:"<?php echo base_url(); ?>Hosp_exam_fisico/saveExamFisico",
data: {id_patient:id_patient,id_user:user_id,id_hosp:id_hosp,id_centro:d_centro,
fcf:fcf,satoe:satoe,hallazgo:hallazgo,peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemiae:glicemia
},

success: function(response){ //console.log(response);
if(response.status == 1){
$('#examFisRslt').html('<p class="alert alert-success">'+response.message+'</p>');
paginateExFis();
$("#clear-exam-fis")[0].reset();
} else if(response.status == 2){
$('#examFisRslt').html('<p class="alert alert-warning">'+response.message+'</p>');	
}else{
$('#examFisRslt').html('<p class="alert alert-danger">'+response.message+'</p>');
}
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#examFisRslt').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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

</script>