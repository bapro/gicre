<?php
if($licenciaData->result() !=NULL){
foreach ($licenciaData->result() as $row)
$id_em_lic=$row->id;
$diagnostico=$row->diagnostico;
$sistema=$row->sistema;
$fecha_inicio=$row->fecha_inicio;
$fecha_retorno=$row->fecha_retorno;
$turno_trab=$row->turno_trab;
$medico_licencia=$row->medico_licencia;
$area=$row->area;
$centro_med=$row->centro_med;
$phone_centro=$row->phone_centro;
$phone_emp=$row->phone_emp;
$comentario=$row->comentario;
$amount_days=$row->amount_days;
$edit=1;
$btn="GUARDAR";
$licMedTitle="";
$id_employee=$row->id_employee;
$inserted_time=$row->inserted_time;
$updated_time=$row->updated_time;
$insTf=$row->inserted_time;
} else {
$licMedTitle="Crear Licencia Medica";
$insTf=date("Y-m-d H:i:s");
$id_em_lic=0;
$amount_days="";
$diagnostico="";
$sistema="";
$area="";
$fecha_inicio="";
$fecha_retorno="";
$turno_trab="";
$medico_licencia="";
$centro_med="";
$phone_centro="";
$phone_emp="";
$comentario="";
$btn="AGREGAR";
$id_employee=$id_emp;
}
if($id_em_lic==0){
$num="";

}else{

$insert=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name'); 
$updated=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');  	
$num="<h5><em>REGISTRO  $inserted_time <a title='Eliminar $id_em_lic' class='btn btn-md btn-danger deleteLicMed'   id='$id_em_lic'  ><i class='fa fa-trash-o' aria-hidden='true'></i></a><br/>creado por $insert ($inserted_time)<br/>cambiado por $updated ($updated_time)</em></h5>";
}
 
 ?>
<form  id="save-licencia-medica-<?=$id_em_lic?>" class="form-horizontal " method="post"  > 
 <?=$num?>
  <h2 class="h2"><?=$licMedTitle?></h2>
<input name="id_employee" type="hidden" value="<?=$id_employee?>" />
<input name="id_em_lic" type="hidden" value="<?=$id_em_lic?>" />
<input name="id_user" type="hidden" value="<?=$id_user?>" />
<input name="insTf" type="hidden" value="<?=$insTf?>" />
<input name="updTf" type="hidden" value="<?=date("Y-m-d H:i:s")?>" />
<div class="form-group">
<label class="control-label col-sm-4">Diagnóstico<font style="color:red">*</font></label>
<div class="col-sm-8">
<!--<input type="text" autocomplete="off" class="form-control" title="<?=$diagnostico?>" name="diagnostico" id="diagnostico-<?=$id_em_lic?>" value="<?=$diagnostico?>" required>-->
<textarea class="form-control" name="diagnostico" id="diagnostico-<?=$id_em_lic?>" rows='6' ><?=$diagnostico?></textarea>
<div id="diagnostico-display-<?=$id_em_lic?>"></div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Sistema</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="sistema"  value="<?=$sistema?>" >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Fecha Inicio<font style="color:red">*</font></label>
<div class="col-sm-8">
<div class="input-group dateFmt" >
<input type="text"  class="form-control date"  value="<?=$fecha_inicio?>"  name="fecha_inicio"  id="fecha_inicio-<?=$id_em_lic?>"  required>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Cantidad De Día<font style="color:red">*</font> </label>
<div class="col-sm-4">
<input type="number" class="form-control" name="amount_days" id="amount_days-<?=$id_em_lic?>" value="<?=$amount_days?>" required>

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4"> Fecha De Retorno<font style="color:red">*</font></label>
<div class="col-sm-8">
<input type="text"  class="form-control date"  value="<?=$fecha_retorno?>"  name="fecha_retorno" id="fecha_retorno-<?=$id_em_lic?>"  required readonly>
</div>
</div>


 <div class="form-group">
<label class="control-label col-sm-4"> Turno De Trabajo</label>
<div class="col-sm-8">
<input type="text"  class="form-control"  value="<?=$turno_trab?>"  name="turno_trab"  id="turno_trab"  >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"> Médico De La Licencia<font style="color:red">*</font></label>
<div class="col-sm-8">
<input type="text"  class="form-control"  value="<?=$medico_licencia?>"  name="medico_licencia"  required>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"> Especialidad<font style="color:red">*</font></label>
<div class="col-sm-8">

<input type="text" autocomplete="off" class="form-control" name="area" id="area-<?=$id_em_lic?>" value="<?=$area?>" >
<div id="area-display-<?=$id_em_lic?>"></div>
</div>
</div>


 <div class="form-group">
