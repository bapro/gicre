<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px gray border-bottom: solid 1px gray; }
    td { border-left: none; border-left: none;padding: 1em; }


strong{font-size:13px}
#wrapper {
  display: flex;
}

#left {
  flex: 0 0 65%;
}

#left {
  flex: 1;
}
</style>
</head>

<?php
foreach ($ipss_data->result() as $row)
?>
<div style="color:red;font-size:11px;">Fecha de impresión <?=date("d-m-Y H:i");?></div>
<table style='width:100%'>
<tr>
<td style='width:30%'>
<strong>1- TIPO DE CIRUGIA</strong>
<?=$row->tipo_cirugia?>
</td>
<td>
<strong>2- CIRUGIAS ANTERIOR</strong>
<?=$row->cirugia_ant?>
</td>
</tr>
<tr>
<td>
<strong>3- RIESGO QUIRURGICO</strong><br/>
<strong>a) Alto</strong> <?=$row->riesgo_qui_alto?></td>
<td><br/><strong>b) Medio</strong> <?=$row->riesgo_qui_medio?></td>
<td><br/><strong>c) Bajo</strong> <?=$row->riesgo_qui_bajo?></td>
</tr>
</table>
<strong>4- ANTECEDENTE CARDIOVASCULARES</strong>
<table  style='width:100%'>
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
<td><span  style='visibility:<?=$show?>' ><?=$row->text_ant_card1?></span></td>
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
<td><span  style='visibility:<?=$show?>'><?=$row->text_ant_card2?></span></td>
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
<td><span  style='visibility:<?=$show?>'><?=$row->text_ant_card3?></span></td>
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
<td><span  style='visibility:<?=$show?>'><?=$row->text_ant_card4?></span></td>
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
<td><span  style='visibility:<?=$show?>'><?=$row->text_ant_card5?></span></td>
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
<td><span  style='visibility:<?=$show?>'><?=$row->text_ant_card6?></span></td>
</tr>
</table>
<strong>5- CONDICION COMORBIDA </strong>
<table >
<tr>
<td style="text-align:left"> <strong>Tabaquismo</strong></td><td><?=$row->cond_com_ta?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Obesidad</strong></td><td><?=$row->cond_com_ob?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Anemia</strong></td><td><?=$row->cond_com_an?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Hepatopatia Cronica</strong></td><td><?=$row->cond_com_hep?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Discracia Sanguinea</strong></td><td><?=$row->cond_com_disc?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Diabetes Mellitus</strong></td><td><?=$row->cond_com_diab?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Disfuncion Renal</strong></td><td ><?=$row->cond_com_disf?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Enfermedad Vascular</strong></td><td ><?=$row->cond_com_enfvas?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Periferica</strong></td><td><?=$row->cond_com_peri?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Enfermedad Cronica</strong></td><td><?=$row->cond_com_enfcr?></td>
</tr>
<tr>
<td style="text-align:left"><strong>ACV</strong></td><td><?=$row->cond_com_acv?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Asma Bronquial</td><td ><?=$row->cond_com_asbr?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Otras</strong></td><td><?=$row->cond_com_otras?></td>
</tr>
</table>
<strong>6- CAPACIDAD FUNCIONAL 
<table  style='width:100%' >
<tr>
<td style="text-align:left"><strong>a) Limitada</strong></td><td>
(>4mt)<br/>
<?=$row->cap_fun_lim?>
</td>
</tr>
<tr>
<td style="text-align:left"><strong>b) Buena</strong></td>
<td>
(>4mt)<br/>
<?=$row->cap_fun_bue?>
</td>
</tr>
</table>
<strong>7- SINTOMAS CARDIOVASCULAR 
<table style='width:100%'>
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


Otro <input type='checkbox' id='ed_sin_car_otro' <?=$checked?>/> <span style='visibility:<?=$show?>;position:absolute'><?=$row->sin_car_otro_txt?></span>
</td>
</tr>
</table>
<strong>8- EXAMEN FISICO </strong>

