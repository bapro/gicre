<div class="col-md-12"  >
<h4 class="h4 his_med_title">Evaluación/Condición </h4>
<id id="evaluationCondPag"></id>

 <div id='evaConRslt' ></div>
<form id="evaluacion-condicion"  >
<div class="col-md-5" id='clear-cd' >
 <div class="form-group row">
    <label  class="col-form-label"><span style="color:red">*</span> Condición General </label>
    
<select   class="form-control select2"   id="condicion_general" data-select2-tags="true"  >
<option value=''></option>
<?php 
$sqlhev1 ="SELECT DISTINCT condicion_general FROM hosp_eval_cond";
$HEV1=$this->db->query($sqlhev1);
foreach($HEV1->result() as $row)
{ 
echo '<option value="'.$row->condicion_general.'">'.$row->condicion_general.'</option>';
}
?>
</select>
  </div>
  <div class="form-group row">
    <label  class="col-form-label"><span style="color:red">*</span> Estado de Conciencia </label>
  <select   class="form-control select2"   id="estado_conciencia" data-select2-tags="true"  >
<option value=''></option>
<?php 
$sqlhev2 ="SELECT DISTINCT estado_conciencia FROM hosp_eval_cond";
$HEV2=$this->db->query($sqlhev2);
foreach($HEV2->result() as $row2)
{ 
echo '<option value="'.$row2->estado_conciencia.'">'.$row2->estado_conciencia.'</option>';
}
?>
</select>
  </div>
  
   <div class="form-group row">
  <label for="name" class="control-label">Orientación</label>
  <div class=" checkbox-wrapper">
    <div class="checkbox-inline">
      <input class="form-check-input" type="checkbox"  name="orient_tiempo" value="0">
      <label class="form-check-label" for="severity_0">Tiempo</label>
    </div>
    <div class="checkbox-inline">
      <input class="form-check-input" type="checkbox"  name="orient_lugar" value="2">
      <label class="form-check-label" for="severity_2">Lugar</label>
    </div>
    <div class="checkbox-inline">
      <input class="form-check-input" type="checkbox"  name="orient_pers" value="4">
      <label class="form-check-label" for="severity_4">Persona</label>
    </div>
  </div>
    </div>
     <div class="form-group row">
    <label  class="col-form-label">Comunicación</label>
<select   class="form-control select2"   id="comunicacion" data-select2-tags="true"  >
<option value=''></option>
<?php 
$sqlhev3="SELECT DISTINCT comunicacion FROM hosp_eval_cond";
$HEV3=$this->db->query($sqlhev3);
foreach($HEV3->result() as $row3)
{ 
echo '<option value="'.$row3->comunicacion.'">'.$row3->comunicacion.'</option>';
}
?>
</select>

 
  </div>

 <div class="form-group row">
    <label  class="col-form-label">Val. Nuerologica</label>
	<select   class="form-control select2"   id="val_neuro" data-select2-tags="true"  >
<option value=''></option>

<?php 
$sqlhev3="SELECT DISTINCT val_neuro FROM hosp_eval_cond";
$HEV3=$this->db->query($sqlhev3);
foreach($HEV3->result() as $row3)
{ 
echo '<option value="'.$row3->val_neuro.'">'.$row3->val_neuro.'</option>';
}
?>

