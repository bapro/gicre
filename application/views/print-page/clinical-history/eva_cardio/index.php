<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px;border-color:white}

  td { border:none;padding: 1em; border-bottom:1px solid #E6E6E6;}

  .td-head { border-left: none; border-left: none;border-color:white}

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
<body>

<div id="wrapper">

<?php

foreach ($query_ant_p_f->result() as $rowht)
$iam_text=$rowht->iam_text; 
	$insuf_card_text=$rowht->insuf_card_text;
$epoc_nin=$rowht->epoc_nin;
$epoc_pe=$rowht->epoc_pe;
$epoc_p=$rowht->epoc_p;
$angina_pecho_card_text=$rowht->angina_pecho_card_text;;
$epoc_m=$rowht->epoc_m;
$epoc_h=$rowht->epoc_h;
$hta_nin=$rowht->hta_nin;
$hta_pe=$rowht->hta_pe;
$hta_p=$rowht->hta_p;
$hta_h=$rowht->hta_h;
$iam_nin=$rowht->iam_nin;
$iam_pe=$rowht->iam_pe;
$iam_p=$rowht->iam_p;
$iam_m=$rowht->iam_m;
$iam_h=$rowht->iam_h;
$hta_m=	$rowht->hta_m; 
$epoc_text=$rowht->epoc_text; 
$hta_text=$rowht->hta_text; 
$ant_quirurgico=$rowht->ant_quirurgico;
$angina_pecho_card_nin=$rowht->angina_pecho_card_nin;
$angina_pecho_card_pe =$rowht->angina_pecho_card_pe;
$angina_pecho_card_p =$rowht->angina_pecho_card_p;
$angina_pecho_card_m =$rowht->angina_pecho_card_m;
$angina_pecho_card_h =$rowht->angina_pecho_card_h;
$hep_tipo=$rowht->hep_tipo;
$ant_al_radio=$rowht->ant_al_radio;
$ant_med=$rowht->ant_med;
$ant_especifique=$rowht->ant_especifique;

$insuf_card_nin=$rowht->insuf_card_nin;
 $insuf_card_pe=$rowht->insuf_card_pe;
 $insuf_card_p=$rowht->insuf_card_p;
 $insuf_card_m=$rowht->insuf_card_m;
 $insuf_card_h=$rowht->insuf_card_h;
	 
	$car_nin= $rowht->car_nin;
	$car_m= $rowht->car_m; 
	$car_p= $rowht->car_p;
	
	$enre_text=$rowht->enre_text;
	$enre_h=$rowht->enre_h;
	$enre_m=$rowht->enre_m ;
	$enre_p=$rowht->enre_p;
	$enre_pe=$rowht->enre_pe;
	
	$tub_pe=$rowht->tub_pe;
	$tub_p=$rowht->tub_p;
	$tub_m=$rowht->tub_m;
	$tub_h=$rowht->tub_h; 
	$tub_text=$rowht->tub_text;
	$hep_h=$rowht->hep_h;
	$hep_m=$rowht->hep_m;
	$hep_p=$rowht->hep_p;
	
	$car_h= $rowht->car_h;
	$car_pe= $rowht->car_pe; 
	$car_text= $rowht->car_text;
	$dia_nin= $rowht->dia_nin;
		$todo= $rowht->todo;
	$hip_nin= $rowht->hip_nin; 
	$hip_m= $rowht->hip_m;
	$tir_text= $rowht->tir_text;
		$hip_p= $rowht->hip_p;
	$hip_h= $rowht->hip_h; 
	$hip_pe= $rowht->hip_pe;
	
		$hip_text= $rowht->hip_text;
	$ec_nin= $rowht->ec_nin; 
	$ec_m= $rowht->ec_m;
	$dia_text= $rowht->dia_text;
		$ec_p= $rowht->ec_p;
	$ec_h= $rowht->ec_h; 
	$ec_pe= $rowht->ec_pe;
	$ec_text= $rowht->ec_text;
	
		$ep_nin= $rowht->ep_nin;
	$ep_m= $rowht->ep_m; 
	$ep_p= $rowht->ep_p;
	$ep_h= $rowht->ep_h;
	 $tir_nin= $rowht->tir_nin;
	
	$hep_pe= $rowht->hep_pe;
	$hep_text= $rowht->hep_text; 
	$enfr_nin= $rowht->enfr_nin;
	$enfr_m= $rowht->enfr_m;
	
		$enfr_p= $rowht->enfr_p;
	$enfr_h= $rowht->enfr_h; 
	$enfr_pe= $rowht->enfr_pe;
	$enfr_text= $rowht->enfr_text;
	
		$falc_nin= $rowht->falc_nin;
	$falc_m= $rowht->falc_m; 
	$falc_p= $rowht->falc_p;
	$falc_h= $rowht->falc_h;
	$ep_pe= $rowht->ep_pe;
		$falc_pe= $rowht->falc_pe;
	$falc_text= $rowht->falc_text; 
	$neop_nin= $rowht->neop_nin;
	$neop_m= $rowht->neop_m;
	 $dia_pe= $rowht->dia_pe;
	$dia_p= $rowht->dia_p;
	$as_h= $rowht->as_h;
		$neop_p= $rowht->neop_p;
	$neop_h= $rowht->neop_h; 
	$neop_pe= $rowht->neop_pe;
	$neop_text= $rowht->neop_text;
	$as_m= $rowht->as_m;
	$psi_nin= $rowht->psi_nin;
	$psi_m= $rowht->psi_m; 
	$psi_p= $rowht->psi_p;
	$psi_h= $rowht->psi_h;
	$as_text= $rowht->as_text;
	$tir_h= $rowht->tir_h;
		$psi_pe= $rowht->psi_pe;
	$psi_text= $rowht->psi_text; 
	$obs_nin= $rowht->obs_nin;
	$obs_m= $rowht->obs_m;
	$tir_p= $rowht->tir_p;
	$tir_m= $rowht->tir_m;
		$obs_p= $rowht->obs_p;
	$obs_h= $rowht->obs_h; 
	$obs_pe= $rowht->obs_pe;
	$obs_text= $rowht->obs_text;
	$enre_nin= $rowht->enre_nin;
	$as_pe= $rowht->as_pe;
	$as_p= $rowht->as_p;
		$ulp_nin= $rowht->ulp_nin;
	$ulp_m= $rowht->ulp_m; 
	$ulp_p= $rowht->ulp_p;
	$ulp_h= $rowht->ulp_h;
	$tir_pe= $rowht->tir_pe;
		$ulp_pe= $rowht->ulp_pe;
	$ulp_text= $rowht->ulp_text; 
	$art_nin= $rowht->art_nin;
	$art_m= $rowht->art_m;
	  $dia_m= $rowht->dia_m;
	$dia_h= $rowht->dia_h;
		$art_p= $rowht->art_p;
	$art_h= $rowht->art_h; 
	$art_pe= $rowht->art_pe;
	$art_text= $rowht->art_text;
	$tub_nin= $rowht->tub_nin;
		$hem_nin= $rowht->hem_nin;
	$hem_m= $rowht->hem_m; 
	$hem_p= $rowht->hem_p;
	$hem_h= $rowht->hem_h;
	$as_nin= $rowht->as_nin;
		$hem_pe= $rowht->hem_pe;
	$hem_text= $rowht->hem_text; 
	$zika_nin= $rowht->zika_nin;
	$ep_text= $rowht->ep_text;
	$hep_nin= $rowht->hep_nin;
		$zika_m= $rowht->zika_m;
	$zika_p= $rowht->zika_p; 
	$zika_h= $rowht->zika_h;
	$zika_pe= $rowht->zika_pe;
	$zika_text= $rowht->zika_text;
	$otros_antpf= $rowht->otros;
	$hep_tipo= $rowht->hep_tipo;
	$in_by = $rowht->inserted_by;
	$up_by = $this->session->userdata('user_id');
	$in_time = $rowht->inserted_time;
	$up_time = date("Y-m-d H:i:s");
	
	$neum_nin= $rowht->neum_nin;
	$neum_pe= $rowht->neum_pe;
	$neum_p= $rowht->neum_p;
	$neum_m= $rowht->neum_m;
	$num_text= $rowht->num_text;
	 $ant_pan_tera= $rowht->ant_pan_tera;
	$neum_h= $rowht->neum_h;
$ant_diagnosticos=$rowht->ant_diagnosticos;
?>

<table>

<tr>
<td>
<strong>Diagnósticos:</strong> <?= $ant_diagnosticos ?>
</td>
</tr>

<tr>
<td>
<strong>Plan terapéutico o intervención propuesta:</strong> <?= $ant_pan_tera ?>
</td>
</tr>
</table>
<hr>
	<strong>ANTECEDENTES PERSONALES</strong>	
 <table class="table table-striped table-sm" style="width:100%">
                    <thead>
                    <tr>
                    <th class="col-xs-7"></th>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-1">Personal</th>
                    <th class="col-xs-1">Padre</th>
                    <th class="col-xs-1">Madre</th>
                    <th class="col-xs-1">Hermanos</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>


                   <tr>
                    <td>Asma bronquial</td>
                    <td>
					 <?php
					if ($as_nin ==0){
					$selected="";
					$disabled_as="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_as="disabled";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_nin"  <?=$any?> <?=$selected?> class="_emp_checkbox form-check-input _niguno_checked5" > Ninguno
					</td>
                    <td style="text-align:center">
						<?php if ($as_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_pe" <?=$checked?>  <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input _check_pers5">
					</td>
                    <td style="text-align:center">
						<?php if ($as_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_p" <?=$checked?> <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input _check_padre5">
					</td>
                    <td style="text-align:center">
						<?php if ($as_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_m" <?=$checked?> <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input _check_madre5">
					</td>
                    <td style="text-align:center">
					<?php if ($as_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_h" <?=$checked?>  <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input _check_hnos5">
					</td>
                    <td>
					<?=$as_text?>
					</td>
                    </tr>
					
					
					<tr>
                    <td>Tuberculosis</td>
                    <td>
					<?php
					if ($tub_nin ==0){
					$selected="";
					$disabled_tb="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_tb="disabled";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_nin" <?=$selected?> <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked6" > Ninguno
					</td>
                    <td style="text-align:center">
					<?php if ($tub_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_pe" <?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_pers6">
					</td>
                    <td  style="text-align:center">
					<?php if ($tub_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_p" <?=$checked?> <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_padre6">
					</td>
                    <td style="text-align:center">
					<?php if ($tub_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_m"<?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_madre6">
					</td>
                    <td style="text-align:center">
					<?php if ($tub_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_h" <?=$checked?> <?=$disabled_tb?> class="check-all form-check-input _check_hnos6">
					</td>
                    <td><?=$tub_text?></td>
                    </tr>
					
					
					
					<tr>
                    <td>Neumonia</td>
                    <td>
					<?php
					if ($neum_nin ==0){
					$selected="";
					$disabled_tb="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_tb="disabled";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_nin" <?=$selected?> <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked6" > Ninguno
					</td>
                    <td style="text-align:center">
					<?php if ($neum_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_pe" <?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_pers6">
					</td>
                    <td  style="text-align:center">
					<?php if ($neum_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_p" <?=$checked?> <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_padre6">
					</td>
                    <td style="text-align:center">
					<?php if ($neum_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_m" <?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input _check_madre6">
					</td>
                    <td style="text-align:center">
					<?php if ($neum_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_h" <?=$checked?> <?=$disabled_tb?> class="check-all form-check-input _check_hnos6">
					</td>
                    <td><?=$tub_text?></td>
                    </tr>
					
					<tr>
			<td>EPOC</td>
			<td>
			 <?php
					if ($epoc_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_nin" <?=$selected?>  <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($epoc_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_pe" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($epoc_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_p" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_padre13">
			</td>
			<td style="text-align:center">
			<?php if ($epoc_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_m" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($epoc_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><?=$epoc_text?></td>
			</tr>


<tr>
			<td>HTA</td>
			<td>
			 <?php
					if ($hta_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_nin" <?=$selected?>  <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($hta_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_pe" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($hta_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_p" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_padre13">
			</td>
			<td style="text-align:center">
			<?php if ($hta_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_m" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($hta_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><?=$hta_text?></td>
			</tr>



<tr>
			<td>IAM</td>
			<td>
			 <?php
					if ($iam_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_nin" <?=$selected?>  <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($iam_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_pe" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($iam_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_p" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_padre13">
			</td>
			<td style="text-align:center">
			<?php  if ($iam_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_m" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($iam_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><?=$iam_text?></td>
			</tr>



<tr>
			<td>Insuficiencia cardiaca</td>
			<td>
			 <?php
					if ($insuf_card_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_nin" <?=$selected?>  <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($insuf_card_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_pe" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($insuf_card_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_p" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_padre13">
			</td>
			<td style="text-align:center">
			<?php if ($insuf_card_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_m" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($insuf_card_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><?=$insuf_card_text?></td>
			</tr>

<tr>
			<td>Angina de pecho</td>
			<td>
			 <?php
					if ($angina_pecho_card_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_nin" <?=$selected?>  <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($angina_pecho_card_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_pe" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($angina_pecho_card_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_p" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_padre13">
			</td>
			<td style="text-align:center">
			<?php if ($angina_pecho_card_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_m" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($angina_pecho_card_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><?=$angina_pecho_card_text?></td>
			</tr>
			
			<tr>
			<td>Enfermedades renales</td>
			<td>
			 <?php
					if ($enfr_nin ==0){
					$selected="";
					$disabled_er="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_er="disabled";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_nin"  <?=$any?> <?=$selected?>  class="_emp_checkbox form-check-input _niguno_checked10" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($enfr_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_pe" <?=$checked?>  <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input _check_pers10">
			</td>
			<td style="text-align:center">
			<?php if ($enfr_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_p" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input _check_padre10">
			</td>
			<td style="text-align:center">
			<?php if ($enfr_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_m" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input _check_madre10">
			</td>
			<td style="text-align:center">
			<?php if ($enfr_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_h" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input _check_hnos10">
			</td>
			<td><?=$enfr_text?></td>
			</tr>	
			 <tr>
                                       <td>Hepatitis (Tipo)&nbsp;<input style="width:50px" type="text" id="_<?=$data_eva_cardio?>_hep_tipo" value="<?=$hep_tipo?>" class="text-marquo"></td>
                                       <td>
									    <?php
									if ($hep_nin ==0){
									$selected="";
									$disabled_hp="";
									}
									else
									{
									$selected="checked='checked'";
									$disabled_hp="disabled";
									}
									?>
									   <input type="checkbox" name="_<?=$data_eva_cardio?>_hep_nin" <?=$selected?> <?=$any?>  class="_emp_checkbox form-check-input _niguno_checked9" > Ninguno
									   </td>
                                       <td style="text-align:center">
										<?php if ($hep_pe ==0){
										$checked="";
										}
										else
										{
										$checked="checked='checked'";
										}
										?>
										<input type="checkbox" name="_<?=$data_eva_cardio?>_hep_pe" <?=$checked?> <?=$disabled_hp?>  <?=$disabled_all?> class="check-all form-check-input _check_pers9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($hep_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked='checked'";
										}
										?>
									   <input type="checkbox" name="_<?=$data_eva_cardio?>_hep_p" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input _check_padre9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($hep_m ==0){
										$checked="";
										}
										else
										{
										$checked="checked='checked'";
										}
										?>
									   <input type="checkbox" name="_<?=$data_eva_cardio?>_hep_m" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input _check_madre9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($hep_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked='checked'";
										}
										?>
									   <input type="checkbox" name="_<?=$data_eva_cardio?>_hep_h" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input _check_hnos9">
									   </td>
                                       <td><?=$hep_text?></td>
                                       </tr>
									   
									    <tr>
                    <td>Diabetes</td>
                    <td>
					 <?php
					if ($dia_nin ==0){
					$selected="";
					$disabled_dia="";
					}
					else
					{
					$selected="checked='checked'";
					$disabled_dia="disabled";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_nin"  <?=$any?> <?=$selected?> class="_emp_checkbox form-check-input _niguno_checked7" > Ninguno
					</td>
                    <td style="text-align:center">
					
					<?php if ($dia_pe ==0){ 
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_pe" <?=$checked?> <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input _check_pers7">
					</td>
                    <td style="text-align:center">
						<?php if ($dia_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_p" <?=$checked?>  <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input _check_padre7">
					</td>
                    <td style="text-align:center">
					<?php if ($dia_m ==0){ 
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_m" <?=$checked?> <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input _check_madre7">
					</td>
                    <td style="text-align:center">
					<?php if ($dia_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked='checked'";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_h"   <?=$checked?><?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input _check_hnos7">
					</td>
                    <td>
					<?=$dia_text?>
					</td>
                    </tr>
					
					</tbody>
                    </table>
				 <table>
				   <tr>
			<td><strong>Medicamentos:</strong></td>
			<td><?=$ant_med?></td>
			</tr>
			<tr>
		
		
			
			<tr>
			<td><strong>Alérgico:</strong></td>
			<td><?=$ant_especifique?></td>
			</tr>
			
			<tr>
			<td><strong>Quirúrgico:</strong></td>
			<td><?=$ant_quirurgico?></td>
			</tr>
			  </table>
			 
			 <table style="width:100%">
			 <tr>
			 <td>
		<strong>HABITOS TOXICOS</strong>	 
			  
<table style="width:100%">

 <?php 
  foreach ($query_toxic_habits->result() as $rowht)

    $cafe_cant = $rowht->cafe_cant;
  $cafe_cant_desc = $rowht->cafe_cant_desc;
  $cafe_frec = $rowht->cafe_frec;
  $pipa_cant = $rowht->pipa_cant;
  $pipa_cant_desc = $rowht->pipa_cant_desc;
  $pipa_frec = $rowht->pipa_frec;
  $ciga_can = $rowht->ciga_can;
  $ciga_can_desc = $rowht->ciga_can_desc;
  $ciga_frec = $rowht->ciga_frec;

  $alc_can = $rowht->alc_can;
  $alc_can_desc = $rowht->alc_can_desc;
  $alc_frec = $rowht->alc_frec;
  $tab_can = $rowht->tab_can;
  $tab_can_desc = $rowht->tab_can_desc;
  $tab_frec = $rowht->tab_frec;
  $hookah = $rowht->hookah;
  $hookah_desc = $rowht->hookah_desc;
  $hab_f_hookah = $rowht->hab_f_hookah;
  $hab_c_drug_desc = $rowht->hab_c_drug_desc;
  $hab_c_drug = $rowht->hab_c_drug;
  $hab_f_drug = $rowht->hab_f_drug;
  $id_ht = $rowht->id;
  $hab_t_drug = $rowht->hab_t_drug;
	?>
		
 
      <tr>
        
        <td><strong>Café:</strong> <?= $cafe_cant ?> <?= $cafe_cant_desc ?> <?= $cafe_frec ?></td>
      
        <td><strong>Tabaquismo:</strong> <?= $tab_can ?> <?= $tab_can_desc ?> <?= $tab_frec ?></td>
        
      
      </tr>
     
      <tr>
       
        <td><strong>Hookah:</strong> <?= $hookah ?> <?= $hookah_desc ?> <?= $hab_f_hookah ?></td>
        
        <td><strong>Alcohol:</strong> <?= $alc_can ?> <?= $alc_can_desc ?> <?= $alc_frec ?></td>
       
      </tr>
    </table>
    <table style="width:100%">
      
      <tr>
        <th></th>
        <td> <strong>Droga:</strong> <?= $hab_t_drug ?> <?= $hab_c_drug ?> <?= $hab_c_drug_desc ?></td>
        <td>
          
         

        </td>
       
      </tr>

</table>
			 </td>
			 <td>
<strong>SIGNOS VITALES</strong>
<table >

<tr>

<td colspan="2"><strong>Tension arterial:</strong><br/><?=$signos['ta'];?> mm / <?=$signos['hg'];?> hg</td>

</tr>

<tr>


<td><strong>Frequencia respiratoria:</strong><?=$signos['fr'];?></td>
<td colspan="2"><strong>Tempo.:</strong><?=$signos['tempo'];?> &#8451 </td>

</tr>


<tr>

<td><strong>Frequencia cardiaca:</strong><?=$signos['fc'];?></td>
<td colspan="2"><strong>Pulso.:</strong><?=$signos['pulso'];?> PM </td>

</tr>
</table>
</td>
</tr>
</table>
<hr>
<?php
  foreach ($query_ex_fis as $rowExF)
   $neuro_s = $rowExF->neuro_s;
    $neuro_text = $rowExF->neuro_text;
    $cabeza = $rowExF->cabeza;
    $cabeza_text = $rowExF->cabeza_text;
    $cuello = $rowExF->cuello;
    $cuello_text = $rowExF->cuello_text;
    $abd_insp = $rowExF->abd_insp;
    $ext_sup = $rowExF->ext_sup;
    $ext_sup_text = $rowExF->ext_sup_text;
    $ext_inft = $rowExF->ext_inft;
    $ext_inf = $rowExF->ext_inf;
    $torax_text = $rowExF->torax_text;
    $torax = $rowExF->torax;
    $abd_inspext = $rowExF->abd_inspext;
	 $neuro_normal=$rowExF->neuro_normal;
 $cabeza_normal=$rowExF->cabeza_normal;	
 $cuello_normal=$rowExF->cuello_normal;
$abd_inspex_normal=$rowExF->abd_inspex_normal;
$ext_sup_normal=$rowExF->ext_sup_normal;
$ext_infex_normal=$rowExF->ext_infex_normal;
$toraxex_normal=$rowExF->toraxex_normal;
?>
<strong>EXAMEN FISICO</strong>
<table>

<tr>
<td>
<?php if ($neuro_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
	<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_neuro_normal" <?=$checked?> /> Normal<br>
<strong>Neurológico:</strong> <?= $neuro_text ?>
</td>
</tr>

<tr>
<td><?php
if ($cabeza_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_cabeza_normal" <?=$checked?> /> Normal<br><strong>Cabeza:</strong>  <?= $cabeza_text?></td>
</tr>

<tr>
<td><?php
if ($cuello_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_cuello_normal" <?=$checked?> /> Normal<br><strong>Cuello:</strong>  <?= $cuello_text ?></td>
</tr>

<tr>
<td>  <?php
if ($abd_inspex_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_abd_inspex_normal" <?=$checked?> /> Normal<br><strong>Abdomen Inspección: Forma:</strong>  <?= $abd_inspext ?></td>
</tr>

<tr>
<td>

 <?php
if ($ext_sup_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_ext_sup_normal" <?=$checked?> /> Normal<br>
<strong>Extremidades superiores:</strong>  <?= $ext_sup_text ?></td>
</tr>

<tr>
<td>
<?php
if ($ext_infex_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_ext_infex_normal" <?=$checked?> /> Normal<br>

<strong>Extremidades Inferiores:</strong>  <?= $ext_inft ?></td>
</tr>


<tr>
<td>
<?php
if ($toraxex_normal == 0) {
$checked = "";
} else {
$checked = "checked='checked'";
}
?>
<input type="checkbox"   <?=$checked ?> class="ms-2" name="_<?= $id_exam_fis?>_toraxex_normal" <?=$checked?> /> Normal<br>
<strong>Torax: Corazón y pulmones:</strong> 

<?php 
 echo $torax_text ;

 ?>
 </td>
</tr>
</table>
<?php
	foreach ($query_ex_rst as $row)
$rx_torax_radio=$row->rx_torax_radio;
$rx_torax_txt=$row->rx_torax_txt;
$ekg_radio_radio=$row->ekg_radio_radio;
$ekg_radio_txt=$row->ekg_radio_txt;
$otros_hallazgo_radio=$row->otros_hallazgo_radio;
$otros_hallazgo_txt=$row->otros_hallazgo_txt;
$especifique=$row->especifique;
$evcconclusion=$row->conclusion;
$asa=$row->asa;?>
<hr>
<strong>RESULTADOS DE EXMENENS</strong>
   <table>

<tr>
<td>
 <?php
if ($rx_torax_radio == "no") {
$checkedn = "checked='checked'";
} else {
$checkedn = "";
}

if ($rx_torax_radio == "si") {
$checkeds = "checked='checked'";
} else {
$checkeds = "";
} 

 ?>
<strong>RX de Torax:</strong> Normal 
Si <input class="form-check-input" type="radio" value="si" <?=$checkeds?>>
No  <input class="form-check-input" type="radio"  value="no" <?=$checkedn?>>
<br>
<strong>Anormalidad:</strong> <?=$rx_torax_txt?>
</td>

</tr>

<tr>
<td>
 <?php
if ($ekg_radio_radio == "no") {
$checkedn = "checked='checked'";
} else {
$checkedn = "";
}

if ($ekg_radio_radio == "si") {
$checkeds = "checked='checked'";
} else {
$checkeds = "";
} 

 ?>
<strong>EKG:</strong> Normal 
Si <input class="form-check-input" type="radio" value="si" <?=$checkeds?>>
No  <input class="form-check-input" type="radio"  value="no" <?=$checkedn?>>
<br>
<strong>Anormalidad:</strong> <?=$ekg_radio_txt?>
</td>

</tr>

<tr>
<td>
 <?php
if ($otros_hallazgo_radio == "no") {
$checkedn = "checked='checked'";
} else {
$checkedn = "";
}

if ($otros_hallazgo_radio == "si") {
$checkeds = "checked='checked'";
} else {
$checkeds = "";
} 

 ?>
<strong>Otros hallazgos de interés:</strong> Normal 
Si <input class="form-check-input" type="radio" value="si" <?=$checkeds?>>
No  <input class="form-check-input" type="radio"  value="no" <?=$checkedn?>>
<br>
<strong>Anormalidad:</strong> <?=$otros_hallazgo_txt?>
</td>

</tr>

<tr>
<td>

<strong>Especifique:</strong> <?=$especifique?>
</td>

</tr>

<tr>
<td>

<strong>Conclusiones:</strong> <?=$evcconclusion?>
</td>

</tr>

<tr>
<td>

<strong>ASA:</strong> <?=$asa?>
</td>

</tr>
</table>   




<table class='r-b' align="center"  >
<tr>
<td style="text-align:center;border-bottom:1px solid #E6E6E6">
<?php 
$firma_doc="$id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<span style="font-size:7px" ><strong>Firma autorizada y sello del medico:</strong></span>
</td>

</tr>
<tr>
<td> <?php
$done_date=date("d-m-Y H:i:s", strtotime($insert_time));
echo "<span style='font-size:10px'>Dr $author, Exeq. $exequatur, $area<br/><br/><span style='color:red'>Fecha de creación $done_date</span></span>";
?></td>
</tr>
</table>




   
             
</body>
</html>
