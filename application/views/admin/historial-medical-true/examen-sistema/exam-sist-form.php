<h4  class="h4 his_med_title">Examen por sistema (<b><?=$count_examensis?> regitro(s)</b>)</h4>
<?php if ($count_examensis > 0)
{

$i = 1;
 foreach($examensis as $row)
{

$user_c28=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c29=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>
<div class="pagination">
<a  data-toggle="modal" data-target="#ver_exasis" href="<?php echo base_url("admin_medico/show_examsis_by_id/$row->id_exs/$user_id")?>">
<?php echo $i; $i++;  ?>
</a>
<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro</h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c28?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c29?>, <?=$updated_time?></li>
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

 <div  style="overflow-x:auto;">
<span id='exam-sistema-fields' style='display:none'>0</span>
<hr class="prenatal-separator"/>
<form   class="system-exam"  > 
<table  class="table"  cellspacing="0" style="width:100%;">
<!--row 1-->
<tr>
<td class="ida" >

<label class="control-label" >Sistema neurológico</label>

<select class="form-control select2" id="sisneuro" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($neuro as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
 <br/> <button type="button" id="btnSpeechExamSis1" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis1"></span>
<textarea rows="11" class="form-control" id="neurologico"  ></textarea>

</td>
<td class="ida" >


<label class="control-label" >Sistema cardiovascular</label>

<select class="form-control select2" style="width:100%" id="siscardio" >
<option value="">Ningúno</option>
<?php 

foreach($cardiov as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
 <br/> <button type="button" id="btnSpeechExamSis2" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis2"></span>
<textarea rows="11" class="form-control" id="cardiova"  ></textarea>

</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >


<label class="control-label" ><font style="color:red"><strong>*</strong></font> Sistema urogenital</label>

<select class="form-control select2" id="sist_uro" style="width: 100%">
<option value="">Ningúno</option>
<?php 

foreach($urogenial as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
 <br/> <button type="button" id="btnSpeechExamSis3" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis3"></span>
<textarea rows="11" class="form-control" id="urogenital"  ></textarea>

</td>
<td class="ida" >


<label class="control-label" >Sistema músculo esquelético</label>

<select class="form-control select2" id="sis_mu_e" style="width: 100%">
<option value="">Ningúno</option>
<?php 

foreach($musculo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
 <br/> <button type="button" id="btnSpeechExamSis4" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis4"></span>
<textarea rows="11" class="form-control" id="musculoes"  ></textarea>

</td>
</tr>
<tr>
<td class="ida" >


<label class="control-label" >Sistema nervioso</label>
 <br/> <button type="button" id="btnSpeechExamSis5" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis5"></span>
<textarea rows="11" class="form-control" id="nervioso"  ></textarea>

</td>
<td class="ida" >


<label class="control-label" >Sistema linfatico</label>
 <br/> <button type="button" id="btnSpeechExamSis6" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis6"></span>
<textarea rows="11" class="form-control" id="linfatico"  ></textarea>

</td>
</tr>

<tr>

<td class="ida" >


<label class="control-label" >Sistema respiratorio</label>

<select class="form-control select2" id="sist_resp" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($resp as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
 <br/> <button type="button" id="btnSpeechExamSis7" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis7"></span>
<textarea rows="11" class="form-control" id="respiratorio"  ></textarea>

</td>
<td class="ida" >


<label class="control-label" >Sistema genitourinario</label>
 <br/> <button type="button" id="btnSpeechExamSis8" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis8"></span>
<textarea rows="11" class="form-control" id="genitourinario"  ></textarea>

</td>
</tr>
<tr>

<td class="ida" >


<label class="control-label" >Sistema digestivo</label>

<select class="form-control select2" id="sist_diges" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($digest as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
 <br/> <button type="button" id="btnSpeechExamSis9" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis9"></span>
<textarea rows="11" class="form-control" id="digestivo"></textarea>

</td>
<td class="ida" >


<label class="control-label">Sistema endocrino</label>

<select class="form-control select2" id="sist_endo" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($endocrino as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
 <br/> <button type="button" id="btnSpeechExamSis10" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis10"></span>
<textarea rows="11" class="form-control" id="endocrino"  ></textarea>

</td>
</tr>
<tr>

<td class="ida" >


<label class="control-label" >Relativo a</label>

<select class="form-control select2" id="sist_rela" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
 <br/> <button type="button" id="btnSpeechExamSis11" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis11"></span>
<textarea rows="11" class="form-control" id="otros_ex_sis" ></textarea>

</td>
<td class="ida" >


<label class="control-label" >Columna dorsal</label>
 <br/> <button type="button" id="btnSpeechExamSis12" title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm" ><i class="fa fa-microphone" aria-hidden="true" style="font-size:9px"></i></button>
  &nbsp; <span id="actionSpeechExamSis12"></span>
<textarea rows="11" class="form-control" id="dorsales"    ></textarea>

</td>
</tr>
<tr>
</table>
</form>
</div>
<script>
$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
$(".select2").select2({
tags: true
});


/*$('.system-exam :input').change(function() {
var els = $('.system-exam :input').filter(function() {
    return this.value !== "" && this.value !== "0";
}); 

if (els.length > 0) {
	  $('#exam-sistema-fields').text(1);
}else{
  $('#exam-sistema-fields').text(0);	
}
});*/



                   var btnSpeechExamSis1 = document.getElementById('btnSpeechExamSis1');
					
					btnSpeechExamSis1.onclick = function() {
					var output = document.getElementById("neurologico");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis1");
					runSpeechRecognition(output,action);
					}
					
					
					 var btnSpeechExamSis2 = document.getElementById('btnSpeechExamSis2');
					
					btnSpeechExamSis2.onclick = function() {
					var output = document.getElementById("cardiova");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis2");
					runSpeechRecognition(output,action);
					}
					
					
					
					  var btnSpeechExamSis3 = document.getElementById('btnSpeechExamSis3');
					
					btnSpeechExamSis3.onclick = function() {
					var output = document.getElementById("urogenital");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis3");
					runSpeechRecognition(output,action);
					}
					
					
					
					
					  var btnSpeechExamSis4 = document.getElementById('btnSpeechExamSis4');
					
					btnSpeechExamSis4.onclick = function() {
					var output = document.getElementById("musculoes");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis4");
					runSpeechRecognition(output,action);
					}
					
					
					
					  var btnSpeechExamSis5 = document.getElementById('btnSpeechExamSis5');
					
					btnSpeechExamSis5.onclick = function() {
					var output = document.getElementById("nervioso");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis5");
					runSpeechRecognition(output,action);
					}
					
					
					  var btnSpeechExamSis6 = document.getElementById('btnSpeechExamSis6');
					
					btnSpeechExamSis6.onclick = function() {
					var output = document.getElementById("linfatico");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis6");
					runSpeechRecognition(output,action);
					}
					
					
					  var btnSpeechExamSis7 = document.getElementById('btnSpeechExamSis7');
					
					btnSpeechExamSis7.onclick = function() {
					var output = document.getElementById("respiratorio");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis7");
					runSpeechRecognition(output,action);
					}
					
					  var btnSpeechExamSis8 = document.getElementById('btnSpeechExamSis8');
					
					btnSpeechExamSis8.onclick = function() {
					var output = document.getElementById("genitourinario");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis8");
					runSpeechRecognition(output,action);
					}
					
					  var btnSpeechExamSis9 = document.getElementById('btnSpeechExamSis9');
					
					btnSpeechExamSis9.onclick = function() {
					var output = document.getElementById("digestivo");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis9");
					runSpeechRecognition(output,action);
					}
					
					
					  var btnSpeechExamSis10 = document.getElementById('btnSpeechExamSis10');
					
					btnSpeechExamSis10.onclick = function() {
					var output = document.getElementById("endocrino");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis10");
					runSpeechRecognition(output,action);
					}
					
					
					  var btnSpeechExamSis11 = document.getElementById('btnSpeechExamSis11');
					
					btnSpeechExamSis11.onclick = function() {
					var output = document.getElementById("otros_ex_sis");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis11");
					runSpeechRecognition(output,action);
					}
					
					
				 var btnSpeechExamSis12 = document.getElementById('btnSpeechExamSis12');
					
					btnSpeechExamSis12.onclick = function() {
					var output = document.getElementById("dorsales");
					// get action element reference
					var action = document.getElementById("actionSpeechExamSis12");
					runSpeechRecognition(output,action);
					}
</script>