</select>

	 </div>

 

	<div class="form-group row">
	<label  class="col-form-label">Estado Cardiaco</label>
	<select   class="form-control select2"   id="estado_cardia" data-select2-tags="true"  >
	<option value=''></option>

		<?php 
		$sqlhev3="SELECT DISTINCT estado_cardia FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->estado_cardia.'">'.$row3->estado_cardia.'</option>';
		}
		?>
	</select>
	</div>

  	<div class="form-group row">
	<label  class="col-form-label">Est. Respiratoria</label>
	<select   class="form-control select2"   id="est_respiratoria" data-select2-tags="true"  >
	<option value=''></option>
	
	<?php 
		$sqlhev3="SELECT DISTINCT est_respiratoria FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->est_respiratoria.'">'.$row3->est_respiratoria.'</option>';
		}
		?>
	</select>
	</div>
	
	
  	<div class="form-group row">
	<label  class="col-form-label">Oxinoterapia</label>
	<select   class="form-control select2"   id="oxinoterapia" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT oxinoterapia FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->oxinoterapia.'">'.$row3->oxinoterapia.'</option>';
		}
		?>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Terapia Respiratoria</label>
	<select   class="form-control select2"   id="terapia_resp" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT terapia_resp FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->terapia_resp.'">'.$row3->terapia_resp.'</option>';
		}
		?>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Sec. de Vias Resp</label>
	<select   class="form-control select2"   id="sec_vias_resp" data-select2-tags="true"  >
	<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT sec_vias_resp FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->sec_vias_resp.'">'.$row3->sec_vias_resp.'</option>';
		}
		?>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Sangrado</label>
	<select   class="form-control select2"   id="eva_sangrado" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT sangrado FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->sangrado.'">'.$row3->sangrado.'</option>';
		}
		?>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Tipo de Sangrado</label>
	<select   class="form-control select2"   id="tipo_sangrado" data-select2-tags="true"  >
	<option value=''></option>
		<?php 
		$sqlhev3="SELECT DISTINCT tipo_sangrado FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->tipo_sangrado.'">'.$row3->tipo_sangrado.'</option>';
		}
		?>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Presentación de Dolor</label>
	<select   class="form-control select2"   id="presenta_dolor" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT presenta_dolor FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->presenta_dolor.'">'.$row3->presenta_dolor.'</option>';
		}
		?>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Canalización</label>
	<select   class="form-control select2"   id="eva_canalizacion" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT canalizacion FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->canalizacion.'">'.$row3->canalizacion.'</option>';
		}
		?>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Drenajes</label>
	<select   class="form-control select2"   id="eva_drenajes" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT drenajes FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->drenajes.'">'.$row3->drenajes.'</option>';
		}
		?>
	</select>
	</div>
   </div>
   <div class="col-md-6 col-md-offset-1"  >
<div class="form-group row">
	<label  class="col-form-label">Diuresis</label>
	<select   class="form-control select2"   id="eva_diuresis" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT eva_diuresis FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->eva_diuresis.'">'.$row3->eva_diuresis.'</option>';
		}
		?>
	</select>
	</div>

<div class="form-group row">
<label  class="col-form-label">Gastrica</label>
<div class="checkbox ">
  <label><input type="checkbox" name="eva_nauseas" >Nauseas</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="eva_vomitos" >Vomitos</label>
<select   class="form-control select2"   id="vomitos_sel" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT vomitos_sel FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->vomitos_sel.'">'.$row3->vomitos_sel.'</option>';
		}
		?>
	</select>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="drenaje_sonda_nas" >Drenaje Sonda Nasogastica</label>
<select   class="form-control select2"   id="drenaje_sonda_nas_sel" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT drenaje_sonda_nas_sel FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->drenaje_sonda_nas_sel.'">'.$row3->drenaje_sonda_nas_sel.'</option>';
		}
		?>
	</select>

</div>
	</div>


  <div class="form-group row">
  <label for="name" class="control-label">Evaluación</label>
  <div class=" radio-wrapper">
    <div class="radio-inline">
      <input class="form-check-input" type="radio"  name="evalucacion" value="0">
      <label class="form-check-label" for="severity_0">No</label>
    </div>
    <div class="radio-inline">
      <input class="form-check-input" type="radio"  name="evalucacion" value="2">
      <label class="form-check-label" for="severity_2">si</label>
    </div>
   
   <select   class="form-control select2"   id="evaluacion_sel" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT evaluacion_sel FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->evaluacion_sel.'">'.$row3->evaluacion_sel.'</option>';
		}
		?>
	</select>
   
  </div>
    </div>

<div class="form-group row">
<label  class="col-form-label">Diarrea</label>
<select   class="form-control select2"   id="diarrea" data-select2-tags="true"  >
<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT diarrea FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->diarrea.'">'.$row3->diarrea.'</option>';
		}
		?>
</select>
</div>

<div class="form-group row">
<div class="col-xs-5"  >
<label  class="col-form-label">Val. Abdomen</label>
<select   class="form-control select2"   id="val_abdomen" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT val_abdomen FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->val_abdomen.'">'.$row3->val_abdomen.'</option>';
		}
		?>
</select>
</div>
   <div class="col-xs-3"  >
   <label  class="col-form-label">Peristalsis</label>
