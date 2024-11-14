<h4 class="card-title">Control Prenatal</h4>
 <input id='doesContPrFomHsData' type="hidden" value="<?=$con_pren_data?>" />
<div class="col-sm-12">
<div id="reload-control-prenatal">
    <?php
    $params = array('id_paginate' => 'paginate-control-prenatal-li', 'rows' => $query_con_pren, 'id' => 'id_registro', 'total' => $con_pren_totals);
    echo $this->user_register_info->control_prenatal_list_patients_registers_by_date($params);
    ?>
</div>
  
    <div id="control-prenatal-form">
        <div class="table-responsive">
            <?php 
			
			$this->load->view('clinical-history/ginecology/control-prenatal/form'); ?>
        </div>
	 </div>
	 <div id="reloadNewPregBtn" class="float-start">
	
	 <?php 

if(!isset($end_pregnancy_val)){
	echo '<button type="button" class="btn btn-primary newContPrenaForm"   id="newContPrenaForm">Nuevo Embarazo</button>'; 
	echo "<em class='text-danger clear-msg-ne'>Elige la fecha de la ultima menstruación para crear nuevo embarazo.</em>";
	
 }
 
 ?>
</div>	
</div>