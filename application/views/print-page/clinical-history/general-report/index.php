<style>
p { margin:0 }
</style>
<body style="font-size:10px">
<?php
$sellodocpath="assets/update/$sello_doc";

if($sello_doc) {
$sellodoc='<img  style="width:160px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  />';
}else{
$sellodoc='';	
}
 foreach($cirugia_toracico->result()as $rowp)
  $inserted_timerec= date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
 	 echo "<div style='color:red;text-align:right'> $inserted_timerec</div>";
 if($rowp->id_enf !=0&&$rowp->id_cond !=0) {
    $enfermedad=$this->clinical_history->select('enf_motivo,signopsis,laboratorios,estudios')->where('id', $rowp->id_enf)->get('h_c_enfermedad_actual')->row_array();
    $motivo=$enfermedad['enf_motivo'];
    $signopsis=$enfermedad['signopsis'];
    $laboratorios=$enfermedad['laboratorios'];
    $estudios=$enfermedad['estudios'];
	 $conDiag=$this->clinical_history->select('otros_diagnos,procedimiento,plan')->where('id', $rowp->id_cond)->get('h_c_conclusion_diagno')->row_array();
	

  ?>
  
  <span><strong>ENFERMEDAD ACTUAL</strong></span><br/>
  <table>
   <tr>
  <td><strong> Motivo:</strong> <?=$motivo?></td>
  </tr>
  <tr>
  <td><strong> Sinopsis:</strong> <?=strip_tags($signopsis)?></td>
  </tr>
  <tr>
  <td><strong> Laboratorios:</strong> <?=strip_tags($laboratorios)?></td>
  </tr>
<tr>
 <td><strong> Estudios:</strong> <?=strip_tags($estudios)?></td>
   </tr>
  
   </table>
   <br/>
   <?php
	$sql="SELECT diagno_def FROM   h_c_diagno_def_link WHERE con_id_link=$rowp->id_cond";
    $querysig=$this->clinical_history->query($sql);
    ?>
  <table>
  <tr>
  <th>CONCLUSION DIAGNOSTICA</th>
  </tr>
  <?php  if($querysig->result() !=NULL) {
   
	  foreach($querysig->result()as $rf) {  
	   $desc=$this->clinical_history->select('description,code')->where('idd', $rf->diagno_def)->get('cied')->row_array();
            $descpt=$desc['description'];
            $code=$desc['code'];
	   ?>
   <tr>
  <td><?=$code?> <?=$descpt?></td>
  </tr>
    <?php
	}
    } ?>


<tr>
 <td><strong> Otros Diagnosticos:</strong> <?=strip_tags($conDiag['otros_diagnos'])?></td>
   </tr>

  <tr>
 <td><strong> Plan:</strong> <?=strip_tags($conDiag['plan'])?></td>
   </tr>
   
    <?php if($conDiag['procedimiento'] !='') {?>
    <tr>
 <td><strong> Procedimiento:</strong> <?=strip_tags($conDiag['procedimiento'])?></td>
   </tr>
 <?php }  ?>
   </table>
  
  <?php
     $exam_fis=$this->clinical_history->select('*')->where('historial_id', $id_historial)->where('inserted_by', $rowp->inserted_by)->order_by('id', 'desc')->get('h_c_examen_fisico')->row_array();
        $exam_sistema=$this->clinical_history->select('*')->where('historial_id', $id_historial)->where('inserted_by', $rowp->inserted_by)->order_by('id', 'desc')->get('h_c_examen_sistema')->row_array();
		 $signos=$this->clinical_history->select('*')->where('id_patient', $id_historial)->where('id_user', $rowp->inserted_by)->order_by('id', 'desc')->get('h_c_signo_vitales')->row_array();
        $query2=$this->clinical_history->get_where('h_c_examen_sistema', array('historial_id'=>$id_historial, 'inserted_by'=>$rowp->inserted_by));
        $row_exam=$query2->num_rows();
        $query1=$this->clinical_history->get_where('h_c_examen_fisico', array('historial_id'=>$id_historial, 'inserted_by'=>$rowp->inserted_by));
        $row_fis=$query1->num_rows();
        $query3=$this->clinical_history->get_where('h_c_signo_vitales', array('id_patient'=>$id_historial, 'id_user'=>$rowp->inserted_by));
        $row_sig=$query3->num_rows();
  
  	if($row_sig > 0) {
	
    $peso=$signos['peso'];
    $kg=$signos['kg'];
    $talla=$signos['talla'];
    $imc=$signos['imc'];
	$talla_imc=$signos['talla_imc'];
      echo "<strong>SIGNOS VITALES</strong><br/>";
        if($peso) {
            echo"<strong>Peso</strong> $peso - <strong>Kg</strong> $kg";
        }
        if($talla) {
            echo" <strong>Talla</strong> $talla";
        }
        if($imc !="") {
            echo" <strong>IMC</strong> $imc";
        }
	}

  if($row_fis > 0) {
	 $cuello_text=$exam_fis['cuello_text'];
    $cuello=$exam_fis['cuello'];
    $ext_sup_text=$exam_fis['ext_sup_text'];
    $ext_sup=$exam_fis['ext_sup'];
    $ext_inft=$exam_fis['ext_inft'];
    $ext_inf=$exam_fis['ext_inf'];
    $torax_text=$exam_fis['torax_text'];
    $torax=$exam_fis['torax'];
    $vagina_text=$exam_fis['vagina_text'];
    $rectal=$exam_fis['rectal'];
    $rectal_text=$exam_fis['rectal_text'];
    $palpa=$exam_fis['palpa'];
    $perc=$exam_fis['perc'];
    $ausc=$exam_fis['ausc'];
    $abd_insp=$exam_fis['abd_insp'];
    $vagina=$exam_fis['vagina'];
    $genitalf_text=$exam_fis['genitalf_text'];
    $genitalf=$exam_fis['genitalf'];
    $genitalm_text=$exam_fis['genitalm_text'];
    $genitalm=$exam_fis['genitalm'];
    $cabeza=$exam_fis['cabeza'];
    $cabeza_text=$exam_fis['cabeza_text'];
    $mama_izq1=$exam_fis['mama_izq1'];
    $mama_izq2=$exam_fis['mama_izq2'];
        echo "<br/>";
		 echo "<strong>EXAMEN FISISCO</strong><br/>";
        if($cuello_text && $cuello) {
            echo"<strong>Cuello</strong> $cuello $cuello_text <br/>";
        }
        if($ext_sup_text !="" || $ext_sup !="") {
            echo"<strong>Extremidades Superiores</strong> $ext_sup $ext_sup_text<br/>";
        }
        if($ext_inft !="" || $ext_inf !="") {
            echo"<strong>Extremidades Inferiores</strong> $ext_inf $ext_inft<br/>";
        }
        if($torax_text !=""||$torax !="") {
            echo"<strong>Torax Corazón y pulmones</strong> $torax $torax_text<br/>";
        }
        if($vagina_text !=""||$vagina !="") {
            echo"<strong>Genital femenino</strong> $vagina $vagina_text<br/>";
        }
        if($genitalf_text !=""||$genitalf !="") {
            echo"<strong>Tacto Vaginal</strong> $genitalf $genitalf_text<br/>";
        }
        if($genitalm_text !=""||$genitalm !="") {
            echo"<strong>Genital masculino</strong> $genitalm $genitalm_text<br/>";
        }
        if($cabeza_text !=""||$cabeza !="") {
            echo"<strong>Cabeza</strong> $cabeza $cabeza_text<br/>";
        }
        if($mama_izq1 !="") {
            echo"<strong>Mama Izquierda</strong> $mama_izq1<br/>";
        }
        if($mama_izq2 !="") {
            echo"<strong>Mama Derecha </strong> $mama_izq2<br/>";
        }
        if($rectal_text !="" || $rectal !="") {
            echo "<strong>Tacto rectal</strong> $rectal $rectal_text<br/>";
        }
        if($palpa !="") {
            echo "<strong>Palpación</strong> $palpa<br/>";
        }
        if($perc !="") {
            echo "<strong>Percusión</strong> $perc<br/>";
        }
        if($ausc !="") {
            echo "<strong>Auscultación</strong> $ausc<br/>";
        }
        if($abd_insp !="") {
            echo "<strong>Abdomen Inspección</strong> $abd_insp";
        }
    }
    if($row_exam > 0) {
		  $sisneuro=$exam_sistema['sisneuro'];
    $neurologico=$exam_sistema['neurologico'];
    $siscardio=$exam_sistema['siscardio'];
    $cardiova=$exam_sistema['cardiova'];
    $urogenital=$exam_sistema['urogenital'];
    $sis_mu_e=$exam_sistema['sis_mu_e'];
    $musculoes=$exam_sistema['musculoes'];
    $sist_uro=$exam_sistema['sist_uro'];
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
        echo "<br/><br/><strong>EXAMEN SISTEMA</strong><br/>";
        if($neurologico !="" || $sisneuro !="") {
            echo"<strong>Sistema neurológico</strong> $sisneuro $neurologico<br/>";
        }
        if($cardiova !="" || $siscardio !="") {
            echo"<strong>Sistema cardiovascular</strong> $siscardio $cardiova<br/>";
        }
        if($urogenital !=""|| $sist_uro !="") {
            echo"<strong>Sistema urogenital</strong> $sist_uro $urogenital<br/>";
        }
        if($nervioso !="") {
            echo"<strong>Sistema nervioso</strong> $nervioso<br/>";
        }
        if($linfatico !="") {
            echo"<strong>Sistema linfatico</strong> $linfatico<br/>";
        }
        if($respiratorio !="" || $sist_resp !="") {
            echo"<strong>Sistema respiratorio</strong> $sist_resp $respiratorio<br/>";
        }
        if($genitourinario !="") {
            echo"<strong>Sistema genitourinario</strong> $genitourinario<br/>";
        }
        if($digestivo !=""|| $sist_diges !="") {
            echo"<strong>Sistema digestivo</strong> $sist_diges $digestivo<br/>";
        }
        if($endocrino !=""|| $sist_endo !="") {
            echo"<strong>Sistema endocrino</strong> $sist_endo $endocrino<br/>";
        }
        if($otros_ex_sis !=""|| $sist_rela !="") {
            echo"<strong>Relativo a</strong> $sist_rela $otros_ex_sis<br/>";
        }
        if($dorsales !="") {
            echo"<strong>Columna dorsal</strong> $dorsales<br/>";
        }
        if($musculoes !="" || $sis_mu_e !="") {
            echo"<strong>Sistema músculo esquelético</strong> $sis_mu_e $musculoes";
        }
    }
}


