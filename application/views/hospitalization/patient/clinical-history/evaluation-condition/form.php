 <?php
if($evcond_data==0){
	$created_by=$this->session->userdata('user_id');
$updated_by=$this->session->userdata('user_id');
$inserted_time = date("Y-m-d H:i:s");
$update_time = date("Y-m-d H:i:s");	
$condicion_general='';
$estado_conciencia ='';
$orient_tiempo=0;
$orient_lugar=0;
$orient_pers =0;
$comunicacion ='';
$val_neuro='';
$estado_cardia='';
$est_respiratoria='';
$oxinoterapia='';
$terapia_resp='';
$sec_vias_resp='';
$sangrado='';
$tipo_sangrado='';
$presenta_dolor='';
$canalizacion='';
$drenajes='';
$eva_diuresis='';
$nauseas=0;
$vomitos=0;
$vomitos_sel='';
$drenaje_sonda_nas_sel='';
$evalucacion=0;
$evaluacion_sel='';
$diarrea='';
$val_abdomen='';
$peristalsis='';
$alimentacion=0;
$alimentacion_sel='';
$coloracion='';
$eva_pulso='';
$eva_edema='';
$val_piel='';
$cuidados_a='';
$movilizacion='';
$notas='';
$id_eva_cond=0;

}else{
  foreach ($query_evcond as $row)	
$id_eva_cond=$row->id;
$created_by=$row->inserted_by;
$updated_by=$this->session->userdata('user_id');
$inserted_time = $row->inserted_time;
$update_time = date("Y-m-d H:i:s");
$orient_tiempo=$row->orient_tiempo;
$condicion_general=$row->condicion_general;
$estado_conciencia =$row->estado_conciencia;

$orient_lugar=$row->orient_lugar;
$orient_pers =$row->orient_pers;
$comunicacion =$row->comunicacion;
$val_neuro=$row->val_neuro;
$estado_cardia=$row->estado_cardia;
$est_respiratoria=$row->est_respiratoria;
$oxinoterapia=$row->oxinoterapia;
$terapia_resp=$row->terapia_resp;
$sec_vias_resp=$row->sec_vias_resp;
$sangrado=$row->sangrado;
$tipo_sangrado=$row->tipo_sangrado;
$presenta_dolor=$row->presenta_dolor;
$canalizacion=$row->canalizacion;
$drenajes=$row->drenajes;
$eva_diuresis=$row->eva_diuresis;
$nauseas=$row->nauseas;
$vomitos=$row->vomitos;
$vomitos_sel=$row->vomitos_sel;
$drenaje_sonda_nas_sel=$row->drenaje_sonda_nas_sel;
$evalucacion=$row->evalucacion;
$evaluacion_sel=$row->evaluacion_sel;
$diarrea=$row->diarrea;
$val_abdomen=$row->val_abdomen;
$peristalsis=$row->peristalsis;
$alimentacion=$row->alimentacion;
$alimentacion_sel=$row->alimentacion_sel;
$coloracion=$row->coloracion;
$eva_pulso=$row->eva_pulso;
$eva_edema=$row->eva_edema;
$val_piel=$row->val_piel;
$cuidados_a=$row->cuidados_a;
$movilizacion=$row->movilizacion;
$notas=$row->notas;
	$created_byus=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
			$updated_byus=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
			
			$insed_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
            $upda_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
			 
			echo  "<div class='alert alert-primary' role='alert'>
			creado por $created_byus $insed_time cambiado por $updated_byus $upda_time 
			</div>";
   
   
}
?>

 <div id="sfsdfsdfgg6"></div>
 <div class="card-body">
          <form class="row g-3">
		  <input type="hidden" id="<?= $id_eva_cond ?>_id_eva_cond_created_by" value="<?=$created_by?>" />