<label class="control-label col-sm-4"> Centro Médico<font style="color:red">*</font></label>
<div class="col-sm-8">
<input type="text"  class="form-control"  value="<?=$centro_med?>"  name="centro_med"  required>
</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-4"> Teléfono Del Centro</label>
<div class="col-sm-8">
<input type="text"  class="form-control"  value="<?=$phone_centro?>"  name="phone_centro" id="phone_centro-<?=$id_em_lic?>"  >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"> Teléfono Del Empleado</label>
<div class="col-sm-8">
<input type="text"  class="form-control"  value="<?=$phone_emp?>"  name="phone_emp"   id="phone_emp-<?=$id_em_lic?>" >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"> Comentario</label>
<div class="col-sm-8">
<textarea class="form-control" rows='12' name="comentario" ><?=$comentario?></textarea >
</div>
</div>
 <div class="col-sm-12  col-xs-offset-1" >
   <button type="submit" class="btn btn-success  btn-sm"><?=$btn?></button>
	  <div id="insertionResultLicMed-<?=$id_em_lic?>"></div>
    </div>
	<br/><br/><br/>
	 </form>
	 
	 <?php 
	 $data['id_em_lic']=$id_em_lic;
	 $this->load->view('auto-complete-input',  $data);
	 ?>
	 <script>


	 document.getElementById("turno_trab").value=document.getElementById("gbl_shift").value;
	 
$("#diagnostico-<?=$id_em_lic?>").keyup(function(){
searchAuToComplete($(this).val(), 'type_reasons', 'title', 'diagnostico', 'selectThisDiag');
});


$("#area-<?=$id_em_lic?>").keyup(function(){
searchAuToComplete($(this).val(), 'areas', 'title_area', 'area', 'selectThisArea');
});





function searchAuToComplete(keyword, table, field, targetDiv, onSelectedValue){

	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>searchAutoComplete/filterDiagnosticos",
data:{keyword:keyword,origin:3, action: <?=$id_em_lic?>, table:table, field:field, targetDiv:targetDiv, onSelectedValue:onSelectedValue},
beforeSend: function(){
$("#"+targetDiv+"-<?=$id_em_lic?>").css("background","#DCDCDC");
},
success: function(data){
$("#"+targetDiv+"-display-<?=$id_em_lic?>").show();
$("#"+targetDiv+"-display-<?=$id_em_lic?>").html(data);
$("#"+targetDiv+"-<?=$id_em_lic?>").css("background","");
},

});
	
}

	 
	const amount_days=document.getElementById("amount_days-<?=$id_em_lic?>");
	 function addDays(date, days) {
  const copy = new Date(Number(date))
  copy.setDate(date.getDate() + days)
  return copy
}


amount_days.addEventListener("input", function (e) {
if(amount_days.value !=""){
	const fecha_inicio=document.getElementById("fecha_inicio-<?=$id_em_lic?>").value;
const myDate = new Date(fecha_inicio);

const returnDate = addDays(myDate, parseInt(amount_days.value));
const returnDateFormat = new Date(returnDate);

document.getElementById("fecha_retorno-<?=$id_em_lic?>").value=returnDateFormat.toISOString().split('T')[0];
}else{
document.getElementById("fecha_retorno-<?=$id_em_lic?>").value="";	
}

}); 
	 
	$('.dateFmt').datetimepicker({
    format: 'YYYY-MM-DD'
})
	 
	 
	 
document.getElementById('phone_centro-<?=$id_em_lic?>').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.getElementById('phone_emp-<?=$id_em_lic?>').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

	 $("#save-licencia-medica-<?=$id_em_lic?>").on('submit', function (e) {
	e.preventDefault();
$.ajax({
url: "<?=base_url('zona_franca/saveDatosEmpleadoLicMed')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
$("#insertionResultLicMed-<?=$id_em_lic?>").show();
 if(response.status == 1){
	$("#insertionResultLicMed-<?=$id_em_lic?>").html('<p class="alert alert-danger">'+response.message+'</p>').delay( 2000 ).hide(0);
}else{
	$("#insertionResultLicMed-<?=$id_em_lic?>").html('<p class="alert alert-success">'+response.message+'</p>').delay( 2000 ).hide(0);
	if(<?=$id_em_lic?>==0){
		$("#save-licencia-medica-<?=$id_em_lic?>")[0].reset();
	paginationNumber();
	countLicMed(<?=$id_employee?>);
	}	
}

},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#insertionResultLicMed-<?=$id_em_lic?>').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
});



function paginationNumber(){
$.ajax({
url:"<?php echo base_url(); ?>zona_franca/paginationNumber",
data: {id_emp:<?=$id_employee?>,id_user:<?=$id_user?>},
method:"POST",
success:function(data){
$('#paginationNumber').html(data);
},
});
}

paginationNumber();



	
function countLicMed(){
$.ajax({
url:"<?php echo base_url(); ?>zona_franca/countLicMed",
data: {id_emp:<?=$id_employee?>},
method:"POST",
success:function(data){
$('#countLicMed').html(data);
},

});
}

countLicMed();	
	
$(".deleteLicMed").on('click', function(event) {
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:"<?php echo base_url(); ?>zona_franca/deleteLicMed",
data: {id : del_id},
success:function(response) {
	countLicMed();	
	paginationNumber();
$("#save-licencia-medica-<?=$id_em_lic?>").hide();


}
});
}
})
	 </script>