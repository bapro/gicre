<div id="loadAgendaAfterAction">
<div class="col-md-12" style="padding:20px" >
<div class='loadf'></div>
<form method="post"  id="saveAgenda" >
<?php
foreach($diaries as $row)
{
 $day=$this->db->select('day')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->where('day',$row->id)->get('doctor_agenda_test')->row('day');	
?>
<label class="radio-inline"> 
<?php
if($day ==$row->id){
$selected="checked";
	}
	else
	{
	$selected="";
	}
?>
<input type="checkbox"  name='day' value="<?=$row->id ?>" <?=$selected?> > <?=$row->title ?>
</label>
<?php } ?>
<hr id="hr_ad"/>

</div>

<div class="col-md-12"  style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <br/>
 <?php
  $genda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita,active')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->get('doctor_agenda_test')->row_array();	

   $fecha_inicio = date("d-m-Y", strtotime($genda['fecha_inicio']));
$fecha_final = date("d-m-Y", strtotime($genda['fecha_final']));
  
  if($genda['fecha_inicio']=="" && $genda['fecha_final']==""){
	echo "<input id='data-agenda' type='hidden' value='0'>";
	$text="Guardar";
	$option="<option value=''></option>";
	$fecha1="";$fecha2="";$delete="style='display:none'";$active_color="style='display:none'";
} else{
	$btn=0;
	$text="Cambiar";
	echo "<input id='data-agenda' type='hidden' value='1'>";
	$option="";$fecha1="$fecha_inicio";$fecha2="$fecha_final";
	$delete="style='background:red'";$active_color="style='background:green'";
}


 $active=$this->db->select('active')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->get('doctor_agenda_test')->row('active');	



 ?>
 <div class="col-md-12">

<div class="form-group">
<label  class="control-label col-sm-3"> Fecha Inicio </label>
<div class="col-sm-3" >
<div class="input-group date">
<input type="text" value="<?=$fecha1?>" class="form-control" id="fechaInicio" name="fechaInicio"  />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

</div>

</div>


<div class="form-group">
<label  class="control-label col-sm-3"> Fecha Final </label>
<div class="col-sm-3" >
<div class="input-group date">
<input type="text" value="<?=$fecha2?>" class="form-control" name="fechaFinal" id="fechaFinal" />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

</div>

</div>
  
<div class="form-group">
<label  class="control-label col-sm-3" >Desde</label>
<div class="col-sm-3" >
<select class="form-control select2Agenda hourDesde" name="hourDesde" id="hourDesde">
<?php
echo $option;
$sql2 ="SELECT * FROM hour_from order by id ASC";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {
	if($genda['hour_from'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
	} else {
		echo "<option >".$row->hour."</option>";
	}
}?>
</select> 
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" >Hasta</label>
<div class="col-sm-3" >
<select class="form-control select2Agenda" name="hourHasta" id="hourHasta">
<?php
echo $option;
$sql2 ="SELECT * FROM hour_from order by id DESC";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {
	if($genda['hour_to'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
	} else {
		echo "<option >".$row->hour."</option>";
	}
}?>
</select> 
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3"> Citas</label>
<div class="col-sm-3" >
<input name="cita" id="cita" value="<?=$genda['cita']?>" type="number" class="form-control"  min="1" />

</div>

</div>
 </div>

   <div class="col-md-8 col-md-offset-3">

<button type="button" id="Operation"  class="btn btn-primary"><?=$text?></button>
<?php
if($active==0){
	?>
<a type="button" id="disableAgenda" data-toggle="modal" data-target="#disableCitaAgendaDoc" href="<?php echo base_url("admin/disableCitaAgendaDoc/$iddoc/$idcentro")?>"  <?=$delete?>  class="btn btn-primary">Inhabilitar</a>
<?php
} else{
	?>
<a type="button" id="abledAgenda"   <?=$active_color?>  class="btn btn-primary">Habilitar</a>

<?php
}?>

<br/> <br/> 

 </div>
 </form>
 </div>
 </div>
<div class="modal fade" id="disableCitaAgendaDoc"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
function loadAgendaAfterAction(){
 var iddoc="<?=$iddoc?>"; var idcentro="<?=$idcentro?>";
$("#loadAgendaAfterAction").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro},
cache: true,
success:function(data){	
$("#loadAgendaAfterAction").html(data); 

}  
});


}
$('#abledAgenda').click(function(e) {
 var iddoc="<?=$iddoc?>"; var idcentro="<?=$idcentro?>";
 $('#abledAgenda').prop('disabled',false);
 	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/abilitarAgendar')?>",
data: {iddoc:iddoc,idcentro:idcentro},
cache: true,
success:function(data){
	alert("Hecho !");
loadAgendaAfterAction();
},

});
});


$('#disableCitaAgendaDoc').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
loadAgendaAfterAction();
});
moment.locale('es');

	$('.date').datetimepicker({
    format: 'DD-MM-YYYY',
	//minDate: new Date(),
	locale:'es',
	  widgetPositioning: {
         horizontal: 'auto',
        vertical: 'bottom'
        }
})


$('.select2Agenda').select2({ 


});

$('#Operation').click(function(e) {
	var operation= $("#data-agenda").val();
	var button = $(this);
		
checked = $("input[name='day']:checked").length;
if(!checked) {
       alert("Debes marcar al menos un día para la agenda !");
    // return false;
      }
else if($("#fechaInicio").val() >=$("#fechaFinal").val()){
alert("Fecha inicio no puede ser igual o mas grande que fecha final.");	
}
else if($("#cita").val() == "" ||  $("#fechaInicio").val() == "" ||  $("#fechaFinal").val() == "" ||  $("#hourDesde").val() == "" ||  $("#hourHasta").val() == "" ){
alert("Todos los campos son obligatorios !");
//return false;
} else{
	button.prop('disabled',true);
	var day1 = [];
$.each($("input[name='day']:checked"), function(){            

day1.push($(this).val());
;
});
 var iduser="<?=$iddoc?>"; var centro_medico="<?=$idcentro?>";
 
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/agend_result')?>",
data: {operation:operation,iduser:iduser,centro_medico:centro_medico,fechaInicio:$("#fechaInicio").val(),fechaFinal:$("#fechaFinal").val(),hourDesde:$("#hourDesde").val(),hourHasta:$("#hourHasta").val(),citas:$("#cita").val(),dia:day1},
cache: true,
success:function(data){
	alert("Hecho !");
loadAgendaAfterAction();

},

});
	
} 
	
});

</script>