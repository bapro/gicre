 <div class="col-sm-12">
  <h5 class="card-title">Examen del sistema</h5>
	   <?php 
		$params = array('id_paginate' => 'paginate-examsistema-li', 'rows'=>$query_sis, 'id'=>'id', 'total'=>$sis_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
	   <div id="examsistema-form">
	     <?php $this->load->view('clinical-history/examen-sistema/form');?>
          </div>
       </div>
   
   