<input type="hidden" id="<?= $id_eva_cond ?>_id_eva_cond_updated_by" value="<?=$updated_by?>" />
<input type="hidden" id="<?= $id_eva_cond ?>_id_eva_cond_inserted_time" value="<?=$inserted_time?>" />
<input type="hidden" id="<?= $id_eva_cond ?>_id_eva_cond_update_time" value="<?=$update_time?>" />
                <div class="col-md-6">
                  <label for="<?=$id_eva_cond?>_condicion_general" class="form-label">Condición General <span class="text-danger  fs-5">*</span></label>
					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_condicion_general" data-select2-tags="true"  >
					
					<?php
                   echo "<option value=''></option>";					
					$sqlhev1 ="SELECT DISTINCT condicion_general FROM hosp_eval_cond";
					$HEV1=$this->hospitalization_emgergency->query($sqlhev1);
					foreach($HEV1->result() as $row)
					{ 
					if($condicion_general==$row->condicion_general){
						echo '<option value="'.$row->condicion_general.'"  selected >'.$row->condicion_general.'</option>';
					}else{
						echo '<option value="'.$row->condicion_general.'"   >'.$row->condicion_general.'</option>';
					}
			
					}
					?>
					</select>
                </div>
				 <div class="col-md-6">
                  <label for="<?=$id_eva_cond?>_eva_diuresis" class="form-label">Diuresis</label>
					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_diuresis" data-select2-tags="true"  >
					<option value=''></option>
					<?php 
					$sqlhev3="SELECT DISTINCT eva_diuresis FROM hosp_eval_cond";
					$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
					foreach($HEV3->result() as $row3)
					{ 
					if($eva_diuresis==$row3->eva_diuresis){
						
						echo '<option value="'.$row3->eva_diuresis.'"  selected>'.$row3->eva_diuresis.'</option>';
					}else{
					echo '<option value="'.$row3->eva_diuresis.'"  >'.$row3->eva_diuresis.'</option>';	
					}
					
					}
					?>
					</select>
                </div>
                <div class="col-md-6">
				
						<label for="<?=$id_eva_cond?>_estado_conciencia" class="form-label">Estado de Conciencia <span class="text-danger fs-5">*</span></label>
						<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_estado_conciencia" data-select2-tags="true"  >
						<option value=''></option>
						<?php 
						$sqlhev2 ="SELECT DISTINCT estado_conciencia FROM hosp_eval_cond";
						$HEV2=$this->hospitalization_emgergency->query($sqlhev2);
						foreach($HEV2->result() as $row2)
						{ 
						if($estado_conciencia==$row2->estado_conciencia){
						echo '<option value="'.$row2->estado_conciencia.'" selected>'.$row2->estado_conciencia.'</option>';
						}else{
						echo '<option value="'.$row2->estado_conciencia.'" >'.$row2->estado_conciencia.'</option>';	
						}
						}
						?>
						</select>
                </div>
					<div class="col-md-3">

					<label for="<?=$id_eva_cond?>_vomitos_sel" class="form-label">Gastrica</label>

					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_vomitos_sel" data-select2-tags="true"  >
					<option value=''></option>
					<?php 
					$sqlhev3="SELECT DISTINCT vomitos_sel FROM hosp_eval_cond";
					$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
					foreach($HEV3->result() as $row3)
					{ 
						if($vomitos_sel==$row3->vomitos_sel){
						echo '<option value="'.$row3->vomitos_sel.'" selected>'.$row3->vomitos_sel.'</option>';
					}else{
							echo '<option value="'.$row3->vomitos_sel.'" >'.$row3->vomitos_sel.'</option>';
						
					}
				
					}
					?>
					</select>
					</div>
              <div class="col-md-3">
		

