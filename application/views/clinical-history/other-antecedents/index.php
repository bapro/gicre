<?php 
 if($v_at_data ==1 && $query_sql_v_at->result() !=NULL){
	 foreach($query_sql_v_at->result() as $rowOtAnt)
  $quirurgicos= $rowOtAnt->quirurgicos;
	$abdominal= $rowOtAnt->abdominal;
	$transfusion= $rowOtAnt->transfusion; 
	$gineco= $rowOtAnt->gineco;
	$toracica= $rowOtAnt->toracica;
	$otros1= $rowOtAnt->otros1;
	$tipificacion= $rowOtAnt->tipificacion;
	$rh= $rowOtAnt->rh;
	$hpv= $rowOtAnt->hpv;
	$hepatis= $rowOtAnt->hepatis;
	 $toxoide= $rowOtAnt->toxoide;
	$grouposang= $rowOtAnt->grouposang;
  	  $in_by = $rowOtAnt->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $rowOtAnt->inserted_time;
$up_time = date("Y-m-d H:i:s");
	$id_ao  =$rowOtAnt->id ;
	
 }else{
	$quirurgicos= "";
	$abdominal= "";
	$transfusion= ""; 
	$gineco= "";
	$toracica= "";
	$otros1= "";
	$tipificacion="";
	$rh= "";
	$hpv= "";
	$toxoide= "";
	$hepatis= "";
	$grouposang= "";
	   $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
	$id_ao  =0; 


 }	

 $gineco_obstétricos_options = array("", "No", "Histerectomía", "De ovarios", "Cesárea");
 $grupo_sanguíneos = array("", "A", "B", "AB", "O");
 

?> 
<div class="col-md-12">
<div class="row">

 <?php
 if($id_ao !=""){
$params = array('table' => 'h_c_ante_otros', 'id'=>$id_ao);
echo $this->user_register_info->get_operation_info($params);
 }
?>
<div class="col-lg-9">

<div class="input-group mb-2">
<div class="form-floating">
<input type="text" class="form-control" id="<?=$id_ao?>_usual_drug_text" placeholder="Medicamentos Habituales">
<label for="<?=$id_ao?>_floatingAlAl">Medicamentos habituales</label>
</div>
<span class="input-group-text glicemia">
<button type="button" id="btn-save-drug-usual" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Agregar</button>

</span>
</div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
<textarea  class="form-control" id="<?=$id_ao?>_floatingQuirurgicos" placeholder="Quirúrgicos" style="height:150px"><?=$quirurgicos?></textarea>
<label for="<?=$id_ao?>_floatingQuirurgicos">Quirúrgicos</label>
</div>
<div class="form-floating mb-3">
<textarea  class="form-control" id="<?=$id_ao?>_floatingAbdominal" placeholder="Abdominal" style="height:150px"><?=$abdominal?></textarea>
<label for="<?=$id_ao?>_floatingAbdominal">Abdominal</label>
</div>

<div class="form-floating mb-3">
<textarea class="form-control" id="<?=$id_ao?>_floatingTransfusionSanguinea" placeholder="Transfusión sanguínea" style="height:150px"><?=$transfusion?></textarea>
<label for="<?=$id_ao?>_floatingTransfusionSanguinea">Transfusión sanguínea </label>
</div>


</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
<select class="form-select" id="<?=$id_ao?>_floatingGineObs" aria-label="Floating label select example">

<?php
	 foreach($gineco_obstétricos_options as $gineco_obstétricos_option){
		 if($gineco==$gineco_obstétricos_option) {
		 $selected="selected";
	}else{
		$selected=""; 
	 }
	echo "<option $selected>$gineco_obstétricos_option</option>"; 
	 }
	 
	 ?>

</select>
<label for="<?=$id_ao?>_floatingGineObs" class="form-label">Gineco-obstétricos</label>
</div>
<div class="form-floating mb-3">
<textarea class="form-control" id="<?=$id_ao?>_floatingToracica" style="height:150px"><?=$toracica?></textarea>
<label for="<?=$id_ao?>_floatingToracica">Torácica</label>
</div>

<div class="form-floating mb-3">
<textarea class="form-control" id="<?=$id_ao?>_floatingOtrosAnt" placeholder="Otros" style="height:150px"><?=$otros1?></textarea>
<label for="<?=$id_ao?>_floatingOtrosAnt">Otros</label>
</div>


