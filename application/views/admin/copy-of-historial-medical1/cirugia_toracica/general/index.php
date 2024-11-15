<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Reporte General</h3>

</div>
<div class="modal-body" id="background_">
 <div class="container" style='  height: 600px;overflow-y: scroll;'>
 <div class="row">
  <div id="paginationNumberReport"></div>
  <hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" id="nuevo-formr">NUEVO REGISTRO</button>
  <hr class="prenatal-separator"/>
<div id="contentrp"></div>
 <div id="hide-form-cirugia-reporte">
<form class="form-horizontal" method="post">
  <input type='hidden' value='0' id='id_enf'/> <input type='hidden' value='0' id='id_con'/>
 	   <div class="form-group">
      <label class="control-label col-sm-2" ><span style='color:red'>*</span> REPORTE:</label>
      <div class="col-sm-5">
      	<select class="form-control select2" id="cirugia_reporte" >
		<option></option>
		<?php
		$sql ="SELECT name FROM hc_cirugia_name order by id ASC";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {

		echo "<option >".$row->name."</option>";
		}
		?>
		</select>
      </div>
	  	  <div class="col-sm-2">
      <button type="button" id='add-hist-actual' class="btn btn-primary btn-xs"><span  class="glyphicon glyphicon-plus-sign"></span> Historia Actual</button>
      </div>
    </div>

  <div class="form-group" style="display:none" id="show-days-contents">
      <label class="control-label col-sm-4" >Se recomienda:</label>
      <div class="col-sm-3">
      	<div class="input-group">
    <input type="number" class="form-control" id='days_amount' placeholder="cuantos día?" />
    <span class="input-group-addon"> <span id="day_text">días</span> de reposo</span>
    </div>
      </div>
	  
    </div>

       <div class="form-group">
      <label class="control-label col-sm-2" >DETALLE:</label>
      <div class="col-sm-8">
      <div  id="historial-actual-data" ></div>
	  <br/>
	   <button type="button" id="btnRpG" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechRpG"></span>
      <textarea rows='12' class="form-control clear-cirugia-toracia" id="cirugia_detalle" ></textarea>

      </div>
    </div>


     <div class="form-group">
      <div class="col-sm-offset-2 col-sm-9">
	  <button type="button" id="save-cirugia-reporte" class="btn btn-md btn-success"><i class="fa fa-check after-action" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Vert.</a>
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c1/c_t_0_/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Horiz.</a>
    </div>

    </div>

 </form>
 </div>
</div>
</div>

</div>
<script>

$('#cirugia_reporte').on('change', function(event){
  event.preventDefault();
 if($(this).val()=="LICENCIA MEDICA"){
	 $("#show-days-contents").show();
 }else{
	 $("#show-days-contents").hide(); 
 }
 
  });


var timer = null;
$('#days_amount').on('keyup', function(event){
	event.preventDefault();
       clearTimeout(timer);
       timer = setTimeout(dayAmount, 1000)
});



 function dayAmount(){

  if($('#days_amount').val()!= ""){
 if($('#days_amount').val() == 1){
	 $("#day_text").text("día");
 }else{
	  $("#day_text").text("días");
 }
 
 var text = "Se recomienda " + $('#days_amount').val() + " "+ $("#day_text").text() + " de reposo."+"\r\n";
  $("#cirugia_detalle").val(text).focus();

  }else{
	$("#cirugia_detalle").val("");  
  }
  };

var btnRpG = document.getElementById('btnRpG');
btnRpG.onclick = function() {
var outputre = document.getElementById("cirugia_detalle");
// get action element reference
var actionre = document.getElementById("actionSpeechRpG");
runSpeechRecognition(outputre,actionre);
}




$('#add-hist-actual').on('click', function(event) {
event.preventDefault();
addHistAct();
assignIdEnfToReporte();
assignIdConToReporte();
});

function addHistAct(){
$('#save-cirugia-reporte').prop('disabled',true);
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/addHistAct",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
$("#historial-actual-data").html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginationNumberReport').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}

function assignIdEnfToReporte(){
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/assignIdEnfToReporte",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
$("#id_enf").val(data);
}
});
}


function assignIdConToReporte(){
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/assignIdConToReporte",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
$("#id_con").val(data);
$('#save-cirugia-reporte').prop('disabled',false);
}
});
}


 $('.select2').select2({
  tags: true
});


function paginationNumberReport(){
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/paginationNumberReport",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:<?=$centro_medico?>},
method:"POST",
success:function(data){
$('#paginationNumberReport').html(data);
}
});
}

paginationNumberReport();

$('#save-cirugia-reporte').on('click', function(event) {
event.preventDefault();
var cirugia_detalle=$("#cirugia_detalle").val();
var cirugia_reporte=$("#cirugia_reporte").val();
var id_enf=$("#id_enf").val();
var id_con=$("#id_con").val();
var days_amount=$("#days_amount").val();
var id_cirugia_toracia_rep=0;
if(cirugia_reporte!=""){
$('#save-cirugia-reporte').prop("disabled",true);
$('#save-cirugia-reporte').text("guardando...");
$.ajax({
url:"<?php echo base_url(); ?>historialHeader/saveCirugiaReporte",
data: {cirugia_reporte:cirugia_reporte.trim(),cirugia_detalle:cirugia_detalle,id_enf:id_enf,id_con:id_con,days_amount:days_amount,
id_cirugia_toracia_rep:id_cirugia_toracia_rep,id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro:<?=$centro_medico?>},
method:"POST",
success:function(data){
paginationNumberReport();

  $('.after-actionp').fadeIn('slow', function(){
    $('.after-actionp').delay(3000).fadeOut();
    });
$('.imprimir-cirugia-reporte').show();
$('#save-cirugia-reporte').text("GUARDAR");
$('#save-cirugia-reporte').prop("disabled",false);
}
});

}
});

</script>