<div class="form-check form-check-inline">
<?php
   if ($nauseas ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" name="<?=$id_eva_cond?>_nauseas" id="<?=$id_eva_cond?>_nauseas" <?=$selected?> >
  <label class="form-check-label" for="<?=$id_eva_cond?>_nauseas">Nauseas</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($vomitos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" name="<?=$id_eva_cond?>_vomitos" id="<?=$id_eva_cond?>_vomitos" <?=$selected?>>
  <label class="form-check-label" for="<?=$id_eva_cond?>_vomitos">Vomitos</label>
</div>
</div>
                 <div class="col-md-6">
                   <label for="inputAddress5">Orientación</label>
				   <br/>
            <div class="form-check form-check-inline">
			<?php
			if ($orient_tiempo ==0){
			$selected="";
			}
			else
			{
			$selected="checked";
			}
			?>
  <input class="form-check-input" type="checkbox" id="<?=$id_eva_cond?>_orient_tiempo" name="<?=$id_eva_cond?>_orient_tiempo"  <?=$selected?> >
  <label class="form-check-label" for="<?=$id_eva_cond?>_orient_tiempo">Tiempo</label>
</div>
<div class="form-check form-check-inline">
<?php
			if ($orient_lugar ==0){
			$selected="";
			}
			else
			{
			$selected="checked";
			}
			?>
  <input class="form-check-input" type="checkbox" id="<?=$id_eva_cond?>_orient_lugar" name="<?=$id_eva_cond?>_orient_lugar"  <?=$selected?> >
  <label class="form-check-label" for="<?=$id_eva_cond?>_orient_lugar">Lugar</label>
</div>
<div class="form-check form-check-inline">
<?php
			if ($orient_pers ==0){
			$selected="";
			}
			else
			{
			$selected="checked";
			}
			?>
  <input class="form-check-input" type="checkbox" id="<?=$id_eva_cond?>_orient_pers" name="<?=$id_eva_cond?>_orient_pers" <?=$selected?> >
  <label class="form-check-label" for="<?=$id_eva_cond?>_orient_pers">Persona</label>
</div>
                </div>
                 <div class="col-md-6">
                  <label for="<?=$id_eva_cond?>_drenaje_sonda_nas_sel" class="form-label">Drenaje Sonda Nasogastica</label>
                  <select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_drenaje_sonda_nas_sel" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT drenaje_sonda_nas_sel FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
			if($drenaje_sonda_nas_sel==$row3->drenaje_sonda_nas_sel){
			echo '<option value="'.$row3->drenaje_sonda_nas_sel.'" selected>'.$row3->drenaje_sonda_nas_sel.'</option>';
			}else{
			echo '<option value="'.$row3->drenaje_sonda_nas_sel.'" >'.$row3->drenaje_sonda_nas_sel.'</option>';
			}
		}
			?>
	</select>
                </div>
                <div class="col-md-6">
                  <label for="<?=$id_eva_cond?>_comunicacion" class="form-label">Comunicación</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_comunicacion" data-select2-tags="true"  >
				<option value=''></option>
				<?php 
				$sqlhev3="SELECT DISTINCT comunicacion FROM hosp_eval_cond";
				$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
				foreach($HEV3->result() as $row3)
				{ 
				if($comunicacion==$row3->comunicacion){
			echo '<option value="'.$row3->comunicacion.'" selected>'.$row3->comunicacion.'</option>';
			}else{
				echo '<option value="'.$row3->comunicacion.'" >'.$row3->comunicacion.'</option>';
		
			}
				
				}
				?>
				</select>
                </div>
                <div class="col-md-6">
                  <label for="<?=$id_eva_cond?>_evaluacion_sel" class="form-label">Evaluación</label>
					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_evaluacion_sel" data-select2-tags="true"  >
					<option value=''></option>
					<?php 
					$sqlhev3="SELECT DISTINCT evaluacion_sel FROM hosp_eval_cond";
					$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
					foreach($HEV3->result() as $row3)
					{ 
						if($evaluacion_sel==$row3->evaluacion_sel){
						echo '<option value="'.$row3->evaluacion_sel.'" selected>'.$row3->evaluacion_sel.'</option>';
						}else{
						echo '<option value="'.$row3->evaluacion_sel.'" >'.$row3->evaluacion_sel.'</option>';
						}
						
					}
					?>
					</select>
                </div>
                <div class="col-md-6">
					<label for="<?=$id_eva_cond?>_val_neuro" class="form-label">Val. Nuerologica</label>
					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_val_neuro" data-select2-tags="true"  >
					<option value=''></option>

					<?php 
					$sqlhev3="SELECT DISTINCT val_neuro FROM hosp_eval_cond";
					$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
					foreach($HEV3->result() as $row3)
					{ 
					if($val_neuro==$row3->val_neuro){
						echo '<option value="'.$row3->val_neuro.'" selected>'.$row3->val_neuro.'</option>';
						}else{
						echo '<option value="'.$row3->val_neuro.'" >'.$row3->val_neuro.'</option>';
						}
					
					}
					?>

					</select>
				</div>
				<div class="col-md-6">
				<label for="<?=$id_eva_cond?>_diarrea" class="form-label">Diarrea</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_diarrea" data-select2-tags="true"  >
				<option value=''></option>
				<?php 
				$sqlhev3="SELECT DISTINCT diarrea FROM hosp_eval_cond";
				$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
				foreach($HEV3->result() as $row3)
				{ 
				if($diarrea==$row3->diarrea){
					echo '<option value="'.$row3->diarrea.'" selected>'.$row3->diarrea.'</option>';
						}else{
						echo '<option value="'.$row3->diarrea.'" >'.$row3->diarrea.'</option>';
						}
		
				}
				?>
				</select>
				</div>

			<div class="col-md-6">
			<label for="<?=$id_eva_cond?>_estado_cardia" class="form-label">Estado Cardiaco</label>
			<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_estado_cardia" data-select2-tags="true"  >
			<option value=''></option>

			<?php 
			$sqlhev3="SELECT DISTINCT estado_cardia FROM hosp_eval_cond";
			$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
			foreach($HEV3->result() as $row3)
			{ 
			if($estado_cardia==$row3->estado_cardia){
						echo '<option value="'.$row3->estado_cardia.'" selected>'.$row3->estado_cardia.'</option>';
						}else{
						echo '<option value="'.$row3->estado_cardia.'" >'.$row3->estado_cardia.'</option>';
						}
			
			}
			?>
			</select>
                </div>
				
					<div class="col-md-3">
			<label for="<?=$id_eva_cond?>_val_abdomen" class="form-label">Val. Abdomen</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_val_abdomen" data-select2-tags="true"  >
				<option value=''></option>
				<?php 
				$sqlhev3="SELECT DISTINCT val_abdomen FROM hosp_eval_cond";
				$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
				foreach($HEV3->result() as $row3)
				{ 
				if($val_abdomen==$row3->val_abdomen){
								echo '<option value="'.$row3->val_abdomen.'" selected>'.$row3->val_abdomen.'</option>';
						}else{
								echo '<option value="'.$row3->val_abdomen.'" >'.$row3->val_abdomen.'</option>';
						}
		
				}
				?>
				</select>
                </div>
				
					<div class="col-md-3">
			<label for="<?=$id_eva_cond?>_peristalsis" class="form-label">Peristalsis</label>
					<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_peristalsis" data-select2-tags="true"  >
					<option value=''></option>
					<?php 
					$sqlhev3="SELECT DISTINCT peristalsis FROM hosp_eval_cond";
					$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
					foreach($HEV3->result() as $row3)
					{ 
					if($peristalsis==$row3->peristalsis){
						echo '<option value="'.$row3->peristalsis.'" selected>'.$row3->peristalsis.'</option>';
						}else{
						echo '<option value="'.$row3->peristalsis.'" >'.$row3->peristalsis.'</option>';
						}
					
					}
					?>
					</select>
                </div>
				
           <div class="col-md-6">
				<label for="<?=$id_eva_cond?>_oxinoterapia" class="form-label">Oxinoterapia</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_oxinoterapia" data-select2-tags="true"   >
				<option value=''></option>
				<?php 
				$sqlhev3="SELECT DISTINCT oxinoterapia FROM hosp_eval_cond";
				$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
				foreach($HEV3->result() as $row3)
				{ 
				if($oxinoterapia==$row3->oxinoterapia){
						echo '<option value="'.$row3->oxinoterapia.'" selected>'.$row3->oxinoterapia.'</option>';
						}else{
						echo '<option value="'.$row3->oxinoterapia.'" >'.$row3->oxinoterapia.'</option>';
						}
				
				}
				?>
				</select>
				</div>
				
				
				<div class="col-md-6">
				<label for="<?=$id_eva_cond?>_alimentacion_sel" class="form-label">Alimentación</label>
				 
   <select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_alimentacion_sel" data-select2-tags="true"   >
	<option value=''></option>
				<?php 
				$sqlhev3="SELECT DISTINCT alimentacion_sel FROM hosp_eval_cond";
				$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
				foreach($HEV3->result() as $row3)
				{ 
				if($alimentacion_sel==$row3->alimentacion_sel){
				echo '<option value="'.$row3->alimentacion_sel.'" selected>'.$row3->alimentacion_sel.'</option>';
				}else{
				echo '<option value="'.$row3->alimentacion_sel.'" >'.$row3->alimentacion_sel.'</option>';
				}
				
				}
				?>
				</select>
				</div>


			<div class="col-md-6">
			<label for="<?=$id_eva_cond?>_terapia_resp" class="form-label">Terapia Respiratoria</label>
			<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_terapia_resp" data-select2-tags="true"  >
			<option value=''></option>
			<?php 
			$sqlhev3="SELECT DISTINCT terapia_resp FROM hosp_eval_cond";
			$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
			foreach($HEV3->result() as $row3)
			{ 
			if($terapia_resp==$row3->terapia_resp){
					echo '<option value="'.$row3->terapia_resp.'" selected>'.$row3->terapia_resp.'</option>';
				}else{
					echo '<option value="'.$row3->terapia_resp.'" >'.$row3->terapia_resp.'</option>';
				}
		
			}
			?>
			</select>
			</div>
			
			<div class="col-md-6">
			<label for="<?=$id_eva_cond?>_sec_vias_resp" class="form-label">Sec. de Vias Resp</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_sec_vias_resp" data-select2-tags="true"  >
	<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT sec_vias_resp FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($sec_vias_resp==$row3->sec_vias_resp){
					echo '<option value="'.$row3->sec_vias_resp.'" selected>'.$row3->sec_vias_resp.'</option>';
				}else{
					echo '<option value="'.$row3->sec_vias_resp.'" >'.$row3->sec_vias_resp.'</option>';
				}
	
		}
		?>
	</select>
			</div>
			<div class="col-md-6">
			<label for="<?=$id_eva_cond?>_eva_sangrado" class="form-label">Sangrado</label>
		<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_sangrado" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT sangrado FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($sangrado==$row3->sangrado){
						echo '<option value="'.$row3->sangrado.'" selected>'.$row3->sangrado.'</option>';
				}else{
						echo '<option value="'.$row3->sangrado.'" >'.$row3->sangrado.'</option>';
				}

		}
		?>
	</select>
			</div>
			
			<div class="col-md-6">
			<label for="<?=$id_eva_cond?>_tipo_sangrado" class="form-label">Tipo de Sangrado</label>
			<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_tipo_sangrado" data-select2-tags="true"  >
	<option value=''></option>
		<?php 
		$sqlhev3="SELECT DISTINCT tipo_sangrado FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($tipo_sangrado==$row3->tipo_sangrado){
				echo '<option value="'.$row3->tipo_sangrado.'" selected>'.$row3->tipo_sangrado.'</option>';
				}else{
				echo '<option value="'.$row3->tipo_sangrado.'" >'.$row3->tipo_sangrado.'</option>';
				}
		
		}
		?>
	</select>
			</div>	
				<div class="col-md-3">
				<label for="<?=$id_eva_cond?>_eva_pulso" class="form-label">Pulso</label>
				<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_pulso" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT eva_pulso FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($eva_pulso==$row3->eva_pulso){
					echo '<option value="'.$row3->eva_pulso.'" selected>'.$row3->eva_pulso.'</option>';
				}else{
					echo '<option value="'.$row3->eva_pulso.'" >'.$row3->eva_pulso.'</option>';
				}
	
		}
		?>
