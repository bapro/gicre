      <div class="col-md-12">
	  <?php
	 if ($ant_uro_data == 1)
{
    foreach($query_ant_uro->result() as $row)
	$uro_sin_ha_1 = $row->uro_sin_ha_1;
    $uro_ant_escl = $row->uro_ant_escl;
    $uro_ant_imp = $row->uro_ant_imp;
    $uro_ant_ane_fal = $row->uro_ant_ane_fal;
    $uro_ant_vari = $row->uro_ant_vari;
    $uro_ant_fimosis = $row->uro_ant_fimosis;
    $uro_ant_hid = $row->uro_ant_hid;
    $uro_ant_its = $row->uro_ant_its;
    $uro_ant_tumorales = $row->uro_ant_tumorales;
    $uro_ant_otros = $row->uro_ant_otros;
    $uro_sin_ha_2 = $row->uro_sin_ha_2;
    $uro_ant_cancer_prostata = $row->uro_ant_cancer_prostata;
    $uro_ant_poli_renal = $row->uro_ant_poli_renal;
    $uro_ant_uroli = $row->uro_ant_uroli;
    $uro_ant_cist = $row->uro_ant_cist;
    $uro_ant_otros2 = $row->uro_ant_otros2;
    $id_uro = $row->id;
	$params = array('table' => 'h_c_urology_antecedentes', 'id'=>$id_uro);
echo $this->user_register_info->get_operation_info($params);

   $in_by = $row->inserted_by;
			$up_by = $this->session->userdata('user_id');
			$in_time = $row->inserted_time;
			$up_time = date("Y-m-d H:i:s");

}
else
{
    $uro_sin_ha_1 = 0;
    $uro_ant_escl = 0;
    $uro_ant_imp = 0;
    $uro_ant_ane_fal = 0;
    $uro_ant_vari = 0;
    $uro_ant_fimosis = 0;
    $uro_ant_hid = 0;
    $uro_ant_its = "";
    $uro_ant_tumorales = "";
    $uro_ant_otros = "";
    $uro_sin_ha_2 = 0;
    $uro_ant_cancer_prostata = 0;
    $uro_ant_poli_renal = 0;
    $uro_ant_uroli = 0;
    $uro_ant_cist = 0;
    $uro_ant_otros2 = "";
    $id_uro = 0;
	
	 	 $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
}
	  
	  ?>
