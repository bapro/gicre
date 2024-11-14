    <div class="col-sm-12">
  <h5 class="card-title">Resultados de examenes</h5>
	   <?php 
		$params = array('id_paginate' => 'paginate-cardvas-examr-li', 'rows'=>$query_rst_exm, 'id'=>'id', 'total'=>$query_rst_exm_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
		?>
               
	   <div id="cardvas-examr-form">
	 <?php $this->load->view('clinical-history/cardiovascular-evaluation/exams-result/form');?>
          </div>
       </div>
   
   