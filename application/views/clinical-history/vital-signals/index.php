 <h4 class="card-title">Signos vitales </h4>
	    
       <div class="col-sm-12">
	    
			 <?php 
		$params = array('id_paginate' => 'paginate-signovitales-li', 'rows'=>$signos_vitales_by_id, 'total'=>$signos_vitales_conc);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
			<div class="spinner-border text-primary" role="status" style="display:none">
			<span class="visually-hidden">Loading...</span>
			</div>
			
	   <div id="signo-vitales-form">
	     <?php $this->load->view('clinical-history/vital-signals/form');?>
          </div>
       </div>



