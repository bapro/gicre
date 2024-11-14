
       <h4 class="card-title">Enfermedad actual </h4>
	    
       <div class="col-sm-10">
	   <?php 
		$params = array('id_paginate' => 'paginate-enf-li', 'rows'=>$enfermedad, 'id'=>'id_enf', 'total'=>$enfermedad_total);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
	   <div id="enfermedad-actual-form">
	     <?php $this->load->view('clinical-history/enfermedad-actuales/form');?>
          </div>
       </div>
   
   