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
if($exn_data==0){
$id='';
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
$espontanea='';
$a_la_orden_verbal='';
$a_estimulo_doloroso='';
$no_ay_respuesta='';
$orientada='';
$confusa='';
$inapropriada='';
$incomprensible='';
$a_la_orden_verbal_6='';
$localizar_dolor='';
$retiro_ante_el_dolor='';
$flexion_normal='';
$extension='';
$no_hay_respuesta='';
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
}else{
  foreach ($query_exn as $row)	
$id=$row->id;
$olfatorio=$row->olfatorio;
$optico =$row->optico;
$motor_ocr_com=$row->motor_ocr_com;
$atetica=$row->atetica;
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

}
?>


<!--<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">-->
<div class="modal-body text-left" >
<div id="resultwrwre" style='color:green;text-align:center' ></div>
<div class="col-md-12"  >
 <div class="form-floating">
          <textarea class="form-control txt-ares-ssr" placeholder="Examen General Neurología" id="_califica_text" style="height:150px"><?= $exam_gen_neuro ?></textarea>
          <label for="_califica_text">Examen General Neurología</label>
        </div>

</div>
<div class="col-md-12"  >
<strong>Paredes Craneales</strong>
<table  class='table table-borderless'  >
<tr>
<td><label>I-Olfatorio</label> </td>

