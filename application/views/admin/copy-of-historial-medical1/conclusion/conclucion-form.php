<br/>
<br/>
<style>
.box-tooltip2 {
    color: black;
   background:white;
   border-radius:20px;
   padding:6px;
  border: 1px solid red;
   z-index:100000
}

.pagination2 {
    display: inline-block;
}
</style>
<h4 class="h4 his_med_title">conclusion diagnostica (<b><?=$count_conc?> regitro(s)</b>)</h4>
<?php 
$disable_cied='';
if ($count_conc > 0)
{
$hist_date=$this->db->select('hist_date')->where('id_pat',$id_historial)->get('saveHistPat')->row('hist_date');
if($hist_date==date("Y-m-d")){
$disable_cied="disabled";
} else{
$disable_cied="";	
}
$i = 1;
 foreach($concluciones as $row)
{

$diagno_def=$this->db->select('diagno_def')->where('con_id_link',$row->id_cdia)->get('h_c_diagno_def_link')->row('diagno_def');

$diag=$this->db->select('description')->where('idd',$diagno_def)->get('cied')->row('description');

$user_c36=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c37=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
?>
<div class="pagination">
<a class="con-pop-cl" data-toggle="modal" data-target="#ver_con_d" href="<?php echo base_url("admin_medico/show_con_by_id/$row->id_cdia/$id_historial/$user_id/$row->centro_medico/0")?>">
<?php echo $i; $i++;  ?>
</a>

<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'><?=$centro?></h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c36?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c37?>, <?=$updated_time?></li>
<hr/>
<li><strong>Diagnostico(s) Presuntivo o Definitivo (CIE10) </strong> : <?=$diag?></li>
<li><strong>Plan</strong> : <?=$row->plan?></li>
</ul>
</div>
</div>
<?php
}


}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

<div class="col-md-12 move_left" id="reload-cond" >


<hr class="prenatal-separator"/>

<div  id="flashe" class="col-md-12 form-horizontal">
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-10">
<input type="text" <?=$disable_cied?> id="on_input_cied" autocomplete="off" class="form-control on_input_cied" ><br/> 
<div id="show-selected-cie10" style='display:none'></div>
<div class="cied_result"></div>
</div>

</div>

<div class="form-group otros-diagnos" style="display:none">
<label class="control-label col-md-2" >Otros diagnosticos (opcional)</label>
<div class="col-md-10">
<textarea  class="form-control save-con-diag"  id="otros_diagnos"  ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Plan</label>
<div class="col-md-10">
 <button type="button" id="btnSpeechConDiagPlan" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechConDiagPlan"></span>
<textarea rows="6" class="form-control required-patient-inputs save-con-diag" id="plan" ></textarea>
</div>

</div>

 <div class="form-group">
 <?php

 $id_seg=$this->db->select('seguro_medico')->where('id_p_a',$id_historial)->get('patients_appointments')->row('seguro_medico');
 $seg_n=$this->db->select('title')->where('id_sm',$id_seg)->get('seguro_medico')->row('title');

 
 ?>
<label class="control-label col-md-2" >Procedimiento </label>
<div class="col-md-10">
 <button type="button" id="btnSpeechConDiagProced" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechConDiagProced"></span>
  <textarea rows="6" class="form-control save-con-diag" id="proced" ></textarea>
  <?php if($id_seg){?>
<h4><?=$seg_n?></h4>
  <select class="form-control select2"   id="tarif-proced" >
  <option value=''>Seleccionar</option>
  <?php 
  
  $sqlpt = "select id_tarif, procedimiento,monto FROM tarifarios WHERE id_seguro=$id_seg AND id_doctor=$user_id GROUP BY procedimiento";
	$proct= $this->db->query($sqlpt);
foreach($proct->result() as $rowTaf)
{ 
echo '<option value="'.$rowTaf->id_tarif.'">'.$rowTaf->procedimiento.' (RD$'.$rowTaf->monto.')</option>';
}
?>
  </select>
<?php }else{
	echo "<span style='color:red'>El campo de seguro del paciente esta vacío</span>";
}?> 
 <div id="load-procedimientos-tarif"></div>
</div>


</div>

