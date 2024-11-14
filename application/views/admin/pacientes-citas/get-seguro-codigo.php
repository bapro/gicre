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
if($GET_NAMEF_C > 0 && $operation==1){
foreach($GET_NAMEF as $get_input_nam)

if($get_input_nam->inputf=='No. DE AFILIADO'){
$requiredipt='required';	
}else{
$requiredipt='';	
}
?>
<!-- CREATE SEGURO FOR THE FIRST TIME-->
<div class="form-group"> 
<label class="control-label col-sm-3" ><?=$get_input_nam->inputf;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]"  class="form-control <?=$requiredipt?>" id="inputnameUpdate" value="<?=$get_input_nam->input_name;?>" >
<input  type="hidden" name="inputf[]" class="form-control " value="<?=$get_input_nam->inputf;?>" id="inputfUpdate" >
</div>
<div class="webServiceResult"></div>

</div>

<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="afiliado" id="afiliadoUpdate">
<?php $afiliado=$this->db->select('afiliado')->where('id_p_a',$idpatient)->get('patients_appointments')->row('afiliado');
if($afiliado=="Titular"){
	$option='Depediente';
}else{
$option='Titular';	
}
?>
<option><?=$afiliado;?></option>
<option><?=$option?></option>

</select>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="plan" id="planUpdate">
<?php
$planame=$this->db->select('name')->where('id',$plan)->get('seguro_plan')->row('name');
echo "<option  value='$plan' >$planame</option>";
$sql ="SELECT id, name FROM  seguro_plan";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rw){
echo "<option  value='$rw->id' '$selected'>$rw->name</option>";
 
}?>
</select>
</div>
</div>

<?php
$inputname="inputnameUpdate";
 $inputf="inputfUpdate";
 $afiliado="afiliadoUpdate";
 $plan="planUpdate";
}
else{

foreach($GET_INPUT as $get_input)
{
if($get_input->name=='No. DE AFILIADO'){
$requiredipt='required';	
}else{
$requiredipt='';	
}	
?>
<!-- CREATE SEGURO FOR THE FIRST TIME-->

<table>
<tr>
<td>
<label  class="control-label col-sm-3"><?=$get_input->name;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]" class="form-control inp num-seg <?=$requiredipt?>"  id="inputnameNew" >
<input  type="hidden" name="inputf[]" class="form-control" value="<?=$get_input->name;?>" id="inputf" >
</div>
</td>
<td>
<div class="webServiceResult"></div>
 <button class="btn btn-default btn-xs"  type="button" style="display:<?=$ws?>" id="ws-check" > Consultar Afiliado </button> 
</td>
</tr>
</table>

<?php
}

?>

<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="afiliado" id="afiliado"> 
<option>Titular</option>
<option>Depediente</option>
</select>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="plan" id="plan">
<?php
$sql ="SELECT id, name FROM  seguro_plan";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rw){
echo "<option value='$rw->id'>$rw->name</option>";
 
}?>
</select>
</div>
</div>
<?php 
$inputname="inputnameNew";
 $inputf="inputf";
 $afiliado="afiliado";
 $plan="plan";


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
 
<script>
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

  if($("#docPassword").val() && $("#seguro_medico_id").val() !=11 &&  <?=$operation?>==1){
checkIfPatientNssIsActive();
}





$('.input-seg').click(function() {
	if($(".inp").val() == ""){
$(".inp").focus();
$('.inp').css('border', '2px solid'); 
$('.inp').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('.inp').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}
});

$(".select-examsis").select2({
  tags: true
});





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
$('#ws-check').hide();
$('#sendc').prop('disabled', false);
segVal = $('#seguro_medico_id').val();
afiliado = $("#<?=$afiliado?>").val();
plan = $("#<?=$plan?>").val();
$("#<?=$inputname?>").prop('readonly','readonly');

}else{ 
  alert('NSS esta inactivo en '+ "<?=$seguro_medico_name;?>");
   //$('#seguro_medico').val(11).trigger('change');
   $('#sendc').prop('disabled', false);
   segVal=$('#seguro_medico_id').val();
   afiliado =$("#<?=$afiliado?>").val();
   plan = $("#<?=$plan?>").val();
}


   const objInput = {
   inputname: $("#<?=$inputname?>").val(),
   inputf: $("#<?=$inputf?>").val(),
   segVal: segVal,
      plan: plan,
   afiliado: afiliado,
   id_patient: document.getElementById('idpatient').value 
 }

changeSeguroToPrivado(objInput);
},

});	
}







function changeSeguroToPrivado(objInput){
var values = JSON.stringify(objInput);
console.log(values);
$.ajax({
type: "POST",
url: "<?php echo site_url('cita/changeAfiliadoStatus');?>",
 data: {values:values},
success:function(msg){ 

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



var timer = null;
$("#inputnameNew").keydown(function(){
       clearTimeout(timer);
       timer = setTimeout(checkIfNumSegExist, 2000)
});


function checkIfNumSegExist(){
var str=  $("#inputnameNew").val();
var nombre=  $("#nombre").val();
var cedula=  $("#cedula").val();
var date_nacer=  $("#date_nacer").val(); 
 var date_nacer_format=  $("#mirror_field").val();
var seguro = <?=$seguro_medico_id?>;
var form_phonecel=  $("#form_phonecel").val();
var emailtest=  $("#emailtest").val();
var sexo=  $("#sexo").val();
var estado_civil=  $("#estado_civil").val();
var nacionalidad=  $("#nacionalidad").val();
var provincia=  $("#provincia").val();
var municipio_dropdown=  $("#municipio_dropdown").val();
var barrio=  $("#barrio").val();
var calle=  $("#calle").val();
var contacto_em_nombre=  $("#contacto_em_nombre").val();
var contacto_em_cel=  $("#contacto_em_cel").val();
var contacto_em_tel1=  $("#contacto_em_tel1").val();
var contacto_em_tel2=  $("#contacto_em_tel2").val();
   var planUpdate=  $("#planUpdate").val();
 var afiliadoUpdate=  $("#afiliado").val();
$.ajax({
type: "POST",
url: "<?php echo site_url('cita/checkIfNumSegExist');?>",
data: {numero: str},
 dataType: 'json',
success:function(msg){ 
if(msg==1){
//$(".webServiceResult").html('<em class="alert-danger ">grabado ya: '+$("#inputnameNew").val()+'</em>');
callMessageForPatFound();
redirectPatExist(str, nombre, seguro, date_nacer, date_nacer_format, planUpdate, afiliadoUpdate, sexo, form_phonecel, estado_civil, nacionalidad, provincia, municipio_dropdown);

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



function redirectPatExist(str, nombre, seguro, date_nacer, date_nacer_format, planUpdate, afiliadoUpdate, sexo, form_phonecel, estado_civil, nacionalidad, provincia, municipio_dropdown){

//$(".webServiceResult").html('<em class="alert-danger ">grabado ya, redireccionando...</em>');
// storing url and time
let url ="<?php echo base_url(); ?>patient_existed/redirecting?str="+str+"&nombre="+nombre+"&seguro="+seguro+"&date_nacer="+date_nacer+"&date_nacer_format="+date_nacer_format+"&planUpdate="+planUpdate+"&afiliadoUpdate="+afiliadoUpdate+"&sexo="+sexo+"&form_phonecel="+form_phonecel+"&estado_civil="+estado_civil+"&nacionalidad="+nacionalidad+"&provincia="+provincia+"&municipio_dropdown="+municipio_dropdown; 	
setTimeout(function(){
location = url;
},4000)
}





</script>
<?php
}

?>