<select   class="form-control select2"   id="peristalsis" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT peristalsis FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->peristalsis.'">'.$row3->peristalsis.'</option>';
		}
		?>
</select>
</div>


</div>

Evalua

  <div class="form-group row">
  <label for="name" class="control-label">Alimentación</label>
  <div class=" radio-wrapper">
    <div class="radio-inline">
      <input class="form-check-input" type="radio"  name="alimentacion" value="0">
      <label class="form-check-label" for="severity_0">No</label>
    </div>
    <div class="radio-inline">
      <input class="form-check-input" type="radio"  name="alimentacion" value="2">
      <label class="form-check-label" for="severity_2">si</label>
    </div>
   
   <select   class="form-control select2"   id="alimentacion_sel" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT alimentacion_sel FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->alimentacion_sel.'">'.$row3->alimentacion_sel.'</option>';
		}
		?>
   
  </div>
    </div>

 <div class="form-group row">
    <label  class="col-form-label">Val. Vascular Miemb. Sup. e Inf.</label>
	<div class="input-group">
    <span class="input-group-addon">coloracion</span> 
<select   class="form-control select2"   id="coloracion" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT coloracion FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->coloracion.'">'.$row3->coloracion.'</option>';
		}
		?>
</select>
</div>
<br/>
	<div class="input-group">
    <span class="input-group-addon">Pulso</span> 
<select   class="form-control select2"   id="eva_pulso" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT eva_pulso FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->eva_pulso.'">'.$row3->eva_pulso.'</option>';
		}
		?>
</select>
</div>
<br/>
	<div class="input-group">
    <span class="input-group-addon">Edema</span> 
<select   class="form-control select2"   id="eva_edema" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT eva_edema FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->eva_edema.'">'.$row3->eva_edema.'</option>';
		}
		?>
</select>
</div>

</div>



<div class="form-group row">
<label  class="col-form-label">Valoración de la Piel</label>
<select   class="form-control select2"   id="val_piel" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT val_piel FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->val_piel.'">'.$row3->val_piel.'</option>';
		}
		?>
</select>
</div>
<div class="form-group row">
<label  class="col-form-label">Cuidados A</label>
<select   class="form-control select2"   id="cuidados_a" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT cuidados_a FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->cuidados_a.'">'.$row3->cuidados_a.'</option>';
		}
		?>
</select>
</div>

<div class="form-group row">
<label  class="col-form-label">Movilización</label>
<select   class="form-control select2"   id="movilizacion" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT movilizacion FROM hosp_eval_cond";
		$HEV3=$this->db->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		echo '<option value="'.$row3->movilizacion.'">'.$row3->movilizacion.'</option>';
		}
		?>
</select>
</div>

<div class="form-group row">
<label class="control-label" >Otras Notas</label>
<textarea rows="6" cols="15" class="form-control" id="eva_con_otros_notas" ></textarea>
</div>



   </div>

   </form>
  </div> 

<div class="modal fade" id="verEvaCon"  role="dialog" >
<div class="modal-dialog modal-inc-width8">
<div class="modal-content" >

