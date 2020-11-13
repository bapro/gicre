 <?php
 echo $historial_id;
foreach($pediaid as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$insed_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
//$upda_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));	

$insed_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$upda_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<style>
.control-label{font-size:16px}
.table-bordered input{
  font-size: 12px;
  text-transform:lowercase
}

#show_vacuna_data{
    
    text-decoration:none;
    background:green;
    color:#fff;
    display:inline-block;
    padding:6px;
	border-radius:20px;
	cursor:pointer
}

</style>


<input type="hidden" id="updated_by" value="<?=$user?>">  
<input type="hidden" id="hist_id" value="<?=$id_historial?>">  
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Ant. Pediatrico # <span class="round"><?=$row->id?></span> </h3><br/>
<h5 class="modal-title text-center"  >Creado por :<?=$row->inserted_by?> | fecha :<?=$insed_time?> | <span style="color:red"> Cambiado por :<?=$row->updated_by?> | fecha :<?=$upda_time?></span> </h5>
<button class="show_modif_ant_ped btn-sm btn-success" type="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<button id="save_ant_ped" class="save_ant_ped_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank" href="<?php echo base_url('printings/print_ant_pedia/'.$row->id)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>


<div class="col-md-12">

<div class="col-md-6"  >
<table class="table" style="border-bottom:1px solid rgb(205,205,205);">
<tr><th style="width:20%" colspan="3">Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</th></tr>
<tr>
<td>
<?php
if($row->evo =="normal"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='evo1' name='evo1' value='normal' $checked> ";
?>
<label>Normal</label>
</td>
<td>
<?php
if($row->evo =="complicado"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='evo1' name='evo1' value='complicado' $checked> ";
?>
 <label> Complicado</label></td>
<td>
<textarea class="form-control" cols="70" id="evol_text1"><?=$row->evol_text?></textarea>
<input type="hidden" id="idpedia" value="<?=$row->id?>"/>
</td>
</tr>
</table>
<br/>
<h5 class="h5">Uso de Medicamentos durante embarazo</h5>
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>

<div class="form-group">
<label class="control-label col-md-3" >Medicamento</label>
<div class="col-md-8">
<select  class="form-control medica1" multiple="multiple"  id="med1" >
<?php 


foreach($medicamentos as $d)
{ 

$medica=$this->db->select('medica')
->where('medica',$d->id)->where('id_pedia',$id_p)
->get('h_c_pedia_med')->row('medica');

if($d->id==$medica){
	$selected="selected";
} else {
   $selected="";
}
echo "<option value='$d->id' $selected>$d->name</option>";
}
?>
</select>
</div>

</div>

</div>

  <div class="col-md-6" style="border-left:1px solid #38a7bb;">
  <table class="table">
<tr><th  colspan="3">Tipo de nacimiento</th></tr>
<tr>
<td style="width:30px">
<?php

if($row->tnaci =="parto"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tnaci1' name='tnaci1' value='parto' $checked> ";
?>
<label> Parto</label>
</td>
<td style="width:30px">
<?php

if($row->tnaci =="cesarea"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tnaci1' name='tnaci1' value='cesarea' $checked> ";
?>
 <label>Cesarea</label>
 </td>
<td style="width:30px">
<?php
foreach($pediaid as $row)
if($row->tnaci =="desconocido"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tnaci1' name='tnaci1' value='desconocido' $checked> ";
?>
<label>Desconocido</label>
</td>
</tr>
<tr>
<td colspan="6">
<label>Describa</label>
 <textarea class="form-control disable_p2" cols="170" id="describa1"><?=$row->describa?></textarea>
 </td>
</tr>
</table>
  
  
 <table class="table"  style="width:100%;border-bottom:1px solid #38a7bb;">
<tr>
<td>
<label>Edad gestacional al momento del nac.</label> 
<select style="width:80%" class="form-control" id="edad_gest1">
<option hidden><?=$row->edad_gest?></option>
<option>Predetermino</option>
<option>Termino</option>
<option>Post termino</option>
</select>
</td>
<td></td>
</tr>
<tr>
<td><label>Peso al nacer </label>
 <input type="text" id="peso_al_nacer" class="do-not-disable-me" value="<?=$row->peso?>"  disabled>
 </td>
<td><label>Conocido</label>
<?php 
if($row->desco_peso_al_nacer ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  id='desco_peso_al_nacer' name='desco_peso_al_nacer'  $checked> ";
?> 

</td>
</tr>
<tr>
<td><label>Talla al nacer</label> 
<input type="text" id="talla_al_nacer" class="do-not-disable-me" value="<?=$row->talla?>"  >
</td>
<td><label>Conocido</label>
<?php 
if($row->desco_talla_al_nacer ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  id='desco_talla_al_nacer'  name='desco_talla_al_nacer'  $checked> ";
?> 
 </td>
</tr>
</table>
</div>
<hr class="title-highline-top"/>
</div>
<div class="col-md-12" style="">
 <hr class="title-highline-top"/>
 
<p class=" h4 his_med_title"  >Antecedentes Pediatrico</p>
<br/> 
<h4 style="color:green;">Antecedentes Personales</h4>
<div class="col-md-6" style="border-right:1px solid rgb(206,206,206)">

<table class="table" >
<tr><th>No patologicos</th><th></th><th></th></tr>
<tr>
<td></td>
<td>
<?php 
if($row->lactamat ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='lactamat1'  $checked> ";
?>
</td>
<td><label>Lactancia Materna</label></td>
</tr>
<tr>
<td><label>Alimentos</label></td>
<td>
<?php 
if($row->leche ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='leche1'  $checked> ";
?>
</td>
<td><label>Leche de formulas</label></td>
</tr>
<tr>
<td colspan="3"><label> Otros </label>
 <textarea class="form-control disable_p2" cols="70" id="otrosinfo1"><?=$row->otrosinfo?></textarea></td>
</tr>
</table>
<table class="table">
<tr><th>Traumatico/somatico, psicolog</th></tr>
<tr>
<td>

<?php
if($row->traum_text ==""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='radio' id='traum' name='traum' value='no' $checked> <label> No</label> ";


if($row->traum_text !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='traum' name='traum' value='si' $checked> <label> Si</label>";
?>

 <textarea class="form-control disable_p2" cols="20" id="traum_text1"><?=$row->traum_text?></textarea>
 </td>
</tr>
</table>
<table class="table">
<tr><th>Transfusionales</th></tr>
<tr>
<td>
<?php
if($row->trans_text ==""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='trans1' name='trans1' value='no' $checked> ";
?>
<label> No</label> 
<?php
if($row->trans_text !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='trans1' name='trans1' value='si' $checked> ";
?>
<label> Si</label> 
 <textarea class="form-control disable_p2" cols="20" id="trans_text1"><?=$row->trans_text?></textarea>
 </td>
</tr>

</table>

<table class="table" style="width:100%">
<tr><th><h4 style="color:green;">Desarollo</h4></th><th></th><th></th></tr>
<tr>
<tr><td style="width:100%" colspan="3"> 
<span style="color:red" class="ref-neurologia-text" ></span>
</td>
</tr>
<td style="font-size:12px">
<label>Motor Grueso adecuado para su edad</label>
</td>
<td>
<?php
if($row->motor1 !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>Si <input type='radio' name='grueso' class='chkYes' $checked></label>";
?>
</td>
<td>
<?php
if($row->motor1 !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' name='grueso' class='chkNo' $checked></label><i style='color:red;display:none' title='Alert : Referir a neurologia' class='fa fa-exclamation-triangle triangle-1' aria-hidden='true'></i>";
?>
</td>

</tr>
<tr><td colspan="3">
<textarea class="form-control text-grueso do-not-disable-me" id="text-grueso1" disabled>
<?=$row->motor1?>
</textarea>
</td></tr>
<tr>
<td style="font-size:12px"><label>Motor fino adecuado para su edad</label></td>

<td>
<?php
if($row->motor2 !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>Si <input type='radio' name='fino' class='chkYes2' $checked></label>";
?>
</td>
<td>
<?php
if($row->motor2 !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' name='fino' class='chkNo2' $checked></label><i style='color:red;display:none' title='Alert : Referir a neurologia' class='fa fa-exclamation-triangle triangle-2' aria-hidden='true'></i>";
?>
</td>

</tr>
<tr><td colspan="3">
<textarea class="form-control text-fino do-not-disable-me" id="text-fino1" disabled>
<?=$row->motor2?>
</textarea>
</td></tr>
<tr>
<td style="font-size:12px"><label>Lenguaje adecuado para su edad</label></td>
<td>
<?php
if($row->lenguaje !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>Si <input type='radio' name='lenguage' class='chkYes3' $checked></label>";
?>
</td>
<td>
<?php
if($row->lenguaje !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' name='lenguage' class='chkNo3' $checked></label><i style='color:red;display:none' title='Alert : Referir a neurologia' class='fa fa-exclamation-triangle triangle-3' aria-hidden='true'></i>";
?>
</td>

</tr>
<tr><td colspan="3">
<textarea class="form-control text-lenguage do-not-disable-me" id="text-lenguage1" disabled>
<?=$row->lenguaje?>
</textarea>
</td></tr>
<tr>
<td style="font-size:12px"><label>Social adecuado para su edad</label></td>

<td>
<?php
if($row->social !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>Si <input type='radio' name='social' class='chkYes4' $checked></label>";
?>
</td>
<td>
<?php
if($row->social !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>No <input type='radio' name='social' class='chkNo4' $checked></label><i style='color:red;display:none' title='Alert : Referir a neurologia' class='fa fa-exclamation-triangle triangle-4' aria-hidden='true'></i>";
?>
</td>

</tr>
<tr><td colspan="3">
<textarea class="form-control text-social do-not-disable-me" id="text-social1" disabled>
<?=$row->social?>
</textarea>
</td></tr>
</table>

</div>
<div class="col-md-6" style="">
<table class="table">
<tr><th>Patologias</th><th></th></tr>
<tr>
<td>
<?php 
if($row->ale ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='ale1'  $checked> ";
?>
<label>Alergia</label> 
</td>
<td>
<?php 
if($row->hep ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='hep1'  $checked> ";
?>
<label>Hepatitis</label> 
</td>
</tr>
<tr>
<td>
<?php 
if($row->amig ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='amig1'  $checked> ";
?>
 <label>Amigdalitis</label> </label>
</td>
<td>
<?php 
if($row->infv ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='infv1'  $checked> ";
?>
<label>Infeccion vias urinarias</label> 
 </td>
</tr>
<tr>
<td>
<?php 
if($row->asm ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='asm1'  $checked> ";
?>
 <label>Asma</label> 
 </td>
<td>
<?php 
if($row->neum ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='neum1'  $checked> ";
?>

 <label>Neumoria</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->cirug ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='cirug1'  $checked> ";
?>

 <label> Cirugias</label>
 </td>
<td>
<?php 
if($row->otot ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='otot1'  $checked> ";
?>

 <label>Ototis</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->deng ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='deng1'  $checked> ";
?>
<label>Dengue</label> 
</td>
<td>
<?php 
if($row->pape ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='pape1'  $checked> ";
?>
<label>Paperas</label>
</td>
</tr>
<tr>
<td>
<?php 
if($row->diar ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='diar1'  $checked> ";
?>
<label>Diarrea</label> 
 </td>
<td>
<?php 
if($row->paras ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='paras1'  $checked> ";
?>
<label>Parasitosis</label>
 </td>
</tr>
<tr>
<td>
<?php 
if($row->zika ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='zika1'  $checked> ";
?>
 <label> Zika </label>
 </td>
<td>
<?php 
if($row->saram ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='saram1'  $checked> ";
?>
<label>Sarampion</label>
</td>
</tr>
<tr>
<td>
<?php 
if($row->chicun ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='chicun1'  $checked> ";
?>
<label> Chicungunya</label> 
 </td>
<td>
<?php 
if($row->varicela ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='varicela1'  $checked> ";
?>
<label>Varicela</label> 
 </td>
</tr>
<tr>
<td>
<?php 
if($row->falc ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='falc1'  $checked> ";
?>
<label> Falcemia</label> 
 </td>
<td>
<?php 
if($row->otros_t_text ==""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox' onclick='show9()'  $checked> ";
?>
 <label>Otros</label>
 <textarea class="form-control disable_p2" cols="20" id="otros_t_text1" ><?=$row->otros_t_text?></textarea>
 </td>
</tr>
</table>
<table class="table" style="width:100%">
<tr><th><h4 style="color:green;">Sospecha de Abuso o Maltrato</h4></th><th></th><th></th></tr>
<tr>
<td><label>Maltrato fisico</label></td>
<td>
<?php
if($row->maltratof !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mf11' class='chkYes5' $checked></label>";
?>
</td>
<td>
<?php
if($row->maltratof !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='mf11' class='chkNo5' $checked></label>";
?>
</td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-maltrato" id="textmaltrato1" disabled>
<?=$row->maltratof ?>
</textarea>
</td>
</tr>
<tr>
<td><label>Abuso sexual</label></td>
<td>
<?php
if($row->abusos !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='abs1' class='chkYes6' $checked></label>";
?>
</td>
<td>
<?php
if($row->abusos !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='abs1' class='chkNo6' $checked></label>";
?>
</td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-abuso" id="textabuso1" disabled>
<?=$row->abusos?></textarea>
</td></tr>
<tr>
<td><label>Negligencia</label></td>
<td>
<?php
if($row->negligencia !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='neg1' class='chkYes7' $checked></label>";
?>
</td>
<td>
<?php
if($row->negligencia !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='neg1' class='chkNo7' $checked></label>";
?>

</td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-neg" id="textneg1" disabled>
<?=$row->negligencia?></textarea>
</td>
</tr>
<tr>
<td><label>Maltrato emocional</label></td>
<td>
<?php
if($row->maltrato !=""){
	$checked="checked";
} else{
	$checked="";
	}
echo "<label>Si <input type='radio' name='mem1' class='chkYes8' $checked></label>";
?>
</td>
<td>
<?php
if($row->maltrato !=""){
	$checked="";
} else{
	$checked="checked";
	}
echo "<label>No <input type='radio' name='mem1' class='chkNo8' $checked></label>";
?>

</td>
</tr>
<tr><td colspan="3">
<textarea class="form-control maltrato-emo" id="maltratoemo1" disabled>
<?=$row->maltrato?></textarea></td>
</tr>
</table>

  </div>
   </div>
 <!-- VACUNACION-->
  <div class="col-md-12 except-me"  >
 <hr class="title-highline-top"/>
  <!-- <div class="col-md-7"  ><h4 style="color:green">VACUNACION <button type="button" id="click_show_vacuna" class="btn-sm btn-primary" ><i class="glyphicon glyphicon-arrow-down"/></button></h4></div><div class="col-md-5" style="display:none"  >Si <span style="color:red"><i>Dias de atraso</i></span> esta diferente de 0 hay una fecha aplicada</div>
 <div id="show-vacuna"></div>-->
   <div class="col-md-7"  ><h4 style="color:green">VACUNACION </h4></div><div class="col-md-5"  >Si <span style="color:red"><i>Dias de atraso</i></span> esta diferente de 0 hay una fecha aplicada</div>
   
   <table class="table table-striped table-bordered" style="background:#E6E6FA;">
   <?php foreach($vacuna as $row2)?>
  <tr><th></th><th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$row2->insert_d?></span></th>
  <th class="col-xs-2">
 <input  id="insert_d"  type="hidden" value="<?=$row2->insert_d?>"  > 
</th>

<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th><input type="hidden" value="<?=$row2->date_nacer_format?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th >1era. Dosis</th>
<th>2da. Dosis</th>
<th >3era. Dosis</th>
<th >1er.Refuerzo</th>
<th >2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG w</th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date no_ap_sh1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh1" style="display:none;background:red">
<input type="text"  class="form-control bcgno" id="bcg11" value="<?=$row2->bcg1?>" readonly >
<span id="frem1" class="input-group-addon" ><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 

<input type="text" class="form-control bcg"  value="<?=$row2->bcg1?>" style="pointer-events: none;">

<input type="hidden"  id="mirror_bcg1" value="<?=$row2->date_nacer_format?>"  />
<span style="color:red" class="atras1"><i>Dias de atraso : <input type="text" class="resf1" id="resf11" value="<?=$row2->resf1?>" style="pointer-events:none;border:none;width:30px;"></i></span>

</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2 no_ap_sh2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="hepb1" value="<?=$row2->hepb1?>" readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$row2->hepb1?>" style="pointer-events: none;">
<input type="hidden" value="<?=$row2->date_nacer_format?>" id="mirror_bcg2"  />
<span style="color:red;" class="atras2"><i>Dias de atraso : <input type="text" class="resf2" id="resf21" value="<?=$row2->resf2?>" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3 no_ap_sh3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap331" value="<?=$row2->yel3?>" readonly  >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel3?>" style="pointer-events: none;">
<input  id="mirror_d3"  type="hidden"  > 
<span style="color:red" class="atras3"><i>Dias de atraso : <input type="text" id="resf31" value="<?=$row2->resf3?>" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4 no_ap4 no_ap_sh4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  id="no_ap41" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl41" value="<?=$row2->bl4?>" readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl4?>" style="pointer-events: none;">
<input  id="mirror_d4"  type="hidden"  > 
<span style="color:red" class="atras4">
<i>Dias de atraso : <input type="text" id="resf41" value="<?=$row2->resf4?>" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap51" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel51" value="<?=$row2->yel5?>"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel5?>">
<input  id="mirror_d5"  type="hidden"  > 
<span style="color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf51" style="background:none;pointer-events:none;border:none;width:50px" value="<?=$row2->resf5?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6 no_ap6 no_ap_sh6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap61" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl61" value="<?=$row2->bl6?>"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl6?>">
<input  id="mirror_d6"  type="hidden"  > 
<span style="color:red" class="atras6"><i>Dias de atraso : <input type="text" id="resf61" style="pointer-events:none;border:none;width:30px" value="<?=$row2->resf6?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap71" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr71" value="<?=$row2->gr7?>"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr7?>">
<input  id="mirror_d7"  type="hidden"  > 
<span style="color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf71" style="pointer-events:none;border:none;width:70px;background:none" value="<?=$row2->resf7?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap81" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll81" value="<?=$row2->bll8?>" readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll8?>">
<input  id="mirror_d8"  type="hidden"  > 
<span style="color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf81" style="pointer-events:none;border:none;width:80px" value="<?=$row2->resf8?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap91" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr91" value="<?=$row2->grr9?>"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr9?>">
<input  id="mirror_d9"  type="hidden"  > 
<span style="color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf91" style="pointer-events:none;border:none;width:90px;background:none" value="<?=$row2->resf9?>"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap101" style="display:none;">
<input type="text"  class="form-control bcgno"   id="yel101" value="<?=$row2->yel10?>" readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel10?>">
<input  id="mirror_d10"  type="hidden"  > 
<span style="color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf101" style="pointer-events:none;border:none;width:100px" value="<?=$row2->resf10?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11 no_ap111 no_ap_sh11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl111" value="<?=$row2->bl11?>" readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl11?>">
<input  id="mirror_d11"  type="hidden"  > 
<span style="color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf111" style="pointer-events:none;border:none;width:110px" value="<?=$row2->resf11?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap122 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1221" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr121" value="<?=$row2->gr12?>" readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr12?>">
<input  id="mirror_d12"  type="hidden"  > 
<span style="color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf121" style="pointer-events:none;border:none;width:120px" value="<?=$row2->resf12?>"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap133 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1331" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel131" value="<?=$row2->yel13?>"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel13?>">
<input  id="mirror_d13"  type="hidden"  > 
<span style="color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf131" style="pointer-events:none;border:none;width:130px;background:none" value="<?=$row2->resf13?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap144 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1441" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl141" value="<?=$row2->bl14?>"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl14?>">
<input  id="mirror_d14"  type="hidden"  > 
<span style="color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf141" style="pointer-events:none;border:none;width:140px" value="<?=$row2->resf14?>"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap155 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1551" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll151" value="<?=$row2->bll15?>" readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" value="<?=$row2->bll15?>">
<input  id="mirror_d15"  type="hidden"  > 
<span style="color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf151" style="pointer-events:none;border:none;width:150px" value="<?=$row2->resf15?>"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap166 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1661" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bcg161" value="<?=$row2->srp16?>" readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$row2->srp16?>">
<input  id="mirror_d16"  type="hidden"  > 
<span style="color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf161" style="pointer-events:none;border:none;width:160px" value="<?=$row2->resf16?>"></i></span>
</td>
<td> </td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>DTP</th>
<td></td>
 <td> </td>
 <td></td>
 <td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap177 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll171" value="<?=$row2->bll17?>"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll17?>">
<input  id="mirror_d17"  type="hidden"  > 
<span style="color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf171" style="pointer-events:none;border:none;width:170px" value="<?=$row2->resf17?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap188 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1881" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr181" value="<?=$row2->grr18?>"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr18?>">
<input  id="mirror_d18"  type="hidden"  > 
<span style="color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf181" style="pointer-events:none;border:none;width:180px" value="<?=$row2->resf18?>"></i></span>
</td>
</tr>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>



