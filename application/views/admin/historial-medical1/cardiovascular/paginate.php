<?php
foreach ($cardiov_paginate->result() as $row) {
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$row->id_user)
 ->get('users')->row('name');	
?>
<form method="post" class="form-horizontal" id="submit-vas-update">
   <h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?>, <?=$inserted_time?></h5>
<table class='table form-aling-left'>
<tr>
<td style='width:30%'>
<strong>1- TIPO DE CIRUGIA</strong>
<select class="form-control select2c" id="ed_tipo_cirugia" name='ed_tipo_cirugia' >
<option><?=$row->tipo_cirugia?></option>
<option>ELECTIVAS</option>
<option>EMERGENCIA</option>
</select>
</td>
<td>
<strong>2- CIRUGIAS ANTERIOR</strong>
<textarea class="form-control" id="ed_cirugia_ant" name='ed_cirugia_ant' ><?=$row->cirugia_ant?></textarea>
</td>
</tr>
<tr>
<td>
<strong>3- RIESGO QUIRURGICO</strong><br/>
a) Alto <textarea class="form-control" id="ed_riesgo_qui_alto" name='ed_riesgo_qui_alto' ><?=$row->riesgo_qui_alto?></textarea></td>
<td><br/>b) Medio <textarea class="form-control" id="ed_riesgo_qui_medio" name='ed_riesgo_qui_medio' ><?=$row->riesgo_qui_medio?></textarea></td>
<td><br/>c) Bajo <textarea class="form-control" id="ed_riesgo_qui_bajo" name='ed_riesgo_qui_bajo' ><?=$row->riesgo_qui_bajo?></textarea></td>
</tr>
</table>
<strong>4- ANTECEDENTE CARDIOVASCULARES <a href='#edit-btn'>Ir al button de editar<a/></strong>
<table class='table' style='width:60%'>
<tr>
<td>
a) Hta 
</td>
<td>

