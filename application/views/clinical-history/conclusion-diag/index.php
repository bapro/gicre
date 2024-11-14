   
       <h4 class="card-title">Conclusión Diagnostico</h4>
	    
       <div class="col-sm-10">
	  
		 <?php 
		$params = array('id_paginate' => 'paginate-condiag-li', 'rows'=>$concluciones, 'total'=>$count_conc);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
			<div class="spinner-border text-primary" role="status" style="display:none">
			<span class="visually-hidden">Loading...</span>
			</div>
			
	   <div id="conclusion-diag-form">
	     <?php $this->load->view('clinical-history/conclusion-diag/form');?>
          </div>
       </div> 
   
  