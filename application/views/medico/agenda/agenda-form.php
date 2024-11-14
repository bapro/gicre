<div id="loadAgendaAfterAction">
<div class="row"  >
<div class="col-md-12"  >
<div class='loadf'></div>
<div class="form-check form-check-inline">
 <input class="form-check-input" type="checkbox" id="inlineCheckboxAll"   >
 <label class="form-check-label" for="inlineCheckboxAll">ELEGIR TODOS</label>
 </div>
<form method="post"  id="saveAgenda" >

<?php
foreach($diaries as $row)
{
 $day=$this->db->select('day')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->where('day',$row->id)->get('doctor_agenda_test')->row('day');	

if($day ==$row->id){
$selected="checked";
	}
	else
	{
	$selected="";
	}
?>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox<?=$row->id ?>" name='day' value="<?=$row->id ?>" <?=$selected?>>
  <label class="form-check-label" for="inlineCheckbox<?=$row->id ?>"> <?=$row->title ?></label>
</div>


<?php } ?>
<hr id="hr_ad"/>

</div>
<div class="col-md-12"   >
 <br/>
 <?php

  $genda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita,active')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->get('doctor_agenda_test')->row_array();	
if($genda){
	$is_agenda_active =$genda['active'];
	$amtCitas =$genda['cita'];
   $fecha_inicio = date("d-m-Y", strtotime($genda['fecha_inicio']));
$fecha_final = date("d-m-Y", strtotime($genda['fecha_final']));
  $fecha_inicio_por_defecto = date("d-m-Y");
  $fecha_final_por_defecto = date("d-m-Y", strtotime("+1 year"));
  if($genda['fecha_inicio']=="" && $genda['fecha_final']==""){
	echo "<input id='data-agenda' type='hidden' value='0'>";
	$text="Guardar";
	$option="<option value=''></option>";
	$fecha1=$fecha_inicio_por_defecto;
	$fecha2=$fecha_final_por_defecto;
	$delete="style='display:none'";
	$active_color="style='display:none'";
} else{
	$btn=0;
	$text="Cambiar";
	echo "<input id='data-agenda' type='hidden' value='1'>";
	$option="";$fecha1="$fecha_inicio";$fecha2="$fecha_final";
	$delete="style='background:red'";$active_color="style='background:green'";
}


if($genda['active']==0){
$info_agent = '';
$disabled_agenda="";
}else{
$info_agent = '<span class="text-danger">Centro médico has sido inhabilitado.</span>';
$disabled_agenda='disabled';	
}
}else{
	$delete="style='display:none'";
	$text="Guardar";
	$option="<option value=''></option>";
$disabled_agenda="";
$info_agent = '';
$fecha1=date("d-m-Y");
	$fecha2=date("d-m-Y", strtotime("+1 year"));	
	$is_agenda_active=0;
	$amtCitas =25;
}
 ?>
 <div class="col-md-12">

<div class="row mb-3">
<label for="passSegWeb" class="col-md-2  col-lg-2 col-form-label">Fecha Inicio <span class="text-danger">*</span></label>
<div class="col-md-3 col-lg-4">
<input type="text" value="<?=$fecha1?>" class="form-control" id="fechaInicio" name="fechaInicio" <?=$disabled_agenda?> />
</div>
</div>

<div class="row mb-3">
<label for="passSegWeb" class="col-md-2  col-lg-2 col-form-label">Fecha Final <span class="text-danger">*</span></label>
<div class="col-md-3 col-lg-4">
<input type="text" value="<?=$fecha2?>" class="form-control" name="fechaFinal" id="fechaFinal"  <?=$disabled_agenda?> />
</div>
</div>

