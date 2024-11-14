<?php
if ($data_eva_cardio ==0) {
$rx_torax_radio='';
$rx_torax_txt='';
$ekg_radio_radio='';
$ekg_radio_txt='';
$otros_hallazgo_radio='';
$otros_hallazgo_txt='';
$especifique='';
$evcconclusion='';
$asa='';
$idexrst=0;

}else{
	foreach ($query_ex_rst as $row)
$rx_torax_radio=$row->rx_torax_radio;
$rx_torax_txt=$row->rx_torax_txt;
$ekg_radio_radio=$row->ekg_radio_radio;
$ekg_radio_txt=$row->ekg_radio_txt;
$otros_hallazgo_radio=$row->otros_hallazgo_radio;
$otros_hallazgo_txt=$row->otros_hallazgo_txt;
$especifique=$row->especifique;
$evcconclusion=$row->conclusion;
$asa=$row->asa;
$idexrst=$row->id;

}
?>

<div class="row">
<div class="col-lg-12" >
<hr>
  <div class="table-responsive">
<table class="table table-stripped" >
<tr>
<td style='border:none;'><strong>RX de Torax</strong></td>
<td style='border:none;'>
Normal
 <div class="form-check form-check-inline">
 <?php
if ($rx_torax_radio == "si") {
$checked = "checked";
} else {
$checked = "";
} ?>

  <input class="form-check-input" type="radio" id="<?=$data_eva_cardio ?>_rx_torax_radio1" name="<?=$data_eva_cardio ?>_rx_torax_radio" value="si" <?=$checked?>>
  <label class="form-check-label" for="<?=$data_eva_cardio ?>_rx_torax_radio1">Si</label>
</div>
<div class="form-check form-check-inline">
<?php
if ($rx_torax_radio == "no") {
$checked = "checked";
} else {
$checked = "";
} ?>

  <input class="form-check-input" type="radio" id="<?=$data_eva_cardio ?>_rx_torax_radio2" name='<?=$data_eva_cardio ?>_rx_torax_radio' value="no" <?=$checked?>>
  <label class="form-check-label" for="<?=$data_eva_cardio ?>_rx_torax_radio2">No</label>
</div>
</td>
</tr>
<tr>
<td style=''>

</td>
<td>
Anormalidad
<textarea class="form-control txt-area-rstcardio" style="width:550px" id='<?=$data_eva_cardio ?>_rx_torax_txt'><?=$rx_torax_txt?></textarea>
</td>
</tr>



<tr>
<td style='border:none;'><strong>EKG</strong></td>
<td style="border:none">
Normal
 <div class="form-check form-check-inline">
 <?php
if ($ekg_radio_radio == "si") {
$checked = "checked";
} else {
$checked = "";
} ?>
  <input class="form-check-input" type="radio" id="<?=$data_eva_cardio ?>_ekg_radio_radio1" name='<?=$data_eva_cardio ?>_ekg_radio_radio' value="si" <?=$checked?> >
  <label class="form-check-label" for="<?=$data_eva_cardio ?>_ekg_radio_radio1">Si</label>
</div>
<div class="form-check form-check-inline">
 <?php
if ($ekg_radio_radio == "no") {
$checked = "checked";
} else {
$checked = "";
} ?>
  <input class="form-check-input" type="radio" id="<?=$data_eva_cardio ?>_ekg_radio_radio2" name='<?=$data_eva_cardio ?>_ekg_radio_radio' value="no" <?=$checked?> >
  <label class="form-check-label" for="<?=$data_eva_cardio ?>_ekg_radio_radio2">No</label>
</div>
</td>
</tr>
<tr>
<td style=''>

</td>
<td>
Anormalidad
<textarea class="form-control txt-area-rstcardio" id='<?=$data_eva_cardio ?>_ekg_radio_txt' style="width:550px" ><?=$ekg_radio_txt?></textarea>
</td>
</tr>


<tr>
<td style='border:none;'><strong>Otros hallazgos de interés</strong></td>
<td style="border:none">
Normal 
<div class="form-check form-check-inline">
 <?php
if ($otros_hallazgo_radio == "si") {
$checked = "checked";
} else {
$checked = "";
} ?>
  <input class="form-check-input" type="radio" id="otros_hallazgo_radio1" name='<?=$data_eva_cardio ?>_otros_hallazgo_radio' value="si" <?=$checked?>>
  <label class="form-check-label" for="otros_hallazgo_radio1">Si</label>
</div>
<div class="form-check form-check-inline">
 <?php
if ($otros_hallazgo_radio == "no") {
$checked = "checked";
} else {
$checked = "";
} ?>
  <input class="form-check-input" type="radio" id="otros_hallazgo_radio2"  name='<?=$data_eva_cardio ?>_otros_hallazgo_radio' value="no" <?=$checked?>>
  <label class="form-check-label" for="otros_hallazgo_radio2">No</label>
</div>
</td>
</tr>
<tr>
<td style=''>

</td>
<td>
Anormalidad
<textarea class="form-control txt-area-rstcardio" id='<?=$data_eva_cardio ?>_otros_hallazgo_txt' style="width:550px" ><?=$otros_hallazgo_txt?></textarea>
</td>
</tr>

<tr>
<td style=''>
<strong>Especifique</strong>
</td>
<td>
<textarea class="form-control txt-area-rstcardio" id='<?=$data_eva_cardio ?>_especifique' style="width:550px" ><?=$especifique?></textarea>
</td>
</tr>

<tr>
<td style=''>
<strong>Conclusiones</strong>
</td>
<td>
<textarea class="form-control txt-area-rstcardio" id='<?=$data_eva_cardio ?>_evcconclusion' style="width:550px" ><?=$evcconclusion?></textarea>
</td>
</tr>

<tr>
<td style=''>
<strong>ASA</strong>
</td>
<td>
<textarea class="form-control txt-area-rstcardio" id='<?=$data_eva_cardio ?>_asa' style="width:550px" ><?=$asa?></textarea>
</td>
</tr>
</table>
</div>
<?php if ($data_eva_cardio > 0) { ?>

<div class="float-end">
<br />

<button type="button" class="btn btn-success" id="saveEditExamRstCrdv"  >Guardar </button>
<span id="alert_placeholder_exam_rstcv" style="position:absolute; " class="p-2"></span>
</div>
<?php } ?>
</div>
</div>