</select>
				</div>
<div class="col-md-3">
<label for="<?=$id_eva_cond?>_eva_edema">Edema</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_edema" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT eva_edema FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($eva_edema==$row3->eva_edema){
				echo '<option value="'.$row3->eva_edema.'" selected>'.$row3->eva_edema.'</option>';
				}else{
				echo '<option value="'.$row3->eva_edema.'" >'.$row3->eva_edema.'</option>';
				}
		
		}
		?>
</select>
				</div>
				
		<div class="col-md-6">
<label for="<?=$id_eva_cond?>_val_piel">Valoración de la Piel</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_val_piel" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT val_piel FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($val_piel==$row3->val_piel){
				echo '<option value="'.$row3->val_piel.'" selected>'.$row3->val_piel.'</option>';
				}else{
				echo '<option value="'.$row3->val_piel.'" >'.$row3->val_piel.'</option>';
				}
		
		}
		?>
</select>
</div>

	<div class="col-md-6">
<label>Presentación de Dolor</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_presenta_dolor" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT presenta_dolor FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($presenta_dolor==$row3->presenta_dolor){
					echo '<option value="'.$row3->presenta_dolor.'" selected>'.$row3->presenta_dolor.'</option>';
				}else{
					echo '<option value="'.$row3->presenta_dolor.'" >'.$row3->presenta_dolor.'</option>';
				}
	
		}
		?>
	</select>