<div class="form-group">
<label class="control-label col-md-2" >Evolucion (Paciente subsecuente):</label>
<div class="col-md-10">
 <button type="button" id="btnSpeechConDiagEvo" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true"></i></button>
  &nbsp; <span id="actionSpeechConDiagEvo"></span>
<textarea rows="7" class="form-control required-patient-inputs save-con-diag" id="evolucion"  ></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" ></label>
<div class="col-md-6">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Mejoria" checked> <label>Mejoria</label>&nbsp;

<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Empeorando"> <label>Empeorando </label>&nbsp;

<input type="radio" id="conclusion_radio" name="conclusion_radio" value="No mejoria" > <label>No mejoria  </label>&nbsp;

</div>
</div>
</div>
</div>
<script>
//-----------------------------------------------------------------------------------------------------

function saveOtrosDiag(){
var conclusion_radio = $('input:radio[name=conclusion_radio]:checked').val();
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/saveOtrosDiag')?>',
data: {user_id:<?=$user_id?>,centro_medico:<?=$centro_medico?>,id_pat:<?=$id_historial?>,otros_diagnos:$('#otros_diagnos').val(),plan:$('#plan').val(),proced:$('#proced').val(),evolucion:$('#evolucion').val(),conclusion_radio:conclusion_radio},
success:function(data) {
},
});
}
//var timer = null;
//$('#otros_diagnos').keydown(function(){
      // clearTimeout(timer); 
      // timer = setTimeout(saveOtrosDiag, 1000)
//});


$('.save-con-diag').on('input', function() {
saveOtrosDiag();
});

$('input[type=radio][name=conclusion_radio]').on('change', function() {
saveOtrosDiag();
});




			/* SAVE SPEECH FOR LABORATORIOS */
			   var btnSpeechConDiagPlan = document.getElementById('btnSpeechConDiagPlan');
					
					btnSpeechConDiagPlan.onclick = function() {
					var output = document.getElementById("plan");
					// get action element reference
					var action = document.getElementById("actionSpeechConDiagPlan");
					runSpeechRecognition(output,action);
					}
	
	/* SAVE SPEECH FOR PROCEDIMIENTO */
			
					var btnSpeechConDiagProced = document.getElementById('btnSpeechConDiagProced');
					
					btnSpeechConDiagProced.onclick = function() {
					var output = document.getElementById("proced");
					// get action element reference
					var action = document.getElementById("actionSpeechConDiagProced");
					runSpeechRecognition(output,action);
					}
				
					/* SAVE SPEECH FOR ESTUDIOS */
			   var btnSpeechConDiagEvo = document.getElementById('btnSpeechConDiagEvo');
					
					btnSpeechConDiagEvo.onclick = function() {
					var output = document.getElementById("evolucion");
					// get action element reference
					var action = document.getElementById("actionSpeechConDiagEvo");
					runSpeechRecognition(output,action);
					}	
	


$('#tarif-proced').on('change', function(event) {
event.preventDefault();
if($(this).val() !=''){
$('#load-procedimientos-tarif').html('Agregando...');
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/save_hist_tarif_pro",
data: {id_tarif:$(this).val(),user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,id_cd:0},
method:"POST",
success:function(data){
$('#load-procedimientos-tarif').html(data);
}
});
}
});

function loadProcedimientoFacData(){
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadProcedimientoFacData",
data: {id_cd:0,patient:<?=$id_historial?>, user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$("#load-procedimientos-tarif").html(data);
},

});
}

$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
	  
var timer = null;
$('.on_input_cied').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000)
});
doStuff1();
function doStuff1() {
	var id_pat="<?=$id_historial?>";
	var user_id="<?=$user_id?>";
	var centro_medico="<?=$centro_medico?>";
    var str= $(".on_input_cied").val();
	var id_cdia="";
	var tab= "exam-1";
	var origine=0;
$(".cied_result").fadeIn().html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
$( ".cied_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat+"&tab="+tab+"&user_id="+user_id+"&centro_medico="+centro_medico+"&id_cdia="+id_cdia+"&origine="+origine, function( data ){
$(".cied_result").html(data); 
			   
});
}
}


$(".select2").select2({
	
  tags: true
});
</script>