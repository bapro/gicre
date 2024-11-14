<form class="form-horizontal " method="post"  > 
<?php 


foreach($patient as $row)
?>
       
<input type="hidden" id="inserted_by" value="<?=$user?>">
<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 
<div class="col-md-12">
  <input type="hidden" id="hist_id" value="<?=$id_historial?>" > 
<p class="h4 his_med_title" id="click_antg" style="cursor:pointer;background:#E6E6FA;">Antecedentes personales, familiares y patologicos</p>
         <div class="table-responsive"  id="show_gnrl">
   <table class="table table-striped" style="width:80%">

<tr>
<th class="col-xs-7">Marque los hallazgos</th>
<!--<th class="col-xs-5"><input type="checkbox" name="todo"  id="select_all" checked>&nbsp;Todo</th>-->
<th class="col-xs-5"><span class="rows_selected" id="select_count">0</span></th>
<th class="col-xs-1">Madre</th>
<th class="col-xs-1">Padre</th>
<th class="col-xs-1">Hnos</th>
<th class="col-xs-1">Pers.</th>
<th></th>
</tr>
<tr>

<td>
<label>Cardiopatia</label>
</td>
<td >
<input type="checkbox" id="chooseAll_1" name="car_nin" class="emp_checkbox niguno_checked1"> <label class="marco-nin">Ninguno</label>
</td>
<td>
<input type="checkbox" id="madre_checkbox" name="car_m" class="check-all check_madre" >
</td>
<td>
<input type="checkbox" id="padre_checkbox" name="car_p" class="check-all check_padre">
</td>
<td>
<input type="checkbox" name="car_h" class="check-all check_hnos">
</td>
<td>
<input type="checkbox" name="car_pe" class="check-all check_pers"></td>
<td><input type="text"  id="car_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Hipertension</label></td>
<td><input type="checkbox" id="chooseAll_1" name="hip_nin"  class="emp_checkbox niguno_checked2"> <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="hip_m" class="check-all check_madre2" ></td>
<td><input type="checkbox" name="hip_p" class="check-all check_padre2"></td>
<td><input type="checkbox" name="hip_h" class="check-all check_hnos2"></td>
<td><input type="checkbox" name="hip_pe" class="check-all check_pers2"></td>
<td><input type="text" id="hip_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Enf. Cerebrovascular</label></td>
<td><input type="checkbox" name="ec_nin" id="chooseAll_1" class="emp_checkbox niguno_checked3"> <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="ec_m" class="check-all check_madre3"></td>
<td><input type="checkbox" name="ec_p" class="check-all check_padre3"></td>
<td><input type="checkbox" name="ec_h" class="check-all check_hnos3"></td>
<td><input type="checkbox" name="ec_pe" class="check-all check_pers3"></td>
<td><input type="text" id="ec_text" class="text-marquo"></td>
</tr>

