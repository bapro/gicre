<?php 

if($data_eva_cardio > 0){
	 foreach($query_ant_p_f->result() as $rowht)
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
 }else{
$ant_pan_tera= '';	 
$neum_nin= '';
	$neum_pe='';
	$neum_p= '';
	$neum_m= '';
	$num_text= '';	 
	 $neum_h= '';
	 $hep_tipo='';
$up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");
$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id'); 
$hta_text=''; 
$iam_text='';
$insuf_card_text='';
$angina_pecho_card_text='';
$epoc_nin="";
$epoc_pe="";
$epoc_p="";
$epoc_m="";
$epoc_h="";
$hta_nin="";
$hta_pe="";
$hta_p="";
$hta_h="";
$iam_nin="";
$iam_pe="";
$iam_p="";
$iam_m="";
$iam_h="";
$hta_m ="";
$epoc_text="";
$angina_pecho_card_nin="";
$angina_pecho_card_pe ="";
$angina_pecho_card_p ="";
$angina_pecho_card_m ="";
$angina_pecho_card_h ="";

$insuf_card_nin="";
 $insuf_card_pe="";
 $insuf_card_p="";
 $insuf_card_m="";
 $insuf_card_h="";

$ant_al_radio='';
$ant_med='';
$ant_especifique='';
$ant_quirurgico='';
	 
$dia_nin= "";
$hep_tipo= "";
	$car_nin= "";
	$car_m= "";
	$car_p= "";
	 $tir_nin= "";
	$car_h= "";
	$car_pe= "";
	$car_text= "";
	$as_nin= "";
		$todo= "";
	$hip_nin= "";
	$hip_m= "";
	$hep_nin= "";
		$hip_p= "";
	$hip_h= "";
	$hip_pe= "";
	$tub_nin= "";
		$hip_text= "";
	$ec_nin= "";
	$ec_m="";
	$dia_text="";
		$ec_p= "";
	$ec_h= ""; 
	$ec_pe= "";
	$ec_text= "";
	$tir_p= "";
		$ep_nin= "";
	$ep_m= ""; 
	$ep_p= "";
	$ep_h= "";
		 $dia_pe= "";
	$dia_p= "";
	  $dia_m= "";
	$dia_h= "";
		$hep_pe= "";
	$hep_text= ""; 
	$enfr_nin= "";
	$enfr_m= "";
	$tir_m= "";
		$enfr_p= "";
	$enfr_h= ""; 
	$enfr_pe= "";
	$enfr_text= "";
	$as_text= "";
		$falc_nin="";
	$falc_m= "";
	$falc_p="";
	$falc_h= "";
	$as_pe= "";
		$falc_pe="";
	$falc_text= ""; 
	$neop_nin= "";
	$neop_m= "";
	$tir_pe= "";
	$as_h= "";
		$neop_p= "";
	$neop_h= ""; 
	$neop_pe="";
	$neop_text= "";
	$as_p= "";
	$psi_nin="";
	$psi_m= ""; 
	$psi_p= "";
	$psi_h= "";
	$tir_h= "";
	$tir_text= "";
		$psi_pe="";
	$psi_text= "";
	$obs_nin="";
	$obs_m= "";
	$enre_nin= "";
	$as_m= "";
		$obs_p= "";
	$obs_h= "";
	$obs_pe= "";
	$obs_text="";
	$enre_text="";
	$enre_h="";
	$enre_m="";
	$enre_p="";
	$enre_pe="";
	$ep_pe= "";
		$ulp_nin= "";
	$ulp_m= "";
	$ulp_p= "";
	$ulp_h= "";
	$ep_text= "";
		$ulp_pe= "";
	$ulp_text= ""; 
	$art_nin= "";
	$art_m= "";
		$hep_h="";
	$hep_m="";
	$hep_p="";
		$art_p= "";
	$art_h= ""; 
	$art_pe= "";
	$art_text= "";
	$tub_text= "";
	$tub_h= "";
		$hem_nin= "";
	$hem_m= ""; 
	$hem_p= "";
	$hem_h= "";
	$tub_pe="";
	$tub_p="";
	$tub_m="";
		$hem_pe= "";
	$hem_text= ""; 
	$zika_nin= "";

		$zika_m= "";
	$zika_p= ""; 
	$zika_h= "";
	$zika_pe= "";
	$zika_text= "";
	$otros_antpf= "";
    $ant_pan_tera='';
	$ant_diagnosticos='';

 }
 if($todo==1){
	 $any='checked';
	 $disabled_all='disabled';
 }else{
	 $any="";
	 $disabled_all='';
 }



	?>
	
	 <div class="row">
	 <div id="showError"></div>
	     <div class="mb-3">
			<label for="_<?=$data_eva_cardio?>_ant_diagnósticos" class="form-label">Diagnósticos</label>
			<textarea class="form-control" id="_<?=$data_eva_cardio?>_ant_diagnosticos" rows="3"><?=$ant_diagnosticos?></textarea>
			</div>     
           
	 	<div class="mb-3">
			<label for="_<?=$data_eva_cardio?>_ant_pan_tera" class="form-label">Plan terapéutico o intervención propuesta</label>
			<textarea class="form-control" id="_<?=$data_eva_cardio?>_ant_pan_tera" rows="3"><?=$ant_pan_tera?></textarea>
			</div>   
           
	 
 <div class="table-responsive">
       <div class="table-responsive">
        <table class="table table-striped table-sm" >
                    <thead>
                    <tr>
                    <th class="col-xs-7">Marque los hallazgos</th>
                    <th class="col-xs-1"><input type="checkbox" class="form-check-input unchecked_all _select_all" name="_<?=$data_eva_cardio?>_todo"  id="_select_all" <?=$any?>>&nbsp;Todo <span class="rows_selected" id="_select_count"></span></th>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_as_h" <?=$checked?>  <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input _check_hnos5">
					</td>
                    <td>
					
					<input type="text" id="_<?=$data_eva_cardio?>_as_text" <?=$disabled_all?> <?=$disabled_as?> value="<?=$as_text?> " class="text-marquo form-control">
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_tub_h" <?=$checked?> <?=$disabled_tb?> class="check-all form-check-input _check_hnos6">
					</td>
                    <td><input type="text" id="_<?=$data_eva_cardio?>_tub_text" <?=$disabled_tb?> <?=$disabled_all?> value="<?=$tub_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_neum_h" <?=$checked?> <?=$disabled_tb?> class="check-all form-check-input _check_hnos6">
					</td>
                    <td><input type="text" id="_<?=$data_eva_cardio?>_neum_text" <?=$disabled_tb?> <?=$disabled_all?> value="<?=$tub_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_epoc_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_epoc_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$epoc_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_hta_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_hta_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$hta_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_iam_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_iam_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$iam_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_insuf_card_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_insuf_card_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$insuf_card_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_angina_pecho_card_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input _check_hnos13">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_angina_pecho_card_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$angina_pecho_card_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
			<input type="checkbox" name="_<?=$data_eva_cardio?>_enfr_h" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input _check_hnos10">
			</td>
			<td><input type="text" id="_<?=$data_eva_cardio?>_enfr_text" <?=$disabled_er?> <?=$disabled_all?>  class="text-marquo form-control" value="<?=$enfr_text?>"></td>
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
									$selected="checked";
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
										$checked="checked";
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
										$checked="checked";
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
										$checked="checked";
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
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="_<?=$data_eva_cardio?>_hep_h" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input _check_hnos9">
									   </td>
                                       <td><input type="text" id="_<?=$data_eva_cardio?>_hep_text" <?=$disabled_hp?>  <?=$disabled_all?> value="<?=$hep_text?>" class="text-marquo form-control"></td>
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
					$selected="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
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
					$checked="checked";
					}
					?>
					<input type="checkbox" name="_<?=$data_eva_cardio?>_dia_h"   <?=$checked?><?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input _check_hnos7">
					</td>
                    <td>
					
					<input type="text" id="_<?=$data_eva_cardio?>_dia_text" <?=$disabled_all?> <?=$disabled_dia?> class="text-marquo form-control" value="<?=$dia_text?>">
					</td>
                    </tr>
					
					</tbody>
                    </table>
                    
                  </div>
				  
			<div class="mb-3">
			<label for="_<?=$data_eva_cardio?>_ant_med" class="form-label">Medicamentos</label>
			<textarea class="form-control" id="_<?=$data_eva_cardio?>_ant_med" rows="3"><?=$ant_med?></textarea>
			</div>
			<div class="mb-3">
			<label>Alérgico</label>

			<div class="form-check form-check-inline">
				<?php
				if ($ant_al_radio == "si") {
				$checked = "checked";
				} else {
				$checked = "";
				} ?>
				 <input class="form-check-input" type="radio" id="<?=$data_eva_cardio?>_ant_al_radio1" name="<?=$data_eva_cardio?>_ant_al_radio" value="si" <?=$checked?>>
			
			<label class="form-check-label" for="<?=$data_eva_cardio?>_ant_al_radio1">Si</label>
			</div>
			<div class="form-check form-check-inline">
			<?php
				if ($ant_al_radio == "no") {
				$checked = "checked";
				} else {
				$checked = "";
				} ?>
		 <input class="form-check-input" type="radio" id="<?=$data_eva_cardio?>_ant_al_radio2" name="<?=$data_eva_cardio?>_ant_al_radio" value="si" <?=$checked?>>
			<label class="form-check-label" for="<?=$data_eva_cardio?>_ant_al_radio2">No</label>
			</div>
			</div>
			
			<div class="mb-3">
			<label for="_<?=$data_eva_cardio?>_ant_especifique" class="form-label">Especifique</label>
			<textarea class="form-control" id="_<?=$data_eva_cardio?>_ant_especifique" rows="3"><?=$ant_especifique?></textarea>
			</div>
			
			<div class="mb-3">
			<label for="_<?=$data_eva_cardio?>_ant_quirurgico" class="form-label">Quirúrgico</label>
			<textarea class="form-control" id="_<?=$data_eva_cardio?>_ant_quirurgico" rows="3"><?=$ant_quirurgico?></textarea>
			</div>
			
			
			
			
			</div> 
				  <div class="row">
				   <div class="col-lg-12">
				 
				
				        <?php if($data_eva_cardio > 0){?>
				<div class="float-end">
				<br/>
				
				<button type="button" class="btn btn-success" id="_saveEditAntGnrl">Guardar  </button><span id="_successAntPerFam" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php } ?>
				 </div> 
				 </div> 
				 