<div class="row">
	  <form class="row">
	   <h4 class="card-title"> Personales</h4>
			 <div class="form-check">
			 <?php if ($uro_sin_ha_1 ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_sin_ha_1" id="<?=$id_uro?>_uro_sin_ha_1s" <?=$checked?> >
                    <label class="form-check-label" for="<?=$id_uro?>_uro_sin_ha_1s">
                      Sin Hallazgo 
                    </label>
                  </div>
				  <br/><br/>
				  <div class="row disabled-antes1">
                      <div class="col-md-3 ms-4">
                  <div class="form-check">
				   <?php if ($uro_ant_escl ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_escl" id="<?=$id_uro?>_uro_ant_escls"  <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_escls">
                      Esclerosis Múltiple 
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_imp ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_imp" id="<?=$id_uro?>_uro_ant_imps" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_imps">
                      Impotencia
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_ane_fal ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_ane_fal" id="<?=$id_uro?>_uro_ant_ane_fals" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_ane_fals">
                     Anemia Falciforme
                    </label>
                  </div>
				 </div>
				 
				         <div class="col-md-3">
                  <div class="form-check">
				   <?php if ($uro_ant_vari ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_vari" id="<?=$id_uro?>_uro_ant_varis"  <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_varis">
                      Varicoceles 
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_fimosis ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_fimosis" id="<?=$id_uro?>_uro_ant_fimosiss" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_fimosiss">
                      Fimosis
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_hid ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_hid" id="<?=$id_uro?>_uro_ant_hids" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_hids">
                     Hidroceles
                    </label>
                  </div>
				  
				 
                </div>
				<div class="col-md-12 ms-4">
				<br/>
				 <div class="col-md-8">
				 
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="<?=$id_uro?>_uro_ant_its" style="height:100px"><?=$uro_ant_its?></textarea>
                    <label for="<?=$id_uro?>_uro_ant_its">ITS</label>
                  </div>
				  </div>
				  
				  <div class="col-md-8">
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="<?=$id_uro?>_uro_ant_tumorales" style="height:100px"><?=$uro_ant_tumorales?></textarea>
                    <label for="<?=$id_uro?>_uro_ant_tumorales">Tumorales</label>
                  </div>
				  </div>
				  
				  
				  <div class="col-md-8">
				<div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Ninguno" id="<?=$id_uro?>_uro_ant_otros" style="height:100px"><?=$uro_ant_otros?></textarea>
                    <label for="<?=$id_uro?>_uro_ant_otros">Otros</label>
                  </div>
				  </div>
				  </div>
				</form>
			</div>
       <div class="row">
                 <div class="col-lg-12">
<hr style="opacity:0.1"/>
             <h4 class="card-title"> Familiares</h4>
                    <form class="row">
			   <div class="form-check">
			    <?php if ($uro_sin_ha_2 ==0){
					$checked="";
					$diabled_haz="";
					}
					else
					{
					$checked="checked";
					$diabled_haz="disabled";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_sin_ha_2" id="<?=$id_uro?>_uro_sin_ha_2s" <?=$checked?> >
                    <label class="form-check-label" for="<?=$id_uro?>_uro_sin_ha_2s">
                     Sin Hallazgo 
                    </label>
                  </div>
				    <br/><br/>
					 <div class="row disabled-antes2">
                      <div class="col-md-3 ms-4">
                  <div class="form-check">
				   <?php if ($uro_ant_cancer_prostata ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_cancer_prostata" id="<?=$id_uro?>_uro_ant_cancer_prostatas" <?=$checked?> >
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_cancer_prostatas">
                      Cáncer de próstata 
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_poli_renal ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_poli_renal" id="<?=$id_uro?>_uro_ant_poli_renals" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_poli_renals">
                      Polisquistosis renal
                    </label>
                  </div>
                  <div class="form-check">
				   <?php if ($uro_ant_uroli ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_uroli" id="<?=$id_uro?>_uro_ant_urolis" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_urolis">
                     Urolitiasis
                    </label>
                  </div>
				  <div class="form-check">
				   <?php if ($uro_ant_cist ==0){
					$checked="";
					}
					else
					{
					$checked="checked";
					}
					?>
                    <input class="form-check-input" type="checkbox" name="<?=$id_uro?>_uro_ant_cist" id="<?=$id_uro?>_uro_ant_cists" <?=$checked?>>
                    <label class="form-check-label" for="<?=$id_uro?>_uro_ant_cists">
                     Cistinuria
                    </label>
                  </div>
				 
				 </div>
				 <div class="col-md-6">
				    <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Ninguno" id="<?=$id_uro?>_uro_ant_otros2" value="<?=$uro_ant_otros2?>"/>
                    <label for="<?=$id_uro?>_uro_ant_otros2">Otros</label>
                  </div>
				 </div>
				 
				</form>
                  
				    
                   </div>
</div>
            </div>
               </div>
			      <?php if($ant_uro_data==1){?>
						  
				<div class="float-end">
				<br/>
			<button type="button" class="btn btn-success" id="saveEditAntUroPerFam">Guardar </button><span id="successAntUroPerFam" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php }
  
    	$datauro_v= array(
'uro_up_time'=>$up_time,
'uro_in_time' =>$in_time,
'uro_in_by'=>$in_by,
'uro_up_by' => $up_by
);

$this->session->set_userdata($datauro_v);
  


			 ?>
			    </div>
					<input type="hidden"   value="<?=$id_uro?>"  id="ant_uro_per_fam_id" >
				 <input  type="hidden" id="ant_uro_data" value="<?=$ant_uro_data?>"/>
				