<tr>
<td><label>Epilepsia</label></td>
<td><input type="checkbox" name="ep_nin" id="chooseAll_1" class="emp_checkbox niguno_checked4" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="ep_m" class="check-all check_madre4 "></td>
<td><input type="checkbox" name="ep_p" class="check-all check_padre4"></td>
<td><input type="checkbox" name="ep_h" class="check-all check_hnos4"></td>
<td><input type="checkbox" name="ep_pe" class="check-all check_pers4"></td>
<td><input type="text" id="ep_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Asma Bronquial</label></td>
<td><input type="checkbox" name="as_nin" id="chooseAll_1" class="emp_checkbox niguno_checked5" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="as_m" class="check-all check_madre5"></td>
<td><input type="checkbox" name="as_p" class="check-all check_padre5"></td>
<td><input type="checkbox" name="as_h" class="check-all check_hnos5"></td>
<td><input type="checkbox" name="as_pe" class="check-all check_pers5"></td>
<td><input type="text" id="as_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Tuberculosis</label></td>
<td><input type="checkbox" name="tub_nin" id="chooseAll_1" class="emp_checkbox niguno_checked6" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="tub_m" class="check-all check_madre6"></td>
<td><input type="checkbox" name="tub_p" class="check-all check_padre6"></td>
<td><input type="checkbox" name="tub_h" class="check-all check_hnos6"></td>
<td><input type="checkbox" name="tub_pe" class="check-all check_pers6"></td>
<td><input type="text" id="tub_text" class="text-marquo" ></td>
</tr>
<tr>
<td><label>Diabetes</label></td>
<td><input type="checkbox" name="dia_nin" id="chooseAll_1" class="emp_checkbox niguno_checked7" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="dia_m" class="check-all check_madre7"></td>
<td><input type="checkbox" name="dia_p" class="check-all check_padre7"></td>
<td><input type="checkbox" name="dia_h" class="check-all check_hnos7"></td>
<td><input type="checkbox" name="dia_pe" class="check-all check_pers7"></td>
<td><input type="text" id="dia_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Tiroides</label></td>
<td><input type="checkbox" name="tir_nin" id="chooseAll_1" class="emp_checkbox niguno_checked8" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="tir_m" class="check-all check_madre8"></td>
<td><input type="checkbox" name="tir_p" class="check-all check_padre8"></td>
<td><input type="checkbox" name="tir_h" class="check-all check_hnos8"></td>
<td><input type="checkbox" name="tir_pe" class="check-all check_pers8"></td>
<td><input type="text" id="tir_text" class="text-marquo" ></td>
</tr>
<tr>
<td><label>Hepatitis (Tipo)</label>&nbsp;<input style="width:50px" type="text" id="hep_tipo" class="text-marquo"></td>
<td><input type="checkbox" name="hep_nin" id="chooseAll_1" class="emp_checkbox niguno_checked9" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="hep_m" class="check-all check_madre9"></td>
<td><input type="checkbox" name="hep_p" class="check-all check_padre9"></td>
<td><input type="checkbox" name="hep_h" class="check-all check_hnos9"></td>
<td><input type="checkbox" name="hep_pe" class="check-all check_pers9"></td>
<td><input type="text" id="hep_text" class="text-marquo" ></td>
</tr>
<tr>
<td><label>Enfermedades Renales</label></td>
<td><input type="checkbox" name="enfr_nin" id="chooseAll_1" class="emp_checkbox niguno_checked10" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="enfr_m" class="check-all check_madre10"></td>
<td><input type="checkbox" name="enfr_p" class="check-all check_padre10"></td>
<td><input type="checkbox" name="enfr_h" class="check-all check_hnos10"></td>
<td><input type="checkbox" name="enfr_pe" class="check-all check_pers10"></td>
<td><input type="text" id="enfr_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Falcemia</label></td>
<td><input type="checkbox" name="falc_nin" id="chooseAll_1" class="emp_checkbox niguno_checked11" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="falc_m" class="check-all check_madre11"></td>
<td><input type="checkbox" name="falc_p" class="check-all check_padre11"></td>
<td><input type="checkbox" name="falc_h" class="check-all check_hnos11"></td>
<td><input type="checkbox" name="falc_pe" class="check-all check_pers11"></td>
<td><input type="text" id="falc_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Neoplasias</label></td>
<td><input type="checkbox" name="neop_nin" id="chooseAll_1" class="emp_checkbox niguno_checked12" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="neop_m" class="check-all check_madre12"></td>
<td><input type="checkbox" name="neop_p" class="check-all check_padre12"></td>
<td><input type="checkbox" name="neop_h" class="check-all check_hnos12"></td>
<td><input type="checkbox" name="neop_pe" class="check-all check_pers12"></td>
<td><input type="text" id="neop_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>ENf. Psiquiatricas</label></td>
<td><input type="checkbox" name="psi_nin" id="chooseAll_1" class="emp_checkbox niguno_checked13" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="psi_m" class="check-all check_madre13"></td>
<td><input type="checkbox" name="psi_p" class="check-all check_padre13"></td>
<td><input type="checkbox" name="psi_h" class="check-all check_hnos13"></td>
<td><input type="checkbox" name="psi_pe" class="check-all check_pers13"></td>
<td><input type="text" id="psi_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Obesidad</label></td>
<td><input type="checkbox" name="obs_nin" id="chooseAll_1" class="emp_checkbox niguno_checked14" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="obs_m" class="check-all check_madre14"></td>
<td><input type="checkbox" name="obs_p" class="check-all check_padre14"></td>
<td><input type="checkbox" name="obs_h" class="check-all check_hnos14"></td>
<td><input type="checkbox" name="obs_pe" class="check-all check_pers14"></td>
<td><input type="text" id="obs_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Ulcera Peptica</label></td>
<td><input type="checkbox" name="ulp_nin" id="chooseAll_1" class="emp_checkbox niguno_checked15" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="ulp_m" class="check-all check_madre15"></td>
<td><input type="checkbox" name="ulp_p" class="check-all check_padre15"></td>
<td><input type="checkbox" name="ulp_h" class="check-all check_hnos15"></td>
<td><input type="checkbox" name="ulp_pe" class="check-all check_pers15"></td>
<td><input type="text" id="ulp_text" class="text-marquo" ></td>
</tr>