<?php
if($row->ant_card_radio1==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio1' name='ed_ant_card_radio1' value='1' $selected />";
	
	
	if($row->ant_card_radio1==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio1' name='ed_ant_card_radio1' value='0' $selected />";
?>

</td>
<td><span id='ed_text_ant_card1' style='visibility:<?=$show?>' ><input   class="form-control"  name='ed_text_ant_card1' value='<?=$row->text_ant_card1?>' ></span></td>
</tr>
<tr>
<td>
b) Cardiopastica Isquemica
</td>
<td>
<?php
if($row->ant_card_radio2==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio2' name='ed_ant_card_radio2' value='1' $selected />";
	
	
	if($row->ant_card_radio2==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio2' name='ed_ant_card_radio2' value='0' $selected />";
?></td>
<td><span id='ed_text_ant_card2' style='visibility:<?=$show?>'><input   class="form-control"  id='text_ant_card2' name='ed_text_ant_card2' value='<?=$row->text_ant_card2?>'  ></span></td>
</tr>
<tr>
<td>
c) Insuficienca Cardiaca Congenita
</td>
<td>
<?php
if($row->ant_card_radio3==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio3' name='ed_ant_card_radio3' value='1' $selected />";
	
	
	if($row->ant_card_radio3==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio3' name='ed_ant_card_radio3' value='0' $selected />";
?></td>
<td><span id='ed_text_ant_card3' style='visibility:<?=$show?>'><input  class="form-control"  name='ed_text_ant_card3' value='<?=$row->text_ant_card3?>' ></span></td>
</tr>
<tr>
<td>
d) Arritmia Documentada
</td>
<td>
<?php
if($row->ant_card_radio4==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio4' name='ed_ant_card_radio4' value='1' $selected />";
	
	
	if($row->ant_card_radio4==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio4' name='ed_ant_card_radio4' value='0' $selected />";
?></td>
<td><span id='ed_text_ant_card4' style='visibility:<?=$show?>'><input  class="form-control"  name='ed_text_ant_card4' value='<?=$row->text_ant_card4?>' ></span></td>
</tr>
<tr>
<td>
e) Enfermedad Valvulr
</td>
<td>
<?php
if($row->ant_card_radio5==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio5' name='ed_ant_card_radio5' value='1' $selected />";
	
	
	if($row->ant_card_radio5==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio5' name='ed_ant_card_radio5' value='0' $selected />";
?></td>
<td><span id='ed_text_ant_card5' style='visibility:<?=$show?>'><input class="form-control"  name='ed_text_ant_card5' value='<?=$row->text_ant_card5?>'></span></td>
</tr>
<tr>
<td>
f) Otros 
</td>
<td>
<?php
if($row->ant_card_radio6==1){
		        $selected="checked='checked'";
				$show='visible';
		} else {
		       $selected="";
			   $show='hidden';
	    }
	echo "si <input type='radio' class='ant_card_radio6' name='ed_ant_card_radio6' value='1' $selected />";
	
	
	if($row->ant_card_radio6==0){
		          $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo " no <input type='radio' class='ant_card_radio6' name='ed_ant_card_radio6' value='0' $selected />";
?></td>
<td><span id='ed_text_ant_card6' style='visibility:<?=$show?>'><input class="form-control" name='ed_text_ant_card6' value='<?=$row->text_ant_card6?>' ></span></td>
</tr>
</table>


</tr>
</table>

<strong>5- CONDICION COMORBIDA  <a href='#edit-btn'>Ir al button de editar<a/></strong>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Tabaquismo</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_ta" ><?=$row->cond_com_ta?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Obesidad</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_ob" ><?=$row->cond_com_ob?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Anemia</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_an" ><?=$row->cond_com_an?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Hepatopatia Cronica</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_hep" ><?=$row->cond_com_hep?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Discracia Sanguinea</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_disc" ><?=$row->cond_com_disc?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Diabetes Mellitus</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_diab" ><?=$row->cond_com_diab?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Disfuncion Renal</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_disf" ><?=$row->cond_com_disf?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Enfermedad Vascular</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_enfvas" ><?=$row->cond_com_enfvas?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Periferica</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_peri" ><?=$row->cond_com_peri?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Enfermedad Cronica</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_enfcr" ><?=$row->cond_com_enfcr?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > ACV</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_acv" ><?=$row->cond_com_acv?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Asma Bronquial</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_asbr" ><?=$row->cond_com_asbr?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Otras</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_cond_com_otras" ><?=$row->cond_com_otras?></textarea>
</div>
</div>
</td>
</tr>
</table>
<strong>6- CAPACIDAD FUNCIONAL</strong>
<table class='table'>
<tr>
<td>

<div class="form-group">
<label class="control-label rgth-crd col-md-3" > a) Limitada</label>
<div class="col-md-9">
(>4mt)
<textarea  class="form-control" name="ed_cap_fun_lim" ><?=$row->cap_fun_lim?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > b) Buena</label>
<div class="col-md-9">
(>4mt)
<textarea  class="form-control" name="ed_cap_fun_bue" ><?=$row->cap_fun_bue?></textarea>
</div>
</div>


</td>
</tr>
</table>

<strong>7- SINTOMAS CARDIOVASCULAR</strong>
<table class='table' style='width:80%'>
<tr>
<td>
<?php
if($row->sin_car_dol_tor==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>

Dolor Toracico <input type='checkbox' name='ed_sin_car_dol_tor' <?=$checked?>/>
</td>
<td>
Disnea 

<?php
if($row->sin_car_dis==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>

<input type='checkbox' name='ed_sin_car_dis' <?=$checked?>/>&nbsp;&nbsp;

<?php
if($row->sin_car_tos==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>

TOS <input type='checkbox' name='ed_sin_car_tos' <?=$checked?>/>
</td>
</tr>
<tr>
<td>
<?php
if($row->sin_car_palp==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>
Palpitaciones <input type='checkbox' name='ed_sin_car_palp' <?=$checked?>/>&nbsp;&nbsp;
<?php
if($row->sin_car_ort==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>
Ortopnea <input type='checkbox' name='ed_sin_car_ort' <?=$checked?>/>
</td>
<td>
<?php
if($row->sin_car_edem==1){
		        $checked="checked='checked'";
		
		} else {
		       $checked="";
			  
	    }?>
Edema <input name='ed_sin_car_edem' type='checkbox' <?=$checked?>/>&nbsp;&nbsp;
</td>
<td>
<?php
if($row->sin_car_otro_txt !=""){
		        $checked="checked='checked'";
				$show='visible';
		
		} else {
		       $checked="";
			   $show='hidden';
			  
	    }?>


Otro <input type='checkbox' id='ed_sin_car_otro' <?=$checked?>/> <input name='ed_sin_car_otro_txt' id='ed_sin_car_otro_txt' value='<?=$row->sin_car_otro_txt?>' style='visibility:<?=$show?>;position:absolute'  />
</td>
</tr>
</table>

<strong>8- EXAMEN FISICO  <a href='#edit-btn'>Ir al button de editar<a/></strong>
<div id="reload-signo-card"></div>


<div class="col-md-12 table-responsive" >
<?php
$examf=$this->db->select('*')->where('id_cardio',$row->id)->get('h_c_examen_fisico')->row_array();

 ?>
<table class="table"  cellspacing="0" style="border-top: 1px groove #cardio-38a7bb;width:100%">
  <tr>
  <th>Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td >
<br/>
<label  class="col-md-3 control-label"> Peso</label>
<div class="input-group">
<input class="form-control peso-in"  id='ed_cardio_peso' name='ed_cardio_peso' value='<?=$examf['peso']?>' type="text">
   <span class="input-group-addon">lb</span>
   <input class="form-control kg-in"  id='ed_cardio_kg' name='ed_cardio_kg' value='<?=$examf['kg']?>' type="text">
   <span class="input-group-addon">kg</span>
</div>


</td>
<td title="Tension Arterial" ><br/>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (mm)</span>

<input class="form-control" id='ed_cardio_ta' name='ed_cardio_ta' value='<?=$examf['ta']?>' type="text"> 
</div>
</div>

<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (hg)</span>

<input class="form-control" name='ed_cardio_hg' value='<?=$examf['hg']?>' type="text">
</div>
</div>

</td>
<td style="width:1px" >
<br/>
<br/>

<input type="radio"  name="ed_cardio_radio_signo" value="SANO" checked /> sano	 		
</td>
</tr>

<tr>

<td class="ida"  title="Talla en metro">

<label  class="col-md-3 control-label">Talla</label>

<div class="col-md-5">

<div class="input-group">
<input class="form-control talla-in" title="talla en metro" id='ed_cardio_talla' name='ed_cardio_talla' value='<?=$examf['talla']?>' type="text">
   <span class="input-group-addon">m</span>
</div>

</div>

</td>
<td style="">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">

<input class="form-control" placeholder="Fr" name='ed_cardio_fr' value='<?=$examf['fr']?>' type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">

<div class="input-group" title="Temperatura">
<input class="form-control"  name='ed_cardio_tempo' placeholder="Tempo" value='<?=$examf['tempo']?>' type="text">
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<input type="radio"  name="ed_cardio_radio_signo" value="AGUDAMENTE ENFERMA"/> agudamente enferma 	 		
</td>
</tr>



<tr>

<td class="ida" style="width:80px;">
<label  class="col-sm-3 control-label">IMC</label> 
<div class="col-sm-9">
	<div class="input-group">
		<input class="form-control formatnum imc-in" id='ed_cardio_imc' name='ed_cardio_imc' value='<?=$examf['imc']?>' type="text" readonly>
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label"> Fc</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control"  name='ed_cardio_fc'  placeholder="Fc" value='<?=$examf['fc']?>' type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Pulso</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group">
<input class="form-control" name='ed_cardio_pulso' placeholder="Pulso" value='<?=$examf['pulso']?>' type="text">
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<input type="radio" name="ed_cardio_radio_signo"  value="CRONICAMENTE ENFERMA"/> cronicamento enferma		 		
</td>
</tr>


<tr>

<td title="Glicemia">
<label  class="col-md-3 control-label">Glicemia&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="col-md-6">
<input class="form-control" id='ed-cardio-glicemia' name='ed_cardio_glicemia' value='<?=$examf['glicemia']?>' type="text">
<div class='glicemia'></div>
</div>	   
 </td>

<td style="width:1px" >
</td>
</tr>

	   
</table>


</div>








<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BD</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_bd" ><?=$row->exam_fis_bd?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > BI</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_bi" ><?=$row->exam_fis_bi?></textarea>
</div>
</div>
</td>

</tr>

<tr>
<!--
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > FC</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_fc" ><?=$row->exam_fis_fc?></textarea>
</div>
</div>
</td>-->

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >IVY</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_ivy" ><?=$row->exam_fis_ivy?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Torax</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_torax" ><?=$row->exam_fis_torax?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Corazon</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_coraz" ><?=$row->exam_fis_coraz?></textarea>
</div>
</div>
</td>

</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Pulmones</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_pulm" ><?=$row->exam_fis_pulm?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Abdomen</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_abdom" ><?=$row->exam_fis_abdom?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Miembros</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_miemb" ><?=$row->exam_fis_miemb?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > RHY</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_rhy" ><?=$row->exam_fis_rhy?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Edema</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_edema" ><?=$row->exam_fis_edema?></textarea>
</div>
</div>
</td>
<!--
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Pulsos Perifericos</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_exam_fis_pul_per" ><?=$row->exam_fis_pul_per?></textarea>
</div>
</div>
</td>-->
</tr>
</table>

<strong>9- LABORATORIO  <a href='#edit-btn'>Ir al button de editar<a/></strong>
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HCTO</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_hcto" ><?=$row->lab_hcto?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > HB</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_hb" ><?=$row->lab_hb?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > GB</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_gb" ><?=$row->lab_gb?></textarea>
</div>
</div>
</td>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Plaquetas</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_plaq" ><?=$row->lab_plaq?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Creatinina</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_creat" ><?=$row->lab_creat?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > Glicemia</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_glice" ><?=$row->lab_glice?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGO</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_tgo" ><?=$row->lab_tgo?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TGP</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_tgo_tgp" ><?=$row->lab_tgo_tgp?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TS/TC</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_tgo_ts_tc" ><?=$row->lab_tgo_ts_tc?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" > TP</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_tp" ><?=$row->lab_tp?></textarea>
</div>
</div>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >TPT</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_tpt" ><?=$row->lab_tpt?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Orina</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_lab_orina" ><?=$row->lab_orina?></textarea>
</div>
</div>
</td>
</tr>
</table>

<strong>10- RESULTADOS CARDIODIAGNOSTICO <a href='#edit-btn'>Ir al button de editar<a/></strong> 
<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >a) Electrocardiograma</label>
<div class="col-md-8">
<textarea  class="form-control" name="ed_res_car_elec" ><?=$row->res_car_elec?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >b) Radiografia De Torox</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_res_car_rad_tor" ><?=$row->res_car_rad_tor?></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >c) Ecocardiograma</label>
<div class="col-md-8">
<textarea  class="form-control" name="ed_res_car_eco" ><?=$row->res_car_eco?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >d) Holters</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_res_car_hol" ><?=$row->res_car_hol?></textarea>
</div>
</div>
</td>

</tr>


<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-4" >e) Esperimotria</label>
<div class="col-md-8">
<textarea  class="form-control" name="ed_res_car_esperim" ><?=$row->res_car_esperim?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >f) Mapa</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_res_car_mapa" ><?=$row->res_car_mapa?></textarea>
</div>
</div>
</td>

</tr>
</table>
<strong>11- CONCLUSION DIAGNOSTICA <a href='#edit-btn'>Ir al button de editar<a/></strong>


<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Patologia Cardiovasculares Detectadas</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_con_diag_pat_car_del" ><?=$row->con_diag_pat_car_del?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Otros Patologias</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_con_diag_otros_pat" ><?=$row->con_diag_otros_pat?></textarea>
</div>
</div>
</td>

</tr>
</table>
<strong>12- RIESGO CARDIOVASCULAR (PREDICTORES CLINICOS)</strong>

<table class='table'>
<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Menor</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_riesgo_car_menor" ><?=$row->riesgo_car_menor?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Intermedio</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_riesgo_car_intermedio" ><?=$row->riesgo_car_intermedio?></textarea>
</div>
</div>
</td>

</tr>

<tr>
<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Mayor</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_riesgo_car_mayor" ><?=$row->riesgo_car_mayor?></textarea>
</div>
</div>
</td>

<td>
<div class="form-group">
<label class="control-label rgth-crd col-md-3" >Recomendaciones</label>
<div class="col-md-9">
<textarea  class="form-control" name="ed_riesgo_car_recomend" ><?=$row->riesgo_car_recomend?></textarea>
<input type='hidden' name='updated_by' value='<?=$user_id?>'/>
<input type='hidden' name='id'  value='<?=$row->id?>'/>
</div>
</div>
</td>

</tr>
<tr>
<td>
  <button type="submit" id='edit-btn' class="btn btn-lg btn-success"><i class="fa fa-check after-eva-car" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
<a   class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/$row->id/$id_patient/$row->id_user/$centro_medico/card")?>"  ><i class="fa fa-print"></i> Imprimir</a>

</td>
</tr>
</table>
</form >
<?php
}

?>

<script>
//------------------------------------------------------------------------------------

$("#ed_cardio_peso").keyup(function() {
  var peso = $(this).val();
  var talla =$("#ed_cardio_talla").val();
if(peso==""){
$("#ed_cardio_talla").prop("disabled", true);
$("#ed_cardio_talla").val("");
$("#ed_cardio_imc").prop("disabled", true);
$("#ed_cardio_imc").val("");
}
else{
$("#ed_cardio_talla").prop("disabled", false);
};
var ma = peso * 0.45;
$("#ed_cardio_kg").val(ma);
$("#ed_cardio_kg").number( true, 2 );;
$("#ed_cardio_kgtext").text(ma);
$('#ed_cardio_kgtext').number( true, 2 );
$('#ed_cardio_kgsimb').text('kg').css('font-style','italic');
});

//------------------------

$("#ed_cardio_talla").keyup(function() {
  var talla = $(this).val();
  var peso =$("#ed_cardio_kg").val();

//calcul imc
//$('.number').number( myNumber, 2 )
var cal1 = talla * talla;
var imc_result = peso / cal1;
$("#ed_cardio_imc").val(imc_result);
});

$('#ed_cardio_imc').number( true, 2 );
//-------------------------------------------------------------------------------------
var timerGli = null;
$('#ed-cardio-glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normaled, 1000)
});
check_if_glicemia_normaled();
function check_if_glicemia_normaled() {

var glicemia= $('#ed-cardio-glicemia').val(); 

 if(glicemia !="" && (0  >= glicemia  || glicemia <=69 )){
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').css('color','red').text(value).slideDown();		
}

else if(glicemia !="" && (70  >= glicemia  || glicemia <=140 )){
	var value="Glicemia " + glicemia + " : paciente normal";
$('.glicemia').css('color','green').text(value).slideDown();		
}
else if ((glicemia !="") && (140 > glicemia || glicemia <= 200)) {
	var value="Glicemia " + glicemia + " : paciente pre-diabetes";
$('.glicemia').css('color','red').text(value).slideDown();	
} 

else if(glicemia !="" && 200 < glicemia)
{
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').css('color','red').text(value).slideDown();	
}
else{
	$('.glicemia').hide();
}
}

$(".load-cirugia").not('.registro-li').hide();


$('#submit-vas-update').submit(function(e){
e.preventDefault();	
$.ajax({
url:'<?php echo base_url();?>admin_medico/uptadeCarVas',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
	$(".after-eva-car").show();
 setTimeout(function(){
     $(".after-eva-car").hide();
    }, 2000);
	loadSigno();
$("#imprimir-eva-car").show();
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#reload-signo-card').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});

});


	$("#ed_sin_car_otro").on('click', function(e) {
	if($(this).is(':checked',true)) {
			$("#ed_sin_car_otro_txt").css({"visibility":"visible"});	   
		}  
		else {  
			$("#ed_sin_car_otro_txt").css({"visibility":"hidden"}); 
			$('[name="ed_sin_car_otro_txt"]').val(''); 
   	}
	});

$('.ant_card_radio1').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card1').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card1').css({"visibility":"hidden"}); 
  $('input[name="ed_text_ant_card1"]').val('');  
  }
});

$('.ant_card_radio2').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card2').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card2').css({"visibility":"hidden"}); 
   $('input[name="ed_text_ant_card2"]').val(''); 
   
  }
});


$('.ant_card_radio3').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card3').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card3').css({"visibility":"hidden"}); 
  $('input[name="ed_text_ant_card3"]').val(''); 
   
  }
});


$('.ant_card_radio4').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card4').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card4').css({"visibility":"hidden"});
  $('input[name="ed_text_ant_card4"]').val('');  
   
  }
});


$('.ant_card_radio5').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card5').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card5').css({"visibility":"hidden"}); 
  $('input[name="ed_text_ant_card5"]').val(''); 
   
  }
});


$('.ant_card_radio6').change(function(){
  if($(this).val()==1) {
	$('#ed_text_ant_card6').css({"visibility":"visible"}); 
  } else {
 $('#ed_text_ant_card6').css({"visibility":"hidden"}); 
   $('input[name="ed_text_ant_card6"]').val('');  
   
  }
});



loadSigno();
function loadSigno()
{
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadSignoCard",
data: {id_cardio:<?=$row->id?>,patient:<?=$id_patient?>},
method:"POST",
success:function(data){
$('#reload-signo-card').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#reload-signo-card').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
</script>

