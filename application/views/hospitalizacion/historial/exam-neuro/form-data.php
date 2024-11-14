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


<div  class="modal-title"  ><h3>Examen Neurología # <?=$row->id?></h3>
<span style='font-size:13px'>
Creado por :<?=$user_c11?>, <?=$inserted_time?><br/>
 <span style="color:red"> Cambiado por :<?=$user_c12?> | fecha :<?=$update_time?></span> 

</span>
 </div>


<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button"  class="btn btn-primary btn-success updateExamNeuro"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/exam_neuro")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>

<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">
<div id="resultwrwre" style='color:green;text-align:center' ></div>
<div class="col-md-12"  >

<div class="form-group">
<strong>Examen General Neurología </strong>

 <textarea   rows='5' id='_exam_gen_neuro' class="form-control"><?=$row->exam_gen_neuro?></textarea>

</div>

</div>
<div class="col-md-12"  >
<strong>Paredes Craneales</strong>
<table  class='table' style='width:100%' >
<tr>
<td><label>I-Olfatorio</label> </td>

<?php
if($row->olfatorio ==0 && $row->olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_olfatorio' value='0' $checked> No</label></td>";
if($row->olfatorio ==1 && $row->olfatorio !=NULL){
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
if($row->optico ==0 && $row->optico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_optico' value='0' $checked> No</label></td>";
if($row->optico ==1 && $row->optico !=NULL){
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
if($row->motor_ocr_com ==0 && $row->motor_ocr_com !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocr_com' value='0' $checked> No</label></td>";
if($row->motor_ocr_com ==1 && $row->motor_ocr_com !=NULL){
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
if($row->patetica ==0 && $row->patetica !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_patetica' value='0' $checked> No</label></td>";
if($row->patetica ==1  && $row->patetica !=NULL){
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
if($row->trigemino ==0 && $row->trigemino !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_trigemino' value='0' $checked> No</label></td>";
if($row->trigemino ==1  && $row->trigemino !=NULL){
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
if($row->motor_ocu_ext ==0 && $row->motor_ocu_ext !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_motor_ocu_ext' value='0' $checked> No</label></td>";
if($row->motor_ocu_ext ==1 && $row->motor_ocu_ext !=NULL){
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
if($row->facial ==0 && $row->facial !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_facial' value='0' $checked> No</label></td>";
if($row->facial ==1 && $row->facial !=NULL){
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
if($row->estatoacustico ==0 && $row->estatoacustico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_estatoacustico' value='0' $checked> No</label></td>";
if($row->estatoacustico ==1 && $row->estatoacustico !=NULL){
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
if($row->glosofaringeo ==0 && $row->glosofaringeo !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_glosofaringeo' value='0' $checked> No</label></td>";
if($row->glosofaringeo ==1 && $row->glosofaringeo !=NULL){
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
if($row->neumogastrico ==0 && $row->neumogastrico !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_neumogastrico' value='0' $checked> No</label></td>";
if($row->neumogastrico ==1 && $row->neumogastrico !=NULL){
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
if($row->espinal ==0 && $row->espinal !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_espinal' value='0' $checked> No</label></td>";
if($row->espinal ==1 && $row->espinal !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_espinal' value='1' $checked> Si</label></td>";

?>

<td><label>(Trofismo-fuerza esternocleidomastoideo y trapecio)</label></td>
</tr>

<tr>
<td><label>XII-Hipogloso Mayor <?=$row->hipo_mayor?> </label> </td>

<?php
if($row->hipo_mayor ==0 && $row->hipo_mayor !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_hipo_mayor' value='0' $checked> No</label></td>";
if($row->hipo_mayor ==1 && $row->hipo_mayor !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_hipo_mayor' value='1' $checked> Si</label></td>";

?>

<td><label>(Atrofias-fasciculaciones-temblores-movimientos de la lengua)</label></td>
</tr>

<tr>
<td><strong>Sistema Motor  </strong> </td>


<?php
if($row->sistema_motor =='Paresias' && $row->olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_sistema_motor' value='Paresias' $checked> No</label></td>";
if($row->sistema_motor =='Hemiplejias' && $row->olfatorio !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<td><label><input type='radio'  name='_sistema_motor' value='Hemiplejias' $checked> Si</label></td>";

?>

<td></td>
</tr>

<tr>
<td><strong>Marcha  </strong> </td>
<td colspan='3'><input class="form-control" id='_marcha' value='<?=$row->marcha?>' style='width:100%'/></td>

</tr>	
</table>
</div>
<div class="col-md-12"  >
<hr class="prenatal-separator"/>
<strong>Escala De Glasgow </strong>

<div class="col-md-4"   >
<legend ><u>Apertura de los ojos</u></legend>
<div class="checkbox ">
<?php
   if ($row->espontanea ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_espontanea" <?=$selected?> >4-Espontánea</label>
</div>
<div class="checkbox ">
<?php
   if ($row->a_la_orden_verbal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_a_la_orden_verbal"  <?=$selected?> >3-A La Orden Verbal</label>
</div>
<div class="checkbox ">
<?php
   if ($row->a_estimulo_doloroso ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_a_estimulo_doloroso"  <?=$selected?>  >2-Al Estimulo Doloroso</label>
</div>
<div class="checkbox ">
<?php
   if ($row->no_ay_respuesta ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_no_ay_respuesta"  <?=$selected?> >1-No Hay Respuesta</label>
</div>
</div>
<div class="col-md-4"  >
<legend><u>Respuesta Verbal</u></legend>
<div class="checkbox ">
<?php
   if ($row->orientada ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_orientada"  <?=$selected?> >5-Orientada</label>
</div>
<div class="checkbox ">
<?php
   if ($row->confusa ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_confusa"  <?=$selected?> >4-Confusa</label>
</div>
<div class="checkbox ">
<?php
   if ($row->inapropriada ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_inapropriada"  <?=$selected?> >2-Inapropriada</label>
</div>
<div class="checkbox ">
<?php
   if ($row->incomprensible ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_incomprensible"  <?=$selected?> >1-Incomprensible</label>
</div>
</div>
<div class="col-md-4"  >

<legend><u>Respuesta Motora</u></legend>
<div class="checkbox ">
<?php
   if ($row->a_la_orden_verbal_6 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_a_la_orden_verbal_6"  <?=$selected?> >6-A la Orden Verbal</label>
</div>
<div class="checkbox ">
<?php
   if ($row->localizar_dolor ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_localizar_dolor"  <?=$selected?> >5-Localizar Dolor</label>
</div>
<div class="checkbox ">
<?php
   if ($row->retiro_ante_el_dolor ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_retiro_ante_el_dolor" <?=$selected?>  >4-Retiro ante el Dolor</label>
</div>
<div class="checkbox ">
<?php
   if ($row->flexion_normal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_flexion_normal"  <?=$selected?> >3-Flexión Normal </label>
</div>
<div class="checkbox ">
<?php
   if ($row->extension ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_extension" <?=$selected?> >2-Extensión </label>
</div>
<div class="checkbox ">
<?php
   if ($row->no_hay_respuesta ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="_no_hay_respuesta" <?=$selected?> >1-No Hay Respuesta </label>
</div>
</div>

</div>
<div class="col-md-12"  >
<hr class="prenatal-separator"/>
<div class="col-md-7"  >
<strong>Reflejos Osteotendinosos</strong>
<br/><br/>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Bicipital</label>
    <div class="col-sm-4">
	<div class="input-group">
    <input type="text" class="form-control" id='_bicipital' value='<?=$row->bicipital?>'/>
    <span class="input-group-addon"> C5-C6</span>
    </div>
   </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label"  value='<?=$row->bicipital?>'>Tricipital</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='_tricipital'  value='<?=$row->tricipital?>' />
    <span class="input-group-addon"> C6-C7-C8</span>
    </div>
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Aquileo y Clonus</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='_aquileo_y_clonus'  value='<?=$row->aquileo_y_clonus?>' />
    <span class="input-group-addon"> S1-S2</span>
    </div>
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Patelar y Clonus</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='_patelar_y_clonus'  value='<?=$row->patelar_y_clonus?>' />
    <span class="input-group-addon"> L2-L3</span>
    </div>
    </div>
  </div>


   <div class="form-group row">
       <div class="col-sm-6">
    <label  class="col-form-label">Sensibilidad Superficial(Tacto, dolor, temperatura) </label>

      <input type="text" class="form-control" id="_sensibilidad1"  value='<?=$row->sensibilidad1?>'>
	   </div>

  </div>
   </div>
   <div class="col-md-5"  >
   <strong>Pruebas Cerbelosas</strong>
   <br/> <br/>
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dedo-dedo</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='_dedo_dedo'  value='<?=$row->dedo_dedo?>' />
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dedo-Nariz</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='_dedo_nariz'  value='<?=$row->dedo_nariz?>' />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Talón-Rodilla</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='_talon_rod'  value='<?=$row->talon_rod?>'/>
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Romberg</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='_romberg'  value='<?=$row->romberg?>'/>
   
    </div>
  </div>
    <div class="form-group row">
       <div class="col-sm-6">
    <label for="inputPassword3" class="col-form-label">Sensibilidad Profunda(Cibratoria, atrocinetica) </label>

      <input type="text" class="form-control" id="_sensibilidad2"  value='<?=$row->sensibilidad2?>' >
	   </div>

  </div>
  
    <div class="form-group row">
       <div class="col-sm-6">
    <strong>Fondo de Ojo</strong>

      <input type="text" class="form-control" id="_fondo_de_ojo"  value='<?=$row->fondo_de_ojo?>' >
	   </div>

  </div>
   </div>
    </div>

</div>

<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="btn btn-primary btn-success updateExamNeuro"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/exam_neuro")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

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
dedo_dedo:dedo_dedo,dedo_nariz:dedo_nariz,talon_rod:talon_rod,romberg:romberg,sensibilidad1:sensibilidad1,sensibilidad2:sensibilidad2,fondo_de_ojo:fondo_de_ojo,user_id:<?=$id_user?>,id:<?=$row->id?>
},
success: function(data){

$('#resultwrwre').html(data);
$('.updateExamNeuro').prop('disabled',false);
},
 
});

}); 
	
 
	</script>