?><p style="font-size:10px"><?=$rowp->days_amount?><?=nl2br($rowp->detalle)?></p>


<?php
$sql ="SELECT * FROM  hc_general_report_documents WHERE id_p_a=$rowp->id_patient AND inserted_by=$rowp->inserted_by ORDER BY id DESC";
$queryImg= $this->clinical_history->query($sql);
if($queryImg->num_rows() > 0){
	echo "
	<hr/>
	<table >
	<tr>
	";
foreach($queryImg->result() as $rowImg){?>

<td  style="border:none"><img  style="width:70px;" src="<?= base_url();?>/assets_new/img/general-report/<?=$rowImg->folder?>"  /></td>

<?php
}
echo "
</tr>
</table>";

}?>

<!--<div id="absolute-element-footer2">-->
<table class="r-b" style="border:none;">
<tr>
<td style="text-align:center">
<br>
<?php

$firma_doc="$rowp->inserted_by-1.png";
$signature="assets/update/$firma_doc";
if(file_exists($signature)) {
    ?><img src="<?=base_url()?>/assets/update/<?=$firma_doc?>"style="width:300px;margin:-20px"><?php
}

?><br><br>
<?php $doneDate=date("d-m-Y H:i:s",
strtotime($rowp->inserted_time));
?>
<div style="font-size:11px;border-top:1px solid #dcdcdc">
<strong>Firma autorizada y sello del medico</strong></div>
</td>
<td><?=$sellodoc?></td>
</tr>

</table>
<!--</div>-->
</body>

<?php $mpdf->setFooter("<span style='font-size:7px'>Dr $author, Exeq. $exequatur, $especialidad, céd. $doc_cedula, $doc_email</span>");?>