<div class="row mb-3">
<label for="passSegWeb" class="col-md-2  col-lg-2 col-form-label">Desde <span class="text-danger">*</span></label>
<div class="col-md-3 col-lg-4">
<select class="form-control select2Agenda hourDesde" name="hourDesde" id="hourDesde"  <?=$disabled_agenda?> >
<?php
echo $option;
$sql2 ="SELECT * FROM hour_from order by id ASC";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {
	if($genda['hour_from'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
	} else {
		echo "<option>".$row->hour."</option>";
	}
}?>
</select> 
</div>
</div>

<div class="row mb-3">
<label for="passSegWeb" class="col-md-2  col-lg-2 col-form-label">Hasta <span class="text-danger">*</span></label>
<div class="col-md-3 col-lg-4">
<select class="form-control select2Agenda" name="hourHasta" id="hourHasta"  <?=$disabled_agenda?> >
<?php
echo $option;
$sql2 ="SELECT * FROM hour_from order by id DESC";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {
	if($genda['hour_to'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
	} else {
		echo "<option>".$row->hour."</option>";
	}
}?>
</select> 
</div>
</div>
<div class="row mb-3">
<label for="amtCitas" class="col-md-2  col-lg-2 col-form-label">Citas <span class="text-danger">*</span></label>
<div class="col-md-3 col-lg-4">
<input class="form-control"  id="amtCitas"  <?=$disabled_agenda?> value="<?=$amtCitas?>"/> 
</div>
</div>
<div class="mx-auto" style="width: 450px;">

<button type="button" id="Operation"  class="btn btn-primary btn-sm" <?=$disabled_agenda?>><?=$text?></button>
<?php
if($is_agenda_active ==0){
?>
<a type="button" id="disableAgenda"  <?=$delete?>  class="btn btn-primary btn-sm">Inhabilitar</a>
<?php
} else{
?>
<a type="button" id="abledAgenda"   <?=$active_color?>  class="btn btn-primary btn-sm">Habilitar</a>

<?php
}
echo $info_agent;
?>
</div>

 </div>
  </div>
 </div>

 <input type="hidden" value="<?=$centro_name?>" class="form-control" id="centro_name"  />
<input type="hidden" value="<?=$idcentro?>" class="form-control" id="idcentro"  />
<input type="hidden" value="<?=$iddoc?>" class="form-control" id="iddoc"   />

<script>

$("#inlineCheckboxAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});


var idcentro =$("#idcentro").val();
var iddoc =$("#iddoc").val(); 
function loadAgendaAfterAction(){
$("#loadAgendaAfterAction").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('agenda_controller/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro},
cache: true,
success:function(data){	
$("#loadAgendaAfterAction").html(data); 

}  
});


}






$('.select2Agenda').select2({
		theme: 'bootstrap-5',
		width: '100%'
});

function calculHorario(){
		
	//var totHourInMn = Number($("#hourHasta").val() - $("#hourDesde").val()) * 60;	
	//var totHourInMn = (parseInt($("#hourHasta").val().split(':')[0], 10) - parseInt($("#hourDesde").val().split(':')[0], 10)) * 60;
	//var nbCita= totHourInMn / 30;
	//$("#horarioResult").html(totHourInMn + " minutos por día, 30 minutos por paciente. "+nbCita+ " citas.");
	//$("#cita").val(nbCita);
}

//calculHorario();

$('#Operation').click(function(e) {
	var operation= $("#data-agenda").val();

	var button = $(this);

//calculHorario();
checked = $("input[name='day']:checked").length;
if(!checked) {
       alert("Debes marcar al menos un día para la agenda !");
    // return false;
      }
else if($("#fechaInicio").val() >=$("#fechaFinal").val()){
alert("Fecha inicio no puede ser igual o mas grande que fecha final.");	
}
else if($("#fechaInicio").val() == "" ||  $("#fechaFinal").val() == "" ||  $("#hourDesde").val() == "" ||  $("#hourHasta").val() == "" || $("#amtCitas").val()  == ""){
alert("Todos los campos son obligatorios !");
//return false;
} else{
	button.prop('disabled',true);
	var day1 = [];
$.each($("input[name='day']:checked"), function(){            

day1.push($(this).val());
;
});

$.ajax({
type: "POST",
url: "<?=base_url('agenda_controller/agend_result')?>",
data: {operation:operation,iduser:iddoc,centro_medico:idcentro,fechaInicio:$("#fechaInicio").val(),fechaFinal:$("#fechaFinal").val(),hourDesde:$("#hourDesde").val(),hourHasta:$("#hourHasta").val(),dia:day1, amtCitas:$("#amtCitas").val() },
cache: true,
success:function(data){
	alert("Hecho !");
	if(!operation){
	
		loadCentroAgenda();
	}
loadAgendaAfterAction();

},

});
	
} 
	
});


$('#abledAgenda').on('click', function(event){ 
event.preventDefault();
enabledOrDisabeledAgenda('habilitar', 0);
}); 

$('#disableAgenda').on('click', function(event){ 
event.preventDefault();
enabledOrDisabeledAgenda('inhabilitar', 1);
}); 


function enabledOrDisabeledAgenda(action, value){
var centro_name = $("#centro_name").val();
 if (confirm("Quiere "+action+" la agenda de cita del centro médico: "+centro_name+"?"))
{ 
$.ajax({
type:'POST',
url:'<?=base_url('agenda_controller/disableCitaAgendaDoc')?>',
data: {iddoc:iddoc,idcentro:idcentro, value:value},
success:function(response) {
loadAgendaAfterAction();
}
});
}	
	
}
</script>