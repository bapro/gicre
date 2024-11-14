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
<br/>
<div class="col-md-12 " id="reset-pediad" style="margin-left:3%">

<span id="refresh-ant-pediat">
<h4 class=" h4 his_med_title"  >Antecedentes Perinatal (<?php echo $count_pedia?> registro(s))</h4>
<?php if ($count_pedia > 0)
{
?>

<?php 

 foreach($pedia as $row)
{

//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
//$update_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="pagination">
<a class="load_pedia" title="Creado por :<?=$row->inserted_by?> , fecha : <?=$inserted_time?> &#013  Cambiado por : <?=$row->inserted_by?> , fecha : <?=$update_time?>" data-toggle="modal" data-target="#ver_pedia" href="<?php echo base_url("admin_medico/data_pedia_by_id/$row->id/$id_historial/$user_id")?>">
#<?=$row->id;?>
</a></div>


<?php
}
?>



<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>
  </span>

<br/>
  <div class="col-md-12" >
<div class="col-md-6 table-responsive"  >
<table class="table" style="border-bottom:1px solid rgb(205,205,205);">
<tr><th colspan="3">Evolucion del embarazo (informaciones de la madre durante el embarazo del nino/a)</th></tr>
<tr>
<td style="width:30px" colspan="6">
<input type="radio" name="evo"  value=""  checked hidden> 
<input type="radio" name="evo"  value="normal"  > 
<label>Normal</label>
</td>
</tr>
<tr>
<td style="width:30px" colspan="6">
<input type="radio" name="evo" value="complicado">
 <label> Complicado</label>
 </td>
</tr>
<tr>
<td colspan="6">
<textarea class="form-control" cols="170" id="evol_text"></textarea>

</td>
</tr>

<tr>
<td>
<label>Edad gestacional al momento del nac.</label> 
<select class="form-control" id="edad_gest">
<option hidden></option>
<option>Predetermino</option>
<option>Termino</option>
<option>Post termino</option>
</select>
</td>
<td></td>
</tr>
</table>
<!--<br/>
<strong>Uso de Medicamentos durante embarazo</strong>
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>

<div class="form-group">
<label class="control-label col-md-3" >Medicamento</label>
<div class="col-md-8">

<input class="form-control selectpedia"  >

<br/>
<div id="search-patient-medica-pedia"></div>
</div>

</div>-->

</div>

  <div class="col-md-6 table-responsive" style="border-left:1px solid rgb(205,205,205);">
  <table class="table">
<tr><th  colspan="3"><font style="color:red"><strong>*</strong></font> Tipo de nacimiento</th></tr>
<tr>
<td style="width:30px">
<input type="radio" name="tnaci"  value=""  checked hidden> 
<input type="radio" name="tnaci"  value="parto" > <label> Parto</label>
</td>
<td style="width:30px"><input type="radio" name="tnaci"  value="cesarea"> <label>Cesarea</label></td>
<td style="width:30px"><input type="radio" name="tnaci"  value="desconocido"  > <label>Desconocido</label></td>
</tr>
<tr>
<td colspan="6">
<label>Describa</label>
 <textarea class="form-control" cols="170" id="describa"></textarea>
 </td>
</tr>
</table>
  
  
 <table class="table "  style="width:100%;border-bottom:1px solid rgb(205,205,205);">
<tr>
<td><label>Peso al nacer </label> <input type="text" id="pesopd"></td>
<td><label>Desconocido</label> <input type="checkbox" class="desco1" id="desco1" name="desco1" ></td>
</tr>
<tr>
<td><label>Talla al nacer</label> <input type="text" id="talla"></td>
<td><label>Desconocido</label> <input type="checkbox" name="desco2" id="desco2"></td>
</tr>
</table>

</div>

</div>

<h3 class=" h4 his_med_title">Antecedentes Pediatrico</h3>

<h4 style="color:green;">Antecedentes Personales</h4>
<div class="col-md-6 table-responsive" style="border-right:1px solid rgb(206,206,206)">
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
<div class="col-md-6 table-responsive" style="">
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
  <div class="col-md-12">
 <hr class="title-highline-top"/>
  <h4 style="color:green">VACUNACION </h4>

 <div class="table-responsive">
<table class="table  table-striped table-bordered" >
<?php foreach($date_nacer as $dn)?>
  
  <tr>
<th></th>
<th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$dn->date_nacer?></span></th>
<th class="col-xs-2">
<input  id="insert_d"  type="hidden" value="<?=$dn->date_nacer?>"  > 
</th>
<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th>
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th>1era. Dosis</th>
<th>2da. Dosis</th>
<th>3era. Dosis</th>
<th> 1er.Refuerzo</th>
<th>2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG</th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date no_ap_sh1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1" style="display:none;background:red">
<input type="text"  class="form-control bcgno"  id="no_ap11"  readonly >
<span id="frem1"  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"  style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg1">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg1"  />
<span style="display:none;color:red"  class="atras1"><i>Dias de atraso : <input type="text" id="resf1" class="resf1" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2 no_ap_sh2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap22"  readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg2">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg2"  />
<span style="display:none;color:red;" class="atras2"><i>Dias de atraso : <input type="text" class="resf2" id="resf2" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3 no_ap_sh3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap33"  readonly >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel3">
<input  id="mirror_d3"  type="hidden"  > 
<span style="display:none;color:red" class="atras3"><i>Dias de atraso : <input type="text" id="resf3" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4 no_ap_sh4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap4" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap44"  readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl4">
<input  id="mirror_d4"  type="hidden"  > 
<span style="display:none;color:red" class="atras4">
<i>Dias de atraso : <input type="text" id="resf4" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap5" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap55"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel5">
<input  id="mirror_d5"  type="hidden"  > 
<span style="display:none;color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf5" style="pointer-events:none;border:none;width:50px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6 no_ap_sh6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap6" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap66"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl6">
<input  id="mirror_d6"  type="hidden"  > 
<span style="display:none;color:red" class="atras6"><i>Dias de atraso : <input type="text" id="resf6" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap7" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap77"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr7">
<input  id="mirror_d7"  type="hidden"  > 
<span style="display:none;color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf7" style="pointer-events:none;border:none;width:70px;background:none"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap8" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap88"  readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll8">
<input  id="mirror_d8"  type="hidden"  > 
<span style="display:none;color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf8" style="pointer-events:none;border:none;width:80px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap9" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap99"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr9">
<input  id="mirror_d9"  type="hidden"  > 
<span style="display:none;color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf9" style="pointer-events:none;border:none;width:90px;background:none"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap10" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1010"  readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel10">
<input  id="mirror_d10"  type="hidden"  > 
<span style="display:none;color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf10" style="pointer-events:none;border:none;width:100px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11 no_ap_sh11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1111"  readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl11">
<input  id="mirror_d11"  type="hidden"  > 
<span style="display:none;color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf11" style="pointer-events:none;border:none;width:110px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap122" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1212"  readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr12">
<input  id="mirror_d12"  type="hidden"  > 
<span style="display:none;color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf12" style="pointer-events:none;border:none;width:120px"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap133" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1313"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel13">
<input  id="mirror_d13"  type="hidden"  > 
<span style="display:none;color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf13" style="pointer-events:none;border:none;width:130px;background:none"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap144" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1414"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl14">
<input  id="mirror_d14"  type="hidden"  > 
<span style="display:none;color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf14" style="pointer-events:none;border:none;width:140px"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap155" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1515"  readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll15">
<input  id="mirror_d15"  type="hidden"  > 
<span style="display:none;color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf15" style="pointer-events:none;border:none;width:150px"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap166" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1616"  readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg16">
<input  id="mirror_d16"  type="hidden"  > 
<span style="display:none;color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf16" style="pointer-events:none;border:none;width:160px"></i></span>
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
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1717"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll17">
<input  id="mirror_d17"  type="hidden"  > 
<span style="display:none;color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf17" style="pointer-events:none;border:none;width:170px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap188" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1818"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr18">
<input  id="mirror_d18"  type="hidden"  > 
<span style="display:none;color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf18" style="pointer-events:none;border:none;width:180px"></i></span>
</td>
</tr>
</table>
 </div>
  <br/><br/><br/>
  </div>

<div class="modal fade" id="ver_pedia"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>