<?php
$sql ="SELECT * FROM h_c_examen_fisico WHERE id_cardio=$row->id";
$ExamFisById= $this->db->query($sql);

 ?>
<?php

foreach($ExamFisById->result() as $rowex)
?>

<table  class="table" style="width:100%;font-size:13px" border="1">
<tr style="background:rgb(192,192,192);color:white;border-bottom:none">
<td style="text-align:center" colspan="4"><strong>Signos vitales</strong></td>

<td colspan="2" style="text-align:center;"><strong>Aspecto General</strong></td>
</tr>

<tr>
<td style="color:white;border:none" colspan="3"></td>

<td colspan="2"  style="text-align:center;border-top:none;border-bottom:none"></td>
</tr>
<tr>
<td style="text-align:left"><strong>Peso </strong></td>
<td><?=$rowex->peso;?> lb</td>
<td><?=$rowex->kg;?> kg</td>

<td colspan="2" style="text-align:CENTER"><strong>Tension arterial</strong><br/><?=$rowex->ta;?> mm / <?=$rowex->hg;?> hg</td>
<td >

<?php
if($rowex->radio =="SANO"){
		       $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO' $selected /> sano";
?>

</td>
</tr>

<tr>
<td style="text-align:left"><strong>Talla </strong></td>
<td><?=$rowex->talla;?></td>
<td><strong>Fr</strong> <?=$rowex->fr;?></td>
<td colspan="2"><strong>Tempo.</strong> <?=$rowex->tempo;?> &#8451 </td>
<td >
<?php
if($rowex->radio =="AGUDAMENTE ENFERMA"){
		      $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA' $selected /> agudamente enferma";
?></td>
</tr>


<tr>
<td style="text-align:left"><strong>IMC </strong></td>
<td><?=$rowex->imc;?></td>
<td><strong>Fc</strong> <?=$rowex->fc;?></td>
<td colspan="2"><strong>Pulso.</strong> <?=$rowex->pulso;?> PM </td>
<td >
<?php
if($rowex->radio =="CRONICAMENTE ENFERMA"){
		      $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' $selected /> cronicamente enferma";
?></td>
</tr>
</table>

<table style='width:100%'>
<tr>
<td style="text-align:left"><strong>BD</strong></td><td><?=$row->exam_fis_bd?>
</td>
</tr>
<tr>
<td style="text-align:left"><strong>BI</strong></td><td><?=$row->exam_fis_bi?></td>

</tr>
<!--
<tr>
<td style="text-align:left"><strong> FC</strong></td><td><?=$row->exam_fis_fc?>
</td>
</tr>-->
<tr>
<td style="text-align:left"><strong>IVY</strong></td><td><?=$row->exam_fis_ivy?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Torax</td><td><?=$row->exam_fis_torax?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Corazon</strong></td><td><?=$row->exam_fis_coraz?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Pulmones</strong></td><td><?=$row->exam_fis_pulm?>
</td>
</tr>
<tr>
<td style="text-align:left"><strong>Abdomen</strong></td><td><?=$row->exam_fis_abdom?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Miembros</strong></td><td><?=$row->exam_fis_miemb?></td>
</tr>
<tr>
<td style="text-align:left"><strong> RHY</strong></td><td><?=$row->exam_fis_rhy?>
</td>
</tr>
<tr>
<td style="text-align:left"><strong>Edema</strong></td><td><?=$row->exam_fis_edema?></td>
</tr>
<!--
<tr>
<td style="text-align:left"><strong>Pulsos Perifericos</strong></td><td><?=$row->exam_fis_pul_per?></td>
</tr>-->
</table>
<strong>9- LABORATORIO</strong>
<table style='width:100%'>
<tr>
<td style="text-align:left"><strong>HCTO</strong></td><td><?=$row->lab_hcto?></td>
</tr>
<tr>
<td style="text-align:left"><strong>HB</strong></td><td><?=$row->lab_hb?></td>
</tr>
<tr>
<td style="text-align:left"><strong>GB</strong></td><td><?=$row->lab_gb?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Plaquetas</strong></td><td><?=$row->lab_plaq?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Creatinina</td><td ><?=$row->lab_creat?></td>
</tr>
<tr>
<td style="text-align:left"><strong> Glicemia</td><td ><?=$row->lab_glice?></td>
</tr>
<tr>
<td style="text-align:left"><strong>TGO</strong></td><td><?=$row->lab_tgo?></td>
</tr>
<tr>
<td style="text-align:left"><strong>TGP</strong></td><td><?=$row->lab_tgo_tgp?></td>
</tr>
<tr>
<td style="text-align:left"><strong>TS/TC</strong></td><td><?=$row->lab_tgo_ts_tc?></td>
</tr>
<tr>
<td style="text-align:left"><strong>TP</strong></td><td><?=$row->lab_tp?></td>
</tr>
<tr>
<td style="text-align:left"><strong>TPT</strong></td><td><?=$row->lab_tpt?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Orina</strong></td><td><?=$row->lab_orina?></td>
</tr>
</table>
<strong>10- RESULTADOS CARDIODIAGNOSTICO </strong>
<table style='width:100%' >
<tr>
<td style="text-align:left"><strong>a) Electrocardiograma</strong></td><td><?=$row->res_car_elec?></td>
</tr>
<tr>
<td style="text-align:left"><strong>b) Radiografia De Torox</strong></td><td><?=$row->res_car_rad_tor?></td>

</tr>

<tr>
<td style="text-align:left"><strong>
c) Ecocardiograma</strong></td><td><?=$row->res_car_eco?></td>
</tr>
<tr>
<td style="text-align:left"><strong>d) Holters</strong></td><td><?=$row->res_car_hol?></td>

