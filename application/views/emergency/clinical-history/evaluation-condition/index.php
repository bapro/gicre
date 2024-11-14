<h4 class="card-title">Evaluación/Condición</h4>
 <div class="col-sm-12">
  <div id="pagination-hosp_eval_con">
	   <?php 
		$params = array('id_paginate' => 'paginate-evaCond-li', 'rows'=>$query_evcond, 'id'=>'id', 'total'=>$query_evcond_total);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
         </div>        
			
	   <div id="eva-cond-form">
	     <?php $this->load->view('emergency/clinical-history/evaluation-condition/form'); ?>
          </div>
       </div>