</div>



	<div class="col-md-6">
<label>Canalización</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_canalizacion" data-select2-tags="true"  >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT canalizacion FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($canalizacion==$row3->canalizacion){
					echo '<option value="'.$row3->canalizacion.'" selected>'.$row3->canalizacion.'</option>';
				}else{
					echo '<option value="'.$row3->canalizacion.'" >'.$row3->canalizacion.'</option>';
				}
	
		}
		?>
	</select>
</div>





	<div class="col-md-6">
<label>Cuidados a </label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_cuidados_a" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT cuidados_a FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($cuidados_a==$row3->cuidados_a){
						echo '<option value="'.$row3->cuidados_a.'" selected>'.$row3->cuidados_a.'</option>';
				}else{
						echo '<option value="'.$row3->cuidados_a.'" >'.$row3->cuidados_a.'</option>';
				}

		}
		?>
</select>
</div>





	<div class="col-md-6">
<label>Movilización</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_eva_movilizacion" data-select2-tags="true"   >
	<option value=''></option>
	<?php 
		$sqlhev3="SELECT DISTINCT movilizacion FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
			if($drenajes==$row3->movilizacion){
					echo '<option value="'.$row3->movilizacion.'" selected>'.$row3->movilizacion.'</option>';
				}else{
					echo '<option value="'.$row3->movilizacion.'" >'.$row3->movilizacion.'</option>';
				}
	
		}
		?>
	</select>
