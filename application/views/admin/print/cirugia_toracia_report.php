<body  style='font-size:10px'>
<p style="color:red;text-align:right;font-size:8px"><i>fecha de impresión <?=date('d-m-Y h:i A');?></i> </p>
<?php
foreach ($cirugia_toracico->result() as $rowp)

if($rowp->id_enf !=0 && $rowp->id_cond !=0){

$enfermedad=$this->db->select('enf_motivo,signopsis,laboratorios,estudios')->where('id_enf',$rowp->id_enf)->get('h_c_enfermedad')->row_array();
 $motivo=$enfermedad['enf_motivo'];
  $signopsis=$enfermedad['signopsis'];
  $laboratorios=$enfermedad['laboratorios'];
$estudios=$enfermedad['estudios'];
echo "<span style='font-size:10px'><strong>ENFERMEDAD ACTUAL</strong></span>";
echo "<ul>";
echo "<li  style='font-size:10px;'><STRONG>Motivo</STRONG> $motivo</li>";
echo "<li  style='font-size:10px;'><STRONG>Sinopsis</STRONG> $signopsis</li>";
if($laboratorios !=""){
echo "<li style='font-size:10px;'><STRONG>Laboratorios</STRONG> $laboratorios</li>";
}
if($estudios !=""){
echo "<li style='font-size:10px;'><STRONG>Estudios</STRONG> $estudios</li>";
}
echo "</ul>";
$sql ="SELECT diagno_def FROM   h_c_diagno_def_link WHERE con_id_link=$rowp->id_cond";
$querysig = $this->db->query($sql);
if($querysig->result() !=NULL){
echo "<span style='font-size:10px'><strong>CONCLUSION DIAGNOSTICO</strong></span><br/>";
echo "<ul>";
echo "<li style='font-size:10px;text-transform:lowercase;list-style:none'><strong>CIE10</strong></li>";
foreach ($querysig->result() as $rf){
$desc= $this->db->select('description,code')->where('idd',$rf->diagno_def)->get('cied')->row_array();
$descpt=$desc['description'];
$code=$desc['code'];
echo "<li style='font-size:10px;text-transform:lowercase'>$code $descpt</li>";
}
}
echo "</ul>";
echo "<ul>";
$otro=$this->db->select('otros_diagnos')->where('id_cdia',$rowp->id_cond)->get('h_c_conclusion_diagno')->row('otros_diagnos');
if($otro !=""){
	echo "<STRONG>OTROS DIAGNOSTICOS</STRONG><br/>";
echo "<ul><li style='font-size:10px;text-transform:lowercase'> $otro</li>";
}
$plan=$this->db->select('plan')->where('id_cdia',$rowp->id_cond)->get('h_c_conclusion_diagno')->row('plan');
if($plan !=''){
	echo "<li style='font-size:10px;text-transform:lowercase'><STRONG>PLAN</STRONG> $plan</li>";
	}

	$procedimiento=$this->db->select('procedimiento')->where('id_cdia',$rowp->id_cond)->get('h_c_conclusion_diagno')->row('procedimiento');
	if($procedimiento !=''){
		echo "<li style='font-size:10px;text-transform:lowercase'><STRONG>PROCEDIMIENTO</STRONG> $procedimiento</li>";
		}
		$evolucion=$this->db->select('evolucion')->where('id_cdia',$rowp->id_cond)->get('h_c_conclusion_diagno')->row('evolucion');
		if($evolucion !=''){
				echo "<li style='font-size:10px;text-transform:lowercase'><STRONG>EVOLUCION</STRONG> $evolucion</li>";
		}

echo "</ul>";



//--------------------------------------------------------------------------------------------------------------------------------

$perfil=$this->db->select('perfil')->where('id_user',$id_doc)->get('users')->row('perfil');
if($perfil=="Admin"){
$exam_fis=$this->db->select('*')->where('historial_id',$id_historial)->order_by('id_sig','desc')->get('h_c_examen_fisico')->row_array();
//------------------------------------------------------------------------
$exam_sistema=$this->db->select('*')->where('historial_id',$id_historial)->order_by('id_exs','desc')->get('h_c_examen_sistema')->row_array();
//------------------------------------------------------------------------------------------

$exam_sistema=$this->db->select('*')->where('historial_id',$id_historial)->order_by('id_exs','desc')->get('h_c_examen_sistema')->row_array();
$query2 = $this->db->get_where('h_c_examen_sistema',array('historial_id'=>$id_historial));
	$row_exam=$query2->num_rows();

  $query1 = $this->db->get_where('h_c_examen_fisico',array('historial_id'=>$id_historial));
  	$row_fis=$query1->num_rows();
}else{
//-----------------------------------------------------------------
$exam_fis=$this->db->select('*')->where('historial_id',$id_historial)->where('id_user',$id_doc)->order_by('id_sig','desc')->get('h_c_examen_fisico')->row_array();
//-----------------------------------------------------------------
$exam_sistema=$this->db->select('*')->where('historial_id',$id_historial)->where('id_user',$id_doc)->order_by('id_exs','desc')->get('h_c_examen_sistema')->row_array();
$query2 = $this->db->get_where('h_c_examen_sistema',array('historial_id'=>$id_historial,'id_user'=>$id_doc));
	$row_exam=$query2->num_rows();

  $query1 = $this->db->get_where('h_c_examen_fisico',array('historial_id'=>$id_historial,'id_user'=>$id_doc));
  	$row_fis=$query1->num_rows();
}

$musculoes=$exam_sistema['musculoes'];
$sisneuro=$exam_sistema['sisneuro'];
$neurologico=$exam_sistema['neurologico'];
$siscardio=$exam_sistema['siscardio'];
$cardiova=$exam_sistema['cardiova'];
$urogenital=$exam_sistema['urogenital'];
$sis_mu_e=$exam_sistema['sist_uro'];
$sist_uro=$exam_sistema['sis_mu_e'];
$sist_resp=$exam_sistema['sist_resp'];
$nervioso=$exam_sistema['nervioso'];
$linfatico=$exam_sistema['linfatico'];
$digestivo=$exam_sistema['digestivo'];
$respiratorio=$exam_sistema['respiratorio'];
$genitourinario=$exam_sistema['genitourinario'];
$sist_diges=$exam_sistema['sist_diges'];
$sist_endo=$exam_sistema['sist_endo'];
$endocrino=$exam_sistema['endocrino'];
$sist_rela=$exam_sistema['sist_rela'];
$otros_ex_sis=$exam_sistema['otros_ex_sis'];
$dorsales=$exam_sistema['dorsales'];
//-------------------------------------------------------
$peso=$exam_fis['peso'];
$kg=$exam_fis['kg'];
$talla=$exam_fis['talla'];
$imc=$exam_fis['imc'];
$cuello_text=$exam_fis['cuello_text'];
$ext_sup_text=$exam_fis['ext_sup_text'];
$ext_inft=$exam_fis['ext_inft'];
$torax_text=$exam_fis['torax_text'];
if($row_fis > 0){
echo "<strong>EXAMEN FISICO</strong><br/>";

if($peso !=0){

echo "<strong>Peso</strong> $peso - <strong>Kg</strong> $kg <br/>";
}

if($talla !=""){

echo " <strong>Talla</strong> $talla";
}

if($imc !=""){

echo " <strong>IMC</strong> $imc";
}


if($cuello_text !=""){

echo "<strong>Cuello</strong> $cuello_text <br/>";
}

if($ext_sup_text !=""){

echo "<strong>Extremidades Superiores</strong> $ext_sup_text<br/>";
}

if($ext_inft !=""){

echo "<strong>Extremidades Inferiores</strong> $ext_inft<br/>";
}

if($torax_text !=""){

echo "<strong>Torax Corazón y pulmones</strong> $torax_text<br/>";
}
}
if($row_exam > 0){
echo "<br/><strong>EXAMEN SISTEMA</strong><br/>";
if($neurologico !=""){

echo "<strong>Sistema neurológico</strong> $neurologico<br/>";
}
if($cardiova !=""){

echo "<strong>Sistema cardiovascular</strong> $cardiova<br/>";
}
if($urogenital !=""){

echo "<strong>Sistema urogenital</strong> $urogenital<br/>";
}

if($nervioso !=""){

echo "<strong>Sistema nervioso</strong> $nervioso<br/>";
}

if($linfatico !=""){

echo "<strong>Sistema linfatico</strong> $linfatico<br/>";
}


if($respiratorio !=""){

echo "<strong>Sistema respiratorio</strong> $respiratorio<br/>";
}

if($genitourinario !=""){

echo "<strong>Sistema genitourinario</strong> $genitourinario<br/>";
}

if($digestivo !=""){

echo "<strong>Sistema digestivo</strong> $digestivo<br/>";
}


if($endocrino !=""){

echo "<strong>Sistema endocrino</strong> $endocrino<br/>";
}

if($otros_ex_sis !=""){

echo "<strong>Relativo a</strong> $otros_ex_sis<br/>";
}

if($dorsales !=""){

echo "<strong>Columna dorsal</strong> $dorsales<br/>";
}
if($musculoes !=""){

echo "<strong>Sistema músculo esquelético</strong> $musculoes";
}
}

}

 $doc=$this->db->select('name,exequatur,area')->where('id_user',$rowp->id_user)
 ->get('users')->row_array();
  $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
  
  
  $sello_doc=$this->db->select('sello')->where('doc',$rowp->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
  
  
?>
<p style="font-size:10px;"><?=nl2br($rowp->detalle)?></p>

<table class='r-b' style='border-top:1px solid #DCDCDC;width:100%' >
<tr>
<td style="text-align:right;font-size:8px"><strong><i>Dr</strong> <?=$doc['name']?></i></td>
<td style="text-align:right;font-size:8px"><i><?=$area?></i></strong></td>
<td style="text-align:right;font-size:8px"><strong><i>Ex.</strong> <?=$doc['exequatur']?></i></td>
<td style="color:red;font-size:8px"><i> <?=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));?></i> </td>
</tr>
<!--<tr>
<td style="color:red;font-size:8px"><i> <?=date("d-m-Y H:i");?></i> </td><td></td>
</tr>-->
</table>

<table class='r-b' style='width:80%'  >
<tr>
<td style="text-align:center">
<br/>
<?php 
$firma_doc="$rowp->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<div style="font-size:11px;border-top:1px solid #DCDCDC"><strong>Firma autorizada y sello del medico</strong></div>
</td>
<?=$sello?>
</tr>
</table>



</body>
</html>
