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
<div id="sdfsdfdsfdbbfq"></div>
<?php
if($exn_data==0){
	$created_by=$this->session->userdata('user_id');
$updated_by=$this->session->userdata('user_id');
$inserted_time = date("Y-m-d H:i:s");
$update_time = date("Y-m-d H:i:s");	
$id_exn=0;
$olfatorio='';
$optico ='';
$motor_ocr_com='';
$atetica='';
$trigemino='';
$motor_ocu_ext ='';
$facial ='';
$estatoacustico='';
$glosofaringeo='';
$neumogastrico='';
$espinal='';
$hipo_mayor='';
$sistema_motor='';
$espontanea=0;
$a_la_orden_verbal=0;
$a_estimulo_doloroso=0;
$no_ay_respuesta=0;
$orientada=0;
$confusa=0;
$inapropriada=0;
$incomprensible=0;
$a_la_orden_verbal_6=0;
$localizar_dolor=0;
$retiro_ante_el_dolor=0;
$flexion_normal=0;
$extension=0;
$no_hay_respuesta=0;
$bicipital='';
$tricipital='';
$aquileo_y_clonus='';
$patelar_y_clonus='';
$sensibilidad1='';
$dedo_dedo='';
$dedo_nariz='';
$talon_rod='';
$romberg='';
$sensibilidad2='';
$fondo_de_ojo='';
$patetica='';
$exam_gen_neuro='';
$marcha='';
$sistema_motcuanor='';
}else{
  foreach ($query_exn as $row)	
$id_exn=$row->id;
$created_by=$row->inserted_by;
$updated_by=$this->session->userdata('user_id');
$inserted_time = $row->inserted_time;
$update_time = date("Y-m-d H:i:s");
$sistema_motcuanor=$row->sistema_motcuanor;
$olfatorio=$row->olfatorio;
$optico =$row->optico;
$motor_ocr_com=$row->motor_ocr_com;
$patetica=$row->patetica;
$trigemino=$row->trigemino;
$motor_ocu_ext =$row->motor_ocu_ext;
$facial =$row->facial;
$estatoacustico=$row->estatoacustico;
$glosofaringeo=$row->glosofaringeo;
$neumogastrico=$row->neumogastrico;
$espinal=$row->espinal;
$hipo_mayor=$row->hipo_mayor;
$sistema_motor=$row->sistema_motor;
$espontanea=$row->espontanea;
$a_la_orden_verbal=$row->a_la_orden_verbal;
$a_estimulo_doloroso=$row->a_estimulo_doloroso;
$no_ay_respuesta=$row->no_ay_respuesta;
$orientada=$row->orientada;
$confusa=$row->confusa;
$inapropriada=$row->inapropriada;
$incomprensible=$row->incomprensible;
$a_la_orden_verbal_6=$row->a_la_orden_verbal_6;
$localizar_dolor=$row->localizar_dolor;
$retiro_ante_el_dolor=$row->retiro_ante_el_dolor;
$flexion_normal=$row->flexion_normal;
$extension=$row->extension;
$no_hay_respuesta=$row->no_hay_respuesta;
$bicipital=$row->bicipital;
$tricipital=$row->tricipital;
$aquileo_y_clonus=$row->aquileo_y_clonus;
$patelar_y_clonus=$row->patelar_y_clonus;
$sensibilidad1=$row->sensibilidad1;
$dedo_dedo=$row->dedo_dedo;
$dedo_nariz=$row->dedo_nariz;
$talon_rod=$row->talon_rod;
$romberg=$row->romberg;
$sensibilidad2=$row->sensibilidad2;
$fondo_de_ojo=$row->fondo_de_ojo;
$patetica=$row->patetica;
$exam_gen_neuro=$row->exam_gen_neuro;
$marcha=$row->marcha;	
 $params2 = array('table' => 'hosp_exam_neuro', 'id' => $row->id);
   echo $this->user_register_info_hospitalization->get_operation_info($params2);
}
?>


<!--<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">-->

<div id="werwerwerwewrer" style='color:green;text-align:center' ></div>
<div class="col-md-12"  >
<input type="hidden" id="<?= $id_exn ?>_created_by" value="<?=$created_by?>" />
<input type="hidden" id="<?= $id_exn ?>_updated_by" value="<?=$updated_by?>" />
<input type="hidden" id="<?= $id_exn ?>_inserted_time" value="<?=$inserted_time?>" />
<input type="hidden" id="<?= $id_exn ?>_update_time" value="<?=$update_time?>" />
 <div class="form-floating">
          <textarea class="form-control examn-txtarea" placeholder="Examen General Neurología" id="<?= $id_exn ?>_exam_gen_neuro" style="height:150px"><?= $exam_gen_neuro ?></textarea>
          <label for="<?= $id_exn ?>_califica_text">Examen General Neurología</label>
        </div>

