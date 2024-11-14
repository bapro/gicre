<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>

<?php
foreach($queryexneu->result() as $row)
$user_c11=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c12=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));

$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="modal-header text-center"  id="background_">
<?php $this->load->view('hospitalizacion/historial/header-patient-data');?>
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div  class="modal-title"  ><h3>Evaluación/Condición # <?=$row->id?></h3>

<span style='font-size:13px'>
Creado por :<?=$user_c11?>, <?=$inserted_time?><br/>
 <span style="color:red"> Cambiado por :<?=$user_c12?> | fecha :<?=$update_time?></span> 

</span>
 </div>
<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="btn-sm btn-primary updateEvCon"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
 <span class='saveEvConres'></span>
<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/ev_con")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<div class="_resultwrwre" ></div>
</div>

<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">

<div id="_evaluacion-condicion">
<div class="col-md-5"  >
 <div class="form-group row">
    <label  class="col-form-label">Condición General </label>
    
<select   class="form-control select2"   id="_condicion_general"  >
<option value='<?=$row->condicion_general?>'><?=$row->condicion_general?></option>
<option value='1'>1</option>
</select>
  </div>
  <div class="form-group row">
    <label  class="col-form-label">Estado de Conciencia </label>
  <select   class="form-control select2"   id="_estado_conciencia" id="_estado_conciencia" >