<tr>
<td><label>Artritis, Gota</label></td>
<td><input type="checkbox" name="art_nin" id="chooseAll_1" class="emp_checkbox niguno_checked16" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="art_m" class="check-all check_madre16"></td>
<td><input type="checkbox" name="art_p" class="check-all check_padre16"></td>
<td><input type="checkbox" name="art_h" class="check-all check_hnos16"></td>
<td><input type="checkbox" name="art_pe" class="check-all check_pers16"></td>
<td><input type="text" id="art_text" class="text-marquo" ></td>
</tr>
<tr>
<td><label>Zika</label></td>
<td><input type="checkbox" name="zika_nin" id="chooseAll_1" class="emp_checkbox niguno_checked17" > <label class="marco-nin">Ninguno</label></td>
<td><input type="checkbox" name="zika_m" class="check-all check_madre17"></td>
<td><input type="checkbox" name="zika_p" class="check-all check_padre17"></td>
<td><input type="checkbox" name="zika_h" class="check-all check_hnos17"></td>
<td><input type="checkbox" name="zika_pe" class="check-all check_pers17"></td>
<td><input type="text" id="zika_text" class="text-marquo" ></td>
</tr>
<!--<tr>
<th></th><th style="width:100%"><span class="rows_selected2" id="select_count2" style="font-size:12px;">0 Seleccionada </span></th><th></th><th></th><th></th><th></th><th></th>
</tr>-->
<tr style="background:none">
<td colspan="5"><label>Otros</label><br/> <textarea cols="40" id="otros" class="form-control text-marquo"></textarea></td>
</tr>
</table>
</div>
</div>		  

<div class="col-md-12" >
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_sospecha_mal" style="cursor:pointer;background:#E6E6FA;">Sospecha de Abuso o Maltrato</p>
<div id="sospecha_mal" style="display:none">
<table class="table" style="width:80%">
<tr>
<td><label>Maltrato fisico</label></td><td>Si <input type="radio" name="mf" class="chkYes5"></td><td>No <input type="radio" name="mf" checked class="chkNo5"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-maltrato" id="text-maltrato" disabled></textarea></td></tr>
<tr>
<td><label>Abuso sexual</label></td><td>Si <input type="radio" name="abs" class="chkYes6"></td><td>No <input type="radio" name="abs" checked class="chkNo6"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-abuso" id="text-abuso" disabled></textarea></td></tr>
<tr>
<td><label>Negligencia</label></td><td>Si <input type="radio" name="neg" class="chkYes7"></td><td>No <input type="radio" name="neg" checked class="chkNo7"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control text-neg" id="text-neg" disabled></textarea></td></tr>
<tr>
<td><label>Maltrato emocional</label></td><td>Si <input type="radio" name="mem" class="chkYes8"></td><td>No <input type="radio" name="mem" checked class="chkNo8"></td>
</tr>
<tr><td colspan="3"><textarea class="form-control maltrato-emo" id="maltrato-emo" disabled></textarea></td></tr>
</table>
</div>
</div>
<!--column 12 end -->

<div class="col-md-12">
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_otros_ant" style="cursor:pointer;background:#E6E6FA;">Otros antecedentes</p>
<div  style="display:none" id="show_otros_ant" >
<div  class="col-md-6">
 <table class="table" >