</div>


	<div class="col-md-6">
<label>Drenajes</label>
<select   class="form-select selectevaconform"   id="<?=$id_eva_cond?>_movilizacion" data-select2-tags="true"  >
<option value=''></option>
<?php 
		$sqlhev3="SELECT DISTINCT drenajes FROM hosp_eval_cond";
		$HEV3=$this->hospitalization_emgergency->query($sqlhev3);
		foreach($HEV3->result() as $row3)
		{ 
		if($drenajes==$row3->drenajes){
					echo '<option value="'.$row3->drenajes.'" selected>'.$row3->drenajes.'</option>';
				}else{
					echo '<option value="'.$row3->drenajes.'" >'.$row3->drenajes.'</option>';
				}
	
		}
		?>
</select>
</div>
	<div class="col-md-6">
<label>Otras Notas</label>
<textarea rows="6" cols="15" class="form-control" id="<?=$id_eva_cond?>_eva_con_otros_notas" ><?=$notas?></textarea>
</div>

              
              </form><!-- End Multi Columns Form -->
<br />
  <div class="float-end">
<?php if ($id_eva_cond > 0) { ?>
    <button type="button" class="btn btn-primary" id="resetFormEvaCond">Nuevo</button>
	<?php } if($this->session->userdata('user_id')==$created_by){?>
<button type="button" class="btn btn-success btn-lg" id="saveEditEvaCond" <?=$this->session->userdata('show_edit_btn')?>>Guardar </button>
<?php  }?> 
   
    <span id="alert_placeholder_eva_con" style="position:absolute; " class="p-2"></span>
  
  </div>

  <br /> <br /> 
            </div>
			<input value="<?=$id_eva_cond?>" id="id_eva_cond" type="hidden" />
			<script>
		/*	$(".spinner-border").hide();


$('#saveEditEvaCond').on('click',function(e){
	e.preventDefault(); 

saveEvaCond($('#id_eva_cond').val());

})*/


			</script>