<option value='<?=$row->estado_conciencia?>'><?=$row->estado_conciencia?></option>
<option value='1'>1</option>
</select>
  </div>
  
  <div class="form-group row">
  <label  class="control-label">Orientación</label>
  <div class=" checkbox-wrapper">
    <div class="checkbox-inline">
	  <?php
   if ($row->orient_tiempo ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input class="form-check-input" type="checkbox"  name="_orient_tiempo" <?=$selected?> >
      <label class="form-check-label" >Tiempo</label>
    </div>
    <div class="checkbox-inline">
	  <?php
   if ($row->orient_lugar ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input class="form-check-input" type="checkbox"  name="_orient_lugar" <?=$selected?>>
      <label class="form-check-label" for="severity_2">Lugar</label>
    </div>
    <div class="checkbox-inline">
	  <?php
   if ($row->orient_pers ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input class="form-check-input" type="checkbox"  name="_orient_pers" <?=$selected?>>
      <label class="form-check-label" >Persona</label>
    </div>
  </div>
    </div>

	
   <div class="form-group row">
    <label  class="col-form-label">Comunicación</label>
<select   class="form-control select2"   id="_comunicacion"  >
<option value='<?=$row->comunicacion?>'><?=$row->comunicacion?></option>
<option value='1'>1</option>
</select>

 
  </div>

 <div class="form-group row">
    <label  class="col-form-label">Val. Nuerologica</label>
	<select   class="form-control select2"   id="_val_neuro"  >
<option value='<?=$row->val_neuro?>'><?=$row->val_neuro?></option>
<option value='1'>1</option>
</select>

	 </div>

 

	<div class="form-group row">
	<label  class="col-form-label">Estado Cardiaco</label>
	<select   class="form-control select2"   id="_estado_cardia"  >
   <option value='<?=$row->estado_cardia?>'><?=$row->estado_cardia?></option>
    <option value='1'>1</option>
	</select>
	</div>

  	<div class="form-group row">
	<label  class="col-form-label">Est. Respiratoria</label>
	<select   class="form-control select2"   id="_est_respiratoria"  >
	 <option value='<?=$row->est_respiratoria?>'><?=$row->est_respiratoria?></option>
	<option value='1'>1</option>
	</select>
	</div>
	
	
  	<div class="form-group row">
	<label  class="col-form-label">Oxinoterapia</label>
	<select   class="form-control select2"   id="_oxinoterapia"  >
 <option value='<?=$row->oxinoterapia?>'><?=$row->oxinoterapia?></option>
<option value='1'>1</option>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Terapia Respiratoria</label>
	<select   class="form-control select2"   id="_terapia_resp"  >
	<option value='<?=$row->terapia_resp?>'><?=$row->terapia_resp?></option>
	<option value='1'>1</option>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Sec. de Vias Resp</label>
	<select   class="form-control select2"   id="_sec_vias_resp"  >
	<option value='<?=$row->sec_vias_resp?>'><?=$row->sec_vias_resp?></option>
	<option value='1'>1</option>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Sangrado</label>
	<select   class="form-control select2"   id="_sangrado"  >
	<option value='<?=$row->sangrado?>'><?=$row->sangrado?></option>
	<option value='1'>1</option>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Tipo de Sangrado</label>
	<select   class="form-control select2"   id="_tipo_sangrado"  >
	<option value='<?=$row->tipo_sangrado?>'><?=$row->tipo_sangrado?></option>
	<option value='1'>1</option>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Presentación de Dolor</label>
	<select   class="form-control select2"   id="_presenta_dolor"  >
	<option value='<?=$row->presenta_dolor?>'><?=$row->presenta_dolor?></option>
	<option value='1'>1</option>
	</select>
	</div>
	<div class="form-group row">
	<label  class="col-form-label">Canalización</label>
	<select   class="form-control select2"   id="_canalizacion"  >
	<option value='<?=$row->canalizacion?>'><?=$row->canalizacion?></option>
	<option value='1'>1</option>
	</select>
	</div>
	
	<div class="form-group row">
	<label  class="col-form-label">Drenajes</label>
	<select   class="form-control select2"   id="_drenajes"  >
	<option value='<?=$row->drenajes?>'><?=$row->drenajes?></option>
	<option value='1'>1</option>
	</select>
	</div>
   </div>
   <div class="col-md-6 col-md-offset-1"  >
<div class="form-group row">
	<label  class="col-form-label">Diuresis</label>
	<select   class="form-control select2"   id="_eva_diuresis"  >
	<option value='<?=$row->eva_diuresis?>'><?=$row->eva_diuresis?></option>
	<option value='1'>1</option>
	</select>
	</div>

<div class="form-group row">
<label  class="col-form-label">Gastrica</label>
<br/>
<div class="checkbox ">

<?php
   if ($row->nauseas ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>

 <label><input type="checkbox" name="_nauseas" <?=$selected?>>Nauseas</label>
</div>
<div class="checkbox ">
<?php
   if ($row->vomitos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_vomitos" <?=$selected?>>Vomitos</label>
<select   class="form-control select2"   id="_vomitos_sel"  >
	<option value='<?=$row->vomitos_sel ?>'><?=$row->vomitos_sel ?></option>
	<option value='1'>1</option>
	</select>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="_drenaje_sonda_nas" >Drenaje Sonda Nasogastica</label>
<select   class="form-control select2"   id="_drenaje_sonda_nas_sel"  >
	<option value='<?=$row->drenaje_sonda_nas_sel ?>'><?=$row->drenaje_sonda_nas_sel ?></option>
	<option value='1'>1</option>
	</select>

</div>
	</div>


 <div class="form-group row">
  <label  class="control-label">Evaluación</label>
  <div class=" radio-wrapper">
    <div class="radio-inline">
	<?php
	
	if($row->evalucacion ==0 && $row->evalucacion !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
	?>
	  <input class="form-check-input" type="radio"  name="_evalucacion" value="0" <?= $checked?>>
      <label class="form-check-label" >No</label>
    </div>
    <div class="radio-inline">
	<?php
	
	if($row->evalucacion ==1 && $row->evalucacion !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
	?>
      <input class="form-check-input" type="radio"  name="_evalucacion" value="1" <?= $checked?>>
      <label class="form-check-label" for="severity_2">si</label>
    </div>
   
   <select   class="form-control select2"   id="_evaluacion_sel"  >
	<option value='<?=$row->evaluacion_sel ?>'><?=$row->evaluacion_sel ?></option>
	<option value='1'>1</option>
	</select>
   
  </div>
    </div>


<div class="form-group row">
<label  class="col-form-label">Diarrea</label>
<select   class="form-control select2"   id="_diarrea"  >
<option value='<?=$row->diarrea ?>'><?=$row->diarrea ?></option>
<option value='1'>1</option>
</select>
</div>

<div class="form-group row">
<div class="col-xs-5"  >
<label  class="col-form-label">Val. Abdomen</label>
<select   class="form-control select2"   id="_val_abdomen"  >
<option value='<?=$row->val_abdomen ?>'><?=$row->val_abdomen ?></option>
<option value='1'>1</option>
</select>
</div>
   <div class="col-xs-3"  >
   <label  class="col-form-label">Peristalsis</label>
<select   class="form-control select2"   id="_peristalsis"  >
<option value='<?=$row->peristalsis ?>'><?=$row->peristalsis ?></option>
<option value='1'>1</option>
</select>
</div>


</div>



  <div class="form-group row">
  <label  class="control-label">Alimentación</label>
  <div class=" radio-wrapper">
    <div class="radio-inline">
	<?php
	
	if($row->alimentacion ==0 && $row->alimentacion !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
	?>
      <input class="form-check-input" type="radio"  name="_alimentacion" value="0" <?=$checked?>>
      <label class="form-check-label" >No</label>
    </div>
    <div class="radio-inline">
	<?php
	
	if($row->alimentacion ==1 && $row->alimentacion !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
	?>
      <input class="form-check-input" type="radio"  name="_alimentacion" value="1" <?=$checked?>>
      <label class="form-check-label" for="severity_2">si</label>
    </div>
   
   <select   class="form-control select2"   id="_alimentacion_sel"  >
	<option value='<?=$row->alimentacion_sel ?>'><?=$row->alimentacion_sel ?></option>
	<option value='1'>1</option>
	</select>
   
  </div>
    </div>


 <div class="form-group row">
    <label  class="col-form-label">Val. Vascular Miemb. Sup. e Inf.</label>
	<br/>	<br/>
	<div class="input-group">
    <span class="input-group-addon">coloración</span> 
<select   class="form-control select2"   id="_coloracion"  >
<option value='<?=$row->coloracion ?>'><?=$row->coloracion ?></option>
<option value='1'>1</option>
</select>
</div>
<br/>
	<div class="input-group">
    <span class="input-group-addon">Pulso</span> 
<select   class="form-control select2"   id="_eva_pulso"  >
<option value='<?=$row->eva_pulso ?>'><?=$row->eva_pulso ?></option>
<option value='1'>1</option>
</select>
</div>
<br/>
	<div class="input-group">
    <span class="input-group-addon">Edema</span> 
<select   class="form-control select2"   id="_eva_edema"  >
<option value='<?=$row->eva_edema ?>'><?=$row->eva_edema ?></option>
<option value='1'>1</option>
</select>
</div>

</div>



<div class="form-group row">
<label  class="col-form-label">Valoración de la Piel</label>
<select   class="form-control select2"   id="_val_piel"  >
<option value='<?=$row->val_piel ?>'><?=$row->val_piel ?></option>
<option value='1'>1</option>
</select>
</div>
<div class="form-group row">
<label  class="col-form-label">Cuidados A</label>
<select   class="form-control select2"   id="_cuidados_a"  >
<option value='<?=$row->cuidados_a ?>'><?=$row->cuidados_a ?></option>
<option value='1'>1</option>
</select>
</div>

<div class="form-group row">
<label  class="col-form-label">Movilización</label>
<select   class="form-control select2"   id="_movilizacion"  >
<option value='<?=$row->movilizacion ?>'><?=$row->movilizacion ?></option>
<option value='1'>1</option>
</select>
</div>
<div class="form-group row">
<label class="control-label" >Otras Notas</label>
<textarea rows="6" cols="15" class="form-control" id="_eva_con_otros_notas" ><?=$row->notas ?></textarea>
</div>
   </div>

   

   </div>
    </div>



<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="btn-sm btn-primary updateEvCon"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
 <span class='saveEvConres'></span>
<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/exam_neuro")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>
	
<script type="text/javascript">
$.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    }

$("#_evaluacion-condicion :input").prop("disabled", true);


$(".select2").select2({
tags: true
});

let countevc=0;
$('.updateEvCon').on('click',function(e){
	e.preventDefault();
countevc ++;
 if(countevc==1){
$("#_evaluacion-condicion :input").prop("disabled", false); 
 $(".updateEvCon").html('<i class="fa fa-save" aria-hidden="true"> Guardar</i>').removeClass('btn-sm btn-primary').addClass('btn-sm btn-success ');  
	   }else{
let estado_conciencia = $("#_estado_conciencia").val(); 
let condicion_general = $("#_condicion_general").val(); 

let orient_tiempo = [];
$("input[name='_orient_tiempo']:checked").each(function(){
orient_tiempo.push(this.value);
});

let orient_lugar = [];
$("input[name='_orient_lugar']:checked").each(function(){
orient_lugar.push(this.value);
});

let orient_pers = [];
$("input[name='_orient_pers']:checked").each(function(){
orient_pers.push(this.value);
});

let val_neuro = $("#_val_neuro").val(); 
let comunicacion = $("#_comunicacion").val(); 
let est_respiratoria = $("#_est_respiratoria").val(); 
let estado_cardia = $("#_estado_cardia").val(); 
let oxinoterapia = $("#_oxinoterapia").val(); 
let terapia_resp = $("#_terapia_resp").val(); 
let sec_vias_resp = $("#_sec_vias_resp").val(); 
let sangrado = $("#_sangrado").val(); 
let tipo_sangrado = $("#_tipo_sangrado").val(); 
let presenta_dolor = $("#_presenta_dolor").val(); 
let canalizacion = $("#_canalizacion").val(); 
let drenajes = $("#_drenajes").val(); 
let eva_diuresis = $("#_eva_diuresis").val(); 

let nauseas = [];
$("input[name='_nauseas']:checked").each(function(){
nauseas.push(this.value);
});

let vomitos = [];
$("input[name='_vomitos']:checked").each(function(){
vomitos.push(this.value);
});

let vomitos_sel = $("#_vomitos_sel").val(); 
let drenaje_sonda_nas = $("#_drenaje_sonda_nas").val(); 
let drenaje_sonda_nas_sel = $("#_drenaje_sonda_nas_sel").val(); 
let evalucacion = $('input:radio[name=_evalucacion]:checked').val();
let evaluacion_sel = $("#_evaluacion_sel").val(); 
let diarrea = $("#_diarrea").val(); 
let val_abdomen = $("#_val_abdomen").val(); 
let peristalsis = $("#_peristalsis").val(); 
let alimentacion = $('input:radio[name=_alimentacion]:checked').val();
let alimentacion_sel = $("#_alimentacion_sel").val(); 
let coloracion = $("#_coloracion").val(); 
let eva_pulso = $("#_eva_pulso").val(); 
let eva_edema = $("#_eva_edema").val(); 
let val_piel = $("#_val_piel").val(); 
let cuidados_a = $("#_cuidados_a").val(); 
let movilizacion = $("#_movilizacion").val(); 
let notas = $("#_eva_con_otros_notas").val(); 
		 $.ajax({
            type: 'POST',
            url:'<?php echo base_url();?>hospitalizacion/updateEvCon',
            data: {
				id_user:<?=$id_user?>,id:<?=$row->id?>,
				condicion_general:condicion_general,estado_conciencia:estado_conciencia,orient_tiempo:orient_tiempo,orient_lugar:orient_lugar,orient_pers:orient_pers,
				comunicacion:comunicacion,val_neuro:val_neuro,estado_cardia:estado_cardia,est_respiratoria:est_respiratoria,oxinoterapia:oxinoterapia,terapia_resp:terapia_resp,
				sec_vias_resp:sec_vias_resp,sangrado:sangrado,tipo_sangrado:tipo_sangrado,presenta_dolor:presenta_dolor,canalizacion:canalizacion,drenajes:drenajes,
				eva_diuresis:eva_diuresis,nauseas:nauseas,vomitos:vomitos,vomitos_sel:vomitos_sel,drenaje_sonda_nas:drenaje_sonda_nas,drenaje_sonda_nas_sel:drenaje_sonda_nas_sel,
				evalucacion:evalucacion,evaluacion_sel:evaluacion_sel,diarrea:diarrea,val_abdomen:val_abdomen,peristalsis:peristalsis,alimentacion:alimentacion,notas:notas,
				alimentacion_sel:alimentacion_sel,coloracion:coloracion,eva_pulso:eva_pulso,eva_edema:eva_edema,val_piel:val_piel,cuidados_a:cuidados_a,movilizacion:movilizacion

				},
            dataType: 'json',
           
             beforeSend: function(){
                $('#_evaluacion-condicion').css("opacity",".5");
				$('.successfull_saving').html('guardando... ').addClass('fa fa-spinner');
            },
            success: function(response){ //console.log(response);
                $('.saveEvConres').html('');
               $('.saveEvConres').html('<p class="alert alert-success">'+response.message+'</p>');
               
                $('#_evaluacion-condicion').css("opacity","");
             
				$('.successfull_saving').html('').removeClass('fa fa-spinner');
            },
			error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.saveEvConres').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
        });    
		   
	   }
}); 
	

	</script>