<tr>
<td class="col-xs-6"><label>Quirurgicos</label><span class="ninguno1"><input type="checkbox" class='checkin_qui' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="quirurgicos" disabled></textarea>
</td>
<td><label>Gineco-obstetricos</label><span class="ninguno1"><input type="checkbox" class='checkin_gine' checked> <label>Niguno</label></span>
<select class="form-control select2" id="gineco" disabled>
<option value="" hidden></option>
<?php 

foreach($GinecOb as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</td>
</tr>
<tr>
<td><label>Abdominal</label><span class="ninguno1"><input type="checkbox" class='checkin_abd' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="abdominal" disabled></textarea></td>
<td><label>Toracica</label><span class="ninguno1"><input type="checkbox" class='checkin_tora' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="toracica" disabled></textarea></td>
</tr>
<tr>
<td><label>Transfusion sanguinea</label><span class="ninguno1"><input type="checkbox" class='checkin_trans' checked> <label>Niguno</label></span>
<textarea class="form-control" cols="20" id="transfusion" disabled></textarea></td>
<td><label>Otros</label><span class="ninguno1"><input type="checkbox" class='checkin_otros' checked> <label>Niguno</label></span>
<textarea class="form-control" id="otros1" cols="20" disabled></textarea></td>
</tr>

<tr>
<td><label>Medicamentos Habituales</label><span class="ninguno1"><label>No</label>&nbsp;<input type="radio" id="radiomedi" name="radiomedi" checked>&nbsp; <label>Si</label>&nbsp;<input type="radio" id="radiomedi" name="radiomedi" class="chM"></span>
	<select class="form-control select2"  multiple="multiple" id="selectmedic" disabled >
	<option value="ningun" hidden></option>
	<?php 
     
	foreach($medicamentos as $row)
	{ 
	?>
	
	<option value="<?=$row->name?>"><?=$row->name?></option>
	<?php
	}
	?>
	</select>
	</td>
</tr>
</table>

</div>
<div class="col-md-6">
<input type="checkbox" class='checkin-right-otro' checked> <label style="font-size:12px">Deactivo</label>
<table class="table right-otro" >
<tr>
<td><label>Hepatis B:</label></td> <td>No &nbsp;<input type="radio" id="hepatis" name="hepatis" value="No" checked>&nbsp; &nbsp; Si&nbsp;<input type="radio" id="hepatis" name="hepatis" value="Si"></td>
</tr>
<tr>
<td><label>HPV :</label></td> <td>&nbsp;No&nbsp;<input type="radio"  id="hpv" name="hpv" value="No" checked>&nbsp; &nbsp; Si&nbsp;<input type="radio"  id="hpv" name="hpv" value="Si"></td>
</tr>
<tr>
<td><label>Toxoide Tetanico </label></td> <td> &nbsp;No&nbsp;<input type="radio"  id="toxoide" name="toxoide" value="No" checked>&nbsp; &nbsp;Si&nbsp;<input type="radio"  id="toxoide" name="toxoide" value="Si"></td>
</tr>
<tr>
<!--<td><label>Otros</label><textarea class="form-control" cols="20" id="otros2"></textarea></td>-->
</tr>
<tr>
<td>

<label style="font-weight:bold">Grupo Sanguineo </label>
</td>
<td>

<select class="form-control" id="grouposang">
<option value="" hidden></option>
<option>A</option>
<option>B</option>
<option>AB</option>
<option>0</option>
</select>

<span style="color:red;" ><i>Alerto: Si no tiene el tipo de sangre del paciente debe de indicar una tipificacion</i></span>
</td>
</tr>
<tr>
<td><label>Rh</label></td>
<td>Positivo <input type="radio" id="rhoa" name="rhoa" value="" checked hidden>
<input type="radio" id="rhoa" name="rhoa" value="Positivo" class="ck"></td>
<td> Negativo <input type="radio" id="rhoa" name="rhoa" value="Negativo"></td>
</tr>
<tr>
<td><label>Tipificacion</label></td><td style="width:190px"><input type="text" id="tipificacion" style="width:40px"/> <span id="mas" style="display:none;font-weight:bold">+</span><span id="menos" style="display:none;font-weight:bold">-</span></td>
</tr>
</table>
</div>
</div>
</div>

<div class="col-md-12" >
<hr class="hr_ad"/>
<p class="h4 his_med_title" id="click_viol" style="cursor:pointer;background:#E6E6FA">Violencia Intafamiliar </p>

<div id="violenciaform"  style="display:none;width:80%">
<form  id="formRecetas" class="form-horizontal"  method="post"  >
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Se ha sentido alguna vez afectada/lastimada emosional o psicologicamente por alguna persona importante para usted ?</label>
<div class="col-md-4"><span class="ninguno1"><input type="checkbox" class='checkin_v1' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia1" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Alguna vez alguien le ha hecho dano fisico ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v2' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia2" disabled >
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">En algun momento has sido tocada, manoseada o forzada a tener contacto o relacion sexual ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v3' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia3" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectOne as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</div>

</div>
<div class="form-group" style="border-top:1px solid rgb(206,206,206)">
<label class="control-label col-md-6" style="font-size:14px">Cuando era nina, fue tocada de una manera inpropriada por alguien ?</label>
<div class="col-md-4">
<span class="ninguno1"><input type="checkbox" class='checkin_v4' checked> <label>Niguno</label></span>
<select  class="form-control"  id="violencia4" disabled>
<option value="" hidden>Seleccionar</option>
<?php 

foreach($selectTwo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>

</div>

</div>
</form>


</div>
<hr class="hr_ad"/>
</div>




<div class="col-md-12">

<p class="h4 his_med_title" id="click_habitost" style="cursor:pointer;background:#E6E6FA">Habitos Toxicos </p>

<div id="habitost"  style="display:none">
 <div class="table-responsive">
 <table class="table" >

<tr style="font-weight:bold">
<th></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</td><td></td><td></td><td>Habito</td><td>Cantidad</td><td>Frecuencia</th>
</tr>
<tr>
<th><input type="checkbox" id="checkin_cafe"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/cafe.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cafe</th>
<th><input type="text" id="hab_c_caf"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_caf" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<!--Pipa-->
<th><input type="checkbox" id="checkin_pipa"/> </th>
<th><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/pipe.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Pipa</th>
<th><input type="text" id="hab_c_pip"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  style="width:149px" id="hab_f_pip" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>
<tr>
<!--Cigarillo-->
<th><input type="checkbox" id="checkin_ciga"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/cigaret.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Cigarillo</th>
<th ><input type="text" id="hab_c_ciga"  class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  id="hab_f_ciga" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
<!--Alcohol-->
<th><input type="checkbox" id="checkin_al"/> </th>
<th><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/alcohol.jpg" width="30" alt=""/> </th>
<th class="th_habitos">Alcohol</th>
<th><input type="text" id="hab_c_al" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control" id="hab_f_al"  style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>

</tr>
<tr>
<!--Tabaco-->
<th><input type="checkbox" id="checkin_tab"/> </th>
<th class="id"><img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/tobacco.jpg" width="30" alt=""/></th>
<th class="th_habitos" > Tabaco</th>
<th><input type="text" id="hab_c_tab" class="form-control input_habitos" disabled /></th>
<th class="th_habitos">
<select class="form-control"  id="hab_f_tab" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</th>
</tr>

</table>

<table class="table" >

<tr>
<th style="width:100px"></th><th></th><th style="width:550px">Tipo</th><th>Cantidad</th><th>Frecuencia</th>
</tr>
<tr>
<th><input type="checkbox" id="checkin_drug"/> <img style="border:1px solid rgb(206,206,206);padding:1px" src="<?= base_url();?>assets/img/historial_medical/drugs.jpg" width="60" alt=""/></th>
<th class="th_habitos" > Droga</th>
<td>
<select class="form-control  select2 hab_t_drug" id="hab_t_drug" multiple="multiple" disabled>
<?php 

foreach($drug as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
</td>
<td><input type="text" id="hab_c_drug" class="form-control input_habitos" disabled /></td>
<td class="th_habitos">
<select class="form-control"  id="hab_f_drug" style="width:149px" disabled>
<option value="">Seleccionar</option>
<option >Diariamente</option>
<option >Ocasionalmente</option>
<option >A veces</option>
</select>
</td>
</tr>
</table>
</div>
</div>
</div>
</form>