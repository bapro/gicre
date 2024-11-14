<div class="mt-3 disabled-all-inputs">
<?php

if($seguro_medico_id !=11){

if($password){
	$ws = "";
	echo "<script>$('#sendc').prop('disabled', true);</script>";
}else{
$ws = "none";
echo "<script>$('#sendc').prop('disabled', false);</script>";	
}

?>
<input  type="hidden" id="docCedula" value="<?=$cedulaFormat;?>"  >
<input  type="hidden" id="docPassword" value="<?=$password;?>"  >
<input  type="hidden" id="proveedo" value="<?=$codContrato;?>"  >
<input  type="hidden" id="seguro_medico_id" value="<?=$seguro_medico_id;?>"  >
<input  type="hidden" id="seguro_medico_name" value="<?=$seguro_medico_name;?>"  >

<input  type="hidden" id="idpatient" value="<?=$idpatient;?>"  >





<?php
//if the patient is already created



if($seguro_campo=='No. DE AFILIADO'){
$requiredipt='required';	
}else{
$requiredipt='';	
}
?>
<!-- CREATE SEGURO FOR THE FIRST TIME-->

<table class="table table-borderless disabled-all-inputs" style="width:80%">
<tr>
<td style="width:50%">
<label class="form-label " ><?=$seguro_campo;?></label>
<input  type="text" name="inputname[]"  class="form-control <?=$requiredipt?>" id="<?=$inputname?>" value="<?=$seguro_camp_numero;?>" >
<input  type="hidden" name="inputf[]" class="form-control " value="<?=$seguro_campo;?>" id="<?=$inputf?>" >
</td>
<td style="vertical-align: bottom">
<div class="webServiceResult"></div>
 <button class="btn btn-primary btn-sm"  type="button" style="display:<?=$ws?>" id="ws-check" > Consultar Afiliado </button> 
 </td>
 </tr>
<tr>
<td >
<?php $afiliado=$this->db->select('afiliado')->where('id_p_a',$idpatient)->get('patients_appointments')->row('afiliado');?>

<label  class="form-label">Tipo de afiliado</label>
<br/>

<div class="form-check ">
<?php if($afiliado=='Titular') {
	$checked = 'checked';
}else{
	$checked = '';
}?>
	  <input class="form-check-input" type="radio" name="afiliado" id="afiliado1" value='Titular' <?=$checked?>>
	  <label class="form-check-label" for="afiliado1">
		Titular
	  </label>
	</div>
<div class="form-check ">
<?php if($afiliado=='Depediente') {
	$checked = 'checked';
}else{
	$checked = '';
}?>
	  <input class="form-check-input" type="radio" name="afiliado" id="afiliado2" value='Depediente' <?=$checked?>>
	  <label class="form-check-label" for="afiliado2">
		Depediente
	  </label>
	</div>

</td>
<td>

<label  class="form-label">Plan</label>
<br/>
<?php
$planame=$this->db->select('name')->where('id',$plan)->get('seguro_plan')->row('name');

$sql ="SELECT id, name FROM  seguro_plan";
$querysig = $this->db->query($sql);

foreach ($querysig->result() as $rw){
	if($rw->id==$plan){
		$checked = "checked";
	}else{
		$checked = "";
	}
	?>

<div class="form-check ">
	  <input class="form-check-input" type="radio" name="plan" id="plan_<?=$rw->id?>" value='<?=$rw->id?>' <?=$checked?> required>
	  <label class="form-check-label" for="plan_<?=$rw->id?>">
		<?=$rw->name?>
	  </label>
	</div>

<?php

}
echo "
</td>
</tr>
</table>";



}
 ?>
 
 <div class="modal fade" id="myModalSeg" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<em class="alert-danger ">Este paciente ya fue creado, continúe en esta página...</em>
</div>

</div>

</div>
</div>
<input id="seguro-operation" type="hidden" value="<?=$operation?>" />
</div>
<script>
var seguro_operation=$("#seguro-operation").val();
if(seguro_operation==0){
	$(".disabled-all-inputs :input").not(".not-disabled-button").prop("disabled", false); 
}else{
		$(".disabled-all-inputs :input").not(".not-disabled-button").prop("disabled", true); 
}

function callMessageForPatFound(){
$('#myModalSeg').modal({
backdrop: 'static',
keyboard: false
});
$('#myModalSeg').modal('show');
}

var obj = {
   docCedula: $('#docCedula').val(),
   docPassword: $('#docPassword').val(),
   proveedo: $('#proveedo').val(),
   patientNss: $("#<?=$inputname?>").val()
 }

  if($("#docPassword").val() && $("#seguro_medico_id").val() !=11 && seguro_operation==1){
checkIfPatientNssIsActive();
}




//wsCheckBtn.addEventListener('click', consultAffiliate);

$("#ws-check").on('click', function (e) {
	
 if($("#<?=$inputname?>").val()==""){
		alert('Cual es el NSS del paciente?');
	}else{
$('#ws-check').html('<em>consultando... <i class="fa-li fa fa-spinner fa-spin"></i></em>').prop("disabled",true);

checkIfPatientNssIsActive();

	}
});
    

function checkIfPatientNssIsActive(){
//var credentials = JSON.stringify(obj);
//console.log(obj);

var segVal, plan, afiliado;
$.ajax({
type: "POST",
url: "<?php echo site_url('webservice_consult/checkIfPatientNssIsActive');?>",
 //data: {credentials:credentials},
data: {docCedula: "<?=$cedulaFormat;?>", docPassword: "<?=$password;?>", proveedo: "<?=$codContrato;?>", patientNss: $("#<?=$inputname?>").val()},
 dataType: 'json',
success:function(msg){ 
if(msg==3){
$('.webServiceResult').html('<i style="color:green;" class="fa fa-check" aria-hidden="true">Activo</i> ');
}else{ 
  alert('NSS esta inactivo en '+ $('#seguro_medico_name').val());
$('#ws-check').html('Consultar Afiliado').prop("disabled",false);
}

},

});	
}






var timer = null;
$("#inputnameNew").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(checkIfNumSegExist, 2000)
});


function checkIfNumSegExist(){
var str=  $("#inputnameNew").val();
$.ajax({
type: "POST",
url: "<?php echo site_url('patient_cita_controller/checkIfNumSegExist');?>",
data: {numero: str},
 dataType: 'json',
success:function(msg){ 
if(msg==1){
//$(".webServiceResult").html('<em class="alert-danger ">grabado ya: '+$("#inputnameNew").val()+'</em>');
callMessageForPatFound();
redirectPatExist(msg);

$("#inputnameNew").val("");
}else{
$(".webServiceResult").html('');
}
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.webServiceResult').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

}



function redirectPatExist(str){
//alert(str);
//$(".webServiceResult").html('<em class="alert-danger ">grabado ya, redireccionando...</em>');
// storing url and time
let url ="<?php echo base_url(); ?><?=$this->session->userdata('USER_CONTROLLER');?>/patient/"+str+"0/0";
setTimeout(function(){
location = url;
},4000)
}





</script>