</div>
<div class="col-lg-2">
<legend class="col-form-label">Hepatitis B</legend>
<div class="col-lg-2">
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">

<?php
if($hepatis =="No"){
	$checked="checked";
} else{
	$checked="";
	}?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_hep_b" id="<?=$id_ao?>_btn_ant_hep_b1" autocomplete="off" value="No" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_btn_ant_hep_b1">No</label>
<?php
if($hepatis =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
	?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_hep_b" id="<?=$id_ao?>_btn_ant_hep_b2" autocomplete="off" value="Si" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_btn_ant_hep_b2">Si</label>

</div>

</div>

</div>
<div class="col-lg-2">
<legend class="col-form-label">HPV</legend>
<div class="col-lg-2">
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
<?php
if($hpv =="No"){
	$checked="checked";
} else{
	$checked="";
	}
	?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_hpv" id="<?=$id_ao?>_ant_hpv1" autocomplete="off" value="No" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_hpv1">No</label>
<?php
if($hpv =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
	?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_hpv" id="<?=$id_ao?>_ant_hpv2" autocomplete="off" value="Si" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_hpv2">Si</label>

</div>

</div>

</div>
<div class="col-lg-2">
<legend class="col-form-label">Toxoide tetánico</legend>
<div class="col-lg-2">
<?php
if($toxoide =="No"){
	$checked="checked";
} else{
	$checked="";
	}
	?>
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_tox_tel" id="<?=$id_ao?>_ant_tox_tel_1" autocomplete="off" value="No" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_tox_tel_1">No</label>
<?php
if($toxoide =="Si"){
	$checked="checked";
} else{
	$checked="";
	}?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_tox_tel" id="<?=$id_ao?>_ant_tox_tel_2" autocomplete="off" value="Si" <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_tox_tel_2">Si</label>

</div>

</div>

</div>
<div class="col-lg-2">
<legend class="col-form-label">Grupo sanguíneo</legend>
<select id="<?=$id_ao?>_ant_blood_group" class="form-select">
<option>Seleccione</option>
<?php

 foreach($grupo_sanguíneos as $grupo_sanguíneo){
	 if($grouposang==$grupo_sanguíneo) {
		 $selected="selected";
	}else{
		$selected=""; 
	 }
	echo "<option $selected>$grupo_sanguíneo</option>"; 
	 }
?>
</select> 
</div>

<div class="col-lg-2">
<legend class="col-form-label">RH</legend>
<div class="col-lg-2">
<?php
if($rh =="+"){
	$checked="checked";
} else{
	$checked="";
	}?>
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
<input type="radio" class="btn-check rh-pos" name="<?=$id_ao?>_ant_rh" id="<?=$id_ao?>_ant_rh_1" autocomplete="off" value='+' <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_rh_1">+</label>
<?php
if($rh =="-"){
	$checked="checked";
} else{
	$checked="";
	}
	?>
<input type="radio" class="btn-check" name="<?=$id_ao?>_ant_rh" id="<?=$id_ao?>_ant_rh_2" autocomplete="off" value='-' <?=$checked?>>
<label class="btn btn-outline-primary" for="<?=$id_ao?>_ant_rh_2">-</label>

</div>

</div>

</div>
<div class="col-lg-2">
<legend class="col-form-label">Tipificación</legend>
<input type="text" class="form-control" id="<?=$id_ao?>_ant_tipification" value="<?=$tipificacion?>">

</div>
</div>
<input type="hidden" value="<?=$id_ao?>" id="v_at_data"/>
<input type="hidden" value="<?=$id_ao?>" id="id_ht"/>
</div>
<div class="row">
	<div class="col-lg-12">
	
<?php 

if ($v_at_data ==1 ) { ?>
				<div class="float-end">
				<br/>
				
				<button type="button" class="btn btn-success" id="saveEditAntOtros">Guardar </button>
				<span id="successAntOtros" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php } 
			 
			   	$dataoa= array(
'vio_up_time'=>$up_time,
'vio_in_time' =>$in_time,
'vio_in_by'=>$in_by,
'vio_up_by' => $up_by
);

$this->session->set_userdata($dataoa);

			 ?>	
</div>
</div>

