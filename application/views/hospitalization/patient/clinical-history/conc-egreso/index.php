<h4 class="card-title">Conclusión de egreso</h4>
 <div class="col-sm-12">
 <div id="pagination-hosp_conEgreso">
	   <?php 
		$params = array('id_paginate' => 'paginate-conEgreso-li', 'rows'=>$query_coneg, 'id'=>'id', 'total'=>$query_coneg_total);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
      </div>         
			
	   <div id="conEgreso-form">
	     <?php $this->load->view('hospitalization/clinical-history/conc-egreso/form'); ?>
          </div>
       </div>