</tr>

<tr>
<td style="text-align:left"><strong>e) Esperimotria</td>
<td><?=$row->res_car_esperim?></td>
</tr>
<tr>
<td style="text-align:left"><strong>f) Mapa</strong></td><td><?=$row->res_car_mapa?></td>

</tr>
</table>
<strong>11- CONCLUSION DIAGNOSTICA</strong>
<table style='width:100%' >
<tr>
<td style="text-align:left"><strong>Patologia Cardiovasculares Detectadas</td>
<td><?=$row->con_diag_pat_car_del?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Otros Patologias</strong></td><td><?=$row->con_diag_otros_pat?></td>

</tr>
</table>
<strong>12- RIESGO CARDIOVASCULAR (PREDICTORES CLINICOS) 

<table style='width:100%' >
<tr>
<td style="text-align:left"><strong>Menor</td> <td><?=$row->riesgo_car_menor?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Intermedio</strong></td><td><?=$row->riesgo_car_intermedio?></td>

</tr>

<tr>
<td style="text-align:left"><strong>Mayor</strong></td><td><?=$row->riesgo_car_mayor?></td>
</tr>
<tr>
<td style="text-align:left"><strong>Recomendaciones</td> <td><?=$row->riesgo_car_recomend?></td>

</tr>

</table>

<div id="footer">
<?php
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$row->id_user)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
 
     $sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>
<table class='r-b'  >
<tr>
<td style="text-align:left"><strong><i>Dr</strong> <?=$doc['name']?></i></td>
<td style="text-align:left"><strong><i>Exeq.</strong> <?=$doc['exequatur']?></i></td>
 <td style="text-align:right"><?=$area?></i></td>
<td  style="text-align:right"><?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
</tr>

</table>
<table class='r-b' align="center"  >
<tr>
<td style="text-align:center">
<?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<span style="font-size:11px" ><strong>Firma autorizada y sello del medico</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>