</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {

   $("#saveEvaCond").on('click', function(e){
	   e.preventDefault();
 let estado_conciencia = $("#estado_conciencia").val(); 
let condicion_general = $("#condicion_general").val(); 

let orient_tiempo = [];
$("input[name='orient_tiempo']:checked").each(function(){
orient_tiempo.push(this.value);
});

let orient_lugar = [];
$("input[name='orient_lugar']:checked").each(function(){
orient_lugar.push(this.value);
});

let orient_pers = [];
$("input[name='orient_pers']:checked").each(function(){
orient_pers.push(this.value);
});

let val_neuro = $("#val_neuro").val(); 
let comunicacion = $("#comunicacion").val(); 
let est_respiratoria = $("#est_respiratoria").val(); 
let estado_cardia = $("#estado_cardia").val(); 
let oxinoterapia = $("#oxinoterapia").val(); 
let terapia_resp = $("#terapia_resp").val(); 
let sec_vias_resp = $("#sec_vias_resp").val(); 
let sangrado = $("#eva_sangrado").val(); 
let tipo_sangrado = $("#tipo_sangrado").val(); 
let presenta_dolor = $("#presenta_dolor").val(); 
let canalizacion = $("#eva_canalizacion").val(); 
let drenajes = $("#eva_drenajes").val(); 
let eva_diuresis = $("#eva_diuresis").val(); 

let nauseas = [];
$("input[name='eva_nauseas']:checked").each(function(){
nauseas.push(this.value);
});

let vomitos = [];
$("input[name='eva_vomitos']:checked").each(function(){
vomitos.push(this.value);
});

let vomitos_sel = $("#vomitos_sel").val(); 
let drenaje_sonda_nas = $("#drenaje_sonda_nas").val(); 
let drenaje_sonda_nas_sel = $("#drenaje_sonda_nas_sel").val(); 
let evalucacion = $('input:radio[name=evalucacion]:checked').val();
let evaluacion_sel = $("#evaluacion_sel").val(); 
let diarrea = $("#diarrea").val(); 
let val_abdomen = $("#val_abdomen").val(); 
let peristalsis = $("#peristalsis").val(); 
let alimentacion = $('input:radio[name=alimentacion]:checked').val();
let alimentacion_sel = $("#alimentacion_sel").val(); 
let coloracion = $("#coloracion").val(); 
let eva_pulso = $("#eva_pulso").val(); 
let eva_edema = $("#eva_edema").val(); 
let val_piel = $("#val_piel").val(); 
let cuidados_a = $("#cuidados_a").val(); 
let movilizacion = $("#movilizacion").val();
let eva_con_otros_notas = $("#eva_con_otros_notas").val();
let id_hosp=<?=$id_hosp?>;
let user_id=<?=$user_id?>;
let d_centro=<?=$centro_id?>;
let id_patient=<?=$patient_id?>;

$.ajax({
type: 'POST',
dataType: 'json',
url:"<?php echo base_url(); ?>hosp_eval_con/saveEvaluationCondition",
data: {id_patient:id_patient,id_user:user_id,id_hosp:id_hosp,id_centro:d_centro,
condicion_general:condicion_general,estado_conciencia:estado_conciencia,orient_tiempo:orient_tiempo,orient_lugar:orient_lugar,orient_pers:orient_pers,
comunicacion:comunicacion,val_neuro:val_neuro,estado_cardia:estado_cardia,est_respiratoria:est_respiratoria,oxinoterapia:oxinoterapia,terapia_resp:terapia_resp,
sec_vias_resp:sec_vias_resp,sangrado:sangrado,tipo_sangrado:tipo_sangrado,presenta_dolor:presenta_dolor,canalizacion:canalizacion,drenajes:drenajes,eva_con_otros_notas:eva_con_otros_notas,
eva_diuresis:eva_diuresis,nauseas:nauseas,vomitos:vomitos,vomitos_sel:vomitos_sel,drenaje_sonda_nas:drenaje_sonda_nas,drenaje_sonda_nas_sel:drenaje_sonda_nas_sel,
evalucacion:evalucacion,evaluacion_sel:evaluacion_sel,diarrea:diarrea,val_abdomen:val_abdomen,peristalsis:peristalsis,alimentacion:alimentacion,
alimentacion_sel:alimentacion_sel,coloracion:coloracion,eva_pulso:eva_pulso,eva_edema:eva_edema,val_piel:val_piel,cuidados_a:cuidados_a,movilizacion:movilizacion
},

success: function(response){ //console.log(response);
if(response.status == 1){
$('#evaConRslt').html('<p class="alert alert-success">'+response.message+'</p>');
$("html, body").animate({
scrollTop: 0
}, 1000)
paginateEvaCond(<?=$patient_id?>);
$("#evaluacion-condicion.select2").val('').trigger('change');
} else if(response.status == 2){
$('#evaConRslt').html('<p class="alert alert-warning">'+response.message+'</p>');	
}else{
$('#evaConRslt').html('<p class="alert alert-danger">'+response.message+'</p>');
$("html, body").animate({
scrollTop: 0
}, 1000)
}
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.required-menu').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});  

});

 
$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
	  
});


function paginateEvaCond(id){
$.ajax({
url:"<?php echo base_url(); ?>hosp_eval_con/paginateEvaCond",
data: {id_patient:id, user_id:<?=$user_id?>, id_hosp:<?=$id_hosp?>},
method:"POST",
success:function(data){
$('#evaluationCondPag').html(data);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#evaluationCondPag').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

}
paginateEvaCond(<?=$patient_id?>);
 </script>