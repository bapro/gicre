<h4 class="card-title">Antecedentes Obstétricos</h4>
 <div class="col-sm-12">
 <input value="<?=$amorrea_semana?>" type="hidden" id="database-amorrea-semana" />
	   <?php 
		$params = array('id_paginate' => 'paginate-obs-li', 'rows'=>$query_obs, 'id'=>'idobs', 'total'=>$obs_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
			
	   <div id="obs-form">
	     <?php $this->load->view('clinical-history/ginecology/obs/form'); ?>
          </div>
       </div>