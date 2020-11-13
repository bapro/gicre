  <div id="show_pedia"></div>

 <div id="hide_pedia">

 <?php
$name=($this->session->userdata['admin_name']);
?>
<style>
.control-label{font-size:16px}
.table-bordered input{
  font-size: 12px;
  text-transform:lowercase
}
#show_vacuna{
    
    text-decoration:none;
    background:green;
    color:#fff;
    display:inline-block;
    padding:6px;
	border-radius:20px;
	cursor:pointer
}
</style>

 <form  id="formAntecedentes" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?>"> 
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 
  <input type="hidden" id="editpedia" value="new_pedia"> 
<p class=" h4 his_med_title"  >Antecedentes Perinatal</p>
<div class="col-xs-12" style="border-bottom:2px groove #38a7bb;padding:20px" >
<?php if ($count_pedia > 0)
{
?>
<table>
<tr>

<td >
<div class="col-xs-6">
<div class="input-group" >
<span class="input-group-addon"><span  ><b><?=$count_pedia?></b> </span>regitros (s)</span> 
<select class="form-control" id="id_pedia" >
<option value="" hidden>navegador </option>
<?php 

 foreach($pedia as $row)
{

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
?>
<option value="<?=$row->id;?>"># (<?=$row->id;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
</div>
<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>
</td>
</tr>
</table>
</div>
<div class="backg">
<div class="col-md-12 ">

<div class="col-md-6"  >
<table class="table" style="border-bottom:1px solid rgb(205,205,205);">
<tr><th style="width:20%" colspan="3">Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</th></tr>
<tr>
<td>
<input type="radio" name="evo" id="evo" value="normal"  checked > 
<label>Normal</label>
</td>
<td>
<input type="radio" name="evo" id="evo" value="complicado">
 <label> Complicado</label></td>
<td>
<textarea class="form-control" cols="70" id="evol_text"></textarea>
</td>
</tr>
</table>
<br/>
<h5 class="h5">Uso de Medicamentos durante embarazo</h5>
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>

<div class="form-group">
<label class="control-label col-md-3" >Medicamento</label>
<div class="col-md-8">
<select  class="form-control medica" multiple="multiple"  id="med" >
<option value="" hidden></option>
<?php 

foreach($medicamentos as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>

</div>

  <div class="col-md-6" style="border-left:1px solid rgb(205,205,205);">
  <table class="table">
<tr><th  colspan="3">Tipo de nacimiento</th></tr>
<tr>
<td style="width:30px"><input type="radio" name="tnaci" id="tnaci" value="parto" checked> <label> Parto</label></td>
<td style="width:30px"><input type="radio" name="tnaci" id="tnaci" value="cesarea"> <label>Cesarea</label></td>
<td style="width:30px"><input type="radio" name="tnaci" id="tnaci" value="desconocido"  > <label>Desconocido</label></td>
</tr>
<tr>
<td colspan="6">
<label>Describa</label>
 <textarea class="form-control" cols="170" id="describa"></textarea>
 </td>
</tr>
</table>
  
  
 <table class="table"  style="width:100%;border-bottom:1px solid rgb(205,205,205);">
<tr>
<td>
<label>Edad gestacional al momento del nac.</label> 
<select style="width:80%" class="form-control" id="edad_gest">
<option value="" hidden></option>
<option>Predetermino</option>
<option>Termino</option>
<option>Post termino</option>
</select>
</td>
<td></td>
</tr>
<tr>
<td><label>Peso al nacer </label> <input type="text" id="peso"></td>
<td><label>Desconocido</label> <input type="checkbox" class="desco1" id="desco1" name="desco1" ></td>
</tr>
<tr>
<td><label>Talla al nacer</label> <input type="text" id="talla"></td>
<td><label>Desconocido</label> <input type="checkbox" name="desco2" id="desco2"></td>
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
<td></td><td><input type="checkbox" name="lactamat"></td>
<td><label>Lactancia Materna</label></td>
</tr>
<tr>
<td><label>Alimentos</label></td>
<td><input type="checkbox" name="leche"></td>
<td><label>Leche de formulas</label></td>
</tr>
<tr>
<td colspan="3"><label> Otros </label>
 <textarea class="form-control" cols="70" id="otrosinfo"></textarea></td>
</tr>
</table>
<table class="table">
<tr><th>Traumatico/somatico, psicolog</th></tr>
<tr>
<td><input type="radio" name="traum" id="traum" value="no"><label> No</label> 
<input type="radio" name="traum" id="traum" value="si"> <label> Si</label> 
 <textarea class="form-control" cols="20" id="traum_text"></textarea></td>
</tr>
</table>
<table class="table">
<tr><th>Transfusionales</th></tr>
<tr>
<td>
<input type="radio" name="trans" id="trans" value="" checked hidden>
<input type="radio" name="trans" id="trans" value="no"><label> No</label> 
<input type="radio" name="trans" id="trans" value="si"> <label> Si</label> 
 <textarea class="form-control" cols="20" id="trans_text"></textarea></td>
</tr>

</table>
<table class="table" style="width:100%">
<tr><th><h4 style="color:green;">Desarollo</h4></th><th></th><th></th></tr>
<tr>
<tr><td style="width:100%" colspan="3"> <span style="display:none;color:red" class="ref-neurologia-text" ></span></td></tr>
<td style="font-size:12px"><label>Motor Grueso adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio" name="grueso" class="chkYes" checked></td><td style="font-size:12px"><label>No</label> <input type="radio" name="grueso" class="chkNo"><i style="color:red;display:none" title="Alert : Referir a neurologia" class="fa fa-exclamation-triangle triangle-1" aria-hidden="true"></i>
</td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-grueso" id="text-grueso" disabled></textarea></td></tr>
<tr>
<td style="font-size:12px"><label>Motor fino adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio" name="fino" class="chkYes2" checked></td><td style="font-size:12px"><label>No</label> <input type="radio" name="fino" class="chkNo2"><i style="color:red;display:none" title="Alert : Referir a neurologia" class="fa fa-exclamation-triangle triangle-2" aria-hidden="true"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-fino" id="text-fino" disabled></textarea></td></tr>
<tr>
<td style="font-size:12px"><label>Lenguaje adecuado para su edad</label></td><td style="font-size:12px"><label>Si</label> <input type="radio" name="lenguage" class="chkYes3" checked></td><td style="font-size:12px"><label>No</label> <input type="radio" name="lenguage"  class="chkNo3"><i style="color:red;display:none" title="Alert : Referir a neurologia" class="fa fa-exclamation-triangle triangle-3" aria-hidden="true"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-lenguage" id="text-lenguage" disabled></textarea></td></tr>
<tr>
<td style="font-size:12px"><label>Social adecuado para su edad</label></td><td style="font-size:12px">Si <input type="radio" name="social" class="chkYes4" checked></td><td style="font-size:12px">No <input type="radio" name="social" class="chkNo4"><i style="color:red;display:none" title="Alert : Referir a neurologia" class="fa fa-exclamation-triangle triangle-4" aria-hidden="true"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-social" id="text-social" disabled></textarea></td></tr>
</table>

</div>
<div class="col-md-6" style="">
<table class="table">
<tr><th>Patologias</th><th></th></tr>
<tr>
<td><input type="checkbox" name="ale"> <label>Alergia</label> </td>
<td><input type="checkbox" name="hep"> <label>Hepatitis</label> </td>
</tr>
<tr>
<td><input type="checkbox" name="amig"> <label>Amigdalitis</label> </label></td>
<td><input type="checkbox" name="infv"> <label>Infeccion vias urinarias</label> </td>
</tr>
<tr>
<td><input type="checkbox" name="asm"> <label>Asma</label> </td>
<td><input type="checkbox" name="neum"> <label>Neumoria</label></td>
</tr>
<tr>
<td><input type="checkbox" name="cirug"> <label> Cirugias</label> </td>
<td><input type="checkbox" name="otot"> <label>Ototis</label> </td>
</tr>
<tr>
<td><input type="checkbox" name="deng"> <label>Dengue</label> </td>
<td><input type="checkbox" name="pape"> <label>Paperas</label></td>
</tr>
<tr>
<td><input type="checkbox" name="diar"> <label>Diarrea</label> </td>
<td><input type="checkbox" name="paras"> <label>Parasitosis</label> </td>
</tr>
<tr>
<td><input type="checkbox" name="zika"> <label> Zika </label></td>
<td><input type="checkbox" name="saram"> <label>Sarampion</label></td>
</tr>
<tr>
<td><input type="checkbox" name="chicun"> <label> Chicungunya</label> </td>
<td><input type="checkbox" name="varicela"> <label>Varicela</label> </td>
</tr>
<tr>
<td><input type="checkbox" name="falc"> <label> Falcemia</label> </td>
<td><input type="checkbox" onclick="show9()" > <label>Otros</label>
 <textarea class="form-control" cols="20" id="otros_t_text" style="display:none"></textarea>
 </td>
</tr>
</table>
<table class="table" style="width:100%">
<tr><th><h4 style="color:green;">Sospecha de Abuso o Maltrato</h4></th><th></th><th></th></tr>
<tr>
<td><label>Maltrato fisico</label></td>
<td>Si <input type="radio" name="mf1" class="chkYes5"></td>
<td>No <input type="radio" name="mf1" checked class="chkNo5"></td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-maltrato" id="textmaltrato" disabled>
</textarea></td>
</tr>
<tr>
<td><label>Abuso sexual</label></td>
<td>Si <input type="radio" name="abs" class="chkYes6"></td>
<td>No <input type="radio" name="abs" checked class="chkNo6"></td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-abuso" id="textabuso" disabled>
</textarea>
</td></tr>
<tr>
<td><label>Negligencia</label></td>
<td>Si <input type="radio" name="neg" class="chkYes7"></td>
<td>No <input type="radio" name="neg" checked class="chkNo7">
</td>
</tr>
<tr>
<td colspan="3">
<textarea class="form-control text-neg" id="textneg" disabled>
</textarea>
</td>
</tr>
<tr>
<td><label>Maltrato emocional</label></td>
<td>Si <input type="radio" name="mem" class="chkYes8"></td>
<td>No <input type="radio" name="mem" checked class="chkNo8"></td>
</tr>
<tr><td colspan="3">
<textarea class="form-control maltrato-emo" id="maltratoemo" disabled>
</textarea></td>
</tr>
</table>

  </div>
   </div>
   </div>
  <div class="col-md-12">
 <hr class="title-highline-top"/>
  <h4 style="color:green">VACUNACION <a id="show_vacuna">+</a></h4>
  <div id="vacunacion"></div>
  <br/><br/><br/>
  </div>
</form>
</div>
</div>
