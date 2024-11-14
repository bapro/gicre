<?php 

 if($ant_p_f_data  ==1){
	 foreach($query_ant_p_f->result() as $rowht)
    $ant_p_f_data=1;
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
	
	
	$id   =$rowht->id;

 }else{
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
$ant_p_f_data=0;
	
		$zika_m= "";
	$zika_p= ""; 
	$zika_h= "";
	$zika_pe= "";
	$zika_text= "";
	$otros_antpf= "";

	$id   ="";

 }
 if($todo==1){
	 $any='checked';
	 $disabled_all='disabled';
 }else{
	 $any="";
	 $disabled_all='';
 }


 if($id !=""){
$params = array('table' => 'h_c_marque_positivo', 'id'=>$id);
echo $this->user_register_info->get_operation_info($params);
 }
	?>
	
	 <div class="row">
 <div class="table-responsive">
       <table class="table table-striped" >
                    <thead>
                    <tr>
                    <th class="col-xs-7">Marque los hallazgos</th>
                    <th class="col-xs-1"><input type="checkbox" class="form-check-input unchecked_all" name="<?=$ant_p_f_data?>_todo"  id="select_all" <?=$any?>>&nbsp;Todo <span class="rows_selected" id="select_count"></span></th>
                    <th class="col-xs-1">Personal</th>
                    <th class="col-xs-1">Padre</th>
                    <th class="col-xs-1">Madre</th>
                    <th class="col-xs-1">Hermanos</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
					 <tr>
                    <td>Hipertensión</td>
                    <td>
					 <?php
					if ($hip_nin ==0){
					$selected="";
					$disabled_hip="";
					}
					else
					{
					$selected="checked";
					$disabled_hip="disabled";
					}
					?>
					<input type="checkbox"  name="<?=$ant_p_f_data?>_hip_nin"  <?=$any?> <?=$selected?> class="emp_checkbox form-check-input niguno_checked2"> Ninguno
					</td>
                    <td style="text-align:center">
					
					<?php if ($hip_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>

					<input type="checkbox" name="<?=$ant_p_f_data?>_hip_pe" <?=$checked?> <?=$disabled_hip?> <?=$disabled_all?> class="check-all form-check-input check_pers2">
					</td>
                    <td style="text-align:center">
					<?php if ($hip_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_hip_p" <?=$checked?> <?=$disabled_hip?> <?=$disabled_all?> class="check-all form-check-input check_padre2">
					
					</td>
                    <td style="text-align:center">
					<?php if ($hip_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_hip_m" <?=$checked?> <?=$disabled_hip?> <?=$disabled_all?> class="check-all form-check-input check_madre2" >
					</td>
                    <td style="text-align:center">
					<?php if ($hip_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_hip_h" <?=$checked?> <?=$disabled_hip?> <?=$disabled_all?> class="check-all form-check-input check_hnos2">
					</td>
                    <td><input type="text" id="<?=$ant_p_f_data?>_hip_text" <?=$disabled_all?> <?=$disabled_hip?> value="<?=$hip_text?>" class="text-marquo form-control"></td>
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_dia_nin"  <?=$any?> <?=$selected?> class="emp_checkbox form-check-input niguno_checked7" > Ninguno
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
					
					<input type="checkbox" name="<?=$ant_p_f_data?>_dia_pe" <?=$checked?> <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input check_pers7">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_dia_p" <?=$checked?>  <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input check_padre7">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_dia_m" <?=$checked?> <?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input check_madre7">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_dia_h"   <?=$checked?><?=$disabled_dia?> <?=$disabled_all?> class="check-all form-check-input check_hnos7">
					</td>
                    <td>
					
					<input type="text" id="<?=$ant_p_f_data?>_dia_text" <?=$disabled_all?> <?=$disabled_dia?> class="text-marquo form-control" value="<?=$dia_text?>">
					</td>
                    </tr>
                    <tr>
                    
                    <td>
                    Cardiopatía
                    </td>
                    <td >
					 <?php
					if ($car_nin ==0){
					$selected="";
					$disabled_car="";
					}
					else
					{
					$selected="checked";
					$disabled_car="disabled";
					}
					?>
					<input type="checkbox"  name="<?=$ant_p_f_data?>_car_nin" <?=$selected?> <?=$any?> class="emp_checkbox form-check-input niguno_checked1"> Ninguno</label>
					</td>
                    <td style="text-align:center">
					<?php if ($car_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					
					<input type="checkbox"  name="<?=$ant_p_f_data?>_car_pe" <?=$checked?>  <?=$disabled_car?>  <?=$disabled_all?> class="check-all form-check-input check_pers">
					</td>
                    <td style="text-align:center">
					<?php if ($car_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" id="padre_checkbox" <?=$checked?>  name="<?=$ant_p_f_data?>_car_p" <?=$checked?> <?=$disabled_car?> <?=$disabled_all?> class="check-all form-check-input check_padre">
					
					</td>
                    <td style="text-align:center">
					<?php if ($car_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" id="madre_checkbox" <?=$checked?>  name="<?=$ant_p_f_data?>_car_m" <?=$checked?> <?=$disabled_car?> <?=$disabled_all?> class="check-all form-check-input check_madre" >
					
					</td>
                    <td style="text-align:center"><input type="checkbox" name="<?=$ant_p_f_data?>_car_h"  <?=$checked?>  <?=$disabled_car?> <?=$disabled_all?> class="check-all form-check-input check_hnos"></td>
                    <td><input type="text"  id="<?=$ant_p_f_data?>_car_text" <?=$disabled_all?> <?=$disabled_car?> class="text-marquo form-control" value="<?=$car_text?>"></td>
                    </tr>
                    
                   <tr>
                    <td>Tiroides</td>
                    <td>
					 <?php
					if ($car_nin ==0){
					$selected="";
					$disabled_tir="";
					}
					else
					{
					$selected="checked";
					$disabled_tir="disabled";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_tir_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked8" > Ninguno
					</td>
                    <td style="text-align:center">
					<?php if ($tir_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_tir_pe" <?=$checked?> <?=$disabled_tir?> <?=$disabled_all?> class="check-all form-check-input check_pers8">
					</td>
                    <td style="text-align:center">
					<?php if ($tir_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_tir_p" <?=$checked?> <?=$disabled_tir?>  <?=$disabled_all?> class="check-all form-check-input check_padre8">
					</td>
                    <td style="text-align:center">
					<?php if ($tir_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_tir_m" <?=$checked?>  <?=$disabled_tir?>  <?=$disabled_all?> class="check-all form-check-input check_madre8">
					</td>
                    <td style="text-align:center">
					<?php if ($tir_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_tir_h" <?=$disabled_tir?> <?=$checked?>  <?=$disabled_all?> class="check-all form-check-input check_hnos8">
					</td>
                    <td>
					
					<input type="text" id="<?=$ant_p_f_data?>_tir_text" <?=$disabled_all?> <?=$disabled_tir?>  value="<?=$tir_text?>" class="text-marquo form-control">
					</td>
                    </tr>
                     <tr>
                    <td>Asma Bronquial</td>
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_as_nin"  <?=$any?> <?=$selected?> class="emp_checkbox form-check-input niguno_checked5" > Ninguno
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
					
					<input type="checkbox" name="<?=$ant_p_f_data?>_as_pe" <?=$checked?>  <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input check_pers5">
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
					
					<input type="checkbox" name="<?=$ant_p_f_data?>_as_p" <?=$checked?> <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input check_padre5">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_as_m" <?=$checked?> <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input check_madre5">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_as_h" <?=$checked?>  <?=$disabled_as?> <?=$disabled_all?> class="check-all form-check-input check_hnos5">
					</td>
                    <td>
					
					<input type="text" id="<?=$ant_p_f_data?>_as_text" <?=$disabled_all?> <?=$disabled_as?> value="<?=$as_text?> " class="text-marquo form-control">
					</td>
                    </tr>
					 <tr>
                    <td>Enfermedad Repiratoria</td>
                    <td>
					 <?php
					if ($enre_nin ==0){
					$selected="";
					$disabled_er="";
					}
					else
					{
					$selected="checked";
					$disabled_er="disabled";
					}
					?>
					
					<input type="checkbox" name="<?=$ant_p_f_data?>_enre_nin"  <?=$any?> <?=$selected?> class="emp_checkbox form-check-input niguno_checked05" > Ninguno
					</td>
                    <td style="text-align:center">
					<?php if ($enre_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_enre_pe" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_pers05">
					</td>
                    <td style="text-align:center">
					<?php if ($enre_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_enre_p" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_padre05">
					</td>
                    <td style="text-align:center">
					<?php if ($enre_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_enre_m" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_madre05">
					</td>
                    <td style="text-align:center">
					<?php if ($enre_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_enre_h" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_hnos05">
					</td>
                    <td>
					<input type="text" id="<?=$ant_p_f_data?>_enre_text" <?=$disabled_all?> <?=$disabled_er?> class="text-marquo form-control" value="<?=$enre_text?>">
					</td>
                    </tr>
					
				<tr>
				<td>Obesidad</td>
				<td>
				 <?php
					if ($obs_nin ==0){
					$selected="";
					$disabled_ob="";
					}
					else
					{
					$selected="checked";
					$disabled_ob="disabled";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_obs_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked14" > Ninguno
				</td>
				<td style="text-align:center">
				<?php if ($obs_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_obs_pe" <?=$checked?> <?=$disabled_ob?>  <?=$disabled_all?> class="check-all form-check-input check_pers14">
				</td>
				<td style="text-align:center">
				<?php if ($obs_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_obs_p" <?=$checked?> <?=$disabled_ob?>  <?=$disabled_all?> class="check-all form-check-input check_padre14">
				</td>
				<td style="text-align:center">
				<?php if ($obs_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_obs_m" <?=$checked?> <?=$disabled_ob?> <?=$disabled_all?> class="check-all form-check-input check_madre14">
				</td>
				<td style="text-align:center">
				<?php if ($obs_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_obs_h" <?=$checked?>  <?=$disabled_ob?> <?=$disabled_all?> class="check-all form-check-input check_hnos14">
				</td>
				<td>
				<input type="text" id="<?=$ant_p_f_data?>_obs_text" <?=$disabled_all?>  <?=$disabled_ob?> class="text-marquo form-control" value="<?=$obs_text?>">
				</td>
				</tr>
					
					
				<tr>
				<td>Enfermedad de células falciformes</td>
				<td>
				 <?php
					if ($falc_nin ==0){
					$selected="";
					$disabled_ecf="";
					}
					else
					{
					$selected="checked";
					$disabled_ecf="disabled";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_falc_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked11" > Ninguno
				</td>
				<td style="text-align:center">
				<?php if ($falc_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_falc_pe" <?=$checked?>  <?=$disabled_ecf?> <?=$disabled_all?> class="check-all form-check-input check_pers11">
				</td>
				<td style="text-align:center">
				<?php if ($falc_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_falc_p" <?=$checked?>  <?=$disabled_ecf?>  <?=$disabled_all?> class="check-all form-check-input check_padre11">
				</td>
				<td style="text-align:center">
				<?php if ($falc_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_falc_m" <?=$checked?>  <?=$disabled_ecf?>  <?=$disabled_all?> class="check-all form-check-input check_madre11">
				</td>
				<td style="text-align:center">
				<?php if ($falc_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
				<input type="checkbox" name="<?=$ant_p_f_data?>_falc_h" <?=$checked?>  <?=$disabled_ecf?> <?=$disabled_all?> class="check-all form-check-input check_hnos11">
				</td>
				<td><input type="text" id="<?=$ant_p_f_data?>_falc_text" <?=$disabled_all?> <?=$disabled_ecf?>  class="text-marquo form-control" value="<?=$falc_text?>"></td>
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
			<input type="checkbox" name="<?=$ant_p_f_data?>_enfr_nin"  <?=$any?> <?=$selected?>  class="emp_checkbox form-check-input niguno_checked10" > Ninguno
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
			<input type="checkbox" name="<?=$ant_p_f_data?>_enfr_pe" <?=$checked?>  <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_pers10">
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
			<input type="checkbox" name="<?=$ant_p_f_data?>_enfr_p" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_padre10">
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
			<input type="checkbox" name="<?=$ant_p_f_data?>_enfr_m" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_madre10">
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
			<input type="checkbox" name="<?=$ant_p_f_data?>_enfr_h" <?=$checked?> <?=$disabled_er?> <?=$disabled_all?> class="check-all form-check-input check_hnos10">
			</td>
			<td><input type="text" id="<?=$ant_p_f_data?>_enfr_text" <?=$disabled_er?> <?=$disabled_all?>  class="text-marquo form-control" value="<?=$enfr_text?>"></td>
			</tr>	
			

			<tr>
			<td>Enfermedades psiquiatricas</td>
			<td>
			 <?php
					if ($psi_nin ==0){
					$selected="";
					$disabled_eps="";
					}
					else
					{
					$selected="checked";
					$disabled_eps="disabled";
					}
					?>
			<input type="checkbox" name="<?=$ant_p_f_data?>_psi_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked13" > Ninguno
			</td>
			<td style="text-align:center">
			<?php if ($psi_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
			<input type="checkbox" name="<?=$ant_p_f_data?>_psi_pe" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input check_pers13">
			</td>
			<td style="text-align:center">
			<?php if ($psi_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
			<input type="checkbox" name="<?=$ant_p_f_data?>_psi_p" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input check_padre13">
			</td>
			<td style="text-align:center">
			<?php if ($psi_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
			<input type="checkbox" name="<?=$ant_p_f_data?>_psi_m" <?=$checked?><?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input check_madre13">
			</td>
			<td style="text-align:center">
			<?php if ($psi_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
			<input type="checkbox" name="<?=$ant_p_f_data?>_psi_h" <?=$checked?> <?=$disabled_eps?> <?=$disabled_all?> class="check-all form-check-input check_hnos13">
			</td>
			<td><input type="text" id="<?=$ant_p_f_data?>_psi_text" <?=$disabled_eps?> <?=$disabled_all?> value="<?=$psi_text?>" class="text-marquo form-control"></td>
			</tr>
			
                   
                    
                    
                    </tbody>
                    </table>
                    <div class="accordion accordion-flush" id="masAntGnrl">
	  
                      <div class="accordion-item">
                                       <h2 class="accordion-header" id="flush-masAntGnrl">
                                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwoFis" aria-expanded="false" aria-controls="flush-collapseTwoFis">
                                          <i class="bi bi-arrow-down"></i> <strong><em>ver mas antecedentes</em></strong> 
                               
                                         </button>
                                       </h2>
                                       <div id="flush-collapseTwoFis" class="accordion-collapse collapse" aria-labelledby="flush-masAntGnrl" data-bs-parent="#masAntGnrl">
                                         <table class="table table-striped" >
                                         <thead>
                    <tr>
                    <th class="col-xs-7">Marque los hallazgos</th>
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
                                       <td>Hepatitis (Tipo)&nbsp;<input style="width:50px" type="text" id="<?=$ant_p_f_data?>_hep_tipo" value="<?=$hep_tipo?>" class="text-marquo"></td>
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
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hep_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked9" > Ninguno
									   </td>
                                       <td style="text-align:center">
										<?php if ($psi_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
										<input type="checkbox" name="<?=$ant_p_f_data?>_hep_pe" <?=$checked?> <?=$disabled_hp?>  <?=$disabled_all?> class="check-all form-check-input check_pers9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($psi_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hep_p" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input check_padre9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($psi_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hep_m" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input check_madre9">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($psi_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hep_h" <?=$checked?> <?=$disabled_hp?> <?=$disabled_all?> class="check-all form-check-input check_hnos9">
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_hep_text" <?=$disabled_hp?>  <?=$disabled_all?> value="<?=$hep_text?>" class="text-marquo form-control"></td>
                                       </tr>
                                      
                                       
                                     
                                       
                                       <tr>
                                       <td>Neoplasias</td>
                                       <td>
									  <?php
									if ($neop_nin ==0){
									$selected="";
									$disabled_neo="";
									}
									else
									{
									$selected="checked";
									$disabled_neo="disabled";
									}
									?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_neop_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked12" > Ninguno
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($psi_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_neop_pe" <?=$checked?> <?=$disabled_neo?> <?=$disabled_all?> class="check-all form-check-input check_pers12">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($neop_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_neop_p" <?=$checked?> <?=$disabled_neo?> <?=$disabled_all?> class="check-all form-check-input check_padre12">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($neop_m ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_neop_m" <?=$checked?> <?=$disabled_neo?>  <?=$disabled_all?> class="check-all form-check-input check_madre12">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($neop_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_neop_h" <?=$checked?> <?=$disabled_neo?> <?=$disabled_all?> class="check-all form-check-input check_hnos12">
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_neop_text" <?=$disabled_neo?> <?=$disabled_all?> class="text-marquo form-control" value="<?=$neop_text?>"></td>
                                       </tr>
                                       
                                        <tr>
                                       <td>Ulcera Peptica</td>
                                       <td>
									  <?php
									if ($ulp_nin ==0){
									$selected="";
									$disabled_up="";
									}
									else
									{
									$selected="checked";
									$disabled_up="disabled";
									}
									?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_ulp_nin" <?=$selected?>   <?=$any?>  class="emp_checkbox form-check-input niguno_checked15" > Ninguno
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($ulp_pe ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_ulp_pe" <?=$checked?> <?=$disabled_up?> <?=$disabled_all?> class="check-all form-check-input check_pers15">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($ulp_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_ulp_p" <?=$checked?> <?=$disabled_up?> <?=$disabled_all?> class="check-all form-check-input check_padre15">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($ulp_m ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_ulp_m" <?=$checked?> <?=$disabled_up?> <?=$disabled_all?> class="check-all form-check-input check_madre15">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($ulp_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_ulp_h" <?=$checked?> <?=$disabled_up?> <?=$disabled_all?> class="check-all form-check-input check_hnos15">
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_ulp_text" <?=$disabled_up?> <?=$disabled_all?> value="<?=$ulp_text?>" class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Artritis, Gota</td>
                                       <td>
									   <?php
									if ($art_nin ==0){
									$selected="";
									$disabled_ag="";
									}
									else
									{
									$selected="checked";
									$disabled_ag="disabled";
									}
									?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_art_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked16" > Ninguno
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($art_pe ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_art_pe" <?=$checked?> <?=$disabled_ag?> <?=$disabled_all?> class="check-all form-check-input check_pers16">
									   </td>
                                       <td  style="text-align:center">
									   	<?php if ($art_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_art_p" <?=$checked?> <?=$disabled_ag?> <?=$disabled_all?> class="check-all form-check-input check_padre16">
									   </td>
                                       <td  style="text-align:center">
									   	<?php if ($art_m ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_art_m" <?=$checked?> <?=$disabled_ag?> <?=$disabled_all?> class="check-all form-check-input check_madre16">
									   </td>
                                       <td  style="text-align:center">
									   	<?php if ($art_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_art_h" <?=$checked?> <?=$disabled_ag?> <?=$disabled_all?> class="check-all form-check-input check_hnos16">
									   
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_art_text" <?=$disabled_ag?> value="<?=$art_text?>" <?=$disabled_all?>  class="text-marquo form-control"></td>
                                       </tr>
                                       
                                       <tr>
                                       <td>Enfemedades hematológicas</td>
                                       <td>
									  <?php
									if ($hem_nin ==0){
									$selected="";
									$disabled_eh="";
									}
									else
									{
									$selected="checked";
									$disabled_eh="disabled";
									}
									?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hem_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked016" > Ninguno
									   </td>
                                       <td style="text-align:center">
									    	<?php if ($hem_pe ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hem_pe" <?=$checked?> <?=$disabled_eh?> <?=$disabled_all?> class="check-all form-check-input check_pers016">
									   </td>
                                       <td style="text-align:center">
									    	<?php if ($hem_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hem_p" <?=$checked?> <?=$disabled_eh?> <?=$disabled_all?> class="check-all form-check-input check_padre016">
									   </td>
                                       <td style="text-align:center">
									    	<?php if ($hem_m ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hem_m" <?=$checked?> <?=$disabled_eh?> <?=$disabled_all?> class="check-all form-check-input check_madre016">
									   </td>
                                       <td style="text-align:center">
									    	<?php if ($hem_h ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_hem_h" <?=$checked?> <?=$disabled_eh?> <?=$disabled_all?> class="check-all form-check-input check_hnos016">
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_hem_text" <?=$disabled_eh?> <?=$disabled_all?> value="<?=$hem_text?>" class="text-marquo form-control"></td>
                                       </tr>
                                        <tr>
                    <td>Enfermedad cerebrovascular</td>
                    <td>
					<?php
					if ($ec_nin ==0){
					$selected="";
					$disabled_ec="";
					}
					else
					{
					$selected="checked";
					$disabled_ec="disabled";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ec_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked3"> Ninguno
					</td>
                    <td style="text-align:center">
					<?php if ($ec_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ec_pe" <?=$disabled_ec?> <?=$checked?> <?=$disabled_all?> class="check-all form-check-input check_pers3">
					</td>
                    <td style="text-align:center">
					<?php if ($ec_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ec_p" <?=$disabled_ec?> <?=$checked?> <?=$disabled_all?> class="check-all form-check-input check_padre3">
					</td>
                    <td style="text-align:center">
					<?php if ($ec_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ec_m" <?=$disabled_ec?> <?=$checked?> <?=$disabled_all?> class="check-all form-check-input check_madre3">
					</td>
                    <td style="text-align:center">
					<?php if ($ec_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ec_h" <?=$disabled_ec?> <?=$checked?> <?=$disabled_all?> class="check-all form-check-input check_hnos3">
					</td>
                    <td><input type="text" id="<?=$ant_p_f_data?>_ec_text" <?=$disabled_all?> <?=$disabled_ec?> value="<?=$ec_text?>" class="text-marquo  form-control"></td>
                    </tr>
                    
                    <tr>
                    <td>Epilepsia</td>
                    <td>
					<?php
					if ($ep_nin ==0){
					$selected="";
					$disabled_epn="";
					}
					else
					{
					$selected="checked";
					$disabled_epn="disabled";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ep_nin" <?=$selected?>  <?=$any?>  class="emp_checkbox form-check-input niguno_checked4" > Ninguno
					</td>
                    <td  style="text-align:center">
					<?php if ($ep_pe ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ep_pe" <?=$checked?> <?=$disabled_all?> <?=$disabled_all?> class="check-all form-check-input check_pers4">
					</td>
                    <td style="text-align:center">
					<?php if ($ep_p ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ep_p" <?=$checked?> <?=$disabled_epn?> <?=$disabled_all?> class="check-all form-check-input check_padre4">
					</td>
                    <td style="text-align:center">
					<?php if ($ep_m ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ep_m" <?=$checked?> <?=$disabled_epn?> <?=$disabled_all?> class="check-all form-check-input check_madre4 ">
					</td>
                    <td style="text-align:center">
					<?php if ($ep_h ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
					<input type="checkbox" name="<?=$ant_p_f_data?>_ep_h" <?=$checked?> <?=$disabled_epn?> <?=$disabled_all?> class="check-all form-check-input check_hnos4">
					</td>
                    <td><input type="text" id="<?=$ant_p_f_data?>_ep_text" <?=$disabled_epn?> <?=$disabled_all?> value="<?=$ep_text?>" class="text-marquo form-control"></td>
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_tub_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked6" > Ninguno
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_tub_pe" <?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input check_pers6">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_tub_p" <?=$checked?> <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input check_padre6">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_tub_m"<?=$checked?>  <?=$disabled_tb?> <?=$disabled_all?> class="check-all form-check-input check_madre6">
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
					<input type="checkbox" name="<?=$ant_p_f_data?>_tub_h" <?=$checked?> <?=$disabled_tb?> class="check-all form-check-input check_hnos6">
					</td>
                    <td><input type="text" id="<?=$ant_p_f_data?>_tub_text" <?=$disabled_tb?> <?=$disabled_all?> value="<?=$tub_text?>" class="text-marquo form-control"></td>
                    </tr>
                                       
                                       
                                       
                                       <tr>
                                       <td>Zika</td>
                                       <td>
									<?php
									if ($zika_nin ==0){
									$selected="";
									$disabled_z="";
									}
									else
									{
									$selected="checked";
									$disabled_z="disabled";
									}
									?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_zika_nin" <?=$selected?> <?=$any?>  class="emp_checkbox form-check-input niguno_checked17" > Ninguno
									   </td>
                                       <td style="text-align:center">
											<?php if ($zika_pe ==0){
											$checked="";
											}
											else
											{
											$checked="checked";
											}
											?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_zika_pe" <?=$checked?> <?=$disabled_z?> <?=$disabled_all?> class="check-all form-check-input check_pers17">
									   </td>
                                       <td style="text-align:center">
										<?php if ($zika_p ==0){
										$checked="";
										}
										else
										{
										$checked="checked";
										}
										?>
										<input type="checkbox" name="<?=$ant_p_f_data?>_zika_p" <?=$checked?> <?=$disabled_z?> <?=$disabled_all?> class="check-all form-check-input check_padre17">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($zika_m ==0){
											$checked="";
											}
											else
											{
											$checked="checked";
											}
											?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_zika_m" <?=$checked?> <?=$disabled_z?> <?=$disabled_all?> class="check-all form-check-input check_madre17">
									   </td>
                                       <td style="text-align:center">
									   	<?php if ($zika_h ==0){
											$checked="";
											}
											else
											{
											$checked="checked";
											}
											?>
									   <input type="checkbox" name="<?=$ant_p_f_data?>_zika_h" <?=$checked?> <?=$disabled_z?> <?=$disabled_all?> class="check-all form-check-input check_hnos17">
									   </td>
                                       <td><input type="text" id="<?=$ant_p_f_data?>_zika_text" <?=$disabled_all?> <?=$disabled_z?>  value="<?=$zika_text?>" class="text-marquo form-control"></td>
                                       </tr>
                                       <!--<tr>
                                       <th></th><th style="width:100%"><span class="rows_selected2" id="select_count2" style="font-size:12px;">0 Seleccionada </span></th><th></th><th></th><th></th><th></th><th></th>
                                       </tr>-->
                                       <tr style="background:none">
                                       <td colspan="5">Otros<br/> <textarea cols="40" id="<?=$ant_p_f_data?>_otros_antpf" class="form-control text-marquo"><?=$otros_antpf?></textarea></td>
                                       </tr>
                                       </tbody>
                                       </table>
                                       </div>
                                     </div>
                            </div>
                  </div>
				  </div> 
				  <div class="row">
				   <div class="col-lg-12">
				  <input type="hidden"   value="<?=$id?>"  id="id_ant_g" >
				<input value="<?=$ant_p_f_data?>" type="hidden" id="ant_p_f_data" />
				        <?php 
					if($data_eva_cardio==2){
		$editBtnSigV="saveEditAntGnrl";
	}else{
	$editBtnSigV="saveEditAntGnrlEvCard";	
	}

						if($ant_p_f_data ==1 ){?>
				<div class="float-end">
				<br/>
				
				<button type="button" class="btn btn-success" id="<?=$editBtnSigV?>">Guardar  </button><span id="successAntPerFam" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php } ?>
				 </div> 
				 </div> 
				 