<?php
if($olfatorio ==0 && $olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_olfatorio' value='0' $checked> No</label></td>";
if($olfatorio ==1 && $olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_olfatorio' value='1' $checked> Si</label></td>";

?>

<td></td>
</tr>


<tr>
<td><label>II-Óptico</label> </td>

<?php
if($optico ==0 && $optico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_optico' value='0' $checked> No</label></td>";
if($optico ==1 && $optico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_optico' value='1' $checked> Si</label></td>";

?>

<td> 

<label>(Agudeza-campos visuales-fondo ojo)</label>

</td>
</tr>

<tr>
<td><label>III-Motor Ocular Común</label> </td>

<?php
if($motor_ocr_com ==0 && $motor_ocr_com !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocr_com' value='0' $checked> No</label></td>";
if($motor_ocr_com ==1 && $motor_ocr_com !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocr_com' value='1' $checked> Si</label></td>";


?>

<td> 

<label>(Recto-sup.-inf.-interior-pupilas)</label>

</td>
</tr>


<tr>
<td><label>IV-Patética</label> </td>

<?php
if($patetica ==0 && $patetica !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_patetica' value='0' $checked> No</label></td>";
if($patetica ==1  && $patetica !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_patetica' value='1' $checked> Si</label></td>";


?>
<td><label>(Oblicuo)</label></td>
</tr>


<tr>
<td><label>V-Trigémino</label> </td>

<?php
if($trigemino ==0 && $trigemino !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_trigemino' value='0' $checked> No</label></td>";
if($trigemino ==1  && $trigemino !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_trigemino' value='1' $checked> Si</label></td>";


?>

<td><label>(Tono-trofismo-muscular-masticadores-reflejos corneanos-sensib tacto dolor-temp.)</label></td>
</tr>

<tr>
<td><label>VI-Motor Ocular Externo</label> </td>

<?php
if($motor_ocu_ext ==0 && $motor_ocu_ext !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocu_ext' value='0' $checked> No</label></td>";
if($motor_ocu_ext ==1 && $motor_ocu_ext !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocu_ext' value='1' $checked> Si</label></td>";


?>

<td><label>(Recto interno)</label></td>
</tr>

<tr>
<td><label>VII-Facial</label> </td>

<?php
if($facial ==0 && $facial !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_facial' value='0' $checked> No</label></td>";
if($facial ==1 && $facial !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_facial' value='1' $checked> Si</label></td>";

?>

<td><label>(Tis, temblor-asimetría-motilidad-gustación 2/3 anterior lengua)</label></td>
</tr>

<tr>
<td><label>VIII-Estatoacústico</label> </td>

<?php
if($estatoacustico ==0 && $estatoacustico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_estatoacustico' value='0' $checked> No</label></td>";
if($estatoacustico ==1 && $estatoacustico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_estatoacustico' value='1' $checked> Si</label></td>";

?>

<td><label>(Vestíbulo: nistagmo espontáneo o posicional. Coclear: Prueba Weber-in otoscopia)</label></td>
</tr>

<tr>
<td><label>IX-Glosofaríngeo </label> </td>

<?php
if($glosofaringeo ==0 && $glosofaringeo !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_glosofaringeo' value='0' $checked> No</label></td>";
if($glosofaringeo ==1 && $glosofaringeo !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_glosofaringeo' value='1' $checked> Si</label></td>";

?>

<td><label>(Sensibilidad faringe al tacto)</label></td>
</tr>

<tr>
<td><label>X-Neumogástrico  </label> </td>

<?php
if($neumogastrico ==0 && $neumogastrico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_neumogastrico' value='0' $checked> No</label></td>";
if($neumogastrico ==1 && $neumogastrico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_neumogastrico' value='1' $checked> Si</label></td>";

?>

<td><label>(Simetría velo-paladar uvala, reflejo faríngeo)</label></td>
</tr>

<tr>
<td><label>XI-Espinal  </label> </td>

<?php
if($espinal ==0 && $espinal !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_espinal' value='0' $checked> No</label></td>";
if($espinal ==1 && $espinal !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_espinal' value='1' $checked> Si</label></td>";

?>

<td><label>(Trofismo-fuerza esternocleidomastoideo y trapecio)</label></td>
</tr>

<tr>
<td><label>XII-Hipogloso Mayor <?=$hipo_mayor?> </label> </td>

<?php
if($hipo_mayor ==0 && $hipo_mayor !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_hipo_mayor' value='0' $checked> No</label></td>";
if($hipo_mayor ==1 && $hipo_mayor !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_hipo_mayor' value='1' $checked> Si</label></td>";

?>

<td><label>(Atrofias-fasciculaciones-temblores-movimientos de la lengua)</label></td>
</tr>

<tr>
<td>Sistema Motor </td>


<?php
if($sistema_motor =='Paresias' && $olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_sistema_motor' value='Paresias' $checked> No</label></td>";
if($sistema_motor =='Hemiplejias' && $olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_sistema_motor' value='Hemiplejias' $checked> Si</label></td>";

?>

<td></td>
</tr>

<tr>
<td>Marcha  </td>
<td colspan='3'><input class="form-control" id='_marcha' value='<?=$marcha?>' style='width:100%'/></td>

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
  <label><input class="form-check-input" type="checkbox" name="_espontanea" <?=$selected?> >4-Espontánea</label>
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
  <label><input class="form-check-input" type="checkbox" name="_a_la_orden_verbal"  <?=$selected?> >3-A La Orden Verbal</label>
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
  <label><input class="form-check-input" type="checkbox" name="_a_estimulo_doloroso"  <?=$selected?>  >2-Al Estimulo Doloroso</label>
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
  <label><input class="form-check-input" type="checkbox" name="_no_ay_respuesta"  <?=$selected?> >1-No Hay Respuesta</label>
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
  <label><input class="form-check-input" type="checkbox" name="_orientada"  <?=$selected?> >5-Orientada</label>
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
  <label><input class="form-check-input" type="checkbox" name="_confusa"  <?=$selected?> >4-Confusa</label>
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
  <label><input class="form-check-input" type="checkbox" name="_inapropriada"  <?=$selected?> >2-Inapropriada</label>
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
  <label><input class="form-check-input" type="checkbox" name="_incomprensible"  <?=$selected?> >1-Incomprensible</label>
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
  <label><input class="form-check-input" type="checkbox" name="_a_la_orden_verbal_6"  <?=$selected?> >6-A la Orden Verbal</label>
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
  <label><input class="form-check-input" type="checkbox" name="_localizar_dolor"  <?=$selected?> >5-Localizar Dolor</label>
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
  <label><input class="form-check-input" type="checkbox" name="_retiro_ante_el_dolor" <?=$selected?>  >4-Retiro ante el Dolor</label>
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
  <label><input class="form-check-input" type="checkbox" name="_flexion_normal"  <?=$selected?> >3-Flexión Normal </label>
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
  <label><input class="form-check-input" type="checkbox" name="_extension" <?=$selected?> >2-Extensión </label>
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
  <label><input class="form-check-input" type="checkbox" name="_no_hay_respuesta" <?=$selected?> >1-No Hay Respuesta </label>
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
    <input type="text" class="form-control" id='_bicipital' value='<?=$bicipital?>'/>
    <span class="input-group-text"> C5-C6</span>
    </div>
   </div>
  </div>
  <div class="form-group mb-1">
    <label for="" class="col-sm-3 col-form-label"  value='<?=$bicipital?>'>Tricipital</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control" id='_tricipital'  value='<?=$tricipital?>' />
    <span class="input-group-text"> C6-C7-C8</span>
    </div>
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-3 col-form-label">Aquileo y Clonus</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control" id='_aquileo_y_clonus'  value='<?=$aquileo_y_clonus?>' />
    <span class="input-group-text"> S1-S2</span>
    </div>
    </div>
  </div>
  
     <div class="form-group mb-1">
    <label  class="col-sm-3 col-form-label">Patelar y Clonus</label>
    <div class="col-sm-7">
   <div class="input-group">
    <input type="text" class="form-control" id='_patelar_y_clonus'  value='<?=$patelar_y_clonus?>' />
    <span class="input-group-text"> L2-L3</span>
    </div>
    </div>
  </div>


   <div class="form-group mb-1">
       <div class="col-sm-6">
    <label  class="col-form-label">Sensibilidad Superficial(Tacto, dolor, temperatura) </label>

      <input type="text" class="form-control" id="_sensibilidad1"  value='<?=$sensibilidad1?>'>
	   </div>

  </div>
   </div>
   <div class="col-md-6"  >
   <strong>Pruebas Cerbelosas</strong>

     <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Dedo-dedo</label>
    <div class="col-sm-7">
   <input type="text" class="form-control" id='_dedo_dedo'  value='<?=$dedo_dedo?>' />
   
    </div>
  </div>
  
     <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Dedo-Nariz</label>
    <div class="col-sm-7">
   <input type="text" class="form-control" id='_dedo_nariz'  value='<?=$dedo_nariz?>' />
   
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Talón-Rodilla</label>
    <div class="col-sm-7">
   <input type="text" class="form-control" id='_talon_rod'  value='<?=$talon_rod?>'/>
   
    </div>
  </div>
  
    <div class="form-group mb-1">
    <label  class="col-sm-7 col-form-label">Romberg</label>
    <div class="col-sm-7">
   <input type="text" class="form-control" id='_romberg'  value='<?=$romberg?>'/>
   
    </div>
  </div>
    <div class="form-group mb-1">
       <div class="col-sm-6">
    <label for="inputPassword3" class="col-form-label">Sensibilidad Profunda(Cibratoria, atrocinetica) </label>

      <input type="text" class="form-control" id="_sensibilidad2"  value='<?=$sensibilidad2?>' >
	   </div>

  </div>
  
    <div class="form-group mb-1">
       <div class="col-sm-6">
    <label>Fondo de Ojo</label>

      <input type="text" class="form-control" id="_fondo_de_ojo"  value='<?=$fondo_de_ojo?>' >
	   </div>

  </div>
   </div>
    </div>
    </div>

</div>


	
<script type="text/javascript">

$('.updateExamNeuro').on('click',function(e){
	e.preventDefault(); 
//exam neurologico

var exam_gen_neuro=$("#_exam_gen_neuro").val();

var olfatorio = $('input:radio[name=_olfatorio]:checked').val();
var optico= $('input:radio[name=_optico]:checked').val();
var motor_ocr_com = $('input:radio[name=_motor_ocr_com]:checked').val();
 
 var patetica = $('input:radio[name=_patetica]:checked').val();
 
 
 var trigemino = $('input:radio[name=_trigemino]:checked').val();


var motor_ocu_ext = $('input:radio[name=_motor_ocu_ext]:checked').val();;
 
 var facial = $('input:radio[name=_facial]:checked').val();
 
 var estatoacustico = $('input:radio[name=_estatoacustico]:checked').val();
 
 var glosofaringeo = $('input:radio[name=_glosofaringeo]:checked').val();
 
 var neumogastrico = $('input:radio[name=_neumogastrico]:checked').val();
 
 var espinal = $('input:radio[name=_espinal]:checked').val();
 
 var hipo_mayor = $('input:radio[name=_hipo_mayor]:checked').val();
 
 var sistema_motor = $('input:radio[name=_sistema_motor]:checked').val();

 var marcha=$("#_marcha").val();
 
  var espontanea= [];
 $("input[name='_espontanea']:checked").each(function(){
            espontanea.push(this.value);
 });
 
  var a_la_orden_verbal= [];
 $("input[name='_a_la_orden_verbal']:checked").each(function(){
            a_la_orden_verbal.push(this.value);
 });

 var a_estimulo_doloroso= [];
 $("input[name='_a_estimulo_doloroso']:checked").each(function(){
            a_estimulo_doloroso.push(this.value);
 });
 
 
  var no_ay_respuesta= [];
 $("input[name='_no_ay_respuesta']:checked").each(function(){
            no_ay_respuesta.push(this.value);
 });
 
  var orientada= [];
 $("input[name='_orientada']:checked").each(function(){
            orientada.push(this.value);
 });
 
 
   var confusa= [];
 $("input[name='_confusa']:checked").each(function(){
            confusa.push(this.value);
 });
 
  
var inapropriada= [];
 $("input[name='_inapropriada']:checked").each(function(){
            inapropriada.push(this.value);
 });
 
 
 var incomprensible= [];
 $("input[name='_incomprensible']:checked").each(function(){
            incomprensible.push(this.value);
 });
 
 
  var a_la_orden_verbal_6= [];
 $("input[name='_a_la_orden_verbal_6']:checked").each(function(){
            a_la_orden_verbal_6.push(this.value);
 });
 
 
   var localizar_dolor= [];
 $("input[name='_localizar_dolor']:checked").each(function(){
            localizar_dolor.push(this.value);
 });
 
    var retiro_ante_el_dolor= [];
 $("input[name='_retiro_ante_el_dolor']:checked").each(function(){
            retiro_ante_el_dolor.push(this.value);
 });
 
 
     var flexion_normal= [];
 $("input[name='_flexion_normal']:checked").each(function(){
            flexion_normal.push(this.value);
 });
 
 
     var extension= [];
 $("input[name='_extension']:checked").each(function(){
            extension.push(this.value);
 });
 
 
      var no_hay_respuesta= [];
 $("input[name='_no_hay_respuesta']:checked").each(function(){
            no_hay_respuesta.push(this.value);
 });
 

var bicipital=$("#_bicipital").val();
var tricipital=$("#_tricipital").val();
var aquileo_y_clonus=$("#_aquileo_y_clonus").val();
var patelar_y_clonus=$("#_patelar_y_clonus").val();
var dedo_dedo=$("#_dedo_dedo").val(); 
var dedo_nariz=$("#_dedo_nariz").val();
var talon_rod=$("#_talon_rod").val();
var romberg=$("#_romberg").val(); 
var sensibilidad1=$("#_sensibilidad1").val();  
var sensibilidad2=$("#_sensibilidad2").val();  
var fondo_de_ojo=$("#_fondo_de_ojo").val();	
$('.updateExamNeuro').prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>hospitalizacion/updateExamNeuro',
type:"post",
data: {marcha:marcha,sistema_motor:sistema_motor,hipo_mayor:hipo_mayor,espinal:espinal,neumogastrico:neumogastrico,glosofaringeo:glosofaringeo,estatoacustico:estatoacustico,
facial:facial,motor_ocu_ext:motor_ocu_ext,trigemino:trigemino,patetica:patetica,motor_ocr_com:motor_ocr_com,olfatorio:olfatorio,optico:optico,exam_gen_neuro:exam_gen_neuro,
a_estimulo_doloroso:a_estimulo_doloroso,no_ay_respuesta:no_ay_respuesta,orientada:orientada,confusa:confusa,inapropriada:inapropriada,incomprensible:incomprensible,a_la_orden_verbal:a_la_orden_verbal,
a_la_orden_verbal_6:a_la_orden_verbal_6,localizar_dolor:localizar_dolor,retiro_ante_el_dolor:retiro_ante_el_dolor,flexion_normal:flexion_normal,espontanea:espontanea,
extension:extension,no_hay_respuesta:no_hay_respuesta,bicipital:bicipital,tricipital:tricipital,aquileo_y_clonus:aquileo_y_clonus,patelar_y_clonus:patelar_y_clonus,
dedo_dedo:dedo_dedo,dedo_nariz:dedo_nariz,talon_rod:talon_rod,romberg:romberg,sensibilidad1:sensibilidad1,sensibilidad2:sensibilidad2,fondo_de_ojo:fondo_de_ojo,user_id:<?=$id_user?>,id:<?=$id?>
},
success: function(data){

$('#resultwrwre').html(data);
$('.updateExamNeuro').prop('disabled',false);
},
 
});

}); 
	
 
	</script>