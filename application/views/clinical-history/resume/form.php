<hr>
<?php
if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}?>
<ul class="list-group list-group-flush">
  <li class="list-group-item"><em><strong>FECHA</strong> <?=date("d-m-Y H:i:s",strtotime($current_disease['inserted_time'])); ?></em></li>
  <li class="list-group-item"><em><strong>DR(A) <?=$doc_name; ?></strong> (<?=$doctor_area?>)</em></li>
 <li class="list-group-item"><em><strong>CENTRO MEDICO </strong><?=$centro_name; ?></em></li>

</ul>

<hr>

<ul class="list-group list-group-flush">
    <?php if($doc_area_id !=91) {
		 $table_print='h_c_enfermedad_actual';
		 ?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">CAUSA DE ATENCION</div>
      <?= $current_disease['enf_motivo']; ?>
    </div>
 
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">SINOPSIS</div>
<?= $current_disease['signopsis']; ?>
    </div>
  
  </li>
  
  <?php } else {
	  $table_print='h_c_cirujano_vascular';?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Historia </div>
<?= $current_disease['cir_vas_historial']; ?>
    </div>
  
  </li>
 <?php }

 
 ?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">SIGNOS VITALES</div>
	  <ul class="list-group list-group-horizontal" style="display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    max-width: 1000px;">
  <li class="list-group-item"><strong>T.A.(mm):</strong> <?= $signo_vitales['ta']?> / <strong>T.A (hg):</strong> <?= $signo_vitales['hg']?> </li>

 <li class="list-group-item"><strong>FR:</strong> <?=$signo_vitales['fr']?></li>
  
  <li class="list-group-item"><strong>FC:</strong> <?=$signo_vitales['fc']?></li>

  <li class="list-group-item"><strong>T:</strong> <?=$signo_vitales['tempo']?></li>
 
  <li class="list-group-item">
  <strong>Peso: </strong>
   <?php 
			echo $signo_vitales['peso']. " lb ".$signo_vitales['kg']. "kg" ;
		?>
  
  </li>
 
   <li class="list-group-item">
  <strong>Talla: </strong>
  <?php 
  $talla=floatval($signo_vitales['talla']);
  
  $peso_kg=floatval($signo_vitales['kg']);
  if($peso_kg >0 && $talla >0 ){
	  $talla_du = $talla  * $talla;
  $imc_result = $peso_kg / $talla_du;
  $imc_dec = number_format($imc_result, 2);
  }else{
	  $imc_dec='';
  }
	echo $signo_vitales['talla']. "metro / INC:". $signo_vitales['talla_imc']. "/ IMC: ".$imc_dec  ;
			
	?> 
 </li>
 
   <li class="list-group-item">
  <strong>Pulso: </strong>
  
   <?php
	echo $signo_vitales['pulso'] ;
	
	?> 
  </li>
  
  <li class="list-group-item">
  <strong>Glicemia: </strong>
 <?php
	echo $signo_vitales['glicemia'] ;
	
	?> 
	 </li>
	 <?php
	
	 if($signo_vitales['signo_v_per_cef']){?>
	  <li class="list-group-item">
  <strong>Perimetro Cefalico: </strong>
	      <?php
			echo $signo_vitales['signo_v_per_cef']. "cm" ;
			
			?> 
	  </li>
	  <?php } ?> 
</ul>
     
    </div>
 
  </li>
 <br>
    <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">DIAGNOSTICOS</div>
	 
<?= $list_cie10; ?>
 
    </div>
  
  </li>
  
   <?php 
	  if($con_diags['otros_diagnos'] !==""){
	  ?>
   <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">OTROS DIAGNOSTICOS</div>
<?= $con_diags['otros_diagnos'] ?>

    </div>
  
  </li>
  
   <?php 
	  }
	  ?>
  <br>
   <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">PLAN</div>
<?= $con_diags['plan']; ?>

    </div>
  
  </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">INDICACIONES</div>
	 <?php 
	 if($querymED !=NULL){
	 foreach($querymED as $rf)
		?>
	   <div class="fw-bold"><strong>Medicamentos</strong> <em style='font-size:10px'>(<?=date("d-m-Y",strtotime($rf->insert_time))?>)</em></div>
	  
		<?php foreach($querymED as $r) {
		echo "$r->medica, ";
		}
	 }
		//----ESTUDIO-----
		
		if($querymEST !=NULL){
		
		  foreach($querymEST as $res)
		  
		  ?>
		  
 <div class="fw-bold"><strong>Imagenes</strong> <em style='font-size:10px'>(<?=date("d-m-Y",strtotime($res->insert_time))?>)</em></div>
	  
		<?php foreach($querymEST as $r) {
		echo "$r->estudio, ";
		}
		}
		
		
		//----LABO------
			if($querymLAB !=NULL){
		foreach($querymLAB as $rl)
		
		?>
	 


 <div class="fw-bold"><strong>Laboratorios</strong> <em style='font-size:10px'>(<?=date("d-m-Y",strtotime($rl->insert_time))?>)</em></div>
	  
		<?php foreach($querymLAB as $r) {
			 $lab=$this->clinical_history->select('name')->where('id',$r->laboratory)
            ->get('laboratories')->row('name');
		echo "$lab, ";
		}
		
			}
		?>
	
    </div>
  
  </li>
  
  
  
</ul>
<hr>
<?php 
if($is_to_show==1){
echo '<div class="float-end"><a class="btn btn-primary btn-lg"  href="'.base_url().'print_page/resume_historial/'.$this->session->userdata('id_patient').'/'.$current_disease['inserted_by'].'/'.$current_disease['centro_medico'].'/'.$table_print.'/'.$current_disease['id'].'" target="_blank">IMPRIMIR</a></div>';
}else{
    
    $currentDo=$this->session->userdata('user_id');
   $firma_doc="$currentDo-1.png";

$signature = "assets/update/$firma_doc";
  
   
   if (file_exists($signature)) {
 echo '<img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc1.'"  />';
}
}
 ?>