</div>
<br/>
<div class="col-md-12"  >
<strong>Paredes Craneales</strong>
<table  class='table table-borderless'  >
<tr>
<td><label>I-Olfatorio</label> </td>

<?php
if($olfatorio =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_olfatorio' value="no" <?=$checked?>> No</label></td>
<?php if($olfatorio =='si'){
	$checked="checked";
} else{
	$checked="";
	}?>
<td><label><input type='radio'  name='<?=$id_exn?>_olfatorio' value="si" <?=$checked?>> Si</label></td>



<td></td>
</tr>


<tr>
<td><label>II-Óptico</label> </td>

<?php
if($optico =='no'){
	$checked="checked";
} else{
	$checked="";
	}?>
<td><label><input type='radio'  name='<?=$id_exn?>_optico' value="no" <?=$checked?>> No</label></td>
<?php if($optico =='si'){
	$checked="checked";
} else{
	$checked="";
	}?>
<td><label><input type='radio'  name='<?=$id_exn?>_optico' value="si" <?=$checked?>> Si</label></td>


<td> 

<label>(Agudeza-campos visuales-fondo ojo)</label>

</td>
</tr>

<tr>
<td><label>III-Motor Ocular Común</label> </td>

<?php
if($motor_ocr_com =='no'){
	$checked="checked";
} else{
	$checked="";
	}?>
<td><label><input type='radio'  name='<?=$id_exn?>_motor_ocr_com' value="no" <?=$checked?>> No</label></td>
<?php if($motor_ocr_com =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_motor_ocr_com' value="si" <?=$checked?>> Si</label></td>

<td> 

<label>(Recto-sup.-inf.-interior-pupilas)</label>

</td>
</tr>


<tr>
<td><label>IV-Patética</label> </td>

<?php
if($patetica =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_patetica' value="no" <?=$checked?>> No</label></td>
<?php if($patetica =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_patetica' value="si" <?=$checked?>> Si</label></td>


<td><label>(Oblicuo)</label></td>
</tr>


<tr>
<td><label>V-Trigémino</label> </td>

<?php
if($trigemino =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?><td><label><input type='radio'  name="<?=$id_exn?>_trigemino" value="no" <?=$checked?>> No </label></td>
<?php if($trigemino =='si'){
	$checked="checked";
} else{
	$checked="";
	}?>
<td><label><input type='radio'  name="<?=$id_exn?>_trigemino" value="si" <?=$checked?>> Si</label></td>

<td><label>(Tono-trofismo-muscular-masticadores-reflejos corneanos-sensib tacto dolor-temp.)</label></td>
</tr>

<tr>
<td><label>VI-Motor Ocular Externo</label> </td>

<td>

<?php

if($motor_ocu_ext =='no' ){
	$checked="checked";
} else{
	$checked="";
	}
?>
<label><input type="radio"  name="<?=$id_exn?>_motor_ocu_ext" value="no" <?=$checked?>> No</label>
</td>

<td>
<?php if($motor_ocu_ext =='si' ){
	$checked="checked";
} else{
	$checked="";
	}?>
<label><input type="radio"  name="<?=$id_exn?>_motor_ocu_ext" value="si" <?=$checked?>> Si</label>
</td>


<td><label>(Recto interno)</label></td>
</tr>

<tr>
<td><label>VII-Facial</label> </td>

<?php
if($facial =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_facial' value="no" <?=$checked?>> No</label></td>
<?php if($facial =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_facial' value="si" <?=$checked?>> Si</label></td>


<td><label>(Tis, temblor-asimetría-motilidad-gustación 2/3 anterior lengua)</label></td>
</tr>

<tr>
<td><label>VIII-Estatoacústico</label> </td>

<?php
if($estatoacustico =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_estatoacustico' value="no" <?=$checked?>> No</label></td>
<?php if($estatoacustico =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_estatoacustico' value="si" <?=$checked?>> Si</label></td>

<td><label>(Vestíbulo: nistagmo espontáneo o posicional. Coclear: Prueba Weber-in otoscopia)</label></td>
</tr>

<tr>
<td><label>IX-Glosofaríngeo </label> </td>

<?php
if($glosofaringeo =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_glosofaringeo' value="no" <?=$checked?>> No</label></td>
<?php if($glosofaringeo =='si'){
	$checked="checked";
} else{
	$checked="";
	}?>
	<td><label><input type='radio'  name='<?=$id_exn?>_glosofaringeo' value="si" <?=$checked?>> Si</label></td>


<td><label>(Sensibilidad faringe al tacto)</label></td>
</tr>

<tr>
<td><label>X-Neumogástrico  </label> </td>

<?php
if($neumogastrico =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_neumogastrico' value="no" <?=$checked?>> No</label></td>
<?php if($neumogastrico =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_neumogastrico' value="si" <?=$checked?>> Si</label></td>

<td><label>(Simetría velo-paladar uvala, reflejo faríngeo)</label></td>
</tr>

<tr>
<td><label>XI-Espinal  </label> </td>

<?php
if($espinal =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_espinal' value="no" <?=$checked?>> No</label></td>
<?php if($espinal =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_espinal' value="si" <?=$checked?>> Si</label></td>

<td><label>(Trofismo-fuerza esternocleidomastoideo y trapecio)</label></td>
</tr>

<tr>
<td><label>XII-Hipogloso Mayor <?=$hipo_mayor?> </label> </td>

<?php
if($hipo_mayor =='no'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_hipo_mayor' value="no" <?=$checked?>> No</label></td>
<?php if($hipo_mayor =='si'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_hipo_mayor' value="si" <?=$checked?>> Si</label></td>

<td><label>(Atrofias-fasciculaciones-temblores-movimientos de la lengua)</label></td>
</tr>

<tr>
<td>Sistema Motor </td>


<?php
if($sistema_motor =='Paresias'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_sistema_motor' value='Paresias' <?=$checked?>> Paresias</label></td>
<?php
if($sistema_motcuanor =='Hemiplejias'){
	$checked="checked";
} else{
	$checked="";
	}
?>
<td><label><input type='radio'  name='<?=$id_exn?>_sistema_motor' value='Hemiplejias' <?=$checked?>> Hemiplejias</label></td>

<td></td>
</tr>

<tr>
<td>Marcha  </td>
<td colspan='3'><input class="form-control" type="text" id='<?=$id_exn?>_marcha' value='<?=$marcha?>' style='width:100%'/></td>

</tr>	
</table>
</div>
<div class="col-md-12"  >
<div class="row"  >
<hr class="prenatal-separator"/>
<strong>Escala De Glasgow </strong>

<div class="col-md-4"   >
 <div class="form-check form-check-inline">
<label ><u>Apertura de los ojos</u></label>
<div class="checkbox ">
<?php

   if ($espontanea ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_espontanea" <?=$selected?> >4-Espontánea</label>
</div>
<div class="checkbox ">
<?php
   if ($a_la_orden_verbal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_a_la_orden_verbal"  <?=$selected?> >3-A La Orden Verbal</label>
</div>
<div class="checkbox ">
<?php
   if ($a_estimulo_doloroso ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_a_estimulo_doloroso"  <?=$selected?>  >2-Al Estimulo Doloroso</label>
</div>
<div class="checkbox ">
<?php
   if ($no_ay_respuesta ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_no_ay_respuesta"  <?=$selected?> >1-No Hay Respuesta</label>
</div>
</div>
</div>
<div class="col-md-4"  >
 <div class="form-check form-check-inline">
<label><u>Respuesta Verbal</u></label>
<div class="checkbox ">
<?php
   if ($orientada ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_orientada"  <?=$selected?> >5-Orientada</label>
</div>
<div class="checkbox ">
<?php
   if ($confusa ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_confusa"  <?=$selected?> >4-Confusa</label>
</div>
<div class="checkbox ">
<?php
   if ($inapropriada ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_inapropriada"  <?=$selected?> >2-Inapropriada</label>
</div>
<div class="checkbox ">
<?php
   if ($incomprensible ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_incomprensible"  <?=$selected?> >1-Incomprensible</label>
</div>
</div>
</div>
<div class="col-md-4"  >
 <div class="form-check form-check-inline">
<label><u>Respuesta Motora</u></label>
<div class="checkbox ">
<?php
   if ($a_la_orden_verbal_6 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_a_la_orden_verbal_6"  <?=$selected?> >6-A la Orden Verbal</label>
</div>
<div class="checkbox ">
<?php
   if ($localizar_dolor ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_localizar_dolor"  <?=$selected?> >5-Localizar Dolor</label>
</div>
<div class="checkbox ">
<?php
   if ($retiro_ante_el_dolor ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_retiro_ante_el_dolor" <?=$selected?>  >4-Retiro ante el Dolor</label>
</div>
<div class="checkbox ">
<?php
   if ($flexion_normal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_flexion_normal"  <?=$selected?> >3-Flexión Normal </label>
</div>
<div class="checkbox ">
<?php
   if ($extension ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_extension" <?=$selected?> >2-Extensión </label>
</div>
<div class="checkbox ">
<?php
   if ($no_hay_respuesta ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input" type="checkbox" name="<?= $id_exn ?>_no_hay_respuesta" <?=$selected?> >1-No Hay Respuesta </label>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-12"  >
<hr class="prenatal-separator"/>
<div class="row">
<div class="col-md-6"  >
<strong>Reflejos Osteotendinosos</strong>

  <div class="form-group mb-1">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Bicipital</label>
    <div class="col-sm-7">
	<div class="input-group">
    <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_bicipital' value='<?=$bicipital?>'/>
    <span class="input-group-text"> C5-C6</span>
    </div>
   </div>
  </div>
  <div class="form-group mb-1">
    <label for="" class="col-sm-3 col-form-label"  >Tricipital</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_tricipital'  value='<?=$tricipital?>' />
    <span class="input-group-text"> C6-C7-C8</span>
    </div>
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-3 col-form-label">Aquileo y Clonus</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_aquileo_y_clonus'  value='<?=$aquileo_y_clonus?>' />
    <span class="input-group-text"> S1-S2</span>
    </div>
    </div>
  </div>
  
     <div class="form-group mb-1">
    <label  class="col-sm-3 col-form-label">Patelar y Clonus</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_patelar_y_clonus'  value='<?=$patelar_y_clonus?>' />
    <span class="input-group-text"> L2-L3</span>
    </div>
    </div>
  </div>


   <div class="form-group mb-1">
       <div class="col-sm-6">
    <label  class="col-form-label">Sensibilidad Superficial(Tacto, dolor, temperatura) </label>

      <input type="text" class="form-control examn-txt" id="<?= $id_exn ?>_sensibilidad1"  value='<?=$sensibilidad1?>'>
	   </div>

  </div>
   </div>
   <div class="col-md-6"  >
   <strong>Pruebas Cerbelosas</strong>

     <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Dedo-dedo</label>
    <div class="col-sm-7">
   <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_dedo_dedo'  value='<?=$dedo_dedo?>' />
   
    </div>
  </div>
  
     <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Dedo-Nariz</label>
    <div class="col-sm-7">
   <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_dedo_nariz'  value='<?=$dedo_nariz?>' />
   
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Talón-Rodilla</label>
    <div class="col-sm-7">
   <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_talon_rod'  value='<?=$talon_rod?>'/>
   
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Romberg</label>
    <div class="col-sm-7">
   <input type="text" class="form-control examn-txt" id='<?=$id_exn?>_romberg'  value='<?=$romberg?>'/>
   
    </div>
  </div>
    <div class="form-group mb-1">
       <div class="col-sm-6">
    <label for="inputPassword3" class="col-form-label">Sensibilidad Profunda(Cibratoria, atrocinetica) </label>

      <input type="text" class="form-control examn-txt" id="<?= $id_exn ?>_sensibilidad2"  value='<?=$sensibilidad2?>' >
	   </div>

  </div>
  
    <div class="form-group mb-1">
       <div class="col-sm-6">
    <label>Fondo de Ojo</label>

      <input type="text" class="form-control examn-txt" id="<?= $id_exn ?>_fondo_de_ojo"  value='<?=$fondo_de_ojo?>' >
	   </div>

  </div>
   </div>
    </div>
    </div>



  <div class="float-end">
<?php if ($id_exn > 0) { ?>
    <button type="button" class="btn btn-primary" id="resetFormExamNeuro">Nuevo</button>
<?php } if($this->session->userdata('user_id')==$created_by || $this->session->userdata('user_perfil') =='Auditoria Medico'){?>
<button type="button" class="btn btn-success" id="saveEditExamNeuro" <?=$this->session->userdata('show_edit_btn')?>>Guardar </button>
<?php  }?>

<span id="alert_placeholder_exam_neuro" style="position:absolute; " class="p-2"></span>

  </div>
  <br /> <br />
<?php 

	$dataexn= array(
'exn_up_time'=>$update_time,
'exn_in_time' =>$inserted_time,
'exn_in_by'=>$created_by,
'exn_up_by' => $updated_by
);

$this->session->set_userdata($dataexn);


 ?>

  <input type="hidden" id="id_examneuro" value="<?=$id_exn?>">
  <input type="hidden" id="examn-form-inputs" value="<?=$id_exn?>">
  <input type="hidden" id="examn-form-checkbox" value="<?=$id_exn?>">
  <input type="hidden" id="examn-form-radio" value="<?=$id_exn?>">
	
