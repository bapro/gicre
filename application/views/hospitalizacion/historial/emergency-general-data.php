<style>
td + input{text-align:center}
</style>
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <br/><br/> 
<form class="form-horizontal " method="post" id="save_historial_data"  > 
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" name="id_p_a" value="<?=$patient_id?>">
<div class="tab-content" id="all_dis" >

<div class="tab-pane active" id="Datos_personales"> 

<?php

 $this->load->view('admin/emergencia/general/historial-medical-content');
 
 ?>
</div>



<div class="tab-pane" id="examen-fisico" >
<?php

$this->load->view('admin/emergencia/general/signo-vitales');?>
</div>


<div class="tab-pane" id="evaluacion-interconsultas" >

<div class="row" >
<h4 class="h4 his_med_title">Evaluacion  </h4>

<div class="col-md-4" >

<label class="control-label" >Realizar Evaluación / Notas</label>

<textarea rows="6" cols="50" class="form-control" id="eva-nota"   ></textarea>
<br/>
<button type="button" id="add-eva-nota" class="btn btn-primary btn-xs">
<i class="fa fa-plus" aria-hidden="true"> Agregar</i>
</button>

<button type="button" id="limpiar-eva-nota"  class="btn btn-danger btn-xs">
<i class="fa fa-trash" aria-hidden="true"> Limpiar</i>
</button>
</div>
<div class="col-md-8"> 
<div  style="top:20px;height:300px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
	
<div id="new-eva-nota"></div>

</div>
</div>
</div>
<div class="row" >
<hr id="hr_ad"/>
<h4 class="h4 his_med_title">Interconsultas </h4>
<div class="col-md-4" >
<label class="control-label" ><span style="color:red">*</span> Interconsultas Con</label>

<select  class="form-control  select2"   id="area"  onChange="getDoc(this.value);">
<option></option>
 <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
</select>


<div id="load-div"></div>
<label class="control-label" ><span style="color:red">*</span> Medico</label>

<select  class="form-control select2"   id="medico" >

</select>

<label class="control-label" ><span style="color:red">*</span> Causa</label>

<textarea rows="3" cols="10" class="form-control" id="causa"   ></textarea>


<br/>
<button type="button" id="add-interconsulta" class="btn btn-primary btn-xs">
<i class="fa fa-plus" aria-hidden="true"> Agregar</i>
</button> 

<button type="button" id="limpiar-interconsulta"  class="btn btn-danger btn-xs">
<i class="fa fa-trash" aria-hidden="true"> Limpiar</i>
</button>
</div>
<div class="col-md-8">
<div  style="top:20px;height:200px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
	
<div id="newInterconsulta"></div>
</div>

<div class="form-group">
<label class="control-label" >Responder Interconsulta registro # <span id="show-selected" style="color:red;font-weight:bold"></span></label>
<textarea rows="6" cols="20" class="form-control active-me" id="responder-text"  disabled ></textarea>
</div>

<button type="button" id="add-interconsulta-response" class="btn btn-primary btn-xs  active-me" disabled>
<i class="fa fa-plus" aria-hidden="true"> Agregar</i>
</button>

<button type="button" id="clear-interconsulta-response" class="btn btn-danger btn-xs  active-me" disabled>
<i class="fa fa-trash" aria-hidden="true"> Limpiar</i>
</button>
</div>
</div>
</div>

 </div>
 
<!--div datos citas ends-->
</form>
 </div>

 <script> 
  $('#add-interconsulta-response').on('click', function(event) {
var selected = $("#show-selected").text();
var responder= $("#responder-text").val();
if(selected !="" && responder !=""){
$.ajax({
url:"<?php echo base_url(); ?>emergency/addResponseInterconsulta",
data: {selected:selected,responder:responder.trim()},
method:"POST",
success:function(data){
	$("#show-selected").text("");
$('#responder-text').val('');
newInterconsulta();	
$('.active-me').prop("disabled",true);
}
});
  }

}); 

$('#clear-interconsulta-response').on('click', function(event) {
$('#responder-text').val('');
});


 
 $('#add-interconsulta').on('click', function(event) {
var area = $("#area").val();	  
 var medico = $("#medico").val();
var causa = $("#causa").val();
if(area !="" && medico !="" && causa !=""){
var id_user  = <?=$user_id?>;
var id_patient = <?=$patient_id?>;
$.ajax({
url:"<?php echo base_url(); ?>emergency/addNewInterconsulta",
data: {id_patient:id_patient,id_user:id_user,area:area,medico:medico,causa:causa.trim()},
method:"POST",
success:function(data){
$(".select2").val('').trigger('change');
$('#causa').val('');
$('#load-div').hide();
newInterconsulta();	
}
});
}
});	


$('#limpiar-interconsulta').on('click', function(event) {
$(".select2").val('').trigger('change');
$('#causa').val('');
$('#load-div').hide();
});



newInterconsulta();
 
 function newInterconsulta()
{
var id_user  = <?=$user_id?>;
var id_patient = <?=$patient_id?>;
$.ajax({
url:"<?php echo base_url(); ?>emergency/newInterconsulta",
data: {id_patient:id_patient,id_user:id_user},
method:"POST",
success:function(data){
$('#newInterconsulta').html(data);
} 
});
}
 
//---------------------------------------------------------------------------- 
 
 function getDoc(val) {
$("#load-div").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
	type: "POST",
	url: '<?php echo site_url('emergency/get_doc');?>',
	data:{id_esp:val},
	success: function(data){
	$("#medico").prop("disabled",false);
	$("#medico").html(data);
	$("#load-div").hide();
	},
	});
}
 
 //-------------------------------------------------------------------------------------------------	

$('#limpiar-eva-nota').on('click', function(event) {
	$('#eva-nota').val('');
});

	

$('#add-eva-nota').on('click', function(event) {
var nota = $("#eva-nota").val();
if(nota !=""){
var id_user  = <?=$user_id?>;
var id_patient = <?=$patient_id?>;
$.ajax({
url:"<?php echo base_url(); ?>emergency/addNewEvaNota",
data: {id_patient:id_patient,id_user:id_user,nota:nota.trim()},
method:"POST",
success:function(data){
$('#eva-nota').val('');
newEvaNota();
	
}
});
}else{
$("#eva-nota").focus();	
}
	
});	
newEvaNota();	
function newEvaNota()
{
var id_user  = <?=$user_id?>;
var id_patient = <?=$patient_id?>;
var area  = "";
$.ajax({
url:"<?php echo base_url(); ?>emergency/newEvaNota",
data: {id_patient:id_patient,id_user:id_user},
method:"POST",
success:function(data){
$('#new-eva-nota').html(data);
} 
});
}
	

 </script>


